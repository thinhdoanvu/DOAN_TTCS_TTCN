<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\City;
use App\Models\Province;
use App\Models\Wards;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\ProductDetail;
use App\Utilities\Constant;
use App\Utilities\VNPay;
use Barryvdh\Debugbar\Support\Clockwork\Converter as ClockworkConverter;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Mail;
use App\Models\Coupon;
use App\Models\Rank;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;

use PHPViet\NumberToWords\Transformer;

class CheckOutController extends Controller
{
    //
    public function index(Request $request){
        
        if ($request->session()->has('customer')) {
                //
            $city = City::orderBy('matp', 'ASC')->get();
            $user = $request->session()->get('customer');
            $province = Province::where('matp',$user->matp)->get();
            $wards = Wards::where('maqh',$user->maqh)->get();

            $carts = Cart::content();
            //tổng tiền giỏ hàng
            $total = Cart::total();
            $total = str_replace(',','',$total);

            //dd($total);
            $transformer = new Transformer();

            //tổng phụ
            $subtotal = Cart::subtotal();
            $subtotal = str_replace(',','',$subtotal);

            return view('front.checkout.index',compact('carts','total','subtotal','user','city','transformer','province','wards'));
    
        }else{
            return redirect('tai-khoan/login');
        }
    }

    public function loadCheckout(Request $request){
        $data = $request->all();
        if($data['action']){
            $output = '';
            if($data['action'] == "select-city"){
                $select_province = Province::where('matp', $data['matp'])->orderBy('maqh', 'ASC')->get();
                    $output.='<option>---Select an Option---</option>';
                foreach($select_province as $province){
                    $output.='<option required value="'.$province->maqh.'">'.$province->name_quanhuyen.'</option>';
                }

            } else {

                $select_wards = Wards::where('maqh', $data['matp'])->orderBy('xaid', 'ASC')->get();
                    $output.='<option>---Select an Option---</option>';
                foreach($select_wards as $ward){
                    $output.='<option required value="'.$ward->xaid.'">'.$ward->name_xaphuong.'</option>';
                }
            }
        }
        echo $output;
    }

    public function addOrder(Request $request){
        $user = $request->session()->get('customer');
        //dd($user);
        if($user->matp == null || $user->maqh == null || $user->maxp == null ){
            $request->validate([
                'city' => 'required',
                'province' => 'required',
                'wards' => 'required',
            ],
            [
            'city.required' => 'Bắt buộc phải chọn tỉnh/thành phố.',
            'province.required' => 'Bắt buộc phải chọn quận/huyện.',
            'wards.required' => 'Bắt buộc phải chọn xã phường/ thị trấn.',
            ],);
        }
        $request->validate([
            'phone' => 'required|numeric',
        ],
        ['phone.required' => 'Bắt buộc nhập số điện thoại.',
        
        'phone.numeric' => 'Số điện thoại phải là kiểu số.',
        ],
        );

        $data = $request->all();
        $data['status'] = Constant::order_status_ReceiveOrders;

        $codeCoupon = $request->session()->get('coupon');
        //dd($codeCoupon);
        if($codeCoupon != null){
            $codeC = $codeCoupon[0]['code'];
            //dd($codeC);
            $coupon = Coupon::where('code', $codeC)->get();
            
            $dataCoupon = $coupon[0]['qty'] - 1;
            // dd($coupon);
            
            $coupon[0]->update(['qty' => $dataCoupon]);
            $data['code'] = $codeC;
        }
    
        if($request->matp != null){
            $request->validate([
                'province' => 'required',
                'wards' => 'required',
            ],
            [
            'province.required' => 'Bắt buộc phải chọn quận/huyện.',
            'wards.required' => 'Bắt buộc phải chọn xã phường/ thị trấn.',
            ],);
            $data['matp'] = $request->matp;
            $user->update([
                            'matp' => $request->matp,]);
        } else {
            $data['matp'] = $user->matp;
        }

        if($request->maqh != null){
            $request->validate([
                'wards' => 'required',
            ],
            [
            'wards.required' => 'Bắt buộc phải chọn xã phường/ thị trấn.',
            ],);
                $user->update([
                                'maqh' => $request->maqh,]);

        } else{
            $data['maqh'] = $user->maqh;
        }

        if($request->maxp != null){
            $user->update([
                            'maxp' => $request->maxp,]);

        } else{
            $data['maxp'] = $user->maxp;
        }

        $user->update(['street_address' => $request->street_address,]);
        $now = Carbon::now();
        $today = $now->format('Y-m-d');
        $data['order_date'] = $today;       
        $order = Order::create($data);


        //02. Thêm chi tiết đơn hàng
        $carts = Cart::content();
        foreach($carts as $cart){
            $data = [
                'order_id' => $order->id,
                'product_id' => $cart->id,
                'qty' => $cart->qty,
                'size' => $cart->options->size,
                'color' => $cart->options->color,
                'amount' => $cart->price,
                'total' => $cart->price * $cart->qty,
                'total_coupon' => $order->total_coupon ?? '',
                
            ];
            // $productDetails = ProductDetail::where('product_id',$cart->id)
            //                                 ->where('size',$cart->options->size)
            //                                 ->where('color',$cart->options->color)
            //                                 ->first();

            // if($productDetails){
            //     $dataProductDetail = [
            //         'inventory' => $productDetails->inventory - $cart->qty,
            //     ];
            //     $productDetails->update($dataProductDetail);
            // }
           

            // $product = Product::where('id',$cart->id)->first();
            // $dataProduct = [
            //     'inventory' => $product->inventory - $cart->qty,
            // ];
            // $product->update($dataProduct);

            OrderDetail::create($data);
        }

        if($request->payment_type == 'pay_later'){
            
        //03. Gửi email
        //tổng tiền giỏ hàng
        $total = Cart::total();
        $total = str_replace(',','',$total);
        //tổng phụ
        $subtotal = Cart::subtotal();
        $subtotal = str_replace(',','',$subtotal);
        $transformer = new Transformer();
        $this->sendEmail($order, $total, $subtotal, $transformer);

        //04. Xóa giỏ hàng sau khi đã thêm vào csdl
        Cart::destroy();


        //04.Trả về kết quả
        return view('front.checkout.confirmation',compact('carts','total','subtotal','order','transformer'));
        
        }
        
        if($request->payment_type == 'online_payment'){
            //1. Lấy url thanh toan vnpay
            $data_url = VNPay::vnpay_create_payment([
                'vnp_TxnRef' => $order->id, //ID cua don hang
                'vnp_OrderInfo' => 'Mo ta ve don hang...',
                'vnp_Amount' => Cart::total(0, '', ''), // nhân với tỷ giá usd để chuyển sang tiền việt
            ]);

            //2. chuyen huong toi url lay dc
            return redirect()->to($data_url);
        }
        
        

    }

    public function vnPayCheck(Request $request){
        //1.Lay data tu url (do vnpay gui ve qua $vnp_Returnurl)
        $vnp_ResponseCode = $request->get('vnp_ResponseCode'); //Mã phản hồi kết quả thanh toán, 00 = Thành công
        $vnp_TxnRef =$request->get('vnp_TxnRef'); //ticket id
        $vnp_Amount = number_format(substr($request->get('vnp_Amount'), 0, -2)); //số tiền thanh toán
        //2.Kiem tra ket qua giao dich tra ve tu VNPay
        if($vnp_ResponseCode != null){
            //Neu thanh cong
            if($vnp_ResponseCode == 00){
                //Cập nhật trạng thái Order
                //Order::update(['status' => Constant::order_status_Paid],$vnp_TxnRef);
                //gui email
                $order = Order::find($vnp_TxnRef);
                $total = $order->total_coupon ?? Cart::total();
                $total = str_replace(',','',$total);
                $subtotal = $order->total_coupon ?? Cart::subtotal();
                $total = str_replace(',','',$subtotal);
                $carts = Cart::content();
                $transformer = new Transformer();
                $this->sendEmail($order, $total, $subtotal, $transformer);

                //xoa gio hang
                Cart::destroy($order);

                //thong bao ket qua thanh cong
                return view('front.checkout.result',compact('carts','total','subtotal','order','vnp_Amount','transformer'));
            } else { //neu ko thanh cong
                //xoa don hang da them vao database va tra ve thong bao loi
                Order::find($vnp_TxnRef)->delete();

                //tra ve thong bao loi
                return view('front.checkout.error');

            }
        }
    }

    public function result(){
        //biến lấy dữ liệu thông báo từ session
        $notification = session('notification');
        return view('front.checkout.result', compact('notification'));
    }

    public function sendEmail($order, $total, $subtotal, $transformer){
        $transformer = new Transformer();
        $email_to = $order->email;
        $email_ad = 'lttt28022001@gmail.com';
        Mail::send('front.checkout.email', compact('order','total','subtotal', 'transformer') , function ($message) use ($email_to, $email_ad){
            $message->from('lttt28022001@gmail.com', 'Alice');
            $message->to($email_to, $email_to);
            $message->to($email_ad, $email_ad);
            $message->subject('Bạn có một đơn hàng');
        });
    }

    public function checkCoupon(Request $request){

        if($request->ajax()){
            
            $user_id = $request->user_id;
            $user = User::find($user_id);
            $rank = Rank::where('value_from','<=',$user->total)                   
                        ->where('value_to','>=',$user->total)
                        ->first();
                    
            $total = Cart::total();
            $total = str_replace(',','',$total);

            $transformer = new Transformer();

            $subtotal = Cart::subtotal();
            $subtotal = str_replace(',','',$subtotal);

            $code = $request->code;
            $now = Carbon::now();
            $today = $now->format('Y/m/d');

            $coupon = Coupon::where('code', $code)
            ->where('status',1)
            ->where('date_end','>=',$today)
            ->where('qty', '>',0)
            ->first();

            $couponRank = Coupon::where('code', $code)
            ->where('qty', '>',0)
            ->where('rank_id', '>', 0)
            ->first();
            
            if($coupon){
                $count_coupon = $coupon->count();
                if($count_coupon > 0){
                    $cou[] = array (
                        'code' => $coupon->code,
                        'coupon_condition' => $coupon->condition,
                        'number' => $coupon->number,
                    );
                    Session::put('coupon', $cou);
                    Session::save();
                    $flag = 1;
                    return view('Front.checkout.loadCoupon',compact('total','flag'))->render();

                } 
            } elseif($couponRank){
                if($rank->id == $couponRank->rank_id){
                    $count_coupon = $couponRank->count();
                        if($count_coupon > 0){
                            $cou[] = array (
                                'code' => $couponRank->code,
                                'coupon_condition' => $couponRank->condition,
                                'number' => $couponRank->number,
                            );
                            Session::put('coupon', $cou);
                            Session::save();
                            $flag = 1;
                            return view('Front.checkout.loadCoupon',compact('total','flag'))->render();
    
                        } 
                    
                } else{
                    $cou[] = array (
                    'code' => '',
                    'coupon_condition' => 0,
                    'number' => 0,
                );
                    Session::put('coupon', $cou);
                    Session::save();
                    $flag = 0;
                    return view('Front.checkout.loadCoupon',compact('total','flag'))->render();
                }

            } else{
                    $cou[] = array (
                    'code' => '',
                    'coupon_condition' => 0,
                    'number' => 0,
                );
                    Session::put('coupon', $cou);
                    Session::save();
                    $flag = 0;
                    return view('Front.checkout.loadCoupon',compact('total','flag'))->render();
                }
           
        }

    }
   
}

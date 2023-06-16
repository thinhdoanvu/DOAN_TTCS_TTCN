<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use App\Models\Product;
use App\Models\ProductDetail;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function addProduct (Request $request){
        if ($request->ajax()) {
        //dd($request->all());
        $product = Product::findOrFail($request->product_id);
        $colors = $request->color;
        
        $now = Carbon::now();
        $today = $now->format('Y/m/d');
        $sizes = $request->size;
        $productDetais = ProductDetail::where('product_id',$product->id)
            ->where('size',$sizes)
            ->where('color',$colors)
            ->first();

            if($productDetais){
                if(1 < $productDetais->inventory){
                    if(strtotime($product->date_end) >= strtotime($today)){
                        Cart::add([
                            'id' => $request->product_id,
                            'name' => $product->name,
                            'qty' => 1,
                            'price' => $product->discount,
                            'weight' => $product->weight ?? 0,
                            'options' => [
                                'images' => $product->productImages,
                                'size' => $sizes,
                                'color' => $colors,
                                'total_coupon' =>$request->total_coupon ?? '',
    
                            ],//[] thông số tùy biến
                        ]);
                    }else{
                        Cart::add([
                            'id' => $request->product_id,
                            'name' => $product->name,
                            'qty' => 1,
                            'price' => $product->price ,
                            'weight' => $product->weight ?? 0,
                            'options' => [
                                'images' => $product->productImages,
                                'size' => $sizes,
                                'color' => $colors,
                                'total_coupon' =>$request->total_coupon ?? '',
    
                            ],//[] thông số tùy biến
                        ]);
                    }
                    
                    $result['flag'] = 1;
                    $result['totalQuantity'] = Cart::count();
                }else{
                    $result['flag'] = 0;
                }
            }else{
                if(1 < $product->inventory){
                    if(strtotime($product->date_end) >= strtotime($today)){
                    Cart::add([
                        'id' => $request->product_id,
                        'name' => $product->name,
                        'qty' => 1,
                        'price' => $product->discount,
                        'weight' => $product->weight ?? 0,
                        'options' => [
                            'images' => $product->productImages,
                            'size' => $sizes,
                            'color' => $colors,
                            'total_coupon' =>$request->total_coupon ?? '',
                        ],//[] thông số tùy biến
                    ]);
                }else{
                    Cart::add([
                        'id' => $request->product_id,
                        'name' => $product->name,
                        'qty' => 1,
                        'price' => $product->price,
                        'weight' => $product->weight ?? 0,
                        'options' => [
                            'images' => $product->productImages,
                            'size' => $sizes,
                            'color' => $colors,
                            'total_coupon' =>$request->total_coupon ?? '',

                        ],//[] thông số tùy biến
                    ]);
                }
                    $result['flag'] = 1;
                    $result['totalQuantity'] = Cart::count();
                }else{
                    $result['flag'] = 0;
                }
            }
       
        return response()->json($result);
        }
        // dd(Cart::content());//xem tat ca du lieu trong Cart
    }

    public function index(Request $request){

        $carts = Cart::content();
        //dd($carts);

        //tổng tiền giỏ hàng
        $total = Cart::total();
        //dd($total);
        $total = str_replace(',','',$total);
        //tổng phụ
        $subtotal = Cart::subtotal();
        $subtotal = str_replace(',','',$subtotal);


        return view('front.shop.cart',compact('carts','total','subtotal'));
    }

    public function deleteProduct(Request $request){
        if ($request->ajax()) {
            Cart::remove($request->rowId);
            $result['totalMoney'] = Cart::total();
            $result['totalQuantity'] = Cart::count();
            return response()->json($result);
        }

    }

    public function destroy(){
        Cart::destroy();//destroy: xóa tất cả
        
        return back();
    }

    public function update(Request $request){
        if ($request->ajax()) {
            $a = Cart::get($request->rowId);
            $productDetais = ProductDetail::where('product_id',$a->id)
            ->where('size',$a->options->size)
            ->where('color',$a->options->color)
            ->first();
            $product = Product::find($a->id);
            
            if($productDetais){
                if($request->qty < $productDetais->inventory){
                    Cart::update($request->rowId, $request->qty);//cap nhat
                    $result['totalMoney'] = number_format(str_replace(',','',Cart::total()));
                    $result['flag'] = 1;
                    $product = Cart::get($request->rowId);
                    $result['totalMoneyProduct'] = number_format(str_replace(',','',$product->price) * $request->qty);
                    $result['totalQuantity'] = Cart::count();
                }else{
                    $result['flag'] = 0;
                }
            }else{
                if($request->qty < $product->inventory){
                    Cart::update($request->rowId, $request->qty);//cap nhat
                    $result['totalMoney'] = number_format(str_replace(',','',Cart::total()));
                    $result['flag'] = 1;
                    $product = Cart::get($request->rowId);
                    //dd($product);
                    $result['totalMoneyProduct'] = number_format(str_replace(',','',$product->price) * $request->qty);
                    $result['totalQuantity'] = Cart::count();
                }else{
                    $result['flag'] = 0;
                }
            }
            return response()->json($result);
        }
        
    }

    // public function checkCoupon(Request $request){

    //         $code = $request->code;
    //         $now = Carbon::now();
    //         $today = $now->format('Y/m/d');
    //         $coupon = Coupon::where('code', $code)
    //         ->where('status',1)
    //         ->where('date_end','>=',$today)
    //         ->first();
    //         //dd($coupon);
    //         if($coupon){
    //             $count_coupon = $coupon->count(); 
    //             if($count_coupon > 0){

    //                 $cou[] = array (
    //                     'code' => $coupon->code,
    //                     'coupon_condition' => $coupon->condition,
    //                     'number' => $coupon->number,
    //                 );
    //             // dd($cou);
    //                 Session::put('coupon', $cou);
    //                 // session()->put('coupon', $cou);
    //                 Session::save();
    //                 $dataCoupon = [
    //                     'qty' => $coupon->qty - '1',
    //                 ];
    //                 $coupon->update($dataCoupon); 

    //                 return redirect()->back()->with('notification', 'Thêm mã giảm giá thành công.');

    //             }
    //             } else{
    //                 $cou[] = array (
    //                 'code' => '',
    //                 'coupon_condition' => 0,
    //                 'number' => 0,
    //             );
    //                 Session::put('coupon', $cou);
    //                 Session::save();
    //                 return redirect()->back()->with('notification', 'Mã giảm giá không đúng hoặc đã hết hạn.');
    //             }

    // }
}

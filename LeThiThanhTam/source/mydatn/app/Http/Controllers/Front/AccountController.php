<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use App\Models\City;
use App\Models\Coupon;
use App\Models\Province;
use App\Models\Rank;
use App\Models\Wards;
use App\Utilities\Constant;
use Illuminate\Support\Facades\Hash;
use Dotenv\Validator;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Console\Input\Input;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Gloudemans\Shoppingcart\Facades\Cart;
use PHPViet\NumberToWords\Transformer;
use Illuminate\Http\Response;
use Socialite;
use Exception;
// use Laravel\Socialite\Facades\Socialite;

class AccountController extends Controller
{
    //
    public function login(){
        return view('front.account.login');
    }

    public function checkLogin(Request $request){
        $password = $request->password;
        $user = User::where('email',$request->email)->first();

        if(Hash::check($password, $user->password)) {
            $request->session()->put('customer', $user);    
            if(Cart::content())
            {
                return redirect('');
                //return redirect('gio-hang');
            }else{
                return redirect(''); //mac dinh la trang chu
            }
        } else {
            return back()->with('notification', 'ERROR: Email hoặc mật khẩu không đúng!');
        }        
    }

    public function logout( Request $request){
        $request->session()->forget('customer');

        return back();
    }

    public function register(){
        return view('front.account.register');
    }

    public function createUser(Request $request){
        $request->validate([
            'phone' => 'numeric',
        ],
            [
            'phone.numeric' => 'Số điện thoại phải là số.',],
        );
        
        if($request->password != $request->password_confirmation){
            return back()->with('notification', 'Mật khẩu không trùng khớp.');
        }

        $users = User::where('email', '=', $request->email)->first();//trả về một bản ghi đầu tiên tìm thấy nếu không thì sẽ trả về null
        if ($users != null) {
            return back()->with('notification', 'Email đã tồn tại.');
        }

        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'phone' => $request->phone,
            'password' => bcrypt($request->password),
            'level' => Constant::user_level_client,
        ]);
        

        return redirect('tai-khoan/login')->with('notification', 'Đăng kí thành công!Vui lòng đăng nhập.');
    }

    public function myOrderIndex(Request $request){
        //lay id cua user
        $user = $request->session()->get('customer');
        $orders = Order::where('user_id', $user->id)->get();
        // dd($orders);

        return view('front.account.my-order.index', compact('orders','user'));
    }

    public function myOrderDetail($id, Request $request){
        $user = $request->session()->get('customer');
        $order = Order::findOrFail($id);
        $transformer = new Transformer(); 
        return view('front.account.my-order.detail',compact('order','user','transformer'));
    }

    public function forgot(){
        return view('front.account.forgot');
    }
    //gui mail
    public function checkForgot(Request $request){
        $users = User::where('email', '=', $request->email)->first();//trả về một bản ghi đầu tiên tìm thấy nếu không thì sẽ trả về null
        if ($users == null) {
            return back()->with('notification', 'Email không tồn tại hoặc không đúng. Vui lòng nhập lại');
        } 

        $email_to = $request->email;
        Mail::send('front.account.email', compact('users') , function ($message) use ($email_to){
            $message->from('lttt28022001@gmail.com', 'Alice');
            $message->to($email_to, $email_to);
            $message->subject('Đặt lại mật khẩu');
        });
        return redirect('tai-khoan/login')->with('notification', 'Vui lòng kiểm tra email của bạn.');
    }

    public function resetPass($id){
        $users = User::findOrFail($id);
            
        return view('front.account.resetpass', compact('users'));
    }

    public function checkPass($id, Request $request){
        if($request->password != $request->password_confirmation){
            return back()->with('notification', 'Mật khẩu không trùng khớp.');
        }

        $password_h = bcrypt($request->password);
        $users = User::findOrFail($id);
        $users->update(['password' => $password_h]);
        return redirect('account/login')->with('notification', 'Đổi mật khẩu thành công!Vui lòng đăng nhập.');
    }
    
    public function information(Request $request){
        if ($request->session()->has('customer')) {
            $city = City::orderBy('matp', 'ASC')->get();
            $user = $request->session()->get('customer');
            $province = Province::where('matp',$user->matp)->get();
            $wards = Wards::where('maqh',$user->maqh)->get();

            $rank = Rank::where('value_from','<=',$user->total)                   
                        ->where('value_to','>=',$user->total)
                        ->first();
                    //dd($rank);
            $couponRank = Coupon::where('rank_id', '=', $rank->id)->first();

            return view('front.account.information',compact('user','city','province','wards','couponRank'));

        }else{
            return redirect('tai-khoan/login')->with('notification', 'Bạn phải đăng nhập trước.');
        }

    }
    public function loadCity(Request $request){
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
    

    public function history(Request $request){
        if ($request->session()->has('customer')) {
        //lay id cua user
            $user = $request->session()->get('customer');
            $orders = Order::where('user_id', $user->id)->get(); 
            // dd($orders);
            

            return view('front.account.history', compact('orders','user'));

        }else{
            return redirect('tai-khoan/login')->with('notification', 'Bạn phải đăng nhập trước.');
        }
        
    }

    public function updateInformation(Request $request){
        $data = $request->all();
        //dd($data);
        $id = $request->session()->get('customer')->id;
        //dd($id);
        $users = User::findOrFail($id);
        if($request->password_current != null){
            $request->validate([
                'password' => 'required',
                'password_confirmation' => 'required',
            ],
                [
                'password.required' => 'Mật khẩu không được để trống.',
                'password_confirmation.required' => 'Mật khẩu không được để trống.',],
            );
            //$password_current = User::where('password', '=', $request->password_current)->first();
            if (password_verify($request->password_current,$users['password']) != true) {
                return back()->with('notification', 'Mật khẩu không đúng. Vui lòng nhập lại.');           
            } if($request->password != $request->password_confirmation){
                return back()->with('notification', 'Mật khẩu không trùng khớp.');
                }else {
                    $password_h = bcrypt($request->password);
        
                    $users->update(['password' => $password_h]);
                    return back()->with('notification', 'Cập nhật thành công.');
                }   
        }
      
            $request->validate([
                'name' => 'required',
                'email' => 'required',
                'street_address' => 'required',
            ],
                [
                'name.required' => 'Tên không được để trống.',    
                'email.required' => 'Email không được để trống.',
                'street_address.required' => 'Địa chỉ không được để trống.',
                ],
            );
       
            if($request->city != null){
                $request->validate([
                    'province' => 'required',
                    'wards' => 'required',
                ],
                [
                'province.required' => 'Bắt buộc phải chọn quận/huyện.',
                'wards.required' => 'Bắt buộc phải chọn xã phường/ thị trấn.',
                ],);
                $users->update(['city' => $request->city,
                                'matp' => $request->matp,]);

            }
            if($request->province != null){
                $request->validate([
                    'wards' => 'required',
                ],
                [
                'wards.required' => 'Bắt buộc phải chọn xã phường/ thị trấn.',
                ],);
                $users->update([
                    'province' => $request->province,
                    'maqh' => $request->maqh,]);

            }
            if($request->wards != null){
                $users->update(['wards' => $request->wards,
                'maxp' => $request->maxp,]);

            }

        $users->update([
            'name'     => $request->name,
            'email'    => $request->email,
            'street_address' => $request->street_address,
        ]);
       
        //cập nhật lại session
        session()->put('customer', $users);
        return redirect()->back()->with('notification', 'Cập nhật thành công.');
    }

    public function getGoogleSignInUrl()
    {
        try {
            $url = Socialite::driver('google')->stateless()
                ->redirect()->getTargetUrl();
            return response()->json([
                'url' => $url,
            ])->setStatusCode(Response::HTTP_OK);
        } catch (\Exception $exception) {
            return $exception;
        }
    }

    public function loginGoogle(Request $request)
    {
        try {
            $state = $request->input('state');

            parse_str($state, $result);
            $googleUser = Socialite::driver('google')->stateless()->user();

            $user = User::where('email', $googleUser->email)->first();
            if ($user) {
                $request->session()->put('customer', $user);
                return redirect('http://localhost:8000/');
            }
            $user = User::create(
                [
                    'email' => $googleUser->email,
                    'name' => $googleUser->name,
                    'google_id'=> $googleUser->id,
                    'password'=> bcrypt('123'),
                    'level'=>2,
                    'total'=>0,
                ]
            );
            $request->session()->put('customer', $user);
            return redirect('http://localhost:8000/');

        } catch (\Exception $exception) {
            return response()->json([
                'status' => __('google sign in failed'),
                'error' => $exception,
                'message' => $exception->getMessage()
            ], Response::HTTP_BAD_REQUEST);
        }
    }

    public function facebookRedirect()
    {
        return Socialite::driver('facebook')->redirect();
    }
    public function loginWithFacebook(Request $request)
    {
        try {
    
            $user = Socialite::driver('facebook')->stateless()->user();
            $isUser = User::where('fb_id', $user->id)->first();
     
            if($isUser){
                $request->session()->put('customer', $isUser);
                return redirect('http://localhost:8000/');
                // Auth::login($isUser);
                // return redirect('/dashboard');
            }else{
                $createUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email ?? 0,
                    'fb_id' => $user->id,
                    'password' => encrypt('admin@123')
                ]);
    
                // Auth::login($createUser);
                $request->session()->put('customer', $createUser);
                return redirect('http://localhost:8000/');
            }
    
        } catch (Exception $exception) {
            dd($exception->getMessage());
        }
    }

    public function cancelOrder(Request $request){
        if ($request->ajax()) {
            $order = Order::findOrFail($request->rowId);
            $order->update([
                'status'     => 0,
            ]);
            $result['status'] = 0;
            return response()->json($result);
        }

    }
}

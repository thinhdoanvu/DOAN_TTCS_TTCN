<?php

namespace App\Http\Controllers;

use App\Models\Member;

use Illuminate\Support\Str;
use App\Mail\ForgotPassword;
use Illuminate\Http\Request;
use App\Traits\StoreImageTrait;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Http\Services\FrontendService;
use App\Http\Services\Posts\PostService;
use App\Mail\VerifyMail;
use Carbon\Carbon;

class UserController extends Controller
{
    use StoreImageTrait;
    protected $posts, $frontend;

    public function __construct(PostService $posts, FrontendService $frontend){
        $this->posts = $posts;
        $this->frontend = $frontend;
    }

    public function index()
    {
        $index = $this->frontend->index();
        return $index;
    }

    // public function login(){
    //     return view('user.page.account.loginregister');
    // }

    public function login(){
        return view('user.page.account.login');
    }

    public function handlelogin(Request $request){
        if(Auth::guard('webuser')->attempt($request->only('email', 'password'))){
            if(Auth::guard('webuser')->user()->status == 1){
                return redirect()->route('home');
            } else {
                Auth::guard('webuser')->logout();
                return redirect()->route('user.login')->with('msg', "Tài khoản của bạn chưa được kích hoạt, vui lòng <a href='" . route('user.verifyemail') . "'>click vào đây để kích hoạt</a>");
            }
        } else {
            return redirect()->back()->with('msg', 'Sai tài khoản hoặc mật khẩu');
        }
    }

    public function register(){
        return view('user.page.account.register');
    }

    public function postRegister(Request $request){
        $token = strtoupper(Str::random(10));

        if($request->password == $request->confirmpass){
            $member = Member::create([
                'full_name' => $request->full_name,
                'gender' => $request->gender,
                'birthday' => $request->birthday,
                'phone' => $request->phone,
                'address' => $request->address,
                'image_path' => '/storage/imguser/imgdefault.png',
                'image_name' => 'imgdefault.png',
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'status' => 0,
                'token_verify' => $token
            ]);

            Mail::send('user.page.account.active_email_register', compact('member'), function($email) use($member) {
                $email->subject('NaFruits - Xác thực tài khoản');
                $email->to($member->email, $member->full_name);
            });

            return redirect()->route('user.login')->with('msg', 'Đăng ký thành công, vui lòng kích hoạt tài khoản email của bạn');
        }else{
            return redirect()->back()->with('msg', 'Xác nhận mật khẩu không khớp');
        }
    }

    public function actived(Member $member, $token){
        $today = Carbon::now();

        if($member->token_verify === $token){
            $member->update([
                'email_verified_at' => $today,
                'status' => 1,
                'token_verify' => null
            ]);
            return redirect()->route('user.login')->with('msg', 'Kích hoạt tài khoản thành công, bạn có thể đăng nhập');
        } else {
            return redirect()->route('user.login')->with('msg', 'Mã xác nhận bạn gửi không hợp lệ');
        }
    }

    public function verifyEmail(){
        return view('user.page.account.verifyEmail');
    }

    public function postVerifyEmail(Request $request){
        $request->validate([
            'email' => 'required|exists:members'
        ],[
            'email.required' => 'Vui lòng nhập địa chỉ mail hợp lệ',
            'email.exists' => 'Email này không tồn tại',
        ]);

        $member = Member::where('email', $request->email)->first();
        $token = strtoupper(Str::random(10));

        $member->update([
            'token_verify' => $token
        ]);

        if($member->status != 1){

            Mail::to($member->email)->send(new VerifyMail($member));

            return redirect()->back()->with('msg', 'Đã gửi mã kích hoạt thành công, vui lòng kiểm tra email để kích hoạt tài khoản');
        } else {
            return redirect()->route('user.login')->with('msg', 'Tài khoản này đã được kích hoạt');
        }

    }

    public function forgotPass(){
        return view('user.page.account.forgotPass');
    }

    public function postforgotPass(Request $request){
        $request->validate([
            'email' => 'required|exists:members'
        ],[
            'email.required' => 'Vui lòng nhập địa chỉ mail hợp lệ',
            'email.exists' => 'Email này không tồn tại',
        ]);

        $member = Member::where('email', $request->email)->first();
        $token = strtoupper(Str::random(10));
        $member->password_resets()->create([
            'email' => $request->email,
            'token' => $token
        ]);


        Mail::to($member->email)->send(new ForgotPassword($member, $token));

        return redirect()->back()->with('msg', 'Vui lòng kiểm tra email để thực hiện thay đổi mật khẩu');
    }

    public function resetPass(Member $member, $token){
        if($member->password_resets->token === $token){
            return view('user.page.account.resetPass');
        }
        return abort(404);
    }

    public function postresetPass(Request $request, Member $member, $token){
        $request->validate([
            'resetuserpass' => 'required',
            'confirm_resetuserpass' => 'required|same:resetuserpass',
        ], [
            'resetuserpass.required' => 'Vui lòng nhập mật khẩu',
            'confirm_resetuserpass.same' => 'Xác nhận mật khẩu không khớp',
            'confirm_resetuserpass.required' => 'Vui lòng xác nhận mật khẩu',
        ]);

        $member->update(['password' => bcrypt($request->resetuserpass),]);
        $member->password_resets->where('email', $member->email)->update(['token' => null,]);

        return redirect()->route('user.login')->with('msg', 'Đặt lại mật khẩu thành công');
    }

    public function logout(Request $request){
        Auth::guard('webuser')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('home');
    }

    public function inf(Request $request, $id){
        $userinfs = Member::find($id);
        return view('user.page.userinf', compact('userinfs'));
    }

    public function editinf(Request $request, $id){
        $dataUpdate = [
            'full_name' => $request->full_name,
            'gender' => $request->gender,
            'birthday' => $request->birthday,
            'phone' => $request->phone,
            'address' => $request->address,
        ];

        $userImage = $this->storageTraitUpLoad($request, 'image_path', 'imguser');
        if(!empty($userImage)){
            $dataUpdate['image_name'] = $userImage['file_name'];
            $dataUpdate['image_path'] = $userImage['file_path'];
        }

        Member::find($id)->update($dataUpdate);

        return redirect()->back()->with('msg', 'Cập nhật thông tin thành công');
    }

    public function blogIndex()
    {
        $result = $this->posts->postIndex();
        return $result;
    }

    // public function productIndex()
    // {
    //     $result = $this->products->productIndex();
    //     return $result;
    // }
}

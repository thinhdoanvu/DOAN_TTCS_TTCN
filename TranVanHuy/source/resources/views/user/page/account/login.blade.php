@extends('user.usershop')
@section('usermain')
    <div class="huy">
        <div class="wrapper1">
            <div class="title-text">
                <div class="title login">ĐĂNG NHẬP</div>
            </div>
            <div class="form-container">
                <div class="form-inner">
                    <form action=""  method="post" class="login">
                        @csrf
                        <div class="field">
                            <input type="email" name="email" placeholder="Địa chỉ Email" required>
                        </div>
                        <div class="field">
                            <input type="password" name="password" placeholder="Mật khẩu" required>
                        </div>
                        <div class="pass-link"><a href="{{ route('user.forgotpass') }}">Quên mật khẩu?</a></div>
                        @if (session('msg'))
                            <div class="alert alert-success">{!! session('msg') !!}</div>
                        @endif
                        <div class="field btn" style="padding: 0; position: relative; overflow: hidden;">
                            <div class="btn-layer"></div>
                            <input type="submit" name="signin" value="Đăng nhập">
                        </div>
                        <div class="signup-link">Chưa có tài khoản? <a href="{{ route('user.register') }}">Đăng ký ngay</a></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

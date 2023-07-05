@extends('user.usershop')
@section('usermain')
    <div class="huy">
        <div class="wrapper1">
            <div class="title-text">
                <div class="title signup">ĐĂNG KÝ</div>
            </div>
            <div class="form-container">
                <div class="form-inner">
                    <form action="" method="POST" class="signup">
                        @csrf
                        <div class="row" style="margin-left: 1px">
                            <div class="col-sm-6">
                                <div class="field">
                                    <input type="text" name="full_name" placeholder="Họ và tên" required>
                                </div>
                                <div class="ml-2 mt-4 pt-1">
                                    <input type="radio" name="gender" value="1" checked>
                                    <label class="mr-2">Nam</label>
                                    <input type="radio" name="gender" value="0">
                                    <label>Nữ</label>
                                </div>
                                <div class="field">
                                    <input type="text" name="address" placeholder="Địa chỉ" required>
                                </div>
                                <div class="field">
                                    <input type="password" name="password" placeholder="Mật khẩu" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="field">
                                    <input name="birthday" type="date" required>
                                </div>
                                <div class="field">
                                    <input type="text" name="phone" placeholder="Số điện thoại" pattern="[0-9]{10}" required>
                                </div>
                                <div class="field">
                                    <input type="email" name="email" placeholder="Địa chỉ Email" required>
                                </div>
                                <div class="field">
                                    <input type="password" name="confirmpass" placeholder="Xác nhận Mật khẩu" required>
                                </div>
                            </div>
                        </div>
                        @if (session('msg'))
                            <div class="alert alert-success mt-2">{{session('msg')}}</div>
                        @endif
                        <div class="field btn" style="padding: 0; position: relative; overflow: hidden;">
                            <div class="btn-layer"></div>
                            <input type="submit" name="signup" value="Đăng ký">
                        </div>
                        <div class="signup-link">Đã có tài khoản. <a href="{{ route('user.login') }}">Đăng nhập</a></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

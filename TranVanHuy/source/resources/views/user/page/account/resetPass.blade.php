@extends('user.usershop')
@section('usermain')
    <div class="huy">
        <div class="wrapper1">
            <div class="title-text">
                <div class="title text-info">ĐỔI MẬT KHẨU</div>
            </div>
            <div class="form-container">
                <div class="form-inner">
                    <form action="" method="post" class="login">
                        @csrf
                        <div class="field">
                            <input type="password" name="resetuserpass" class="form-control" placeholder="Nhập mật khẩu mới">
                            @error('resetuserpass')
                                <small style="color: red">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="field">
                            <input type="password" name="confirm_resetuserpass" class="form-control" placeholder="Xác nhận mật khẩu mới">
                            @error('confirm_resetuserpass')
                                <small style="color: red">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="field btn" style="padding: 0; position: relative; overflow: hidden;">
                            <div class="btn-layer"></div>
                            <input type="submit" value="Đổi mật khẩu">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
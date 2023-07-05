@extends('user.usershop')
@section('usermain')
    <div class="huy">
        <div class="wrapper1">
            <div class="title-text">
                <div class="title text-info">KÍCH HOẠT TÀI KHOẢN EMAIL</div>
            </div>
            <div class="form-container">
                <div class="form-inner">
                    <form action="" method="post" class="login">
                        @csrf
                        <p class="text-center" style="color: black">Vui lòng điền địa chỉ email bạn chưa kích hoạt</p>
                        @if (session('msg'))
                            <div class="alert alert-success"><i class="fa-solid fa-check"></i> {{session('msg')}}</div>
                        @endif
                        <div class="field">
                            <input type="email" name="email" class="form-control" placeholder="Nhập địa chỉ Email" value="{{ old('email') }}">
                            @error('useremail')
                                <small style="color: red">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="field btn" style="padding: 0; position: relative; overflow: hidden;">
                            <div class="btn-layer"></div>
                            <input type="submit" value="Gửi mã kích hoạt">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

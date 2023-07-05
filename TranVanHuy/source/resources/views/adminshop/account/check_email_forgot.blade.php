<div style="width: 600px; margin: 0 auto;">
    <div style="text-align: center">
        <h2>Xin chào {{$user->name}}</h2>
        <p>Email này giúp bạn lấy lại mật khẩu tài khoản đã bị quên</p>
        <p>Vui lòng click vào link dưới đây để đặt lại mật khẩu</p>
        <p><span style="color: red">Chú ý:</span> Mã xác nhận trong link chỉ có hiệu lực trong vòng 5 phút</p>
        <p>
            <a href="{{ route('resetpass', ['user' => $user->id, 'token' => $token]) }}"
                style="text-decoration: none; display: inline-block; background-color: green; color: #fff; padding: 7px 25px; font-weight: bold">
                Đặt lại mật khẩu
            </a>
        </p>
    </div>
</div>
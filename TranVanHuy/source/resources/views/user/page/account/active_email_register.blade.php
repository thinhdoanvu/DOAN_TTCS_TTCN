<div style="width: 600px; margin: 0 auto;">
    <div style="text-align: center">
        <h2>Xin chào {{$member->full_name}}</h2>
        <p>Bạn đã đăng ký tài khoản tại hệ thống của chúng tôi</p>
        <p>Để có thể tiếp tục sử dụng các dịch vụ, bạn vui lòng click vào link dưới đây để kích hoạt tài khoản</p>
        <p><span style="color: red">Chú ý:</span> Mã xác nhận trong link chỉ có hiệu lực trong vòng 5 phút</p>
        <p>
            <a href="{{ route('user.actived', ['member' => $member->id, 'token' => $member->token_verify]) }}"
                style="text-decoration: none; display: inline-block; background-color: green; color: #fff; padding: 7px 25px; font-weight: bold">
                Kích hoạt tài khoản
            </a>
        </p>
    </div>
</div>

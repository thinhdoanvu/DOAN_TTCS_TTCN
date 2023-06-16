@extends('front.layout.master')
@section('title', 'Product Detail')

@section('body')

<div class="account section">
	<div class="container">
		<div class="row justify-content-center" style="margin-top: 100px">
			<div class="col-lg-6">
				<div class="login-form border p-5">
					<div class="text-center heading">
						<h3 class="mb-2 h2">Khôi phục mật khẩu</h3>
						<p class="lead">Vui lòng nhập địa chỉ email cho tài khoản của bạn. Một đường dẫn đặt lại mật khẩu sẽ được gửi đến bạn. Khi bạn đã nhận được nó, bạn sẽ có thể chọn mật khẩu mới cho tài khoản của mình.</p>
					</div>

					<form action="" method="POST">
            		@csrf
						<div class="form-group mb-4">
							<label for="#">Nhập địa chỉ email</label>
							{{-- thông báo --}}
							@if(session('notification'))
								<div class="alert alert-warning" role="alert">
								{{ session('notification')}}
								</div>
							@endif
							<input type="text" class="form-control" name="email" placeholder="Nhập địa chỉ email">
						</div>
						{{-- <a href="#" class="btn btn-main mt-3 btn-block">Request OTP</a> --}}
            			<button type="submit" value="submit" class="btn btn-main mt-3 btn-block">Gửi</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>


@endsection

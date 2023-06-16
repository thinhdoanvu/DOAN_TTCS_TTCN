@extends('front.layout.master')
@section('title', 'Reset password')

@section('body')

<div class="account section">
	<div class="container">
		<div class="row justify-content-center" style="margin-top: 100px">
			<div class="col-lg-6">
				<div class="login-form border p-5">
					<div class="text-center heading">
						<h3 class="mb-2 h2">Đặt lại mật khẩu</h3>
						<p class="lead">Vui lòng nhập mật khẩu mới và bạn có thể tiến hành đăng nhập lại.</p>
					</div>

					<form action="" method="POST">
                    @csrf
						<div class="form-group mb-4">
							<label for="#">Nhập mật khẩu</label>
							{{-- thông báo --}}
							@if(session('notification'))
								<div class="alert alert-warning" role="alert">
								{{ session('notification')}}
								</div>
							@endif
							<input type="password" class="form-control" id="password" name="password" placeholder="Mật khẩu" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'">
                            <input type="password" class="form-control" id="confirmPassword" name="password_confirmation" placeholder="Nhập lại mật khẩu" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Confirm Password'">
						
                        </div>
            			<button type="submit" value="submit" class="btn btn-main mt-3 btn-block">Đặt lại mật khẩu</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>


@endsection

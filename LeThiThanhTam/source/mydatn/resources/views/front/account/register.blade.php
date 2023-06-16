@extends('front.layout.master')
@section('title','Register')
@section('body')

<div class="account section">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-6">
				<div class="login-form border p-5" style="margin-top: 100px">
					<div class="text-center heading">
						<h2 class="mb-2">Đăng kí</h2>
						
						<p class="lead">Bạn đã có tài khoản? <a href="{{route('login')}}"> Đăng nhập ngay</a></p>
					</div>

          				{{-- thông báo --}}
						@if(session('notification'))
							<div class="alert alert-warning" role="alert">
							{{ session('notification')}}
							</div>
						@endif

						@if ($errors->any())
							<div class="alert alert-danger">
								<ul>
									@foreach ($errors->all() as $error)
										<li>{{ $error }}</li>
									@endforeach
								</ul>
							</div>
						@endif
					<form action="" method="POST">
						@csrf
						<div class="form-group mb-4">
							<label for="#">Họ tên</label>
							<input type="text" name="name" class="form-control" placeholder="Họ tên...">
						</div>
						<div class="form-group mb-4">
							<label for="#">Email</label>
							<input type="email" id="email" name="email" class="form-control" placeholder="xinchao@gmail.com">
							<span class="tb" style="position: absolute;min-width: 0px;height: 23px;top: 489px;color: aquamarine; right: 100px;padding: 0px 20px;background: #2f2f2f"></span>
						</div>
						<div class="form-group mb-4">
							<label for="#">Số điện thoại</label>
							<input type="phone" name="phone" class="form-control" placeholder="Số điện thoại">
						</div>
						{{-- <div class="form-group mb-4">
							<label for="#">Enter username</label>
							<a class="float-right" href="#">Forget password?</a>
							<input type="text" class="form-control" placeholder="Enter Password"> 
						</div> --}}
						<div class="form-group mb-4">
							<label for="">Mật khẩu</label>
							<input type="password" name="password" class="form-control" placeholder="Mật khẩu"> 
						</div>
						<div class="form-group">
							<label for="">Nhập lại mật khẩu</label>
							<input type="password" name="password_confirmation" class="form-control" placeholder="Nhập lại mật khẩu"> 
						</div>

						<button type="submit" value="submit" class="btn btn-main mt-3 btn-block">Đăng kí</button>
						<div class="divider d-flex align-items-center my-4">
							<p class="text-center fw-bold mx-3 mb-0 text-muted">Hoặc</p>
						  </div>
						{{-- <a class="btn btn-primary btn-lg btn-block" style="background-color: #3b5998" href="#!"
							role="button">
							<i class="fab fa-facebook-f me-2"></i>Đăng nhập bằng facebook
						</a> --}}
						<a class="btn btn-primary btn-lg btn-block" style="background-color: #55acee" href="https://accounts.google.com/o/oauth2/auth?client_id=278160199090-olaajbspmjso5cclidgh9o8uajhgp2t3.apps.googleusercontent.com&redirect_uri=http%3A%2F%2Flocalhost%3A8000%2Ftai-khoan%2Flogin%2Fgoogle&scope=openid+profile+email&response_type=code"
							role="button">
							<i class="fab fa-google me-2"></i>Đăng ký bằng gmail</a>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
	const email = document.getElementById('email')
	const alert = document.querySelector('.tb')

	//Biểu thức chính quy cho email
	const patternEmail = /^([A-Za-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/
	function checkText() {
		if(email.value.length == 0) {
			// Chưa nhập email thì tb mất đi
			alert.style.padding = '0'
			// xét nd thông báo trống
			alert.textContent = ''
		} else {
			if(email.value.match(patternEmail)) {
				//đúng định dạng
				alert.style.padding = '0px 10px'
				alert.textContent = 'Email hợp lệ'
				alert.style.color = '#14f0bs'
			} else {
				//không đúng định dạng
				alert.style.padding = '0px 10px'
				alert.textContent = 'Email không hợp lệ'
				alert.style.color = '#f01448'
			}
		}
	}
	email.addEventListener('keyup', () => {
		checkText()
	})

	//Mở ctr lên thì check ngay có j trong email hay chưa
	//Nếu chưa thì đóng tb lại

	checkText()
</script>

@endsection

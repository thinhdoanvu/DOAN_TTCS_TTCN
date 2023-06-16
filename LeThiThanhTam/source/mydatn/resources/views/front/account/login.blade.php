@extends('front.layout.master')
@section('title','Login')
@section('body')

<div class="account section">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-6">
				<div class="login-form border p-5" style="margin-top: 50px">
					<div class="text-center heading">
						<h2 class="mb-2">Đăng nhập</h2>
						{{-- <ul class="pl-0 list-unstyled mb-0">
							<li class="list-inline-item">
								<a class="text-dark" href="#"><i style="font-size: 22px" class="tf-ion-social-facebook"></i></a>
							  </li>
							  <li class="list-inline-item">
								<a class="text-dark" href="https://accounts.google.com/o/oauth2/auth?client_id=278160199090-olaajbspmjso5cclidgh9o8uajhgp2t3.apps.googleusercontent.com&redirect_uri=http%3A%2F%2Flocalhost%3A8000%2Ftai-khoan%2Flogin%2Fgoogle&scope=openid+profile+email&response_type=code"><i style="font-size: 22px" class="tf-ion-social-google"></i></a>
							  </li> --}}
							  {{-- <li class="list-inline-item">
								<a class="text-dark" href="#"><i class="tf-ion-social-pinterest"></i></a>
							  </li> --}}
						{{-- </ul> --}}
						<p class="lead">Bạn chưa có tài khoản? <a href="{{route('register')}}">Đăng kí ngay</a></p>
					</div>

          {{-- thông báo --}}
						@if(session('notification'))
            <div class="alert alert-warning" role="alert">
              {{ session('notification')}}
            </div>
          @endif

					<form method="POST" action="{{route('checkLogin')}}">
						@csrf 
						<div class="form-group mb-4">
							<label for="">Enter username</label>
							<input type="email" id="email" name="email" class="form-control" placeholder="Enter Username">
							<span class="tb" style="position: absolute;min-width: 0px;height: 23px;top: 325px;color: aquamarine; right: 100px;padding: 0px 20px;background: #2f2f2f"></span>
						</div>
						<div class="form-group">
							<label for="">Enter Password</label>
							<a class="float-right" href="{{route('forgot')}}">Quên mật khẩu?</a>
							<input type="password" name="password" class="form-control" placeholder="Enter Password"> 
						</div>

						<button type="submit" value="submit" class="btn btn-main mt-3 btn-block">Đăng nhập</button>
						
						<div class="divider d-flex align-items-center my-4">
							<p class="text-center fw-bold mx-3 mb-0 text-muted">Hoặc</p>
						  </div>
						{{-- <a class="btn btn-primary btn-lg btn-block" style="background-color: #3b5998" href="{{route('login.fb')}}"
							role="button">
							<i class="fab fa-facebook-f me-2"></i>&nbsp;Đăng nhập bằng facebook
						</a> --}}
	
						<a class="btn btn-primary btn-lg btn-block" style="background-color: #55acee" href="https://accounts.google.com/o/oauth2/auth?client_id=278160199090-olaajbspmjso5cclidgh9o8uajhgp2t3.apps.googleusercontent.com&redirect_uri=http%3A%2F%2Flocalhost%3A8000%2Ftai-khoan%2Flogin%2Fgoogle&scope=openid+profile+email&response_type=code"
							role="button">
							<i class="fab fa-google me-2"></i>&nbsp;Đăng nhập bằng gmail</a>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
	const email = document.getElementById('email')
	const alert = document.querySelector('.tb')

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
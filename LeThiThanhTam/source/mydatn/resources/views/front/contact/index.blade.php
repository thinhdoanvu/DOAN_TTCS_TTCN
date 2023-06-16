@extends('front.layout.master')
@section('title','Liên hệ')
@section('body')

<section class="page-header">
	<div class="overly"></div> 	
	<div class="container">
		<div class="row justify-content-center" style="margin-top: 100px">
			<div class="col-lg-6">
				<div class="content text-center">
					<h1 class="mb-3">Liên hệ với chúng tôi</h1>
					<p>ALICE - Tự hào là thương hiệu thời trang Việt Nam mang lại những trải nghiệm mua sắm tốt nhất, giúp bạn thêm hứng khởi, tự tin và yêu bản thân hơn qua mỗi ngày khi được thể hiện cá tính của mình.</p>

				<nav aria-label="breadcrumb">
				  <ol class="breadcrumb bg-transparent justify-content-center">
				    <li class="breadcrumb-item"><a href="/">Trang chủ</a></li>
				    <li class="breadcrumb-item active" aria-current="page">Liên hệ</li>
				  </ol>
				</nav>
				</div>
			</div>
		</div>
	</div>
</section>


<section class="contact-section section" >
	<div class="container">
		<div class="row">
			<!-- Contact Details -->
			<div class="contact-details col-md-6">
				{{-- <h3 class="mb-4">Our Company</h3>
				<p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad quo quia cupiditate, dolore possimus quidem maxime, neque beatae. Fuga maxime quos recusandae ratione earum atque, quam sunt dolorem illum dolor.</p> --}}

				<div class="row">
					<div class="col-lg-6 mb-5 mb-lg-0">
						<h4 class="mb-4">Liên hệ với chúng tôi</h4>
						<ul class="contact-short-info list-unstyled" >
							<li>
								<i class="tf-ion-ios-home mr-3"></i>
								<span>17 Hồng Bàng, Phước Tiến, Nha Trang, Khánh Hòa 650000</span>
							</li>
							<li>
								<i class="tf-ion-android-phone-portrait mr-3"></i>
								<span>0123456789</span>
							</li>
							<li>
								<i class="tf-ion-android-mail mr-3"></i>
								<span>tammuoi2802@gmail.com</span>
							</li>
						</ul>
					</div>

					{{-- <div class="col-lg-6 mb-5 mb-lg-0">
						<h4 class="mb-4">Branch Office</h4>
						<ul class="contact-short-info list-unstyled" >
							<li>
								<i class="tf-ion-ios-home mr-3"></i>
								<span>184 Street Victoria 8007</span>
							</li>
							<li>
								<i class="tf-ion-android-phone-portrait mr-3"></i>
								<span>+880-31-000-000</span>
							</li>
							<li>
								<i class="tf-ion-android-mail mr-3"></i>
								<span>hello@example.com</span>
							</li>
						</ul>
					</div> --}}
				</div>
			</div>
			<!-- Contact Form -->
			{{-- <div class="contact-form col-lg-6 " >
				<h3 class="mb-4">Send us an Email:</h3>
				
				<form id="contact-form" method="post" action="#" >
					<div class="row">
						<div class="col-lg-6">
							<div class="form-group">
								<input type="text" placeholder="Your Name" class="form-control" name="name" id="name">
							</div>
						</div>

						<div class="col-lg-6">
							<div class="form-group">
								<input type="email" placeholder="Your Email" class="form-control" name="email" id="email">
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-lg-6">
							<div class="form-group">
								<input type="text" placeholder="Subject" class="form-control" name="subject" id="subject">
							</div>
						</div>

						<div class="col-lg-6">
							<div class="form-group">
								<input type="text" placeholder="Phone" class="form-control" name="Phone" id="phone">
							</div>
						</div>
					</div>
					
					<div class="form-group">
						<textarea rows="6" placeholder="Message" class="form-control" name="message" id="message"></textarea>	
					</div>
					
					<div class="mt-4">
						<input type="submit" id="contact-submit" class="btn btn-black btn-small" value="Send Message">
					</div>						
				</form>
			</div> --}}
			<!-- ./End Contact Form -->
		</div> <!-- end row -->
	</div> <!-- end container -->
</section>
	
<div class="google-map">
	<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3899.0863602578006!2d109.18501747498034!3d12.242431688009894!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31705d47ddabced7%3A0xf6c3703ee3bf9d19!2sShop%20ALICE!5e0!3m2!1svi!2s!4v1682840286309!5m2!1svi!2s" width="100%" height="560px" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</div>


@endsection
@extends('front.layout.master')
@section('title', 'Checkout')

@section('body')

<section class="page-header">
	<div class="overly"></div> 	
	<div class="container">
		<div class="row justify-content-center" style="margin-top: 100px">
			<div class="col-lg-6">
				<div class="content text-center">
					<h1 class="mb-3">Lỗi</h1>

				<nav aria-label="breadcrumb">
				  <ol class="breadcrumb bg-transparent justify-content-center">
				    <li class="breadcrumb-item"><a href="/">Trang chủ</a></li>
				    <li class="breadcrumb-item active" aria-current="page">Lỗi thanh toán.</li>
				  </ol>
				</nav>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="cart_area">
    <div class="container">
        <div class="cart_inner">
          
                <h4 style="text-align: center">Thanh toán không thành công!!</h4>
          
        </div>
    </div>
</section>

@endsection
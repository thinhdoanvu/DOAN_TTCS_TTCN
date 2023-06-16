@php
    use App\Models\Setting ;
    $item = Setting::where('key','general')->firstOrFail()->toArray(); 
    $result = json_decode($item['value'], true);
@endphp
@extends('front.layout.master')
@section('title', 'Home')

@section('body')
<div class="main-slider slider">
	<div class="slider-item " style="background-image:url('front/images/slider/slideshow1-2.jpg')">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-12 offset-lg-6 offset-md-6">
					<div class="slider-caption">
						<span class="lead">Giảm Giá Bộ Sưu Tập Mùa Đông </span>
						<h1 class="mt-2 mb-5"><span class="text-color">Giảm giá </span>cực sốc</h1>
						<a href="{{route('shopIndex')}}" class="btn btn-main">Mua ngay</a>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="slider-item" style="background-image:url('front/images/slider/slideshow1-3.jpg')">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-12 offset-lg-6 offset-md-6">
					<div class="slider-caption">
						<span class="lead">Giảm giá</span>
						<h1 class="mt-2 mb-5"><span class="text-color">Phong cách</span> Cổ điển</h1>
						<a href="{{route('shopIndex')}}" class="btn btn-main">Mua ngay</a>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="slider-item" style="background-image:url('front/images/slider/slideshow1-1.jpg'); background-position:50%;background-repeat:no-repeat;">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-12 offset-lg-6 offset-md-6">
					<div class="slider-caption">
						<span class="lead">Váy hợp thời trang</span>
						<h1 class="mt-2 mb-5"><span class="text-color">Bộ sưu tập </span>thời trang</h1>
						<a href="{{route('shopIndex')}}" class="btn btn-main">Mua ngay</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


{{-- <section class="category section pt-3 pb-0">
	<div class="container">
		<div class="row">
			<div class="col-lg-4 col-sm-12 col-md-6">
				<div class="cat-item mb-4 mb-lg-0">
					<img src="front/images/about/cat-1.jpg" alt="" class="img-fluid">
					<div class="item-info">
						<p class="mb-0">Stylish Leather watch</p>
						<h4 class="mb-4">up to <strong>50% </strong>off</h4>

						<a href="#" class="read-more">Shop now</a>
					</div>
				</div>
			</div>

			<div class="col-lg-4 col-sm-12 col-md-6">
				<div class="cat-item mb-4 mb-lg-0">
					<img src="front/images/about/cat-2.jpg" alt="" class="img-fluid">

					<div class="item-info">
						<p class="mb-0">Ladies hand bag</p>
						<h4 class="mb-4">up to <strong>40% </strong>off</h4>

						<a href="#" class="read-more">Shop now</a>
					</div>
				</div>
			</div>

			<div class="col-lg-4 col-sm-12 col-md-6">
				<div class="cat-item">
					<img src="front/images/about/cat-3.jpg" alt="" class="img-fluid">
					<div class="item-info">
						<p class="mb-0">Trendy shoe</p>
						<h4 class="mb-4">up to <strong>50% </strong>off</h4>

						<a href="#" class="read-more">Shop now</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section> --}}

<section class="section products-main">
  <div class="container">
  	  <div class="row justify-content-center">
			<div class="col-lg-8">
				<div class="title text-center">
					<h2>Top sản phẩm HOT</h2>
					<p>Những sản phẩm thời trang mới nhất/Hot nhất</p>
				</div>
			</div>
		</div>


    <div class="row">

		@foreach($newProducts as $newproduct)
		<div class="col-lg-3 col-12 col-md-6 col-sm-6 mb-5" >
			<div class="product">
				<div class="product-wrap">
					<a href="{{route('showProduct',['productName' => Str::slug($newproduct->name), 'id' => $newproduct->id])}}"><img style="width: 255px; height: 340px;" class="img-fluid w-100 mb-3 img-first" src="front/images/shop/products/{{$newproduct->productImages[0]->path ?? ''}}" alt="product-img" /></a>
					<a href="{{route('showProduct',['productName' => Str::slug($newproduct->name), 'id' => $newproduct->id])}}"><img style="width: 255px; height: 340px;" class="img-fluid w-100 mb-3 img-second" src="front/images/shop/products/{{$newproduct->productImages[1]->path ?? ''}}" alt="product-img" /></a>
				</div>
			
				@if($newproduct->discount != null)
				
					@if(strtotime($newproduct->date_end) >= strtotime($today))
						<span class="onsale">Giảm {{number_format((($newproduct->price - $newproduct->discount)/$newproduct->price)*100)}}%</span>
						@elseif(strtotime($newproduct->created_at) >= strtotime($days_ago))
							<span class="onsale">Mới</span>
					@endif
				@elseif(strtotime($newproduct->created_at) >= strtotime($days_ago))
					<span class="onsale">Mới</span>
				@endif
				
				{{-- <div class="product-hover-overlay">
						<button><i style="cursor: pointer" data-size="{{$newproduct->getDefaultSize()}}" data-color="{{$newproduct->getDefaultColor()}}" data-id="{{ $newproduct->id }}" class="tf-ion-android-cart btn-buy"></i></button>
				</div> --}}
				{{-- <div class="product-hover-overlay">
					<button><i data-size="{{$newproduct->getDefaultSize()}}" data-color="{{$newproduct->getDefaultColor()}}" data-id="{{ $newproduct->id }}" class="tf-ion-android-cart btn-buy"></i></button> --}}
					{{-- <button><i data-size="{{$newproduct->getDefaultSize()}}" data-color="{{$newproduct->getDefaultColor()}}" data-id="{{ $newproduct->id }}" class="ti-shopping-cart btn-buy"></i></button> --}}
					{{-- <button><i class="tf-ion-ios-heart"></i></button>
				</div> --}}

				<div class="product-info">
					<h2 class="product-title h5 mb-0"><a href="{{route('showProduct',['productName' => Str::slug($newproduct->name), 'id' => $newproduct->id])}}">{{$newproduct->name}}</a></h2>
					<span class="price">
						@if($newproduct->discount != null)
							@if(strtotime($newproduct->date_end) >= strtotime($today))
								{{number_format($newproduct->discount)}} VND
								<span><del style="color: #555555;">{{number_format($newproduct->price)}} VND</del></span>
								@else
								{{number_format($newproduct->price)}} VND
								@endif
						@else
							{{number_format($newproduct->price)}} VND
						@endif
					</span>
				</div>
			</div>
		</div>
		@endforeach

		@foreach($bestSellerPro as $bestSellerProduct)
		<div class="col-lg-3 col-12 col-md-6 col-sm-6 mb-5" >
			<div class="product">
				<div class="product-wrap">
					<a href="{{route('showProduct',['productName' => Str::slug($bestSellerProduct->name), 'id' => $bestSellerProduct->id])}}"><img style="width: 255px; height: 340px;" class="img-fluid w-100 mb-3 img-first" src="front/images/shop/products/{{$bestSellerProduct->productImages[0]->path ?? ''}}" alt="product-img" /></a>
					<a href="{{route('showProduct',['productName' => Str::slug($bestSellerProduct->name), 'id' => $bestSellerProduct->id])}}"><img style="width: 255px; height: 340px;" class="img-fluid w-100 mb-3 img-second" src="front/images/shop/products/{{$bestSellerProduct->productImages[1]->path ?? ''}}" alt="product-img" /></a>
				</div>

				@if($bestSellerProduct->discount != null)
					@if(strtotime($bestSellerProduct->date_end) >= strtotime($today))
						<span class="onsale">Giảm {{number_format((($bestSellerProduct->price - $bestSellerProduct->discount)/$bestSellerProduct->price)*100)}}%</span>
						@else
							<span class="onsale">Hot</span>
					@endif
				@else
					<span class="onsale">Hot</span>
				@endif
				<div class="product-info">
					<h2 class="product-title h5 mb-0"><a href="{{route('showProduct',['productName' => Str::slug($bestSellerProduct->name), 'id' => $bestSellerProduct->id])}}">{{$bestSellerProduct->name}}</a></h2>
					<span class="price">
						@if($bestSellerProduct->discount != null)
							@if(strtotime($bestSellerProduct->date_end) >= strtotime($today))
								{{number_format($bestSellerProduct->discount)}} VND
								<span><del style="color: #555555;">{{number_format($bestSellerProduct->price)}} VND</del></span>
								@else
								{{number_format($bestSellerProduct->price)}} VND
								@endif
						@else
							{{number_format($bestSellerProduct->price)}} VND
						@endif
					</span>
				</div>
			</div>
		</div>
		@endforeach

  </div>
</section>
<!-- /portfolio -->




<section class="ads section">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-lg-6 offset-lg-6">
				<div class="slider-caption">
					<span class="h5 deal">Ưu đãi trong ngày Giảm đến 30%</span>
					<h2 class="mt-3 text-white">Bộ đồ hợp thời trang</h2>
					<p class="text-md mt-3 text-white">Nhanh lên! Ưu đãi trong thời gian có hạn. Hãy lấy ngay bây giờ!</p>
					<!-- syo-timer -->
					<a href="{{route('shopIndex')}}" class="btn btn-main"><i class="ti-bag mr-2"></i>Mua ngay </a>
				</div>
			</div>
		</div>
	</div>
</section>



{{-- <section class="section products-list">
	<div class="container">
		<div class="row">
			<div class="col-lg-4 col-sm-12 col-md-12">
			    <img src="front/images/shop/widget/adsv.jpg" alt="Product big thumb"  class="img-fluid w-100">
			</div>

			<div class="col-lg-4 col-sm-6 col-md-6">
				<div class="widget-featured-entries mt-5 mt-lg-0">
					<h4 class="mb-4 pb-3">Sản phẩm bán chạy</h4>

					@foreach($bestSellerProducts as $bestSellerProduct)
		            <div class="media mb-3">
		            	<a class="featured-entry-thumb" href="{{route('showProduct',['productName' => Str::slug($bestSellerProduct->name), 'id' => $bestSellerProduct->id])}}">
			            	<img src="front/images/shop/products/{{$bestSellerProduct->productImages[0]->path ?? ''}}" alt="Product thumb" width="64" class="img-fluid mr-3">
			            </a>
		              <div class="media-body">
		                <h6 class="featured-entry-title mb-0"><a href="{{route('showProduct',['productName' => Str::slug($bestSellerProduct->name), 'id' => $bestSellerProduct->id])}}">{{$bestSellerProduct->name}}</a></h6>
		                <p class="featured-entry-meta">
							@if($bestSellerProduct->discount != null)
								@if(strtotime($bestSellerProduct->date_end) >= strtotime($today))
									{{number_format($bestSellerProduct->discount)}} VND
									<span><del style="color: #555555;">{{number_format($bestSellerProduct->price)}} VND</del></span>
								@else
									{{number_format($bestSellerProduct->price)}} VND
								@endif
							@else
								{{number_format($bestSellerProduct->price)}} VND
							@endif
						</p>
		              </div>
		            </div>
					@endforeach
		         
				</div>
			</div>


			<div class="col-lg-4 col-sm-6 col-md-6">
				<div class="widget-featured-entries mt-5 mt-lg-0">
					<h4 class="mb-4 pb-3">Sản phẩm mới</h4>

					@foreach($newPro as $newproduct)
		            <div class="media mb-3">
		            	<a class="featured-entry-thumb" href="{{route('showProduct',['productName' => Str::slug($newproduct->name), 'id' => $newproduct->id])}}">
			            	<img src="front/images/shop/products/{{$newproduct->productImages[0]->path ?? ''}}" alt="Product thumb" width="64" class="img-fluid mr-3">
			            </a>
		              <div class="media-body">
		                <h6 class="featured-entry-title mb-0"><a href="{{route('showProduct',['productName' => Str::slug($newproduct->name), 'id' => $newproduct->id])}}">{{$newproduct->name}}</a></h6>
		                <p class="featured-entry-meta">
							@if($newproduct->discount != null)
								@if(strtotime($newproduct->date_end) >= strtotime($today))
									{{number_format($newproduct->discount)}} VND
									<span><del style="color: #555555;">{{number_format($newproduct->price)}} VND</del></span>
								@else
									{{number_format($newproduct->price)}} VND
								@endif
							@else
								{{number_format($newproduct->price)}} VND
							@endif
						</p>
		              </div>
		            </div>
					@endforeach
				</div>
			</div>
			
		</div>
	</div>
</section> --}}

<div class="section border-top">
	<div class="container">
		<div class="row">
			
			@foreach($blogs as $blog)
			<div class="col-md-4 mb-4">
				<article class="post">
					<a href="{{route('showBlog',['blogName' => Str::slug($blog->title), 'id' => $blog->id])}}">
						<img class="img-fluid mb-4 blogHome" style="height: 360px, width:540px" src="front/img/blog/{{ $blog->image }}" alt="">
					</a>
					<span>{{$blog->blogCategory->name}}</span>
					<h3><a class="text-dark" href="{{route('showBlog',['blogName' => Str::slug($blog->title), 'id' => $blog->id])}}" style="overflow: hidden;
						text-overflow: ellipsis;
						-webkit-line-clamp: 2;
						display: -webkit-box;
						-webkit-box-orient: vertical;">{{ $blog->title }}</a></h3>
					<div class="post-meta">
						<ul class="list-inline">
							<li class="list-inline-item"><span style="color:#fb5c42">Admin</span></li>
							<li class="list-inline-item">{{ date('M d, Y', strtotime($blog->created_at)) }}</li>
              				<li class="list-inline-item"><span style="color:#fb5c42">{{ count($blog->blogComments) }} bình luận</span></li>
							<li class="list-inline-item"><span style="color:#fb5c42">{{ $blog->blog_view ?? 0 }} lượt xem</span></li>
						</ul>
					</div>
					<div class="post-content" style="overflow: hidden;
					text-overflow: ellipsis;
					-webkit-line-clamp: 3;
					display: -webkit-box;
					-webkit-box-orient: vertical;">
						<p>
							{!! $blog->content !!}
						</p>
					</div>
					<div class="post-content">
						<a href="{{route('showBlog',['blogName' => Str::slug($blog->title), 'id' => $blog->id])}}" class="read-more text-primary">Đọc tin ngay</a>
					</div>
				</article>
			</div>
			@endforeach
		
			<div class="col-12 mt-5">
				<nav aria-label="Page navigation" >
					{{-- x	{{$blogs->links()}} --}}
				</nav>
			</div>
		</div>
	</div>
</div>

<section class="features border-top">
	<div class="container">
		<div class="row">
			<div class="col-lg-3 col-sm-6 col-md-6">
				<div class="feature-block">
					<i class="tf-ion-android-bicycle"></i>
					<div class="content">
						<h5>Miễn phí giao hàng</h5>
						<p>FREESHIP các đơn hàng từ 300.000 VND (khu vực TP.Nha Trang). Giao hàng toàn quốc.</p>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-sm-6 col-md-6">
				<div class="feature-block">
					<i class="tf-wallet"></i>
					<div class="content">
						<h5>Miễn phí đổi/trả hàng 30 ngày</h5>
						<p>Miễn phí đổi/trả hàng 30 ngày. Khách hàng hoàn toàn an tâm khi mua sắm</p>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-sm-6 col-md-6">
				<div class="feature-block">
					<i class="tf-key"></i>
					<div class="content">
						<h5>Thanh toán an toàn</h5>
						<p>Thanh toán linh hoạt: Tiền mặt khi nhận hàng, Cổng thanh toán VNPay</p>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-sm-6 col-md-6">
				<div class="feature-block">
					<i class="tf-clock"></i>
					<div class="content">
						<h5>Hotline mua hàng</h5>
						<p>Liên hệ tư vấn và mua hàng {{$result['phone1']}} hoặc email {{$result['email1']}} Thứ 2 - Chủ nhật (8h -20h)</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

@endsection
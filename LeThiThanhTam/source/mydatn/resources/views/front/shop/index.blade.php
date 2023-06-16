@extends('front.layout.master')
@section('title', 'Shop')

@section('body')

<section class="page-header">
	<div class="overly"></div> 	
	<div class="container">
		<div class="row justify-content-center" style="margin-top: 100px">
			<div class="col-lg-6">
				<div class="content text-center">
					<h1 class="mb-3">Sản phẩm</h1>
					<p>ALICE - Tự hào là thương hiệu thời trang Việt Nam mang lại những trải nghiệm mua sắm tốt nhất, giúp bạn thêm hứng khởi, tự tin và yêu bản thân hơn qua mỗi ngày khi được thể hiện cá tính của mình.</p>

				<nav aria-label="breadcrumb">
				  <ol class="breadcrumb bg-transparent justify-content-center">
				    <li class="breadcrumb-item"><a href="/">Trang chủ</a></li>
				    <li class="breadcrumb-item active" aria-current="page">Sản phẩm</li>
				  </ol>
				</nav>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="products-shop section">
	<div class="container">
		<div class="row">
			<div class="col-md-9">
				<div class="row align-items-center">
					<div class="col-lg-12 mb-4 mb-lg-0">
						<div class="section-title">
								<h2 class="d-block text-left-sm">Sản phẩm</h2>

								<div class="heading d-flex justify-content-between mb-5">
									<p class="result-count mb-0"> 
										<form class="form-inline mr-auto" action="san-pham">
											<input class="form-control mr-sm-2" name="search" id="search" type="text" placeholder="Tìm kiếm sản phẩm" aria-label="Search" value="">
											<button class="btn btn-outline-success btn-rounded btn-sm my-0 search" type="button">Tìm kiếm</button>
										  </form>
									</p>
									<form class="ordering " >
											<select name="sort_by" id="sort_by" class="orderby form-control" aria-label="Shop order" >
												<option {{ request('sort_by') == 'latest' ? 'selected' : '' }} value="latest">Mới nhất</option>
												<option {{ request('sort_by') == 'oldest' ? 'selected' : '' }} value="oldest">Cũ Nhất</option>
												<option {{ request('sort_by') == 'name-ascending' ? 'selected' : '' }} value="name-ascending">Tên A-Z</option>
												<option {{ request('sort_by') == 'name-descending' ? 'selected' : '' }} value="name-descending">Tên Z-A</option>
												<option {{ request('sort_by') == 'price-ascending' ? 'selected' : '' }} value="price-ascending">Giá tăng dần</option>
												<option {{ request('sort_by') == 'price-descending' ? 'selected' : '' }} value="price-descending">Giá giảm dần</option>
											</select>
											<input type="hidden" name="paged" value="1">
											<input type="hidden" id="category_id" value="{{$category_id ?? ''}}">
									</form>
									
								</div>
						</div>
					</div>
				</div>

				<div id="list-product" class="row">
					
					
				</div>				
			</div>
			<div class="col-md-3">
				<!-- categories -->
<section class="widget widget-categories mb-5">
	<h3 class="widget-title h4 mb-4">Danh mục</h3>
	<form action="" method="get">
		<ul>
			@foreach($categories as $category)
			<li class="has-children"><a href="{{route('categoryProduct',['categoryName' => $category->slug])}}">{{$category->name}}</a><span></span>
				@if($category->chils)
					@foreach($category->chils as $chil)
					<ul>
						<li><a href="{{route('categoryProduct',['categoryName' => $chil->slug])}}">{{$chil->name}}</a><span></span></li>
					</ul>
					@endforeach
				@endif
			</li>
			@endforeach
		</ul>
	</form>
</section>


<!-- color and size -->
<form action=""  class="mb-5">

	<!-- price range -->
	<section id="#" class="widget widget_price_filter mb-5">
		<h3 class="widget-title h4 mb-4">Lọc theo giá</h3>
		<div class="price_slider_wrapper">
			<form id="formTest">
			<div class="price_slider_amount" id="sort_price" data-step="10">
				<input class="range-track price" type="text" data-slider-min="0" data-slider-max="1000000" data-slider-step="10"
					data-slider-value="[0,300000]" />
				<input type="hidden" name="start_price" id="start_price" />
				<input type="hidden" name="end_price" id="end_price" />
				<div class="price_label mb-3">
					Giá: <span class="value">0đ - 300000đ</span>
				</div>
				<button type="button" id="filter_price" name="filter_price" class="btn btn-black btn-small filter_price" value="Lọc giá">Lọc</button>
			</div>
			</form>
		</div>
	</section>
	<!-- color -->
	<section class="widget widget-colors mb-5">
		<h3 class="widget-title h4 mb-4">Lọc theo màu sắc</h3>
		<ul class="list-inline" id="sort_color">
			<li class="list-inline-item mr-4" >
				<div class="custom-control custom-checkbox color-checkbox">
					<input type="checkbox" class="custom-control-input color" id="color1"
						name="color" value="blue"  
						{{ request('color') == 'blue' ? 'checked' : ''}}>
					<label class="custom-control-label sky-blue" for="color1"></label>
				</div>
			</li>
			<li class="list-inline-item mr-4">
				<div class="custom-control custom-checkbox color-checkbox ">
					<input type="checkbox" class="custom-control-input color" id="color2" 
					name="color" value="red" 
						{{ request('color') == 'red' ? 'checked' : ''}}>
					<label class="custom-control-label red" for="color2"></label>
				</div>
			</li>
			<li class="list-inline-item mr-4">
				<div class="custom-control custom-checkbox color-checkbox ">
					<input type="checkbox" class="custom-control-input color" id="color3"
					name="color" value="black" 
						{{ request('color') == 'black' ? 'checked' : ''}}>
					<label class="custom-control-label dark" for="color3"></label>
				</div>
			</li>
			<li class="list-inline-item mr-4">
				<div class="custom-control custom-checkbox color-checkbox">
					<input type="checkbox" class="custom-control-input color" id="color4"
					name="color" value="brown" 
						{{ request('color') == 'brown' ? 'checked' : ''}}>
					<label class="custom-control-label magenta" for="color4"></label>
				</div>
			</li>
			<li class="list-inline-item mr-4">
				<div class="custom-control custom-checkbox color-checkbox">
					<input type="checkbox" class="custom-control-input color" id="color5"
					name="color" value="yellow"
						{{ request('color') == 'yellow' ? 'checked' : ''}}>
					<label class="custom-control-label yellow" for="color5"></label>
				</div>
			</li>
		</ul>
	</section>

	<!-- size -->
	<section class="widget widget-sizes mb-5" >
		<h3 class="widget-title h4 mb-4">Lọc theo kích cỡ</h3>
		<div id="sort_size">
		<div class="custom-control custom-checkbox" id="sort_size">
			<input type="checkbox" class="custom-control-input size" id="l-size" 
			name="size" value="l"
			{{ request('size') == 'l' ? 'checked' : ''}}>
			<label class="custom-control-label" for="l-size">L</label>
		</div>
		<div class="custom-control custom-checkbox">
			<input type="checkbox" class="custom-control-input size" id="xl-size"
			name="size" value="xl"
			{{ request('size') == 'xl' ? 'checked' : ''}}>
			<label class="custom-control-label" for="xl-size">XL</label>
		</div>
		<div class="custom-control custom-checkbox">
			<input type="checkbox" class="custom-control-input size" id="m-size"
			name="size" value="m"
			{{ request('size') == 'm' ? 'checked' : ''}}>
			<label class="custom-control-label" for="m-size">M</label>
		</div>
		<div class="custom-control custom-checkbox">
			<input type="checkbox" class="custom-control-input size" id="s-size"
			name="size" value="s"
			{{ request('size') == 's' ? 'checked' : ''}}>
			<label class="custom-control-label" for="s-size">S</label>
		</div>
		<div class="custom-control custom-checkbox">
			<input type="checkbox" class="custom-control-input size" id="xs-size"
			name="size" value="xs"
			{{ request('size') == 'xs' ? 'checked' : ''}}>
			<label class="custom-control-label" for="xs-size">XS</label>
		</div>
		</div>
	</section>

	{{-- <button type="submit" class="btn btn-black btn-small">Filter</button> --}}
</form>

			<!-- popular product -->
			<section class="widget widget-popular mb-5">
				<h3 class="widget-title mb-4 h4">Sản phẩm phổ biến</h3>
				@foreach($bestSellerProducts as $bestSellerProduct)
				<a class="popular-products-item media" href="{{route('showProduct',['productName' => Str::slug($bestSellerProduct->name), 'id' => $bestSellerProduct->id])}}">
					<img src="front/images/shop/products/{{$bestSellerProduct->productImages[0]->path ?? ''}}" alt="" class="img-fluid mr-4">
					<div class="media-body">
						<h6>{{$bestSellerProduct->name}} <br>Backpack</h6>
						<span class="price">
							@if($bestSellerProduct->discount != null)
							{{number_format($bestSellerProduct->discount)}} VND
							<span style="color: #555555;"><del>{{number_format($bestSellerProduct->price)}} VND</del></span>
							@else
							{{number_format($bestSellerProduct->price)}} VND
							@endif
						</span>
					</div>
				</a>
				@endforeach
			</section>
			</div>
		</div>
	</div>
</section>
<script>
	var flag = 0;
	$(document).ready(function() {
		getListProduct(1,0);
    });

	$('.color').click(function() {
        getListProduct(1,flag);
    })

	$('.size').click(function() {
        getListProduct(1,flag);
    })

	$('#sort_by').on('change', function() {
		getListProduct(1,flag);
	})

	$('.filter_price').click(function() {
		flag = 1;
		console.log(flag);
		getListProduct(1,flag);
	})

	$('.search').click(function() {
		flag = 1;
		console.log(flag);
		getListProduct(1,flag);
	})
	

	function getListProduct(page = 1, flag = 0){
		var colors = [];
		$('#sort_color input:checked').each(function() {
			colors.push($(this).val());
		});
		var sizes = [];
		$('#sort_size input:checked').each(function() {
			sizes.push($(this).val());
		});
		var sort_by = $("#sort_by option:selected").val();
		console.log(sort_by);

		var search = $("#search").val();
		var category_id = $("#category_id").val();

		if(flag == 1){
			var start_price = $("#start_price").val();
			var end_price = $("#end_price").val();
			var sort_by = $("#sort_by option:selected").val();
			var search = $("#search").val();
			console.log(start_price);
			console.log(end_price);
		}
		
		$.ajax({
            url:"{{ route('shop.load') }}",
            method:'POST',
            data:{
                "_token": "{{ csrf_token() }}",
                page:page,
				flag:flag,
                colors:colors,
				sizes:sizes,
				sort_by:sort_by,
				start_price:start_price,
				end_price:end_price,
				search:search,
				category_id:category_id,
            },
            success:function(data){
                $('#list-product').html(data); 
            },
            complete: function(data) {
                
            }
        })
	}
	$(document).on('click','.pagination a', function(event){
            event.preventDefault();
            let page = $(this).attr('href').split('page=')[1];
            getListProduct(page,flag);
    });
	
	
	
</script>
@endsection




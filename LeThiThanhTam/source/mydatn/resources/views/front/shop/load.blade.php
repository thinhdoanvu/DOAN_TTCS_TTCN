@if (count($products)>0)
@foreach($products as $product)
					<div class="col-lg-4 col-12 col-md-6 col-sm-6 mb-5" >
						<div class="product">
							<div class="product-wrap">
								<a href="{{route('showProduct',['id' => $product->id, 'productName' => Str::slug($product->name)])}}"><img class="img-fluid w-100 mb-3 img-first" style="width: 255px; height: 340px;" src="front/images/shop/products/{{$product->productImages[0]->path ?? ''}}" alt="product-img" /></a>
								<a href="{{route('showProduct',['id' => $product->id, 'productName' => Str::slug($product->name)])}}"><img class="img-fluid w-100 mb-3 img-second" style="width: 255px; height: 340px;" src="front/images/shop/products/{{$product->productImages[1]->path ?? ''}}" alt="product-img" /></a>
							</div>

							@if($product->discount != null)
								@if(strtotime($product->date_end) >= strtotime($today))
									<span class="onsale">Giảm {{number_format((($product->price - $product->discount)/$product->price)*100)}}%</span>
								@endif
							@endif
				
							{{-- <div class="product-hover-overlay">
								<button><i style="cursor: pointer" data-size="{{$product->getDefaultSize()}}" data-color="{{$product->getDefaultColor()}}" data-id="{{ $product->id }}" class="tf-ion-android-cart btn-buy"></i></button>
							</div> --}}
							{{-- <div class="product-hover-overlay">
								<button style="cursor: pointer"><i style="cursor: pointer" data-size="{{$product->getDefaultSize()}}" data-color="{{$product->getDefaultColor()}}" data-id="{{ $product->id }}" id="btn-buy" class="tf-ion-android-cart btn-buy"></i></button>
								<button><i class="tf-ion-ios-heart"></i></button>
							</div> --}}

							<div class="product-info">
								<h2 class="product-title h5 mb-0"><a href="{{route('showProduct',['productName' => Str::slug($product->name), 'id' => $product->id])}}">{{$product->name}}</a></h2>
								<span class="price">
									@if($product->discount != null)
										@if(strtotime($product->date_end) >= strtotime($today))
											{{number_format($product->discount)}} VND
											<span><del style="color: #555555;">{{number_format($product->price)}} VND</del></span>
										@else
											{{number_format($product->price)}} VND
										@endif
									@else
										{{number_format($product->price)}} VND
									@endif
				 
								</span>
							</div>
						</div>
					</div>
					@endforeach
					<div class="pagination">
						{{ $products->links() }}
					</div>
						
@endif
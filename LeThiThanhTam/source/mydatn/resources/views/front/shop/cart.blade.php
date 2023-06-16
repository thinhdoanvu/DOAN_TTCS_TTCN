@extends('front.layout.master')
@section('title','Cart')
@section('body')
<section class="page-header">
	<div class="overly"></div> 	
	<div class="container">
		<div class="row justify-content-center" style="margin-top: 100px">
			<div class="col-lg-6">
				<div class="content text-center">
					<h1 class="mb-3">Giỏ hàng</h1>
					<p>ALICE - Tự hào là thương hiệu thời trang Việt Nam mang lại những trải nghiệm mua sắm tốt nhất, giúp bạn thêm hứng khởi, tự tin và yêu bản thân hơn qua mỗi ngày khi được thể hiện cá tính của mình.</p>

				<nav aria-label="breadcrumb">
				  <ol class="breadcrumb bg-transparent justify-content-center">
				    <li class="breadcrumb-item"><a href="index.html">Trang chủ</a></li>
				    <li class="breadcrumb-item active" aria-current="page">Giỏ hàng</li>
				  </ol>
				</nav>
				</div>
			</div>
		</div>
	</div>
</section>



  <section class="cart shopping page-wrapper">
    <div class="container">
      @if(Cart::count() > 0)
      <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="product-list">
              <form class="cart-form" action="" method="post" enctype="multipart/form-data">
                  <table class="table shop_table shop_table_responsive cart" cellspacing="0">
                      <thead>
                        <tr>
                            <th class="product-thumbnail">&nbsp;</th>
                            <th class="product-name">Sản phẩm</th>
                            <th class="product-price">Giá</th>
                            <th class="product-quantity">Số lượng</th>
                            <th class="product-subtotal">Tổng tiền</th>
                            <th class="product-remove">&nbsp;</th>
                        </tr>
                      </thead>

                      <tbody>
                        @foreach($carts as $cart)
                        <tr id="rowCart-{{ $cart->rowId }}" class="cart_item">

                            <td class="product-thumbnail" data-title="Thumbnail">
                                <img src="front/images/shop/products/{{$cart->options->images[0]->path ?? ''}}" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="">
                            </td>

                            <td class="product-name" data-title="Product">
                              <p>{{$cart->name}} - {{$cart->options->color}} - {{$cart->options->size}}</p>
                            </td>

                            <td class="product-price" data-title="Price">
                                <span class="amount"><span class="currencySymbol">{{ number_format($cart->price) }} đ</span>
                            </td>

                            
                            <td class="product-quantity" data-title="Quantity">
                                <div class="quantity">
                                    <label class="sr-only" >Quantity</label>
                                    <input type="number" data-rowid="{{ $cart->rowId }}" value="{{ $cart->qty }}" class="input-text qty text upQty" step="1" min="1" title="Qty" >
                                  </div>
                                  {{-- <div class="quantity">
                                    <div class="pro-qty">
                                      <input type="text" value="{{ $cart->qty }}" data-rowid="{{ $cart->rowId }}">
                                    </div>
                                  </div> --}}
                            </td>
                            <td class="product-subtotal">
                                <span class="amount">
                                  <span id="totalProduct-{{ $cart->rowId }}" class="currencySymbol">{{ number_format($cart->price * $cart->qty) }} đ</span>
                            </td>
                            <td style="width: 80px;text-align: center" class="product-remove close-td first-row" data-title="Remove">
                              {{-- <a href="#" class="remove ti-close detele-product" aria-label="Remove this item" data-rowid="{{ $cart->rowId }}" >×</a> --}}
                              <p style="color: orange" data-rowid="{{ $cart->rowId }}" class="remove ti-close detele-product">X</p>          
                            </td>
                        </tr>
                        @endforeach
                       
                      </tbody>
                  </table>
              </form>
          </div>
        </div>


        {{-- <div class="col-lg-12">
          <div class="product-list">
            <form action="{{route('checkCoupon')}}" method="POST" enctype="multipart/form-data">
              @csrf
              
              <div class="coupon">
                @if(session('notification'))
                  <div class="alert alert-warning" role="alert">
                  {{ session('notification')}}
                  </div>
                @endif
                <input type="text" name="code" class="input-text form-control" id="code" value="" placeholder="Coupon code"> 

                <button type="submit" class="btn btn-black btn-small code" name="apply_coupon" value="Apply coupon">Apply coupon</button>
              </div>
            </form>
          </div>
        </div> --}}
      </div>

        <div class="row justify-content-end">
          <div class="col-lg-4">
            <div class="cart-info card p-4 mt-4">
                <h4 class="mb-4">Tổng giỏ hàng</h4>

                <ul class="list-unstyled mb-4">
                  <li class="d-flex justify-content-between pb-2 mb-3">
                    <h5>Tổng tiền</h5>
                    <span id="subtotal">{{number_format($subtotal)}} đ</span>
                  </li>

                   {{-- <li class="d-flex justify-content-between pb-2 mb-3">
                    <h5>Shipping</h5>
                    <span>Free</span>
                  </li> --}}
 
                </ul>
                <a href="{{route('checkout')}}" class="btn btn-main btn-small">Tiến hành đặt hàng</a>
            </div>
          </div>
        </div>
        @else
          <h4 style="text-align: center">Không có sản phẩm trong giỏ hàng!!</h4>
        @endif
      </div>
  </section>


@endsection
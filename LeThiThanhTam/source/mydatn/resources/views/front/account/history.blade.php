@extends('front.layout.master')
@section('title', 'History')

@section('body')

<section class="page-header">
	<div class="overly"></div> 	
	<div class="container">
		<div class="row justify-content-center" style="margin-top: 100px">
			<div class="col-lg-6">
				<div class="content text-center">
					<h1 class="mb-3">Lịch sử mua hàng</h1>
					<p>ALICE - Tự hào là thương hiệu thời trang Việt Nam mang lại những trải nghiệm mua sắm tốt nhất, giúp bạn thêm hứng khởi, tự tin và yêu bản thân hơn qua mỗi ngày khi được thể hiện cá tính của mình.</p>

				<nav aria-label="breadcrumb">
				  <ol class="breadcrumb bg-transparent justify-content-center">
				    <li class="breadcrumb-item"><a href="/">Trang chủ</a></li>
				    <li class="breadcrumb-item active" aria-current="page">Lịch sử mua hàng</li>
				  </ol>
				</nav>
				</div>
			</div>
		</div>
	</div>
</section>


<section class="user-dashboard page-wrapper">
	<div class="container">
    <form action="" class="checkout-form">
      @csrf
		<div class="row">
			<div class="col-12 col-md-5 col-sm-12 col-lg-3 list">
				<div class="nav flex-column nav-pills">
					<a class="nav-link active" href="{{route('ordersHistory')}}" >Lịch sử mua hàng</a>
				</div>
				<div class="nav flex-column nav-pills">
					<a class="nav-link" href="{{route('information')}}" >Thông tin cá nhân</a>
				</div>
				@if (Session::has('customer'))
				<div class="nav flex-column nav-pills">
					<a class="nav-link" href="{{route('logout')}}" >Đăng xuất</a>
				</div>

				@endif
			</div>

		  <div class="col-12 col-md-7 col-sm-12 col-lg-9">
        <input type="hidden" id="user_id" name="user_id" value="{{$user->id ?? ''}}"> 
		    <table class="table table-bordered">
				  <thead>
				    <tr>
				      	<th scope="col"></th>
						<th scope="col">Hình ảnh</th>
						<th scope="col">Tên sản phẩm</th>
						<th scope="col">Ngày đặt</th>
						<th scope="col">Tình trạng</th>
						<th scope="col">Tổng</th>
						<th scope="col">Chi tiết</th>
				    </tr>
				  </thead>
				  <tbody>
            @foreach($orders as $order)
            @foreach ($order->orderDetails as $value)
              <tr>
                <th scope="row">#HDBH{{$order->id}}</th>
				<td>
                  <img style="width: 120px;height: 110px; " src="front/images/shop/products/{{ $value->product->productImages[0]->path }}" alt="">
				</td>
                <td>{{ $value->product->name }}</td>
                <td>{{ date('d/m/20y H:i', strtotime($order->created_at)) }}</td>
                <td id="status" class="status">{{ \App\Utilities\Constant::$order_status[$order->status]}}</td>
				@if($order->total_coupon != null)
                <td>{{number_format($order->total_coupon)}}đ</td>
				@else
				<td>{{number_format($value->total)}}đ</td>
				@endif
				<td><a href="{{route('orderDetail',['orderName' => Str::slug($value->product->name), 'id' => $order->id])}}" class="btn btn-dark btn-small">Xem</a></td>
				@if($order->status == 1)
					<td><button type="button" id="rowOrder-{{ $order->id }}" data-rowid="{{ $order->id }}" class="btn btn-outline-success huy">Hủy</button></td>
				@endif
               
			</tr>
              @endforeach
              @endforeach
				  </tbody>
				</table>
		  </div>
		</div>
    </form>
	</div>
</section>



@endsection
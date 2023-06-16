
@extends('front.layout.master')
@section('title', 'Account information')

@section('body')
<section class="page-header">
	<div class="overly"></div> 	
	<div class="container">
		<div class="row justify-content-center" style="margin-top: 100px">
			<div class="col-lg-6">
				<div class="content text-center">
					<h1 class="mb-3">Thông tin cá nhân</h1>
					<p>ALICE - Tự hào là thương hiệu thời trang Việt Nam mang lại những trải nghiệm mua sắm tốt nhất, giúp bạn thêm hứng khởi, tự tin và yêu bản thân hơn qua mỗi ngày khi được thể hiện cá tính của mình.</p>

				<nav aria-label="breadcrumb">
				  <ol class="breadcrumb bg-transparent justify-content-center">
				    <li class="breadcrumb-item"><a href="/">Trang chủ</a></li>
				    <li class="breadcrumb-item active" aria-current="page">Thông tin cá nhân</li>
				  </ol>
				</nav>
				</div>
			</div>
		</div>
	</div>
</section>


<section class="user-dashboard page-wrapper">
	<div class="container">
		@if($couponRank->condition == 1)
			<marquee style="color:red">Chúc mừng khách hàng {{Session::get('customer')->name}} đã là {{ $user->getRank()}}. Bạn sẽ được hưởng ưu đãi giảm giá {{$couponRank->number}}% trên tổng đơn hàng. Nhập mã giảm giá: <b>{{$couponRank->code}}</b> để hưởng ưu đãi. Cảm ơn quý khách đã tin dùng sản phẩm của Alice.</marquee>
		@endif
		@if($couponRank->condition == 2)
			<marquee style="color:red">Chúc mừng khách hàng {{Session::get('customer')->name}} đã là {{ $user->getRank()}}. Bạn sẽ được hưởng ưu đãi giảm giá {{$couponRank->number}}k trên tổng đơn hàng. Nhập mã giảm giá: <b>{{$couponRank->code}}</b> để hưởng ưu đãi. Cảm ơn quý khách đã tin dùng sản phẩm của Alice.</marquee>
		@endif
		<form action="{{route('updateInformation')}}" method="POST" >
		@csrf
		<div class="row">
			<div class="col-12 col-md-5 col-sm-12 col-lg-3 list">
				<div class="nav flex-column nav-pills">
					<a class="nav-link" href="{{route('ordersHistory')}}">Lịch sử mua hàng</a>
				</div>
				<div class="nav flex-column nav-pills">
					<a class="nav-link active" href="{{route('information')}}">Thông tin cá nhân</a>
				</div>
				@if (Session::has('customer'))
					<div class="nav flex-column nav-pills">
						<a class="nav-link" href="{{route('logout')}}" >Đăng xuất</a>
					</div>
        		@endif
			</div>

			<div class="col-12 col-md-7 col-sm-12 col-lg-9">
				<div class="acccount-settings">
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
						
					<h4 class="mb-4">Thông tin tài khoản</h4>
					<form action="" method="POST">
					@csrf
					<input type="hidden" id="user_id" name="user_id" value="{{$user->id ?? ''}}">
						<div class="form-group mb-4">
							<label>Họ tên <span style="color: red">*</span></label>
							<input required type="text" class="form-control" id="name" name="name" placeholder="Họ tên" value="{{ $user->name ?? ''}}">
							{{-- <p class="mt-2"> This will be how your name will be displayed in the account section and in reviews</p> --}}
						</div>
						<div class="form-group mb-4">
							<label>Xếp hạng<span style="color: red"></span></label>
							
							<input readonly type="text" class="form-control" value="{{ $user->getRank()}}">
							{{-- <p class="mt-2"> This will be how your name will be displayed in the account section and in reviews</p> --}}
						</div>
						<div class="form-group mb-4">
							<label>Email </label>
							<input type="text" class="form-control" id="email" name="email" placeholder="Email" value="{{ $user->email ?? ''}}">
						</div>

							<div class="form-group mb-4">
							<label for="city">Tỉnh / thành phố</label>
							<input type="hidden" name="city"  id="city" value="">
							<input type="hidden" name="matp"  id="matp" value="">
								<select id="select-city" class="form-control choose city">
								<option value="">--Chọn một--</option>
								
								@foreach($city as $ci)
									<option {{$user->matp == $ci->matp ? 'selected' : ''}} value="{{$ci->matp}}">{{$ci->name_city}}</option>
								@endforeach           
							</select>
							</div>
							<div class="form-group mb-4">
							<label for="province">Quận / huyện</label>
							<input type="hidden" name="province"  id="province" value="">
							<input type="hidden" name="maqh"  id="maqh" value=""> 
							<select id="select-province" class="form-control province choose">
								<option value="">--Chọn một--</option>
								@foreach($province as $pro)
									<option {{$user->maqh == $pro->maqh ? 'selected' : ''}} value="{{$pro->maqh}}">{{$pro->name_quanhuyen}}</option>
								@endforeach 

							</select>
						</div>
							<div class="form-group mb-4">
							<label for="wards">Xã phường / thị trấn</label>
							<input type="hidden" name="wards"  id="wards" value="">
							<input type="hidden" name="maxp"  id="maxp" value="">
							<select  id="select-wards" class="form-control wards">
								<option value="">--Chọn một--</option>
								@foreach($wards as $ward)
									<option {{$user->maxp == $ward->xaid ? 'selected' : ''}} value="{{$ward->xaid}}">{{$ward->name_xaphuong}}</option>
								@endforeach 
							</select>
						</div>
						<div class="form-group mb-4">
						<label for="street_address">Địa chỉ</label>
						<input  type="text" name="street_address" class="form-control" id="street_address" name="street_address" placeholder="Địa chỉ" value="{{ $user->street_address ?? ''}}">
					</div>


					@if($user->google_id == null)
					<div class="mt-5">
						<h4>Đặt lại mật khẩu</h4>

						<div class="form-group">
							<label>Mật khẩu hiện tại</label>
							@if($user->google_id != null)
							<p>Nếu đây là lần đầu bạn thay đổi mật khẩu thì mật khẩu hiện tại của bạn là: 123</p>
							<input type="text" name="password_current" class="form-control" placeholder="">
							@else
							<input type="text" name="password_current" class="form-control" placeholder="">
							@endif
						</div>
						<div class="form-group">
							<label>Mật khẩu mới</label>
							<input type="text" name="password" class="form-control" placeholder="">
						</div>
						<div class="form-group">
							<label>Nhập lại mật khẩu</label>
							<input type="text" name="password_confirmation" class="form-control" placeholder="">
						</div>

					</div>
					@endif
					<button type="submit" value="submit" class="btn btn-dark">Lưu</button>

					</form>
				</div>
			</div>
		</div>
		</form>
	</div>
</section>

<script>
		$('#select-wards').on('change', function() {
			var name_wards = $("#select-wards option:selected" ).text();
			$('#wards').val(name_wards);
			var ma_xp = $("#select-wards").val();
			$('#maxp').val(ma_xp);
		})
		$(document).on('change','.choose',function(){
		  var action = $(this).attr('id');
		  var matp = $(this).val();
		  var result = '';
		  if(action == 'select-city'){
			 var name_city = $("#select-city option:selected" ).text();
			 $('#city').val(name_city);
			 var ma_tp = $("#select-city").val();
			 $('#matp').val(ma_tp);
			 result = 'select-province';
		  } else if(action == 'select-province') {
			 var name_province = $("#select-province option:selected" ).text();
			 $('#province').val(name_province);
			 var ma_qh = $("#select-province").val();
			 $('#maqh').val(ma_qh);
			 result = 'select-wards';
		  }
		  $.ajax({
			 url:'{{ route('account.load') }}',
			 method:'POST',
			 data:{
				 "_token": "{{ csrf_token() }}",
				 action:action,
				 matp:matp,
			 },
			 success:function(data){
				$('#'+result).html(data);
			 }
		 });
	   });
	//    $(document).on('change','#select-city',function(){
	// 	console.log(123);
	// 	  var action = $(this).attr('id');
	// 	  var matp = $(this).val();
	// 	  var result = '';
	// 	  if(action == 'select-city'){
	// 		 var name_city = $("#select-city option:selected" ).text();
	// 		 $('#city').val(name_city);
	// 		 var ma_tp = $("#select-city").val();
	// 		 $('#matp').val(ma_tp);
	// 		 result = 'select-province';
	// 	  } else if(action == 'select-province') {
	// 		 var name_province = $("#select-province option:selected" ).text();
	// 		 $('#province').val(name_province);
	// 		 var ma_qh = $("#select-province").val();
	// 		 $('#maqh').val(ma_qh);
	// 		 result = 'select-wards';
	// 	  }
	// 	  $.ajax({
	// 		 url:'{{ route('account.load') }}',
	// 		 method:'POST',
	// 		 data:{
	// 			 "_token": "{{ csrf_token() }}",
	// 			 action:action,
	// 			 matp:matp,
	// 		 },
	// 		 success:function(data){
	// 			$('#'+result).html(data);
	// 		 }
	// 	 });
	//    });
	 
 

 </script>


@endsection
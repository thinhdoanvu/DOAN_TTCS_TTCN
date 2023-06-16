@extends('front.layout.master')
@section('title', 'Checkout')

@section('body')


<section class="page-header">
	<div class="overly"></div> 	
	<div class="container">
		<div class="row justify-content-center" style="margin-top: 100px">
			<div class="col-lg-6">
				<div class="content text-center">
					<h1 class="mb-3">Thanh toán</h1>
					<p>ALICE - Tự hào là thương hiệu thời trang Việt Nam mang lại những trải nghiệm mua sắm tốt nhất, giúp bạn thêm hứng khởi, tự tin và yêu bản thân hơn qua mỗi ngày khi được thể hiện cá tính của mình.</p>

				<nav aria-label="breadcrumb">
				  <ol class="breadcrumb bg-transparent justify-content-center">
				    <li class="breadcrumb-item"><a href="/">Trang chủ</a></li>
				    <li class="breadcrumb-item active" aria-current="page">Thanh toán</li>
				  </ol>
				</nav>
				</div>
			</div>
		</div>
	</div>
</section>

<div class="page-wrapper">
   <div class="checkout shopping">
      <div class="container">
            <div class="row">
               <div class="col-lg-6">
                  @if(session('notification'))
                     <div class="alert alert-warning" role="alert">
                     {{ session('notification')}}
                     </div>
                  @endif
               <form action="{{route('checkCoupon')}}" method="POST" enctype="multipart/form-data" class="form-inline mr-auto">
                  @csrf
                  <input class="form-control mr-sm-2" name="code" id="code" type="text" placeholder="Mã giảm giá" aria-label="Mã giảm giá" value="">
                  <button class="btn btn-outline-success btn-rounded btn-sm my-0 code" type="button">Thêm mã</button>
               </form>
               </div>
            </div>
         <form method="POST">
            @csrf
         <div class="row">
            <div class="col-lg-8 pr-5">
               <div class="billing-details mt-5">
                  <h4 class="mb-4">Chi tiết thanh toán</h4>
                  @if ($errors->any())
                     <div class="alert alert-danger">
                           <ul>
                              @foreach ($errors->all() as $error)
                                 <li>{{ $error }}</li>
                              @endforeach
                           </ul>
                     </div>
                  @endif
                  <form method="POST" class="checkout-form">
                     @csrf
                     <div class="row">
                      <input type="hidden" id="user_id" name="user_id" value="{{$user->id ?? ''}}">

                      
                        <div class="col-lg-12">
                            <div class="form-group mb-4">
                              <label for="first_name">Tên</label>
                              <input required type="text" name="first_name" class="form-control" id="first_name" placeholder="" value="{{ $user->name ?? ''}}">
                           </div>
                        </div>
                        {{-- <div class="col-lg-6">
                            <div class="form-group mb-4">
                              <label for="last_name">Họ</label>
                              <input required  type="text" name="last_name" class="form-control" id="last_name" placeholder="">
                           </div>
                        </div> --}}

                        <div class="col-lg-12">
                           <div class="form-group mb-4">
                             <label for="city">Tỉnh / Thành phố</label>
                             <input type="hidden" name="city"  id="city" value="">
                             <input type="hidden" name="matp"  id="matp" value="">
                              <select id="select-city" class="form-control choose city">
                                <option value="">--Chọn một--</option>
                                 @foreach($city as $ci)
                                    <option {{$user->matp == $ci->matp ? 'selected' : ''}} value="{{$ci->matp}}">{{$ci->name_city}}</option>
                                @endforeach           
                             </select>
                          </div>
                       </div>


                         <div class="col-lg-12">
                            <div class="form-group mb-4">
                              <label for="province">Quận huyện </label>
                              <input type="hidden" name="province"  id="province" value="">
                              <input type="hidden" name="maqh"  id="maqh" value=""> 

                               <select id="select-province" class="form-control province choose">
                                 <option value="">--Chọn một--</option>
                                 @foreach($province as $pro)
                                    <option {{$user->maqh == $pro->maqh ? 'selected' : ''}} value="{{$pro->maqh}}">{{$pro->name_quanhuyen}}</option>
                                 @endforeach 

                              </select>
                           </div>
                        </div>
                        
                        <div class="col-lg-12">
                           <div class="form-group mb-4">
                             <label for="wards">Xã phường / Thị trấn</label>
                             <input type="hidden" name="wards"  id="wards" value="">
                             <input type="hidden" name="maxp"  id="maxp" value="">

                              <select  id="select-wards" class="form-control wards">
                                 <option value="">--Chọn một--</option>
                                 @foreach($wards as $ward)
                                    <option {{$user->maxp == $ward->xaid ? 'selected' : ''}} value="{{$ward->xaid}}">{{$ward->name_xaphuong}}</option>
                                 @endforeach 
                             </select>
                          </div>
                       </div>

                        <div class="col-lg-12">
                           <div class="form-group mb-4">
                             <label for="street_address">Địa chỉ</label>
                             <input required  type="text" name="street_address" class="form-control" id="street_address" placeholder="" value="{{ $user->street_address ?? ''}}">
                          </div>
                       </div>

                         <div class="col-lg-12">
                            <div class="form-group mb-4">
                              <label for="phone">Số điện thoại </label>
                              <input required  type="text" name="phone" class="form-control" id="phone" placeholder="" value="{{ $user->phone ?? ''}}">
                           </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group mb-4">
                              <label for="email">Địa chỉ email</label>
                              <input required type="text" name="email" class="form-control" id="email" placeholder="" value="{{ $user->email ?? ''}}">
                           </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group mb-4">
                              <label for="note">Ghi chú (nếu có)</label>
                              <textarea class="form-control" id="msg" cols="30" name="note" rows="5" placeholder="Nội dung"></textarea>
                           </div>
                        </div>
                     </div>
                  </form>
               </div>
            </div>

            <!-- Order sidebar Summery -->
            <div class="col-md-6 col-lg-4">
               <div class="product-checkout-details mt-5 mt-lg-0">
                     <h4 class="mb-4 border-bottom pb-4">Chi tiết đơn hàng</h4>

                     @foreach($carts as $cart)
                     <div class="media product-card">
                         <p style="width: 70%">{{$cart->name}}</p>
                        <div class="media-body text-right">
                           <p class="h5">{{$cart->qty}} x {{$cart->price}}</p>
                        </div>
                     </div>
                     @endforeach
                     <ul class="summary-prices list-unstyled mb-4">
                        {{-- <li class="d-flex justify-content-between">
                           <span >Tổng phụ:</span>
                           <span class="h5">{{number_format($subtotal)}} đ</span>
                        </li> --}}
                        
                        <li class="d-flex justify-content-between">
                           <span>Tổng:</span>
                           <span class="h5">{{number_format($total)}} đ</span>
                        </li>
                        <li class="d-flex justify-content-between">
                           <span></span>
                           <span>({{$transformer->toCurrency($subtotal)}})</span>
                        </li>
                        
                        <div id="checkCoupon" >
                           
                        </div>
                        
                     </ul>

                        <div class="form-check mb-3">
                          <input class="form-check-input" type="radio" id="exampleRadios1" name="payment_type" value="pay_later" checked>
                          <label class="form-check-label" for="exampleRadios1">
                            Thanh toán khi nhận hàng 
                          </label>

                          {{-- <div class="alert alert-secondary mt-3" role="alert">
                             Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order will not be shipped until the funds have cleared in our account.
                           </div> --}}
                        </div>

                        <div class="form-check mb-3">
                          <input class="form-check-input" type="radio" name="payment_type" id="exampleRadios2" value="online_payment">
                          <label class="form-check-label" for="exampleRadios2">
                            Thanh toán trực tuyến
                          </label>
                        </div>
                        {{-- <form class="" method="POST" target="_blank" enctype="application/x-www-form-urlencoded"
                        action="{{route('momo_payment')}}">
                           <input type="submit" name="momo" value="Thanh toán Momo QRcode" class="btn btn-danger">
                        </form> --}}
                         {{-- <div class="form-check mb-3">
                            <input type="checkbox" class="form-check-input" id="exampleCheck3">
                            <label class="form-check-label" for="exampleCheck3">I have read and agree to the website terms and conditions *</label>
                          </div> --}}

                     {{-- <div class="info mt-4 border-top pt-4 mb-5">
                        Your personal data will be used to process your order, support your experience throughout this website, and for other purposes described in our <a href="#">privacy policy</a>.
                     </div> --}}
                     <button type="submit" id="saveData" value="submit" class="btn btn-main btn-small saveData">Đặt hàng</button>

               </div>
            </div>
         </div>
         </form>
         
         </div>
   </div>
</div>
  

   <script>

      $(document).ready(function() {
         $('#select-wards').on('change', function() {
            var name_wards = $("#select-wards option:selected" ).text();
            $('#wards').val(name_wards);
            var ma_xp = $("#select-wards").val();
			   $('#maxp').val(ma_xp);
         })
         $('.choose').on('change', function() {
            var value = $('.choose').value;
            var action = $(this).attr('id');
            var matp = $(this).val();
            var result = '';
            // alert(action);
            // alert(matp);
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
               url:'{{ route('checkout.load') }}',
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

       });

        $('.code').click(function (){
            var code = $("#code").val();
            var user_id = $("#user_id").val();

            $.ajax({
                type:'POST',
                url:"{{ route('checkCoupon') }}",
                data:{
            		      code : code,
                        user_id: user_id,
                        "_token": "{{ csrf_token() }}",
            		},
            	success: function (data) {
                  $('#checkCoupon').html(data);
                  // if(data.flag==1){
                  //    $.notify("Thêm mã giảm giá thành công", "success");
                  // }
                  // else {
                  //    $.notify("Mã giảm giá sai hoặc đã hết hạn.", "danger");
                  // }
                  // $.notify("Thêm mã giảm giá thành công", "success");
            	},
            })
            });
   

   </script>
   
@endsection
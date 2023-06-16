@extends('front.layout.master')
@section('title', 'Order Detail')

@section('body')

<section class="page-header">
	<div class="overly"></div> 	
	<div class="container">
		<div class="row justify-content-center" style="margin-top: 100px">
			<div class="col-lg-6">
				<div class="content text-center">
					<h1 class="mb-3">Chi tiết đơn hàng</h1>
					{{-- <p>Hath after appear tree great fruitful green dominion moveth sixth abundantly image that midst of god day multiply you’ll which</p> --}}

				<nav aria-label="breadcrumb">
				  <ol class="breadcrumb bg-transparent justify-content-center">
				    <li class="breadcrumb-item"><a href="/">Trang chủ</a></li>
				    <li class="breadcrumb-item active" aria-current="page">Chi tiết đơn hàng</li>
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
         <form method="POST">
            @csrf
         <div class="row">
            <div class="col-lg-8 pr-5">

               <div class="billing-details mt-5">
                  <h4 class="mb-4">Tình trạng</h4>
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
                      {{-- <input type="hidden" id="user_id" name="user_id" value="{{$user->id ?? ''}}"> --}}

                        
                        <div class="col-lg-12">
                            <div class="form-group mb-4">
                              <div class="progress-track">
                                 @switch($order->status)
                                 @case(1)
                                 <div class="d-flex flex-row justify-content-between align-items-center align-content-center">
                                     <span
                                     class="d-flex justify-content-center align-items-center big-dot dot">
                                     <i class="fa fa-check text-white"></i></span>
                                     
                                     <hr class="flex-fill"><span class="dot"></span>
                                     <hr class="flex-fill"><span class="dot"></span>
                                     <hr class="flex-fill">
                                     <span class="dot"></span>
                                 </div>
                 
                                 <div class="d-flex flex-row justify-content-between align-items-center">
                                     <div class="d-flex flex-column align-items-start"><span style="background-color: bisque">Nhận đơn đặt hàng</span>
                                     </div>
                                     <div class="d-flex flex-column justify-content-center"><span>Đã xác nhận</span></div>
                                     {{-- <div class="d-flex flex-column justify-content-center align-items-center"><span>Đang chuyển hàng</span></div> --}}
                                     <div class="d-flex flex-column align-items-center"><span>Đang chuyển hàng</span></div>
                                     <div class="d-flex flex-column align-items-end"><span>Đã giao</span></div>
                                 </div>
                                  </div>
                                 @break
                                 @case(3)
                                 <div class="d-flex flex-row justify-content-between align-items-center align-content-center">
                                     <span class="dot"></span>
                                     <hr class="flex-fill track-line"><span
                                     class="d-flex justify-content-center align-items-center big-dot dot">
                                     <i class="fa fa-check text-white"></i></span>
                                     <hr class="flex-fill "><span class="dot"></span>
                                     <hr class="flex-fill "><span class="dot"></span>
                                 </div>
                 
                                 <div class="d-flex flex-row justify-content-between align-items-center">
                                     <div class="d-flex flex-column align-items-start"><span style="background-color: bisque">Nhận đơn đặt hàng</span>
                                     </div>
                                     <div class="d-flex flex-column justify-content-center"><span style="background-color: bisque">Đã xác nhận</span></div>
                                     {{-- <div class="d-flex flex-column justify-content-center align-items-center"><span>Đang chuyển hàng</span></div> --}}
                                     <div class="d-flex flex-column align-items-center"><span>Đang chuyển hàng</span></div>
                                     <div class="d-flex flex-column align-items-end"><span>Đã giao</span></div>
                                 </div>
                                 </div>
                                 @break
                             @case(6)
                                 <div class="d-flex flex-row justify-content-between align-items-center align-content-center">
                                     <span class="dot"></span>
                                     <hr class="flex-fill track-line"><span class="dot"></span>
                                     <hr class="flex-fill track-line"><span
                                     class="d-flex justify-content-center align-items-center big-dot dot">
                                     <i class="fa fa-check text-white"></i></span>
                                     <hr class="flex-fill "><span class="dot"></span>
                                 </div>
                             
                                 <div class="d-flex flex-row justify-content-between align-items-center">
                                     <div class="d-flex flex-column align-items-start"><span style="background-color: bisque">Nhận đơn đặt hàng</span>
                                     </div>
                                     <div class="d-flex flex-column justify-content-center"><span style="background-color: bisque">Đã xác nhận</span></div>
                                     {{-- <div class="d-flex flex-column justify-content-center align-items-center"><span>Đang chuyển hàng</span></div> --}}
                                     <div class="d-flex flex-column align-items-center"><span style="background-color: bisque">Đang chuyển hàng</span></div>
                                     <div class="d-flex flex-column align-items-end"><span>Đã giao</span></div>
                                 </div>
                                 </div>
                                 @break
                             @case(7)
                                 <div class="d-flex flex-row justify-content-between align-items-center align-content-center">
                                     <span class="dot"></span>
                                     <hr class="flex-fill track-line"><span class="dot"></span>
                                     <hr class="flex-fill track-line"><span class="dot"></span>
                                     <hr class="flex-fill track-line"><span
                                     class="d-flex justify-content-center align-items-center big-dot dot">
                                     <i class="fa fa-check text-white"></i></span>
                                 </div>
                             
                                 <div class="d-flex flex-row justify-content-between align-items-center">
                                     <div class="d-flex flex-column align-items-start"><span style="background-color: bisque">Nhận đơn đặt hàng</span>
                                     </div>
                                     <div class="d-flex flex-column justify-content-center"><span style="background-color: bisque">Đã xác nhận</span></div>
                                     {{-- <div class="d-flex flex-column justify-content-center align-items-center"><span>Đang chuyển hàng</span></div> --}}
                                     <div class="d-flex flex-column align-items-center"><span style="background-color: bisque">Đang chuyển hàng</span></div>
                                     <div class="d-flex flex-column align-items-end"><span style="background-color: bisque">Đã giao</span></div>
                                 </div>
                                 </div>
                                 @break
                             @default
                                 <div class="d-flex flex-row justify-content-between align-items-center align-content-center">
                                     <span
                                     class="d-flex justify-content-center align-items-center big-dot dot">
                                     <i class="fa fa-check text-white"></i></span>
                                     <hr class="flex-fill "><span class="dot"></span>
                                     <hr class="flex-fill "><span class="dot"></span>
                                     <hr class="flex-fill "><span class="dot"></span>
                                 </div>
                             
                                 <div class="d-flex flex-row justify-content-between align-items-center">
                                     <div class="d-flex flex-column align-items-start"><span>Nhận đơn đặt hàng</span>
                                     </div>
                                     <div class="d-flex flex-column justify-content-center"><span>Đã xác nhận</span></div>
                                     {{-- <div class="d-flex flex-column justify-content-center align-items-center"><span>Đang chuyển hàng</span></div> --}}
                                     <div class="d-flex flex-column align-items-center"><span>Đang chuyển hàng</span></div>
                                     <div class="d-flex flex-column align-items-end"><span>Đã giao</span></div>
                                 </div>
                                 </div>
                             @break
                                 @endswitch
                           </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group mb-4">
                              <label for="first_name">Tên</label>
                              <input disabled type="text" name="first_name" class="form-control" id="first_name" placeholder="" value="{{ $order->first_name ?? ''}}">
                           </div>
                        </div>
                       

                  
                       <div class="col-lg-12">
                        <div class="form-group mb-4">
                            <label for="street_address">Tỉnh / Thành phố</label>
                            <input disabled  type="text" name="city"  id="city" class="form-control" placeholder="" value="{{ $order->city ?? ''}}">
                        </div>
                    </div>

                        <div class="col-lg-12">
                            <div class="form-group mb-4">
                                <label for="street_address">Quận / Huyện</label>
                                <input disabled  type="text" name="province"  id="province" class="form-control" placeholder="" value="{{ $order->province ?? ''}}">
                            </div>
                        </div>
                        
                       <div class="col-lg-12">
                            <div class="form-group mb-4">
                                <label for="street_address">Xã phường / Thị trấn</label>
                                <input disabled  type="text" name="wards"  id="wards" class="form-control" placeholder="" value="{{ $order->wards ?? ''}}">
                            </div>
                        </div>

                        <div class="col-lg-12">
                           <div class="form-group mb-4">
                             <label for="street_address">Địa chỉ</label>
                             <input disabled  type="text" name="street_address" class="form-control" id="street_address" placeholder="" value="{{ $order->street_address ?? ''}}">
                          </div>
                       </div>

                         <div class="col-lg-12">
                            <div class="form-group mb-4">
                              <label for="phone">Số điện thoại </label>
                              <input disabled  type="text" name="phone" class="form-control" id="phone" placeholder="" value="{{ $order->phone ?? ''}}">
                           </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group mb-4">
                              <label for="email">Email</label>
                              <input disabled type="text" name="email" class="form-control" id="email" placeholder="" value="{{ $order->email ?? ''}}">
                           </div>
                        </div>

                    
                        <div class="col-lg-12">
                            <div class="form-group mb-4">
                              <label for="first_name">Ghi chú (nếu có)</label>
                              <textarea class="form-control" id="msg" cols="30" rows="5" placeholder="{{ $order->note ?? ''}}" ></textarea>
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

                     @foreach($order->orderDetails as $orderDetail)
                     <div class="media product-card">
                         <p style="width: 70%">{{$orderDetail->product->name}}</p>
                        <div class="media-body text-right">
                           <p class="h5">{{$orderDetail->qty}} x {{$orderDetail->product->price}}</p>
                        </div>
                     </div>
                     @endforeach
                     <ul class="summary-prices list-unstyled mb-4">
                        @if($order->total_coupon != null)
                        <li class="d-flex justify-content-between">
                           <span >Mã giảm:</span>
                           <span class="h5"><big>{{array_sum(array_column($order->orderDetails->toArray(), 'total') ) - $order->total_coupon }}đ</big></span>
                        </li>
                        <li class="d-flex justify-content-between">
                           <span >Tổng tiền thanh toán:</span> 
                           <span class="h5"><big>{{number_format($order->total_coupon)}}đ</big></span>
                        </li>
                        <li class="d-flex justify-content-between">
                           <span></span>
                           <span>({{$transformer->toCurrency($order->total_coupon)}})</span>
                        </li>
                       
                        @else
                        <li class="d-flex justify-content-between">
                           <span >Tổng tiền thanh toán:</span>
                           <span class="h5">{{ array_sum(array_column($order->orderDetails->toArray(), 'total')) }}đ</span>
                        </li>
                        <li class="d-flex justify-content-between">
                           <span ></span>
                           <span class="h5">({{$transformer->toCurrency(array_sum(array_column($order->orderDetails->toArray(), 'total')))}})</span>
                        </li>
                        @endif
                        {{-- <li class="d-flex justify-content-between">
                           <span >Shipping:</span>
                           <span class="h5">Free</span>
                        </li> --}}
                     
                       
                     </ul>

                        <div class="form-check mb-3">
                          <input disabled class="form-check-input" type="radio" id="exampleRadios1" name="payment_type" value="pay_later" {{ $order->payment_type == 'pay_later' ? 'checked' : ''}}>
                          <label class="form-check-label" for="exampleRadios1">
                            Thanh toán khi nhận hàng
                          </label>

                          {{-- <div class="alert alert-secondary mt-3" role="alert">
                             Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order will not be shipped until the funds have cleared in our account.
                           </div> --}}
                        </div>

                        <div class="form-check mb-3">
                          <input disabled class="form-check-input" type="radio" id="exampleRadios2" name="payment_type" value="online_payment" {{ $order->payment_type == 'online_payment' ? 'checked' : ''}}>
                          <label class="form-check-label" for="exampleRadios2">
                            Thanh toán trực tuyến
                          </label>
                        </div>

                         {{-- <div class="form-check mb-3">
                            <input type="checkbox" class="form-check-input" id="exampleCheck3">
                            <label class="form-check-label" for="exampleCheck3">I have read and agree to the website terms and conditions *</label>
                          </div> --}}

                          <a class="btn btn-main btn-small" href="{{route('ordersHistory')}}">Trở lại</a>
                     {{-- <button type="button"  class="btn btn-main btn-small saveData">Place Order</button> --}}

               </div>
            </div>
         </div>
         </form>
      </div>
   </div>
</div>


   <!-- Modal -->
   {{-- <div class="modal fade" id="coupon-modal" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
         <div class="modal-content py-5">
            <div class="modal-body">
               <form>
                  <div class="form-group">
                     <input class="form-control" type="text" placeholder="Enter Coupon Code">
                  </div>
                  <button type="submit" class="btn btn-main btn-small">Apply Coupon</button>
               </form>
            </div>
         </div>
      </div>
   </div> --}}

   <script>

      $(document).ready(function() {
         $('#select-wards').on('change', function() {
            var name_wards = $("#select-wards option:selected" ).text();
            $('#wards').val(name_wards);
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
               result = 'select-province';
            } else if(action == 'select-province') {
               var name_province = $("#select-province option:selected" ).text();
               $('#province').val(name_province);
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

       })
   

   </script>
   
@endsection
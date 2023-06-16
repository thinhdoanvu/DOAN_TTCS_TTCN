@if($flag == 1)
<span style="color:red">Thêm mã giảm giá thành công!</span>
@else
<span style="color:red">Mã giảm giá sai hoặc đã hết hạn!</span>
@endif
@if(Session::get('coupon'))
@foreach(Session::get('coupon') as $key => $cou)
   <li class="d-flex justify-content-between pb-2" >
         @if($cou['coupon_condition'] == 1)
            @php
               $total_coupon = ($total-($total*$cou['number'])/100);
            
            @endphp
            <input type="hidden" name="total_coupon" value="{{$total_coupon}}">
            <span>Mã giảm:</span>
            <h5>{{$cou['number']}} %</h5>
   </li>
   <li class="d-flex justify-content-between pb-2">
         <span>Tổng tiền thanh toán:</span>
         <h5>{{number_format($total_coupon,0,',','.')}} đ</h5>
   </li>
   <li class="d-flex justify-content-between pb-2">
         @elseif($cou['coupon_condition'] == 2)
            
               @php
                  $total_coupon = ($total-$cou['number']);
               @endphp
            <input type="hidden" name="total_coupon" value="{{$total_coupon}}">
            <span>Mã giảm:</span>
            <h5>{{$cou['number']}} k</h5>
   </li>
   <li class="d-flex justify-content-between pb-2">
         <span>Tổng tiền thanh toán:</span>
         <h5>{{number_format($total_coupon,0,',','.')}} đ</h5>
   </li>
   @endif
      
   </li>
   @endforeach
@endif
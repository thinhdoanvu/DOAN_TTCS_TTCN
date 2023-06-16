@extends('front.layout.master')
@section('title', 'Confirmation')

@section('body')
<br><br>
<div class="tks" style="margin-top: 100px">
    <div class="title">Cảm ơn bạn đã mua hàng! Hóa đơn đã được gửi đến email của bạn.</div>
    <div class="info">
        <div class="row">
            <div class="col-7">
                <span id="heading">Ngày</span><br>
                <span id="details">{{ date('d/m/20y H:i', strtotime($order->created_at)) }}</span>
            </div>
            <div class="col-5 pull-right">
                <span id="heading">Số hóa đơn.</span><br>
                <span id="details">#Hsjh{{$order->id}}</span>
            </div>
            <div class="col-12">
                <span id="heading">Địa chỉ</span><br>
                <span id="details">{{$order->street_address}} - {{$order->xaphuongthitran->name_xaphuong}} - {{$order->quanhuyen->name_quanhuyen}} - {{$order->tinhthanhpho->name_city}}</span>
            </div>
            <div class="col-12">
              <span id="heading">Ghi chú</span><br>
              <span id="details">{{$order->note}} </span>
          </div>
        </div>      
    </div> 
  
    @foreach($carts as $cart)  
    <div class="pricing">
        <div class="row">
            <div class="col-9">
                <span id="name">{{$cart->name}}</span>  
            </div>
            <div class="col-3">
                <span id="price">{{ number_format($cart->price * $cart->qty) }} VND</span>
            </div>
        </div>
        <div class="row">
            <div class="col-9">
                <span id="name">x {{$cart->qty}}</span>
            </div>
            <div class="col-3">
                {{-- <span id="price">&pound;33.00</span> --}}
            </div>
        </div>
    </div>
    @endforeach
    <div class="total">
        @if($order->total_coupon != null)
        <div class="row">
            <div class="col-9">Tổng tiền</div>
            <div class="col-3"><big>{{number_format($order->total_coupon)}} VND</big></div>
            <div class="col-12">( {{$transformer->toCurrency($order->total_coupon)}} )</div>
        </div>
        @else
        <div class="row">
            <div class="col-9">Tổng tiền</div>
            <div class="col-3"><big>{{number_format($total)}} VND</big></div>
            <div class="col-12">( {{$transformer->toCurrency($total)}} )</div>
        </div>
        @endif
    </div>
    <div class="tracking">
        <div class="title">Tình trạng đơn hàng</div>
    </div>
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
        

    <div class="footer">
        <div class="row justify-content-center">
            {{-- <div class="col-3"><a class="btn btn-main btn-small" href="./">Continue Shopping</a></div> --}}
            {{-- <div class="col-10">Want any help? Please &nbsp;<a> contact us</a></div> --}}
            <div class="col-5 w-100"><a href="/" class="btn btn-main mt-4">Tiếp tục mua</a></div>
        </div>
        
       
    </div>
</div>
<br><br>
@endsection
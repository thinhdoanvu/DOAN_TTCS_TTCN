<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        *{ font-family: DejaVu Sans !important;}
      </style> 
</head>
<body>
    <span style="font-size: 25px;"><b>Hóa đơn bán hàng</b></span><br>
    <span>Số hóa đơn: #HDBH{{$order->id}}</span>
    <p>{{ $date }}</p>
    <span><b>Tên khách hàng: </b>{{$order->first_name}}</span><br>
    <span><b>Địa chỉ: </b>{{$order->street_address}} - {{$order->xaphuongthitran->name_xaphuong}} - {{$order->quanhuyen->name_quanhuyen}} - {{$order->tinhthanhpho->name_city}}</span><br>
    <span><b>Số điện thoại: </b>{{$order->phone}}</span><br>
    <p>  </p>
  
    <table class="table table-bordered">
        <tr>
            <th>Tên sản phẩm</th>
            @if($order->code != null)
            <th>Mã giảm giá</th>
            @endif
            <th>Tổng</th>
        </tr>
        @foreach($order->orderDetails as $orderDetail)
        <tr>
            @if($orderDetail->color != null)
            <td>{{$orderDetail->product->name}} - {{$orderDetail->color}} - {{$orderDetail->size}} x {{$orderDetail->qty}}</td>
            @else
            <td>{{$orderDetail->product->name}} x {{$orderDetail->qty}}</td>
            @endif
            @if($order->code != null)
            <td>{{$order->code}}</td>
            @endif
            <td>{{$orderDetail->amount}}đ</td>
        </tr>
        @endforeach
    </table>
    <table class="table table-bordered">
        <tr>
            <th>Phương thức thanh toán</th>
            <th>{{ \App\Utilities\Constant::$order_payment_type[$order->payment_type]}}</th>
        </tr>
        @foreach($order->orderDetails as $orderDetail)
        <tr>
            @if($order->total_coupon != null)
            <td><b>
                Tổng đã giảm:<br>
                Tổng tiền thanh toán:</b>
            </td>
            <td><b>
                {{array_sum(array_column($order->orderDetails->toArray(), 'total') ) - $order->total_coupon }}đ<br>
                {{$order->total_coupon}}đ</b>
            </td>
            @else
            <td>
                <b>Tổng tiền thanh toán:</b>
            </td>
            <td>
                <b>{{array_sum(array_column($order->orderDetails->toArray(), 'total') )}}đ</b>
            </td>            
            @endif
        </tr>
        @endforeach
    </table>
    @if($order->note != null)
    <p>Ghi chú: {{$order->note}}</p>
    @endif
</body>
</html>
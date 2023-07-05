<div style="width: 100%; background-color: #f4f4f4; ">
    <div style="width: 450px; max-height: 400px; margin: 0 auto; background-color: white;">
        <div style="padding: 15px">
            <div style="text-align: center">
                <p>Cảm ơn bạn đã mua trái cây ở cửa hàng chúng tôi</p>
                <h2>HÓA ĐƠN</h2>
            </div>
            <div>
                <div><span><b>Tên người nhận: </b>{{ $invoice->nameRecipient }}</span></div>
                <div><span><b>Số điện thoại người nhận: </b>{{ $invoice->phoneRecipient }}</span></div>
                <div><span><b>Địa chỉ giao hàng: </b>{{ $invoice->deliveryAddress }}</span></div>
                <div><span><b>Ngày giờ nhận hàng: </b>{{ $invoice->deliveryDate }}</span></div>
                <div style="margin-top: 10px;"><span><b>Danh sách sản phẩm</b></span></div>
                <table style="margin-bottom: 10px;">
                    <thead>
                        <tr>
                            <th style="width: auto">Tên sản phẩm</th>
                            <th style="width: auto">Đơn giá</th>
                            <th style="width: auto">Số lượng</th>
                            <th style="width: auto">Tổng</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cart_details as $cart_detail)
                            @foreach ($products as $product)
                                @if ($cart_detail->product_id == $product->id)
                                    <tr>
                                        <td>
                                            {{ $product->name }}
                                        </td>
                                        <td>
                                            {{ number_format($cart_detail->price) }}đ
                                        </td>
                                        <td>
                                            {{ $cart_detail->amount }}
                                        </td>
                                        <td>
                                            {{ number_format($cart_detail->total) }}đ
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        @endforeach
                    </tbody>
                </table>
                <span><b>Tổng cộng: </b>{{ number_format($invoice->total) }}đ</span>
            </div>
        </div>
    </div>
</div>

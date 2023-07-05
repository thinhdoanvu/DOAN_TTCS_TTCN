@extends('user.usershop')
@section('usermain')
    <div class="hero-wrap hero-bread" style="background-image: url('userdashboard/images/bg_1.jpg');">
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center">
                    <h1 class="mb-0 bread">Cart</h1>
                </div>
            </div>
        </div>
    </div>
    <section class="ftco-section ftco-no-pt ftco-no-pb py-5 bg-light">
        <div class="container">
            <div class="row d-flex justify-content-center py-3">
                <div class="col-12">
                    <ul class="float-left" style="list-style: none; display: flex; padding-left: 0; margin: 0">
                        <li class="breadcrumb-item">
                            <a href="{{ route('home') }}">Trang chủ</a>
                        </li>
                        <li class="breadcrumb-item active">Giỏ hàng</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section bgpt">
        <div class="container card py-2">
            <h2>Giỏ hàng</h2>
            <hr>
            @if (session('msg'))
                <div class="alert alert-success">{!! session('msg') !!}</div>
            @endif
            @if ($count_cartDetails == 0)
                <h3 class="cart-item-center">Không có sản phẩm</h3>
            @else
                <div class="row cart-detail-main">
                    <div class="col-8">
                        <div class="row">
                            <div class="col-1"></div>
                            <div class="col-2"></div>
                            <div class="col-9">
                                <div class="row">
                                    <div class="col-6"><span>Sản phẩm</span></div>
                                    <div class="col-2"><span> Số tiền</span></div>
                                    <div class="col-4"><span>Số lượng</span></div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        @foreach ($cartDetails as $cartDetail)
                            @foreach ($products as $product)
                                @if ($cartDetail->product_id === $product->id)
                                    <div class="row">
                                        <div class="col-1">
                                            <abbr title="Xóa">
                                                <a href=" {{ route('cart.delete', $cartDetail->id) }} ">
                                                    <button type="button" class="btn btn-default btn-sm"><b>x</b></button>
                                                </a>
                                            </abbr>
                                        </div>
                                        <div class="col-2 cart-item-center">
                                            <img class="img-cart-detail" src="{{ $product->image_path }}"
                                                alt="{{ $product->image_name }}">
                                        </div>
                                        <div class="col-9">
                                            <div class="row">
                                                <div class="col-6">
                                                    <a href="{{ route('product.slug', $product->slug->nameSlug) }}">
                                                        <span class="item-cart-detail">
                                                            {{ $product->name }}
                                                        </span>
                                                    </a>
                                                    <span class="item-cart-detail">
                                                        @foreach ($units as $unit)
                                                            @if ($product->id_unit === $unit->id)
                                                                {{ $unit->type }}
                                                            @endif
                                                        @endforeach
                                                    </span>
                                                </div>
                                                <div class="col-2 py-2">
                                                    <span id="price-{{ $cartDetail->id }}-{{ $product->id }}"
                                                        class="price-cart-detail">{{number_format($cartDetail->total)}}đ</span>
                                                </div>
                                                <div class="col-4 py-2">
                                                    <div class="row">
                                                        <button class="btn btn-success minus-btn" name="minus-btn"
                                                            onclick="descreValue({{ $cartDetail->id }}, {{ $product->id }})">-</button>
                                                        <input type="text" class="input-cart-detail"
                                                            id="amount-{{ $cartDetail->id }}-{{ $product->id }}"
                                                            value="{{ $cartDetail->amount }}">
                                                        <button class="btn btn-success plus-btn" name="plus-btn"
                                                            onclick="increValue({{ $cartDetail->id }}, {{ $product->id }})">+</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                @endif
                            @endforeach
                        @endforeach
                    </div>
                    <div class="col-3 ml-5 cart-detail-main-2">
                        <h6 style="color: red"><u>THÔNG TIN GIAO HÀNG</u></h6>
                        <form class="mt-3" action="{{ route('invoice.create') }}" method="post">
                            @csrf
                            <div class="row pl-3 mb-4">
                                <div class="form-group">
                                    <label for="nameRecipient" style="font-size: 13px; margin-bottom: 0; color: black">Tên
                                        người nhận</label>
                                    <input id="nameRecipient" type="text" name="nameRecipient"
                                        value="{{ Auth::guard('webuser')->user()->full_name }}"
                                        placeholder="Enter Fullname" />
                                </div>
                                <div class="form-group">
                                    <label for="phoneRecipient" style="font-size: 13px; margin-bottom: 0; color: black">Số
                                        điện thoại người nhận</label>
                                    <input id="phoneRecipient" type="text" name="phoneRecipient"
                                        value="{{ Auth::guard('webuser')->user()->phone }}" placeholder="Enter Phone" />
                                </div>
                                <div class="form-group">
                                    <label for="deliveryAddress" style="font-size: 13px; margin-bottom: 0; color: black">Địa
                                        chỉ giao hàng</label>
                                    <input id="deliveryAddress" type="text" name="deliveryAddress"
                                        value="{{ Auth::guard('webuser')->user()->address }}"
                                        placeholder="Enter Address" />
                                </div>
                                <div class="form-group">
                                    <label for="deliveryDate" style="font-size: 13px; margin-bottom: 0; color: black">Ngày
                                        giờ nhận hàng</label>
                                    <input id="deliveryDate" type="datetime-local" name="deliveryDate"
                                        value="1990-01-01T00:00" />
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-6">
                                    <span>Tổng tiền</span>
                                </div>
                                <div class="col-5">
                                    <input type="hidden" id="input-total-price" name="totalAll"
                                        value="{{ $total }}">
                                    <span style="color: black" class="price-cart-detail" id="total-price">
                                        {{ number_format($total) }}đ
                                    </span>
                                </div>
                            </div>
                            <div class="row pl-3">
                                <button class="btn payment-btn">Thanh toán</button>
                            </div>
                        </form>
                    </div>
                </div>
            @endif
        </div>
    </section>

    <section class="ftco-section ftco-no-pt ftco-no-pb py-5 bg-light">
        <div class="container">
            <div class="row d-flex justify-content-center py-5">
                <div class="col-md-6">
                    <h2 style="font-size: 22px;" class="mb-0">Subcribe to our Newsletter</h2>
                    <span>Get e-mail updates about our latest shops and special offers</span>
                </div>
                <div class="col-md-6 d-flex align-items-center">
                    <form action="#" class="subscribe-form">
                        <div class="form-group d-flex">
                            <input type="text" class="form-control" placeholder="Enter email address">
                            <input type="submit" value="Subscribe" class="submit px-3">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <script>
        function increValue(cartDetailId, productId) {
            var inputElement = document.getElementById("amount-" + cartDetailId + "-" + productId);
            var inputValue = parseInt(inputElement.value);
            @if ($count_cartDetails > 0)

                var maxAmount = parseInt(
                "{{ $product->amount }}"); // Kiểm tra xem bạn đã đặt giá trị đúng cho $product->amount chưa
                if (inputValue < maxAmount) {
                    inputElement.value = inputValue + 1;
                    updateCartDetail(cartDetailId, productId, inputValue + 1, true);
                }
            @endif
        }

        function descreValue(cartDetailId, productId) {
            var inputElement = document.getElementById("amount-" + cartDetailId + "-" + productId);
            var inputValue = parseInt(inputElement.value);
            @if ($count_cartDetails > 0)
                if (inputValue > 1) {
                    inputElement.value = inputValue - 1;
                    updateCartDetail(cartDetailId, productId, inputValue - 1, false);
                }
            @endif
        }

        function updateCartDetail(cartDetailId, productId, amount, isIncrease) {
            // Gửi Ajax request đến route 'cart.update' với tham số amount, cartDetailId, productId
            @if ($count_cartDetails > 0)
                $.ajax({
                    type: "POST",
                    url: "/carts/update",
                    data: {
                        _token: "{{ csrf_token() }}",
                        amount: amount,
                        cartDetailId: cartDetailId,
                        productId: productId,
                        memberId: "{{ Auth::guard('webuser')->user()->id }}"
                    },
                    success: function(response) {
                        if (response.success) {
                            // Cập nhật giá trị total trong HTML
                            var priceElement = document.getElementById("price-" + cartDetailId + "-" +
                                productId);
                            priceElement.textContent = response.totalFormatted;
                            // Cập nhật tổng tiền
                            var totalPriceElement = document.getElementById("total-price");
                            var inputTotalPriceElement = document.getElementById("input-total-price");
                            totalPriceElement.textContent = response.total_sum;
                            inputTotalPriceElement.value = response.inp_total_sum;
                        }
                    },
                });
            @endif
        }
    </script>
@endsection

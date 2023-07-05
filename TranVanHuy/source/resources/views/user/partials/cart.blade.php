@php
    if(Auth::guard('webuser')->check() == false){
        $user_id = 0;
    }else {
        $user_id = Auth::guard('webuser')->user()->id;
    }

    $carts = app\Models\Cart::where('member_id', $user_id)->get();
    $products = app\Models\Product::all();
    $units = app\Models\Unit::all();
    $total = app\Models\Cart::where('member_id', $user_id)->sum('total');
@endphp

<div class="cart-main">
    @if ($user_id == 0)
        <div class="cart-item-center py-2">
            <a href="{{ route('user.login') }}">Đăng nhập</a>
        </div>
    @else
        @if ($carts->count() > 0)
            <div class="cart-content">
                @foreach ($carts as $cart)
                    @if ($cart->member_id == $user_id)
                        @foreach ( $products as $product)
                            @if ($cart->product_id === $product->id)
                                <div class="row cart-item">
                                    <div class="col-4">
                                        <img src="{{$product->image_path}}" alt="{{$product->image_name}}">
                                    </div>
                                    <div class="col-6 mb-1">
                                        <span class="cart-item-detail">
                                            {{$product->name}}
                                        </span>
                                        <span class="cart-item-detail">
                                            @foreach ( $units as $unit )
                                                @if ($product->id_unit === $unit->id)
                                                    {{$unit->type}}
                                                @endif
                                            @endforeach
                                        </span>
                                        <span class="cart-item-detail">
                                            {{number_format($cart->price)}}<u>đ</u> X {{$cart->amount}}
                                        </span>
                                    </div>
                                    <div class="col-2">
                                        <abbr title="Xóa">
                                            <a href=" {{ route('cart.delete', $cart->id)}} ">
                                                <button type="button" class="btn btn-default btn-sm"><b>x</b></button>
                                            </a>
                                        </abbr>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    @endif
                @endforeach
            </div>
            <div class="cart-total">
                Tổng tiền tạm tính: {{number_format($total)}}<u>đ</u>
                <a href="{{ route('cart.detail') }}" class="checkout-button">Tiến hành đặt hàng</a>
            </div>
        @else
            <div class="cart-item-center pt-3">
                <p>Không có sản phẩm nào</p>
            </div>
        @endif
    @endif
</div>

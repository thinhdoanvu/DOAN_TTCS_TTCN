@extends('admin.layout.master')
@section('body')

                <!-- Main -->
                <div class="app-main__inner">
                    <div class="app-page-title">
                        <div class="page-title-wrapper">
                            <div class="page-title-heading">
                                <div class="page-title-icon">
                                    <i class="pe-7s-ticket icon-gradient bg-mean-fruit"></i>
                                </div>
                                <div>
                                    Đơn hàng
                                    <div class="page-title-subheading">
                                        Xem, tạo, cập nhật, xóa và quản lý.                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="main-card mb-3 card">
                                <div class="card-body display_data">
                                    <div class="table-responsive">
                                        <h2 class="text-center">Thông tin vận chuyển hàng</h2>
                                        <hr>
                                        <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Tên khách hàng</th>
                                                    <th class="text-center">Email</th>
                                                    <th class="text-center">Số điện thoại</th>
                                                    <th class="text-center">Địa chỉ</th>
                                                    <th class="text-center">Ghi chú</th>
                                                    <th class="text-center">Hình thức thanh toán</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <div class="widget-content p-0">
                                                            <div class="widget-content-wrapper">
                        
                                                                <div class="widget-content-left flex2">
                                                                    <div class="widget-heading">{{$orders->first_name}}</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="text-center">
                                                        {{$orders->email}}
                                                    </td>
                                                    <td class="text-center">
                                                        {{$orders->phone}}
                                                    </td>
                                                    <td class="text-center">
                                                        {{$orders->street_address}} - {{$orders->wards}} - {{$orders->province}} - {{$orders->city}}
                                                    </td>
                                                    <td class="text-center">{{$orders->note}}</td>
                                                    <td class="text-center">
                                                        {{ \App\Utilities\Constant::$order_payment_type[$orders->payment_type]}}
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="table-responsive">
                                        <h2 class="text-center mt-5">Thông tin chi tiết đơn hàng</h2>
                                        <a href="{{route('print.order',['order_id' => $orders->id])}}">In hóa đơn</a>

                                        <hr>
                                        <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Tên sản phẩm</th>
                                                    <th class="text-center">Mã giảm giá</th>
                                                    <th class="text-center">Màu sắc</th>
                                                    <th class="text-center">Size</th>
                                                    <th class="text-center">Số lượng</th>
                                                    <th class="text-center">Giá sản phẩm</th>
                                                    <th class="text-center">Tổng tiền</th>
                                                </tr>
                                            </thead>
                                            {{-- .$orderDetail->order_id --}}
                                            <tbody>
                                                @foreach($orders->orderDetails as $orderDetail)

                                                <tr>
                                                    <td>
                                                        <div class="widget-content p-0">
                                                            <div class="widget-content-wrapper">
                                                                <div class="widget-content-left mr-3">
                                                                    <div class="widget-content-left">
                                                                        <img style="height: 60px;"
                                                                            data-toggle="tooltip" title="Image"
                                                                            data-placement="bottom"
                                                                            src="./front/images/shop/products/{{$orderDetail->product->productImages[0]->path}}" alt="">
                                                                    </div>
                                                                </div>
                                                                <div class="widget-content-left flex2">
                                                                    <div class="widget-heading">{{$orderDetail->product->name}}</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="text-center">
                                                        {{$orders->code}}
                                                    </td>
                                                    <td class="text-center">
                                                        {{$orderDetail->color}}
                                                    </td>
                                                    <td class="text-center">
                                                        {{$orderDetail->size}}
                                                    </td>
                                                    <td class="text-center">
                                                        {{$orderDetail->qty}}
                                                    </td>
                                                    <td class="text-center">{{$orderDetail->amount}}đ</td>
                                                    <td class="text-center">
                                                        {{$orderDetail->total}}đ
                                                    </td>
                                                    
                                                </tr>
                                                @endforeach
                                            </tbody>
                                            
                                        </table>
                                        @if($orders->total_coupon != null)
                                                <br><br><h6><b>Tổng đã giảm: </b>{{array_sum(array_column($orders->orderDetails->toArray(), 'total') ) - $orders->total_coupon }}k</h6><br>
                                                <h6><b>Tổng tiền thanh toán: </b>{{$orders->total_coupon}}đ</h6>
                                                @else
                                                <br>
                                                <h6><b>Tổng tiền thanh toán: </b>{{array_sum(array_column($orders->orderDetails->toArray(), 'total') )}}đ</h6>
                                                @endif
                                    </div>

                                  
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Main -->

@endsection
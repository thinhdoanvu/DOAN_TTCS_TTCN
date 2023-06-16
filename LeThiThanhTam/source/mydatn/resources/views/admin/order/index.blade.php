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
                                        Xem, tạo, cập nhật, xóa và quản lý.
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    @include('admin.components.notification')
                    <div class="row">
                        <div class="col-md-12">
                            <div class="main-card mb-3 card">

                                <div class="card-header">

                                    <form action="">
                                        <div class="input-group">
                                            <input type="search" name="search" id="search" value="{{request('search')}}"
                                                placeholder="Tìm kiếm ..." class="form-control">
                                            <span class="input-group-append">
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="fa fa-search"></i>&nbsp;
                                                    Tìm kiếm
                                                </button>
                                            </span>
                                        </div>
                                    </form>

                                    
                                </div>

                                <div class="table-responsive">
                                    <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th class="text-center">ID</th>
                                                <th>Khách hàng / Sản phẩm</th>
                                                <th>Ngày đặt</th>
                                                <th class="text-center">Địa chỉ</th>
                                                <th class="text-center">Tổng tiền</th>
                                                <th class="text-center">Tình trạng</th>
                                                <th class="text-center">Hành động</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           
                                        @foreach($orders as $key => $order)
                                       
                                        
                                            <tr>
                                                <td class="text-center text-muted">#{{$order->id}}</td>
                                                <td>
                                                    <div class="widget-content p-0">
                                                        <div class="widget-content-wrapper">
                                                            <div class="widget-content-left mr-3">
                                                                <div class="widget-content-left">
                                                                    {{-- @foreach ($orderDetail->product->productImages as $key) --}}
                                                                    <img style="height: 60px;"
                                                                        data-toggle="tooltip" title="Image"
                                                                        data-placement="bottom"
                                                                        
                                                                        {{-- @foreach ($orderDetail->product->productImages as $key) --}}
                                                                            src="{{asset('front/images/shop/products/'.$order->orderDetails[0]->product->productImages[0]->path)}}" alt="">
                                                                        
                                                                        
                                                                    </div>
                                                                    {{-- @endforeach --}}
                                                            </div>
                                                            <div class="widget-content-left flex2">
                                                                <div class="widget-heading">{{$order->first_name}}</div>
                                                                <div class="widget-subheading opacity-7">
                                                                    {{$order->orderDetails[0]->product->name}}
                                                                    @if(count($order->orderDetails) > 1)
                                                                        (và {{count($order->orderDetails) - 1}} sản phẩm khác)
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-center">
                                                    {{$order->order_date}}
                                                </td>
                                                <td class="text-center">
                                                    {{$order->street_address . '-' . $order->wards . '-' . $order->province . '-' .  $order->city}}
                                                </td>
                                                @if($order->total_coupon != null)
                                                <td class="text-center">{{ $order->total_coupon}}</td>
                                                @else
                                                <td class="text-center">{{array_sum(array_column($order->orderDetails->toArray(), 'total') )}}</td>
                                                @endif
                                                <td class="text-center">
                                                    @switch($order->status)
                                                        @case(1)
                                                        <div class="badge badge-dark" style="background-color: #66cd00">
                                                            {{ \App\Utilities\Constant::$order_status_1[$order->status]}}
                                                        </div>
                                                            @break
                                                        @case(2)
                                                        <div class="badge badge-dark" style="background-color: #ff7f24">
                                                            {{ \App\Utilities\Constant::$order_status_1[$order->status]}}
                                                        </div>
                                                            @break
                                                        @case(3)
                                                            <div class="badge badge-dark" style="background-color: #00cdcd">
                                                                {{ \App\Utilities\Constant::$order_status_1[$order->status]}}
                                                            </div>
                                                            @break
                                                            @case(4)
                                                            <div class="badge badge-dark" style="background-color: 	#ffb90f">
                                                                {{ \App\Utilities\Constant::$order_status_1[$order->status]}}
                                                            </div>
                                                            @break
                                                            @case(5)
                                                            <div class="badge badge-dark" style="background-color: 	#556b2f">
                                                                {{ \App\Utilities\Constant::$order_status_1[$order->status]}}
                                                            </div>
                                                            @break
                                                            @case(6)
                                                            <div class="badge badge-dark" style="background-color: 	#9a32cd">
                                                                {{ \App\Utilities\Constant::$order_status_1[$order->status]}}
                                                            </div>
                                                            @break
                                                            @case(7)
                                                            <div class="badge badge-dark" style="background-color: #cd1076">
                                                                {{ \App\Utilities\Constant::$order_status_1[$order->status]}}
                                                            </div>
                                                            @break

                                                        @default
                                                        <div class="badge badge-dark" style="background-color: red">
                                                            {{ \App\Utilities\Constant::$order_status[$order->status]}}
                                                        </div>
                                                    @endswitch
                                                    
                                                </td>
                                                <td class="text-center">
                                                    <a href="./admin/order/{{$order->id}}"
                                                        class="btn btn-hover-shine btn-outline-primary border-0 btn-sm">
                                                        Chi tiết
                                                    </a>
                                                </td>
                                                <td class="text-center">
                                                    @if($order->status != 0)
                                                    <a href="./admin/order/{{$order->id}}/edit" data-toggle="tooltip" title="Edit"
                                                        data-placement="bottom" class="btn btn-outline-warning border-0 btn-sm">
                                                        <span class="btn-icon-wrapper opacity-8">
                                                            <i class="fa fa-edit fa-w-20"></i>
                                                        </span>
                                                    </a>
                                                    @endif
                                                    @if(Auth::user()->level == '0')
                                                    <form class="d-inline" action="./admin/order/{{$order->id}}" method="post">
                                                        @csrf
                                                        @method('DELETE')

                                                        <button class="btn btn-hover-shine btn-outline-danger border-0 btn-sm"
                                                            type="submit" data-toggle="tooltip" title="Delete"
                                                            data-placement="bottom"
                                                            onclick="return confirm('Do you really want to delete this item?')">
                                                            <span class="btn-icon-wrapper opacity-8">
                                                                <i class="fa fa-trash fa-w-20"></i>
                                                            </span>
                                                        </button>
                                                    </form>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                            
                                        </tbody>
                                    </table>
                                </div>

                                <div class="d-block card-footer">
                                    {{$orders->appends(request()->all())->links()}}
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Main -->

@endsection
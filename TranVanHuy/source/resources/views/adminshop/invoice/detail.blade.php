@extends('adminshop.mastershop')
@section('main')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Chi tiết hóa đơn</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('adminshop.index') }}">Trang chủ</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('adminshop.invoice.index') }}">Hóa đơn</a></li>
                            <li class="breadcrumb-item active">Chi tiết hóa đơn</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="card">
                <div class="card-body">
                    @foreach ($invoices as $invoice)
                        <div>
                            <span>
                                <b>Tên người nhận: </b>{{ $invoice->nameRecipient }}
                            </span>
                        </div>
                        <div>
                            <span>
                                <b>Số điện thoại người nhận: </b>{{ $invoice->phoneRecipient }}
                            </span>
                        </div>
                        <div>
                            <span>
                                <b>Địa chỉ giao hàng: </b>{{ $invoice->deliveryAddress }}
                            </span>
                        </div>
                        <div>
                            <span>
                                <b>Ngày giờ nhận hàng: </b>{{ $invoice->deliveryDate }}
                            </span>
                        </div>
                        <div>
                            <span>
                                <b>Tổng đơn hàng: </b>{{ number_format($invoice->total) }}đ
                            </span>
                        </div>
                    @endforeach
                    <table class="table table-bordered mt-2">
                        <thead>
                            <tr>
                                <th style="width: auto">Hình ảnh</th>
                                <th style="width: auto">Tên sản phẩm</th>
                                <th style="width: auto">Đơn giá</th>
                                <th style="width: auto">Số lượng</th>
                                <th style="width: auto">Tổng tiền sản phẩm</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($detail_invoices as $detail_invoice)
                                @foreach ($products as $product)
                                    @if ($detail_invoice->product_id == $product->id)
                                        <tr>
                                            <td>
                                                <img src="{{ $product->image_path }}" alt="{{ $product->image_name }}"
                                                    width="150px" height="100px">
                                            </td>
                                            <td>{{ $product->name }}</td>
                                            <td>{{ number_format($detail_invoice->price) }}đ</td>
                                            <td>{{ $detail_invoice->amount }}</td>
                                            <td>{{ number_format($detail_invoice->total) }}đ</td>
                                        </tr>
                                    @endif
                                @endforeach
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection

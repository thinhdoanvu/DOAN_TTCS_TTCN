@extends('adminshop.mastershop')
@section('main')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="pl-2">
                        <h1>Trang chủ</h1>
                    </div>
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        @if (session('msg'))
            <div class="alert alert-success">{{ session('msg') }}</div>
        @endif
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <a href="{{ route('adminshop.invoice.index') }}">
                            <div class="small-box bg-info">
                                <div class="inner">
                                    @if ($count_invoice == 0)
                                        <h3>0</h3>
                                    @else
                                        <h3>{{ $count_invoice }}</h3>
                                    @endif
                                    <p>Đơn hàng mới</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-bag"></i>
                                </div>
                            </div>
                        </a>
                    </div><!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <a href="{{ route('adminshop.product.index') }}">
                            <div class="small-box bg-success">
                                <div class="inner">
                                    @if ($count_product == 0)
                                        <h3>0</h3>
                                    @else
                                        <h3>{{ $count_product }}</h3>
                                    @endif
                                    <p>Sản phẩm</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-stats-bars"></i>
                                </div>
                            </div>
                        </a>
                    </div><!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <a href="#" class="small-box-footer">
                            <div class="small-box bg-warning">
                                <div class="inner">
                                    @if ($count_member == 0)
                                        <h3>0</h3>
                                    @else
                                        <h3>{{ $count_member }}</h3>
                                    @endif
                                    <p>Tài khoản người dùng</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-person-add"></i>
                                </div>
                            </div>
                        </a>
                    </div><!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <a href="#">
                            <div class="small-box bg-danger">
                                <div class="inner">
                                    @if ($count_invoiced == 0)
                                        <h3>0</h3>
                                    @else
                                        <h3>{{ $count_invoiced }}</h3>
                                    @endif
                                    <p>Đơn đã thanh toán</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-pie-graph"></i>
                                </div>
                            </div>
                        </a>
                    </div><!-- ./col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
@endsection

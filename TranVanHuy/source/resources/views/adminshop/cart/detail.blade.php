@extends('adminshop.mastershop')
@section('main')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Chi tiết giỏ hàng</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('adminshop.index') }}">Trang chủ</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('adminshop.cart.index') }}">Giỏ hàng</a></li>
                            <li class="breadcrumb-item active">Chi tiết giỏ hàng</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="card">
                {{-- <div class="card-header">
                    <div class="card-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div> --}}
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="width: auto">Hình ảnh</th>
                                <th style="width: auto">Tên sản phẩm</th>
                                <th style="width: auto">Đơn giá</th>
                                <th style="width: auto">Số lượng</th>
                                <th style="width: auto">Tổng</th>
                                <th style="width: auto">Chức năng</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($productIds as $productId)
                                @foreach ($products as $product)
                                    @if ($productId->product_id == $product->id)
                                        <tr>
                                            <td>
                                                <img src="{{ $product->image_path }}" alt="{{ $product->image_name }}"
                                                    width="150px" height="100px">
                                            </td>
                                            <td>{{ $product->name }}</td>
                                            <td>{{ $productId->price }}</td>
                                            <td>{{ $productId->amount }}</td>
                                            <td>{{ $productId->total }}</td>
                                            <td>
                                                <div class="btn-group">
                                                    <abbr title="Xóa">
                                                        <a onclick="return confirm('Bạn có muốn xóa sản phẩm này trong giỏ hàng không?')"
                                                            href=" {{ route('cart.delete', $productId->id) }} ">
                                                            <button type="button" class="btn btn-default btn-sm">
                                                                <i class="fas fa-trash-alt"></i>
                                                            </button>
                                                        </a>
                                                    </abbr>
                                                </div>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            @endforeach
                        </tbody>
                    </table>
                    {{-- <div>
                        {{ $productIds->appends(request()->all())->links() }}
                    </div> --}}
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection

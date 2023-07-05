@extends('adminshop.mastershop')
@section('main')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Sản phẩm</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('adminshop.index') }}">Trang chủ</a></li>
                            <li class="breadcrumb-item active">Sản phẩm</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="card">
                @if (session('msg'))
                    <div class="alert alert-success">{{ session('msg') }}</div>
                @endif
                <div class="card-header">
                    <a href="{{ route('adminshop.product.create') }}">
                        <h3 class="card-title">Thêm mới</h3>
                    </a>
                    <div class="card-tools">
                        <form action="">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" name="key" class="form-control float-right"
                                    placeholder="Tìm kiếm">

                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="width: auto">Tên</th>
                                <th style="width: auto">Ảnh</th>
                                <th style="width: auto">Số lượng</th>
                                <th style="width: auto">Giá</th>
                                <th style="width: auto">Đơn vị tính</th>
                                <th style="width: auto">Mô tả</th>
                                <th style="width: auto">Loại sản phẩm</th>
                                <th style="width: auto">Thương hiệu</th>
                                <th style="width: auto">Nhà cung cấp</th>
                                <th style="width: auto">Tình trạng</th>
                                <th style="width: auto">Chức năng</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($productList))
                                @foreach ($productList as $item)
                                    <tr>
                                        <td>{{ $item['name'] }}</td>
                                        <td>
                                            <img src="{{ $item->image_path }}" alt="{{ $item->image_name }}" width="150px"
                                                height="100px">
                                        </td>
                                        <td>{{ $item['amount'] }}</td>
                                        <td>{{ $item['price'] }}</td>
                                        <td>{{ $item->units->type }}</td>
                                        <td>{{ $item['description'] }}</td>
                                        <td>{{ $item->categories->name }}</td>
                                        <td>{{ $item->trademarks->name }}</td>
                                        <td>{{ $item->suppliers->name }}</td>
                                        <td>
                                            @if ($item['status'] == 1)
                                                <span class="badge badge-info">Còn hàng</span>
                                            @else
                                                <span class="badge badge-info" style="background-color: red">Hết hàng</span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="btn-group">
                                                <abbr title="Sửa dữ liệu">
                                                    <a href="{{ route('adminshop.product.edit', $item['id']) }}"
                                                        class="mr-1">
                                                        <button type="button" class="btn btn-default btn-sm mr-2">
                                                            <i class="nav-icon fas fa-edit"></i>
                                                        </button>
                                                    </a>
                                                </abbr>
                                                <abbr title="Xóa dữ liệu">
                                                    <a onclick="return confirm('Bạn có muốn xóa sản phẩm này không ?')"
                                                        href="{{ route('adminshop.product.delete', $item['id']) }}">
                                                        <button type="button" class="btn btn-default btn-sm">
                                                            <i class="fas fa-trash-alt"></i>
                                                        </button>
                                                    </a>
                                                </abbr>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <td colspan="11">Không có sản phẩm</td>
                            @endif
                        </tbody>
                    </table>
                    <hr>
                    <div>
                        {{ $productList->appends(request()->all())->links() }}
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection

@extends('adminshop.mastershop')
@section('main')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        {{-- <h1>Create_Product</h1> --}}
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('adminshop.index') }}">Trang chủ</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('adminshop.menu.index') }}">Menu</a></li>
                            <li class="breadcrumb-item active">Thêm mới</li>
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
                    <h1 class="card-title">Thêm mới</h1>
                </div>
                <!-- /.card-header -->
                <div class="card card-primary mb-0">
                    <form action="" method="post">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label>Tên menu</label>
                                <input type="text" name="name" class="form-control" placeholder="Enter Menuname" required>
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Thêm</button>
                            <a href="{{ route('adminshop.menu.index') }}">
                                <button type="button" class="btn btn-primary">Quay lại</button>
                            </a>
                        </div>
                    </form>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection

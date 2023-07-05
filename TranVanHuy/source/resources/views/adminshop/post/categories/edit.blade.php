@extends('adminshop.mastershop')
@section('main')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            {{-- <h1>Edit_Product</h1> --}}
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('adminshop.index') }}">Trang chủ</a></li>
              <li class="breadcrumb-item"><a href="{{ route('adminshop.post.category.index') }}">Loại bài viết</a></li>
              <li class="breadcrumb-item active">Chỉnh sửa</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="card">
        <div class="card-header">
          <h1 class="card-title">Chỉnh sửa</h1>
        </div>
        <!-- /.card-header -->
        <div class="card card-primary mb-0">
          <form action="" method="post">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label>Tên loại</label>
                    <input type="text" name="name" class="form-control" placeholder="Enter Name" value="{{$result->name}}" required>
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Lưu</button>
              <a href="{{ route('adminshop.post.category.index') }}">
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

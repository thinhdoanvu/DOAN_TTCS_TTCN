@extends('adminshop.mastershop')
@section('main')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Thêm mới</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('adminshop.index') }}">Trang chủ</a></li>
              <li class="breadcrumb-item"><a href="{{ route('adminshop.product.index') }}">Sản phẩm</a></li>
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
          <div class="alert alert-success">{{session('msg')}}</div>
        @endif
        <div class="card card-primary mb-0">
            <form action="" method="post" enctype="multipart/form-data">
              @csrf
              <div class="card-body">
                <div class="row">
                  <div class="col-6">
                    <div class="form-group">
                      <label>Tên sản phẩm</label>
                      <input type="text" class="form-control" name="name" placeholder="Enter Name" value="{{old('name')}}" required>
                    </div>
                    <div class="form-group">
                      <label>Ảnh sản phẩm</label>
                      <input type="file" name="image_path" class="form-control-file">
                    </div>
                    <div class="form-group">
                        <label>Số lượng</label>
                        <input type="number" class="form-control" name="amount" value="0" required>
                    </div>
                    <div class="form-group">
                        <label>Giá</label>
                        <input type="text" class="form-control" name="price" placeholder="Enter Price" required>
                    </div>
                    
                    <div class="form-group">
                      <label>Mô tả</label>
                      <textarea name="description" class="form-control" rows="4">{{old('description')}}</textarea>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-group">
                      <label>Đơn vị tính</label>
                      <select class="form-control" name="id_unit">
                        <option value="0">Chọn đơn vi tính</option>
                        @foreach ($units as $unit)
                          <option value="{{$unit->id}}">
                            {{$unit['type']}}
                          </option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Loại sản phẩm</label>
                      <select class="form-control" name="id_cate">
                        <option value="0">Chọn loại sản phẩm</option>
                        @foreach ($categories as $category)
                          <option value="{{$category->id}}">
                            {{$category['name']}}
                          </option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Thương hiệu</label>
                      <select class="form-control" name="id_trademark">
                        <option value="0">Chọn thương hiệu</option>
                        @foreach ($trademarks as $trademark)
                          <option value="{{$trademark->id}}">
                            {{$trademark['name']}}
                          </option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                        <label>Nhà cung cấp</label>
                        <select class="form-control" name="id_suppli">
                          <option value="0">Chọn nhà cung cấp</option>
                          @foreach ($suppliers as $supplier)
                            <option value="{{$supplier->id}}">
                              {{$supplier['name']}}
                            </option>
                          @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                      <label>Tình trạng</label>
                      <div>
                        <div>
                          <input type="radio" name="status" value="1">
                          <label>Còn hàng</label>
                        </div>
                        <input type="radio" name="status" value="0">
                        <label>Hết hàng</label>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Thêm</button>
                <a href="{{ route('adminshop.product.index') }}">
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
@extends('adminshop.mastershop')
@section('main')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Chỉnh sửa</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('adminshop.index') }}">Trang chủ</a></li>
              <li class="breadcrumb-item"><a href="{{ route('adminshop.product.index') }}">Sản phẩm</a></li>
              <li class="breadcrumb-item active">Chỉnh sửa</li>
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

        @if ($errors->any())
          <div class="alert alert-danger">Dữ liệu nhập vào không hợp lệ. Vui lòng kiểm tra lại</div>
        @endif

        <div class="card card-primary mb-0">
          {{-- <form action="" method="post">
            @csrf
            <div class="card-body">
              <div class="form-group">
                <label for="exampleInputProduct_Name1">Name</label>
                <input type="text" class="form-control" name="name" id="exampleInputProduct_Name1" placeholder="Enter Name" value="{{$productDetail->name}}">
              </div>
              <div class="form-group">
                <label for="exampleInputFile">Img</label>
                <div class="input-group">
                  <div class="custom-file">
                    <input type="file" name="image" id="exampleInputFile" value="{{$productDetail->image}}">
                  </div>
                </div>
              </div>
              <div class="form-group">
                  <label for="exampleInputAmount1">Amount</label>
                  <input type="text" class="form-control" name="amount" id="exampleInputAmount1" placeholder="Enter Amount" value="{{$productDetail->amount}}">
              </div>
              <div class="form-group">
                  <label for="exampleInputPrice1">Price</label>
                  <input type="text" class="form-control" name="price" id="exampleInputPrice1" placeholder="Enter Price" value="{{$productDetail->price}}">
              </div>
              <div class="form-group">
                  <label for="exampleSelectCategory0">Category</label>
                  <select class="custom-select rounded-0" name="category" id="exampleSelectCategory0" value="{{$productDetail->category}}">
                    <option @if($productDetail->category == 'Apple') selected @endif>Apple</option>
                    <option @if($productDetail->category == 'Orange') selected @endif>Orange</option>
                    <option @if($productDetail->category == 'Guava') selected @endif>Guava</option>
                  </select>
              </div>
              <div class="form-group">
                  <label for="exampleSelectSupplier0">Supplier</label>
                  <select class="custom-select rounded-0" name="supplier" id="exampleSelectSupplier0" value="{{$productDetail->supplier}}">
                    <option @if($productDetail->supplier == 'Dam Market') selected @endif>Dam Market</option>
                    <option @if($productDetail->supplier == 'Xom Moi Market') selected @endif>Xom Moi Market</option>
                    <option @if($productDetail->supplier == 'Vinh Hai Market') selected @endif>Vinh Hai Market</option>
                  </select>
              </div>
              <div class="form-group">
                <label for="exampleSelectSupplier0">Status</label>
                <select class="custom-select rounded-0" name="status" id="exampleSelectSupplier0" value="{{$productDetail->status}}">
                  <option @if($productDetail->status == 'Stocking') selected @endif>Stocking</option>
                  <option @if($productDetail->status == 'Out Of Stock') selected @endif>Out Of Stock</option>
                </select>
              </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Save</button>
              <a href="{{ route('adminshop.product.index') }}">
                  <button type="button" class="btn btn-primary">Back</button>
              </a>
            </div>
          </form> --}}
          <form action="" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
              <div class="row">
                <div class="col-6">
                  <div class="form-group">
                    <label>Tên sản phẩm</label>
                    <input type="text" class="form-control" name="name" placeholder="Enter Name" value="{{$productDetail->name}}" required>
                  </div>
                  <div class="form-group">
                    <label>Ảnh sản phẩm</label>
                    <input type="file" name="image_path" class="form-control-file">
                    <div class="col-md-4 mt-2">
                        <div class="row">
                            <img src="{{$productDetail->image_path}}" width="150px" height="100px" alt="{{$productDetail->image_name}}">
                        </div>
                    </div>
                  </div>
                  <div class="form-group">
                      <label>Số lượng</label>
                      <input type="number" class="form-control" name="amount" value="{{$productDetail->amount}}" required>
                  </div>
                  <div class="form-group">
                      <label>Giá</label>
                      <input type="text" class="form-control" name="price" placeholder="Enter Price" value="{{$productDetail->price}}" required>
                  </div>
                  <div class="form-group">
                    <label>Mô tả</label>
                    <textarea name="description" class="form-control" rows="4">{{$productDetail->description}}</textarea>
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-group">
                    <label>Đơn vị tính</label>
                    <select class="form-control" name="id_unit">
                      <option value="0">Chọn đơn vi tính</option>
                      @foreach ($units as $unit)
                        <option value="{{$unit->id}}" @if($productDetail->id_unit == $unit->id) selected @endif>
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
                        <option value="{{$category->id}}" @if($productDetail->id_cate == $category->id) selected @endif>
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
                        <option value="{{$trademark->id}}" @if($productDetail->id_trademark == $trademark->id) selected @endif>
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
                          <option value="{{$supplier->id}}" @if($productDetail->id_suppli == $supplier->id) selected @endif>
                            {{$supplier['name']}}
                          </option>
                        @endforeach
                      </select>
                  </div>
                  <div class="form-group">
                    <label>Tình trạng</label>
                    <div>
                      <div>
                        <input type="radio" name="status" value="1" @if($productDetail->status == 1) checked @endif>
                        <label>Còn hàng</label>
                      </div>
                      <input type="radio" name="status" value="0" @if($productDetail->status == 0) checked @endif>
                      <label>Hết hàng</label>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Lưu</button>
              <a href="{{ route('adminshop.product.index') }}">
                  <button type="button" class="btn btn-primary">Back</button>
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
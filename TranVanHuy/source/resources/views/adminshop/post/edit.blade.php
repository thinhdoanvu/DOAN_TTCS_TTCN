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
                            <li class="breadcrumb-item"><a href="{{ route('adminshop.post.index') }}">Bài viết</a></li>
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
                    <form action="" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-3">
                                <div class="card card-danger">
                                    <div class="card-header">
                                        <h3 class="card-title">Loại bài viết</h3>
                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        @foreach ($postcategories as $postcategory)
                                            <input type="checkbox" name="postcate[]" value="{{ $postcategory->id }}"
                                                {{ in_array($postcategory->id, $option) ? 'checked' : null }}>
                                            {{ $postcategory->name }}<br />
                                        @endforeach
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <!-- /.card -->
                            </div>
                            <!-- /.col (left) -->
                            <div class="col-md-9">
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h3 class="card-title">Bài viết</h3>
                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label>Tiêu đề</label>
                                            <input type="text" name="title" class="form-control"
                                                placeholder="Enter Title" value="{{ $result->title }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Ảnh giao diện</label>
                                            <input type="file" name="imagePath" class="form-control-file" required>
                                            <div class="col-md-4 mt-2">
                                                <div class="row">
                                                    <img src="{{ $result->imagePath }}" width="150px" height="100px"
                                                        alt="Image">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Tên người đăng bài</label>
                                            <input type="text" name="posterName" class="form-control"
                                                placeholder="Enter Postername" value="{{ $result->posterName }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Nội dung</label>
                                            <textarea name="content" class="form-control my-editor" rows="4" required>{{ $result->content }}</textarea>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <!-- /.card -->
                            </div>
                            <!-- /.col (right) -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Lưu</button>
                                <a href="{{ route('adminshop.post.index') }}">
                                    <button type="button" class="btn btn-primary">Quay lại</button>
                                </a>
                            </div>
                        </div>
                        <!-- /.card-body -->
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

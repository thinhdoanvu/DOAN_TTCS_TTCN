@extends('adminshop.mastershop')
@section('main')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Bài viết</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('adminshop.index') }}">Trang chủ</a></li>
                            <li class="breadcrumb-item active">Bài viết</li>
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
                    <a href="{{ route('adminshop.post.create') }}">
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
                                <th style="width: auto">Tiêu đề</th>
                                <th style="width: auto">Hình ảnh</th>
                                <th style="width: auto">Tên người đăng bài</th>
                                <th style="width: auto">Loại</th>
                                <th style="width: auto">Thời gian tạo bài</th>
                                <th style="width: auto">Chức năng</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (!empty($posts))
                                @foreach ($posts as $post)
                                    <tr>
                                        <td>{{ $post['title'] }}</td>
                                        <td>
                                            <img src="{{ $post->imagePath }}" width="150px" height="100px" alt="Image">
                                        </td>
                                        <td>{{ $post['posterName'] }}</td>
                                        <td>
                                            @foreach ($post->postcategories as $item)
                                                <span class="badge badge-info">{{ $item['name'] }}</span>
                                            @endforeach
                                        </td>
                                        <td>{{ date('l, F d, Y', strtotime($post['created_at'])) }}</td>
                                        <td>
                                            <div class="btn-group">
                                                <abbr title="Sửa dữ liệu">
                                                    <a href="{{ route('adminshop.post.edit', $post['id']) }}">
                                                        <button type="button" class="btn btn-default btn-sm mr-2">
                                                            <i class="nav-icon fas fa-edit"></i>
                                                        </button>
                                                    </a>
                                                </abbr>
                                                <abbr title="Xóa dữ liệu">
                                                    <a onclick="return confirm('Bạn có muốn xóa bài viết này?')"
                                                        href="{{ route('adminshop.post.delete', $post['id']) }}">
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
                                <tr>
                                    <td colspan="6">Không có bài viết</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                    <hr>
                    <div>
                        {{ $posts->appends(request()->all())->links() }}
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

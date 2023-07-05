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
                            <li class="breadcrumb-item"><a href="{{ route('adminshop.menu.index') }}">Menu</a></li>
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
                    <div class="alert alert-success">{{ session('msg') }}</div>
                @endif
                {{-- <div class="card-header">
          <h1 class="card-title">Edit Menu</h1>
        </div> --}}
                <!-- /.card-header -->
                <form action="" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card card-danger">
                                <div class="card-header">
                                    <h3 class="card-title">Menu</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Tên menu</label>
                                        <input type="text" name="menuname" class="form-control" placeholder="Enter Name"
                                            value="{{ $result->name }}" required >
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->

                            <div class="card card-info">
                                <div class="card-header">
                                    <h3 class="card-title">Vị trí</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    @foreach ($optionSelect3 as $key => $value)
                                        @if ($menulocations->count() != 0)
                                            @foreach ($menulocations as $item)
                                                <input class="mr-1" type="checkbox" name="pos" value="{{ $key }}"
                                                    {{ $item->pos == $key ? 'checked' : '' }}>
                                                {{ $value }}<br />
                                            @endforeach
                                        @else
                                            <input class="mr-1" type="checkbox" name="pos"
                                                value="{{ $key }}">{{ $value }}<br />
                                        @endif
                                    @endforeach
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col (left) -->
                        <div class="col-md-6">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Menu Note</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row">

                                        <div class="col-md-3">
                                            <div class="card-tools mb-2">
                                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                                    data-target="#exampleModal">
                                                    Thêm mới
                                                </button>
                                            </div>
                                        </div>
                                        <div class="col-md-9">
                                        </div>
                                    </div>
                                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Thêm mới</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="" method="post">
                                                        @csrf
                                                        <div class="card-body">
                                                            <div class="form-group">
                                                                <label>Tên Menunote</label>
                                                                <input type="text" name="name" class="form-control"
                                                                    placeholder="Enter Menunote Name" required >
                                                            </div>

                                                            <div class="form-group">
                                                                <label>Chọn Menu cha</label>
                                                                <select class="form-control" name="parent_id">
                                                                    <option value="0">Chọn menu cha</option>
                                                                    @foreach ($optionSelect4 as $val)
                                                                        <option value="{{ $val->id }}">
                                                                            @php
                                                                                $str = '';
                                                                                for ($i = 0; $i < $val->level; $i++) {
                                                                                    echo $str;
                                                                                    $str = '--';
                                                                                }
                                                                            @endphp
                                                                            {{ $val->name }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <!-- /.card-body -->
                                                        <div class="modal-footer">
                                                            <input type="submit" class="btn btn-primary"
                                                                name="addmenunote" value="Thêm">
                                                            {{-- <button type="submit" class="btn btn-primary" name="Save">Save</button> --}}
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Đóng</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th style="width: auto">Tên Menunote</th>
                                                <th style="width: auto">Chức năng</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if (!empty($menunotes))
                                                {{-- for cha --}}
                                                @foreach ($menunotes as $item)
                                                    <tr>
                                                        <td>{{ $item->name }}</td>
                                                        <td>
                                                            <div class="btn-group">
                                                                <abbr title="Sửa dữ liệu">
                                                                    <button type="button"
                                                                        class="btn btn-default btn-sm mr-2"
                                                                        data-target="#exampleModal1{{ $item->id }}"
                                                                        data-toggle="modal">
                                                                        <i class="nav-icon fas fa-edit"></i>
                                                                    </button>
                                                                </abbr>
                                                                <div class="modal fade"
                                                                    id="exampleModal1{{ $item->id }}" tabindex="-1"
                                                                    role="dialog" aria-labelledby="exampleModalLabel"
                                                                    aria-hidden="true">
                                                                    <div class="modal-dialog" role="document">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title"
                                                                                    id="exampleModalLabel">Sửa Menunote
                                                                                </h5>
                                                                                <button type="button" class="close"
                                                                                    data-dismiss="modal"
                                                                                    aria-label="Close">
                                                                                    <span aria-hidden="true">&times;</span>
                                                                                </button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <form
                                                                                    action="{{ route('adminshop.menu.edit', $item['menu_id']) }}"
                                                                                    method="post">
                                                                                    @csrf
                                                                                    <input type="hidden" name="noteid"
                                                                                        id="noteid"
                                                                                        value="{{ $item->id }}" />

                                                                                    <div class="card-body">
                                                                                        <div class="form-group">
                                                                                            <label>Tên Menunote</label>
                                                                                            <input type="text"
                                                                                                name="menunotename"
                                                                                                id="menunotename"
                                                                                                class="form-control"
                                                                                                placeholder="Enter Menunote Name"
                                                                                                value="{{ $item->name }}"
                                                                                                required >
                                                                                        </div>
                                                                                        <div class="form-group">
                                                                                            <label>Chọn Menu cha</label>
                                                                                            <select class="form-control"
                                                                                                name="parent_id"
                                                                                                id="parent_id">
                                                                                                <option value="0">Danh
                                                                                                    mục cha</option>
                                                                                                @foreach ($optionSelect4 as $val)
                                                                                                    <option
                                                                                                        {{ $item->parent_id == $val->id ? 'selected' : '' }}
                                                                                                        value="{{ $val->id }}">
                                                                                                        @php
                                                                                                            $str = '';
                                                                                                            for ($i = 0; $i < $val->level; $i++) {
                                                                                                                echo $str;
                                                                                                                $str = '--';
                                                                                                            }
                                                                                                        @endphp
                                                                                                        {{ $val->name }}
                                                                                                    </option>
                                                                                                @endforeach
                                                                                            </select>
                                                                                        </div>
                                                                                    </div>

                                                                                    <!-- /.card-body -->
                                                                                    <div class="modal-footer">
                                                                                        <input type="submit"
                                                                                            class="btn btn-primary"
                                                                                            name="editmenunote"
                                                                                            value="Lưu">
                                                                                        <button type="button"
                                                                                            class="btn btn-secondary"
                                                                                            data-dismiss="modal">Đóng</button>
                                                                                    </div>
                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <abbr title="Xóa dữ liệu">
                                                                    <a onclick="return confirm('Bạn có muốn xóa menunote này không?')"
                                                                        href="{{ route('adminshop.menu.deletenote', $item['id']) }}">
                                                                        <button type="button"
                                                                            class="btn btn-default btn-sm"
                                                                            name="deletemenunote">
                                                                            <i class="fas fa-trash-alt"></i>
                                                                        </button>
                                                                    </a>
                                                                </abbr>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @else
                                                <td>Không có Menunote</td>
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col (right) -->
                        <div class="card-footer">
                            <input type="submit" class="btn btn-primary" name="savemenu" value="Lưu">
                            <a href="{{ route('adminshop.menu.index') }}">
                                <button type="button" class="btn btn-primary">Quay lại</button>
                            </a>
                        </div>
                    </div>
                </form>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection

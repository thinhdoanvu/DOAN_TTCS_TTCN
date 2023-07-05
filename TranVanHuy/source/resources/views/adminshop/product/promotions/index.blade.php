@extends('adminshop.mastershop')
@section('main')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Khuyến mãi</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('adminshop.index') }}">Trang chủ</a></li>
                            <li class="breadcrumb-item active">Khuyến mãi</li>
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
                    <a href="{{ route('adminshop.promotion.create') }}">
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
                                <th style="width: auto">#</th>
                                <th style="width: auto">Tên chương trình</th>
                                <th style="width: auto">Loại chương trình</th>
                                <th style="width: auto">Mức giảm</th>
                                <th style="width: auto">Thời gian bắt đầu</th>
                                <th style="width: auto">Thời gian kết thúc</th>
                                <th style="width: auto">Hoạt động</th>
                                <th style="width: auto">Chức năng</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($promotion))
                                @foreach ($promotion as $item)
                                    <tr>
                                        <td>{{ $item['id'] }}</td>
                                        <td>{{ $item['name'] }}</td>
                                        <td>{{ $item['type'] }}</td>
                                        <td>{{ $item['discount_rate'] }}
                                            @if ($item['type'] === 'Giảm theo %')
                                                %
                                            @else
                                                đ
                                            @endif
                                        </td>
                                        <td>{{ $item['date_start'] }}</td>
                                        <td>{{ $item['date_end'] }}</td>
                                        <td>
                                            <input type="hidden" name="id_promotion" value="{{ $item['id'] }}">
                                            <input type="hidden" id="active-input-{{ $item['id'] }}" name="active-input"
                                                value="{{ $item->active }}">
                                            <input type="button" id="active-button-{{ $item['id'] }}"
                                                data-id="{{ $item['id'] }}" class="toggle-active-btn"
                                                name="button_active"
                                                value="{{ $item->active == 1 ? 'Turn On' : 'Turn Off' }}"
                                                style="{{ $item->active == 1 ? 'background-color: Lime' : 'background-color: #FF6A6A' }}">
                                        </td>
                                        <td>
                                            <div class="btn-group">
                                                <abbr title="Sửa">
                                                    <a href="{{ route('adminshop.promotion.edit', $item['id']) }}"
                                                        class="mr-1">
                                                        <button type="button" class="btn btn-default btn-sm mr-2">
                                                            <i class="nav-icon fas fa-edit"></i>
                                                        </button>
                                                    </a>
                                                </abbr>
                                                <abbr title="Xóa">
                                                    <a onclick="return confirm('Bạn có muốn xóa chương trình khuyến mãi này không ?')"
                                                        href="{{ route('adminshop.promotion.delete', $item['id']) }}">
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
                                <td colspan="8">Không có chương trình khuyến mãi</td>
                            @endif
                        </tbody>
                    </table>
                    <hr>
                    <div>
                        {{ $promotion->appends(request()->all())->links() }}
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <script>
        var buttons = document.querySelectorAll(".toggle-active-btn");
        buttons.forEach(function(button) {
            button.addEventListener("click", function() {
                var id = this.getAttribute("data-id");
                var input = document.getElementById("active-input-" + id);
                var active = input.value === "1" ? "0" : "1";
                input.value = input.value === "1" ? "0" : "1";

                $.ajax({
                    url: "/adminshop/promotions/",
                    method: "POST",
                    data: {
                        _token: "{{ csrf_token() }}",
                        id_promotion: id,
                        active: active,
                    },
                    success: function(response) {
                        var button = document.getElementById("active-button-" + id);
                        if (input.value === "1") {
                            button.style = "background-color: Lime";
                            button.value = "Turn On";
                        } else {
                            button.style = "background-color: #FF6A6A";
                            button.value = "Turn Off";
                        }
                    },
                });
            });
        });
    </script>
@endsection

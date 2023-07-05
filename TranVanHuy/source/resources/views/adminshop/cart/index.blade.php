@extends('adminshop.mastershop')
@section('main')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Giỏ hàng</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('adminshop.index') }}">Trang chủ</a></li>
                            <li class="breadcrumb-item active">Giỏ hàng</li>
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
                                <th style="width: auto">Tên người dùng</th>
                                <th style="width: auto">Số điện thoại</th>
                                <th style="width: auto">Địa chỉ</th>
                                <th style="width: auto">Email</th>
                                <th style="width: auto">Chức năng</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (!empty($memberIds))
                                @foreach ($memberIds as $memberId)
                                    @foreach ($members as $member)
                                        @if ($memberId == $member->id)
                                            <tr>
                                                <td>{{ $member->full_name }}</td>
                                                <td>{{ $member->phone }}</td>
                                                <td>{{ $member->address }}</td>
                                                <td>{{ $member->email }}</td>
                                                <td>
                                                    <div class="btn-group">
                                                        <abbr title="Xem giỏ hàng">
                                                            <a href="{{ route('adminshop.cart.detail', $memberId) }}">
                                                                <button type="button" class="btn btn-default btn-sm">
                                                                    <i class="fas fa-eye"></i>
                                                                </button>
                                                            </a>
                                                        </abbr>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                @endforeach
                            @else
                                <td colspan="5">Không có giỏ hàng</td>
                            @endif
                        </tbody>
                    </table>
                    {{-- <div>
                        {{ $memberIds->appends(request()->all())->links() }}
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

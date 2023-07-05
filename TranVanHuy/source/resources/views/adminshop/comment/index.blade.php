@extends('adminshop.mastershop')
@section('main')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Bình luận</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('adminshop.index') }}">Trang chủ</a></li>
              <li class="breadcrumb-item active">Bình luận</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="card">
        <div class="card-header">
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
                    <th style="width: auto">Tên người bình luận</th>
                    <th style="width: auto">Nội dung</th>
                    <th style="width: auto">Vị trí</th>
                    <th style="width: auto">Thời điểm bình luận</th>
                    <th style="width: auto">Chức năng</th>
                  </tr>
                </thead>
                <tbody>
                  @if (!empty($cmts))
                    @foreach ($cmts as $cmt)
                      <tr>
                        <td>{{$cmt->user->full_name}}</td>
                        <td>{{$cmt['body']}}</td>
                        <td>{{Illuminate\Support\Str::substr($cmt['commentable_type'], 11)}}</td>
                        <td>{{date('l, F d, Y',strtotime($cmt['created_at']))}}</td>
                        <td>
                          <div class="btn-group">
                            <abbr title="Xóa dữ liệu">
                              <a onclick="return confirm('Do you want to delete this comment?')" href="{{ route('adminshop.comment.delete', $cmt['id'])}}">
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
                      <td colspan="5">Không có bình luận</td>
                  @endif
                </tbody>
              </table>
              <hr>
            <div>
              {{$cmts->appends(request()->all())->links()}}
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

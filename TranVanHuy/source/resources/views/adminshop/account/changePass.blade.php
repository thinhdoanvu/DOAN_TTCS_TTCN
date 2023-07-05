@extends('adminshop.mastershop')
@section('main')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><i class="fas fa-key"></i> Đổi mật khẩu</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('adminshop.index') }}">Trang chủ</a></li>
              <li class="breadcrumb-item active">Đổi mật khẩu</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
                @if (session('msg'))
                    <div class="alert alert-success">{{session('msg')}}</div>
                @endif
              <!-- form start -->
              <form action="" id="quickForm" method="post">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="curentPass">Mật khẩu hiện tại</label>
                    <input type="password" name="curentpass" class="form-control" id="curentPass" placeholder="Enter Curent Password">
                  </div>
                  <div class="form-group">
                    <label for="newPass">Mật khẩu mới</label>
                    <input type="password" name="newpass" class="form-control" id="newPass" placeholder="Enter New Password">
                  </div>
                  <div class="form-group">
                    <label for="confirmNewpass">Nhập lại mật khẩu mới</label>
                    <input type="password" name="confirmnewpass" class="form-control" id="confirmNewpass" placeholder="Confirm New Password">
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Lưu</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
            </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">
          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection
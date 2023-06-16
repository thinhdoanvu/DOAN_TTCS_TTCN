@extends('admin.layout.master')
@section('body')

                <!-- Main -->
                <div class="app-main__inner">

                    <div class="app-page-title">
                        <div class="page-title-wrapper">
                            <div class="page-title-heading">
                                <div class="page-title-icon">
                                    <i class="pe-7s-ticket icon-gradient bg-mean-fruit"></i>
                                </div>
                                <div>
                                    Cài đặt Frontend
                                    <div class="page-title-subheading">
                                        View, create, update, delete and manage.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="main-card mb-3 card">
                                <div class="card-body">
                                    <form method="post" action="{{route('addSetting')}}" enctype="multipart/form-data">
                                        @csrf
                                        @include('admin.components.notification')
                                        
                                        <div class="position-relative row form-group">
                                            <label for="image"
                                                class="col-md-3 text-md-right col-form-label">Logo</label>
                                            <div class="col-md-9 col-xl-8">
                                                <img style="height: 40px; cursor: pointer;"
                                                    class="thumbnail rounded-circle" data-toggle="tooltip"
                                                    title="Click to change the image" data-placement="bottom"
                                                    src="admin/img/logo/{{$result['logo']}}" alt="Logo">
                                                <input name="image" type="file" onchange="changeImg(this)"
                                                    class="image form-control-file" style="display: none;" value="{{$result['logo']}}">
                                                <input type="hidden" name="image_old" value="{{$result['logo']}}">
                                                <small class="form-text text-muted">
                                                    Click on the image to change (required)
                                                </small>
                                            </div>
                                        </div>

                                        <div class="position-relative row form-group">
                                            <label class="col-md-3 text-md-right col-form-label">Khẩu hiệu</label>
                                            <div class="col-md-9 col-xl-8">
                                                <input required name="slogan" type="text"
                                                    class="form-control" value="{{$result['slogan']}}">
                                            </div>
                                        </div>

                                        <div class="position-relative row form-group">
                                            <label
                                                class="col-md-3 text-md-right col-form-label">Địa chỉ</label>
                                            <div class="col-md-9 col-xl-8">
                                                <input required name="address" type="text"
                                                    class="form-control" value="{{$result['address']}}">
                                            </div>
                                        </div>

                                        <div class="position-relative row form-group">
                                            <label
                                                class="col-md-3 text-md-right col-form-label">Số điện thoại 1</label>
                                            <div class="col-md-9 col-xl-8">
                                                <input name="phone1" type="text"
                                                    class="form-control" value="{{$result['phone1']}}">
                                            </div>
                                        </div>
                                        <div class="position-relative row form-group">
                                            <label
                                                class="col-md-3 text-md-right col-form-label">Số điện thoại 2</label>
                                            <div class="col-md-9 col-xl-8">
                                                <input name="phone2" type="text"
                                                    class="form-control" value="{{$result['phone2']}}">
                                            </div>
                                        </div>

                                        <div class="position-relative row form-group">
                                            <label class="col-md-3 text-md-right col-form-label">
                                                Email 1
                                            </label>
                                            <div class="col-md-9 col-xl-8">
                                                <input name="email1" type="email" class="form-control"
                                                    value="{{$result['email1']}}">
                                            </div>
                                        </div>
                                        <div class="position-relative row form-group">
                                            <label class="col-md-3 text-md-right col-form-label">
                                                Email 2
                                            </label>
                                            <div class="col-md-9 col-xl-8">
                                                <input name="email2" type="email" class="form-control"
                                                    value="{{$result['email2']}}">
                                            </div>
                                        </div>
                                        <div class="position-relative row form-group">
                                            <label class="col-md-3 text-md-right col-form-label">
                                                Copyright
                                            </label>
                                            <div class="col-md-9 col-xl-8">
                                                <input name="copyright" type="text" class="form-control"
                                                    value="{{$result['copyright']}}">
                                            </div>
                                        </div>

                                           
                                        <div class="position-relative row form-group mb-1">
                                            <div class="col-md-9 col-xl-8 offset-md-2">
                                                <button type="submit"
                                                    class="btn-shadow btn-hover-shine btn btn-primary">
                                                    <span class="btn-icon-wrapper pr-2 opacity-8">
                                                        <i class="fa fa-download fa-w-20"></i>
                                                    </span>
                                                    <span>Lưu</span>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Main -->

@endsection
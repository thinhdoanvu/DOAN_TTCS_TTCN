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
                                    Người dùng
                                    <div class="page-title-subheading">
                                        Xem, tạo, cập nhật, xóa và quản lý.                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    @if(Auth::user()->level == '0')
                    <ul class="body-tabs body-tabs-layout tabs-animated body-tabs-animated nav">
                        <li class="nav-item">
                            <a href="./admin/user/{{ $user->id }}/edit" class="nav-link">
                                <span class="btn-icon-wrapper pr-2 opacity-8">
                                    <i class="fa fa-edit fa-w-20"></i>
                                </span>
                                <span>Chỉnh sửa</span>
                            </a>
                        </li>

                        <li class="nav-item delete">
                            <form action="" method="post">
                                <button class="nav-link btn" type="submit"
                                    onclick="return confirm('Bạn chắc chắn muốn xóa?')">
                                    <span class="btn-icon-wrapper pr-2 opacity-8">
                                        <i class="fa fa-trash fa-w-20"></i>
                                    </span>
                                    <span>Xóa</span>
                                </button>
                            </form>
                        </li>
                    </ul>
                    @endif
                    <div class="row">
                        <div class="col-md-12">
                            <div class="main-card mb-3 card">
                                <div class="card-body display_data">
                                    <div class="position-relative row form-group">
                                        <label for="image" class="col-md-3 text-md-right col-form-label">Avatar</label>
                                        <div class="col-md-9 col-xl-8">
                                            <p>
                                                <img style="height: 200px;" class="rounded-circle" data-toggle="tooltip"
                                                    title="Avatar" data-placement="bottom"
                                                    src="front/img/user/{{ $user->avatar ?? 'no-images.jpg' }}" alt="Avatar">
                                            </p>
                                        </div>
                                    </div>

                                    <div class="position-relative row form-group">
                                        <label for="name" class="col-md-3 text-md-right col-form-label">
                                            Tên
                                        </label>
                                        <div class="col-md-9 col-xl-8">
                                            <p>{{$user->name}}</p>
                                        </div>
                                    </div>

                                    <div class="position-relative row form-group">
                                        <label for="email" class="col-md-3 text-md-right col-form-label">Email</label>
                                        <div class="col-md-9 col-xl-8">
                                            <p>{{$user->email}}</p>
                                        </div>
                                    </div>



                                    <div class="position-relative row form-group">
                                        <label for="street_address" class="col-md-3 text-md-right col-form-label">
                                            Địa chỉ</label>
                                        <div class="col-md-9 col-xl-8">
                                            <p>{{$user->street_address}} - {{$user->xaphuongthitran->name_xaphuong ?? ''}} - {{$user->quanhuyen->name_quanhuyen ?? ''}} - {{$user->tinhthanhpho->name_city ?? ''}}</p>
                                        </div>
                                    </div>




                                    <div class="position-relative row form-group">
                                        <label for="phone" class="col-md-3 text-md-right col-form-label">Số điện thoại</label>
                                        <div class="col-md-9 col-xl-8">
                                            <p>{{$user->phone}}</p>
                                        </div>
                                    </div>

                                    <div class="position-relative row form-group">
                                        <label for="level" class="col-md-3 text-md-right col-form-label">Cấp độ</label>
                                        <div class="col-md-9 col-xl-8">
                                            <p>{{ \App\Utilities\Constant::$user_level[$user->level] }}</p>
                                        </div>
                                    </div>

                                    <div class="position-relative row form-group">
                                        <label for="description"
                                            class="col-md-3 text-md-right col-form-label">Tổng tiền đã mua</label>
                                        <div class="col-md-9 col-xl-8">
                                            <p>{{$user->total ?? 0}}đ</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Main -->

 @endsection
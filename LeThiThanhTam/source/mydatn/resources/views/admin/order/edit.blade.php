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
                                    Đơn hàng
                                    <div class="page-title-subheading">
                                        Xem, tạo, cập nhật, xóa và quản lý.                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="main-card mb-3 card">
                                <div class="card-body">
                                    <form method="post" action="admin/order/{{$orders->id}}" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')

                                        <div class="position-relative row form-group">
                                            <label for="status"
                                                class="col-md-3 text-md-right col-form-label">Tình trạng</label>
                                            <div class="col-md-9 col-xl-8">
                                                <select required name="status" id="status" class="form-control">
                                                    <option value="">-- Chọn một --</option>
                                                        @switch($orders->status)
                                                            @case(1)
                                                            @php
                                                                $arrStatus = \App\Utilities\Constant::$order_status_1;
                                                            @endphp
                                                                
                                                                @break
                                                            @case(2)
                                                                
                                                                @break
                                                            @default
                                                                
                                                        @endswitch
                                                    @foreach(\App\Utilities\Constant::$order_status_1 as $key => $value)
                                                        <option value={{ $key }} {{ $orders->status == $key ? 'selected' : ''}}>
                                                            {{$value}}
                                                        </option>
                                                    @endforeach

                                                </select>
                                            </div>
                                        </div>

                                        <div class="position-relative row form-group mb-1">
                                            <div class="col-md-9 col-xl-8 offset-md-2">
                                                <a href="./admin/order" class="border-0 btn btn-outline-danger mr-1">
                                                    <span class="btn-icon-wrapper pr-1 opacity-8">
                                                        <i class="fa fa-times fa-w-20"></i>
                                                    </span>
                                                    <span>Thoát</span>
                                                </a>

                                                <button type="submit"
                                                    class="btn-shadow btn-hover-shine btn btn-primary">
                                                    <span class="btn-icon-wrapper pr-2 opacity-8">
                                                        <i class="fa fa-download fa-w-20"></i>
                                                    </span>
                                                    <span>Lưu lại</span>
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
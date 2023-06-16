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
                                    Mã giảm giá
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
                                    <form method="post" action="admin/coupon/{{$coupon->id}}" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')

                                        <div class="position-relative row form-group">
                                            <label for="name" class="col-md-3 text-md-right col-form-label">Tên mã giảm giá</label>
                                            <div class="col-md-9 col-xl-8">
                                                <input required name="name" id="name" type="text"
                                                    class="form-control" value="{{$coupon->name}}">
                                            </div>
                                        </div>
                                        <div class="position-relative row form-group">
                                            <label for="date_start" class="col-md-3 text-md-right col-form-label">Ngày bắt đầu</label>
                                            <div class="col-md-9 col-xl-8">
                                                <input required name="date_start" id="date_start" type="text"
                                                    class="form-control" value="{{$coupon->date_start}}">
                                            </div>
                                        </div>
                                        <div class="position-relative row form-group">
                                            <label for="date_end" class="col-md-3 text-md-right col-form-label">Ngày kết thúc</label>
                                            <div class="col-md-9 col-xl-8">
                                                <input required name="date_end" id="date_end" type="text"
                                                    class="form-control" value="{{$coupon->date_end}}">
                                            </div>
                                        </div>
                                        <div class="position-relative row form-group">
                                            <label for="code" class="col-md-3 text-md-right col-form-label">Mã giảm giá</label>
                                            <div class="col-md-9 col-xl-8">
                                                <input required name="code" id="code" type="text"
                                                    class="form-control" value="{{$coupon->code}}">
                                            </div>
                                        </div>
                                        <div class="position-relative row form-group">
                                            <label for="qty" class="col-md-3 text-md-right col-form-label">Số lượng mã</label>
                                            <div class="col-md-9 col-xl-8">
                                                <input required name="qty" id="qty" type="text"
                                                    class="form-control" value="{{$coupon->qty}}">
                                            </div>
                                        </div>
                                        
                                        <div class="position-relative row form-group">
                                            <label for="product_category_id"
                                                class="col-md-3 text-md-right col-form-label">Tính năng mã</label>
                                                <div class="col-md-9 col-xl-8">
                                                    <select required name="condition" id="condition" class="form-control">
                                                        <option value="0">-- Chọn một --</option>
                                                            <option {{$coupon->condition == '1' ? 'selected' : ''}} value="1">
                                                                Giảm theo phần trăm
                                                            </option>
                                                            <option {{$coupon->condition == '2' ? 'selected' : ''}} value="2">
                                                                Giảm theo tiền
                                                            </option>
                                                    </select>
                                                </div>
                                        </div>
                                        <div class="position-relative row form-group">
                                            <label for="number" class="col-md-3 text-md-right col-form-label">Nhập số % hoặc tiền giảm</label>
                                            <div class="col-md-9 col-xl-8">
                                                <input required name="number" id="number" type="text"
                                                    class="form-control" value="{{$coupon->number}}">
                                            </div>
                                        </div>
                                        <div class="position-relative row form-group">
                                            <label for="rank_id"
                                                class="col-md-3 text-md-right col-form-label">Xếp hạng (nếu có)</label>
                                            <div class="col-md-9 col-xl-8">
                                                <select name="rank_id" id="rank_id" class="form-control">
                                                    <option value="">-- Chọn một --</option>

                                                    @foreach($ranks as $rank)
                                                    <option {{$coupon->rank_id == $rank->id ? 'selected' : ''}} value={{$rank->id}}>
                                                        {{$rank->name}}
                                                    </option>
                                                    @endforeach

                                                </select>
                                            </div>
                                        </div>

                                        <div class="position-relative row form-group mb-1">
                                            <div class="col-md-9 col-xl-8 offset-md-2">
                                                <a href="./admin/coupon" class="border-0 btn btn-outline-danger mr-1">
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
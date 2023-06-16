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
                                    Chi tiết sản phẩm
                                    <div class="page-title-subheading">
                                        Xem, thêm mới, cập nhật, xóa và quản lí.
                                    </div>
                                </div>
                            </div>

                            <div class="page-title-actions">
                                <a href="./admin/product/{{$product->id}}/detail/create" class="btn-shadow btn-hover-shine mr-3 btn btn-primary">
                                    <span class="btn-icon-wrapper pr-2 opacity-7">
                                        <i class="fa fa-plus fa-w-20"></i>
                                    </span>
                                    Thêm mới
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="main-card mb-3 card">

                                <div class="card-header">

                                    {{-- <form action="">
                                        <div class="input-group">
                                            <input type="search" name="search" id="search" value="{{request('search')}}"
                                                placeholder="Search everything" class="form-control">
                                            <span class="input-group-append">
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="fa fa-search"></i>&nbsp;
                                                    Search
                                                </button>
                                            </span>
                                        </div>
                                    </form> --}}

                                    {{-- <div class="btn-actions-pane-right">
                                        <div role="group" class="btn-group-sm btn-group">
                                            <button class="btn btn-focus">This week</button>
                                            <button class="active btn btn-focus">Anytime</button>
                                        </div>
                                    </div> --}}
                                </div>

                                <div class="table-responsive">
                                    <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th class="pl-4">Tên sản phẩm</th>
                                                <th>Màu sắc</th>
                                                <th>Kích cỡ</th>
                                                <th>Số lượng</th>
                                                <th class="text-center">Hành động</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($productDetails as $productDetail)
                                            <tr>
                                                <td class="pl-4 text-muted">{{$product->name}}</td>

                                                <td class="">{{$productDetail->color}}</td>
                                                <td class="">{{$productDetail->size}}</td>
                                                <td class="">{{$productDetail->inventory}}</td>
                                                
                                                <td class="text-center">
                                                    <a href="./admin/product/{{$product->id}}/detail/{{$productDetail->id}}/edit" data-toggle="tooltip" title="Edit"
                                                        data-placement="bottom" class="btn btn-outline-warning border-0 btn-sm">
                                                        <span class="btn-icon-wrapper opacity-8">
                                                            <i class="fa fa-edit fa-w-20"></i>
                                                        </span>
                                                    </a>
                                                    <form class="d-inline" action="./admin/product/{{$product->id}}/detail/{{$productDetail->id}}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        
                                                        <button class="btn btn-hover-shine btn-outline-danger border-0 btn-sm"
                                                            type="submit" data-toggle="tooltip" title="Delete"
                                                            data-placement="bottom"
                                                            onclick="return confirm('Do you really want to delete this item?')">
                                                            <span class="btn-icon-wrapper opacity-8">
                                                                <i class="fa fa-trash fa-w-20"></i>
                                                            </span>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                            @endforeach
                                            
                                        </tbody>
                                    </table>
                                </div>

                                <div class="d-block card-footer">
                                    {{-- {{$productDetails->appends(request()->all())->links}} --}}
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Main -->

@endsection
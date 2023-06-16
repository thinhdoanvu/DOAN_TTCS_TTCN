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
                                    Sản phẩm
                                    <div class="page-title-subheading">
                                        Xem, thêm mới, cập nhật, xóa và quản lí.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <ul class="body-tabs body-tabs-layout tabs-animated body-tabs-animated nav">
                            <li class="nav-item">
                                <a href="./admin/product/{{ $product->id }}/edit" class="nav-link">
                                    <span class="btn-icon-wrapper pr-2 opacity-8">
                                        <i class="fa fa-edit fa-w-20"></i>
                                    </span>
                                    <span>Chỉnh sửa</span>
                                </a>
                            </li>
    
                            <li class="nav-item delete">
                                <form action="" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="nav-link btn" type="submit"
                                        onclick="return confirm('Do you really want to delete this item?')">
                                        <span class="btn-icon-wrapper pr-2 opacity-8">
                                            <i class="fa fa-trash fa-w-20"></i>
                                        </span>
                                        <span>Xóa</span>
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="main-card mb-3 card">
                                <div class="card-body display_data">

                                    <div class="position-relative row form-group">
                                        <label for="" class="col-md-3 text-md-right col-form-label">Hình ảnh</label>
                                        <div class="col-md-9 col-xl-8">
                                            <ul class="text-nowrap overflow-auto" id="images">
                                                @foreach($product->productImages as $productImage)
                                                <li class="d-inline-block mr-1" style="position: relative;">
                                                    <img style="height: 150px;" src="./front/images/shop/products/{{$productImage->path}}"
                                                        alt="Image">
                                                </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="position-relative row form-group">
                                        <label for="brand_id"
                                            class="col-md-3 text-md-right col-form-label">Hình ảnh sản phẩm</label>
                                        <div class="col-md-9 col-xl-8">
                                            <p><a href="./admin/product/{{$product->id}}/image">Quản lí hình ảnh</a></p>
                                        </div>
                                    </div>

                                    <div class="position-relative row form-group">
                                        <label for="brand_id"
                                            class="col-md-3 text-md-right col-form-label">Chi tiết sản phẩm</label>
                                        <div class="col-md-9 col-xl-8">
                                            <p><a href="./admin/product/{{$product->id}}/detail">Quản lí chi tiết</a></p>
                                        </div>
                                    </div>

                                    <div class="position-relative row form-group">
                                        <label for="brand_id"
                                            class="col-md-3 text-md-right col-form-label">Thương hiệu</label>
                                        <div class="col-md-9 col-xl-8">
                                            <p>{{$product->brand->name}}</p>
                                        </div>
                                    </div>

                                    <div class="position-relative row form-group">
                                        <label for="product_category_id"
                                            class="col-md-3 text-md-right col-form-label">Thể loại</label>
                                        <div class="col-md-9 col-xl-8">
                                            <p>{{$product->productCategory->name}}</p>
                                        </div>
                                    </div>
                                
                                    <div class="position-relative row form-group">
                                        <label for="name" class="col-md-3 text-md-right col-form-label">Tên sản phẩm</label>
                                        <div class="col-md-9 col-xl-8">
                                            <p>{{$product->name}}</p>
                                        </div>
                                    </div>


                                    <div class="position-relative row form-group">
                                        <label for="price"
                                            class="col-md-3 text-md-right col-form-label">Giá</label>
                                        <div class="col-md-9 col-xl-8">
                                            <p>{{$product->price}}</p>
                                        </div>
                                    </div>

                                    <div class="position-relative row form-group">
                                        <label for="discount"
                                            class="col-md-3 text-md-right col-form-label">Giá giảm</label>
                                        <div class="col-md-9 col-xl-8">
                                            @if($product->discount > 0)
                                            <p>{{$product->discount}}</p>
                                            @else
                                            <p>0</p>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="position-relative row form-group">
                                        <label for="qty"
                                            class="col-md-3 text-md-right col-form-label">Ngày kết thúc giảm giá</label>
                                        
                                        <div class="col-md-9 col-xl-8">
                                            @if($product->date_end != null)
                                                <p>{{$product->date_end}}</p>
                                            @else
                                            <p>0</p>
                                            @endif
                                        </div>
                                       
                                    </div>
                                    <div class="position-relative row form-group">
                                        <label for="qty"
                                            class="col-md-3 text-md-right col-form-label">Số lượng</label>
                                        <div class="col-md-9 col-xl-8">
                                            <p>{{$product->inventory}}</p>
                                        </div>
                                    </div>

                                    {{-- <div class="position-relative row form-group">
                                        <label for="weight"
                                            class="col-md-3 text-md-right col-form-label">Weight</label>
                                        <div class="col-md-9 col-xl-8">
                                            <p>{{$product->weight}}</p>
                                        </div>
                                    </div> --}}
                                    
                                    <div class="position-relative row form-group">
                                        <label for="sku"
                                            class="col-md-3 text-md-right col-form-label">SKU</label>
                                        <div class="col-md-9 col-xl-8">
                                            <p>{{$product->sku}}</p>
                                        </div>
                                    </div>

                                    <div class="position-relative row form-group">
                                        <label for="tag"
                                            class="col-md-3 text-md-right col-form-label">Nhãn</label>
                                        <div class="col-md-9 col-xl-8">
                                            <p>{{$product->tag}}</p>
                                        </div>
                                    </div>

                                    {{-- <div class="position-relative row form-group">
                                        <label for="featured"
                                            class="col-md-3 text-md-right col-form-label">Featured</label>
                                        <div class="col-md-9 col-xl-8">
                                            <p>{{$product->featured ? 'Yes' : 'No' }}</p>
                                        </div>
                                    </div> --}}

                                    <div class="position-relative row form-group">
                                        <label for="description"
                                            class="col-md-3 text-md-right col-form-label">Mô tả sản phẩm</label>
                                        <div class="col-md-9 col-xl-8">
                                            <p>{!! $product->description !!}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Main -->

@endsection
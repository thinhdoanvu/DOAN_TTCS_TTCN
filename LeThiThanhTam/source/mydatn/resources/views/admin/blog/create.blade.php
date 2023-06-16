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
                                    Tin tức
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
                                    <form method="post" action="admin/blog" enctype="multipart/form-data">
                                        @csrf

                                        <div class="position-relative row form-group">
                                            <label for="image"
                                                class="col-md-3 text-md-right col-form-label">Hình ảnh</label>
                                            <div class="col-md-9 col-xl-8">
                                                <img style="height: 200px; cursor: pointer;"
                                                    class="thumbnail rounded-circle" data-toggle="tooltip"
                                                    title="Click to change the image" data-placement="bottom"
                                                    src="dashboard/assets/images/add-image-icon.jpg" alt="Image">
                                                <input name="image" type="file" onchange="changeImg(this)"
                                                    class="image form-control-file" style="display: none;" value="">
                                                {{-- <input type="hidden" name="image_old" value=""> --}}
                                                <small class="form-text text-muted">
                                                    Click vào ảnh để thay đổi (bắt buộc)
                                                </small>
                                            </div>
                                        </div>

                                        <div class="position-relative row form-group">
                                            <label for="title" class="col-md-3 text-md-right col-form-label">Tiêu đề</label>
                                            <div class="col-md-9 col-xl-8">
                                                <input required name="title" id="title" placeholder="Title" type="text"
                                                    class="form-control" value="">
                                            </div>
                                        </div>

                                        {{-- <div class="position-relative row form-group">
                                            <label for="category"
                                                class="col-md-3 text-md-right col-form-label">Category</label>
                                            <div class="col-md-9 col-xl-8">
                                                <input required name="category" id="category" placeholder="Category" type="text"
                                                    class="form-control" value="">
                                            </div>
                                        </div> --}}
                                        <div class="position-relative row form-group">
                                            <label for="product_category_id"
                                                class="col-md-3 text-md-right col-form-label">Thể loại tin tức</label>
                                            <div class="col-md-9 col-xl-8">
                                                <select required name="blog_category_id" id="blog_category_id" class="form-control">
                                                    <option value="">-- Chọn một --</option>
                                                    @foreach($blogCategories as $category)
                                                    <option value={{$category->id}}>
                                                        {{$category->name}}
                                                    </option>
                                                    @endforeach
                                                    
                                                </select>
                                            </div>
                                        </div>

                                        <div class="position-relative row form-group">
                                            <label for="content"
                                                class="col-md-3 text-md-right col-form-label">Nội dung</label>
                                            <div class="col-md-9 col-xl-8">
                                                <textarea class="form-control" name="content" id="content" placeholder="Content"></textarea>
                                            </div>
                                        </div>
                                        {{-- <div class="position-relative row form-group">
                                            <label for="description"
                                                   class="col-md-3 text-md-right col-form-label">Description</label>
                                            <div class="col-md-9 col-xl-8">
                                                <textarea name="description" id="description" class="form-control"></textarea>
                                            </div>
                                        </div> --}}

                                        <div class="position-relative row form-group mb-1">
                                            <div class="col-md-9 col-xl-8 offset-md-2">
                                                <a href="./admin/blog" class="border-0 btn btn-outline-danger mr-1">
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
                                                    <span>Thêm mới</span>
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

                {{-- Thư viện CK Editor --}}
                {{-- <script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>  --}}
                <script src="./dashboard/assets/ckeditor/ckeditor.js"></script>
                <script src="./dashboard/assets/ckfinder/ckfinder.js"></script>
                {{-- <script src="https://cdn.ckeditor.com/ckeditor5/23.0.0/classic/ckeditor.js"></script> --}}
                {{-- <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script> --}}

                {{-- Cấu hình sử dụng CK... --}}
                <script type="text/javascript">
                    var editor = CKEDITOR.replace( 'content' );
                    CKFinder.setupCKEditor( editor );
                </script>
                

@endsection
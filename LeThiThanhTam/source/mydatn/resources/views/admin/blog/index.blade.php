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

                            <div class="page-title-actions">
                                <a href="./admin/blog/create" class="btn-shadow btn-hover-shine mr-3 btn btn-primary">
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

                                    <form action="">
                                        <div class="input-group">
                                            <input type="search" name="search" id="search" value="{{request('search')}}"
                                                placeholder="Từ khóa" class="form-control">
                                            <span class="input-group-append">
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="fa fa-search"></i>&nbsp;
                                                    Tìm kiếm
                                                </button>
                                            </span>
                                        </div>
                                    </form>

                                    
                                </div>

                                <div class="table-responsive">
                                    <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th class="text-center">ID</th>
                                                <th>Tiêu đề</th>
                                                <th class="text-center">Thể loại</th>
                                                <th class="text-center">Hành động</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach($blogs as $blog)
                                            <tr>
                                                <td class="text-center text-muted">#{{ $blog->id }}</td>
                                                <td>
                                                    <div class="widget-content p-0">
                                                        <div class="widget-content-wrapper">
                                                            <div class="widget-content-left mr-3">
                                                                <div class="widget-content-left">
                                                                    <img width="40" class="rounded-circle"
                                                                        data-toggle="tooltip" title="Image"
                                                                        data-placement="bottom"
                                                                        src="front/img/blog/{{ $blog->image ?? 'no-images.jpg' }}" alt="">
                                                                </div>
                                                            </div>
                                                            <div class="widget-content-left flex2">
                                                                <div class="widget-heading">{{$blog->title}}</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-center">{{$blog->blogCategory->name}}</td>
                                                {{-- <td class="text-center">
                                                    {{ \App\Utilities\Constant::$user_level[$user->level] }}
                                                </td> --}}
                                          
                                                <td class="text-center">
                                                    <a href="./admin/blog/{{ $blog->id }}"
                                                        class="btn btn-hover-shine btn-outline-primary border-0 btn-sm">
                                                        Chi tiết
                                                    </a>
                                                    <a href="./admin/blog/{{ $blog->id }}/edit" data-toggle="tooltip" title="Edit"
                                                        data-placement="bottom" class="btn btn-outline-warning border-0 btn-sm">
                                                        <span class="btn-icon-wrapper opacity-8">
                                                            <i class="fa fa-edit fa-w-20"></i>
                                                        </span>
                                                    </a>
                                                    <form class="d-inline" action="./admin/blog/{{$blog->id}}" method="post">
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
                                    {{$blogs->appends(request()->all())->links()}}
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Main -->

@endsection
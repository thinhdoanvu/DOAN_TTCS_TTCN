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
                                    Bình luận sản phẩm
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

                                <div class="card-header">

                                    <form action="">
                                        <div class="input-group">
                                            <input type="text" name="search"
                                                placeholder="Tìm kiếm" class="form-control" value="{{ request('search')}}">
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
                                                <th>Tên người dùng</th>
                                                <th class="text-center">Tên sản phẩm</th>
                                                <th class="text-center">Email</th>
                                                <th class="text-center">Nội dung</th>
                                                <th class="text-center">Số sao</th>
                                                <th class="text-center">Tình trạng</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach($productComments as $productComment)
                                            <input id="product_id" type="hidden" value="{{$productComment->product_id}}">
                                            <tr>
                                                <td class="text-center text-muted">#{{ $productComment->id }}</td>
                                                <td>
                                                    <div class="widget-content p-0">
                                                        <div class="widget-content-wrapper">
                                                            {{-- <div class="widget-content-left mr-3">
                                                                <div class="widget-content-left">
                                                                    <img width="40" class="rounded-circle"
                                                                        data-toggle="tooltip" title="Image"
                                                                        data-placement="bottom"
                                                                        src="front/img/user/{{ $productComment->user_id->user->avatar ?? 'no-images.jpg' }}" alt="">
                                                                </div>
                                                            </div> --}}
                                                            <div class="widget-content-left flex2">
                                                                <div class="widget-heading">{{$productComment->name}}</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>  
                                                                                 
                                                <td class="text-center">{{$productComment->getProductName()}}</td>

                                                <td class="text-center">{{$productComment->email}}</td>
                                                <td class="text-center">
                                                    {{$productComment->messages}}
                                                </td>
                                                <td class="text-center">
                                                    {{$productComment->rating}}
                                                </td>
                                                <td class="text-center">
                                                    <input data-id="{{$productComment->id}}" type="checkbox" {{$productComment->status == 1 ?  'checked' : ''}} id="status-{{$productComment->id}}" name="status" class="checkbox-admin changestatus">
                                                </td>
                                            </tr>
                                            @endforeach
                                            
                                        </tbody>
                                    </table>
                                </div>

                                {{-- <div class="d-block card-footer">
                                    {{$users->appends(request()->all())->links()}}
                                </div> --}}

                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Main -->
                <script src="dashboard/assets/scripts/jquery-3.2.1.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-alpha1/jquery.min.js"></script>
                
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('.changestatus').click(function (){
            var id = $(this).attr('data-id');
            $.ajax({
                type:'POST',
                url:"{{ route('changeStatus') }}",
                data:{
            			'id' : id,
                        "_token": "{{ csrf_token() }}",
            		},
            	success: function (result) {
                    console.log($(this));
                    $.notify("Cập nhật thành công", "success");
            	},
            })
            });
    </script>
 @endsection


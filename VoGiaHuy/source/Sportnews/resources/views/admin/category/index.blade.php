@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <a href="{{ route('category.create') }}" class="btn btn-primary">Thêm danh mục</a><br><br>
            <table class="table" id="tablecategory">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Slug</th>
                    <th scope="col">Status</th>
                    <th scope="col">Manage</th>
                  </tr>
                </thead>

                @foreach($list as $key => $cate)
                  <tr id="{{ $cate->id }}">
                    <th scope="row">{{ $key }}</th>
                    <td>{{ $cate->title }}</td>
                    <td>{{ $cate->description }}</td>
                    <td>{{ $cate->slug }}</td>
                    <td>
                        @if($cate->status)
                            Hiển thị
                        @else
                            Không hiển thị
                        @endif
                    </td>
                    <td>
                        {!! Form::open(['method'=>'DELETE','route'=>['category.destroy',$cate->id],'onsubmit'=>'return confirm("Xác nhận xóa ?")']) !!}
                            {!! Form::submit('Xóa', ['class'=>'btn btn-danger']) !!}
                        {!! Form::close() !!}
                        <a href="{{ route('category.edit',$cate->id) }}" class="btn btn-warning">Sửa</a>
                    </td>
                  </tr>
                @endforeach
              </table>
        </div>
    </div>
</div>
@endsection

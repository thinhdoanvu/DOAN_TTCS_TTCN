@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <a href="{{ route('country.create') }}" class="btn btn-primary">Thêm quốc gia</a><br><br>
            <table class="table" id="tablecountry">
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
                <tbody>
                @foreach($list as $key => $count)
                    <tr>
                    <th scope="row">{{ $count->id }}</th>
                    <td>{{ $count->title }}</td>
                    <td>{{ $count->description }}</td>
                    <td>{{ $count->slug }}</td>
                    <td>
                        @if($count->status)
                            Hiển thị
                        @else
                            Không hiển thị
                        @endif
                    </td>
                    <td>

                        {!! Form::open(['method'=>'DELETE','route'=>['country.destroy',$count->id],'onsubmit'=>'return confirm("Xác nhận xóa ?")']) !!}
                            {!! Form::submit('Xóa', ['class'=>'btn btn-danger']) !!}
                        {!! Form::close() !!}
                        <a href="{{ route('country.edit',$count->id) }}" class="btn btn-warning">Sửa</a>
                    </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

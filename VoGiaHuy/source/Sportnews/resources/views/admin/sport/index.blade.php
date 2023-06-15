@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <a href="{{ route('sport.create') }}" class="btn btn-primary">Thêm thể thao</a><br><br>
            <table class="table" id="tablesport">
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
                @foreach($list as $key => $spt)
                    <tr>
                    <th scope="row">{{ $spt->id }}</th>
                    <td>{{ $spt->title }}</td>
                    <td>{{ $spt->description }}</td>
                    <td>{{ $spt->slug }}</td>
                    <td>
                        @if($spt->status)
                            Hiển thị
                        @else
                            Không hiển thị
                        @endif
                    </td>
                    <td>

                        {!! Form::open(['method'=>'DELETE','route'=>['sport.destroy',$spt->id],'onsubmit'=>'return confirm("Xác nhận xóa ?")']) !!}
                            {!! Form::submit('Xóa', ['class'=>'btn btn-danger']) !!}
                        {!! Form::close() !!}
                        <a href="{{ route('sport.edit',$spt->id) }}" class="btn btn-warning">Sửa</a>
                    </td>
                    </tr>
                @endforeach
                </tbody>
              </table>
        </div>
    </div>
</div>
@endsection

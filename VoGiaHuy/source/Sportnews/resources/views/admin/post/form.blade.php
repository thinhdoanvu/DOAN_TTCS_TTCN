@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <a href="{{ route('post.index') }}" class="btn btn-primary">Danh sách tin tức</a>
                <div class="card-header">{{ __('Quản lý tin tức') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if(!isset($post))
                        {!! Form::open(['route'=>'post.store','method'=>'POST','enctype'=>'multipart/form-data']) !!}
                    @else
                        {!! Form::open(['route'=>['post.update',$post->id],'method'=>'PUT','enctype'=>'multipart/form-data']) !!}
                    @endif

                        <div class="form-group">
                            {!! Form::label('title', 'Title', []) !!}
                            {!! Form::text('title', isset($post) ? $post->title : '', ['class'=>'form-control','placeholder'=>'Nhập dữ liệu ...',
                            'id'=>'slug','onkeyup'=>'ChangeToSlug()']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('slug', 'Slug', []) !!}
                            {!! Form::text('slug', isset($post) ? $post->slug : '', ['class'=>'form-control','placeholder'=>'Nhập dữ liệu ...',
                            'id'=>'convert_slug']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('date', 'Date', []) !!}
                            {!! Form::date('date', isset($post) ? $post->date : '', ['class'=>'form-control','id'=>'date']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('description', 'Description', []) !!}
                            {!! Form::textarea('description', isset($post) ? $post->description : '', ['style'=>'resize:none; height:100px','class'=>'form-control','placeholder'=>'Nhập dữ liệu ...',
                            'id'=>'description']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('content', 'Content', []) !!}
                            {!! Form::textarea('content', isset($post) ? $post->content : '', ['style'=>'resize:none; height: max-content','class'=>'form-control','placeholder'=>'Nhập dữ liệu ...',
                            'id'=>'content']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('link post', 'Link Post', []) !!}
                            {!! Form::text('link_post', isset($post) ? $post->link_post : '', ['class'=>'form-control','placeholder'=>'Nhập dữ liệu ...',
                            'id'=>'link_post']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('image URL', 'Image', []) !!}
                            {!! Form::url('image', isset($post) ? $post->image : '', ['style'=>'resize:none','class'=>'form-control','placeholder'=>'Nhập dữ liệu ...',
                            'id'=>'image']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('category', 'Category', []) !!}
                            {!! Form::select('category_id', $category, isset($post) ? $post->status : '' , ['class'=>'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('country', 'Country', []) !!}
                            {!! Form::select('country_id', $country, isset($post) ? $post->status : '' , ['class'=>'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('sport', 'Sport', []) !!}
                            {!! Form::select('sport_id', $sport, isset($post) ? $post->status : '' , ['class'=>'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('hot', 'Hot News', []) !!}
                            {!! Form::select('hot_news',['1'=>'Có','0'=>'Không'], isset($post) ? $post->hot_news : '' , ['class'=>'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('status', 'Status', []) !!}
                            {!! Form::select('status',['1'=>'Hiển thị','0'=>'Không'], isset($post) ? $post->status : '' , ['class'=>'form-control']) !!}
                        </div>
                        @if(!isset($post))
                            {!! Form::submit('Thêm dữ liệu', ['class'=>'btn btn-success']) !!}
                        @else
                            {!! Form::submit('Cập nhật', ['class'=>'btn btn-success']) !!}
                        @endif
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('user.usershop')
@section('usermain')

<div class="hero-wrap hero-bread" style="background-image: url('userdashboard/images/bg_1.jpg');">
    <div class="container">
      <div class="row no-gutters slider-text align-items-center justify-content-center">
        <div class="col-md-9 ftco-animate text-center">
            {{-- <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Blog</span></p> --}}
          <h1 class="mb-0 bread">Blog</h1>
        </div>
      </div>
    </div>
  </div>

  <section class="ftco-section ftco-degree-bg">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 ftco-animate">
            <div class="row">
                @foreach($posts as $post)
                    <div class="col-md-12 d-flex ftco-animate">
                        <div class="blog-entry align-self-stretch d-md-flex">
                            <a href="{{ route('blog.slug', $post->slug->nameSlug)}}" class="block-20" style="background-image: url({{$post->imagePath}});"></a>
                            <div class="text d-block pl-md-4">

                                <div class="meta mb-3">
                                    <div>{{date('l, F d, Y',strtotime($post['created_at']))}}</div>
                                    <div>{{$post->posterName}}</div>
                                </div>
                                <h3 class="heading"><a href="{{ route('blog.slug', $post->slug->nameSlug)}}">{{$post->title}}</a></h3>
                                <p>{!! \Illuminate\Support\Str::limit($post->content, 10, '...') !!}</p>
                                <p><a href="{{ route('blog.slug', $post->slug->nameSlug)}}" class="btn btn-primary py-2 px-3">Đọc tiếp <i class="nav-icon fas fa-arrow-right"></i></a></p>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div>
                    {{$posts->appends(request()->all())->links()}}
                </div>
            </div>
        </div> <!-- .col-md-8 -->
        <div class="col-lg-4 sidebar ftco-animate">
          @include('user.partials.subnavRight')
        </div>
      </div>
    </div>
  </section>
<!-- .section -->
@endsection

@extends('index')
@section('content')
<section class="intro-news-area section-padding-100-0 mb-70">
    <div class="container">
        <div class="row">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('homepage') }}">Trang chủ</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $cate_slug->title }}</li>
                </ol>
              </nav>
        </div>
        <br>
        <div class="row justify-content-center">
            <!-- Intro News Tabs Area -->
            <div class="col-12 col-lg-12">
                <div class="intro-news-tab">
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-1" role="tabpanel" aria-labelledby="nav1">
                            <div class="row">
                                @foreach($post as $key => $post)
                                <!-- Single News Area -->
                                <div class="col-12 col-sm-4">
                                    <div class="single-blog-post style-2 mb-5">
                                        <!-- Blog Thumbnail -->
                                        <div class="blog-thumbnail">
                                            <a href="{{ route('post',$post->slug) }}"><img src="{{ $post->image }}" alt=""></a>
                                        </div>

                                        <!-- Blog Content -->
                                        <div class="blog-content">
                                            <span class="post-date">{{ $post->date }}</span>
                                            <a href="{{ route('post',$post->slug) }}" class="post-title">{{ $post->title }}</a>
                                            <p>{{ $post->description }}</p>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div>
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
              <li class="page-item">
                <a class="page-link" href="#" aria-label="Previous">
                  <span aria-hidden="true">&laquo;</span>
                </a>
              </li>
              <li class="page-item"><a class="page-link" href="#">1</a></li>
              <li class="page-item"><a class="page-link" href="#">2</a></li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li class="page-item">
                <a class="page-link" href="#" aria-label="Next">
                  <span aria-hidden="true">&raquo;</span>
                </a>
              </li>
            </ul>
        </nav>
    </div>

    <div class="news-area section-padding-100-70">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-8 col-lg-9">
                    <!-- Single News Area -->
                    @foreach($hot_news->take(4) as $key => $hot)
                    <div class="single-blog-post d-flex flex-wrap style-5 mb-30">
                        <!-- Blog Thumbnail -->
                        <div class="blog-thumbnail">
                            <a href="{{ route('post',$post->slug) }}"><img src="{{ $hot->image }}" alt=""></a>
                        </div>

                        <!-- Blog Content -->
                        <div class="blog-content">
                            <span class="post-date">{{ $hot->date }}</span>
                            <a href="{{ route('post',$post->slug) }}" class="post-title">{{ $hot->title }}</a>
                            <p>{{ $hot->description }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>

                <div class="col-12 col-md-4 col-lg-3">
                    <!-- Banner Area -->
                    <div class="single-blog-post style-6 mb-30">
                        <!-- Banner -->
                        <div class="blog-thumbnail">
                            <a href="#"><img src="{{ asset('/user/assets/img/bg-img/banner/banner.jpg') }}" alt=""></a>
                        </div>
                        <div class="blog-thumbnail">
                            <a href="#"><img src="{{ asset('/user/assets/img/bg-img/banner/banner.jpg') }}" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</section>
@endsection

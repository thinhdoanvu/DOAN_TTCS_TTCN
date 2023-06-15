@extends('index')
@section('content')
<!-- ##### Intro News Area Start ##### -->
<section class="intro-news-area section-padding-100-0 mb-70">
<div class="container">
    <div class="row justify-content-center">
        <!-- Intro News Tabs Area -->
        <div class="col-12 col-lg-12">
            <div class="intro-news-tab">
                <!-- Intro News Filter -->
                {{--  <div class="intro-news-filter d-flex justify-content-between">
                    <h6>Tin tức hằng ngày</h6>
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link active" id="nav1" data-toggle="tab" href="#nav-1" role="tab" aria-controls="nav-1" aria-selected="true">Việt Nam</a>
                            <a class="nav-item nav-link" id="nav2" data-toggle="tab" href="#nav-2" role="tab" aria-controls="nav-2" aria-selected="false">Quốc tế</a>
                        </div>
                    </nav>
                </div>  --}}
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-1" role="tabpanel" aria-labelledby="nav1">
                        <div class="row">
                            <!-- Single News Area -->
                            @foreach ($hot_news->take(2) as $key => $hot)
                            <div class="col-12 col-sm-6">
                                <div class="single-blog-post style-2 mb-5">
                                <!-- Blog Thumbnail -->
                                <div class="blog-thumbnail">
                                    <a href="{{ route('post',$hot->slug) }}"><img src="{{ $hot->image }}" alt=""></a>
                                </div>
                                <!-- Blog Content -->
                                <div class="blog-content">
                                    <span class="post-date">{{ $hot->date }}</span>
                                    <a href="{{ route('post',$hot->slug) }}" class="post-title">{{ $hot->title }}</a>
                                    <p>{{ $hot->description }}</p>
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

    @foreach($category_home as $key => $cate_home)
        <a href="" class="category">
            {{ $cate_home->title }}
        </a>
        <div class="posts">
            <div class="row">
                @foreach($cate_home->post->take(6) as $key => $post)
                    <!-- Single News Area -->
                    <div class="col-12 col-sm-6 col-lg-4">
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
    @endforeach

    <div class="video-slideshow py-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Video Slides -->
                    <div class="video-slides owl-carousel">
                        <!-- Single News Area -->

                            @foreach($hot_news->take(6) as $key => $hot)
                                <!-- Single News Area -->
                                <div class="single-blog-post style-3">
                                    <!-- Blog Thumbnail -->
                                    <div class="blog-thumbnail">
                                        <a href="{{ route('post',$hot->slug) }}"><img src="{{ $hot->image }}" alt=""></a>
                                    </div>
                                    <!-- Blog Content -->
                                    <div class="blog-content">
                                        <span class="post-date">{{ $hot->date }}</span>
                                        <p class="post-title">{{ $hot->title }}</p>
                                    </div>
                                </div>
                            @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
@endsection

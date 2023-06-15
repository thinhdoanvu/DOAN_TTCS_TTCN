@extends('index')
@section('content')
<!-- ##### Intro News Area Start ##### -->
<section class="intro-news-area section-padding-100-0 mb-70">
<div class="container">

    <div class="posts">
        <h2>Kết quả tìm kiếm: {{ $keywords }}</h2>
        <br><br>
        <div class="row">
            @foreach($search_post->take(12) as $key => $post)
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

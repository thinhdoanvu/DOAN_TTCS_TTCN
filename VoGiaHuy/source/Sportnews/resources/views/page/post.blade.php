@extends('index')
@section('content')
<section class="post-news-area section-padding-100-0 mb-70">
    <div class="container">
        <div class="row justify-content-center">
            <!-- Post Details Content Area -->
            <div class="col-12 col-lg-8">
                <div class="post-details-content mb-100">
                    <h1><b>{{ $post->title }}</b></h1>
                    <br>
                    <p>{{ $post->date }}</p>
                    <h5><b><i>{{  $post->description  }}</i></b></h5>
                    <br>
                    <img src="{{ $post->image }}">
                    <br><br>
                    <p>{{ $post->content }}</p>
                    <br>
                    <span>
                        <i>
                            Đọc bài viết gốc tại
                            <a href="{{ $post->link_post }}"><b><u>đây</u></b></a>
                        </i>
                   </span>
                </div>

                <div class="comment_area clearfix mb-100">
                    <h4 class="mb-50">Bình luận</h4>
                    @php
                        $current_url =  Request::url();
                    @endphp
                    <ol>
                        <!-- Single Comment Area -->
                        <li class="single_comment_area">
                            <!-- Comment Content -->
                            <div class="fb-comments" data-href="{{ $current_url }}" data-width="100%" data-numposts="10"></div>
                        </li>
                    </ol>
                </div>
            </div>

            <!-- Sidebar Widget -->
            <div class="col-12 col-lg-4">
                <div class="sidebar-area">
                    <!-- Latest News Widget -->
                    <div class="single-widget-area news-widget mb-30">
                        <h4>Tin mới</h4>
                        @foreach($hot_news->take(10) as $key => $post)
                        <!-- Single News Area -->
                        <div class="single-blog-post d-flex style-4 mb-30">
                            <!-- Blog Thumbnail -->
                            <div class="blog-thumbnail">
                                <a href="{{ route('post',$post->slug) }}"><img src="{{ $post->image }}" alt=""></a>
                            </div>

                            <!-- Blog Content -->
                            <div class="blog-content">
                                <span class="post-date">{{ $post->date }}</span>
                                <a href="{{ route('post',$post->slug) }}" class="post-title">{{ $post->title }}</a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="news-area section-padding-100-70">
        <div class="container">
            <h2> Tin liên quan</h2> <br>
            <div class="row">
                <div class="col-12 col-md-8 col-lg-9">
                    <!-- Single News Area -->
                    @foreach($related->take(4) as $key => $related)
                    <div class="single-blog-post d-flex flex-wrap style-5 mb-30">
                        <!-- Blog Thumbnail -->
                        <div class="blog-thumbnail">
                            <a href="{{ route('post',$related->slug) }}"><img src="{{ $related->image }}" alt=""></a>
                        </div>

                        <!-- Blog Content -->
                        <div class="blog-content">
                            <span class="post-date">{{ $related->date }}</span>
                            <a href="{{ route('post',$related->slug) }}" class="post-title">{{ $related->title }}</a>
                            <p>{{ $related->description }}</p>
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



@extends('front.layout.master')
@section('title', 'Blog Detail')

@section('body')

<section class="page-header">
	<div class="overly"></div> 	
	<div class="container">
		<div class="row justify-content-center" style="margin-top: 100px">
			<div class="col-lg-6">
				<div class="content text-center">
					<h1 class="mb-3">Tin tức</h1>
					<p>ALICE - Tự hào là thương hiệu thời trang Việt Nam mang lại những trải nghiệm mua sắm tốt nhất, giúp bạn thêm hứng khởi, tự tin và yêu bản thân hơn qua mỗi ngày khi được thể hiện cá tính của mình.</p>

				<nav aria-label="breadcrumb">
				  <ol class="breadcrumb bg-transparent justify-content-center">
				    <li class="breadcrumb-item"><a href="/">Trang chủ</a></li>
				    <li class="breadcrumb-item active" aria-current="page">Tin tức</li>
				  </ol>
				</nav>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="section">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="post post-single">
          <h5 style="color:#fb5c42">{{$blogs->blogCategory->name}}</h5>
          {{-- <img class="img-fluid w-100 mb-4" src="front/img/blog/{{ $blogs->image }}" alt="post-thumb"> --}}
          <h2 class="post-title">{{$blogs->title}}</h2>
          <div class="post-meta">
            <ul class="list-inline">
							<li class="list-inline-item"><span style="color:#fb5c42">Admin</span></li>
							<li class="list-inline-item">{{ date('M d, Y', strtotime($blogs->updated_at)) }}</li>
              <li class="list-inline-item"><span style="color:#fb5c42">{{ count($blogs->blogComments) }} bình luận, {{$blogs->blog_view}} lượt xem</span></li>
						</ul>
          </div>
          <div class="content post-excerpt mb-5">

            <p>{!! $blogs->content !!}</p>
          </div>
          <div class="post-social-share mb-4">
            <h4 class="post-sub-heading border-bottom pb-3 mb-3">Tin tức liên quan</h4>
            <ul class="list-inline">
           
              <div class="footer-widget">
                <ul class="pl-0 list-unstyled mb-0">
                  @foreach($relatedBlogs as $relatedBlog)
                  <li><b><a href="{{route('showBlog',['blogName' => Str::slug($relatedBlog->title), 'id' => $relatedBlog->id])}}">- {{$relatedBlog->title}}</a></b></li>
                  @endforeach
                </ul>
                {{-- <a class="nav-link" href="{{route('showBlog',['blogName' => Str::slug($relatedBlog->title), 'id' => $relatedBlog->id])}}">{{$relatedBlog->title}}</a> --}}
                {{-- <a href="{{route('showBlog',['blogName' => Str::slug($relatedBlog->title), 'id' => $relatedBlog->id])}}" class="read-more text-primary">{{$relatedBlog->title}}</a> --}}
              </div>
             
              
              {{-- <li class="list-inline-item">
                <a class="text-dark" href="#"><i class="tf-ion-social-twitter"></i></a>
              </li>
              <li class="list-inline-item">
                <a class="text-dark" href="#"><i class="tf-ion-social-google"></i></a>
              </li>
              <li class="list-inline-item">
                <a class="text-dark" href="#"><i class="tf-ion-social-pinterest"></i></a>
              </li> --}}
            </ul>
          </div>

          <!-- comments -->
          <h3 class="mb-4">Bình luận {{ count( $blogs->blogComments )}}</h3>
          @foreach($blogs->blogComments as $blogComment)
          <div class="media mb-4 pb-4 border-bottom border-color">
            <a class="d-flex mr-3" href="#!">
              <img style="width:63px;height:63px" src="front/img/user/{{ $blogComment->user->avatar ?? 'no-images.jpg'}}" alt="client-img">
            </a>
            <div class="media-body">
              <h5 class="my-0">{{$blogComment->name}}.</h5>
              <p class="mb-0">{{ date('M d, Y H:i', strtotime($blogComment->created_at)) }}</p>
              <p class="text-dark mb-0">{{ $blogComment->messages }}</p>
              {{-- <a href="#" class="btn btn-extra-small btn-dark">reply</a> --}}

              {{-- <div class="media mt-3 border-top border-color pt-4">
                <a class="d-flex mr-3" href="#!">
                  <img height="80px" src="images/avater.jpg" alt="client-img">
                </a>
                <div class="media-body">
                  <h5 class="my-0">Jaquan Rolfson.</h5>
                  <p class="mb-0">15 january 2015 At 10:30 pm</p>
                  <p class="text-dark mb-0">Ne erat velit invidunt his. Eum in dicta veniam interesset, harum fuisset te namn ea cu lupta definitionem.</p>
                  <a href="#" class="btn btn-extra-small btn-dark">reply</a>
                </div>
              </div> --}}
            </div>
          </div>
          @endforeach
          {{-- <div class="media mb-5">
            <a class="d-flex mr-3" href="#!">
              <img height="80px" src="images/avater.jpg" alt="client-img">
            </a>
            <div class="media-body">
              <h5 class="my-0">Rik Andrew</h5>
              <p class="mb-0">15 january 2015 At 10:30 pm</p>
              <p class="text-dark mb-0">Ne erat velit invidunt his. Eum in dicta veniam interesset, harum fuisset te nam eam cu lupta definitionem.</p>
              <a href="#" class="btn btn-extra-small btn-dark">reply</a>
            </div>
          </div> --}}

          
          <div class="post-comments-form">
            <h4 class="post-sub-heading mb-3">Viết bình luận</h4>
            <form method="post" id="form" role="form">
              @csrf
              <input type="hidden" name="blog_id" value="{{ $blogs->id }}">
              <input type="hidden" id="user_id" name="user_id" value="{{$user->id ?? ''}}">

              <div class="row">
                <div class="col-md-6 form-group">
                  <!-- Name -->
                  <input type="text" name="name" id="name" class=" form-control" placeholder="Họ tên *" maxlength="100"
                    required="" value="{{ $user->name ?? ''}}">
                </div>
                <div class="col-md-6 form-group">
                  <!-- Email -->
                  <input readonly type="email" name="email" id="email" class=" form-control" placeholder="Email *"
                    maxlength="100" value="{{ $user->email ?? ''}}">
                </div>

                <!-- Comment -->
                <div class="form-group col-md-12">
                  <textarea name="messages" id="messages" class=" form-control" rows="6" placeholder="Nội dung bình luận"
                    maxlength="400"></textarea>
                </div>
                <!-- Send Button -->
                <div class="form-group col-md-12">
                  <button type="submit" value="submit" class="btn btn-dark">
                    Gửi bình luận
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection
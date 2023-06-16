@extends('front.layout.master')
@section('title', 'Blog')

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

<div class="section">
	<div class="container">
		<div class="row">
			@foreach($blogs as $blog)
			<div class="col-md-6 mb-4">
				<article class="post">
					<a href="{{route('showBlog',['blogName' => Str::slug($blog->title), 'id' => $blog->id])}}">
						<img class="img-fluid mb-4 blog" style="height: 360px, width:510px" src="front/img/blog/{{ $blog->image }}" alt="">
					</a>
					<h5 style="color:#fb5c42">{{$blog->blogCategory->name}}</h5>
					<h3><a class="text-dark" href="{{route('showBlog',['blogName' => Str::slug($blog->title), 'id' => $blog->id])}}">{{ $blog->title }}</a></h3>
					<div class="post-meta">
						<ul class="list-inline">
							<li class="list-inline-item"><span style="color:#fb5c42">Admin</span></li>
							<li class="list-inline-item">{{ date('M d, Y', strtotime($blog->updated_at)) }}</li>
              				<li class="list-inline-item"><span style="color:#fb5c42">{{ count($blog->blogComments) }} bình luận</span></li>
						</ul>
					</div>
					<div class="post-content" style="overflow: hidden;
					text-overflow: ellipsis;
					-webkit-line-clamp: 3;
					display: -webkit-box;
					-webkit-box-orient: vertical;">
						<p>
							{!! $blog->content !!}
						</p>
					</div>
					<div class="post-content">
						<a href="{{route('showBlog',['blogName' => Str::slug($blog->title), 'id' => $blog->id])}}" class="read-more text-primary">Đọc tin ngay</a>
					</div>
				</article>
			</div>
			@endforeach
		
			<div class="col-12 mt-5">
				<nav aria-label="Page navigation" >
					{{$blogs->links()}}
				</nav>
			</div>
		</div>
	</div>
</div>



@endsection
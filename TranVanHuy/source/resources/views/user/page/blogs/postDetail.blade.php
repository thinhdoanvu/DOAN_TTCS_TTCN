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
          {{-- @foreach ($postDetails as $postDetail) --}}
            <h2 class="mb-3">{{$postDetails->title}}</h2>
            {!! $postDetails->content !!}
            {{-- <input type="hidden" value="{{$postDetail->id}}"> --}}
            {{-- @php
              dd(count($postDetails->comments))
            @endphp --}}
            {{-- @include('user.page.cmt.comment', ['idCmt' => $postDetail->id]) --}}
            @include('user.page.cmt.comment', [
              // 'iduser' =>
              'slug' => $slugName,
              'slugable_id' => $slugPost,
              'comments' => $postDetails->comments,
            ])
          {{-- @endforeach --}}
        </div> <!-- .col-md-8 -->
        <div class="col-lg-4 sidebar ftco-animate">
          @include('user.partials.subnavRight')
        </div>
      </div>
    </div>
  </section>
@endsection

{{-- @section('scripts')
    <script>

    </script>
@endsection --}}

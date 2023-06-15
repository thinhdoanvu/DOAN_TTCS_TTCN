<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="description" content="">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->
      <!-- Title -->
      <title>SportNews - Báo thể thao của VGH</title>
      <!-- Favicon -->
      <link rel="icon" href="{{ asset('user/assets/img/core-img/favicon.ico') }}">
      <!-- Stylesheet -->
      <link rel="stylesheet" href="{{ asset('/user/assets/style.css') }}">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
      {{--  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">  --}}
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
   </head>
   <body>
      <!-- ##### Header Area Start ##### -->
      <header class="header-area">
         <!-- Navbar Area -->
         <div class="newsbox-main-menu">
            <div class="classy-nav-container breakpoint-off">
               <div class="container-fluid">
                  <!-- Menu -->
                  <nav class="classy-navbar justify-content-between" id="newsboxNav">
                     <!-- Nav brand -->
                     <a href="{{ route('homepage') }}" class="nav-brand"><img src="{{ asset('/user/assets/img/core-img/logo.png') }}" alt=""></a>

                    <!-- Search bar -->
                    <form class="example" action="{{ route('search') }}" style="margin:auto;max-width:300px">
                        <input type="text" name="keywords_submit" id="search" placeholder="Tìm..." value="{{ $keywords ?? '' }}">
                        <button type="submit"><i class="fa fa-search"></i></button>
                    </form>
                    <ul class="list-group" id="result" style="display:none">

                    </ul>

                     <!-- Menu -->
                     <div class="classy-menu">
                        <!-- Close Button -->
                        <div class="classycloseIcon">
                           <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                        </div>
                        <!-- Nav Start -->
                        <div class="classynav">
                            <ul>
                                <li><a href="{{ route('homepage') }}">Trang Chủ</a></li>
                                <li>
                                    <a href="#">Danh mục</a>
                                    <ul class="dropdown">
                                        @foreach($category as $key => $cate)
                                            <li>
                                                <a title="{{ $cate->title }}" href="{{ route('category',$cate->slug) }}">{{ $cate->title }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">Quốc gia</a>
                                    <ul class="dropdown">
                                    @foreach($country as $key => $count)
                                        <li><a title="{{ $count->title }}" href="{{ route('country', $count->slug) }}">{{ $count->title }}</a></li>
                                    @endforeach
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">Thể thao</a>
                                    <ul class="dropdown">
                                        @foreach($sport as $key => $spt)
                                            <li>
                                                <a title="{{ $spt->title }}" href="{{ route('sport', $spt->slug) }}">{{ $spt->title }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <!-- Nav End -->
                     </div>

                  </nav>
               </div>
            </div>
         </div>
      </header>
      <!-- ##### Header Area End ##### -->
      <!-- ##### Breaking News Area Start ##### -->
      <section class="breaking-news-area">
         <div class="container-fluid">
            <div class="row">
               <div class="col-12 ">
                  <!-- Breaking News Widget -->
                  <div class="breaking-news-ticker d-flex flex-wrap align-items-center">
                     <div class="title">
                        <h6>Tin hot</h6>
                     </div>
                     <div id="breakingNewsTicker" class="ticker">
                        <ul>
                            @foreach($hot_news->take(10) as $key => $hot)
                            <li>
                                <a href="{{ route('post',$hot->slug) }}">{{ $hot->title }}</a>
                            </li>
                            @endforeach
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- ##### Breaking News Area End ##### -->

      @yield('content')
      <!-- ##### Hero Area Start ##### -->

      <!-- ##### Intro News Area End ##### -->

      <!-- ##### Footer Area Start ##### -->
      <footer class="footer-area">
         <!-- Footer Logo -->
         <div class="footer-logo mb-100">
            <a href="{{ route('homepage') }}"><img src="{{ asset('/user/assets/img/core-img/logo.png') }}" alt=""></a>
         </div>
         <!-- Footer Content -->
         <div class="container">
            <div class="row">
               <div class="col-12">
                  <div class="footer-content text-center">
                     <!-- Social Info -->
                     <div class="footer-social-info">
                        <a href="https://www.pinterest.com/" data-toggle="tooltip" data-placement="top" title="pinterest"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                        <a href="https://www.facebook.com/dahiii30/" data-toggle="tooltip" data-placement="top" title="facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                        <a href="https://www.twitter.com/" data-toggle="tooltip" data-placement="top" title="twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                        <a href="https://www.instagram.com/daheokhonggion/" data-toggle="tooltip" data-placement="top" title="instagram"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                     </div>
                     <p class="mb-15">Website đọc báo thể thao của Gia Huy đang trong quá trình hoàn thiện. </p>
                     <p>Mong quý thầy cô và các bạn bỏ qua cho những sai sót trong sản phẩm này.</p>
                     <p>Xin chân thành cảm ơn.</p>
                     <!-- Copywrite Text -->
                     <p class="copywrite-text">
                        <a href="#">
                           <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                           Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by
                        <a href="https://colorlib.com" target="_blank">Colorlib</a>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                     </p>
                  </div>
               </div>
            </div>
         </div>
      </footer>
      <!-- ##### Footer Area Start ##### -->
      <!-- ##### All Javascript Script ##### -->
      <!-- jQuery-2.2.4 js -->
      <script src="{{ asset('/user/assets/js/jquery/jquery-2.2.4.min.js') }}"></script>
      <!-- Popper js -->
      <script src="{{ asset('/user/assets/js/bootstrap/popper.min.js') }}"></script>
      <!-- Bootstrap js -->
      <script src="{{ asset('/user/assets/js/bootstrap/bootstrap.min.js') }}"></script>
      <!-- All Plugins js -->
      <script src="{{ asset('/user/assets/js/plugins/plugins.js') }}"></script>
      <!-- Active js -->
      <script src="{{ asset('/user/assets/js/active.js') }}"></script>
      <div id="fb-root"></div>
      <script async defer crossorigin="anonymous"
        src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v17.0" nonce="ioMhT7xz"></script>

   </body>
</html>


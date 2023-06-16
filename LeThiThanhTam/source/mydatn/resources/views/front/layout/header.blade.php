<nav class="navbar navbar-expand-lg navbar-light bg-white w-100 navigation" id="navbar">
  <div class="container">
    <a class="navbar-brand font-weight-bold" href="/"><img src="admin/img/logo/{{$result['logo']}}" alt="Alice" style="width:135px"
        class="img-fluid"></a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-navbar"
      aria-controls="main-navbar" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse " id="main-navbar">
      <ul class="navbar-nav mx-auto">
        <li class="nav-item active">
          <a class="nav-link" href="/">Trang chủ</a>
        </li>

        {{-- <li class="nav-item">
          <a class="nav-link" href="about.html">About Us</a>
        </li> --}}
        {{-- <li class="nav-item">
          <a class="nav-link" href="{{route('blogIndex')}}">Tin tức</a>
        </li> --}}

        <li class="nav-item dropdown dropdown-slide">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown3" role="button" data-delay="350"
            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Tin tức
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown3">
            <li><a href="{{route('blogIndex')}}">Tất cả</a></li> 
            @foreach($categoryBlogs as $categoryBlog)
            <li><a href="{{route('categoryBlog',['categoryName' => Str::slug($categoryBlog->slug)])}}">{{$categoryBlog->name}}</a></li> 
            @endforeach
          </ul>
        </li>

        <li class="nav-item dropdown dropdown-slide">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown3" role="button" data-delay="350"
            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Sản phẩm
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown3">
            <li><a href="{{route('shopIndex')}}">Tất cả</a></li>
            @foreach($categoryProducts as $categoryProduct)
            <li><a href="{{route('categoryProduct',['categoryName' => Str::slug($categoryProduct->slug)])}}">{{$categoryProduct->name}}</a></li> 
            @endforeach
          </ul>
        </li><!-- / Blog -->

        <li class="nav-item active">
          <a class="nav-link" href="{{route('lienHe')}}">Liên hệ</a>
        </li>
        {{-- <li class="nav-item active">
          <a class="nav-link" href="{{route('chinhSach')}}">Chính sách</a>
        </li> --}}

        {{-- <li class="nav-item">
          <a class="nav-link" href="contact.html">Contact Us</a>
        </li> --}}
      </ul>
    </div>
    <!-- Navbar-collapse -->

    <ul class="top-menu list-inline mb-0 d-none d-lg-block" id="top-menu">
      {{-- <li class="list-inline-item">
        <a href="#" class="search_toggle" id="search-icon"><i class="tf-ion-android-search"></i></a>
      </li> --}}

      <li class="dropdown cart-nav dropdown-slide list-inline-item"><span class="nav-shop__circle" id="totalqty">{{Cart::count()}}</span>
        <a href="{{route('cart')}}" class="dropdown-toggle cart-icon">
          <i class="tf-ion-android-cart"></i>
        </a>
       
      </li>
      <li class="list-inline-item">
        @if (Session::has('customer'))
              <a href="{{route('ordersHistory')}}" class="login-panel">
                <i class="fa fa-user"></i>
                {{Session::get('customer')->name}}
              </a>
              - <a href="{{route('logout')}}">
                Đăng xuất
              </a>
              @else
                <li class="list-inline-item"><a class="mr-3" href="{{route('login')}}">Đăng nhập</a></li>
              @endif
        {{-- <a href="#"><i class="tf-ion-ios-person mr-3"></i></a> --}}
      </li>
    </ul>
  </div>
</nav>


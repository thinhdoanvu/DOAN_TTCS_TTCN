@php
    if(Auth::guard('webuser')->check() == false){
        $user_id = 0;
    }else {
        $user_id = Auth::guard('webuser')->user()->id;
    }
    $menunotes = app\Models\Menunote::all();
    $location = app\Models\Menulocation::all();
    $count_cart_item = app\Models\Cart::where('member_id', $user_id)->count('member_id');
@endphp
<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light scrolled awake shadow-sm" id="ftco-navbar">
    <div class="container">
      <a class="navbar-brand" href="{{ route('home') }}">NaFruits</a>
      @foreach ($location as $pos)
        @if ($pos->pos == "header")
          <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
              @foreach ($menunotes as $item)
                @if($item->parent_id == 0)
                <li class="nav-item dropdown">
                    <a
                    href="{{ route($item->slug) }}"
                    class="nav-link">{{$item->name}}</a>
                    @include('user.page.menus.childmenu', ['item' => $item])
                </li>
                @endif
              @endforeach
            <li class="nav-item cta cta-colored cart-icon">
                <a href="{{ route('cart.detail') }}" class="nav-link">
                    <span class="icon-shopping_cart"></span><span>[{{$count_cart_item}}]</span>
                </a>
                @include('user.partials.cart')
            </li>
              @if(Auth::guard('webuser')->check())
                <li class="nav-item dropdown">
                  <a class="nav-link" data-toggle="dropdown" href="#">
                    Xin chào {{ Auth::guard('webuser')->user()->full_name }}
                  </a>
                  <div class="dropdown-menu" style="text-align: center; min-width: 13rem; margin: 0;">
                    <div>
                      <a href="{{ route('userinf.inf', Auth::guard('webuser')->user()->id) }}">Tài khoản</a>
                    </div>
                    <a href="{{ route('user.logout') }}">Đăng xuất</a>
                  </div>
                </li>
              @else
                <li class="nav-item">
                    <a href="{{ route('user.login') }}" class="nav-link">
                        Đăng nhập
                    </a>
                </li>
              @endif
            </ul>
          </div>
        @endif
      @endforeach
    </div>
  </nav>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var cartLink = document.querySelector(".cart-icon");
        var cartContent = document.querySelector(".cart-main");

        cartLink.addEventListener("mouseenter", function() {
            cartContent.style.display = "block";
        });

        cartLink.addEventListener("mouseleave", function() {
            cartContent.style.display = "none";
        });
    });
</script>

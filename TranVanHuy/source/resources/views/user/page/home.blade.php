@extends('user.usershop')
@section('usermain')

    {{-- Slider --}}
    @include('user.page.slider')
    {{-- Slider --}}

    <input type="hidden" name="iduser"
        value="@php
if(Auth::guard('webuser')->check() == false){
                                        echo "";
                                        }else {
                                        $user_id = Auth::guard('webuser')->user()->id;
                                        echo $user_id;
                                        } @endphp">

    <section class="ftco-section bgpt">
        <div class="container bw">
            <div class="row no-gutters ftco-services">
                <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services mb-md-0 mb-4">
                        <div class="icon bg-color-1 active d-flex justify-content-center align-items-center mt-2 mb-2">
                            <span class="flaticon-shipped"></span>
                        </div>
                        <div class="media-body">
                            <h3 class="heading">MIỄN PHÍ VẬN CHUYỂN</h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services mb-md-0 mb-4">
                        <div class="icon bg-color-2 d-flex justify-content-center align-items-center mt-2 mb-2">
                            <span class="flaticon-diet"></span>
                        </div>
                        <div class="media-body">
                            <h3 class="heading">TƯƠI SẠCH</h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services mb-md-0 mb-4">
                        <div class="icon bg-color-3 d-flex justify-content-center align-items-center mt-2 mb-2">
                            <span class="flaticon-award"></span>
                        </div>
                        <div class="media-body">
                            <h3 class="heading">CHẤT LƯỢNG CAO</h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services mb-md-0 mb-4">
                        <div class="icon bg-color-4 d-flex justify-content-center align-items-center mt-2 mb-2">
                            <span class="flaticon-customer-service"></span>
                        </div>
                        <div class="media-body">
                            <h3 class="heading">HÔ TRỢ</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section bgpt">
        <div class="container bw">
            <div class="title_module_main heading-bar d-flex justify-content-between align-items-center mb-3">
                <h2 class="heading-bar__title ">
                    <a class='link' href="#" title="Hot sale">
                        <img class="ml-2" src="../userdashboard/images/hotsale.jpg" alt="hotsale.jpg" height="90px"
                            width="180px">
                    </a>
                </h2>
            </div>
            @if (
                $discount_five_products->count() == 0 ||
                    $discount_five_products->pluck('promotions')->flatten()->where('active', 1)->count() == 0)
                <div class="row p-4">
                    <div class="col-4"></div>
                    <div class="col-4">
                        <h5 class="pl-2">Không có sản phẩm giảm giá</h5>
                    </div>
                    <div class="col-4"></div>
                </div>
            @else
                <div class="row px-1">
                    @foreach ($discount_five_products as $discount_five_product)
                        <div class="col-15 ftco-animate">
                            <a href="{{ route('product.slug', $discount_five_product->slug->nameSlug) }}">
                                <div class="product">
                                    <div class="img-prod">
                                        <img class="img-fluid" src="{{ $discount_five_product->image_path }}"
                                            alt="{{ $discount_five_product->image_name }}" width="205" height="164">
                                        @if ($discount_five_product->promotions->count() > 0)
                                            @foreach ($discount_five_product->promotions as $promotion)
                                                @if ($promotion->type == 'Giảm theo %')
                                                    <span class="status">{{ $promotion->discount_rate }}%</span>
                                                @else
                                                    @if ($promotion->type == 'Giảm theo số tiền')
                                                        <span class="status">{{ $promotion->discount_rate }}đ</span>
                                                    @else
                                                        <span class="status">Đồng giá</span>
                                                    @endif
                                                @endif
                                            @endforeach
                                            <div class="overlay"></div>
                                        @endif

                                        <div class="text py-3 pb-4 px-3 text-center">
                                            <h3><a href="#">{{ $discount_five_product->name }}</a></h3>
                                            <div class="d-flex">
                                                <div class="pricing">
                                                    @if ($discount_five_product->price_discount == null)
                                                        <p class="price">
                                                            <span>
                                                                {{ number_format($discount_five_product->price) }}<u>đ</u>
                                                            </span>
                                                        </p>
                                                    @else
                                                        <p class="price">
                                                            <span class="mr-2 price-dc">
                                                                {{ number_format($discount_five_product->price) }}<u>đ</u>
                                                            </span>
                                                            <span class="price-sale">
                                                                {{ number_format($discount_five_product->price_discount) }}<u>đ</u>
                                                            </span>
                                                        </p>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
                <div class="heading-bar__action d-md-block d-none pb-3" align="center">
                    <a href="#" title="Xem tất cả" class="btn1">
                        Xem tất cả <i class="nav-icon fas fa-angle-right"></i>
                    </a>
                </div>
            @endif
        </div>
    </section>

    <section class="ftco-section bgpt">
        <div class="container bw">
            <div class="title_module_main heading-bar d-flex justify-content-between align-items-center mb-3">
                <h4 class="heading-bar__title">
                    <a class='link bbhv' href="#" title="Latest news">Bán Chạy Nhất | Trái cây nhập</a>
                </h4>
            </div>
            <div class="row">
                <div class="row px-4">
                    <div class="col-30 ftco-animate">
                        <a href="#">
                            <img width="100%" height="100%" src="../userdashboard/images/traicaynhapkhau.jpg"
                                alt="traicaynhapkhau.jpg">
                        </a>
                    </div>
                    @foreach ($three_imported_products as $three_imported_product)
                        <div class="col-15 ftco-animate">
                            <a href="{{ route('product.slug', $three_imported_product->slug->nameSlug) }}">
                                <div class="product">
                                    <div class="img-prod">
                                        <img class="img-fluid" src="{{ $three_imported_product->image_path }}"
                                            alt="{{ $three_imported_product->image_name }}" width="205" height="164">
                                        @if ($three_imported_product->promotions->where('active', 1)->count() > 0)
                                            @foreach ($three_imported_product->promotions->where('active', 1) as $promotion)
                                                @if ($promotion->type == 'Giảm theo %')
                                                    <span class="status">{{ $promotion->discount_rate }}%</span>
                                                @else
                                                    @if ($promotion->type == 'Giảm theo số tiền')
                                                        <span class="status">{{ $promotion->discount_rate }}đ</span>
                                                    @else
                                                        <span class="status">Đồng giá</span>
                                                    @endif
                                                @endif
                                            @endforeach
                                            <div class="overlay"></div>
                                        @endif

                                        <div class="text py-3 pb-4 px-3 text-center">
                                            <h3>{{ $three_imported_product->name }}</h3>
                                            <div class="d-flex">
                                                <div class="pricing">
                                                    @if ($three_imported_product->price_discount == null)
                                                        <p class="price">
                                                            <span>
                                                                {{ number_format($three_imported_product->price) }}<u>đ</u>
                                                            </span>
                                                        </p>
                                                    @else
                                                        <p class="price">
                                                            <span class="mr-2 price-dc">
                                                                {{ number_format($three_imported_product->price) }}<u>đ</u>
                                                            </span>
                                                            <span class="price-sale">
                                                                {{ number_format($three_imported_product->price_discount) }}<u>đ</u>
                                                            </span>
                                                        </p>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
                <div class="row px-4">
                    @foreach ($five_imported_products as $five_imported_product)
                        <div class="col-15 ftco-animate">
                            <a href="{{ route('product.slug', $five_imported_product->slug->nameSlug) }}">
                                <div class="product">
                                    <div class="img-prod">
                                        <img class="img-fluid" src="{{ $five_imported_product->image_path }}"
                                            alt="{{ $five_imported_product->image_name }}" width="205"
                                            height="164">
                                        @if ($five_imported_product->promotions->count() > 0)
                                            @foreach ($five_imported_product->promotions as $promotion)
                                                @if ($promotion->type == 'Giảm theo %')
                                                    <span class="status">{{ $promotion->discount_rate }}%</span>
                                                @else
                                                    @if ($promotion->type == 'Giảm theo số tiền')
                                                        <span class="status">{{ $promotion->discount_rate }}đ</span>
                                                    @else
                                                        <span class="status">Đồng giá</span>
                                                    @endif
                                                @endif
                                            @endforeach
                                            <div class="overlay"></div>
                                        @endif

                                        <div class="text py-3 pb-4 px-3 text-center">
                                            <h3>{{ $five_imported_product->name }}</h3>
                                            <div class="d-flex">
                                                <div class="pricing">
                                                    @if ($five_imported_product->price_discount == null)
                                                        <p class="price">
                                                            <span>
                                                                {{ number_format($five_imported_product->price) }}<u>đ</u>
                                                            </span>
                                                        </p>
                                                    @else
                                                        <p class="price">
                                                            <span class="mr-2 price-dc">
                                                                {{ number_format($five_imported_product->price) }}<u>đ</u>
                                                            </span>
                                                            <span class="price-sale">
                                                                {{ number_format($five_imported_product->price_discount) }}<u>đ</u>
                                                            </span>
                                                        </p>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="heading-bar__action d-md-block d-none pb-3" align="center">
                <a href="#" title="Xem tất cả" class="btn1">
                    Xem tất cả <i class="nav-icon fas fa-angle-right"></i>
                </a>
            </div>
        </div>
    </section>

    <section class="ftco-section bgpt">
        <div class="container bw">
            <div class="title_module_main heading-bar d-flex justify-content-between align-items-center mb-3">
                <h4 class="heading-bar__title">
                    <a class='link bbhv' href="#" title="Latest news">Bán Chạy Nhất | Trái cây Việt</a>
                </h4>
            </div>
            <div class="row px-1">
                @foreach ($five_products as $five_product)
                    <div class="col-15 ftco-animate">
                        <a href="{{ route('product.slug', $five_product->slug->nameSlug) }}">
                            <div class="product">
                                <div class="img-prod">
                                    <img class="img-fluid" src="{{ $five_product->image_path }}"
                                        alt="{{ $five_product->image_name }}" width="205" height="164">
                                    @if ($five_product->promotions->where('active', 1)->count() > 0)
                                        @foreach ($five_product->promotions->where('active', 1) as $promotion)
                                            @if ($promotion->type == 'Giảm theo %')
                                                <span class="status">{{ $promotion->discount_rate }}%</span>
                                            @else
                                                @if ($promotion->type == 'Giảm theo số tiền')
                                                    <span class="status">{{ $promotion->discount_rate }}đ</span>
                                                @else
                                                    <span class="status">Đồng giá</span>
                                                @endif
                                            @endif
                                        @endforeach
                                        <div class="overlay"></div>
                                    @endif

                                    <div class="text py-3 pb-4 px-3 text-center">
                                        <h3>{{ $five_product->name }}</h3>
                                        <div class="d-flex">
                                            <div class="pricing">
                                                @if ($five_product->price_discount == null)
                                                    <p class="price">
                                                        <span>{{ number_format($five_product->price) }}<u>đ</u></span>
                                                    </p>
                                                @else
                                                    <p class="price"><span
                                                            class="mr-2 price-dc">{{ number_format($five_product->price) }}<u>đ</u></span>
                                                        <span class="price-sale">
                                                            {{ number_format($five_product->price_discount) }}<u>đ</u>
                                                        </span>
                                                    </p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
            <div class="heading-bar__action d-md-block d-none pb-3" align="center">
                <a href="#" title="Xem tất cả" class="btn1">
                    Xem tất cả <i class="nav-icon fas fa-angle-right"></i>
                </a>
            </div>
        </div>
    </section>

    <section class="section awe-section-10">
        <section class="section_blog section bgpt">
            <div class="container card border-0 py-3 bw">
                <div class="title_module_main heading-bar d-flex justify-content-between align-items-center">
                    <h2 class="heading-bar__title">
                        <a class='link' href="{{ route('blog.blogIndex') }}" title="Latest news">Tin tức mới nhất</a>
                    </h2>
                    <div class="heading-bar__action d-md-block d-none">
                        <a href="{{ route('blog.blogIndex') }}" title="View all" class="link more">
                            Xem tất cả <i class="nav-icon fas fa-angle-right"></i>
                        </a>
                    </div>
                </div>

                <div class="row mt-3 ">
                    <div class="col-12 col-md-6 col-lg-5 section_blog_left ">
                        <div class="blogwp clearfix card border-0 ">
                            <a class="image-blog card-img-top text-center"
                                href="{{ route('blog.slug', $nposts->slug->nameSlug) }}" title="{{ $nposts->title }}">
                                <img class="lazyload img-fluid" src="{{ $nposts->imagePath }}"
                                    alt="{{ $nposts->imageName }}">
                            </a>
                            <div class="content_blog clearfix card-body px-0">
                                <h3>
                                    <a class='link' href="{{ route('blog.slug', $nposts->slug->nameSlug) }}"
                                        title="{{ $nposts->title }}">{{ $nposts->title }}</a>
                                </h3>
                                <div class="media">
                                    <div class="media-body">
                                        <div class='mt-0'>{{ $nposts->posterName }}</div>
                                        <small class='text-muted font-weight-light'>
                                            {{ date('l, F d, Y', strtotime($nposts['created_at'])) }}
                                        </small>
                                    </div>
                                </div>
                                <p class="justify">
                                    {!! \Illuminate\Support\Str::limit($nposts->content, 10, '...') !!} <a href='{{ route('blog.slug', $nposts->slug->nameSlug) }}'
                                        class='button_custome_35 link'>Đọc tiếp</a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-7 position-relative">
                        <div class="section_blog_right scroll">
                            @foreach ($posts as $item)
                                <div class="blogwp clearfix media">
                                    <a class="image-blog text-center mr-3"
                                        href="{{ route('blog.slug', $item->slug->nameSlug) }}"
                                        title="{{ $item->title }}">
                                        <img class="lazyload img-fluid" src="{{ $item->imagePath }}"
                                            alt="{{ $item->imageName }}">
                                    </a>
                                    <div class="content_blog clearfix media-body ">
                                        <h3 class='mt-0'>
                                            <a class='link' href="{{ route('blog.slug', $item->slug->nameSlug) }}"
                                                title="{{ $item->title }}">{{ $item->title }}</a>
                                        </h3>
                                        <div class="media">
                                            <div class="media-body d-flex flex--wrap align-items-center">
                                                <div class='mt-0 mr-3'>{{ $item->posterName }}</div>
                                                <small class='text-muted font-weight-light'>
                                                    {{ date('l, F d, Y', strtotime($item['created_at'])) }}
                                                </small>
                                            </div>
                                        </div>
                                        <p class="justify lead d-none d-md-block ">
                                            {!! \Illuminate\Support\Str::limit($item->content, 10, '...') !!} <a
                                                href='{{ route('blog.slug', $item->slug->nameSlug) }}'
                                                class='button_custome_35 link'>Đọc tiếp</a>
                                        </p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>

    <section class="ftco-section ftco-no-pt ftco-no-pb py-5 bg-light">
        <div class="container">
            <div class="row d-flex justify-content-center py-5">
                <div class="col-md-6">
                    <h2 style="font-size: 22px;" class="mb-0">Subcribe to our Newsletter</h2>
                    <span>Get e-mail updates about our latest shops and special offers</span>
                </div>
                <div class="col-md-6 d-flex align-items-center">
                    <form action="#" class="subscribe-form">
                        <div class="form-group d-flex">
                            <input type="text" class="form-control" placeholder="Enter email address">
                            <input type="submit" value="Subscribe" class="submit px-3">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

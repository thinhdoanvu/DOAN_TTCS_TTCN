<?php 
    $orders = App\Models\Order::All();
    $users = App\Models\User::All();
    $products = App\Models\Product::All();
?>
<!doctype html>
<html lang="en">

<head>
    <base href="/">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Admin - Alice Shop</title>

    <base href="{{ asset('') }}">
    <meta name="viewport"
        content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description"
        content="This is an example dashboard created using build-in elements and components.">

    <!-- Disable tap highlight on IE -->
    <meta name="msapplication-tap-highlight" content="no">

    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    @stack('tv')
    <link href="./dashboard/main.css" rel="stylesheet">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/3.0.5/daterangepicker.css" />
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
    <link href="./dashboard/my_style.css" rel="stylesheet">
    
</head>

<body>
    <div class="app-container app-theme-white body-tabs-shadow fixed-header fixed-sidebar">
        <div class="app-header header-shadow">
            <div class="app-header__logo">
                <div class="logo-src"></div>
                <div class="header__pane ml-auto">
                    <div>
                        <button type="button" class="hamburger close-sidebar-btn hamburger--elastic"
                            data-class="closed-sidebar">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="app-header__mobile-menu">
                <div>
                    <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                    </button>
                </div>
            </div>
            <div class="app-header__menu">
                <span>
                    <button type="button"
                        class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                        <span class="btn-icon-wrapper">
                            <i class="fa fa-ellipsis-v fa-w-6"></i>
                        </span>
                    </button>
                </span>
            </div>
            <div class="app-header__content">
                <div class="app-header-left">

                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Ngôn ngữ
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                          <a class="dropdown-item" href="{!! route('user.change-language', ['vi']) !!}">Tiếng Việt</a>
                          <a class="dropdown-item" href="{!! route('user.change-language', ['en']) !!}">Tiếng Anh</a>
                        </div>
                      </div>
                </div>
                <div class="app-header-right">
 

                    <div class="header-btn-lg pr-0">
                        <div class="widget-content p-0">
                            <div class="widget-content-wrapper">
                                <div class="widget-content-left">
                                    <div class="btn-group">
                                        <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                            class="p-0 btn">
                                            <img width="42" class="rounded-circle" src="front/img/user/{{ Auth::user()->avatar ?? 'no-images.jpg' }}"
                                                alt="">
                                            <i class="fa fa-angle-down ml-2 opacity-8"></i>
                                        </a>
                                        <div tabindex="-1" role="menu" aria-hidden="true"
                                            class="rm-pointers dropdown-menu-lg dropdown-menu dropdown-menu-right">
                                            <div class="dropdown-menu-header">
                                                <div class="dropdown-menu-header-inner bg-info">
                                                    <div class="menu-header-image opacity-2"
                                                        style="background-image: url('dashboard/assets/images/dropdown-header/city3.jpg');">
                                                    </div>
                                                    <div class="menu-header-content text-left">
                                                        <div class="widget-content p-0">
                                                            <div class="widget-content-wrapper">
                                                                <div class="widget-content-left mr-3">
                                                                    <img width="42" class="rounded-circle"
                                                                        src="front/img/user/{{ Auth::user()->avatar ?? 'no-images.jpg' }}" alt="">
                                                                </div>
                                                                <div class="widget-content-left">
                                                                    <div class="widget-heading">{{Auth::user()->name ?? ''}}</div>
                                                                    <div class="widget-subheading opacity-8">{{Auth::user()->email ?? '' }}</div>
                                                                </div>
                                                                <div class="widget-content-right mr-2">
                                                                    <a href="./admin/logout" class="btn-pill btn-shadow btn-shine btn btn-focus"> 
                                                                        Đăng xuất
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
             
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-content-left  ml-3 header-user-info">
                                    <div class="widget-heading"> {{Auth::user()->name ?? ''}} </div>
                                    <div class="widget-subheading"> {{Auth::user()->email ?? ''}} </div>
                                </div>
                                <div class="widget-content-right header-user-info ml-3">
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>

        <div class="app-main">
            <div class="app-sidebar sidebar-shadow">
                <div class="app-header__logo">
                    <div class="logo-src"></div>
                    <div class="header__pane ml-auto">
                        <div>
                            <button type="button" class="hamburger close-sidebar-btn hamburger--elastic"
                                data-class="closed-sidebar">
                                <span class="hamburger-box">
                                    <span class="hamburger-inner"></span>
                                </span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="app-header__mobile-menu">
                    <div>
                        <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
                <div class="app-header__menu">
                    <span>
                        <button type="button"
                            class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                            <span class="btn-icon-wrapper">
                                <i class="fa fa-ellipsis-v fa-w-6"></i>
                            </span>
                        </button>
                    </span>
                </div>
                <div class="scrollbar-sidebar">
                    <div class="app-sidebar__inner">
                        <ul class="vertical-nav-menu">
                            <li class="app-sidebar__heading">Menu</li>

                            <li class="mm-active">
                                <a href="#">
                                    <i class="metismenu-icon pe-7s-plugin"></i>Applications
                                    <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                                </a>
                                <ul>
                                    <li>
                                        <a href="./admin/dashboard" class="{{(request()->segment(2) == 'dashboard') ? 'mm-active' : ''}}">
                                            <i class="metismenu-icon"></i>@lang('lang.dashboard')
                                        </a>
                                    </li>
                                    
                                    <li>
                                        <a href="./admin/order" class="{{(request()->segment(2) == 'order') ? 'mm-active' : ''}}">
                                            <i class="metismenu-icon"></i>@lang('lang.order')
                                        </a>
                                    </li>
                                    <li>
                                        <a href="./admin/product" class="{{(request()->segment(2) == 'product') ? 'mm-active' : ''}}">
                                            <i class="metismenu-icon"></i>@lang('lang.product')
                                        </a>
                                    </li>
                                    <li>
                                        <a href="./admin/category" class="{{(request()->segment(2) == 'category') ? 'mm-active' : ''}}">
                                            <i class="metismenu-icon"></i>@lang('lang.category')
                                        </a>
                                    </li>
                                    <li>
                                        <a href="./admin/brand" class="{{(request()->segment(2) == 'brand') ? 'mm-active' : ''}}">
                                            <i class="metismenu-icon"></i>@lang('lang.brand')
                                        </a>
                                    </li>
                                    <li>
                                        <a href="./admin/coupon" class="{{(request()->segment(2) == 'coupon') ? 'mm-active' : ''}}">
                                            <i class="metismenu-icon"></i>@lang('lang.coupon')
                                        </a>
                                    </li>
                                    <li>
                                        <a href="./admin/blog" class="{{(request()->segment(2) == 'blog') ? 'mm-active' : ''}}">
                                            <i class="metismenu-icon"></i>@lang('lang.blog')
                                        </a> 
                                    </li>
                                    <li>
                                        <a href="./admin/blogCategory" class="{{(request()->segment(2) == 'blogCategory') ? 'mm-active' : ''}}">
                                            <i class="metismenu-icon"></i>@lang('lang.blogCategory')
                                        </a> 
                                    </li>
                                    <li>
                                        <a href="./admin/setting" class="{{(request()->segment(2) == 'setting') ? 'mm-active' : ''}}">
                                            <i class="metismenu-icon"></i>@lang('lang.setting')
                                        </a>
                                    </li>
                                    <li>
                                        <a href="./admin/productComment" class="{{(request()->segment(2) == 'productComment') ? 'mm-active' : ''}}">
                                            <i class="metismenu-icon"></i>@lang('lang.productComment')
                                        </a>
                                    </li>
                                    <li>
                                        <a href="./admin/user" class="{{(request()->segment(2) == 'user') ? 'mm-active' : ''}}">
                                            <i class="metismenu-icon"></i>@lang('lang.user')
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="app-main__outer">



                {{-- Main --}}
                @yield('body')



                <div class="app-wrapper-footer">
                    <div class="app-footer">
                        <div class="app-footer__inner">
                            <div class="app-footer-left">

                            </div>
                            <div class="app-footer-right">
                            
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="app-drawer-wrapper">
        <div class="drawer-nav-btn">
            <button type="button" class="hamburger hamburger--elastic is-active">
                <span class="hamburger-box"><span class="hamburger-inner"></span></span>
            </button>
        </div>
        <div class="drawer-content-wrapper">
            <div class="scrollbar-container">
                <h3 class="drawer-heading">Servers Status</h3>
                <div class="drawer-section">
                    <div class="row">
                        <div class="col">
                            <div class="progress-box">
                                <h4>Server Load 1</h4>
                                <div class="circle-progress circle-progress-gradient-xl mx-auto">
                                    <small></small>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="progress-box">
                                <h4>Server Load 2</h4>
                                <div class="circle-progress circle-progress-success-xl mx-auto">
                                    <small></small>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="progress-box">
                                <h4>Server Load 3</h4>
                                <div class="circle-progress circle-progress-danger-xl mx-auto">
                                    <small></small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="divider"></div>
                    <div class="mt-3">
                        <h5 class="text-center card-title">Thống kê</h5>
                        <div id="sparkline-carousel-3"></div>
                        <div class="row">
                            <div class="col">
                                <div class="widget-chart p-0">
                                    <div class="widget-chart-content">
                                        <div class="widget-numbers text-warning fsize-3">{{count($orders)}}</div>
                                        <div class="widget-subheading pt-1">Orders</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="widget-chart p-0">
                                    <div class="widget-chart-content">
                                        <div class="widget-numbers text-danger fsize-3">{{count($users)}}</div>
                                        <div class="widget-subheading pt-1">Users</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="widget-chart p-0">
                                    <div class="widget-chart-content">
                                        <div class="widget-numbers text-success fsize-3">{{count($products)}}</div>
                                        <div class="widget-subheading pt-1">Products</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="divider"></div>
                        <div class="text-center mt-2 d-block">
                            <button class="mr-2 border-0 btn-transition btn btn-outline-danger">Escalate Issue</button>
                            <button class="border-0 btn-transition btn btn-outline-success">Support Center</button>
                        </div>
                    </div>
                </div>
                <h3 class="drawer-heading">File Transfers</h3>
                <div class="drawer-section p-0">
                    <div class="files-box">
                        <ul class="list-group list-group-flush">
                            <li class="pt-2 pb-2 pr-2 list-group-item">
                                <div class="widget-content p-0">
                                    <div class="widget-content-wrapper">
                                        <div
                                            class="widget-content-left opacity-6 fsize-2 mr-3 text-primary center-elem">
                                            <i class="fa fa-file-alt"></i>
                                        </div>
                                        <div class="widget-content-left">
                                            <div class="widget-heading font-weight-normal">TPSReport.docx</div>
                                        </div>
                                        <div class="widget-content-right widget-content-actions">
                                            <button class="btn-icon btn-icon-only btn btn-link btn-sm">
                                                <i class="fa fa-cloud-download-alt"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="pt-2 pb-2 pr-2 list-group-item">
                                <div class="widget-content p-0">
                                    <div class="widget-content-wrapper">
                                        <div
                                            class="widget-content-left opacity-6 fsize-2 mr-3 text-warning center-elem">
                                            <i class="fa fa-file-archive"></i>
                                        </div>
                                        <div class="widget-content-left">
                                            <div class="widget-heading font-weight-normal">Latest_photos.zip</div>
                                        </div>
                                        <div class="widget-content-right widget-content-actions">
                                            <button class="btn-icon btn-icon-only btn btn-link btn-sm">
                                                <i class="fa fa-cloud-download-alt"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="pt-2 pb-2 pr-2 list-group-item">
                                <div class="widget-content p-0">
                                    <div class="widget-content-wrapper">
                                        <div class="widget-content-left opacity-6 fsize-2 mr-3 text-danger center-elem">
                                            <i class="fa fa-file-pdf"></i>
                                        </div>
                                        <div class="widget-content-left">
                                            <div class="widget-heading font-weight-normal">Annual Revenue.pdf</div>
                                        </div>
                                        <div class="widget-content-right widget-content-actions">
                                            <button class="btn-icon btn-icon-only btn btn-link btn-sm">
                                                <i class="fa fa-cloud-download-alt"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="pt-2 pb-2 pr-2 list-group-item">
                                <div class="widget-content p-0">
                                    <div class="widget-content-wrapper">
                                        <div
                                            class="widget-content-left opacity-6 fsize-2 mr-3 text-success center-elem">
                                            <i class="fa fa-file-excel"></i>
                                        </div>
                                        <div class="widget-content-left">
                                            <div class="widget-heading font-weight-normal">Analytics_GrowthReport.xls
                                            </div>
                                        </div>
                                        <div class="widget-content-right widget-content-actions">
                                            <button class="btn-icon btn-icon-only btn btn-link btn-sm">
                                                <i class="fa fa-cloud-download-alt"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <h3 class="drawer-heading">Tasks in Progress</h3>
                <div class="drawer-section p-0">
                    <div class="todo-box">
                        <ul class="todo-list-wrapper list-group list-group-flush">
                            <li class="list-group-item">
                                <div class="todo-indicator bg-warning"></div>
                                <div class="widget-content p-0">
                                    <div class="widget-content-wrapper">
                                        <div class="widget-content-left mr-2">
                                            <div class="custom-checkbox custom-control">
                                                <input type="checkbox" id="exampleCustomCheckbox1266"
                                                    class="custom-control-input">
                                                <label class="custom-control-label"
                                                    for="exampleCustomCheckbox1266">&nbsp;</label>
                                            </div>
                                        </div>
                                        <div class="widget-content-left">
                                            <div class="widget-heading">Wash the car
                                                <div class="badge badge-danger ml-2">Rejected</div>
                                            </div>
                                            <div class="widget-subheading"><i>Written by Bob</i></div>
                                        </div>
                                        <div class="widget-content-right widget-content-actions">
                                            <button class="border-0 btn-transition btn btn-outline-success">
                                                <i class="fa fa-check"></i>
                                            </button>
                                            <button class="border-0 btn-transition btn btn-outline-danger">
                                                <i class="fa fa-trash-alt"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="todo-indicator bg-focus"></div>
                                <div class="widget-content p-0">
                                    <div class="widget-content-wrapper">
                                        <div class="widget-content-left mr-2">
                                            <div class="custom-checkbox custom-control">
                                                <input type="checkbox" id="exampleCustomCheckbox1666"
                                                    class="custom-control-input">
                                                <label class="custom-control-label"
                                                    for="exampleCustomCheckbox1666">&nbsp;</label>
                                            </div>
                                        </div>
                                        <div class="widget-content-left">
                                            <div class="widget-heading">Task with hover dropdown menu</div>
                                            <div class="widget-subheading">
                                                <div>By Johnny
                                                    <div class="badge badge-pill badge-info ml-2">NEW</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="widget-content-right widget-content-actions">
                                            <div class="d-inline-block dropdown">
                                                <button type="button" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false" class="border-0 btn-transition btn btn-link">
                                                    <i class="fa fa-ellipsis-h"></i>
                                                </button>
                                                <div tabindex="-1" role="menu" aria-hidden="true"
                                                    class="dropdown-menu dropdown-menu-right">
                                                    <h6 tabindex="-1" class="dropdown-header">Header</h6>
                                                    <button type="button" disabled="" tabindex="-1"
                                                        class="disabled dropdown-item">Action</button>
                                                    <button type="button" tabindex="0" class="dropdown-item">Another
                                                        Action</button>
                                                    <div tabindex="-1" class="dropdown-divider"></div>
                                                    <button type="button" tabindex="0" class="dropdown-item">Another
                                                        Action</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="todo-indicator bg-primary"></div>
                                <div class="widget-content p-0">
                                    <div class="widget-content-wrapper">
                                        <div class="widget-content-left mr-2">
                                            <div class="custom-checkbox custom-control">
                                                <input type="checkbox" id="exampleCustomCheckbox4777"
                                                    class="custom-control-input">
                                                <label class="custom-control-label"
                                                    for="exampleCustomCheckbox4777">&nbsp;</label>
                                            </div>
                                        </div>
                                        <div class="widget-content-left flex2">
                                            <div class="widget-heading">Badge on the right task</div>
                                            <div class="widget-subheading">This task has show on hover actions!</div>
                                        </div>
                                        <div class="widget-content-right widget-content-actions">
                                            <button class="border-0 btn-transition btn btn-outline-success">
                                                <i class="fa fa-check"></i>
                                            </button>
                                        </div>
                                        <div class="widget-content-right ml-3">
                                            <div class="badge badge-pill badge-success">Latest Task</div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="todo-indicator bg-info"></div>
                                <div class="widget-content p-0">
                                    <div class="widget-content-wrapper">
                                        <div class="widget-content-left mr-2">
                                            <div class="custom-checkbox custom-control">
                                                <input type="checkbox" id="exampleCustomCheckbox2444"
                                                    class="custom-control-input">
                                                <label class="custom-control-label"
                                                    for="exampleCustomCheckbox2444">&nbsp;</label>
                                            </div>
                                        </div>
                                        <div class="widget-content-left mr-3">
                                            <div class="widget-content-left">
                                                <img width="42" class="rounded" src="dashboard/assets/images/avatars/1.jpg"
                                                    alt="" />
                                            </div>
                                        </div>
                                        <div class="widget-content-left">
                                            <div class="widget-heading">Go grocery shopping</div>
                                            <div class="widget-subheading">A short description ...</div>
                                        </div>
                                        <div class="widget-content-right widget-content-actions">
                                            <button class="border-0 btn-transition btn btn-sm btn-outline-success">
                                                <i class="fa fa-check"></i>
                                            </button>
                                            <button class="border-0 btn-transition btn btn-sm btn-outline-danger">
                                                <i class="fa fa-trash-alt"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="todo-indicator bg-success"></div>
                                <div class="widget-content p-0">
                                    <div class="widget-content-wrapper">
                                        <div class="widget-content-left mr-2">
                                            <div class="custom-checkbox custom-control">
                                                <input type="checkbox" id="exampleCustomCheckbox3222"
                                                    class="custom-control-input">
                                                <label class="custom-control-label"
                                                    for="exampleCustomCheckbox3222">&nbsp;</label>
                                            </div>
                                        </div>
                                        <div class="widget-content-left flex2">
                                            <div class="widget-heading">Development Task</div>
                                            <div class="widget-subheading">Finish React ToDo List App</div>
                                        </div>
                                        <div class="widget-content-right">
                                            <div class="badge badge-warning mr-2">69</div>
                                        </div>
                                        <div class="widget-content-right">
                                            <button class="border-0 btn-transition btn btn-outline-success">
                                                <i class="fa fa-check"></i>
                                            </button>
                                            <button class="border-0 btn-transition btn btn-outline-danger">
                                                <i class="fa fa-trash-alt"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <h3 class="drawer-heading">Urgent Notifications</h3>
                <div class="drawer-section">
                    <div class="notifications-box">
                        <div
                            class="vertical-time-simple vertical-without-time vertical-timeline vertical-timeline--one-column">
                            <div class="vertical-timeline-item dot-danger vertical-timeline-element">
                                <div>
                                    <span class="vertical-timeline-element-icon bounce-in"></span>
                                    <div class="vertical-timeline-element-content bounce-in">
                                        <h4 class="timeline-title">All Hands Meeting</h4>
                                        <span class="vertical-timeline-element-date"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="vertical-timeline-item dot-warning vertical-timeline-element">
                                <div>
                                    <span class="vertical-timeline-element-icon bounce-in"></span>
                                    <div class="vertical-timeline-element-content bounce-in">
                                        <p>Yet another one, at <span class="text-success">15:00 PM</span></p>
                                        <span class="vertical-timeline-element-date"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="vertical-timeline-item dot-success vertical-timeline-element">
                                <div>
                                    <span class="vertical-timeline-element-icon bounce-in"></span>
                                    <div class="vertical-timeline-element-content bounce-in">
                                        <h4 class="timeline-title">Build the production release
                                            <div class="badge badge-danger ml-2">NEW</div>
                                        </h4>
                                        <span class="vertical-timeline-element-date"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="vertical-timeline-item dot-primary vertical-timeline-element">
                                <div>
                                    <span class="vertical-timeline-element-icon bounce-in"></span>
                                    <div class="vertical-timeline-element-content bounce-in">
                                        <h4 class="timeline-title">Something not important
                                            <div class="avatar-wrapper mt-2 avatar-wrapper-overlap">
                                                <div class="avatar-icon-wrapper avatar-icon-sm">
                                                    <div class="avatar-icon">
                                                        <img src="dashboard/assets/images/avatars/1.jpg" alt="">
                                                    </div>
                                                </div>
                                                <div class="avatar-icon-wrapper avatar-icon-sm">
                                                    <div class="avatar-icon">
                                                        <img src="dashboard/assets/images/avatars/2.jpg" alt="">
                                                    </div>
                                                </div>
                                                <div class="avatar-icon-wrapper avatar-icon-sm">
                                                    <div class="avatar-icon">
                                                        <img src="dashboard/assets/images/avatars/3.jpg" alt="">
                                                    </div>
                                                </div>
                                                <div class="avatar-icon-wrapper avatar-icon-sm">
                                                    <div class="avatar-icon">
                                                        <img src="dashboard/assets/images/avatars/4.jpg" alt="">
                                                    </div>
                                                </div>
                                                <div class="avatar-icon-wrapper avatar-icon-sm">
                                                    <div class="avatar-icon">
                                                        <img src="dashboard/assets/images/avatars/5.jpg" alt="">
                                                    </div>
                                                </div>
                                                <div class="avatar-icon-wrapper avatar-icon-sm">
                                                    <div class="avatar-icon">
                                                        <img src="dashboard/assets/images/avatars/6.jpg" alt="">
                                                    </div>
                                                </div>
                                                <div class="avatar-icon-wrapper avatar-icon-sm">
                                                    <div class="avatar-icon">
                                                        <img src="dashboard/assets/images/avatars/7.jpg" alt="">
                                                    </div>
                                                </div>
                                                <div class="avatar-icon-wrapper avatar-icon-sm">
                                                    <div class="avatar-icon">
                                                        <img src="dashboard/assets/images/avatars/8.jpg" alt="">
                                                    </div>
                                                </div>
                                                <div class="avatar-icon-wrapper avatar-icon-sm avatar-icon-add">
                                                    <div class="avatar-icon"><i>+</i></div>
                                                </div>
                                            </div>
                                        </h4>
                                        <span class="vertical-timeline-element-date"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="vertical-timeline-item dot-info vertical-timeline-element">
                                <div>
                                    <span class="vertical-timeline-element-icon bounce-in"></span>
                                    <div class="vertical-timeline-element-content bounce-in">
                                        <h4 class="timeline-title">This dot has an info state</h4>
                                        <span class="vertical-timeline-element-date"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="vertical-timeline-item dot-dark vertical-timeline-element">
                                <div>
                                    <span class="vertical-timeline-element-icon is-hidden"></span>
                                    <div class="vertical-timeline-element-content is-hidden">
                                        <h4 class="timeline-title">This dot has a dark state</h4>
                                        <span class="vertical-timeline-element-date"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="app-drawer-overlay d-none animated fadeIn"></div>
    
    <script src="dashboard/assets/scripts/jquery-3.2.1.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/3.0.5/moment.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/3.0.5/daterangepicker.min.js"></script>
    <script type="text/javascript" src="./dashboard/assets/scripts/main.js"></script>
    <script type="text/javascript" src="./dashboard/assets/scripts/my_script.js"></script>
    <script src="front/js/notify.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    @stack('scripts')
</html>
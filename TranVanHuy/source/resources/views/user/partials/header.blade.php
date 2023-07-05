<!DOCTYPE html>
<html lang="en">
<head>
    <base href="{{ asset('') }}">
    <title>Vegefoods - Free Bootstrap 4 Template by Colorlib</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC:400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="dashboard/plugins/fontawesome-free/css/all.min.css">

    <link rel="stylesheet" href="userdashboard/css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="userdashboard/css/animate.css">

    <link rel="stylesheet" href="userdashboard/css/owl.carousel.min.css">
    <link rel="stylesheet" href="userdashboard/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="userdashboard/css/magnific-popup.css">

    <link rel="stylesheet" href="userdashboard/css/aos.css">

    <link rel="stylesheet" href="userdashboard/css/ionicons.min.css">

    <link rel="stylesheet" href="userdashboard/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="userdashboard/css/jquery.timepicker.css">


    <link rel="stylesheet" href="userdashboard/css/flaticon.css">
    <link rel="stylesheet" href="userdashboard/css/icomoon.css">
    <link rel="stylesheet" href="userdashboard/css/style.css">
    <link rel="stylesheet" href="userdashboard/css/loginregister.css">

    <link rel="stylesheet" href="userdashboard/css/responsive.scss.css" type='text/css' media='all'>
    <link rel="stylesheet" href="userdashboard/css/main.scss.css" type='text/css' media='all'>
    <link rel="stylesheet" href="userdashboard/css/quickviews_popup_cart.scss.css" type='text/css' media='all'>
    <link rel="stylesheet" href="userdashboard/css/index.scss.css" type='text/css' media='all'>
</head>
<body class="goto-here">
  <div class="top-banner">
    <div class="container-fluid px-md-0 text-center" style="background: #f4f4f4;">
      <a href="{{ route('home') }}">
        <img src="storage/banners/top_banner.jpg" alt="top_banner.png">
      </a>
    </div>
  </div>
  <div class="py-1 bg-primary">
    <div class="container">
        <div class="row no-gutters d-flex align-items-start align-items-center px-md-0">
            <div class="col-lg-12 d-block">
                <div class="row d-flex">
                    <div class="col-md pr-4 d-flex topper align-items-center">
                        <div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-phone2"></span></div>
                        <a href="tel:0905490096"><span class="text">+84 905490096</span></a>
                    </div>
                    <div class="col-md pr-4 d-flex topper align-items-center">
                        <div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon icon-envelope"></span></div>
                        <span class="text">youremail@gmail.com</span>
                    </div>
                    <div class="col-md-5 pr-4 d-flex topper align-items-center text-lg-right">
                        <span class="text">3-5 Business days delivery &amp; Free Returns</span>
                    </div>
                </div>
            </div>
        </div>
      </div>
  </div>
  @php
    getMenu()
  @endphp
  @include('user.partials.menu')
<!-- END nav -->

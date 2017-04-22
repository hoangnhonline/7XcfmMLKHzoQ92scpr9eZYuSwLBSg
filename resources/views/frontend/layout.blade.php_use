<!DOCTYPE html>
<!--[if lt IE 7 ]><html dir="ltr" lang="vi-VN" class="no-js ie ie6 lte7 lte8 lte9"><![endif]-->
<!--[if IE 7 ]><html dir="ltr" lang="vi-VN" class="no-js ie ie7 lte7 lte8 lte9"><![endif]-->
<!--[if IE 8 ]><html dir="ltr" lang="vi-VN" class="no-js ie ie8 lte8 lte9"><![endif]-->
<!--[if IE 9 ]><html dir="ltr" lang="vi-VN" class="no-js ie ie9 lte9"><![endif]-->
<!--[if IE 10 ]><html dir="ltr" lang="vi-VN" class="no-js ie ie10 lte10"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="vi" lang="vi">
<!--<![endif]-->

<head>
  <title>@yield('title')</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="robots" content="index,follow"/>
    <meta http-equiv="content-language" content="en"/>
    <meta name="description" content="@yield('site_description')"/>
    <meta name="keywords" content="@yield('site_keywords')"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1"/>
    <link rel="shortcut icon" href="@yield('favicon')" type="image/x-icon"/>
    <link rel="canonical" href="{{ url()->current() }}"/>        
    <meta property="og:locale" content="vi_VN" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="@yield('title')" />
    <meta property="og:description" content="@yield('site_description')" />
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:site_name" content="iCho.vn" />
    <?php $socialImage = isset($socialImage) ? $socialImage : $settingArr['banner']; ?>
    <meta property="og:image" content="{{ Helper::showImage($socialImage) }}" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:description" content="@yield('site_description')" />
    <meta name="twitter:title" content="@yield('title')" />        
    <meta name="twitter:image" content="{{ Helper::showImage($socialImage) }}" />
  <!-- ===== Style CSS ===== -->
  <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/css/style.css') }}">
  <!-- ===== Responsive CSS ===== -->
  <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/css/responsive.css') }}">

  <!-- ===== Responsive CSS ===== -->
  <!-- <link href="css/responsive.css" rel="stylesheet"> -->

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
    <link href='css/animations-ie-fix.css' rel='stylesheet'>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>

<body>
  <section class="wrapper">

    <!-- <section class="loading-container" id="loading">
        <div class="loading-inner">
          <span class="loading-1"></span>
          <span class="loading-2"></span>
          <span class="loading-3"></span>
        </div>
    </section> -->
    <!-- preloader -->
    
    <header id="header" class="header fixed-header">
      <div class="top-header">
        <div class="container">
          <div class="logo">
            <a href="index.html">
              <img alt="icho" src="{{ URL::asset('assets/images/logo.png') }}">
              <h1 class="hide">icho.vn</h1>
            </a>
          </div>
          <div class="header-search-box">
            <form action="" method="" class="mainsearch">
              <input type="text" autocomplete="off" name="key" placeholder="Bạn mua gì hôm nay?" maxlength="50">
              <button type="submit"><i class="fa fa-search"></i></button>
            </form>
          </div>
          <div class="header-contact">
            <p>Tổng đài: <span class="hotline">1900.1908 - 08.3622.9900</span> <span class="time_active">(7:30 - 22:00)</span></p>
          </div>
        </div>
      </div><!-- /top_header -->
      <nav id="mainNav" class="navbar navbar-default navbar-custom">
            <div class="container">
              <!-- Brand and toggle get grouped for better mobile display -->
              <div class="navbar-header">
                  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                      <span class="sr-only">Toggle navigation</span><i class="fa fa-bars"></i>
                  </button>
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse menu" id="bs-example-navbar-collapse-1">
            <div class="logo-menu-res">
              <a href="index.html">
                <img alt="icho" src="{{ URL::asset('assets/images/logo.png') }}">
                <h1 class="hide">icho.vn</h1>
              </a>
            </div>
            <ul class="nav navbar-nav navbar-left">
              <li class="active parent">
                      <a href="#">
                        Máy Tính Xách Tay
                      </a>
                      <div class="submenu">
                        <div class="container">
                          <ul class="sub-submenu">
                            <li class="col-sm-2 col-xs-4 submenu-item">
                              <a href="#">
                                <img src="{{ URL::asset('assets/images/menu/pro1.jpg') }}">
                                Laptop
                              </a>
                            </li>
                            <li class="col-sm-2 col-xs-4 submenu-item">
                              <a href="#">
                                <img src="{{ URL::asset('assets/images/menu/pro1.jpg') }}">
                                Laptop
                              </a>
                            </li>
                            <li class="col-sm-2 col-xs-4 submenu-item">
                              <a href="#">
                                <img src="{{ URL::asset('assets/images/menu/pro1.jpg') }}">
                                Laptop
                              </a>
                            </li>
                            <li class="col-sm-2 col-xs-4 submenu-item">
                              <a href="#">
                                <img src="{{ URL::asset('assets/images/menu/pro1.jpg') }}">
                                Laptop
                              </a>
                            </li>
                            <li class="col-sm-2 col-xs-4 submenu-item">
                              <a href="#">
                                <img src="{{ URL::asset('assets/images/menu/pro1.jpg') }}">
                                Laptop
                              </a>
                            </li>
                            <li class="col-sm-2 col-xs-4 submenu-item">
                              <a href="#">
                                <img src="{{ URL::asset('assets/images/menu/pro1.jpg') }}">
                                Laptop
                              </a>
                            </li>
                          </ul><!-- /sub-submenu -->
                          <ul class="sub-submenu">
                            <li class="col-sm-2 col-xs-4 submenu-item">
                              <a href="#">
                                <img src="{{ URL::asset('assets/images/menu/pro1.jpg') }}">
                                Laptop
                              </a>
                            </li>
                            <li class="col-sm-2 col-xs-4 submenu-item">
                              <a href="#">
                                <img src="{{ URL::asset('assets/images/menu/pro1.jpg') }}">
                                Laptop
                              </a>
                            </li>
                            <li class="col-sm-2 col-xs-4 submenu-item">
                              <a href="#">
                                <img src="{{ URL::asset('assets/images/menu/pro1.jpg') }}">
                                Laptop
                              </a>
                            </li>
                            <li class="col-sm-2 col-xs-4 submenu-item">
                              <a href="#">
                                <img src="{{ URL::asset('assets/images/menu/pro1.jpg') }}">
                                Laptop
                              </a>
                            </li>
                            <li class="col-sm-2 col-xs-4 submenu-item">
                              <a href="#">
                                <img src="{{ URL::asset('assets/images/menu/pro1.jpg') }}">
                                Laptop
                              </a>
                            </li>
                            <li class="col-sm-2 col-xs-4 submenu-item">
                              <a href="#">
                                <img src="{{ URL::asset('assets/images/menu/pro1.jpg') }}">
                                Laptop
                              </a>
                            </li>
                          </ul><!-- /sub-submenu -->
                          <ul class="sub-submenu">
                            <li class="col-sm-2 col-xs-4 submenu-item">
                              <a href="#">
                                <img src="{{ URL::asset('assets/images/menu/pro1.jpg') }}">
                                Laptop
                              </a>
                            </li>
                            <li class="col-sm-2 col-xs-4 submenu-item">
                              <a href="#">
                                <img src="{{ URL::asset('assets/images/menu/pro1.jpg') }}">
                                Laptop
                              </a>
                            </li>
                            <li class="col-sm-2 col-xs-4 submenu-item">
                              <a href="#">
                                <img src="{{ URL::asset('assets/images/menu/pro1.jpg') }}">
                                Laptop
                              </a>
                            </li>
                            <li class="col-sm-2 col-xs-4 submenu-item">
                              <a href="#">
                                <img src="{{ URL::asset('assets/images/menu/pro1.jpg') }}">
                                Laptop
                              </a>
                            </li>
                            <li class="col-sm-2 col-xs-4 submenu-item">
                              <a href="#">
                                <img src="{{ URL::asset('assets/images/menu/pro1.jpg') }}">
                                Laptop
                              </a>
                            </li>
                            <li class="col-sm-2 col-xs-4 submenu-item">
                              <a href="#">
                                <img src="{{ URL::asset('assets/images/menu/pro1.jpg') }}">
                                Laptop
                              </a>
                            </li>
                          </ul><!-- /sub-submenu -->
                        </div>
                      </div><!-- /submenu -->
                    </li>
                    <li class="">
                      <a href="">MÁY TÍNH BÀN</a>
                    </li>
                    <li class=""><a href="">MÁY IN</a></li>
                    <li class=""><a href="">MỰC IN</a></li>
                    <li class=""><a href="">THIẾT BỊ MẠNG</a></li>
                    <li class=""><a href="">MÀN HÌNH MÁY TÍNH</a></li>
                    <li class=""><a href="">CAMERA QUAN SÁT</a></li>
            </ul>
          </div><!-- /.navbar-collapse -->
            </div>
        </nav><!-- END NAVIGATION -->
    </header><!-- /header -->

    <section class="container">
      
      <section class="block block-banner">
        <img src="{{ URL::asset('assets/images/banner/banner2.jpg') }}" alt="">
      </section><!-- /banner -->

      <section class="block block-products products">
        <div class="block-title">
          <h2 class="title">Máy tính xách tay</h2>
          <a href="#" title="" class="viewmore">Xem 22 sản phẩm <i class="fa fa-angle-right"></i></a>
        </div>
        <div class="block-content">
          <ul class="owl-carousel owl-theme owl-style2" data-nav="true" data-dots="false" data-margin="30" data-responsive='{"0":{"items":1},"480":{"items":2},"600":{"items":2},"768":{"items":3},"800":{"items":3},"992":{"items":6}}'>
            <li class="item">
              <div class="pro-thumb">
                <a href="" title="">
                  <img src="{{ URL::asset('assets/images/products/pro1.jpg') }}" alt="">
                </a>
              </div>
              <div class="pro-info">
                <h2 class="pro-title"><a href="#">Gigabyte GA-Z170X Gaming GT</a></h2>
                <div class="price-products">
                  <p class="pro-price">7,240,000đ</p>
                  <p class="pro-sale"><del>7,940,000đ</del> <span>(6%)</span></p>
                </div>
              </div>
            </li><!-- /item -->
            <li class="item">
              <div class="pro-thumb">
                <a href="" title="">
                  <img src="{{ URL::asset('assets/images/products/pro2.jpg') }}" alt="">
                </a>
              </div>
              <div class="pro-info">
                <h2 class="pro-title"><a href="#">Gigabyte GA-Z170X Gaming GT</a></h2>
                <div class="price-products">
                  <p class="pro-price">7,240,000đ</p>
                  <p class="pro-sale"><del>7,940,000đ</del> <span>(6%)</span></p>
                </div>
              </div>
            </li><!-- /item -->
            <li class="item">
              <div class="pro-thumb">
                <a href="" title="">
                  <img src="{{ URL::asset('assets/images/products/pro3.jpg') }}" alt="">
                </a>
              </div>
              <div class="pro-info">
                <h2 class="pro-title"><a href="#">Gigabyte GA-Z170X Gaming GT</a></h2>
                <div class="price-products">
                  <p class="pro-price">7,240,000đ</p>
                  <p class="pro-sale"><del>7,940,000đ</del> <span>(6%)</span></p>
                </div>
              </div>
            </li><!-- /item -->
            <li class="item">
              <div class="pro-thumb">
                <a href="" title="">
                  <img src="{{ URL::asset('assets/images/products/pro4.jpg') }}" alt="">
                </a>
              </div>
              <div class="pro-info">
                <h2 class="pro-title"><a href="#">Gigabyte GA-Z170X Gaming GT</a></h2>
                <div class="price-products">
                  <p class="pro-price">7,240,000đ</p>
                  <p class="pro-sale"><del>7,940,000đ</del> <span>(6%)</span></p>
                </div>
              </div>
            </li><!-- /item -->
            <li class="item">
              <div class="pro-thumb">
                <a href="" title="">
                  <img src="{{ URL::asset('assets/images/products/pro5.jpg') }}" alt="">
                </a>
              </div>
              <div class="pro-info">
                <h2 class="pro-title"><a href="#">Gigabyte GA-Z170X Gaming GT</a></h2>
                <div class="price-products">
                  <p class="pro-price">7,240,000đ</p>
                  <p class="pro-sale"><del>7,940,000đ</del> <span>(6%)</span></p>
                </div>
              </div>
            </li><!-- /item -->
            <li class="item">
              <div class="pro-thumb">
                <a href="" title="">
                  <img src="{{ URL::asset('assets/images/products/pro6.jpg') }}" alt="">
                </a>
              </div>
              <div class="pro-info">
                <h2 class="pro-title"><a href="#">Gigabyte GA-Z170X Gaming GT</a></h2>
                <div class="price-products">
                  <p class="pro-price">7,240,000đ</p>
                  <p class="pro-sale"><del>7,940,000đ</del> <span>(6%)</span></p>
                </div>
              </div>
            </li><!-- /item -->
            <li class="item">
              <div class="pro-thumb">
                <a href="" title="">
                  <img src="{{ URL::asset('assets/images/products/pro6.jpg') }}" alt="">
                </a>
              </div>
              <div class="pro-info">
                <h2 class="pro-title"><a href="#">Gigabyte GA-Z170X Gaming GT</a></h2>
                <div class="price-products">
                  <p class="pro-price">7,240,000đ</p>
                  <p class="pro-sale"><del>7,940,000đ</del> <span>(6%)</span></p>
                </div>
              </div>
            </li><!-- /item -->
            <li class="item">
              <div class="pro-thumb">
                <a href="" title="">
                  <img src="{{ URL::asset('assets/images/products/pro5.jpg') }}" alt="">
                </a>
              </div>
              <div class="pro-info">
                <h2 class="pro-title"><a href="#">Gigabyte GA-Z170X Gaming GT</a></h2>
                <div class="price-products">
                  <p class="pro-price">7,240,000đ</p>
                  <p class="pro-sale"><del>7,940,000đ</del> <span>(6%)</span></p>
                </div>
              </div>
            </li><!-- /item -->
            <li class="item">
              <div class="pro-thumb">
                <a href="" title="">
                  <img src="{{ URL::asset('assets/images/products/pro4.jpg') }}" alt="">
                </a>
              </div>
              <div class="pro-info">
                <h2 class="pro-title"><a href="#">Gigabyte GA-Z170X Gaming GT</a></h2>
                <div class="price-products">
                  <p class="pro-price">7,240,000đ</p>
                  <p class="pro-sale"><del>7,940,000đ</del> <span>(6%)</span></p>
                </div>
              </div>
            </li><!-- /item -->
            <li class="item">
              <div class="pro-thumb">
                <a href="" title="">
                  <img src="{{ URL::asset('assets/images/products/pro3.jpg') }}" alt="">
                </a>
              </div>
              <div class="pro-info">
                <h2 class="pro-title"><a href="#">Gigabyte GA-Z170X Gaming GT</a></h2>
                <div class="price-products">
                  <p class="pro-price">7,240,000đ</p>
                  <p class="pro-sale"><del>7,940,000đ</del> <span>(6%)</span></p>
                </div>
              </div>
            </li><!-- /item -->
            <li class="item">
              <div class="pro-thumb">
                <a href="" title="">
                  <img src="{{ URL::asset('assets/images/products/pro2.jpg') }}" alt="">
                </a>
              </div>
              <div class="pro-info">
                <h2 class="pro-title"><a href="#">Gigabyte GA-Z170X Gaming GT</a></h2>
                <div class="price-products">
                  <p class="pro-price">7,240,000đ</p>
                  <p class="pro-sale"><del>7,940,000đ</del> <span>(6%)</span></p>
                </div>
              </div>
            </li><!-- /item -->
            <li class="item">
              <div class="pro-thumb">
                <a href="" title="">
                  <img src="{{ URL::asset('assets/images/products/pro1.jpg') }}" alt="">
                </a>
              </div>
              <div class="pro-info">
                <h2 class="pro-title"><a href="#">Gigabyte GA-Z170X Gaming GT</a></h2>
                <div class="price-products">
                  <p class="pro-price">7,240,000đ</p>
                  <p class="pro-sale"><del>7,940,000đ</del> <span>(6%)</span></p>
                </div>
              </div>
            </li><!-- /item -->
          </ul>
        </div>
      </section><!-- /block-products products -->

      <section class="block block-products products">
        <div class="block-title">
          <h2 class="title">Máyđể bàn <img src="{{ URL::asset('assets/images/hot.png') }}" alt=""></h2>
          <a href="#" title="" class="viewmore">Xem 22 sản phẩm <i class="fa fa-angle-right"></i></a>
        </div>
        <div class="block-content">
          <ul class="owl-carousel owl-theme owl-style2" data-nav="true" data-dots="false" data-margin="30" data-responsive='{"0":{"items":1},"480":{"items":2},"600":{"items":2},"768":{"items":3},"800":{"items":3},"992":{"items":6}}'>
            <li class="item">
              <div class="pro-thumb">
                <a href="" title="">
                  <img src="{{ URL::asset('assets/images/products/pro7.jpg') }}" alt="">
                </a>
              </div>
              <div class="pro-info">
                <h2 class="pro-title"><a href="#">Gigabyte GA-Z170X Gaming GT</a></h2>
                <div class="price-products">
                  <p class="pro-price">7,240,000đ</p>
                  <p class="pro-sale"><del>7,940,000đ</del> <span>(6%)</span></p>
                </div>
              </div>
            </li><!-- /item -->
            <li class="item">
              <div class="pro-thumb">
                <a href="" title="">
                  <img src="{{ URL::asset('assets/images/products/pro8.jpg') }}" alt="">
                </a>
              </div>
              <div class="pro-info">
                <h2 class="pro-title"><a href="#">Gigabyte GA-Z170X Gaming GT</a></h2>
                <div class="price-products">
                  <p class="pro-price">7,240,000đ</p>
                  <p class="pro-sale"><del>7,940,000đ</del> <span>(6%)</span></p>
                </div>
              </div>
            </li><!-- /item -->
            <li class="item">
              <div class="pro-thumb">
                <a href="" title="">
                  <img src="{{ URL::asset('assets/images/products/pro9.jpg') }}" alt="">
                </a>
              </div>
              <div class="pro-info">
                <h2 class="pro-title"><a href="#">Gigabyte GA-Z170X Gaming GT</a></h2>
                <div class="price-products">
                  <p class="pro-price">7,240,000đ</p>
                  <p class="pro-sale"><del>7,940,000đ</del> <span>(6%)</span></p>
                </div>
              </div>
            </li><!-- /item -->
            <li class="item">
              <div class="pro-thumb">
                <a href="" title="">
                  <img src="{{ URL::asset('assets/images/products/pro10.jpg') }}" alt="">
                </a>
              </div>
              <div class="pro-info">
                <h2 class="pro-title"><a href="#">Gigabyte GA-Z170X Gaming GT</a></h2>
                <div class="price-products">
                  <p class="pro-price">7,240,000đ</p>
                  <p class="pro-sale"><del>7,940,000đ</del> <span>(6%)</span></p>
                </div>
              </div>
            </li><!-- /item -->
            <li class="item">
              <div class="pro-thumb">
                <a href="" title="">
                  <img src="{{ URL::asset('assets/images/products/pro11.jpg') }}" alt="">
                </a>
              </div>
              <div class="pro-info">
                <h2 class="pro-title"><a href="#">Gigabyte GA-Z170X Gaming GT</a></h2>
                <div class="price-products">
                  <p class="pro-price">7,240,000đ</p>
                  <p class="pro-sale"><del>7,940,000đ</del> <span>(6%)</span></p>
                </div>
              </div>
            </li><!-- /item -->
            <li class="item">
              <div class="pro-thumb">
                <a href="" title="">
                  <img src="{{ URL::asset('assets/images/products/pro12.jpg') }}" alt="">
                </a>
              </div>
              <div class="pro-info">
                <h2 class="pro-title"><a href="#">Gigabyte GA-Z170X Gaming GT</a></h2>
                <div class="price-products">
                  <p class="pro-price">7,240,000đ</p>
                  <p class="pro-sale"><del>7,940,000đ</del> <span>(6%)</span></p>
                </div>
              </div>
            </li><!-- /item -->
            <li class="item">
              <div class="pro-thumb">
                <a href="" title="">
                  <img src="{{ URL::asset('assets/images/products/pro11.jpg') }}" alt="">
                </a>
              </div>
              <div class="pro-info">
                <h2 class="pro-title"><a href="#">Gigabyte GA-Z170X Gaming GT</a></h2>
                <div class="price-products">
                  <p class="pro-price">7,240,000đ</p>
                  <p class="pro-sale"><del>7,940,000đ</del> <span>(6%)</span></p>
                </div>
              </div>
            </li><!-- /item -->
            <li class="item">
              <div class="pro-thumb">
                <a href="" title="">
                  <img src="{{ URL::asset('assets/images/products/pro10.jpg') }}" alt="">
                </a>
              </div>
              <div class="pro-info">
                <h2 class="pro-title"><a href="#">Gigabyte GA-Z170X Gaming GT</a></h2>
                <div class="price-products">
                  <p class="pro-price">7,240,000đ</p>
                  <p class="pro-sale"><del>7,940,000đ</del> <span>(6%)</span></p>
                </div>
              </div>
            </li><!-- /item -->
            <li class="item">
              <div class="pro-thumb">
                <a href="" title="">
                  <img src="{{ URL::asset('assets/images/products/pro9.jpg') }}" alt="">
                </a>
              </div>
              <div class="pro-info">
                <h2 class="pro-title"><a href="#">Gigabyte GA-Z170X Gaming GT</a></h2>
                <div class="price-products">
                  <p class="pro-price">7,240,000đ</p>
                  <p class="pro-sale"><del>7,940,000đ</del> <span>(6%)</span></p>
                </div>
              </div>
            </li><!-- /item -->
            <li class="item">
              <div class="pro-thumb">
                <a href="" title="">
                  <img src="{{ URL::asset('assets/images/products/pro8.jpg') }}" alt="">
                </a>
              </div>
              <div class="pro-info">
                <h2 class="pro-title"><a href="#">Gigabyte GA-Z170X Gaming GT</a></h2>
                <div class="price-products">
                  <p class="pro-price">7,240,000đ</p>
                  <p class="pro-sale"><del>7,940,000đ</del> <span>(6%)</span></p>
                </div>
              </div>
            </li><!-- /item -->
            <li class="item">
              <div class="pro-thumb">
                <a href="" title="">
                  <img src="{{ URL::asset('assets/images/products/pro7.jpg') }}" alt="">
                </a>
              </div>
              <div class="pro-info">
                <h2 class="pro-title"><a href="#">Gigabyte GA-Z170X Gaming GT</a></h2>
                <div class="price-products">
                  <p class="pro-price">7,240,000đ</p>
                  <p class="pro-sale"><del>7,940,000đ</del> <span>(6%)</span></p>
                </div>
              </div>
            </li><!-- /item -->
            <li class="item">
              <div class="pro-thumb">
                <a href="" title="">
                  <img src="{{ URL::asset('assets/images/products/pro6.jpg') }}" alt="">
                </a>
              </div>
              <div class="pro-info">
                <h2 class="pro-title"><a href="#">Gigabyte GA-Z170X Gaming GT</a></h2>
                <div class="price-products">
                  <p class="pro-price">7,240,000đ</p>
                  <p class="pro-sale"><del>7,940,000đ</del> <span>(6%)</span></p>
                </div>
              </div>
            </li><!-- /item -->
          </ul>
        </div>
      </section><!-- /block-products products -->

      <section class="block block-products products">
        <div class="block-title">
          <h2 class="title">Thiết bị mạng</h2>
          <a href="#" title="" class="viewmore">Xem 22 sản phẩm <i class="fa fa-angle-right"></i></a>
        </div>
        <div class="block-content">
          <ul class="owl-carousel owl-theme owl-style2" data-nav="true" data-dots="false" data-margin="30" data-responsive='{"0":{"items":1},"480":{"items":2},"600":{"items":2},"768":{"items":3},"800":{"items":3},"992":{"items":6}}'>
            <li class="item">
              <div class="pro-thumb">
                <a href="" title="">
                  <img src="{{ URL::asset('assets/images/products/pro13.jpg') }}" alt="">
                </a>
              </div>
              <div class="pro-info">
                <h2 class="pro-title"><a href="#">Gigabyte GA-Z170X Gaming GT</a></h2>
                <div class="price-products">
                  <p class="pro-price">7,240,000đ</p>
                  <p class="pro-sale"><del>7,940,000đ</del> <span>(6%)</span></p>
                </div>
              </div>
            </li><!-- /item -->
            <li class="item">
              <div class="pro-thumb">
                <a href="" title="">
                  <img src="{{ URL::asset('assets/images/products/pro14.jpg') }}" alt="">
                </a>
              </div>
              <div class="pro-info">
                <h2 class="pro-title"><a href="#">Gigabyte GA-Z170X Gaming GT</a></h2>
                <div class="price-products">
                  <p class="pro-price">7,240,000đ</p>
                  <p class="pro-sale"><del>7,940,000đ</del> <span>(6%)</span></p>
                </div>
              </div>
            </li><!-- /item -->
            <li class="item">
              <div class="pro-thumb">
                <a href="" title="">
                  <img src="{{ URL::asset('assets/images/products/pro15.jpg') }}" alt="">
                </a>
              </div>
              <div class="pro-info">
                <h2 class="pro-title"><a href="#">Gigabyte GA-Z170X Gaming GT</a></h2>
                <div class="price-products">
                  <p class="pro-price">7,240,000đ</p>
                  <p class="pro-sale"><del>7,940,000đ</del> <span>(6%)</span></p>
                </div>
              </div>
            </li><!-- /item -->
            <li class="item">
              <div class="pro-thumb">
                <a href="" title="">
                  <img src="{{ URL::asset('assets/images/products/pro16.jpg') }}" alt="">
                </a>
              </div>
              <div class="pro-info">
                <h2 class="pro-title"><a href="#">Gigabyte GA-Z170X Gaming GT</a></h2>
                <div class="price-products">
                  <p class="pro-price">7,240,000đ</p>
                  <p class="pro-sale"><del>7,940,000đ</del> <span>(6%)</span></p>
                </div>
              </div>
            </li><!-- /item -->
            <li class="item">
              <div class="pro-thumb">
                <a href="" title="">
                  <img src="{{ URL::asset('assets/images/products/pro17.jpg') }}" alt="">
                </a>
              </div>
              <div class="pro-info">
                <h2 class="pro-title"><a href="#">Gigabyte GA-Z170X Gaming GT</a></h2>
                <div class="price-products">
                  <p class="pro-price">7,240,000đ</p>
                  <p class="pro-sale"><del>7,940,000đ</del> <span>(6%)</span></p>
                </div>
              </div>
            </li><!-- /item -->
            <li class="item">
              <div class="pro-thumb">
                <a href="" title="">
                  <img src="{{ URL::asset('assets/images/products/pro18.jpg') }}" alt="">
                </a>
              </div>
              <div class="pro-info">
                <h2 class="pro-title"><a href="#">Gigabyte GA-Z170X Gaming GT</a></h2>
                <div class="price-products">
                  <p class="pro-price">7,240,000đ</p>
                  <p class="pro-sale"><del>7,940,000đ</del> <span>(6%)</span></p>
                </div>
              </div>
            </li><!-- /item -->
            <li class="item">
              <div class="pro-thumb">
                <a href="" title="">
                  <img src="{{ URL::asset('assets/images/products/pro18.jpg') }}" alt="">
                </a>
              </div>
              <div class="pro-info">
                <h2 class="pro-title"><a href="#">Gigabyte GA-Z170X Gaming GT</a></h2>
                <div class="price-products">
                  <p class="pro-price">7,240,000đ</p>
                  <p class="pro-sale"><del>7,940,000đ</del> <span>(6%)</span></p>
                </div>
              </div>
            </li><!-- /item -->
            <li class="item">
              <div class="pro-thumb">
                <a href="" title="">
                  <img src="{{ URL::asset('assets/images/products/pro17.jpg') }}" alt="">
                </a>
              </div>
              <div class="pro-info">
                <h2 class="pro-title"><a href="#">Gigabyte GA-Z170X Gaming GT</a></h2>
                <div class="price-products">
                  <p class="pro-price">7,240,000đ</p>
                  <p class="pro-sale"><del>7,940,000đ</del> <span>(6%)</span></p>
                </div>
              </div>
            </li><!-- /item -->
            <li class="item">
              <div class="pro-thumb">
                <a href="" title="">
                  <img src="{{ URL::asset('assets/images/products/pro16.jpg') }}" alt="">
                </a>
              </div>
              <div class="pro-info">
                <h2 class="pro-title"><a href="#">Gigabyte GA-Z170X Gaming GT</a></h2>
                <div class="price-products">
                  <p class="pro-price">7,240,000đ</p>
                  <p class="pro-sale"><del>7,940,000đ</del> <span>(6%)</span></p>
                </div>
              </div>
            </li><!-- /item -->
            <li class="item">
              <div class="pro-thumb">
                <a href="" title="">
                  <img src="{{ URL::asset('assets/images/products/pro15.jpg') }}" alt="">
                </a>
              </div>
              <div class="pro-info">
                <h2 class="pro-title"><a href="#">Gigabyte GA-Z170X Gaming GT</a></h2>
                <div class="price-products">
                  <p class="pro-price">7,240,000đ</p>
                  <p class="pro-sale"><del>7,940,000đ</del> <span>(6%)</span></p>
                </div>
              </div>
            </li><!-- /item -->
            <li class="item">
              <div class="pro-thumb">
                <a href="" title="">
                  <img src="{{ URL::asset('assets/images/products/pro14.jpg') }}" alt="">
                </a>
              </div>
              <div class="pro-info">
                <h2 class="pro-title"><a href="#">Gigabyte GA-Z170X Gaming GT</a></h2>
                <div class="price-products">
                  <p class="pro-price">7,240,000đ</p>
                  <p class="pro-sale"><del>7,940,000đ</del> <span>(6%)</span></p>
                </div>
              </div>
            </li><!-- /item -->
            <li class="item">
              <div class="pro-thumb">
                <a href="" title="">
                  <img src="{{ URL::asset('assets/images/products/pro13.jpg') }}" alt="">
                </a>
              </div>
              <div class="pro-info">
                <h2 class="pro-title"><a href="#">Gigabyte GA-Z170X Gaming GT</a></h2>
                <div class="price-products">
                  <p class="pro-price">7,240,000đ</p>
                  <p class="pro-sale"><del>7,940,000đ</del> <span>(6%)</span></p>
                </div>
              </div>
            </li><!-- /item -->
          </ul>
        </div>
      </section><!-- /block-products products -->

      <section class="block block-products products">
        <div class="block-title">
          <h2 class="title">Camera quan sát</h2>
          <a href="#" title="" class="viewmore">Xem 22 sản phẩm <i class="fa fa-angle-right"></i></a>
        </div>
        <div class="block-content">
          <ul class="owl-carousel owl-theme owl-style2" data-nav="true" data-dots="false" data-margin="30" data-responsive='{"0":{"items":1},"480":{"items":2},"600":{"items":2},"768":{"items":3},"800":{"items":3},"992":{"items":6}}'>
            <li class="item">
              <div class="pro-thumb">
                <a href="" title="">
                  <img src="{{ URL::asset('assets/images/products/pro19.jpg') }}" alt="">
                </a>
              </div>
              <div class="pro-info">
                <h2 class="pro-title"><a href="#">Gigabyte GA-Z170X Gaming GT</a></h2>
                <div class="price-products">
                  <p class="pro-price">7,240,000đ</p>
                  <p class="pro-sale"><del>7,940,000đ</del> <span>(6%)</span></p>
                </div>
              </div>
            </li><!-- /item -->
            <li class="item">
              <div class="pro-thumb">
                <a href="" title="">
                  <img src="{{ URL::asset('assets/images/products/pro20.jpg') }}" alt="">
                </a>
              </div>
              <div class="pro-info">
                <h2 class="pro-title"><a href="#">Gigabyte GA-Z170X Gaming GT</a></h2>
                <div class="price-products">
                  <p class="pro-price">7,240,000đ</p>
                  <p class="pro-sale"><del>7,940,000đ</del> <span>(6%)</span></p>
                </div>
              </div>
            </li><!-- /item -->
            <li class="item">
              <div class="pro-thumb">
                <a href="" title="">
                  <img src="{{ URL::asset('assets/images/products/pro21.jpg') }}" alt="">
                </a>
              </div>
              <div class="pro-info">
                <h2 class="pro-title"><a href="#">Gigabyte GA-Z170X Gaming GT</a></h2>
                <div class="price-products">
                  <p class="pro-price">7,240,000đ</p>
                  <p class="pro-sale"><del>7,940,000đ</del> <span>(6%)</span></p>
                </div>
              </div>
            </li><!-- /item -->
            <li class="item">
              <div class="pro-thumb">
                <a href="" title="">
                  <img src="{{ URL::asset('assets/images/products/pro21.jpg') }}" alt="">
                </a>
              </div>
              <div class="pro-info">
                <h2 class="pro-title"><a href="#">Gigabyte GA-Z170X Gaming GT</a></h2>
                <div class="price-products">
                  <p class="pro-price">7,240,000đ</p>
                  <p class="pro-sale"><del>7,940,000đ</del> <span>(6%)</span></p>
                </div>
              </div>
            </li><!-- /item -->
            <li class="item">
              <div class="pro-thumb">
                <a href="" title="">
                  <img src="{{ URL::asset('assets/images/products/pro21.jpg') }}" alt="">
                </a>
              </div>
              <div class="pro-info">
                <h2 class="pro-title"><a href="#">Gigabyte GA-Z170X Gaming GT</a></h2>
                <div class="price-products">
                  <p class="pro-price">7,240,000đ</p>
                  <p class="pro-sale"><del>7,940,000đ</del> <span>(6%)</span></p>
                </div>
              </div>
            </li><!-- /item -->
            <li class="item">
              <div class="pro-thumb">
                <a href="" title="">
                  <img src="{{ URL::asset('assets/images/products/pro21.jpg') }}" alt="">
                </a>
              </div>
              <div class="pro-info">
                <h2 class="pro-title"><a href="#">Gigabyte GA-Z170X Gaming GT</a></h2>
                <div class="price-products">
                  <p class="pro-price">7,240,000đ</p>
                  <p class="pro-sale"><del>7,940,000đ</del> <span>(6%)</span></p>
                </div>
              </div>
            </li><!-- /item -->
            <li class="item">
              <div class="pro-thumb">
                <a href="" title="">
                  <img src="{{ URL::asset('assets/images/products/pro21.jpg') }}" alt="">
                </a>
              </div>
              <div class="pro-info">
                <h2 class="pro-title"><a href="#">Gigabyte GA-Z170X Gaming GT</a></h2>
                <div class="price-products">
                  <p class="pro-price">7,240,000đ</p>
                  <p class="pro-sale"><del>7,940,000đ</del> <span>(6%)</span></p>
                </div>
              </div>
            </li><!-- /item -->
            <li class="item">
              <div class="pro-thumb">
                <a href="" title="">
                  <img src="{{ URL::asset('assets/images/products/pro21.jpg') }}" alt="">
                </a>
              </div>
              <div class="pro-info">
                <h2 class="pro-title"><a href="#">Gigabyte GA-Z170X Gaming GT</a></h2>
                <div class="price-products">
                  <p class="pro-price">7,240,000đ</p>
                  <p class="pro-sale"><del>7,940,000đ</del> <span>(6%)</span></p>
                </div>
              </div>
            </li><!-- /item -->
            <li class="item">
              <div class="pro-thumb">
                <a href="" title="">
                  <img src="{{ URL::asset('assets/images/products/pro21.jpg') }}" alt="">
                </a>
              </div>
              <div class="pro-info">
                <h2 class="pro-title"><a href="#">Gigabyte GA-Z170X Gaming GT</a></h2>
                <div class="price-products">
                  <p class="pro-price">7,240,000đ</p>
                  <p class="pro-sale"><del>7,940,000đ</del> <span>(6%)</span></p>
                </div>
              </div>
            </li><!-- /item -->
            <li class="item">
              <div class="pro-thumb">
                <a href="" title="">
                  <img src="{{ URL::asset('assets/images/products/pro20.jpg') }}" alt="">
                </a>
              </div>
              <div class="pro-info">
                <h2 class="pro-title"><a href="#">Gigabyte GA-Z170X Gaming GT</a></h2>
                <div class="price-products">
                  <p class="pro-price">7,240,000đ</p>
                  <p class="pro-sale"><del>7,940,000đ</del> <span>(6%)</span></p>
                </div>
              </div>
            </li><!-- /item -->
            <li class="item">
              <div class="pro-thumb">
                <a href="" title="">
                  <img src="{{ URL::asset('assets/images/products/pro19.jpg') }}" alt="">
                </a>
              </div>
              <div class="pro-info">
                <h2 class="pro-title"><a href="#">Gigabyte GA-Z170X Gaming GT</a></h2>
                <div class="price-products">
                  <p class="pro-price">7,240,000đ</p>
                  <p class="pro-sale"><del>7,940,000đ</del> <span>(6%)</span></p>
                </div>
              </div>
            </li><!-- /item -->
            <li class="item">
              <div class="pro-thumb">
                <a href="" title="">
                  <img src="{{ URL::asset('assets/images/products/pro20.jpg') }}" alt="">
                </a>
              </div>
              <div class="pro-info">
                <h2 class="pro-title"><a href="#">Gigabyte GA-Z170X Gaming GT</a></h2>
                <div class="price-products">
                  <p class="pro-price">7,240,000đ</p>
                  <p class="pro-sale"><del>7,940,000đ</del> <span>(6%)</span></p>
                </div>
              </div>
            </li><!-- /item -->
          </ul>
        </div>
      </section><!-- /block-products products -->

    </section><!-- /container -->

    <footer class="footer">
      <section class="block-ft">
        <div class="container">
          <ul class="row">
            <li class="col-sm-5 col-xs-12 block-contact-ft">
              <p>Giới thiệu về <a href="#" title="" class="urlweb">iCho.vn</a> - Thành viên của IPL</p>
            </li>
            <li class="col-sm-5 col-xs-12 block-phone-ft">
              <p>Tổng đài: 1900.1908 - 08.3622.9900 (7:30 - 22:00)</p>
            </li>
            <li class="col-sm-2 col-xs-12 box-accordion block-accordion-ft">
              <p class="accordion-header">
                Thông Tin Khác
                <a href="javascript:void(0);" class="btn-opened" title="Down Up"></a>
              </p>
            </li>
          </ul>
        </div>
      </section><!-- /block-ft -->
      <section class="container-fluid box-collapse">
        <div class="block-ftm row">
          <div class="container">
            <div class="row">
              <div class="col-sm-5 col-xs-12">
                <img src="{{ URL::asset('assets/images/bct.png') }}" alt="Đã đăng ký bộ công thương">
                <p class="registered-bct">
                  GPĐKKD số 0303217354<br>
                  do sở KHĐT Tp.HCM cấp ngày 25/03/2004
                </p>
              </div>
              <div class="col-sm-4 col-xs-12">
                <ul class="menu-ft">
                  <li><a href="#" title="">Chính sách giao hàng</a></li>
                  <li><a href="#" title="">7 ngày đổi trả miễn phí</a></li>
                  <li><a href="#" title="">Hướng dẵn mua hàng</a></li>
                </ul><!-- /menu-ft -->
              </div>
              <div class="col-sm-3 col-xs-12">
                <ul class="menu-ft">
                  <li><a href="#" title="">Tìm trung tâm bảo hành</a></li>
                  <li><a href="contact.html" title="">Liên hệ góp ý</a></li>
                  <li><a href="#" title="">Quy chế chung</a></li>
                </ul><!-- /menu-ft -->
              </div>  
            </div>
          </div>
        </div><!-- /block-ftm -->
      </section><!-- /block-ftm -->
      <section class="container-fluid block-ftb">
        <div class="container">
          <p>iCho.vn mở bán tại thành phố Hồ Chí Minh</p>
        </div>
      </section><!-- /block-ftb -->
    </footer><!-- /footer -->

    <a id="return-to-top" class="td-scroll-up" href="javascript:void(0)">
      <i class="fa fa-angle-up" aria-hidden="true"></i>
    </a>
    <!-- RETURN TO TOP -->

  </section>
  <!-- wrapper -->

  <!-- ===== JS ===== -->
  <script src="{{ URL::asset('assets/js/jquery.min.js') }}"></script>
  <script src="{{ URL::asset('assets/vendor/bootstrap/bootstrap.min.js') }}"></script>
  <!-- sticky -->
  <script src="{{ URL::asset('assets/vendor/owl.carousel/owl.carousel.min.js') }}"></script>
  <!-- sticky -->
  <script src="{{ URL::asset('assets/vendor/sticky/jquery.sticky.js') }}"></script>
  <!-- Js Common -->
  <script src="{{ URL::asset('assets/js/common.js') }}"></script>
</body>
</html>
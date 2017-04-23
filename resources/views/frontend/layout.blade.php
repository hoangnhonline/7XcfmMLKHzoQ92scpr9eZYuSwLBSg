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
  <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/css/custom.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/css/square/red.css') }}" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/css/sweetalert2.min.css') }}">

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
            <a href="{{ route('home') }}">
              <img alt="icho" src="{{ URL::asset('assets/images/logo.png') }}">
              <h1 class="hide">icho.vn</h1>
            </a>
          </div>
          <div class="header-search-box">
          <form class="form-inline" method="GET" action="{{ route('search') }}" class="mainsearch">            
              <input type="text" autocomplete="off" name="keyword" placeholder="Bạn mua gì hôm nay?" maxlength="50" value="{{ isset($tu_khoa) ? $tu_khoa : "" }}">

              <button type="submit"><i class="fa fa-search"></i></button>
            </form>
          </div>
          <div class="header-contact">
            <p>Tổng đài: <span class="hotline">1900 636 975</span> <span class="time_active">(7:30 - 22:00)</span></p>
          </div>
        </div>
      </div><!-- /top_header -->
      <nav id="mainNav" class="navbar navbar-default navbar-custom">
            <div class="container" id="main-menu">
              <!-- Brand and toggle get grouped for better mobile display -->
              <div class="navbar-header">
                  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span><i class="fa fa-bars"></i>
                  </button>
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse menu" id="bs-example-navbar-collapse-1">
            <div class="text-center logo-menu-res">
              <a title="Logo" href="index.html"><img src="{{ URL::asset('assets/images/logo.png') }}" alt="Logo"></a>
            </div>
            <ul class="nav navbar-nav navbar-left">
              @foreach( $menuNgang as $loai)
              <li class="level0 parent">
                <a href="{{ route('danh-muc-cha', $loai['slug']) }}">{{ $loai['name'] }}</a>
                <ul class="level0 submenu submenu-white">
                   @foreach( $loai['child'] as $cate)
                   <li class="level1"><a href="{{ route('danh-muc-con',[ $loai['slug'], $cate['slug']]) }}">{{ $cate['name']}}</a></li>                   
                   @endforeach
                </ul>
              </li><!-- END MENU HOME -->
              @endforeach
            </ul>
          </div><!-- /.navbar-collapse -->
            </div>
        </nav><!-- END NAVIGATION -->
    </header><!-- /header -->

    <section class="container">
      <section class="block block-banner">
        <?php 
        $bannerArr = DB::table('banner')->where(['object_id' => 1, 'object_type' => 3])->orderBy('display_order', 'asc')->get();
        ?>
        @if($bannerArr)
        @foreach($bannerArr as $banner)
         @if($banner->ads_url !='')
          <a href="{{ $banner->ads_url }}">
          @endif
          <img alt="banner" class="lazy" data-original="{{ Helper::showImage($banner->image_url) }}" title="banner">
          @if($banner->ads_url !='')
          </a>
          @endif
        @endforeach
        @endif
      </section><!-- /banner -->
      @yield('content')

    </section><!-- /container -->

    <footer class="footer">
      <section class="block-ft">
        <div class="container">
          <ul class="row">
            <li class="col-sm-5 col-xs-12 block-contact-ft">
              <p>Giới thiệu về <a href="#" title="" class="urlweb">iCho.vn</a> - Thành viên của IPL</p>
            </li>
            <li class="col-sm-5 col-xs-12 block-phone-ft">
              <p>Tổng đài: 1900 636 975 (7:30 - 22:00)</p>
            </li>
            <li class="col-sm-2 col-xs-12 box-accordion block-accordion-ft">
              <p class="accordion-header">
                Thông tin khác
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
                  GPĐKKD số 0310140399<br>
                  do Sở KHĐT TP.HCM cấp ngày 02/07/2010
                </p>
              </div>
              <div class="col-sm-4 col-xs-12">
                <ul class="menu-ft">
                  <!--<li><a href="{{ route('danh-muc-cha', 'bao-mat-thong-tin') }}">Bảo mật thông tin</a></li>-->
                  <li><a href="{{ route('danh-muc-cha', 'phuong-thuc-thanh-toan') }}">Phương thức thanh toán</a></li>
                  <li><a href="{{ route('danh-muc-cha', 'hinh-thuc-van-chuyen') }}">Hình thức vận chuyển</a></li>
                  <li><a href="{{ route('danh-muc-cha', 'chinh-sach-bao-hanh') }}">Chính sách bảo hành</a></li>
                </ul><!-- /menu-ft -->
              </div>
              <div class="col-sm-3 col-xs-12">
                <ul class="menu-ft">                  
                  <li><a href="{{ route('danh-muc-cha', 'gioi-thieu') }}">Giới thiệu</a></li>
                  <li><a href="{{ route('chuong-trinh-khuyen-mai') }}">Khuyến mãi</a></li>
                  <li><a href="{{ route('contact') }}">Liên hệ</a></li>
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
  <input type="hidden" id="route-ajax-login-fb" value="{{route('ajax-login-by-fb')}}">
  <input type="hidden" id="route-cap-nhat-thong-tin" value="{{ route('cap-nhat-thong-tin') }}">
  <input type="hidden" id="fb-app-id" value="{{ env('FACEBOOK_APP_ID') }}">
  <input type="hidden" id="route-register-customer-ajax" value="{{ route('register-customer-ajax') }}">
  <input type="hidden" id="route-register-newsletter" value="{{ route('register.newsletter') }}">
  <input type="hidden" id="route-add-to-cart" value="{{ route('them-sanpham') }}" />
  <input type="hidden" id="route-cart" value="{{ route('gio-hang') }}" />
  <!-- ===== JS ===== -->
  <script src="{{ URL::asset('assets/js/jquery.min.js') }}"></script>
  <script src="{{ URL::asset('assets/vendor/bootstrap/bootstrap.min.js') }}"></script>
  <!-- sticky -->
  <script src="{{ URL::asset('assets/vendor/owl.carousel/owl.carousel.min.js') }}"></script>
  <!-- sticky -->
  <script src="{{ URL::asset('assets/vendor/sticky/jquery.sticky.js') }}"></script>
  <!-- Js Common -->
  <script src="{{ URL::asset('assets/js/common.js') }}"></script>
  <script src="{{ URL::asset('assets/js/icheck.min.js') }}"></script>
  <script src="{{ URL::asset('assets/js/lazy.js') }}"></script>
  <script src="{{ URL::asset('assets/lib/select2/js/select2.min.js') }}"></script>
  <script src="{{ URL::asset('assets/js/theme-script.js') }}"></script>
  <script src="{{ URL::asset('assets/js/sweetalert2.min.js') }}"></script>
  @yield('javascript_page')
</body>
</html>
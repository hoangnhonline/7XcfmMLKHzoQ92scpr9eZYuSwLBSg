<!-- END MANIN HEADER -->
<div id="nav-top-menu" class="nav-top-menu noprint">
    <div class="container">
        <div class="row">
            <div class="col-sm-3" id="box-vertical-megamenus">
                <div class="box-vertical-megamenus">
                    <h4 class="title">
                        <span class="title-menu">Danh mục</span>
                        <span class="btn-open-mobile pull-right home-page"><i class="fa fa-bars"></i></span>
                    </h4>
                    <div class="vertical-menu-content is-home">
                        <ul class="vertical-menu-list">                        
                            <?php $count = 0; ?>
                            @foreach( $menuDoc as $loai)
                            <?php $count ++; ?>
                            <li <?php if($count > 11 ) echo 'class="cat-link-orther"'; ?>>
                                <a class="parent" href="{{ route('danh-muc-cha', $loai['slug']) }}"><img class="icon-menu" alt="icon {{ $loai['name'] }}" src="{{ Helper::showImage($loai['icon_mau']) }}" />{{ $loai['name'] }}</a>
                                @if( !empty($loai['child']) )
                                 <?php $countSubMenu = 0;                                                            
                                            ?>
                                <div class="vertical-dropdown-menu">
                                    <div class="vertical-groups col-sm-12">
                                        <div class="mega-group col-sm-3">
                                            <h4 class="mega-group-header2"><span>Nổi bật<span></h4>
                                            <ul class="group-link-default">
                                                <li><a href="{{ route('ban-chay', $loai['slug']) }}">Bán chạy</a></li>
                                                <li><a href="{{ route('san-pham-moi', $loai['slug']) }}">Sản phẩm mới</a></li>
                                                <li><a href="{{ route('giam-gia', $loai['slug']) }}">Giảm giá</a></li>                                           
                                            </ul>
                                            <h4 class="mega-group-header2"><span>{{ $loai['name'] }}<span></h4>
                                            <ul class="group-link-default">
                                                <?php 
                                                $priceArr = DB::table('price_range')->where('loai_id', $loai['id'])->orderBy('id')->get();

                                                ?>
                                                @foreach($priceArr as $price)
                                                <li><a href="{{ route('theo-gia-danh-muc-cha',['slugLoaiSp' => $loai['slug'], 'slugGia' => $price->alias]) }}">{{ $price->name }}</a></li>
                                                @endforeach                                            
                                            </ul>
                                        </div>
                                        <div class="mega-group col-sm-3">
                                            <h4 class="mega-group-header2"><span>Danh mục sản phẩm<span></h4>
                                            
                                            <ul class="group-link-default">
                                                @foreach( $loai['child'] as $cate)
                                                <?php $countSubMenu++; ?>
                                                <li>
                                                    <a href="{{ route('danh-muc-con',[ $loai['slug'], $cate['slug']]) }}">
                                                        {{ $cate['name']}}
                                                    </a>
                                                </li>                                            
                                                    @if($countSubMenu % 12 == 0)
                                                            </ul></div>
                                                        <div class="mega-group col-sm-3">
                                                    <ul class="group-link-default" style="margin-top: 34px;">                                       
                                                        @endif                                                                                   
                                                @endforeach
                                            </ul>
                                        </div>                                    
                                    </div>
                                    <div class="box-img-pos">
                                        <img src="{{ Helper::showImage($loai['banner_menu']) }}" alt="banner menu {{ $loai['name'] }}">
                                    </div>
                                </div>
                                @endif
                            </li>
                            @endforeach
                        </ul>
                        <div class="all-category"><span class="open-cate">Xem tất cả</span></div>
                    </div>
            </div>
            </div>
            <div id="main-menu" class="col-sm-9 main-menu">
                <nav class="navbar navbar-default">
                    <div class="container-fluid">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                                <i class="fa fa-bars"></i>
                            </button>
                            <a class="navbar-brand" href="#">MENU</a>
                        </div>                        
                        <div id="navbar" class="navbar-collapse collapse">                        
                            <ul class="nav navbar-nav">
                                <li class="logo-on-menu" id="small_logo" style="display:none;"><a href="{{ route('home') }}"><img class="lazy" data-original="{{ URL::asset('assets/images/logo.png') }}"></a></li>   
                                <li {{ \Request::route()->getName() == 'home' ? "class=active" : "" }}><a href="{{ route('home') }}">Trang chủ</a></li>
                                <li {{ \Request::route()->getName() == 'chuong-trinh-khuyen-mai' || (isset($is_km) && $is_km == 1) ? "class=active" : "" }}><a href="{{ route('chuong-trinh-khuyen-mai') }}">Khuyến mãi</a></li>                                
                                <li {{ (\Request::route()->getName() == 'news-list' && Request::path() == 'tin-tuc') || (isset($is_news) && $is_news == 1)? "class=active" : "" }}><a href="{{ route('news-list', 'tin-tuc') }}">Tin tức</a></li>
                                <!--<li {{ \Request::route()->getName() == 'lap-rap' ? "class=active" : "" }}><a href="{{ route('lap-rap') }}">Ráp máy tính online</a></li>-->
                               
                                <li {{ (\Request::route()->getName() == 'news-list' && Request::path() == 'kinh-nghiem-hay') || (isset($is_kn) && $is_kn == 1)? "class=active" : "" }}><a href="{{ route('news-list', 'kinh-nghiem-hay') }}" >Kinh nghiệm hay</a></li>                                
                                <li {{ \Request::route()->getName() == 'contact' ? "class=active" : "" }}><a href="{{ route('contact') }}">Liên hệ</a></li>
                            </ul>
                        </div><!--/.nav-collapse -->
                    </div>
                </nav>
            </div>
        </div>
        <!-- userinfo on top-->
        <div id="form-search-opntop">
        </div>
        <!-- userinfo on top-->
        <div id="user-info-opntop">
        </div>
        <!-- CART ICON ON MMENU -->
        <div id="shopping-cart-box-ontop">
            <a href="{{ route('gio-hang') }}"><i class="fa fa-shopping-cart"></i></a>
            <div class="shopping-cart-box-ontop-content"></div>
        </div>
    </div>
</div>
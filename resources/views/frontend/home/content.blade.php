@section('content')
<!-- END Home slideder-->
<div class="option2 clearfix">
    <div class="content-page">
        <div class="container">
            <!-- featured category fashion -->
            <?php $countLoaiSp = 0; 
            $totalLoaiHot = count( $loaiSpHot );
            ?>
            @foreach( $loaiSpHot as $loai)
               <?php $countLoaiSp++; ?>

                @if( $loai['home_style'] == 1 )
                <div class="category-featured" >
                    <nav class="navbar nav-menu show-brand" >
                      <div class="container">
                        <!-- Brand and toggle get grouped for better mobile display -->
                          <div class="navbar-brand" style="background-color:{{ $loai['bg_color'] }}"><a title="{{ $loai['name'] }}" href="{{ route('danh-muc-cha', $loai['slug']) }}"><img  alt="{{ $loai['name']}}" class="lazy" data-original="{{ Helper::showImage($loai['icon_url']) }}" />{{ $loai['name']}}</a></div>
                          <span class="toggle-menu"></span>
                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse">
                          <ul class="nav navbar-nav"> 
                            @foreach( $loai['child'] as $cate)                            
                            <li><a title="{{ $cate['name'] }}" href="{{ route('danh-muc-con', [$loai['slug'], $cate['slug']])}}">{{ $cate['name']}}</a></li>@endforeach
                          </ul>
                        </div><!-- /.navbar-collapse -->
                      </div><!-- /.container-fluid -->
                      <div id="elevator-{{ $countLoaiSp}}" class="floor-elevator">
                            <a href="#{{ $countLoaiSp > 1 ? "elevator-".($countLoaiSp - 1)  : " " }}" class="btn-elevator up {{ $countLoaiSp == 1 ? "disabled" : "" }} fa fa-angle-up"></a>
                            <a href="#{{ $countLoaiSp < $totalLoaiHot ? "elevator-".($countLoaiSp + 1)  : " " }}" class="btn-elevator down {{ $countLoaiSp == $totalLoaiHot ? "disabled" : "" }} fa fa-angle-down"></a>
                      </div>
                    </nav>
                   <div class="product-featured clearfix">
                        <div class="row">
                            <div class="col-sm-2 sub-category-wapper">
                                @if( count($loai['child']) <= 14 )
                                <ul class="sub-category-list">

                                    @foreach( $loai['child'] as $cate)
                                    <li><a title="{{ $cate['name'] }}" href="{{ route('danh-muc-con', [$loai['slug'], $cate['slug']])}}">{{ $cate['name']}}</a></li>
                                    @endforeach

                                </ul>
                                @else
                                <div class="owl-carousel-vertical" data-items="1" data-nav="true" data-dots="false" data-loop="false">
                                    <div class="item">
                                        <ul class="sub-category-list">
                                            <?php 
                                                $count = 0;
                                            ?>
                                            @foreach( $loai['child'] as $cate)
                                            <?php $count++; ?>
                                            <li><a title="{{ $cate['name'] }}" href="{{ route('danh-muc-con', [$loai['slug'], $cate['slug']])}}">{{ $cate['name']}}</a></li>
                                            @if($count == 14)
                                                    </ul>
                                            </div>
                                            <div class="item">
                                                <ul class="sub-category-list">
                                            @endif
                                            @endforeach
                                            
                                        </ul>
                                    </div>                                
                                </div>
                                @endif
                            </div>
                             <div class="col-sm-4 banner-waper">                            
                                <ul class="owl-intab owl-carousel" data-loop="{!! count($bannerArr[$loai['id']]) > 1 ?'true' : 'false' !!}" data-items="1" data-autoplay="true" data-dots="false" {!! count($bannerArr[$loai['id']]) > 1 ? ' data-nav="true"' : '' !!}>
                                    @if( !empty($bannerArr[$loai['id']]))
                                        @foreach($bannerArr[$loai['id']] as $banner)
                                            <li>
                                                @if($banner->type == 2)
                                                <a href="{{ $banner->ads_url }}">
                                                @endif
                                                <img src="{{ Helper::showImage($banner['image_url']) }}" alt="Image">
                                                @if($banner->type == 2)
                                                </a>
                                                @endif
                                            </li>
                                        @endforeach
                                    @endif                                                    
                                </ul>
                            </div>
                            <div class="col-sm-6 col-right-tab">
                                <div class="product-featured-tab-content">
                                    <div class="tab-container">
                                        <div class="tab-panel active" id="tab-4">
                                           
                                           <ul class="product-list row">
                                           @foreach( $productArr[$loai['id']] as $product )
                                           <?php 
                                                if( $loai['is_hover'] == 1){                                                        
                                                    $tmp = isset($product['thuoc_tinh']) ? $product['thuoc_tinh'] : "";
                                                    $thuocTinhArr = json_decode($tmp, true);                                                     
                                                }

                                            ?>
                                                <li class="col-sm-4">
                                                    <div class="left-block">
                                                        @if($product['pro_style'] == 1 && $product['image_pro'] != '' && $loai['icon_km'] != '')
                                                        <img class="gift-icon lazy" src="{{ Helper::showImage($loai['icon_km']) }}" alt="Sản phẩm có quà tặng">
                                                        @endif
                                                        @if($product['pro_style'] == 2 && $product['image_pro'] != '')
                                                        <img class="gift-icon lazy" src="{{ Helper::showImage($product['image_pro']) }}" alt="qua tang kem {{ $product['name'] }}">
                                                        @endif
                                                        @if( $product['is_sale'] == 1)
                                                        <span class="discount">{{
                                                            100-round($product['price_sale']*100/$product['price'])
                                                        }}%</span>
                                                        @endif
                                                        <a href="{{ route('chi-tiet', $product['slug']) }}">
                                                        
                                                        <img class="img-responsive lazy lazy-img1" alt="{{ $product['name'] }}" data-original="{{ Helper::showImage($product['image_url']) }}" />
                                                        @if($product['pro_style'] == 1 && $product['image_pro'] != '')
                                                        <img class="img-responsive lazy-img2 lazy" alt="product" src="{{ Helper::showImage($product['image_pro']) }}" />
                                                        @endif
                                                        </a>
                                                        @if( $loai['is_hover'] == 1 && $product['pro_style'] == 0)
                                                        <figure class="mask-info">
                                                            @foreach($hoverInfo[$loai['id']] as $info)
                                                            <?php 
                                                            $tmpInfo = explode(",", $info->str_thuoctinh_id);         
                                                            ?>

                                                            <span>{{ $info->text_hien_thi}}: <?php
                                                            $countT = 0; $totalT = count($tmpInfo);
                                                            foreach( $tmpInfo as $tinfo){
                                                                $countT++;
                                                                if(isset($thuocTinhArr[$tinfo])){
                                                                    echo $thuocTinhArr[$tinfo]. " ";                                        
                                                                }
                                                            }

                                                             ?></span>
                                                            @endforeach
                                                            <div class="btn-action">
                                                              <a class="btnorder" href="{{ route('chi-tiet', $product['slug']) }}">Đặt hàng</a>
                                                              <a class="viewdetail" href="{{ route('chi-tiet', $product['slug']) }}">Chi tiết</a>
                                                            </div>
                                                        </figure>
                                                        @endif
                                                    </div>
                                                    <div class="right-block">
                                                        <h5 class="product-name"><a title="{{ $product['name'] }}" href="{{ route('chi-tiet', $product['slug']) }}">{{ $product['name'] }}</a></h5>
                                                        <div class="content_price">
                                                            <span class="price product-price">
                                                            @if($product['price'] > 0)
                                                            {{ $product['is_sale'] == 1 ? number_format($product['price_sale']) : number_format($product['price']) }}
                                                            @else
                                                            Liên hệ
                                                            @endif
                                                            </span>
                                                            @if( $product['is_sale'] == 1)
                                                            <span class="price old-price">{{ number_format($product['price']) }}</span>
                                                            @endif
                                                        </div>
                                                        @if($product['price'] > 0)
                                                        <a class="add_to_cart_button" href="{{ route('chi-tiet', $product['slug']) }}">Mua</a>
                                                        @endif
                                                    </div>

                                                </li>
                                            @endforeach
                                           </ul>
                                          
                                        </div>                                   
                                    </div>
                                </div>
                            </div>
                        </div>
                   </div>
                </div>
                @endif
                @if( $loai['home_style'] == 0 )
                <div class="category-featured">
                <nav class="navbar nav-menu show-brand">
                  <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                      <div class="navbar-brand" style="background-color:{{ $loai['bg_color'] }}"><a title="{{ $loai['name'] }}" href="{{ route('danh-muc-cha', $loai['slug']) }}"><img  alt="{{ $loai['name']}}" class="lazy" data-original="{{ Helper::showImage($loai['icon_url']) }}" />{{ $loai['name']}}</a></div>
                      <span class="toggle-menu"></span>  
                      <div class="collapse navbar-collapse">
                          <ul class="nav navbar-nav">
                            @foreach( $loai['child'] as $cate)
                            <li><a title="{{ $cate['name'] }}" href="{{ route('danh-muc-con', [$loai['slug'], $cate['slug']])}}">{{ $cate['name']}}</a></li>
                            @endforeach
                          </ul>
                        </div><!-- /.navbar-collapse -->              
                  </div><!-- /.container-fluid -->
                  <div id="elevator-{{ $countLoaiSp}}" class="floor-elevator">
                        <a href="#{{ $countLoaiSp > 1 ? "elevator-".($countLoaiSp - 1)  : " " }}" class="btn-elevator up {{ $countLoaiSp == 1 ? "disabled" : "" }} fa fa-angle-up"></a>
                        <a href="#{{ $countLoaiSp < $totalLoaiHot ? "elevator-".($countLoaiSp + 1)  : " " }}" class="btn-elevator down {{ $countLoaiSp == $totalLoaiHot ? "disabled" : "" }} fa fa-angle-down"></a>
                  </div>
                </nav>
               <div class="product-featured clearfix">


                        <div class="product-featured-tab-content">
                            <div class="tab-container">
                                <div class="tab-panel active" id="tab-10">
                                        <div class="col-sm-12 category-list-product" style="padding-right:0;">
                                            <ul class="product-list">
                                                @foreach( $productArr[$loai['id']] as $product )
                                                <?php 
                                                    if( $loai['is_hover'] == 1){                                                        
                                                        $tmp = isset($product['thuoc_tinh']) ? $product['thuoc_tinh'] : "";
                                                        $thuocTinhArr = json_decode($tmp, true);                                                     
                                                    }

                                                ?>
                                                    <li class="col-sm-2">
                                                        <div class="left-block">
                                                            @if($product['pro_style'] == 1 && $product['image_pro'] != '' && $loai['icon_km'] != '')
                                                            <img class="gift-icon lazy" src="{{ Helper::showImage($loai['icon_km']) }}" alt="Sản phẩm có quà tặng">
                                                            @endif
                                                            @if($product['pro_style'] == 2 && $product['image_pro'] != '')
                                                            <img class="gift-icon lazy" src="{{ Helper::showImage($product['image_pro']) }}" alt="qua tang kem {{ $product['name'] }}">
                                                            @endif
                                                            @if( $product['is_sale'] == 1)
                                                            <span class="discount">{{
                                                                100-round($product['price_sale']*100/$product['price'])
                                                            }}%</span>
                                                            @endif
                                                            <a href="{{ route('chi-tiet', $product['slug']) }}">
                                                            <img class="img-responsive lazy lazy-img1" alt="{{ $product['name'] }}" data-original="{{ Helper::showImage($product['image_url']) }}" /></a>
                                                                    @if($product['pro_style'] == 1 && $product['image_pro'] != '')
                                                                <img class="img-responsive lazy-img2 lazy" alt="product" src="{{ Helper::showImage($product['image_pro']) }}" />
                                                                @endif
                                                                </a>
                                                                @if( $loai['is_hover'] == 1 && $product['pro_style'] == 0)
                                                            <figure class="mask-info">
                                                                @foreach($hoverInfo[$loai['id']] as $info)
                                                                <?php 
                                                                $tmpInfo = explode(",", $info->str_thuoctinh_id);         
                                                                ?>

                                                                <span>{{ $info->text_hien_thi}}: <?php
                                                                $countT = 0; $totalT = count($tmpInfo);
                                                                foreach( $tmpInfo as $tinfo){
                                                                    $countT++;
                                                                    if(isset($thuocTinhArr[$tinfo])){
                                                                        echo $thuocTinhArr[$tinfo]. " ";                                            
                                                                    }
                                                                }

                                                                 ?></span>
                                                                @endforeach
                                                                <div class="btn-action">
                                                                  <a class="btnorder" href="{{ route('chi-tiet', $product['slug']) }}">Đặt hàng</a>
                                                                  <a class="viewdetail" href="{{ route('chi-tiet', $product['slug']) }}">Chi tiết</a>
                                                                </div>
                                                            </figure>
                                                            @endif
                                                        </div>
                                                        <div class="right-block">
                                                            <h5 class="product-name"><a title="{{ $product['name'] }}" href="{{ route('chi-tiet', $product['slug']) }}">{{ $product['name'] }}</a></h5>
                                                            <div class="content_price">
                                                                <span class="price product-price">
                                                                @if($product['price'] > 0)
                                                                {{ $product['is_sale'] == 1 ? number_format($product['price_sale']) : number_format($product['price']) }}
                                                                @else
                                                                Liên hệ
                                                                @endif
                                                                </span>
                                                                @if( $product['is_sale'] == 1)
                                                                <span class="price old-price">{{ number_format($product['price']) }}</span>
                                                                @endif
                                                            </div>
                                                            @if($product['price'] > 0)
                                                            <a class="add_to_cart_button" href="{{ route('chi-tiet', $product['slug']) }}">Mua</a>
                                                            @endif
                                                        </div>

                                                    </li>
                                                @endforeach
                                             
                                            </ul>
                                        </div>
                                </div>
                             
                            </div>
                        </div>

                   </div>
                </div>
                @endif
                @if( $loai['home_style'] == 2 )
                <div class="category-featured">
                    <nav class="navbar nav-menu show-brand">
                      <div class="container">
                        <!-- Brand and toggle get grouped for better mobile display -->
                           <div class="navbar-brand" style="background-color:{{ $loai['bg_color'] }}"><a title="{{ $loai['name'] }}" href="{{ route('danh-muc-cha', $loai['slug']) }}"><img class="lazy"  alt="{{ $loai['name']}}" data-original="{{ Helper::showImage($loai['icon_url']) }}" />{{ $loai['name']}}</a></div>
                          <span class="toggle-menu"></span>
                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse">           
                          <ul class="nav navbar-nav">
                                @foreach( $loai['child'] as $cate)                                
                                <li><a title="{{ $cate['name'] }}" href="{{ route('danh-muc-con', [$loai['slug'], $cate['slug']])}}">{{ $cate['name']}}</a></li>@endforeach
                          </ul>
                        </div><!-- /.navbar-collapse -->
                      </div><!-- /.container-fluid -->
                      <div id="elevator-{{ $countLoaiSp}}" class="floor-elevator">
                            <a href="#{{ $countLoaiSp > 1 ? "elevator-".($countLoaiSp - 1)  : " " }}" class="btn-elevator up {{ $countLoaiSp == 1 ? "disabled" : "" }} fa fa-angle-up"></a>
                            <a href="#{{ $countLoaiSp < $totalLoaiHot ? "elevator-".($countLoaiSp + 1)  : " " }}" class="btn-elevator down {{ $countLoaiSp == $totalLoaiHot ? "disabled" : "" }} fa fa-angle-down"></a>
                      </div>
                    </nav>
                   <div class="product-featured clearfix">
                        <div class="row">
                            <div class="col-sm-2 sub-category-wapper">
                                @if( count($loai['child']) <= 14 )
                                <ul class="sub-category-list">

                                    @foreach( $loai['child'] as $cate)                                    
                                    <li><a title="{{ $cate['name'] }}" href="{{ route('danh-muc-con', [$loai['slug'], $cate['slug']])}}">{{ $cate['name']}}</a></li> @endforeach                                                                  
                                </ul>
                                @else
                                <div class="owl-carousel-vertical" data-items="1" data-nav="true" data-dots="false" data-loop="false">
                                    <div class="item">
                                        <ul class="sub-category-list">
                                            <?php 
                                                $count = 0;
                                            ?>
                                            @foreach( $loai['child'] as $cate)
                                            <?php $count++; ?>
                                            <li><a title="{{ $cate['name'] }}" href="{{ route('danh-muc-con', [$loai['slug'], $cate['slug']])}}">{{ $cate['name']}}</a></li>
                                            @if($count == 14)
                                                    </ul>
                                            </div>
                                            <div class="item">
                                                <ul class="sub-category-list">
                                            @endif
                                            @endforeach
                                            
                                        </ul>
                                    </div>                                
                                </div>
                                @endif
                            </div>
                            <div class="col-sm-2 banner-waper">
                                <div class="banner-img">

                                    <ul class="owl-intab owl-carousel" data-loop="{!! count($bannerArr[$loai['id']]) > 1 ? 'true' : 'false' !!}" data-items="1" 
                                    data-autoplay="true" data-dots="false" {!! count($bannerArr[$loai['id']]) > 1 ? ' data-nav="true"' : '' !!}>

                                        @if( !empty($bannerArr[$loai['id']]))
                                            @foreach($bannerArr[$loai['id']] as $banner)
                                                <li>

                                                    @if($banner->type == 2)
                                                    <a href="{{ $banner->ads_url }}">
                                                    @endif
                                                    <img src="{{ Helper::showImage($banner['image_url']) }}" alt="Image">
                                                    @if($banner->type == 2)
                                                    </a>
                                                    @endif
                                                </li>
                                            @endforeach
                                        @endif                                                    
                                    </ul>
                                </div>
                            </div>
                            <div class="col-sm-8 col-right-tab">
                                <div class="product-featured-tab-content">
                                    <div class="tab-container">
                                        <div class="tab-panel active" id="tab-10">
                                         
                                                    <ul class="product-list row">
                                                        @foreach( $productArr[$loai['id']] as $product )
                                                            <?php 
                                                                if( $loai['is_hover'] == 1){                                                        
                                                                    $tmp = isset($product['thuoc_tinh']) ? $product['thuoc_tinh'] : "";
                                                                    $thuocTinhArr = json_decode($tmp, true);                                                     
                                                                }

                                                            ?>
                                                            <li class="col-md-3 col-sm-4">
                                                                <div class="left-block">
                                                                    @if($product['pro_style'] == 1 && $product['image_pro'] != '' && $loai['icon_km'] != '')
                                                                    <img class="gift-icon lazy" src="{{ Helper::showImage($loai['icon_km']) }}" alt="Sản phẩm có quà tặng">
                                                                    @endif
                                                                    @if($product['pro_style'] == 2 && $product['image_pro'] != '')
                                                                    <img class="gift-icon lazy" src="{{ Helper::showImage($product['image_pro']) }}" alt="qua tang kem {{ $product['name'] }}">
                                                                    @endif
                                                                    @if( $product['is_sale'] == 1)
                                                                    <span class="discount">{{
                                                                        100-round($product['price_sale']*100/$product['price'])
                                                                    }}%</span>
                                                                    @endif
                                                                    <a href="{{ route('chi-tiet', $product['slug']) }}">
                                                                    <img class="img-responsive lazy lazy-img1" alt="{{ $product['name'] }}" data-original="{{ Helper::showImage($product['image_url']) }}" />
                                                                    @if($product['pro_style'] == 1 && $product['image_pro'] != '')
                                                                    <img class="img-responsive lazy-img2 lazy" alt="product" src="{{ Helper::showImage($product['image_pro']) }}" />
                                                                    @endif
                                                                    </a>
                                                                    @if( $loai['is_hover'] == 1 && $product['pro_style'] == 0)
                                                                    <figure class="mask-info">
                                                                        @foreach($hoverInfo[$loai['id']] as $info)
                                                                        <?php 
                                                                        $tmpInfo = explode(",", $info->str_thuoctinh_id);         
                                                                        ?>

                                                                        <span>{{ $info->text_hien_thi}}: <?php
                                                                        $countT = 0; $totalT = count($tmpInfo);
                                                                        foreach( $tmpInfo as $tinfo){
                                                                            $countT++;
                                                                            if(isset($thuocTinhArr[$tinfo])){
                                                                                echo $thuocTinhArr[$tinfo]. " ";           
                                                                            }
                                                                        }

                                                                         ?></span>
                                                                        @endforeach
                                                                        <div class="btn-action">
                                                                          <a class="btnorder" href="{{ route('chi-tiet', $product['slug']) }}">Đặt hàng</a>
                                                                          <a class="viewdetail" href="{{ route('chi-tiet', $product['slug']) }}">Chi tiết</a>
                                                                        </div>
                                                                    </figure>
                                                                    @endif
                                                                </div>
                                                                <div class="right-block">
                                                                    <h5 class="product-name"><a title="{{ $product['name'] }}" href="{{ route('chi-tiet', $product['slug']) }}">{{ $product['name'] }}</a></h5>
                                                                    <div class="content_price">
                                                                        <span class="price product-price">
                                                                            @if($product['price'] > 0)
                                                                            {{ $product['is_sale'] == 1 ? number_format($product['price_sale']) : number_format($product['price']) }}
                                                                            @else
                                                                            Liên hệ
                                                                            @endif
                                                                        </span>
                                                                        @if( $product['is_sale'] == 1)
                                                                        <span class="price old-price">{{ number_format($product['price']) }}</span>
                                                                        @endif
                                                                    </div>
                                                                    @if($product['price'] > 0)
                                                                    <a class="add_to_cart_button" href="{{ route('chi-tiet', $product['slug']) }}">Mua</a>
                                                                    @endif
                                                                </div>

                                                            </li>
                                                        @endforeach
                                                       
                                                    </ul>
                                          
                                        </div>                              
                                    </div>
                                </div>
                            </div>
                        </div>
                   </div>
                </div>
                @endif
                @if( $loai['home_style'] == 3 )

                <div class="category-featured">
                    <nav class="navbar nav-menu show-brand">
                      <div class="container">
                        <!-- Brand and toggle get grouped for better mobile display -->
                           <div class="navbar-brand" style="background-color:{{ $loai['bg_color'] }}"><a title="{{ $loai['name'] }}" href="{{ route('danh-muc-cha', $loai['slug']) }}"><img  alt="{{ $loai['name']}}" class="lazy" data-original="{{ Helper::showImage($loai['icon_url']) }}" />{{ $loai['name']}}</a></div>
                          <span class="toggle-menu"></span>
                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse">           
                          <ul class="nav navbar-nav">
                                @foreach( $loai['child'] as $cate)
                                <li><a title="{{ $cate['name'] }}" href="{{ route('danh-muc-con', [$loai['slug'], $cate['slug']])}}">{{ $cate['name']}}</a></li>
                                @endforeach
                          </ul>
                        </div><!-- /.navbar-collapse -->
                      </div><!-- /.container-fluid -->
                      <div id="elevator-{{ $countLoaiSp}}" class="floor-elevator">
                            <a href="#{{ $countLoaiSp > 1 ? "elevator-".($countLoaiSp - 1)  : " " }}" class="btn-elevator up {{ $countLoaiSp == 1 ? "disabled" : "" }} fa fa-angle-up"></a>
                            <a href="#{{ $countLoaiSp < $totalLoaiHot ? "elevator-".($countLoaiSp + 1)  : " " }}" class="btn-elevator down {{ $countLoaiSp == $totalLoaiHot ? "disabled" : "" }} fa fa-angle-down"></a>
                      </div>
                    </nav>
           <div class="product-featured clearfix">
                <div class="row">
                    <div class="col-sm-2 sub-category-wapper">
                        @if( count($loai['child']) <= 14 )
                        <ul class="sub-category-list">

                            @foreach( $loai['child'] as $cate)
                            <li><a title="{{ $cate['name'] }}" href="{{ route('danh-muc-con', [$loai['slug'], $cate['slug']])}}">{{ $cate['name']}}</a></li>
                            @endforeach

                        </ul>
                        @else
                        <div class="owl-carousel-vertical" data-items="1" data-nav="true" data-dots="false" data-loop="false">
                            <div class="item">
                                <ul class="sub-category-list">
                                    <?php 
                                        $count = 0;
                                    ?>
                                    @foreach( $loai['child'] as $cate)
                                    <?php $count++; ?>
                                    <li><a title="{{ $cate['name'] }}" href="{{ route('danh-muc-con', [$loai['slug'], $cate['slug']])}}">{{ $cate['name']}}</a></li>
                                    @if($count == 14)
                                            </ul>
                                    </div>
                                    <div class="item">
                                        <ul class="sub-category-list">
                                    @endif
                                    @endforeach
                                    
                                </ul>
                            </div>                                
                        </div>
                        @endif
                    </div>
                    <div class="col-sm-10 col-right-tab banner-waper-left">
                        <div class="product-featured-tab-content">
                            <div class="tab-container">
                                <div class="tab-panel active" id="tab-14">                                    
                                    <div class="box-full clearfix">
                                        <ul class="product-list row">
                                            <li class="banner-waper hidden-xs">
                                                <ul class="owl-intab owl-carousel" data-loop="{!! count($bannerArr[$loai['id']]) > 1 ? 'true' : 'false' !!}" data-items="1" data-autoplay="true" data-dots="false" {!! count($bannerArr[$loai['id']]) > 1 ? ' data-nav="true"' : '' !!}>
                                                    @if( !empty($bannerArr[$loai['id']]))
                                                    @foreach($bannerArr[$loai['id']] as $banner)
                                                        <li>
                                                            @if($banner->type == 2)
                                                            <a href="{{ $banner->ads_url }}">
                                                            @endif
                                                            <img src="{{ Helper::showImage($banner['image_url']) }}" alt="Image">
                                                            @if($banner->type == 2)
                                                            </a>
                                                            @endif
                                                        </li>
                                                    @endforeach
                                                @endif     
                                                </ul>
                                            </li>
                                            <?php $count = 0; ?>
                                            @foreach( $productArr[$loai['id']] as $product )
                                            <?php $count++; ?>
                                            @if( $count <=3 )
                                                <?php 
                                                    if( $loai['is_hover'] == 1){                                                        
                                                        $tmp = isset($product['thuoc_tinh']) ? $product['thuoc_tinh'] : "";
                                                        $thuocTinhArr = json_decode($tmp, true);                                                     
                                                    }

                                                ?>
                                                <li>
                                                    <div class="left-block">
                                                        @if($product['pro_style'] == 1 && $product['image_pro'] != '' && $loai['icon_km'] != '')
                                                        <img class="gift-icon lazy" src="{{ Helper::showImage($loai['icon_km']) }}" alt="Sản phẩm có quà tặng">
                                                        @endif
                                                        @if($product['pro_style'] == 2 && $product['image_pro'] != '')
                                                        <img class="gift-icon lazy" src="{{ Helper::showImage($product['image_pro']) }}" alt="qua tang kem {{ $product['name'] }}">
                                                        @endif
                                                        
                                                        @if( $product['is_sale'] == 1)
                                                        <span class="discount">{{
                                                            100-round($product['price_sale']*100/$product['price'])
                                                        }}%</span>
                                                        @endif
                                                        <a href="{{ route('chi-tiet', $product['slug']) }}">
                                                        <img class="img-responsive lazy lazy-img1" alt="{{ $product['name'] }}" data-original="{{ Helper::showImage($product['image_url']) }}" />
                                                        @if($product['pro_style'] == 1 && $product['image_pro'] != '')
                                                        <img class="img-responsive lazy-img2 lazy" alt="product" src="{{ Helper::showImage($product['image_pro']) }}" />
                                                        @endif
                                                        </a>
                                                        @if( $loai['is_hover'] == 1 && $product['pro_style'] == 0)
                                                        <figure class="mask-info">
                                                            @foreach($hoverInfo[$loai['id']] as $info)
                                                            <?php 
                                                            $tmpInfo = explode(",", $info->str_thuoctinh_id);         
                                                            ?>

                                                            <span>{{ $info->text_hien_thi}}: <?php
                                                            $countT = 0; $totalT = count($tmpInfo);
                                                            foreach( $tmpInfo as $tinfo){
                                                                $countT++;
                                                                if(isset($thuocTinhArr[$tinfo])){
                                                                    echo $thuocTinhArr[$tinfo]. " ";
                                                                }
                                                            }

                                                             ?></span>
                                                            @endforeach
                                                            <div class="btn-action">
                                                              <a class="btnorder" href="{{ route('chi-tiet', $product['slug']) }}">Đặt hàng</a>
                                                              <a class="viewdetail" href="{{ route('chi-tiet', $product['slug']) }}">Chi tiết</a>
                                                            </div>
                                                        </figure>
                                                        @endif
                                                    </div>
                                                    <div class="right-block">
                                                        <h5 class="product-name"><a title="{{ $product['name'] }}" href="{{ route('chi-tiet', $product['slug']) }}">{{ $product['name'] }}</a></h5>
                                                        <div class="content_price">
                                                            <span class="price product-price">
                                                            @if($product['price'] > 0)
                                                            {{ $product['is_sale'] == 1 ? number_format($product['price_sale']) : number_format($product['price']) }}
                                                            @else
                                                            Liên hệ
                                                            @endif
                                                            </span>
                                                            @if( $product['is_sale'] == 1)
                                                            <span class="price old-price">{{ number_format($product['price']) }}</span>
                                                            @endif


                                                        </div>
                                                        @if($product['price'] > 0)
                                                        <a class="add_to_cart_button" href="{{ route('chi-tiet', $product['slug']) }}">Mua</a>
                                                        @endif
                                                    </div>

                                                </li>
                                                @endif
                                            @endforeach                                         
                                        </ul>
                                    </div>
                                    <div class="box-full clearfix">
                                        <ul class="product-list">
                                            <?php $count = 0; ?>
                                            @foreach( $productArr[$loai['id']] as $product )
                                            <?php $count++; ?>
                                            <?php 
                                                if( $loai['is_hover'] == 1){                                                        
                                                    $tmp = isset($product['thuoc_tinh']) ? $product['thuoc_tinh'] : "";
                                                    $thuocTinhArr = json_decode($tmp, true);                                                     
                                                }

                                            ?>
                                            @if( $count > 3 )

                                                <li>
                                                    <div class="left-block">
                                                        @if($product['pro_style'] == 1 && $product['image_pro'] != '' && $loai['icon_km'] != '')
                                                        <img class="gift-icon lazy" src="{{ Helper::showImage($loai['icon_km']) }}" alt="Sản phẩm có quà tặng">
                                                        @endif
                                                        @if($product['pro_style'] == 2 && $product['image_pro'] != '')
                                                        <img class="gift-icon lazy" src="{{ Helper::showImage($product['image_pro']) }}" alt="qua tang kem {{ $product['name'] }}">
                                                        @endif
                                                        @if( $product['is_sale'] == 1)
                                                        <span class="discount">{{
                                                            100-round($product['price_sale']*100/$product['price'])
                                                        }}%</span>
                                                        @endif
                                                        <a href="{{ route('chi-tiet', $product['slug']) }}">

                                                        <img class="img-responsive lazy lazy-img1" alt="{{ $product['name'] }}" src="{{ Helper::showImage($product['image_url']) }}" />
                                                        @if($product['pro_style'] == 1 && $product['image_pro'] != '')
                                                        <img class="img-responsive lazy-img2 lazy" alt="product" src="{{ Helper::showImage($product['image_pro']) }}" />
                                                        @endif
                                                        </a>
                                                        @if( $loai['is_hover'] == 1 && $product['pro_style'] == 0)
                                                        <figure class="mask-info">
                                                            @foreach($hoverInfo[$loai['id']] as $info)
                                                            <?php 
                                                            $tmpInfo = explode(",", $info->str_thuoctinh_id);         
                                                            ?>

                                                            <span>{{ $info->text_hien_thi}}: <?php
                                                            $countT = 0; $totalT = count($tmpInfo);
                                                            foreach( $tmpInfo as $tinfo){
                                                                $countT++;
                                                                echo $thuocTinhArr[$tinfo]. " ";                                    
                                                            }

                                                             ?></span>
                                                            @endforeach
                                                            <div class="btn-action">
                                                              <a class="btnorder" href="{{ route('chi-tiet', $product['slug']) }}">Đặt hàng</a>
                                                              <a class="viewdetail" href="{{ route('chi-tiet', $product['slug']) }}">Chi tiết</a>
                                                            </div>
                                                        </figure>
                                                        @endif
                                                    </div>
                                                    <div class="right-block">
                                                        <h5 class="product-name"><a title="{{ $product['name'] }}" href="{{ route('chi-tiet', $product['slug']) }}">{{ $product['name'] }}</a></h5>
                                                        <div class="content_price">
                                                            <span class="price product-price">
                                                                @if($product['price'] > 0)
                                                                {{ $product['is_sale'] == 1 ? number_format($product['price_sale']) : number_format($product['price']) }}
                                                                @else
                                                                Liên hệ
                                                                @endif

                                                            </span>
                                                            @if( $product['is_sale'] == 1)
                                                            <span class="price old-price">{{ number_format($product['price']) }}</span>
                                                            @endif
                                                        </div>
                                                        @if($product['price'] > 0)
                                                        <a class="add_to_cart_button" href="{{ route('chi-tiet', $product['slug']) }}">Mua</a>
                                                        @endif
                                                    </div>

                                                </li>
                                                @endif
                                            @endforeach       
                                          
                                       </ul>
                                    </div>
                                </div>
                               
                            </div>
                        </div>
                    </div>
                </div>
           </div>
        </div>
                @endif           
            @endforeach



        </div>
    </div><!-- end /.content-page -->
</div><!-- end /.option2 -->

<div id="content-wrap">
    <div class="container">
        <!-- Baner bottom -->
        <div class="row banner-bottom">
            <div class="col-sm-6 item-left">
                <div class="banner-boder-zoom">
                    <?php $banner = DB::table('banner')->where(['object_id' => 3, 'object_type' => 3])->orderBy('display_order', 'asc')->first(); 

                    ?>
                    @if($banner)
                    <a href="#"><img alt="ads" class="img-responsive lazy" data-original="{{ Helper::showImage($banner->image_url) }}" /></a>
                    @endif
                </div>
            </div>
            <div class="col-sm-6 item-right">
                <div class="banner-boder-zoom">
                    <?php $banner = DB::table('banner')->where(['object_id' => 4, 'object_type' => 3])->orderBy('display_order', 'asc')->first(); ?>
                    @if($banner)
                    <a href="#"><img alt="ads" class="img-responsive lazy" data-original="{{ Helper::showImage($banner->image_url) }}" /></a>
                    @endif
                    <?php unset($banner); ?>
                </div>
            </div>
        </div>
        <!-- end banner bottom -->

        <!-- blog list -->
        <div class="blog-list">
            <h2 class="page-heading">
                <span class="page-heading-title">Tin công nghệ</span>
            </h2>
            <div class="blog-list-wapper">
                <ul class="owl-carousel" data-dots="false" data-loop="false" data-nav = "true" data-margin = "30" data-autoplayTimeout="1000" data-autoplayHoverPause = "true" data-responsive='{"0":{"items":1},"600":{"items":3},"1000":{"items":4}}'>
                    @if( $articlesArr )
                        @foreach( $articlesArr as $articles )
                        <li>
                            <div class="post-thumb image-hover2">
                                <a href="{{ route('news-detail', ['slug' => $articles->slug, 'id' => $articles->id]) }}">
                                    <img data-original="{{ Helper::showImage($articles->image_url) }}" alt="{{ $articles->title }}" style="max-height:145px;" class="lazy"></a>
                            </div>
                            <div class="post-desc">
                                <h3 class="post-title">
                                    <a href="{{ route('news-detail', ['slug' => $articles->slug, 'id' => $articles->id]) }}">{{ $articles->title }}</a>
                                </h3>
                                <div class="post-meta">
                                    <span class="date">{{ date('d-m-Y', strtotime($articles->created_at)) }}</span>
                                   
                                </div>
                                <div class="readmore">
                                    <a href="{{ route('news-detail', ['slug' => $articles->slug, 'id' => $articles->id]) }}">Chi tiết</a>
                                </div>
                            </div>
                        </li>
                        @endforeach
                    @endif
                    
                </ul>
            </div>
        </div>
        <!-- ./blog list -->

    </div> <!-- /.container -->
</div> <!-- /.content-wrap -->
@endsection
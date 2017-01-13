@extends('frontend.layout')

@section('header')
    @include('frontend.partials.main-header')
    @include('frontend.partials.home-menu')
  @endsection

@include('frontend.partials.meta')
@section('content')
<div class="columns-container">
    <div class="container" id="columns">
        <!-- breadcrumb -->
        <div class="breadcrumb clearfix">
            <a class="home" href="{{ route('home') }}" title="Trở về trang chủ">Trang chủ</a>
            <span class="navigation-pipe">&nbsp;</span>
            <a class="home" href="{{ route('danh-muc-cha', $rs->slug) }}" title="{{ $rs->name }}">{{ $rs->name }}</a>
            <span class="navigation-pipe">&nbsp;</span>
            <span class="navigation_page">{{ $title }}</span>
        </div>
        <!-- ./breadcrumb -->
        <!-- row -->
        <div class="row">
            <!-- Left colunm -->
            @include('frontend.cate.cate-left')
            <!-- ./left colunm -->
            <!-- Center colunm-->
            <div class="center_column col-xs-12 col-sm-9" id="center_column">             
              
                <!-- view-product-list-->
                <div id="view-product-list" class="view-product-list">
                    <h1 class="page-heading">
                        <span class="page-heading-title">{{ $rs->name }} - {{ $title }}</span>
                    </h1>                    
                    <!-- PRODUCT LIST -->
                    <ul class="row product-list grid">
                        @foreach( $productArr as $product )
                        <?php 
                            if( $rs->is_hover == 1){                                                        
                                $tmp = isset($product['thuoc_tinh']) ? $product['thuoc_tinh'] : "";
                                $thuocTinhArr = json_decode($tmp, true);                                                     
                            }

                        ?>
                        <li class="col-xs-6 col-sm-4 col-md-3">
                            <div class="product-container">
                                <div class="left-block">
                                    @if($product['pro_style'] == 2 && $product['image_pro'] != '')
                                    <img class="gift-icon lazy" src="{{ Helper::showImage($product['image_pro']) }}" alt="qua tang kem {{ $product['name'] }}">
                                    @endif
                                    @if( $product['is_sale'] == 1)
                                    <span class="discount">-{{
                                        100-round($product['price_sale']*100/$product['price'])
                                    }}%</span>
                                    @endif
                                    <a href="{{ route('chi-tiet', $product['slug']) }}"><img class="img-responsive lazy-img1 lazy" alt="{{ $product['name'] }}" data-original="{{ Helper::showImage($product['image_url']) }}" /></a>
                                    @if($product['pro_style'] == 1 && $product['image_pro'] != '')
                                    <img class="img-responsive lazy-img2 lazy" alt="product" src="{{ Helper::showImage($product['image_pro']) }}" />
                                    @endif
                                    </a>                                    
                                    @if( $rs->is_hover == 1 && $product['pro_style'] == 0)
                                        <figure class="mask-info">
                                            @foreach($hoverInfo as $info)
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
                                    <h2 class="product-name"><a title="{{ $product['name'] }}" href="{{ route('chi-tiet', $product['slug']) }}">{{ $product['name'] }}</a></h2>
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
                            </div>
                        </li>
                    @endforeach
                        
                    </ul>
                    <!-- ./PRODUCT LIST -->

                </div>
                <!-- ./view-product-list-->
                <div class="sortPagiBar">
                    <div class="bottom-pagination">
                        <nav>
                        {{ $productArr->links() }}
                        </nav>
                    </div>                    
                </div>
            </div>
            <!-- ./ Center colunm -->
        </div>
        <!-- ./row-->
    </div>
</div>
@endsection

@include('frontend.partials.footer')
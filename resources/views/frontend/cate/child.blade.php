@extends('frontend.layout')
@include('frontend.partials.meta')
@section('content')
<section class="block-content">
    <div class="block-common block-sale-products">        
        <!-- breadcrumb -->
        <div class="breadcrumb clearfix">
            <a class="home" href="{{ route('home') }}" title="Trở về trang chủ">Trang chủ</a>
            <span class="navigation-pipe">&nbsp;</span>
            <a class="home" href="{{ route('danh-muc-cha', $rs->slug) }}" title="{{ $rs->name }}">{{ $rs->name }}</a>
            <span class="navigation-pipe">&nbsp;</span>
            <span class="navigation_page">{{ $rsCate->name }}</span>
        </div>
        <!-- ./breadcrumb -->
        <!-- row -->
        <div class="row">
            <!-- Left colunm -->
            <div class="column col-xs-12 col-sm-3" id="left_column">
                <!-- block category -->
                <div class="block left-module" style="margin-bottom:10px">
                    <p class="title_block">Danh mục</p>
                    <div class="block_content">
                        <!-- layered -->
                        <div class="layered layered-category">
                            <div class="layered-content">
                                <ul class="tree-menu">
                                    @foreach( $cateArr as $cate)
                                    <li {{ $rsCate->id == $cate->id  ? "class=active" : "" }}>
                                        <span></span><a href="{{ route('danh-muc-con', [$rs->slug, $cate->slug]) }}">{{ $cate->name }}</a>                                        
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <!-- ./layered -->
                    </div>
                </div>
                <div class="block left-module">
                    <p class="title_block">Tìm theo giá</p>
                    <div class="block_content">
                        <!-- layered -->
                        <div class="layered layered-category">
                            <div class="layered-content">
                                <ul class="tree-menu">
                                    <?php 
                                    $priceArr = DB::table('price_range')->where('loai_id', $rs->id)->orderBy('id')->get();

                                    ?>
                                    @foreach($priceArr as $price)                                   
                                    <li><span></span><a href="{{ route('theo-gia-danh-muc-cha',['slugLoaiSp' => $rs->slug, 'slugGia' => $price->alias]) }}">{{ $price->name }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <!-- ./layered -->
                    </div>
                </div>
                @include('frontend.partials.banner-slidebar')
             
            </div>
            <!-- ./left colunm -->
            <!-- Center colunm-->
            <div class="center_column col-xs-12 col-sm-9" id="center_column">             
              
                <!-- view-product-list-->
                <div id="view-product-list" class="products">
                    <h1 class="page-heading">
                        <span class="page-heading-title">{{ $rsCate->name }}</span>
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
                        <li class="col-md-3 col-sm-4 col-xs-4">
                            <div class="item">
                                <!--<p class="trapezoid">-18%</p>-->
                                <div class="pro-thumb">
                                    <a href="{{ route('chi-tiet', $product['slug']) }}" title="{{ $product['name'] }}">
                                        <img src="{{ Helper::showImage($product['image_url']) }}" alt="{{ $product['name'] }}">
                                    </a>
                                </div>
                                <div class="pro-info">
                                    <h2 class="pro-title"><a href="{{ route('chi-tiet', $product['slug']) }}">{{ $product['name'] }}</a></h2>
                                    <div class="price-products">
                                        <p class="pro-price">@if($product['price'] > 0)
                                        {{ $product['is_sale'] == 1 ? number_format($product['price_sale']) : number_format($product['price']) }}
                                        @else
                                        Liên hệ
                                        @endif </p>
                                        <!-- <p class="pro-sale"><del>7,940,000đ</del></p> -->
                                    </div>
                                    <a href="{{ route('chi-tiet', $product['slug']) }}" title="" class="btn btn-select-buy">Chọn mua</a>
                                </div>
                            </div><!-- /item -->
                        </li><!-- /col-sm-2 col-xs-6 -->    
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
</section>
@endsection

@include('frontend.partials.footer')
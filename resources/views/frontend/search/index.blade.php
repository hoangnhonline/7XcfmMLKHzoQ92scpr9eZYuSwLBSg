@extends('frontend.layout')
@include('frontend.partials.meta')
@section('header')
    @include('frontend.partials.main-header')
    @include('frontend.partials.home-menu')
  @endsection
@section('content')
<div class="columns-container">
    <div class="container" id="columns">
        <!-- breadcrumb -->
        <div class="breadcrumb clearfix">
            <a class="home" href="{{ route('home') }}" title="Trở về trang chủ">Trang chủ</a>
            <span class="navigation-pipe">&nbsp;</span>
            <a href="" title="Đơn hàng của tôi">Tìm kiếm</a>
        </div>
        <!-- ./breadcrumb -->
        <div class="row">        
            <div class="col-sm-3" id="left_column">
              <!-- block category -->
              <div class="block left-module">
                  <p class="title_block">Danh mục</p>
                  <div class="block_content">
                      <!-- layered -->
                      <div class="layered layered-category">
                          <div class="layered-content">
                              <ul class="tree-menu">
                                  <li><span></span><a href="{{ route('news-list', 'tin-tuc') }}">Tin tức</a></li>
                                  <li><span></span><a href="{{ route('chuong-trinh-khuyen-mai') }}">Khuyến mãi</a></li>
                                  <li><span></span><a href="{{ route('news-list', 'tuyen-dung') }}">Tuyển dụng</a></li>
                              </ul>
                          </div>
                      </div>
                      <!-- ./layered -->
                  </div>
              </div>
              <!-- ./block category  -->
              <!-- Banner silebar -->
              @include('frontend.partials.banner-slidebar')
              <!-- ./Banner silebar -->
          </div>
            <div class="center_column col-xs-12 col-sm-9" id="center_column">
                    <h1 class="page-heading">
                        <span class="page-heading-title2" style="text-transform:none">Kết quả tìm kiếm với từ khóa '{{ $tu_khoa }}' ({{ $productArr->total() }})</span>
                    </h1>
                    <!-- view-product-list-->
                <div id="view-product-list" class="view-product-list">                                   
                    <!-- PRODUCT LIST -->
                    <ul class="row product-list grid">
                        @foreach( $productArr as $product )
                        <?php 
                            if( $loaiSpKey[$product['loai_id']]['is_hover'] == 1){                    
                                $tmp = isset($product['thuoc_tinh']) ? $product['thuoc_tinh'] : "";
                                $thuocTinhArr = json_decode($tmp, true);
                            }
                        ?>
                        <li class="col-xs-6 col-sm-4 col-md-3">
                            <div class="product-container">
                                <div class="left-block">
                                   @if($product['pro_style'] == 1 && $product['image_pro'] != '' && $loaiSpKey[$product['loai_id']]['icon_km'] != '')
                                    <img class="gift-icon lazy" src="{{ Helper::showImage($loaiSpKey[$product['loai_id']]['icon_km']) }}" alt="Sản phẩm có quà tặng">
                                    @endif
                                    @if($product['pro_style'] == 2 && $product['image_pro'] != '')
                                    <img class="gift-icon lazy" src="{{ Helper::showImage($product['image_pro']) }}" alt="qua tang kem {{ $product['name'] }}">
                                    @endif
                                    @if( $product['is_sale'] == 1)
                                    <span class="discount">-{{
                                        100-round($product['price_sale']*100/$product['price'])
                                    }}%</span>
                                    @endif
                                    <a href="{{ route('chi-tiet', $product['slug']) }}"><img class="img-responsive lazy-img1 lazy" alt="product" data-original="{{ Helper::showImage($product['image_url']) }}" /></a>   
                                    @if($product['pro_style'] == 1 && $product['image_pro'] != '')
                                    <img class="img-responsive lazy-img2 lazy" alt="product" src="{{ Helper::showImage($product['image_pro']) }}" />
                                    @endif
                                    </a>
                                    @if( $loaiSpKey[$product['loai_id']]['is_hover'] == 1 && $product['pro_style'] == 0)
                                    <figure class="mask-info">
                                        @foreach($hoverInfo[$product['loai_id']] as $info)
                                        <?php 
                                        $tmpInfo = explode(",", $info->str_thuoctinh_id);        
                                        ?>

                                        <span>{{ $info->text_hien_thi}}: <?php
                                        $countT = 0; $totalT = count($tmpInfo);
                                        foreach( $tmpInfo as $tinfo){
                                            $countT++;
                                            if(isset($thuocTinhArr[$tinfo])){
                                                echo $thuocTinhArr[$tinfo];
                                                echo $countT < $totalT ? ", " : "";
                                            }
                                        }

                                         ?></span>
                                        @endforeach
                                        <div class="btn-action">
                                          <a class="btnorder" product-id={{$product['id']}}>Đặt hàng</a>
                                          <a class="viewdetail" href="{{ route('chi-tiet', $product['slug']) }}">Chi tiết</a>
                                        </div>
                                    </figure>
                                    @endif
                                </div>
                                <div class="right-block">
                                    <h2 class="product-name"><a title="{{ $product['name'] }}" href="{{ route('chi-tiet', $product['slug']) }}">{{ $product['name'] }}</a></h2>
                                    <div class="content_price">
                                        <span class="price product-price">{{ $product['is_sale'] == 1 ? number_format($product['price_sale']) : number_format($product['price']) }}</span>
                                        @if( $product['is_sale'] == 1)
                                        <span class="price old-price">{{ number_format($product['price']) }}</span>
                                        @endif
                                    </div>
                                    <a class="add_to_cart_button" product-id={{$product['id']}}>Mua</a>
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
                          {{ $productArr->appends(['keyword' => $tu_khoa])->links() }}
                        </nav>
                    </div>                    
                </div>                   
            </div>
        </div><!-- /.page-content -->
    </div>
</div>
<style type="text/css">    
    .dashboard-order.have-margin {
        margin-bottom: 20px;
    }   
    table.table-responsive thead tr th {
        display: table-cell;
        padding: 8px;
        background: #f8f8f8;
        font-weight: 500;    
    }
    table.table-responsive tbody tr td{
        font-size: 14px !important;
    }
</style>
@endsection
<div class='clearfix'></div>
@include('frontend.partials.footer')
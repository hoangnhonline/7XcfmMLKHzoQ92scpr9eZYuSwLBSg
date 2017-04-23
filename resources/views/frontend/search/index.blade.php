@extends('frontend.layout')
@include('frontend.partials.meta')
@section('content')
<article class="block block-breadcrumb">
  <ul class="breadcrumb">
    <li><a href="{{ route('home') }}" title="Trở về trang chủ">Trang chủ</a></li>
    <li class="active">Tìm kiếm</li>
  </ul>
</article><!-- /block-breadcrumb -->
<section class="block-content">
        <div class="block-common">
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
                <div id="view-product-list" class="products">                                   
                    <!-- PRODUCT LIST -->
                    <ul class="row product-list grid">
                        @foreach( $productArr as $product )
                        <?php 
                            if( $loaiSpKey[$product['loai_id']]['is_hover'] == 1){                    
                                $tmp = isset($product['thuoc_tinh']) ? $product['thuoc_tinh'] : "";
                                $thuocTinhArr = json_decode($tmp, true);
                            }
                        ?>
                        <li class="col-md-3 col-sm-4 col-xs-4">
                          <div class="item">
                           <!-- <p class="trapezoid">-18%</p>-->
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
                          {{ $productArr->appends(['keyword' => $tu_khoa])->links() }}
                        </nav>
                    </div>                    
                </div>                   
            </div>
        </div><!-- /.page-content -->
    
</section>
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
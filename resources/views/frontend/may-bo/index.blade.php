@extends('frontend.layout')

@section('header')
    @include('frontend.partials.main-header')
    @include('frontend.partials.home-menu')
  @endsection

@include('frontend.partials.meta')
@section('content')
<link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/lib/slimScroll/prettify.css') }}">
<div class="columns-container">
    <div class="container" id="columns">
        <!-- breadcrumb -->
        <div class="breadcrumb clearfix">
            <a class="home" href="{{ route('home') }}" title="Trở về trang chủ">Trang chủ</a>
            <span class="navigation-pipe">&nbsp;</span>
            <a class="home" href="{{ route('danh-muc-cha', $loaiSp->slug) }}" title="{{ $loaiSp->name }}">{{ $loaiSp->name }}</a>
            <span class="navigation-pipe">&nbsp;</span>
            <span class="navigation_page">{{ $title }}</span>
        </div>
        <!-- ./breadcrumb -->
        <!-- row -->
        <div class="row">
            <!-- Left colunm -->
            <div class="column col-xs-12 col-sm-3" id="left_column">
                <!-- block category -->
                <div class="block left-module">
                    <p class="title_block">Danh mục</p>
                    <div class="block_content">
                        <!-- layered -->
                        <div class="layered layered-category">
                            <div class="layered-content">
                                <ul class="tree-menu">
                                    @foreach( $cateArr as $cate)
                                    <li>
                                        <span></span><a href="{{ route('danh-muc-con', [$loaiSp->slug, $cate->slug]) }}">{{ $cate->name }}</a>                                        
                                    </li>
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
                <div id="view-product-list" class="view-product-list">
                    <h1 class="page-heading">
                        <span class="page-heading-title">{{ $title }}</span>
                    </h1>                    
                    <!-- PRODUCT LIST -->
                    <ul class="row product-list grid" id="view-product-list-more">
                        @foreach( $productArr as $product )
                        <li class="col-xs-6 col-sm-6 col-md-4">
                            <div class="product-container">
                                <div class="left-block">
                                    @if( $product['is_sale'] == 1)
                                    <span class="discount">-{{
                                        100-round($product['price_sale']*100/$product['price'])
                                    }}%</span>
                                    @endif
                                     <a href="{{ route('chi-tiet', $product['slug']) }}">
                                        <img class="img-responsive lazy" alt="{{ $product['name'] }}" data-original="{{ Helper::showImage($product['image_url']) }}" />
                                     </a>
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
                                <div class="info-more" style="padding:5px;text-align:justify">
                                  <?php echo $product['chi_tiet']; ?>
                                </div>
                            </div>
                            
                        </li>                       
                        @endforeach
                        
                    </ul>
                    <div class="view-product-list" style="padding-left:0px;margin-top:20px;text-align:right">
                        <a class="btn btn-warning" href="{{ route('lap-rap', $slug)}}" >Tự chọn cấu hình</a>
                    </div>
                </div>
                
            </div>
            <!-- ./ Center colunm -->
        </div>
        <!-- ./row-->
    </div>
</div>
<style type="text/css">
    .product-list.grid .info-more li{
        margin-top: 7px !important;
        list-style: disc !important;
    }

</style>
@endsection

@include('frontend.partials.footer')

@section('javascript')
<script type="text/javascript" src="{{ URL::asset('assets/lib/slimScroll/prettify.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('assets/lib/slimScroll/jquery.slimscroll.min.js') }}"></script>
<script>
$(document).ready(function(e) {
  $('#view-product-list-more li .info-more').slimscroll({
    height: '350px',
    alwaysVisible: true,
    railVisible: false
  });
});
</script>
	<script type="text/javascript">
		$(document).ready(function() {
      $('.add_to_cart_button, .btnorder').click(function() {
        var product_id = $(this).attr('product-id');
        add_product_to_cart(product_id);
      });

      function add_product_to_cart(product_id) {
        $.ajax({
          url: "{{route('them-sanpham')}}",
          method: "POST",
          data : {
            id: product_id
          },
          success : function(data){
            location.href = '{{route("gio-hang")}}';
          },
          error : function(e) {
            alert( JSON.stringify(e));
          }
        });
      }

		});
	</script>
@endsection
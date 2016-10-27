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
                <div class="col-left-slide left-module">
                    <ul class="owl-carousel owl-style2" data-loop="true" data-nav = "false" data-margin = "30" data-autoplayTimeout="1000" data-autoplayHoverPause = "true" data-items="1" data-autoplay="true">
                        <li><a href="#"><img src="{{ URL::asset('assets/data/slide-left.jpg') }}" alt="slide-left"></a></li>
                        <li><a href="#"><img src="{{ URL::asset('assets/data/slide-left.jpg') }}" alt="slide-left"></a></li>
                        <li><a href="#"><img src="{{ URL::asset('assets/data/slide-left.jpg') }}" alt="slide-left"></a></li>
                    </ul>

                </div>
             
            </div>
            <!-- ./left colunm -->
            <!-- Center colunm-->
            <div class="center_column col-xs-12 col-sm-9" id="center_column">             
              
                <!-- view-product-list-->
                <div id="view-product-list" class="view-product-list">
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
                        <li class="col-xs-6 col-sm-4 col-md-3">
                            <div class="product-container">
                                <div class="left-block">
                                    @if( $product['is_sale'] == 1)
                                    <span class="discount">-{{
                                        100-round($product['price_sale']*100/$product['price'])
                                    }}%</span>
                                    @endif
                                    <a href="{{ route('chi-tiet', $product['slug']) }}"><img class="img-responsive lazy" alt="{{ $product['name'] }}" data-original="{{ Helper::showImage($product['image_url']) }}" /></a>
                                     @if( $rs->is_hover == 1)
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
                                    <a class="add_to_cart_button" product-id={{$product['id']}}>Mua</a>
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

@section('javascript')


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
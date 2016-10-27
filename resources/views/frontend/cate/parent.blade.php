@extends('frontend.layout')

@section('header')
    @include('frontend.partials.main-header')
    @include('frontend.partials.home-menu')
  @endsection

@include('frontend.partials.meta')
@section('content')
<!-- END Home slideder-->
<div class="option2 clearfix">
    <div class="content-page" style="margin-top:0px">
        <div class="container">
            <!-- featured category fashion -->
            <?php $countLoaiSp = 0; 
            $totalLoaiHot = count( $loaiSpHot );
            ?>
            @foreach( $cateArr as $cate)
                @if( !empty( $productArr[$cate->id])) 
                <?php $countLoaiSp++; ?>          
                <div class="category-featured">
                    <nav class="navbar nav-menu show-brand">
                      <div class="container">
                        <!-- Brand and toggle get grouped for better mobile display -->
                          <div class="navbar-brand" style="background-color:{{ $cate->bg_color }}">
                            <a href="{{ route('danh-muc-con', [$rs->slug, $cate->slug])}}">{{ $cate->name }}</a>
                            </div>
                          <span class="toggle-menu"></span>
                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse">           
                          
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
                                                @foreach( $productArr[$cate->id] as $product )
                                                <?php 
                                                    if( $rs->is_hover == 1){                                                        
                                                        $tmp = isset($product['thuoc_tinh']) ? $product['thuoc_tinh'] : "";
                                                        $thuocTinhArr = json_decode($tmp, true);                                                     
                                                    }

                                                ?>
                                                <li class="col-sm-2">
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
                                                        <a class="add_to_cart_button" product-id={{$product['id']}}>Mua</a>
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
            @endforeach



        </div>
    </div><!-- end /.content-page -->
</div><!-- end /.option2 -->
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
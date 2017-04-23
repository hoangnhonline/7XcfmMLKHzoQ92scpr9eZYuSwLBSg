@section('content')
@include('frontend.partials.meta')
<article class="block block-breadcrumb">
	<ul class="breadcrumb">	
		<li><a href="{{ route('home') }}" title="Trở về trang chủ">Trang chủ</a></li>
		<li><a href="{{ route('danh-muc-cha', $rsLoai->slug) }}" title="{{ $rsCate->name }}">{{ $rsLoai->name }}</a></li>
		<li> <a href="{{ route('danh-muc-con', [$rsLoai->slug, $rsCate->slug]) }}" title="{{ $rsCate->name }}">{{ $rsCate->name }}</a>    </li>
		<li class="active"><a href="#">{{ $detail->name }}</a></li>
	</ul>
</article><!-- /block-breadcrumb -->

<section class="block-content">
	<div class="row">
		<div class="col-md-9 col-sm-8 col-xs-12 page-pl0">
			<div class="block-left">
				<div class="product">
					<div class="primary-box row">
						<div class="pb-left-column col-sm-6">
							<div class="product-image">
	                            <div class="bxslider product-img-gallery">
	                            	@foreach( $hinhArr as $hinh )
	                                <div class="item">
	                                    <img src="{{ Helper::showImage($hinh['image_url']) }}" alt="#" />
	                                </div>
	                                @endforeach	                                
	                            </div>
	                            <div class="product-img-thumb">
	                                <div id="gallery_01" class="pro-thumb-img">
	                                	<?php $i = -1; ?>
		                                @foreach( $hinhArr as $hinh )
		                                <?php $i++; ?>
	                                    <div class="item">
	                                        <a href="#" data-slide-index="{{ $i }}">
	                                            <img src="{{ Helper::showImage($hinh['image_url']) }}" alt="#" />
	                                        </a>
	                                    </div>	    
	                                    @endforeach                                
	                                </div>
	                            </div>
							</div>
						</div>
						<div class="pb-right-column col-sm-6">
							<h1 class="product-name">{{ $detail->name }}</h1>
							<div class="rowprice">
								@if($detail->price > 0)
                                  @if( $detail->is_sale == 1)
                                  <strong>{{ number_format($detail->price_sale) }}</strong>
                                  <span>{{ number_format($detail->price) }}</span>
                                  <label>-{{ $detail->sale_percent ? $detail->sale_percent : 
                                                              100-round($detail->price_sale*100/$detail->price) }}%</label>
                                  @else
                                  <strong>{{ number_format($detail->price) }}</strong>
                                  @endif
                                @else
                                <strong>Liên hệ</strong>
                                @endif
                                <span class="status">
								Còn hàng
								</span>
							</div>							
							@if( $detail->khuyen_mai != '')
							<div class="panel panel-default block-panel-products">
								<div class="panel-heading">Khuyến Mãi</div>
								<div class="panel-body">
									<?php echo $detail->khuyen_mai; ?>    									
								</div>
							</div>
							@endif
							<div class="block-buy">								
                                @if( $detail->mo_ta != '')
                                <div class="block block-colpolicy">                                    
                                    <?php echo $detail->mo_ta ; ?>                                    
                                </div>
                                @endif				                
				            </div>
				            <div class="dt-buynow">
				            	<!--<span>Số lượng:</span>
				            	<label>
				            		<span class="down">-</span>
				            		<input type="text" min="1" max="50" maxlength="2" name="txtQuantity" value="1">
				            		<span class="up">+</span>
				            	</label>-->
				            	<button class="buy buynow btn-add-cart-on-product-detail btnMuaDetail" product-id="{{ $detail->id }}" >Chọn Mua</button>
				            	<span class="error hide">Số lượng sản phẩm hiện tại chỉ còn 16 sản phẩm</span>
				            </div>
						</div>
					</div>
				</div><!-- /block-page-news -->
			</div><!-- /block-left -->
			<div class="block-left">
				<div class="block-details-info">
					<p class="block-page-name">Thông tin chi tiết</p>
					<?php echo ($detail->chi_tiet); ?>
					<br>
					@if( !empty( $thuocTinhArr ))
	                  <div id="thongtinkythuat" class="tab-panel">  
	                      <div id="content-thongso">                    
	                     <table class="table table-responsive table-bordered">
	                      @foreach($thuocTinhArr as $loaithuoctinh)
	                        <tr style="background-color:#CCC">
	                          <td colspan="2">{{ $loaithuoctinh['name']}}</td>
	                        </tr>
	                        @if( !empty($loaithuoctinh['child']))
	                          @foreach( $loaithuoctinh['child'] as $thuoctinh)
	                          <tr>
	                            <td width="150">{{ $thuoctinh['name']}}</td>
	                            <td><span>{{ isset($spThuocTinhArr[$thuoctinh['id']]) ?  $spThuocTinhArr[$thuoctinh['id']] : "" }}</span></td>
	                          </tr>
	                          @endforeach
	                        @endif
	                      @endforeach
	                      </table>  
	                      </div>                  
	                  </div>
	                  @endif
				</div>
			</div>
		</div><!-- /col-md-9 col-sm-8 col-xs-12 page-pl0 -->

		<div class="col-md-3 col-sm-4 col-xs-12">
			@if( $lienquanArr->count() > 0)
			<div class="block-right">
				<div class="block-cate">
					<p class="block-cate-title text-center">Sản phẩm liên quan</p>
					<div class="block-productrelate">
						<div class="products">
							@foreach( $lienquanArr as $product)						
							<div class="item">
								<div class="pro-thumb">
									<a href="{{ route('chi-tiet', $product->slug )}}" title="{{ $product->name }}">
										<img src="{{ Helper::showImage( $product->image_url) }}" alt="{{ $product->name }}">
									</a>
								</div>
								<div class="pro-info">
									<h2 class="pro-title"><a href="{{ route('chi-tiet', $product->slug )}}">{{ $product->name }}</a></h2>
									<div class="price-products">
										@if($product->is_sale == 1)
										<p class="pro-price">{{ number_format($product->price_sale) }}</p>
										<p class="pro-sale"><del>{{ number_format($product->price) }}</del> <span>({{ $product->sale_percent ? $product->sale_percent : 
                                                                100-round($product->price_sale*100/$product->price) }}%)</span></p>
										@else
										<p class="pro-price">{{ number_format($product->price) }}</p>
										@endif
										</div>
									@if($rsLoai->is_hover == 1)
	                                <?php $str_sosanh = $detail->id.'-'.$product->sp_id; ?>
	                                <a href="{{ route('so-sanh', ['id' => $str_sosanh]) }}" class="compare"> So sánh chi tiết</a>
	                                @endif									
								</div>
							</div><!-- /item -->				
							@endforeach		
						</div>
					</div>
				</div>
			</div><!-- /block-right -->
			@endif
		</div><!-- /col-md-3 col-sm-4 col-xs-12 -->
	</div>
</section><!-- /block-content -->
@endsection
@section('javascript_page')
<script src="{{ URL::asset('assets/vendor/zoom/jquery.zoom.min.js') }}"></script>
<!-- Js bxslider -->
<script src="{{ URL::asset('assets/vendor/bx-slider/jquery.bxslider.min.js') }}"></script>
<!-- Countdown -->
<script src="{{ URL::asset('assets/vendor/countdown/jquery.countdown.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/updown.js') }}"></script>
<script type="text/javascript">
 $(document).ready(function () {
    $('.bxslider .item').each(function () {
        $(this).zoom();
    });

    $(".bxslider").bxSlider({
    	controls: false,
        pagerCustom: '.pro-thumb-img',
        nextText: '<i class="fa fa-angle-right"></i>',
        prevText: '<i class="fa fa-angle-left"></i>'
    });

    $(".pro-thumb-img").bxSlider({
        slideMargin: 20,
        maxSlides: 4,
        pager: false,
        controls: true,
        slideWidth: 80,
        infiniteLoop: false,
        nextText: '<i class="fa fa-angle-right"></i>',
        prevText: '<i class="fa fa-angle-left"></i>'
    });
    /** COUNT DOWN **/
	$('[data-countdown]').each(function() {
		var $this = $(this), finalDate = $(this).data('countdown');
		$this.countdown(finalDate, function(event) {
			var fomat ='<i class="fa fa-clock-o"></i> <b>Thời gian còn lại:</b> <span>%D ngày,</span> <span>%H</span> : %M<span class="minute"></span> : %S<span class="seconds"></span>';
			$this.html(event.strftime(fomat));
		});
	});
});

</script>
@endsection
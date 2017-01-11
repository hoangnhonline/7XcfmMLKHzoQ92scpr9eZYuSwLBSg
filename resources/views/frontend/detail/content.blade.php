@include('frontend.partials.meta')
@section('content')
<div class="columns-container">
    <div class="container" id="columns">        
        <div class="breadcrumb clearfix noprint">
            <a class="home" href="{{ route('home') }}" title="Trở về trang chủ">Trang chủ</a>
            <span class="navigation-pipe">&nbsp;</span>
            <a href="{{ route('danh-muc-cha', $rsLoai->slug) }}" title="{{ $rsCate->name }}">{{ $rsLoai->name }}</a>
            <span class="navigation-pipe">&nbsp;</span>
            <a href="{{ route('danh-muc-con', [$rsLoai->slug, $rsCate->slug]) }}" title="{{ $rsCate->name }}">{{ $rsCate->name }}</a>            
            <span class="navigation-pipe">&nbsp;</span>
            <span class="navigation_page">{{ $detail->name }}</span>
        </div>
        <!-- ./breadcrumb -->
        
        <div class="page-content">
            <!-- row -->
        <div class="row">
            
            <!-- Center colunm-->
            <div class="col-sm-9" id="product-detail">
                <!-- Product -->
                    <div id="product">
                        <div class="primary-box row">
                            <div class="pb-left-column col-sm-6">
                                <!-- product-imge-->
                                <div class="product-image">
                                    <div class="product-full">
                                        <img id="product-zoom" src="{{ Helper::showImage($hinhArr[0]['image_url']) }}" data-zoom-image="{{ Helper::showImage($hinhArr[0]['image_url']) }}"/>
                                    </div>
                                    @if( !empty( $hinhArr ))
                                    <div class="product-img-thumb" id="gallery_01">
                                        <ul class="owl-carousel" data-items="3" data-nav="true" data-dots="false" data-margin="20" data-loop="true">
                                            @foreach( $hinhArr as $hinh )
                                            <li>
                                                <a href="#" data-image="{{ Helper::showImage($hinh['image_url']) }}" data-zoom-image="{{ Helper::showImage($hinh['image_url']) }}">
                                                    <img id="product-zoom"  src="{{ Helper::showImage($hinh['image_url']) }}" /> 
                                                </a>
                                            </li>
                                            @endforeach                   
                                        </ul>
                                    </div>
                                    @endif
                                </div>
                                <!-- product-imge-->
                            </div>
                            <div class="pb-right-column col-sm-6">
                                <h1 class="product-name">{{ $detail->name }} {{ $detail->name_extend }}</h1>
                                <div class="product-price-group">
                                    @if($detail->price > 0)
                                      @if( $detail->is_sale == 1)
                                      <span class="price">{{ number_format($detail->price_sale) }} đ</span>
                                      <span class="old-price">{{ number_format($detail->price) }} đ</span>
                                      <span class="discount">-{{ $detail->sale_percent ? $detail->sale_percent : 
                                                                  100-round($detail->price_sale*100/$detail->price) }}%</span>
                                      @else
                                      <span class="price">{{ number_format($detail->price) }} đ</span>
                                      @endif
                                    @else
                                    <span class="price">Liên hệ</span>
                                    @endif
                                    
                                </div>
                                @if( $detail->khuyen_mai != '')
                                <div class="promotion-info">
                                    <div class="body-content">
                                        <h3>Khuyến mãi</h3>
                                        <?php echo $detail->khuyen_mai; ?>
                                    </div>
                                </div>
                                @endif
                                @if( $detail->mo_ta != '')
                                <div class="infofollow">
                                    <div class="vez-description" itemprop="description">
                                        <?php echo $detail->mo_ta ; ?>
                                    </div>                          
                                </div>
                                @endif
                                <div class="info-orther">
                                    <!--<p>Mã sản phẩm: #453217907</p>-->
                                    <p>Danh mục: <a href="{{ route('danh-muc-con', [$rsLoai->slug, $rsCate->slug]) }}" class="link">{{ $rsCate->name }}</a></p>
                                </div>
                                <div class="form-action">                                
                                    @if($detail->price > 0 && $detail->so_luong_ton > 0 && $detail->chieu_dai > 0 && $detail->chieu_rong > 0 && $detail->chieu_cao > 0 && $detail->can_nang > 0)
                                    <div class="button-group">
                                        <button type="button" class="btn-add-cart-on-product-detail btnMuaDetail" product-id="{{ $detail->id }}">MUA NGAY</button>
                                    </div>
                                    @else
                                    <div class="button-group">
                                        <button type="button" class="btn-add-cart-on-product-detail">TẠM HẾT HÀNG<span>Liên hệ đặt hàng và nhận giá tốt nhất</span></button>
                                    </div>
                                    @endif
                                </div>
                                
                                <!--<div class="buycall">
                                  <p>
                                      <span class="fa-stack fa-lg">
                                          <i class="fa fa-circle fa-stack-2x" aria-hidden="true"></i>
                                          <i class="fa fa-phone fa-stack-1x" aria-hidden="true"></i>
                                      </span>
                                      Mua online giá sỉ: <strong>1900 636 975</strong> (7:30 - 20:00)
                                  </p>                                  
                                  <p>
                                      <span class="fa-stack fa-lg">
                                          <i class="fa fa-circle fa-stack-2x" aria-hidden="true"></i>
                                          <i class="fa fa-truck fa-stack-1x" aria-hidden="true"></i>
                                      </span>
                                      <span>Miễn phí vận chuyển cho hóa đơn trên 150.000 vnđ</span> 
                                  </p>
                                </div>-->
                                
                                <div class="form-share noprint">
                                    <div class="sendtofriend-print">
                                        <a href="javascript:print();" class="link"><i class="fa fa-print"></i> Print</a>
                                        <a href="#" class="link" onclick="e_friend(); return false;"><i class="fa fa-envelope-o fa-fw"></i>Send to a friend</a>
                                    </div>
                                    <div class="network-share">
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        
                        
                    </div>
                <!-- Product -->
            </div>
            <!-- ./ Center colunm -->
            @if( !empty($phuKienArr) )
            <!-- Left colunm -->
            <div class="column col-sm-3">
                <!-- block best sellers -->
                <div class="best-sell">
                    <h3 class="title-bold">Phụ kiện kèm theo</h3>
                    <ul class="products-block">
                        @foreach( $phuKienArr as $sp_id)
                        @if( isset($productArr[$sp_id]) )
                        <li>
                            <div class="products-block-left">
                                <a href="{{ route('chi-tiet', $productArr[$sp_id]->slug )}}">
                                    <img src="{{ Helper::showImage( $productArr[$sp_id]->image_url) }}" alt="{{ $productArr[$sp_id]->name }} {{ $productArr[$sp_id]->name_extend }}" title="{{ $productArr[$sp_id]->name }} {{ $productArr[$sp_id]->name_extend }}">
                                </a>
                            </div>
                            <div class="products-block-right">
                                <h3 class="product-name">
                                    <a href="{{ route('chi-tiet', $productArr[$sp_id]->slug )}}" title="{{ $productArr[$sp_id]->name }} {{ $productArr[$sp_id]->name_extend }}">{{ $productArr[$sp_id]->name }} {{ $productArr[$sp_id]->name_extend }}</a>
                                </h3>
                                <p class="product-price">{{ $productArr[$sp_id]->is_sale == 1 ? number_format($productArr[$sp_id]->price_sale) : number_format($productArr[$sp_id]->price)}}đ</p>
                                <button type="button" class="add_to_cart_button" href="{{ route('chi-tiet', $productArr[$sp_id]->slug )}}">Mua</button>
                            </div>
                        </li>
                        @endif
                        @endforeach
                    </ul>
                </div>
                <!-- ./block best sellers  -->
            </div>
            <!-- ./left colunm -->
            @else
            <div class="col-sm-3">
                <div class="additional">
                  <div class="detail-benefits-support">
  
                    <label class="detail-lb-loiich clearfix"><strong>Ưu đãi mua online:</strong></label>
                    <div class="left detail-support">                        
                        <span>
                            <i class="fa fa-check-circle"></i>
                            Giao hàng tận nơi
                        </span>
                        <span>
                            <i class="fa fa-check-circle"></i>
                            Tư vấn online
                        </span>
                        <span>
                            <i class="fa fa-check-circle"></i>
                            Bảo hành chính hãng
                        </span>                       
                    </div>
        
                    <div class="left detail-benefits">
                        <div class="detail-benefit-box">
                            <a href="javascript:void(0)" class="detail-call">
                                <strong><i class="fa fa-phone"></i>1900 636 975</strong>
                            </a><br>
                            <a href="skype:ndqtam?chat" class="detail-consulting">
                                <strong><i class="fa fa-comments-o"></i>Chat tư vấn</strong>
                            </a>
                        </div>
                    </div>
                </div>
              </div>
            </div>
            @endif
        </div>
        <!-- ./row-->
        
        <div class="">
        
          <!-- tab product --> 
          @if( $detail->chi_tiet != '')                       
          <div class="product-tab">
              <ul class="nav-tab">
                  <li class="active">
                      <a aria-expanded="false" data-toggle="tab" href="#productdetail">Chi tiết sản phẩm</a>
                  </li>
                  @if( !empty( $thuocTinhArr ))
                  <li>
                      <a aria-expanded="true" data-toggle="tab" href="#thongtinkythuat">Thông số kỹ thuật</a>
                  </li>
                  @endif
              </ul>
              <div class="tab-container">
                  <div id="productdetail" class="tab-panel active product-content-detail content-read-more" style="text-align:justify">
                      <div id="content-chitiet">
                      <?php echo ($detail->chi_tiet); ?>                     
                      </div>
                  </div>
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
          @endif
          <!-- ./tab product -->
            @if( !empty($tuongtuArr) )
          <!-- box product -->
            <div class="page-product-box noprint">
                <h3 class="heading">Sản phẩm tương tự</h3>
                <ul class="product-list owl-carousel" data-dots="false" data-loop="true" data-nav = "true" data-margin = "20" data-autoplayTimeout="1000" data-autoplayHoverPause = "true" data-responsive='{"0":{"items":1},"600":{"items":3},"1000":{"items":5}}'>
                    @foreach( $tuongtuArr as $sp_id)
                        @if( isset($productArr[$sp_id]) )
                        <li>
                        <div class="product-container">
                            <div class="left-block">
                                @if($productArr[$sp_id]->is_sale == 1)
                                <span class="discount">
                                  -{{ $productArr[$sp_id]->sale_percent ? $productArr[$sp_id]->sale_percent : 
                                                                100-round($productArr[$sp_id]->price_sale*100/$productArr[$sp_id]->price) }}%</span>
                                @endif
                                <a href="{{ route('chi-tiet', $productArr[$sp_id]->slug )}}">
                                  <img class="img-responsive" alt="{{ $productArr[$sp_id]->name }} {{ $productArr[$sp_id]->name_extend }}" src="{{ Helper::showImage( $productArr[$sp_id]->image_url) }}" alt="{{ $productArr[$sp_id]->name }} {{ $productArr[$sp_id]->name_extend }}" />
                                </a>
                                <!--<figure class="mask-info">
                                    <span>Màn hình: Retina HD, 5.5 inches</span><span>HĐH: iOS 9</span><span>CPU: A9 64 bit, RAM 2GB</span><span>Camera: 12.0MP, 1 SIM</span><span>Dung lượng pin: 2750 mAh</span>
                                    <div class="btn-action">
                                      <a class="btnorder" href="#">Đặt hàng</a>
                                      <a class="viewdetail" href="#">Chi tiết</a>
                                    </div>
                                </figure>-->
                            </div>
                            <div class="right-block">
                                <h3 class="product-name"><a href="{{ route('chi-tiet', $productArr[$sp_id]->slug )}}">{{ $productArr[$sp_id]->name }} {{ $productArr[$sp_id]->name_extend }}</a></h3>
                                <div class="content_price">
                                    @if( $productArr[$sp_id]->is_sale == 1)
                                    <span class="price product-price">{{ number_format($productArr[$sp_id]->price_sale) }}</span>
                                    <span class="price old-price">{{ number_format($productArr[$sp_id]->price) }}</span>
                                    @else
                                    <span class="price product-price">{{ number_format($productArr[$sp_id]->price) }}</span>                                    
                                    @endif
                                </div>
                                
                                <?php $str_sosanh = $detail->id.'-'.$sp_id; ?>
                                <a href="{{ route('so-sanh', ['id' => $str_sosanh]) }}" class="compare-txt"> So sánh chi tiết</a>
                                
                                <a rel="nofollow" href="javascript:void(0)" class="add_to_cart_button" href="{{ route('chi-tiet', $productArr[$sp_id]->slug )}}">Mua</a>
                            </div>
                        </div>
                    </li> 
                        @endif
                        @endforeach
                                      
                    
                </ul>
            </div>
            <!-- ./box product -->
            @endif
            <!-- box product -->
            @if( $lienquanArr->count() > 0)
            <div class="page-product-box noprint">
                <h3 class="heading">Sản phẩm liên quan</h3>
                <ul class="product-list owl-carousel" data-dots="false" data-loop="true" data-nav = "true" data-margin = "20" data-autoplayTimeout="1000" data-autoplayHoverPause = "true" data-responsive='{"0":{"items":1},"600":{"items":3},"1000":{"items":5}}'>
                     @foreach( $lienquanArr as $product)
                        
                        <li>
                        <div class="product-container">
                            <div class="left-block">
                                @if($product->is_sale == 1)
                                <span class="discount">
                                  -{{ $product->sale_percent ? $product->sale_percent : 
                                                                100-round($product->price_sale*100/$product->price) }}%</span>
                                @endif
                                <a href="{{ route('chi-tiet', $product->slug )}}">
                                  <img class="img-responsive" alt="{{ $product->name }} {{ $product->name_extend }}" src="{{ Helper::showImage( $product->image_url) }}" alt="{{ $product->name }} {{ $product->name_extend }}" />
                                </a>
                                <!--<figure class="mask-info">
                                    <span>Màn hình: Retina HD, 5.5 inches</span><span>HĐH: iOS 9</span><span>CPU: A9 64 bit, RAM 2GB</span><span>Camera: 12.0MP, 1 SIM</span><span>Dung lượng pin: 2750 mAh</span>
                                    <div class="btn-action">
                                      <a class="btnorder" href="#">Đặt hàng</a>
                                      <a class="viewdetail" href="#">Chi tiết</a>
                                    </div>
                                </figure>-->
                            </div>
                            <div class="right-block">
                                <h3 class="product-name"><a href="{{ route('chi-tiet', $product->slug )}}">{{ $product->name }} {{ $product->name_extend }}</a></h3>
                                <div class="content_price">
                                    @if( $product->is_sale == 1)
                                    <span class="price product-price">{{ number_format($product->price_sale) }}</span>
                                    <span class="price old-price">{{ number_format($product->price) }}</span>
                                    @else
                                    <span class="price product-price">{{ number_format($product->price) }}</span>                                    
                                    @endif
                                </div>
                                @if($rsLoai->is_hover == 1)
                                <?php $str_sosanh = $detail->id.'-'.$product->sp_id; ?>
                                <a href="{{ route('so-sanh', ['id' => $str_sosanh]) }}" class="compare-txt"> So sánh chi tiết</a>
                                @endif
                                <a rel="nofollow" href="javascript:void(0)" class="add_to_cart_button" href="{{ route('chi-tiet', $product->slug )}}">Mua</a>
                            </div>
                        </div>
                    </li> 
                        
                    @endforeach
                </ul>
            </div>
            @endif
            <!-- ./box product -->
        
        </div>
                     
        </div><!-- /.page-content -->   
    </div>
</div>
@endsection
@section('javascript_page')
<script type="text/javascript">


</script>
@endsection
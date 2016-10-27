@extends('frontend.layout')

@section('header')
    @include('frontend.partials.main-header')
    @include('frontend.partials.home-menu')
  @endsection

@include('frontend.partials.meta')
@section('content')
<div class="columns-container">

    <div id="columns" class="container">      
    
        <!-- breadcrumb -->
        <div class="breadcrumb clearfix">
          <a class="home" href="{{ route('home') }}" title="Trang chủ">Trang chủ</a>
          <span class="navigation-pipe">&nbsp;</span>
          <span class="navigation_page">Chương trình khuyến mãi</span>
        </div>
        <!-- ./breadcrumb -->  
        
        <!-- row -->
        <div class="row">
            <!-- Center colunm-->
            <div class="center_column col-xs-12">

                <!-- category-product-hot-->
                <div class="category-product-hot"> 
                
                    <!--<div class="cheap-deals">
                      <h2 class="title-big"><i class="fa fa-tag" aria-hidden="true"></i> DUY NHẤT HÔM NAY</h2>
                      <ul class="row">
                          <li class="col-sm-4">
                            <div class="item-deal">
                              <div class="deal-discount triangle">
                                  <p class="deal-discount-text">Giảm</p>
                                  <p class="deal-discount-number">49%</p>
                              </div>
                              <span class="deal-gift"><i class="fa fa-gift"></i></span>
                              <div class="deal-img">
                                <a href="#"><img src="https://vcdn.tikicdn.com/cache/200x200/media/catalog/product/8/7/87801-0-body_2_.jpg" alt=""></a>
                              </div>
                              <div class="deal-info">
                                <p class="deal-name">
                                  <a href="#">Lò Nướng Điện Galanz KWS1010J-H10 - 10 L</a>
                                </p>
                                <p class="deal-remain">
                                    Còn <strong>57</strong> sản phẩm
                                </p>
                                <p class="countdown">
                                    <span class="countdown-amount">12</span> giờ <span class="countdown-amount">48</span> phút <span class="countdown-amount">25</span> giây
                                 </p>
                                <div class="deal-price">
                                    <p><strike>750.000&nbsp;₫</strike></p>
                                    <p class="deal-price-sale">379.000&nbsp;₫</p>
                                </div>
                                <div class="deal-btn">                        
                                  <button type="button" class="btn buy-now-btn add-to-cart">
                                    <i class="fa fa-shopping-cart"></i> <span class="text">Thêm vào giỏ hàng</span>
                                  </button>
                                </div>
                              </div>
                            </div>                            
                          </li>
                          <li class="col-sm-4">
                            <div class="item-deal">
                              <div class="deal-discount triangle">
                                  <p class="deal-discount-text">Giảm</p>
                                  <p class="deal-discount-number">49%</p>
                              </div>
                              <span class="deal-gift"><i class="fa fa-gift"></i></span>
                              
                              <span class="deal-gift"></span>
                              <div class="deal-img">
                                <a href="#"><img src="https://vcdn.tikicdn.com/cache/200x200/media/catalog/product/t/u/tu-thu_3.jpg" alt=""></a>
                              </div>
                              <div class="deal-info">
                                <p class="deal-name">
                                  <a href="#">Lò Nướng Điện Galanz KWS1010J-H10 - 10 L</a>
                                </p>
                                <p class="deal-remain">
                                    Còn <strong>57</strong> sản phẩm
                                </p>
                                <p class="countdown">
                                    <span class="countdown-amount">12</span> giờ <span class="countdown-amount">48</span> phút <span class="countdown-amount">25</span> giây
                                 </p>
                                <div class="deal-price">
                                    <p><strike>750.000&nbsp;₫</strike></p>
                                    <p class="deal-price-sale">379.000&nbsp;₫</p>
                                </div>
                                <div class="deal-btn">                        
                                  <button type="button" class="btn buy-now-btn add-to-cart">
                                    <i class="fa fa-shopping-cart"></i> <span class="text">Thêm vào giỏ hàng</span>
                                  </button>
                                </div>
                              </div>
                            </div>                            
                          </li>
                          <li class="col-sm-4">
                            <div class="item-deal">
                              <div class="deal-discount triangle">
                                  <p class="deal-discount-text">Giảm</p>
                                  <p class="deal-discount-number">49%</p>
                              </div>
                              <span class="deal-gift"><i class="fa fa-gift"></i></span>
                              <div class="deal-img">
                                <a href="#"><img src="https://vcdn.tikicdn.com/cache/200x200/media/catalog/product/8/7/87801-0-body_2_.jpg" alt=""></a>
                              </div>
                              <div class="deal-info">
                                <p class="deal-name">
                                  <a href="#">Lò Nướng Điện Galanz KWS1010J-H10 - 10 L</a>
                                </p>
                                <p class="deal-remain">
                                    Còn <strong>57</strong> sản phẩm
                                </p>
                                <p class="countdown">
                                    <span class="countdown-amount">12</span> giờ <span class="countdown-amount">48</span> phút <span class="countdown-amount">25</span> giây
                                 </p>
                                <div class="deal-price">
                                    <p><strike>750.000&nbsp;₫</strike></p>
                                    <p class="deal-price-sale">379.000&nbsp;₫</p>
                                </div>
                                <div class="deal-btn">                        
                                  <button type="button" class="btn buy-now-btn add-to-cart">
                                    <i class="fa fa-shopping-cart"></i> <span class="text">Thêm vào giỏ hàng</span>
                                  </button>
                                </div>
                              </div>
                            </div>                            
                          </li>
                      </ul>
                    </div><!-- ./broadcast--> 
                    @if( $dataList->count() > 0)
                    <div class="broadcast">
                      <h2 class="title-big"><i class="fa fa-tag" aria-hidden="true"></i> CHƯƠNG TRÌNH KHUYẾN MÃI</h2>
                      <ul class="broadcast-banner row">
                          @foreach( $dataList as $data )
                          <li class="col-sm-6 item-bnr">
                            <div class="thumb-box">
                              <a href="{{ route('detail-event', $data->slug) }}"><img class="lazy" data-original="{{ Helper::showImage($data->small_banner) }}" alt="{{ $data->name }}"></a>
                              <div class="countdown-lastest countdown" data-y="{{ date('Y', strtotime($data->to_date)) }}" data-m="{{ date('m', strtotime($data->to_date)) }}" data-d="{{ date('d', strtotime($data->to_date)) }}" data-h="{{ date('H', strtotime($data->to_date)) }}" data-i="{{ date('i', strtotime($data->to_date)) }}" data-s="{{ date('s', strtotime($data->to_date)) }}"></div>                             
                            </div>
                          </li>
                          @endforeach
                      </ul>
                    </div><!-- ./broadcast-->
                    @endif
                  
                </div>
                <!-- ./category-product-hot-->
            </div>
            <!-- ./ Center colunm -->
        </div>
        <!-- ./row-->
    </div>
</div>
@endsection

@include('frontend.partials.footer')

@section('javascript')

<script type="text/javascript" src="{{ URL::asset('assets/lib/countdown/jquery.plugin.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('assets/lib/countdown/jquery.countdown.js') }}"></script>

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
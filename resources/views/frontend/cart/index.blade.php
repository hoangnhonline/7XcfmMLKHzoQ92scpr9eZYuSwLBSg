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
            <a href="{{ route('gio-hang') }}" title="Giỏ hàng">Giỏ hàng</a>
        </div>
        <!-- ./breadcrumb -->
        <div class="page-content container">
          <!-- row -->
          <div class="cart-page row">

            <!-- Center colunm-->
            <div class="col-lg-8 col-md-12 cart-col-1">

                <div class="row title visible-md-block visible-lg-block">
                    <div class="col-lg-9 col-md-9">
                        <h5>Sản phẩm trong giỏ hàng</h5>
                        <span class="badge">{{ array_sum($getlistProduct) }}</span>
                    </div>
                    <div class="col-lg-1 col-md-1"><h6>Giá mua</h6></div>
                    <div class="col-lg-1 col-md-1"><h6>Số lượng</h6></div>      
                    <div class="col-lg-1 col-md-1 end"><h6>Thành tiền</h6></div>
                </div>
                <?php
                  $total = 0;
                ?>

                <form id="shopping-cart" method="POST" action="{{ route('shipping-step-1') }}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  @if( $arrProductInfo->count() > 0)
                  @foreach($arrProductInfo as $product)
                  
                  <?php $price = $product->is_sale ? $product->price_sale : $product->price; ?>
                  <div class="row shopping-cart-item">
                    <div class="col-lg-3 col-md-2 col-xs-3">
                      <p class="image">
                      <!-- <span class="sale">-47%</span>  -->
                      <img class="img-responsive lazy" data-original="{{ Helper::showImage($product['image_url']) }}">
                      </p>
                    </div>
                    <div class="col-lg-6 col-md-6 c2 col-xs-9">
                      <p class="name">
                      <a href="" target="_blank">{{ $product->name }}</a>
                      </p>
                      <div class="row visible-xs-block visible-sm-block">
                        <div class="col-xs-6 col-sm-8">
                          @if($product->is_sale)
                          <p class="price">{{ number_format($price) }}&nbsp;₫</p>
                          @else
                          <p class="price">{{ number_format($price) }}&nbsp;₫</p>
                          @endif
                        </div>
                        <div class="col-xs-6 col-sm-4 cart-col-3 quantity-block">
                           <select data-product-id="{{$product->id}}" class="form-control js-quantity-select quantity js-quantity-product">
                            @for($i = 1; $i <= 50; $i++ )
                            <option value="{{$i}}"
                            @if ($i == $getlistProduct[$product->id])
                              selected
                            @endif
                            > {{$i}}
                              @if($i == 50) + @endif
                            </option>
                            @endfor
                          </select>
                        </div>
                      </div>
                      <p class="action">
                        <a class="btn btn-link btn-item-delete" data-product-id="{{ $product->id }}"> Xóa </a>                        
                      </p>
                    </div>
                    <div class="col-lg-1 col-md-1 visible-md-block visible-lg-block">
                      
                      @if($product->is_sale)
                      <p class="price">{{number_format($price)}}&nbsp;₫</p>
                      @else
                      <p class="price">{{number_format($price)}}&nbsp;₫</p>
                      @endif


                    </div>
                    <div class="col-lg-1 col-md-1 visible-md-block visible-lg-block quantity-block">
                      <!-- If product qty < 10, show select options -->
                      <select data-product-id="{{$product->id}}" class="form-control js-quantity-select quantity js-quantity-product">
                        @for($i = 1; $i <= 50; $i++ )
                        <option value="{{$i}}"
                        @if ($i == $getlistProduct[$product->id])
                          selected
                        @endif
                        > {{$i}}
                          @if($i == 50) + @endif
                        </option>
                        @endfor
                      </select>
                    </div>                   
                    <div class="col-lg-1 col-md-1 visible-md-block visible-lg-block end">
                      <p class="price3">{{number_format($getlistProduct[$product->id]*$price)}}&nbsp;₫</p>
                    </div>
                  </div><!-- end /.shopping-cart-item -->
                  <?php $total += $getlistProduct[$product->id]*($price); ?>
                  @endforeach
                  @else
                  <p style="text-align:center;margin:15px">Chưa có sản phẩm nào trong giỏ hàng của bạn.</p>
                  @endif
                </form>

                <div class="row last" style="margin-top:10px">
                    <div class="col-lg-12 col-md-12">
                        <div class="all-new">
                            <a class="btn btn-default btn-gradient" href="{{ route('home') }}" style="margin-bottom:2px"><i class="fa fa-angle-left"></i> Tiếp tục mua sắm</a>
                            @if(!empty(Session::get('products')))
                            <a class="btn btn-default btn-gradient" style="margin-bottom:2px" onclick="return confirm('Xóa tất cả sản phẩm trong giỏ hàng?');" href="{{ route('xoa-gio-hang') }}"><i class="fa fa-trash-o"></i> Xóa toàn bộ</a>
                            @endif
                        </div>
                    </div>
                </div>

            </div>
            <!-- ./ Center colunm -->

            <!-- Left colunm -->
            <div class="col-lg-4 col-md-12 cart-col-2">
                <div id="right-affix" class="affix-top">
                  <div class="visible-lg-block">
                    <div class="panel panel-default fee">
                      <div class="panel-body">
                        <p class="total">Tổng cộng: <span>{{ number_format($total) }}&nbsp;₫</span></p>
                        <p class="total2">Thành tiền: <span>{{ number_format($total) }}&nbsp;₫ </span></p>
                        @if($total > 0)
                        <p class="text-right"> <i>(Đã bao gồm VAT)</i> </p>
                        @endif
                      </div>
                    </div>
                   @if( $arrProductInfo->count() > 0)                    
                    
                    <button type="button" class="btn btn-large btn-block btn-default btn-checkout"> ĐẶT HÀNG </button>
                    @endif                    
                  </div>
                  <div class="visible-xs-block">
                    <div class="panel panel-default fee">
                      <div class="panel-body">
                        <p class="total">Tổng cộng: <span>{{ number_format($total) }}&nbsp;₫</span></p>
                        <p class="total2">Thành tiền: <span>{{ number_format($total) }}&nbsp;₫ </span></p>
                        @if( $total > 0)  
                        <p class="text-right"> <i>(Đã bao gồm VAT)</i> </p>
                        @endif
                      </div>
                    </div>
                  </div>
                  @if( $arrProductInfo->count() > 0)
                  <div class="visible-xs-block">
                    <button type="button" class="btn btn-large btn-block btn-default btn-checkout"> ĐẶT HÀNG </button>
                  </div>
                  @endif
                </div>
            </div>
            <!-- ./left colunm -->
        </div><!-- ./row-->
        </div><!-- /.page-content -->
    </div>
</div>
<style type="text/css">
  .checkbox-inline, .radio-inline{
    padding-left: 0px !important;
  }
</style>
@endsection
@include('frontend.partials.footer')
@section('javascript')
   <script type="text/javascript">
    $(document).ready(function() {
      $('#add_service').on('ifChecked', function(event){
          setServicesFee(1);
      });
      $('#add_service').on('ifUnchecked', function(event){
          setServicesFee(0);
      });
      $('.btn-checkout').click(function() {
        $('form#shopping-cart').submit();
        //location.href = "{{ route('shipping-step-1') }}";
      });

      $('.js-quantity-product').change(function() {
        var quantity = $(this).val();
        var id = $(this).attr('data-product-id');
        update_product_quantity(id, quantity);
      });

      $('.btn-item-delete').click(function() {
        var id = $(this).attr('data-product-id');
        update_product_quantity(id, 0);
      });


      
      function update_product_quantity(id, quantity) {
        $.ajax({
          url: "{{route('update-sanpham')}}",
          method: "POST",
          data : {
            id: id,
            quantity : quantity
          },
          success : function(data){
            location.reload();
          },
          error : function(e) {
            alert( JSON.stringify(e));
          }
        });
      }
    })
  </script>
@endsection









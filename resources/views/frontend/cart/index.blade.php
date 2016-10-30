@extends('frontend.layout')
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
            <a href="" title="Giỏ hàng">Giỏ hàng</a>
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
                        <span class="badge">{{array_sum($getlistProduct)}}</span>
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
                  <?php 
                  $phi_dich_vu = DB::table('loai_sp')->where('id', $product->loai_id)->first()->phi_dich_vu;
                  ?>
                  <div class="row shopping-cart-item">
                    <div class="col-lg-3 col-md-2 col-xs-3">
                      <p class="image">
                      <!-- <span class="sale">-47%</span>  -->
                      <img class="img-responsive lazy" data-original="{{ Helper::showImage($product['image_url']) }}">
                      </p>
                    </div>
                    <div class="col-lg-6 col-md-7 c2 col-xs-9">
                      <p class="name">
                      <a href="" target="_blank">{{$product->name}}</a>
                      </p>
                      <p class="action">
                        <a class="btn btn-link btn-item-delete" data-product-id="{{$product->id}}"> Xóa </a>
                        @if($phi_dich_vu > 0)
                         <p class="mb05"><label class="checkbox-inline"><input type="checkbox" name="chon_dich_vu[{{$product->id}}]" value="1"> Giao hàng, lắp đặt và hướng dẫn sử dụng</label></p>
                        <p style="text-align:center">
                        <input type="hidden" name="phi_dich_vu[{{$product->id}}]" value="{{ $phi_dich_vu }}">
                          <select name="so_dich_vu[{{$product->id}}]" class="form-control quantity-product" style="display:inline-block; padding: 3px; height: 25px; width: auto;">
                            @for($i = 1; $i <= $getlistProduct[$product->id]; $i++ )
                            <option value="{{$i}}"              
                            > {{$i}}
                              @if($i == 50) + @endif
                            </option>
                            @endfor
                          </select>
                          <span>x</span>
                          <label><strong class="text-bold">{{ number_format($phi_dich_vu) }} vnđ</strong></label>@endif                          
                        </p>
                      </p>
                    </div>
                    <div class="col-lg-1 col-md-1 visible-md-block visible-lg-block">
                      <?php $price = $product->is_sale ? $product->price_sale : $product->price; ?>
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
                            <a class="btn btn-default btn-gradient" href="/"><i class="fa fa-angle-left"></i> Tiếp tục mua sắm</a>
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
                        <p class="total">Tổng cộng: <span>{{number_format($total)}}&nbsp;₫</span></p>
                        <p class="total2">Thành tiền: <span>{{number_format($total)}}&nbsp;₫ </span></p>
                        <p class="text-right"> <i>(Đã bao gồm VAT)</i> </p>
                      </div>
                    </div>
                   @if( $arrProductInfo->count() > 0)                    
                    
                    <button type="button" class="btn btn-large btn-block btn-default btn-checkout"> TIẾN HÀNH ĐẶT HÀNG </button>
                    @endif                    
                  </div>
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









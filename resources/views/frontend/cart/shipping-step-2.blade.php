@extends('frontend.layout')
@section('header')
    @include('frontend.partials.main-header')
    @include('frontend.partials.home-menu')
  @endsection
@include('frontend.partials.meta')
@section('content')
<?php 
$vangLaiArr = Session::get('vanglai');
?>
<!-- page wapper-->
<div class="columns-container">
    <div class="container" id="columns">
        <!-- breadcrumb -->
        <div class="breadcrumb clearfix">
            <a class="home" href="{{ route('home') }}" title="Trở về trang chủ">Trang chủ</a>
            <span class="navigation-pipe">&nbsp;</span>
            <a href="#" title="Giỏ hàng">Giỏ hàng</a>
        </div>
        <!-- ./breadcrumb -->
        <div class="page-content">
          <!-- row -->
          <div class="shipping-address-page">

                <div class="shipping-header">
                  <div class="row bs-wizard">
                    <div class="col-lg-4 col-md-4 col-xs-4 col-sm-4 bs-wizard-step complete">
                      <div class="text-center bs-wizard-stepnum"> <span>Đăng Nhập</span> </div>
                      <div class="progress">
                        <div class="progress-bar"></div>
                      </div>
                      <span class="bs-wizard-dot">1</span> </div>
                    <div class="col-lg-4 col-md-4 col-xs-4 col-sm-4 bs-wizard-step active">
                      <div class="text-center bs-wizard-stepnum"> <span class="hidden-xs">Địa Chỉ Giao Hàng</span> <span class="visible-xs-inline-block">Địa Chỉ</span> </div>
                      <div class="progress">
                        <div class="progress-bar"></div>
                      </div>
                      <span class="bs-wizard-dot">2</span> </div>
                    <div class="col-lg-4 col-md-4 col-xs-4 col-sm-4 bs-wizard-step disabled">
                      <div class="text-center bs-wizard-stepnum"> <span class="hidden-xs">Thanh Toán &amp; Đặt Mua</span> <span class="visible-xs-inline-block">Thanh Toán</span> </div>
                      <div class="progress">
                        <div class="progress-bar"></div>
                      </div>
                      <span class="bs-wizard-dot">3</span> </div>
                  </div>
                </div>

                <div class="row visible-lg-block">
                  <div class="col-lg-12">
                    <h3 style="font-size:15px">2. Địa chỉ giao hàng</h3>
                  </div>
                </div>

                <div class="row row-style-2">
                  <div class="col-lg-8 has-padding">
                    <div class="panel panel-default address-list">
                      <div class="panel-body">
                        <form id="form-address" method="post" action="">
                          <h5 class="visible-lg-block"> Chọn địa chỉ giao hàng có sẵn bên dưới: </h5>                          
                          <div class="row row-address-list">
                            <div class="col-lg-6 col-md-6 col-sm-6 item">
                              <div class="panel panel-default address-item is-default">
                                <div class="panel-body">
                                  @if($is_vanglai == 0)
                                  <p class="name">{{ $customer->full_name }}</p>
                                  <p class="address">
                                      @if( isset( $customer->tinh->name ))
                                        {{ $customer->tinh->name }},
                                      @endif
                                      @if( isset( $customer->huyen->name ) )
                                        {{ $customer->huyen->name }},
                                      @endif
                                      @if( isset($customer->xa->name ))
                                        {{ $customer->xa->name }},
                                      @endif
                                      {{$customer->address}}
                                  </p>
                                  <p class="phone">Điện thoại: {{ $customer->phone }}</p>
                                  @else
                                  <p class="name">{{ $vangLaiArr['full_name'] }}</p>
                                  <p class="address">
                                      @if( isset( $vangLaiArr['city_id'] ))
                                        {{ Helper::getName($vangLaiArr['city_id'], 'city') }},
                                      @endif
                                      @if( isset( $vangLaiArr['district_id'] ))
                                        {{ Helper::getName($vangLaiArr['district_id'], 'district') }},
                                      @endif
                                       @if( isset( $vangLaiArr['ward_id'] ))
                                        {{ Helper::getName($vangLaiArr['ward_id'], 'ward') }},
                                      @endif
                                      {{  $vangLaiArr['address'] }}
                                  </p>
                                  <p class="phone">Điện thoại: {{ isset( $vangLaiArr['phone'] ) ?  $vangLaiArr['phone'] : $customer->phone }}</p>
                                  @endif
                                  <p class="action">
                                    <button type="button" class="btn btn-default btn-custom1 saving-address is-red" onclick="location.href='{{route('shipping-step-3')}}'"> Giao đến địa chỉ này </button>
                                    <button type="button" class="btn btn-default btn-custom1 edit-address">Sửa</button>
                                  </p>                                  
                                </div><!--panel-body-->
                            </div><!--panel panel-default address-item is-default-->
                          </div><!--col-lg-6 col-md-6 col-sm-6 item-->
                          </div><!--row row-address-list-->
                        </form>
                      </div>
                    </div>
                    <div class="panel panel-default address-form is-edit">
                      <div class="panel-heading hidden-lg">Cập nhật địa chỉ giao hàng mới</div>
                      <div class="panel-body">
                        <form class="form-horizontal bv-form" role="form" id="address-info" novalidate>
                          <button type="submit" class="bv-hidden-submit" style="width: 0px; height: 0px;"></button>
                          <div class="form-group row">
                            <label for="full_name" class="col-lg-4 control-label visible-lg-block">Họ tên </label>
                            <div class="col-lg-8 input-wrap has-feedback">
                                <input type="text" name="full_name" class="form-control address" id="full_name" value="{{ $is_vanglai == 1 && isset($vangLaiArr['full_name']) ? $vangLaiArr['full_name'] : $customer->full_name }}" placeholder="Nhập họ tên" data-bv-field="full_name">
                                <small class="help-block" data-bv-validator="notEmpty" data-bv-for="telephone" data-bv-result="NOT_VALIDATED" style="display: none;">Vui lòng nhập Họ và tên</small>
                           </div>
                          </div>
                          <div class="form-group row">
                            <label for="telephone" class="col-lg-4 control-label visible-lg-block">Điện thoại di động</label>
                            <div class="col-lg-8 input-wrap has-feedback">
                              <input type="tel" name="telephone" class="form-control address" id="telephone" value="{{ $is_vanglai == 1 && isset($vangLaiArr['phone']) ? $vangLaiArr['phone'] : $customer->phone}}" placeholder="Nhập số điện thoại" data-bv-field="telephone">
                              <small class="help-block" data-bv-validator="notEmpty" data-bv-for="telephone" data-bv-result="NOT_VALIDATED" style="display: none;">Vui lòng nhập Số điện thoại từ 9 - 15 chữ số</small></div>
                          </div>
                          @if($is_vanglai == 1)
                          <div class="form-group row">
                            <label for="telephone" class="col-lg-4 control-label visible-lg-block">Email</label>
                            <div class="col-lg-8 input-wrap has-feedback">
                              <input type="email" name="email" class="form-control address" id="email_form" value="{{ $is_vanglai == 1 && isset($vangLaiArr['email']) ? $vangLaiArr['email'] : $customer->email}}" placeholder="Nhập email" data-bv-field="email">
                              <small class="help-block" data-bv-validator="notEmpty" data-bv-for="email_form" data-bv-result="NOT_VALIDATED" style="display: none;">Vui lòng nhập email hợp lệ</small></div>
                          </div>
                          @endif
                          <div class="form-group row">
                            <label for="city_id" class="col-lg-4 control-label visible-lg-block">Tỉnh/Thành phố</label>
                            <div class="col-lg-8 input-wrap has-feedback">
                              <select name="city_id" class="form-control address" id="city_id" data-bv-field="city_id">
                                <option value="">Chọn Tỉnh/Thành phố</option>
                                @foreach($listCity as $city)
                                  <option value="{{$city->id}}"
                                  @if(($customer->city_id == $city->id) || ($is_vanglai == 1 && isset($vangLaiArr['city_id']) && $vangLaiArr['city_id'] == $city->id))
                                  selected
                                  @endif
                                  >{{$city->name}}</option>
                                @endforeach
                              </select>
                              <small class="help-block" data-bv-validator="notEmpty" data-bv-for="city_id" data-bv-result="NOT_VALIDATED" style="display: none;">Vui lòng chọn Tỉnh/Thành phố</small></div>
                          </div>
                          <div class="form-group row">
                            <label for="district_id" class="col-lg-4 control-label visible-lg-block">Quận/Huyện</label>
                            <div class="col-lg-8 input-wrap has-feedback">
                              <select name="district_id" class="form-control address" id="district_id">
                                <option value="0">Chọn Quận/Huyện</option>                            
                              </select>
                               <small class="help-block" data-bv-validator="notEmpty" data-bv-for="district_id" data-bv-result="NOT_VALIDATED" style="display: none;">Vui lòng chọn Quận/Huyện</small></div>
                          </div>
                          <div class="form-group row">
                            <label for="ward_id" class="col-lg-4 control-label visible-lg-block">Phường/Xã</label>
                            <div class="col-lg-8 input-wrap has-feedback">
                              <select name="ward_id" class="form-control address" id="ward_id">
                                <option value="0">Chọn Phường/Xã</option>
                              </select>
                               <small class="help-block" data-bv-validator="notEmpty" data-bv-for="ward_id" data-bv-result="NOT_VALIDATED" style="display: none;">Vui lòng chọn Phường/Xã</small></div>
                          </div>
                          <div class="form-group row">
                            <label for="street" class="col-lg-4 control-label visible-lg-block">Địa chỉ</label>
                            <div class="col-lg-8 input-wrap has-feedback">
                              <textarea name="street" class="form-control address" id="street" placeholder="Ví dụ: 52, đường Trần Hưng Đạo" data-bv-field="street" style="height:50px">{{ $is_vanglai == 1 && isset($vangLaiArr['address']) ? $vangLaiArr['address'] : $customer->address }}</textarea>
                               <span class="help-block"></span> <small class="help-block" data-bv-validator="notEmpty" data-bv-for="street" data-bv-result="NOT_VALIDATED" style="display: none;">Vui lòng nhập Địa chỉ</small></div>
                          </div>
                          <div class="form-group row form-group-radio group-radio-k-address">
                            <label class="col-lg-4 control-label visible-lg-block"></label>
                            <div class="col-lg-8 input-wrap"> <span style="font-size: 11px;font-style: italic;">Để nhận hàng thuận tiện hơn, bạn vui lòng cho icho.vn biết loại địa chỉ.</span> </div>
                          </div>
                          <div class="form-group row form-group-radio group-radio-k-address">
                            <label class="col-lg-4 control-label visible-lg-block">Loại địa chỉ</label>
                            <div class="col-lg-8 input-wrap has-feedback">
                                <label class="checkbox-inline">
                                  <input type="radio" name="delivery_address_type" value="0" data-bv-field="delivery_address_type"
                                  @if($customer->address_type == 0 || ($is_vanglai == 1 && isset($vangLaiArr['address_type']) && $vangLaiArr['address_type'] == 0))
                                  checked
                                  @endif
                                  >
                                   Nhà riêng / Chung cư
                                </label>

                                <label class="checkbox-inline">
                                  <input type="radio" name="delivery_address_type" value="1" data-bv-field="delivery_address_type"
                                  @if($customer->address_type == 1 || ($is_vanglai == 1 && isset($vangLaiArr['address_type']) && $vangLaiArr['address_type'] == 1))
                                  checked
                                  @endif
                                  >
                                   Cơ quan / Công ty
                                </label>
                            </div>
                          </div>
                          <div class="form-group row end">
                            <div class="col-lg-offset-4 col-lg-8">
                              @if(!Session::has('new-register'))
                              <button type="button" class="btn btn-default btn-custom2 visible-lg-inline-block js-hide">Hủy bỏ</button>
                              @endif
                              <div id="btn-address" class="btn btn-primary btn-custom3" value="update">{{ $is_vanglai == 1 ? "Tiếp tục" : "Cập nhật"}}</div>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                    <div class="shiping_plan"></div>
                  </div>
                  <div class="col-lg-4">
                    <div id="panel-cart">
                      <div class="panel panel-default cart">
                        <div class="panel-body">
                          <div class="order"> <span class="title">Đơn Hàng</span> <span class="title">( {{ array_sum($getlistProduct) }} SP )</span> <a href="{{route('gio-hang')}}" class="btn btn-default btn-custom1">Sửa</a> </div>
                          <div class="product">
                            <?php $total = 0; ?>
                            @foreach($arrProductInfo as $product)
                            <div class="item">
                              <p class="title"><strong>{{ $getlistProduct[$product->id] }} x</strong><a href="" target="_blank">{{$product->name}}</a></p>
                              <p class="price"> <span>
                              <?php 
                              if( $product->price_sale > 0 && $product->is_sale == 1){
                                echo number_format($getlistProduct[$product->id] * $product->price_sale);  
                              }else{
                                echo number_format($getlistProduct[$product->id] * $product->price);
                              }
                              ?>&nbsp;₫ </span> </p>
                            </div>
                            <?php                             
                            if( $product->price_sale > 0 && $product->is_sale == 1){
                              $total = $total += $getlistProduct[$product->id]*($product->price_sale);  
                            }else{
                              $total = $total += $getlistProduct[$product->id]*($product->price);                             
                            }
                            ?>
                            @endforeach
                          </div>
                          <p class="total"> Tạm Tính: <span>{{ number_format($total) }}&nbsp;₫</span> </p>
                          <p class="shipping"> Phí vận chuyển: <span>Chưa có</span> </p>
                          <p class="total2"> Thành tiền: <span>{{number_format( $total )}}&nbsp;₫ </span> </p>
                          <p class="text-right"> <i>(Đã bao gồm VAT)</i> </p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

           </div><!-- /.shipping-address-page -->

        </div><!-- /.page-content -->
    </div>
</div>
@endsection
@include('frontend.partials.footer')
@section('javascript')
   <script type="text/javascript">
    $(document).ready(function() {

      var customer_district_id = '{{ $is_vanglai== 1 && isset($vangLaiArr['district_id']) ? $vangLaiArr['district_id'] : $customer->district_id }}';
      var customer_ward_id = '{{ $is_vanglai== 1 && isset($vangLaiArr['ward_id']) ? $vangLaiArr['ward_id'] :  $customer->ward_id }}';

      $('.edit-address').click(function() {
        $('.address-form').show();
      });
      @if($is_vanglai == 0)

        @if(Session::has('new-register') || Session::has('register') ||
           !$customer->full_name ||
           !$customer->email ||
           !$customer->address ||
           !$customer->phone ||
           !$customer->district_id ||
           !$customer->city_id ||
           !$customer->ward_id
          )        
          $('.address-form').show();
          $('#form-address').hide();
        @endif
      @else
          @if(empty($vangLaiArr) ||
             !$vangLaiArr['full_name'] ||
             (!$vangLaiArr['email'] && !$vangLaiArr['phone']) ||
             !$vangLaiArr['address'] ||     
             !$vangLaiArr['district_id'] ||
             !$vangLaiArr['city_id'] ||
             !$vangLaiArr['ward_id']
            )
            $('.address-form').show();
            $('#form-address').hide();
          @endif      
      @endif

      $('#btn-address').click(function() {
        $(this).attr('disabled', '');
        validateData();
      });

      function validateData() {
        var error = [];

        var full_name = $('#full_name').val();
        var city_id   = $('#city_id').val();
        var district_id   = +$('#district_id').val();
        var ward_id   = +$('#ward_id').val();
        var street    = $('#street').val();
        var telephone = $('#telephone').val();
        var email = $('#email_form').val();

        if(!full_name.length)
        {
          error.push('full_name');
        }

        if(!city_id)
        {
          error.push('city_id');
        }

        if(!district_id)
        {
          error.push('district_id');
        }

        if(!ward_id)
        {
          error.push('ward_id');
        }

        if(!street)
        {
          error.push('street');
        }
        //alert(validateEmail(email));
        if(!(/\d{8,15}$/g.test(telephone)) && !email && validateEmail(email) == false) {
          error.push('telephone');
        }
        if(email && validateEmail(email)==false){    
         error.push('email_form'); 
        }

        if((!telephone && !email)){
          error.push('email_form'); 
        }


        var list = ['full_name', 'city_id', 'district_id', 'ward_id', 'street', 'telephone'
        @if($is_vanglai == 1)
        , 'email_form'
        @endif
        ];

        for( i in list ) {
            $('#' + list[i]).next().hide();
            $('#' + list[i]).parent().removeClass('has-error');
        }

        if(error.length) {
          for( i in error ) {
            $('#' + error[i]).parent().addClass('has-error');
            $('#' + error[i]).next().show();
          }

          $('#btn-address').removeAttr('disabled');
        } else {
          $.ajax({
            url: "{{ route('update-customer') }}",
            method: "POST",
            data : {
              full_name : full_name,
              city_id : city_id,
              district_id : district_id,
              ward_id : ward_id,
              address : street,
              phone : telephone,
              @if($is_vanglai==1)
              email : email,
              vang_lai : 1,
              @endif
              address_type : $('input[name=delivery_address_type]:checked').val()
            },
            success : function(data){
              location.reload();
            }
          });
        }
      }

      $('.js-hide').click(function() {
        $('.address-form').hide();
      });

      $('#city_id').change(function() {
        customer_district_id = 0;
        getDistrict($(this).val());
      });
      if( $('#city_id').val() > 0){
        getDistrict($('#city_id').val());
      }

      $('#district_id').change(function() {       
        customer_ward_id = 0;
        getWard($(this).val());
      });
      if( $('#district_id').val() > 0){
        getWard($('#district_id').val());
      }
      function validateEmail(email) {
          var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
          return re.test(email);
      }
      function getDistrict(city_id) {

        if(!city_id) {
          $('#district_id').empty();
          $('#district_id').append('<option value="0">Chọn Quận/Huyện</option>');
          return;
        }

        $.ajax({
          url: "{{ route('get-district') }}",
          method: "POST",
          data : {
            id: city_id
          },
          success : function(list_ward){
            $('#district_id').empty();
            $('#district_id').append('<option value="0">Chọn Quận/Huyện</option>');

            for(i in list_ward) {
              $('#district_id').append('<option value="'+list_ward[i].id+'">'+list_ward[i].name+'</option>');
            }
            if( customer_district_id > 0){
              $('#district_id').val(customer_district_id);
              getWard(customer_district_id);
            }

          }
        });
      }
      function getWard(district_id) {

        if(!district_id) {
          $('#ward_id').html('<option value="0">Chọn Phường/Xã</option>');
          return;
        }

        $.ajax({
          url: "{{route('get-ward')}}",
          method: "POST",
          data : {
            id: district_id
          },
          success : function(list_ward){
            $('#ward_id').empty();
            $('#ward_id').append('<option value="0">Chọn Phường/Xã</option>');

            for(i in list_ward) {
              $('#ward_id').append('<option value="'+list_ward[i].id+'">'+list_ward[i].name+'</option>');
            }            
            $('#ward_id').val(customer_ward_id);

          }
        });
      }

    });
  </script>
@endsection









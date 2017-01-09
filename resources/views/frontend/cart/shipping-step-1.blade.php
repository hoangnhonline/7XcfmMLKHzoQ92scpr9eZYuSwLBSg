@extends('frontend.layout')
@section('header')
    @include('frontend.partials.main-header')
    @include('frontend.partials.home-menu')
  @endsection
@include('frontend.partials.meta')
@section('content')

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
                    <div class="col-lg-4 col-md-4 col-xs-4 col-sm-4 bs-wizard-step active">
                      <div class="text-center bs-wizard-stepnum"> <span>Đăng Nhập</span> </div>
                      <div class="progress">
                        <div class="progress-bar"></div>
                      </div>
                      <span class="bs-wizard-dot">1</span> </div>
                    <div class="col-lg-4 col-md-4 col-xs-4 col-sm-4 bs-wizard-step disabled">
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
                    <h3 style="font-size:15px">1. Khách hàng mới / Đăng nhập</h3>
                  </div>
                </div>

                <div class="row row-style-2">
                  <div class="col-lg-8 has-padding">
                    <div class="panel panel-default payment">
                      <div class="panel-body">
                        <div class="payment-top hidden-lg">
                          <p class="text">Thanh toán đơn hàng trong chỉ một bước với:</p>
                          <div class="form-group last"> <a class="btn btn-block btn-social btn-facebook user-name-loginfb login-by-facebook-popup" > <i class="fa fa-facebook"></i> <span>Đăng nhập bằng</span><span> Facebook</span> </a> </div>
                        </div>

                        <div class="payment-left">
                          <div class="form-group-row row row-style-3">
                            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-2">
                              <label>
                                  <input type="radio" name="radioChooseMethodLogin" id="radioIsUserIcho" value="1" checked>
                              </label>
                            </div>
                            <div class="col-lg-5 col-md-11 col-sm-11 col-xs-10">
                              <label for="radioIsUserIcho" class="control-label is-large">Tôi là thành viên iCho.vn</label>
                            </div>
                          </div>
                          <div class="form-group-row row row-style-3">
                            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-2">
                              <label>
                                  <input type="radio" name="radioChooseMethodLogin" id="radioIsNotUserIcho" value="0">
                              </label>
                            </div>
                            <div class="col-lg-5 col-md-11 col-sm-11 col-xs-10">
                              <label for="radioIsNotUserIcho" class="control-label is-large">Tôi là khách hàng mới</label>
                            </div>
                          </div>

                          <div class="form-group-row row row-style-3 end is-no-hover">
                            <div class="col-lg-5 col-lg-offset-1 col-md-12 col-sm-12 col-xs-12">
                               <button style="display:none;width:100%;margin-bottom:10px" type="button" class="btn btn-default" id="btnVangLai">Thanh toán như khách vãng lai</button>
                              <div class="panel panel-default payment-sub">
                                <div class="panel-body">
                                  <!-- login widget -->
                                 
                                  <div id="login-form">

                                    <form class="content bv-form" method="POST"
                                    action="{{route('auth-login')}}" novalidate>
                                      {{csrf_field()}}
                                      @if(Session::has('error'))
                                        <div class="alert alert-danger">
                                            {{ Session::get('error') }}
                                        </div>
                                      @endif
                                      <button type="submit" class="bv-hidden-submit" style="display: none; width: 0px; height: 0px;"></button>
                                      <input type="hidden" name="checkout_step" value="1">
                                      <div class="form-group has-feedback" id="popup_login">
                                        <label class="control-label">Email</label>
                                        <input id="login_email" type="text" class="form-control login" name="email" placeholder="Nhập Email" data-bv-field="email">
                                        <small class="help-block" data-bv-validator="notEmpty" data-bv-for="email" data-bv-result="INVALID" style="display:none">Vui lòng nhập Email</small><small class="help-block" data-bv-validator="regexp" data-bv-for="email" data-bv-result="VALID" style="display: none;">Email không hợp lệ</small></div>
                                      <div class="form-group has-feedback" id="popup_password">
                                        <label class="control-label">Mật khẩu</label>
                                        <input type="password" id="login_password" class="form-control login" name="password" placeholder="Nhập mật khẩu" autocomplete="off" data-bv-field="password">
                                       <small class="help-block" data-bv-validator="notEmpty" data-bv-for="password" data-bv-result="NOT_VALIDATED" style="display: none;">Vui lòng nhập Mật khẩu</small></div>
                                      <div class="login-ajax-captcha" style="display:none">
                                        <div id="login-checkout-recaptcha"></div>
                                        <span class="help-block ajax-message"></span> </div>
                                      <div class="form-group" id="error_captcha" style="margin-bottom: 15px;color:red;font-style:italic"> <span class="help-block ajax-message"></span> </div>
                                      <div class="form-group last">
                                        {{-- <p class="reset">Quên mật khẩu? Khôi phục mật khẩu <a data-toggle="modal" data-target="#reset-password-form" href="javascript:(void);" class="link">tại đây</a></p> --}}
                                        <button type="submit" id="login_popup_submit" class="btn btn-danger btn-block">Đăng nhập</button>
                                      </div>
                                    </form>
                                  </div>
                                  <!-- login widget -->

                                  <!-- Register widget -->

                                  <div id="register-form">
                                     
                                     <div class="clearfix"></div>
                                    <form id="register_popup_form" class="content bv-form" method="POST" novalidate>
                                      {{ csrf_field() }}
                                      <button type="submit" class="bv-hidden-submit" style="display: block; width: 0px; height: 0px;"></button>
                                      <div form-group="" id="general_error"> <span></span> </div>

                                      <div class="form-group" id="register_email">
                                        <label class="control-label" for="email"><strong>Email:</strong></label>
                                        <div class="input-wrap has-feedback
                                        @if(Session::has('validate'))
                                          has-error
                                        @endif

                                        ">
                                          <input type="text" class="form-control register register-email-input " name="email" id="email_register_1" placeholder="Nhập Email" data-bv-field="email">
                                          <small class="help-block" data-bv-validator="notEmpty" data-bv-for="email" data-bv-result="NOT_VALIDATED" style="display: none;">Vui lòng nhập Email</small>
                                          @if(Session::has('validate'))
                                           <small class="help-block" data-bv-validator="remote" data-bv-for="email" data-bv-result="NOT_VALIDATED">Email đã tồn tại</small>
                                          @endif
                                          </div>
                                      </div>
                                      <div class="form-group" id="register_password">
                                        <label class="control-label" for="pasword"><strong>Mật khẩu:</strong></label>
                                        <div class="input-wrap has-feedback">
                                          <input type="password" class="form-control register" name="password" id="password_register_1" placeholder="Mật khẩu từ 6 đến 32 ký tự" autocomplete="off" data-bv-field="password">
                                          <small class="help-block" data-bv-validator="notEmpty" data-bv-for="password" data-bv-result="NOT_VALIDATED" style="display: none;">Vui lòng nhập Mật khẩu</small><small class="help-block" data-bv-validator="stringLength" data-bv-for="password" data-bv-result="NOT_VALIDATED" style="display: none;">Mật khẩu phải dài từ 6 đến 32 ký tự</small></div>
                                      </div>
                                      <div class="form-group" id="register_name">
                                        <label class="control-label">Họ tên</label>
                                        <div class="input-wrap has-feedback">
                                          <input type="text" class="form-control register" name="full_name" id="full_name_register_1" placeholder="Nhập họ tên" data-bv-field="full_name">
                                          <small class="help-block" data-bv-validator="notEmpty" data-bv-for="full_name" data-bv-result="NOT_VALIDATED" style="display: none;">Vui lòng nhập Họ tên</small></div>
                                      </div>
                                      <div class="form-group policy-group">
                                        <div class="input-wrap">
                                          <p class="policy">Khi bạn nhấn Đăng ký, bạn  đã đồng ý thực hiện mọi giao dịch mua bán theo <a target="_blank" href="#" class="link">điều kiện sử dụng và chính sách của iCho</a>.</p>
                                        </div>
                                      </div>
                                      <div class="form-group last">
                                        <div id="register_popup_submit_1" class="btn btn-danger btn-block">Đăng ký</div>
                                      </div>
                                    </form>
                                  </div>
                                  <!-- Register widget -->

                                  <!-- reset password -->
                                  <div class="modal" id="reset-password-form" tabindex="-1" role="dialog">
                                    <div class="modal-dialog" role="document">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                          <div class="head">
                                            <h2>Quên mật khẩu?</h2>
                                            <p> <span>Vui lòng gửi email. Chúng tôi sẽ gửi link khởi tạo mật khẩu mới qua email của bạn.</span> </p>
                                          </div>
                                        </div>
                                        <div class="modal-body">
                                          <form method="POST" action="" class="content" id="reset_popup_form">
                                            <div id="forgot_successful"> <span></span> </div>
                                            <div class="form-group" id="forgot_pass">
                                              <input type="text" name="email" id="email" class="form-control" value="" required="required" placeholder="Nhập email">
                                              <span class="help-block"></span> </div>
                                            <div class="form-group last">
                                              <button type="button" id="reset_form_submit" class="btn btn-info">Gửi</button>
                                            </div>
                                          </form>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <!-- end reset password -->

                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="payment-right visible-lg-block">
                          <p class="text">Thanh toán đơn hàng trong chỉ một bước với:</p>
                          <div class="form-group last"> <a class="btn btn-block btn-social btn-facebook user-name-loginfb login-by-facebook-popup"> <i class="fa fa-facebook"></i> <span>Đăng nhập bằng</span><span> Facebook</span> </a> </div>
                        </div>
                        <div class="clearfix"></div>
                      </div>
                    </div>
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
                </div><!-- /.row -->
            </div><!-- ./shipping-address-page-->
        </div><!-- /.page-content -->
    </div>
</div>
@endsection
@include('frontend.partials.footer')
@section('javascript')
   <script type="text/javascript">
    function setServicesFee(){        
        $.ajax({
          url: "{{ route('set-service') }}",
          method: "POST"         
        });
    }

    $(document).ready(function() {
      $('#btnVangLai').click(function(){
        setServicesFee();
        location.href = "{{ route('shipping-step-2') }}";
      });
      $('#login-form > .bv-form').submit(function() {
        var error = [];
        var list_check = ['login_email', 'login_password'];
        var login_email    = $(this).find('#login_email').val();
        var login_password = $(this).find('#login_password').val();
        if(!login_email) {
          error.push('login_email');
        }

        if(!login_password) {
          error.push('login_password');
        }

        for(i in list_check) {
          $('#'+list_check[i]).parent().removeClass('has-error');
          $('#'+list_check[i]).next().hide();
        }

        if(error.length) {
          for(i in error) {
            $('#'+error[i]).parent().addClass('has-error');
            $('#'+error[i]).next().show();
          }
          return false;
        }

        return true;
      });

      $('#radioIsNotUserIcho').on('ifChecked', function(event){
       $('#register-form').show();
       $('#login-form').hide();
        $('#btnVangLai').show();
      });
      $('#radioIsUserIcho').on('ifChecked', function(event){
       $('#register-form').hide();
       $('#login-form').show();

      });

      @if(Session::has('validate') || Session::has('fb_id'))
        $('#register-form').show();
        $('#login-form').hide();
        $('#radioIsNotUserIcho').iCheck('check');
        $('#email').hide();
        // $('#full_name').val();
        @if(Session::has('fb_name'))
            $('#full_name').val(' {{Session::get('fb_name') }}');
        @endif

        @if(Session::has('fb_email'))
            $('#email').val('{{ Session::get('fb_email') }}');
        @endif

      @endif
      function validateEmail(email) {
          var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
          return re.test(email);
      }

      $('#register_popup_submit_1').click(function () {
        var error = [];
        var list_check = ['email_register_1', 'password_register_1', 'full_name_register_1'];
        var email = $('#email_register_1').val();
        var password = $('#password_register_1').val();
        var full_name = $('#full_name_register_1').val();

        if(!email || !validateEmail(email)) {
          error.push('email_register_1');
        }

        if(password.length < 6 || password.length > 32) {
          error.push('password_register_1');
        }

        if(!full_name) {
          error.push('full_name_register_1');
        }

        for(i in list_check) {
          $('#'+list_check[i]).parent().removeClass('has-error');
          $('#'+list_check[i]).parent().find('.help-block').hide();
        }

        if(error.length) {
          for(i in error) {
            $('#'+error[i]).parent().addClass('has-error');
            $('#'+error[i]).next().show();
          }
        } else {
          $.ajax({
            url: "{{route('register-customer')}}",
            method: "POST",
            data : {
              email: email,
              password: password,
              full_name: full_name
            },
            success : function(data){
              if(+data){
                location.reload();
              } else {
                swal({ title: '', text: 'Email này đã được đăng kí rồi.', type: 'error' });
              }
            },
            error : function(e) {
              alert( JSON.stringify(e));
            }
          });
        }
      });
    });
  </script>
@endsection









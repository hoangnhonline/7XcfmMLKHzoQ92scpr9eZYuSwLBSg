<!-- MAIN HEADER -->
<div class="container main-header">
    <div class="row">
        @if(in_array(\Request::route()->getName(), ['chi-tiet', 'danh-muc-con', 'news-detail', 'news-list']))
        <div class="col-xs-12 col-sm-2 col-md-2 logo">
        @else
        <h1 class="col-xs-12 col-sm-2 col-md-3 logo" style="margin-right: -15px;">
        @endif
            <a href="{{ route('home') }}"><img alt="Logo iCho.vn" src="{{ Helper::showImage($settingArr['logo']) }}"></a>
        @if(in_array(\Request::route()->getName(), ['chi-tiet', 'danh-muc-con', 'news-detail', 'news-list']))
        </div>
        @else
        </h1>
        @endif
        <div class="col-xs-12 col-sm-5 col-md-5 header-search-box">
            <form class="form-inline" method="GET" action="{{ route('search') }}">
                  <div class="form-group input-serach">
                    <input type="text" name="keyword"  placeholder="Nhập sản phẩm cần tìm" value="{{ isset($tu_khoa) ? $tu_khoa : "" }}">
                  </div>
                  <button type="submit" class="pull-right btn-search"></button>
            </form>
        </div>

        <div id="cart-block" class="col-md-1 col-sm-1 col-xs-4 shopping-cart-box">
            <a class="cart-link" href="{{route('gio-hang')}}">
                @if(Session::has('products') && Session::get('products'))
                    <span class="notify notify-left">{{Session::get('products') ? array_sum(Session::get('products')) : 0}}</span>
                @else
                    <span class="notify notify-left">0</span>
                @endif
            </a>
        </div><!-- end /.shopping-cart-box -->

        <div class="header-user col-md-3 col-sm-4 col-xs-6">
            @if(!Session::get('login'))
            <div class="user-name">
                <div class="user-name-link user-ajax-link">
                  <div class="user-avatar">
                    <img alt="avatar default" data-original="{{ URL::asset('assets/images/avatar-s.png') }}" class="lazy" height="40" width="40">
                    </div>
                  <ul>
                    <li class="user-name-short"><span>Đăng nhập</span></li>
                    <li class="user-name-account"><span>Tài khoản</span><span> &amp; Đơn hàng</span></li>
                  </ul>
                  <span class="caret"></span>
                </div>
                <div class="user-name-box user-ajax-box">
                  <ul class="user-ajax-guest">
                    <li id="login_link"><a class="user-name-login" title="Đăng Nhập" href="javascript:(void);" class="link" data-dismiss="modal" data-toggle="modal" data-target="#modalLoginFrom"><i class="fa fa-sign-in"></i> Đăng nhập</a></li>
                    <li id="login_fb_link" class="login-by-facebook-popup">
                    <a data-url="#" title="Đăng nhập bằng Facebook" class="user-name-loginfb"><i class="fa fa-facebook-square"></i><span>Đăng nhập bằng</span><span> Facebook</span></a>
                    </li>
                    <li class="user-name-register">
                      <a title="Tạo tài khoản mới" class="link" data-dismiss="modal" data-toggle="modal" data-target="#modalRegisterFrom"><i class="fa fa-user"></i><span>Tạo tài khoản</span></a>
                    </li>
                  </ul>
                </div>
            </div>
            @else
            <div class="user-name">            
              <div class="user-name-link user-ajax-link">
                <div class="user-avatar"><img alt="{{Session::get('username')}}" data-original="{{ Session::get('avatar') != '' ? Session::get('avatar') :  URL::asset('assets/images/avatar-s.png') }}" height="40" width="40" class="lazy"></div>
                <ul>
                  <li class="user-name-short">
                      <span>Chào, {{ Session::get('username') }}     </span>                 
                      <span class="badge" id="countNoti" style="display:none">0</span> 
                  </li>
                  <li class="user-name-account"> <span>Tài khoản</span> <span>&amp; Đơn hàng</span> </li>
                </ul>
                <span class="caret"></span>
              </div>
              <div class="user-name-box user-ajax-box">
                <ul class="user-ajax-customer">
                  <li> <a href="{{ route('account-info') }}" title="Thông tin tài khoản"> Thông tin tài khoản </a> </li>
                  <li> <a href="{{ route('order-history') }}" title="Đơn hàng của tôi"> Đơn hàng của tôi </a> </li>
                  <li> <a href="{{ route('notification') }}" title="Thông báo của tôi"> Thông báo của tôi </a> </li>
                  <li> <a href="{{route('user-logout')}}" title="Thoát tài khoản"> Thoát tài khoản </a> </li>
                </ul>
              </div>
          </div>
          @endif
            <!-- Modal -->
            <div class="modal fade" id="modalLoginFrom" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-sm">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Đăng nhập</h4>
                    <div class="head">
                      <p> <span>Bạn chưa có tài khoản? </span> <a href="javascript:(void);" class="link" data-dismiss="modal" data-toggle="modal" data-target="#modalRegisterFrom">Đăng ký</a> </p>
                    </div>
                  </div>
                  <div class="modal-body">

                      <form method="POST" action="#" id="login_popup_form">
                        <div class="form-group popup_email has-feedback" id="popup_login">
                          <label class="control-label">Email</label>
                          <input data-bv-field="email" id="popup-login-email" class="form-control login" name="email" placeholder="Nhập Email" type="text">
                          <small data-bv-result="NOT_VALIDATED" data-bv-for="email" data-bv-validator="notEmpty" class="help-block" style="display: none;">Vui lòng nhập Email hợp lệ</small></div>
                        <div class="form-group popup_password has-feedback" id="popup_password">
                          <label class="control-label">Mật khẩu</label>
                          <input data-bv-field="password" id="popup-login-password" class="form-control login" name="password" placeholder="Nhập mật khẩu" autocomplete="off" type="password">
                           <small data-bv-result="NOT_VALIDATED" data-bv-for="password" data-bv-validator="notEmpty" class="help-block" style="display: none;">Vui lòng nhập Mật khẩu</small></div>
                        <div class="login-ajax-captcha" style="display:none">
                          <div id="login-popup-recaptcha"></div>
                        </div>
                        <div class="form-group" id="error_captcha" style="margin-bottom: 15px;color:red;font-style:italic"> <span class="help-block ajax-message"></span> </div>
                        <div class="form-group">
                          <p class="reset">Quên mật khẩu? Nhấn vào <a href="javascript:(void);" class="link" data-dismiss="modal" data-toggle="modal" data-target="#modalResetPasswordFrom">đây</a></p>
                        </div>
                        <div class="form-group">
                          <div  id="login_popup_submit" class="btn btn-danger btn-block">Đăng nhập</div>
                        </div>
                        <div class="form-group last"> <a class="btn btn-block btn-social btn-facebook user-name-loginfb login-by-facebook-popup" title="Đăng nhập bằng Facebook" data-url=""> <i class="fa fa-facebook"></i> <span>Đăng nhập bằng</span><span> Facebook</span> </a> </div>
                      </form>
                  </div><!-- end modal-body -->
                </div>
              </div><!-- end modal-dialog -->
            </div><!-- end modal -->

            <!-- Modal -->
            <div class="modal fade" id="modalRegisterFrom" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Đăng ký tài khoản</h4>
                    <div class="head">
                      <p> <span>Bạn đã có tài khoản?</span> <a href="javascript:(void);" class="link" data-dismiss="modal" data-toggle="modal" data-target="#modalLoginFrom">Đăng nhập</a> </p>
                    </div>
                  </div>
                  <div class="modal-body">

                      <form method="POST" action="#" id="register_popup_form" class="row">
                        <div class="col-sm-6">
                          <div class="form-group" id="register_email">
                            <label class="control-label" for="email"><strong>Email:</strong></label>
                            <div class="input-wrap has-feedback">
                              <input data-bv-field="email" class="form-control register register-email-input" name="email" id="popup-register-email" placeholder="Nhập Email" type="text">
                              <small data-bv-result="NOT_VALIDATED" data-bv-for="email" er="notEmpty" class="help-block" style="display: none;">Vui lòng nhập Email</small><small er="NOT_VALIDATED" data-bv-for="email" data-bv-validator="remote" class="help-block" style="display: none;">Email đã tồn tại</small></div>
                          </div>
                          <div class="form-group" id="register_password">
                            <label class="control-label" for="pasword"><strong>Mật khẩu:</strong></label>
                            <div class="input-wrap has-feedback">
                              <input data-bv-field="password" class="form-control register" name="password" id="popup-register-password" placeholder="Mật khẩu từ 6 đến 32 ký tự" autocomplete="off" type="password">
                              <small data-bv-result="NOT_VALIDATED" data-bv-for="password" data-bv-validator="notEmpty" class="help-block" style="display: none;">Vui lòng nhập Mật khẩu</small><small data-bv-result="NOT_VALIDATED" data-bv-for="password" data-bv-validator="stringLength" class="help-block" style="display: none;">Mật khẩu phải dài từ 6 đến 32 ký tự</small></div>
                          </div>
                          <div class="form-group" id="register_name">
                            <label class="control-label">Họ tên</label>
                            <div class="input-wrap has-feedback">
                              <input class="form-control register" name="full_name" id="popup-register-name" placeholder="Nhập họ tên" data-bv-field="full_name" type="text">
                               <small class="help-block" data-bv-validator="notEmpty" data-bv-for="full_name" data-bv-result="NOT_VALIDATED" style="display: none;">Vui lòng nhập Họ tên</small></div>
                          </div>
                          <div class="form-group">
                              <label class="checkbox-inline" style="padding-left:0px">
                                <input type="checkbox"> Nhận các thông tin và chương trình khuyến mãi của iCho.vn qua email.
                              </label>
                          </div>
                          <div class="form-group policy-group">
                            <div class="input-wrap">
                              <p class="policy">Khi bạn nhấn Đăng ký, bạn  đã đồng ý thực hiện mọi giao dịch mua bán theo <a target="_blank" href="#">điều kiện sử dụng và chính sách của iCho.vn</a>.</p>
                            </div>
                          </div>
                          <div class="form-group last">
                            <div class="input-wrap">
                              <div id="register_popup_submit" class="btn btn-danger btn-block btn-register-submit">Đăng ký</div>
                            </div>
                          </div>
                        </div>

                        <div class="col-sm-6">
                          <p class="text" style="margin-bottom:5px">Đăng nhập vào icho.vn bằng facebook</p>
                          <div class="form-group last"> <a class="btn btn-block btn-social btn-facebook user-name-loginfb login-by-facebook-popup" title="Đăng nhập bằng Facebook" data-url="#"> <i class="fa fa-facebook"></i> <span>Đăng nhập bằng</span><span> Facebook</span> </a> </div>
                        </div>
                      </form>

                  </div><!-- end modal-body -->
                </div>
              </div><!-- end modal-dialog -->
            </div><!-- end modal -->

            <!-- Modal -->
            <div class="modal fade" id="modalResetPasswordFrom" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-sm">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Quên mật khẩu?</h4>
                    <div class="head">
                      <p><span>Vui lòng gửi email. Chúng tôi sẽ gửi link khởi tạo mật khẩu mới qua email của bạn.</span></p>
                    </div>
                  </div>
                  <div class="modal-body">

                      <form method="POST" action="#" class="content" id="">
                        <div id="forgot_successful"> <span></span> </div>
                        <div class="form-group" id="forgot_pass">
                          <input name="email" id="email" class="form-control" value="" required="required" placeholder="Nhập email" type="text">
                          <span class="help-block"></span> </div>
                        <div class="form-group last">
                          <button type="button" id="reset_form_submit" class="btn btn-danger btn-block">Lấy lại mật khẩu</button>
                        </div>
                      </form>

                  </div><!-- end modal-body -->
                </div>
              </div><!-- end modal-dialog -->
            </div><!-- end modal -->

        </div><!-- end choose-user-login -->
    </div>

</div>
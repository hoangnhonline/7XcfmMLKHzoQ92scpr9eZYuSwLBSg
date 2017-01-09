@section('footer')
<footer id="footer">
     <div class="container">
            <div class="service" style="margin-bottom:10px">
                <div class="col-xs-12 col-sm-4 service-item">
                    <div class="icon">
                        <img alt="services" data-original="{{ URL::asset('assets/images/s1.png') }}" class="lazy"/>
                    </div>
                    <div class="info">
                        <p><a href="#">CAM KẾT 100% CHÍNH HÃNG</a></p>
                        <span>Nguồn gốc, xuất xứ sản phẩm rõ ràng</span>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-4 service-item">
                    <div class="icon">
                        <img alt="services" data-original="{{ URL::asset('assets/images/s2.png') }}" class="lazy"/>
                    </div>
                    <div class="info">
                        <p><a href="#">ĐÓNG GÓI CẨN THẬN</a></p>
                        <span>Đảm bảo độ an toàn cho sản phẩm</span>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-4 service-item">
                    <div class="icon">
                        <img alt="services" data-original="{{ URL::asset('assets/images/s3.png') }}" class="lazy"/>
                    </div>
                    
                    <div class="info" >
                        <p><a href="#">XEM HÀNG TRƯỚC KHI NHẬN</a></p>
                        <span>Quyền lợi tối đa cho khách hàng</span>
                    </div>
                </div>
            </div>           
            <div class="row">
              <div class="col-md-8 fshop-hotcall">
                  <ul class="list-inline">
                      <li class="fshop-ftcall-free">
                          <a href="javascript:void(0)">
                              <span class="fa-stack fa-lg">
                                  <i class="fa fa-circle-thin fa-stack-2x" aria-hidden="true"></i>
                                  <i class="fa fa-phone fa-stack-1x" aria-hidden="true"></i>
                              </span>
                              <span style="text-transform: uppercase; color: #000;">Mua online giá sỉ<br>
                                  <strong class="fshop-ftcall-red">1900 636 975</strong>
                              </span>
                          </a>
                      </li>
                      <li class="fshop-ftcall-bh">
                          
                      </li>
                  </ul>
              </div>
              <div class="col-md-4 fshop-regmail">
                  <div class="introduce-title">NHẬN KHUYẾN MÃI</div>
                    <div class="input-group" id="mail-box">
                      <input type="text" placeholder="Email của bạn" id="newsletter_email"/>
                      <span class="input-group-btn">
                        <button class="btn btn-default btn-get-newsletter" type="button">OK</button>
                      </span>
                    </div><!-- /input-group -->
              </div>
            </div>
            <!-- introduce-box -->
            <div id="introduce-box" class="row" style="margin-top:0px">
                <div class="col-md-3">
                    <div class="introduce-title">Liên hệ</div>
                    <div id="address-box">                        
                        <div id="address-list" style="margin-top:12px">
                            <div class="tit-name">Làm việc:</div>
                            <div class="tit-contain">7h30 - 20h00</div>
                            <div class="tit-name">Hotline:</div>
                            <div class="tit-contain">1900 636 975</div>
                            <div class="tit-name">Email:</div>
                            <div class="tit-contain">muahang@icho.vn</div>
                            <div class="tit-name">Skype:</div>
                            <div class="tit-contain"><script type="text/javascript" src="https://secure.skypeassets.com/i/scom/js/skype-uri.js"></script>
                            <div id="SkypeButton_Call_thao_tho_trang_1" style="padding: 0px; margin-top: -15px;margin-left: -15px;">
                             <script type="text/javascript">
                             Skype.ui({
                             "name": "chat",
                             "element": "SkypeButton_Call_thao_tho_trang_1",
                             "participants": ["thao_tho_trang"]
                             });
                             </script>
                            </div></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="introduce-title">Công ty</div>
                            <ul id="introduce-company"  class="introduce-list">
                                <li><a href="{{ route('danh-muc-cha', 'gioi-thieu') }}">Giới thiệu</a></li>
                                <li><a href="{{ route('chuong-trinh-khuyen-mai') }}">Khuyến mãi</a></li>
                                <li><a href="#">Sản phẩm mới</a></li>
                                <li><a href="{{ route('news-list', 'tuyen-dung') }}">Tuyển dụng</a></li>
                                <li><a href="{{ route('contact') }}">Liên hệ</a></li>
                            </ul>
                        </div>
                        <div class="col-sm-4">
                            <div class="introduce-title">HỖ TRỢ</div>
                            <ul id = "introduce-Account" class="introduce-list">
                                <li><a href="{{ route('danh-muc-cha', 'huong-dan-mua-hang') }}">Hướng dẫn mua hàng</a></li>
                                <li><a href="{{ route('danh-muc-cha', 'bao-mat-thong-tin') }}">Bảo mật thông tin</a></li>
                                <li><a href="{{ route('contact') }}">Góp ý, khiếu nại</a></li>
                            </ul>
                        </div>
                        <div class="col-sm-4">
                            <div class="introduce-title">CHÍNH SÁCH</div>
                            <ul id = "introduce-support"  class="introduce-list">
                                <li><a href="{{ route('danh-muc-cha', 'phuong-thuc-thanh-toan') }}">Phương thức thanh toán</a></li>
                                <li><a href="{{ route('danh-muc-cha', 'hinh-thuc-van-chuyen') }}">Hình thức vận chuyển</a></li>
                                <li><a href="{{ route('danh-muc-cha', 'chinh-sach-bao-hanh') }}">Chính sách bảo hành</a></li>
                                <li><a href="{{ route('danh-muc-cha', 'chinh-sach-doi-tra') }}">Chính sách đổi trả</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="introduce-title">Kết nối</div>
                    <div class="social-link">
                        <a href="https://www.facebook.com/www.icho.vn" target="_blank"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-pinterest-p"></i></a>
                        <a href="#"><i class="fa fa-vk"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-google-plus"></i></a>
                    </div>                  

                </div>
            </div><!-- /#introduce-box -->

            <div id="footer-bottom-box" class="row">
              <div class="col-sm-6">
                <h3 class="tit">Công ty cổ phần I.P.L</h3>
                <div id="address">
                    <p>Văn phòng: 216 Hoàng Văn Thụ, Phường 4, Tân Bình, Hồ Chí Minh</p>
                    <p>GPĐKKD số 0310140399 do Sở KHĐT TP.HCM cấp ngày 02/07/2010 </p>
                    <p>Chịu trách nhiệm nội dung: Nguyễn Đình Quốc Tú</p>
                </div>
              </div>
              <div class="col-sm-6 bo-cong-thuong">
                <a href="http://www.online.gov.vn/CustomWebsiteDisplay.aspx?DocId=24392" target="_blank"><img style="height: 60px; width: 160px;" data-original="{{ URL::asset('assets/images/bo-cong-thuong.png') }}" alt="Chứng nhận sàn giao dịch TMDT" class="lazy"> </a>
              </div>
            </div>

            <div id="footer-menu-box">
                <p class="text-center">Copyrights &#169; 2016 iCho.vn. All Rights Reserved.</p>
            </div><!-- /#footer-menu-box -->
        </div>
</footer>
@endsection
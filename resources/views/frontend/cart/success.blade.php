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
<div class="columns-container">
    <div class="container" id="columns">
        <!-- breadcrumb -->
        <div class="breadcrumb clearfix">
            <a class="home" href="#" title="Return to Home">Home</a>
            <span class="navigation-pipe">&nbsp;</span>
            <a href="#" title="Giỏ hàng">Đặt hàng thành công</a>
        </div>
        <!-- ./breadcrumb -->      
             
        <div class="page-content">
          <!-- row -->
          <div class="shipping-address-page">
              
                <div class="row row-style-5">
                  <div class="col-lg-8">
                    <div class="panel panel-default success">
                      <div class="panel-body">
                        <div class="row row-style-6">
                          <div class="col-lg-4 col-md-3 visible-lg-block visible-md-block"> <img src="{{ URL::asset('assets/images/thanh-cong.png') }}" class="img-responsive" alt="Image" height="178" width="195"> </div>
                          <div class="col-lg-8 col-md-9">
                            <h3>Cảm ơn bạn đã mua hàng tại iCho.vn!</h3>
                            
                            <!-- BEGIN ORDER INFO -->
                            <p>Mã số đơn hàng của bạn: </p>
                            <div class="well well-sm"> {{ $order_id }} </div>
                            @if($is_vanglai == 0)
                            <p>Bạn có thể xem lại <a href="{{ route('order-history') }}">đơn hàng của tôi</a></p>
                            @endif
                            <p> <img src="{{ URL::asset('assets/images/thanh-cong.png') }}" alt="" height="25" width="30"> Thời gian dự kiến giao hàng vào {{ $arrDate['fromdate']}} - {{ $arrDate['todate'] }}, không giao ngày Thứ Bảy &amp; Chủ Nhật. </p><br>
                            @if(($is_vanglai == 1 && $vangLaiArr['email'] != '') || (isset($customer) && $customer->email != ''))
                            <p> Thông tin chi tiết về đơn hàng đã được gửi đến địa chỉ mail <span>{{ $is_vanglai == 1 ? $vangLaiArr['email'] : $customer->email }}</span>. Nếu
                              không tìm thấy vui lòng kiểm tra trong hộp thư <strong>Spam</strong> hoặc <strong>Junk Folder</strong>. </p>
                              @endif
                              <br>
                            <div class="alert alert-success" role="alert">
                              <p>Nhằm giúp việc xử lý đơn hàng nhanh hơn nữa, iCho.vn sẽ không gọi điện cho bạn để xác nhận đơn hàng.</p>
                            </div>                            
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-4 visible-lg-block">
                    <h3 class="news"><img src="{{ URL::asset('assets/images/ban-tin.png') }}" height="57" width="172"> </h3>
                    <div class="popover bottom newsletter">
                      <div class="arrow"></div>
                      <div class="popover-content">
                        <h6>Nhập địa chỉ email của bạn</h6>
                        
                          <input type="email" id="reg_success" class="form-control" value="" required="required" type="text">
                          <button type="button" class="btn btn-primary btn-block" id="btnRegTin">Đăng ký nhận tin khuyến mãi</button>
                        
                      </div>
                    </div>
                    <div class="facebook-page"> </div>
                  </div>
                </div>
                
           </div><!-- /.shipping-address-page -->   
                           
        </div><!-- /.page-content -->
    </div>
</div>
@endsection
@include('frontend.partials.footer')
@extends('frontend.layout')
@include('frontend.partials.meta')
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
            <a href="" title="Thông tin tài khoản">Thông tin tài khoản</a>
        </div>
        <!-- ./breadcrumb -->
        <div class="row">
            @include ('frontend.account.sidebar')
            <div class="center_column col-xs-12 col-sm-9" id="center_column">
                    <h1 class="page-heading">
                        <span class="page-heading-title2">Thông tin tài khoản</span>
                    </h1>
                               
                    <div class="dashboard-order have-margin" style="margin-top:15px">                        
                        <form class="content" method="post" action="/customer/account/edit" id="edit-account">
                            <input type="hidden" name="TIKI_CSRF_TOKEN" value="cb4c28650252e310875aef31cc7cd857">

                                                    
                            <div class="form-group gender-select-wrap" id="register_name">
                                <label class="control-label" for="pasword">Giới tính:</label>
                                <div class="input-wrap">
                                    <div class="row">
                                        <div class="col-xs-4">
                                            <label for="male" class="icheck-wrap gender-select">
                                                <div class="iradio_square-blue checked" style="position: relative;"><input type="radio" name="gender" value="on" id="male" class="gender" checked="" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"><ins class="iCheck-helper" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> Nam
                                            </label>
                                        </div>
                                        <div class="col-xs-4">
                                            <label for="female" class="icheck-wrap gender-select">
                                                <div class="iradio_square-blue" style="position: relative;"><input type="radio" name="gender" value="off" id="female" class="gender" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"><ins class="iCheck-helper" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> Nữ
                                            </label>
                                        </div>
                                    </div>
                                    <span class="help-block">Vui lòng chọn giới tính</span>

                                </div>
                            </div>

                                                    <div class="form-group">

                                <label class="control-label" for="full_name">Họ Tên </label>
                                <div class="input-wrap">
                                    <input type="text" name="full_name" class="form-control" id="full_name" value="Út Hoàng" placeholder="Họ tên">
                                    <span class="help-block"></span>
                                </div>
                            </div>

                                                    <div class="form-group ">
                                <label class="control-label no-lh" for="birthdate">
                                    Ngày Sinh:
                                    <span><i>*</i> Không bắt buộc</span>
                                </label>

                                <div class="input-wrap">
                                   
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="email">Email</label>
                                <div class="input-wrap">
                                    <input type="email" disabled="" value="webphp_hoangnguyen@yahoo.com.vn" class="form-control" name="email" id="email" placeholder="Email">
                                </div>
                            </div>
                            <div class="form-group">
                                                        <div class="input-wrap">
                                    <label for="change-password" class="icheck-wrap">
                                        <div class="icheckbox_square-blue checked"><input type="checkbox" id="change-password" class="icheck js-icheck" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"><ins class="iCheck-helper" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div>
                                        Thay đổi mật khẩu.
                                    </label>
                                </div>
                            </div>
                            <div class="password-group" style="display: block;">
                                <div class="form-group">
                                    <label class="control-label" for="old_password">Mật khẩu cũ</label>
                                    <div class="input-wrap">
                                        <input type="password" name="old_password" class="form-control" id="old_password" value="" autocomplete="off" placeholder="Nhập mật khẩu cũ">
                                        <span class="help-block"></span>
                                    </div>

                                </div>

                                <div class="form-group">
                                    <label class="control-label" for="new-password">Mật khẩu mới</label>
                                    <div class="input-wrap">
                                        <input type="password" name="new_password" class="form-control" id="new_password" value="" autocomplete="off" placeholder="Nhập mật khẩu mới">
                                        <span class="help-block"></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label" for="re_new_password">Nhập lại</label>
                                    <div class="input-wrap">
                                        <input type="password" name="re_new_password" class="form-control" id="re_new_password" value="" autocomplete="off" placeholder="Nhập lại mật khẩu mới">
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-wrap">
                                    <input type="hidden" name="customer_birthdate" value="">
                                    <button type="submit" class="btn btn-info btn-block btn-update">Cập nhật</button>
                                </div>
                            </div>
                        </form>
                    </div>
            </div>
        </div><!-- /.page-content -->
    </div>
</div>
<style type="text/css">    
    .dashboard-order.have-margin {
        margin-bottom: 20px;
    }   
    table.table-responsive thead tr th {
        display: table-cell;
        padding: 8px;
        background: #f8f8f8;
        font-weight: 500;    
    }
    table.table-responsive tbody tr td{
        font-size: 14px !important;
    }
</style>
<div class="clearfix"></div>
@endsection

@include('frontend.partials.footer')
@section('javascript')
   <script type="text/javascript">
    $(document).ready(function() {

    });
  </script>
@endsection
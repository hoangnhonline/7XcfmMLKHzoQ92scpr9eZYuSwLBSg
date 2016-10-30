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
            <a class="home" href="#" title="Return to Home">Home</a>
            <span class="navigation-pipe">&nbsp;</span>
            <a href="#" title="Giới thiệu">Giới thiệu</a>
        </div>
        <!-- ./breadcrumb -->
        
          <!-- row -->
          <div class="row">
          
              @include ('frontend.account.sidebar')              
              <!-- Center colunm-->
              <div class="center_column col-xs-12 col-sm-9" id="center_column">
                  <!-- page heading-->
                  <h2 class="page-heading">
                      <span class="page-heading-title2">Đơn hàng #{{ $str_order_id }} - {{ $status[$order->status] }}</span>
                  </h2>
                  <!-- Content page -->
                    
                    <div class="account-order-detail">
                    
                      <p class="date mt10 mb20">Ngày đặt hàng:  {{ $ngay_dat_hang }}</p>
                      
                      <div class="address-1">
                        <h4 class="mb20"> Địa chỉ người nhận </h4>
                        <p>{{ $customer->full_name }}</p>
                        <p>{{ $customer->address }}, 
                        @if(isset($customer->xa->name))
                          {{$customer->xa->name}}
                        @endif, 
                        @if(isset($customer->huyen->name))
                          {{$customer->huyen->name}},
                        @endif
                        @if(isset($customer->tinh->name))
                          {{$customer->tinh->name}}
                        @endif</p>
                        <p>ĐT: {{ $customer->phone }}</p>
                      </div>
                      
                      <div class="row mb20 mt20">
                        <div class="col-sm-7">
                          <div class="payment-1">
                            <h4 class="mb20">Phương thức vận chuyển</h4>
                            <p>Vận chuyển Tiết Kiệm (dự kiến giao hàng vào Thứ hai, 12/09/2016 - Thứ ba, 13/09/2016)</p>
                            <p>Miễn phí vận chuyển</p>
                          </div>
  
                        </div>
                        <div class="col-sm-5">
                          <div class="payment-2 has-padding">
                            <h4 class="mb20">Phương thức thanh toán</h4>
                            <p>Thanh toán tiền mặt khi nhận hàng </p>
                          </div>
                        </div>
                      </div>
                    </div>
                    
                    <h4 class="mb10">Sản phẩm mua</h4>
                    
                    <div class="table-responsive">
                      <table class="table table-bordered dashboard-order">
                        <thead>
                          <tr class="default">
                            <th class="text-nowrap"> <span class="hidden-xs hidden-sm hidden-md">Tên sản phẩm</span> <span class="hidden-lg">Sản phẩm</span> </th>
                            <th class="text-nowrap">SKU</th>
                            <th class="text-nowrap">Giá</th>
                            <th class="text-nowrap">Số lượng</th>
                            <th class="text-nowrap">Giảm giá</th>
                            <th class="text-nowrap">Tổng cộng</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td><a href="#" target="_blank" class="link">USB Team Group  C155 32GB - USB 3.0 </a> </td>
                            <td><strong class="hidden-lg hidden-md">SKU: </strong>6103156438711</td>
                            <td><strong class="hidden-lg hidden-md">Giá: </strong>249.000&nbsp;₫</td>
                            <td><strong class="hidden-lg hidden-md">Số lượng: </strong>1 </td>
                            <td><strong class="hidden-lg hidden-md">Giảm giá: </strong>0&nbsp;₫</td>
                            <td><strong class="hidden-lg hidden-md">Tổng cộng: </strong>249.000&nbsp;₫</td>
                          </tr>
                          
                          <tr>
                            <td><a href="#" target="_blank" class="link">Thẻ Nhớ Kingston MicroSD 32GB Class 10 (Kèm Adapter)</a></td>
                            <td><strong class="hidden-lg hidden-md">SKU: </strong>5005443303225</td>
                            <td><strong class="hidden-lg hidden-md">Giá: </strong>239.000&nbsp;₫</td>
                            <td><strong class="hidden-lg hidden-md">Số lượng: </strong>1 </td>
                            <td><strong class="hidden-lg hidden-md">Giảm giá: </strong>0&nbsp;₫</td>
                            <td><strong class="hidden-lg hidden-md">Tổng cộng: </strong>239.000&nbsp;₫</td>
                          </tr>
                          
                        </tbody>
                        <tfoot>
                          <tr>
                            <td colspan="5" class="text-right"><strong>Tổng chưa giảm</strong></td>
                            <td><strong>488.000&nbsp;₫</strong></td>
                          </tr>
                          <tr>
                            <td colspan="5" class="text-right"><strong>Giảm giá </strong></td>
                            <td><strong>0&nbsp;₫ </strong></td>
                          </tr>
                          <tr>
                            <td colspan="5" class="text-right"><strong>Chi phí vận chuyển</strong></td>
                            <td><strong>0&nbsp;₫</strong></td>
                          </tr>
                          <tr>
                            <td colspan="5" class="text-right"><strong>Tổng cộng</strong></td>
                            <td><strong>488.000&nbsp;₫</strong></td>
                          </tr>
                        </tfoot>
                      </table>
                    </div>
                    <a href="/sales/order/history" class="btn btn-info btn-back"><i class="fa fa-caret-left"></i> Quay về đơn hàng của tôi</a> </div>

              </div>
              <!-- ./ Center colunm -->
              
          </div>
          <!-- ./row-->   
    </div>
</div>

@endsection
<div class='clearfix'></div>
@include('frontend.partials.footer')
@section('javascript')
   <script type="text/javascript">
    $(document).ready(function() {

    });
  </script>
@endsection
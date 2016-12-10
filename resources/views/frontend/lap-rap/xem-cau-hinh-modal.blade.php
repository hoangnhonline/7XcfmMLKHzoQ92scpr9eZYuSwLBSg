<div class="modal-header">
  <button type="button" class="close" data-dismiss="modal">&times;</button>
  <h4 class="modal-title">Cấu hình đã chọn</h4>
</div>
<div class="modal-body shipping-address-page" >
    <div id="panel-cart">
      <div class="panel panel-default cart">
        <div class="panel-body">             
        @if(!empty($arrData['select']))
          <div class="product">
            <?php 
            $total = 0;
            ?>
            
            @foreach($arrData['select'] as $sp_id)
            <?php 
            $soluong = $arrData['soluong'][$sp_id];
            $price = $arrData['price'][$sp_id];
            $name = $arrData['name'][$sp_id];
            $totalSP = $soluong*$price;
            $total+= $totalSP;
            ?>
            <div class="item" style="font-size:13px">
              <p class="title"><strong>{{ $soluong }} x</strong><a href="#" target="_blank" class="link">{{ $name }}</a></p>
              <p class="price" style="font-weight:bold"> <span>{{ number_format($totalSP ) }}&nbsp;₫ </span> </p>
            </div>
            @endforeach            
          </div>
          <p class="total" style="font-size:15px"> Tạm Tính: <span style="font-weight:bold">{{ number_format($total) }}&nbsp;₫</span> </p>                
          <p class="text-right"> <i>(Đã bao gồm VAT)</i> </p>
          @else
          <p>Quý khách chưa chọn sản phẩm nào.</p>
          @endif
        </div>
      </div>
    </div>
</div>
<div class="modal-footer text-center">
@if(!empty($arrData['select']))
  <button type="button" class="btn" id="btnAddCartLapRap">Thêm vào giỏ hàng</button>
  <button type="button" class="btn btn-default" id="btnChonLai">Chọn lại</button>
@else
  <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
@endif
</div>

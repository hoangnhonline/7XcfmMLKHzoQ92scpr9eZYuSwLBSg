<div id="panel-cart">
  <div class="panel panel-default cart">
    <div class="panel-body">                
      <div class="product">
        <?php 
        $total = 0;
        ?>
        @if(!empty($arrData))
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
        @endif        
      </div>
      <p class="total" style="font-size:15px"> Tạm Tính: <span style="font-weight:bold">{{ number_format($total) }}&nbsp;₫</span> </p>                
      <p class="text-right"> <i>(Đã bao gồm VAT)</i> </p>
    </div>
  </div>
</div>
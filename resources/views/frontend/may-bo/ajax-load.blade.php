@if($tmpArr->count() > 0)
<input type="hidden" id="value-{{ $cate->slug }}" value="0">
<ul class="row" >
@foreach($tmpArr as $sp)
<?php 
$price = $sp->is_sale == 1 && $sp->price_sale  > 0 ? $sp->price_sale : $sp->price;
?>
<li>
<div class="col-sm-{{ $cate->id == 35 ? 6 : 9 }} box-name"><label><input type="radio" class="select-lk radio-{{ $cate->slug }}" data-type="{{ $cate->slug }}" name="select[{{ $cate->id }}]" value="{{ $sp->id }}"> {{ $sp->name }}</label></div>
@if($cate->id == 35)
<div class="col-sm-3 clearfix quantity">
    <p class="txt-name hidden-lg">Số lượng:</p>      
      <select class="form-control" style="width:70px;margin:auto" name="soluong[{{ $sp->id }}]">
      	  @if($sp->khe_ram > 0)
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="4">4</option>
          @else
          <option value="1">1</option>
          @endif

      </select>                                
  
</div>
@else
<input type="hidden" name="soluong[{{ $sp->id }}]" value="1">
@endif
<div class="col-sm-3 clearfix price">
    <p class="txt-name hidden-lg">Giá:</p>
    <input type="hidden" name="price[{{ $sp->id }}]" value="{{ $price }}">
    <input type="hidden" name="name[{{ $sp->id }}]" value="{{ $sp->name }}">
    <span class="txt-num">{{ number_format($price) }} đ</span>
</div>
</li>
@endforeach
</ul>
@else<label>Không có sản phẩm tương thích với lựa chọn của bạn.</label>@endif
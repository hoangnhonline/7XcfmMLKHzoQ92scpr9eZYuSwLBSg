@if($cate->id == 35 && $tmpArr->count() > 0)
<?php $so_khe = $detail->khe_ram == 0 ? 1 : $detail->khe_ram; ?>
@endif
@if($tmpArr->count() > 0)
<input type="hidden" id="value-{{ $cate->slug }}" value="0">
<ul class="row" >
<li>
    <div class="col-sm-{{ $cate->id == 35 ? "6" : "9" }} box-name"><label><input type="radio" class="select-lk radio-{{ $cate->slug }}" data-type="{{ $cate->slug }}" name="select[{{ $cate->id }}]"> Không chọn</label></div>
    @if($cate->id == 35)
    <div class="col-sm-3 quantity"></div>
    @endif
    <div class="col-sm-3 price"></div>
</li>
@foreach($tmpArr as $sp)
<?php 
$price = $sp->is_sale == 1 && $sp->price_sale  > 0 ? $sp->price_sale : $sp->price;
?>
<li>
<div class="col-sm-{{ $cate->id == 35 ? "6" : "9" }} box-name"><label><input type="radio" class="select-lk radio-{{ $cate->slug }}" data-type="{{ $cate->slug }}" name="select[{{ $cate->id }}]" value="{{ $sp->id }}"> {{ $sp->name }}</label></div>
@if($cate->id == 35)
<div class="col-sm-3 clearfix quantity">
    <p class="txt-name hidden-lg">Số lượng:</p>
    <div class="col-sm-3 clearfix quantity">
      <p class="txt-name hidden-lg">Số lượng:</p>
      
      <select class="form-control" style="width:70px;margin:auto">
      	  @for($i = 1; $i <= $so_khe; $i ++)
          <option value="{{ $i }}">
            {{ $i }}
          </option>
          @endfor

      </select>                                
  </div>
</div>
@endif
<div class="col-sm-3 clearfix price">
    <p class="txt-name hidden-lg">Giá:</p>
    <span class="txt-num">{{ number_format($price) }} đ</span>
</div>
</li>
@endforeach
</ul>
@else<label>Không có sản phẩm tương thích với lựa chọn của bạn.</label>@endif
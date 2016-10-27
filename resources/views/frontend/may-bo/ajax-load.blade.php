<input type="hidden" id="value-{{ $cate->slug }}" value="0">
@if($cate->id == 35 && $tmpArr->count() > 0)
<?php $so_khe = $detail->khe_ram == 0 ? 1 : $detail->khe_ram; ?>
<div class="form-inline">
  
  <label>Dòng Mainboard này support tối đa <span id="ram_max">{{ $so_khe }}</span> thanh ram. Bạn muốn gắn bao nhiêu thanh cho server này?</label>
  <select id="select_max_ram" name="so_ram" class="text-input">
    @for($i = 0; $i <= $so_khe; $i++)
    <option value="{{ $i }}">{{ $i }}</option>
    @endfor
  </select>
</div>   
@endif
@if($tmpArr->count() > 0)
<ul class="config-list radio">
<li class="radio"><label class="text-bold"><input type="radio" class="select-lk radio-{{ $cate->slug }}" data-type="{{ $cate->slug }}" name="select[{{ $cate->id }}]" value="0"> Không chọn</label></li>

@foreach($tmpArr as $sp)
<?php 
$price = $sp->is_sale == 1 && $sp->price_sale  > 0 ? $sp->price_sale : $sp->price;
?>
<li class="radio"><label class="text-bold"><input type="radio" class="select-lk radio-{{ $cate->slug }}" data-type="{{ $cate->slug }}" name="select[{{ $cate->id }}]" value="{{ $sp->id }}"> {{ $sp->name }}</label> <span class="price">[ {{ number_format($price) }} đ ]  </span></li>
@endforeach

</ul>
@else
<label>Không có sản phẩm tương thích với lựa chọn của bạn.</label>
@endif
@extends('frontend.layout')  

@include('frontend.partials.meta')
@section('content')
<article class="block block-breadcrumb">
  <ul class="breadcrumb">
    <li><a href="{{ route('home') }}" title="Trở về trang chủ">Trang chủ</a></li>
    <li class="active">So sánh</li>
  </ul>
</article><!-- /block-breadcrumb -->
<!-- page wapper-->
<section class="block-content">
        <div class="block-common">
          <p class="block-page-name">Cập nhật thông tin</p>     
          <!-- row -->
          <div class="compare-page">
          
            <h2 class="compare-title">So sánh 
            <?php $count = 0; ?>
            @foreach( $productArr as $product )
            <?php $count++; ?>
              {{ $product->name }} 
              @if( $count < count($productArr))
                và
              @endif
            @endforeach
            </h2>
            
            <section class="compare">
              <ul class="compare-table compare-product">
                <li class="cp-cell-1 cp-cell"></li>
                  <?php $count = 2; ?>
                  @foreach($productArr as $sp_id => $product )
                 <li style="width: 27%;" class="cp-cell-{{ $count }} cp-cell cp-product" id="itemProd{{ $count-1 }}"> <a href="#" title="{{ $product->name }} {{ $product->name_extend }}" class="clearfix"> <img width="200" class="lazy" data-original="{{ Helper::showImage($product->image_url) }}" alt="{{ $product->name }} {{ $product->name_extend }}">
                  <h3>{{ $product->name }} {{ $product->name_extend }}</h3>
                  <strong class="cp-price">{{ $product->is_sale == 1 ? number_format($product->price_sale) : number_format($product->price) }}₫</strong> </a>                  
                  @if($count-1 < count( $productArr ))
                  <span class="cp-vs">VS</span> 
                  @endif
                  </li>
                  <?php $count++; ?>
                  @endforeach

              </ul>
            </section>
            <section class="l-wrapper">
            
              <div style="display: block;" id="boxMore" class="none">
                @foreach( $thuocTinhArr as $thuoctinh)
                <h2 class="compare-table-title">{{ $thuoctinh['name']}}</h2>
                <ul class="compare-table" id="boxFullSpecfication">
                  @foreach( $thuoctinh['child'] as $child)
                  <li class="compare-row">
                    <span class="cp-cell cp-cell-1"><span class="cp-space">{{ $child['name'] }}</span></span>
                    <?php $count = 2; ?>
                    @foreach($productArr as $sp_id => $product )
                    <span style="width: 27%;" class="cp-cell cp-cell-{{ $count }}">
                      <span class="cp-space">{{ isset($spThuocTinhArr[$sp_id][$child['id']]) ? $spThuocTinhArr[$sp_id][$child['id']] : "" }}</span>
                    </span>
                    <?php $count++; ?>
                    @endforeach

                    <!--<span style="width: 27%;" class="cp-cell cp-cell-4"><span class="cp-space"><a href="https://www.thegioididong.com/tin-tuc/loai-man-hinh-tft-lcd-amoled-la-gi--592346#ledbacklitipslcd" target="_blank">LED-backlit IPS LCD</a></span></span></li>-->
                  @endforeach
                </ul>
                @endforeach
               
              </div>
              <ul class="compare-table compare-buy" id="boxBtnPayment-1">
                <li class="cp-cell cp-cell-1"><span class="cp-social">Thông tin này có ích với bạn chứ ?</span></li>
                  <?php $count = 2; ?>
                  @foreach($productArr as $sp_id => $product )
                   <li style="width: 27%;" class="cp-cell cp-cell-{{ $count }}"><a href="{{ route('chi-tiet', $product->slug) }}" class="compare-buy-btn">Mua  {{ $product->name }}</a></li>
                  <?php $count++; ?>
                  @endforeach
              </ul>
            </section>
        
          </div> <!-- /.compare-page -->
          
      </div>
  
</section>
@endsection
@section('javascript_page')

<script type="text/javascript" src="{{ URL::asset('assets/lib/jquery.elevatezoom.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('assets/js/jquery.actual.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('assets/lib/jquery.elevatezoom.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('assets/lib/jquery-ui/jquery-ui.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('assets/lib/fancyBox/jquery.fancybox.js') }}"></script>	
@endsection
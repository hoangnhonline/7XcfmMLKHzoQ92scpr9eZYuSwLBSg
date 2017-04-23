@include('frontend.partials.meta')
@section('content')
@foreach( $loaiSpHot as $loai)
@if(count($productArr[$loai['id']]) > 0)
<section class="block block-products products">
  <div class="block-title">
    <h2 class="title">{{ $loai['name']}}</h2>
    <a href="{{ route('danh-muc-cha', $loai['slug']) }}" title="{{ $loai['name']}}" class="viewmore">Xem {{ count($productArr[$loai['id']]) }} sản phẩm <i class="fa fa-angle-right"></i></a>
  </div>
  <div class="block-content">
    <ul class="owl-carousel owl-theme owl-style2" data-nav="true" data-dots="false" data-margin="30" data-responsive='{"0":{"items":1},"480":{"items":2},"600":{"items":2},"768":{"items":3},"800":{"items":3},"992":{"items":6}}'>
      @foreach( $productArr[$loai['id']] as $product )
      <li class="item">
        <div class="pro-thumb">
          <a href="{{ route('chi-tiet', $product['slug']) }}" title="{{ $product['name'] }}">
            <img src="{{ Helper::showImage($product['image_url']) }}" alt="{{ $product['name'] }}">
          </a>
        </div>
        <div class="pro-info">
          <h2 class="pro-title"><a href="{{ route('chi-tiet', $product['slug']) }}">{{ $product['name'] }}</a></h2>
          <div class="price-products">
            <p class="pro-price">{{ $product['is_sale'] == 1 ? number_format($product['price_sale']) : number_format($product['price']) }}</p>
            @if( $product['is_sale'] == 1)
            <p class="pro-sale"><del>{{ number_format($product['price']) }}</del> <span></span></p>
            @endif
          </div>
        </div>
      </li><!-- /item -->
      @endforeach
    </ul>
  </div>
</section><!-- /block-products products -->
@endif
@endforeach
@endsection
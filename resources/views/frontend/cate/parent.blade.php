@extends('frontend.layout')
@include('frontend.partials.meta')
@section('content')
<section class="block-content">
	<div class="block-common block-sale-products">
		<p class="block-page-name">{{ $rs->name }}</p>
		<div class="products">
			<ul class="row">
				@foreach( $productArr as $product )
				<li class="col-md-2 col-sm-4 col-xs-4">
					<div class="item">
						<!--<p class="trapezoid">-18%</p>-->
						<div class="pro-thumb">
							<a href="{{ route('chi-tiet', $product['slug']) }}" title="{{ $product['name'] }}">
								<img src="{{ Helper::showImage($product['image_url']) }}" alt="{{ $product['name'] }}">
							</a>
						</div>
						<div class="pro-info">
							<h2 class="pro-title"><a href="{{ route('chi-tiet', $product['slug']) }}">{{ $product['name'] }}</a></h2>
							<div class="price-products">
								<p class="pro-price">@if($product['price'] > 0)
					            {{ $product['is_sale'] == 1 ? number_format($product['price_sale']) : number_format($product['price']) }}
					            @else
					            Liên hệ
					            @endif </p>
								<!-- <p class="pro-sale"><del>7,940,000đ</del></p> -->
							</div>
							<a href="{{ route('chi-tiet', $product['slug']) }}" title="" class="btn btn-select-buy">Chọn mua</a>
						</div>
					</div><!-- /item -->
				</li><!-- /col-sm-2 col-xs-6 -->	
				@endforeach			
			</ul>
		</div><!-- /products -->
		<!---<div class="sortPagiBar">
            <div class="bottom-pagination">
                <nav>
                  
                </nav>
            </div>                    
        </div>-->
	</div><!-- /block-common -->
</section>
@endsection
<div class="left-block">
    @if($product['pro_style'] == 1 && $product['image_pro'] != '' && $loaiSp->icon_km != '')
    <img class="gift-icon lazy" src="{{ Helper::showImage($loaiSp->icon_km) }}" alt="Sản phẩm có quà tặng">
    @endif
    @if($product['pro_style'] == 2 && $product['image_pro'] != '')
    <img class="gift-icon lazy" src="{{ Helper::showImage($product['image_pro']) }}" alt="qua tang kem {{ $product['name'] }}">
    @endif
    @if( $product['is_sale'] == 1)
    <span class="discount">-{{
        100-round($product['price_sale']*100/$product['price'])
    }}%</span>
    @endif
    <a href="{{ route('chi-tiet', $product['slug']) }}"><img class="img-responsive lazy-img1 lazy" alt="{{ $product['name'] }}" data-original="{{ Helper::showImage($product['image_url']) }}" /></a>
    @if($product['pro_style'] == 1 && $product['image_pro'] != '')
    <img class="img-responsive lazy-img2 lazy" alt="product" src="{{ Helper::showImage($product['image_pro']) }}" />
    @endif
    </a>                                    
    @if( $loaiSp->is_hover == 1 && $product['pro_style'] == 0 && !empty($thuocTinhArr))
    <figure class="mask-info">
        @foreach($hoverInfo as $info)
        <?php 
        $tmpInfo = explode(",", $info->str_thuoctinh_id);         
        ?>

        <span>{{ $info->text_hien_thi}}: <?php
        $countT = 0; $totalT = count($tmpInfo);
        foreach( $tmpInfo as $tinfo){
            $countT++;
            if(isset($thuocTinhArr[$tinfo])){
                echo $thuocTinhArr[$tinfo]. " ";                
            }
        }

         ?></span>
        @endforeach
        <div class="btn-action">
          <a class="btnorder" href="{{ route('chi-tiet', $product['slug']) }}">Đặt hàng</a>
          <a class="viewdetail" href="{{ route('chi-tiet', $product['slug']) }}">Chi tiết</a>
        </div>
    </figure>
    @endif
</div><!--left-->
<div class="right-block">
    <h2 class="product-name"><a title="{{ $product['name'] }}" href="{{ route('chi-tiet', $product['slug']) }}">{{ $product['name'] }}</a></h2>
    <div class="content_price">
        <span class="price product-price">
            @if($product['price'] > 0)
            {{ $product['is_sale'] == 1 ? number_format($product['price_sale']) : number_format($product['price']) }}
            @else
            Liên hệ
            @endif                                            
        </span>
        @if( $product['is_sale'] == 1)
        <span class="price old-price">{{ number_format($product['price']) }}</span>
        @endif
    </div>
    @if($product['price'] > 0)
    <a class="add_to_cart_button" href="{{ route('chi-tiet', $product['slug']) }}">Mua</a>
    @endif
</div><!--right-->
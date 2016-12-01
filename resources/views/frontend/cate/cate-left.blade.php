<div class="column col-xs-12 col-sm-3" id="left_column">
    <!-- block category -->
    <div class="block left-module" style="margin-bottom:10px">
        <p class="title_block">Danh mục</p>
        <div class="block_content">
            <!-- layered -->
            <div class="layered layered-category">
                <div class="layered-content">
                    <ul class="tree-menu">
                        @foreach( $cateArr as $cate)
                        <li>
                            <span></span><a href="{{ route('danh-muc-con', [$rs->slug, $cate->slug]) }}">{{ $cate->name }}</a>                                        
                        </li>
                        @endforeach
                        @if($rs->id == 6)
                        <li><span></span><a title="Máy in" href="{{ route('danh-muc-cha', 'may-in') }}">Máy in</a></li>
                        <li><span></span><a title="Máy scan" href="{{ route('danh-muc-cha', 'may-scan') }}">Máy scan</a></li>
                        <li><span></span><a title="Máy fax" href="{{ route('danh-muc-cha', 'may-fax') }}">Máy fax</a></li>
                        <li><span></span><a title="Máy chiếu" href="{{ route('danh-muc-cha', 'may-chieu') }}">Máy chiếu</a></li>
                        @endif
                    </ul>
                </div>
            </div>
            <!-- ./layered -->
        </div>
    </div>
    <div class="block left-module">
        <p class="title_block">Tìm theo giá</p>
        <div class="block_content">
            <!-- layered -->
            <div class="layered layered-category">
                <div class="layered-content">
                    <ul class="tree-menu">
                        <?php 
                        $priceArr = DB::table('price_range')->where('loai_id', $rs->id)->orderBy('id')->get();

                        ?>
                        @foreach($priceArr as $price)                                   
                        <li><span></span><a href="{{ route('theo-gia-danh-muc-cha',['slugLoaiSp' => $rs->slug, 'slugGia' => $price->alias]) }}">{{ $price->name }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <!-- ./layered -->
        </div>
    </div>
    @include('frontend.partials.banner-slidebar')
 
</div>
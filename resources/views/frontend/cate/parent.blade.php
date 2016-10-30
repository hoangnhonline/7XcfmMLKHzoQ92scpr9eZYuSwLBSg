@extends('frontend.layout')

@section('header')
    @include('frontend.partials.main-header')
    @include('frontend.partials.home-menu')
  @endsection

@include('frontend.partials.meta')
@section('content')
<!-- END Home slideder-->
<div class="option2 clearfix">
    <div class="content-page" style="margin-top:0px">
        <div class="container">
            <!-- featured category fashion -->
            <?php $countLoaiSp = 0; 
            $totalLoaiHot = count( $loaiSpHot );
            ?>
            @foreach( $cateArr as $cate)
                @if( !empty( $productArr[$cate->id])) 
                <?php $countLoaiSp++; ?>          
                <div class="category-featured">
                    <nav class="navbar nav-menu show-brand">
                      <div class="container">
                        <!-- Brand and toggle get grouped for better mobile display -->
                          <div class="navbar-brand" style="background-color:{{ $cate->bg_color }}">
                            <a href="{{ route('danh-muc-con', [$rs->slug, $cate->slug])}}">{{ $cate->name }}</a>
                            </div>
                          <span class="toggle-menu"></span>
                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse">           
                          
                        </div><!-- /.navbar-collapse -->
                      </div><!-- /.container-fluid -->
                       <div id="elevator-{{ $countLoaiSp}}" class="floor-elevator">
                            <a href="#{{ $countLoaiSp > 1 ? "elevator-".($countLoaiSp - 1)  : " " }}" class="btn-elevator up {{ $countLoaiSp == 1 ? "disabled" : "" }} fa fa-angle-up"></a>
                            <a href="#{{ $countLoaiSp < $totalLoaiHot ? "elevator-".($countLoaiSp + 1)  : " " }}" class="btn-elevator down {{ $countLoaiSp == $totalLoaiHot ? "disabled" : "" }} fa fa-angle-down"></a>
                      </div>
                    </nav>
                   <div class="product-featured clearfix">
                        <div class="product-featured-tab-content">
                            <div class="tab-container">
                                <div class="tab-panel active" id="tab-10">
                                        <div class="col-sm-12 category-list-product" style="padding-right:0;">
                                            <ul class="product-list">
                                                @foreach( $productArr[$cate->id] as $product )
                                                <?php 
                                                    if( $rs->is_hover == 1){                    
                                                        $tmp = isset($product['thuoc_tinh']) ? $product['thuoc_tinh'] : "";
                                                        $thuocTinhArr = json_decode($tmp, true);
                                                    }
                                                ?>
                                                <li class="col-sm-2">
                                                    @include('frontend.cate.per-product')
                                                </li>
                                            @endforeach
                                                
                                            </ul>
                                        </div>
                                </div>                               
                            </div>
                        </div>

                   </div>
                </div>
                @endif
            @endforeach



        </div>
    </div><!-- end /.content-page -->
</div><!-- end /.option2 -->
@endsection

@include('frontend.partials.footer')
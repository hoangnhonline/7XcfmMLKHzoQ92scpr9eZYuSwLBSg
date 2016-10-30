@extends('frontend.layout')

@section('header')
    @include('frontend.partials.main-header')
    @include('frontend.partials.home-menu')
  @endsection

@include('frontend.partials.meta')
@section('content')
<div class="columns-container">
    <div class="container" id="columns">
        <!-- breadcrumb -->
        <div class="breadcrumb clearfix">
            <a class="home" href="{{ route('home') }}" title="Trở về trang chủ">Trang chủ</a>
            <span class="navigation-pipe">&nbsp;</span>
            <a class="home" href="{{ route('danh-muc-cha', $rs->slug) }}" title="{{ $rs->name }}">{{ $rs->name }}</a>
            <span class="navigation-pipe">&nbsp;</span>
            <span class="navigation_page">Sản phẩm mới</span>
        </div>
        <!-- ./breadcrumb -->
        <!-- row -->
        <div class="row">
            <!-- Left colunm -->
           @include('frontend.cate.cate-left')
            <!-- ./left colunm -->
            <!-- Center colunm-->
            <div class="center_column col-xs-12 col-sm-9" id="center_column">             
              
                <!-- view-product-list-->
                <div id="view-product-list" class="view-product-list">
                    <h1 class="page-heading">
                        <span class="page-heading-title">{{ $rs->name }} - Sản phẩm mới</span>
                    </h1>                    
                    <!-- PRODUCT LIST -->
                    <ul class="row product-list grid">
                        @foreach( $productArr as $product )
                        <?php 
                            if( $rs->is_hover == 1){                                                        
                                $tmp = isset($product['thuoc_tinh']) ? $product['thuoc_tinh'] : "";
                                $thuocTinhArr = json_decode($tmp, true);                                                     
                            }

                        ?>
                        <li class="col-xs-6 col-sm-4 col-md-3">
                            <div class="product-container">
                                @include('frontend.cate.per-product')
                            </div>
                        </li>
                    @endforeach
                        
                    </ul>
                    <!-- ./PRODUCT LIST -->

                </div>
                <!-- ./view-product-list-->
                <div class="sortPagiBar">
                    <div class="bottom-pagination">
                        <nav>
                        {{ $productArr->links() }}
                        </nav>
                    </div>                    
                </div>
            </div>
            <!-- ./ Center colunm -->
        </div>
        <!-- ./row-->
    </div>
</div>
@endsection

@include('frontend.partials.footer')
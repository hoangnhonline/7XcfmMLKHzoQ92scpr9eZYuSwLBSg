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
            <a class="home" href="{{ route('danh-muc-cha', $loaiSp->slug) }}" title="{{ $loaiSp->name }}">{{ $loaiSp->name }}</a>
            <span class="navigation-pipe">&nbsp;</span>
            <span class="navigation_page">{{ $title }}</span>
        </div>
        <!-- ./breadcrumb -->
        <!-- row -->
        <div class="row">
            <!-- Left colunm -->
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
                                        <span></span><a href="{{ route('danh-muc-con', [$loaiSp->slug, $cate->slug]) }}">{{ $cate->name }}</a>                                        
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <!-- ./layered -->
                    </div>
                </div>
               
                @include('frontend.partials.banner-slidebar')
             
            </div>
            <!-- ./left colunm -->
            <!-- Center colunm-->
            <div class="center_column col-xs-12 col-sm-9" id="center_column">             
              
                <!-- view-product-list-->
                <div id="view-product-list" class="view-product-list">
                    <div style="position:relative">
                        <h1 class="page-heading">
                            <span class="page-heading-title">{{ $title }}</span>
                        </h1>                    
                        <a class="btn btn-warning" href="{{ route('lap-rap', $slug)}}" style="position:absolute;right:0;bottom:2px">Tự chọn cấu hình</a>
                    </div>
                    <!-- PRODUCT LIST -->
                    <ul class="row product-list grid">
                        @foreach( $productArr as $product )
                        <?php 
                            if( $loaiSp->is_hover == 1){                                                        
                                $tmp = isset($product['thuoc_tinh']) ? $product['thuoc_tinh'] : "";
                                $thuocTinhArr = json_decode($tmp, true);                                                     
                            }
                            

                        ?>
                        <li class="col-xs-6 col-sm-4 col-md-3">
                            <div class="product-container">
                                @include('frontend.may-bo.per-product')
                            </div>
                        </li>
                    @endforeach
                        
                    </ul>
                    <!-- ./PRODUCT LIST -->                     
                </div>
                <!-- ./view-product-list-->
                
            </div>
            <!-- ./ Center colunm -->
        </div>
        <!-- ./row-->
    </div>
</div>
@endsection

@include('frontend.partials.footer')
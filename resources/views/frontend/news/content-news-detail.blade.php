@include('frontend.partials.meta')
@section('content')
<div class="columns-container">
    <div class="container" id="columns">
        <!-- breadcrumb -->
        <div class="breadcrumb clearfix">
            <a class="home" href="{{ route('home') }}" title="Trở về trang chủ">Trang chủ</a>
            <span class="navigation-pipe">&nbsp;</span>
            @if($detail->cate_id == 1)
            <a class="home" href="{{ route('news-list', 'tin-tuc') }}" title="Tin tức">Tin tức</a>            
            @elseif($detail->cate_id == 2)
            <a class="home" href="{{ route('chuong-trinh-khuyen-mai') }}" title="Khuyến mãi">Khuyến mãi</a>        
            @else
            <a class="home" href="{{ route('news-list', 'kinh-nghiem-hay') }}" title="Kinh nghiệm hay">Kinh nghiệm hay</a>            
            @endif
        </div>
        <!-- ./breadcrumb -->
        <!-- row -->
        <div class="row">
            <!-- Left colunm -->
            <div class="column col-xs-12 col-sm-3" id="left_column">
               
                <!-- Popular Posts -->
                <div class="block left-module">
                    <p class="title_block">Tin hot</p>
                    <div class="block_content">
                        <!-- layered -->
                        <div class="layered">
                            <div class="layered-content">
                                <ul class="blog-list-sidebar clearfix">
                                    @if( $hotArr )
                                    @foreach( $hotArr as $articles)
                                    <li>
                                        <div class="post-thumb">
                                            <a href="{{ route('news-detail', ['slug' => $articles->slug, 'id' => $articles->id]) }}"><img src="{{ Helper::showImage($articles->image_url) }}" alt="{{ $articles->title }}" style="min-height:50px"></a>
                                        </div>
                                        <div class="post-info">
                                            <h2 class="entry_title" style="text-align:justify;font-size:14px;font-weight:normal"><a href="{{ route('news-detail', ['slug' => $articles->slug, 'id' => $articles->id]) }}">{{ $articles->title }}</a></h2>
                                            <div class="post-meta">
                                                <span class="date"><i class="fa fa-calendar"></i> {{ date('d-m-Y', strtotime($articles->created_at)) }}</span>                                               
                                            </div>
                                        </div>
                                    </li>
                                    @endforeach
                                    @endif          
                                </ul>
                            </div>
                        </div>
                        <!-- ./layered -->
                    </div>
                </div>
                <!-- ./Popular Posts -->                        
                @include('frontend.partials.banner-slidebar')
               
            </div>
            <!-- ./left colunm -->
            <!-- Center colunm-->
            <div class="center_column col-xs-12 col-sm-9" id="center_column">
                <h1 class="page-heading">
                    <span class="page-heading-title2">{{ $detail->title }}</span>
                </h1>
                <article class="entry-detail">
                    <div class="entry-meta-data">
                        
                        <span class="date"><i class="fa fa-calendar"></i> {{ date('d-m-Y H:i', strtotime($detail->created_at)) }}</span>
                       
                    </div>                
                    <div class="content-text clearfix">
                       <?php echo $detail->content; ?>
                    </div>
                    <!--<div class="entry-tags">
                        <span>Tags:</span>
                        <a href="#">beauty,</a>
                        <a href="#">medicine,</a>
                        <a href="#">health</a>
                    </div>-->
                </article>
                <!-- Related Posts -->
                <div class="single-box">
                    <p style="font-size:20px;font-weight:bold">Tin khác</p>
                    <ul class="related-posts owl-carousel" data-dots="false" data-loop="true" data-nav = "true" data-margin = "30" data-autoplayTimeout="1000" data-autoplayHoverPause = "true" data-responsive='{"0":{"items":1},"600":{"items":2},"1000":{"items":3}}'>                       
                        @if( $otherArr )
                        @foreach( $otherArr as $articles)
                        <li class="post-item">
                            <article class="entry">
                                <div class="entry-thumb image-hover2">
                                    <a href="{{ route('news-detail', ['slug' => $articles->slug, 'id' => $articles->id]) }}">
                                        <img class="lazy" data-original="{{ Helper::showImage($articles->image_url) }}" alt="{{ $articles->title }}" style="max-height:145px">
                                    </a>
                                </div>
                                <div class="entry-ci">
                                    <h3 class="entry-title"><a href="{{ route('news-detail', ['slug' => $articles->slug, 'id' => $articles->id]) }}">{{ $articles->title }}</a></h3>
                                    <div class="entry-meta-data">                                       
                                        <span class="date">
                                            <i class="fa fa-calendar"></i> {{ date('d-m-Y', strtotime($articles->created_at)) }}
                                        </span>
                                    </div>
                                    <div class="entry-more">
                                        <a href="{{ route('news-detail', ['slug' => $articles->slug, 'id' => $articles->id]) }}">Chi tiết</a>
                                    </div>
                                </div>
                            </article>
                        </li>
                        @endforeach
                        @endif          
                    </ul>
                </div>               
           
            </div>
            <!-- ./ Center colunm -->
        </div>
        <!-- ./row-->
    </div>
</div>
@endsection
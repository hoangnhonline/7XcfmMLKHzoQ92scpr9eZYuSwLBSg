@include('frontend.partials.meta')
@section('content')
<div class="columns-container">
    <div class="container" id="columns">
        <!-- breadcrumb -->
        <div class="breadcrumb clearfix">
            <a class="home" href="{{ route('home') }}" title="Trở về trang chủ">Trang chủ</a>
            <span class="navigation-pipe">&nbsp;</span>
            <span class="navigation_page">{{ $cateDetail->name }}</span>
        </div>
        <!-- ./breadcrumb -->
        <!-- row -->
        <div class="row">        
            <!-- Left colunm -->
          <div class="col-sm-3" id="left_column">
              <!-- block category -->
              <div class="block left-module">
                  <p class="title_block">Danh mục</p>
                  <div class="block_content">
                      <!-- layered -->
                      <div class="layered layered-category">
                          <div class="layered-content">
                              <ul class="tree-menu">
                                  <li {{ $cateDetail->slug == 'tin-tuc' ? 'class=active' : '' }}><span></span><a href="{{ route('news-list', 'tin-tuc') }}">Tin tức</a></li>
                                  <li {{ $cateDetail->slug == 'khuyen-mai' ? 'class=active' : '' }}><span></span><a href="{{ route('chuong-trinh-khuyen-mai') }}">Khuyến mãi</a></li>
                                  <li {{ $cateDetail->slug == 'kinh-nghiem-hay' ? 'class=active' : '' }}><span></span><a href="{{ route('news-list', 'kinh-nghiem-hay') }}">Kinh nghiệm hay</a></li>                                
                              </ul>
                          </div>
                      </div>
                      <!-- ./layered -->
                  </div>
              </div>
              <!-- ./block category  -->
              @include('frontend.partials.banner-slidebar')
          </div>    
            <!-- Center colunm-->
            <div class="center_column col-xs-9 col-sm-9" id="center_column">
                <h1 class="page-heading" style="border-bottom:none !important;">
                    <span class="page-heading-title2">{{ $cateDetail->name }}</span>
                </h1>        
                 @if( $articlesArr )       
                <ul class="blog-posts">
                   
                    @foreach( $articlesArr as $articles )
                    <li class="post-item">
                        <article class="entry">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="entry-thumb image-hover2">
                                        <a href="{{ route('news-detail', ['slug' => $articles->slug, 'id' => $articles->id]) }}">
                                            <img class="lazy" data-original="{{ Helper::showImage($articles->image_url) }}" alt="{{ $articles->title }}">
                                        </a>
                                    </div>
                                </div>
                                <div class="col-sm-8">
                                    <div class="entry-ci">
                                        <h2 class="entry-title"><a href="{{ route('news-detail', ['slug' => $articles->slug, 'id' => $articles->id]) }}">{{ $articles->title }}</a></h2>
                                        <div class="entry-meta-data">
                                            <!--<span class="author">
                                            <i class="fa fa-user"></i> 
                                            by: <a href="#">Admin</a></span>
                                            <span class="cat">
                                                <i class="fa fa-folder-o"></i>
                                                <a href="#">News, </a>
                                                <a href="#">Promotions</a>
                                            </span>                                           -->
                                            <span class="date"><i class="fa fa-calendar"></i> {{ date('d-m-Y', strtotime($articles->created_at)) }}</span>
                                        </div>
                                        <div class="entry-excerpt">
                                            {{ $articles->description }}
                                        </div>
                                        <div class="entry-more">
                                            <a href="{{ route('news-detail', ['slug' => $articles->slug, 'id' => $articles->id]) }}">Chi tiết</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </li>     
                    @endforeach
                              
                </ul>
                @else
                    <p>Dữ liệu đang cập nhật.</p>
                    @endif    
                <div class="sortPagiBar clearfix">
                    <div class="bottom-pagination">
                        <nav>
                          {{ $articlesArr->links() }}
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
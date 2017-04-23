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
            <a class="home" href="#" title="Return to Home">Home</a>            
            <span class="navigation-pipe"><a href="{{ route($slug) }}">{{ $title }}</a></span>
            <span class="navigation-pipe">&nbsp;</span>
            <span class="navigation_page">Tùy chọn cấu hình</span>
        </div>
        <!-- ./breadcrumb -->
        
        <!-- page heading-->
        <h2 class="page-heading">
            <span class="page-heading-title3">Tùy chọn cấu hình: "{{ $title }}"</span>
        </h2>
        <!-- ../page heading-->
        
        <div class="page-content">
          <form action="{{ route('mua-lap-rap') }}" method="POST">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="choose-config-page">
              @if($cateList->count() > 0)
                @foreach($cateList as $cate)
                <?php $cate_id = $cate->id ;?>         
                <h4 class="tit-2">{{ $cate->name }}</h4>
                <div class="box-area clearfix">
                   
                    @if($cate_id == 35)
                              
                    @endif
                    <div id="data-{{ $cate->slug }}">
                      <input type="hidden" id="value-{{ $cate->slug }}" value="0">
                      <ul class="config-list radio">
                        <li class="radio"><label class="text-bold"><input type="radio" class="select-lk radio-{{ $cate->slug }}" data-type="{{ $cate->slug }}" name="select[{{ $cate->id }}]" value="0"> Không chọn</label></li>
                        @if(isset($spFreeList[$cate_id]))
                        @foreach($spFreeList[$cate_id] as $sp)
                        <?php 
                        $price = $sp->is_sale == 1 && $sp->price_sale  > 0 ? $sp->price_sale : $sp->price;
                        ?>
                        <li class="radio"><label class="text-bold"><input type="radio" class="select-lk radio-{{ $cate->slug }}" data-type="{{ $cate->slug }}" name="select[{{ $cate->id }}]" value="{{ $sp->id }}"> {{ $sp->name }}</label> <span class="price">[ {{ number_format($price) }} đ ]  </span></li>
                        
                        @endforeach
                        @endif
                      </ul> 
                      </div>                   
                </div>
                @endforeach
              @endif             
              
              <div class="button-group-action">
                <button type="submit" class="btn">Đồng ý mua các sản phẩm đã chọn ở trên</button>
              </div>
            </form>
            </div> <!-- /.compare-page -->            
        </div>
    </div>
</div>
@endsection

@include('frontend.partials.footer')

@section('javascript_page')
<script type="text/javascript">	
  $(document).on('ifChecked', '.select-lk', function(){
      var obj = $(this);
      var value = obj.val();
      var type = obj.attr('data-type');
      $('#value-' + type).val(value);

      if(value > 0){ // co chon 
        if( type == "mainboard"){
            // get RAM
            if($('#value-ram').val() == 0){
              getRelated(value, 'ram'); 
            }
            if($('#value-card-man-hinh').val() == 0){
              getRelated(value, 'vga'); 
            }
            if($('#value-cpu').val() == 0){
              getRelated(value, 'cpu'); 
            }
        }else if( type == "card-man-hinh"){
            // get RAM
            if($('#value-ram').val() == 0){
              getRelated(value, 'ram'); 
            }
            if($('#value-mainboard').val() == 0){
              getRelated(value, 'vga'); 
            }
            if($('#value-cpu').val() == 0){
              getRelated(value, 'cpu'); 
            }
        }else if( type == "ram"){
            // get RAM
            if($('#value-mainboard').val() == 0){
              getRelated(value, 'ram'); 
            }
            if($('#value-card-man-hinh').val() == 0){
              getRelated(value, 'vga'); 
            }
            if($('#value-cpu').val() == 0){
              getRelated(value, 'cpu'); 
            }
        }else if( type == "cpu"){
            // get RAM
            if($('#value-ram').val() == 0){
              getRelated(value, 'ram'); 
            }
            if($('#value-card-man-hinh').val() == 0){
              getRelated(value, 'vga'); 
            }
            if($('#value-mainboard').val() == 0){
              getRelated(value, 'cpu'); 
            }
        }
      }
    });
  function getRelated(sp_id, type) {
        $.ajax({
          url: "{{route('lay-sp-tuong-thich')}}",
          method: "POST",
          data : {
            sp_id: sp_id,
            type : type,
            _token : "{{ csrf_token() }}"
          },
          success : function(data){
            if(type == "vga"){
              $('#data-card-man-hinh').html(data);
            }else{
              $('#data-' + type).html(data);  
            }
            
            $('input').iCheck({
              checkboxClass: 'icheckbox_square-red',
              radioClass: 'iradio_square-red',
              increaseArea: '20%' // optional
            });
          },
          error : function(e) {
            //alert( JSON.stringify(e));
          }
        });
      }
</script>
@endsection
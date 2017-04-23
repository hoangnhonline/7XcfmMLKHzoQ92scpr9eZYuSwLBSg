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
            <span class="navigation-pipe">&nbsp;</span>
            <span class="navigation_page">Ráp máy tính online</span>
        </div>
        <!-- ./breadcrumb -->
        
        <!-- page heading-->
        <h2 class="page-heading">
            <span class="page-heading-title3">Ráp máy tính online</span>
        </h2>
        <!-- ../page heading-->
        
        <!-- row -->
        <div class="row page-content buy-product-config">

            <p class="col-xs-12 txt-top"><i class="fa fa-remove"></i> Không có sản phẩn nào tương thích</p>

            <!-- Left colunm -->
            <div class="column col-xs-12 col-sm-3" id="left_column">
                <nav class="nav-choose-config">
                    <ul class="level1">
                        @if($cateList->count() > 0)
                        <?php $countParent = 0; ?>
                        @foreach($cateList as $cate)
                        <?php $countParent++; ?>
                        <li><a href="javascript:void(0)" class="choose-parent {{ $cate->slug }}" data-slug="{{ $cate->slug }}" data-value="{{ $countParent }}">{{ $cate->name }}</a></li>
                        @endforeach
                        @endif
                        
                    </ul>
                </nav><!-- ./layered -->
            </div>
            <!-- ./left colunm -->
            <!-- Center colunm-->
            <div class="center_column col-xs-12 col-sm-9" id="center_column">
              <form action="{{ route('mua-lap-rap') }}" method="POST" id="formLapRap">
                @if($cateList->count() > 0)
                @foreach($cateList as $cate)
                <?php $cate_id = $cate->id ;?>       
                <!-- config-list-->
                <div class="choose-config-list {{ $cate->slug }}" style="display:none" >
                    <input type="hidden" id="value-{{ $cate->slug }}" value="0">
                    <h3 class="tit">HÃY CHỌN {{ $cate->name }}</h3>
                    <div class="row header-box hidden-xs">
                        <div class="td col-sm-{{ $cate_id == 35 ? 6 : 9 }}">Sản phẩm</div>
                        @if($cate_id == 35)
                        <div class="td col-sm-3">Số lượng</div>
                        @endif
                        <div class="td col-sm-3 price">Thành tiền</div>
                    </div>
                    <div id="data-{{ $cate->slug }}">
                    <ul class="row" >                        
                        @if(isset($spFreeList[$cate_id]))
                        @foreach($spFreeList[$cate_id] as $sp)
                        <?php 
                        $price = $sp->is_sale == 1 && $sp->price_sale  > 0 ? $sp->price_sale : $sp->price;
                        ?>
                        <li>
                            <div class="col-sm-{{ $cate_id == 35 ? 6 : 9 }} box-name"><label><input type="radio" class="select-lk radio-{{ $cate->slug }}" data-type="{{ $cate->slug }}" name="select[{{ $cate->id }}]" value="{{ $sp->id }}"> {{ $sp->name }}</label></div>
                            @if($cate_id == 35)
                            <div class="col-sm-3 clearfix quantity">
                                <p class="txt-name hidden-lg">Số lượng:</p>                                
                                  <select class="form-control" style="width:70px;margin:auto" name="soluong[{{ $sp->id }}]">
                                     @for($i = 1; $i <= $sp->so_luong_ton; $i ++)
                                      <option value="{{ $i }}">
                                        {{ $i }}
                                      </option>
                                      @endfor
                                  </select>                                                              
                            </div>
                            @else
                            <input type="hidden" name="soluong[{{ $sp->id }}]" value="1">
                            @endif
                            <div class="col-sm-3 clearfix price">
                                <p class="txt-name hidden-lg">Giá:</p>
                                <span class="txt-num">{{ number_format($price) }} đ</span>
                            </div>
                            <input type="hidden" name="price[{{ $sp->id }}]" value="{{ $price }}">
                            <input type="hidden" name="name[{{ $sp->id }}]" value="{{ $sp->name }}">
                        </li>   
                        @endforeach
                        @endif
                                              
                    </ul>
                    </div>
                    <p class="error" style="display:none">Vui lòng chọn 1 mục.</p>
                    <div class="button-group text-right mt10 pb10">                       
                        <button type="button" class="btn btn-primary btn-sm btnOK btnAction" data-slug="{{ $cate->slug }}" disabled="disabled">Tiếp tục <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></button>
                    </div>
                </div>
                <!-- ./config-list-->
                @endforeach
                @endif
                <div class="button-group-action">
                    <button type="button" id="btnReset" style="display:none;"><i class="fa fa-power-off" aria-hidden="true"></i> Chọn lại</button>
                    <button type="button" class="btn" id="btnPreview" disabled="disabled" ><i class="fa fa-eye" aria-hidden="true"></i> Xem cấu hình</button>
                  </div>
                  {{ csrf_field() }}
            </form>
            </div>
            <!-- ./ Center colunm -->
        </div>
        <!-- ./row-->
    </div>
</div>
<!-- Modal -->
<div id="xemCauHinhModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content" id="dataCauHinh">
      
    </div>

  </div>
</div>
@endsection

@include('frontend.partials.footer')

@section('javascript_page')
<script type="text/javascript">	
$(document).on('click', '#btnAddCartLapRap', function(){
    $('#formLapRap').submit();
});
$(document).on('click', '#btnReset, #btnChonLai', function(){
  window.location.reload();
});
  $(document).ready(function(){
    $('#btnPreview').click(function(){
      $.ajax({
        url : "{{ route('xem-cau-hinh') }}",
        type : 'POST',
        data : {
          cau_hinh : $('#formLapRap').serialize()
        },
        beforeSend : function(){

        },
        success : function(data){
          $('#dataCauHinh').html(data);
          $('#xemCauHinhModal').modal('show');
        }
      });
    });    
    $('.choose-config-list').eq(0).show();
    
    $('.choose-parent').eq(0).addClass('showing');

    $('a.choose-parent').click(function(){

      var obj = $(this);
      var thu_tu_parent = obj.data('value');      
      var so_da_chon = $('.select-lk:checked').length;
      if(so_da_chon > 0){
        $('#btnReset').show();
      }     
      if(thu_tu_parent-1 == so_da_chon){
        $('a.choose-parent').removeClass('showing');
        obj.addClass('showing');
        $('.choose-config-list').hide();
        $('.' + obj.data('slug')).show();      
        if($('.' + obj.data('slug') + ' input.select-lk').length == 0){
          $('.btnAction').hide();
        }else{
          $('.btnAction').show();
        }
        obj.attr('data-value', 0);
      }
    });
    $('button.btnOK').click(function(){
      if($('.select-lk:checked').length > 0){
        $('#btnReset').show();
      }
      var objContainer = $(this).parents('.choose-config-list');      
      //return false;
      var obj = $('a.showing');      
      obj.parent().next().find('a').addClass('showing').click();
      obj.removeClass('showing');

      $('html, body').animate({
          scrollTop: $(".breadcrumb").offset().top
      });
      
    });
  });
  $(document).on('ifChecked', '.select-lk', function(){
     
      var obj = $(this);
      var value = obj.val();
      var type = obj.attr('data-type');      
      if($('.select-lk:checked').length < 7){ //da chon du 7 linh kien
        obj.parents('.choose-config-list').find('.btnOK').removeAttr('disabled');  
      }else{ // chua chon du 7 linh kien
        obj.parents('.choose-config-list').find('.btnOK').hide();
        $('#btnPreview').removeAttr('disabled');  
      }      
      $('#value-' + type).val(value);      
      $('a.choose-parent[data-slug=' + type + ']').removeClass('no-sp').addClass('have-sp');
    
      if( type == "bo-mach-chinh"){
          getRelated(value, 'bo-nho', type);
          getRelated(value, 'card-man-hinh', type); 
          getRelated(value, 'bo-vi-xu-ly', type);
      }
      if( type == "card-man-hinh"){
          getRelated(value, 'nguon', type);
          getRelated(value, 'thung-may-case', type);
      }      
    });
  function getRelated(sp_id, type, dataSlug) {
        $.ajax({
          url: "{{ route('lay-sp-tuong-thich') }}",
          method: "POST",
          data : {
            sp_id: sp_id,
            type : type,
            _token : "{{ csrf_token() }}"
          },
          success : function(data){
            
            $('#data-' + type).html(data);  
            
            if(data == "<label>Không có sản phẩm tương thích với lựa chọn của bạn.</label>"){
             
              $('a.choose-parent[data-slug=' + type + ']').removeClass('showing').addClass('no-sp');
                           
            }else{
              $('input').iCheck({
                checkboxClass: 'icheckbox_square-red',
                radioClass: 'iradio_square-red',
                increaseArea: '20%' // optional
              });              
              $('a.choose-parent[data-slug=' + type + ']').removeClass('no-sp');          
              
            }
          }
        });
      }
</script>
@endsection
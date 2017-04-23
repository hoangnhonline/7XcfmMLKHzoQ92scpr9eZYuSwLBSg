@extends('frontend.layout')

@section('header')
  @include('frontend.partials.main-header')
  @include('frontend.partials.home-menu')
@endsection

@include('frontend.detail.content')

@include('frontend.partials.footer')

@section('javascript_page')


	<script type="text/javascript">
		$(document).ready(function() {
      $('.btnMuaDetail').click(function() {
        var product_id = $(this).attr('product-id');
        add_product_to_cart(product_id);
      });

      function add_product_to_cart(product_id) {
        $.ajax({
          url: "{{route('them-sanpham')}}",
          method: "POST",
          data : {
            id: product_id
          },
          success : function(data){
            location.href = '{{route("gio-hang")}}';
          },
          error : function(e) {
            alert( JSON.stringify(e));
          }
        });
      }

		});
	</script>
@endsection
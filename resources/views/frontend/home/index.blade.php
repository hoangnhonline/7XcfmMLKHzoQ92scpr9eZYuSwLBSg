@extends('frontend.layout')
  @section('header')
    @include('frontend.partials.main-header')
    @include('frontend.partials.home-menu')
  @endsection
  
  @include('frontend.home.content')

  @include('frontend.home.slider')

  @include('frontend.partials.footer')

  @section('javascript')
  	<script type="text/javascript">
  		$(document).ready(function() {
        $('.add_to_cart_button, .btnorder').click(function() {
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
@extends('frontend.layout')

@section('header')
    @include('frontend.partials.main-header')
    @include('frontend.partials.home-menu')
  @endsection
  
@include('frontend.compare.content')

@include('frontend.partials.footer')

@section('javascript')

<script type="text/javascript" src="{{ URL::asset('assets/lib/jquery.elevatezoom.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('assets/js/jquery.actual.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('assets/lib/jquery.elevatezoom.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('assets/lib/jquery-ui/jquery-ui.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('assets/lib/fancyBox/jquery.fancybox.js') }}"></script>
	<script type="text/javascript">
		$(document).ready(function() {
      $('.compare-buy-btn').click(function() {
        var product_id = $(this).attr('product-id');
        add_product_to_cart(product_id);
      });

      function add_product_to_cart(product_id) {
        $.ajax({
          url: "{{ route('them-sanpham') }}",
          method: "POST",
          data : {
            id: product_id
          },
          success : function(data){
            location.href = '{{ route("gio-hang") }}';
          },
          error : function(e) {
            alert( JSON.stringify(e));
          }
        });
      }

		});
	</script>
@endsection
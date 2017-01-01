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
@endsection
@extends('frontend.layout')
  @section('header')
    @include('frontend.partials.main-header')
    @include('frontend.partials.home-menu')
  @endsection
  
  @include('frontend.news.content')

  @include('frontend.partials.footer')

  @section('javascript_page')
  
@endsection
@extends('frontend.layout')
  @section('header')
    @include('frontend.partials.main-header')
    @include('frontend.partials.home-menu')
  @endsection
  
@include('frontend.home.content')

@include('frontend.home.slider')

@include('frontend.partials.footer')
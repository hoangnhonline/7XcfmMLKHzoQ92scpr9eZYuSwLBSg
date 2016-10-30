@extends('frontend.layout')
  @section('header')
    @include('frontend.partials.main-header')
    @include('frontend.partials.home-menu')
  @endsection
  
  @include('frontend.pages.content')

  @include('frontend.partials.footer')
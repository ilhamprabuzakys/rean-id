@extends('landing.layouts.template')
@include('landing.components.flatpickr')
@include('dashboard.components.leaflet')
@section('header-class', 'navbar-link-white')
{{-- @section('navbar')
   <img src="{{ asset('assets/img/rean-text-logo-dark.png') }}" alt="" style="height: 30px;
   width: 140px;">
@endsection --}}
@section('content')
<livewire:landing.ebooks.ebook-show :$ebook/>
@endsection
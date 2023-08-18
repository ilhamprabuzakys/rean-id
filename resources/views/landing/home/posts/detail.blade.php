@extends('landing.layouts.template')
@section('navbar')
   <img src="{{ asset('assets/img/rean-text-logo-dark.png') }}" alt="" class="img-fluid">
@endsection
@section('content')
   <livewire:landing.posts.post-detail :$post/>
@endsection

@section('footer')
   @include('landing.home.posts.partials.footer')
@endsection
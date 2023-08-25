@extends('landing.layouts.template')
@include('landing.components.flatpickr')
@include('dashboard.components.leaflet')
@section('header-class', 'navbar-link-white')
@section('content')
<livewire:landing.events.event-show :$event/>
@endsection
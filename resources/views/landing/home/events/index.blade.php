@extends('landing.layouts.template')
@include('landing.components.flatpickr')
@section('header-class', 'navbar-link-white')
@section('content')
<livewire:landing.events.event-index />
@endsection
@extends('dashboard.template.dashboard')
@include('dashboard.components.flatpickr')
@section('content')
   <livewire:dashboard.logs.log-index />
@endsection

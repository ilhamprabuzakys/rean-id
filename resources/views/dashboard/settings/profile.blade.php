@extends('dashboard.template.dashboard')
@section('content')
<livewire:dashboard.profile.profile-index />
@endsection
@push('page-js')
{{-- <script src='{{ asset(' assets/dashboard/materialize/assets/js/pages-profile.js') }}'></script> --}}
@endpush
@push('page-css')
<link rel="stylesheet" href="{{ asset('assets/dashboard/materialize/assets/vendor/css/pages/page-profile.css') }}">
@endpush
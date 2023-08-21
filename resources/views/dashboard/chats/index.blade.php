@extends('dashboard.template.dashboard')
@include('dashboard.components.flatpickr')
@include('dashboard.components.leaflet')
@include('dashboard.components.carousel')
@section('content')
   <h4 class="fw-bold py-3 mb-4">
      <a class="text-muted fw-light" href="{{ route('dashboard') }}">Home /</a>
      Layanan Chat
   </h4>
   <livewire:dashboard.chats.chat-main />
@endsection
@push('scripts')
   <script>
      $("#filter_date").flatpickr({
         mode: "range",
         enableTime: true,
         minDate: "today",
         minTime: "06:00",
         maxTime: "22:00",
      });
   </script>
@endpush
@push('vendor-js')
   <script src="{{ asset('assets/dashboard/materialize/assets/vendor/libs/bootstrap-maxlength/bootstrap-maxlength.js') }}"></script>
@endpush
@push('vendor-css')
<link rel="stylesheet" href="{{ asset('assets/dashboard/materialize/assets/vendor/libs/typeahead-js/typeahead.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/dashboard/materialize/assets/vendor/libs/bootstrap-maxlength/bootstrap-maxlength.css') }}" />
@endpush
@push('page-js')
<script src="{{ asset('assets/dashboard/materialize/assets/js/app-chat.js') }}"></script>
@endpush
@push('page-css')
<link rel="stylesheet" href="{{ asset('assets/dashboard/materialize/assets/vendor/css/pages/app-chat.css') }}">
@endpush

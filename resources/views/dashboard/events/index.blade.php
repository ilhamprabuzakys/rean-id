@extends('dashboard.template.dashboard')
@include('dashboard.components.flatpickr')
@include('dashboard.components.leaflet')
@include('dashboard.components.carousel')
@section('content')
<h4 class="fw-bold py-3 mb-4">
   <a class="text-muted fw-light" href="{{ route('dashboard') }}">Home /</a>
   Daftar Events
</h4>
<livewire:dashboard.events.event-index />
@endsection
@push('scripts')
<script>
   $("#filter_date").flatpickr({
         mode: "range",
      });
   $(".edit-tanggal-range").flatpickr({
         mode: "range",
         enableTime: true,
         minDate: "today",
         minTime: "06:00",
         maxTime: "22:00",
   });
</script>
@endpush
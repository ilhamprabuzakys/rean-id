@extends('dashboard.template.dashboard')
@include('dashboard.components.flatpickr')
@include('dashboard.components.leaflet')
@section('content')
   <h4 class="fw-bold py-3 mb-4">
      <a class="text-muted fw-light" href="{{ route('dashboard') }}">Home /</a>
      <a class="text-muted fw-light" href="{{ route('events.index') }}">Daftar Events /</a>
      Buat Event
   </h4>
   <livewire:dashboard.events.event-update :$event :user="auth()->user()->id" />
@endsection
@push('scripts')
   <script>
      $("#merge_date").flatpickr({
         mode: "range",
         enableTime: true,
         minDate: "today",
         minTime: "06:00",
         maxTime: "22:00",
      });

      window.addEventListener('close-modal', event => {
         $('#locationPicker').modal('hide');
      })
   </script>
@endpush


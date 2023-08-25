@extends('landing.layouts.template')
@include('landing.components.flatpickr')
@section('header-class', 'navbar-link-white')
@section('content')
<livewire:landing.ebooks.ebook-index />
@endsection
@push('scripts')
<script>
   $("#filter_date").flatpickr({
      mode: "range",
   });
</script>
@endpush
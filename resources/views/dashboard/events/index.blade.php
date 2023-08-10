@extends('dashboard.template.dashboard')
@include('dashboard.components.flatpickr')
@section('content')
   <!-- start page title -->
   <h4 class="fw-bold py-3 mb-4">
      <a class="text-muted fw-light" href="{{ route('dashboard') }}">Home /</a>
      Daftar Events
   </h4>
   <!-- end page title -->

   <livewire:dashboard.events.event-index />
@endsection
@push('scripts')
  {{--  <script src="{{ asset('assets/dashboard/materialize/assets/bs-date-range/bootstrap-daterangepicker.js') }}"></script> --}}
   {{-- <script src="{{ asset('assets/dashboard/materialize/assets/vendor/libs/bootstrap-datepicker/bootstrap-datepicker.js') }}"></script> --}}
   <script>

      $("#merge_date").flatpickr({
         mode: "range",
         enableTime: true,
         minDate: "today",
         minTime: "06:00",
         maxTime: "22:00",
      });
      
      $("#filter_date").flatpickr({
         mode: "range",
         enableTime: true,
         minDate: "today",
         minTime: "06:00",
         maxTime: "22:00",
      });

      window.addEventListener('close-modal', event => {
         $('#createEventModal').modal('hide');
         $('#editEventModal').modal('hide');
         $('#deleteEventModal').modal('hide');
      })

      window.addEventListener('close-offcanvas', event => {
         $('#createEvent').offcanvas('hide');
         $('#editEvent').offcanvas('hide');
         $('#deleteEvent').offcanvas('hide');
      })

      document.addEventListener('DOMContentLoaded', function() {

         // Fungsi untuk menampilkan modal ketika tombol diklik
         const locationPickerBtn = document.getElementById('locationPickerBtn');
         locationPickerBtn.addEventListener('click', function(event) {
            event.preventDefault();

            const modalEl = document.getElementById('locationPickerModal');
            const modalInstance = bootstrap.Modal.getOrCreateInstance(modalEl);
            modalInstance.show();
         });

         // Menghentikan perilaku default dari tombol-tombol yang memiliki atribut data-bs-dismiss="modal"
         // dan menutup modal dengan JavaScript
         const dismissButtons = document.querySelectorAll('[data-bs-dismiss="modal"]');
         dismissButtons.forEach(btn => {
            btn.addEventListener('click', function(event) {
               event.preventDefault();
               event.stopPropagation();

               const modalEl = btn.closest('.modal');
               const modalInstance = bootstrap.Modal.getInstance(modalEl);

               // Tutup modal
               if (modalInstance) {
                  modalInstance.hide();
               }
            });
         });

         // Pastikan ketika modal ditutup, accordion tetap dalam keadaan `show`
         const modal = document.getElementById('locationPickerModal');
         const accordion = document.getElementById('createEventForm');

         modal.addEventListener('hidden.bs.modal', function() {
            accordion.classList.add('show');
         });

      });
   </script>
@endpush
@push('styles')
   <link rel="stylesheet" href="{{ asset('assets/dashboard/materialize/assets/vendor/libs/leaflet/leaflet.css') }}">
   <script src="{{ asset('assets/dashboard/materialize/assets/vendor/libs/leaflet/leaflet.js') }}"></script>
   <link rel="stylesheet" href="https://unpkg.com/leaflet-geosearch@ 3.8.0/dist/geosearch.css" />
   <script src="https://unpkg.com/leaflet-geosearch@3.8.0/dist/geosearch.umd.js"></script>
   <!-- Load Esri Leaflet from CDN -->
   <script src="https://unpkg.com/esri-leaflet@3.0.10/dist/esri-leaflet.js"></script>
   <!-- Load Esri Leaflet Vector from CDN -->
   <script src="https://unpkg.com/esri-leaflet-vector@4.0.1/dist/esri-leaflet-vector.js" crossorigin=""></script>
   <link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder@2.4.0/dist/Control.Geocoder.css" />
   <script src="https://unpkg.com/leaflet-control-geocoder@2.4.0/dist/Control.Geocoder.js"></script>

   {{-- Date Range Picker --}}
   {{-- <link rel="stylesheet" href="{{ asset('assets/dashboard/materialize/assets/vendor/libs/bootstrap-datepicker/bootstrap-datepicker.css') }}"/>
   <link rel="stylesheet" href="{{ asset('assets/dashboard/materialize/assets/vendor/libs/bootstrap-daterangepicker/bootstrap-daterangepicker.css') }}"/> --}}
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet-search@2.9.7/dist/leaflet-search.min.css" />
   <script src="https://cdn.jsdelivr.net/npm/leaflet-search@2.9.7/dist/leaflet-search.min.js"></script>

@endpush

@extends('dashboard.template.dashboard')
@include('dashboard.components.flatpickr')
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

      /* document.addEventListener('DOMContentLoaded', function() {

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

      }); */
   </script>
@endpush


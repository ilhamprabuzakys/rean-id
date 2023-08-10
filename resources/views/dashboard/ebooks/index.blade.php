@extends('dashboard.template.dashboard')
@include('dashboard.components.flatpickr')
@section('content')
   <!-- start page title -->
   <h4 class="fw-bold py-3 mb-4">
      <a class="text-muted fw-light" href="{{ route('dashboard') }}">Home /</a>
      Daftar Ebook
   </h4>
   <!-- end page title -->

   <livewire:dashboard.ebooks.ebook-index :user="auth()->user()" />
@endsection
@push('scripts')
   <script src="https://cdn.ckeditor.com/ckeditor5/38.1.1/classic/ckeditor.js"></script>
   {{-- <script src="https://cdn.ckeditor.com/ckeditor5/38.1.1/super-build/ckeditor.js"></script> --}}
   <script>
      /* ClassicEditor
         .create(document.querySelector('#description'))
         .catch(error => {
            console.error(error);
         }); */
   </script>
   <script>
      $("#published_at").flatpickr();
      $("#filter_date").flatpickr({
         mode: "range",
      });

      window.addEbookListener('close-modal', event => {
         $('#deleteEbookModal').modal('hide');
      })

      // document.addEbookListener('DOMContentLoaded', function() {

      //    // Fungsi untuk menampilkan modal ketika tombol diklik
      //    const locationPickerBtn = document.getElementById('locationPickerBtn');
      //    locationPickerBtn.addEbookListener('click', function(event) {
      //       event.preventDefault();

      //       const modalEl = document.getElementById('locationPickerModal');
      //       const modalInstance = bootstrap.Modal.getOrCreateInstance(modalEl);
      //       modalInstance.show();
      //    });

      //    // Menghentikan perilaku default dari tombol-tombol yang memiliki atribut data-bs-dismiss="modal"
      //    // dan menutup modal dengan JavaScript
      //    const dismissButtons = document.querySelectorAll('[data-bs-dismiss="modal"]');
      //    dismissButtons.forEach(btn => {
      //       btn.addEbookListener('click', function(event) {
      //          event.preventDefault();
      //          event.stopPropagation();

      //          const modalEl = btn.closest('.modal');
      //          const modalInstance = bootstrap.Modal.getInstance(modalEl);

      //          // Tutup modal
      //          if (modalInstance) {
      //             modalInstance.hide();
      //          }
      //       });
      //    });

      //    // Pastikan ketika modal ditutup, accordion tetap dalam keadaan `show`
      //    const modal = document.getElementById('locationPickerModal');
      //    const accordion = document.getElementById('createEbookForm');

      //    modal.addEbookListener('hidden.bs.modal', function() {
      //       accordion.classList.add('show');
      //    });

      // });
   </script>
@endpush
@push('scripts')
   <script src="https://cdn.ckeditor.com/ckeditor5/38.1.1/classic/ckeditor.js"></script>
   {{-- <script src="https://cdn.ckeditor.com/ckeditor5/38.1.1/super-build/ckeditor.js"></script> --}}
   <script>
      ClassicEditor
         .create(document.querySelector('#body-editor'))
         .catch(error => {
            console.error(error);
         });
   </script>
@endpush

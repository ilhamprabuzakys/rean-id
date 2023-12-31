@push('styles')
<link rel="stylesheet" href="{{ asset('assets/dashboard/materialize/assets/vendor/libs/flatpickr/flatpickr.css') }}">
{{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css"> --}}
@endpush
@push('scripts')
<script src="{{ asset('assets/dashboard/materialize/assets/vendor/libs/flatpickr/flatpickr.js') }}"></script>
{{-- <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script> --}}
<script>
   let pickr = document.querySelectorAll("[data-flatpickr]");
   pickr.forEach(el => {
       const t = {
           ...el.dataset.flatpickr ? JSON.parse(el.dataset.flatpickr) : {},
       }
       new flatpickr(el, t)
   }
   );
</script>
@endpush
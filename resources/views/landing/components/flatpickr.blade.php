@push('styles')
<link rel="stylesheet" href="{{ asset('assets/landing/assan/assets/vendor/node_modules/css/flatpickr.min.css') }}">
@endpush
@push('scripts')
<script src="{{ asset('assets/landing/assan/assets/vendor/node_modules/js/flatpickr.min.js') }}"></script>
<script>
   let pickr = document.querySelectorAll("[data-flatpickr]");
   pickr.forEach(el => {
       const t = {
           ...el.dataset.flatpickr ? JSON.parse(el.dataset.flatpickr) : {},
       }
       new flatpickr(el, t)
   }
   );

//    let pickr = document.querySelectorAll("[data-flatpickr]");
//     pickr.forEach(el => {
//         const t = {
//             ...el.dataset.flatpickr ? JSON.parse(el.dataset.flatpickr) : {},
//             dateFormat: "Y-m-d \\s\\a\\m\\p\\a\\i j, Y-m-d" // Atur format tanggal di sini
//         };
//         new flatpickr(el, t);
//     });
</script>
@endpush
@push('head')
   <!-- DataTable CSS -->
   <link rel="stylesheet" href="{{ asset('assets/dashboard/materialize/assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}">
   <link rel="stylesheet" href="{{ asset('assets/dashboard/materialize/assets/vendor/libs/datatables-select-bs5/select.bootstrap5.css') }}">
   <link rel="stylesheet" href="{{ asset('assets/dashboard/materialize/assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}"/>
   <link rel="stylesheet" href="{{ asset('assets/dashboard/materialize/assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css') }}"/>
   <link rel="stylesheet" href="{{ asset('assets/dashboard/materialize/assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css') }}"/>
   <link rel="stylesheet" href="{{ asset('assets/dashboard/materialize/assets/vendor/libs/flatpickr/flatpickr.css') }}"/>
   <!-- Row Group CSS -->
   <link rel="stylesheet" href="{{ asset('assets/dashboard/materialize/assets/vendor/libs/datatables-rowgroup-bs5/rowgroup.bootstrap5.css') }}"/>
   <!-- Form Validation -->
   <link rel="stylesheet" href="{{ asset('assets/dashboard/materialize/assets/vendor/libs/formvalidation/dist/css/formValidation.min.css') }}"/>
@endpush
@push('page-js')
   <script src="{{ asset('assets/dashboard/materialize/assets/js/tables-datatables-basic.js') }}"></script>
@endpush
@push('vendor-js')
   <script src="{{ asset('assets/dashboard/materialize/assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>
   <!-- Flat Picker -->
   <script src="{{ asset('assets/dashboard/materialize/assets/vendor/libs/moment/moment.js') }}"></script>
   <script src="{{ asset('assets/dashboard/materialize/assets/vendor/libs/flatpickr/flatpickr.js') }}"></script>
   <!-- Form Validation -->
   <script src="{{ asset('assets/dashboard/materialize/assets/vendor/libs/formvalidation/dist/js/FormValidation.min.js') }}"></script>
   <script src="{{ asset('assets/dashboard/materialize/assets/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js') }}"></script>
   <script src="{{ asset('assets/dashboard/materialize/assets/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js') }}"></script>
   {{-- {{ $dataTable->scripts(attributes: ['type' => 'module']) }} --}}
   {{-- @include('dashboard.categories.script') --}}
@endpush
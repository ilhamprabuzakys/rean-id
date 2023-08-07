@extends('dashboard.template.dashboard')
@push('vendor-css')
   <link rel="stylesheet" href="{{ asset('assets/dashboard/materialize/assets/vendor/libs/select2/select2.css') }}" />
   <link rel="stylesheet" href="{{ asset('assets/dashboard/materialize/assets/vendor/libs/formvalidation/dist/css/formValidation.min.css') }}" />
   <link rel="stylesheet" href="{{ asset('assets/dashboard/materialize/assets/vendor/libs/animate-css/animate.css') }}" />
   <link rel="stylesheet" href="{{ asset('assets/dashboard/materialize/assets/vendor/libs/sweetalert2/sweetalert2.css') }}" />
@endpush
@push('vendor-js')
   <script src="{{ asset('assets/dashboard/materialize/assets/vendor/libs/select2/select2.js') }}"></script>
   <script src="{{ asset('assets/dashboard/materialize/assets/vendor/libs/formvalidation/dist/js/FormValidation.min.js') }}"></script>
   <script src="{{ asset('assets/dashboard/materialize/assets/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js') }}"></script>
   <script src="{{ asset('assets/dashboard/materialize/assets/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js') }}"></script>
   <script src="{{ asset('assets/dashboard/materialize/assets/vendor/libs/cleavejs/cleave.js') }}"></script>
   <script src="{{ asset('assets/dashboard/materialize/assets/vendor/libs/cleavejs/cleave-phone.js') }}"></script>
   <script src="{{ asset('assets/dashboard/materialize/assets/vendor/libs/sweetalert2/sweetalert2.js') }}"></script>
@endpush
@push('page-js')
   <script src="{{ asset('assets/dashboard/materialize/assets/js/pages-account-settings-account.js') }}"></script>
@endpush
@section('content')
   <livewire:dashboard.profile.profile-index />
@endsection

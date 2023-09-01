@extends('dashboard.template.dashboard')
@include('dashboard.components.flatpickr')
@section('content')
<h3 class="fw-bold py-3 mb-4">
   Dashboard
</h3>

<div class="row gy-4 mb-4">
   <div class="col-12">
      <div class="row">
         <!-- Greetings card -->
         @include('dashboard.pages.components.dashboard.card-greetings')
         <!--/ Greetings card -->

         <!-- Cards with few info -->
         @include('dashboard.pages.components.dashboard.card-info')
         <!--/ Cards with few info -->
      </div>
   </div>

   {{-- Cards Role --}}
   @cannot('member')
   @php
   $superadmins = \App\Models\User::where('role', 'superadmin')->take(3)->get();
   $admins = \App\Models\User::where('role', 'admin')->take(3)->get();
   $members = \App\Models\User::where('role', 'member')->take(3)->get();
   @endphp
   @include('dashboard.pages.modal.dashboard.roles-modal')
   @include('dashboard.pages.components.dashboard.card-roles-info')
   @endcannot
   {{-- / End Cards Role --}}

   {{-- Charts SuperAdmin/ Admin --}}
   <livewire:dashboard.chart-index />
   {{--/ Charts SuperAdmin/ Admin --}}

   <!-- Recent Logged In Activity -->
   <livewire:dashboard.recent-login-activity :user='$user' />
   <!--/ Recent Logged In Activity -->
</div>
@endsection
@push('vendor-css')
<link rel="stylesheet"
   href="{{ asset('assets/dashboard/materialize/assets/vendor/libs/apex-charts/apex-charts.css') }}" />
@endpush
@push('vendor-js')
<script src="{{ asset('assets/dashboard/materialize/assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>
@endpush
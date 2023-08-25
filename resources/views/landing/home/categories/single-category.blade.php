@extends('landing.layouts.template')
@include('landing.components.flatpickr')
@section('header-class', 'navbar-link-white')
@section('hero')
<section class="position-relative bg-gradient-primary text-white">
   <div class="container pt-12 pb-9 pb-lg-12 position-relative z-2">
      <div class="row pb-7 pt-lg-9 align-items-center">
         <div class="col-12 col-lg-7 mb-5 mb-lg-0">
            <ol class="breadcrumb mb-3">
               <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
               <li class="breadcrumb-item"><a href="{{ route('home.category_list') }}">{{ __('Kategori Postingan') }}</a></li>
               <li class="breadcrumb-item active" aria-current="page">{{ $category->name }}</li>
            </ol>
            {{-- <h2 class="display-2 mb-4">
               {{ __('Daftar Postingan') }}
            </h2> --}}
            <h1 class="mb-0 display-3">Daftar {{ $category->name }}</h1>
            <p class="lead mb-0">
               Berisi semua data postingan dengan tipe {{ $category->name }}.
            </p>
         </div>
      </div>
      <!--/.row-->
   </div>

   <!--Vector divider shape-->
   <svg class="w-100 position-absolute start-0 bottom-0 flip-y" style="color: var(--bs-body-bg)" height="48"
      fill="currentColor" preserveAspectRatio="none" viewBox="0 0 1200 120" xmlns="http://www.w3.org/2000/svg">
      <path d="M0 0v46.29c47.79 22.2 103.59 32.17 158 28 70.36-5.37 136.33-33.31 206.8-37.5 73.84-4.36 147.54
              16.88 218.2 35.26 69.27 18 138.3 24.88 209.4
              13.08 36.15-6 69.85-17.84 104.45-29.34C989.49 25 1113-14.29 1200 52.47V0z" opacity=".25"></path>
      <path d="M0 0v15.81c13 21.11 27.64 41.05 47.69 56.24C99.41 111.27 165 111 224.58 91.58c31.15-10.15
              60.09-26.07 89.67-39.8 40.92-19 84.73-46 130.83-49.67 36.26-2.85 70.9 9.42 98.6 31.56 31.77 25.39
              62.32 62 103.63 73 40.44 10.79 81.35-6.69 119.13-24.28s75.16-39 116.92-43.05c59.73-5.85 
              113.28 22.88 168.9 38.84 30.2 8.66 59 6.17 87.09-7.5 22.43-10.89 48-26.93 60.65-49.24V0z" opacity=".5">
      </path>
      <path d="M0 0v5.63C149.93 59 314.09 71.32 475.83 42.57c43-7.64 84.23-20.12 127.61-26.46 59-8.63
          112.48 12.24 165.56 35.4C827.93 77.22 886 95.24 951.2 90c86.53-7 172.46-45.71 248.8-84.81V0z"></path>
   </svg>
</section>
@endsection
@section('content')
   <livewire:landing.categories.category-detail :category='$category'/>
   {{-- <script>
      document.addEventListener("DOMContentLoaded", function() {
          flatpickr("#dateFilter", {
              mode: "range",
              onClose: function(selectedDates) {
                  // Ketika picker ditutup, update model Livewire
                  @this.set('filter_date', selectedDates.map(date => date.toISOString()).join(' to '));
              }
          });
      });
   </script> --}}
      
@endsection

@extends('landing.layouts.template')
@include('landing.components.flatpickr')
@section('header-class', 'navbar-link-white')
@section('hero')
   <section class="text-white" style="background-image: url({{ asset('assets/img/hero-image/background-12.jpg') }});" id="category-hero-image">
      <div class="container pt-14 pb-9 pb-lg-12">
         <div class="row pt-lg-7">
            <div class="col-xl-8">
               <ol class="breadcrumb mb-3">
                  <li class="breadcrumb-item"><a href="blog-sidebar.html#">Home</a></li>
                  <li class="breadcrumb-item active">Kategori</li>
                  <li class="breadcrumb-item active" aria-current="page">{{ $category->name }}</li>
               </ol>
               <h1 class="mb-0 display-3">Daftar {{ $category->name }}</h1>
            </div>
         </div>
      </div>
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
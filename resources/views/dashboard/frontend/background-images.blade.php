@extends('dashboard.template.dashboard')
@section('content')
   <!-- start page title -->
   <h4 class="fw-bold py-3 mb-4">
      <a class="text-muted fw-light" href="{{ route('dashboard') }}">Home /</a>
      <a class="text-muted fw-light" href="{{ route('dashboard') }}">Personalisasi /</a>
      Background Images
   </h4>
   <!-- start page title -->

   <div class="row">
      <div class="col-12">
         <div class="card">
            <div class="card-header flex-column flex-md-row">

               <div class="head-label text-start">
                  <h5 class="card-title mb-0">Hero Image</h5>
               </div>
               
               <hr>
               
               {{-- <div class="dt-action-buttons text-end pt-3 pt-md-0">
                  <div class="dt-buttons btn-group flex-wrap">
                     <div class="btn-group">
                        <button class="btn btn-secondary buttons-collection dropdown-toggle btn-label-primary me-2" tabindex="0" aria-controls="DataTables_Table_0" type="button"
                           aria-haspopup="dialog" aria-expanded="false"><span>
                              <i class="mdi mdi-export-variant me-sm-1"></i>
                              <span class="d-none d-sm-inline-block">Export</span></span>

                           <span
                              class="dt-down-arrow"></span></button>
                     </div>
                     <a class="btn btn-primary"
                        href="{{ route('posts.create') }}">
                        <span><i class="mdi mdi-plus me-sm-1"></i>
                        <span class="d-none d-sm-inline-block">Tambah Data</span></span>
                     </a>
                  </div>
               </div>
               <div class="row mb-3 justify-content-start">
                  <div class="col-lg-6">
                     <label for="filter-category" class="form-label">Kategori</label>
                     <select class="form-select form-select-md" name="category_id" id="filter-category">
                        <option selected value="">Semua</option>
                        @foreach ($categories as $category)
                           <option value="{{ $category->name }}">{{ $category->name }}</option>
                        @endforeach
                     </select>
                  </div>

                  <div class="col-lg-6">
                     <label for="filter-status" class="form-label">Status</label>
                     <select class="form-select form-select-md" name="status" id="filter-status">
                        <option selected value="">Semua</option>
                        @foreach ($statuses as $status)
                           <option value="{{ $status->key }}">{{ $status->label }}</option>
                        @endforeach
                     </select>
                  </div>
               </div> --}}
            </div>
            <div class="card-body">
                 
               <div class="row mb-3">
                  <h5 class="mb-3">Hero Home</h5>
                  <div class="row">
                        <div style="width: 250px">
                           <img style="max-height: 150px; max-width: 200px" src="{{ asset('assets/Landing/world/img/blog-img/b10.jpg') }}" alt="">
                        </div>
                        <div style="width: 250px">
                           <img style="max-height: 150px; max-width: 200px" src="{{ asset('assets/Landing/world/img/blog-img/b10.jpg') }}" alt="">
                        </div>
                        <div style="width: 250px">
                           <img style="max-height: 150px; max-width: 200px" src="{{ asset('assets/Landing/world/img/blog-img/b10.jpg') }}" alt="">
                        </div>
                        <div style="width: 250px">
                           <img style="max-height: 150px; max-width: 200px" src="{{ asset('assets/Landing/world/img/blog-img/b10.jpg') }}" alt="">
                        </div>
                  </div>
               </div>
               
               <hr>

               <div class="row mb-3">
                  <h5 class="mb-3">Hero Home</h5>
                  <div class="row">
                        <div style="width: 250px">
                           <h6 class="mb-2">Detail Blog</h6>
                           <img style="max-height: 150px; max-width: 200px" src="{{ asset('assets/Landing/world/img/blog-img/b10.jpg') }}" alt="">
                        </div>
                        <div style="width: 250px">
                           <h6 class="mb-2">Detail Contact</h6>
                           <img style="max-height: 150px; max-width: 200px" src="{{ asset('assets/Landing/world/img/blog-img/b10.jpg') }}" alt="">
                        </div>
                        <div style="width: 250px">
                           <h6 class="mb-2">Detail CNS</h6>
                           <img style="max-height: 150px; max-width: 200px" src="{{ asset('assets/Landing/world/img/blog-img/b10.jpg') }}" alt="">
                        </div>
                        <div style="width: 250px">
                           <h6 class="mb-2">Detail Kategori</h6>
                           <img style="max-height: 150px; max-width: 200px" src="{{ asset('assets/Landing/world/img/blog-img/b10.jpg') }}" alt="">
                        </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
@endsection
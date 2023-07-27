@extends('dashboard.template.dashboard')
@php
   $categoriesCount = cache()->remember('categoriesCount', now()->addDays(1), function () {
       return App\Models\Category::count();
   });
@endphp
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
@section('content')
   <!-- start page title -->
   <h4 class="fw-bold py-3 mb-4">
      <a class="text-muted fw-light" href="{{ route('dashboard') }}">Home /</a>
      Daftar Kategori
   </h4>
   <!-- end page title -->
   <div class="row">
      <div class="col-12">
         <div class="card shadow-md">
            <div class="card-header">
               <div class="text-end">
                  <button class="btn btn-primary" id="btnTambahKategori">
                     <span><i class="mdi mdi-plus me-sm-1"></i>
                     <span class="d-none d-sm-inline-block">Tambah Data</span></span>
                  </button>
                  @include('dashboard.categories.modal.create')
               </div>
            </div>
            <div class="card-datatable text-nowrap">
               <div class="table-responsive">
                  <table class="dt-complex-header table table-bordered" id="categories-table">

                     <thead>
                        <tr>
                           <th>#</th>
                           <th>Nama</th>
                           <th>Slug</th>
                           {{-- <th>Jumlah Postingan</th> --}}
                           <th>Dibuat</th>
                           {{-- <th>Detail</th> --}}
                           <th class="text-center">
                              {{-- <i class="align-middle" data-feather="edit"></i> --}}
                              Action
                           </th>
                        </tr>
                     </thead>
                     {{-- <tbody>
                         @foreach ($categories as $category)
                           <tr>
                              <th scope="row">{{ $loop->iteration }}</th>
                              <td>
                                 <a href="{{ route('categories.show', $category) }}" class="text-decoration-none text-secondary">{{ $category->name }}</a>
                              </td>
                              <td>{{ $category->slug }}</td>
                              <td>{{ $category->posts->count() }}</td>
                              <td>
                                 @php
                                    $currentTime = now();
                                    $updatedAt = $category->updated_at;
                                    
                                    $diffInSeconds = $currentTime->diffInSeconds($updatedAt);
                                    
                                    if ($diffInSeconds < 60) {
                                        echo 'Baru saja - ' . $diffInSeconds + 4 . ' detik yang lalu';
                                    } else {
                                        echo $updatedAt->format('l, d F Y - H:i:s');
                                    }
                                 @endphp
                              </td>
                              <td>
                                 <a href="#" class="text-decoration-none text-uppercase" data-bs-toggle="modal" data-bs-target="#postinganKategori{{ $category->id }}">Lihat semua postingan</a>
                              </td>
                              <td class="text-center">
                                 <div class="dropdown">
                                    <a class="text-muted dropdown-toggle font-size-18 px-2" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true">
                                       <i class="align-middle" data-feather="more-horizontal"></i>
                                    </a>
   
                                    <div class="dropdown-menu dropdown-menu-end">
                                       <a class="dropdown-item text-primary text-decoration-none" href="#" data-bs-toggle="modal" data-bs-target="#postinganKategori{{ $category->id }}">
                                          Lihat postingan terkait
                                       </a>
                                       <a class="dropdown-item text-success text-decoration-none" href="#" data-bs-toggle="modal" data-bs-target="#editKategori{{ $category->id }}">
                                          Edit
                                       </a>
                                       <a class="text-danger text-decoration-none dropdown-item" href="{{ route('categories.destroy', $category) }}" data-confirm-delete="true">Hapus</a>
                                    </div>
                                 </div>
                              </td> 
                           </tr>
                           @push('modal')
                              @include('dashboard.categories.modal')
                              @include('dashboard.categories.modal.edit')
                           @endpush
                        @endforeach
                     </tbody> --}}
                  </table>
               </div>
            </div>
         </div>
      </div>
   </div>
@endsection
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
   @include('dashboard.categories.script')
@endpush
@push('script')
   {{-- <script src="{{ asset('assets/dashboard/adminkit/js/datatables.js') }}"></script>
   <script>
      $(document).ready(function() {
         var table = $('#categories-table').DataTable({
            responsive: true,
            columnDefs: [
               {
                  orderable: false,
                  targets: 1
               },
               {
                  orderable: false,
                  targets: 2
               },
               {
                  orderable: false,
                  targets: 3
               },
               {
                  orderable: false,
                  targets: 4
               },
               {
                  orderable: false,
                  targets: 5
               },
               {
                  orderable: false,
                  targets: 6
               },
            ],
         });
      });
   </script> --}}
@endpush
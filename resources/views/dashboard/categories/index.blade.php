@extends('dashboard.template.dashboard')
@php
   $categoriesCount = cache()->remember('categoriesCount', now()->addDays(1), function () {
       return App\Models\Category::count();
   });
@endphp
@push('head')
   {{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css"> --}}
   <link rel="stylesheet" href="{{ asset('assets/dashboard/velzon/assets/libs/datatable/css/dataTables.bootstrap5.min.css') }}">
   <link rel="stylesheet" href="{{ asset('assets/dashboard/velzon/assets/libs/datatable/responsive/2.2.9/css/responsive.bootstrap.min.css') }}">
   <link rel="stylesheet" href="{{ asset('assets/dashboard/velzon/assets/libs/datatable/buttons/2.2.2/css/buttons.dataTables.min.css') }}">
@endpush
@section('content')
   <!-- start page title -->
   <div class="row">
      <div class="col-12">
         <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Daftar Kategori</h4>

            <div class="page-title-right">
                  <ol class="breadcrumb m-0">
                     <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                     <li class="breadcrumb-item active">Kategori</li>
                  </ol>
            </div>

         </div>
      </div>
   </div>
   <!-- end page title -->
   <div class="row">
      <div class="col-12 d-flex justify-content-end">
         <button data-bs-toggle="modal" data-bs-target="tambahKategori" class="btn btn-soft-primary waves-effect waves-light mb-2">Buat Kategori</button>
         @include('dashboard.categories.modal.create')
      </div>
      <div class="col-12">
         <div class="card shadow-md">
            <div class="card-body">
               <div class="table-responsive">
                  <table class="table table-sm mb-0" id="categories-table">

                     <thead class="table-light">
                        <tr>
                           <th>#</th>
                           <th>Nama</th>
                           <th>Slug</th>
                           {{-- <th>Jumlah Postingan</th> --}}
                           <th>Dibuat</th>
                           {{-- <th>Detail</th> --}}
                           <th class="text-center">
                              <i class="align-middle" data-feather="edit"></i>
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
@push('script')
{{-- <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script> --}}
<script src="{{ asset('assets/dashboard/velzon/assets/libs/datatable/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/dashboard/velzon/assets/libs/datatable/js/dataTables.bootstrap5.min.js') }}"></script>
<script src="{{ asset('assets/dashboard/velzon/assets/libs/datatable/responsive/2.2.9/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets/dashboard/velzon/assets/libs/datatable/buttons/2.2.2/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('assets/dashboard/velzon/assets/libs/datatable/buttons/2.2.2/js/buttons.print.min.js') }}"></script>
    {{-- {{ $dataTable->scripts(attributes: ['type' => 'module']) }} --}}
    <script>

         $(document).ready(function() {
            $('#categories-table').DataTable({
               processing: true,
               serverside: true,
               ajax: "{{ route('api.categories.index') }}",
               columns: [
                  {
                     data: 'DT_RowIndex',
                     name: 'DT_RowIndex',
                     orderable: false,
                  },
                  {
                     data: 'name',
                     name: 'Nama',
                     orderable: false,
                  },
                  {
                     data: 'slug',
                     name: 'Slug',
                     orderable: false,
                  },
                  {
                     data: 'created_at',
                     name: 'Dibuat',
                  },
                  {
                     data: 'action',
                     name: '#',
                  }
               ]
            });
         })

    </script>
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
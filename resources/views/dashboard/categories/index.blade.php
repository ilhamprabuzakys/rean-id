@extends('dashboard.template.dashboard')
@php
   $categoriesCount = cache()->remember('categoriesCount', now()->addDays(1), function () {
       return App\Models\Category::count();
   });
@endphp
@section('headline')
<div class="row mb-2 mb-xl-3">
   <div class="col-auto d-none d-sm-block">
      <h3>Data <strong>Kategori</strong></h3>
   </div>

   <div class="col-auto ms-auto text-end mt-n1">
      <a href="#" class="btn btn-danger me-2" onclick="printToPDF()" target="_blank">Simpan ke PDF</a>
      <script>
         function printToPDF() {
            window.print();
         }
      </script>
      <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahKategori">Tambah Data</a>
      @include('dashboard.categories.modal.create')
   </div>
</div>

@endsection
@section('content')
   <div class="row">
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
                           <th>Jumlah Postingan</th>
                           <th>Dibuat</th>
                           <th>Detail</th>
                           <th class="text-center">
                              <i class="align-middle" data-feather="edit"></i>
                           </th>
                        </tr>
                     </thead>
                     <tbody>
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
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </div>
@endsection
@push('script')
   <script src="{{ asset('assets/dashboard/adminkit/js/datatables.js') }}"></script>
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
   </script>
@endpush
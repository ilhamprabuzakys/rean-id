@extends('dashboard.template.dashboard')
@php
   $tagsCount = cache()->remember('tagsCount', now()->addDays(1), function () {
       return App\Models\Category::count();
   });
@endphp
@section('headline')
<div class="row mb-2 mb-xl-3">
   <div class="col-auto d-none d-sm-block">
      <h3>Data <strong>Label</strong></h3>
   </div>

   <div class="col-auto ms-auto text-end mt-n1">
      <a href="#" class="btn btn-danger me-2" onclick="printToPDF()" target="_blank">Simpan ke PDF</a>
      <script>
         function printToPDF() {
            window.print();
         }
      </script>
      <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahTag">Tambah Data</a>
      @include('dashboard.tags.modal.create')
   </div>
</div>
@endsection
@section('content')
   <div class="row">
      <div class="col-12">
         <div class="card shadow-md">
            <div class="card-body">
               <div class="table-responsive">
                  <table class="table table-sm mb-0" id="tags-table">

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
                        @foreach ($tags as $tag)
                           <tr>
                              <th scope="row">{{ $loop->iteration }}</th>
                              <td>
                                 <a href="{{ route('tags.show', $tag) }}" class="text-decoration-none text-secondary">{{ $tag->name }}</a>
                              </td>
                              <td>{{ $tag->slug }}</td>
                              <td>{{ $tag->posts->count() }}</td>
                              <td>
                                 @php
                                    $currentTime = now();
                                    $updatedAt = $tag->updated_at;
                                    
                                    $diffInSeconds = $currentTime->diffInSeconds($updatedAt);
                                    
                                    if ($diffInSeconds < 60) {
                                        echo 'Baru saja - ' . $diffInSeconds + 4 . ' detik yang lalu';
                                    } else {
                                        echo $updatedAt->format('l, d F Y - H:i:s');
                                    }
                                 @endphp
                              </td>
                              <td>
                                 <a href="#" class="text-decoration-none text-uppercase" data-bs-toggle="modal" data-bs-target="#postinganTag{{ $tag->id }}">Lihat semua postingan</a>
                              </td>
                              <td class="text-center">
                                 <div class="dropdown">
                                    <a class="text-muted dropdown-toggle font-size-18 px-2" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true">
                                       <i class="align-middle" data-feather="more-horizontal"></i>
                                    </a>
   
                                    <div class="dropdown-menu dropdown-menu-end">
                                       <a class="dropdown-item text-primary text-decoration-none" href="#" data-bs-toggle="modal" data-bs-target="#postinganTag{{ $tag->id }}">
                                          Lihat postingan terkait
                                       </a>
                                       <a class="dropdown-item text-success text-decoration-none" href="#" data-bs-toggle="modal" data-bs-target="#editTag{{ $tag->id }}">
                                          Edit
                                       </a>
                                       <a class="text-danger text-decoration-none dropdown-item" href="{{ route('tags.destroy', $tag) }}" data-confirm-delete="true">Hapus</a>
                                    </div>
                                 </div>
                              </td> 
                           </tr>
                           @push('modal')
                              @include('dashboard.tags.modal')
                              @include('dashboard.tags.modal.edit')
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
         var table = $('#tags-table').DataTable({
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
@extends('dashboard-borex.layouts.app')
@php
   $tagsCount = cache()->remember('tagsCount', now()->addDays(1), function () {
       return App\Models\Tag::count();
   });
@endphp
@push('scripts')
   @include('dashboard-borex.components.datatable')
   <script>
      $(document).ready(function() {
         $('#tags-table').DataTable();
      });
   </script>
@endpush
@section('content')
   <div class="row align-items-center">
      <div class="col-md-6">
         <div class="mb-3">
            <h5 class="card-title">Total Tag <span class="text-muted fw-normal ms-2">{{ $tagsCount }}</span></h5>
         </div>
      </div>

      <div class="col-md-6">
         <div class="d-flex flex-wrap align-items-center justify-content-end gap-2 mb-3">
            <div>
               <a href="{{ route('index') . '/api/tags' }}" class="btn btn-danger"><i class="bx bx-detail me-1"></i> API </a>
               <a href="{{ route('tags.create') }}" class="btn btn-primary"><i class="bx bx-plus me-1"></i> Buat Tag</a>
            </div>
         </div>

      </div>
   </div>

   <div class="row">
      <div class="col-xl-12">
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
                           <th>Action</th>
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
                              <td>{{ $tag->posts()->count() }}</td>
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
                                 <a href="#" class="text-decoration-none text-uppercase" data-bs-toggle="modal" data-bs-target="#postinganTag{{ $tag->name }}">Lihat semua postingan</a>
                              </td>
                              <td>
                                 <div class="dropdown">
                                    <a class="text-muted dropdown-toggle font-size-18 px-2" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true">
                                       <i class="bx bx-dots-horizontal-rounded"></i>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-end">
                                       <a class="dropdown-item text-success text-decoration-none" href="{{ route('tags.edit', $tag) }}">
                                          Edit
                                       </a>
                                       <a class="text-danger text-decoration-none dropdown-item" href="{{ route('tags.destroy', $tag) }}" data-confirm-delete="true">Delete</a>
                                    </div>
                                 </div>
                              </td>
                           </tr>
                           @push('modal')
                              @include('dashboard-borex.tags.modal')
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

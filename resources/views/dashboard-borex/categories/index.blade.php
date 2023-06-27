@extends('dashboard-borex.layouts.app')
@php
   $categoriesCount = cache()->remember('categoriesCount', now()->addDays(1), function () {
       return App\Models\Category::count();
   });
@endphp
@push('scripts')
   @include('dashboard-borex.components.datatable')
   <script>
      $(document).ready(function() {
         $('#categories-table').DataTable();
      });
   </script>
@endpush
@section('content')
   <div class="row align-items-center">
      <div class="col-md-6">
         <div class="mb-3">
            <h5 class="card-title">Total Kategori <span class="text-muted fw-normal ms-2">{{ $categoriesCount }}</span></h5>
         </div>
      </div>

      <div class="col-md-6">
         <div class="d-flex flex-wrap align-items-center justify-content-end gap-2 mb-3">
            <div>
               <a href="{{ route('index') . '/api/categories' }}" class="btn btn-danger"><i class="bx bx-detail me-1"></i> API </a>
               <a href="{{ route('categories.create') }}" class="btn btn-primary"><i class="bx bx-plus me-1"></i> Buat Kategori</a>
            </div>
         </div>

      </div>
   </div>

   <div class="row">
      <div class="col-xl-12">
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
                           <th>Action</th>
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
                                 <a href="#" class="text-decoration-none text-uppercase" data-bs-toggle="modal" data-bs-target="#postinganKategori{{ $category->slug }}">Lihat semua postingan</a>
                              </td>
                              <td>
                                 <div class="dropdown">
                                    <a class="text-muted dropdown-toggle font-size-18 px-2" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true">
                                       <i class="bx bx-dots-horizontal-rounded"></i>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-end">
                                       <a class="dropdown-item text-success text-decoration-none" href="{{ route('categories.edit', $category) }}">
                                          Edit
                                       </a>
                                       <a class="text-danger text-decoration-none dropdown-item" href="{{ route('categories.destroy', $category) }}" data-confirm-delete="true">Delete</a>
                                    </div>
                                 </div>
                              </td>
                           </tr>
                           @push('modal')
                              {{-- <div class="modal fade" id="postinganKategori{{ $category->slug }}" tabindex="-1" role="dialog">
                                 <div class="modal-dialog modal-dialog-scrollable modal-lg">
                                     <div class="modal-content">
                                         <div class="modal-header">
                                             <h5 class="modal-title" id="postinganKategori{{ $category->slug }}Title">Postingan dengan kategori {{ $category->name }}</h5>
                                             <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                         </div>
                                         <div class="modal-body">
                                             <ul class="list-group">
                                                @forelse ($category->posts as $post)
                                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                                   <a href="{{ route('posts.show', $post) }}" class="text-decoration-none">{{ $post->title }}</a>
                                                   <span class="badge bg-success badge-pill">{{ $post->user->name }}</span>
                                                </li>
                                                @empty
                                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                                   Postingan dengan Kategori {{ $category->name }} masih kosong!
                                                </li>
                                                @endforelse
                                             </ul>
                                         </div>
                                         <div class="modal-footer">
                                             <button type="button" class="btn btn-danger px-3" data-bs-dismiss="modal">Close</button>
                                     </div><!-- /.modal-content -->
                                 </div><!-- /.modal-dialog -->
                             </div> --}}
                              @include('dashboard-borex.categories.modal')
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

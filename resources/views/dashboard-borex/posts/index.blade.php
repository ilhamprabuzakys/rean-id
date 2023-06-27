@extends('dashboard-borex.layouts.app')
@php
   $postsCustom = '';
   if (auth()->user()->role == 'member') {
       $postsCustom = $posts->where('user_id', auth()->user()->id);
   } else {
       $postsCustom = $posts;
   }
   // $postsCount = cache()->remember('postsCount', now()->addDays(1), function() {
   //    return $postsCustom->count();
   // });
   $postsCount = $postsCustom->count();
@endphp
@push('scripts')
   @include('dashboard-borex.components.datatable')
   <script>
      $(document).ready(function() {
         var table = $('#posts-table').DataTable();
         $('#filter-category').on('change', function() {
            var category = $(this).val();

            if (category === "") {
               // Jika kategori "Semua" dipilih, hapus filter pada kolom "Kategori"
               table.column(3).search("").draw();
            } else {
               // Jika kategori spesifik dipilih, terapkan filter pada kolom "Kategori"
               table.column(3).search(category).draw();
            }
         });
         $('#filter-status').on('change', function() {
            var status = $(this).val();

            if (status === "") {
               table.column(4).search("").draw();
            } else {
               table.column(4).search(status).draw();
            }
         });
      });
   </script>
@endpush
@section('content')
   <div class="row align-items-center">
      <div class="col-md-6">
         <div class="mb-3">
            <h5 class="card-title">Total Postingan <span class="text-muted fw-normal ms-2">{{ $postsCount }}</span></h5>
         </div>
      </div>

      <div class="col-md-6">
         <div class="d-flex flex-wrap align-items-center justify-content-end gap-2 mb-3">
            <div>
               <a href="{{ route('index') . '/api/posts' }}" class="btn btn-danger"><i class="bx bx-detail me-1"></i> API </a>
               <a href="{{ route('posts.create') }}" class="btn btn-primary"><i class="bx bx-plus me-1"></i> Buat Postingan</a>
            </div>
         </div>

      </div>
   </div>

   <div class="row">
      <div class="col-xl-12">
         <div class="card shadow-md">
            <div class="card-body">
               <div class="table-responsive">
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
                  </div>
                  <table class="table table-sm mb-0" id="posts-table">

                     <thead class="table-light">
                        <tr>
                           <th>#</th>
                           <th>Judul</th>
                           <th>Author</th>
                           <th class="text-center">Kategori</th>
                           <th>Status</th>
                           <th>Terakhir diupdate</th>
                           <th class="text-center">
                              <i class="bx bx bx-edit font-size-16"></i>
                           </th>
                        </tr>
                     </thead>
                     <tbody>
                        @foreach ($postsCustom as $key => $post)
                           <tr>
                              <th scope="row">{{ $loop->iteration }}</th>
                              <td>
                                 <a href="{{ route('posts.show', $post) }}" class="text-decoration-none text-dark">
                                    {{ $post->title }}
                                 </a>
                              </td>
                              <td><a href="{{ route('users.show', $post->user) }}" class="text-decoration-none text-dark">
                                    {{ $post->user->name }}
                                    @if ($post->user->username == auth()->user()->username)
                                       <span class="text-primary">{{ __(' (Anda)') }}</span>
                                    @endif
                                 </a></td>
                              <td class="text-center">
                                 @if ($post->category)
                                    <a href="{{ route('categories.show', $post->category) }}" class="text-decoration-none">{{ $post->category->name }}</a>
                                 @else
                                    Belum diset
                                 @endif
                              </td>
                              <td class="text-center">
                                 @if ($post->status == 'pending')
                                    <span class="badge badge-soft-primary">Pending</span>
                                 @elseif ($post->status == 'approved')
                                    <span class="badge badge-soft-success">Approved</span>
                                 @else
                                    <span class="badge badge-soft-danger">Rejected</span>
                                 @endif
                              </td>
                              <td>
                                 @php
                                    $currentTime = now();
                                    $updatedAt = $post->updated_at;
                                    
                                    $diffInSeconds = $currentTime->diffInSeconds($updatedAt);
                                    
                                    if ($diffInSeconds < 60) {
                                        echo 'Baru saja - ' . $diffInSeconds + 4 . ' detik yang lalu';
                                    } else {
                                        echo $updatedAt->format('l, d F Y - H:i:s');
                                    }
                                 @endphp
                              </td>
                              <td class="text-center">
                                 <div class="dropdown">
                                    <a class="text-muted dropdown-toggle font-size-18 px-2" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true">
                                       <i class="bx bx-dots-horizontal-rounded"></i>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-end">
                                       <a class="dropdown-item text-primary text-decoration-none" href="#" data-bs-toggle="modal" data-bs-target="#postinganDenganID{{ $post->id }}">
                                          Tampilkan
                                       </a>
                                       <a class="dropdown-item text-success text-decoration-none" href="{{ route('posts.edit', $post) }}">
                                          Edit
                                       </a>
                                       <a class="text-danger text-decoration-none dropdown-item" href="{{ route('posts.destroy', $post) }}" data-confirm-delete="true">Delete</a>
                                    </div>
                                 </div>
                              </td>
                           </tr>
                           @push('modal')
                              @include('dashboard-borex.posts.modal')
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

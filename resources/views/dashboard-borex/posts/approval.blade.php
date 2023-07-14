@extends('dashboard-borex.layouts.app')
@php
   $postsCount = App\Models\Post::count();
   $postsPendingCount = App\Models\Post::where('status', 'pending')->get()->count();
   $postsApprovedCount = App\Models\Post::where('status', 'approved')->get()->count();
   $postsRejectedCount = App\Models\Post::where('status', 'rejected')->get()->count();
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
      <div class="col-md-5">
         <div class="mb-3">
            <h5 class="card-title">Total Postingan <span class="text-muted fw-normal ms-2">{{ $postsCount }}</span></h5>
         </div>
      </div>

      <div class="col-md-7">
         <div class="d-flex flex-wrap align-items-center justify-content-end gap-2 mb-3">
            <div>
               {{-- <a href="{{ route('index') . '/api/posts' }}" class="btn btn-danger"><i class="bx bx-detail me-1"></i> API </a>
               <a href="{{ route('posts.create') }}" class="btn btn-primary"><i class="bx bx-plus me-1"></i> Buat Postingan</a> --}}
                  <span class="card-title">Pending: <span class="text-primary fw-normal me-1">{{ $postsPendingCount }}</span></span>
                  <span class="card-title">Approved: <span class="text-success fw-normal me-1">{{ $postsApprovedCount }}</span></span>
                  <span class="card-title">Rejected: <span class="text-danger fw-normal me-1">{{ $postsRejectedCount }}</span></span>
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
                        @php
                           $postsCustom = '';
                           if (auth()->user()->role == 'member') {
                               $postsCustom = $posts->where('user_id', auth()->user()->id);
                           } else {
                               $postsCustom = $posts;
                           }
                        @endphp
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
                                 @if ($post->status != 'pending')
                                    <button type="button" disabled class="bg-transparent border-0">
                                       @if ($post->status == 'approved')
                                          <span class="badge rounded-pill bg-approval opacity-50 p-2 font-size-12 text-decoration-none d-flex align-items-center">
                                             Approved
                                             <i class="bx bx-check-circle ms-2"></i>
                                          </span>
                                       @elseif($post->status == 'rejected')
                                          <span class="badge rounded-pill bg-reject opacity-50 p-2 font-size-12 text-decoration-none d-flex align-items-center">
                                             Rejected
                                             <i class="bx bx-x ms-2"></i>
                                          </span>
                                       @endif
                                    </button>

                                    <div class="dropdown">
                                       <a class="text-muted dropdown-toggle font-size-18 px-2" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true">
                                          <i class="bx bx-dots-horizontal-rounded"></i>
                                       </a>

                                       <div class="dropdown-menu dropdown-menu-end">
                                          <a class="dropdown-item text-decoration-none" href="#">
                                             <form action="{{ route('posts.approval.form') }}" method="post">
                                                @csrf
                                                {{-- @method('PUT') --}}
                                                <input type="hidden" name="status" value="pending">
                                                <input type="hidden" name="post_id" value="{{ $post->id }}">
                                                <button type="submit" class="bg-transparent border-0">
                                                <span class="text-primary">Revert to Pending</span>
                                                </button>
                                             </form>
                                          </a>
                                          @if ($post->status == 'rejected')
                                             <a class="dropdown-item text-decoration-none" href="#">
                                                <form action="{{ route('posts.approval.form') }}" method="post">
                                                   @csrf
                                                   {{-- @method('PUT') --}}
                                                   <input type="hidden" name="status" value="approved">
                                                   <input type="hidden" name="post_id" value="{{ $post->id }}">
                                                   <button type="submit" class="bg-transparent border-0">
                                                   <span class="text-success">Approve it</span>
                                                   </button>
                                                </form>
                                             </a>
                                          @elseif ($post->status == 'approved')
                                             <a class="dropdown-item text-danger text-decoration-none" href="#">
                                                <form action="{{ route('posts.approval.form') }}" method="post">
                                                   @csrf
                                                   {{-- @method('PUT') --}}
                                                   <input type="hidden" name="status" value="rejected">
                                                   <input type="hidden" name="post_id" value="{{ $post->id }}">
                                                   <button type="submit" class="bg-transparent border-0">
                                                   <span>Approve it</span>
                                                   </button>
                                                </form>
                                             </a>
                                          @endif
                                       </div>
                                    </div>
                                 @else
                                    <form action="{{ route('posts.approval.form') }}" method="post">
                                       @csrf
                                       {{-- @method('PUT') --}}
                                       <input type="hidden" name="status" value="approved">
                                       <input type="hidden" name="post_id" value="{{ $post->id }}">

                                       <button type="submit" class="bg-transparent border-0">
                                          <span class="badge rounded-pill bg-approval p-2 font-size-12 text-decoration-none d-flex align-items-center">
                                             Approve?
                                             <i class="bx bx-check-circle font-size-14 ms-2"></i>
                                          </span>
                                       </button>
                                    </form>
                                    <form action="{{ route('posts.approval.form') }}" method="post">
                                       @csrf
                                       {{-- @method('PUT') --}}
                                       <input type="hidden" name="status" value="rejected">
                                       <input type="hidden" name="post_id" value="{{ $post->id }}">

                                       <button type="submit" class="bg-transparent border-0">
                                          <span class="badge rounded-pill bg-reject p-2 font-size-12 text-decoration-none d-flex align-items-center">
                                             Reject?
                                             <i class="bx bx-x font-size-14 ms-2"></i>
                                          </span>
                                       </button>
                                    </form>
                                 @endif

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

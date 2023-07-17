@extends('dashboard-borex.layouts.app')
@php
   $postsCustom = '';
   if (auth()->user()->role == 'member') {
       $postsCustom = $posts->where('user_id', auth()->user()->id);
   } else {
       $postsCustom = $posts;
   }
   $postsCount = $postsCustom->count();
@endphp
@push('scripts')
   @include('dashboard-borex.components.datatable')
   <script>
      $(document).ready(function() {
         var table = $('#posts-table').DataTable({
            drawCallback: function() {
               $('#posts-table').removeClass('table-loader');
            }
         });
         // $('#posts-table').on('init.dt', function() {
         //    $("#posts-table").removeClass('table-loader').show();
         // });
         // setTimeout(function() {
         //    $('#posts-table').DataTable();
         // }, 3000);

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
@push('styles')
   <style>
      .table-loader {
         visibility: hidden;
      }

      .table-loader:before {
         visibility: visible;
         display: table-caption;
         content: " ";
         width: 100%;
         height: 600px;
         background-image:
            linear-gradient(rgba(235, 235, 235, 1) 1px, transparent 0),
            linear-gradient(90deg, rgba(235, 235, 235, 1) 1px, transparent 0),
            linear-gradient(90deg, rgba(255, 255, 255, 0), rgba(255, 255, 255, 0.5) 15%, rgba(255, 255, 255, 0) 30%),
            linear-gradient(rgba(240, 240, 242, 1) 35px, transparent 0);

         background-repeat: repeat;

         background-size:
            1px 35px,
            calc(100% * 0.1666666666) 1px,
            30% 100%,
            2px 70px;

         background-position:
            0 0,
            0 0,
            0 0,
            0 0;

         animation: shine 0.5s infinite;
      }

      @keyframes shine {
         to {
            background-position:
               0 0,
               0 0,
               40% 0,
               0 0;
         }
      }
   </style>
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
                  <table class="table table-loader table-sm mb-0" id="posts-table">

                     <thead class="table-light">
                        <tr>
                           <th>#</th>
                           <th>Judul</th>
                           <th>Author</th>
                           <th class="text-center">Kategori</th>
                           <th>Status</th>
                           {{-- <th>StatusAct</th> --}}
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
                                    {!! Str::of(strip_tags($post->title))->words(8, '...') !!}
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
                              {{-- <td class="text-center">
                                 @if ($post->status == 'pending')
                                    <span class="badge badge-soft-primary">Pending</span>
                                 @elseif ($post->status == 'approved')
                                    <span class="badge badge-soft-success">Approved</span>
                                 @else
                                    <span class="badge badge-soft-danger">Rejected</span>
                                 @endif
                              </td> --}}
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
                                             <a class="dropdown-item text-decoration-none" href="#">
                                                <form action="{{ route('posts.approval.form') }}" method="post">
                                                   @csrf
                                                   {{-- @method('PUT') --}}
                                                   <input type="hidden" name="status" value="rejected">
                                                   <input type="hidden" name="post_id" value="{{ $post->id }}">
                                                   <button type="submit" class="bg-transparent border-0">
                                                   <span class="text-danger">Reject it</span>
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
@extends('dashboard-borex.layouts.app')
@php
   $postsCount = App\Models\Post::where('user_id', $user->id)->count();
@endphp
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
                  <table class="table table-sm mb-0">

                     <thead class="table-light">
                        <tr>
                           <th>#</th>
                           <th>Judul</th>
                           <th>Slug</th>
                           <th>Kategori</th>
                           <th>Body</th>
                           <th class="text-center">
                              <i class="bx bx bx-edit font-size-16"></i>
                           </th>
                        </tr>
                     </thead>
                     <tbody>
                        @foreach ($user->posts as $key => $post)
                           <tr>
                              <th scope="row">{{ $loop->iteration }}</th>
                              <td>
                                 <a href="{{ route('posts.show', $post) }}" class="text-decoration-none text-dark">
                                    {{ $post->title }}
                                 </a>
                              </td>
                              <td>{{ $post->slug }}</td>
                              <td>{{ $post->category->name }}</td>
                              <td>{!! Str::limit($post->body, 10) !!}</td>
                              {{-- <td>
                                 <a class="badge rounded-pill badge-soft-success" href="{{ route('posts.edit', $post) }}">
                                    <i class="bx bx bx-edit font-size-16"></i>
                                 </a>
                                 <form action="{{ route('posts.destroy', $post) }}" method="post" class="d-inline">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="badge rounded-pill badge-soft-danger border-0" onclick="return confirm('Are you sure?')">
                                       <i class="bx bx bx-trash-alt font-size-16"></i>
                                    </button>
                                 </form>
                              </td> --}}
                              <td class="text-center">
                                 <div class="dropdown">
                                    <a class="text-muted dropdown-toggle font-size-18 px-2" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true">
                                       <i class="bx bx-dots-vertical-rounded"></i>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-end">
                                       <a class="dropdown-item d-flex align-items-center" href="{{ route('posts.edit', $post) }}">
                                          <span class="mb-1">Edit</span>
                                          <i class="bx bx bx-edit text-success font-size-16 ms-2"></i>
                                       </a>
                                       <form action="{{ route('posts.destroy', $post) }}" method="post" class="d-inline">
                                          <a class="dropdown-item d-flex align-items-center" href="#">
                                             @csrf
                                             @method('delete')
                                             <button type="submit" class="p-0 border-0 bg-transparent m-0" onclick="return confirm('Are you sure?')">
                                                <span class="mb-2 text-secondary">Delete</span>
                                                <i class="bx bx-trash-alt text-danger font-size-16"></i>
                                             </button>
                                          </a>
                                       </form>
                                    </div>
                                 </div>
                              </td>
                           </tr>
                        @endforeach
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </div>
@endsection

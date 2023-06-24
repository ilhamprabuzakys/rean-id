@extends('layouts.app')
@section('title')
   <h4 class="page-title">Users</h4>
@endsection
@section('content')
<div class="row align-items-center">
   <div class="col-md-6">
       <div class="mb-3">
           <h5 class="card-title">User List <span class="text-muted fw-normal ms-2">({{ $users->count() }})</span></h5>
       </div>
   </div>

   <div class="col-md-6">
       <div class="d-flex flex-wrap align-items-center justify-content-end gap-2 mb-3">
           <div>
               <ul class="nav nav-pills">
                   <li class="nav-item">
                       <a class="nav-link active" href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="List" aria-label="List"><i class="bx bx-list-ul"></i></a>
                   </li>
                   <li class="nav-item">
                       <a class="nav-link" href="{{ route('users.grid') }}" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Grid" aria-label="Grid"><i class="bx bx-grid-alt"></i></a>
                   </li>
               </ul>
           </div>
           <div>
               <a href="{{ route('users.create') }}" class="btn btn-primary"><i class="bx bx-plus me-1"></i> Add New</a>
           </div>
           <div class="dropdown">
               <a class="btn btn-link text-muted py-1 font-size-16 shadow-none dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                   <i class="bx bx-dots-horizontal-rounded"></i>
               </a>
               <ul class="dropdown-menu dropdown-menu-end">
                   <li><a class="dropdown-item" href="#">Print PDF</a></li>
                   <li><a class="dropdown-item" href="#">Export Excel</a></li>
               </ul>
           </div>
       </div>

   </div>
</div>   

   <div class="row">
      @foreach($users as $key => $user)
      <div class="col-xl-3 col-sm-6">
         <div class="card">
            <div class="card-body">
               <div class="dropdown float-end">
                  <a class="text-muted dropdown-toggle font-size-16" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true">
                     <i class="bx bx-dots-horizontal-rounded"></i>
                  </a>
                  <div class="dropdown-menu dropdown-menu-end">
                     <a class="dropdown-item text-success border-bottom" href="{{ route('users.edit', $user) }}">Edit</a>
                     {{-- <a class="dropdown-item" href="#">Remove</a> --}}
                     <form action="{{ route('users.destroy', $user) }}" method="post">
                     @csrf
                     @method('delete')
                     <button type="submit" class="bg-transparent border-0 text-danger px-4 py-1">Remove</button>
                     </form>
                  </div>
               </div>
               <div class="d-flex align-items-center">
                  <div>
                     <img src="{{ asset('assets/images/users/avatar-1.jpg') }}" alt="" class="rounded-circle img-thumbnail" width="50px">
                  </div>
                  <div class="flex-1 ms-3">
                     <h5 class="font-size-16 mb-1"><a href="#" class="text-dark">{{ $user->name }}</a></h5>
                     <span class="badge badge-soft-success mb-0">Full Stack Developer</span>
                  </div>
               </div>
               <div class="mt-3 pt-1">
                  <p class="text-muted mb-0"><i class="mdi mdi-phone font-size-15 align-middle pe-2 text-primary"></i>
                     070 2860 5375</p>
                  <p class="text-muted mb-0 mt-2"><i class="mdi mdi-email font-size-15 align-middle pe-2 text-primary"></i>
                     {{ $user->email }}</p>
                  <p class="text-muted mb-0 mt-2"><i class="mdi mdi-google-maps font-size-15 align-middle pe-2 text-primary"></i>
                     {{ $user->updated_at->diffForHumans(); }}</p>
               </div>

               <div class="d-flex gap-2 pt-4">
                  <button type="button" class="btn btn-soft-primary btn-sm w-50"><i class="bx bx-user me-1"></i> Profile</button>
                  <button type="button" class="btn btn-primary btn-sm w-50"><i class="bx bx-message-square-dots me-1"></i> Contact</button>
               </div>


            </div>
         </div>
         <!-- end card -->
      </div>
      <!-- end col -->
      @endforeach
   </div>
   <!-- end row -->

   <div class="row g-0 align-items-center pb-4">
      <div class="col-sm-6">
         <div>
            <p class="mb-sm-0">Showing 1 to 10 of 57 entries</p>
         </div>
      </div>
      <div class="col-sm-6">
         <div class="float-sm-end">
            <ul class="pagination mb-sm-0">
               <li class="page-item disabled">
                  <a href="#" class="page-link"><i class="mdi mdi-chevron-left"></i></a>
               </li>
               <li class="page-item active">
                  <a href="#" class="page-link">1</a>
               </li>
               <li class="page-item">
                  <a href="#" class="page-link">2</a>
               </li>
               <li class="page-item">
                  <a href="#" class="page-link">3</a>
               </li>
               <li class="page-item">
                  <a href="#" class="page-link">4</a>
               </li>
               <li class="page-item">
                  <a href="#" class="page-link">5</a>
               </li>
               <li class="page-item">
                  <a href="#" class="page-link"><i class="mdi mdi-chevron-right"></i></a>
               </li>
            </ul>
         </div>
      </div>
   </div>
   <!-- end row -->
@endsection

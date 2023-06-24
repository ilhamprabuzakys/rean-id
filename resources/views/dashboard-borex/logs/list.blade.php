@extends('layouts.app')
@section('title')
   <h4 class="page-title">{{ $title }}</h4>
@endsection

@section('content')
<div class="row align-items-center">
   <div class="col-md-6">
       <div class="mb-3">
           <h5 class="card-title">{{ $title }} <span class="text-muted fw-normal ms-2">({{ $logs->count() }})</span></h5>
       </div>
   </div>

   <div class="col-md-6">
       <div class="d-flex flex-wrap align-items-center justify-content-end gap-2 mb-3">
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
      <div class="col-xl-12">
         <div class="card">
            <div class="card-body">
               <div class="table-responsive">
                  <table class="table table-sm mb-0">

                     <thead class="table-light">
                        <tr>
                           <th>#</th>
                           <th>User Name</th>
                           <th>Type</th>
                           <th>Action</th>
                           <th>On</th>
                           <th>Description</th>
                           <th>Date</th>
                        </tr>
                     </thead>
                     <tbody>
                        @foreach ($logs as $key => $log)
                           <tr>
                              <th scope="row">{{ $key + 1 }}</th>
                              {{-- <td>{{ $firstname }}</td>
                              <td>{{ $lastname }}</td> --}}
                              <td>{{ $log->user->email }}</td>
                              <td>{{ $log->type }}</td>
                              <td>{{ $log->action }}</td>
                              <td>{{ $log->on }}</td>
                              <td>{{ $log->description }}</td>
                              <td>{{ $log->created_at->diffForHumans() }}</td>
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
@push('scripts')
   <script src="{{ asset('assets/libs/waves/waves.min.js') }}"></script>
@endpush

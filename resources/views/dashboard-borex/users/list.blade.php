@extends('dashboard-borex.layouts.app')
@php
   $usersCount = cache()->remember('usersCount', now()->addDays(1), function () {
       return App\Models\User::count();
   });
@endphp
@push('scripts')
   @include('dashboard-borex.components.datatable')
   <script>
      $(document).ready(function() {
         var table = $('#users-table').DataTable();

         $('#filter-role').on('change', function() {
            var role = $(this).val();
            console.log('role: ' + role);

            if (role === "") {
               table.column(4).search("").draw();
            } else {
               table.column(4).search(role).draw();
            }
         });

         $('#filter-posts-range').on('change', function() {
            var filterRange = $(this).val();
            console.log('filterRange: ' + filterRange);
            if (filterRange === "") {
               table.column(5).search("").draw();
            } else {
               var range = filterRange.split('-');
               var min = parseInt(range[0]);
               var max = parseInt(range[1]);

               table.column(5).search(function(data, _, rowData) {
                  var postingCount = parseInt($(rowData[5]).find('span').text());
                  console.log(postingCount);
                  if (filterRange === '51-keatas') {
                     return postingCount >= 51;
                  } else {
                     return postingCount >= min && postingCount <= max;
                  }
               }).draw();
            }
         });
      });
   </script>
@endpush
@section('title')
   <h4 class="page-title">Users</h4>
@endsection

@section('content')
   <div class="row align-items-center">
      <div class="col-md-6">
         <div class="mb-3">
            <h5 class="card-title">Total Users <span class="text-muted fw-normal ms-2">({{ $usersCount }})</span></h5>
         </div>
      </div>

      <div class="col-md-6">
         <div class="d-flex flex-wrap align-items-center justify-content-end gap-2 mb-3">
            <div>
               <a href="{{ route('index') . '/api/users' }}" class="btn btn-danger"><i class="bx bx-detail me-1"></i> API </a>
               <a href="{{ route('users.create') }}" class="btn btn-primary"><i class="bx bx-plus me-1"></i> Add New</a>
            </div>
         </div>

      </div>
   </div>
   <div class="row">
      <div class="col-xl-12">
         <div class="card">
            <div class="card-body">
               <div class="table-responsive">
                  <div class="row mb-3 justify-content-start">
                     <div class="col-lg-6">
                        <label for="filter-role" class="form-label">Role</label>
                        <select class="form-select form-select-md" name="role" id="filter-role">
                           <option selected value="">Semua</option>
                           @foreach ($roles as $role)
                              <option value="{{ $role->key }}">{{ $role->label }}</option>
                           @endforeach
                        </select>
                     </div>

                     <div class="col-lg-6">
                        <label for="filter-posts-range" class="form-label">Jumlah Postingan</label>
                        <select class="form-select form-select-md" name="filter_posts_range" id="filter-posts-range">
                           <option selected value="">Semua</option>
                           <option value="1-10">1 - 10</option>
                           <option value="11-25">11 - 25</option>
                           <option value="26-50">26 - 50</option>
                           <option value="51-keatas">51 ke atas</option>
                        </select>
                     </div>
                  </div>
                  <table class="table table-sm mb-0" id="users-table">
                     <thead class="table-light">
                        <tr>
                           <th>#</th>
                           <th>Name</th>
                           <th>Username</th>
                           <th>Email</th>
                           <th>Role</th>
                           <th>Banyak Postingan</th>
                           <th>Data</th>
                           <th>Action</th>
                        </tr>
                     </thead>
                     <tbody>
                        @foreach ($users as $user)
                           <tr>
                              <th scope="row">{{ $loop->iteration }}</th>
                              @php
                                 $fullname = $user->name;
                                 $lastSpacePos = strrpos($fullname, ' ');
                                 if ($lastSpacePos === false) {
                                     // Jika tidak ditemukan spasi, berarti hanya ada 1 kata dalam $fullname
                                     $lastname = '';
                                 } else {
                                     $lastname = substr($fullname, $lastSpacePos + 1);
                                 }
                                 // Memotong kata terakhir dari $fullname
                                 $firstname = trim(substr($fullname, 0, $lastSpacePos));
                                 
                                 if (empty($firstname)) {
                                     $firstname = $fullname;
                                 }
                              @endphp
                              <td>{{ $user->name }}</td>
                              <td>{{ $user->username }}</td>
                              <td>{{ $user->email }}</td>
                              <td>{{ $user->role }}</td>
                              <td>
                                 @php
                                    $banyakPostingan = $user->posts->count();
                                    $color_jumlah_postingan = '?';
                                    if ($banyakPostingan >= 1 && $banyakPostingan <= 10) {
                                        $color_jumlah_postingan = 'text-secondary';
                                    } elseif ($banyakPostingan >= 11 && $banyakPostingan <= 25) {
                                        $color_jumlah_postingan = 'text-primary';
                                    } elseif ($banyakPostingan >= 25 && $banyakPostingan <= 50) {
                                        $color_jumlah_postingan = 'text-success';
                                    } elseif ($banyakPostingan >= 51) {
                                        $color_jumlah_postingan = 'text-danger';
                                    }
                                 @endphp
                                 <span class="{{ $color_jumlah_postingan }}">{{ $banyakPostingan }}</span>
                              </td>
                              <td>
                                 <a href="#" class="text-decoration-none text-uppercase" data-bs-toggle="modal" data-bs-target="#postinganUser{{ $user->id }}">Lihat semua postingan</a>
                              </td>
                              {{-- <td>{{ $user->created_at->diffForHumans() }}</td> --}}
                              <td>
                                 <div class="dropdown">
                                    <a class="text-muted dropdown-toggle font-size-18 px-2" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true">
                                       <i class="bx bx-dots-horizontal-rounded"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                       <a class="dropdown-item text-success text-decoration-none" href="{{ route('users.edit', $user) }}">
                                          Edit
                                       </a>
                                       <a class="text-danger text-decoration-none dropdown-item" href="{{ route('users.destroy', $user) }}" data-confirm-delete="true">Delete</a>
                                    </div>
                                 </div>
                              </td>
                              @push('modal')
                                 @include('dashboard-borex.users.modal')
                              @endpush
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

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

         function filterUsersByRange(range) {
            $('#users-table-body tr').hide(); // Sembunyikan semua baris tabel
            if (range === '') {
               $('#users-table-body tr').show(); // Tampilkan semua baris jika tidak ada range yang dipilih
            } else {
               var rangeValues = range.split('-');
               var min = parseInt(rangeValues[0]);
               var max = parseInt(rangeValues[1]);
               var hasMatchingData = false;
               $('#users-table-body tr').each(function() {
                  var postingCount = parseInt($(this).find('td:nth-child(6) span').text());
                  if (postingCount >= min && postingCount <= max) {
                     $(this).show(); // Tampilkan baris jika postingCount berada dalam rentang yang dipilih
                     hasMatchingData = true;
                  }
               });
               if (!hasMatchingData) {
                  $('#no-data-row').show(); // Tampilkan pesan jika tidak ada data yang cocok
               }
            }
         }


         $('#filter-posts-range').on('change', function() {
            var selectedRange = $(this).val();
            filterUsersByRange(selectedRange);
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
                           <option value="">Semua</option>
                           <option value="1-10">1 - 10</option>
                           <option value="11-25">11 - 25</option>
                           <option value="26-50">26 - 50</option>
                           <option value="51-9999">51 ke atas</option>
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
                     <tbody id="users-table-body">
                        @foreach ($users as $user)
                           <tr data-post-count="{{ $user->posts()->count() }}">
                              <th scope="row">{{ $loop->iteration }}</th>
                              <td>{{ $user->name }}</td>
                              <td>{{ $user->username }}</td>
                              <td>{{ $user->email }}</td>
                              <td>{{ $user->role }}</td>
                              <td>
                                 @php
                                    $banyakPostingan = $user->posts()->count();
                                    $color_jumlah_postingan = '';
                                    if ($banyakPostingan >= 1 && $banyakPostingan <= 10) {
                                        $color_jumlah_postingan = 'text-secondary';
                                    } elseif ($banyakPostingan >= 11 && $banyakPostingan <= 25) {
                                        $color_jumlah_postingan = 'text-primary';
                                    } elseif ($banyakPostingan >= 26 && $banyakPostingan <= 50) {
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
                              @include('dashboard-borex.users.modal')
                           </tr>
                        @endforeach

                     </tbody>
                     <tr id="no-data-row" style="display: none;" class="text-center">
                        <td colspan="8">Tidak ada data yang cocok</td>
                     </tr>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </div>
@endsection

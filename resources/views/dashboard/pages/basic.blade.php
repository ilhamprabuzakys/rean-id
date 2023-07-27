@extends('dashboard.template.dashboard')
@include('components.datatables')
@section('content')
   @php
      $posts = \App\Models\Post::all();
      $users = \App\Models\User::all();
      $user = auth()->user();
   @endphp
   @push('page-css')
      <link rel="stylesheet" href="{{ asset('assets/dashboard/materialize/assets/vendor/css/pages/cards-statistics.css') }}" />
      <link rel="stylesheet" href="{{ asset('assets/dashboard/materialize/assets/vendor/css/pages/cards-analytics.css') }}" />
   @endpush
   @push('vendor-js')
      <script src="{{ asset('assets/dashboard/materialize/assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>
      <script src="{{ asset('assets/dashboard/materialize/assets/vendor/libs/swiper/swiper.js') }}"></script>
   @endpush
   @push('page-js')
      <script src="{{ asset('assets/dashboard/materialize/assets/js/dashboards-crm.js') }}"></script>
   @endpush
   @push('script')
      <script>
         $(document).ready(function() {
            var table = $('#aktivitas-table').DataTable({
               columnDefs: [{
                     orderable: false,
                     targets: 0
                  },
                  {
                     orderable: false,
                     targets: 1
                  },
                  {
                     orderable: false,
                     targets: 2
                  },
                  {
                     orderable: false,
                     targets: 3
                  },
                  {
                     orderable: false,
                     targets: 4
                  },
                  {
                     orderable: false,
                     targets: 5
                  },
                  {
                     orderable: true,
                     targets: 6
                  },
               ],
            });
         });
      </script>
   @endpush
   <h3 class="fw-bold py-3 mb-4">
      Dashboard
   </h3>

   <div class="row gy-4 mb-4">
      <!-- Cards with few info -->
      <div class="col-lg-3 col-sm-6">
         <div class="card">
            <div class="card-body">
               <div class="d-flex align-items-center flex-wrap gap-2">
                  <div class="avatar me-3">
                     <div class="avatar-initial bg-label-primary rounded">
                        <i class="mdi mdi-account-outline mdi-24px">
                        </i>
                     </div>
                  </div>
                  <div class="card-info">
                     <div class="d-flex align-items-center">
                        <h4 class="mb-0">{{ $jumlahUser }}</h4>
                        {{-- <i class="mdi mdi-chevron-down text-danger mdi-24px"></i> --}}
                        {{-- <small class="text-danger">8.10%</small> --}}
                     </div>
                     <small class="text-muted">Data Pengguna</small>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="col-lg-3 col-sm-6">
         <div class="card">
            <div class="card-body">
               <div class="d-flex align-items-center flex-wrap gap-2">
                  <div class="avatar me-3">
                     <div class="avatar-initial bg-label-danger rounded">
                        <i class="mdi mdi-library-outline mdi-24px">
                        </i>
                     </div>
                  </div>
                  <div class="card-info">
                     <div class="d-flex align-items-center">
                        <h4 class="mb-0">{{ $jumlahPostingan }}</h4>
                        {{-- <i class="mdi mdi-chevron-up text-success mdi-24px"></i> --}}
                        {{-- <small class="text-success">25.8%</small> --}}
                     </div>
                     <small class="text-muted">Data Postingan</small>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="col-lg-3 col-sm-6">
         <div class="card">
            <div class="card-body">
               <div class="d-flex align-items-center flex-wrap gap-2">
                  <div class="avatar me-3">
                     <div class="avatar-initial bg-label-info rounded">
                        <i class="mdi mdi-layers-outline mdi-24px">
                        </i>
                     </div>
                  </div>
                  <div class="card-info">
                     <div class="d-flex align-items-center">
                        <h4 class="mb-0">{{ $jumlahKategori }}</h4>
                        {{-- <i class="mdi mdi-chevron-down text-danger mdi-24px"></i> --}}
                        {{-- <small class="text-danger">12.1%</small> --}}
                     </div>
                     <small class="text-muted">Data Kategori</small>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="col-lg-3 col-sm-6">
         <div class="card">
            <div class="card-body">
               <div class="d-flex align-items-center flex-wrap gap-2">
                  <div class="avatar me-3">
                     <div class="avatar-initial bg-label-success rounded">
                        <i class="mdi mdi-tag-multiple-outline mdi-24px">
                        </i>
                     </div>
                  </div>
                  <div class="card-info">
                     <div class="d-flex align-items-center">
                        <h4 class="mb-0">{{ $jumlahLabel }}</h4>
                        {{-- <i class="mdi mdi-chevron-up text-success mdi-24px"></i> --}}
                        {{-- <small class="text-success">54.6%</small> --}}
                     </div>
                     <small class="text-muted">Data label</small>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!--/ Cards with few info -->

      {{-- Cards Role --}}
      <div class="col-xl-4 col-lg-6 col-md-6">
         <div class="card">
            <div class="card-body">
               <div
                  class="d-flex justify-content-between mb-2">
                  <h6 class="fw-normal">
                     Total {{ $jumlahSuperadmin }} users
                  </h6>
                  <ul
                     class="list-unstyled d-flex align-items-center avatar-group mb-0">
                     <li
                        data-bs-toggle="tooltip"
                        data-popup="tooltip-custom"
                        data-bs-placement="top"
                        title="Vinnie Mostowy"
                        class="avatar pull-up">
                        <img
                           class="rounded-circle"
                           src="{{ asset('assets/dashboard/materialize/assets/img/avatars/5.png') }}"
                           alt="Avatar" />
                     </li>
                     <li
                        data-bs-toggle="tooltip"
                        data-popup="tooltip-custom"
                        data-bs-placement="top"
                        title="Allen Rieske"
                        class="avatar pull-up">
                        <img
                           class="rounded-circle"
                           src="{{ asset('assets/dashboard/materialize/assets/img/avatars/12.png') }}"
                           alt="Avatar" />
                     </li>
                     <li
                        data-bs-toggle="tooltip"
                        data-popup="tooltip-custom"
                        data-bs-placement="top"
                        title="Julee Rossignol"
                        class="avatar pull-up">
                        <img
                           class="rounded-circle"
                           src="{{ asset('assets/dashboard/materialize/assets/img/avatars/6.png') }}"
                           alt="Avatar" />
                     </li>
                     <li class="avatar">
                        <span
                           class="avatar-initial rounded-circle pull-up bg-lighter text-body"
                           data-bs-toggle="tooltip"
                           data-bs-placement="bottom"
                           title="3 more">+3</span>
                     </li>
                  </ul>
               </div>
               <div
                  class="d-flex justify-content-between align-items-end">
                  <div class="role-heading">
                     <h4 class="mb-1 text-body">
                        Super Admin
                     </h4>
                     <a
                        href="javascript:;"
                        data-bs-toggle="modal"
                        data-bs-target="#addRoleModal"
                        class="role-edit-modal"><span>Edit Role</span></a>
                  </div>
                  <a
                     href="javascript:void(0);"
                     class="text-muted"><i
                        class="mdi mdi-content-copy mdi-20px"></i></a>
               </div>
            </div>
         </div>
      </div>
      <div class="col-xl-4 col-lg-6 col-md-6">
         <div class="card">
            <div class="card-body">
               <div
                  class="d-flex justify-content-between mb-2">
                  <h6 class="fw-normal">
                     Total {{ $jumlahAdmin }} users
                  </h6>
                  <ul
                     class="list-unstyled d-flex align-items-center avatar-group mb-0">
                     <li
                        data-bs-toggle="tooltip"
                        data-popup="tooltip-custom"
                        data-bs-placement="top"
                        title="Jimmy Ressula"
                        class="avatar pull-up">
                        <img
                           class="rounded-circle"
                           src="{{ asset('assets/dashboard/materialize/assets/img/avatars/4.png') }}"
                           alt="Avatar" />
                     </li>
                     <li
                        data-bs-toggle="tooltip"
                        data-popup="tooltip-custom"
                        data-bs-placement="top"
                        title="John Doe"
                        class="avatar pull-up">
                        <img
                           class="rounded-circle"
                           src="{{ asset('assets/dashboard/materialize/assets/img/avatars/1.png') }}"
                           alt="Avatar" />
                     </li>
                     <li
                        data-bs-toggle="tooltip"
                        data-popup="tooltip-custom"
                        data-bs-placement="top"
                        title="Kristi Lawker"
                        class="avatar pull-up">
                        <img
                           class="rounded-circle"
                           src="{{ asset('assets/dashboard/materialize/assets/img/avatars/2.png') }}"
                           alt="Avatar" />
                     </li>
                     <li class="avatar">
                        <span
                           class="avatar-initial rounded-circle pull-up bg-lighter text-body"
                           data-bs-toggle="tooltip"
                           data-bs-placement="bottom"
                           title="3 more">+3</span>
                     </li>
                  </ul>
               </div>
               <div
                  class="d-flex justify-content-between align-items-end">
                  <div class="role-heading">
                     <h4 class="mb-1 text-body">
                        Admin
                     </h4>
                     <a
                        href="javascript:;"
                        data-bs-toggle="modal"
                        data-bs-target="#addRoleModal"
                        class="role-edit-modal"><span>Edit Role</span></a>
                  </div>
                  <a
                     href="javascript:void(0);"
                     class="text-muted"><i
                        class="mdi mdi-content-copy mdi-20px"></i></a>
               </div>
            </div>
         </div>
      </div>
      <div class="col-xl-4 col-lg-6 col-md-6">
         <div class="card">
            <div class="card-body">
               <div
                  class="d-flex justify-content-between mb-2">
                  <h6 class="fw-normal">
                     Total {{ $jumlahMember }} users
                  </h6>
                  <ul
                     class="list-unstyled d-flex align-items-center avatar-group mb-0">
                     <li
                        data-bs-toggle="tooltip"
                        data-popup="tooltip-custom"
                        data-bs-placement="top"
                        title="Andrew Tye"
                        class="avatar pull-up">
                        <img
                           class="rounded-circle"
                           src="{{ asset('assets/dashboard/materialize/assets/img/avatars/6.png') }}"
                           alt="Avatar" />
                     </li>
                     <li
                        data-bs-toggle="tooltip"
                        data-popup="tooltip-custom"
                        data-bs-placement="top"
                        title="Rishi Swaat"
                        class="avatar pull-up">
                        <img
                           class="rounded-circle"
                           src="{{ asset('assets/dashboard/materialize/assets/img/avatars/9.png') }}"
                           alt="Avatar" />
                     </li>
                     <li
                        data-bs-toggle="tooltip"
                        data-popup="tooltip-custom"
                        data-bs-placement="top"
                        title="Rossie Kim"
                        class="avatar pull-up">
                        <img
                           class="rounded-circle"
                           src="{{ asset('assets/dashboard/materialize/assets/img/avatars/12.png') }}"
                           alt="Avatar" />
                     </li>
                     <li class="avatar">
                        <span
                           class="avatar-initial rounded-circle pull-up bg-lighter text-body"
                           data-bs-toggle="tooltip"
                           data-bs-placement="bottom"
                           title="3 more">+3</span>
                     </li>
                  </ul>
               </div>
               <div
                  class="d-flex justify-content-between align-items-end">
                  <div class="role-heading">
                     <h4 class="mb-1 text-body">
                        Member
                     </h4>
                     <a
                        href="javascript:;"
                        data-bs-toggle="modal"
                        data-bs-target="#addRoleModal"
                        class="role-edit-modal"><span>Edit Role</span></a>
                  </div>
                  <a
                     href="javascript:void(0);"
                     class="text-muted"><i
                        class="mdi mdi-content-copy mdi-20px"></i></a>
               </div>
            </div>
         </div>
      </div>
      {{-- / End Cards Role  --}}

      <!-- Congratulations card -->
      <div class="col-xl-4 col-lg-4 col-md-12 col-sm-8 col-12">
         <div class="card h-100">
            <div class="card-body text-nowrap">
               <h4 class="card-title mb-1 d-flex gap-2 flex-wrap">Welcome <strong>{{ $user->name }}!</strong> </h4>
               <p class="pb-0">Best seller of the month</p>
               <h4 class="text-primary mb-1">$42.8k</h4>
               <p class="mb-2 pb-1">78% of target 🚀</p>
               <a href="javascript:;" class="btn btn-sm btn-primary">View Sales</a>
            </div>
            <img src="assets/dashboard/materialize/assets/img/illustrations/trophy.png" class="position-absolute bottom-0 end-0 me-3" height="140" alt="view sales">
         </div>
      </div>
      <!--/ Congratulations card -->

      <!-- Total Profit -->
      <div class="col-xl-2 col-lg-2 col-md-3 col-sm-4 col-6">
         <div class="card h-100">
            <div class="card-body">
               <div class="d-flex justify-content-between align-items-start flex-wrap gap-2">
                  <div class="avatar">
                     <div class="avatar-initial bg-label-primary rounded">
                        <i class="mdi mdi-cart-plus mdi-24px"></i>
                     </div>
                  </div>
                  <div class="d-flex align-items-center">
                     <p class="mb-0 text-success me-1">+22%</p>
                     <i class="mdi mdi-chevron-up text-success"></i>
                  </div>
               </div>
               <div class="card-info mt-4 pt-1">
                  <h5 class="mb-2">155k</h5>
                  <p class="text-muted">Total Order</p>
                  <div class="badge bg-label-secondary rounded-pill">Last 4 Month</div>
               </div>
            </div>
         </div>
      </div>
      <!--/ Total Profit -->

      <!-- Total Expenses -->
      <div class="col-xl-2 col-lg-2 col-md-3 col-sm-4 col-6">
         <div class="card h-100">
            <div class="card-body">
               <div class="d-flex justify-content-between align-items-start flex-wrap gap-2">
                  <div class="avatar">
                     <div class="avatar-initial bg-label-success rounded">
                        <i class="mdi mdi-currency-usd mdi-24px"></i>
                     </div>
                  </div>
                  <div class="d-flex align-items-center">
                     <p class="mb-0 text-success me-1">+38%</p>
                     <i class="mdi mdi-chevron-up text-success"></i>
                  </div>
               </div>
               <div class="card-info mt-4 pt-1">
                  <h5 class="mb-2">$13.4k</h5>
                  <p class="text-muted">Total Sales</p>
                  <div class="badge bg-label-secondary rounded-pill">Last Six Month</div>
               </div>
            </div>
         </div>
      </div>
      <!--/ Total Expenses -->

      <!-- Total Profit chart -->
      <div class="col-xl-2 col-lg-2 col-md-3 col-sm-4 col-6">
         <div class="card h-100">
            <div class="card-header pb-0">
               <div class="d-flex align-items-end mb-1 flex-wrap gap-2">
                  <h4 class="mb-0 me-2">$88.5k</h4>
                  <p class="mb-0 text-danger">-18%</p>
               </div>
               <span class="d-block mb-2 text-muted">Total Profit</span>
            </div>
            <div class="card-body">
               <div id="totalProfitChart"></div>
            </div>
         </div>
      </div>
      <!--/ Total Profit chart -->

      <!-- Total Growth chart -->
      <div class="col-xl-2 col-lg-2 col-md-3 col-sm-4 col-6">
         <div class="card h-100">
            <div class="card-header pb-0">
               <div class="d-flex align-items-end mb-1 flex-wrap gap-2">
                  <h4 class="mb-0 me-2">$27.9k</h4>
                  <p class="mb-0 text-success">+16%</p>
               </div>
               <span class="d-block mb-2 text-muted">Total Growth</span>
            </div>
            <div class="card-body">
               <div id="totalGrowthChart"></div>
            </div>
         </div>
      </div>
      <!--/ Total Sales chart -->

      <!-- Recent Logged In Activity -->
      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
         <div class="card mb-4">
            <h5 class="card-header">
               {{ __('Aktivitas Login') }}
            </h5>
            <div class="card-datatable">
               <div class="table-responsive">
                  <table class="table" id="aktivitas-table">
                     <thead class="table-light">
                        <tr>
                           <th
                              class="text-truncate">
                              User
                           </th>
                           <th
                              class="text-truncate">
                              Role
                           </th>
                           <th
                              class="text-truncate">
                              Browser
                           </th>
                           <th
                              class="text-truncate">
                              OS
                           </th>
                           <th
                              class="text-truncate">
                              Perangkat
                           </th>
                           <th
                              class="text-truncate">
                              Lokasi
                           </th>
                           {{-- <th
                              class="text-truncate">
                              IP
                           </th> --}}
                           <th
                              class="text-truncate">
                              Waktu Login
                           </th>
                        </tr>
                     </thead>
                     <tbody>
                        @foreach ($user->login_info->sortByDesc('login_at') as $info)
                           <tr>
                              @php
                                 $deviceIcon =
                                     $info->device == 'Desktop'
                                         ? '<i
                              class="mdi mdi-laptop mdi-20px text-primary me-2"></i>'
                                         : '<i
                              class="mdi mdi-cellphone mdi-20px text-primary me-2"></i>';
                                 $osIcon = '';
                                 $browserIcon = '';
                                 if ($info->os == 'Windows') {
                                     $osIcon = '<i
                              class="mdi mdi-microsoft-windows mdi-20px text-primary me-2"></i>';
                                 } elseif ($info->os == 'Linux') {
                                     $osIcon = '<i
                              class="mdi mdi-penguin mdi-20px text-warning me-2"></i>';
                                 } elseif ($info->os == 'MacOS') {
                                     $osIcon = '<i
                              class="mdi mdi-apple mdi-20px text-dark me-2"></i>';
                                 } elseif ($info->os == 'AndroidOS') {
                                     $osIcon = '<i
                              class="mdi mdi-android mdi-20px text-success me-2"></i>';
                                 }
                                 if ($info->browser == 'Chrome') {
                                     $browserIcon = '<i
                              class="mdi mdi-google-chrome mdi-20px text-success me-2"></i>';
                                 } elseif ($info->browser == 'Firefox') {
                                     $browserIcon = '<i
                              class="mdi mdi-firefox mdi-20px text-danger me-2"></i>';
                                 } elseif ($info->browser == 'Safari') {
                                     $browserIcon = '<i
                              class="mdi mdi-apple-safari mdi-20px text-primary me-2"></i>';
                                 } elseif ($info->browser == 'Opera') {
                                     $browserIcon = '<i
                              class="mdi mdi-opera mdi-20px text-danger me-2"></i>';
                                 }
                                 $city = $info->city == 'Bandung' ? 'Kota Bandung' : $info->city;
                                 $region = $info->region == 'West Java' ? 'Jawa Barat' : $info->region;
                                 $roleIcon = '';
                                 if ($info->user->role == 'superadmin') {
                                     $role = 'SuperAdmin';
                                     $roleIcon = '<i
                              class="mdi mdi-cog-outline mdi-20px text-danger me-2"></i>';
                                 } elseif ($info->user->role == 'admin') {
                                     $roleIcon = '<i
                              class="mdi mdi-chart-donut mdi-20px text-success me-2"></i>';
                                     $role = 'Admin';
                                 } else {
                                     $roleIcon = '<i
                              class="mdi mdi-account-online mdi-20px text-primary me-2"></i>';
                                     $role = 'Member';
                                 }
                              @endphp
                              <td class="text-truncate">
                                 {{ $info->user->name }}
                              </td>
                              <td
                                 class="text-truncate text-heading">
                                 <div class="d-flex align-items-center">
                                    {!! $roleIcon !!}{{ $role }}
                                 </div>
                              </td>
                              <td
                                 class="text-truncate text-heading">
                                 <div class="d-flex align-items-center">
                                    {!! $browserIcon !!}{{ $info->browser }}
                                 </div>
                              </td>
                              <td class="text-truncate">
                                 <div class="d-flex align-items-center">
                                    {!! $osIcon !!} {{ $info->os }}
                                 </div>
                              </td>
                              <td
                                 class="text-truncate d-flex align-items-center">
                                 {!! $deviceIcon !!}
                                 {{ $info->device }}
                              </td>
                              <td
                                 class="text-truncate">
                                 {{ $city . ', ' . $region . ' ' . $info->country }}
                              </td>
                              {{-- <td
                                 class="text-truncate">
                                 {{ $info->login_ip }}
                              </td> --}}
                              <td
                                 class="text-truncate">
                                 {{ $info->login_at }}
                              </td>
                           </tr>
                        @endforeach
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
      <!--/ Recent Logged In Activity -->
   </div>
   <div class="row gy-4">
      <!-- Organic Sessions Chart-->
      <div class="col-lg-4 col-12">
         <div class="card">
            <div class="card-header pb-1">
               <div class="d-flex justify-content-between">
                  <h5 class="mb-1">Organic Sessions</h5>
                  <div class="dropdown">
                     <button class="btn p-0" type="button" id="organicSessionsDropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="mdi mdi-dots-vertical mdi-24px"></i>
                     </button>
                     <div class="dropdown-menu dropdown-menu-end" aria-labelledby="organicSessionsDropdown">
                        <a class="dropdown-item" href="javascript:void(0);">Last 28 Days</a>
                        <a class="dropdown-item" href="javascript:void(0);">Last Month</a>
                        <a class="dropdown-item" href="javascript:void(0);">Last Year</a>
                     </div>
                  </div>
               </div>
            </div>
            <div class="card-body">
               <div id="organicSessionsChart"></div>
            </div>
         </div>
      </div>
      <!--/ Organic Sessions Chart-->

      <!-- Project Timeline Chart-->
      <div class="col-lg-8 col-12">
         <div class="card">
            <div class="row">
               <div class="col-md-8 col-12">
                  <div class="card-header">
                     <h5 class="mb-1">Project Timeline</h5>
                     <small class="mb-0 text-body">Total 840 Task Completed</small>
                  </div>
                  <div class="card-body px-2">
                     <div id="projectTimelineChart"></div>
                  </div>
               </div>
               <div class="col-md-4 col-12 border-start">
                  <div class="card-header">
                     <div class="d-flex justify-content-between">
                        <h5 class="mb-1">Project List</h5>
                        <div class="dropdown">
                           <button class="btn p-0" type="button" id="projectTimeline" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <i class="mdi mdi-dots-vertical mdi-24px"></i>
                           </button>
                           <div class="dropdown-menu dropdown-menu-end" aria-labelledby="projectTimeline">
                              <a class="dropdown-item" href="javascript:void(0);">Refresh</a>
                              <a class="dropdown-item" href="javascript:void(0);">Share</a>
                              <a class="dropdown-item" href="javascript:void(0);">Update</a>
                           </div>
                        </div>
                     </div>
                     <small class="text-body mb-0">4 Ongoing Project</small>
                  </div>
                  <div class="card-body">
                     <div class="d-flex align-items-center mb-3 pb-1">
                        <div class="avatar">
                           <div class="avatar-initial bg-label-primary rounded">
                              <i class="mdi mdi-cellphone mdi-24px"></i>
                           </div>
                        </div>
                        <div class="ms-3 d-flex flex-column">
                           <h6 class="mb-1 fw-semibold">IOS Application</h6>
                           <small class="text-muted">Task 840/2.5K</small>
                        </div>
                     </div>
                     <div class="d-flex align-items-center mb-3 pb-1">
                        <div class="avatar">
                           <div class="avatar-initial bg-label-success rounded">
                              <i class="mdi mdi-creation mdi-24px"></i>
                           </div>
                        </div>
                        <div class="ms-3 d-flex flex-column">
                           <h6 class="mb-1 fw-semibold">Web Application</h6>
                           <small class="text-muted">Task 99/1.42k</small>
                        </div>
                     </div>
                     <div class="d-flex align-items-center mb-3 pb-1">
                        <div class="avatar">
                           <div class="avatar-initial bg-label-secondary rounded">
                              <i class="mdi mdi-credit-card-outline mdi-24px"></i>
                           </div>
                        </div>
                        <div class="ms-3 d-flex flex-column">
                           <h6 class="mb-1 fw-semibold">Bank Dashboard</h6>
                           <small class="text-muted">Task 58/100</small>
                        </div>
                     </div>
                     <div class="d-flex align-items-center">
                        <div class="avatar">
                           <div class="avatar-initial bg-label-info rounded">
                              <i class="mdi mdi-pencil-ruler-outline mdi-24px"></i>
                           </div>
                        </div>
                        <div class="ms-3 d-flex flex-column">
                           <h6 class="mb-1 fw-semibold">UI Kit Design</h6>
                           <small class="text-muted">Task 120/350</small>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!--/ Project Timeline Chart-->

      <!-- Weekly Overview Chart -->
      <div class="col-lg-4 col-md-6 col-12">
         <div class="card">
            <div class="card-header">
               <div class="d-flex justify-content-between">
                  <h5 class="mb-1">Weekly Overview</h5>
                  <div class="dropdown">
                     <button class="btn p-0" type="button" id="weeklyOverviewDropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="mdi mdi-dots-vertical mdi-24px"></i>
                     </button>
                     <div class="dropdown-menu dropdown-menu-end" aria-labelledby="weeklyOverviewDropdown">
                        <a class="dropdown-item" href="javascript:void(0);">Last 28 Days</a>
                        <a class="dropdown-item" href="javascript:void(0);">Last Month</a>
                        <a class="dropdown-item" href="javascript:void(0);">Last Year</a>
                     </div>
                  </div>
               </div>
            </div>
            <div class="card-body">
               <div id="weeklyOverviewChart"></div>
               <div class="mt-1">
                  <div class="d-flex align-items-center gap-3">
                     <h3 class="mb-0">62%</h3>
                     <p class="mb-0 text-muted">Your sales performance is 35% 😎 better compared to last month</p>
                  </div>
                  <div class="d-grid mt-3">
                     <button class="btn btn-primary" type="button">Details</button>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!--/ Weekly Overview Chart -->

      <!-- Social Network Visits -->
      <div class="col-lg-4 col-md-6 col-12">
         <div class="card h-100">
            <div class="card-header d-flex align-items-center justify-content-between">
               <h5 class="card-title m-0 me-2">Social Network Visits</h5>
               <div class="dropdown">
                  <button class="btn p-0" type="button" id="socialNetworkList" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     <i class="mdi mdi-dots-vertical mdi-24px"></i>
                  </button>
                  <div class="dropdown-menu dropdown-menu-end" aria-labelledby="socialNetworkList">
                     <a class="dropdown-item" href="javascript:void(0);">Last 28 Days</a>
                     <a class="dropdown-item" href="javascript:void(0);">Last Month</a>
                     <a class="dropdown-item" href="javascript:void(0);">Last Year</a>
                  </div>
               </div>
            </div>
            <div class="card-body">
               <div class="mb-3">
                  <div class="d-flex align-items-center mb-1">
                     <h4 class="mb-0">28,468</h4>
                     <span class="text-success ms-2 fw-semibold">
                        <i class="mdi mdi-menu-up"></i>
                        <small>62%</small>
                     </span>
                  </div>
                  <small class="text-muted">Last 1 Year Visits</small>
               </div>
               <ul class="p-0 m-0">
                  <li class="d-flex pb-1 mb-3">
                     <div class="flex-shrink-0">
                        <img src="assets/dashboard/materialize/assets/img/icons/brands/facebook-rounded.png" alt="facebook" class="me-3" height="34">
                     </div>
                     <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                        <div class="me-2">
                           <h6 class="mb-0">Facebook</h6>
                           <small class="text-muted">Social Media</small>
                        </div>
                        <div class="d-flex align-items-center">
                           <span class="fw-semibold text-heading">12,348</span>
                           <div class="ms-3 badge bg-label-success rounded-pill">+12%</div>
                        </div>
                     </div>
                  </li>
                  <li class="d-flex pb-1 mb-3">
                     <div class="flex-shrink-0">
                        <img src="assets/dashboard/materialize/assets/img/icons/brands/dribbble-rounded.png" alt="dribbble" class="me-3" height="34">
                     </div>
                     <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                        <div class="me-2">
                           <h6 class="mb-0">Dribbble</h6>
                           <small class="text-muted">Community</small>
                        </div>
                        <div class="d-flex align-items-center">
                           <span class="fw-semibold text-heading">8,450</span>
                           <div class="ms-3 badge bg-label-success rounded-pill">+32%</div>
                        </div>
                     </div>
                  </li>
                  <li class="d-flex pb-1 mb-3">
                     <div class="flex-shrink-0">
                        <img src="assets/dashboard/materialize/assets/img/icons/brands/twitter-rounded.png" alt="facebook" class="me-3" height="34">
                     </div>
                     <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                        <div class="me-2">
                           <h6 class="mb-0">Twitter</h6>
                           <small class="text-muted">Social Media</small>
                        </div>
                        <div class="d-flex align-items-center">
                           <span class="fw-semibold text-heading">350</span>
                           <div class="ms-3 badge bg-label-danger rounded-pill">-18%</div>
                        </div>
                     </div>
                  </li>
                  <li class="d-flex pb-1">
                     <div class="flex-shrink-0">
                        <img src="assets/dashboard/materialize/assets/img/icons/brands/instagram-rounded.png" alt="instagram" class="me-3" height="34">
                     </div>
                     <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                        <div class="me-2">
                           <h6 class="mb-0">Instagram</h6>
                           <small class="text-muted">Social Media</small>
                        </div>
                        <div class="d-flex align-items-center">
                           <span class="fw-semibold text-heading">25,566</span>
                           <div class="ms-3 badge bg-label-success rounded-pill">+42%</div>
                        </div>
                     </div>
                  </li>
               </ul>
            </div>
         </div>
      </div>
      <!--/ Social Network Visits -->

      <!-- Monthly Budget Chart-->
      <div class="col-lg-4 col-md-6 col-12">
         <div class="card h-100">
            <div class="card-header pb-1">
               <div class="d-flex justify-content-between">
                  <h5 class="mb-1">Monthly Budget</h5>
                  <div class="dropdown">
                     <button class="btn p-0" type="button" id="monthlyBudgetDropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="mdi mdi-dots-vertical mdi-24px"></i>
                     </button>
                     <div class="dropdown-menu dropdown-menu-end" aria-labelledby="monthlyBudgetDropdown">
                        <a class="dropdown-item" href="javascript:void(0);">Refresh</a>
                        <a class="dropdown-item" href="javascript:void(0);">Update</a>
                        <a class="dropdown-item" href="javascript:void(0);">Share</a>
                     </div>
                  </div>
               </div>
            </div>
            <div class="card-body">
               <div id="monthlyBudgetChart"></div>
               <div class="mt-3">
                  <p class="mb-0 text-muted">Last month you had $2.42 expense transactions, 12 savings entries and 4 bills.</p>
               </div>
            </div>
         </div>
      </div>
      <!--/ Monthly Budget Chart-->

      <!-- Meeting Schedule -->
      <div class="col-lg-4 col-md-6 col-12">
         <div class="card h-100">
            <div class="card-header d-flex align-items-center justify-content-between">
               <h5 class="card-title mb-0 me-2">Meeting Schedule</h5>
               <div class="dropdown">
                  <button class="btn p-0" type="button" id="meetingSchedule" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     <i class="mdi mdi-dots-vertical mdi-24px"></i>
                  </button>
                  <div class="dropdown-menu dropdown-menu-end" aria-labelledby="meetingSchedule">
                     <a class="dropdown-item" href="javascript:void(0);">Last 28 Days</a>
                     <a class="dropdown-item" href="javascript:void(0);">Last Month</a>
                     <a class="dropdown-item" href="javascript:void(0);">Last Year</a>
                  </div>
               </div>
            </div>
            <div class="card-body pt-2">
               <ul class="p-0 m-0">
                  <li class="d-flex mb-4 pb-1">
                     <div class="avatar flex-shrink-0 me-3">
                        <img src="assets/dashboard/materialize/assets/img/avatars/4.png" alt="avatar" class="rounded">
                     </div>
                     <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                        <div class="me-2">
                           <h6 class="mb-0 fw-semibold">Call with Woods</h6>
                           <small class="text-muted">
                              <i class="mdi mdi-calendar-blank-outline mdi-14px"></i>
                              <span>21 Jul | 08:20-10:30</span>
                           </small>
                        </div>
                        <div class="badge bg-label-primary rounded-pill">Business</div>
                     </div>
                  </li>
                  <li class="d-flex mb-4 pb-1">
                     <div class="avatar flex-shrink-0 me-3">
                        <img src="assets/dashboard/materialize/assets/img/avatars/5.png" alt="avatar" class="rounded">
                     </div>
                     <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                        <div class="me-2">
                           <h6 class="mb-0 fw-semibold">Conference call</h6>
                           <small class="text-muted">
                              <i class="mdi mdi-calendar-blank-outline mdi-14px"></i>
                              <span>21 Jul | 08:20-10:30</span>
                           </small>
                        </div>
                        <div class="badge bg-label-warning rounded-pill">Dinner</div>
                     </div>
                  </li>
                  <li class="d-flex mb-4 pb-1">
                     <div class="avatar flex-shrink-0 me-3">
                        <img src="assets/dashboard/materialize/assets/img/avatars/3.png" alt="avatar" class="rounded">
                     </div>
                     <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                        <div class="me-2">
                           <h6 class="mb-0 fw-semibold">Meeting with Mark</h6>
                           <small class="text-muted">
                              <i class="mdi mdi-calendar-blank-outline mdi-14px"></i>
                              <span>21 Jul | 08:20-10:30</span>
                           </small>
                        </div>
                        <div class="badge bg-label-secondary rounded-pill">Meetup</div>
                     </div>
                  </li>
                  <li class="d-flex mb-4 pb-1">
                     <div class="avatar flex-shrink-0 me-3">
                        <img src="assets/dashboard/materialize/assets/img/avatars/14.png" alt="avatar" class="rounded">
                     </div>
                     <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                        <div class="me-2">
                           <h6 class="mb-0 fw-semibold">Meeting in Oakland</h6>
                           <small class="text-muted">
                              <i class="mdi mdi-calendar-blank-outline mdi-14px"></i>
                              <span>21 Jul | 08:20-10:30</span>
                           </small>
                        </div>
                        <div class="badge bg-label-danger rounded-pill">Dinner</div>
                     </div>
                  </li>
                  <li class="d-flex mb-4 pb-1">
                     <div class="avatar flex-shrink-0 me-3">
                        <img src="assets/dashboard/materialize/assets/img/avatars/8.png" alt="avatar" class="rounded">
                     </div>
                     <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                        <div class="me-2">
                           <h6 class="mb-0 fw-semibold">Call with hilda</h6>
                           <small class="text-muted">
                              <i class="mdi mdi-calendar-blank-outline mdi-14px"></i>
                              <span>21 Jul | 08:20-10:30</span>
                           </small>
                        </div>
                        <div class="badge bg-label-success rounded-pill">Meditation</div>
                     </div>
                  </li>
                  <li class="d-flex">
                     <div class="avatar flex-shrink-0 me-3">
                        <img src="assets/dashboard/materialize/assets/img/avatars/1.png" alt="avatar" class="rounded">
                     </div>
                     <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                        <div class="me-2">
                           <h6 class="mb-0 fw-semibold">Meeting with Carl</h6>
                           <small class="text-muted">
                              <i class="mdi mdi-calendar-blank-outline mdi-14px"></i>
                              <span>21 Jul | 08:20-10:30</span>
                           </small>
                        </div>
                        <div class="badge bg-label-primary rounded-pill">Business</div>
                     </div>
                  </li>
               </ul>
            </div>
         </div>
      </div>
      <!--/ Meeting Schedule -->


      <!-- External Links Chart -->
      <div class="col-lg-4 col-md-6 col-12">
         <div class="card">
            <div class="card-header">
               <div class="d-flex justify-content-between">
                  <h5 class="mb-1">External Links</h5>
                  <div class="dropdown">
                     <button class="btn p-0" type="button" id="externalLinksDropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="mdi mdi-dots-vertical mdi-24px"></i>
                     </button>
                     <div class="dropdown-menu dropdown-menu-end" aria-labelledby="externalLinksDropdown">
                        <a class="dropdown-item" href="javascript:void(0);">Refresh</a>
                        <a class="dropdown-item" href="javascript:void(0);">Update</a>
                        <a class="dropdown-item" href="javascript:void(0);">Share</a>
                     </div>
                  </div>
               </div>
            </div>
            <div class="card-body">
               <div id="externalLinksChart"></div>
               <div class="table-responsive text-nowrap">
                  <table class="table table-borderless">
                     <tbody>
                        <tr>
                           <td class="text-start pb-0 ps-0">
                              <div class="d-flex align-items-center">
                                 <div class="badge badge-dot bg-primary me-2"></div>
                                 <h6 class="mb-0 fw-semibold">Google Analytics</h6>
                              </div>
                           </td>
                           <td class="pb-0">
                              <p class="mb-0 text-muted">$845k</p>
                           </td>
                           <td class="pe-0 pb-0">
                              <div class="d-flex align-items-center justify-content-end">
                                 <h6 class="mb-0 fw-semibold me-2">82%</h6>
                                 <i class="mdi mdi-chevron-up text-success"></i>
                              </div>
                           </td>
                        </tr>
                        <tr>
                           <td class="text-start pb-0 ps-0">
                              <div class="d-flex align-items-center">
                                 <div class="badge badge-dot bg-secondary me-2"></div>
                                 <h6 class="mb-0 fw-semibold">Facebook Ads</h6>
                              </div>
                           </td>
                           <td class="pb-0">
                              <p class="mb-0 text-muted">$12.5k</p>
                           </td>
                           <td class="pe-0 pb-0">
                              <div class="d-flex align-items-center justify-content-end">
                                 <h6 class="mb-0 fw-semibold me-2">52%</h6>
                                 <i class="mdi mdi-chevron-down text-danger"></i>
                              </div>
                           </td>
                        </tr>
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
      <!--/ External Links Chart -->

      <!-- Payment History -->
      <div class="col-lg-4 col-md-6 col-12">
         <div class="card h-100">
            <div class="card-header d-flex align-items-center justify-content-between">
               <h5 class="card-title m-0 me-2">Payment History</h5>
               <div class="dropdown">
                  <button class="btn p-0" type="button" id="paymentHistory" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     <i class="mdi mdi-dots-vertical mdi-24px"></i>
                  </button>
                  <div class="dropdown-menu dropdown-menu-end" aria-labelledby="paymentHistory">
                     <a class="dropdown-item" href="javascript:void(0);">Last 28 Days</a>
                     <a class="dropdown-item" href="javascript:void(0);">Last Month</a>
                     <a class="dropdown-item" href="javascript:void(0);">Last Year</a>
                  </div>
               </div>
            </div>
            <div class="table-responsive text-nowrap">
               <table class="table table-borderless">
                  <thead>
                     <tr>
                        <th class="text-capitalize text-body fw-medium fs-6">Card</th>
                        <th class="text-capitalize text-body fw-medium fs-6">Date</th>
                        <th class="text-end text-capitalize text-body fw-medium fs-6">Spend</th>
                     </tr>
                  </thead>
                  <tbody class="border-top">
                     <tr>
                        <td class="d-flex">
                           <div class="px-2 rounded bg-lighter d-flex align-items-center h-px-30">
                              <img src="assets/dashboard/materialize/assets/img/icons/payments/logo-visa.png" alt="credit-card" width="30">
                           </div>
                           <div class="ms-2">
                              <h6 class="mb-0 fw-semibold">*4399</h6>
                              <small class="text-muted">Credit Card</small>
                           </div>
                        </td>
                        <td class="text-muted small">05/Jan</td>

                        <td class="text-end">
                           <div class="ms-2">
                              <h6 class="mb-0 fw-semibold">-$2,820</h6>
                              <small class="text-muted">$10,450</small>
                           </div>
                        </td>
                     </tr>
                     <tr>
                        <td class="d-flex">
                           <div class="px-2 rounded bg-lighter d-flex align-items-center h-px-30">
                              <img src="assets/dashboard/materialize/assets/img/icons/payments/logo-mastercard.png" alt="debit-card" width="30">
                           </div>
                           <div class="ms-2">
                              <h6 class="mb-0 fw-semibold">*5545</h6>
                              <small class="text-muted">Debit Card</small>
                           </div>
                        </td>
                        <td class="text-muted small">12/Feb</td>

                        <td class="text-end">
                           <div class="ms-2">
                              <h6 class="mb-0 fw-semibold">-$345</h6>
                              <small class="text-muted">$8,709</small>
                           </div>
                        </td>
                     </tr>
                     <tr>
                        <td class="d-flex">
                           <div class="px-2 rounded bg-lighter d-flex align-items-center h-px-30">
                              <img src="assets/dashboard/materialize/assets/img/icons/payments/logo-american-express.png" alt="atm-card" width="30">
                           </div>
                           <div class="ms-2">
                              <h6 class="mb-0 fw-semibold">*9860</h6>
                              <small class="text-muted">ATM Card</small>
                           </div>
                        </td>
                        <td class="text-muted small">24/Feb</td>

                        <td class="text-end">
                           <div class="ms-2">
                              <h6 class="mb-0 fw-semibold">-$999</h6>
                              <small class="text-muted">$25,900</small>
                           </div>
                        </td>
                     </tr>
                     <tr>
                        <td class="d-flex">
                           <div class="px-2 rounded bg-lighter d-flex align-items-center h-px-30">
                              <img src="assets/dashboard/materialize/assets/img/icons/payments/logo-visa.png" alt="debit-card" width="30">
                           </div>
                           <div class="ms-2">
                              <h6 class="mb-0 fw-semibold">*4300</h6>
                              <small class="text-muted">Credit Card</small>
                           </div>
                        </td>
                        <td class="text-muted small">08/Mar</td>

                        <td class="text-end">
                           <div class="ms-2">
                              <h6 class="mb-0 fw-semibold">-$8,453</h6>
                              <small class="text-muted">$9,233</small>
                           </div>
                        </td>
                     </tr>
                     <tr>
                        <td class="d-flex">
                           <div class="px-2 rounded bg-lighter d-flex align-items-center h-px-30">
                              <img src="assets/dashboard/materialize/assets/img/icons/payments/logo-mastercard.png" alt="credit-card" width="30">
                           </div>
                           <div class="ms-2">
                              <h6 class="mb-0 fw-semibold">*5545</h6>
                              <small class="text-muted">Debit Card</small>
                           </div>
                        </td>
                        <td class="text-muted small">15/Apr</td>

                        <td class="text-end">
                           <div class="ms-2">
                              <h6 class="mb-0 fw-semibold">-$24</h6>
                              <small class="text-muted">$500</small>
                           </div>
                        </td>
                     </tr>
                     <tr>
                        <td class="d-flex">
                           <div class="px-2 rounded bg-lighter d-flex align-items-center h-px-30">
                              <img src="assets/dashboard/materialize/assets/img/icons/payments/logo-visa.png" alt="credit-card" width="30">
                           </div>
                           <div class="ms-2">
                              <h6 class="mb-0 fw-semibold">*4399</h6>
                              <small class="text-muted">Credit Card</small>
                           </div>
                        </td>
                        <td class="text-muted small">28/Apr</td>

                        <td class="text-end">
                           <div class="ms-2">
                              <h6 class="mb-0 fw-semibold">-$299</h6>
                              <small class="text-muted">$1,380</small>
                           </div>
                        </td>
                     </tr>
                  </tbody>

               </table>
            </div>
         </div>
      </div>
      <!--/ Payment History -->


      <!-- Most Sales in Countries -->
      <div class="col-lg-4 col-12">
         <div class="card h-100">
            <div class="card-header d-flex align-items-center justify-content-between">
               <h5 class="card-title m-0 me-2">Most Sales in Countries</h5>
               <div class="dropdown">
                  <button class="btn p-0" type="button" id="mostSales" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     <i class="mdi mdi-dots-vertical mdi-24px"></i>
                  </button>
                  <div class="dropdown-menu dropdown-menu-end" aria-labelledby="mostSales">
                     <a class="dropdown-item" href="javascript:void(0);">Last 28 Days</a>
                     <a class="dropdown-item" href="javascript:void(0);">Last Month</a>
                     <a class="dropdown-item" href="javascript:void(0);">Last Year</a>
                  </div>
               </div>
            </div>
            <div class="card-body">
               <div class="mt-1">
                  <div class="d-flex align-items-center">
                     <h1 class="mb-0 me-3 display-3">22,842</h1>
                     <div class="badge bg-label-success rounded-pill">+42%</div>
                  </div>
                  <small class="text-muted mt-1">Sales Last 90 Days</small>
               </div>
            </div>
            <div class="table-responsive text-nowrap border-top">
               <table class="table">
                  <tbody class="table-border-bottom-0">
                     <tr>
                        <td class="pe-5"><span class="text-heading">Australia</span></td>
                        <td class="ps-5 d-flex justify-content-end"><span class="text-heading fw-semibold">18,879</span></td>
                        <td>
                           <div class="d-flex align-items-center justify-content-end">
                              <span class="text-heading fw-semibold me-2">15%</span>
                              <i class="mdi mdi-chevron-down mdi-20px text-danger"></i>
                           </div>
                        </td>
                     </tr>
                     <tr>
                        <td class="pe-5"><span class="text-heading">Canada</span></td>
                        <td class="ps-5 d-flex justify-content-end"><span class="text-heading fw-semibold">10,357</span></td>
                        <td>
                           <div class="d-flex align-items-center justify-content-end">
                              <span class="text-heading fw-semibold me-2">85%</span>
                              <i class="mdi mdi-chevron-up mdi-20px text-success"></i>
                           </div>
                        </td>
                     </tr>
                     <tr>
                        <td class="pe-5"><span class="text-heading">India</span></td>
                        <td class="ps-5 d-flex justify-content-end"><span class="text-heading fw-semibold">4,860</span></td>
                        <td>
                           <div class="d-flex align-items-center justify-content-end">
                              <span class="text-heading fw-semibold me-2">48%</span>
                              <i class="mdi mdi-chevron-up mdi-20px text-success"></i>
                           </div>
                        </td>
                     </tr>
                     <tr>
                        <td class="pe-5"><span class="text-heading">France</span></td>
                        <td class="ps-5 d-flex justify-content-end"><span class="text-heading fw-semibold">2,560</span></td>
                        <td>
                           <div class="d-flex align-items-center justify-content-end">
                              <span class="text-heading fw-semibold me-2">36%</span>
                              <i class="mdi mdi-chevron-up mdi-20px text-success"></i>
                           </div>
                        </td>
                     </tr>
                     <tr>
                        <td class="pe-5"><span class="text-heading">United State</span></td>
                        <td class="ps-5 d-flex justify-content-end"><span class="text-heading fw-semibold">899</span></td>
                        <td>
                           <div class="d-flex align-items-center justify-content-end">
                              <span class="text-heading fw-semibold me-2">16%</span>
                              <i class="mdi mdi-chevron-down mdi-20px text-danger"></i>
                           </div>
                        </td>
                     </tr>
                     <tr>
                        <td class="pe-5"><span class="text-heading">Japan</span></td>
                        <td class="ps-5 d-flex justify-content-end"><span class="text-heading fw-semibold">43</span></td>
                        <td>
                           <div class="d-flex align-items-center justify-content-end">
                              <span class="text-heading fw-semibold me-2">35%</span>
                              <i class="mdi mdi-chevron-up mdi-20px text-success"></i>
                           </div>
                        </td>
                     </tr>
                     <tr>
                        <td class="pe-5"><span class="text-heading">Brazil</span></td>
                        <td class="ps-5 d-flex justify-content-end"><span class="text-heading fw-semibold">18</span></td>
                        <td>
                           <div class="d-flex align-items-center justify-content-end">
                              <span class="text-heading fw-semibold me-2">12%</span>
                              <i class="mdi mdi-chevron-up mdi-20px text-success"></i>
                           </div>
                        </td>
                     </tr>
                  </tbody>
               </table>
            </div>
         </div>
      </div>
      <!--/ Most Sales in Countries -->

      <!-- Roles Datatables -->
      <div class="col-lg-8 col-12">
         <div class="card">
            <div class="table-responsive rounded-3">
               <table class="datatables-crm table table-sm">
                  <thead class="table-light">
                     <tr>
                        <th class="py-3"></th>
                        <th class="py-3">User</th>
                        <th class="py-3">Email</th>
                        <th class="py-3">Role</th>
                        <th class="py-3">Status</th>
                     </tr>
                  </thead>
               </table>
            </div>
         </div>
      </div>
   </div>
@endsection

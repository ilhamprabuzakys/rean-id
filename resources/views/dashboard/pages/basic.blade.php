@extends('dashboard.template.dashboard')
@section('content')
<h3 class="fw-bold py-3 mb-4">
   Dashboard
</h3>

<div class="row gy-4 mb-4">
   <div class="col-12">
      <div class="row">
         <!-- Greetings card -->
         <div class="col-xl-4 col-lg-4 col-md-12 col-sm-8 col-12">
            <div class="card h-100">
               <div class="card-body text-nowrap">
                  <h4 class="card-title mb-1 d-flex gap-2 flex-wrap">Selamat Datang <strong>{{ auth()->user()->name
                        }}!</strong> </h4>
                  <p class="pb-0">Terakhir kali kamu login {{ auth()->user()->last_login_at }}</p>
                  <h5 class="mb-1">Karya kamu <span class="text-primary">{{ (auth()->user()->posts->count() ?? 0) +
                        (auth()->user()->events->count() ?? 0) + (auth()->user()->ebooks->count() ?? 0) +
                        (auth()->user()->news->count() ?? 0) }} </span></h5>
                  <p class="mb-2 pb-1">Tetap berkarya ya!</p>
                  <a href="{{ route('logs.index') }}" class="btn btn-sm btn-primary">Lihat aktivitas ku</a>
               </div>
               <img src="{{ asset('assets/dashboard/materialize/assets/img/illustrations/faq-illustration.png') }}"
                  class="position-absolute bottom-0 end-0 me-3" height="140" alt="lihat log">
            </div>
         </div>
         <!--/ Greetings card -->

         <!-- Cards with few info -->
         <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12">
            <div class="row">
               <div class="col-lg-3 col-sm-6 mb-3">
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
               <div class="col-lg-3 col-sm-6 mb-3">
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
               <div class="col-lg-3 col-sm-6 mb-3">
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
               <div class="col-lg-3 col-sm-6 mb-3">
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
               <div class="col-lg-3 col-sm-6 mb-3">
                  <div class="card">
                     <div class="card-body">
                        <div class="d-flex align-items-center flex-wrap gap-2">
                           <div class="avatar me-3">
                              <div class="avatar-initial bg-label-success rounded">
                                 <i class="fas fa-calendar-days">
                                 </i>
                              </div>
                           </div>
                           <div class="card-info">
                              <div class="d-flex align-items-center">
                                 <h4 class="mb-0">{{ $jumlahPostingan }}</h4>
                                 {{-- <i class="mdi mdi-chevron-up text-success mdi-24px"></i> --}}
                                 {{-- <small class="text-success">25.8%</small> --}}
                              </div>
                              <small class="text-muted">Data Event</small>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-lg-3 col-sm-6 mb-3">
                  <div class="card">
                     <div class="card-body">
                        <div class="d-flex align-items-center flex-wrap gap-2">
                           <div class="avatar me-3">
                              <div class="avatar-initial bg-label-warning rounded">
                                 <i class="fas fa-book">
                                 </i>
                              </div>
                           </div>
                           <div class="card-info">
                              <div class="d-flex align-items-center">
                                 <h4 class="mb-0">{{ $jumlahKategori }}</h4>
                                 {{-- <i class="mdi mdi-chevron-down text-danger mdi-24px"></i> --}}
                                 {{-- <small class="text-danger">12.1%</small> --}}
                              </div>
                              <small class="text-muted">Data Ebook</small>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-lg-3 col-sm-6 mb-3">
                  <div class="card">
                     <div class="card-body">
                        <div class="d-flex align-items-center flex-wrap gap-2">
                           <div class="avatar me-3">
                              <div class="avatar-initial bg-label-primary rounded">
                                 <i class="fas fa-newspaper">
                                 </i>
                              </div>
                           </div>
                           <div class="card-info">
                              <div class="d-flex align-items-center">
                                 <h4 class="mb-0">{{ $jumlahLabel }}</h4>
                                 {{-- <i class="mdi mdi-chevron-up text-success mdi-24px"></i> --}}
                                 {{-- <small class="text-success">54.6%</small> --}}
                              </div>
                              <small class="text-muted">Data Berita</small>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-lg-3 col-sm-6 mb-3">
                  <div class="card">
                     <div class="card-body">
                        <div class="d-flex align-items-center flex-wrap gap-2">
                           <div class="avatar me-3">
                              <div class="avatar-initial bg-label-danger rounded">
                                 <i class="fas fa-bullhorn">
                                 </i>
                              </div>
                           </div>
                           <div class="card-info">
                              <div class="d-flex align-items-center">
                                 <h4 class="mb-0">{{ $jumlahLabel }}</h4>
                                 {{-- <i class="mdi mdi-chevron-up text-success mdi-24px"></i> --}}
                                 {{-- <small class="text-success">54.6%</small> --}}
                              </div>
                              <small class="text-muted">Pengumuman</small>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!--/ Cards with few info -->
      </div>
   </div>
   {{-- Cards Role --}}
   <div class="col-xl-4 col-lg-6 col-md-6">
      <div class="card">
         <div class="card-body">
            <div class="d-flex justify-content-between mb-2">
               <h6 class="fw-normal">
                  Total {{ $jumlahSuperadmin }} users
               </h6>
               <ul class="list-unstyled d-flex align-items-center avatar-group mb-0">
                  <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                     title="Vinnie Mostowy" class="avatar pull-up">
                     <img class="rounded-circle"
                        src="{{ asset('assets/dashboard/materialize/assets/img/avatars/5.png') }}" alt="Avatar" />
                  </li>
                  <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="Allen Rieske"
                     class="avatar pull-up">
                     <img class="rounded-circle"
                        src="{{ asset('assets/dashboard/materialize/assets/img/avatars/12.png') }}" alt="Avatar" />
                  </li>
                  <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                     title="Julee Rossignol" class="avatar pull-up">
                     <img class="rounded-circle"
                        src="{{ asset('assets/dashboard/materialize/assets/img/avatars/6.png') }}" alt="Avatar" />
                  </li>
                  <li class="avatar">
                     <span class="avatar-initial rounded-circle pull-up bg-lighter text-body" data-bs-toggle="tooltip"
                        data-bs-placement="bottom" title="3 more">+3</span>
                  </li>
               </ul>
            </div>
            <div class="d-flex justify-content-between align-items-end">
               <div class="role-heading">
                  <h4 class="mb-1 text-body">
                     Super Admin
                  </h4>
                  <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#addRoleModal"
                     class="role-edit-modal"><span>Edit Role</span></a>
               </div>
               <a href="javascript:void(0);" class="text-muted"><i class="mdi mdi-content-copy mdi-20px"></i></a>
            </div>
         </div>
      </div>
   </div>
   <div class="col-xl-4 col-lg-6 col-md-6">
      <div class="card">
         <div class="card-body">
            <div class="d-flex justify-content-between mb-2">
               <h6 class="fw-normal">
                  Total {{ $jumlahAdmin }} users
               </h6>
               <ul class="list-unstyled d-flex align-items-center avatar-group mb-0">
                  <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="Jimmy Ressula"
                     class="avatar pull-up">
                     <img class="rounded-circle"
                        src="{{ asset('assets/dashboard/materialize/assets/img/avatars/4.png') }}" alt="Avatar" />
                  </li>
                  <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="John Doe"
                     class="avatar pull-up">
                     <img class="rounded-circle"
                        src="{{ asset('assets/dashboard/materialize/assets/img/avatars/1.png') }}" alt="Avatar" />
                  </li>
                  <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="Kristi Lawker"
                     class="avatar pull-up">
                     <img class="rounded-circle"
                        src="{{ asset('assets/dashboard/materialize/assets/img/avatars/2.png') }}" alt="Avatar" />
                  </li>
                  <li class="avatar">
                     <span class="avatar-initial rounded-circle pull-up bg-lighter text-body" data-bs-toggle="tooltip"
                        data-bs-placement="bottom" title="3 more">+3</span>
                  </li>
               </ul>
            </div>
            <div class="d-flex justify-content-between align-items-end">
               <div class="role-heading">
                  <h4 class="mb-1 text-body">
                     Admin
                  </h4>
                  <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#addRoleModal"
                     class="role-edit-modal"><span>Edit Role</span></a>
               </div>
               <a href="javascript:void(0);" class="text-muted"><i class="mdi mdi-content-copy mdi-20px"></i></a>
            </div>
         </div>
      </div>
   </div>
   <div class="col-xl-4 col-lg-6 col-md-6">
      <div class="card">
         <div class="card-body">
            <div class="d-flex justify-content-between mb-2">
               <h6 class="fw-normal">
                  Total {{ $jumlahMember }} users
               </h6>
               <ul class="list-unstyled d-flex align-items-center avatar-group mb-0">
                  <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="Andrew Tye"
                     class="avatar pull-up">
                     <img class="rounded-circle"
                        src="{{ asset('assets/dashboard/materialize/assets/img/avatars/6.png') }}" alt="Avatar" />
                  </li>
                  <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="Rishi Swaat"
                     class="avatar pull-up">
                     <img class="rounded-circle"
                        src="{{ asset('assets/dashboard/materialize/assets/img/avatars/9.png') }}" alt="Avatar" />
                  </li>
                  <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="Rossie Kim"
                     class="avatar pull-up">
                     <img class="rounded-circle"
                        src="{{ asset('assets/dashboard/materialize/assets/img/avatars/12.png') }}" alt="Avatar" />
                  </li>
                  <li class="avatar">
                     <span class="avatar-initial rounded-circle pull-up bg-lighter text-body" data-bs-toggle="tooltip"
                        data-bs-placement="bottom" title="3 more">+3</span>
                  </li>
               </ul>
            </div>
            <div class="d-flex justify-content-between align-items-end">
               <div class="role-heading">
                  <h4 class="mb-1 text-body">
                     Member
                  </h4>
                  <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#addRoleModal"
                     class="role-edit-modal"><span>Edit Role</span></a>
               </div>
               <a href="javascript:void(0);" class="text-muted"><i class="mdi mdi-content-copy mdi-20px"></i></a>
            </div>
         </div>
      </div>
   </div>
   {{-- / End Cards Role --}}

   {{-- Visitor Charts --}}
   <livewire:dashboard.chart-index />
   
   {{--/ Visitor Charts --}}

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
                        <th class="text-truncate">
                           User
                        </th>
                        <th class="text-truncate">
                           Role
                        </th>
                        <th class="text-truncate">
                           Browser
                        </th>
                        <th class="text-truncate">
                           OS
                        </th>
                        <th class="text-truncate">
                           Perangkat
                        </th>
                        <th class="text-truncate">
                           Lokasi
                        </th>
                        {{-- <th class="text-truncate">
                           IP
                        </th> --}}
                        <th class="text-truncate">
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
                        ? '<i class="mdi mdi-laptop mdi-20px text-primary me-2"></i>'
                        : '<i class="mdi mdi-cellphone mdi-20px text-primary me-2"></i>';
                        $osIcon = '';
                        $browserIcon = '';
                        if ($info->os == 'Windows') {
                        $osIcon = '<i class="mdi mdi-microsoft-windows mdi-20px text-primary me-2"></i>';
                        } elseif ($info->os == 'Linux') {
                        $osIcon = '<i class="mdi mdi-penguin mdi-20px text-warning me-2"></i>';
                        } elseif ($info->os == 'MacOS') {
                        $osIcon = '<i class="mdi mdi-apple mdi-20px text-dark me-2"></i>';
                        } elseif ($info->os == 'AndroidOS') {
                        $osIcon = '<i class="mdi mdi-android mdi-20px text-success me-2"></i>';
                        }
                        if ($info->browser == 'Chrome') {
                        $browserIcon = '<i class="mdi mdi-google-chrome mdi-20px text-success me-2"></i>';
                        } elseif ($info->browser == 'Firefox') {
                        $browserIcon = '<i class="mdi mdi-firefox mdi-20px text-danger me-2"></i>';
                        } elseif ($info->browser == 'Safari') {
                        $browserIcon = '<i class="mdi mdi-apple-safari mdi-20px text-primary me-2"></i>';
                        } elseif ($info->browser == 'Opera') {
                        $browserIcon = '<i class="mdi mdi-opera mdi-20px text-danger me-2"></i>';
                        }
                        $city = $info->city == 'Bandung' ? 'Kota Bandung' : $info->city;
                        $region = $info->region == 'West Java' ? 'Jawa Barat' : $info->region;
                        $roleIcon = '';
                        if ($info->user->role == 'superadmin') {
                        $role = 'SuperAdmin';
                        $roleIcon = '<i class="mdi mdi-cog-outline mdi-20px text-danger me-2"></i>';
                        } elseif ($info->user->role == 'admin') {
                        $roleIcon = '<i class="mdi mdi-chart-donut mdi-20px text-success me-2"></i>';
                        $role = 'Admin';
                        } else {
                        $roleIcon = '<i class="mdi mdi-account-online mdi-20px text-primary me-2"></i>';
                        $role = 'Member';
                        }
                        @endphp
                        <td class="text-truncate">
                           {{ $info->user->name }}
                        </td>
                        <td class="text-truncate text-heading">
                           <div class="d-flex align-items-center">
                              {!! $roleIcon !!}{{ $role }}
                           </div>
                        </td>
                        <td class="text-truncate text-heading">
                           <div class="d-flex align-items-center">
                              {!! $browserIcon !!}{{ $info->browser }}
                           </div>
                        </td>
                        <td class="text-truncate">
                           <div class="d-flex align-items-center">
                              {!! $osIcon !!} {{ $info->os }}
                           </div>
                        </td>
                        <td class="text-truncate d-flex align-items-center">
                           {!! $deviceIcon !!}
                           {{ $info->device }}
                        </td>
                        <td class="text-truncate">
                           {{ $city . ', ' . $region . ' ' . $info->country }}
                        </td>
                        {{-- <td class="text-truncate">
                           {{ $info->login_ip }}
                        </td> --}}
                        <td class="text-truncate">
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
@endsection
@include('components.datatables')
@push('page-css')
<link rel="stylesheet"
   href="{{ asset('assets/dashboard/materialize/assets/vendor/css/pages/cards-statistics.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/dashboard/materialize/assets/vendor/css/pages/cards-analytics.css') }}" />
@endpush
@push('vendor-css')
<link rel="stylesheet" href="{{ asset('assets/dashboard/materialize/assets/vendor/libs/apex-charts/apex-charts.css') }}" />
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
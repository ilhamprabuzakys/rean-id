@extends('dashboard-borex.layouts.app')
@section('title')
   <h4 class="page-title">Dashboard</h4>
@endsection
@php
   $postsCount = Illuminate\Support\Facades\Cache::remember('postsCount', now()->addDays(1), function () {
       return App\Models\Post::count();
   });
   
   $usersCount = Illuminate\Support\Facades\Cache::remember('usersCount', now()->addDays(1), function () {
       return App\Models\User::count();
   });
   
   $logsCount = Illuminate\Support\Facades\Cache::remember('logsCount', now()->addDays(1), function () {
       return App\Models\Log::count();
   });
@endphp
@section('content')
   <div class="row">
      <div class="col-xxl-9">
         <div class="row d-flex justify-content-between">
            <div class="col-xl col-lg-4">
               <div class="card">
                  <div class="card-body">
                     <div class="d-flex align-items-center">
                        <div class="flex-shrink-0 me-3">
                           <div class="avatar">
                              <div class="avatar-title rounded bg-primary bg-gradient">
                                 <i data-eva="people" class="fill-white"></i>
                              </div>
                           </div>
                        </div>
                        <div class="flex-grow-1">
                           <p class="text-muted mb-1">Total Users</p>
                           <h4 class="mb-0">{{ $usersCount }}</h4>
                        </div>

                        <div class="flex-shrink-0 align-self-end ms-2">
                           <div class="badge rounded-pill font-size-13 badge-soft-success">+3
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- end card body -->
               </div>
               <!-- end card -->
            </div>

            <div class="col-xl col-lg-4">
               <div class="card">
                  <div class="card-body">
                     <div class="d-flex align-items-center">
                        <div class="flex-shrink-0 me-3">
                           <div class="avatar">
                              <div class="avatar-title rounded bg-warning bg-gradient">
                                 <i data-eva="list-outline" class="fill-white"></i>
                              </div>
                           </div>
                        </div>
                        <div class="flex-grow-1">
                           <p class="text-muted mb-1">Total Postingan</p>
                           <h4 class="mb-0">{{ $postsCount }}</h4>
                        </div>
                        <div class="flex-shrink-0 align-self-end ms-2">
                           <div class="badge rounded-pill font-size-13 badge-soft-danger">+3
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- end card body -->
               </div>
               <!-- end card -->
            </div>
           
            <div class="col-xl col-lg-4">
               <div class="card">
                  <div class="card-body">
                     <div class="d-flex align-items-center">
                        <div class="flex-shrink-0 me-3">
                           <div class="avatar">
                              <div class="avatar-title rounded bg-danger bg-gradient">
                                 <i data-eva="list-outline" class="fill-white"></i>
                              </div>
                           </div>
                        </div>
                        <div class="flex-grow-1">
                           <p class="text-muted mb-1">Total Logs</p>
                           <h4 class="mb-0">{{ $postsCount }}</h4>
                        </div>
                        <div class="flex-shrink-0 align-self-end ms-2">
                           <div class="badge rounded-pill font-size-13 badge-soft-danger">+3
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- end card body -->
               </div>
               <!-- end card -->
            </div>
         </div>

         <div class="card">
            <div class="card-body pb-0">
               <div class="d-flex align-items-start">
                  <div class="flex-grow-1">
                     <h5 class="card-title mb-3">Chart Laporan Relawan Anti Narkoba</h5>
                  </div>
                  <div class="flex-shrink-0">
                     <div class="dropdown">
                        <a class="dropdown-toggle text-reset" href="#" data-bs-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">
                           <span class="fw-semibold me-2">Sort By : </span> <span
                              class="text-muted"> Yearly<i
                                 class="mdi mdi-chevron-down ms-1"></i></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-end">
                           <a class="dropdown-item" href="#">Yearly</a>
                           <a class="dropdown-item" href="#">Monthly</a>
                           <a class="dropdown-item" href="#">Weekly</a>
                           <a class="dropdown-item" href="#">Today</a>
                        </div>
                     </div>
                  </div>
               </div>

               <div class="row gy-4">
                  <div class="col-xxl-3">
                     <div>
                        <div class="mt-3 mb-3">
                           <p class="text-muted mb-1">Bulan Ini</p>

                           <div class="d-flex flex-wrap align-items-center gap-2">
                              <h2 class="mb-0">50 Partisipan</h2>
                              <div class="badge rounded-pill font-size-13 badge-soft-success">+
                                 10+</div>
                           </div>
                        </div>

                        {{-- <div class="row g-0">
                                <div class="col-sm-6">
                                    <div class="border-bottom border-end p-3 h-100">
                                        <p class="text-muted text-truncate mb-1">Orders</p>
                                        <h5 class="text-truncate mb-0">5,643</h5>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="border-bottom p-3 h-100">
                                        <p class="text-muted text-truncate mb-1">Sales</p>
                                        <h5 class="text-truncate mb-0">16,273</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="row g-0">
                                <div class="col-sm-6">
                                    <div class="border-bottom border-end p-3 h-100">
                                        <p class="text-muted text-truncate mb-1">Order Value</p>
                                        <h5 class="text-truncate mb-0">12.03 %</h5>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="border-bottom p-3 h-100">
                                        <p class="text-muted text-truncate mb-1">Customers</p>
                                        <h5 class="text-truncate mb-0">21,456</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="row g-0">
                                <div class="col-sm-6">
                                    <div class="border-end p-3 h-100">
                                        <p class="text-muted text-truncate mb-1">Income</p>
                                        <h5 class="text-truncate mb-0">$35,652</h5>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="p-3 h-100">
                                        <p class="text-muted text-truncate mb-1">Expenses</p>
                                        <h5 class="text-truncate mb-0">$12,248</h5>
                                    </div>
                                </div>
                            </div> --}}
                     </div>
                  </div>
                  <div class="col-xxl-9">
                     <div>
                        <div id="chart-column" class="apex-charts" data-colors='["#f1f3f7", "#3b76e1"]'></div>
                     </div>
                  </div>
               </div>
            </div>
            <!-- end card body -->
         </div>

         <div class="row mb-5">
            <div class="col-lg-12">
                <div class="card">
                  <div class="card-body">
                     <div>
                        <h3 class="text-uppercase" style="color: #ff912b">
                           Laporan Terbanyak
                        </h3>
                        <p>Congratulations...</p>
                     </div>

                     <div class="table-responsive">
                         <table class="table project-list-table table-nowrap align-middle table-borderless">
                             <thead class="shadow-lg">
                                 <tr>
                                    <th scope="col">#</th>
                                     <th scope="col" style="width: 100px" class="ps-4">Picture</th>
                                     <th scope="col">Name</th>
                                     <th scope="col">Contribution</th>
                                     <th scope="col">Reports</th>
                                     <th scope="col" class="text-center">#</th>
                                 </tr>
                             </thead>
                             <tbody>
                                 @for ($i = 1; $i <= 3; $i++)
                                 <tr class="shadow-lg">
                                    <td>{{ $i }}</td>
                                     <td class="ps-4">
                                        <div class="">
                                           <a href="javascript: void(0);" class="d-inline-block">
                                              <div class="avatar-md">
                                                  <span class="avatar-title rounded-circle bg-primary text-white font-size-24">
                                                      A
                                                  </span>
                                              </div>
                                          </a>   
                                       </div>
                                     </td>
                                     <td>
                                         <h5 class="text-truncate font-size-16"><a href="javascript: void(0);" class="text-dark">Budi Hartono</a></h5>
                                         <p class="text-muted mb-0">@budi-group</p>
                                     </td>
                                     <td class="pe-5">
                                       <div class="row align-items-center">
                                           <div class="col">
                                               <div class="progress" style="height: 6px;">
                                                   <div class="progress-bar bg-danger" role="progressbar" style="width: 87%" aria-valuenow="87" aria-valuemin="0" aria-valuemax="100"></div>
                                               </div>
                                           </div>
                                           <div class="col-auto">
                                              <h6 class="mb-0 font-size-13"> 87%</h6>
                                           </div>
                                       </div>
                                   </td>
                                     <td>
                                         <h4 class="text-truncate font-size-20"><a href="javascript: void(0);" class="text-warning">16 reports</a></h4>
                                     </td>
                                  
                                     <td>
                                        <div class="d-flex justify-content-center">
                                           <i data-eva="star-outline" class="fill-danger font-size-20"></i>
                                        </div>
                                     </td>
                                 </tr>
                                 @endfor
                             </tbody>
                         </table>
                     </div>
                 </div>
                </div>
            </div>
        </div>
      </div>
   </div>
   <!-- end row -->
@endsection
@push('scripts')
   <!-- apexcharts -->
   <script src="{{ asset('assets/borex/libs/apexcharts/apexcharts.min.js') }}"></script>
   <script src="{{ asset('assets/borex/js/pages/dashboard.init.js') }}"></script>
@endpush

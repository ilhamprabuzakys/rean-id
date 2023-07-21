@extends('dashboard.template.dashboard')
@section('content')
@php
   $posts = \App\Models\Post::all();
   $users = \App\Models\User::all();
@endphp
   <div class="row mb-2 mb-xl-3">
      <div class="col-auto d-none d-sm-block">
         <h3><strong>Informasi</strong> Dashboard</h3>
      </div>

      <div class="col-auto ms-auto text-end mt-n1">
         <a href="#" class="btn btn-danger me-2" onclick="printToPDF()" target="_blank">Simpan ke PDF</a>
         <script>
            function printToPDF() {
               window.print();
            }
         </script>
         <a href="#" class="btn btn-primary">Menu Cepat</a>
      </div>
   </div>
   <div class="row">
      <div class="col-xl-12 col-xxl-12 d-flex">
         <div class="w-100">
            <div class="row">
               <div class="col-sm-6">
                  <div class="card">
                     <div class="card-body">
                        <div class="row">
                           <div class="col mt-0">
                              <h5 class="card-title">Data Postingan</h5>
                           </div>

                           <div class="col-auto">
                              <div class="stat text-primary">
                                 <i class="align-middle" data-feather="book-open"></i>
                              </div>
                           </div>
                        </div>
                        <h1 class="mt-1 mb-3">{{ $posts->count() }}</h1>
                        <div class="mb-0">
                           <span class="badge badge-success-light"> <i class="mdi mdi-arrow-bottom-right"></i> +12 </span>
                           <span class="text-muted">Sejak hari ini</span>
                        </div>
                     </div>
                  </div>
                  <div class="card">
                     <div class="card-body">
                        <div class="row">
                           <div class="col mt-0">
                              <h5 class="card-title">Data Pengguna</h5>
                           </div>

                           <div class="col-auto">
                              <div class="stat text-primary">
                                 <i class="align-middle" data-feather="users"></i>
                              </div>
                           </div>
                        </div>
                        <h1 class="mt-1 mb-3">{{ $users->count() }}</h1>
                        <div class="mb-0">
                           <span class="badge badge-success-light"> <i class="mdi mdi-arrow-bottom-right"></i> +3 </span>
                           <span class="text-muted">Sejak hari ini</span>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-sm-6">
                  <div class="card">
                     <div class="card-body">
                        <div class="row">
                           <div class="col mt-0">
                              <h5 class="card-title">Postingan Pending</h5>
                           </div>

                           <div class="col-auto">
                              <div class="stat text-primary">
                                 <i class="align-middle" data-feather="loader"></i>
                              </div>
                           </div>
                        </div>
                        <h1 class="mt-1 mb-3">{{ $posts->where('status', 'pending')->count() }}</h1>
                        <div class="mb-0">
                           <span class="badge badge-primary-light"> <i class="mdi mdi-arrow-bottom-right"></i> 0  </span>
                           <span class="text-muted">Sejak hari ini</span>
                        </div>
                     </div>
                  </div>
                  <div class="card">
                     <div class="card-body">
                        <div class="row">
                           <div class="col mt-0">
                              <h5 class="card-title">Postingan Ditolak</h5>
                           </div>

                           <div class="col-auto">
                              <div class="stat text-primary">
                                 <i class="align-middle" data-feather="x"></i>
                              </div>
                           </div>
                        </div>
                        <h1 class="mt-1 mb-3">{{ $posts->where('status', 'rejected')->count() }}</h1>
                        <div class="mb-0">
                           <span class="badge badge-danger-light"> <i class="mdi mdi-arrow-bottom-right"></i> -18 </span>
                           <span class="text-muted">Sejak hari kemarin</span>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>

      <div class="col-xl-12 col-xxl-12">
         <div class="card flex-fill w-100">
            <div class="card-header">
               <div class="float-end">
                  <form class="row g-2">
                     <div class="col-auto">
                        <select class="form-select form-select-sm bg-light border-0">
                           <option>Jan</option>
                           <option value="1">Feb</option>
                           <option value="2">Mar</option>
                           <option value="3">Apr</option>
                        </select>
                     </div>
                     <div class="col-auto">
                        <input type="text" class="form-control form-control-sm bg-light rounded-2 border-0" style="width: 100px;"
                           placeholder="Search..">
                     </div>
                  </form>
               </div>
               <h5 class="card-title mb-0">Recent Movement</h5>
            </div>
            <div class="card-body pt-2 pb-3">
               <div class="chart chart-sm">
                  <canvas id="chartjs-dashboard-line"></canvas>
               </div>
            </div>
         </div>
      </div>
   </div>

   <div class="row">
      <div class="col-6 col-md-6 col-xxl-6 d-flex order-1">
         <div class="card flex-fill w-100">
            <div class="card-header">
               <div class="card-actions float-end">
                  <div class="dropdown position-relative">
                     <a href="#" data-bs-toggle="dropdown" data-bs-display="static">
                        <i class="align-middle" data-feather="more-horizontal"></i>
                     </a>

                     <div class="dropdown-menu dropdown-menu-end">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something else here</a>
                     </div>
                  </div>
               </div>
               <h5 class="card-title mb-0">Browser Usage</h5>
            </div>
            <div class="card-body d-flex">
               <div class="align-self-center w-100">
                  <div class="py-3">
                     <div class="chart chart-xs">
                        <canvas id="chartjs-dashboard-pie"></canvas>
                     </div>
                  </div>

                  <table class="table mb-0">
                     <tbody>
                        <tr>
                           <td><i class="fas fa-circle text-primary fa-fw"></i> Chrome <span
                                 class="badge badge-success-light">+12%</span></td>
                           <td class="text-end">4306</td>
                        </tr>
                        <tr>
                           <td><i class="fas fa-circle text-warning fa-fw"></i> Firefox <span
                                 class="badge badge-danger-light">-3%</span></td>
                           <td class="text-end">3801</td>
                        </tr>
                        <tr>
                           <td><i class="fas fa-circle text-danger fa-fw"></i> Edge</td>
                           <td class="text-end">1689</td>
                        </tr>
                        <tr>
                           <td><i class="fas fa-circle text-dark fa-fw"></i> Other</td>
                           <td class="text-end">3251</td>
                        </tr>
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
     
      <div class="col-6 col-lg-6 col-xxl-6 d-flex order-2">
         <div class="card flex-fill w-100">
            <div class="card-header">
               <div class="card-actions float-end">
                  <div class="dropdown position-relative">
                     <a href="#" data-bs-toggle="dropdown" data-bs-display="static">
                        <i class="align-middle" data-feather="more-horizontal"></i>
                     </a>

                     <div class="dropdown-menu dropdown-menu-end">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something else here</a>
                     </div>
                  </div>
               </div>
               <h5 class="card-title mb-0">Monthly Sales</h5>
            </div>
            <div class="card-body d-flex w-100">
               <div class="align-self-center chart chart-lg">
                  <canvas id="chartjs-dashboard-bar"></canvas>
               </div>
            </div>
         </div>
      </div>
     
   </div>

   <div class="row">
      <div class="col-12 col-lg-12 col-xxl-12 d-flex">
         <div class="card flex-fill">
            <div class="card-header">
               <div class="card-actions float-end">
                  <div class="dropdown position-relative">
                     <a href="#" data-bs-toggle="dropdown" data-bs-display="static">
                        <i class="align-middle" data-feather="more-horizontal"></i>
                     </a>

                     <div class="dropdown-menu dropdown-menu-end">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something else here</a>
                     </div>
                  </div>
               </div>
               <h5 class="card-title mb-0">User paling aktif</h5>
            </div>
            <table class="table table-borderless my-0">
               <thead>
                  <tr>
                     <th>Name</th>
                     <th class="d-none d-xxl-table-cell">Tanggal bergabung</th>
                     <th class="d-none d-xl-table-cell">Tanggal bergabung</th>
                     <th>Jumlah Postingan</th>
                     <th class="d-none d-xl-table-cell">#</th>
                  </tr>
               </thead>
               <tbody>
                  <tr>
                     <td>
                        <div class="d-flex">
                           <div class="flex-shrink-0">
                              <div class="bg-light rounded-2">
                                 <img class="p-2" width="50px" height="50px" src="{{ asset('assets/borex/images/users/avatar-2.jpg') }}">
                              </div>
                           </div>
                           <div class="flex-grow-1 ms-3">
                              <strong>Project Apollo</strong>
                              <div class="text-muted">
                                 Web, UI/UX Design
                              </div>
                           </div>
                        </div>
                     </td>
                     <td class="d-none d-xxl-table-cell">
                        <strong>Lechters</strong>
                        <div class="text-muted">
                           Real Estate
                        </div>
                     </td>
                     <td class="d-none d-xl-table-cell">
                        <strong>Vanessa Tucker</strong>
                        <div class="text-muted">
                           HTML, JS, React
                        </div>
                     </td>
                     <td>
                        <div class="d-flex flex-column w-100">
                           <span class="me-2 mb-1 text-muted">65%</span>
                           <div class="progress progress-sm bg-success-light w-100">
                              <div class="progress-bar bg-success" role="progressbar" style="width: 65%;"></div>
                           </div>
                        </div>
                     </td>
                     <td class="d-none d-xl-table-cell">
                        <a href="#" class="btn btn-light">View</a>
                     </td>
                  </tr>
                  <tr>
                     <td>
                        <div class="d-flex">
                           <div class="flex-shrink-0">
                              <div class="bg-light rounded-2">
                                 <img class="p-2" width="50px" height="50px" src="{{ asset('assets/borex/images/users/avatar-3.jpg') }}">
                              </div>
                           </div>
                           <div class="flex-grow-1 ms-3">
                              <strong>Project Bongo</strong>
                              <div class="text-muted">
                                 Web
                              </div>
                           </div>
                        </div>
                     </td>
                     <td class="d-none d-xxl-table-cell">
                        <strong>Cellophane Transportation</strong>
                        <div class="text-muted">
                           Transportation
                        </div>
                     </td>
                     <td class="d-none d-xl-table-cell">
                        <strong>William Harris</strong>
                        <div class="text-muted">
                           HTML, JS, Vue
                        </div>
                     </td>
                     <td>
                        <div class="d-flex flex-column w-100">
                           <span class="me-2 mb-1 text-muted">33%</span>
                           <div class="progress progress-sm bg-danger-light w-100">
                              <div class="progress-bar bg-danger" role="progressbar" style="width: 33%;"></div>
                           </div>
                        </div>
                     </td>
                     <td class="d-none d-xl-table-cell">
                        <a href="#" class="btn btn-light">View</a>
                     </td>
                  </tr>
                  <tr>
                     <td>
                        <div class="d-flex">
                           <div class="flex-shrink-0">
                              <div class="bg-light rounded-2">
                                 <img class="p-2" width="50px" height="50px" src="{{ asset('assets/borex/images/users/avatar-4.jpg') }}">
                              </div>
                           </div>
                           <div class="flex-grow-1 ms-3">
                              <strong>Project Canary</strong>
                              <div class="text-muted">
                                 Web, UI/UX Design
                              </div>
                           </div>
                        </div>
                     </td>
                     <td class="d-none d-xxl-table-cell">
                        <strong>Clemens</strong>
                        <div class="text-muted">
                           Insurance
                        </div>
                     </td>
                     <td class="d-none d-xl-table-cell">
                        <strong>Sharon Lessman</strong>
                        <div class="text-muted">
                           HTML, JS, Laravel
                        </div>
                     </td>
                     <td>
                        <div class="d-flex flex-column w-100">
                           <span class="me-2 mb-1 text-muted">50%</span>
                           <div class="progress progress-sm bg-warning-light w-100">
                              <div class="progress-bar bg-warning" role="progressbar" style="width: 50%;"></div>
                           </div>
                        </div>
                     </td>
                     <td class="d-none d-xl-table-cell">
                        <a href="#" class="btn btn-light">View</a>
                     </td>
                  </tr>
                  <tr>
                     <td>
                        <div class="d-flex">
                           <div class="flex-shrink-0">
                              <div class="bg-light rounded-2">
                                 <img class="p-2" width="50px" height="50px" src="{{ asset('assets/borex/images/users/avatar-5.jpg') }}">
                              </div>
                           </div>
                           <div class="flex-grow-1 ms-3">
                              <strong>Project Edison</strong>
                              <div class="text-muted">
                                 UI/UX Design
                              </div>
                           </div>
                        </div>
                     </td>
                     <td class="d-none d-xxl-table-cell">
                        <strong>Affinity Investment Group</strong>
                        <div class="text-muted">
                           Finance
                        </div>
                     </td>
                     <td class="d-none d-xl-table-cell">
                        <strong>Vanessa Tucker</strong>
                        <div class="text-muted">
                           HTML, JS, React
                        </div>
                     </td>
                     <td>
                        <div class="d-flex flex-column w-100">
                           <span class="me-2 mb-1 text-muted">80%</span>
                           <div class="progress progress-sm bg-success-light w-100">
                              <div class="progress-bar bg-success" role="progressbar" style="width: 80%;"></div>
                           </div>
                        </div>
                     </td>
                     <td class="d-none d-xl-table-cell">
                        <a href="#" class="btn btn-light">View</a>
                     </td>
                  </tr>
                  <tr>
                     <td>
                        <div class="d-flex">
                           <div class="flex-shrink-0">
                              <div class="bg-light rounded-2">
                                 <img class="p-2" width="50px" height="50px" src="{{ asset('assets/borex/images/users/avatar-6.jpg') }}">
                              </div>
                           </div>
                           <div class="flex-grow-1 ms-3">
                              <strong>Project Indigo</strong>
                              <div class="text-muted">
                                 Web, UI/UX Design
                              </div>
                           </div>
                        </div>
                     </td>
                     <td class="d-none d-xxl-table-cell">
                        <strong>Konsili</strong>
                        <div class="text-muted">
                           Retail
                        </div>
                     </td>
                     <td class="d-none d-xl-table-cell">
                        <strong>Christina Mason</strong>
                        <div class="text-muted">
                           HTML, JS, Vue
                        </div>
                     </td>
                     <td>
                        <div class="d-flex flex-column w-100">
                           <span class="me-2 mb-1 text-muted">78%</span>
                           <div class="progress progress-sm bg-primary-light w-100">
                              <div class="progress-bar bg-primary" role="progressbar" style="width: 78%;"></div>
                           </div>
                        </div>
                     </td>
                     <td class="d-none d-xl-table-cell">
                        <a href="#" class="btn btn-light">View</a>
                     </td>
                  </tr>
               </tbody>
            </table>
         </div>
      </div>
      
   </div>
@endsection
@push('script')
   <script>
      document.addEventListener("DOMContentLoaded", function() {
         var ctx = document.getElementById("chartjs-dashboard-line").getContext("2d");
         var gradientLight = ctx.createLinearGradient(0, 0, 0, 225);
         gradientLight.addColorStop(0, "rgba(215, 227, 244, 1)");
         gradientLight.addColorStop(1, "rgba(215, 227, 244, 0)");
         var gradientDark = ctx.createLinearGradient(0, 0, 0, 225);
         gradientDark.addColorStop(0, "rgba(51, 66, 84, 1)");
         gradientDark.addColorStop(1, "rgba(51, 66, 84, 0)");
         // Line chart
         new Chart(document.getElementById("chartjs-dashboard-line"), {
            type: "line",
            data: {
               labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
               datasets: [{
                  label: "Sales ($)",
                  fill: true,
                  backgroundColor: window.theme.id === "light" ? gradientLight : gradientDark,
                  borderColor: window.theme.primary,
                  data: [
                     2115,
                     1562,
                     1584,
                     1892,
                     1587,
                     1923,
                     2566,
                     2448,
                     2805,
                     3438,
                     2917,
                     3327
                  ]
               }]
            },
            options: {
               maintainAspectRatio: false,
               legend: {
                  display: false
               },
               tooltips: {
                  intersect: false
               },
               hover: {
                  intersect: true
               },
               plugins: {
                  filler: {
                     propagate: false
                  }
               },
               scales: {
                  xAxes: [{
                     reverse: true,
                     gridLines: {
                        color: "rgba(0,0,0,0.0)"
                     }
                  }],
                  yAxes: [{
                     ticks: {
                        stepSize: 1000
                     },
                     display: true,
                     borderDash: [3, 3],
                     gridLines: {
                        color: "rgba(0,0,0,0.0)",
                        fontColor: "#fff"
                     }
                  }]
               }
            }
         });
      });
   </script>
   <script>
      document.addEventListener("DOMContentLoaded", function() {
         // Pie chart
         new Chart(document.getElementById("chartjs-dashboard-pie"), {
            type: "pie",
            data: {
               labels: ["Chrome", "Firefox", "IE", "Other"],
               datasets: [{
                  data: [4306, 3801, 1689, 3251],
                  backgroundColor: [
                     window.theme.primary,
                     window.theme.warning,
                     window.theme.danger,
                     "#E8EAED"
                  ],
                  borderWidth: 5,
                  borderColor: window.theme.white
               }]
            },
            options: {
               responsive: !window.MSInputMethodContext,
               maintainAspectRatio: false,
               legend: {
                  display: false
               },
               cutoutPercentage: 70
            }
         });
      });
   </script>
   <script>
      document.addEventListener("DOMContentLoaded", function() {
         // Bar chart
         new Chart(document.getElementById("chartjs-dashboard-bar"), {
            type: "bar",
            data: {
               labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
               datasets: [{
                  label: "This year",
                  backgroundColor: window.theme.primary,
                  borderColor: window.theme.primary,
                  hoverBackgroundColor: window.theme.primary,
                  hoverBorderColor: window.theme.primary,
                  data: [54, 67, 41, 55, 62, 45, 55, 73, 60, 76, 48, 79],
                  barPercentage: .75,
                  categoryPercentage: .5
               }]
            },
            options: {
               maintainAspectRatio: false,
               legend: {
                  display: false
               },
               scales: {
                  yAxes: [{
                     gridLines: {
                        display: false
                     },
                     stacked: false,
                     ticks: {
                        stepSize: 20
                     }
                  }],
                  xAxes: [{
                     stacked: false,
                     gridLines: {
                        color: "transparent"
                     }
                  }]
               }
            }
         });
      });
   </script>
   <script>
      document.addEventListener("DOMContentLoaded", function() {
         var markers = [{
               coords: [31.230391, 121.473701],
               name: "Shanghai"
            },
            {
               coords: [28.704060, 77.102493],
               name: "Delhi"
            },
            {
               coords: [6.524379, 3.379206],
               name: "Lagos"
            },
            {
               coords: [35.689487, 139.691711],
               name: "Tokyo"
            },
            {
               coords: [23.129110, 113.264381],
               name: "Guangzhou"
            },
            {
               coords: [40.7127837, -74.0059413],
               name: "New York"
            },
            {
               coords: [34.052235, -118.243683],
               name: "Los Angeles"
            },
            {
               coords: [41.878113, -87.629799],
               name: "Chicago"
            },
            {
               coords: [51.507351, -0.127758],
               name: "London"
            },
            {
               coords: [40.416775, -3.703790],
               name: "Madrid "
            }
         ];
         var map = new jsVectorMap({
            map: "world",
            selector: "#world_map",
            zoomButtons: true,
            markers: markers,
            markerStyle: {
               initial: {
                  r: 9,
                  stroke: window.theme.white,
                  strokeWidth: 7,
                  stokeOpacity: .4,
                  fill: window.theme.primary
               },
               hover: {
                  fill: window.theme.primary,
                  stroke: window.theme.primary
               }
            },
            regionStyle: {
               initial: {
                  fill: window.theme["gray-200"]
               }
            },
            zoomOnScroll: false
         });
         window.addEventListener("resize", () => {
            map.updateSize();
         });
         setTimeout(function() {
            map.updateSize();
         }, 250);
      });
   </script>
   <script>
      document.addEventListener("DOMContentLoaded", function() {
         var date = new Date(Date.now() - 5 * 24 * 60 * 60 * 1000);
         var defaultDate = date.getUTCFullYear() + "-" + (date.getUTCMonth() + 1) + "-" + date.getUTCDate();
         document.getElementById("datetimepicker-dashboard").flatpickr({
            inline: true,
            prevArrow: "<span class=\"fas fa-chevron-left\" title=\"Previous month\"></span>",
            nextArrow: "<span class=\"fas fa-chevron-right\" title=\"Next month\"></span>",
            defaultDate: defaultDate
         });
      });
   </script>
   <script>
      document.addEventListener("DOMContentLoaded", function(event) {
         setTimeout(function() {
            if (localStorage.getItem('popState') !== 'shown') {
               window.notyf.open({
                  type: "success",
                  message: "Get access to all 500+ components and 45+ pages with AdminKit PRO. <u><a class=\"text-white\" href=\"https://adminkit.io/pricing\" target=\"_blank\">More info</a></u> 🚀",
                  duration: 10000,
                  ripple: true,
                  dismissible: false,
                  position: {
                     x: "left",
                     y: "bottom"
                  }
               });

               localStorage.setItem('popState', 'shown');
            }
         }, 15000);
      });
   </script>
@endpush
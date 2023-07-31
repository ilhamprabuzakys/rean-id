@extends('dashboard.template.dashboard')
@include('components.datatables')
@push('script')
   <script>
      $(document).ready(function() {
         var table = $('#aktivitas-table').DataTable({
            columnDefs: [
               {
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
            ],
         });
      });
   </script>
@endpush
@section('content')
   <h4 class="fw-bold py-3 mb-4">
      <a class="text-muted fw-light" href="{{ route('dashboard') }}">Home /</a>
      <a class="text-muted fw-light" href="{{ route('posts.index') }}">Setelan /</a>
      Keamanan
   </h4>
   <div class="row col-md-12">
      <ul
         class="nav nav-pills flex-column flex-md-row mb-3 gap-2 gap-lg-0">
         <li class="nav-item">
            <a
               class="nav-link"
               href="{{ route('settings.profile', auth()->user()) }}"><i
                  class="mdi mdi-account-outline mdi-20px me-1"></i>Informasi Akun</a>
         </li>
         <li class="nav-item">
            <a
               class="nav-link active"
               href="#"><i
                  class="mdi mdi-lock-open-outline mdi-20px me-1"></i>Keamanan</a>
         </li>
         <li class="nav-item">
            <a
               class="nav-link"
               href="{{ route('settings.social-media', auth()->user()) }}"><i
                  class="mdi mdi-link mdi-20px me-1"></i>Sosial Media</a>
         </li>
      </ul>
      <!-- Change Password -->
      <div class="card mb-4">
         <h5 class="card-header">
            Ganti Password
         </h5>
         <div class="card-body">
            <form id="formAccountSettings" method="POST" action="{{ route('settings.security.change-password', $user) }}">
               @csrf
               @method('POST')
               <div class="row">
                  <div
                     class="mb-3 col-md-6 form-password-toggle">
                     <div
                        class="input-group input-group-merge">
                        <div
                           class="form-floating form-floating-outline">
                           <input
                              class="form-control"
                              type="password"
                              name="currentPassword"
                              id="currentPassword"
                              placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />
                           <label
                              for="currentPassword">Password Saat Ini</label>
                        </div>
                        <span
                           class="input-group-text cursor-pointer"><i
                              class="mdi mdi-eye-off-outline"></i></span>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div
                     class="mb-4 col-md-6 form-password-toggle">
                     <div
                        class="input-group input-group-merge">
                        <div
                           class="form-floating form-floating-outline">
                           <input
                              class="form-control"
                              type="password"
                              id="newPassword"
                              name="newPassword"
                              placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />
                           <label
                              for="newPassword">Password Baru</label>
                        </div>
                        <span
                           class="input-group-text cursor-pointer"><i
                              class="mdi mdi-eye-off-outline"></i></span>
                     </div>
                  </div>
                  <div
                     class="mb-4 col-md-6 form-password-toggle">
                     <div
                        class="input-group input-group-merge">
                        <div
                           class="form-floating form-floating-outline">
                           <input
                              class="form-control"
                              type="password"
                              name="confirmPassword"
                              id="confirmPassword"
                              placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />
                           <label
                              for="confirmPassword">Konfirmasi Password Baru</label>
                        </div>
                        <span
                           class="input-group-text cursor-pointer"><i
                              class="mdi mdi-eye-off-outline"></i></span>
                     </div>
                  </div>
               </div>
               <h6 class="text-body">
                  Password persyaratan:
               </h6>
               <ul class="ps-3 mb-0">
                  <li class="mb-1">
                     Minimal 8 huruf, lebih banyak lebih baik
                  </li>
                  <li class="mb-1">
                     Memiliki setidaknya 1 karakter yang huruf besar
                  </li>
                  <li>
                     Memiliki setidaknya 1 simbol khusus
                  </li>
               </ul>
               <div class="mt-4">
                  <button
                     type="submit"
                     class="btn btn-primary me-2">
                     Simpan perubahan
                  </button>
                  <button
                     type="reset"
                     class="btn btn-outline-secondary">
                     Cancel
                  </button>
               </div>
            </form>
         </div>
      </div>
      <!--/ Change Password -->

      <!-- Two-steps verification -->
      {{--  <div class="card mb-4">
         <h5 class="card-header">
            Verifikasi Dua Langkah
         </h5>
         <div class="card-body">
            <p>
               Verifikasi dua langkah masih belum diaktifkan.
            </p>
            <p class="w-75">
                Autentikasi dua faktor menambahkan lapisan keamanan tambahan ke akun Anda dengan memerlukan lebih dari sekedar kata sandi untuk masuk
               <a href="javascript:void(0);">Pelajari lebih lanjut.</a>
            </p>
            <button
               class="btn btn-primary mt-2"
               data-bs-toggle="modal"
               data-bs-target="#enableOTP">
               Aktifkan verifikasi dua langkah
            </button>
         </div>
      </div>
      <!-- Modal -->
      <!-- Enable OTP Modal -->
      <div class="modal fade" id="enableOTP" tabindex="-1" aria-hidden="true">
         <div class="modal-dialog modal-simple modal-enable-otp modal-dialog-centered">
            <div class="modal-content p-3 p-md-5">
               <div class="modal-body p-md-0">
                  <button
                     type="button"
                     class="btn-close"
                     data-bs-dismiss="modal"
                     aria-label="Close"></button>
                  <div
                     class="text-center mb-4">
                     <h3 class="mb-2 pb-1">
                        Enable One Time
                        Password
                     </h3>
                     <p>
                        Verify Your Mobile
                        Number for SMS
                     </p>
                  </div>
                  <p>
                     Enter your mobile phone
                     number with country code
                     and we will send you a
                     verification code.
                  </p>
                  <form
                     id="enableOTPForm"
                     class="row g-3"
                     onsubmit="return false">
                     <div class="col-12">
                        <div
                           class="input-group input-group-merge">
                           <span
                              class="input-group-text">US
                              (+1)</span>
                           <div
                              class="form-floating form-floating-outline">
                              <input
                                 type="text"
                                 id="modalEnableOTPPhone"
                                 name="modalEnableOTPPhone"
                                 class="form-control phone-number-otp-mask"
                                 placeholder="202 555 0111" />
                              <label
                                 for="modalEnableOTPPhone">Phone
                                 Number</label>
                           </div>
                        </div>
                     </div>
                     <div class="col-12">
                        <button
                           type="submit"
                           class="btn btn-primary me-sm-3 me-1">
                           Submit
                        </button>
                        <button
                           type="reset"
                           class="btn btn-outline-secondary"
                           data-bs-dismiss="modal"
                           aria-label="Close">
                           Cancel
                        </button>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div> --}}
      <!--/ Enable OTP Modal -->

      <!-- /Modal -->

      <!--/ Two-steps verification -->

      <!-- Recent Logged In Activity -->
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
                        <th
                           class="text-truncate">
                           IP
                        </th>
                        <th
                           class="text-truncate">
                           Waktu Login
                        </th>
                     </tr>
                  </thead>
                  <tbody>
                     @foreach ($user->login_info as $info)
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
                           @endphp
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
                           <td
                              class="text-truncate">
                              {{ $info->login_ip }}
                           </td>
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
      <!--/ Recent Logged In Activity -->
   </div>
@endsection

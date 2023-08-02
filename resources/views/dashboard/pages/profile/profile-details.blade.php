@extends('dashboard.template.dashboard')
@push('vendor-css')
   <link rel="stylesheet" href="{{ asset('assets/dashboard/materialize/assets/vendor/libs/select2/select2.css') }}" />
   <link rel="stylesheet" href="{{ asset('assets/dashboard/materialize/assets/vendor/libs/formvalidation/dist/css/formValidation.min.css') }}" />
   <link rel="stylesheet" href="{{ asset('assets/dashboard/materialize/assets/vendor/libs/animate-css/animate.css') }}" />
   <link rel="stylesheet" href="{{ asset('assets/dashboard/materialize/assets/vendor/libs/sweetalert2/sweetalert2.css') }}" />
@endpush
@push('vendor-js')
   <script src="{{ asset('assets/dashboard/materialize/assets/vendor/libs/select2/select2.js') }}"></script>
   <script src="{{ asset('assets/dashboard/materialize/assets/vendor/libs/formvalidation/dist/js/FormValidation.min.js') }}"></script>
   <script src="{{ asset('assets/dashboard/materialize/assets/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js') }}"></script>
   <script src="{{ asset('assets/dashboard/materialize/assets/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js') }}"></script>
   <script src="{{ asset('assets/dashboard/materialize/assets/vendor/libs/cleavejs/cleave.js') }}"></script>
   <script src="{{ asset('assets/dashboard/materialize/assets/vendor/libs/cleavejs/cleave-phone.js') }}"></script>
   <script src="{{ asset('assets/dashboard/materialize/assets/vendor/libs/sweetalert2/sweetalert2.js') }}"></script>
@endpush
@push('page-js')
   <script src="{{ asset('assets/dashboard/materialize/assets/js/pages-account-settings-account.js') }}"></script>
@endpush
@section('content')
   <h4 class="fw-bold py-3 mb-4">
      <a class="text-muted fw-light" href="{{ route('dashboard') }}">Home /</a>
      <a class="text-muted fw-light" href="{{ route('posts.index') }}">Profile /</a>
      Informasi Akun
   </h4>
   <div class="row">
      <div class="col-md-12">
         <ul
            class="nav nav-pills flex-column flex-md-row mb-3 gap-2 gap-lg-0">
            <li class="nav-item">
               <a
                  class="nav-link active"
                  href="javascript:void(0);"><i
                     class="mdi mdi-account-outline mdi-20px me-1"></i>Informasi Akun</a>
            </li>
            <li class="nav-item">
               <a
                  class="nav-link"
                  href="{{ route('settings.security', auth()->user()) }}"><i
                     class="mdi mdi-lock-open-outline mdi-20px me-1"></i>Keamanan</a>
            </li>
            <li class="nav-item">
               <a
                  class="nav-link"
                  href="{{ route('settings.social-media', auth()->user()) }}"><i
                     class="mdi mdi-link mdi-20px me-1"></i>Sosial Media</a>
            </li>
         </ul>
         {{-- <div class="col-xl-6">
            <h6 class="text-muted">Filled Pills</h6>
            <div class="nav-align-top mb-4">
              <ul class="nav nav-pills mb-3 nav-fill" role="tablist">
                <li class="nav-item">
                  <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-justified-home" aria-controls="navs-pills-justified-home" aria-selected="true"><i class="tf-icons mdi mdi-home-outline me-1"></i> Home <span class="badge rounded-pill badge-center h-px-20 w-px-20 bg-danger ms-1">3</span></button>
                </li>
                <li class="nav-item">
                  <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-justified-profile" aria-controls="navs-pills-justified-profile" aria-selected="false"><i class="tf-icons mdi mdi-account-outline me-1"></i> Profile</button>
                </li>
                <li class="nav-item">
                  <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-justified-messages" aria-controls="navs-pills-justified-messages" aria-selected="false"><i class="tf-icons mdi mdi-message-text-outline me-1"></i> Messages</button>
                </li>
              </ul>
              <div class="tab-content">
                <div class="tab-pane fade show active" id="navs-pills-justified-home" role="tabpanel">
                  <p>
                    Icing pastry pudding oat cake. Lemon drops cotton candy caramels cake caramels sesame snaps powder. Bear
                    claw
                    candy topping.
                  </p>
                  <p class="mb-0">
                    Tootsie roll fruitcake cookie. Dessert topping pie. Jujubes wafer carrot cake jelly. Bonbon jelly-o
                    jelly-o ice
                    cream jelly beans candy canes cake bonbon. Cookie jelly beans marshmallow jujubes sweet.
                  </p>
                </div>
                <div class="tab-pane fade" id="navs-pills-justified-profile" role="tabpanel">
                  <p>
                    Donut dragée jelly pie halvah. Danish gingerbread bonbon cookie wafer candy oat cake ice cream. Gummies
                    halvah
                    tootsie roll muffin biscuit icing dessert gingerbread. Pastry ice cream cheesecake fruitcake.
                  </p>
                  <p class="mb-0">
                    Jelly-o jelly beans icing pastry cake cake lemon drops. Muffin muffin pie tiramisu halvah cotton candy
                    liquorice caramels.
                  </p>
                </div>
                <div class="tab-pane fade" id="navs-pills-justified-messages" role="tabpanel">
                  <p>
                    Oat cake chupa chups dragée donut toffee. Sweet cotton candy jelly beans macaroon gummies cupcake gummi
                    bears
                    cake chocolate.
                  </p>
                  <p class="mb-0">
                    Cake chocolate bar cotton candy apple pie tootsie roll ice cream apple pie brownie cake. Sweet roll icing
                    sesame snaps caramels danish toffee. Brownie biscuit dessert dessert. Pudding jelly jelly-o tart brownie
                    jelly.
                  </p>
                </div>
              </div>
            </div>
         </div> --}}
         <form
            id=""
            method="POST"
            action="{{ route('settings.profile.update', $user) }}" enctype="multipart/form-data">
            @csrf
            <div class="card mb-4">
               <h4 class="card-header">
                  Detail Profile
               </h4>
               <!-- Account -->
               <div class="card-body">
                  <div
                     class="d-flex align-items-start align-items-sm-center gap-4">
                     @if ($user->profile_path == null)
                     <img
                        src="{{ asset('assets/dashboard/materialize/assets/img/avatars/1.png') }}"
                        alt="user-avatar"
                        class="d-block w-px-120 h-px-120 rounded"
                        id="uploadedAvatar" />
                     @else
                     <img
                        src="{{ asset('storage/' . $user->profile_path) }}"
                        alt="user-avatar"
                        class="d-block w-px-120 h-px-120 rounded"
                        id="uploadedAvatar" />
                     @endif
                     <div class="button-wrapper">
                        <label
                           for="upload"
                           class="btn btn-primary me-2 mb-3"
                           tabindex="0">
                           <span
                              class="d-none d-sm-block">Unggah Foto Baru</span>
                           <i
                              class="mdi mdi-tray-arrow-up d-block d-sm-none"></i>
                           @if ($user->profile_path == null)
                              <input
                              type="file"
                              id="upload"
                              name="profile_path"
                              class="account-file-input"
                              hidden
                              >
                           @else
                           <input
                              type="file"
                              id="upload"
                              name="profile_path"
                              value="{{ $user->profile_path }}"
                              class="account-file-input"
                              hidden
                              >
                           <input
                              type="text"
                              id="old_profile_path"
                              name="old_profile_path"
                              value="{{ $user->profile_path }}"
                              hidden   
                              >
                           @endif
                        </label>
                        <button
                           type="button"
                           class="btn btn-outline-secondary account-image-reset mb-3">
                           <i
                              class="mdi mdi-reload d-block d-sm-none"></i>
                           <span
                              class="d-none d-sm-block">Urungkan</span>
                        </button>

                        <div
                           class="text-muted small">
                           Hanya JPG, JPEG dan PNG yang diperbolehkan.
                           Ukuran maksimal 800KB
                        </div>
                     </div>
                     @error('profile_path')
                        <div class="invalid-feedback">
                           {{ $message }}
                        </div>
                     @enderror
                  </div>
                  <script>
                     function readImage(input) {
                           if (input.files && input.files[0]) {
                              var reader = new FileReader();

                              reader.onload = function(e) {
                                 $('#uploadedAvatar').attr('src', e.target.result).show();
                                 // $('.image-preview-container').show();
                                 // $('#cancel-button').show();

                              };

                              reader.readAsDataURL(input.files[0]);
                           }
                        }

                        $("#upload").change(function() {
                           var fileExtension = ['jpeg', 'jpg', 'png', 'webp'];

                           if ($.inArray($(this).val().split('.').pop().toLowerCase(), fileExtension) != -1) {
                              readImage(this);
                           } else {
                              alert('format tidak boleh');
                           }
                        });

                        $(".account-image-reset").click(function() {
                           $('#upload').val('');
                        });
                  </script>
               </div>
               <div class="card-body pt-2 mt-1">
                  <div class="row mt-2 gy-4">
                     <div class="col-md-12">
                        <div
                           class="form-floating form-floating-outline">
                           <input
                              class="form-control @error('name') is-invalid @enderror"
                              type="text"
                              id="name"
                              name="name"
                              value="{{ $user->name }}"
                              autofocus />
                           <label
                              for="name">Nama Lengkap</label>
                        </div>
                        @error('name')
                           <div class="invalid-feedback">
                              {{ $message }}
                           </div>
                        @enderror
                     </div>
                     <div class="col-md-6">
                        <div
                           class="form-floating form-floating-outline">
                           <input
                              class="form-control @error('email') is-invalid @enderror"
                              type="email"
                              id="email"
                              name="email"
                              value="{{ $user->email }}"
                              readonly />
                           <label for="email">E-mail</label>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div
                           class="form-floating form-floating-outline">
                           <input
                              class="form-control @error('username') is-invalid @enderror"
                              type="username"
                              id="username"
                              name="username"
                              value="{{ $user->username }}" />
                           <label for="username">Username</label>
                           @error('username')
                              <div class="invalid-feedback">
                                 {{ $message }}
                              </div>
                           @enderror
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div
                           class="input-group input-group-merge">
                           <div
                              class="form-floating form-floating-outline">
                              <input
                                 type="text"
                                 id="notelp"
                                 name="notelp"
                                 class="form-control @error('notelp') is-invalid @enderror"
                                 value="{{ $user->notelp }}"
                                 placeholder="0851 6278 3743" />
                              <label
                                 for="notelp">Phone
                                 Number</label>
                           </div>
                           <span
                              class="input-group-text">ID (+62)</span>
                        </div>
                        @error('notelp')
                           <div class="invalid-feedback">
                              {{ $message }}
                           </div>
                        @enderror
                     </div>
                     <div class="col-md-6">
                        <div
                           class="form-floating form-floating-outline">
                           <input
                              type="text"
                              class="form-control @error('address') is-invalid @enderror"
                              id="address"
                              name="address"
                              value="{{ $user->address }}"
                              placeholder="Address" />
                           <label for="address">Address</label>
                        </div>
                        @error('address')
                           <div class="invalid-feedback">
                              {{ $message }}
                           </div>
                        @enderror
                     </div>
                  </div>
                  <div class="mt-4">
                     <button
                        type="submit"
                        class="btn btn-primary me-2">
                        Save changes
                     </button>
                     <button
                        type="reset"
                        class="btn btn-outline-secondary">
                        Cancel
                     </button>
                  </div>
               </div>
               <!-- /Account -->
            </div>
         </form>
      </div>
   </div>
@endsection

<div>
   <form
      wire:submit.prevent='update'
      enctype="multipart/form-data">
      @csrf
      <div class="card mb-4">
         <h4 class="card-header">
            Detail Profile
         </h4>
         <!-- Account -->
         <div class="card-body">
            <div
               class="d-flex align-items-start align-items-sm-center gap-4">
               @if (auth()->user()->avatar == null)
                  <img
                     src="{{ asset('assets/img/avatar/avatar-1.png') }}"
                     alt="user-avatar"
                     class="d-block w-px-120 h-px-120 rounded"
                     id="uploadedAvatar" />
               @else
                  <img
                     src="{{ asset($this->avatar) }}"
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
                     <input
                        type="file"
                        id="upload"
                        wire:model='avatar'
                        class="account-file-input"
                        >
                  </label>
                  <button
                     type="button"
                     class="btn btn-outline-secondary account-image-reset mb-3" id="img-reset-btn">
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
               @error('avatar')
                  <div class="invalid-feedback">
                     {{ $message }}
                  </div>
               @enderror
            </div>
            {{-- <script>
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
                     alert('Format gambar tidak diizinkan, tolong pastikan ekstensi file adalah : jpeg, jpg, png, webp');
                  }
               });

               $("#img-reset-btn").click(function() {
                  $('#uploadedAvatar').attr('src', "{{ asset('assets/img/avatar/avatar-1.png') }}").show();
               });
            </script> --}}
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
                        wire:model='name'
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
                        wire:model='email'
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
                        wire:model='username'/>
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
                           id="phone"
                           name="phone"
                           wire:model='phone'
                           class="form-control @error('phone') is-invalid @enderror"
                           placeholder="0851 6278 3743" />
                        <label
                           for="phone">Phone
                           Number</label>
                     </div>
                     <span
                        class="input-group-text">ID (+62)</span>
                  </div>
                  @error('phone')
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
                        wire:model='address'
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
                  Perbarui
               </button>
               <button
                  type="reset"
                  class="btn btn-outline-secondary"
                  wire:click='resetField()'>
                  Batalkan
               </button>
            </div>
         </div>
         <!-- /Account -->
      </div>
   </form>
</div>
<script>
   window.Livewire.on('fileChoosen', () => {
       let inputField = document.getElementById('avatar')
       let file = inputField.files[0]
       let reader = new FileReader();
       reader.onloadend = () => {
           window.Livewire.emit('fileUpload', reader.result)
       }
       reader.readAsDataURL(file);
   })
</script>

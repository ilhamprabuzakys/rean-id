<div>
   <div class="card mb-4">
      <h4 class="card-header">
         Detail Profile
      </h4>
      <!-- Account -->
      <div class="card-body">
         <div class="d-flex align-items-start align-items-sm-center gap-4">
            @if ($this->avatar && is_object($this->avatar) && method_exists($this->avatar, 'temporaryUrl'))
            <img src="{{ $this->avatar->temporaryUrl() }}" alt="user-avatar" class="d-block w-px-120 h-px-120 rounded"
               id="uploadedAvatar" style="object-fit: cover" />
            @elseif ($user->avatar)
            <img src="{{ asset($user->avatar) }}" alt="user-avatar" class="d-block w-px-120 h-px-120 rounded"
               id="uploadedAvatar" style="object-fit: cover" />
            @else
            <img src="{{ asset('assets/img/avatar/avatar-1.png') }}" alt="user-avatar"
               class="d-block w-px-120 h-px-120 rounded" id="uploadedAvatar" style="object-fit: cover" />
            @endif
            <div class="button-wrapper">
               <label for="upload" class="btn btn-primary me-2 mb-3" tabindex="0">
                  <span class="d-none d-sm-block">Unggah Foto Baru</span>
                  <i class="mdi mdi-tray-arrow-up d-block d-sm-none"></i>
                  <input type="file" id="upload" wire:model.live='avatar' class="account-file-input d-none">
                  <div wire:loading>
                     <span class="ms-2 spinner-border" role="status" aria-hidden="true"></span>
                     <span class="visually-hidden">Loading...</span>
                  </div>
               </label>
               <button type="button" class="btn btn-outline-secondary account-image-reset mb-3"
                  wire:click='$dispatch("cancelAvatar")' id="img-reset-btn">
                  <i class="mdi mdi-reload d-block d-sm-none"></i>
                  <span class="d-none d-sm-block">Urungkan</span>
               </button>

               <div class="text-muted small">
                  Hanya <strong>JPG</strong> , <strong>JPEG</strong> dan <strong>PNG</strong> yang diperbolehkan.
                  <br>
                  Ukuran maksimal : <strong>3MB</strong>
                  <br>
                  Ukuran Gambar: <strong>100px</strong> - <strong>2000px</strong>
               </div>
            </div>
            @error('avatar')
            <div class="invalid-feedback">
               {{ $message }}
            </div>
            @enderror
         </div>
      </div>
      <div class="card-body pt-2 mt-1">
         <div class="row mt-2">
            <div class="mb-3 col-md-12">
               <div class="input-group input-group-merge">
                  <span class="input-group-text"><i class="mdi mdi-account-outline"></i></span>
                  <div class="form-floating form-floating-outline">
                     <input class="form-control @error('name') is-invalid @enderror" type="text" id="name" name="name"
                        wire:model='name' autofocus />
                     <label for="name">Nama Anda <sup class="text-danger">*</sup></label>
                     @error('name')
                     <div class="invalid-feedback">
                        {{ $message }}
                     </div>
                     @enderror
                  </div>
               </div>
            </div>
            <div class="mb-1 col-md-6">
               <div class="input-group input-group-merge">
                  <span class="input-group-text"><i class="mdi mdi-email-outline"></i></span>
                  <div class="form-floating form-floating-outline">
                     <input class="form-control @error('email') is-invalid @enderror" type="email" id="email"
                        name="email" wire:model='email' readonly />
                     <label for="email">Email <sup class="text-danger">*</sup></label>
                  </div>
               </div>
            </div>
            <div class="mb-1 col-md-6">
               <div class="input-group input-group-merge">
                  <span class="input-group-text">@</span>
                  <div class="form-floating form-floating-outline">
                     <input class="form-control @error('username') is-invalid @enderror" type="username" id="username"
                        name="username" wire:model.live='username' />
                     <label for="username">Username <sup class="text-danger">*</sup></label>
                     @error('username')
                     <div class="invalid-feedback">
                        {{ $message }}
                     </div>
                     @enderror
                  </div>
               </div>
               <div class="text-muted small mt-1">
                  Username dapat berisi huruf kecil <strong>(a-z)</strong>, angka <strong>(0-9)</strong>,
                  dan garis bawah <strong>(_)</strong>.
               </div>
            </div>
            <div class="mb-3 col-md-12">
               <label for="description" class="form-label">Deskripsi</label>
               <textarea id="basic-description-message" class="form-control" wire:model='description'
                  rows="4"></textarea>
               @error('description')
               <div class="invalid-feedback">
                  {{ $message }}
               </div>
               @enderror
               <div class="text-muted small mt-1">
                  Tulis deskripsi singkat tentang diri kamu sehingga orang dapat mengetahui kamu lebih baik saat
                  mengunjungi halaman profilmu
               </div>
            </div>
         </div>
         <div class="mt-4">
            <button type="submit" class="btn btn-primary me-2" wire:click='update'>
               <i class="far fa-floppy-disk me-2"></i> Perbarui
            </button>
            <button type="reset" class="btn btn-outline-secondary" wire:click='resetField()'>
               <i class="fa fa-x me-2"></i> Batalkan
            </button>
         </div>
      </div>
      <!-- /Account -->
   </div>
   <script>
      document.addEventListener('DOMContentLoaded', function() {
         const avatar = document.getElementById('upload');

         // Pastikan File ada
         if (!avatar) return;
         
         avatar.addEventListener('change', function() {
            const file = avatar.files[0];
            
            if (!file) {
                  Swal.fire({
                     title: "Gagal Submit",
                     html: "File yang diupload harus berupa image",
                     icon: "error",
                     confirmButtonText: 'Ok',
                     timer: 2500,
                  })
                  // alert('Media file harus disertakan');
                  avatar.value = ''; // Reset input file
                  return;
            }

            // Cek ukuran file (3MB = 20 * 1024 * 1024 bytes)
            if (file.size > 3 * 1024 * 1024) {
                  Swal.fire({
                     title: "Gagal Upload",
                     html: "Ukuran file tidak boleh lebih besar dari <span class='text-danger'>3MB</span>",
                     icon: "error",
                     confirmButtonText: 'Ok',
                     timer: 2500,
                  })
                  // alert('Ukuran media file tidak boleh lebih besar dari 20MB');
                  avatar.value = ''; // Reset input file
                  return;
            }

            // Cek ekstensi file
            const allowedFormats = ['jpg', 'jpeg', 'png'];
            const fileExtension = file.name.split('.').pop().toLowerCase();
            if (!allowedFormats.includes(fileExtension)) {
                  Swal.fire({
                     title: "Gagal Upload",
                     html: "File harus dalam format: <span class='text-danger'>jpg, jpeg dan png</span>",
                     icon: "error",
                     confirmButtonText: 'Ok',
                     timer: 2500,
                  })
                  // alert('Media file harus berformat media: mp3, mp4, mkv');
                  avatar.value = ''; // Reset input file
                  return;
            }
         });
      });
   </script>
</div>
<script>
   window.Livewire.on('fileChoosen', () => {
      let inputField = document.getElementById('avatar')
      let file = inputField.files[0]
      let reader = new FileReader();
      reader.onloadend = () => {
         window.Livewire.dispatch('file-upload', reader.result)
      }
      reader.readAsDataURL(file);
   })
</script>
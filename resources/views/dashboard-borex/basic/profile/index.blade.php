@extends('layouts.app')
@section('title')
   <h4 class="page-title">Update Profile</h4>
@endsection
@section('content')
   <div class="row">
      <div class="col-md-4">
         <div class="card">
            <div class="card-header">
               Profile Picture
            </div>
            <div class="card-body">
               <form action="{{ route('profile.update', $user) }}" method="post" enctype="multipart/form-data">
                  @csrf
                  @method('PUT')
                  <div class="row">
                     <div class="col-md-12">
                        @if ($user->profile_path)
                           <img class="img-preview img-fluid mb-3 col-sm-5" src="{{ asset('storage/user/' . $user->profile_path) }}">
                           <input type="hidden" name="oldprofile_path" value="{{ $user->profile_path }}">
                        @else
                           <img class="img-preview d-none img-fluid col-md-12">
                        @endif
                        <input id="image" type="file" name="profile_path" onchange="previewImage()"
                           class="form-control @error('profile_path')
                     is-invalid
                  @enderror" value="{{ old('profile_path', $user->profile_path) }}">
                        @error('profile_path')
                           <div class="invalid-feedback">
                              {{ $message }}
                           </div>
                        @enderror
                     </div>
                  </div>
                  <div class="row mt-3">
                     <button class="btn rounded-0 bg-soft-success mb-2">Update</button>
                     <button class="btn rounded-0 bg-soft-danger mb-2">Remove</button>
                  </div>
                  {{-- <script>
                     function previewImage() {
                        const image = document.querySelector('#image');
                        const imgPreview = document.querySelector('.img-preview');
                        const imgPreview2 = document.querySelector('.img-preview2');
                        const imgDummy = document.querySelector('.img-dummy');
               
                        // imgPreview.style.display = 'block';
                        imgPreview.classList.replace('d-none', 'd-block');
                        imgPreview2.classList.replace('d-none', 'd-block');
                        imgDummy.classList.add('d-none');
                        const oFReader = new FileReader();
                        oFReader.readAsDataURL(image.files[0]);
                        oFReader.onload = function(oFREvent) {
                           imgPreview.src = oFREvent.target.result;
                           imgPreview2.src = oFREvent.target.result;
                        }
                     }
                  </script> --}}
            </div>
         </div>
      </div>
      <div class="col-md-8">
         <div class="card">
            <div class="card-body">

               <div class="mb-3 row">
                  <div class="col-md-12">
                     <label for="username" class="form-label">Username</label>
                     <input class="form-control @error('username')
                         is-invalid
                        @enderror" type="text" value="{{ old('username', $user->username) }}"
                        name="username"
                        id="username" readonly>
                     @error('username')
                        <div class="invalid-feedback">
                           {{ $message }}
                        </div>
                     @enderror
                  </div>
               </div>

               <div class="mb-3 row">
                  <div class="col-md-12">
                     <label for="name" class="form-label">Nama Lengkap</label>
                     <input class="form-control @error('name') is-invalid @enderror" type="text" value="{{ old('name', $user->name) }}" name="name"
                        id="name">
                     @error('name')
                        <div class="invalid-feedback">
                           {{ $message }}
                        </div>
                     @enderror
                  </div>
                  {{-- <div class="col-md-8">
                     <label for="firstname" class="form-label">Firstname</label>
                     <input class="form-control @error('firstname') is-invalid @enderror" type="text" value="{{ old('firstname') }}" name="firstname"
                        id="firstname">
                     @error('firstname')
                        <div class="invalid-feedback">
                           {{ $message }}
                        </div>   
                     @enderror
                  </div>
                  <div class="col-md-4">
                     <label for="lastname" class="form-label">Lastname</label>
                     <input class="form-control" type="text" value="{{ old('lastname') }}" name="lastname"
                        id="lastname">
                  </div> --}}
               </div>
               <div class="mb-3 row">
                  <div class="col-md-12">
                     <label for="no_anggota" class="form-label">No. Anggota</label>
                     <input class="form-control @error('no_anggota')
                          is-invalid
                         @enderror" type="string"
                        value="{{ old('no_anggota', $user->no_anggota) }}" name="no_anggota"
                        id="no_anggota" readonly>
                     @error('no_anggota')
                        <div class="invalid-feedback">
                           {{ $message }}
                        </div>
                     @enderror
                  </div>
               </div>
               <div class="mb-3 row">
                  <div class="col-md-12">
                     <label class="form-label">Jenis Kelamin</label>
                     <select class="form-select  @error('jenis_kelamin')
                     is-invalid
                    @enderror" name="jenis_kelamin" id="jenis_kelamin">
                        <option selected disabled>Pilih Gender</option>
                        @foreach ($jenis_kelamin as $key => $jk)
                           <option value="{{ $jk->singkatan }}" {{ old('jenis_kelamin', $user->jenis_kelamin) == $jk->singkatan ? 'selected' : '' }}>{{ $jk->name }}</option>
                        @endforeach
                     </select>
                     @error('jenis_kelamin')
                        <div class="invalid-feedback">
                           {{ $message }}
                        </div>
                     @enderror
                  </div>
               </div>
               <div class="mb-3 row">
                  <div class="col-md-12">
                     <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                     <input class="form-control @error('tempat_lahir')
                          is-invalid
                         @enderror" type="text"
                        value="{{ old('tempat_lahir', $user->tempat_lahir) }}"
                        name="tempat_lahir"
                        id="tempat_lahir">
                     @error('tempat_lahir')
                        <div class="invalid-feedback">
                           {{ $message }}
                        </div>
                     @enderror
                  </div>
               </div>
               <div class="mb-3 row">
                  <div class="col-md-12">
                     <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                     <input class="form-control @error('tanggal_lahir')
                          is-invalid
                         @enderror" type="date"
                        value="{{ old('tanggal_lahir', $user->tanggal_lahir) }}"
                        name="tanggal_lahir"
                        id="tanggal_lahir">
                     @error('tanggal_lahir')
                        <div class="invalid-feedback">
                           {{ $message }}
                        </div>
                     @enderror
                  </div>
               </div>
               <div class="mb-3 row">
                  <div class="col-md-12">
                     <label for="domisili" class="form-label">Domisili</label>
                     <input class="form-control @error('domisili')
                          is-invalid
                         @enderror" type="text"
                        value="{{ old('domisili', $user->domisili) }}"
                        name="domisili"
                        id="domisili">
                     @error('domisili')
                        <div class="invalid-feedback">
                           {{ $message }}
                        </div>
                     @enderror
                  </div>
               </div>
               <div class="mb-3 row">
                  <div class="col-md-12">
                     <label for="email" class="form-label">Email</label>
                     <input class="form-control @error('email')
                          is-invalid
                         @enderror" type="email" value="{{ old('email', $user->email) }}"
                        name="email"
                        id="email">
                     @error('email')
                        <div class="invalid-feedback">
                           {{ $message }}
                        </div>
                     @enderror
                  </div>
               </div>
               <div class="mb-3 row">
                  <div class="col-md-12">
                     <label for="no_ktp" class="form-label">No. KTP</label>
                     <input class="form-control @error('no_ktp')
                          is-invalid
                         @enderror" type="number" value="{{ old('no_ktp', $user->no_ktp) }}"
                        name="no_ktp"
                        id="no_ktp">
                     @error('no_ktp')
                        <div class="invalid-feedback">
                           {{ $message }}
                        </div>
                     @enderror
                  </div>
               </div>
               <div class="mb-3 row">
                  <div class="col-md-12">
                     <label for="pendidikan_terakhir" class="form-label">Pendidikan Terakhir</label>
                     <input class="form-control @error('pendidikan_terakhir')
                          is-invalid
                         @enderror" type="text"
                        value="{{ old('pendidikan_terakhir', $user->pendidikan_terakhir) }}"
                        name="pendidikan_terakhir"
                        id="pendidikan_terakhir">
                     @error('pendidikan_terakhir')
                        <div class="invalid-feedback">
                           {{ $message }}
                        </div>
                     @enderror
                  </div>
               </div>
               <div class="mb-3 row">
                  <div class="col-md-12">
                     <label for="mobile_no" class="form-label">No. Telepon/HP</label>
                     <input class="form-control @error('mobile_no')
                          is-invalid
                         @enderror" type="number"
                        value="{{ old('mobile_no', $user->mobile_no) }}"
                        name="mobile_no"
                        id="mobile_no">
                     @error('mobile_no')
                        <div class="invalid-feedback">
                           {{ $message }}
                        </div>
                     @enderror
                  </div>
               </div>
               <div class="mb-3 row">
                  <div class="col-md-12">
                     <label for="asal_instansi" class="form-label">Asal Instansi</label>
                     <input class="form-control @error('asal_instansi')
                          is-invalid
                         @enderror" type="text"
                        value="{{ old('asal_instansi', $user->asal_instansi) }}"
                        name="asal_instansi"
                        id="asal_instansi">
                     @error('asal_instansi')
                        <div class="invalid-feedback">
                           {{ $message }}
                        </div>
                     @enderror
                  </div>
               </div>
               <div class="mb-3 row">
                  <div class="col-md-12">
                     <label for="kelompok" class="form-label">Kelompok</label>
                     <input class="form-control @error('kelompok')
                          is-invalid
                         @enderror" type="text"
                        value="{{ old('kelompok', $user->kelompok) }}"
                        name="kelompok"
                        id="kelompok">
                     @error('kelompok')
                        <div class="invalid-feedback">
                           {{ $message }}
                        </div>
                     @enderror
                  </div>
               </div>
               <div class="mb-3 row">
                  <div class="col-md-12">
                     <label for="media_sosial" class="form-label">Media Sosial</label>
                     <input class="form-control @error('media_sosial')
                          is-invalid
                         @enderror" type="text"
                        value="{{ old('media_sosial', $user->media_sosial) }}"
                        name="media_sosial"
                        id="media_sosial">
                     @error('media_sosial')
                        <div class="invalid-feedback">
                           {{ $message }}
                        </div>
                     @enderror
                  </div>
               </div>
               <div class="mb-3 row">
                  <div class="col-md-12">
                     <label for="user_level" class="form-label">User Level</label>
                     <input class="form-control @error('user_level')
                          is-invalid
                         @enderror" type="text"
                        value="{{ old('user_level', $user->user_level) }}"
                        name="user_level"
                        id="user_level" readonly>
                     @error('user_level')
                        <div class="invalid-feedback">
                           {{ $message }}
                        </div>
                     @enderror
                  </div>
               </div>
               <div class="mb-3 row">
                  <div class="col-md-12">
                     <label for="group_name" class="form-label">Group Name</label>
                     <input class="form-control @error('group_name')
                          is-invalid
                         @enderror" type="text"
                        value="{{ old('group_name', $user->group_name) }}"
                        name="group_name"
                        id="group_name" readonly>
                     @error('group_name')
                        <div class="invalid-feedback">
                           {{ $message }}
                        </div>
                     @enderror
                  </div>
               </div>

               <div class="row">
                  <button class="btn btn-success mb-2" type="submit">Save Changes</button>
                  <a class="btn btn-primary text-decoration-none" href="{{ route('profile.password', $user) }}">Change Password</a>
               </div>
               </form>
            </div>
         </div>
      </div>
   </div>
   {{-- <script>
      function previewImage() {
         const image = document.querySelector('#image');
         const imgPreview = document.querySelector('.img-preview');
         const imgPreview2 = document.querySelector('.img-preview2');
         const imgDummy = document.querySelector('.img-dummy');

         // imgPreview.style.display = 'block';
         imgPreview.classList.replace('d-none', 'd-block');
         imgPreview2.classList.replace('d-none', 'd-block');
         imgDummy.classList.add('d-none');
         const oFReader = new FileReader();
         oFReader.readAsDataURL(image.files[0]);
         oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result;
            imgPreview2.src = oFREvent.target.result;
         }
      }
   </script> --}}
@endsection

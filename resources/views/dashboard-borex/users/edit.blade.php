@extends('layouts.app')
@section('title')
   <h4 class="page-title">Edit Users</h4>
@endsection
@section('content')
   <div class="row">
      <div class="col-12">
         <div class="card">
            {{-- <div class="card-header">
                   <h4 class="card-title">Input User Data</h4>
               </div> --}}
            <div class="card-body">

               <form action="{{ route('users.update', $user) }}" method="post">
                  @csrf
                  @method('put')
                  <div class="mb-3 row">
                     <div class="col-md-8">
                        <label for="name" class="form-label">Firstname</label>
                        <input class="form-control @error('firstname') is-invalid @enderror" type="text" value="{{ old('firstname', $firstname) }}" name="firstname"
                           id="firstname">
                        @error('firstname')
                           <div class="invalid-feedback">
                              {{ $message }}
                           </div>
                        @enderror
                     </div>
                     <div class="col-md-4">
                        <label for="lastname" class="form-label">Lastname</label>
                        <input class="form-control" type="text" value="{{ old('lastname', $lastname) }}" name="lastname"
                           id="lastname">
                     </div>
                  </div>
                  <div class="mb-3 row">
                     <div class="col-md-9">
                        <label for="email" class="form-label">Email</label>
                        <input class="form-control @error('email')
                          is-invalid
                         @enderror" type="email" value="{{ old('email', $user->email) }}" name="email"
                           id="email">
                        @error('email')
                           <div class="invalid-feedback">
                              {{ $message }}
                           </div>
                        @enderror
                     </div>
                     <div class="col-md-3">
                        <label for="username" class="form-label">Username</label>
                        <input class="form-control @error('username')
                         is-invalid
                        @enderror" type="text" value="{{ old('username', $user->username) }}" name="username"
                           id="username">
                        @error('username')
                           <div class="invalid-feedback">
                              {{ $message }}
                           </div>
                        @enderror
                     </div>
                  </div>
                  <div class="mb-3 row">
                     <div class="col-md-6">
                        <label for="password" class="form-label">Password</label>
                        <input class="form-control @error('password')
                          is-invalid
                         @enderror" type="password" value="{{ old('password', $user->password) }}"
                           placeholder="Enter Password" name="password"
                           id="password">
                        @error('password')
                           <div class="invalid-feedback">
                              {{ $message }}
                           </div>
                        @enderror
                     </div>
                     <div class="col-md-6">
                        <label for="password_confirmation" class="form-label">Password Confirmation</label>
                        <input class="form-control @error('password')
                          is-invalid
                         @enderror" type="password" value="{{ old('password_confirmation', $user->password) }}"
                           placeholder="Repeat your password" name="password_confirmation"
                           id="password_confirmation">
                        @error('password')
                           <div class="invalid-feedback">
                              {{ $message }}
                           </div>
                        @enderror
                     </div>
                  </div>
                  <div class="mb-3 row">
                     <div class="col-md-6">
                        <label class="form-label">Kota</label>
                        <select class="form-select  @error('kota_id')
                        is-invalid
                       @enderror" name="kota_id" id="kota">
                            <option selected disabled>Pilih kota</option>
                            @foreach($kotas as $key => $kota)
                            <option value="{{ $kota->id }}" {{ old('kota_id', $user->kota->id) == $kota->id ? 'selected' : '' }}>{{ $key+1 . '- ' . $kota->name }}</option>
                            @endforeach
                        </select>
                        @error('kota_id')
                        <div class="invalid-feedback">
                           {{ $message }}
                        </div>
                     @enderror
                     </div>
                     <div class="col-md-6">
                        <label class="form-label">Kecamatan</label>
                        <select class="form-select @error('kecamatan_id')
                          is-invalid
                         @enderror" name="kecamatan_id" id="kecamatan">
                         <option selected disabled>Pilih kecamatan</option>
                           {{-- @foreach($kecamatans as $key => $kecamatan)
                           <option value="{{ $kecamatan->id }}" {{ old('kecamatan_id') == $kecamatan->id ? 'selected' : '' }}>{{ $key+1 . '- ' . $kecamatan->name }}</option>
                           @endforeach --}}
                        </select>
                        @error('kecamatan_id')
                           <div class="invalid-feedback">
                              {{ $message }}
                           </div>
                        @enderror
                     </div>
                  </div>
                  <div class="mb-3 row">
                     <div class="col-md-12">
                        <label for="alamat" class="form-label">Alamat</label>
                        <textarea id="alamat" class="form-control @error('alamat')
                          is-invalid
                      @enderror"
                           placeholder="Masukan alamat" rows="4" value="{{ old('alamat', $user->alamat) }}" name="alamat">{{ old('alamat', $user->alamat) }}</textarea>
                        @error('alamat')
                           <div class="invalid-feedback">
                              {{ $message }}
                           </div>
                        @enderror
                     </div>
                  </div>
                  <div class="d-flex justify-content-end">
                    <button class="btn btn-primary" type="submit">Submit form</button>
                  </div>
               </form>
            </div>
         </div>
      </div> <!-- end col -->
   </div>
   <!-- end row -->

   <script type="text/javascript">
     $(document).ready(function() {
         // Panggil fungsi getKecamatan dengan kota dan kecamatan yang dipilih jika ada
         var selectedKota = $('#kota').val();
         if (selectedKota) {
            getKecamatan(selectedKota, function() {
               var selectedKecamatan = $('#kecamatan').data('selected');
               if (selectedKecamatan) {
                  $('#kecamatan').val(selectedKecamatan);
               }
            });
         }

         $('#kota').change(function() {
            var kota_id = $(this).val();
            getKecamatan(kota_id);
         });
      });


      function getKecamatan(kota_id) {
         $.ajax({
            url: '/get-kecamatan/' + kota_id,
            type: 'get',
            dataType: 'json',
            success: function(response) {
               var len = 0;
               if (response['data'] != null) {
                  len = response['data'].length;
               }
               if (len > 0) {
                  $('#kecamatan').empty().append('<option>Pilih kecamatan</option>').prop('disabled', false);
                  for (var i = 0; i < len; i++) {
                     var id = response['data'][i]['id'];
                     var name = response['data'][i]['name'];
                     var option = "";
                     if (response['data'][i]['id'] == response['kecamatan_id']) {
                        var option = "<option selected value='" + id + "'>" + name + "</option>";
                     } else {
                        var option = "<option value='" + id + "'>" + name + "</option>";
                     }
                     $('#kecamatan').append(option);
                  }
               } else {
                  $('#kecamatan').empty().append('<option>Tidak Ada Kecamatan</option>').prop('disabled', true);
               }
               // if (len > 0) {
               //    $('#kecamatan').empty();
               //    for (var i = 0; i < len; i++) {
               //       var id = response['data'][i]['id'];
               //       var name = response['data'][i]['name'];
               //       var option = "<option value='" + id + "'>" + name + "</option>";
               //       $('#kecamatan').append(option);
               //    }
               // }
            }
         });
      }
   </script>
@endsection
@push('style')
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
@endpush

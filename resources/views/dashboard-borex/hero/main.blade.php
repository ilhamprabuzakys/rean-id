@extends('dashboard-borex.layouts.app')
@section('content')
   <div class="row align-items-center">
      <div class="col-12">
         <div class="card">
            <div class="card-body">
               <h5>{{ __('Masukkan Hero Image Main') }}</h5>
               <form action="" method="post">
                  @csrf
                  <div class="row">
                     <div class="col-12">
                        <label for="body" class="form-label">Files</label>
                        <input type="hidden" name="type" value="main">
                        <input type="file" name="file_path" id="file_path" class="form-control @error('file_path')
                     is-invalid
                  @enderror">
                        @error('file_path')
                           <div class="invalid-feedback">
                              {{ $message }}
                           </div>
                        @enderror
                     </div>
                  </div>
                  <div class="row justify-content-end">
                     <div class="col-4 d-flex justify-content-end align-items-center">
                        <button class="btn btn-primary px-2" type="submit">Simpan</button>
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
      @forelse ($heros as $hero)
         <div class="col-3">
            @if (in_array(pathinfo($hero->file_path, PATHINFO_EXTENSION), ['jpeg', 'jpg', 'png']))
               <div class="card">
                  <div class="card-header">Hero Main {{ $loop->iteration }}</div>
                  <div class="card-body">
                     <a href="#" data-bs-target="#heroImage{{ $hero->id }}" data-bs-toggle='modal'>
                        <img src="{{ asset('storage/' . $hero->file_path) }}" alt="Media" style="max-width: 200px">
                     </a>
                  </div>
               </div>
               @include('dashboard-borex.hero.modal.detail')
            @else
               @continue
            @endif
         </div>
      @empty
         <div class="col-12">
            <h4>Tidak ada hero image yang sudah diupload saat ini.</h4>
         </div>
      @endforelse

   </div>
@endsection

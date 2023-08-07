@extends('dashboard.template.dashboard')
@section('content')
<!-- start page title -->
<h4 class="fw-bold py-3 mb-4">
   <a class="text-muted fw-light" href="{{ route('dashboard') }}">Home /</a>
   Media Postingan
</h4>
<!-- end page title -->
   <div class="row align-items-center">
      @dd($medias)
      @forelse ($medias as $media)
         <div class="col-3">
            @if (in_array(pathinfo($media->file_path, PATHINFO_EXTENSION), ['jpeg', 'jpg', 'png']))
            <div class="card">
               <div class="card-header">
                  <div class="row justify-content-between">
                     <div class="col-4">
                        <h5>
                           {{ optional($media->post)->title }}
                        </h5>
                     </div>
                     <div class="col-4 d-flex justify-content-end align-items-start">
                        <a href="{{ route('posts.edit', $media->post) }}" target="_blank" rel="noopener noreferrer" class="badge bg-success text-white rounded-pill"><i class="mdi mdi-circle-edit-outline"></i></a>
                     </div>
                  </div>
                  <p class="text-muted">{{ $media->post->updated_at }}</p>
               </div>
               <div class="card-body">
                  <a href="#" data-bs-target="#mediaPost{{ $media->post->id }}" data-bs-toggle='modal'>
                     <img src="{{ asset('storage/' . $media->file_path) }}" alt="Media" style="max-width: -webkit-fill-available;">
                  </a>
               </div>
            </div>
            @include('dashboard.media.modal.detail')
            @else
               @continue
            @endif
         </div>
      @empty
         <div class="col-12">
            <h4>Tidak ada media yang diupload saat ini.</h4>
         </div>
      @endforelse

   </div>
@endsection

@extends('dashboard-borex.layouts.app')
@section('content')
   <div class="row align-items-center">
      @forelse ($medias as $media)
         <div class="col-3">
            @if (in_array(pathinfo($media->file_path, PATHINFO_EXTENSION), ['jpeg', 'jpg', 'png']))
            <div class="card">
               <div class="card-header">{{ $media->post->title }}</div>
               <div class="card-body">
                  <a href="#" data-bs-target="#mediaPost{{ $media->post->id }}" data-bs-toggle='modal'>
                     <img src="{{ asset('storage/' . $media->file_path) }}" alt="Media" style="max-width: 200px">
                  </a>
               </div>
            </div>
            @include('dashboard-borex.media.modal.detail')
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

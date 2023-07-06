@extends('dashboard-borex.layouts.app')
@section('content')
   <div class="row align-items-center">
      @forelse ($medias as $media)
         <div class="col-2">
            @if (in_array(pathinfo($post->media_path, PATHINFO_EXTENSION), ['jpeg', 'jpg', 'png']))
               <img src="{{ assets('storage/' . $medias->media_path) }}" alt="Media">
            @endif
         </div>
         @empty
         <div class="col-12">
            <h4>Tidak ada media yang diupload saat ini.</h4>
         </div>
      @endforelse
   </div>
@endsection

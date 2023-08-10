@extends('dashboard.template.dashboard')
@section('content')
   <h4 class="fw-bold py-3 mb-4">
      <a class="text-muted fw-light" href="{{ route('dashboard') }}">Home /</a>
      <a class="text-muted fw-light" href="{{ route('news.index') }}">Berita /</a>
      Perbarui Berita
   </h4>
   @livewire('dashboard.news.news-update', ['news' => $news, 'user' => auth()->user()->id])
@endsection
@push('scripts')
   <script>
      $('#body').summernote();
   </script>
@endpush
@push('styles')
<!-- include summernote css/js -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/lang/summernote-id-ID.min.js"></script>
@endpush

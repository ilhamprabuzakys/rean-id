<div class="card">
    <div class="card-header">
        <div class="row justify-content-between">
            <div class="col-8">
                <h3>{{ $news->title }}</h3>
            </div>
            <div class="col-4 d-flex justify-content-end">
                <a href="{{ route('news.edit', $news) }}" class="text-success"><i class="fas fa-edit fa-lg"></i></a>
            </div>
        </div>
    </div>
    <div class="card-body">
        @if($news->file->first())
            <div class="mt-2 mb-3">
                <img src="{{ asset($news->file->first()->file_path) }}" alt="gambar" class="img-zoom img-hover rounded" style="width: -webkit-fill-available; height: 200px; object-fit: cover">
            </div>
        @endif
       {!! $news->body !!}
    </div>
 </div>
 
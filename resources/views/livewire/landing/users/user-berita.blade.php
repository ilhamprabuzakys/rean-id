<div>
    @if($news->count() > 0)
    <h5 class="mb-4">Daftar Berita & Pengumuman</h5>
    @if($news->count() > 0)
    <div class="p-3">
        {{ $news->links() }}
    </div>
    @endif
    <div class="p-3">
        @foreach ($news as $key => $post)
        <article wire:key="post-{{ $post->id }}"
            class="card align-items-stretch flex-md-row mb-4 mb-md-7 border-0 no-gutters" data-aos="fade-up"
            data-aos-once="true">
            <div class="card-body d-flex flex-column col-auto p-md-0 ps-md-4">
                <div class="d-flex mb-0 justify-content-between">
                    <h4 class="mb-3">
                        <a href="{{ route('home.show_post', ['category' => $post->category, 'post' => $post]) }}"
                            class="flex-grow-1 d-block">
                            {{ Str::limit($post->title, 35, '..') }}
                        </a>
                    </h4>
                    <div class="ms-2"><a href="{{ route('home.category_view', $post->category) }}"
                            class="badge badge-soft-primary">{{ $post->category->name }}</a></div>
                </div>

                <p class="text-muted flex-grow-1 d-none d-lg-block">
                    {{ Str::limit(strip_tags($post->body), 100) }} <a
                        href="{{ route('home.show_post', ['category' => $post->category, 'post' => $post]) }}"
                        class="text-primary"> baca
                        selengkapnya</a>
                </p>
                <div class="mt-auto mb-1 row">
                    <div class="col-7 d-flex">
                        @if ($post->user->avatar == null)
                        <img class="me-3 avatar d-flex align-self-center sm rounded-circle"
                            src="{{ asset('assets/img/avatar/avatar-' . rand(1, 5) . '.png') }}" alt="" height="36">
                        @else
                        <img class="me-3 avatar d-flex align-self-center sm rounded-circle"
                            src="{{ asset($post->user->avatar) }}" alt="" height="36">
                        @endif
                        <div class="flex-grow-1">
                            <span class="m-0 fs-13"><a href="{{ route('home.show_user', $post->user) }}">{{
                                    $post->user->name }}</a></span>
                            <p class="text-muted mb-0 small">{{ $post->created_at->format('d M, Y') }} · {{ rand(1,
                                5) }} min read</p>
                        </div>
                    </div>
                    <div class="col-5 d-flex justify-content-end gap-1">
                        @forelse ($post->tags as $tag)
                        @if ($loop->iteration > 2)
                        @break
                        @endif
                        <div><a href="{{ route('home.tag_view', $tag) }}"" class=" btn btn-soft-secondary
                                tag-post-item">#{{
                                $tag->name }}</a></div>
                        @empty
                        @endforelse
                    </div>
                </div>
            </div>
        </article>
        @endforeach
    </div>
    @if($news->count() > 0)
    <div class="p-3">
        {{ $news->links() }}
    </div>
    @endif
    @else
    <h5 class="mb-4">Data Berita masih kosong</h5>
    @endif
</div>
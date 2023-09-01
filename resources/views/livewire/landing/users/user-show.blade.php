<div>
    <section class="position-relative">
        <div class="container position-relative">
            <div class="">
                <!--Profile info header-->
                <div class="position-relative pt-9 pb-9 pb-lg-11">
                    <div class="row">
                        <div class="col-lg-3 mb-5 mb-lg-0">
                            <div class="mt-lg-n14 position-relative z-1">
                                <div class="card shadow p-3">
                                    <div>
                                        <!--profile image-->
                                        {{-- <img
                                            class="width-15x height-15x mb-5 rounded-circle shadow bg-no-repat overflow-hidden bg-contain"
                                            src="{{ asset($user->avatar ?? 'assets/img/avatar/avatar-1.png') }}" /> --}}

                                        <div class="width-15x height-15x mb-5 rounded-circle shadow bg-no-repat overflow-hidden bg-contain mx-auto"
                                            style="background-image: url({{ asset($user->avatar ?? 'assets/img/avatar/avatar-1.png') }})">
                                        </div>
                                        <h4 class="mb-2">{{ $user->name }}</h4>
                                        @php
                                        $role = '';
                                        switch ($user->role) {
                                        case 'member':
                                        $role = 'Member';
                                        break;
                                        case 'admin':
                                        $role = 'Admin';
                                        break;
                                        case 'superadmin':
                                        $role = 'Superadmin';
                                        break;
                                        default:
                                        break;
                                        }
                                        @endphp
                                        <small class="d-block mb-3">{{ $role }}</small>
                                        <ul class="list-group list-group-flush mb-0">
                                            <li class="d-flex align-items-center list-group-item px-0">
                                                <i class="bx bx-calendar me-2 align-middle text-body-secondary"></i>
                                                <span class="small">Bergabung {{ $user->created_at->format('d F Y')
                                                    }}</span>
                                            </li>
                                            <li class="d-flex align-items-center list-group-item px-0">
                                                @if($user->active == 1)
                                                <i class="bx bx-check fs-5 lh-1 text-success me-2 align-middle"></i>
                                                <span class="small">Aktif</span>
                                                @else
                                                <i class="bx bx-x fs-5 lh-1 text-danger me-2 align-middle"></i>
                                                <span class="small">Tidak Aktif</span>
                                                @endif
                                            </li>
                                            @if($user->facebook != '')
                                            <li class="d-flex align-items-center list-group-item px-0">
                                                <i class="bx bxl-facebook me-2 align-middle text-body-secondary"></i>
                                                <a href="javascript:void(0)" class="small link-hover-decoration">@{{
                                                    $user->facebook }}</a>
                                            </li>
                                            @endif
                                            @if($user->twitter != '')
                                            <li class="d-flex align-items-center list-group-item px-0">
                                                <i class="bx bxl-twitter me-2 align-middle text-body-secondary"></i>
                                                <a href="javascript:void(0)" class="small link-hover-decoration">@{{
                                                    $user->twitter }}</a>
                                            </li>
                                            @endif
                                            @if($user->instagram != '')
                                            <li class="d-flex align-items-center list-group-item px-0">
                                                <i class="bx bxl-instagram me-2 align-middle text-body-secondary"></i>
                                                <a href="javascript:void(0)" class="small link-hover-decoration">@{{
                                                    $user->instagram }}</a>
                                            </li>
                                            @endif
                                            @if($user->youtube != '')
                                            <li class="d-flex align-items-center list-group-item px-0">
                                                <i class="bx bxl-youtube me-2 align-middle text-body-secondary"></i>
                                                <a href="javascript:void(0)" class="small link-hover-decoration">@{{
                                                    $user->youtube }}</a>
                                            </li>
                                            @endif
                                        </ul>
                                        <ul class="list-group border-top list-group-flush mb-3">
                                            <li
                                                class="d-flex list-group-item px-0 justify-content-between align-items-center">
                                                <span class="small">Jumlah Like</span>
                                                @php
                                                $totalLikes = $user->posts->reduce(function ($carry, $post) {
                                                return $carry + $post->likes->count();
                                                }, 0);
                                                @endphp
                                                <span class="fs-5">{{ $totalLikes }}</span>
                                            </li>
                                            <li
                                                class="d-flex list-group-item px-0 justify-content-between align-items-center">
                                                @php
                                                $totalKarya = ($user->posts->count() ?? 0) +
                                                ($user->events->count() ?? 0) + ($user->ebooks->count() ?? 0) +
                                                ($user->news->count() ?? 0);
                                                @endphp
                                                <span class="small">Karya</span>
                                                <span class="fs-5">{{ $totalKarya }}</span>
                                            </li>
                                            {{-- <li class="list-group-item px-0">
                                                <div class="d-grid pt-3">
                                                    <button class="btn btn-light border shadow-sm mb-2 py-1"
                                                        type="button"><i class="bx bx-person-plus me-2 lh-1"></i>
                                                        Follow</button>
                                                    <button class="btn btn-primary shadow-sm py-1" type="button"><i
                                                            class="bx bx-envelope me-2 lh-1"></i>
                                                        Message</button>
                                                </div>
                                            </li> --}}
                                        </ul>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-9">
                            <div class="d-flex flex-column">
                                <nav class="nav mb-5 nav-pills nav-fill">
                                    <a class="nav-link {{ $tab == 'postingan' ? 'active' : '' }} {{ $tab == '' ? 'active' : '' }}"
                                        wire:click.prevent='$dispatch("tab", {tab: "postingan"})'><i
                                            class="bx bx-book-open me-2"></i>Postingan</a>
                                    <a class="nav-link {{ $tab == 'ebook' ? 'active' : '' }}"
                                        wire:click.prevent='$dispatch("tab", {tab: "ebook"})'><i
                                            class="bx bx-book-alt me-2"></i>Ebook</a>
                                    <a class="nav-link {{ $tab == 'event' ? 'active' : '' }}"
                                        wire:click.prevent='$dispatch("tab", {tab: "event"})'><i
                                            class="bx bx-calendar-event me-2"></i>Event</a>
                                    <a class="nav-link {{ $tab == 'berita' ? 'active' : '' }}"
                                        wire:click.prevent='$dispatch("tab", {tab: "berita"})'><i
                                            class="bx bx-news me-2"></i>Berita & Pengumuman</a>
                                </nav>

                                <div class="h-100">
                                    @switch($tab)
                                    @case('postingan')
                                    <livewire:landing.users.user-post :$user />
                                    @break
                                    @case('event')
                                    <livewire:landing.users.user-event :$user />
                                    @break
                                    @case('ebook')
                                    <livewire:landing.users.user-ebook :$user />
                                    @break
                                    @case('berita')
                                    <livewire:landing.users.user-berita :$user />
                                    @break
                                    @default
                                    {{-- <livewire:landing.users.user-post :$user /> --}}
                                    @endswitch
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
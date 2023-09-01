<div>
    @if($events->count() > 0)
    <h5 class="mb-4">Daftar Event</h5>
    @if($events->count() > 5)
    <div class="p-3">
        {{ $events->links() }}
    </div>
    @endif
    <div class="p-3">
        @foreach($events as $event)
        @php
        $status = '';
        $status_bg = '';
        $current_date = now(); // Asumsikan menggunakan Carbon untuk mendapatkan tanggal saat ini
        if ($current_date < $event->start_date) {
            $status = 'Akan datang';
            $status_bg = 'success';
            } elseif ($current_date >= $event->start_date && $current_date <= $event->end_date) {
                $status = 'Berlangsung';
                $status_bg = 'primary';
                } else {
                $status = 'Berakhir';
                $status_bg = 'danger';
                }
                @endphp
                <div class="card rounded-3 align-items-lg-center flex-lg-row d-flex" data-aos="fade-up"
                    data-aos-once="false">
                    <div class="col-lg-5">
                        <a href="{{ route('home.events.show', $event) }}"
                            class="d-block card-hover overflow-hidden rounded-3">
                            <img src="{{ asset($event->files->first()->file_path ?? 'assets/landing/assan/assets/img/estate/listing/1.jpg' ) }}"
                                class="img-fluid img-zoom" alt=""
                                style="height: 300px; object-fit: cover;width: -webkit-fill-available;">
                            <div class="position-absolute start-0 top-0 w-100 h-100 bg-gradient-dark opacity-50"></div>
                            <div class="position-absolute start-0 top-0 w-100 pt-3 px-3">
                                <span class="badge bg-{{ $status_bg }}">{{ $status }}</span>
                            </div>
                        </a>
                    </div>
                    <div class="card-body overflow-hidden p-4 px-lg-5 flex-grow-1">
                        {{-- <span
                            class="badge {{ $event->status == TRUE ? 'bg-body-tertiary text-primary' : 'bg-danger text-white'}} mb-3">{{
                            $event->status == TRUE ? 'Berlangsung' : 'Berakhir'}}</span> --}}
                        <a href="{{ route('home.events.show', $event) }}" class="text-dark d-block mb-4">
                            <h4>{{ $event->title }}</h4>
                        </a>
                        <div class="row mb-3 mb-lg-4">
                            <div class="col-12" data-bs-toggle="tooltip" data-bs-placement="top" title=""
                                data-bs-original-title="Lokasi">
                                <div class="d-flex align-items-center">
                                    <i class="bx bx-buildings fs-5 me-2"></i>
                                    <strong class="small">{{ $event->city }}, {{ $event->province }}</strong>
                                </div>
                            </div>
                        </div>
                        <p class="mb-4 mb-lg-5 text-truncate">
                            <i class="bx bx-map fs-5 me-2"></i>{{ $event->location }}
                        </p>
                        <div class="row justify-content-between justify-content-lg-start">

                            <div class="col-8">
                                <!--Price-->
                                <h6><i class="bx bxs-time me-2"></i>
                                    {{ \Carbon\Carbon::parse($event->start_date)->format('M d, Y') }} - {{
                                    \Carbon\Carbon::parse($event->end_date)->format('M d, Y') }}
                                </h6>
                            </div>
                            <div class="col-4">
                                <!--Agent-->
                                <div
                                    class="d-flex align-items-center justify-content-end justify-content-lg-start flex-shrink-0">
                                    <img src="{{ asset($event->user->avatar ?? "assets/img/avatar/avatar-1.png") }}"
                                        alt=""
                                        class="flex-shrink-0 flex-shrink-0 avatar sm rounded-circle me-2 img-fluid">
                                    <span class="small">
                                        {{ Str::limit($event->organizer, 15, '..') }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
    </div>
    @if($events->count() > 5)
    <div class="p-3">
        {{ $events->links() }}
    </div>
    @endif
    @else
    <h5 class="mb-4">Data Event masih kosong</h5>
    @endif
</div>
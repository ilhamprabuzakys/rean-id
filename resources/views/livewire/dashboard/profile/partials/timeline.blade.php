<div class="card card-action mb-4">
    <div class="card-header align-items-center">
        <h5 class="card-action-title mb-0">
            <i class="mdi mdi-format-list-bulleted mdi-24px me-2"></i>Timeline
        </h5>
        <div class="card-action-element">
            <div class="dropdown">
                <button type="button" class="btn dropdown-toggle hide-arrow p-0" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    <i class="mdi mdi-dots-vertical mdi-24px text-muted"></i>
                </button>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                        <a wire:click.prevent='deleteYesterday()' class="dropdown-item" href="javascript:void(0)">Hapus
                            Kemarin</a>
                    </li>
                    <li>
                        <a wire:click.prevent='delete7DaysAgo()' class="dropdown-item" href="javascript:void(0)">Hapus 7
                            Hari yang lalu</a>
                    </li>
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    <li>
                        <a wire:click.prevent='delete1MonthAgo()' class="dropdown-item" href="javascript:void(0)">Hapus
                            1 bulan yang lalu</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="card-body pt-3 pb-0">
        <ul class="timeline mb-0">
            @forelse ($timelines as $timeline)
            <li class="timeline-item timeline-item-transparent">
                <span class="timeline-point timeline-point-primary"></span>
                <div class="timeline-event">
                    <div class="timeline-header mb-1">
                        <h6 class="mb-0">
                            {{ $timeline->description }}
                        </h6>
                        <span class="text-muted">{{ $timeline->created_at->diffForHumans() }}</span>
                    </div>
                    <p class="text-muted mb-0">
                        {{ $timeline->properties['message'] ?? '' }}
                    </p>
                </div>
            </li>
            @empty
            <li class="timeline-item timeline-item-transparent">
                <span class="timeline-point timeline-point-primary"></span>
                <div class="timeline-event">
                    <div class="timeline-header mb-1">
                        <h6 class="mb-0">
                            Data masih kosong
                        </h6>
                    </div>
                    <p class="text-muted mb-0">
                        Data masih kosong, silahkan lakukan beberapa aktivitas dulu
                    </p>
                </div>
            </li>
            @endforelse
        </ul>
    </div>
</div>
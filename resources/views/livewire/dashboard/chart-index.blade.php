<div class="col-12">
    <div class="row">
        @cannot('member')
        {{-- Diagram Traffic --}}
        <div class="col-lg-12 col-sm-12 mb-3">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div>
                        <h5 class="card-title mb-0">
                            Trafik pengunjung Website
                        </h5>
                        <small class="text-muted">Tampilan trafik pengunjung</small>
                    </div>
                </div>
                <div class="card-body">
                    <div style="height: 300px !important">
                        <livewire:livewire-line-chart :line-chart-model="$lineChartModel" />
                    </div>
                </div>
            </div>
        </div>
        {{-- / Diagram Traffic --}}

        {{-- Diagram data master --}}
        <div class="col-lg-12 col-sm-12 mb-3">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div>
                        <h5 class="card-title mb-0">
                            Statistik Data Postingan
                        </h5>
                        <small class="text-muted">Statistik per-tipe postingan</small>
                    </div>
                </div>
                <div class="card-body">
                    <div style="height: 300px !important">
                        <livewire:livewire-column-chart :column-chart-model="$columnChartModel" />
                    </div>
                </div>
            </div>
        </div>
        {{-- / Diagram Data Master --}}
        @endcannot

        {{-- Diagram Overview Postingan --}}
        <div class="col-lg-6 col-sm-6">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div>
                        <h5 class="card-title mb-0">
                            Overview Status Postingan
                        </h5>
                        <small class="text-muted">Tampilan data status postingan</small>
                    </div>
                </div>
                <div class="card-body">
                    @if ($postsCount > 0)
                    <div style="height: 300px !important">
                        <livewire:livewire-pie-chart :pie-chart-model="$postPieChartModel" />
                    </div>
                    @else
                    <div style="height: 300px !important" class="d-flex justify-content-center  align-items-center">
                        <h4>Data masih kosong</h4>
                    </div>
                    @endif
                </div>
            </div>
        </div>
        {{-- / Diagram Overview Postingan --}}
        
        {{-- Diagram Overview Ebook --}}
        <div class="col-lg-6 col-sm-6">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div>
                        <h5 class="card-title mb-0">
                            Overview Status Ebook
                        </h5>
                        <small class="text-muted">Tampilan data status ebook</small>
                    </div>
                </div>
                <div class="card-body">

                    @if ($ebooksCount > 0)
                    <div style="height: 300px !important">
                        <livewire:livewire-pie-chart :pie-chart-model="$ebookPieChartModel" />
                    </div>
                    @else
                    <div style="height: 300px !important" class="d-flex justify-content-center  align-items-center">
                        <h4>Data masih kosong</h4>
                    </div>
                    @endif

                </div>
            </div>
        </div>
        {{-- / Diagram Overview Ebook --}}
    </div>
</div>
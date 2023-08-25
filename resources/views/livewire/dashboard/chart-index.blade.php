<div class="col-12">
    <div class="row">

        {{-- Diagram data master --}}
        <div class="col-lg-6 col-sm-6 col-6 mb-3">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div>
                        <h5 class="card-title mb-0">
                            Diagram master data
                        </h5>
                        <small class="text-muted">Detail data</small>
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

        {{-- Diagram Traffic --}}
        <div class="col-lg-6 col-sm-6 col-6">
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
                    <div style="height: 300px !important">
                        <livewire:livewire-pie-chart :pie-chart-model="$pieChartModel" />
                    </div>
                </div>
            </div>
        </div>
        {{-- / Diagram Traffic --}}
    </div>
</div>
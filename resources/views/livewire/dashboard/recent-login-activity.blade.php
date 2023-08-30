<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
    <div class="card mb-4">
        <div class="card-header">
            <h5>{{ __('Aktivitas Login') }}</h5>

            <div class="row justify-content-between">
                <div class="col-lg-1 col-md-2 col-sm-2 d-flex justify-content-start">
                    <select class="form-select form-select-md" name="paginate" id="paginate" wire:model.live='paginate'>
                        <option value="5">5</option>
                        <option value="10">10</option>
                        <option value="15">15</option>
                    </select>
                </div>
                <div class="col-lg-5 col-sm-4 d-flex justify-content-start">
                    <input type="text" name="search" id="search" wire:model.live="search" class="form-control"
                        placeholder="Ketik sesuatu..">
                </div>
                <div class="col-lg-3 col-sm-3 d-flex justify-content-start">
                    <select class="form-select form-select-md" name="filter_device" id="filter_device"
                        wire:model.live='filter_device'>
                        <option selected value="">Pilih device</option>
                        <option value="Mobile">Mobile</option>
                        <option value="Desktop">Desktop</option>
                    </select>
                </div>
                <div class="col-lg-3 col-sm-3 d-flex justify-content-start">
                    <input type="text" id="filter_date" data-flatpickr='{"mode":"range"}' class="form-control"
                        placeholder="Filter berdasarkan tanggal" wire:model.live='filter_date'>
                </div>
                {{-- <div class="col-4 d-flex justify-content-start">
                    <select class="form-select" name="popularityFilter" id="popularityFilter"
                        wire:model='popularityFilter'>
                        <option value="5">5</option>
                        <option value="10">10</option>
                        <option value="15">20</option>
                        <option value="15">50</option>
                        <option value="15">100</option>
                    </select>
                </div> --}}
            </div>
        </div>

        <div class="card-datatable">
            <div class="table-responsive">
                <table class="table table-sm" id="aktivitas-table">
                    <thead class="table-light">
                        <tr>
                            <th class="text-truncate">
                                User
                            </th>
                            <th class="text-truncate">
                                Role
                            </th>
                            <th class="text-truncate">
                                Browser
                            </th>
                            <th class="text-truncate">
                                OS
                            </th>
                            <th class="text-truncate">
                                Perangkat
                            </th>
                            <th class="text-truncate">
                                Lokasi
                            </th>
                            {{-- <th class="text-truncate">
                                IP
                            </th> --}}
                            <th class="text-truncate">
                                Waktu Login
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($login_info as $info)
                        <tr>
                            @php
                            $deviceIcon =
                            $info->device == 'Desktop'
                            ? '<i class="mdi mdi-laptop mdi-20px text-primary me-2"></i>'
                            : '<i class="mdi mdi-cellphone mdi-20px text-primary me-2"></i>';
                            $osIcon = '';
                            $browserIcon = '';
                            if ($info->os == 'Windows') {
                            $osIcon = '<i class="mdi mdi-microsoft-windows mdi-20px text-primary me-2"></i>';
                            } elseif ($info->os == 'Linux') {
                            $osIcon = '<i class="mdi mdi-penguin mdi-20px text-warning me-2"></i>';
                            } elseif ($info->os == 'MacOS') {
                            $osIcon = '<i class="mdi mdi-apple mdi-20px text-dark me-2"></i>';
                            } elseif ($info->os == 'AndroidOS') {
                            $osIcon = '<i class="mdi mdi-android mdi-20px text-success me-2"></i>';
                            }
                            if ($info->browser == 'Chrome') {
                            $browserIcon = '<i class="mdi mdi-google-chrome mdi-20px text-success me-2"></i>';
                            } elseif ($info->browser == 'Firefox') {
                            $browserIcon = '<i class="mdi mdi-firefox mdi-20px text-danger me-2"></i>';
                            } elseif ($info->browser == 'Safari') {
                            $browserIcon = '<i class="mdi mdi-apple-safari mdi-20px text-primary me-2"></i>';
                            } elseif ($info->browser == 'Opera') {
                            $browserIcon = '<i class="mdi mdi-opera mdi-20px text-danger me-2"></i>';
                            }
                            $city = $info->city == 'Bandung' ? 'Kota Bandung' : $info->city;
                            $region = $info->region == 'West Java' ? 'Jawa Barat' : $info->region;
                            $roleIcon = '';
                            if ($info->user->role == 'superadmin') {
                            $role = 'SuperAdmin';
                            $roleIcon = '<i class="mdi mdi-cog-outline mdi-20px text-danger me-2"></i>';
                            } elseif ($info->user->role == 'admin') {
                            $roleIcon = '<i class="mdi mdi-chart-donut mdi-20px text-success me-2"></i>';
                            $role = 'Admin';
                            } else {
                            $roleIcon = '<i class="mdi mdi-account-outline mdi-20px text-primary me-2"></i>';
                            $role = 'Member';
                            }
                            @endphp
                            <td class="text-truncate">
                                {{ $info->user->name }}
                            </td>
                            <td class="text-truncate text-heading">
                                <div class="d-flex align-items-center">
                                    {!! $roleIcon !!}{{ $role }}
                                </div>
                            </td>
                            <td class="text-truncate text-heading">
                                <div class="d-flex align-items-center">
                                    {!! $browserIcon !!}{{ $info->browser }}
                                </div>
                            </td>
                            <td class="text-truncate">
                                <div class="d-flex align-items-center">
                                    {!! $osIcon !!} {{ $info->os }}
                                </div>
                            </td>
                            <td class="text-truncate d-flex align-items-center">
                                {!! $deviceIcon !!}
                                {{ $info->device }}
                            </td>
                            <td class="text-truncate">
                                {{ $city . ', ' . $region . ' ' . $info->country }}
                            </td>
                            {{-- <td class="text-truncate">
                                {{ $info->login_ip }}
                            </td> --}}
                            <td class="text-truncate">
                                {{ $info->login_at }}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="float-end mt-5 me-3">
                    {{ $login_info->links() }}
                </div>
            </div>
        </div>
    </div>
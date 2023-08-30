<div>
   {{-- Care about people's approval and you will be their prisoner. --}}
   <h4 class="fw-bold py-3 mb-4">
      <a class="text-muted fw-light" href="{{ route('dashboard') }}">Home /</a>
      @if($isMember == true)
      <a class="text-muted fw-bold active" href="javascript:void()">Log Aktivitas</a>
      @else
      <a class="text-muted fw-light" href="{{ route('logs.index') }}">Log Aktivitas /</a>
      @endif
      @if($isMember == false)
         @switch($tab)
            @case('semua')
            Semua
            @break

            @case('superadmin')
            Super Admin
            @break

            @case('admin')
            Admin
            @break

            @case('member')
            Member
            @break

            @default
            Semua
         @endswitch
      @endif
   </h4>
   <div class="row col-md-12">
      @if($isMember == false)
      <div class="row">
         <div class="col-12">
            <ul class="nav nav-pills flex-column flex-md-row mb-3 gap-2 gap-lg-0">
               <li class="nav-item">
                  <a class="nav-link {{ $tab == 'semua' ? 'active' : '' }} {{ $tab == '' ? 'active' : '' }}"
                     wire:click='$dispatch("tab", {tab: "semua"}); $dispatch("role", {role: ""})'>Semua</a>
               </li>
               @if($isSuperAdmin == true)
               <li class="nav-item">
                  <a class="nav-link {{ $tab == 'superadmin' ? 'active' : '' }}"
                     wire:click='$dispatch("tab", {tab: "superadmin"}); $dispatch("role", {role: "superadmin"})'>Super
                     Admin</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link {{ $tab == 'admin' ? 'active' : '' }}"
                     wire:click='$dispatch("tab", {tab: "admin"}); $dispatch("role", {role: "admin"})'>Admin</a>
               </li>
               @endif
               @if($isSuperAdmin == true || $isAdmin == true)
               <li class="nav-item">
                  <a class="nav-link {{ $tab == 'member' ? 'active' : '' }}"
                     wire:click='$dispatch("tab", {tab: "member"}); $dispatch("role", {role: "member"})'>Member</a>
               </li>
               @endif
            </ul>
         </div>
      </div>
      @endif
      <div class="row">
         <div class="col-12">
            <div class="card shadow-md">
               <div class="card-header">
                  <div class="row">
                     <div class="col-lg-1 col-xl-1 col-md-2 col-sm-2">
                        <select class="form-select" name="paginate" id="paginate" wire:model.live='paginate'>
                           <option value="5">5</option>
                           <option value="10">10</option>
                           <option value="15">15</option>
                        </select>
                     </div>
                     <div class="col-lg-4 col-xl-4 col-md-4 col-sm-4">
                        <input type="text" name="search" id="search" wire:model.live="search" class="form-control"
                           placeholder="Ketik sesuatu..">
                     </div>
                     <div class="col-lg-4 col-xl-4 col-md-4 col-sm-3">
                        <input type="text" id="filter_date" data-flatpickr='{"mode":"range"}' class="form-control"
                           placeholder="Filter berdasarkan tanggal" wire:model.live='filter_date'>
                     </div>
                     <div class="col-lg-3 col-xl-3 col-md-3 col-sm-3">
                        <div><a class="btn btn-danger" href="javascript:void(0)" wire:click='$dispatch("reset-filter")'>
                              <span><i class="fas fa-refresh"></i>
                                 <span class="d-none d-sm-inline-block">Reset</span></span>
                           </a></div>
                     </div>
                  </div>
               </div>
               <div class="card-datatable">
                  @include('livewire.dashboard.logs.partial.table')
               </div>
            </div>
         </div>

      </div>
   </div>
</div>
@push('scripts')
<script>
   $("#filter_date").flatpickr({
         mode: "range",
      });
</script>
@endpush
@include('livewire.dashboard.events.partials.modal.location-picker')

<div>
    <div class="col-12">
       <div class="card shadow-md">
          <div class="card-header">
            @if (session('success'))
               <div class="alert alert-success alert-dismissible d-flex align-items-center" role="alert">
                  <i class="mdi mdi-check-circle-outline me-3"></i>
                  {{-- {!! session('success') !!} --}}
                  <strong>{{ session('success') }}</strong>
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                  </button>
               </div>
            @elseif (session('fails'))
               <div class="alert alert-danger alert-dismissible d-flex align-items-center" role="alert">
                  <i class="mdi mdi-check-circle-outline me-3"></i>
                  {{ session('fails') }}
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                  </button>
               </div>
            @endif
             {{-- <div class="row justify-content-end mb-3">
                <div class="col-4 d-flex justify-content-end">
                   <button class="btn btn-primary" id="buttomTambahEvent" data-bs-target="#createEventForm" data-bs-toggle="collapse">
                      <span><i class="mdi mdi-plus me-sm-1"></i>
                      <span class="d-none d-sm-inline-block">Tambah Data</span></span>
                   </button>
                   <button class="btn btn-primary" id="buttomTambahEvent" data-bs-target="#createEventModal" data-bs-toggle="modal">
                      <span><i class="mdi mdi-plus me-sm-1"></i>
                      <span class="d-none d-sm-inline-block">Tambah Data</span></span>
                   </button>
                </div>
             </div> --}}
             <div class="row mb-5">
               <div class="col-12">
                  <livewire:dashboard.events.event-create :user="auth()->user()"/>
               </div>
            </div>
            
             <div class="row justify-content-between">
                <div class="col-1 d-flex justify-content-start">
                   <select class="form-select" name="paginate" id="paginate" wire:model='paginate'>
                      <option value="5">5</option>
                      <option value="10">10</option>
                      <option value="15">15</option>
                   </select>
                </div>
                <div class="col-5 d-flex justify-content-start">
                   <input type="text" name="search" id="search" wire:model="search" class="form-control" placeholder="Ketik sesuatu..">
                </div>
                <div class="col-6 d-flex justify-content-start">
                    <input type="text" id="filter_date" data-flatpickr='{"mode":"range"}' class="form-control" placeholder="Filter berdasarkan tanggal" wire:model='filter_date'>
                </div>
             </div>
          </div>
          <div class="card-datatable">
            <table class="dt-complex-header table table-bordered">

               <thead class="table-light">
                  <tr>
                     <th>#</th>
                     <th>Judul</th>
                     <th>Penyelenggara</th>
                     <th>Lokasi</th>
                     <th>Dari</th>
                     <th>Sampai</th>
                     <th class="text-center">
                        {{-- <i class="align-middle" data-feather="edit"></i> --}}
                        <i class="fas fa-pencil-alt"></i>
                     </th>
                  </tr>
               </thead>
               <tbody>
                  @forelse ($events as $event)
                     <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>
                           {{ $event->title }}
                        </td>
                        <td>
                           {{ $event->organizer }}
                        </td>
                        <td>
                           {{ $event->location }}
                        </td>
                        <td>
                           {{ $event->start_date }}
                        </td>
                        <td>
                           {{ $event->end_date }}
                        </td>
                        <td class="text-center">
                           <div class="dropdown">
                              <a class="text-muted dropdown-toggle font-size-18 px-2" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true">
                                 <i class="align-middle" data-feather="more-horizontal"></i>
                              </a>
            
                              <div class="dropdown-menu dropdown-menu-end">
                                 <a class="dropdown-item text-success text-decoration-none" href="#" data-bs-toggle="offcanvas" data-bs-target="#editEvent"
                                    wire:click.prefetch="editEvent({{ $event->id }})">
                                    Edit
                                 </a>
                                 <a class="text-danger text-decoration-none dropdown-item" wire:click="findEvent({{ $event->id }})" data-bs-toggle="modal" data-bs-target="#deleteEventModal">Hapus</a>
                                 {{-- <a class="text-danger text-decoration-none dropdown-item" href="{{ route('users.destroy', $user) }}" data-confirm-delete="true">Hapus</a> --}}
                              </div>
                           </div>
                        </td>
                     </tr>
                  @empty
                     <tr>
                        <td colspan="6">
                           <h5 class="text-center my-3">Tidak ada event yang tersedia.</h5>
                        </td>
                     </tr>
                  @endforelse
               </tbody>
            </table>
            <div class="float-end mt-3 me-3">
               {{-- {{ $events->links() }} --}}
            </div>
            
          </div>
       </div>
    </div>
    @include('livewire.dashboard.events.partials.modal.delete')    
 </div>
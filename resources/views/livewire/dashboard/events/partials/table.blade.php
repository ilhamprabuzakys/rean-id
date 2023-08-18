<table class="dt-complex-header table table-bordered sticky-top">

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
            <i class="fas fa-edit fa-lg"></i>
         </th>
      </tr>
   </thead>
   <tbody>
      @forelse ($events as $event)
         <tr class="@if ($event->status == TRUE) event-tr @endif">
            <th scope="row">{{ $loop->iteration + ($paginate * ($events->currentPage()-1)) }}</th>
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
                     <i class="fas fa-ellipsis"></i>
                  </a>

                  <div class="dropdown-menu dropdown-menu-end">
                     <a class="dropdown-item text-primary text-decoration-none" data-bs-toggle="modal" data-bs-target="#showEvent{{ $event->id }}">
                        <i class="fas fa-info me-2"></i>
                        Lihat
                     </a>
                     <a class="dropdown-item text-success text-decoration-none" href="{{ route('events.edit', $event) }}">
                        <i class="fas fa-edit me-2"></i>
                        Edit
                     </a>
                     @if($event->status == FALSE)
                     <a class="dropdown-item text-primary text-decoration-none" wire:click='activate({{ $event->id }})'>
                        <i class="fas fa-check me-2"></i>
                        Aktifkan
                     </a>
                     @else
                     <a class="dropdown-item text-danger text-decoration-none" wire:click='deactivate({{ $event->id }})'>
                        <i class="fas fa-ban me-2"></i>
                        Nonaktifkan
                     </a>
                     @endif
                     <a class="text-danger text-decoration-none dropdown-item" wire:click.prevent="deleteConfirmation({{ $event->id }})">
                        <i class="fas fa-trash me-2"></i>
                        Hapus</a>
                  </div>
               </div>
            </td>
         </tr>
         @include('livewire.dashboard.events.partials.modal.show')
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
   {{ $events->links() }}
</div>

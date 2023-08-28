<table class="table table-sm">
   <thead class="table-light">
      <tr>
         <th>#</th>
         <th>Informasi</th>
         <th class="text-center">Pada Tabel</th>
         <th>Subjek</th>
         <th>Oleh</th>
         <th>Terjadi</th>
      </tr>
   </thead>
   <tbody>
      @forelse ($logs as $key => $log)
      <tr>
         <th scope="row">{{ $loop->iteration + $paginate * ($logs->currentPage() - 1) }}</th>
         <td>
            {{ $log->description }}
         </td>
         <td class="text-center">
            {{ $log->log_name }}
         </td>
         <td>
            @if ($log->subject)
            {{ optional($log->subject)->title ?? optional($log->subject)->name }}
            @else
            {{ $log->properties->get('title') ?? $log->properties->get('name') }}
            @endif
         </td>
         <td>
            <a href="javascript:void(0)" tabindex="0" data-bs-toggle="popover" data-bs-trigger="focus" data-bs-placement="top"
               data-bs-content="
               Email: {{ optional($log->causer)->email ?? '' }}
               " data-bs-original-title="{{ optional($log->causer)->name ?? '' }} @if ($log->causer->username == auth()->user()->username) {{ __(' (Anda)') }} @endif
               ">
               @if ($log->causer)
               <span class="text-dark">{{ optional($log->causer)->name ?? '' }}</span>
               @if ($log->causer->username == auth()->user()->username)
               <span class="text-primary">{{ __(' (Anda)') }}</span>
               @endif
               @else
               {{ __('Sistem') }}
               @endif
            </a>
            
         </td>
         <td>{{ echoTime($log->created_at) }}</td>
      </tr>
      @empty
      <tr>
         <td colspan="6">
            <h5 class="text-center my-3">Data tidak ditemukan.</h5>
         </td>
      </tr>
      @endforelse
   </tbody>
</table>
<div class="float-end mt-5 me-3">
   {{ $logs->links() }}
</div>
<table class="table table-sm">
   <thead class="table-light">
      <tr>
         <th>#</th>
         <th>Event</th>
         <th class="text-center">Pada</th>
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
               {{ echoLogEvent($log->event) }}
            </td>
            <td class="text-center">
               {{ echoLogSubject($log->subject_type) }}
            </td>
            <td>
               {{-- {{ (empty($log->subject->title) ? $log->subject->name : $log->subject->title) }} --}}
               {{ optional($log->subject)->title == null ? optional($log->subject)->name : optional($log->subject)->title }}
            </td>
            <td>
               @if ($log->user)
                  {{ $log->user->name }}
                  @if ($log->user->username == auth()->user()->username)
                     <span class="text-primary">{{ __(' (Anda)') }}</span>
                  @endif
               @else
                  {{ __('Sistem') }}
               @endif
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
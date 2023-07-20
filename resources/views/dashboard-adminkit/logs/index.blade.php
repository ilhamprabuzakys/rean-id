@extends('dashboard.template.dashboard')
@section('content')
<div class="row">
   <div class="col-12">
      <div class="card">
         <div class="card-header">
            <h5 class="card-title">Aktivitas Log</h5>
            <h6 class="card-subtitle text-muted">Rekapan aktivitas yang terjadi pada aplikasi.</h6>
         </div>
         <div class="card-body">
            <table id="datatables-column-search-text-inputs" class="table table-sm" style="width:100%">
               <tfoot class="search">
                  <tr>
                     <th>#</th>
                     <th>Event</th>
                     <th class="text-center">On</th>
                     <th>Subject</th>
                     <th>Oleh</th>
                     <th>Terakhir diupdate</th>
                     {{-- <th class="text-center">
                        <i class="bx bx bx-edit font-size-16"></i>
                     </th> --}}
                  </tr>
               </tfoot>
               <thead class="table-light">
                  <tr>
                     <th>#</th>
                     <th>Event</th>
                     <th class="text-center">On</th>
                     <th>Subject</th>
                     <th>Oleh</th>
                     <th>Terakhir diupdate</th>
                     {{-- <th class="text-center">
                        <i class="bx bx bx-edit font-size-16"></i>
                     </th> --}}
                  </tr>
               </thead>
               <tbody>
                  @foreach ($logs as $key => $log)
                  <tr>
                     <th scope="row">{{ $loop->iteration }}</th>
                     <td>
                        {{ $log->event }}
                     </td>
                     <td class="text-center">
                        {{ $log->subject_type }}
                     </td>
                     <td>
                        {{-- {{ (empty($log->subject->title) ? $log->subject->name : $log->subject->title) }} --}}
                        {{ (optional($log->subject)->title) == NULL ? optional($log->subject)->name : optional($log->subject)->title }}
                     </td>
                     <td>
                        @if ($log->user)
                        {{ $log->user->name }}
                        @if ($log->user->username == auth()->user()->username)
                        <span class="text-primary">{{ __(' (Anda)') }}</span>
                        @endif
                        @else
                           {{ __('Faker') }}
                        @endif
                     </td>
                     <td>
                        @php
                           $currentTime = now();
                           $updatedAt = $log->updated_at;
                           
                           $diffInSeconds = $currentTime->diffInSeconds($updatedAt);
                           
                           if ($diffInSeconds < 60) {
                               echo 'Baru saja - ' . $diffInSeconds + 4 . ' detik yang lalu';
                           } else {
                               echo $updatedAt->format('l, d F Y - H:i:s');
                           }
                        @endphp
                     </td>
                  </tr>
               @endforeach
               </tbody>
              
            </table>
         </div>
      </div>
   </div>
</div>
@endsection

@push('script')
<script src="{{ asset('assets/dashboard/adminkit/js/datatables.js') }}"></script>

<script>
   // DataTables with Column Search by Text Inputs
   document.addEventListener("DOMContentLoaded", function() {
      // Setup - add a text input to each footer cell
      $("#datatables-column-search-text-inputs tfoot.search th").each(function() {
         var title = $(this).text();
         $(this).html("<input type=\"text\" class=\"form-control\" placeholder=\"Search " + title + "\" />");
      });
      // DataTables
      var table = $("#datatables-column-search-text-inputs").DataTable();
      // Apply the search
      table.columns().every(function() {
         var that = this;
         $("input", this.footer()).on("keyup change clear", function() {
            if (that.search() !== this.value) {
               that
                  .search(this.value)
                  .draw();
            }
         });
      });
   });
   // DataTables with Column Search by Select Inputs
   document.addEventListener("DOMContentLoaded", function() {
      $("#datatables-column-search-select-inputs").DataTable({
         initComplete: function() {
            this.api().columns().every(function() {
               var column = this;
               var select = $("<select class=\"form-control\"><option value=\"\"></option></select>")
                  .appendTo($(column.footer()).empty())
                  .on("change", function() {
                     var val = $.fn.dataTable.util.escapeRegex(
                        $(this).val()
                     );
                     column
                        .search(val ? "^" + val + "$" : "", true, false)
                        .draw();
                  });
               column.data().unique().sort().each(function(d, j) {
                  select.append("<option value=\"" + d + "\">" + d + "</option>")
               });
            });
         }
      });
   });
</script>
@endpush
@extends('dashboard-borex.layouts.app')
@php
   $logsCount = App\Models\EventLog::count();
@endphp
@push('scripts')
   @include('dashboard-borex.components.datatable')
   <script>
      $(document).ready(function() {
         var table = $('#logs-table').DataTable();
         $('#filter-category').on('change', function() {
            var category = $(this).val();

            if (category === "") {
               // Jika kategori "Semua" dipilih, hapus filter pada kolom "Kategori"
               table.column(3).search("").draw();
            } else {
               // Jika kategori spesifik dipilih, terapkan filter pada kolom "Kategori"
               table.column(3).search(category).draw();
            }
         });
      });
   </script>
@endpush
@section('content')
   <div class="row align-items-center">
      <div class="col-md-6">
         <div class="mb-3">
            <h5 class="card-title">Total Log <span class="text-muted fw-normal ms-2">{{ $logsCount }}</span></h5>
         </div>
      </div>

      <div class="col-md-6">
         <div class="d-flex flex-wrap align-items-center justify-content-end gap-2 mb-3">
            <div>
               <a href="{{ route('index') . '/api/logs' }}" class="btn btn-danger"><i class="bx bx-detail me-1"></i> API </a>
            </div>
         </div>

      </div>
   </div>

   <div class="row">
      <div class="col-xl-12">
         <div class="card shadow-md">
            <div class="card-body">
               <div class="table-responsive">
                  {{-- <div class="d-flex justify-content-start">
                     <div class="mb-3">
                        <select class="form-select form-select-md" name="category_id" id="filter-category">
                           <option selected value="">Semua</option>
                           @foreach ($categories as $category)
                              <option value="{{ $category->name }}">{{ $category->name }}</option>
                           @endforeach
                        </select>
                     </div>
                  </div> --}}
                  <table class="table table-sm mb-0" id="logs-table">

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
                                 @if (!$log->subject->name)
                                    {{ $log->subject->title }}
                                 @else
                                    {{ $log->subject->name }}
                                 @endif
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
   </div>
@endsection

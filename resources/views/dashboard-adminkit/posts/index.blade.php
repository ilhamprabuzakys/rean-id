@extends('dashboard.template.dashboard')
@php
   $postsCustom = '';
   if (auth()->user()->role == 'member') {
       $postsCustom = $posts->where('user_id', auth()->user()->id);
   } else {
       $postsCustom = $posts;
   }
   $postsCount = $postsCustom->count();
@endphp
@section('headline')
<div class="row mb-2 mb-xl-3">
   <div class="col-auto d-none d-sm-block">
      <h3>Data <strong>Postingan</strong></h3>
   </div>

   <div class="col-auto ms-auto text-end mt-n1">
      <a href="#" class="btn btn-danger me-2" onclick="printToPDF()" target="_blank">Simpan ke PDF</a>
      <script>
         function printToPDF() {
            window.print();
         }
      </script>
      <a href="{{ route('posts.create') }}" class="btn btn-primary">Tambah Data</a>
   </div>
</div>

@endsection
@section('content')
   <div class="row">
      <div class="col-12">
         <div class="card">
            <div class="card-body">
               <div class="row mb-3 justify-content-start">
                  <div class="col-lg-6">
                     <label for="filter-category" class="form-label">Kategori</label>
                     <select class="form-select form-select-md" name="category_id" id="filter-category">
                        <option selected value="">Semua</option>
                        @foreach ($categories as $category)
                           <option value="{{ $category->name }}">{{ $category->name }}</option>
                        @endforeach
                     </select>
                  </div>

                  <div class="col-lg-6">
                     <label for="filter-status" class="form-label">Status</label>
                     <select class="form-select form-select-md" name="status" id="filter-status">
                        <option selected value="">Semua</option>
                        @foreach ($statuses as $status)
                           <option value="{{ $status->key }}">{{ $status->label }}</option>
                        @endforeach
                     </select>
                  </div>
               </div>
               <table id="posts-table" class="table table-sm" style="width:100%">
                  <thead class="table-light">
                     <tr>
                        <th>#</th>
                        <th>Judul</th>
                        <th>Author</th>
                        <th class="text-center">Kategori</th>
                        <th class="text-center">Status</th>
                        @cannot('member')
                        <th class="text-center">
                           <i class="align-middle" data-feather="edit"></i>
                        </th>
                        @endcannot
                        <th>Terakhir diupdate</th>
                        <th class="text-center">
                           <i class="align-middle" data-feather="edit"></i>
                        </th>
                     </tr>
                  </thead>
                  <tbody>
                     @foreach ($postsCustom as $key => $post)
                        <tr>
                           <th scope="row">{{ $loop->iteration }}</th>
                           <td>
                              <a href="{{ route('posts.show', $post) }}" class="text-decoration-none text-dark">
                                 {!! Str::limit(strip_tags($post->title), 20, '...') !!}
                              </a>
                           </td>
                           <td><a href="{{ route('users.show', $post->user) }}" class="text-decoration-none text-dark">
                                 {{ $post->user->name }}
                                 @if ($post->user->username == auth()->user()->username)
                                    <span class="text-primary">{{ __(' (Anda)') }}</span>
                                 @endif
                              </a></td>
                           <td class="text-center">
                              @if ($post->category)
                                 <a href="{{ route('categories.show', $post->category) }}" class="text-decoration-none">{{ $post->category->name }}</a>
                              @else
                                 Belum diset
                              @endif
                           </td>
                           <td class="text-center">
                              @if ($post->status == 'pending')
                                 <span class="badge badge-primary-light">Pending</span>
                              @elseif ($post->status == 'approved')
                                 <span class="badge badge-success-light">Approved</span>
                              @else
                                 <span class="badge badge-danger-light">Rejected</span>
                              @endif
                           </td>
                           @cannot('member')
                              <td class="text-center">
                                 <div class="dropdown">
                                    <a class="text-muted dropdown-toggle font-size-18 px-2" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true">
                                       <i class="align-middle" data-feather="more-horizontal"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                       @if ($post->status == 'pending')
                                          <a class="dropdown-item text-decoration-none" href="#">
                                             <form action="{{ route('posts.approval.form') }}" method="post">
                                                @csrf
                                                <input type="hidden" name="status" value="approved">
                                                <input type="hidden" name="post_id" value="{{ $post->id }}">
                                                <button type="submit" class="bg-transparent border-0">
                                                   <span class="text-success">Setuju</span>
                                                </button>
                                             </form>
                                          </a>
                                          <a class="dropdown-item text-decoration-none" href="#">
                                             <form action="{{ route('posts.approval.form') }}" method="post">
                                                @csrf
                                                {{-- @method('PUT') --}}
                                                <input type="hidden" name="status" value="rejected">
                                                <input type="hidden" name="post_id" value="{{ $post->id }}">
                                                <button type="submit" class="bg-transparent border-0">
                                                   <span class="text-danger">Tolak</span>
                                                </button>
                                             </form>
                                          </a>
                                       @elseif ($post->status == 'rejected')
                                          <a class="dropdown-item text-decoration-none" href="#">
                                             <form action="{{ route('posts.approval.form') }}" method="post">
                                                @csrf
                                                {{-- @method('PUT') --}}
                                                <input type="hidden" name="status" value="pending">
                                                <input type="hidden" name="post_id" value="{{ $post->id }}">
                                                <button type="submit" class="bg-transparent border-0">
                                                   <span class="text-primary">Kembalikan ke pending</span>
                                                </button>
                                             </form>
                                          </a>
                                          <a class="dropdown-item text-decoration-none" href="#">
                                             <form action="{{ route('posts.approval.form') }}" method="post">
                                                @csrf
                                                <input type="hidden" name="status" value="approved">
                                                <input type="hidden" name="post_id" value="{{ $post->id }}">
                                                <button type="submit" class="bg-transparent border-0">
                                                   <span class="text-success">Setuju</span>
                                                </button>
                                             </form>
                                          </a>
                                       @elseif ($post->status == 'approved')
                                          <a class="dropdown-item text-decoration-none" href="#">
                                             <form action="{{ route('posts.approval.form') }}" method="post">
                                                @csrf
                                                {{-- @method('PUT') --}}
                                                <input type="hidden" name="status" value="pending">
                                                <input type="hidden" name="post_id" value="{{ $post->id }}">
                                                <button type="submit" class="bg-transparent border-0">
                                                   <span class="text-primary">Kembalikan ke pending</span>
                                                </button>
                                             </form>
                                          </a>
                                          <a class="dropdown-item text-decoration-none" href="#">
                                             <form action="{{ route('posts.approval.form') }}" method="post">
                                                @csrf
                                                {{-- @method('PUT') --}}
                                                <input type="hidden" name="status" value="rejected">
                                                <input type="hidden" name="post_id" value="{{ $post->id }}">
                                                <button type="submit" class="bg-transparent border-0">
                                                   <span class="text-danger">Tolak</span>
                                                </button>
                                             </form>
                                          </a>
                                       @endif
                                    </div>
                                 </div>
                              </td>
                           @endcannot
                           <td>
                              @php
                                 $currentTime = now();
                                 $updatedAt = $post->updated_at;
                                 
                                 $diffInSeconds = $currentTime->diffInSeconds($updatedAt);
                                 
                                 if ($diffInSeconds < 60) {
                                     echo 'Baru saja - ' . $diffInSeconds + 4 . ' detik yang lalu';
                                 } else {
                                     echo $updatedAt->format('l, d F Y - H:i:s');
                                 }
                              @endphp
                           </td>
                           <td class="text-center">
                              <div class="dropdown">
                                 <a class="text-muted dropdown-toggle font-size-18 px-2" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true">
                                    <i class="align-middle" data-feather="more-horizontal"></i>
                                 </a>

                                 <div class="dropdown-menu dropdown-menu-end">
                                    <a class="dropdown-item text-primary text-decoration-none" href="#" data-bs-toggle="modal" data-bs-target="#postinganDenganID{{ $post->id }}">
                                       Tampilkan
                                    </a>
                                    <a class="dropdown-item text-success text-decoration-none" href="{{ route('posts.edit', $post) }}">
                                       Edit
                                    </a>
                                    <a class="text-danger text-decoration-none dropdown-item" href="{{ route('posts.destroy', $post) }}" data-confirm-delete="true">Delete</a>
                                 </div>
                              </div>
                           </td>
                        </tr>
                        @push('modal')
                           @include('dashboard.posts.modal')
                        @endpush
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

   {{-- @include('dashboard-borex.components.datatable') --}}
   <script>
      $(document).ready(function() {
         var table = $('#posts-table').DataTable({
            drawCallback: function() {
               $('#posts-table').removeClass('table-loader');
            },
            responsive: true,
            columnDefs: [
               {
                  orderable: false,
                  targets: 1
               },
               {
                  orderable: false,
                  targets: 2
               },
               {
                  orderable: false,
                  targets: 3
               },
               {
                  orderable: false,
                  targets: 4
               },
               {
                  orderable: false,
                  targets: 5
               },
               {
                  orderable: false,
                  targets: 6
               },
               {
                  orderable: false,
                  targets: 7
               },
            ],
         });
         // $('#posts-table').on('init.dt', function() {
         //    $("#posts-table").removeClass('table-loader').show();
         // });
         // setTimeout(function() {
         //    $('#posts-table').DataTable();
         // }, 3000);

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
         $('#filter-status').on('change', function() {
            var status = $(this).val();
            console.log('selected : ' + status);
            if (status === "") {
               table.column(4).search("").draw();
            } else {
               table.column(4).search(status).draw();
            }
         });
      });
   </script>

   <script>
      // DataTables with Column Search by Text Inputs
      // document.addEventListener("DOMContentLoaded", function() {
      //    // Setup - add a text input to each footer cell
      //    $("#datatables-column-search-text-inputs tfoot.search th").each(function() {
      //       var title = $(this).text();
      //       $(this).html("<input type=\"text\" class=\"form-control\" placeholder=\"Search " + title + "\" />");
      //    });
      //    // DataTables
      //    var table = $("#datatables-column-search-text-inputs").DataTable();
      //    // Apply the search
      //    table.columns().every(function() {
      //       var that = this;
      //       $("input", this.footer()).on("keyup change clear", function() {
      //          if (that.search() !== this.value) {
      //             that
      //                .search(this.value)
      //                .draw();
      //          }
      //       });
      //    });
      // });
      // // DataTables with Column Search by Select Inputs
      // document.addEventListener("DOMContentLoaded", function() {
      //    $("#datatables-column-search-select-inputs").DataTable({
      //       initComplete: function() {
      //          this.api().columns().every(function() {
      //             var column = this;
      //             var select = $("<select class=\"form-control\"><option value=\"\"></option></select>")
      //                .appendTo($(column.footer()).empty())
      //                .on("change", function() {
      //                   var val = $.fn.dataTable.util.escapeRegex(
      //                      $(this).val()
      //                   );
      //                   column
      //                      .search(val ? "^" + val + "$" : "", true, false)
      //                      .draw();
      //                });
      //             column.data().unique().sort().each(function(d, j) {
      //                select.append("<option value=\"" + d + "\">" + d + "</option>")
      //             });
      //          });
      //       }
      //    });
      // });
   </script>
@endpush
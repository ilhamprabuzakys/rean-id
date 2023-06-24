@extends('layouts.app')
@section('title')
   <h4 class="page-title">Karyawan</h4>
@endsection

@section('content')
   <div id="app"></div>
   <div class="row align-items-center">
      <div class="col-md-6">
         <div class="mb-3">
            <h5 class="card-title">Daftar Karyawan <span class="text-muted fw-normal ms-2">({{ $karyawans->count() }})</span></h5>
         </div>
      </div>

      <div class="col-md-6">
         <div class="d-flex flex-wrap align-items-center justify-content-end gap-2 mb-3">
            <div>
               <a href="{{ route('index') . '/api/karyawan' }}" class="btn btn-danger"><i class="bx bx-detail me-1"></i> API </a>
               <a href="{{ route('karyawan.create') }}" class="btn btn-primary"><i class="bx bx-plus me-1"></i> Add New</a>
            </div>
         </div>

      </div>
   </div>
   <div class="row">
      <div class="col-xl-12">
         <div class="card">
            <div class="card-body">
               <div class="table-responsive">
                  <table class="table table-sm mb-0">

                     <thead class="table-light">
                        <tr>
                           <th>#</th>
                           <th>Nama</th>
                           <th>Umur</th>
                           <th>Jenis Kelamin</th>
                           <th>Alamat</th>
                           <th>Action</th>
                        </tr>
                     </thead>
                     <tbody>
                        @foreach ($karyawans as $key => $karyawan)
                           <tr>
                              <th scope="row">{{ $key + 1 }}</th>
                              <td>{{ $karyawan->nama }}</td>
                              <td>{{ $karyawan->umur }}</td>
                              <td>{{ $karyawan->jenis_kelamin }}</td>
                              <td>{{ $karyawan->alamat }}</td>
                              <td>
                                 <a class="badge rounded-pill badge-soft-success" href="{{ route('karyawan.edit', $karyawan) }}">
                                    <i class="bx bx bx-edit font-size-16"></i>
                                 </a>
                                 <form action="{{ route('karyawan.destroy', $karyawan) }}" method="post" class="d-inline">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="badge rounded-pill badge-soft-danger border-0" onclick="return confirm('Are you sure?')">
                                       <i class="bx bx bx-trash-alt font-size-16"></i>
                                    </button>
                                 </form>
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
@push('scripts')
   <script src="{{ asset('assets/libs/waves/waves.min.js') }}"></script>
@endpush

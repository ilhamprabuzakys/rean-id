
   <div class="text-center">
      <a class="text-primary text-decoration-none" href="#" data-bs-toggle="modal" data-bs-target="#postinganKategori{{ $data->id }}">
         Lihat postingan terkait
      </a>
      <a class="text-success text-decoration-none" href="#" data-bs-toggle="modal" data-bs-target="#editKategori{{ $data->id }}">
         Edit
      </a>
      <a class="text-danger text-decoration-none" href="{{ route('categories.destroy', $data->id) }}" data-confirm-delete="true">Hapus</a>
   </div>

   @push('modal')
      @include('dashboard.categories.modal')
      @include('dashboard.categories.modal.edit')
   @endpush
{{-- <div class="dropdown-menu dropdown-menu-end">
   <a class="dropdown-item text-primary text-decoration-none" href="#" data-bs-toggle="modal" data-bs-target="#postinganKategori{{ $data->id }}">
      Lihat postingan terkait
   </a>
   <a class="dropdown-item text-success text-decoration-none" href="#" data-bs-toggle="modal" data-bs-target="#editKategori{{ $data->id }}">
      Edit
   </a>
   <a class="text-danger text-decoration-none dropdown-item" href="{{ route('categories.destroy', $data->id) }}" data-confirm-delete="true">Hapus</a>
</div> --}}
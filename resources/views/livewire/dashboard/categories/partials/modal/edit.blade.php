<!--  Large modal example -->
<div wire:ignore.self class="modal fade" id="editCategoryModal" tabindex="-1" role="dialog">
   <div class="modal-dialog modal-md">
      <div class="modal-content">
         <div class="modal-header">
            <h3 class="modal-title">Edit Data Kategori <strong>{{ $name ?? '' }}</strong></h3>
            <button type="button" wire:click="closeModal" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <form wire:submit.prevent="update">
            <div class="modal-body">
               <div class="row justify-content-between mb-2">
                  <div class="col-3">
                     <label for="title" class="form-label">Nama <sup class="text-danger">*</sup></label>
                  </div>
                  <div class="col-9">
                     <input type="text" class="form-control @error('name') is-invalid @enderror" wire:model.live.debounce.500ms="name">
                     <div wire:loading wire:target="name" class="spinner-border spinner-border-sm" role="status">
                        <span class="sr-only">Loading...</span>
                     </div>

                     @error('name')
                        <div class="invalid-feedback">
                           {{ $message }}
                        </div>
                     @enderror
                  </div>
               </div>
               @php
               $description = '';
               $iconType = '';
               @endphp
               <div class="row mt-4 mb-3">
                  @foreach($category_types as $key => $type)
                  @php
                  switch ($type->type) {
                  case 'Audio':
                  $description = 'Berfokus terhadap konten berupa sebuah media audio';
                  $iconType = 'mdi-volume-high';
                  break;
                  case 'Video':
                  $description = 'Berfokus terhadap konten berupa sebuah media video';
                  $iconType = 'mdi-video';
                  break;
                  case 'Link':
                  $description = 'Berfokus terhadap konten berupa link atau tautan.';
                  $iconType = 'mdi-link-variant';
                  break;
                  case 'Image':
                  $description = 'Berfokus terhadap konten berupa image atau gambar.';
                  $iconType = 'mdi-image-area';
                  break;
                  case 'Text':
                  $description = 'Berfokus terhadap konten berupa tulisan.';
                  $iconType = 'mdi-text';
                  break;
                  default:
                  break;
                  }
                  @endphp
                  <div class="@if($loop->iteration > 3) col-md-6 @else col-md-4 @endif
                  mb-md-2 mb-2">
                     <div class="form-check custom-option custom-option-icon @if($category_type_id == $type->id)
                        checked
                     @endif">
                        <label class="form-check-label custom-option-content" for="categoryType{{$key+1}}">
                           <span class="custom-option-body">
                              <i class="mdi {{ $iconType }}"></i>
                              <span class="custom-option-title">{{ $type->type }}</span>
                              <small>{{ $description }}</small>
                           </span>
                           <input name="category_type_id" class="form-check-input" type="radio"
                              value="{{ $type->id }}" wire:model='category_type_id' id="categoryType{{$key+1}}"
                              checked="">
                        </label>
                     </div>
                  </div>
                  @endforeach

                  @error('category_type_id')
                  <div class="small text-danger">
                     {{ $message }}
                  </div>
                  @enderror
               </div>
               <span class="d-block text-danger mt-3 text-sm">Dengan <strong>memperbarui</strong> data ini akan membuat semua postingan yang memiliki kategori <strong>{{ $category->name ?? '' }}</strong> menjadi <strong>diperbarui</strong> pada jenis <strong>kategorinya</strong>.</span>
            </div>
            <div class="modal-footer">
               <button type="button" wire:click="closeModal" class="btn btn-danger" data-bs-dismiss="modal">
                  <i class="fas fa-xmark fa-md me-2"></i>
                  Tutup</button>
               <button id="save-button" class="btn btn-primary px-2 not-allowed" type="submit">
                  <i class="fas fa-save fa-md me-2"></i>
                  Perbarui Data</button>
            </div>
         </form>
      </div><!-- /.modal-content -->
   </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

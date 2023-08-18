<div>
    <div class="col-md-12 col-12">
        <div class="card" id="card-social-media-user">
           <form wire:submit.prevent='update()'>
              @csrf
              <h5 class="card-header pb-1">Koneksi Akun Sosial</h5>
              <div class="card-body">
                 <p>Lengkapi data mu agar audiens mudah menjangkau mu.</p>
                 <!-- Social Accounts -->
                 <div class="d-flex mb-3">
                    <div class="flex-shrink-0">
                       <img src="{{ asset('assets/dashboard/materialize/assets/img/icons/brands/facebook.png') }}" alt="facebook" class="me-3" height="30">
                    </div>
                    <div class="flex-grow-1 row">
                       <div class="col-2">
                          <h6 class="mb-0">Facebook</h6>
                          @if ($facebook !== null && $facebook !== '')
                             <small class="text-success">Connected</small>
                          @else
                             <small class="text-danger">Not Connected</small>
                          @endif
                       </div>
                       <div class="col-10 text-end">
                          <div class="input-group">
                             <span class="input-group-text" id="slug-input-addon">www.facebook.com/</span>
                             <input type="text"
                                class="form-control @error('facebook') is-invalid @enderror" name="facebook" wire:model='facebook' id="facebook">
                          </div>
                       </div>
                    </div>
                 </div>
                 <div class="d-flex mb-3">
                    <div class="flex-shrink-0">
                       <img src="{{ asset('assets/dashboard/materialize/assets/img/icons/brands/twitter.png') }}" alt="twitter" class="me-3" height="30">
                    </div>
                    <div class="flex-grow-1 row">
                       <div class="col-2">
                          <h6 class="mb-0">Twitter</h6>
                          @if ($twitter !== null && $twitter !== '')
                             <small class="text-success">Connected</small>
                          @else
                             <small class="text-danger">Not Connected</small>
                          @endif
                       </div>
                       <div class="col-10 text-end">
                          <div class="input-group">
                             <span class="input-group-text" id="slug-input-addon">www.twitter.com/</span>
                             <input type="text"
                                class="form-control @error('twitter') is-invalid @enderror" name="twitter" wire:model='twitter' id="twitter" value="{{ old('twitter', $twitter) }}">
                          </div>
                       </div>
                    </div>
                 </div>
                 <div class="d-flex mb-3">
                    <div class="flex-shrink-0">
                       <img src="{{ asset('assets/dashboard/materialize/assets/img/icons/brands/instagram.png') }}" alt="instagram" class="me-3" height="30">
                    </div>
                    <div class="flex-grow-1 row">
                       <div class="col-2">
                          <h6 class="mb-0">Instagram</h6>
                          @if ($instagram !== null && $instagram !== '')
                             <small class="text-success">Connected</small>
                          @else
                             <small class="text-danger">Not Connected</small>
                          @endif
                       </div>
                       <div class="col-10 text-end">
                          <div class="input-group">
                             <span class="input-group-text" id="slug-input-addon">www.instagram.com/</span>
                             <input type="text"
                                class="form-control @error('instagram') is-invalid @enderror" name="instagram" wire:model='instagram' id="instagram" value="{{ old('instagram', $instagram) }}">
                          </div>
                       </div>
                    </div>
                 </div>
                 <div class="d-flex mb-3">
                    <div class="flex-shrink-0">
                       <img src="{{ asset('assets/dashboard/materialize/assets/img/icons/brands/gmail.png') }}" alt="gmail" class="me-3" height="30">
                    </div>
                    <div class="flex-grow-1 row">
                       <div class="col-2">
                          <h6 class="mb-0">Gmail</h6>
                          @if ($gmail !== null && $gmail !== '')
                             <small class="text-success">Connected</small>
                          @else
                             <small class="text-danger">Not Connected</small>
                          @endif
                       </div>
                       <div class="col-10 text-end">
                          <div class="input-group">
                             <input type="text"
                                class="form-control @error('gmail') is-invalid @enderror" name="gmail" wire:model='gmail' id="gmail" value="{{ old('gmail', $gmail) }}">
                             <span class="input-group-text" id="slug-input-addon">@gmail.com</span>
                          </div>
                       </div>
                    </div>
                 </div>
                 <div class="d-flex">
                    <div class="flex-shrink-0">
                       <img src="{{ asset('assets/dashboard/materialize/assets/img/icons/brands/youtube.png') }}" alt="youtube" class="me-3" height="30">
                    </div>
                    <div class="flex-grow-1 row">
                       <div class="col-2">
                          <h6 class="mb-0">YouTube</h6>
                          @if ($youtube !== null && $youtube !== '')
                             <small class="text-success">Connected</small>
                          @else
                             <small class="text-danger">Not Connected</small>
                          @endif
                       </div>
                       <div class="col-10 text-end">
                          <div class="input-group">
                             <span class="input-group-text" id="slug-input-addon">www.youtube.com/@/</span>
                             <input type="text"
                                class="form-control @error('youtube') is-invalid @enderror" name="youtube" wire:model='youtube' id="youtube" value="{{ old('youtube', $youtube) }}">
                          </div>
                       </div>
                    </div>
                 </div>
                 <div class="my-3 float-start">
                     <ul>
                        @foreach ($errors->all() as $error)
                           <li class="text-danger">{{ $error }}</li>
                        @endforeach
                     </ul>
                  </div>
              
                 <!-- /Social Accounts -->
                 <div class="my-4 float-end">
                    <button
                       type="submit"
                       class="btn btn-primary me-2">
                       Terapkan perubahan
                    </button>
                 </div>
              </div>
           </form>
        </div>
     </div>
</div>

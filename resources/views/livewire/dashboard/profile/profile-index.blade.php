<div>
    <h4 class="fw-bold py-3 mb-4">
        <a class="text-muted fw-light" href="{{ route('dashboard') }}">Home /</a>
        <a class="text-muted fw-light" href="{{ route('posts.index') }}">Profile /</a>
        Informasi Akun
     </h4>
     <div class="row">
        <div class="col-md-12">
           <ul
              class="nav nav-pills flex-column flex-md-row mb-3 gap-2 gap-lg-0">
              <li class="nav-item">
                 <a
                    class="nav-link active"
                    href="javascript:void(0);"><i
                       class="mdi mdi-account-outline mdi-20px me-1"></i>Informasi Akun</a>
              </li>
              <li class="nav-item">
                 <a
                    class="nav-link"
                    href="{{ route('settings.security', auth()->user()) }}"><i
                       class="mdi mdi-lock-open-outline mdi-20px me-1"></i>Keamanan</a>
              </li>
              <li class="nav-item">
                 <a
                    class="nav-link"
                    href="{{ route('settings.social-media', auth()->user()) }}"><i
                       class="mdi mdi-link mdi-20px me-1"></i>Sosial Media</a>
              </li>
           </ul>
           <livewire:dashboard.profile.profile-basic />
           
        </div>
     </div>
</div>

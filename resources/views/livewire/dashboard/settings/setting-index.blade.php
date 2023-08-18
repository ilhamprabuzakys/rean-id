<div>
   <h4 class="fw-bold py-3 mb-4">
      <a class="text-muted fw-light" href="{{ route('dashboard') }}">Home /</a>
      <a class="text-muted fw-light" href="{{ route('settings') }}">Settings /</a>
      @switch($tab)
         @case('profile')
            Informasi Akun
         @break

         @case('security')
            Keamanan
         @break

         @case('social-media')
            Sosial Media
         @break

         @default
            Informasi Akun
      @endswitch
   </h4>
   <div class="row col-md-12">
      <div class="row">
         <div class="col-12">
            <ul
               class="nav nav-pills flex-column flex-md-row mb-3 gap-2 gap-lg-0">
               <li class="nav-item">
                  <a
                     class="nav-link {{ $tab == 'profile' ? 'active' : '' }} {{ $tab == '' ? 'active' : '' }}"
                     wire:click='$dispatch("tab", {tab: "profile"})'><i
                        class="mdi mdi-account-outline mdi-20px me-1"></i>Informasi Akun</a>
               </li>
               <li class="nav-item">
                  <a
                     class="nav-link {{ $tab == 'security' ? 'active' : '' }}"
                     wire:click='$dispatch("tab", {tab: "security"})'><i
                        class="mdi mdi-lock-open-outline mdi-20px me-1"></i>Keamanan</a>
               </li>
               <li class="nav-item">
                  <a
                     class="nav-link {{ $tab == 'social-media' ? 'active' : '' }}"
                     wire:click='$dispatch("tab", {tab: "social-media"})'><i
                        class="mdi mdi-link mdi-20px me-1"></i>Sosial Media</a>
               </li>
            </ul>
         </div>
      </div>
      <div class="row">
         @switch($tab)
            @case('profile')
               <livewire:dashboard.profile.profile-basic />
            @break

            @case('security')
               <livewire:dashboard.security.password-change />
               <livewire:dashboard.security.email-change />
            @break

            @case('social-media')
               <livewire:dashboard.security.social-media />
            @break

            @default
               <livewire:dashboard.profile.profile-basic />
         @endswitch
      </div>
   </div>
</div>

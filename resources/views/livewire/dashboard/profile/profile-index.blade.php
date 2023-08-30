<div>
   <h4 class="fw-bold py-3 mb-4">
      <a class="text-muted fw-light" href="{{ route('dashboard') }}">Home /</a>
      <a class="text-muted fw-light" href="{{ route('profile') }}">Profile /</a>
      @switch($tab)
         @case('profile')
            Informasi Akun
         @break
         @case('postingan')
            Postingan
         @break
         @case('ebook')
            Ebook 
         @break
         @case('event')
            Event
         @break
         @case('berita')
            Berita
         @break
         @default
            Informasi Akun
      @endswitch
   </h4>
   <!-- Header -->
   @include('livewire.dashboard.profile.partials.header')
   <!--/ Header -->
   
   <!-- Navbar pills -->
   {{-- @include('livewire.dashboard.profile.partials.navbar-pills') --}}
   <!--/ Navbar pills -->
   
   @switch($tab)
   @case('profile')
   <livewire:dashboard.profile.profile-basic />
   @break
   @case('postingan')
   <livewire:dashboard.profile.profile-post />
   @break
   @case('ebook')
   <livewire:dashboard.profile.profile-ebook />
   @break
   @case('event')
   <livewire:dashboard.profile.profile-event />
   @break
   @case('berita')
   <livewire:dashboard.profile.profile-news />
   @break
   @default
   <livewire:dashboard.profile.profile-basic />
   @endswitch
</div>

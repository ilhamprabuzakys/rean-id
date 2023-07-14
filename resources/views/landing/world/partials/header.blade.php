@php
   $categories = cache()->remember('categories', 60*60*60, function() {
      return \App\Models\Category::orderBy('name', 'desc')->get();
   })
@endphp
<header class="header-area">
   <div class="container-navbar">
      <div class="row">
         <div class="col-12">
            <nav class="navbar navbar-expand-lg">

               <a class="navbar-brand" href="{{ route('index') }}"><img src="{{ asset('assets/img/rean-hitam-putiih.png') }}" alt="Logo" class="logo-brand"></a>

               <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#worldNav" aria-controls="worldNav" aria-expanded="false" aria-label="Toggle navigation"><span
                     class="navbar-toggler-icon"></span></button>

               <div class="collapse navbar-collapse" id="worldNav">
                  <ul class="navbar-nav ml-auto">
                     <li class="nav-item {{ request()->url() == route('index') ? ' active' : '' }}">
                        <a class="nav-link" href="{{ route('index') }}">Home</a>
                     </li>
                     <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Menu</a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                           <a class="dropdown-item" href="{{ route('index') }}">Home</a>
                           <a class="dropdown-item" href="{{ route('home.all_post') }}">Semua Postingan</a>
                           <a class="dropdown-item" href="{{ route('home.category_list') }}">Daftar Kategori</a>
                           <a class="dropdown-item" href="{{ route('home.contact') }}">Halaman Kontak</a>
                        </div>
                     </li>
                     <li class="nav-item {{ request()->url() == route('home.category_view', $categories->where('name', 'Artikel')->first()) ? ' active' : '' }}">
                        <a class="nav-link" href="{{ route('home.category_view', $categories->where('name', 'Artikel')->first()) }}">Artikel</a>
                     </li>
                     <li class="nav-item {{ request()->url() == route('home.category_view', $categories->where('name', 'Ebook')->first()) ? ' active' : '' }}">
                        <a class="nav-link" href="{{ route('home.category_view', $categories->where('name', 'Ebook')->first()) }}">Ebook</a>
                     </li>
                     <li class="nav-item {{ request()->url() == route('home.category_view', $categories->where('name', 'Event')->first()) ? ' active' : '' }}">
                        <a class="nav-link" href="{{ route('home.category_view', $categories->where('name', 'Event')->first()) }}">Events</a>
                     </li>
                     <li class="nav-item {{ request()->url() == route('home.cns') ? ' active' : '' }}">
                        <a class="nav-link" href="{{ route('home.cns') }}">CNS Radio</a>
                     </li>
                     <li class="nav-item {{ request()->url() == route('home.contact') ? ' active' : '' }}">
                        <a class="nav-link" href="{{ route('home.contact') }}">Contact</a>
                     </li>
                     <li class="nav-item">
                        @auth
                           <a class="nav-link logout-link" href="#">Logout</a>
                           @push('script')
                              <script>
                                 $(document).ready(function() {
                                    $('.logout-link').on('click', function(e) {
                                       e.preventDefault(); // Mencegah aksi default tautan

                                       var logoutForm = $('<form action="{{ route('logout') }}" method="post">@csrf</form>');
                                       $('body').append(logoutForm);
                                       logoutForm.submit();
                                    });
                                 });
                              </script>
                           @endpush
                           {{-- <form action="{{ route('logout') }}" method="post">
                              @csrf
                              <button type="submit">Logout</button>
                           </form> --}}
                        @else
                           <a class="nav-link" href="{{ route('login') }}">Login</a>
                        @endauth
                     </li>
                  </ul>

                  <div id="search-wrapper">
                     <form action="#">
                        <input type="text" id="search" name="search" placeholder="Search something...">
                        <div id="close-icon"></div>
                        <input class="d-none" type="submit" value="">
                     </form>
                  </div>
               </div>
            </nav>
         </div>
      </div>
   </div>
</header>

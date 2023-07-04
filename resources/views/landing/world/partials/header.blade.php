<header class="header-area">
   <div class="container">
      <div class="row">
         <div class="col-12">
            <nav class="navbar navbar-expand-lg">

               <a class="navbar-brand" href="index.html"><img src="{{ asset('assets/img/rean-hitam-putiih.png') }}" alt="Logo" style="height: 32px !important"></a>

               <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#worldNav" aria-controls="worldNav" aria-expanded="false" aria-label="Toggle navigation"><span
                     class="navbar-toggler-icon"></span></button>

               <div class="collapse navbar-collapse" id="worldNav">
                  <ul class="navbar-nav ml-auto">
                     <li class="nav-item active">
                        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                     </li>
                     <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Data</a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                           <a class="dropdown-item" href="index.html">Home</a>
                           <a class="dropdown-item" href="catagory.html">Catagory</a>
                           <a class="dropdown-item" href="single-blog.html">Single Blog</a>
                           <a class="dropdown-item" href="regular-page.html">Regular Page</a>
                           <a class="dropdown-item" href="contact.html">Contact</a>
                        </div>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="#">Artikel</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="#">Ebook</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="#">Events</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
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
                           <a class="nav-link" href="#">Login</a>
                        @endauth
                     </li>
                  </ul>

                  <div id="search-wrapper">
                     <form action="#">
                        <input type="text" id="search" placeholder="Search something...">
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

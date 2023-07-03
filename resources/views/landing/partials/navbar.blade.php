<div class="site-navbar py-2 js-sticky-header site-navbar-target d-none pl-0 d-lg-block" role="banner">
   <div class="container">
      <div class="d-flex align-items-center">
         <div class="mr-auto">
            <nav class="site-navigation position-relative text-right" role="navigation">
               <ul class="site-menu main-menu js-clone-nav mr-auto d-none pl-0 d-lg-block">
                  <li class="active">
                     <a href="index.html" class="nav-link text-left">Home</a>
                  </li>
                  <li>
                     <a href="categories.html" class="nav-link text-left">Categories</a>
                  </li>
                  <li>
                     <a href="categories.html" class="nav-link text-left">Ebook</a>
                  </li>
                  <li>
                     <a href="categories.html" class="nav-link text-left">Artikel</a>
                  </li>
                  <li>
                     <a href="categories.html" class="nav-link text-left">Events</a>
                  </li>
                  <li><a href="categories.html" class="nav-link text-left">Lomba</a></li>
                  <li>
                     <a href="categories.html" class="nav-link text-left">Pengumuman</a>
                  </li>
                  <li><a href="contact.html" class="nav-link text-left">Contact</a></li>
                  @auth
                  <li>
                     <a href="#" class="nav-link text-left">
                        <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button type="submit" class="bg-transparent border-0 p-0 nav-link">Logout</button>
                        </form>
                     </a>
                  </li>
                     @else
                     <li><a href="{{ route('login') }}" class="nav-link text-left">Login</a></li>
                  @endauth
               </ul>
            </nav>
         </div>
      </div>
   </div>
</div>
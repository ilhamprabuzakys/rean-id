@php
   $postsCount = Illuminate\Support\Facades\Cache::remember('postsCount', now()->addDays(1), function () {
       return App\Models\Post::count();
   });
   $categoriesCount = Illuminate\Support\Facades\Cache::remember('categoriesCount', now()->addDays(1), function () {
       return App\Models\Post::count();
   });
   $usersCount = Illuminate\Support\Facades\Cache::remember('usersCount', now()->addDays(1), function () {
      return App\Models\User::count();
   });
@endphp
<div id="sidebar-menu">
   <!-- Left Menu Start -->
   <ul class="metismenu list-unstyled" id="side-menu">
      <li class="menu-title" data-key="t-menu">Menu</li>

      <li class="{{ Request::is('dashboard') ? 'mm-active' : '' }}">
         <a href="{{ route('home') }}">
            <i class="icon nav-icon" data-eva="grid-outline"></i>
            <span class="menu-item" data-key="t-dashboards">Dashboards</span>
         </a>
      </li>

      {{-- <li class="menu-title" data-key="t-applications">Reports</li>

      <li class="{{ Request::is('log*') ? 'mm-active' : '' }}">
         <a href="{{ route('log.index') }}">
            <i class="icon nav-icon" data-eva="checkmark-square-outline"></i>
            <span class="menu-item" data-key="t-utility">Log</span>
         </a>
      </li> --}}

      
      {{--  
        <li class="{{ Request::is('master*') ? 'mm-active' : '' }}">
            <a href="apps-calendar.html">
                <i class="icon nav-icon" data-eva="calendar-outline"></i>
                <span class="menu-item" data-key="t-calendar">Master Data</span>
            </a>
        </li> --}}


      @can('admin')
         <li class="menu-title" data-key="t-pages">Admin</li>

         {{-- <li class="{{ Request::is('user*') ? 'mm-active' : '' }}">
            <a href="{{ route('users.index') }}">
               <i class="icon nav-icon" data-eva="people-outline"></i>
               <span class="menu-item" data-key="t-authentication">Users</span>
               <span class="badge rounded-pill badge-soft-primary">{{ $usersCount }}</span>
            </a>
         </li>

         <li class="{{ Request::is('karyawan*') ? 'mm-active' : '' }}">
            <a href="{{ route('karyawan.index') }}">
               <i class="icon nav-icon" data-eva="people-outline"></i>
               <span class="menu-item" data-key="t-authentication">Karyawan</span>
               <span class="badge rounded-pill badge-soft-primary">{{ $karyawanCount }}</span>
            </a>
         </li> --}}
      @endcan

      <li class="menu-title" data-key="t-pages">Miscellaneous</li>

      {{-- <li class="{{ Request::is('map*') ? 'mm-active' : '' }}">
         <a href="{{ route('map.index') }}">
            <i class="icon nav-icon" data-eva="archive-outline"></i>
            <span class="menu-item" data-key="t-filemanager">Maps</span>
            <span class="badge rounded-pill badge-soft-primary">{{ $markerCount }}</span>
         </a>
      </li> --}}

      <li class="{{ Request::is('post*') ? 'mm-active' : '' }}">
         <a href="{{ route('posts.index') }}">
            <i class="icon nav-icon" data-eva="menu-outline"></i>
            <span class="menu-item" data-key="t-posts">Posts</span>
            <span class="badge rounded-pill badge-soft-danger" data-key="t-hot">{{ $postsCount }}</span>
         </a>
      </li>
      
      <li class="{{ Request::is('categories*') ? 'mm-active' : '' }}">
         <a href="{{ route('categories.index') }}">
            <i class="icon nav-icon" data-eva="external-link-outline"></i>
            <span class="menu-item" data-key="t-categories">Kategori</span>
            <span class="badge rounded-pill badge-soft-danger" data-key="t-hot">{{ $categoriesCount }}</span>
         </a>
      </li>

      <li class="{{ Request::is('users*') ? 'mm-active' : '' }}">
         <a href="{{ route('users.index') }}">
            <i class="icon nav-icon" data-eva="people-outline"></i>
            <span class="menu-item" data-key="t-users">User</span>
            <span class="badge rounded-pill badge-soft-danger" data-key="t-hot">{{ $usersCount }}</span>
         </a>
      </li>
   </ul>
</div>

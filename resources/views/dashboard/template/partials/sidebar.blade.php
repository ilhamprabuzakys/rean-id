
<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">


   <div class="app-brand demo ">
      <a href="{{ route('dashboard') }}" class="app-brand-link">
         <span class="app-brand-logo demo">
            <img src="{{ asset('assets/img/rean-logo-brand.png') }}" alt="" style="height: 30px">
         </span>
         {{-- <span class="app-brand-text demo menu-text fw-bold ms-2">REAN.ID</span> --}}
         <span class="app-brand-text demo menu-text fw-bold ms-2">
            <img src="{{ asset('assets/img/rean-text-logo-default.png') }}" alt="" style="
            height: 25px;
            margin-left: 10px;">
         </span>
      </a>

      <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
         <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
               d="M11.4854 4.88844C11.0081 4.41121 10.2344 4.41121 9.75715 4.88844L4.51028 10.1353C4.03297 10.6126 4.03297 11.3865 4.51028 11.8638L9.75715 17.1107C10.2344 17.5879 11.0081 17.5879 11.4854 17.1107C11.9626 16.6334 11.9626 15.8597 11.4854 15.3824L7.96672 11.8638C7.48942 11.3865 7.48942 10.6126 7.96672 10.1353L11.4854 6.61667C11.9626 6.13943 11.9626 5.36568 11.4854 4.88844Z"
               fill="currentColor" fill-opacity="0.6" />
            <path
               d="M15.8683 4.88844L10.6214 10.1353C10.1441 10.6126 10.1441 11.3865 10.6214 11.8638L15.8683 17.1107C16.3455 17.5879 17.1192 17.5879 17.5965 17.1107C18.0737 16.6334 18.0737 15.8597 17.5965 15.3824L14.0778 11.8638C13.6005 11.3865 13.6005 10.6126 14.0778 10.1353L17.5965 6.61667C18.0737 6.13943 18.0737 5.36568 17.5965 4.88844C17.1192 4.41121 16.3455 4.41121 15.8683 4.88844Z"
               fill="currentColor" fill-opacity="0.38" />
         </svg>
      </a>
   </div>

   <div class="menu-inner-shadow"></div>



   <ul class="menu-inner py-1">
      <!-- Dashboards -->
      <li class="menu-item mt-2 {{ request()->url() == route('dashboard') ? 'active' : '' }}">
         <a href="{{ route('dashboard') }}" class="menu-link">
            <i class="menu-icon tf-icons mdi mdi-monitor"></i>
            <div data-i18n="Dashboard">Dashboard</div>
         </a>
      </li>

      <!-- Data Master -->
      <li class="menu-header fw-light mt-1">
         <span class="menu-header-text">Data Master</span>
      </li>
      <li class="menu-item {{ str_starts_with(request()->url(), route('posts.index')) ? 'active open' : '' }}">
         <a href="javascript:void(0);" class="menu-link menu-toggle">
            <i class="menu-icon tf-icons mdi mdi-library-outline"></i>
            <div data-i18n="Postingan">Postingan</div>
         </a>
         <ul class="menu-sub">
            <li class="menu-item {{ request()->url() == route('posts.index') ? 'active' : '' }}">
               <a href="{{ route('posts.index') }}" class="menu-link">
                  <div data-i18n="Semua">Semua</div>
               </a>
            </li>
            <li class="menu-item {{ request()->url() == route('posts.create') ? 'active' : '' }}">
               <a href="{{ route('posts.create') }}" class="menu-link">
                  <div data-i18n="Tambah Data">Tambah Data</div>
               </a>
            </li>
         </ul>
      </li>
      @cannot('member')
      {{-- <li class="menu-item {{ str_starts_with(request()->url(), route('categories.index')) ? 'active open' : '' }}">
         <a href="javascript:void(0);" class="menu-link menu-toggle">
            <i class="menu-icon tf-icons mdi mdi-layers-outline"></i>
            <div data-i18n="Kategori">Kategori</div>
         </a>
         <ul class="menu-sub">
            <li class="menu-item {{ request()->url() == route('categories.index') ? 'active' : '' }}">
               <a href="{{ route('categories.index') }}" class="menu-link">
                  <div data-i18n="Semua">Semua</div>
               </a>
            </li>
            <li class="menu-item {{ request()->url() == route('categories.create') ? 'active' : '' }}">
               <a href="{{ route('categories.create') }}" class="menu-link">
                  <div data-i18n="Tambah Data">Tambah Data</div>
               </a>
            </li>
         </ul>
      </li> --}}
      <li class="menu-item mt-2 {{ str_starts_with(request()->url(), route('categories.index')) ? 'active' : '' }}">
         <a href="{{ route('categories.index') }}" class="menu-link">
            <i class="menu-icon tf-icons mdi mdi-layers-outline"></i>
            <div data-i18n="Kategori">Kategori</div>
         </a>
      </li>
      {{-- <li class="menu-item {{ str_starts_with(request()->url(), route('tags.index')) ? 'active open' : '' }}">
         <a href="javascript:void(0);" class="menu-link menu-toggle">
            <i class="menu-icon tf-icons mdi mdi-tag-multiple-outline"></i>
            <div data-i18n="Tags">Tags</div>
         </a>
         <ul class="menu-sub">
            <li class="menu-item {{ request()->url() == route('tags.index') ? 'active' : '' }}">
               <a href="{{ route('tags.index') }}" class="menu-link">
                  <div data-i18n="Semua">Semua</div>
               </a>
            </li>
            <li class="menu-item {{ request()->url() == route('tags.create') ? 'active' : '' }}">
               <a href="{{ route('tags.create') }}" class="menu-link">
                  <div data-i18n="Tambah Data">Tambah Data</div>
               </a>
            </li>
         </ul>
      </li> --}}
      <li class="menu-item mt-2 {{ str_starts_with(request()->url(), route('tags.index')) ? 'active' : '' }}">
         <a href="{{ route('tags.index') }}" class="menu-link">
            <i class="menu-icon tf-icons mdi mdi-tag-multiple-outline"></i>
            <div data-i18n="Tags">Tags</div>
         </a>
      </li>



      <li class="menu-item mt-2 {{ str_starts_with(request()->url(), route('media.posts')) ? 'active' : '' }}">
         <a href="{{ route('media.posts') }}" class="menu-link">
            <i class="menu-icon tf-icons mdi {{ str_starts_with(request()->url(), route('media.posts')) ? 'mdi-folder-open-outline' : 'mdi-folder-outline' }}"></i>
            <div data-i18n="Media">Media</div>
         </a>
      </li>

      <li class="menu-item {{ str_starts_with(request()->url(), route('events.index')) ? 'active open' : '' }}">
         <a href="javascript:void(0);" class="menu-link menu-toggle">
            <i class="menu-icon tf-icons mdi mdi-calendar-check"></i>
            <div data-i18n="Events">Events</div>
         </a>
         <ul class="menu-sub">
            <li class="menu-item {{ str_starts_with(request()->url(), route('events.index')) ? 'active' : '' }}">
               <a href="{{ route('events.index') }}" class="menu-link">
                  <div data-i18n="Semua">Semua</div>
               </a>
            </li>
            <li class="menu-item {{ str_starts_with(request()->url(), route('events.create')) ? 'active' : '' }}">
               <a href="{{ route('events.create') }}" class="menu-link">
                  <div data-i18n="Tambah Data">Tambah Data</div>
               </a>
            </li>
         </ul>
      </li>
      <li class="menu-item {{ str_starts_with(request()->url(), route('ebooks.index')) ? 'active open' : '' }}">
         <a href="javascript:void(0);" class="menu-link menu-toggle">
            <i class="menu-icon tf-icons mdi mdi-book-check-outline"></i>
            <div data-i18n="Ebooks">Ebooks</div>
         </a>
         <ul class="menu-sub">
            <li class="menu-item {{ str_starts_with(request()->url(), route('ebooks.index')) ? 'active' : '' }}">
               <a href="{{ route('ebooks.index') }}" class="menu-link">
                  <div data-i18n="Semua">Semua</div>
               </a>
            </li>
            <li class="menu-item {{ str_starts_with(request()->url(), route('ebooks.create')) ? 'active' : '' }}">
               <a href="{{ route('ebooks.create') }}" class="menu-link">
                  <div data-i18n="Tambah Data">Tambah Data</div>
               </a>
            </li>
         </ul>
      </li>
      <li class="menu-item {{ str_starts_with(request()->url(), route('news.index')) ? 'active open' : '' }}">
         <a href="javascript:void(0);" class="menu-link menu-toggle">
            <i class="menu-icon tf-icons mdi mdi-newspaper-check"></i>
            <div data-i18n="Berita">Berita</div>
         </a>
         <ul class="menu-sub">
            <li class="menu-item {{ str_starts_with(request()->url(), route('news.index')) ? 'active' : '' }}">
               <a href="{{ route('news.index') }}" class="menu-link">
                  <div data-i18n="Semua">Semua</div>
               </a>
            </li>
            <li class="menu-item {{ str_starts_with(request()->url(), route('news.create')) ? 'active' : '' }}">
               <a href="{{ route('news.create') }}" class="menu-link">
                  <div data-i18n="Tambah Data">Tambah Data</div>
               </a>
            </li>
         </ul>
      </li>
      @endcannot
      @can('superadmin')
      <li class="menu-item {{ str_starts_with(request()->url(), route('users.index')) ? 'active open' : '' }}">
         <a href="javascript:void(0);" class="menu-link menu-toggle">
            <i class="menu-icon tf-icons mdi mdi-account-group-outline"></i>
            <div data-i18n="Data Users">Data Users</div>
         </a>
         <ul class="menu-sub">
            <li class="menu-item {{ str_starts_with(request()->url(), route('users.index')) ? 'active' : '' }}">
               <a href="{{ route('users.index') }}" class="menu-link">
                  <div data-i18n="Semua">Semua</div>
               </a>
            </li>
            <li class="menu-item {{ str_starts_with(request()->url(), route('users.create')) ? 'active' : '' }}">
               <a href="{{ route('users.create') }}" class="menu-link">
                  <div data-i18n="Tambah Data">Tambah Data</div>
               </a>
            </li>
         </ul>
      </li>
      @endcan
      <!-- Data Master -->
      <li class="menu-header fw-light mt-1">
         <span class="menu-header-text">Sistem</span>
      </li>
      <li class="menu-item mt-2 {{ str_starts_with(request()->url(), route('settings.profile', auth()->user())) ? 'active' : '' }}">
         <a href="{{ route('settings.profile', auth()->user()) }}" class="menu-link">
            <i class="menu-icon tf-icons mdi mdi-cog-outline"></i>
            <div data-i18n="Setelan">Setelan</div>
         </a>
      </li>
      <li class="menu-item mt-2 {{ str_starts_with(request()->url(), route('logs.index')) ? 'active' : '' }}">
         <a href="{{ route('logs.index') }}" class="menu-link">
            <i class="menu-icon tf-icons mdi mdi-resistor"></i>
            {{-- <i class="menu-icon tf-icons mdi mdi-chart-multiple"></i> --}}
            <div data-i18n="Log Aktivitas">Log Aktivitas</div>
         </a>
      </li>
      @can('superadmin')
      <li class="menu-item {{ str_starts_with(request()->url(), route('users.index')) ? 'active open' : '' }}">
         <a href="javascript:void(0);" class="menu-link menu-toggle">
            <i class="menu-icon tf-icons mdi mdi-home-edit-outline"></i>
            <div data-i18n="Personalisasi Website">Personalisasi Website</div>
         </a>
         <ul class="menu-sub">
            <li class="menu-item {{ str_starts_with(request()->url(), route('website.components')) ? 'active' : '' }}">
               <a href="{{ route('website.components') }}" class="menu-link">
                  <div data-i18n="Komponen">Komponen</div>
               </a>
            </li>
            <li class="menu-item {{ str_starts_with(request()->url(), route('website.background-images')) ? 'active' : '' }}">
               <a href="{{ route('website.background-images') }}" class="menu-link">
                  <div data-i18n="Background Image">Background Image</div>
               </a>
            </li>
         </ul>
      </li>
      @endcan
   </ul>



</aside>
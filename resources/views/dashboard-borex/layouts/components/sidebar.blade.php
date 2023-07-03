@php
   // $postsCount = cache()->remember('postsCount', now()->addDays(1), function () {
   //     return App\Models\Post::count();
   // });
   // $categoriesCount = cache()->remember('categoriesCount', now()->addDays(1), function () {
   //     return App\Models\Category::count();
   // });
   // $usersCount = cache()->remember('usersCount', now()->addDays(1), function () {
   //    return App\Models\User::count();
   // });
@endphp
<div id="sidebar-menu">
   <!-- Left Menu Start -->
   <ul class="metismenu list-unstyled" id="side-menu">
      <li class="menu-title" data-key="t-menu">Menu</li>

      <li class="{{ Request::is('dashboard') ? 'mm-active' : '' }}">
         <a href="{{ route('dashboard') }}">
            <i class="icon nav-icon" data-eva="monitor-outline"></i>
            <span class="menu-item" data-key="t-dashboards">Dashboards</span>
         </a>
      </li>
      @can('superadmin')

      {{-- <li>
         <a href="javascript: void(0);" class="has-arrow">
             <i class="icon nav-icon" data-eva="book-outline"></i>
             <span class="menu-item" data-key="t-invoices">Invoices</span>
         </a>
         <ul class="sub-menu" aria-expanded="false">
             <li><a href="invoices-list.html" data-key="t-invoice-list">Invoice List</a></li>
             <li><a href="invoices-detail.html" data-key="t-invoice-detail">Invoice Detail</a></li>
         </ul>
     </li> --}}

     <li class="menu-title" data-key="t-pages">Data Utama</li>

      <li class="{{ Request::is('post*') ? 'mm-active' : '' }}">
         <a href="{{ route('posts.index') }}">
            <i class="icon nav-icon" data-eva="book-open-outline"></i>
            <span class="menu-item" data-key="t-posts">Posts</span>
            <span class="badge rounded-pill badge-soft-primary" data-key="t-hot">{{ $postsCount }}</span>
         </a>
         <ul class="sub-menu" aria-expanded="false">
            <li><a href="{{ route('posts.index') }}" data-key="t-posts-all">Lihat semua</a></li>
            <li><a href="{{ route('posts.create') }}" data-key="t-posts-add">Tambah Data</a></li>
        </ul>
      </li>

      <li class="{{ Request::is('categories*') ? 'mm-active' : '' }}">
         <a href="{{ route('categories.index') }}">
            <i class="icon nav-icon" data-eva="external-link-outline"></i>
            <span class="menu-item" data-key="t-categories">Kategori</span>
            <span class="badge rounded-pill badge-soft-primary" data-key="t-hot">{{ $categoriesCount }}</span>
         </a>
         <ul class="sub-menu" aria-expanded="false">
            <li><a href="{{ route('categories.index') }}" data-key="t-categories-all">Lihat semua</a></li>
            <li><a href="{{ route('categories.create') }}" data-key="t-categories-add">Tambah Data</a></li>
        </ul>
      </li>
     
      <li class="{{ Request::is('tags*') ? 'mm-active' : '' }}">
         <a href="{{ route('tags.index') }}">
            <i class="icon nav-icon" data-eva="pantone-outline"></i>
            <span class="menu-item" data-key="t-tags">Tag</span>
            <span class="badge rounded-pill badge-soft-primary" data-key="t-hot">{{ $tagsCount }}</span>
         </a>
         <ul class="sub-menu" aria-expanded="false">
            <li><a href="{{ route('tags.index') }}" data-key="t-tags-all">Lihat semua</a></li>
            <li><a href="{{ route('tags.create') }}" data-key="t-tags-add">Tambah Data</a></li>
        </ul>
      </li>

      <li class="menu-title" data-key="t-pages">Data Manajemen</li>

      <li class="{{ Request::is('posts/approval') ? 'mm-active' : '' }}">
         <a href="{{ route('posts.approval') }}">
            <i class="icon nav-icon" data-eva="checkmark-circle-outline"></i>
            <span class="menu-item" data-key="t-dashboards">Post Approval</span>
         </a>
      </li>

      <li class="{{ Request::is('users*') ? 'mm-active' : '' }}">
         <a href="{{ route('users.index') }}">
            <i class="icon nav-icon" data-eva="people-outline"></i>
            <span class="menu-item" data-key="t-users">User</span>
            <span class="badge rounded-pill badge-soft-primary" data-key="t-hot">{{ $usersCount }}</span>
         </a>
         <ul class="sub-menu" aria-expanded="false">
            <li><a href="{{ route('users.index') }}" data-key="t-users-all">Lihat semua</a></li>
            <li><a href="{{ route('users.roles') }}" data-key="t-users-roles">Perizinan</a></li>
            <li><a href="{{ route('users.create') }}" data-key="t-users-add">Tambah Data</a></li>
        </ul>
      </li>

      <li class="{{ Request::is('log*') ? 'mm-active' : '' }}">
         <a href="{{ route('logs.index') }}">
            <i class="icon nav-icon" data-eva="activity-outline"></i>
            <span class="menu-item" data-key="t-utility">Log</span>
         </a>
      </li> 
      
      @elsecan('admin')
      <li class="menu-title" data-key="t-pages">Data Utama</li>

      <li class="{{ Request::is('post*') ? 'mm-active' : '' }}">
         <a href="{{ route('posts.index') }}">
            <i class="icon nav-icon" data-eva="book-open-outline"></i>
            <span class="menu-item" data-key="t-posts">Posts</span>
            <span class="badge rounded-pill badge-soft-primary" data-key="t-hot">{{ $postsCount }}</span>
         </a>
         <ul class="sub-menu" aria-expanded="false">
            <li><a href="{{ route('posts.index') }}" data-key="t-posts-all">Lihat semua</a></li>
            <li><a href="{{ route('posts.create') }}" data-key="t-posts-add">Tambah Data</a></li>
        </ul>
      </li>

      <li class="menu-title" data-key="t-pages">Data Manajemen</li>

      <li class="{{ Request::is('posts/approval') ? 'mm-active' : '' }}">
         <a href="{{ route('posts.approval') }}">
            <i class="icon nav-icon" data-eva="checkmark-circle-outline"></i>
            <span class="menu-item" data-key="t-dashboards">Post Approval</span>
         </a>
      </li>
      
      <li class="{{ Request::is('users*') ? 'mm-active' : '' }}">
         <a href="{{ route('users.index') }}">
            <i class="icon nav-icon" data-eva="people-outline"></i>
            <span class="menu-item" data-key="t-users">User</span>
            <span class="badge rounded-pill badge-soft-primary" data-key="t-hot">{{ $usersCount }}</span>
         </a>
         <ul class="sub-menu" aria-expanded="false">
            <li><a href="{{ route('users.index') }}" data-key="t-users-all">Lihat semua</a></li>
            <li><a href="{{ route('users.roles') }}" data-key="t-users-roles">Perizinan</a></li>
            <li><a href="{{ route('users.create') }}" data-key="t-users-add">Tambah Data</a></li>
        </ul>
      </li>

      <li class="{{ Request::is('log*') ? 'mm-active' : '' }}">
         <a href="{{ route('logs.index') }}">
            <i class="icon nav-icon" data-eva="activity-outline"></i>
            <span class="menu-item" data-key="t-utility">Log</span>
         </a>
      </li> 
      @elsecan('member')
      <li class="menu-title" data-key="t-pages">Data Utama</li>

      <li class="{{ Request::is('post*') ? 'mm-active' : '' }}">
         <a href="{{ route('posts.index') }}">
            <i class="icon nav-icon" data-eva="book-open-outline"></i>
            <span class="menu-item" data-key="t-posts">Posts</span>
            <span class="badge rounded-pill badge-soft-primary" data-key="t-hot">{{ $postsCount }}</span>
         </a>
         <ul class="sub-menu" aria-expanded="false">
            <li><a href="{{ route('posts.index') }}" data-key="t-posts-all">Lihat semua</a></li>
            <li><a href="{{ route('posts.create') }}" data-key="t-posts-add">Tambah Data</a></li>
        </ul>
      </li>
      @endcan
   </ul>
</div>

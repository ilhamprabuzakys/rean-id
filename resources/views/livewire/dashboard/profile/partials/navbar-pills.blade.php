<div class="row">
   <div class="col-md-12">
      <ul class="nav nav-pills flex-column flex-sm-row mb-4">
         <li class="nav-item">
            <a wire:click.prevent='$dispatch("tab", {tab: "profile"})' class="nav-link {{ $tab == 'profile' ? 'active' : '' }} {{ $tab == '' ? 'active' : '' }}">
               <i class="mdi mdi-account-outline me-1 mdi-20px"></i>Profile</a>
         </li>
         <li class="nav-item">
            <a wire:click.prevent='$dispatch("tab", {tab: "postingan"})' class="nav-link {{ $tab == 'postingan' ? 'active' : '' }}"><i
                  class="mdi mdi-library-outline me-1 mdi-20px"></i>Postingan</a>
         </li>
         <li class="nav-item">
            <a wire:click.prevent='$dispatch("tab", {tab: "ebook"})' class="nav-link {{ $tab == 'ebook' ? 'active' : '' }}"><i
                  class="mdi mdi-book-check-outline me-1 mdi-20px"></i>Ebook</a>
         </li>
         <li class="nav-item">
            <a wire:click.prevent='$dispatch("tab", {tab: "event"})' class="nav-link {{ $tab == 'event' ? 'active' : '' }}"><i
                  class="mdi mdi-calendar-check me-1 mdi-20px"></i>Event</a>
         </li>
         <li class="nav-item">
            <a wire:click.prevent='$dispatch("tab", {tab: "berita"})' class="nav-link {{ $tab == 'berita' ? 'active' : '' }}"><i
                  class="mdi mdi-newspaper-check me-1 mdi-20px"></i>Berita</a>
         </li>
      </ul>
   </div>
</div>
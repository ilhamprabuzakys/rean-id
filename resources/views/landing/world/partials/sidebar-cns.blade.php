<style>
   /* CNS Radio Sidebar */
  
</style>
<script>
   function toggleSidebar() {
      var sidebar = document.querySelector(".sidebar");
      var mainLayout = document.querySelector(".main-layout");
      var sidebarBTN = document.querySelector("button#sidebar-toggle");

      if (sidebar.classList.contains("minimized")) {
         sidebar.classList.remove("minimized");
         mainLayout.style.marginLeft = "250px";
         sidebarBTN.innerHTML = '<';
      } else {
         sidebar.classList.add("minimized");
         mainLayout.style.marginLeft = "100px";
         sidebarBTN.classList.add('arrow-left');
      }
   }
</script>
<div class="sidebar">
   <div class="container">

      <img src="https://cegahnarkoba.bnn.go.id/wp-content/themes/wp-bootstrap-starter/inc/assets/images/logo_cns.png" alt="" id="brand-name" class="img-sidebar">
      <button class="toggle-button" id="sidebar-toggle">

      </button>


   </div>

   <a href="#">Playing..</a>

   {{-- <audio controls="" autoplay="" loop="" class="sidebar-audio">
      <source src="https://c3.siar.us/proxy/cnsradio/stream" />
   </audio> --}}

   <iframe src="https://a5.siar.us/public/cnsradio/embed?theme=light" frameborder="0" allowtransparency="true" style="width: 100%; min-height: 150px; border: 0;" class="player"> </iframe>

   <a href="#">Playlist : </a>

   <iframe
      src="https://a5.siar.us/public/cnsradio/history"
      width="100%"
      height="150"
      allowfullscreen=""
      loading="lazy"
      class="playlist"
      referrerpolicy="no-referrer-when-downgrade"></iframe>
</div>

<script>
   document.getElementById("sidebar-toggle").addEventListener("click", function() {
      toggleSidebar();
   });

   document.addEventListener("DOMContentLoaded", function() {
      toggleSidebar();
   });
</script>

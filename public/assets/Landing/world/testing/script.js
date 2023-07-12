function toggleSidebar() {
   var sidebar = document.querySelector(".sidebar");
   var mainLayout = document.querySelector(".main-layout");
   var sidebarBTN = document.getElementById("sidebar-toggle");

   if (sidebar.classList.contains("minimized")) {
      sidebar.classList.remove("minimized");
      mainLayout.style.marginLeft = "250px";
      sidebarBTN.innerHTML = "<";
   } else {
      sidebar.classList.add("minimized");
      mainLayout.style.marginLeft = "0";
      sidebarBTN.innerHTML = ">";
   }
}

document
   .getElementById("sidebar-toggle")
   .addEventListener("click", function () {
      toggleSidebar();
   });

document.addEventListener("DOMContentLoaded", function () {
   toggleSidebar();
});

document.addEventListener('DOMContentLoaded', function () {
   var audioElement = document.getElementById('nama-audio');
   audioElement.pause();
   audioElement.currentTime = 0;
});


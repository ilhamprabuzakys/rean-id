document.addEventListener("DOMContentLoaded", function() {
   var whatsappIcon = document.querySelector("#whatsapp-icon-main");
   var heroSection = document.querySelector(".hero-area");

   // Mengubah tampilan ikon saat halaman dimuat
   if (isScrolledIntoView(heroSection)) {
     whatsappIcon.style.display = "none";
   }

   // Memantau perubahan posisi scroll
   window.addEventListener("scroll", function() {
     if (isScrolledIntoView(heroSection)) {
       whatsappIcon.style.display = "none";
     } else {
       whatsappIcon.style.display = "block";
     }
   });

   // Fungsi untuk memeriksa apakah elemen berada dalam tampilan
   function isScrolledIntoView(element) {
     var rect = element.getBoundingClientRect();
     var elemTop = rect.top;
     var elemBottom = rect.bottom;

     // Mengubah nilai 0.2 sesuai dengan kebutuhan Anda
     var isVisible = elemTop < window.innerHeight * 0.2 && elemBottom >= 0;
     return isVisible;
   }
 });
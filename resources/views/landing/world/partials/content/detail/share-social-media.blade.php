<button id="copy-button" class="post-btn post-btn-copy">
   <i id="copy-icon" class="fa fa-copy mr-2"></i>
   <span id="copy-button-text">COPY</span>
</button>

<script>
   document.getElementById("copy-button").addEventListener("click", function() {
      var currentURL = window.location.href;
      var tempInput = document.createElement("input");
      tempInput.value = currentURL;
      document.body.appendChild(tempInput);
      tempInput.select();
      document.execCommand("copy");
      document.body.removeChild(tempInput);

      var copyIcon = document.getElementById("copy-icon");
      var copyButtonText = document.getElementById("copy-button-text");
      
      copyIcon.classList.remove("fa-copy");
      copyIcon.classList.add("fa-check");

      copyButtonText.textContent = "COPIED";

      setTimeout(function() {
         copyIcon.classList.remove("fa-check");
         copyIcon.classList.add("fa-copy");

         copyButtonText.textContent = "COPY";
      }, 3000);
   });
</script>



<a href="https://www.facebook.com/sharer/sharer.php?u={{ $_SERVER['REQUEST_URI'] }}" class="post-btn post-btn-facebook" target="_blank">
   <i class="fa fa-facebook mr-2"></i>
   Facebook</a>
<a href="https://twitter.com/intent/tweet?via=reanid&hashtags=Rean&text=Postingan%20dari%20Rean%20Komunitas%20Anti%20Narkoba
&url={{ $_SERVER['REQUEST_URI'] }}" class="post-btn post-btn-twitter"
   target="_blank">
   <i class="fa fa-twitter mr-2"></i>
   Twitter</a>
<a href="#" class="post-btn post-btn-instagram" target="_blank">
   <i class="fa fa-instagram mr-2"></i>
   Instagram</a>
<a href="whatsapp://send?text=Hi lihat lah postingan ini {{ $_SERVER['REQUEST_URI'] }}" class="post-btn post-btn-whatsapp" target="_blank">
   <i class="fa fa-whatsapp mr-2"></i>
   Whatsapp</a>

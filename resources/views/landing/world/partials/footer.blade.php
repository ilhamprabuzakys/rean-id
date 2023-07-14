<footer class="footer-area">
   <div class="container">
      <div class="row">
         <div class="col-12 col-md-4">
            <div class="footer-single-widget">
               <a href="#">
                  <img src="{{ asset('assets/img/footer-rean-gabung-dark.png') }}" alt="" style="height: 90px;">
                  {{-- <div class="row justify-content-start">
                     <div class="col-4">
                        <img src="{{ asset('assets/img/rean-putih-hitam2.png') }}" alt="" class="" style="height: 90px;">
                     </div>
                     <div class="col-3">
                        <img src="{{ asset('assets/img/rean-berwarna-logo-saja2.png') }}" alt="" class="" style="height: 90px;">
                     </div>
                  </div> --}}
               </a>
               <div class="copywrite-text mt-30">
                  <p>
                     {{ $company->short_address }}
                     {{-- Copyright &copy;
                     <script>
                        document.write(new Date().getFullYear());
                     </script> All rights reserved and made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://iotekno.com/"
                        target="_blank">IoT</a> --}}
                  </p>
               </div>
               <div class="social-links mt-3">
                  <a href="{{ $company->social_media->twitter }}" target="_blank" class="twitter"><i class="bi bi-twitter"></i></a>
                  <a href="{{ $company->social_media->facebook }}" target="_blank" class="facebook"><i class="bi bi-facebook"></i></a>
                  <a href="{{ $company->social_media->instagram }}" target="_blank" class="instagram"><i class="bi bi-instagram"></i></a>
                  <a href="{{ $company->social_media->youtube }}" target="_blank" class="youtube"><i class="bi bi-youtube"></i></a>
               </div>

               <div class="mt-4 footer-contact">
                  <h4>Contact Us</h4>
                  <p>
                     {!! str_replace(',', '<br>', $company->address) !!}<br>
                     <strong>Phone:</strong> {{ $company->phone }}<br>
                     <strong>Email:</strong> {{ $company->email }}<br>
                  </p>

               </div>
            </div>
         </div>
         <div class="col-12 col-md-8 d-flex justify-content-end">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.134094431902!2d106.86869657439466!3d-6.246054061158088!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f3a7ea2c6af9%3A0xfd08bd0f89bf1020!2sBNN%20-%20Badan%20Narkotika%20Nasional%20(National%20Narcotics%20Board)!5e0!3m2!1sen!2sid!4v1688965333207!5m2!1sen!2sid" width="600" height="450" allowfullscreen="" loading="lazy" class="footer-map" referrerpolicy="no-referrer-when-downgrade"></iframe>
         </div>
         {{-- <div class="col-12 col-md-4">
            <div class="footer-single-widget">
               <h5>Subscribe</h5>
               <form action="#" method="post">
                  <input type="email" name="email" id="email" placeholder="Enter your mail">
                  <button type="button"><i class="fa fa-arrow-right"></i></button>
               </form>
            </div>
         </div> --}}
      </div>
   </div>
</footer>
<footer class="footer-last">
   <div class="container">
      <div class="row justify-content-start">
         <div class="d-flex align-items-center">
            <p>REAN.ID - BNN Cegah Narkoba 2023 <b>&copy;</b></p>
         </div>
      </div>
   </div>
</footer>
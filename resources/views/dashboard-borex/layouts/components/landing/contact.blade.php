<!-- ======= Contact Section ======= -->
<section id="contact" class="contact">
   <div class="container slideInUp wow" data-wow-duration="1s" data-wow-delay="0.2s">
      <header class="section-header">
         <h2 class="h2-contact">Contact Us</h2>
         <!-- <p>Contact Us</p> -->
      </header>
      <div class="row gy-4">
         <div class="col-lg-12">
            <form action="forms/contact.php" method="post" class="php-email-form">
               <div class="row">
                  <div class="col-md-6">
                     <div class="row">
                        <div class="mb-3">
                           <label for="" class="form-label">Email</label>
                           <input type="email" name="email" class="form-control" placeholder="example@gmail.com" required>
                        </div>
                        <div class="mb-3">
                           <label for="" class="form-label">Name</label>
                           <input type="text" class="form-control" name="name" placeholder="John Doe" required>
                        </div>

                        <div class="mb-3">
                           <label for="" class="form-label">Phone Number</label>
                           <input type="text" class="form-control" name="phone" placeholder="Subject" required>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-6 mb-4">
                     <div class="row">

                        <div class="mb-3">
                           <label for="" class="form-label">Message</label>
                           <textarea id="contact-message" class="form-control" name="message" rows="9"
                              placeholder="Hi Siparel, can you help me? ..." required></textarea>
                        </div>

                        <div class="mb-3 text-center">
                           <div class="loading">Loading</div>
                           <div class="error-message"></div>
                           <div class="sent-message">Your message has been sent. Thank you!</div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <button type="submit" class="send-message-btn mx-1" style="font-size: 16px">Send</button>
                  <span>Tertarik untuk magang diperusahaan kami? <a href="/message" class="my-2 text-decoration-none">Klik disini</a> </span> 
               </div>
            </form>
         </div>
      </div>
   </div>
</section>
<!-- End Contact Section -->

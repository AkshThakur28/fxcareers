<main>

   <!-- breadcrumb-area-start -->
   <div class="it-breadcrumb-area it-breadcrumb-bg" data-background="<?= base_url() ?>public/web/assets/img/breadcrumb/breadcrumb.jpg">
      <div class="container">
         <div class="row ">
            <div class="col-md-12">
               <div class="it-breadcrumb-content z-index-3 text-center">
                  <div class="it-breadcrumb-title-box">
                     <h3 class="it-breadcrumb-title">contact us</h3>
                  </div>
                  <div class="it-breadcrumb-list-wrap">
                     <div class="it-breadcrumb-list">
                        <span><a href="<?= base_url() ?>">home</a></span>
                        <span class="dvdr">//</span>
                        <span>contact</span>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- breadcrumb-area-end -->

   <!-- contact-area-start -->
   <div class="it-contact__area pt-80 pb-80">
      <div class="container">
         <div class="it-contact__wrap fix z-index-3 p-relative">
            <div class="it-contact__shape-1 d-none d-xl-block">
               <img src="<?= base_url() ?>public/web/assets/img/contact/shape-2-1.png" alt="">
            </div>
            <div class="row">
               <div class="col-xl-7">
                  <div class="it-contact__right-box">
                     <div class="it-contact__section-box pb-20">
                        <h4 class="it-contact__title pb-15"> Transform your Financial Future</h4>
                        <p>Join FXCareers Dubai for expert-led courses that equip you with the skills to thrive in Forex and global stock markets. Learn from seasoned professionals and gain practical experience.
                        </p>
                     </div>
                     <div class="it-contact__content mb-55">
                        <ul>
                           <li>
                              <div class="it-contact__list d-flex align-items-start gap-4">
                                 <div class="it-contact__icon">
                                    <span><i class="fa-solid fa-location-dot"></i></span>
                                 </div>
                                 <div class="it-contact__text">
                                    <span>Our Address</span><br>
                                    <a href="#"> Latifa Tower - Office No. B-3207, 32nd Floor - Sheikh Zayed Rd - opposite Museum of The Future - Trade Centre 1 - Dubai - United Arab Emirates</a>
                                 </div>
                              </div>
                           </li>
                           <li>
                              <div class="it-contact__list d-flex align-items-start gap-4">
                                 <div class="it-contact__icon">
                                    <span><i class="fa-solid fa-phone phone"></i></span>
                                 </div>
                                 <div class="it-contact__text">
                                    <span>Call Us</span><br>
                                    <a href="tel:+971503056430">+971 503056430</a>

                                 </div>
                              </div>
                           </li>
                           <li>
                              <div class="it-contact__list d-flex align-items-start gap-4">
                                 <div class="it-contact__icon">
                                    <span><i class="fa-solid fa-envelope"></i></span>
                                 </div>
                                 <div class="it-contact__text">
                                    <span>Email Us</span><br>

                                    <a href="mailto:info@fxcareers.ae">info@fxcareers.ae</a>
                                 </div>
                              </div>
                           </li>
                        </ul>
                     </div>
                     <div class="it-contact__bottom-box d-flex align-items-center justify-content-between">
                        <div class="it-contact__scrool smooth">
                           <a href="#it-newsletter" class="text-dark"><i class="fa-solid fa-arrow-down"></i>Customer Care</a>
                        </div>
                        <div class="it-footer-social">
                           <a href="https://www.youtube.com/@fx_careers"  target="_blank" rel="nofollow"><i class="fa-brands fa-facebook-f"></i></a>
                           <a href="https://www.linkedin.com/company/fxcareers-global/" target="_blank" rel="nofollow"> <i class="fa-brands fa-linkedin-in"></i></a>
                           <a href="https://www.instagram.com/fxcareers_uae?igsh=aGZsZWdjcGs0c2lj"  target="_blank" rel="nofollow"><i class="fa-brands fa-instagram"></i></a>
                           <a href="https://www.pinterest.com/fxcareersuae/"  target="_blank" rel="nofollow"><i class="fa-brands fa-pinterest-p"></i></a>
                           <a href="https://x.com/fxcareersglobal"  target="_blank" rel="nofollow"><i class="fab fa-x-twitter"></i></a>
                           <a href="https://www.tiktok.com/@fxcareers"  target="_blank" rel="nofollow"><i class="fa-brands fa-tiktok"></i></a>
                           <a href="https://www.youtube.com/@fx_careers" target="_blank" rel="nofollow"> <i class="fa-brands fa-youtube"></i></a>
                           
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-xl-5">
                  <div class="it-contact__form-box">
                     <form id="contactForm" method="POST" action="<?= base_url('contact_us/contact_us_submit_data'); ?>" enctype="multipart/form-data" onsubmit="showAlert()">
                        <div class="row">
                           <div class="col-12 mb-25">
                              <div class="it-contact-input-box">
                                 <label>Name*</label>
                                 <input type="text" name="username" placeholder="Name" required>
                              </div>
                           </div>
                           <div class="col-12 mb-25">
                              <div class="it-contact-input-box">
                                 <label>Email Address*</label>
                                 <input type="email" name="email" placeholder="Email" required>
                              </div>
                           </div>
                           <div class="col-12 mb-25">
                              <div class="it-contact-input-box">
                                 <label>Phone*</label>
                                 <input type="text" id="mobile_no" name="mobile_no" placeholder="Phone" required>
                              </div>
                           </div>
                           <script>
                              document.getElementById('mobile_no').addEventListener('input', function(e) {
                                 this.value = this.value.replace(/[^0-9]/g, '');
                              });

                              function showAlert() {
                                 alert("Your form has been submitted successfully!");
                                 return true; // Allow the form to be submitted
                              }
                           </script>
                           <div class="col-12 mb-25">
                              <div class="it-contact-input-box">
                                 <label>Location</label>
                                 <input type="text" name="location" placeholder="Location">
                              </div>
                           </div>
                           <div class="col-12 mb-25">
                              <div class="it-contact-input-box">
                                 <label>Subject*</label>
                                 <input type="text" name="subject" placeholder="Subject" required>
                              </div>
                           </div>
                           <div class="col-12 mb-25">
                              <div class="it-contact-textarea-box">
                                 <label>Message</label>
                                 <textarea name="message" placeholder="Message"></textarea>
                              </div>
                           </div>
                           <div class="col-12">
                              <input type="submit" name="submit" class="it-btn" value="Send Message">
                           </div>
                        </div>
                     </form>
                  </div>

               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="it-contact__area ">
      <div style="line-height: 0;"><iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1444462.9725219456!2d-0.5251161797663545!3d0.1588801807970931!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e5f4388eacdad61%3A0x2743075ef2b6cd84!2sFX%20Careers%20Global!5e0!3m2!1sen!2sin!4v1723110165779!5m2!1sen!2sin" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></div>
   </div>
   <!-- contact-area-end -->


</main>
<!-- footer Include  -->

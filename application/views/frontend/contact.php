<main>
    <section class="contact_banner">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="contact_container">
                        <div class="row">
                            <div class="col-lg-7">
                                <h1>Transform Your Financial Future</h1>
                                <p>Join FXCareers Dubai for expert-led courses that equip you with the skills to thrive
                                    in Forex and global stock markets. Learn from seasoned professionals and gain
                                    practical experience.</p>
                                <form action="<?= base_url('website/contact_us_submit_data'); ?>" class="mt-4"
                                    method="POST">
                                    <div class="row">

                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="username" class="form-label">Name*</label>
                                                <input type="text" class="form-control" name="username" id="username"
                                                    placeholder="Enter Your Name" required />
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="email" class="form-label">Email*</label>
                                                <input type="email" class="form-control" name="email" id="email"
                                                    placeholder="Enter Your Email" required />
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="mobile_no" class="form-label">Number*</label>
                                                <input type="tel" class="form-control"  name="mobile_no" id="mobile"
                                                    placeholder="Enter Your Mobile" pattern="[0-9]{10}" maxlength="10"
                                                    oninput="this.value=this.value.replace(/[^0-9]/g,'');" required />
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="location" class="form-label">Location*</label>
                                                <input type="text" class="form-control" name="location" id="location"
                                                    placeholder="Enter Your Location" required />
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="subject" class="form-label">Subject*</label>
                                                <input type="text" class="form-control" name="subject" id="subject"
                                                    placeholder="Enter Your Subject" required />
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="message" class="form-label">Message*</label>
                                                <textarea name="message" id="message" class="form-control" rows="5"
                                                    placeholder="Enter Your Message" required></textarea>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <button type="submit"
                                                    class="mainthemebutton py-3 w-100 text-center fs-bold">
                                                    Send Message
                                                    <span><img
                                                            src="<?= base_url() ?>public/assets/img/form_btn_icon.png"
                                                            width="30px" alt=""></span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="col-lg-5 align-self-center">

                                <div class="cont_info">
                                    <ul class="list-inline">
                                        <li class="d-flex align-itms-center gap-4 mt-3"><img
                                                src="<?= base_url() ?>public/assets/img/pin.png"
                                                style="height: 30px;width:30px;" alt="">
                                            <div class="f-flex flex-column">
                                                <div class="fs-6">Our address</div>
                                                <div>Latifa Tower - Office No. B-3207, 32nd Floor - Sheikh Zayed Rd -
                                                    Trade Centre 1 - Dubai - United Arab
                                                    Emirates</div>
                                            </div>
                                        </li>
                                        <li class="d-flex align-itms-center gap-4 mt-3"><img
                                                src="<?= base_url() ?>public/assets/img/phone.png"
                                                style="height: 30px;width:30px;" alt="">
                                            <div class="f-flex flex-column">
                                                <div class="fs-6">Call Us</div>
                                                <div> <a href="tel:+971503056430" style="color:#3f4346">+971
                                                        503056430</a> </div>
                                            </div>
                                        </li>
                                        <li class="d-flex align-itms-center gap-4 mt-3"><img
                                                src="<?= base_url() ?>public/assets/img/mail.png"
                                                style="height: 30px;width:30px;" alt="">
                                            <div class="f-flex flex-column">
                                                <div class="fs-6">Email Us</div>
                                                <div> <a href="mailto:info@fxcareers.ae" style="color:#3f4346">
                                                        info@fxcareers.ae</a> </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="socal_icon text-center mt-3">

                                    <a href="https://www.facebook.com/people/Fxcareers-Global-Dubai/61563859153006/"
                                        target="_blank"> <img src="<?= base_url() ?>public/assets/img/facebook_icon.png"
                                            width="50px" class="me-2" alt="">
                                    </a>
                                    <a href="https://www.linkedin.com/company/fxcareers-global/" target="_blank"> <img
                                            src="<?= base_url() ?>public/assets/img/linkedin_icon.png" width="50px"
                                            class="me-2" alt="">
                                    </a>
                                    <a href="https://www.instagram.com/fxcareers_uae/?igsh=aGZsZWdjcGs0c2lj#"
                                        target="_blank"> <img src="<?= base_url() ?>public/assets/img/insta_icon.png"
                                            width="50px" class="me-2" alt="">
                                    </a>

                                    <a href="https://www.tiktok.com/@fxcareers" target="_blank"> <img
                                            src="<?= base_url() ?>public/assets/img/tictoc_icon.png" width="50px"
                                            class="me-2" alt="">
                                    </a>
                                    <a href="https://www.youtube.com/@fx_careers" target="_blank"> <img
                                            src="<?= base_url() ?>public/assets/img/youtube_icon.png" width="50px"
                                            class="me-2" alt="">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="map pt-">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="map-wraper rounded-5 overall-hidden">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m23!1m12!1m3!1d57751.110648460446!2d55.23996470140654!3d25.22195226592314!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m8!3e6!4m0!4m5!1s0x3e5f4388eacdad61%3A0x2743075ef2b6cd84!2sLatifa%20Tower%20-%20Office%20No.%203207%2C%2032nd%20Floor%20-%20Sheikh%20Zayed%20Rd%20-%20opposite%20Museum%20of%20The%20Future%20-%20Trade%20Centre%201%20-%20Dubai%20-%20United%20Arab%20Emirates!3m2!1d25.221957999999997!2d55.28125!5e0!3m2!1sen!2sin!4v1746002175024!5m2!1sen!2sin"
                            width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="cta">
        <div class="container">
            <div class="cta_box">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="cta_right">
                            <h2>Flexible Learning Options for Every Trader</h2>
                            <div class="download_point_wraper d-md-flex ">
                                <ul class="list-inline">
                                    <li class="text-black mt-4"> <img
                                            src="<?= base_url() ?>public/assets/img/black_tick.svg" class="img-fluid "
                                            alt=""> Interactive Learning Modules</li>
                                    <li class=" text-black mt-4"> <img
                                            src="<?= base_url() ?>public/assets/img/black_tick.svg" class="img-fluid "
                                            alt=""> One-Touch Mentorship</li>
                                </ul>
                                <ul class="list-inline ms-md-3 ms-0">
                                    <li class=" text-black mt-4"> <img
                                            src="<?= base_url() ?>public/assets/img/black_tick.svg" class="img-fluid "
                                            alt=""> Practice Trading Platform</li>
                                    <li class=" text-black mt-4"> <img
                                            src="<?= base_url() ?>public/assets/img/black_tick.svg" class="img-fluid "
                                            alt=""> Community Engagement</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 align-self-center">
                        <div class="suscribe_form text-lg-end text-start ">
                            <form action="">
                                <h2>Join Our News Letter</h2>
                                <div class="bg-white input_wraper ms-lg-auto">

                                    <input type="text" placeholder="Enter Your Email">
                                    <a href="" class="btn btn-dark text-white">Subscribe Now</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main>

<?php if ($this->session->flashdata('js_alert') == 'success'): ?>
    <script>
        
        window.location.href = "<?= base_url('thank-you'); ?>";
    </script>
<?php elseif ($this->session->flashdata('js_alert') == 'error'): ?>
    <script>
        alert("Something went wrong. Please try again.");
    </script>
<?php endif; ?>
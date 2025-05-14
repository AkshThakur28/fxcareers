<main>

    <!-- breadcrumb-area-start -->
    <div class="it-breadcrumb-area it-breadcrumb-bg" data-background="<?= base_url() ?>public/web/assets/img/breadcrumb/breadcrumb.jpg">
        <div class="container">
            <div class="row ">
                <div class="col-md-12">
                    <div class="it-breadcrumb-content z-index-3 text-center">
                        <div class="it-breadcrumb-title-box">
                            <h3 class="it-breadcrumb-title">One to One Session</h3>
                        </div>
                        <div class="it-breadcrumb-list-wrap">
                            <div class="it-breadcrumb-list">
                                <span><a href="<?= base_url() ?>">home</a></span>
                                <span class="dvdr">//</span>
                                <span>one-to-one-session</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb-area-end -->

    <!-- course-area-start -->
    <div class=" it-course-area p-relative  pt-80 pb-80">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <p>Unlock your Forex trading potential with our exclusive one-to-one mentorship sessions. Our expert mentors offer personalized guidance tailored to your skill level and goals, whether you're a beginner or an experienced trader. These focused sessions provide real-time market analysis, strategy refinement, and immediate feedback on your trading decisions. Invest in your skills and gain the confidence to navigate the Forex market successfully, all while learning at your own pace in a private, customized environment.</p>
                </div>

            </div>
        </div>
    </div>
    <div class=" it-course-area p-relative  grey-bg  pt-80 pb-80">
        <div class="container">
            <div class="row g-4 align-items-center">
                <div class="col-xl-6 col-lg-6 ">
                        <h4 class="onetoone-section-title mb-4">Accelerate your Forex trading skills with personalized guidance.
                        </h4>
                    <div class="one-to-one-sec mb-4">
                        <div class="row gx-20">
                            <h6><i class="fa-solid fa-circle-check"></i>Tailored to your level and goals</h6>
                            <h6><i class="fa-solid fa-circle-check"></i>Learn from expert traders</h6>
                            <h6><i class="fa-solid fa-circle-check"></i>Flexible scheduling</h6>
                            <h6><i class="fa-solid fa-circle-check"></i>In-depth market analysis</h6>
                            <h6><i class="fa-solid fa-circle-check"></i>Real-time practice</h6>
                        </div>
                    </div>
                    <h3 class="mb-4">Benefits</h3>
                    <div class="one-to-one-sec">
                        <div class="row gx-20">
                            <h6><i class="fa-solid fa-circle-check"></i>Customized learning experience</h6>
                            <h6><i class="fa-solid fa-circle-check"></i>Develop winning strategies</h6>
                            <h6><i class="fa-solid fa-circle-check"></i>Address your specific challenges</h6>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 text-center">
                    <img src="<?= base_url() ?>public/web/assets/img/one-to-one.png" alt="" class="w-75">
                </div>
            </div>
        </div>
    </div>
    <div class="it-category-area pt-120 pb-120">
      <div class="container">
         <div class="it-category-title-wrap p-relative mb-70">

            <div class="row justify-content-center ">
               <div class="col-xl-8 col-lg-8 text-center">
                  <div class="it-category-title-box">
                    <h4 class="it-section-title">How it works
                        
                     </h4>
                  </div>
               </div>

            </div>
         </div>
         <div class="row">
            <div class="col-xl-4 col-lg-4 col-md-6 mb-30">
               <div class="it-category-4-item text-center">
                  <div class="it-category-4-icon">
                     <span>
                        <img src="https://fxcareers.ae/public/web/assets/img/choose-your-mentor.png" alt="" class="mb-4">
                        <h4 class="it-category-4-title">Choose your mentor</h4>
                     </span>
                  </div>

               </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-6 mb-30">
               <div class="it-category-4-item text-center">
                  <div class="it-category-4-icon">
                     <span>
                        <img src="https://fxcareers.ae/public/web/assets/img/book-your-session.png" alt="" class="mb-4">
                        <h4 class="it-category-4-title"><a href="#">Book your session</a></h4>

                     </span>
                  </div>

               </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-6 mb-30">
               <div class="it-category-4-item text-center">
                  <div class="it-category-4-icon">
                     <span>
                        <img src="https://fxcareers.ae/public/web/assets/img/attend-01.png" alt="" class="mb-4">
                        <h4 class="it-category-4-title"><a href="#">Attend your personalized call</a></h4>
                     </span>
                  </div>

               </div>
            </div>
            <div class="mt-3 text-center">
                                    <a class="it-btn" role="button" data-bs-toggle="modal" data-bs-target="#InquiryModal">Book Now </a>
            </div>
         </div>
      </div>
   </div>
    <div class="it-course-area p-relative grey-bg pt-120 pb-120">
        <div class="container">
            <div class="row">
                <?php foreach ($one_to_one_session_view as $row) { ?>
                    <div class="col-xl-4 col-lg-4 col-md-6 mb-30">
                        <div class="session-box">
                            <img src="<?= base_url('uploads/one_to_one_session/') . $row->session_image; ?>" class="card-img-top img-fluid object-fit-contain" style="width: 100%; border-radius: 10px; transition: 0.9s; height: 200px; object-fit: cover;     vertical-align: middle;" alt="">
                            <div class="mt-4 p-3 pt-0">
                                <h3 class="session-box-title mb-3"><?php $row->session_name; ?></h3>

                                <div>
                                    <ul class="p-0 m-0 list-none">
                                        <li class="course-info course-information ">
                                            <span><i class="fa-solid fa-calendar-days"></i> <?= date('d-m-Y', strtotime($row->date)) ?></span>
                                            <span><i class="fa-solid fa-clock"></i> <?= $row->time; ?></span>
                                        </li>
                                        <li class="course-info course-information">
                                            <span><i class="fa-solid fa-location-dot"></i> <?= $row->location; ?></span>
                                            <span><i class="fa-solid fa-globe"></i> <?= $row->language; ?></span>
                                        </li>
                                        <li class="course-info course-information border-0">
                                            <span><i class="fa-solid fa-clock-rotate-left"></i> <?= $row->duration; ?> Minutes</span>
                                            <span><i class="fa-solid fa-microphone"></i> <?= $row->speaker; ?></span>
                                        </li>

                                    </ul>
                                </div>
                                <div class="mt-3">
                                    <a class="it-btn" role="button" data-bs-toggle="modal" data-bs-target="#InquiryModal">Book Now </a>
                                </div>
                            </div>
                        </div>

                    </div>
                <?php } ?>


            </div>
        </div>
    </div>
    <!-- course-area-end -->
    <!-- Modal -->
    <div class="modal fade" id="InquiryModal" tabindex="-1" aria-labelledby="InquiryModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="InquiryModalLabel">Enqury About One To One Session</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" class="mt-4">
                        <div class="row g-4">
                            <div class="col-lg-6">
                                <div class="it-signup-input mb-0">
                                    <input type="etext" placeholder="Name *" class="border">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="it-signup-input mb-0">
                                    <input type="email" placeholder="Email *" class="border">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="it-signup-input mb-0">
                                    <input type="tel" placeholder="Mobile*" class="border">
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="it-signup-input mb-20">
                                    <textarea name="" id="" cols="30" rows="3" class="border" placeholder="Message"></textarea>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class=" ">
                                    <button class="it-btn border-0">Submit<i class="ps-2 ri-arrow-right-line"></i></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

</main>
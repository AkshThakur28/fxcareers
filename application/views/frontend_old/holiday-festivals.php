<style>
        .christmas-banner {
            background-image: url(https://www.fxcareers.ae/public/web/assets/img/banner.png);
            background-size: cover;
            background-position: top center;
            background-repeat: no-repeat;
            padding: 60px 0px 60px;
        }

        .three_box_wraper {
            display: grid;

            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1rem;
        }

        .three_box {
            padding: 5px 6px;
            background-color: black;
            color: white;
            border-radius: 50px;

        }

        .three_box .disc {
            font-size: 14px;
        }

        .three_box .three_icon {
            height: 30px;
            width: 30px;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 5px 4px;

        }
    </style>
    <style>
        #staticBackdrop .countdown {
            padding: 0;
            background-color: #0000;
            position: absolute;
            bottom: 0;
            transform: translateX(-50%);
            left: 50%;
            width: 100%;
        }

        .countdown {
            padding: 32px 24px;
            /* background-color: #2e2d3c80; */
            border: 1px solid #ffffff1f;
            border-radius: 12px;
        }

        .countdown li {
            display: inline-block;
            text-align: center;
            font-size: 20px;
            padding: 1em;
            text-transform: uppercase;
            position: relative;
        }

        #staticBackdrop .countdown li {
            font-size: 16px;
            /* padding: 0.5em; */
            padding: 0;
        }

        .modal-backdrop.show {
            --bs-backdrop-opacity: .8;
        }

        #staticBackdrop .countdown li::before {
            display: none;
        }

        #staticBackdrop .countdown li span {
            font-size: 45px;
            line-height: 58px;
            width: 90px;
            margin-bottom: .3rem;
            background: #0004;
            backdrop-filter: blur(10px);
        }

        #staticBackdrop .counter-line {
            width: 90%;
            top: 39px;
            border-width: 2px;
            left: 50%;
            transform: translateX(-50%);
        }

        .counter-line ul {
            width: 50%;
        }

        .counter-line {
            position: absolute;
            width: 77%;
            border-width: 3px;
            border-color: #0d0e11;
            opacity: 1;
            top: 75px;
            left: 50%;
            transform: translateX(-50%);
            margin: 0 auto;
        }

        .countdown li span::after,
        .countdown li span::before {
            position: absolute;
            content: '';
            top: 50%;
            display: none;
            transform: translateY(-50%);
            background: url(https://www.yamarkets.com/public/web/img/timer-hook.png) no-repeat;
            background-size: 100%;
            background-position: left center;
            width: 5px;
            height: 28px;
        }

        .countdown li span::after {
            right: 0;
            display: none;
        }

        .countdown li span::before {
            left: 0;
            display: none;
        }

        .countdown li span {
            display: block;
            font-weight: 500;
            font-size: 76px;
            line-height: 92px;
            letter-spacing: 4px;
            box-shadow: 0 .4571477770805359px .4571477770805359px 0 #504e54 inset;
            background: linear-gradient(180deg, #393a3e 0, #3e4245 100%);
            border-radius: 6px;
            padding: .6rem;
            margin-bottom: 12px;
            position: relative;
            width: 144px;
            color: #fff;
        }

        .countdown-timer {
            background-color: #000000;
            background-image: url(https://www.fxcareers.ae/public/web/assets/img/timerbg.png);
            background-position: center bottom;
            background-size: cover;
            background-repeat: no-repeat;
        }

        .prisepole {
            padding: 100px 0px;
        }

        .prise_box {

            padding: 30px;
            box-shadow: 0px 0px 10px rgb(0 0 0/25%);
            height: 100%;
            position: relative;
            border-radius: 10px;
        }

        .whychoose {
            padding: 100px 0px;
            background-image: linear-gradient(to top, #00000094, #00000053), url(https://www.fxcareers.ae/public/web/assets/img/datebg.jpg);
            background-position: center;
            background-size: cover;
            background-repeat: no-repeat;

        }

        .numberr {
            height: 100px;
            width: 80px;
            display: grid;
            place-items: center;
            border-radius: 0px 0px 50px 50px;
            background-color: #f9c311;
            position: absolute;
            top: 0;

        }

        .populer_course {
            padding: 100px 0px;
        }

        .courses-ul {
            list-style: none;
        }

        .courses-ul li {
            background: #ffffff;
            padding: 20px;
            color: #262627;
            font-weight: 600;
            font-size: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgb(0 0 0 / 18%);
        }

        .testibox {
            background: #000;
            border-radius: 10px;
            padding: 30px;
        }

        @media (max-width: 400px) {
            #staticBackdrop .countdown li {
                font-size: 12px;
            }

            #staticBackdrop .countdown li span {
                font-size: 30px;
                line-height: 30px;
                width: 70px;
            }

            #staticBackdrop .counter-line {
                display: none;
            }
        }

        @media (max-width:991px) {
            .countdown li span {
                width: 100px;
                font-size: 56px;
            }

            .christmas-banner {
                background-position: left;
            }

            .countdown {
                padding: 0;
            }
        }
    </style>
    <main>
        <section class="christmas-banner">
            <div class="container">
                <div class="row ">
                    <div class=" col-lg-6 align-self-center">
                        <div class="text-left">
                            <h4>Celebrate the Season of Learning! </h4>
                            <h1 class="it-hero-2-title">Unwrap Your Future with <span class="text-primary">25% Off
                                </span>All Courses!
                            </h1>
                            <div class="it-hero-2-text  ">
                                <p>This holiday season, give yourself or a loved one the gift of knowledge. At FX
                                    Careers, we're excited to offer an exclusive <strong>25% discount</strong> on all
                                    our training courses! Whether you're looking to kickstart your career in finance,
                                    enhance your trading skills, or expand your knowledge, now is the perfect time to
                                    invest in your future.</p>


                                <!-- <div class="three_box_wraper  mb-4">
                                    <div class="three_box d-flex  ">
                                       
                                        <div class="disc px-2">Expert Instructors</div>
                                    </div>
                                    <div class="three_box d-flex   ">
                                      
                                        <div class="disc px-2">Comprehensive Courses</div>
                                    </div>
                                    <div class="three_box d-flex  ">
                                       
                                        <div class="disc px-2">Flexible Learning</div>
                                    </div>
                                </div> -->


                                <div class="it-hero-2-btn-box d-flex align-items-center ">
                                    <a class="it-btn" href="https://www.fxcareers.ae/courses">
                                        <span>
                                            Explore all Courses
                                            <svg width="17" height="14" viewBox="0 0 17 14" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M11 1.24023L16 7.24023L11 13.2402" stroke="currentcolor"
                                                    stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"
                                                    stroke-linejoin="round"></path>b
                                                <path d="M1 7.24023H16" stroke="currentcolor" stroke-width="1.5"
                                                    stroke-miterlimit="10" stroke-linecap="round"
                                                    stroke-linejoin="round"></path>
                                            </svg>
                                        </span>
                                    </a>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <img src="<?= base_url() ?>public/web/assets/img/banner-right.png" alt="">
                    </div>
                </div>
            </div>
        </section>
       
        <section class="populer_course ">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <h2 class="it-hero-2-title">
                            Courses <span class="text-primary"> Available</span>
                        </h2>
                        <ul class="courses-ul">
                            <li class="mb-4">Forex Trading Basics</li>
                            <li class="mb-4">Advanced Trading Strategies</li>
                            <li class="mb-4">Risk Management Techniques</li>
                            <li class="mb-4">Market Analysis and Research And Many More!</li>


                        </ul>
                    </div>
                    <div class="col-lg-6 text-center">
                        <img src="<?= base_url() ?>public/web/assets/img/course-01.png" class=" w-75" alt="">
                    </div>
                </div>
            </div>
        </section>
        <section class="countdown-timer pt-10 pb-10">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 align-self-center">
                        <h2 class="text-white text-center mb-3"><span>Limited Time Bonus Offer!</span> <br> </h2>
                        <h2 class="text-center"><span class="text-warning">Use Code: XMAS25 at Checkout! </span></h2>
                    </div>
                    <div class="col-lg-8">
                        <div class="countdown border-0 d-lg-flex align-items-center py-5  justify-content-around">

                            <div id="countdown">
                                <ul class="list-unstyled text-center mb-0">
                                    <li>
                                        <span id="days"></span>
                                        <hr class="counter-line" />
                                        <div class="text-primary bg-black fw-medium">days</div>
                                    </li>
                                    <li>
                                        <span id="hours"></span>
                                        <hr class="counter-line" />
                                        <div class="text-primary bg-black fw-medium">Hours</div>
                                    </li>
                                    <li>
                                        <span id="minutes"></span>
                                        <hr class="counter-line" />
                                        <div class="text-primary bg-black fw-medium">Minutes</div>
                                    </li>
                                    <li>
                                        <span id="seconds"></span>
                                        <hr class="counter-line" />
                                        <div class="text-primary bg-black fw-medium">Seconds</div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="prisepole">
            <div class="container">
                <div class="row  justify-content-center" style="margin-bottom: 30px;">
                    <div class=" col-lg-10">
                        <div class="text-center">
                            <h2 class="it-hero-2-title ">Why Choose FX Careers?
                            </h2>
                        </div>
                    </div>
                </div>
                <div class="row  g-4">
                    <div class="col-lg-4 col-md-6">
                        <div class="prise_box">
                            <div class="imgwrape d-flex   flex-column ">
                                <img src="<?= base_url() ?>public/web/assets/img/icon11.png" alt="" width="64px">
                                <div class="priseicon pt-3 fw-bold">
                                    <!-- <img src="priseicon1.png" class="img-fluid" style="width: 100px;" alt=""> -->
                                    <h3>Expert Instructors</h3>
                                </div>

                            </div>
                            <p class="disc mb-0">
                                Learn from industry leaders with years of experience.
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="prise_box">
                            <div class="imgwrape d-flex   flex-column ">
                                <img src="<?= base_url() ?>public/web/assets/img/icon22.png" alt="" width="64px">
                                <div class="priseicon pt-3 fw-bold">
                                    <!-- <img src="priseicon2.png" class="img-fluid" style="width: 100px;" alt=""> -->
                                    <h3>Comprehensive Courses</h3>
                                </div>

                            </div>
                            <p class="disc mb-0">
                                Tailored content designed to meet your learning needs.
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="prise_box">
                            <div class="imgwrape d-flex   flex-column ">
                                <img src="<?= base_url() ?>public/web/assets/img/icon33.png" alt="" width="64px">
                                <div class="priseicon pt-3 fw-bold">
                                    <!-- <img src="priseicon3.png" class="img-fluid" style="width: 100px;" alt=""> -->
                                    <h3>Flexible Learning</h3>
                                </div>

                            </div>
                            <p class="disc mb-0">
                                Access courses anytime, anywhere, at your own pace.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="whychoose">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-10 ">
                        <div class="why_box text-center">
                            <h2 class="text-white mb-4">Don’t Miss Out!</h2>
                            <p class="text-white fw-bold fs-4" style="line-height: 1.4 !important;">This special offer
                                is valid from <span class="text-primary">December 20, 2023</span>, to<span
                                    class="text-primary fw-bold "> December 31, 2024 </span>. Take the first step towards
                                your career goals today!</p>
                        </div>

                    </div>
                </div>
            </div>
        </section>

        <section class="pt-80 pb-80">
            <div class="container">
                <div class="row ">
                    <h2 class="it-hero-2-title mb-4">
                        What Our <span class="text-primary">Students</span> Say</h2>
                    <div class="col-lg-6">
                        <div class="testibox h-100">
                            <p class="text-white">"The courses at FX Careers changed my life! I went from a novice to a
                                confident trader." <br>— Sarah T.</p>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="testibox h-100">
                            <p class="text-white">"The instructors are phenomenal. Their support made all the
                                difference!"<br>  — James R.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>



        <section class="grey-bg py-5">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <h2>Join Our Community!</h2>
                        <p>Become part of a vibrant community of learners and professionals. Share insights, network, and grow together.</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="position-relative  pt-80 pb-80" style="z-index: 0;">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12">
                <div class="it-blog-title-box">
                    <span class="it-section-subtitle">Faq's</span>
                    <h4 class="it-section-title">Frequently Asked
                        <span class="p-relative z-index">Questions
                            <svg class="title-shape-2" width="168" height="65" viewBox="0 0 168 65" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M73.3761 8.49147C78.4841 6.01353 82.5722 4.25154 88.8933 3.3035C94.2064 2.50664 99.6305 2.0701 104.981 1.94026C120.426 1.56549 135.132 4.90121 146.506 9.70405C158.628 14.8228 166.725 22.5638 166.074 31.6501C165.291 42.5779 151.346 51.7039 133.508 56.8189C110.253 63.4874 81.7065 63.8025 58.5605 60.8285C37.5033 58.123 11.6304 51.7165 3.58132 40.0216C-3.43085 29.8337 12.0728 18.1578 27.544 11.645C40.3656 6.24763 55.7082 2.98328 70.8043 4.08403C81.9391 4.89596 93.2164 6.87822 102.462 9.99561C112.874 13.5066 120.141 18.5932 127.862 23.6332"
                                    stroke="var(--it-theme-1)" stroke-width="3" stroke-linecap="round" />
                            </svg>
                        </span>
                    </h4>
                </div>
                <div class="it-custom-accordion mt-4">
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-items tp-faq-active">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-buttons " type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    What is the holiday offer at FX Careers?
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show"
                                aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p class="mb-0">
                                    This holiday season, FX Careers is offering a 25% discount on all training courses. Use the code XMAS25 at checkout to avail of this offer.
                                    </p>
                                    <img class="d-none d-md-block" src="assets/img/faq/thumb-1.jpg" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="accordion-items">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-buttons collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    When is the holiday offer valid?
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body ">
                                    <p class="mb-0">The special offer is valid from December 20, 2024, to January 31, 2025./p>
                                    <img class="d-none d-md-block" src="assets/img/faq/thumb-1.jpg" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="accordion-items">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-buttons collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    What courses are eligible for the discount?
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body ">
                                All courses at FX Careers are eligible for the 25% discount, including Forex Trading Basics, Advanced Trading Strategies, Risk Management Techniques, and Market Analysis and Research.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-items">
                            <h2 class="accordion-header" id="headingFour">
                                <button class="accordion-buttons collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                    How can I enroll in a course?
                                </button>
                            </h2>
                            <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p class="mb-0">You can explore all available courses on our website and register directly online. If you need assistance, feel free to contact us at <a href="mailto:info@fxcareers.ae">info@fxcareers.ae</a>  or call <a href="tel:+971503056430">+971 503056430</a>.</p>
                            </div>
                        </div>
                        </div>
                        <div class="accordion-items">
                            <h2 class="accordion-header" id="headingFive">
                                <button class="accordion-buttons collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                    Is there a money-back guarantee?
                                </button>
                            </h2>
                            <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p class="mb-0">For details regarding refunds, please refer to our Refund Policy available on the website.</p>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="accordion-items">
                            <h2 class="accordion-header" id="headingSix">
                                <button class="accordion-buttons collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                    Are the courses certified?
                                </button>
                            </h2>
                            <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p class="mb-0">Yes, all training programs offered by FX Careers are KHDA-certified.</p>                                   
                                </div>
                            </div>
                        </div>
                        <div class="accordion-items">
                            <h2 class="accordion-header" id="headingSeven">
                                <button class="accordion-buttons collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                                    Can I take courses online?
                                </button>
                            </h2>
                            <div id="collapseSeven" class="accordion-collapse collapse" aria-labelledby="headingSeven"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p class="mb-0">Absolutely! We offer flexible learning options, allowing you to access courses anytime and anywhere, at your own pace.</p>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="accordion-items">
                            <h2 class="accordion-header" id="headingEight">
                                <button class="accordion-buttons collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
                                    How can I stay updated on future offers and courses?
                                </button>
                            </h2>
                            <div id="collapseEight" class="accordion-collapse collapse" aria-labelledby="headingEight"
                                data-bs-parent="#accordionExample">
                                <p class="mb-0">You can subscribe to our newsletter to receive the latest updates and news from FX Careers.</p>
                           
                                </div>
                            </div>
                        </div>
                        <div class="accordion-items">
                            <h2 class="accordion-header" id="headingNine">
                                <button class="accordion-buttons collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseNine" aria-expanded="false" aria-controls="collapseNine">
                                    What support is available if I have questions about the courses?
                                </button>
                            </h2>
                            <div id="collapseNine" class="accordion-collapse collapse" aria-labelledby="headingNine"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p class="mb-0">Feel free to reach out to our support team via email at  <a href="mailto:info@fxcareers.ae">info@fxcareers.ae</a> or call us at <a href="tel:+971503056430">+971 503056430</a> for any inquiries.</p>
                                  
                                </div>
                            </div>
                        </div>
                        <div class="accordion-items">
                            <h2 class="accordion-header" id="headingTen">
                                <button class="accordion-buttons collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseTen" aria-expanded="false" aria-controls="collapseTen">
                                    Where is FX Careers located?
                                </button>
                            </h2>
                            <div id="collapseTen" class="accordion-collapse collapse" aria-labelledby="headingTen"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p class="mb-0">Our office is located at Latifa Tower, Office No. B-3207, 32nd Floor, Sheikh Zayed Rd, opposite Museum of The Future, Trade Centre 1, Dubai, United Arab Emirates.</p>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
        <script>
            // Countdown logic
            const countdownElement = document.getElementById('countdown');
            const daysElement = countdownElement.querySelector('#days');
            const hoursElement = countdownElement.querySelector('#hours');
            const minutesElement = countdownElement.querySelector('#minutes');
            const secondsElement = countdownElement.querySelector('#seconds');

            // EVENT DATE
            const endDate = new Date('2024-12-25');
            // const endDate = new Date('2024-11-27 10:53:59');
            let secondsLeft = (endDate.getTime() - new Date().getTime()) / 1000;

            function updateCountdown() {
                secondsLeft -= 1;

                // Calculate days, hours, minutes, and seconds
                const days = Math.floor(secondsLeft / 86400);
                daysElement.textContent = days < 10 ? '0' + days : days;

                const hours = Math.floor((secondsLeft % 86400) / 3600);
                hoursElement.textContent = hours < 10 ? '0' + hours : hours;

                const minutes = Math.floor((secondsLeft % 3600) / 60);
                minutesElement.textContent = minutes < 10 ? '0' + minutes : minutes;

                const seconds = Math.floor(secondsLeft % 60);
                secondsElement.textContent = seconds < 10 ? '0' + seconds : seconds;

                // When timer countdown ends
                if (secondsLeft <= 0) {
                    clearInterval(countdownInterval); // Stop the countdown

                    // Hide the modal when the countdown ends
                    const myModal = new bootstrap.Modal(document.getElementById('staticBackdrop'));
                    myModal.hide(); // Hide the modal
                }
            }

            // Start the countdown
            const countdownInterval = setInterval(updateCountdown, 1000);
        </script>




    </main>
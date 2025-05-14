<style>
    .coffee_Bnner h3 {
        font-size: 1.5rem;
    }

    .coffee_Bnner h4 {
        font-size: 1.2rem;
    }

    .coffee_Bnner {
        background-image: url(https://www.fxcareers.ae/public/lp-assets/images/collab-banner.png);
        background-size: cover;
        background-position: left;
    }

    .slick-prev i,
    .slick-next i {
        font-size: 20px;
    }

    .trade_coffee {
        border-radius: 30px 0px 0px 30px;
        overflow: hidden;
    }

    .slick-prev,
    .slick-next {

        position: absolute;
        bottom: 0%;
        display: block;
        width: 35px;
        height: 35px;
        line-height: 35px;
        padding: 0;
        -webkit-transform: translate(0, -50%);
        -ms-transform: translate(0, -50%);
        transform: translate(0, -50%);
        cursor: pointer;
        color: #fff;
        border: none;
        outline: none;
        background: #f9c311;
        border-radius: 50%;
    }

    .slick-prev {
        right: 70px;
        z-index: 4;
    }

    .slick-next {
        right: 25px;
    }

    .slick-slide::after {
        position: absolute;
        content: '';
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(to top, #00000049, #ffffff00);
    }

    .curri-bx {
        box-shadow: 0px 0px 10px rgb(0 0 0 / 15%);
        border-bottom: 2px solid #f9c311;
        padding: 20px;
        border-radius: 8px;
    }

    .curri-bx ul {
        padding-left: 20px;
    }

    /* .coffee_Bnner::after{
position: absolute;
content: '';
top: 0;
left: 0;
width: 100%;
height: 100%;
background: #fff;
        } */
    .trade_coffee {
        background-image: linear-gradient(#0000007a, #00000073);
    }

    .who-section .it-custom-accordion .accordion-items {
        margin-bottom: 0px;
        border: 0;
        border-bottom: 1px solid #E2E1E1;
        border-radius: 0px;
    }

    .who-section .it-custom-accordion .accordion-buttons {
        font-size: 18px;
        width: 100%;
        font-weight: 600;
        text-align: start;
        padding: 23px 14px;
    }

    .who-section .it-custom-accordion .accordion-buttons:not(.collapsed) {
        /* background-color:  !important; */
        color: #000;
    }

    .who-section .it-custom-accordion .accordion-buttons:not(.collapsed)::after {
        color: #000000;
    }

    .who-section .it-custom-accordion .accordion-body {
        padding: 0px 0px 20px;
    }

    .img-who {
        position: relative;
    }

    .img-who::after {
        content: '';
        position: absolute;
        top: 1px;
        left: 0;
        background: linear-gradient(1deg, #ffffff, 2%, #ffffff, 5%, #00000000);
        width: 100%;
        height: 100%;
    }

    .event-ul {
        list-style: disc;
        color: #fff;
        padding-left: 20px;
    }

    .event-wrapper {
        background: #111111;
        padding: 20px
    }

    .event-details {
        background-repeat: no-repeat;
        background-position: center;
        background-size: cover;
        background-color: #00000000;
        position: relative;
        overflow: hidden;
    }

    .event-details::after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        background-color: #000000db;
        width: 100%;
        height: 100%;
        z-index: 0;
    }

    @media(max-width:991.98px) {
        .trade_coffee {
            border-radius: 0px 0px 0px 0px;
            overflow: hidden;
        }

    }

    @media(max-width:1199.9px) and (min-width:992px) {
        .coffee_Bnner {
            font-size: 2rem;
        }

        .coffee_Bnner h3 {
            font-size: 1.2rem;
        }

        .coffee_Bnner h4 {
            font-size: 1rem;
        }
    }
</style>
<main>
    <section class=" soffee_slider_pagination_mt pb-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-7 align-self-center">

                    <h1 class="mt-4 fw-bold">Trade Over Coffee </h1>
                    <h3 class="text-primary">Master Forex Trading in a Supportive Community </h3>
                    <h5 class=""> FREE Weekly Meetups Every Wednesday | 6 PM - 8 PM
                    </h5>
                    <p>Transform your trading journey through hands-on learning and real-world expertise. Join Dubai's
                        most engaging forex trading community where knowledge meets practice.

                    </p>
                    <button data-bs-toggle="modal" data-bs-target="#staticBackdrop"
                        class="mainthemebutton  mt-3 text-white bg-black">Book your Seat<i
                            class="ri-arrow-right-up-line font-12 ms-2 fw-bold text-black rounded-circle bg-primary"
                            style="    padding: 4px;"></i></button>

                </div>



                <div class="col-lg-5 position-relative ">
                    <div class="swiper-container tradeCoffee">
                        <div class="swiper-wrapper">
                            <!-- Slides -->
                            <div class="swiper-slide pb-0  ">
                                <div class="coffee_slider_radius">

                                    <img src="<?= base_url() ?>public/assets/img/slide-1.jpg" class="img-fluid" alt="">
                                </div>

                            </div>
                            <div class="swiper-slide pb-0  ">
                                <div class="coffee_slider_radius">

                                    <img src="<?= base_url() ?>public/assets/img/slide-2.jpg" class="img-fluid" alt="">
                                </div>

                            </div>
                            <div class="swiper-slide pb-0  ">
                                <div class="coffee_slider_radius">

                                    <img src="<?= base_url() ?>public/assets/img/slide-3.jpg" class="img-fluid" alt="">
                                </div>

                            </div>

                        </div>

                        <!-- Pagination dots -->
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="What_coffee pt-80">
        <div class="container ">
            <div class="row justify-content-center">
                <div class="col-lg-10 text-center">
                    <h2 class="it-section-title">What Makes Trade Over Coffee
                        Special?</h2>
                    <p>Learn in a relaxed, collaborative environment where every question matters. Our bi-weekly
                        sessions combine structured learning with practical application, helping you build
                        confidence in your trading decisions.</p>
                </div>
            </div>
        </div>
    </section>
    <section class="who-section pb-0 pt-0">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-5 text-center align-self-center">
                    <div class="img-who">
                        <img src="<?= base_url() ?>public/assets/img/coffee.png" alt="" class="img-fluid">
                    </div>
                </div>
                <div class="col-lg-7 align-self-center">
                    <h2 class="it-section-title ">Your Trading Journey Starts Here</h2>
                    <p>We've designed an experience that delivers value to traders at every level</p>
                    <div class="accordion " id="accordionJourney">
                        <!-- FAQ Item 2 -->
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    For Beginners:
                                    <span class="icon-plus">+</span>
                                    <span class="icon-minus">-</span>
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse"
                                data-bs-parent="#accordionJourney">
                                <div class="accordion-body">
                                    <ul>
                                        <li>Foundation-building sessions covering forex fundamentals</li>
                                        <li>Step-by-step guidance from experienced mentors</li>
                                        <li>Risk management strategies for new traders</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    For Intermediate Traders:
                                    <span class="icon-plus">+</span>
                                    <span class="icon-minus">-</span>
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <ul>
                                        <li>Advanced technical analysis workshops</li>
                                        <li>Strategy refinement and optimization</li>
                                        <li>Portfolio management techniques</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                    For Advanced Traders:
                                    <span class="icon-plus">+</span>
                                    <span class="icon-minus">-</span>
                                </button>
                            </h2>
                            <div id="collapseFour" class="accordion-collapse collapse"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <ul>
                                        <li>High-level market analysis discussions</li>
                                        <li>Networking with fellow experienced traders</li>
                                        <li>Opportunity to share insights and mentor others</li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </section>

    <section class="pb-80 ">
        <div class="container">
            <div class="row justify-content-center mb-4">
                <div class="col-lg-10 text-center">
                    <h2 class="it-section-title">What You'll Experience</h2>
                </div>
            </div>
            <div class="row g-4 justify-content-center">
                <div class="col-lg-4 col-md-6">
                    <div class="curri-bx h-100">
                        <img src="<?= base_url() ?>public/assets/img/Experience_1.png" width="60px" alt="">
                        <h5 class="fw-semibold pt-3 pb-2">Professional Development</h5>
                        <ul class="pointers-ul">
                            <li>Real-time market analysis and trading opportunities</li>
                            <li>Personalized feedback on your trading strategies</li>
                            <li>Access to proven trading frameworks and methods</li>

                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="curri-bx h-100">
                        <img src="<?= base_url() ?>public/assets/img/Experience_2.png " width="60px" alt="">
                        <h5 class="fw-semibold pt-3 pb-2">Community
                            Benefits</h5>
                        <ul class="pointers-ul">
                            <li>Connect with ambitious, like-minded traders</li>
                            <li>Share experiences and learn from others' journeys</li>
                            <li>Build lasting professional relationships</li>

                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="curri-bx h-100">
                        <img src="<?= base_url() ?>public/assets/img/Experience_3.png " width="60px" alt="">
                        <h5 class="fw-semibold pt-3 pb-2">Expert
                            Guidance</h5>
                        <ul class="pointers-ul">
                            <li>Direct interaction with seasoned forex traders</li>
                            <li>Personalized mentoring opportunities</li>
                            <li>Access to advanced trading resources</li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="pt-120 pb-120 why_choose" id="formSec">
        <div class="container ">

            <div class="row g-4 mt-3 position-relative z-1">
                <div class="col-lg-6 align-self-center">
                    <h2 class=" text-primary mt-4">Event Details</h2>
                    <h5 class=" text-white"><img src="<?= base_url() ?>public/assets/img/map.png" alt=""> Location</h5>
                    <ul class="list-inline  mt-3">
                        <li class=" ">
                            <p class=" text-white">Latifa Tower - Office No. B-3207, 32nd Floor
                                -
                                Sheikh Zayed Rd - opposite Museum of The Future - Trade Centre 1
                                -
                                Dubai - United Arab Emirates</p>
                        </li>
                    </ul>
                    <h5 class="text-white my-4"><img src="<?= base_url() ?>public/assets/img/schedule.png" alt="">
                        Schedule</h5>
                    <ul class="list-inline">
                        <li>
                            <p class=" text-white mb-0 "><i class="ri-check-double-line text-primary me-2 fs-5"></i>
                                Every Wednesday</p>
                        </li>
                        <li>
                            <p class=" text-white mb-0"> <i class="ri-check-double-line text-primary me-2 fs-5"></i>
                                Doors open at 5:45 PM</p>

                        </li>
                        <li>
                            <p class=" text-white mb-0 "><i class="ri-check-double-line text-primary me-2 fs-5"></i>
                                6:00 PM - 8:00 PM</p>
                        </li>
                    </ul>
                    <h5 class=" text-white my-3"><img src="<?= base_url() ?>public/assets/img/want_to_bring.png"
                            width="40px" alt="">What to
                        Bring:</h5>
                    <ul class="list-inline">
                        <li class="d-flex gap-1 align-items-center ">
                            <p class=" text-white mb-0"><i
                                    class="ri-check-double-line text-primary me-2 fs-5"></i>Laptop or tablet
                                (recommended)</p>
                        </li>
                        <li class="d-flex gap-1 align-items-center  ">

                            <p class=" text-white mb-0"><i
                                    class="ri-check-double-line text-primary me-2 fs-5"></i>Trading journal or notebook
                            </p>
                        </li>
                        <li class="d-flex gap-1 align-items-center  ">
                            <p class=" text-white mb-0"><i class="ri-check-double-line text-primary me-2 fs-5"></i>Your
                                questions and trading challenges</p>

                        </li>
                    </ul>
                </div>

                <div class="col-lg-6">
                    <img src="<?= base_url() ?>public/assets/img/coffee_with_trade.png" class="img-fluid" alt="">
                </div>

            </div>

        </div>
    </section>

    <section class="faq ">
        <div class="container">
            <div class="row">

                <div class="row mt-5">
                    <div class="col-lg-12 mx-auto">
                        <h2 class="gradient-text"> <span class="afterifmg">Frequently </span>Asked Questions</h2>
                        <div class="accordion " id="accordionExample">
                            <!-- FAQ Item 1 -->
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        Is this event really free?
                                        <span class="icon-plus">+</span>
                                        <span class="icon-minus">-</span>
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse show"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">

                                        Yes, absolutely! We believe in building a community where knowledge is shared
                                        freely.
                                    </div>
                                </div>
                            </div>

                            <!-- FAQ Item 2 -->
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        Do I need trading experience?
                                        <span class="icon-plus">+</span>
                                        <span class="icon-minus">-</span>
                                    </button>
                                </h2>
                                <div id="collapseTwo" class="accordion-collapse collapse"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">

                                        Not at all. We welcome traders of all experience levels and provide appropriate
                                        guidance for each.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseThree" aria-expanded="false"
                                        aria-controls="collapseThree">
                                        Can I join mid-month?
                                        <span class="icon-plus">+</span>
                                        <span class="icon-minus">-</span>
                                    </button>
                                </h2>
                                <div id="collapseThree" class="accordion-collapse collapse"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        Of course! Each session is structured to provide value whether you're a
                                        first-timer
                                        or regular attendee.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseFour" aria-expanded="false"
                                        aria-controls="collapseFour">
                                        Are there additional learning opportunities?

                                        <span class="icon-plus">+</span>
                                        <span class="icon-minus">-</span>
                                    </button>
                                </h2>
                                <div id="collapseFour" class="accordion-collapse collapse"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        Yes! We offer premium forex trading courses for those looking to dive deeper.
                                        Learn
                                        more at our sessions.
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
    </section>

</main>

<script>
    var blogswiper = new Swiper(".blogswiper", {
        slidesPerView: 1,
        spaceBetween: 20,
        loop: true,
        autoplay: {
            delay: 2000, // 3 seconds delay between slides
            disableOnInteraction: false, // continues autoplay after user interaction
            pauseOnMouseEnter: true, // pauses on hover
        },
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        breakpoints: {
            640: {
                slidesPerView: 1,
            },
            1024: {
                slidesPerView: 1,
            }
        }
    });
</script>

<div class="modal job_popup seminar fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header justify-content-between border-0">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Fill out the form below!</h1>
                <button type="button" class="mdl-close-btn " data-bs-dismiss="modal" aria-label="Close"><i
                        class="ri-close-large-line"></i></button>
            </div>
            <div class="modal-body">
                <div class="container seminar">

                    <form action="<?= base_url() ?>website/submit_event_data" method="POST">
                        <div class="row">
                            <input type="hidden" class="form-control" name="event_name" id="event_name"
                                value="Trade-Over-Coffee">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">First Name*</label>
                                    <input type="text" class="form-control" name="firstname" id="firstname"
                                        aria-describedby="helpId" placeholder="Enter Your First Name" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">Last Name*</label>
                                    <input type="text" class="form-control" name="lastname" id="lastname"
                                        aria-describedby="helpId" placeholder="Enter Your Last Name" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">Email*</label>
                                    <input type="email" class="form-control" name="email" id="email"
                                        aria-describedby="helpId" placeholder="Enter Your Email Address" />

                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">Mobile*</label>
                                    <input type="number" class="form-control" name="mobile_no" id="mobile_no"
                                        aria-describedby="helpId" placeholder="Enter Your Mobile Number" />
                                </div>
                            </div>

                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <button type="submit" class="mainthemebutton py-3 w-100 text-center fs-bold">
                                    Submit
                                    <span><img src="<?= base_url() ?>public/assets/img/form_btn_icon.png" width="30px"
                                            alt=""></span>
                                </button>
                            </div>
                        </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>

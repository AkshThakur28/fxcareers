<style>
    section {
        padding: 70px 0px;
    }

    .colab_banner {
        padding-top: 50px;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        position: relative;
        background: #000;
        overflow: hidden;
    }

    .logos-boxes {
        background: #181818;
        border-radius: 8px;
        border: 2px solid #3b3b3b;
        padding: 8px 15px;
        width: fit-content;
    }

    /* 
        .colab_banner::after {
            content: '';
            width: 100%;
            height: 100%;
            position: absolute;
            top: 0px;
            left: 0px;
            background: #ffffffb3;
            z-index: 0;
        } */


    .fw-500 {
        font-weight: 500;
    }

    .z-2 {
        z-index: 2;
    }

    .btn-default {
        color: #fff;
        font-size: 18px;
        font-weight: 600;
        text-align: center;
        display: inline-block;
        padding: 10px 20px !important;
        border-radius: 5px;
        background: #f9c311;
        text-decoration: none;
        transition: 0.4s;
        height: auto !important;
        line-height: normal !important;
    }

    .bg-back-shadow {
        background-image: linear-gradient(90deg, #0f172b, #f9c31124 47.15%, #0f172b);
        position: absolute;
        inset: 0;
        z-index: -1;
        background-size: 400% 400%;
        background-repeat: no-repeat;
        background-position: center;
        border-radius: 50%;
        filter: blur(50px);
    }

    .company-bx {
        box-shadow: 0px 0px 10px rgb(0 0 0 / 15%);
        border-bottom: 2px solid #f7c215;
        border-radius: 8px;
        padding: 30px;
        height: 100%;
        overflow: hidden;

    }

    .who-can {
        border-radius: 8px;
        border: 2px dashed #f9c311;
        padding: 15px;
    }

    @-webkit-keyframes scroll {
        0% {
            -webkit-transform: translateX(0);
            transform: translateX(0);
        }

        100% {
            -webkit-transform: translateX(calc(-250px * 7));
            transform: translateX(calc(-250px * 7));
        }
    }

    @keyframes scroll {
        0% {
            -webkit-transform: translateX(0);
            transform: translateX(0);
        }

        100% {
            -webkit-transform: translateX(calc(-250px * 7));
            transform: translateX(calc(-250px * 7));
        }
    }

    .slider {

        height: 100px;
        margin: auto;
        overflow: hidden;
        position: relative;

    }


    .slider::before,
    .slider::after {
        background: linear-gradient(to right, white 0%, rgba(255, 255, 255, 0) 100%);
        content: "";
        height: 100px;
        position: absolute;
        width: 200px;
        z-index: 2;
    }

    .slider::after {
        right: 0;
        top: 0;
        -webkit-transform: rotateZ(180deg);
        transform: rotateZ(180deg);
    }

    .slider::before {
        left: 0;
        top: 0;
    }

    .slider .slide-track {
        -webkit-animation: scroll 40s linear infinite;
        animation: scroll 40s linear infinite;
        display: flex;
        width: calc(250px * 14);
    }

    .slider .slide {
        height: 100px;
        width: 150px;
    }

    .slide img {
        height: 80px;
    }

    .slider .slide2 {
        height: 100px !important;
        width: 150px !important;
    }

    .slide2 img {
        object-fit: contain;
        height: 100px;
        width: 90px;
        border-radius: 0.6rem;
        background: #fff;
        padding: .4rem;
    }

    p {
        font-size: 16px !important;
    }

    .steps-design {
        padding-left: 3.6rem;
    }

    .steps-design::before {
        height: 88%;
        left: 20px;
    }

    .steps-design::before {
        position: absolute;
        content: '';
        height: 78%;
        border-left: 2px dashed #f1e2b3;
        top: 12px;
        left: 19px;
        z-index: -1;
    }

    .steps-design li::before {
        position: absolute;
        content: "\ED49";
        font-family: 'remixicon' !important;
        color: #fac211;
        left: -3rem;
        top: 0;
        font-size: 1.4rem;
        line-height: 1.3;
        z-index: 2;
    }

    .pointers-ul {
        padding-left: 20px;
    }

    .pointers-ul li {
        list-style: disc;
    }

    .curri-bx {
        box-shadow: 0px 0px 10px rgb(0 0 0 / 15%);
        border-bottom: 2px solid #f9c311;
        padding: 20px;
        border-radius: 8px;
    }

    .mentor {
        padding: 0px;
        border: 5px solid #f9c311;
        border-radius: 50%;
        width: fit-content;
        margin: 0px auto;
        overflow: hidden;
        width: 200px;
    }

    .terms .accordion-header .accordion-button {
        font-size: 1.2rem;
        font-weight: 600;
        color: #000000;
        padding: 28px 15px !important;
    }

    .terms .accordion-button:not(.collapsed) {
        box-shadow: none;
        background: #fff;
    }

    .terms ul {
        padding-left: 20px;
    }

    .terms ul li {
        list-style: disc !important;
        padding-bottom: 10px;
    }

    .terms .accordion-item {
        border: 0;
        border-bottom: 1px solid #ddd;
    }

    .terms .accordion-button:focus {
        z-index: 3;
        border-color: #fff;
        outline: 0;
        box-shadow: none;
    }
</style>
<main>


    <section class="colab_banner  "
        style="background-image: url('http://localhost:80/fxcareers/public/lp-assets/images/bgg-2.png');">
        <div class="container position-relative z-2">
            <div class="row g-4 align-items-center">
                <div class="col-lg-6  ">
                    <div class="banner_text ">
                        <h2 class="text-white">Master <span class="text-primary"> Forex Trading </span>in Dubai
                        </h2>
                        <h4 class="mt-4 text-white ">KHDA-Certified Professional Trading Course by YaMarkets &amp;
                            FxCareers UAE</h4>
                        <div class="logos-boxes mt-4 d-flex gap-sm-4 gap-2 align-items-center  text-center">
                            <img src="<?= base_url() ?>public/assets/img/logo_light.svg" width="120px" class="img-fluid"
                                alt="">
                            <h2 class="text-white">&amp;</h2> <img
                                src="https://www.yamarkets.com/public/web/img/logo.png" width="150px" class="img-fluid "
                                alt="">
                        </div>

                        <div class="mt-5">

                            <a href="#form-Sec" class="banner_btn_1 ">Register now <i
                                    class="ri-arrow-right-up-line fw-bold bg-warning rounded-circle"
                                    style="padding: 4px;font-size: 12px;"></i></a>
                        </div>

                    </div>
                </div>
                <div class="col-lg-6 text-center position-relative">
                    <div class="bg-back-shadow "></div>
                    <img src="<?= base_url() ?>public/assets/img/colab-banner-right.png" alt="" class="img-fluid w-100">
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10  mb-5 text-center">
                    <h2>Expert Training Partnership</h2>
                </div>
            </div>
            <div class="row g-4">
                <div class="col-lg-6">
                    <div class="company-bx text-center">
                        <img src="<?= base_url() ?>public/assets/img/logo_light.svg" width="110px" alt="Logo">
                        <h3 class="fw-semibold mt-4">FxCareers Specialized Development</h3>
                        <p>Develop the right trading mindset and discipline with FxCareers' specialized career
                            training. Build emotional and psychological strength needed for volatile markets while
                            mastering practical trading skills.</p>
                        <div class="slider mt-4">
                            <div class="slide-track">
                                <div class="slide">
                                    <img src="img/awards/awards1.webp" alt="">
                                </div>
                                <div class="slide">
                                    <img src="https://www.fxcareers.ae/public/web/assets/img/awards/awards2.webp"
                                        alt="">
                                </div>
                                <div class="slide">
                                    <img src="<?= base_url() ?>public/assets/img/awards/awards3.webp" alt="">
                                </div>
                                <div class="slide">
                                    <img src="<?= base_url() ?>public/assets/img/awards/awards4.webp" alt="">
                                </div>
                                <div class="slide">
                                    <img src="<?= base_url() ?>public/assets/img/awards/awards5.webp" alt="">
                                </div>
                                <div class="slide">
                                    <img src="<?= base_url() ?>public/assets/img/awards/awards6.webp" alt="">
                                </div>
                                <div class="slide">
                                    <img src="<?= base_url() ?>public/assets/img/awards/awards1.webp" alt="">
                                </div>
                                <div class="slide">
                                    <img src="<?= base_url() ?>public/assets/img/awards/awards2.webp" alt="">
                                </div>
                                <div class="slide">
                                    <img src="<?= base_url() ?>public/assets/img/awards/awards3.webp" alt="">
                                </div>
                                <div class="slide">
                                    <img src="<?= base_url() ?>public/assets/img/awards/awards4.webp" alt="">
                                </div>
                                <div class="slide">
                                    <img src="<?= base_url() ?>public/assets/img/awards/awards5.webp" alt="">
                                </div>
                                <div class="slide">
                                    <img src="<?= base_url() ?>public/assets/img/awards/awards6.webp" alt="">
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="company-bx text-center">
                        <img src="<?= base_url() ?>public/assets/img/yamarket_logo_dark.png" alt="" class=""
                            width="170px">
                        <h3 class="fw-semibold mt-4">YaMarkets Training Excellence</h3>
                        <p>Gain deep knowledge in market analysis, trading strategies, and risk management from
                            YaMarkets' industry leaders. Benefit from years of expertise in forex and financial
                            markets with hands-on training focused on market trends and informed decision-making.
                        </p>
                        <div class="slider mt-4">
                            <div class="slide-track">
                                <div class="slide slide2">
                                    <img src="https://www.yamarkets.com/public/web/img/landing-page/certificates/01-img.png"
                                        alt="">
                                </div>
                                <div class="slide slide2">
                                    <img src="https://www.yamarkets.com/public/web/img/landing-page/certificates/02-img.png"
                                        alt="">
                                </div>
                                <div class="slide slide2">
                                    <img src="https://www.yamarkets.com/public/web/img/landing-page/certificates/03-img.png"
                                        alt="">
                                </div>
                                <div class="slide slide2">
                                    <img src="https://www.yamarkets.com/public/web/img/landing-page/certificates/04-img.png"
                                        alt="">
                                </div>
                                <div class="slide slide2">
                                    <img src="https://www.yamarkets.com/public/web/img/landing-page/certificates/05-img.png"
                                        alt="">
                                </div>
                                <div class="slide slide2">
                                    <img src="https://www.yamarkets.com/public/web/img/landing-page/certificates/06-img.png"
                                        alt="">
                                </div>
                                <div class="slide slide2">
                                    <img src="https://www.yamarkets.com/public/web/img/landing-page/certificates/01-img.png"
                                        alt="">
                                </div>
                                <div class="slide slide2">
                                    <img src="https://www.yamarkets.com/public/web/img/landing-page/certificates/02-img.png"
                                        alt="">
                                </div>
                                <div class="slide slide2">
                                    <img src="https://www.yamarkets.com/public/web/img/landing-page/certificates/03-img.png"
                                        alt="">
                                </div>
                                <div class="slide slide2">
                                    <img src="https://www.yamarkets.com/public/web/img/landing-page/certificates/04-img.png"
                                        alt="">
                                </div>
                                <div class="slide slide2">
                                    <img src="https://www.yamarkets.com/public/web/img/landing-page/certificates/05-img.png"
                                        alt="">
                                </div>
                                <div class="slide slide2">
                                    <img src="https://www.yamarkets.com/public/web/img/landing-page/certificates/06-img.png"
                                        alt="">
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="pt-0">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10  mb-5 text-center">
                    <h2>Premium Benefits Package</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 align-self-center">

                    <ul class="list-unstyled d-grid gap-4 gap-lg-4 position-relative steps-design">
                        <li class="position-relative wow fadeInRight" data-wow-delay="100ms">
                            <h3 class="fw-semibold">Complete Trading Education</h3>
                            <p class="mb-0">Get comprehensive forex training with live trading sessions and
                                practical experience</p>
                        </li>
                        <li class="position-relative wow fadeInRight" data-wow-delay="200ms">
                            <h3 class="fw-semibold">AED 10,000 Tradable Bonus</h3>
                            <p class="mb-0">Trade in live markets and withdraw your profits with our special trading
                                account</p>
                        </li>
                        <li class="position-relative wow fadeInRight" data-wow-delay="300ms">
                            <h3 class="fw-semibold">Premium Trading Tools</h3>
                            <p class="mb-0">6 months free access to FX Signals premium trading platform worth AED
                                3,000</p>
                        </li>
                        <li class="position-relative wow fadeInRight" data-wow-delay="400ms">
                            <h3 class="fw-semibold">Funded Trading Program</h3>
                            <p class="mb-0">Special training for funded trader challenge with two free challenge
                                attempts</p>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-6 text-center position-relative">
                    <div class="bg-back-shadow"></div>
                    <img src="<?= base_url() ?>public/assets/img/Tradable-Bonus.png" alt="" class="w-75 img-fluid">
                </div>
            </div>
        </div>
    </section>
    <section class="pt-0">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10  mb-5 text-center">
                    <h2>Comprehensive Curriculum</h2>
                </div>
            </div>
            <div class="row g-4">
                <div class="col-lg-6 col-md-6">
                    <div class="curri-bx">
                        <h3 class="fw-semibold d-flex align-items-center gap-2 mt-3"><img
                                src="<?= base_url() ?>public/assets/img/colab_1_financial.png" alt="">Financial Market
                            Analysis</h3>
                        <ul class="pointers-ul">
                            <li>Master price charts and technical indicators</li>
                            <li>Understand multiple timeframe analysis</li>
                            <li>Learn volume and price action trading</li>
                            <li>Track and assess market conditions
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="curri-bx">
                        <h3 class="fw-semibold d-flex align-items-center gap-2 mt-3"><img
                                src="<?= base_url() ?>public/assets/img/colab_2_market.png" alt="">Market Trend Analysis
                        </h3>
                        <ul class="pointers-ul">
                            <li>Identify and confirm market trends</li>
                            <li>Master chart patterns and formations</li>
                            <li>Understand trend reversals and continuations</li>
                            <li>Use trendlines and moving averages effectively</li>


                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="curri-bx">
                        <h3 class="fw-semibold d-flex align-items-center gap-2"><img
                                src="<?= base_url() ?>public/assets/img/colab_3_risk.png" alt="">Risk
                            Management</h3>
                        <ul class="pointers-ul">
                            <li>Calculate risk-to-reward ratios</li>
                            <li>Set effective stop-losses and take-profits</li>
                            <li>Determine optimal position sizing</li>
                            <li>Manage multiple trade positions</li>

                        </ul>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6">
                    <div class="curri-bx">
                        <h3 class="fw-semibold d-flex align-items-center gap-2"><img
                                src="<?= base_url() ?>public/assets/img/colab_4_platform.png" alt="">Trading Platform
                            Mastery</h3>
                        <ul class="pointers-ul">
                            <li>Navigate MetaTrader 4/5 efficiently</li>
                            <li>Execute various order types</li>
                            <li>Use built-in analysis tools</li>
                            <li>Track and analyze trading performance</li>


                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10  mb-5 text-center">
                    <h2 class="mb-5">Meet Our Mentors</h2>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mentor">
                                <img src="<?= base_url() ?>public/assets/img/Sandesh_Nandode.jpeg" alt="" class="w-100">
                            </div>
                            <h4 class="text-primary fw-semibold mt-3">Mr. Sandesh Nandode</h4>
                            <p class="fw-semibold mb-2">COO and Chief Mentor at FXCareers UAE.</p>
                            <p>23+ years of trading expertise, SEBI-registered analyst, and a leader in forex &amp;
                                crypto education.</p>
                        </div>
                        <div class="col-md-6">
                            <div class="mentor">
                                <img src="<?= base_url() ?>public/assets/img/naseef.jpg" alt="" class="w-100">
                            </div>
                            <h4 class="text-primary fw-semibold mt-3">Mr. Naseef Mohammad</h4>
                            <p class="fw-semibold mb-2">Forex Trading Specialist</p>
                            <p>4+ year experience, expert in Smart Money Concepts and disciplined trading
                                strategies.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="pt-0">
        <div class="container">
            <div class="row justify-content-center ">
                <div class="col-md-12 ">
                    <div class="claim p-4 py-5" style="background: #F8F6F1;">
                        <div class="row justify-content-center">
                            <div class="col-md-10 text-center">
                                <h4 class="text-primary"> Limited-Time Offer </h4>
                                <h2 class="mb-3">Start Your Forex Journey Today!</h2>

                                <p class="mb-2"><strong>Free Course</strong> with YaMarkets account opening.</p>
                                <p><strong>Dhs 10,000 Bonus</strong> + Funded Challenge Support via FXCareers.</p>
                                <a href="https://www.yamarkets.com/" class="btn-default mt-4 "> Open Yamarkets
                                    Account</a>
                                <a href="https://www.fxcareers.ae/" class="btn-default mt-4 "> Enroll with
                                    FXCareers</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <section class="pt-0">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10 text-center">
                    <h2 class="mb-5">Who Should Join?</h2>
                </div>
            </div>
            <div class="row  g-4">
                <div class="col-md-6">
                    <div class=" who-can d-flex align-items-center gap-4">
                        <img src="<?= base_url() ?>public/assets/img/new-trader.png" alt="" height="64px">
                        <div>
                            <h4 class="fw-semibold">New Traders</h4>
                            <p class="mb-0">Perfect for beginners wanting to learn trading fundamentals</p>
                        </div>
                    </div>


                </div>
                <div class="col-md-6">
                    <div class="  who-can d-flex align-items-center gap-4">
                        <img src="<?= base_url() ?>public/assets/img/financial-experts.png" alt="" height="64px">
                        <div>
                            <h4 class="fw-semibold">Finance Professionals</h4>
                            <p class="mb-0">Expand your knowledge and trading capabilities</p>
                        </div>
                    </div>


                </div>
                <div class="col-md-6">
                    <div class=" who-can d-flex align-items-center gap-4">
                        <img src="<?= base_url() ?>public/assets/img/student.png" alt="">
                        <div>
                            <h4 class="fw-semibold">Students</h4>
                            <p class="mb-0">Build your financial markets expertise early</p>
                        </div>
                    </div>

                </div>
                <div class="col-md-6">
                    <div class=" who-can d-flex align-items-center gap-4">
                        <img src="<?= base_url() ?>public/assets/img/experienced-trader.png" alt="" height="64px">
                        <div>
                            <h4 class="fw-semibold">Experienced Traders</h4>
                            <p class="mb-0">Refine your strategies and enhance performance</p>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </section>
    <section class="pt-0">
        <div class="container">
            <div class="row justify-content-center ">
                <div class="col-md-12 ">
                    <div class="claim p-4 py-5" style="background: #F8F6F1;">
                        <div class="row justify-content-center">
                            <div class="col-md-10 text-center">
                                <h2 class="mb-3">Masterclass Offer</h2>
                                <h4 class="mb-2">Pay <strong>AED 10,000</strong> and receive a Forex Trading Account
                                    with <strong>AED 10,000</strong> tradable bonus</h4>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>



    <section class="faq ">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="head text-center">
                        <h2 class="gradient-text"> <span class="afterifmg">Frequently </span>Asked Questions</h2>
                    </div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-lg-12 mx-auto">
                    <div class="accordion " id="accordionExample">
                        <!-- FAQ Item 1 -->
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    What certifications does your trading course have?
                                    <span class="icon-plus">+</span>
                                    <span class="icon-minus">-</span>
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    Our forex trading course is KHDA-certified, ensuring you receive internationally
                                    recognized education that meets Dubai's high educational standards.
                                </div>
                            </div>
                        </div>

                        <!-- FAQ Item 2 -->
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    How are the live demo trading sessions conducted?
                                    <span class="icon-plus">+</span>
                                    <span class="icon-minus">-</span>
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    Sessions are conducted online with limited seats to ensure personalized attention.
                                    You'll trade in a simulated environment that mirrors real market conditions while
                                    receiving expert guidance.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    Can I withdraw profits from the AED 10,000 tradable bonus account?
                                    <span class="icon-plus">+</span>
                                    <span class="icon-minus">-</span>
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    Yes, all profits generated from trading with the AED 10,000 bonus account can be
                                    withdrawn. However, the initial bonus amount cannot be withdrawn.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                    What is included in the funded trader program?

                                    <span class="icon-plus">+</span>
                                    <span class="icon-minus">-</span>
                                </button>
                            </h2>
                            <div id="collapseFour" class="accordion-collapse collapse"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    The program includes specialized training for passing funded trader challenges, two
                                    free challenge attempts, and continuous support. Upon successful completion, you'll
                                    receive a real trading account with profit-sharing opportunities.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                    How long do I get support after completing the course?
                                    </span>
                                    <span class="icon-plus">+</span>
                                    <span class="icon-minus">-</span>
                                </button>
                            </h2>
                            <div id="collapseFive" class="accordion-collapse collapse"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    We provide lifetime support to all our students, including regular revision sessions
                                    and ongoing mentorship to help you succeed in your trading journey.
                                    <span class="icon-plus">+
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                    Do I need any prior trading experience?
                                    <span class="icon-plus">+</span>
                                    <span class="icon-minus">-</span>
                                </button>
                            </h2>
                            <div id="collapseSix" class="accordion-collapse collapse"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    No, our course is designed for both beginners and experienced traders. We start with
                                    forex fundamentals and progress to advanced trading strategies, ensuring everyone
                                    can follow along and learn effectively.
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>


    <section id="form-Sec" class=" pt-80 pb-80 " style="background: #F8F6F1;">
        <div class="container">
            <div class="row justify-content-center">

                <div class="col-lg-6">
                    <div class="mt-4">
                        <div class="text-center">
                            <img src="https://www.fxcareers.ae/public/web/assets/img/logo/logo.png" width="150px"
                                alt="Logo">
                            <h3 class="py-3 text-center title">Fill in the information</h3>
                        </div>
                        <div class="">
                            <form action="<?= base_url() ?>website/submit_event_data" method="POST">
                                <div class="row g-4 justify-content-center">
                                    <input type="hidden" name="event_name" id="name" value="Collaboration" required>
                                    <div class="col-md-6">
                                        <label for="">First Name *</label>
                                        <input type="text" name="firstname" id="name" placeholder="Enter your firstname"
                                            class="form-control" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Last Name *</label>
                                        <input type="text" name="lastname" id="name" placeholder="Enter your lastname"
                                            class="form-control" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Email *</label>
                                        <input type="email" name="email" id="email" placeholder="Enter your email"
                                            class="form-control" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Mobile Number *</label>
                                        <input type="text" name="mobile_no" id="mobile" placeholder="Enter your mobile"
                                            class="form-control" required>
                                    </div>

                                    <div class="col-lg-12  mt-5 pb-4">
                                        <button class="btn-default d-block w-100 border-0 " type="submit"
                                            name="submit">Submit <i class="ps-2 ri-arrow-right-line"></i></button>

                                    </div>
                                </div>

                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <main>
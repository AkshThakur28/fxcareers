<main>
    <section class="banner bg-black position-relative">
        <!-- Banner Shape 1 -->
        <img src="<?= base_url() ?>public/assets/img/banner_shape.svg" class="bannershape z-1" alt="">

        <!-- Banner Content -->
        <div class="container z-2 position-relative">
            <div class="row">
                <div class="col-lg-6 align-self-center">
                    <div class="banner_right">
                        <h1 class="text-white">Welcome to <br class="d-md-none d-block"> <span>F</span><span
                                id="element"></span> </h1>
                        <h6 class="py-3">Join a leading team in the financial sector and build your career with
                            top-notch professionals.</h6>
                        <ul class="list-inline d-lg-flex pb-3">
                            <li class="me-2 mb-2">
                                <span><img src="<?= base_url() ?>public/assets/img/banner_tick.svg" alt=""></span>
                                <span>Program For Everyone</span>
                            </li>
                            <li class="me-2 mb-2">
                                <span><img src="<?= base_url() ?>public/assets/img/banner_tick.svg" alt=""></span>
                                <span>Learn From the Best</span>
                            </li>
                            <li class="me-2 mb-2">
                                <span><img src="<?= base_url() ?>public/assets/img/banner_tick.svg" alt=""></span>
                                <span>Trade Like a Pro</span>
                            </li>
                        </ul>
                        <div class="banner_btn_Group">
                            <a href="<?= base_url("courses") ?>" class="banner_btn_1">Explore Courses <i
                                    class="ri-arrow-right-up-line fw-bold bg-warning rounded-circle"
                                    style="padding: 4px;font-size: 12px;"></i></a>
                            <a href="tel:+971503056430"
                                class="btn btn-trainsparent border border-white text-white banner_btn_2">Book a
                                Call</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 position-relative">
                    <div class="banner_img  text-center ">
                        <img src="<?= base_url() ?>public/assets/img/banner_img.png" class="img-fluid " alt="" />
                    </div>
                    <div class="banner_circle ">
                        <img src="<?= base_url() ?>public/assets/img/banner_circle.png" class="img-fluid  " alt="" />
                    </div>
                </div>
            </div>
        </div>

        <!-- Banner Shape 2 -->
        <img src="<?= base_url() ?>public/assets/img/banner_shape_2.svg" class="bannershape2 z-1" alt="">
    </section>

    <section class="p-0">
        <!-- TradingView Widget BEGIN -->
        <div class="tradingview-widget-container">
            <div class="tradingview-widget-container__widget"></div>
            <script type="text/javascript"
                src="https://s3.tradingview.com/external-embedding/embed-widget-ticker-tape.js" async>
                    {
                        "symbols": [
                            {
                                "proName": "FOREXCOM:SPXUSD",
                                "title": "S&P 500 Index"
                            },
                            {
                                "proName": "FOREXCOM:NSXUSD",
                                "title": "US 100 Cash CFD"
                            },
                            {
                                "proName": "FX_IDC:EURUSD",
                                "title": "EUR to USD"
                            },
                            {
                                "proName": "BITSTAMP:BTCUSD",
                                "title": "Bitcoin"
                            },
                            {
                                "proName": "BITSTAMP:ETHUSD",
                                "title": "Ethereum"
                            }
                        ],
                            "showSymbolLogo": true,
                                "isTransparent": false,
                                    "displayMode": "adaptive",
                                        "colorTheme": "light",
                                            "locale": "en"
                    }
                </script>
        </div>
        <!-- TradingView Widget END -->
    </section>

    <section class="steps d-md-block d-none">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="heada text-center">
                        <h2>Progress Through <span class="text-primary">Every Stage</span></h2>
                        <p>Your Roadmap to Trading Excellence</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-2 col-md-4 ">
                    <div class="steps_box text-center ">
                        <img src="<?= base_url() ?>public/assets/img/step1.png" class="img-fluid stepimg active" alt="">
                        <div class="stepdisc position-relative">
                            <div class="displaybox">
                                <h5>Foundation <br> stage</h5>
                            </div>
                            <div class="hide_box position-absolute top-0 bg-white active">
                                <h5 class="fw-bold">Foundation stage</h5>
                                <p class="">Learn the basics of Forex trading and build a strong foundation for your
                                    trading journey.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 ">
                    <div class="steps_box text-center">
                        <img src="<?= base_url() ?>public/assets/img/step2.png" class="img-fluid stepimg" alt="">
                        <div class="stepdisc position-relative">
                            <div class="displaybox">
                                <h5>Skill <br>Development</h5>
                            </div>
                            <div class="hide_box position-absolute top-0 bg-white">
                                <h5 class="fw-bold">Skill Development</h5>
                                <p class="">Enhance your trading expertise with advanced strategies and hands-on
                                    practice for market success.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 ">
                    <div class="steps_box text-center">
                        <img src="<?= base_url() ?>public/assets/img/step3.png" class="img-fluid stepimg" alt="">
                        <div class="stepdisc position-relative">
                            <div class="displaybox">
                                <h5>Practical <br>Training</h5>
                            </div>
                            <div class="hide_box position-absolute top-0 bg-white">
                                <h5 class="fw-bold">Practical Training</h5>
                                <p class="">Apply your knowledge in real-world scenarios with hands-on training and live
                                    market simulations</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 ">
                    <div class="steps_box text-center">
                        <img src="<?= base_url() ?>public/assets/img/step4.png" class="img-fluid stepimg" alt="">
                        <div class="stepdisc position-relative">
                            <div class="displaybox">
                                <h5>Advance <br>Learning</h5>
                            </div>
                            <div class="hide_box position-absolute top-0 bg-white">
                                <h5 class="fw-bold">Advance Learning</h5>
                                <p class="">Refine your skills with in-depth strategies and expert insights to excel in
                                    complex market scenarios.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 ">
                    <div class="steps_box text-center">
                        <img src="<?= base_url() ?>public/assets/img/step5.png" class="img-fluid stepimg" alt="">
                        <div class="stepdisc position-relative">
                            <div class="displaybox">
                                <h5>Professional <br>Stage</h5>
                            </div>
                            <div class="hide_box position-absolute top-0 bg-white">
                                <h5 class="fw-bold">Professional Stage</h5>
                                <p class="">Achieve mastery with advanced techniques and expert guidance to thrive as a
                                    professional trader.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 ">
                    <div class="steps_box text-center">
                        <img src="<?= base_url() ?>public/assets/img/step6.png" class="img-fluid stepimg" alt="">
                        <div class="stepdisc position-relative">
                            <div class="displaybox">
                                <h5>Mastery </h5>
                            </div>
                            <div class="hide_box position-absolute top-0 bg-white">
                                <h5 class="fw-bold">Mastery</h5>
                                <p class="">Reach the pinnacle of trading expertise with elite strategies and
                                    market-leading insights</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="our_acchivement position-relative">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 text-center">
                    <h2 class="text-primary mb-0 wow fadeInDown" data-wow-delay="0.2s">Our Achievements</h2>
                    <img src="<?= base_url() ?>public/assets/img/acchivement_shape.svg" width="20%" alt="">
                    <p class="text-white wow fadeInDown" data-wow-delay="0.3s">Award Winning Institute</p>
                    <p style="color: #adadad; " class="wow fadeInDown" data-wow-delay="0.4s">At FXCareers Dubai, our
                        dedication to providing world-class financial
                        education has been recognized with numerous awards and accolades from prestigious
                        organizations. These honors reflect our commitment to excellence, innovation, and the
                        success of our students.</p>
                </div>
            </div>
            <div class="row wow fadeInDown" data-wow-delay="0.6s">
                <div class="col">
                    <div class="swiper swiper-awards">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="acchivement_Box d-flex">
                                    <img src="<?= base_url() ?>public/assets/img/aword_left.png" class="w-25" alt="">
                                    <div class="disc">
                                        <p class="fw-bold text-primary">Global Business Awards</p>
                                        <p>“Best Forex Education Provider 2023”</p>
                                    </div>
                                    <img src="<?= base_url() ?>public/assets/img/aword_right.png" class="w-25" alt="">
                                </div>
                            </div>

                            <div class="swiper-slide">
                                <div class="acchivement_Box d-flex">
                                    <img src="<?= base_url() ?>public/assets/img/aword_left.png" class="w-25" alt="">
                                    <div class="disc">
                                        <p class="fw-bold text-primary">Global Business Awards</p>
                                        <p>“Best Forex Education Provider 2023”</p>
                                    </div>
                                    <img src="<?= base_url() ?>public/assets/img/aword_right.png" class="w-25" alt="">
                                </div>
                            </div>

                            <div class="swiper-slide">
                                <div class="acchivement_Box d-flex">
                                    <img src="<?= base_url() ?>public/assets/img/aword_left.png" class="w-25" alt="">
                                    <div class="disc">
                                        <p class="fw-bold text-primary">Global Business Awards</p>
                                        <p>“Best Forex Education Provider 2023”</p>
                                    </div>
                                    <img src="<?= base_url() ?>public/assets/img/aword_right.png" class="w-25" alt="">
                                </div>
                            </div>

                            <div class="swiper-slide">
                                <div class="acchivement_Box d-flex">
                                    <img src="<?= base_url() ?>public/assets/img/aword_left.png" class="w-25" alt="">
                                    <div class="disc">
                                        <p class="fw-bold text-primary">Global Business Awards</p>
                                        <p>“Best Forex Education Provider 2023”</p>
                                    </div>
                                    <img src="<?= base_url() ?>public/assets/img/aword_right.png" class="w-25" alt="">
                                </div>
                            </div>

                            <div class="swiper-slide">
                                <div class="acchivement_Box d-flex">
                                    <img src="<?= base_url() ?>public/assets/img/aword_left.png" class="w-25" alt="">
                                    <div class="disc">
                                        <p class="fw-bold text-primary">Global Business Awards</p>
                                        <p>“Best Forex Education Provider 2023”</p>
                                    </div>
                                    <img src="<?= base_url() ?>public/assets/img/aword_right.png" class="w-25" alt="">
                                </div>
                            </div>

                            <div class="swiper-slide">
                                <div class="acchivement_Box d-flex">
                                    <img src="<?= base_url() ?>public/assets/img/aword_left.png" class="w-25" alt="">
                                    <div class="disc">
                                        <p class="fw-bold text-primary">Global Business Awards</p>
                                        <p>“Best Forex Education Provider 2023”</p>
                                    </div>
                                    <img src="<?= base_url() ?>public/assets/img/aword_right.png" class="w-25" alt="">
                                </div>
                            </div>

                            <div class="swiper-slide">
                                <div class="acchivement_Box d-flex">
                                    <img src="<?= base_url() ?>public/assets/img/aword_left.png" class="w-25" alt="">
                                    <div class="disc">
                                        <p class="fw-bold text-primary">Global Business Awards</p>
                                        <p>“Best Forex Education Provider 2023”</p>
                                    </div>
                                    <img src="<?= base_url() ?>public/assets/img/aword_right.png" class="w-25" alt="">
                                </div>
                            </div>

                        </div>
                        <!-- Navigation Buttons -->

                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="courses ">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="head  ">
                        <h2 class="gradient-text"> <span class="afterifmg  ">Most </span> Popular Courses</h2>
                        <p>Top study courses that students can join with us.</p>
                        <!-- <form action="" class="">
                            <input type="text" placeholder="Search Courses" class="">
                            <a href="" type="submit">
                                <i class="ri-search-line"></i>
                            </a>
                        </form> -->
                    </div>
                </div>
            </div>
            <!-- <div class="row g-4">
                <div class="col-md-9 mt-5">
                    <div class="catagory_btn">

                        <h5 class="">Browse By categories</h5>

                        <a href="courses.php">All</a>
                        <?php foreach ($course_categories as $cat): ?>
                            <a href="courses.php"><?= $cat->category_name ?> </a>
                        <?php endforeach; ?>
                    </div> -

                </div>
                <div class="col-md-3 text-md-end text-start mt-md-5 pe-3">

                </div>
            </div> -->
            <?php if (!empty($course_details_view)): ?>
                <div class="row mt-4 g-4">
                    <?php
                    $count = 0;
                    foreach ($course_details_view as $row):
                        if ($count >= 3)
                            break;
                        $count++;
                        ?>
                        <div class="col-lg-4 col-md-6">
                            <div class="card">
                                <div class="course_img position-relative">
                                    <img src="<?= base_url('uploads/course/') . $row->course_image; ?>" class="img-fluid"
                                        alt="">
                                </div>
                                <div class="card-body">
                                    <div class="card-title mb-4">
                                        <h6 class="mb-2 fw-semibold lineclamp_1"><?= $row->course_name ?></h6>
                                        <p>(<?= $row->course_subtitles ?>)</p>
                                    </div>
                                    <div class="details mb-2">
                                        <p class="mb-2 font-14"><span><i class="ri-group-line"></i></span> 20+ Learners already
                                            enrolled</p>
                                        <p class="mb-2 font-14"><span><i class="ri-history-line"></i></span>
                                            <?= $row->duration ?> of learning</p>
                                        <p class="mb-2 font-14"><span><i class="ri-git-repository-line"></i></span>
                                            <?= $row->lesson ?> Modules</p>
                                    </div>
                                    <div class="d-flex phone_flex justify-content-between mt-4">
                                        <div class="price mt-3">
                                            <a href="<?= base_url("course-details/") . str_replace(' ', '-', strtolower($row->course_name)); ?>"
                                                class="text-secondary btn btn-outline-dark">View Program</a>
                                        </div>
                                        <div class="actions mt-3">
                                            <?php if ($this->session->userdata('role') == '') { ?>
                                                <a href="<?= base_url() ?>login" class="mainthemebutton">Enroll Now</a>
                                            <?php } else { ?>
                                                <a href="<?= base_url("TabbyPayment/create_checkout/" . $row->id) ?>"
                                                    class="mainthemebutton">Book Now</a>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

            <div class="row mt-5">
                <div class="col text-center ">
                    <a href="<?= base_url("courses") ?>" class="mainthemebutton">More Courses <i
                            class="ri-arrow-right-up-line fw-bold bg-black rounded-circle text-warning"
                            style="padding: 4px; font-size: 12px;"></i></a>
                </div>
            </div>
        </div>
    </section>

    <section class="industry pt-0">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 ">
                    <div class="head text-center">
                        <h2 class=" gradient-text"> <span class="afterifmg "> Financial </span> Industry</h2>
                        <p>At FXCareers, we offer tailored programs to equip you with the skills and knowledge
                            needed to excel in the financial industry, guiding you toward long-term success.</p>
                    </div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-md-12 mx-auto">

                    <div class="row g-4">
                        <div class="col-md-6">
                            <div class="d-flex flex-column">

                                <div
                                    class="industry_wraper industry_box bg-black p-4 industry_graident rounded-4 position-relative industery_hover_1  industry_height_1">
                                    <div>
                                        <h3 class="text-white">Forex & Stock Market</h3>
                                        <p style="color: #F2E0A6;">Trade Global Currencies and Securities with
                                            Confidence</p>
                                    </div>
                                    <div class=" content-text text-white">
                                        <p class="text-white">Learn the intricacies of currency and stock trading in
                                        global markets. Our programs cover everything from understanding market
                                            trends and price action to executing trades with precision. Master the
                                            skills needed to navigate these dynamic markets successfully</p>
                                        <!-- <a href="<?= base_url("about-us") ?>" class="mainthemebutton">Know More</a> -->
                                    </div>
                                    <div class="text-end ">
                                        <img src="<?= base_url() ?>public/assets/img/box_right1.png" alt=""
                                            class="industry-img">
                                    </div>
                                    <img src="<?= base_url() ?>public/assets/img/industry_boxbg_1.png"
                                        class="img-fluid industrybg_img" alt="">
                                </div>
                                <div
                                    class="industry_wraper industry_box bg-black p-4 mt-4 rounded-4 industry_graident3  position-relative industery_hover_2 industry_height_2">
                                    <div>
                                        <h3>Forex & Stock Market</h3>
                                        <p class="text-black">Dive into the Future of Digital Assets
                                        </p>
                                    </div>
                                    <div class=" content-text">
                                        <p class="text-black">Discover the world of cryptocurrencies, blockchain, and
                                            digital trading. Our courses provide insights into analyzing market
                                            movements, understanding crypto trends, and capitalizing on this
                                            fast-evolving sector.
                                        </p>
                                        <!-- <a href="<?= base_url("about-us") ?>" class="mainthemebutton">Know More</a> -->
                                    </div>
                                    <div class="text-end ">
                                        <img src="<?= base_url() ?>public/assets/img/box_right2.png" alt=""
                                            class="industry-img ">
                                    </div>
                                    <img src="<?= base_url() ?>public/assets/img/industry_boxbg_3.png"
                                        class="img-fluid industrybg_img2" alt="">
                                </div>

                            </div>
                        </div>
                        <div class="col-md-6">

                            <div
                                class="industry_wraper industry_box  p-4 rounded-4 industry_graident2  position-relative">
                                <div>
                                    <h3>Mutual Funds</h3>
                                    <p class="text-black"> Simplify Investment Through Expert Training
                                    </p>
                                </div>
                                <div class="content-text">
                                    <p>Gain a thorough understanding of mutual funds, portfolio diversification, and
                                        risk assessment. Learn how to make informed investment decisions and grow wealth
                                        effectively through structured, long-term strategies.</p>
                                    <!-- <a href="<?= base_url("about-us") ?>" class="mainthemebutton">Know More</a> -->
                                </div>
                                <div class="text-end ">
                                    <img src="<?= base_url() ?>public/assets/img/box_right3.png" alt=""
                                        class="industry-img">
                                </div>
                                <img src="<?= base_url() ?>public/assets/img/industry_boxbg_2.png"
                                    class="img-fluid industrybg_img" alt="">

                            </div>
                            <div
                                class="industry_wraper industry_box bg-black p-4 mt-4  industry_graident rounded-4  position-relative">
                                <div>
                                    <h3 class="text-white">Future & Options</h3>
                                    <p style="color: #F2E0A6;">Master the Art of Derivative Trading</p>
                                </div>
                                <div class=" content-text">
                                    <p class="text-white">Explore advanced trading techniques in futures and options.
                                        Our programs teach you to hedge risks, speculate effectively, and leverage
                                        market opportunities to maximize returns with precision strategies.</p>
                                    <!-- <a href="<?= base_url("about-us") ?>" class="mainthemebutton">Know More</a> -->
                                </div>
                                <div class="text-end ">
                                    <img src="<?= base_url() ?>public/assets/img/box_right4.png" alt=""
                                        class="industry-img">
                                </div>
                                <img src="<?= base_url() ?>public/assets/img/industry_boxbg_4.png"
                                    class="img-fluid industrybg_img" alt="">
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="mentor">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-6 align-self-center">
                    <div class="head wow fadeInDown">

                        <h2 class="gradient-text "> <span class="afterifmg  ">Meet </span>Our Expert Mentor</h2>
                        <p class="my-3">​At FXCareers Dubai, our mentors are distinguished professionals with extensive
                            experience in trading, forex, and financial markets. They are dedicated to empowering your
                            financial career through expert education, offering KHDA-certified training in Forex and
                            Global Stock Markets.</p>
                        <a href="<?= base_url("mentor") ?>" class="mainthemebutton me-2 mt-2">Meet Our Mentors</a>
                        <a href="<?= base_url("courses") ?>"
                            class="mainthemebutton border-color-transparent mt-2   text-white bg-black">Explore Courses
                            <i class="ri-arrow-right-up-line fw-bold text-black rounded-circle bg-white"
                                style="    padding: 4px;font-size: 12px;"></i></a>
                    </div>
                </div>
                <div class="col-lg-6 ">
                    <div class="row mt-4 g-4">
                        <?php foreach ($teachers as $index => $row): ?>
                            <?php
                            $shakeClass = ($index % 3 === 1) ? 'mentore_shake_down' : 'mentore_shake_up';
                            ?>
                            <div class="col-md-4">
                                <div class="team-wrapper position-relative <?= $shakeClass ?>">
                                    <div class="img-box team-img">
                                        <img src="<?= base_url() ?>uploads/teachers/<?= $row->teacher_image ?>" alt=""
                                            class="img-fluid">
                                        <a href="<?= base_url() ?>mentor/<?= str_replace(' ', '-', strtolower($row->teacher_name)); ?>"
                                            class="d-block">
                                            <div class="member_details">
                                                <h6 class="name text-white mb-0">
                                                    <?= $row->teacher_name ?>
                                                </h6>
                                                <p class="post text-primary mb-0 font-12">
                                                    <?= $row->designation ?>
                                                </p>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

            </div>
        </div>
        <!-- <img src="<?= base_url() ?>public/assets/img/mentor_shape.png" class="img-fluid mentor_shape" alt=""> -->
    </section>

    <section class="about">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-6 ">
                    <div class="about_img_wraper">
                        <img src="<?= base_url() ?>public/assets/img/aobut_main.png"
                            class=" w-75 aobut_main wow fadeInLeft" alt="">
                        <img src="<?= base_url() ?>public/assets/img/about_top_right.png"
                            class=" img-fluid about_top_right wow fadeInDown" alt="">
                        <img src="<?= base_url() ?>public/assets/img/about_bottom.png"
                            class=" w-75 about_bottom wow fadeInUp" alt="">
                    </div>
                </div>
                <div class="col-lg-6 ">
                    <div class="head mt-5">
                        <h2 class="gradient-text "> <span class="afterifmg  ">About Us</span></h2>
                        <p class="my-3">We empower your learning journey with the best courses</p>
                        <p>Fx Career
                            along with your official educational degree, we provide one of the top certification
                            courses that will not only help you become a standout trader</p>
                        <h5> <img src="<?= base_url() ?>public/assets/img/about_icon1.png" width="40px" alt=""> Master
                            the
                            Market</h5>
                        <p>Conquer the dynamic world of Forex, stocks and commodities with confidence. Learn from
                            industry leaders and develop the skills to navigate these markets effectively.</p>
                        <h5> <img src="<?= base_url() ?>public/assets/img/about_icon2.png" width="40px" alt=""> Unlock
                            Potential</h5>
                        <p>Transform from an aspiring trader to a skilled professional. FXCareers Dubai equips you
                            with the knowledge and strategies needed to achieve consistent profitability in the
                            financial markets.</p>
                        <a href="<?= base_url("about-us") ?>" class="mainthemebutton">Know More <i
                                class="ri-arrow-right-up-line fw-bold bg-black rounded-circle text-warning" style="    padding: 4px;
font-size: 12px;
"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="why_choose">
        <img src="<?= base_url() ?>public/assets/img/banner_shape_2.svg" class="bannershape2" alt="">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10  ">
                    <div class="head  text-center">
                        <h2 class="text-primary"> <span class="afterifmg position-relative">Why</span> Choose us</h2>
                        <h5 class="mt-1 text-white">Learn from Expert Market Professionals Everyday</h5>
                        <p class="text-center">Our seasoned Forex professionals provide comprehensive training, from
                            basics to advanced
                            strategies, ensuring you gain practical knowledge to navigate the market confidently.</p>

                    </div>
                </div>
            </div>
            <div class="row g-4">
                <div class="col-lg-6">
                    <div class=" row g-4 mt-md-5">
                        <div class="col-6">
                            <div class="row">
                                <div class="col-12 mb-4">
                                    <div class="why_choose_box wow  h-100 fadeInDown mb-4 mt-4"
                                        style="visibility: visible; animation-name: fadeInDown;">
                                        <div class="icon">
                                            <img src="<?= base_url() ?>public/assets/img/why_choose_us_section_icon_1.png"
                                                width="30px" alt="">
                                        </div>
                                        <h5>World Class Trainers</h5>
                                        <p>Learn from top-tier experts with proven success in Forex markets.</p>
                                    </div>
                                </div>
                                <div class="col-12 mt-4 ">
                                    <div class="why_choose_box wow  mb-4 h-100 fadeInDown"
                                        style="visibility: visible; animation-name: fadeInDown;">
                                        <div class="icon">
                                            <img src="<?= base_url() ?>public/assets/img/why_choose_us_section_icon_2.png"
                                                width="30px" alt="">
                                        </div>
                                        <h5>Easy Learning</h5>
                                        <p>Simplified curriculum designed for quick understanding and practical
                                            application.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mt-4 col-6">
                            <div class="row">
                                <div class="col-12 mt-4">
                                    <div class="why_choose_box wow mt-4 h-100 fadeInUp  mb-4"
                                        style="visibility: visible; animation-name: fadeInUp;">
                                        <div class="icon">
                                            <img src="<?= base_url() ?>public/assets/img/why_choose_us_section_icon_3.png"
                                                width="30px" alt="">
                                        </div>
                                        <h5>Flexible</h5>
                                        <p>Adaptable schedules and various learning formats to suit your needs.</p>
                                    </div>
                                </div>
                                <div class="col-12 mt-4 ">
                                    <div class="why_choose_box wow h-100 mt-4 fadeInUp"
                                        style="visibility: visible; animation-name: fadeInUp;">
                                        <div class="icon">
                                            <img src="<?= base_url() ?>public/assets/img/why_choose_us_section_icon_4.png"
                                                width="30px" alt="">
                                        </div>
                                        <h5>Affordable Price</h5>
                                        <p>High-quality Forex education accessible at competitive, budget-friendly
                                            rates.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 text-center">
                    <img src="<?= base_url() ?>public/assets/img/why_choose_right.png " class="w-75" alt="">
                </div>
            </div>
        </div>
    </section>

    <section class="testimonial bg-light">
        <div class="container overflow-hidden ">
            <div class="row">
                <!-- Elfsight Google Reviews | Untitled Google Reviews -->
                <script src="https://static.elfsight.com/platform/platform.js" async></script>
                <div class="elfsight-app-a87f648f-5a00-4075-b03a-75bea680bf24" data-elfsight-app-lazy></div>
            <!--    <div class="col">-->
            <!--        <div class="head text-center">-->

            <!--            <h2 class=" gradient-text"> <span class="afterifmg "> Testimonials</span> </h2>-->
            <!--            <p>Transforming Careers for Enduring Trading</p>-->
            <!--        </div>-->
            <!--    </div>-->
            <!--</div>-->

            <!--<div class="row">-->
            <!--    <div class="col px-0">-->
            <!--        <div class="swiper-review">-->
            <!--            <div class="swiper-wrapper">-->
            <!--                <div class="swiper-slide">-->
            <!--                    <div class="review_box d-flex">-->
            <!--                        <div class="user_profile text-center d-md-block d-none">-->
            <!--                            <img src="<?= base_url() ?>public/assets/img/maria_sakkari.png"-->
            <!--                                style="width:150px;border-radius:10px;object-fit:contain;" alt="">-->
            <!--                            <div class="profile_disc ">-->

            <!--                                <h5 class="name text-white mb-0 mt-2">Maria Sakkari</h5>-->
            <!--                                <p class="profision text-primary">Exceptional Training</p>-->
            <!--                            </div>-->
            <!--                        </div>-->
            <!--                        <div class="review_content text-white p-2 ">-->
            <!--                            “The trainers at FXCareers Dubai are excellent and genuinely enjoy teaching.-->
            <!--                            They-->
            <!--                            make learning easy and enjoyable, and they simply explain complex topics.-->
            <!--                            Thanks to FXCareers, I now have the knowledge and confidence to trade-->
            <!--                            effectively.”-->
            <!--                            <div class="profile_disc mt-3 d-md-none d-block">-->

            <!--                                <h5 class="name text-primary">Maria Sakkari</h5>-->
            <!--                                <h6 class="name p14 text-primary">Exceptional Training</p>-->
            <!--                            </div>-->
            <!--                        </div>-->
            <!--                        <img src="<?= base_url() ?>public/assets/img/Quote.png" width="100px" class="quote"-->
            <!--                            alt="">-->
            <!--                    </div>-->
            <!--                </div>-->
            <!--                <div class="swiper-slide">-->
            <!--                    <div class="review_box d-flex">-->
            <!--                        <div class="user_profile text-center d-md-block d-none">-->
            <!--                            <img src="<?= base_url() ?>public/assets/img/Khalid-Butti-AI-Zabbi.png"-->
            <!--                                style="width:150px;border-radius:10px;object-fit:contain;" alt="">-->
            <!--                            <div class="profile_disc ">-->

            <!--                                <h5 class="name text-white mb-0 mt-2">Khalid Butti AI Zabbi</h5>-->
            <!--                                <p class="profision text-primary">Happy Cutomer</p>-->
            <!--                            </div>-->
            <!--                        </div>-->
            <!--                        <div class="review_content text-white p-2 ">-->
            <!--                            “FXCareers Dubai transformed my financial journey from novice to-->
            <!--                            professional. Their experted courses and supportive community gave me the-->
            <!--                            confidence to navigate Forex market with ease. Thanks to their comprehensive-->
            <!--                            training, I've achieved financial independence and a thriving career I never-->
            <!--                            thought possible.”-->
            <!--                            <div class="profile_disc mt-3 d-md-none d-block">-->

            <!--                                <h5 class="name text-primary">Khalid Butti AI Zabbi</h5>-->
            <!--                                <h6 class="name p14 text-primary">Happy Cutomer</p>-->
            <!--                            </div>-->
            <!--                        </div>-->
            <!--                        <img src="<?= base_url() ?>public/assets/img/Quote.png" width="100px" class="quote"-->
            <!--                            alt="">-->
            <!--                    </div>-->
            <!--                </div>-->
            <!--                <div class="swiper-slide">-->
            <!--                    <div class="review_box d-flex">-->
            <!--                        <div class="user_profile text-center d-md-block d-none">-->
            <!--                            <img src="<?= base_url() ?>public/assets/img/Aryna-Sabalenka.png"-->
            <!--                                style="width:150px;border-radius:10px;object-fit:contain;" alt="">-->
            <!--                            <div class="profile_disc ">-->

            <!--                                <h5 class="name text-white mb-0 mt-2">Aryna Sabalenka</h5>-->
            <!--                                <p class="profision text-primary">Best Forex Learning Platform</p>-->
            <!--                            </div>-->
            <!--                        </div>-->
            <!--                        <div class="review_content text-white p-2 ">-->
            <!--                            “I found that FXCareers offers a lot of learning materials like webinars,-->
            <!--                            articles, and videos. They cover everything important in Forex trading, such-->
            <!--                            as reading charts, understanding the market, and managing risks. I highly-->
            <!--                            recommend FXCareers as the best place to learn.”-->
            <!--                            <div class="profile_disc mt-3 d-md-none d-block">-->

            <!--                                <h5 class="name text-primary">Aryna Sabalenka</h5>-->
            <!--                                <h6 class="name p14 text-primary">Best Forex Learning Platform</p>-->
            <!--                            </div>-->
            <!--                        </div>-->
            <!--                        <img src="<?= base_url() ?>public/assets/img/Quote.png" width="100px" class="quote"-->
            <!--                            alt="">-->
            <!--                    </div>-->
            <!--                </div>-->
            <!--                <div class="swiper-slide">-->
            <!--                    <div class="review_box d-flex">-->
            <!--                        <div class="user_profile text-center d-md-block d-none">-->
            <!--                            <img src="<?= base_url() ?>public/assets/img/Fyaz-Al-Hmdani.png"-->
            <!--                                style="width:150px;border-radius:10px;object-fit:contain;" alt="">-->
            <!--                            <div class="profile_disc ">-->

            <!--                                <h5 class="name text-white mb-0 mt-2"> Fyaz Al Hmdani</h5>-->
            <!--                                <p class="profision text-primary"> Happy Customer</p>-->
            <!--                            </div>-->
            <!--                        </div>-->
            <!--                        <div class="review_content text-white p-2 ">-->
            <!--                            “The trainers at FXCareers Dubai are excellent and genuinely enjoy teaching.-->
            <!--                            They-->
            <!--                            make learning easy and enjoyable, and they simply explain complex topics.-->
            <!--                            Thanks to FXCareers, I now have the knowledge and confidence to trade-->
            <!--                            effectively.”-->
            <!--                            <div class="profile_disc mt-3 d-md-none d-block">-->

            <!--                                <h5 class="name text-primary">Musallam Fyaz Al Hmdani</h5>-->
            <!--                                <h6 class="name p14 text-primary">Great Trading Education Experience</p>-->
            <!--                            </div>-->
            <!--                        </div>-->
            <!--                        <img src="<?= base_url() ?>public/assets/img/Quote.png" width="100px" class="quote"-->
            <!--                            alt="">-->
            <!--                    </div>-->
            <!--                </div>-->

            <!--            </div>-->
                        <!-- Navigation Buttons -->
            <!--        </div>-->
            <!--        <div class="swiper-button-next"></div>-->
            <!--        <div class="swiper-button-prev"></div>-->
                </div>
            </div>

        </div>
    </section>

    <section class="blog">
        <div class="container">
            <div class="row">
                <div class="col-lg-10">
                    <div class="head ">

                        <h2 class=" gradient-text"> <span class="afterifmg "> Most </span> Popular Blog Posts </h2>
                        <p>Latest Insights in Financial Markets.</p>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="text-md-end text-start">

                        <a href="<?= base_url("blog") ?>" class="mainthemebutton">Know More <i
                                class="ri-arrow-right-up-line fw-bold bg-black rounded-circle text-warning" style="    padding: 4px;
font-size: 12px;
"></i></a>
                    </div>
                </div>
            </div>
            <div class="row g-4 mt-4">
                <?php
                $count = 0;
                foreach ($all_blogs as $blog):
                    if ($count >= 3)
                        break;
                    ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="blog_box ">
                            <div class="blog_img">
                                <img src="<?= base_url('uploads/blogs/') . $blog->blog_image ?>" class="img-fluid" alt="">
                            </div>
                            <div class="blog_disc px-2 py-3 ">
                                <h4 class="lineclamp_1"><?= $blog->blog_name ?></h4>
                                <div class="readmore_date d-flex justify-content-between align-items-center mt-2">
                                    <a href="<?= base_url('blog/') ?><?= str_replace(' ', '-', str_replace([':', ',', '  '], '', strtolower($blog->blog_name))); ?>"
                                        class="d-flex btn text-white readmore industry_graident ">Read More <span
                                            class="more_nav_arrow ms-1"><i
                                                class="ri-arrow-right-up-line fw-bold "></i></span></a>
                                    <p class="mb-0"><?= date('d-m-Y', strtotime($blog->blog_date)) ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    $count++;
                endforeach;
                ?>
            </div>
    </section>

    <section class="download">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="payment_box  text-center">
                        <img src="<?= base_url() ?>public/assets/img/paymentbg.png" class="payment_shape1 z-1" alt="">
                        <div class="payment_width z-2">
                            <h2>Seamless & Secure Payment Options</h2>
                            <p>Choose from a variety of trusted payment methods designed to make your enrollment
                                process effortless and secure.</p>
                            <h4 class="fw-bold">Learn Now Pay Later</h4>
                            <div class="payment_img mb-4">

                                <img src="<?= base_url() ?>public/assets/img/tabby_logo.png" width="150px" class="ms-3"
                                    alt="">
                                <img src="<?= base_url() ?>public/assets/img/tamara_icon.jpg" width="150px" class="ms-3"
                                    alt="">
                            </div>
                            <div class="payment_img">
                                <img src="<?= base_url() ?>public/assets/img/apple_pay.png" width="50px" class="ms-3"
                                    alt="apple_pay">
                                <img src="<?= base_url() ?>public/assets/img/mastercard.png" width="50px" class="ms-3"
                                    alt="mastercard">
                                <img src="<?= base_url() ?>public/assets/img/visa.png" width="50px" class="ms-3"
                                    alt="visa">
                                <img src="<?= base_url() ?>public/assets/img/google_pay.png" width="50px" class="ms-3"
                                    alt="google_pay">
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="row mt-5 g-4">
                <div class="col-lg-6 ">
                    <div class="download_left">
                        <h2 class="text-primary mb-5">Learn, Trade, and Succeed – Anytime, Anywhere!</h2>
                        <span class="Commingsoon ">Coming Soon: FXCareers Mobile App</span>

                        <div class="download_point_wraper d-md-flex mt-3">
                            <ul class="list-inline">
                                <li class="text-white mt-4"> <img src="<?= base_url() ?>public/assets/img/shield.png"
                                        class="img-fluid " alt=""> Interactive Learning Modules</li>
                                <li class="text-white mt-4"> <img src="<?= base_url() ?>public/assets/img/shield.png"
                                        class="img-fluid " alt=""> One-Touch Mentorship</li>
                            </ul>
                            <ul class="list-inline ms-md-3 ms-0">
                                <li class="text-white mt-4"> <img src="<?= base_url() ?>public/assets/img/shield.png"
                                        class="img-fluid " alt=""> Practice Trading Platform</li>
                                <li class="text-white mt-4"> <img src="<?= base_url() ?>public/assets/img/shield.png"
                                        class="img-fluid " alt=""> Community Engagement</li>
                            </ul>
                        </div>
                        <div class="mt-3">

                            <a href=""><img src="<?= base_url() ?>public/assets/img/playstore.png" width="150px"
                                    alt=""></a>
                            <a href=""><img src="<?= base_url() ?>public/assets/img/appstore.png" width="150px"
                                    alt=""></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">

                </div>
            </div>
        </div>
        <img src="<?= base_url() ?>public/assets/img/forex-trading-on-mobile-phone.png" class="phone_hand"
            alt="forex-trading-on-mobile-phone">
    </section>

    <section class="faq pb-0">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="head text-center">
                        <h2 class="gradient-text"> <span class="afterifmg">Frequently </span>Asked Questions</h2>
                    </div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-lg-6
                 mx-auto">
                    <div class="accordion " id="accordionExample">
                        <!-- FAQ Item 1 -->
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    What is FXCareers Dubai?
                                    <span class="icon-plus">+</span>
                                    <span class="icon-minus">-</span>
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">

                                    FXCareers Dubai is a distinguished member of the FXCareers Global Network. We offer
                                    comprehensive training and education in the finance industry, with a focus on Forex
                                    and leading global stock markets.
                                </div>
                            </div>
                        </div>

                        <!-- FAQ Item 2 -->
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    Is FXCareers Dubai Certified?
                                    <span class="icon-plus">+</span>
                                    <span class="icon-minus">-</span>
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">

                                    FXCareers Dubai is certified by the Knowledge Human Development Authority (KHDA),
                                    which is the government authority responsible for the growth and quality of private
                                    education in Dubai. This certification ensures that our training programs meet the
                                    highest standards of quality and excellence.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    What types of courses does FXCareers Dubai offer?
                                    <span class="icon-plus">+</span>
                                    <span class="icon-minus">-</span>
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <strong>FXCareers Dubai offers a variety of courses including:</strong>
                                    <ul>
                                        <li>Basic Financial Market Training Module</li>
                                        <li>Financial Market Training for Intermediate</li>
                                        <li>Advanced Financial Market Training Course</li>
                                        <li>These courses are available in both online and classroom formats to suit
                                        </li>
                                        <li> different learning preferences.</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                    Who can benefit from FXCareers Dubai's courses?

                                    <span class="icon-plus">+</span>
                                    <span class="icon-minus">-</span>
                                </button>
                            </h2>
                            <div id="collapseFour" class="accordion-collapse collapse"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    FXCareers Dubai's courses are designed for anyone interested in learning about Forex
                                    trading and financial markets. Whether you're a beginner taking your first steps or
                                    an advanced trader looking to enhance your skills, FXCareers Dubai has something for
                                    you.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                    Who teaches the courses at FXCareers Dubai?
                                    </span>
                                    <span class="icon-plus">+</span>
                                    <span class="icon-minus">-</span>
                                </button>
                            </h2>
                            <div id="collapseFive" class="accordion-collapse collapse"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    FXCareers Dubai's courses are taught by seasoned Forex professionals with proven
                                    success in the markets. The institution takes pride in its world-class trainers who
                                    provide practical knowledge and strategies based on real-world experience.
                                    <span class="icon-plus">+
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6
                 mx-auto">
                    <div class="accordion " id="accordionRight">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                    How flexible are FXCareers Dubai's learning options?

                                    <span class="icon-plus">+</span>
                                    <span class="icon-minus">-</span>
                                </button>
                            </h2>
                            <div id="collapseSix" class="accordion-collapse collapse"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    FXCareers Dubai understands that everyone has different schedules and learning
                                    preferences. That's why the institution offers flexible learning options including
                                    online courses, classroom courses, and one-to-one sessions. Schedules are adaptable
                                    to suit various needs.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                                    Can I attend webinars or live sessions?


                                    <span class="icon-plus">+</span>
                                    <span class="icon-minus">-</span>
                                </button>
                            </h2>
                            <div id="collapseSeven" class="accordion-collapse collapse"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    Yes, FXCareers hosts interactive webinar sessions led by industry leaders, allowing
                                    participants to engage in real-time discussions and gain practical insights from
                                    experienced traders.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
                                    What makes FXCareers Dubai unique?
                                    <span class="icon-plus">+</span>
                                    <span class="icon-minus">-</span>
                                </button>
                            </h2>
                            <div id="collapseEight" class="accordion-collapse collapse"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <strong>FXCareers Dubai offers:</strong>
                                    <ul>
                                        <li>Expert market professionals as trainers</li>
                                        <li>Easy learning with a simplified curriculum</li>
                                        <li>Affordable pricing for high-quality Forex education</li>
                                        <li>Flexible learning options</li>
                                        <li>KHDA certification</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseNine" aria-expanded="false" aria-controls="collapseNine">
                                    How can I enroll in a course?

                                    <span class="icon-plus">+</span>
                                    <span class="icon-minus">-</span>
                                </button>
                            </h2>
                            <div id="collapseNine" class="accordion-collapse collapse"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    You can enroll in any of our courses by visiting our website, selecting the desired
                                    course, and following the registration process. Alternatively, you can contact us
                                    directly for assistance.

                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseTen" aria-expanded="false" aria-controls="collapseTen">
                                    What are the payment options available?

                                    <span class="icon-plus">+</span>
                                    <span class="icon-minus">-</span>
                                </button>
                            </h2>
                            <div id="collapseTen" class="accordion-collapse collapse"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    We accept payments via credit/debit cards, bank transfers, and other common payment
                                    gateways. Payment details are provided during the registration process.
                                </div>
                            </div>
                        </div>
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
                                    <li class=" text-black mt-4"> <img
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
                                <h3>Join Our News Letter</h3>
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
<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Launch demo modal
</button> -->

<!-- Modal -->
<div class="modal job_popup seminar fade" id="enquirypopup" data-bs-backdrop="static" data-bs-keyboard="false"
    tabindex="-1" aria-labelledby="enquirypopupLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header justify-content-between border-0">
                <h1 class="modal-title fs-5" id="enquirypopupLabel">Fill out the form below!</h1>
                <button type="button" class="mdl-close-btn " data-bs-dismiss="modal" aria-label="Close"><i
                        class="ri-close-large-line"></i></button>
            </div>
            <div class="modal-body">
                <div class="container seminar">

                    <form action="" method="POST">
                        <div class="row">
                         
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">First Name*</label>
                                    <input type="text" class="form-control" name="firstname" id="firstname"
                                        aria-describedby="helpId" required placeholder="Enter Your First Name" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">Last Name*</label>
                                    <input type="text" class="form-control" name="lastname" id="lastname"
                                        aria-describedby="helpId" required placeholder="Enter Your Last Name" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">Email*</label>
                                    <input type="email" class="form-control" name="email" id="email"
                                        aria-describedby="helpId" required placeholder="Enter Your Email Address" />

                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="" class="form-label d-block">Mobile*</label>
                                    <input type="tel" class="form-control w-100" name="mobile" id="mobile" 
                                        aria-describedby="helpId" required placeholder="Enter Your Mobile Number" />
                                </div>
                            </div>

                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <button type="submit" value="submit" name="submit"
                                    class="mainthemebutton py-3 w-100 text-center fs-bold">
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
<script>
  window.addEventListener('load', () => {
    setTimeout(() => {
      const myModal = new bootstrap.Modal(document.getElementById('enquirypopup'));
      myModal.show();
    }, 3000); // 3000 ms = 3 seconds
  });
</script>
<script src="https://unpkg.com/typed.js@2.1.0/dist/typed.umd.js"></script>
<script>
    var typed = new Typed('#element', {
        strings: ['XCareers'],
        typeSpeed: 100,
        backSpeed: 50,
        loop: true,
        backDelay: 1000,
        startDelay: 0,
        smartBackspace: true
    });
</script>

<script>
    const boxes = document.querySelectorAll('.steps_box');
    const boxesimg = document.querySelectorAll('.stepimg');
    let currentIndex = 0;
    const moveActiveClass = () => {
        boxes[currentIndex].querySelector('.hide_box').classList.remove('active');
        boxesimg[currentIndex].classList.remove('active');
        currentIndex = (currentIndex + 1) % boxes.length;
        boxes[currentIndex].querySelector('.hide_box').classList.add('active');
        boxesimg[currentIndex].classList.add('active');
    };
    setInterval(moveActiveClass, 1000);
</script>

<script>
    const buttons = document.querySelectorAll('.course_catagory');
    const courses = document.querySelectorAll('.course-item');
    const comingSoon = document.getElementById('comingSoonMsg');
    const viewAllWrapper = document.getElementById('viewAllButtonWrapper');
    const toggleBtn = document.getElementById('courses_colaps');
    const toggleText = document.getElementById('change_text');

    let expanded = false;

    function updateCourseView(category) {
        let visibleCourses = [];

        courses.forEach(course => {
            const courseCat = course.dataset.courseCategory;
            const match = category === 'all' || courseCat === category;

            course.classList.remove('d-none', 'course-hidden'); // reset
            if (match) {
                visibleCourses.push(course);
            } else {
                course.classList.add('d-none');
            }
        });

        if (visibleCourses.length === 0) {
            comingSoon.classList.remove('d-none');
        } else {
            comingSoon.classList.add('d-none');
        }

        if (visibleCourses.length > 6) {
            viewAllWrapper?.classList.remove('d-none');

            visibleCourses.forEach((course, index) => {
                if (!expanded && index >= 6) {
                    course.classList.add('course-hidden', 'd-none');
                }
            });
        } else {
            viewAllWrapper?.classList.add('d-none');
        }

        expanded = false;
        if (toggleText) toggleText.textContent = 'View All Courses';
    }

    buttons.forEach(btn => {
        btn.addEventListener('click', () => {
            buttons.forEach(b => b.classList.remove('active'));
            btn.classList.add('active');

            const category = btn.dataset.category;
            updateCourseView(category);
        });
    });

    toggleBtn?.addEventListener('click', () => {
        expanded = !expanded;

        document.querySelectorAll('.course-hidden').forEach(course => {
            course.classList.toggle('d-none', !expanded);
        });

        toggleText.textContent = expanded ? 'View Less' : 'View All Courses';
    });

    updateCourseView('all');
</script>
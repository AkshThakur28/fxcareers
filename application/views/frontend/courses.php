<main>
    <section class="courses ">
        <div class="container">
            <div class="row">
                <div class="col">

                </div>
            </div>
            <div class="row g-4 align-items-center">
                <div class="col-md-5 mt-5">
                    <div class="head  ">
                        <h2 class="text-black">Explore Our <span class="text-primary"> All Courses</span></h2>
                        <p>Top Study Courses That students can join with us.</p>

                    </div>

                </div>
                <div class="col-md-7 text-md-end text-start mt-md-5 pe-3">
                    <div class="head ">

                        <!-- <form action="" class="">
                            <input type="text" placeholder="Search Courses" class="">
                            <a href="" type="submit">
                                <i class="ri-search-line"></i>
                            </a>
                        </form> -->
                    </div>

                </div>
            </div>
            <div class="row position-relative mt-4 g-4">
                <div class="col-lg-3 col-md-5">
                    <div class="d-flex flex-column course_catagory_btn position-sticky z-1">
                        <button class="course_catagory active" data-category="all">
                            <span class="d-flex justify-content-between">
                                <span>All Courses</span><i class="ri-arrow-right-s-line"></i>
                            </span>
                        </button>
                        <?php foreach ($course_categories as $cat): ?>
                            <button class="course_catagory" data-category="<?= strtolower($cat->category_name) ?>">
                                <span class="d-flex justify-content-between">
                                    <span><?= $cat->category_name ?> Courses</span><i class="ri-arrow-right-s-line"></i>
                                </span>
                            </button>
                        <?php endforeach; ?>
                    </div>
                </div>

                <div class="col-lg-9 col-md-7">
                    <div class="row g-4" id="courseWrapper">
                        <?php foreach ($course_details_view as $index => $row):
                            $categoryClasses = strtolower(str_replace(', ', ',', $row->category));
                            ?>
                            <div class="col-xl-4 col-lg-6 col-md-12 course-item d-none"
                                data-course-category="<?= $categoryClasses ?>" data-index="<?= $index ?>">
                                <div class="card">
                                    <div class="course_img position-relative">
                                        <img src="<?= base_url('uploads/course/') . $row->course_image; ?>"
                                            class="img-fluid" alt="">
                                    </div>
                                    <div class="card-body">
                                        <div class="card-title mb-4">
                                            <h6 class="mb-2 fw-semibold lineclamp_1"><?= $row->course_name ?></h6>
                                            <p>(<?= $row->course_subtitles ?>)</p>
                                        </div>
                                        <div class="details mb-2">
                                            <p class="mb-2 font-14"><i class="ri-group-line"></i> 20+ Learners already
                                                enrolled</p>
                                            <p class="mb-2 font-14"><i class="ri-history-line"></i> <?= $row->duration ?> of
                                                learning</p>
                                            <p class="mb-2 font-14"><i class="ri-git-repository-line"></i>
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
                        <div id="comingSoonMsg" class="text-center d-none w-100">
                            <h5 class="text-muted">Coming soon...</h5>
                        </div>
                    </div>

                    <div class="row mt-5 d-none" id="buttonsRow">
                        <div class="col text-center">
                            <a href="javascript:void(0);" class="mainthemebutton bg-black text-white me-3"
                                id="viewMoreBtn">
                                <span id="change_text" class="me-1">View More</span>
                                <i class="ri-arrow-right-up-line fw-bold bg-primary text-black rounded-circle"
                                    style="padding: 4px; font-size: 12px;"></i>
                            </a>
                            <a href="javascript:void(0);" class="mainthemebutton bg-black text-white d-none"
                                id="viewLessBtn">
                                <span class="me-1">View Less</span>
                                <i class="ri-arrow-right-down-line fw-bold bg-primary text-black rounded-circle"
                                    style="padding: 4px; font-size: 12px;"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

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
            <div class="cta_box "
                style="background-image: url(public/assets/img/course_cta_bg.png); background-position: center;background-size:cover">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="cta_right">
                            <h2 class="text-primary mb-0">Flexible Learning Options for Every Trader</h2>
                            <p class="text-white d-flex align-items-center mt-3"><img
                                    src="<?= base_url() ?>public/assets/img/call_grey.svg" class="me-2 " alt="">For
                                enqueries call: <a href="tel:+971503056430" class="text-white">+971 503056430</a></p>
                        </div>
                    </div>
                    <div class="col-lg-6 align-self-center">
                        <div class="suscribe_form text-lg-end text-start ">
                            <form action="">
                                <h3 class="text-white">Join Our News Letter</h3>
                                <p class="font-12">subscribe our news letter for latest updates & News</p>
                                <div class="bg-white input_wraper ms-lg-auto">

                                    <input type="text" placeholder="Enter Your Email">
                                    <a href="" class="btn bg-primary text-white">Subscribe Now</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<script>
    const courseItems = document.querySelectorAll('.course-item');
    const categoryButtons = document.querySelectorAll('.course_catagory');
    const viewMoreBtn = document.getElementById('viewMoreBtn');
    const viewLessBtn = document.getElementById('viewLessBtn');
    const buttonsRow = document.getElementById('buttonsRow');
    const comingSoon = document.getElementById('comingSoonMsg');

    let currentCategory = 'all';
    let visibleCount = 6;

    function filterCourses(category) {
        currentCategory = category;
        visibleCount = 6;

        const matchedCourses = Array.from(courseItems).filter(item => {
            const catList = item.dataset.courseCategory.split(','); 
            return category === 'all' || catList.includes(category);
        });

        courseItems.forEach(item => item.classList.add('d-none'));
        matchedCourses.forEach((item, index) => {
            if (index < visibleCount) item.classList.remove('d-none');
        });

        if (matchedCourses.length === 0) {
            comingSoon.classList.remove('d-none');
            buttonsRow.classList.add('d-none');
        } else {
            comingSoon.classList.add('d-none');

            if (matchedCourses.length > 6) {
                buttonsRow.classList.remove('d-none');
                viewMoreBtn.classList.remove('d-none');
                viewLessBtn.classList.add('d-none');
            } else {
                buttonsRow.classList.add('d-none');
            }
        }
    }

    categoryButtons.forEach(btn => {
        btn.addEventListener('click', () => {
            categoryButtons.forEach(b => b.classList.remove('active'));
            btn.classList.add('active');
            filterCourses(btn.dataset.category);
        });
    });

    viewMoreBtn.addEventListener('click', () => {
        const matchedCourses = Array.from(courseItems).filter(item => {
            const cat = item.dataset.courseCategory;
            return currentCategory === 'all' || cat === currentCategory;
        });

        matchedCourses.forEach((item, index) => {
            if (index < visibleCount + 6) item.classList.remove('d-none');
        });

        visibleCount += 6;

        if (visibleCount >= matchedCourses.length) {
            viewMoreBtn.classList.add('d-none');
        }

        viewLessBtn.classList.remove('d-none');
    });

    viewLessBtn.addEventListener('click', () => {
        visibleCount = 6;
        filterCourses(currentCategory);
        document.getElementById('courseWrapper')?.scrollIntoView({ behavior: 'smooth' });
    });

    filterCourses('all');
</script>
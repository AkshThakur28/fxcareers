<style>
    .toggle-label.active {
        background-color: yellow;
        color: black;
        border-radius: 30px;
    }
</style>

<main class="position-relative">
    <div class="fixed-blur d-lg-block d-none">

    </div>
    <!-- <section class="pb-0">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    
                </div>
            </div>
        </div>
    </section> -->
    <section class="courses_details pb-0">
        <div class="container">
            <div class="row g-4">
                <?php foreach ($online_course_view as $row): ?>
                    <div class="col-md-7  order-2 order-md-1">
                        <div class="mb-5">
                            <h2> Course Details</h2>
                            <a href="<?= base_url() ?>" class="text-secondary"> <span class="me-2"><img
                                        src="<?= base_url() ?>public/assets/img/arrow_left.svg" alt=""></span> Go Back
                                Home</a>
                        </div>

                        <h1><?= $row->course_name ?></h1>
                        <p>A beginner-friendly course covering the basics of Forex, stocks, and essential trading concepts.
                        </p>
                        <ul class="list-inline">
                            <li class="mb-2 "><img src="<?= base_url() ?>public/assets/img/course_details_icon_1.png"
                                    width="20px" class="me-2" alt=""><?= $row->duration ?> of Learning</li>
                            <li class="mb-2 "><img src="<?= base_url() ?>public/assets/img/course_details_icon_2.png"
                                    width="20px" class="me-2" alt="">20+ Students Already Enrolled</li>
                            <li class="mb-2 "><img src="<?= base_url() ?>public/assets/img/course_details_icon_3.png"
                                    width="20px" class="me-2" alt=""> <span class="">Market Fundamentals</span><span
                                    class="">Chart
                                    Analysis</span><span class="">Trading Platforms Usage</span> </li>
                        </ul>
                        <div class="course_details_disc mt-5 ">


                            <div class="nav nav-tabs align-items-center  mb-4 mt-4" id="nav-tab" role="tablist">
                                <button class="nav-link active rounded-pill  fw-semibold" id="nav-home-tab"
                                    data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab"
                                    aria-controls="nav-home" aria-selected="true">Overview</button>
                                <button class="nav-link  rounded-pill fw-semibold" id="nav-profile-tab" data-bs-toggle="tab"
                                    data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile"
                                    aria-selected="false">Curriculum</button>

                                <div class="toggle-switch">
                                    <input type="checkbox" id="toggle" class="toggle-checkbox" <?= (isset($current_mode) && $current_mode == 'offline') ? 'checked' : '' ?>>
                                    <label for="toggle"
                                        class="toggle-label <?= (isset($current_mode) && $current_mode == 'offline') ? 'active' : '' ?>"
                                        style="padding:8px 16px;font-size:16px">
                                        <span
                                            class="toggle-text"><?= (isset($current_mode) && $current_mode == 'offline') ? 'Offline' : 'Online' ?></span>
                                    </label>
                                </div>

                            </div>
                            <p class=""><img src="<?= base_url() ?>public/assets/img/call-grey.png" width="16px" alt=""> For
                                enqueries call: +971
                                503056430</p>
                            <hr>
                        </div>
                        <div class="course_disc it-course-details-nav">
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                                    aria-labelledby="nav-home-tab" tabindex="0">
                                    <p><?= $row->long_description ?></p>
                                </div>
                                <div class="tab-pane fade" id="nav-profile" role="tabpanel"
                                    aria-labelledby="nav-profile-tab" tabindex="0">
                                    <?php
                                    $onlineBasic_topic = $this->topic_model->onlineBasic_topic($row->id);
                                    $isFirst = true;

                                    foreach ($onlineBasic_topic as $row2):
                                        ?>
                                        <details class="accordion-detail">
                                            <summary><?= htmlspecialchars($row2->topic_name) ?></summary>
                                            <ul>
                                                <?php
                                                $sid = $row->id;
                                                $tp_id = $row2->id;
                                                $cur_dtl = $this->curriculum_model->curriculum($sid, $tp_id);
                                                foreach ($cur_dtl as $row3):
                                                    ?>
                                                    <li><?= htmlspecialchars($row3->sub_topic_name) ?></li>
                                                <?php endforeach; ?>
                                            </ul>
                                        </details>
                                        <?php $isFirst = false; ?>
                                    <?php endforeach; ?>

                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>

                </div>
                <div class="col-md-4 offset-lg-1 order-1 order-md-2">
                    <div class=" sticky-top " style="top: 100px;">
                        <div class="course_details_card mb-4">
                            <div class="row">
                                <div class="col-lg-12">
                                    <h3>Enquiry Now</h3>

                                    <form action="<?= base_url('website/submit_course_form_data') ?>" method="POST">
                                        <div class="row">
                                            <?php foreach ($online_course_view as $row): ?>
                                                <input type="hidden" name="course_name" value="<?= $row->course_name ?>">
                                            <?php endforeach; ?>
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label for="name" class="form-label">Name*</label>
                                                    <input type="text" class="form-control" name="name" id="name"
                                                        placeholder="" required />
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label for="email" class="form-label">Email*</label>
                                                    <input type="email" class="form-control" name="email" id="email"
                                                        placeholder="" required />
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label for="mobile" class="form-label">Mobile Number*</label>
                                                    <input type="text" class="form-control" name="mobile" id="mobile"
                                                        placeholder="" required />
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <button type="submit" value="submit" name="submit"
                                                        class="mainthemebutton py-3 w-100 text-center fs-bold">
                                                        Send Message
                                                        <span>
                                                            <img src="<?= base_url() ?>public/assets/img/form_btn_icon.png"
                                                                width="30px" alt="">
                                                        </span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <?php foreach ($online_course_view as $row): ?>
                            <div class="course_details_card">
                                <img src="<?= base_url('uploads/course/') . $row->course_image; ?>" class="img-fluid"
                                    alt="">
                                <div class="course_Fees my-2 d-flex justify-content-between">
                                    <p class=" fs-5 ">Course Fee</p>
                                    <p class=" fs-5 fw-bold"><?= $row->price ?> AED</p>
                                </div>
                                <?php if ($this->session->userdata('role') == '') { ?>
                                    <a href="<?= base_url() ?>login" class="mainthemebutton d-block text-center mb-4">Enroll Now
                                        <i class="ri-arrow-right-up-line fw-bold bg-black rounded-circle text-warning"
                                            style=" padding: 4px;font-size: 12px;"></i></a>
                                <?php } else { ?>
                                    <a href="<?= base_url("TabbyPayment/create_checkout/" . $row->id) ?>"
                                        class="mainthemebutton d-block text-center mb-4">Book Now <i
                                            class="ri-arrow-right-up-line fw-bold bg-black rounded-circle text-warning"
                                            style=" padding: 4px;font-size: 12px;"></i></a>
                                <?php } ?>
                                <div class="course_Fees d-flex justify-content-between">
                                    <p class=" fs-6 d-flex align-item-center "> <img
                                            src="<?= base_url() ?>public/assets/img/course_details_icon_card_1.png"
                                            height="20px" class="me-2" alt="">
                                        Duration</p>
                                    <p class=" fs-6 "><?= $row->duration ?></p>
                                </div>
                                <div class="course_Fees d-flex justify-content-between">
                                    <p class=" fs-6 d-flex align-item-center "> <img
                                            src="<?= base_url() ?>public/assets/img/course_details_icon_card_2.png"
                                            height="20px" class="me-2" alt="">
                                        Mode</p>
                                    <p class=" fs-6 "><?= $row->mode ?></p>
                                </div>
                                <div class="course_Fees d-flex justify-content-between">
                                    <p class=" fs-6 d-flex align-item-center "> <img
                                            src="<?= base_url() ?>public/assets/img/course_details_icon_card_3.png"
                                            height="20px" class="me-2" alt="">
                                        Language</p>
                                    <p class=" fs-6 "><?= $row->language ?></p>
                                </div>
                                <div class="course_Fees d-flex justify-content-between">
                                    <p class=" fs-6 d-flex align-item-center "> <img
                                            src="<?= base_url() ?>public/assets/img/course_details_icon_card_4.png"
                                            height="20px" class="me-2" alt="">
                                        Certificate</p>
                                    <p class=" fs-6 ">Yes</p>
                                </div>
                            </div>
                        <?php endforeach; ?>

                    </div>

                </div>
            </div>
        </div>
    </section>

    <section class="benefit">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h5 class="text-primary">Benefits </h5>
                    <h2>Elevate Your Learning Journey With Us</h2>
                    <div class="benefits-tbl">
                        <table>
                            <tr>
                                <th>Benefits</th>
                                <th>Online Mode</th>
                                <th>Offline Mode</th>
                            </tr>
                            <tr class="highlight">
                                <td>
                                    <img src="<?= base_url() ?>public/assets/img/table_icon_1.png" width="30px" alt="">
                                    Access to Everyone
                                </td>
                                <td class="icon"><img src="<?= base_url() ?>public/assets/img/green_tick.png"
                                        width="30px" alt=""></td>
                                <td class="icon"><img src="<?= base_url() ?>public/assets/img/green_tick.png"
                                        width="30px" alt=""></td>
                            </tr>
                            <tr>
                                <td>
                                    <img src="<?= base_url() ?>public/assets/img/table_icon_2.png" width="30px" alt="">
                                    Flexible Learning
                                </td>
                                <td class="icon"><img src="<?= base_url() ?>public/assets/img/green_tick.png"
                                        width="30px" alt=""></td>
                                <td class="icon"><img src="<?= base_url() ?>public/assets/img/green_tick.png"
                                        width="30px" alt=""></td>
                            </tr>
                            <tr class="highlight">
                                <td>
                                    <img src="<?= base_url() ?>public/assets/img/table_icon_3.png" width="30px" alt="">
                                    Career Support
                                </td>
                                <td class="icon"><img src="<?= base_url() ?>public/assets/img/green_tick.png"
                                        width="30px" alt=""></td>
                                <td class="icon"><img src="<?= base_url() ?>public/assets/img/green_tick.png"
                                        width="30px" alt=""></td>
                            </tr>
                            <tr>
                                <td>
                                    <img src="<?= base_url() ?>public/assets/img/table_icon_4.png" width="30px" alt="">
                                    Certification at
                                    Completion
                                </td>
                                <td class="icon"><img src="<?= base_url() ?>public/assets/img/green_tick.png"
                                        width="30px" alt=""></td>
                                <td class="icon"><img src="<?= base_url() ?>public/assets/img/green_tick.png"
                                        width="30px" alt=""></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="Certification pt-0">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="Certification_left">
                        <h5 class="text-primary">Certification</h5>
                        <h2>Earn & Share Your Certificate</h2>
                        <ul class="list-inline mt-5">
                            <li class="d-flex">
                                <img src="<?= base_url() ?>public/assets/img/certificate_1.png" height="50px"
                                    style="margin-right: 10px;" alt="">
                                <div class="disc">

                                    <h4>Official & Recognized</h4>
                                    <p>Earn a verified e-certificate from FXCareers Dubai upon successfully completing
                                        your course.</p>
                                </div>
                            </li>
                            <li class="d-flex">
                                <img src="<?= base_url() ?>public/assets/img/certificate_2.png" height="50px"
                                    style="margin-right: 10px;" alt="">
                                <div class="disc">

                                    <h4>Share Your Success</h4>
                                    <p>Highlight your achievement on LinkedIn, your resume, or share it on social
                                        platforms like Instagram and Twitter.</p>
                                </div>
                            </li>
                            <li class="d-flex">
                                <img src="<?= base_url() ?>public/assets/img/certificate_3.png" height="50px"
                                    style="margin-right: 10px;" alt="">
                                <div class="disc">

                                    <h4>Boost Your Career</h4>
                                    <p>Enhance your professional profile and gain a competitive edge with a
                                        certification that stands out to recruiters.</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6">
                    <img src="<?= base_url() ?>public/assets/img/certificate_img.png" class="img-fluid" alt="">
                </div>
            </div>
        </div>
    </section>

    <section class="related_courses  courses pt-0">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h5 class="text-primary">Related Courses</h5>
                    <h2>Explore Related Courses</h2>
                </div>

            </div>
            <div class="row g-4 mt-4">
                <?php
                $counter = 0;
                foreach ($online_courses_view as $row):
                    if ($counter >= 3)
                        break;
                    $counter++;
                    ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="card">
                            <div class="course_img position-relative">
                                <img src="<?= base_url('uploads/course/') . $row->course_image; ?>" class="img-fluid"
                                    alt="">
                            </div>
                            <div class="card-body">
                                <div class="card-title mb-4 d-flex justify-content-between align-item-center">
                                    <h6 class=" mb-0 fw-semibold lineclamp_2"><?= $row->course_name ?></h6>
                                    <span class="course-mode d-flex align-items-center"><?= $row->mode ?></span>
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
                                        <a href="<?= base_url() ?>course-details/<?= str_replace(' ', '-', strtolower($row->course_name)); ?>"
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
    </section>

</main>

<script>
    const toggle = document.getElementById('toggle');
    const toggleText = document.querySelector('.toggle-text');
    const toggleLabel = document.querySelector('.toggle-label');

    if (!toggle.checked) {
        toggleText.textContent = 'Online';
        toggleLabel.classList.remove('active');
    }

    toggle.addEventListener('change', function () {
        const url = new URL(window.location.href);

        if (this.checked) {
            toggleText.textContent = 'Offline';
            toggleLabel.classList.add('active');
            url.searchParams.set('mode', 'offline');
        } else {
            toggleText.textContent = 'Online';
            toggleLabel.classList.remove('active');
            url.searchParams.set('mode', 'online');
        }

        window.location.href = url.toString();
    });
</script>
<main>
    <!-- breadcrumb-area-start -->
    <div class="it-breadcrumb-area it-breadcrumb-bg"
        data-background="<?= base_url() ?>public/web/assets/img/breadcrumb/breadcrumb.jpg">
        <div class="container">
            <div class="row ">
                <div class="col-md-12">
                    <div class="it-breadcrumb-content z-index-3 text-center">
                        <div class="it-breadcrumb-title-box">
                            <h3 class="it-breadcrumb-title">Course Details</h3>
                        </div>
                        <div class="it-breadcrumb-list-wrap">
                            <div class="it-breadcrumb-list">
                                <span><a href="<?= base_url() ?>">Home</a></span>
                                <span class="dvdr">//</span>
                                <span>Course</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb-area-end -->

    <!-- course-details-area-start -->
    <?php foreach ($detail_view as $row): ?>
        <?php
        $id = $row->id;
        ?>
        <div class="it-course-details-area pt-120 pb-100">
            <div class="container">
                <div class="row">
                    <div class="col-xl-9 col-lg-8">
                        <div class="it-course-details-wrap">
                            <div class="it-evn-details-thumb mb-35">
                                <img src="assets/img/course/thumbail1.png" alt="">
                            </div>

                            <h4 class="it-evn-details-title mb-0 pb-5"><?= $row->course_name ?></h4>
                            <div class="postbox__meta">
                                <span><i class="fa-light fa-file-invoice"></i>Lesson <?= $row->lesson ?></span>
                                <span><i class="fa-light fa-clock"></i>9.00AM- 01.00 PM</span>
                                <span><i class="fa-light fa-user"></i>Students 20+</span>
                            </div>
                            <div class="it-course-details-nav pb-60">
                                <nav>
                                    <div class="nav nav-tab" id="nav-tab" role="tablist">
                                        <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab"
                                            data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home"
                                            aria-selected="true">overview</button>
                                        <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab"
                                            data-bs-target="#nav-profile" type="button" role="tab"
                                            aria-controls="nav-profile" aria-selected="false">curriculum</button>
                                        <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab"
                                            data-bs-target="#nav-contact" type="button" role="tab"
                                            aria-controls="nav-contact" aria-selected="false">instructor</button>
                                        <button class="nav-link" id="nav-reviews-tab" data-bs-toggle="tab"
                                            data-bs-target="#nav-reviews" type="button" role="tab"
                                            aria-controls="nav-reviews" aria-selected="false">reviews</button>
                                    </div>
                                </nav>
                            </div>
                            <div class="it-course-details-content">
                                <div class="tab-content" id="nav-tabContent">
                                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                                        aria-labelledby="nav-home-tab">
                                        <div class="it-course-details-wrapper">
                                            <div class="it-evn-details-text mb-40">
                                                <h6 class="it-evn-details-title-sm pb-5">Course Description</h6>

                                                <p><?= $row->long_description ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade show active" id="nav-profile" role="tabpanel"
                                        aria-labelledby="nav-profile-tab">
                                        <div class="it-course-details-wrapper">
                                            <div class="it-evn-details-text mb-40">
                                                <h6 class="it-evn-details-title-sm pb-5">Curriculum</h6>
                                                <?php
                                                $onlineBasic_topic = $this->topic_model->onlineBasic_topic($row->id);
                                                $isFirst = true;
                                                foreach ($onlineBasic_topic as $row2) { ?>
                                                    <details class="accordion-detail" <?= $isFirst ? 'open' : '' ?>>
                                                        <summary class="accordion-summary">
                                                            <?= htmlspecialchars($row2->topic_name) ?>
                                                        </summary>
                                                        <div class="accordion-content">
                                                            <?php
                                                            $sid = $row->id;
                                                            $tp_id = $row2->id;
                                                            $cur_dtl = $this->curriculum_model->curriculum($sid, $tp_id);
                                                            foreach ($cur_dtl as $row3) { ?>
                                                                <div class="accordion-item">
                                                                    <ul>
                                                                        <li><?= htmlspecialchars($row3->sub_topic_name) ?></li>
                                                                    </ul>
                                                                </div>
                                                            <?php } ?>
                                                        </div>
                                                    </details>
                                                    <?php $isFirst = false; ?>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4">
                <div class="it-evn-sidebar-box it-course-sidebar-box">
                    <div class="it-evn-sidebar-thumb mb-30">
                        <img src="<?= base_url('uploads/course/') . $row->course_image; ?>" alt="">
                    </div>
                    <div class="it-course-sidebar-rate-box pb-20">
                        <div class="it-course-sidebar-rate d-flex justify-content-between align-items-center">
                            <span>course fee</span>
                            <span class="rate"><?= $row->price ?> AED <i></i></span>
                        </div>
                        <i>29-da money-back guarantee</i>
                    </div>
                    <?php if ($this->session->userdata('role') == '') { ?>
                        <a class="it-btn w-100 text-center mb-20" href="<?= base_url() ?>login">
                            <span>
                                Enroll now
                                <svg width="17" height="14" viewBox="0 0 17 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M11 1.24023L16 7.24023L11 13.2402" stroke="currentcolor" stroke-width="1.5"
                                        stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M1 7.24023H16" stroke="currentcolor" stroke-width="1.5" stroke-miterlimit="10"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </span>
                        </a>
                    <?php } else { ?>
                        <a class="it-btn w-100 text-center mb-20" href="<?= base_url("TabbyPayment/create_checkout/" . $row->id) ?>">
                            <span>
                                Book now
                                <svg width="17" height="14" viewBox="0 0 17 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M11 1.24023L16 7.24023L11 13.2402" stroke="currentcolor" stroke-width="1.5"
                                        stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M1 7.24023H16" stroke="currentcolor" stroke-width="1.5" stroke-miterlimit="10"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </span>
                        </a>
                    <?php } ?>
                    <div class="it-evn-sidebar-list">
                        <ul>
                            <li><span> <i class="fa-regular fa-clock"></i> Duration</span>
                                <span><?= $row->duration ?></span>
                            </li>
                            <li><span> <i class="fa-solid fa-toggle-off"></i>
                                    Mode</span><span><?= $row->mode ?></span></li>
                            <li><span> <i class="fa-solid fa-globe"></i> Lessons</span><span><?= $row->lesson ?>
                                    lessons</span></li>
                            <li><span> <i class="fa-solid fa-medal"></i> Certificate</span><span>Yes</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        </div>
        </div>
    <?php endforeach; ?>
    <!-- course-details-area-end -->



</main>
<!-- footer Include  -->


<style>
    .it-course-details-wrapper {
        padding: 20px;
        border-radius: 8px;
    }

    .it-evn-details-text {
        font-family: Arial, sans-serif;
    }

    .it-evn-details-title-sm {
        font-size: 1.25em;
        color: #333;
    }

    .accordion-detail {
        margin-bottom: 15px;
        border: 1px solid #ddd;
        border-radius: 4px;
        background-color: #fff;
        overflow: hidden;
    }

    .accordion-detail summary {
        padding: 10px;
        font-weight: bold;
        background-color: #e7e7e7;
        cursor: pointer;
    }

    .accordion-item {
        padding: 10px;
        border-top: 1px solid #ddd;
    }

    .accordion-item ul {
        list-style-type: disc;
        padding-left: 20px;
    }

    .accordion-item ul li {
        margin-bottom: 5px;
    }
</style>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
    // Show the content of the first tab by default
    $('.accordion-detail:first').attr('open', true);
    $('.accordion-content:first').show();

    $('.accordion-summary').click(function() {
        var $summary = $(this);
        var $details = $summary.parent('details');
        var $content = $summary.next('.accordion-content');

        if ($details.attr('open')) {
            $details.removeAttr('open');
            $content.slideUp();
        } else {
            // Close all other tabs
            $('details.accordion-detail').removeAttr('open');
            $('.accordion-content').slideUp();

            // Open the clicked tab
            $details.attr('open', true);
            $content.slideDown();
        }
    });
});
</script>
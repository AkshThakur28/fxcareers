<main>

    <!-- breadcrumb-area-start -->
    <div class="it-breadcrumb-area it-breadcrumb-bg" data-background="<?= base_url() ?>public/web/assets/img/breadcrumb/breadcrumb.jpg">
        <div class="container">
            <div class="row ">
                <div class="col-md-12">
                    <div class="it-breadcrumb-content z-index-3 text-center">
                        <div class="it-breadcrumb-title-box">
                            <h3 class="it-breadcrumb-title">Sitemap</h3>
                        </div>
                        <div class="it-breadcrumb-list-wrap">
                            <div class="it-breadcrumb-list">
                                <span><a href="<?= base_url() ?>">home</a></span>
                                <span class="dvdr">//</span>
                                <span>Sitemap</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb-area-end -->
    <Section class="pt-80 pb-80">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="sitemap-links">
                        <h3>Sitemap</h3>
                        <ul class="mt-4">
                            <?php foreach($sitemap_view as $row):?>
                            <li> <i class="fa-solid fa-circle-check"></i><a href="<?= $row->page_url?>"><?= $row->page_name ?></a></li>
                            <?php endforeach;?>
                            <!--<li> <i class="fa-solid fa-circle-check"></i>About Us-->
                            <!--    <ul class="sub-ul">-->
                            <!--        <li> <i class="fa-solid fa-circle-check"></i><a href="https://fxcareers.ae/about-us">About Institute</a></li>-->
                            <!--        <li> <i class="fa-solid fa-circle-check"></i><a href="https://fxcareers.ae/gallery">Gallery</a></li>-->
                            <!--    </ul>-->
                            <!--</li>-->
                            <!--<li><i class="fa-solid fa-circle-check"></i>Courses-->
                            <!--    <ul class="sub-ul">-->
                            <!--        <li><i class="fa-solid fa-circle-check"></i><a href="https://fxcareers.ae/classroom-courses">Classroom Courses</a></li>-->
                            <!--        <li><i class="fa-solid fa-circle-check"></i><a href="https://fxcareers.ae/courses">Online Courses</a></li>-->
                            <!--    </ul>-->
                            <!--</li>-->
                            <!--<li><i class="fa-solid fa-circle-check"></i>Sessions-->
                            <!--    <ul class="sub-ul">-->
                            <!--        <li><i class="fa-solid fa-circle-check"></i><a href="https://fxcareers.ae/one-to-one-session">One To One Sessions</a></li>-->
                            <!--        <li><i class="fa-solid fa-circle-check"></i><a href="https://fxcareers.ae/become-partner">Become Partner</a></li>-->
                            <!--    </ul>-->
                            <!--</li>-->
                            <!--<li> <i class="fa-solid fa-circle-check"></i><a href="https://fxcareers.ae/research-report">Research Reports</a></li>-->
                            <!--<li><i class="fa-solid fa-circle-check"></i><a href="https://fxcareers.ae/e-books">E-books</a></li>-->
                            <!--<li><i class="fa-solid fa-circle-check"></i><a href="https://fxcareers.ae/blog">Blog</a></li>-->
                            <!--<li><i class="fa-solid fa-circle-check"></i><a href="https://fxcareers.ae/contact">Contact</a></li>-->
                            <!--<li><i class="fa-solid fa-circle-check"></i><a href="https://fxcareers.ae/login">Login</a></li>-->
                            <!--<li><i class="fa-solid fa-circle-check"></i><a href="https://fxcareers.ae/register">Register</a></li>-->
                            <!--<li><i class="fa-solid fa-circle-check"></i><a href="https://fxcareers.ae/disclaimer">Disclaimer</a></li>-->
                            <!--<li><i class="fa-solid fa-circle-check"></i><a href="https://fxcareers.ae/privacy-policy">Privacy Policy</a></li>-->
                            <!--<li><i class="fa-solid fa-circle-check"></i><a href="https://fxcareers.ae/careers">Career</a></li>-->
                            <!--<li><i class="fa-solid fa-circle-check"></i><a href="https://fxcareers.ae/refund-policy">Refund Policy</a></li>-->
                            <!--<li><i class="fa-solid fa-circle-check"></i><a href="https://fxcareers.ae/terms-and-conditions">Terms &amp; Conditions</a>-->
                            <!--</li>-->
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </Section>
</main>
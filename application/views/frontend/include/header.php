<?php
$this->load->helper('url');

$current_uri = uri_string();
$segments = explode('/', $current_uri);
$page_name = end($segments);
$canonical = base_url() . $page_name;

if ($page_name == '') {
    $page_name = 'index';
}
$seo_data = $this->Seo_model->getseo_data($page_name);
$seo_data_blog = $this->Blog_model->blog_detail_data_seo($page_name);
$seo_course_data = $this->detail_model->course_detail_data_seo($page_name);

$title = "";
$meta_description = '';
$keywords = '';

if ($seo_data) {
    $row = reset($seo_data);
    $title = $row->title;
    $keywords = $row->keywords;
    $meta_description = $row->meta_description;
} elseif ($seo_data_blog) {
    function compareStrings($str1, $str2)
    {
        $len1 = mb_strlen($str1);
        $len2 = mb_strlen($str2);

        if ($len1 !== $len2) {
            return false;
        }

        for ($i = 0; $i < $len1; $i++) {
            $char1 = str_replace([" ", "-"], "", mb_substr($str1, $i, 1));
            $char2 = str_replace([" ", "-"], "", mb_substr($str2, $i, 1));

            if (ord($char1) !== ord($char2)) {
                return false;
            }
        }

        return true;
    }

    function displayAsciiValues($str)
    {
        $len = mb_strlen($str);
        for ($i = 0; $i < $len; $i++) {
            echo mb_substr($str, $i, 1) . ' => ' . ord(mb_substr($str, $i, 1)) . '<br>';
        }
    }

    function cleanString($str)
    {
        $str = str_replace(["...", "..."], ["...", "..."], $str);
        return $str;
    }

    foreach ($seo_data_blog as $row) {
        $slugFromData = strtolower(trim($row->seo_title));
        $pageName = strtolower(trim($page_name));

        $encodingSlug = mb_detect_encoding($slugFromData);
        $encodingPage = mb_detect_encoding($pageName);

        if ($encodingSlug !== 'UTF-8') {
            $slugFromData = mb_convert_encoding($slugFromData, 'UTF-8', $encodingSlug);
        }

        if ($encodingPage !== 'UTF-8') {
            $pageName = mb_convert_encoding($pageName, 'UTF-8', $encodingPage);
        }
        $cleanedSlug = cleanString($slugFromData);
        $cleanedPageName = cleanString($pageName);

        if (compareStrings($cleanedSlug, $cleanedPageName)) {
            $row = reset($seo_data_blog);
            $title = $row->seo_title;
            $meta_description = $row->seo_desc;
            $keywords = $row->keywords;
        } else {
            echo ('gg');
        }
    }
} elseif ($seo_course_data) {
    function compareStrings($str1, $str2)
    {
        $len1 = mb_strlen($str1);
        $len2 = mb_strlen($str2);

        if ($len1 !== $len2) {
            return false;
        }

        for ($i = 0; $i < $len1; $i++) {
            $char1 = str_replace([" ", "-"], "", mb_substr($str1, $i, 1));
            $char2 = str_replace([" ", "-"], "", mb_substr($str2, $i, 1));

            if (ord($char1) !== ord($char2)) {
                return false;
            }
        }

        return true;
    }
    function displayAsciiValues($str)
    {
        $len = mb_strlen($str);
        for ($i = 0; $i < $len; $i++) {
            echo mb_substr($str, $i, 1) . ' => ' . ord(mb_substr($str, $i, 1)) . '<br>';
        }
    }

    function cleanString($str)
    {
        $str = str_replace(["...", "..."], ["...", "..."], $str);
        return $str;
    }

    foreach ($seo_course_data as $row) {
        $slugFromData = strtolower(trim($row->course_name));
        $pageName = strtolower(trim($page_name));

        $encodingSlug = mb_detect_encoding($slugFromData);
        $encodingPage = mb_detect_encoding($pageName);

        if ($encodingSlug !== 'UTF-8') {
            $slugFromData = mb_convert_encoding($slugFromData, 'UTF-8', $encodingSlug);
        }

        if ($encodingPage !== 'UTF-8') {
            $pageName = mb_convert_encoding($pageName, 'UTF-8', $encodingPage);
        }
        $cleanedSlug = cleanString($slugFromData);
        $cleanedPageName = cleanString($pageName);

        if (compareStrings($cleanedSlug, $cleanedPageName)) {
            $row = reset($seo_course_data);
            $title = $row->seo_title;
            $meta_description = $row->seo_desc;
            $keywords = $row->seo_keywords;
        } else {
            echo ('gg');
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <meta name="description" content="<?= $meta_description ?>" />
    <meta name="keywords" content="<?= $keywords ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta http-equiv="content-language" content="en-ae" />
    <meta name="distribution" content="global" />
    <meta name="geo.placename" content="Dubai" />
    <meta name="geo.region" content="AE" />
    <meta name="city" content="Dubai" />


    <meta name="geo.position" content="25.222011165830658, 55.28124087567916" />
    <meta name="ICBM" content="25.222011165830658, 55.28124087567916" />
    <meta name="classification" content="Training" />

    <meta property="og:locale" content="en-ae" />

    <meta property="og:title" content="FXCareers - Get the Best Currency Trading Education" />
    <meta property="og:description"
        content="FXCareers offers KHDA-certified training in Forex and Global Stock Markets. Elevate your trading skills and advance your professional journey." />
    <meta property="og:url" content="http://localhost:8080/fxcareers.ae/" />
    <meta property="article:publisher" content="https://www.facebook.com/" />
    <meta property="article:modified_time" content="2024-08-06T18:36:00+00:00" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:site" content="@fxcareersglobal" />
    <meta property="og:title" content="FXCareers - Get the Best Currency Trading Education" />

    <meta property="og:image" content="http://localhost:8080/fxcareers.ae/public/web/assets/img/logo/logo.png" />
    <meta property="og:image:secure_url" content="logo.png" />
    <meta property="og:image:width" content="200" />
    <meta property="og:image:height" content="200" />
    <meta property="og:type" content="summary_large_image" />
    <meta property="og:site_name" content="fxcareersglobal" />
    <meta name="twitter:site" content="@fxcareersglobal" />
    <meta name="twitter:creator" content="@fxcareersglobal" />
    <meta name="twitter:card" content="summary">
    <meta property="og:title" content="FXCareers - Get the Best Currency Trading Education" />
    <meta property="twitter:url" content="http://localhost:8080/fxcareers.ae/">
    <meta property="twitter:image" content="http://localhost:8080/fxcareers.ae/public/web/assets/img/logo/logo.png">
    <meta property="twitter:description"
        content="FXCareers offers KHDA-certified training in Forex and Global Stock Markets. Elevate your trading skills and advance your professional journey.">
    <meta name="yandex-verification" content="0f3bb98ad3a3f1f5" />
    <meta name='robots' content='follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1' />
    <meta name="facebook-domain-verification" content="p5a555d24l87tdj62360pr6knynu6j"   />
    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url() ?>public/assets/img/fxcareers_ae.svg">
    <link rel="stylesheet" href="<?= base_url() ?>public/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/11.0.5/swiper-bundle.min.css"
        integrity="sha512-rd0qOHVMOcez6pLWPVFIv7EfSdGKLt+eafXh4RO/12Fgr41hDQxfGvoi1Vy55QIVcQEujUE1LQrATCLl2Fs+ag=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Fancybox CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.css" />
    <link rel="stylesheet" href="<?= base_url() ?>public/assets/css/animate/animate.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>public/assets/css/odometer/odometer.min.css">
    
    <link rel="stylesheet" href="<?= base_url() ?>public/assets/fonts/remixicon.css">
    <link rel="stylesheet" href="<?= base_url() ?>public/assets/css/style.css">
    <link rel="stylesheet" href="<?= base_url() ?>public/assets/css/landingpage.css">

    <link rel="stylesheet" href="<?= base_url() ?>public/assets/css/responsive.css">
    <link rel="stylesheet" href="<?= base_url() ?>public/assets/intlinput/css/intlTelInput.min.css">
    <link rel="canonical" href="<?= current_url() ?>">
    <!-- Swiper CSS -->

    <script async src="https://www.googletagmanager.com/gtag/js?id=G-PV2NE8KT9W"></script>

    <!-- Google Tag Manager -->
    <script>
        (function (w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-K6MDK6QV');
    </script>
    <!-- End Google Tag Manager -->
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-NS28R9WR84"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-NS28R9WR84');
    </script>
    <!-- End Google tag (gtag.js) -->

</head>

<body>
    <header id="navbar">
        <nav>
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-2">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="logo">
                                <a href="<?= base_url() ?>" class="p-0">
                                    <img id="logo" src="<?= base_url() ?>public/assets/img/fxcareers-logo-white.svg" width="120"
                                        alt="">
                                </a>
                            </div>
                            <div class="language_and_toggle d-flex align-items-center d-lg-none d-block">
                                <!--  <ul class="list-inline me-2">
                                    <li class="global_language text-black d-flex align-items-center">
                                        <div class="language_btn" onclick="toggleLang1()">
                                            <span class="glob_traident">
                                                <i class="ri-global-line fs-5"></i>
                                            </span>
                                            <span class="ms-1">
                                                <i class="ri-arrow-down-s-line fs-5"></i>
                                            </span>
                                        </div>
                                        <div class="language_box" id="langBox1"
                                            style="height: 0px; padding-left: 10px;">
                                            <ul class="list-inline">
                                                <li class="d-flex align-items-center mt-2">
                                                    <div class="fleg"><img src="assets/img/indian_flag.svg" width="20"
                                                            alt="">
                                                    </div>
                                                    <div class="lang ms-2">Hindi</div>
                                                </li>
                                                <li class="d-flex align-items-center mt-2">
                                                    <div class="fleg"><img src="assets/img/indian_flag.svg" width="20"
                                                            alt="">
                                                    </div>
                                                    <div class="lang ms-2">Hindi</div>
                                                </li>
                                                <li class="d-flex align-items-center mt-2">
                                                    <div class="fleg"><img src="assets/img/indian_flag.svg" width="20"
                                                            alt="">
                                                    </div>
                                                    <div class="lang ms-2">Hindi</div>
                                                </li>
                                                <li class="d-flex align-items-center mt-2">
                                                    <div class="fleg"><img src="assets/img/indian_flag.svg" width="20"
                                                            alt="">
                                                    </div>
                                                    <div class="lang ms-2">Hindi</div>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                </ul>-->
                                <button class="btn btn-dark text-warning" onclick="handleShow()">
                                    <i class="ri-menu-3-line"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-10 align-self-center d-lg-block d-none">
                        <div class="pages">
                            <ul class="list-inline mb-0 d-flex justify-content-end align-items-center">
                                <li class="nav_line">
                                    <a class="text-decoration-none nav_color" href="<?= base_url("about-us") ?>">
                                        About Us
                                    </a>
                                </li>
                                <li class="nav_line">
                                    <a class="text-decoration-none nav_color" href="<?= base_url("courses") ?>">
                                        Courses
                                    </a>
                                </li>
                                <li class="nav_line">
                                    <a class="text-decoration-none nav_color" href="<?= base_url("become-partner") ?>">
                                        Be a Partner </a>
                                </li>

                                <li class="dropdown"> <a class="d-flex nav_color  align-items-center more_hover"> More
                                        <span class="more_nav_arrow ms-1"><i
                                                class="ri-arrow-right-up-line fw-bold "></i></span></a>
                                    <div class="desktop_dropdown   ">
                                        <div class="d-flex">
                                            <ul class="list-inline bg-transparent">
                                                <h6>Company</h6>

                                                <li><i class="ri-arrow-right-double-fill"></i> <a
                                                        href="<?= base_url("mentor") ?>" class="text-black">
                                                        Mentors</a>
                                                </li>
                                                <li><i class="ri-arrow-right-double-fill"></i> <a
                                                        href="<?= base_url("gallery") ?>" class="text-black"> Gallery
                                                    </a>
                                                </li>

                                                <li><i class="ri-arrow-right-double-fill"></i> <a
                                                        href="<?= base_url("contact") ?>" class="text-black"> Contact Us
                                                    </a></li>
                                                <li><i class="ri-arrow-right-double-fill"></i> <a
                                                        href="<?= base_url("careers") ?>" class="text-black"> Careers
                                                    </a></li>
                                                <li><i class="ri-arrow-right-double-fill"></i> <a
                                                        href="<?= base_url("terms-and-conditions") ?>"
                                                        class="text-black"> Terms &
                                                        conditions </a></li>
                                            </ul>
                                            <ul class="list-inline bg-transparent">
                                                <h6>Education</h6>
                                                <li><i class="ri-arrow-right-double-fill"></i><a
                                                        href="<?= base_url("courses") ?>" class="text-black"> Courses
                                                    </a>
                                                </li>
                                                <li><i class="ri-arrow-right-double-fill"></i><a
                                                        href="<?= base_url("one-to-one-session") ?>" class="text-black">
                                                        Sessions </a></li>
                                                <li><i class="ri-arrow-right-double-fill"></i> <a
                                                        href="<?= base_url("train-a-trainer") ?>" class="text-black">
                                                        Train a Trainer
                                                    </a></li>
                                                <li><i class="ri-arrow-right-double-fill"></i><a
                                                        href="<?= base_url("blog") ?>" class="text-black"> Blogs </a>
                                                </li>
                                            </ul>
                                            <ul class="list-inline bg-transparent">
                                                <h6>Events</h6>
                                                <li><i class="ri-arrow-right-double-fill"></i><a
                                                        href="<?= base_url("demo-session") ?>" class="text-black"> Demo
                                                        Session </a></li>
                                                <li><i class="ri-arrow-right-double-fill"></i><a
                                                        href="<?= base_url("ladies-special-batch") ?>"
                                                        class="text-black"> Ladies Special Batch </a></li>
                                                <li><i class="ri-arrow-right-double-fill"></i><a
                                                        href="<?= base_url("trade-over-coffee") ?>" class="text-black">
                                                        Trade Over Coffee </a></li>
                                                <li><i class="ri-arrow-right-double-fill"></i><a
                                                        href="<?= base_url("collaboration") ?>" class="text-black">
                                                        Collaboration
                                                    </a></li>
                                                <!-- <li><i class="ri-arrow-right-double-fill"></i> <a href="<?= base_url("disclaimer") ?>"
                                                        class="text-black"> Disclaimer </a></li>
                                                <li><i class="ri-arrow-right-double-fill"></i> <a
                                                        href="<?= base_url("privacy-policy") ?>" class="text-black"> Privacy Policy </a>
                                                </li> -->

                                                <!-- <li><i class="ri-arrow-right-double-fill"></i> <a
                                                        href="<?= base_url("refund-policy") ?>" class="text-black">Refund Policy </a>
                                                </li> -->
                                                <!-- <li><i class="ri-arrow-right-double-fill"></i> <a href=""
                                                        class="text-black"> site Map</a></li> -->
                                            </ul>


                                        </div>
                                    </div>

                                </li>

                                <li>
                                    <?php if ($this->session->userdata('role') == '') { ?>
                                        <a href="<?= base_url("admin/auth/login") ?>"
                                            class="nav_login_btn d-flex align-items-center py-2 px-3 text-white d-inline-block rounded ">
                                            <span>Login</span> <span class="more_nav_arrow ms-1 bg-warning"><i
                                                    class="ri-arrow-right-up-line text-black fw-bold"></i></span>
                                        </a>
                                    <?php } else { ?>
                                        <a href="<?= base_url() ?>admin/dashboard"
                                            class="nav_login_btn d-flex align-items-center py-2 px-3 text-white d-inline-block rounded ">
                                            <span>Dashboard</span> <span class="more_nav_arrow ms-1 bg-warning"><i
                                                    class="ri-arrow-right-up-line text-black fw-bold"></i></span>
                                        </a>
                                    <?php } ?>
                                </li>
                                <li><a href="<?= base_url("enquiry") ?>"
                                        class="enquiry_nav_btn  rounded d-inline-block rounded py-2 px-3">Request a call
                                        Now</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Offcanvas -->

        </nav>

    </header>
    <div class="offcanvas bg-white offcanvas-start d-lg-none d-block h-100" style="z-index: 10000000;     overflow-y: scroll;" id="offcanvasNavbar"
        aria-labelledby="offcanvasNavbarLabel">
        <div class="offcanvas-header">
            <div class="offcanvas-title" id="offcanvasNavbarLabel">
                <div class="logo">
                    <a href="<?= base_url() ?>">
                        <img src="<?= base_url() ?>public/assets/img/fxcareers-logo-black.svg" width="120" alt="">
                    </a>
                </div>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <div class="pages mobile_page">
                <ul class="list-inline mb-0 d-flex flex-column justify-content-start">
                    <a class="text-decoration-none mt-3" href="<?= base_url("about-us") ?>">
                        <li class="nav_line">About Us</li>
                    </a>
                    <a class="text-decoration-none mt-3" href="<?= base_url("courses") ?>">
                        <li class="nav_line">Courses</li>
                    </a>
                    <a class="text-decoration-none mt-3" href="<?= base_url("become-partner") ?>">
                        <li class="nav_line">Be a Partner</li>
                    </a>
                    <li class="mt-3 more_hover" onclick="toggleHeight()">
                        <span class="d-flex"> More <span class="more_nav_arrow ms-1"><i
                                    class="ri-arrow-right-up-line fw-bold "></i></span></span>
                        <div class="mobile_dropdown px-3" id="mobileDropdown"
                            style="height: 0px;overflow: hidden  ;">
                            
                                <div class="row">
                                    <div class="col-6 ">
                                        <h5 class="mt-3">Company</h5>
                                        <span class="d-flex align-items-center"><i
                                                class="ri-arrow-right-double-fill"></i> <a
                                                href="<?= base_url("mentor") ?>">Mentors</a></span>
                                        <span class="d-flex align-items-center"><i
                                                class="ri-arrow-right-double-fill"></i> <a
                                                href="<?= base_url("gallery") ?>">Gallery</a></span>
                                        <span class="d-flex align-items-center"><i
                                                class="ri-arrow-right-double-fill"></i><a
                                                href="<?= base_url("contact") ?>"> Contact
                                                Us</a></span>
                                        <span class="d-flex align-items-center"><i
                                                class="ri-arrow-right-double-fill"></i><a
                                                href="<?= base_url("careers") ?>">
                                                Careers</a></span>
                                        <span class="d-flex align-items-center"><i
                                                class="ri-arrow-right-double-fill"></i><a
                                                href="<?= base_url("terms-and-conditions") ?>">
                                                Terms & conditions</a></span>
                                    </div>
                                    <div class="col-6 ">
                                        <h5 class="mt-3">Education</h5>
                                        <span class="d-flex align-items-center"><i
                                                class="ri-arrow-right-double-fill"></i><a
                                                href="<?= base_url("courses") ?>">Courses</a></span>
                                        <span class="d-flex align-items-center"><i
                                                class="ri-arrow-right-double-fill"></i><a
                                                href="<?= base_url("one-to-one-session") ?>">
                                                Sessions</a></span>
                                        <span class="d-flex align-items-center"><i
                                                class="ri-arrow-right-double-fill"></i><a
                                                href="<?= base_url("blog") ?>">
                                                Blogs</a></span>

                                        <span class="d-flex align-items-center"><i
                                                class="ri-arrow-right-double-fill"></i><a
                                                href="<?= base_url("train-a-trainer") ?>">Train a Trainer</a></span>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <h5 class="mt-3 ">Events</h5>
                                        <!-- <span class="d-flex align-items-center"><i
                                                class="ri-arrow-right-double-fill"></i><a href="<?= base_url("disclaimer") ?>">
                                                Disclaimer</a></span>
                                        <span class="d-flex align-items-center"><i
                                                class="ri-arrow-right-double-fill"></i><a href="<?= base_url("privacy-policy") ?>">
                                                Privacy Policy</a></span> -->

                                        <span class="d-flex align-items-center"><i
                                                class="ri-arrow-right-double-fill"></i><a
                                                href="<?= base_url("demo-session") ?>"> Demo
                                                Session</a></span>
                                        <span class="d-flex align-items-center"><i
                                                class="ri-arrow-right-double-fill"></i><a
                                                href="<?= base_url("ladies-special-batch") ?>"> Ladies Special Batch
                                            </a></span>
                                        <span class="d-flex align-items-center"><i
                                                class="ri-arrow-right-double-fill"></i><a
                                                href="<?= base_url("trade-over-coffee") ?>"> Trade Over Coffee
                                            </a></span>
                                        <span class="d-flex align-items-center"><i
                                                class="ri-arrow-right-double-fill"></i><a
                                                href="<?= base_url("collaboration") ?>"> Collaboration
                                            </a></span>
                                        <!-- <span class="d-flex align-items-center"><i
                                                class="ri-arrow-right-double-fill"></i><a href="<?= base_url("refund-policy") ?>">
                                                Refund Policy</a></span> -->
                                    </div>
                                </div>
                     

                        </div>
                    </li>
                </ul>
                <ul class="list-inline d-flex align-items-center">
                    <li class="mt-2 w-50">
                        <a href="<?= base_url("login") ?>"
                            class="nav_login_btn d-flex align-items-center py-2 px-3 text-white d-inline-block rounded ">
                            <span>Login</span> <span class="more_nav_arrow ms-1 bg-warning"><i
                                    class="ri-arrow-right-up-line text-black fw-bold"></i></span>
                        </a>
                    </li>
                    <li class="mt-2 w-50">
                        <a href="<?= base_url("enquiry") ?>"
                            class="enquiry_nav_btn  rounded d-inline-block rounded py-2 px-3">Enquire
                            Now</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
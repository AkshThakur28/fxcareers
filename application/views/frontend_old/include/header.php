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
// $seo_data_blog = $this->blog_detail_model->blog_detail_data_seo($page_name);
// $seo_course_data = $this->detail_model->course_detail_data_seo($page_name);

$title = "";
$meta_description = '';
$keywords = '';

if ($seo_data) {
   $row = reset($seo_data);
   $title = $row->title;
   $keywords = $row->keywords;
   $meta_description = $row->meta_description;
} elseif ($seo_data) {
   function compareStrings($str1, $str2)
   {
      $len1 = mb_strlen($str1);
      $len2 = mb_strlen($str2);

      if ($len1 !== $len2) {
         return false;
      }

      for ($i = 0; $i < $len1; $i++) {
         // Replace specific characters as needed
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
      // Add additional character replacements as needed
      $str = str_replace(["...", "..."], ["...", "..."], $str);
      // Add more replacements if needed
      return $str;
   }

   // Your original code
   foreach ($seo_data_blog as $row) {
      $slugFromData = strtolower(trim($row->seo_title));
      $pageName = strtolower(trim($page_name));

      // Detect encoding and convert to UTF-8
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
         // Replace specific characters as needed
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
      // Add additional character replacements as needed
      $str = str_replace(["...", "..."], ["...", "..."], $str);
      // Add more replacements if needed
      return $str;
   }

   // Your original code
   foreach ($seo_course_data as $row) {
      $slugFromData = strtolower(trim($row->course_name));
      $pageName = strtolower(trim($page_name));

      // Detect encoding and convert to UTF-8
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

<!doctype html>
<html class="no-js" lang="en-ae">

<head>
   <meta charset="utf-8">
   <meta http-equiv="x-ua-compatible" content="ie=edge">
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
   <meta property="og:url" content="https://fxcareers.ae/" />
   <meta property="article:publisher" content="https://www.facebook.com/" />
   <meta property="article:modified_time" content="2024-08-06T18:36:00+00:00" />
   <meta name="twitter:card" content="summary_large_image" />
   <meta name="twitter:site" content="@fxcareersglobal" />
   <meta property="og:title" content="FXCareers - Get the Best Currency Trading Education" />

   <meta property="og:image" content="https://fxcareers.ae/public/web/assets/img/logo/logo.png" />
   <meta property="og:image:secure_url" content="logo.png" />
   <meta property="og:image:width" content="200" />
   <meta property="og:image:height" content="200" />
   <meta property="og:type" content="summary_large_image" />
   <meta property="og:site_name" content="fxcareersglobal" />
   <meta name="twitter:site" content="@fxcareersglobal" />
   <meta name="twitter:creator" content="@fxcareersglobal" />
   <meta name="twitter:card" content="summary">
   <meta property="og:title" content="FXCareers - Get the Best Currency Trading Education" />
   <meta property="twitter:url" content="https://fxcareers.ae/">
   <meta property="twitter:image" content="https://fxcareers.ae/public/web/assets/img/logo/logo.png">
   <meta property="twitter:description"
      content="FXCareers offers KHDA-certified training in Forex and Global Stock Markets. Elevate your trading skills and advance your professional journey.">
   <meta name="yandex-verification" content="0f3bb98ad3a3f1f5" />
   <meta name='robots' content='follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1' />
   <meta name="facebook-domain-verification" content="p5a555d24l87tdj62360pr6knynu6j"   />
   <link rel="canonical" href="<?= current_url() ?>">


   <!-- Place favicon.ico in the root directory -->
   <link rel="shortcut icon" type="image/x-icon" href="<?= base_url() ?>public/web/assets/img/logo/favicon-1.png">

   <!-- CSS here -->
   <link rel="stylesheet" href="<?= base_url() ?>public/web/assets/css/bootstrap.min.css">
   <link rel="stylesheet" href="<?= base_url() ?>public/web/assets/css/animate.css">
   <link rel="stylesheet" href="<?= base_url() ?>public/web/assets/css/form.css">
   <link rel="stylesheet" href="<?= base_url() ?>public/web/assets/css/custom-animation.css">
   <link rel="stylesheet" href="<?= base_url() ?>public/web/assets/css/slick.css">
   <!-- <link rel="stylesheet" href="<?= base_url() ?>public/web/assets/css/nice-select.css"> -->
   <link rel="stylesheet" href="<?= base_url() ?>public/web/assets/css/flaticon_xoft.css">
   <link rel="stylesheet" href="<?= base_url() ?>public/web/assets/css/swiper-bundle.css">
   <link rel="stylesheet" href="<?= base_url() ?>public/web/assets/css/meanmenu.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
      integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
      crossorigin="anonymous" referrerpolicy="no-referrer" />
   <link rel="stylesheet" href="<?= base_url() ?>public/web/assets/css/font-awesome-pro.css">

   <link rel="stylesheet" href="<?= base_url() ?>public/web/assets/css/magnific-popup.css">
   <link rel="stylesheet" href="<?= base_url() ?>public/web/assets/css/fancybox/fancybox.min.css">
   <link rel="stylesheet" href="<?= base_url() ?>public/web/assets/css/spacing.css">
   <link rel="stylesheet" href="<?= base_url() ?>public/web/assets/css/main.css">
   <link rel="stylesheet" href="<?= base_url() ?>public/web/assets/css/custom.css">
   <!-- Meta Pixel Code -->
   <script>
      !function (f, b, e, v, n, t, s) {
         if (f.fbq) return; n = f.fbq = function () {
            n.callMethod ?
            n.callMethod.apply(n, arguments) : n.queue.push(arguments)
         };
         if (!f._fbq) f._fbq = n; n.push = n; n.loaded = !0; n.version = '2.0';
         n.queue = []; t = b.createElement(e); t.async = !0;
         t.src = v; s = b.getElementsByTagName(e)[0];
         s.parentNode.insertBefore(t, s)
      }(window, document, 'script',
         'https://connect.facebook.net/en_US/fbevents.js');
      fbq('init', '2197436990636494');
      fbq('track', 'PageView');
   </script>
   <noscript><img height="1" width="1" style="display:none"
         src="https://www.facebook.com/tr?id=2197436990636494&ev=PageView&noscript=1" /></noscript>
   <!-- End Meta Pixel Code -->
   <script async src="https://www.googletagmanager.com/gtag/js?id=G-PV2NE8KT9W"></script>
   <!-- Google Tag Manager -->
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
   <!-- End Google Tag Manager -->
   <script type="text/javascript">
      (function (c, l, a, r, i, t, y) {
         c[a] = c[a] || function () { (c[a].q = c[a].q || []).push(arguments) };
         t = l.createElement(r); t.async = 1; t.src = "https://www.clarity.ms/tag/" + i;
         y = l.getElementsByTagName(r)[0]; y.parentNode.insertBefore(t, y);
      })(window, document, "clarity", "script", "nm1io6vkqu");
   </script>

   <!-- Meta Pixel Code -->
   <script>
      !function (f, b, e, v, n, t, s) {
         if (f.fbq) return; n = f.fbq = function () {
            n.callMethod ?
            n.callMethod.apply(n, arguments) : n.queue.push(arguments)
         };
         if (!f._fbq) f._fbq = n; n.push = n; n.loaded = !0; n.version = '2.0';
         n.queue = []; t = b.createElement(e); t.async = !0;
         t.src = v; s = b.getElementsByTagName(e)[0];
         s.parentNode.insertBefore(t, s)
      }(window, document, 'script',
         'https://connect.facebook.net/en_US/fbevents.js');
      fbq('init', '500366819648177');
      fbq('track', 'PageView');
   </script>
   <noscript><img height="1" width="1" style="display:none"
         src="https://www.facebook.com/tr?id=500366819648177&ev=PageView&noscript=1" /></noscript>
   <!-- End Meta Pixel Code -->
   <style>
      .snowflake {
         /* user-select: none;
            pointer-events: none; */
         z-index: 9999;
         color: #a9cce3;
         font-weight: bold;
         font-family: "Arial", sans-serif;

      }
   </style>
</head>

<body id="banner">
   <!-- snow flake -->
   <div></div>
   <!-- Google Tag Manager (noscript) -->
   <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-K6MDK6QV" height="0" width="0"
         style="display:none;visibility:hidden"></iframe></noscript>
   <!-- End Google Tag Manager (noscript) -->
   <!-- preloader -->
   <!-- <div id="preloader">
      <div class="preloader">
         <span></span>
         <span></span>
      </div>
   </div> -->
   <!-- preloader end  -->

   <!-- back-to-top-start  -->
   <button class="scroll-top scroll-to-target" data-target="html">
      <i class="far fa-angle-double-up"></i>
   </button>
   <!-- back-to-top-end  -->


   <!-- it-offcanvus-area-start -->
   <div class="it-offcanvas-area">
      <div class="itoffcanvas">
         <div class="it-offcanva-bottom-shape d-none d-xxl-block">
         </div>
         <div class="itoffcanvas__close-btn">
            <button class="close-btn"><i class="fal fa-times"></i></button>
         </div>
         <div class="itoffcanvas__logo">
            <a href="<?= base_url() ?>">
               <img src="<?= base_url() ?>public/web/assets/img/logo/christmas-logo.svg" alt=""
                  style="max-width: 136px;">
            </a>
         </div>

         <div class="it-menu-mobile"></div>
         <div class="itoffcanvas__info">
            <h3 class="offcanva-title">Get In Touch</h3>
            <div class="it-info-wrapper mb-20 d-flex align-items-center">
               <div class="itoffcanvas__info-icon">
                  <a href="#"><i class="fal fa-envelope"></i></a>
               </div>
               <div class="itoffcanvas__info-address">
                  <span>Email</span>
                  <a href="maito:info@fxcareers.ae">info@fxcareers.ae</a>
               </div>
            </div>
            <div class="it-info-wrapper mb-20 d-flex align-items-center">
               <div class="itoffcanvas__info-icon">
                  <a href="#"><i class="fal fa-phone-alt"></i></a>
               </div>
               <div class="itoffcanvas__info-address">
                  <span>Phone</span>
                  <a href="tel:+971503056430">+971 503056430</a>
               </div>
            </div>
            <div class="it-header-2-button">
               <a class="it-btn" href="<?= base_url() ?>admin/auth/login">
                  <span>
                     Login/Register
                     <svg width="17" height="14" viewBox="0 0 17 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M11 1.24023L16 7.24023L11 13.2402" stroke="white" stroke-width="1.5"
                           stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M1 7.24023H16" stroke="white" stroke-width="1.5" stroke-miterlimit="10"
                           stroke-linecap="round" stroke-linejoin="round" />
                     </svg>
                  </span>
               </a>
            </div>
            <!-- <div class="it-info-wrapper mb-20 d-flex align-items-center">
               <div class="itoffcanvas__info-icon">
                  <a href="#"><i class="fas fa-map-marker-alt"></i></a>
               </div>
               <div class="itoffcanvas__info-address">
                  <span>Location</span>
                  <a href="htits://www.google.com/maps/@37.4801311,22.8928877,3z" target="_blank">Riverside 255,
                     San Francisco, USA </a>
               </div>
            </div> -->
         </div>
      </div>
   </div>
   <div class="body-overlay"></div>
   <!-- it-offcanvus-area-end -->

   <header>

      <div class="it-header-transparent">
         <!-- header-top-area-start -->
         <div class="it-header-2-top-area it-header-2-top-height" style="background: var(--it-theme-1);">
            <div class="container ">
               <div class="row align-items-center">
                  <div class="col-md-4">
                     <div class="it-header-2-top-left">
                        <ul class="text-center text-md-start">
                           <li class="">
                              <a href="tel:+971503056430">
                                 <span>
                                    <i class="fal fa-phone-alt"></i>
                                 </span> +971 503056430
                              </a>
                           </li>
                           <li>
                              <a href="mailto:info@fxcareers.ae">
                                 <span>
                                    <i class="fal fa-envelope"></i>
                                 </span>
                                 info@fxcareers.ae</a>
                           </li>

                        </ul>
                     </div>
                  </div>
                  <div class="col-md-4">
                     <p class="mb-0">
                        <span class="badge p-2 px-3 bg-danger offer-led">OFFER!</span>

                        <a href="https://www.fxcareers.ae/holiday-festivals" class="text-dark"> Christmas Sale, Get Up
                           to 25% OFF!</a>
                     </p>
                  </div>
                  <div class="col-md-4">
                     <div class="it-header-2-top-left logins-bt">
                        <ul class="text-md-end text-center">
                           <?php if ($this->session->userdata('role') == '') { ?>
                              <li class="me-2">
                                 <a href=" <?= base_url() ?>admin/auth/login" class="login-icn">
                                    <span>
                                       <i class="fa-regular fa-user"></i>
                                    </span> Login
                                 </a>
                              </li>
                              <li class="">
                                 <a href=" <?= base_url() ?>register" class="login-icn">
                                    <span>
                                       <i class="fa-regular fa-right-to-bracket"></i>
                                    </span>Register
                                 </a>
                              </li>
                           <?php } else { ?>
                              <li class="me-2">
                                 <a href="<?= base_url() ?>admin/dashboard" class="login-icn">
                                    <span>
                                       <i class="fa-regular fa-user"></i>
                                    </span> Dashboard
                                 </a>
                              </li>
                           <?php } ?>
                        </ul>
                     </div>
                  </div>

               </div>
            </div>
         </div>
         <!-- header-top-area-end -->

         <!-- header-area-start -->
         <div id="header-sticky bg-white" class="it-header-2-area" style="background: #fff !important;">
            <div class="container ">
               <div class="it-header-2-plr">
                  <div class="it-header-wrap py-1 p-relative">
                     <div class="row align-items-center">
                        <div class="col-xl-2 col-5 pe-0 ps-0">
                           <div class="it-header-2-logo" style="width: 70%;">
                              <a href="<?= base_url() ?>"><img
                                    src="<?= base_url() ?>public/web/assets/img/logo/christmas-logo.svg" alt=""
                                    style="max-width: 136px;"></a>
                           </div>
                        </div>
                        <div class="col-xl-7 d-none d-xl-block text-center">
                           <div class="it-header-2-main-menu ">
                              <nav class="it-menu-content">
                                 <ul class="text-center">

                                    <li class="has-dropdown">
                                       <a href="<?=base_url()?>about-us">About Us</a>
                                       <ul class="it-submenu submenu">
                                          <li><a href="<?= base_url() ?>about-us">About Institute</a></li>
                                          <li><a href="<?= base_url() ?>gallery">Gallery</a></li>

                                       </ul>
                                    </li>
                                    <li class="has-dropdown">
                                       <a href="<?= base_url() ?>all-courses">Courses</a>
                                       <ul class="it-submenu submenu">
                                          <li><a href="<?= base_url() ?>classroom-courses">Classroom Courses</a></li>
                                          <li><a href="<?= base_url() ?>courses">Online Courses</a></li>
                                          <!-- <li><a href="<?= base_url() ?>self-learning">Self Learn Courses</a></li> -->
                                       </ul>
                                    </li>
                                    <li class="has-dropdown">
                                       <a href="<?=base_url()?>about-us">Sessions</a>
                                       <ul class="it-submenu submenu">
                                          <li><a href="<?= base_url() ?>one-to-one-session">One To One Sessions</a></li>
                                          <!-- <li><a href="<?= base_url() ?>become-partner">Become Partner</a></li> -->

                                       </ul>
                                    </li>
                                    <li><a href="<?= base_url() ?>become-partner">Become Partner</a></li>
                                    <!-- <li><a href="<?= base_url() ?>research-report">Research Reports</a></li>
                                    <li><a href="<?= base_url() ?>e-books">E-books</a></li> -->
                                    <li><a href="<?= base_url() ?>free-seminars">Free Seminar</a></li>
                                    <!-- <li class="has-dropdown"><a href="">Promotion</a>
                                    <ul class="it-submenu submenu">
                                          <li><a href="https://www.fxcareers.ae/black-friday">50% Bonus</a></li>  </ul>
                                    </li> -->
                                    <li><a href="<?= base_url() ?>blog">Blog</a></li>

                                 </ul>
                              </nav>
                           </div>
                        </div>
                        <div class="col-xl-3 col-7 pe-0 ps-0">
                           <div class="it-header-2-right d-flex align-items-center justify-content-end">
                              <!-- <div class="it-header-2-icon">
                                 <a href="#">
                                    <i class="fa-regular fa-cart-shopping"></i>
                                 </a>
                              </div> -->
                              <div class="it-header-2-button d-none d-sm-block">
                                 <a class="it-btn" href="https://fxcareers.ae/enquiry">
                                    <span>
                                       Enquire Now
                                       <svg width="17" height="14" viewBox="0 0 17 14" fill="none"
                                          xmlns="http://www.w3.org/2000/svg">
                                          <path d="M11 1.24023L16 7.24023L11 13.2402" stroke="white" stroke-width="1.5"
                                             stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                          <path d="M1 7.24023H16" stroke="white" stroke-width="1.5"
                                             stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                       </svg>
                                    </span>
                                 </a>
                              </div>
                              <div class="it-header-2-bar d-xl-none">
                                 <button class="it-menu-bar"><i class="fa-solid fa-bars"></i></button>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- header-area-end -->
      </div>

   </header>
   <script>
      document.addEventListener("DOMContentLoaded", function () {
         const currentDate = new Date();
         const startSnowfallDate = new Date(currentDate.getFullYear(), 10, 1); // November 1
         const endSnowfallDate = new Date(currentDate.getFullYear() + 1, 0, 6); // January 6 next year

         if (currentDate >= startSnowfallDate && currentDate <= endSnowfallDate) {
            const maxFlakes = 3000; // Maximum number of snowflakes on screen
            const flakes = [];
            const snowflakeCharacters = ["❅", "❄", "❆"]; // Different snowflake characters
            const banner = document.getElementById("banner");
            const bannerRect = banner.getBoundingClientRect(); // Get the dimensions of the banner

            setInterval(() => {
               if (flakes.length < maxFlakes) {
                  createSnowflake();
               }
            }, 400);

            function createSnowflake() {
               const snowflake = document.createElement("div");
               snowflake.className = "snowflake";

               // Randomly select a character from the array
               const randomChar = snowflakeCharacters[Math.floor(Math.random() * snowflakeCharacters.length)];
               snowflake.innerHTML = randomChar;
               banner.appendChild(snowflake);
               flakes.push(snowflake);

               const startPosX = Math.random() * bannerRect.width; // Random position within the banner width
               const startOpacity = 1;
               const duration = Math.random() * 2 + 4;
               const size = Math.random() * 10 + 10; // Random size

               snowflake.style.fontSize = `${size}px`;
               snowflake.style.opacity = startOpacity;
               snowflake.style.position = "absolute";
               snowflake.style.color = "white";
               snowflake.style.top = `0px`;
               snowflake.style.zIndex = `100`;
               snowflake.style.left = `${startPosX}px`;

               // Randomly choose a rotation direction
               const rotationDirection = Math.random() > 0.5 ? 1 : -1; // 1 for clockwise, -1 for counterclockwise

               // Animate snowflake within the banner
               snowflake.animate(
                  [
                     { transform: `translate(0, 0) rotate(0deg)` },
                     { transform: `translate(0, ${bannerRect.height}px) rotate(${rotationDirection * 360}deg)` }
                  ],
                  {
                     duration: duration * 5000,
                     easing: "linear",
                     iterations: 1, // Snowflake disappears after reaching the bottom
                  }
               ).onfinish = () => {
                  snowflake.remove(); // Remove snowflake after animation ends
                  flakes.splice(flakes.indexOf(snowflake), 1);
               };
            }
         }
      });
   </script>
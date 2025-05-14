<!-- Start::main-sidebar -->

<aside class="app-sidebar sticky" id="sidebar">

    <!-- Start::main-sidebar-header -->
    <div class="main-sidebar-header">
        <a href="<?= base_url() ?>" class="header-logo">
            <img src="<?= base_url() ?>public/admin/assets/images/brand-logos/desktop-logo.png" alt="logo"
                class="desktop-logo">
            <img src="<?= base_url() ?>public/admin/assets/images/brand-logos/toggle-white.png" alt="logo"
                class="toggle-dark">
            <img src="<?= base_url() ?>public/admin/assets/images/brand-logos/desktop-dark.png" alt="logo"
                class="desktop-dark">
            <img src="<?= base_url() ?>public/admin/assets/images/brand-logos/toggle-logo.png" alt="logo"
                class="toggle-logo">
            <img src="<?= base_url() ?>public/admin/assets/images/brand-logos/toggle-white.png" alt="logo"
                class="toggle-white">
            <img src="<?= base_url() ?>public/admin/assets/images/brand-logos/desktop-white.png" alt="logo"
                class="desktop-white">
        </a>
    </div>
    <!-- End::main-sidebar-header -->
    <?php if ($this->session->userdata('role') == '1'): ?>
        <!-- Start::main-sidebar -->
        <div class="main-sidebar" id="sidebar-scroll">

            <!-- Start::nav -->
            <nav class="main-menu-container nav nav-pills flex-column sub-open">
                <div class="slide-left" id="slide-left">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24" viewBox="0 0 24 24">
                        <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z"></path>
                    </svg>
                </div>
                <ul class="main-menu">
                    <!-- Start::slide__category -->
                    <li class="slide__category"><span class="category-name">Main</span></li>
                    <!-- End::slide__category -->

                    <!-- Start::slide -->
                    <li class="slide has-sub">
                        <a href="<?= base_url('admin/dashboard') ?>" class="side-menu__item">

                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 side-menu__icon" fill="none"
                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                            </svg>
                            <span class="side-menu__label">Dashboard</span>
                        </a>
                        <ul class="slide-menu child1">
                            <li class="slide side-menu__label1">
                                <a href="<?= base_url('admin/dashboard') ?>">Dashboard</a>
                            </li>
                        </ul>
                    </li>
                    <li class="slide has-sub">
                        <a href="javascript:void(0);" class="side-menu__item">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 side-menu__icon" viewBox="0 0 24 24"
                                fill="currentColor" stroke-width="0.2" stroke="currentColor">
                                <path
                                    d="M4 22C4 17.5817 7.58172 14 12 14C16.4183 14 20 17.5817 20 22H18C18 18.6863 15.3137 16 12 16C8.68629 16 6 18.6863 6 22H4ZM12 13C8.685 13 6 10.315 6 7C6 3.685 8.685 1 12 1C15.315 1 18 3.685 18 7C18 10.315 15.315 13 12 13ZM12 11C14.21 11 16 9.21 16 7C16 4.79 14.21 3 12 3C9.79 3 8 4.79 8 7C8 9.21 9.79 11 12 11Z">
                                </path>
                            </svg>
                            <span class="side-menu__label">Admin Profile</span>
                            <i class="ri-arrow-down-s-line side-menu__angle"></i>
                        </a>
                        <ul class="slide-menu child1">
                            <li class="slide side-menu__label1">
                                <a href="javascript:void(0)" class="active-link">Admin Profile</a>
                            </li>
                            <li class="slide">
                                <a href="<?= base_url('admin/profile/view_profile') ?>" class="side-menu__item">Edit
                                    Profile</a>
                            </li>


                        </ul>
                    </li>
                    <!-- End::slide -->

                    <!-- Start::slide__category -->
                    <li class="slide__category"><span class="category-name">Website</span></li>
                    <!-- End::slide__category -->

                    <!-- Start::slide -->
                    <li class="slide has-sub">
                        <a href="javascript:void(0);" class="side-menu__item">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 side-menu__icon" viewBox="0 0 24 24"
                                fill="currentColor" stroke="currentColor" stroke-width="0.1">
                                <path
                                    d="M21 6.75736L19 8.75736V4H10V9H5V20H19V17.2426L21 15.2426V21.0082C21 21.556 20.5551 22 20.0066 22H3.9934C3.44476 22 3 21.5501 3 20.9932V8L9.00319 2H19.9978C20.5513 2 21 2.45531 21 2.9918V6.75736ZM21.7782 8.80761L23.1924 10.2218L15.4142 18L13.9979 17.9979L14 16.5858L21.7782 8.80761Z">
                                </path>
                            </svg>
                            </svg>
                            <span class="side-menu__label">Courses</span>
                            <i class="ri-arrow-down-s-line side-menu__angle"></i>
                        </a>
                        <ul class="slide-menu child1">
                            <li class="slide side-menu__label1">
                                <a href="javascript:void(0)">Courses</a>
                            </li>
                            <li class="slide">
                                <a href="<?= base_url('admin/course/view_course') ?>" class="side-menu__item">All
                                    Courses</a>
                            </li>
                            <li class="slide">
                                <a href="<?= base_url('admin/course/view_course_enquiry') ?>" class="side-menu__item">Course
                                    Enquiries</a>
                            </li>
                        </ul>
                    </li>

                    <li class="slide">
                        <a href="<?= base_url('admin/contact_us/view_contact_us') ?>" class="side-menu__item">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 side-menu__icon" fill="currentColor"
                                viewBox="0 0 24 24">
                                <path
                                    d="M6.62 10.79a15.054 15.054 0 006.59 6.59l2.2-2.2a1.003 1.003 0 011.11-.21c1.12.45 2.33.69 3.58.69a1 1 0 011 1v3.5a1 1 0 01-1 1C10.07 22 2 13.93 2 4a1 1 0 011-1h3.5a1 1 0 011 1c0 1.25.24 2.46.69 3.58a1 1 0 01-.21 1.11l-2.2 2.2z" />
                            </svg>
                            <span class="side-menu__label">Contact Us Data</span>
                        </a>
                    </li>

                    <li class="slide has-sub">
                        <a href="javascript:void(0);" class="side-menu__item">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 side-menu__icon" viewBox="0 0 24 24"
                                fill="currentColor" stroke-width="0.5">
                                <path
                                    d="M8 3C4.13401 3 1 6.13401 1 10C1 13.866 4.13401 17 8 17H9.07089C9.02417 16.6734 9 16.3395 9 16C9 15.6605 9.02417 15.3266 9.07089 15H8C5.23858 15 3 12.7614 3 10C3 7.23858 5.23858 5 8 5H16C18.7614 5 21 7.23858 21 10C21 10.3428 20.9655 10.6775 20.8998 11.0008C21.4853 11.5748 21.9704 12.2508 22.3264 13C22.7583 12.0907 23 11.0736 23 10C23 6.13401 19.866 3 16 3H8ZM16 13C14.3431 13 13 14.3431 13 16C13 17.6569 14.3431 19 16 19C17.6569 19 19 17.6569 19 16C19 14.3431 17.6569 13 16 13ZM11 16C11 13.2386 13.2386 11 16 11C18.7614 11 21 13.2386 21 16C21 17.0191 20.6951 17.967 20.1716 18.7574L22.7071 21.2929L21.2929 22.7071L18.7574 20.1716C17.967 20.6951 17.0191 21 16 21C13.2386 21 11 18.7614 11 16Z">
                                </path>
                            </svg>
                            </svg>
                            <span class="side-menu__label">Seo</span>
                            <i class="ri-arrow-down-s-line side-menu__angle"></i>
                        </a>
                        <ul class="slide-menu child1">
                            <li class="slide side-menu__label1">
                                <a href="javascript:void(0)">Seo</a>
                            </li>
                            <li class="slide">
                                <a href="<?= base_url('admin/seo/view_seo') ?>" class="side-menu__item">All Seo Details</a>
                            </li>
                        </ul>
                    </li>
                    <li class="slide">
                        <a href="<?= base_url('admin/blog/view_blog') ?>" class="side-menu__item">

                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 side-menu__icon" viewBox="0 0 24 24"
                                fill="currentColor" stroke-width="0.2">
                                <path fill="none" d="M0 0h24v24H0z"></path>
                                <path
                                    d="M2 4C2 3.44772 2.44772 3 3 3H21C21.5523 3 22 3.44772 22 4V20C22 20.5523 21.5523 21 21 21H3C2.44772 21 2 20.5523 2 20V4ZM4 5V19H20V5H4ZM6 7H12V13H6V7ZM8 9V11H10V9H8ZM14 9H18V7H14V9ZM18 13H14V11H18V13ZM6 15V17L18 17V15L6 15Z">
                                </path>
                            </svg>
                            <span class="side-menu__label">Blog</span>
                        </a>
                    </li>
                    <li class="slide has-sub">
                        <a href="javascript:void(0);" class="side-menu__item">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 side-menu__icon" viewBox="0 0 24 24"
                                fill="currentColor" stroke-width="0.2">
                                <path
                                    d="M20 13C18.3221 13 16.7514 13.4592 15.4068 14.2587C16.5908 15.6438 17.5269 17.2471 18.1465 19H20V13ZM16.0037 19C14.0446 14.3021 9.4079 11 4 11V19H16.0037ZM4 9C7.82914 9 11.3232 10.4348 13.9738 12.7961C15.7047 11.6605 17.7752 11 20 11V3H21.0082C21.556 3 22 3.44495 22 3.9934V20.0066C22 20.5552 21.5447 21 21.0082 21H2.9918C2.44405 21 2 20.5551 2 20.0066V3.9934C2 3.44476 2.45531 3 2.9918 3H6V1H8V5H4V9ZM18 1V5H10V3H16V1H18ZM16.5 10C15.6716 10 15 9.32843 15 8.5C15 7.67157 15.6716 7 16.5 7C17.3284 7 18 7.67157 18 8.5C18 9.32843 17.3284 10 16.5 10Z">
                                </path>
                            </svg>
                            <span class="side-menu__label">Gallery</span>
                            <i class="ri-arrow-down-s-line side-menu__angle"></i>
                        </a>
                        <ul class="slide-menu child1">
                            <li class="slide side-menu__label1">
                                <a href="javascript:void(0)">Gallery</a>
                            </li>
                            <li class="slide">
                                <a href="<?= base_url('admin/gallery/view_gallery') ?>" class="side-menu__item">View
                                    Gallery</a>
                            </li>
                            <li class="slide">
                                <a href="<?= base_url('admin/gallery/add_gallery_category') ?>" class="side-menu__item">Add
                                    Gallery Category</a>
                            </li>
                        </ul>
                    </li>

                    <li class="slide">
                        <a href="<?= base_url('admin/mentors/view_mentor') ?>" class="side-menu__item">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 side-menu__icon" viewBox="0 0 24 24"
                                fill="currentColor" stroke-width="0.2">
                                <path
                                    d="M12 11C14.7614 11 17 13.2386 17 16V22H15V16C15 14.4023 13.7511 13.0963 12.1763 13.0051L12 13C10.4023 13 9.09634 14.2489 9.00509 15.8237L9 16V22H7V16C7 13.2386 9.23858 11 12 11ZM5.5 14C5.77885 14 6.05009 14.0326 6.3101 14.0942C6.14202 14.594 6.03873 15.122 6.00896 15.6693L6 16L6.0007 16.0856C5.88757 16.0456 5.76821 16.0187 5.64446 16.0069L5.5 16C4.7203 16 4.07955 16.5949 4.00687 17.3555L4 17.5V22H2V17.5C2 15.567 3.567 14 5.5 14ZM18.5 14C20.433 14 22 15.567 22 17.5V22H20V17.5C20 16.7203 19.4051 16.0796 18.6445 16.0069L18.5 16C18.3248 16 18.1566 16.03 18.0003 16.0852L18 16C18 15.3343 17.8916 14.694 17.6915 14.0956C17.9499 14.0326 18.2211 14 18.5 14ZM5.5 8C6.88071 8 8 9.11929 8 10.5C8 11.8807 6.88071 13 5.5 13C4.11929 13 3 11.8807 3 10.5C3 9.11929 4.11929 8 5.5 8ZM18.5 8C19.8807 8 21 9.11929 21 10.5C21 11.8807 19.8807 13 18.5 13C17.1193 13 16 11.8807 16 10.5C16 9.11929 17.1193 8 18.5 8ZM5.5 10C5.22386 10 5 10.2239 5 10.5C5 10.7761 5.22386 11 5.5 11C5.77614 11 6 10.7761 6 10.5C6 10.2239 5.77614 10 5.5 10ZM18.5 10C18.2239 10 18 10.2239 18 10.5C18 10.7761 18.2239 11 18.5 11C18.7761 11 19 10.7761 19 10.5C19 10.2239 18.7761 10 18.5 10ZM12 2C14.2091 2 16 3.79086 16 6C16 8.20914 14.2091 10 12 10C9.79086 10 8 8.20914 8 6C8 3.79086 9.79086 2 12 2ZM12 4C10.8954 4 10 4.89543 10 6C10 7.10457 10.8954 8 12 8C13.1046 8 14 7.10457 14 6C14 4.89543 13.1046 4 12 4Z">
                                </path>
                            </svg>
                            <span class="side-menu__label">Mentors</span>
                        </a>
                    </li>
                    <!-- End::slide -->
                    <!-- Start::slide__category -->
                    <!-- <li class="slide__category"><span class="category-name">Pages</span></li> -->
                    <!-- End::slide__category -->

                    <!-- Start::slide__category -->
                    <li class="slide__category"><span class="category-name">Student</span></li>
                    <!-- End::slide__category -->
                    <li class="slide has-sub">
                        <a href="javascript:void(0);" class="side-menu__item">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 side-menu__icon" viewBox="0 0 24 24"
                                fill="currentColor" stroke-width="0.2">
                                <path fill="none" d="M0 0h24v24H0z"></path>
                                <path
                                    d="M4 11.3333L0 9L12 2L24 9V17.5H22V10.1667L20 11.3333V18.0113L19.7774 18.2864C17.9457 20.5499 15.1418 22 12 22C8.85817 22 6.05429 20.5499 4.22263 18.2864L4 18.0113V11.3333ZM6 12.5V17.2917C7.46721 18.954 9.61112 20 12 20C14.3889 20 16.5328 18.954 18 17.2917V12.5L12 16L6 12.5ZM3.96927 9L12 13.6846L20.0307 9L12 4.31541L3.96927 9Z">
                                </path>
                            </svg>
                            </svg>
                            <span class="side-menu__label">Student</span>
                            <i class="ri-arrow-down-s-line side-menu__angle"></i>
                        </a>
                        <ul class="slide-menu child1">
                            <li class="slide side-menu__label1">
                                <a href="javascript:void(0)">Student</a>
                            </li>
                            <li class="slide">
                                <a href="<?= base_url('admin/users/view_user') ?>" class="side-menu__item">All Students</a>
                            </li>
                        </ul>
                    </li>
                    <!-- Start::slide__category -->
                    <li class="slide__category"><span class="category-name">Study Material</span></li>
                    <!-- End::slide__category -->
                    <li class="slide">
                        <a href="<?= base_url('admin/ebook/view_ebook') ?>" class="side-menu__item">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-6 h-6 side-menu__icon"
                                viewBox="0 0 24 24" fill="currentColor" stroke-width="0.2">
                                <path fill="none" d="M0 0h24v24H0z"></path>
                                <path
                                    d="M21 18H6C5.44772 18 5 18.4477 5 19C5 19.5523 5.44772 20 6 20H21V22H6C4.34315 22 3 20.6569 3 19V4C3 2.89543 3.89543 2 5 2H21V18ZM5 16.05C5.16156 16.0172 5.32877 16 5.5 16H19V4H5V16.05ZM16 9H8V7H16V9Z">
                                </path>
                            </svg>
                            <span class="side-menu__label">eBooks</span>
                        </a>
                    </li>
                    <!-- Start::slide__category -->
                    <li class="slide__category"><span class="category-name">Lead Management</span></li>
                    <!-- End::slide__category -->
                    <li class="slide">
                        <a href="<?= base_url('admin/enquiry/view_enquiries') ?>" class="side-menu__item">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-6 h-6 side-menu__icon"
                                viewBox="0 0 24 24" fill="currentColor" stroke-width="0.2">
                                <path
                                    d="M5.76282 17H20V5H4V18.3851L5.76282 17ZM6.45455 19L2 22.5V4C2 3.44772 2.44772 3 3 3H21C21.5523 3 22 3.44772 22 4V18C22 18.5523 21.5523 19 21 19H6.45455ZM11 14H13V16H11V14ZM8.56731 8.81346C8.88637 7.20919 10.302 6 12 6C13.933 6 15.5 7.567 15.5 9.5C15.5 11.433 13.933 13 12 13H11V11H12C12.8284 11 13.5 10.3284 13.5 9.5C13.5 8.67157 12.8284 8 12 8C11.2723 8 10.6656 8.51823 10.5288 9.20577L8.56731 8.81346Z">
                                </path>
                            </svg>
                            <span class="side-menu__label">Enquiries </span>
                        </a>
                    </li>
                    <li class="slide">
                        <a href="<?= base_url('admin/enquiry/view_follow_up') ?>" class="side-menu__item">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-6 h-6 side-menu__icon"
                                viewBox="0 0 24 24" fill="currentColor" stroke-width="0.2">
                                <path
                                    d="M5.76282 17H20V5H4V18.3851L5.76282 17ZM6.45455 19L2 22.5V4C2 3.44772 2.44772 3 3 3H21C21.5523 3 22 3.44772 22 4V18C22 18.5523 21.5523 19 21 19H6.45455ZM11 14H13V16H11V14ZM8.56731 8.81346C8.88637 7.20919 10.302 6 12 6C13.933 6 15.5 7.567 15.5 9.5C15.5 11.433 13.933 13 12 13H11V11H12C12.8284 11 13.5 10.3284 13.5 9.5C13.5 8.67157 12.8284 8 12 8C11.2723 8 10.6656 8.51823 10.5288 9.20577L8.56731 8.81346Z">
                                </path>
                            </svg>
                            <span class="side-menu__label">Follow Up </span>
                        </a>
                    </li>
                    <li class="slide">
                        <a href="<?= base_url('admin/purchase/purchase_view') ?>" class="side-menu__item">

                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-6 h-6 side-menu__icon"
                                viewBox="0 0 24 24" fill="currentColor" stroke-width="0.2">
                                <path
                                    d="M11.0049 2L18.3032 4.28071C18.7206 4.41117 19.0049 4.79781 19.0049 5.23519V7H21.0049C21.5572 7 22.0049 7.44772 22.0049 8V16C22.0049 16.5523 21.5572 17 21.0049 17L17.7848 17.0011C17.3982 17.5108 16.9276 17.9618 16.3849 18.3318L11.0049 22L5.62486 18.3318C3.98563 17.2141 3.00488 15.3584 3.00488 13.3744V5.23519C3.00488 4.79781 3.28913 4.41117 3.70661 4.28071L11.0049 2ZM11.0049 4.094L5.00488 5.97V13.3744C5.00488 14.6193 5.58406 15.7884 6.56329 16.5428L6.75154 16.6793L11.0049 19.579L14.7869 17H10.0049C9.4526 17 9.00488 16.5523 9.00488 16V8C9.00488 7.44772 9.4526 7 10.0049 7H17.0049V5.97L11.0049 4.094ZM11.0049 12V15H20.0049V12H11.0049ZM11.0049 10H20.0049V9H11.0049V10Z">
                                </path>
                            </svg>
                            <span class="side-menu__label">All Transactions</span>
                        </a>
                    </li>
                    <li class="slide has-sub">
                        <a href="javascript:void(0);" class="side-menu__item">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-6 h-6 side-menu__icon"
                                viewBox="0 0 24 24" fill="currentColor" stroke-width="0.2">
                                <path fill="none" d="M0 0h24v24H0z"></path>
                                <path
                                    d="M5 8V20H19V8H5ZM5 6H19V4H5V6ZM20 22H4C3.44772 22 3 21.5523 3 21V3C3 2.44772 3.44772 2 4 2H20C20.5523 2 21 2.44772 21 3V21C21 21.5523 20.5523 22 20 22ZM7 10H11V14H7V10ZM7 16H17V18H7V16ZM13 11H17V13H13V11Z">
                                </path>
                            </svg>

                            <span class="side-menu__label">Landing Pages</span>
                            <i class="ri-arrow-down-s-line side-menu__angle"></i>
                        </a>
                        <ul class="slide-menu child1">
                            <li class="slide side-menu__label1">
                                <a href="javascript:void(0)">Landing Pages</a>
                            </li>
                            <li class="slide">
                                <a href="<?= base_url('admin/landing_pages/view_landing_pages') ?>"
                                    class="side-menu__item">All Landing Pages</a>
                            </li>
                        </ul>
                    </li>
                    <!-- Start::slide__category -->
                    <li class="slide__category"><span class="category-name">App Management</span></li>
                    <!-- End::slide__category -->
                    <li class="slide">
                        <a href="<?= base_url('admin/slider/view_slider') ?>" class="side-menu__item">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-6 h-6 side-menu__icon"
                                viewBox="0 0 24 24" fill="currentColor" stroke-width="0.2">
                                <path fill="none" d="M0 0h24v24H0z"></path>
                                <path
                                    d="M4 5V19H20V7H11.5858L9.58579 5H4ZM12.4142 5H21C21.5523 5 22 5.44772 22 6V20C22 20.5523 21.5523 21 21 21H3C2.44772 21 2 20.5523 2 20V4C2 3.44772 2.44772 3 3 3H10.4142L12.4142 5ZM10 10.5C10 11.3284 9.32843 12 8.5 12C7.67157 12 7 11.3284 7 10.5C7 9.67157 7.67157 9 8.5 9C9.32843 9 10 9.67157 10 10.5ZM18 17L14 11L7 17H18Z">
                                </path>
                            </svg>
                            <span class="side-menu__label">App Slider </span>
                        </a>
                    </li>

                </ul>
                <div class="slide-right" id="slide-right">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24" viewBox="0 0 24 24">
                        <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z"></path>
                    </svg>
                </div>
            </nav>
            <!-- End::nav -->

        </div>
        <!-- End::main-sidebar -->
    <?php endif; ?>

    <?php if ($this->session->userdata('role') == '2'): ?>
        <!-- Start::main-sidebar -->
        <div class="main-sidebar" id="sidebar-scroll">

            <!-- Start::nav -->
            <nav class="main-menu-container nav nav-pills flex-column sub-open">
                <div class="slide-left" id="slide-left">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24" viewBox="0 0 24 24">
                        <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z"></path>
                    </svg>
                </div>
                <ul class="main-menu">
                    <!-- Start::slide__category -->
                    <li class="slide__category"><span class="category-name">Main</span></li>
                    <!-- End::slide__category -->

                    <!-- Start::slide -->
                    <li class="slide has-sub">
                        <a href="<?= base_url('admin/dashboard') ?>" class="side-menu__item">

                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 side-menu__icon" fill="none"
                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                            </svg>
                            <span class="side-menu__label">Dashboard</span>
                        </a>
                        <ul class="slide-menu child1">
                            <li class="slide side-menu__label1">
                                <a href="<?= base_url('admin/dashboard') ?>">Dashboard</a>
                            </li>
                        </ul>
                    </li>
                    <li class="slide has-sub">
                        <a href="javascript:void(0);" class="side-menu__item">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 side-menu__icon" viewBox="0 0 24 24"
                                fill="currentColor" stroke-width="0.2" stroke="currentColor">
                                <path
                                    d="M4 22C4 17.5817 7.58172 14 12 14C16.4183 14 20 17.5817 20 22H18C18 18.6863 15.3137 16 12 16C8.68629 16 6 18.6863 6 22H4ZM12 13C8.685 13 6 10.315 6 7C6 3.685 8.685 1 12 1C15.315 1 18 3.685 18 7C18 10.315 15.315 13 12 13ZM12 11C14.21 11 16 9.21 16 7C16 4.79 14.21 3 12 3C9.79 3 8 4.79 8 7C8 9.21 9.79 11 12 11Z">
                                </path>
                            </svg>
                            <span class="side-menu__label">Profile</span>
                            <i class="ri-arrow-down-s-line side-menu__angle"></i>
                        </a>
                        <ul class="slide-menu child1">
                            <li class="slide side-menu__label1">
                                <a href="javascript:void(0)" class="active-link">Profile</a>
                            </li>
                            <li class="slide">
                                <a href="<?= base_url('admin/profile/view_profile') ?>" class="side-menu__item">Edit
                                    Profile</a>
                            </li>
                        </ul>
                    </li>
                    <li class="slide">
                        <a href="<?= base_url('admin/purchase/view_purchased_course') ?>" class="side-menu__item">

                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-6 h-6 side-menu__icon"
                                viewBox="0 0 24 24" fill="currentColor" stroke-width="0.2">
                                <path
                                    d="M11.0049 2L18.3032 4.28071C18.7206 4.41117 19.0049 4.79781 19.0049 5.23519V7H21.0049C21.5572 7 22.0049 7.44772 22.0049 8V16C22.0049 16.5523 21.5572 17 21.0049 17L17.7848 17.0011C17.3982 17.5108 16.9276 17.9618 16.3849 18.3318L11.0049 22L5.62486 18.3318C3.98563 17.2141 3.00488 15.3584 3.00488 13.3744V5.23519C3.00488 4.79781 3.28913 4.41117 3.70661 4.28071L11.0049 2ZM11.0049 4.094L5.00488 5.97V13.3744C5.00488 14.6193 5.58406 15.7884 6.56329 16.5428L6.75154 16.6793L11.0049 19.579L14.7869 17H10.0049C9.4526 17 9.00488 16.5523 9.00488 16V8C9.00488 7.44772 9.4526 7 10.0049 7H17.0049V5.97L11.0049 4.094ZM11.0049 12V15H20.0049V12H11.0049ZM11.0049 10H20.0049V9H11.0049V10Z">
                                </path>
                            </svg>
                            <span class="side-menu__label">Purchased Courses</span>
                        </a>
                    </li>
                    <!-- End::slide__category -->
                    <li class="slide">
                        <a href="<?= base_url('admin/purchase/purchase_view') ?>" class="side-menu__item">

                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-6 h-6 side-menu__icon"
                                viewBox="0 0 24 24" fill="currentColor" stroke-width="0.2">
                                <path
                                    d="M11.0049 2L18.3032 4.28071C18.7206 4.41117 19.0049 4.79781 19.0049 5.23519V7H21.0049C21.5572 7 22.0049 7.44772 22.0049 8V16C22.0049 16.5523 21.5572 17 21.0049 17L17.7848 17.0011C17.3982 17.5108 16.9276 17.9618 16.3849 18.3318L11.0049 22L5.62486 18.3318C3.98563 17.2141 3.00488 15.3584 3.00488 13.3744V5.23519C3.00488 4.79781 3.28913 4.41117 3.70661 4.28071L11.0049 2ZM11.0049 4.094L5.00488 5.97V13.3744C5.00488 14.6193 5.58406 15.7884 6.56329 16.5428L6.75154 16.6793L11.0049 19.579L14.7869 17H10.0049C9.4526 17 9.00488 16.5523 9.00488 16V8C9.00488 7.44772 9.4526 7 10.0049 7H17.0049V5.97L11.0049 4.094ZM11.0049 12V15H20.0049V12H11.0049ZM11.0049 10H20.0049V9H11.0049V10Z">
                                </path>
                            </svg>
                            <span class="side-menu__label">All Transactions</span>
                        </a>
                    </li>
                    <!-- End::slide__category -->
                    <li class="slide">
                        <a href="<?= base_url('admin/ebook/view_ebook') ?>" class="side-menu__item">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-6 h-6 side-menu__icon"
                                viewBox="0 0 24 24" fill="currentColor" stroke-width="0.2">
                                <path fill="none" d="M0 0h24v24H0z"></path>
                                <path
                                    d="M21 18H6C5.44772 18 5 18.4477 5 19C5 19.5523 5.44772 20 6 20H21V22H6C4.34315 22 3 20.6569 3 19V4C3 2.89543 3.89543 2 5 2H21V18ZM5 16.05C5.16156 16.0172 5.32877 16 5.5 16H19V4H5V16.05ZM16 9H8V7H16V9Z">
                                </path>
                            </svg>
                            <span class="side-menu__label">eBooks</span>
                        </a>
                    </li>
                    <li class="slide">
                        <a href="<?= base_url('admin/blog/view_blog') ?>" class="side-menu__item">

                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 side-menu__icon" viewBox="0 0 24 24"
                                fill="currentColor" stroke-width="0.2">
                                <path fill="none" d="M0 0h24v24H0z"></path>
                                <path
                                    d="M2 4C2 3.44772 2.44772 3 3 3H21C21.5523 3 22 3.44772 22 4V20C22 20.5523 21.5523 21 21 21H3C2.44772 21 2 20.5523 2 20V4ZM4 5V19H20V5H4ZM6 7H12V13H6V7ZM8 9V11H10V9H8ZM14 9H18V7H14V9ZM18 13H14V11H18V13ZM6 15V17L18 17V15L6 15Z">
                                </path>
                            </svg>
                            <span class="side-menu__label">Blog</span>
                        </a>
                    </li>
                </ul>
                <div class="slide-right" id="slide-right">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24" viewBox="0 0 24 24">
                        <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z"></path>
                    </svg>
                </div>
            </nav>
            <!-- End::nav -->

        </div>
        <!-- End::main-sidebar -->
    <?php endif; ?>
    <?php if ($this->session->userdata('role') == '4'): ?>
        <!-- Start::main-sidebar -->
        <div class="main-sidebar" id="sidebar-scroll">

            <!-- Start::nav -->
            <nav class="main-menu-container nav nav-pills flex-column sub-open">
                <div class="slide-left" id="slide-left">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24" viewBox="0 0 24 24">
                        <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z"></path>
                    </svg>
                </div>
                <ul class="main-menu">
                    <!-- Start::slide__category -->
                    <li class="slide__category"><span class="category-name">Main</span></li>
                    <li class="slide">
                        <a href="<?= base_url('admin/enquiry/view_enquiries') ?>" class="side-menu__item">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-6 h-6 side-menu__icon"
                                viewBox="0 0 24 24" fill="currentColor" stroke-width="0.2">
                                <path
                                    d="M5.76282 17H20V5H4V18.3851L5.76282 17ZM6.45455 19L2 22.5V4C2 3.44772 2.44772 3 3 3H21C21.5523 3 22 3.44772 22 4V18C22 18.5523 21.5523 19 21 19H6.45455ZM11 14H13V16H11V14ZM8.56731 8.81346C8.88637 7.20919 10.302 6 12 6C13.933 6 15.5 7.567 15.5 9.5C15.5 11.433 13.933 13 12 13H11V11H12C12.8284 11 13.5 10.3284 13.5 9.5C13.5 8.67157 12.8284 8 12 8C11.2723 8 10.6656 8.51823 10.5288 9.20577L8.56731 8.81346Z">
                                </path>
                            </svg>
                            <span class="side-menu__label">Enquiries </span>
                        </a>
                    </li>
                    <li class="slide">
                        <a href="<?= base_url('admin/course/view_course_enquiry') ?>" class="side-menu__item">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-6 h-6 side-menu__icon"
                                viewBox="0 0 24 24" fill="currentColor" stroke-width="0.2">
                                <path
                                    d="M5.76282 17H20V5H4V18.3851L5.76282 17ZM6.45455 19L2 22.5V4C2 3.44772 2.44772 3 3 3H21C21.5523 3 22 3.44772 22 4V18C22 18.5523 21.5523 19 21 19H6.45455ZM11 14H13V16H11V14ZM8.56731 8.81346C8.88637 7.20919 10.302 6 12 6C13.933 6 15.5 7.567 15.5 9.5C15.5 11.433 13.933 13 12 13H11V11H12C12.8284 11 13.5 10.3284 13.5 9.5C13.5 8.67157 12.8284 8 12 8C11.2723 8 10.6656 8.51823 10.5288 9.20577L8.56731 8.81346Z">
                                </path>
                            </svg>
                            <span class="side-menu__label">Course Enquiries </span>
                        </a>
                    </li>
                    <li class="slide">
                        <a href="<?= base_url('admin/enquiry/view_follow_up') ?>" class="side-menu__item">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-6 h-6 side-menu__icon"
                                viewBox="0 0 24 24" fill="currentColor" stroke-width="0.2">
                                <path
                                    d="M5.76282 17H20V5H4V18.3851L5.76282 17ZM6.45455 19L2 22.5V4C2 3.44772 2.44772 3 3 3H21C21.5523 3 22 3.44772 22 4V18C22 18.5523 21.5523 19 21 19H6.45455ZM11 14H13V16H11V14ZM8.56731 8.81346C8.88637 7.20919 10.302 6 12 6C13.933 6 15.5 7.567 15.5 9.5C15.5 11.433 13.933 13 12 13H11V11H12C12.8284 11 13.5 10.3284 13.5 9.5C13.5 8.67157 12.8284 8 12 8C11.2723 8 10.6656 8.51823 10.5288 9.20577L8.56731 8.81346Z">
                                </path>
                            </svg>
                            <span class="side-menu__label">Follow Up </span>
                        </a>
                    </li>
                    <li class="slide">
                        <a href="<?= base_url('admin/contact_us/view_contact_us') ?>" class="side-menu__item">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 side-menu__icon" fill="currentColor"
                                viewBox="0 0 24 24">
                                <path
                                    d="M6.62 10.79a15.054 15.054 0 006.59 6.59l2.2-2.2a1.003 1.003 0 011.11-.21c1.12.45 2.33.69 3.58.69a1 1 0 011 1v3.5a1 1 0 01-1 1C10.07 22 2 13.93 2 4a1 1 0 011-1h3.5a1 1 0 011 1c0 1.25.24 2.46.69 3.58a1 1 0 01-.21 1.11l-2.2 2.2z" />
                            </svg>
                            <span class="side-menu__label">Contact Us Data</span>
                        </a>
                    </li>
                    <li class="slide__category"><span class="category-name">Student</span></li>
                    <!-- End::slide__category -->
                    <li class="slide has-sub">
                        <a href="javascript:void(0);" class="side-menu__item">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 side-menu__icon" viewBox="0 0 24 24"
                                fill="currentColor" stroke-width="0.2">
                                <path fill="none" d="M0 0h24v24H0z"></path>
                                <path
                                    d="M4 11.3333L0 9L12 2L24 9V17.5H22V10.1667L20 11.3333V18.0113L19.7774 18.2864C17.9457 20.5499 15.1418 22 12 22C8.85817 22 6.05429 20.5499 4.22263 18.2864L4 18.0113V11.3333ZM6 12.5V17.2917C7.46721 18.954 9.61112 20 12 20C14.3889 20 16.5328 18.954 18 17.2917V12.5L12 16L6 12.5ZM3.96927 9L12 13.6846L20.0307 9L12 4.31541L3.96927 9Z">
                                </path>
                            </svg>
                            </svg>
                            <span class="side-menu__label">Student</span>
                            <i class="ri-arrow-down-s-line side-menu__angle"></i>
                        </a>
                        <ul class="slide-menu child1">
                            <li class="slide side-menu__label1">
                                <a href="javascript:void(0)">Student</a>
                            </li>
                            <li class="slide">
                                <a href="<?= base_url('admin/users/view_user') ?>" class="side-menu__item">All Students</a>
                            </li>
                        </ul>
                    </li>
                    <li class="slide has-sub">
                        <a href="javascript:void(0);" class="side-menu__item">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-6 h-6 side-menu__icon"
                                viewBox="0 0 24 24" fill="currentColor" stroke-width="0.2">
                                <path fill="none" d="M0 0h24v24H0z"></path>
                                <path
                                    d="M5 8V20H19V8H5ZM5 6H19V4H5V6ZM20 22H4C3.44772 22 3 21.5523 3 21V3C3 2.44772 3.44772 2 4 2H20C20.5523 2 21 2.44772 21 3V21C21 21.5523 20.5523 22 20 22ZM7 10H11V14H7V10ZM7 16H17V18H7V16ZM13 11H17V13H13V11Z">
                                </path>
                            </svg>

                            <span class="side-menu__label">Landing Pages</span>
                            <i class="ri-arrow-down-s-line side-menu__angle"></i>
                        </a>
                        <ul class="slide-menu child1">
                            <li class="slide side-menu__label1">
                                <a href="javascript:void(0)">Landing Pages</a>
                            </li>
                            <li class="slide">
                                <a href="<?= base_url('admin/landing_pages/view_landing_pages') ?>"
                                    class="side-menu__item">All Landing Pages</a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <div class="slide-right" id="slide-right">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24" viewBox="0 0 24 24">
                        <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z"></path>
                    </svg>
                </div>
            </nav>
            <!-- End::nav -->

        </div>
    <?php endif; ?>
    <?php if ($this->session->userdata('role') == '3'): ?>
        <!-- Start::main-sidebar -->
        <div class="main-sidebar" id="sidebar-scroll">

            <!-- Start::nav -->
            <nav class="main-menu-container nav nav-pills flex-column sub-open">
                <div class="slide-left" id="slide-left">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24" viewBox="0 0 24 24">
                        <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z"></path>
                    </svg>
                </div>
                <ul class="main-menu">
                    <!-- Start::slide__category -->
                    <li class="slide__category"><span class="category-name">Main</span></li>
                    <!-- End::slide__category -->

                    <!-- Start::slide -->
                    <li class="slide has-sub">
                        <a href="<?= base_url('admin/dashboard') ?>" class="side-menu__item">

                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 side-menu__icon" fill="none"
                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                            </svg>
                            <span class="side-menu__label">Dashboard</span>
                        </a>
                        <ul class="slide-menu child1">
                            <li class="slide side-menu__label1">
                                <a href="<?= base_url('admin/dashboard') ?>">Dashboard</a>
                            </li>
                        </ul>
                    </li>
                    <li class="slide">
                        <a href="<?= base_url('admin/blog/view_blog') ?>" class="side-menu__item">

                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 side-menu__icon" viewBox="0 0 24 24"
                                fill="currentColor" stroke-width="0.2">
                                <path fill="none" d="M0 0h24v24H0z"></path>
                                <path
                                    d="M2 4C2 3.44772 2.44772 3 3 3H21C21.5523 3 22 3.44772 22 4V20C22 20.5523 21.5523 21 21 21H3C2.44772 21 2 20.5523 2 20V4ZM4 5V19H20V5H4ZM6 7H12V13H6V7ZM8 9V11H10V9H8ZM14 9H18V7H14V9ZM18 13H14V11H18V13ZM6 15V17L18 17V15L6 15Z">
                                </path>
                            </svg>
                            <span class="side-menu__label">Blog</span>
                        </a>
                    </li>
                    <li class="slide has-sub">
                        <a href="javascript:void(0);" class="side-menu__item">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 side-menu__icon" viewBox="0 0 24 24"
                                fill="currentColor" stroke-width="0.5">
                                <path
                                    d="M8 3C4.13401 3 1 6.13401 1 10C1 13.866 4.13401 17 8 17H9.07089C9.02417 16.6734 9 16.3395 9 16C9 15.6605 9.02417 15.3266 9.07089 15H8C5.23858 15 3 12.7614 3 10C3 7.23858 5.23858 5 8 5H16C18.7614 5 21 7.23858 21 10C21 10.3428 20.9655 10.6775 20.8998 11.0008C21.4853 11.5748 21.9704 12.2508 22.3264 13C22.7583 12.0907 23 11.0736 23 10C23 6.13401 19.866 3 16 3H8ZM16 13C14.3431 13 13 14.3431 13 16C13 17.6569 14.3431 19 16 19C17.6569 19 19 17.6569 19 16C19 14.3431 17.6569 13 16 13ZM11 16C11 13.2386 13.2386 11 16 11C18.7614 11 21 13.2386 21 16C21 17.0191 20.6951 17.967 20.1716 18.7574L22.7071 21.2929L21.2929 22.7071L18.7574 20.1716C17.967 20.6951 17.0191 21 16 21C13.2386 21 11 18.7614 11 16Z">
                                </path>
                            </svg>
                            </svg>
                            <span class="side-menu__label">Seo</span>
                            <i class="ri-arrow-down-s-line side-menu__angle"></i>
                        </a>
                        <ul class="slide-menu child1">
                            <li class="slide side-menu__label1">
                                <a href="javascript:void(0)">Seo</a>
                            </li>
                            <li class="slide">
                                <a href="<?= base_url('admin/seo/view_seo') ?>" class="side-menu__item">All Seo Details</a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <div class="slide-right" id="slide-right">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24" viewBox="0 0 24 24">
                        <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z"></path>
                    </svg>
                </div>
            </nav>
            <!-- End::nav -->

        </div>
        <!-- End::main-sidebar -->
    <?php endif; ?>


</aside>
<!-- End::main-sidebar -->
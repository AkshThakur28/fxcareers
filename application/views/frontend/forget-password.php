<main>
    <section class="login_banner">
        <div class="container">
            <div class="contact_container">
                <div class="row">
                    <div class="col-lg-6 align-self-center">
                        <div class="login_form">
                            <h2 class="text-primary"> FORGET PASSWORD</h2>
                            <h2 class="text-white">Reset Your Password</h2>
                            <?php if ($this->session->flashdata('msg')): ?>
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <?= $this->session->flashdata('msg'); ?>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            <?php endif; ?>

                            <?php if ($this->session->flashdata('info')): ?>
                                <div class="alert alert-info alert-dismissible fade show" role="alert">
                                    <?= $this->session->flashdata('info'); ?>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            <?php endif; ?>

                            <?php if ($this->session->flashdata('msz')): ?>
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <?= $this->session->flashdata('msz'); ?>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            <?php endif; ?>

                            <form action="<?= base_url('admin/auth/forgot_password') ?>" method="POST" class="mt-4">
                                <div class="row">
                                    <div class="col-md-12 ">
                                        <div class="mb-3 ">
                                            <label for="" class="form-label">Email*</label>
                                            <div class="position-relative">
                                                <input type="text" class="form-control" name="email" id="email"
                                                    aria-describedby="helpId" required placeholder="Enter Your Email" />
                                                <img src="<?= base_url() ?>public/assets/img/login_mail.png"
                                                    style="z-index: 9; right: 10px !important;position: absolute;top: 10px !important; width: 24px;"
                                                    class="position-absolute top-0 end-0" alt="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="mt-3">
                                            <button type="submit" value="submit" name="submit"
                                                class="mainthemebutton py-3 w-100 text-center fs-bold">
                                                Submit
                                                <span>
                                                    <img src="public/assets/img/form_btn_icon.png" width="30px" alt="">
                                                </span>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="col mt-3">
                                        <a href="<?= base_url() ?>" class="text-secondary"> <span class="me-2"><img
                                                    src="<?= base_url() ?>public/assets/img/arrow_left.svg"
                                                    alt=""></span>
                                            Go Back Home</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-6 text-center">
                        <img src="<?= base_url() ?>public/assets/img/login_img.png" class="w-75" alt="">
                    </div>
                </div>
            </div>

            <div class="cta_box mt-5">
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
                                <h2>Join Our News Letter</h2>
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
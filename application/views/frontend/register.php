<main>
    <section class="login_banner">
        <div class="container">
            <div class="contact_container">
                <div class="row">
                    <div class="col-lg-6 align-self-center">
                        <div class="login_form">
                            <h2 class="text-primary"> REGISTER</h2>
                            <h2 class="text-white">Create an Account</h2>
                            <?php if ($this->session->flashdata('success')): ?>
                                <div class="alert alert-success">
                                    <?= $this->session->flashdata('success'); ?>
                                </div>
                            <?php endif; ?>

                            <?php if ($this->session->flashdata('error')): ?>
                                <div class="alert alert-danger">
                                    <?= $this->session->flashdata('error'); ?>
                                </div>
                            <?php endif; ?>

                            <form action="<?php echo base_url() ?>website/webadd" method="POST"
                                enctype="multipart/form-data" class="mt-4" onsubmit="return validateForm()">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="firstname" class="form-label">First Name*</label>
                                            <input type="text" class="form-control position-relative" name="firstname"
                                                id="firstname" aria-describedby="helpId" required
                                                placeholder="Enter Your First Name" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="lastname" class="form-label">Last Name*</label>
                                            <input type="text" class="form-control position-relative" name="lastname"
                                                id="lastname" aria-describedby="helpId" required
                                                placeholder="Enter Your Last Name" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="mobile_no" class="form-label">Phone Number*</label>
                                            <input type="tel" inputmode="numeric" pattern="[0-9]{10}" maxlength="10"
                                                required oninput="this.value=this.value.replace(/[^0-9]/g,'');"
                                                class="form-control position-relative" name="mobile_no" id="mobile_no"
                                                aria-describedby="helpId" placeholder="Enter Your Phone Number" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email*</label>
                                            <input type="email" class="form-control" name="email" id="email"
                                                aria-describedby="helpId" required placeholder="Enter Your Email ID" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="password" class="form-label">Password*</label>
                                            <input type="password" class="form-control position-relative"
                                                name="password" id="password" aria-describedby="helpId" required
                                                placeholder="Create Password" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="confirm_password" class="form-label">Confirm Password*</label>
                                            <input type="password" class="form-control position-relative"
                                                name="confirm_password" id="confirm_password" aria-describedby="helpId"
                                                required placeholder="Retype Password" />
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mt-3">
                                            <a href="javascript:void(0);"
                                                class="mainthemebutton py-3 w-100 text-center fs-bold"
                                                onclick="this.closest('form').submit();">Submit
                                                <span><img src="<?= base_url() ?>public/assets/img/form_btn_icon.png"
                                                        width="30px" alt=""></span></a>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <p class="text-secondary mt-3">Already have an account? <a
                                                href="<?= base_url("login") ?>" class="text-primary"> Login</a></p>
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

<script>
    function validateForm() {
        var fields = ['firstname', 'lastname', 'mobile_no', 'email', 'password', 'confirm_password'];
        for (var i = 0; i < fields.length; i++) {
            var field = document.getElementById(fields[i]);
            if (!field.value.trim()) {
                alert('Please fill in the ' + field.placeholder);
                field.focus();
                return false;
            }
        }
        return true;
    }
</script>
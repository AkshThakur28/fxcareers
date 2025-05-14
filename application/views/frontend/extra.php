<!doctype html>
<html lang="en">

<head>
    <title>Elliott Wave Essentials: A Beginner to Pro Course</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- style sheets -->
    <link href="https://www.fxcareers.com/public/web/assets/images/favicon.png" rel="icon">
    <link rel="stylesheet" href="assets/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="assets/animate/animate.min.css">
    <link rel="stylesheet" href="assets/fonts/remixicon.css">
    <link rel="stylesheet" href="assets/css/swiper/swiper-bundle.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- bootstrap icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <section class="section-space">
    <div class="container">
        <!-- Display validation errors -->
        <?php if (validation_errors()): ?>
            <div class="alert alert-danger">
                <?php echo validation_errors(); ?>
            </div>
        <?php endif; ?>

        <!-- Display general errors -->
        <?php if (isset($errors) && !empty($errors)): ?>
            <div class="alert alert-danger">
                <?php echo $errors; ?>
            </div>
        <?php endif; ?>
        <div class="theme-bg-light p-5 rounded">
            <div class="row  g-4">
                <div class="col-lg-6 text-center align-self-center ">
                    <img src="<?= base_url() ?>public/web/assets/images/login.png" alt="Register"
                        class="img-fluid w-75 topdown">
                </div>
                <div class="col-lg-6 align-self-center">
                    <!-- <h3 class='text-primary sub-head'>Register</h3> -->
                    <h2 class='wow fadeInUp' data-wow-delay='0.1s'>Fill out the details below</h2>
                    <!-- <p>Already have an account? <a href="<?= base_url() ?>login">Login in here.</a></p> -->
                    <p></p>
                    <form action="<?= base_url('website/form_submit') ?>" method="POST" enctype="multipart/form-data"
                        class="mt-4">
                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>"
                            value="<?php echo $this->security->get_csrf_hash(); ?>">
                        <div class="row g-4">
                            <div class="col-lg-6">
                                <div class="formgroup">
                                    <label for="">Full Name*</label>
                                    <input type="text" placeholder="Full Name" name="name" id="name"
                                        class="form-control" required>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="formgroup">
                                    <label for="">Email*</label>
                                    <input type="email" placeholder="Email" name="email" id="email" class="form-control"
                                        required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="formgroup">
                                    <label for="">Amount*</label>
                                    <input type="number" placeholder="Enter amount" name="amount" id="amount" class="form-control"
                                        required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="formgroup">
                                    <label for="">Phone Number*</label>
                                    <input type="tel" name="mobile_no" placeholder="Mobile Number" id="mobile_no"
                                        maxlength="10" pattern="[0-9]{10}" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="formgroup">
                                    <label for="type">Type*</label>
                                    <select name="type" id="type" class="form-select form-control" required>
                                        <option value="" disabled selected>Select Type</option>
                                        <option value="Registration">Registration</option>
                                        <option value="Balance Fees">Balance fees</option>
                                        <option value="Workshop registration">Workshop registration</option>
                                        <option value="Seminar registration">Seminar registration</option>
                                        <option value="Live sessions">Live sessions</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-12 text-center">
                                <div class="formgroup">
                                    <button
                                        class="display-5 theme-btn theme-btn-two border-0 d-block w-100 rounded py-3 login"
                                        type="submit" name="submit">Submit<i
                                            class="ps-2 ri-arrow-right-line"></i></button>
                                </div>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

</body>

</html>
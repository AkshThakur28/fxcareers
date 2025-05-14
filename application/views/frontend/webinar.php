<!-- breadcrumb-area-start -->
<style>
    .webinar-form input,
    .webinar-form textarea {
        border-radius: 5px;
        border: 1px solid #ddd;
    }

    .webinar-form label {
        font-weight: 600;
    }

    .webinar-form input[type=radio] {
        padding: 10px;
    }

    .webinar-form .form-check-input:focus {
        border-color: #f9c311;
        outline: 0;
        box-shadow: 0 0 0 .25rem rgb(255 240 189);
    }

    .webinar-form .form-check-input:checked {
        background-color: #f9c311;
        border-color: #f9c311;
    }
</style>
<div class="it-breadcrumb-area it-breadcrumb-bg"
    data-background="<?= base_url() ?>public/web/assets/img/breadcrumb/breadcrumb.jpg">
    <div class="container">
        <div class="row ">
            <div class="col-md-12">
                <div class="it-breadcrumb-content z-index-3 text-center">
                    <div class="it-breadcrumb-title-box">
                        <h3 class="it-breadcrumb-title">Webinar Form</h3>
                    </div>
                    <div class="it-breadcrumb-list-wrap">
                        <div class="it-breadcrumb-list">
                            <span><a href="index.html">home</a></span>
                            <span class="dvdr">//</span>
                            <span>Webinar Form</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb-area-end -->

<!-- contact-area-start -->
<div class="it-contact__area pt-120 pb-120 ">
    <div class="container">
        <div class="it-contact__wrap fix z-index-3 p-relative webinar-form"
            style="background-image:url('<?= base_url() ?>public/web/assets/img/breadcrumb/step-form.jpg')">
            <form action="<?=base_url('admin/webinar/webinar_data')?>" method="post">
            <div class="row align-items-end">
                <div class="col-md-6">
                    <div class="it-signup-input mb-20">
                        <label for="">Full Name</label>
                        <input type="text" name="name" placeholder="" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="it-signup-input mb-20">
                        <label for="">Passport Number </label>
                        <input type="text" name="passport_no" placeholder="" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="it-signup-input mb-20">
                        <label for="">Date Of Birth </label>
                        <input type="date" name="dob" placeholder="" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="it-signup-input mb-20">
                        <label for="">Status</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status" id="inlineRadio1" value="single">
                            <label class="form-check-label" for="inlineRadio1">Single</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status" id="inlineRadio2" value="married">
                            <label class="form-check-label" for="inlineRadio2">Married</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status" id="inlineRadio3" value="others">
                            <label class="form-check-label" for="inlineRadio3">Others</label>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="it-signup-input mb-20">
                        <label for="">Full Address </label>
                        <input type="text" name="address" placeholder="" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="it-signup-input mb-20">
                        <label for="">Nationality</label>
                        <input type="text" name="nation" placeholder="" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="it-signup-input mb-20">
                        <label for="">Passcode</label>
                        <input type="text" name="passcode" placeholder="" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="it-signup-input mb-20">
                        <label for="">Emirates ID No.</label>
                        <input type="text" name="emirates_id" placeholder="" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="it-signup-input mb-20">
                        <label for="">City / Country</label>
                        <input type="text" name="place" placeholder="" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="it-signup-input mb-20">
                        <label for="">Driver License</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="driving_licence" id="yes" value="yes">
                            <label class="form-check-label" for="yes">Yes</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="driving_licence" id="No" value="no">
                            <label class="form-check-label" for="No">No</label>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="it-signup-input mb-20">
                        <label for="">Gender</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="Male" value="male">
                            <label class="form-check-label" for="Male">Male</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="Female" value="female">
                            <label class="form-check-label" for="Female">Female</label>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="it-signup-input mb-20">
                        <label for="">Mobile No.</label>
                        <input type="tel" name="mobile" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="it-signup-input mb-20">
                        <label for="">Alternative Contact :</label>
                        <input type="tel" name="alter_mob" >
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="it-signup-input mb-20">
                        <label for="">Email</label>
                        <input type="email" name="email" placeholder="" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="it-signup-input mb-20">
                        <label for="">Department</label>
                        <input type="text" name="department" placeholder="" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="it-signup-input mb-20">
                        <label for="">Company/University Name</label>
                        <input type="text" name="university" placeholder="" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="it-signup-input mb-20">
                        <label for="">City / Country</label>
                        <input type="text" name="university_place" placeholder="" required>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="it-signup-input mb-20">
                        <label for="">Course Name</label>
                        <input type="text" name="course_name" placeholder="" required>
                    </div>
                </div>
                <div class="col-md-2">
                <input type="submit" name="submit" class="it-btn" value="Submit" style="font-size: 16px;">
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
</div>
<!-- contact-area-end -->
</main>
<style>
    .is-invalid {
        border-color: red;
    }
</style>

<main>
    <section class="enquiry_form pb-0">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="d-md-flex justify-content-between">

                        <h2>Enquiry Form</h2>
                        <a href="<?= base_url() ?>" class="mainthemebutton fs-5">Back to Home <i
                                class="ri-arrow-go-back-line"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="Enquiry_form_wraper py-5">
        <div class="container">
            <div class="row">
                <div class="col pt-5">
                    <div class="enquiry_form_point px-md-5 position-relative">
                        <div class="enquiry_setp_point active">1</div>
                        <div class="enquiry_setp_point">2</div>
                        <div class="enquiry_setp_point">3</div>
                        <div class="enquiry_setp_point">4</div>
                        <div class="line"></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <form id="multiStepForm" method="POST" enctype="multipart/form-data" lang="en">
                        <div class="form_wraper">
                            <!-- Step 1: -->
                            <div class="e_form_one e_form_Section active p-md-5" id="form_box_1">

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">First Name*</label>

                                            <!-- <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>"
                                                value="<?= $this->security->get_csrf_hash(); ?>" id="csrf_token"> -->
                                            <input type="text" name="first_name" id="first_name" class="form-control"
                                                placeholder="Enter Your First Name" required />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Last Name*</label>
                                            <input type="text" name="last_name" id="last_name" class="form-control"
                                                placeholder="Enter Your Last Name" required />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Email ID*</label>
                                            <input type="email" id="email" name="email_address" class="form-control"
                                                placeholder="Enter Your Email ID" required />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Contact Number*</label>
                                            <input type="number" name="phone_number" id="mobile" class="form-control"
                                                placeholder="Enter Your Contact Number" required />
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="form-label">Address*</label>
                                            <textarea class="form-control" id="address" name="address"
                                                placeholder="Enter Your Address" rows="5" required></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <button class="bg-primary d-flex align-items-center" type="button"
                                                onclick="nextBox(1)" id="continueButton">
                                                <span>Continue</span>
                                                <span class="more_nav_arrow ms-1 bg-dark">
                                                    <i class="ri-arrow-right-up-line text-primary fw-bold"></i>
                                                </span>
                                            </button>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <!-- Step 2: -->
                            <div class="e_form_two e_form_Section  mt-5 p-md-5 " id="form_box_2">

                                <div class="row">
                                    <div class="col-lg-6">
                                        <h4>Choose Courses</h4>

                                        <?php
                                        $preffered_topic_fetch_data = $this->db->get("preffered_topic")->result_array();

                                        foreach ($preffered_topic_fetch_data as $data): ?>
                                            <div class="">
                                                <label class="custom-checkbox">
                                                    <input type="checkbox" id="<?= $data['id'] ?>" name="topics[]"
                                                        value="<?= $data['id'] ?>" required>
                                                    <div class="check_wraper">
                                                        <span class="checkbox-box">
                                                            <span class="checkimg me-1">
                                                                <img src="<?= base_url() ?>public/assets/img/checkedbtn.png"
                                                                    class="img-fluid" alt="Checked">
                                                            </span>
                                                            <span class="checkempty"></span>
                                                        </span>
                                                    </div>
                                                    <span style="margin-left: 10px;"><?= $data['topic_name'] ?></span>
                                                </label>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <h4>Preferred Timing</h4>
                                            <select class="form-select form-select-lg" name="address_state" required>
                                                <option value="" disabled selected>Select Your Preferred Timing</option>
                                                <option value="Morning">Morning</option>
                                                <option value="Evening">Evening</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mt-3 d-flex">
                                            <button onclick="prevBox(2)" type="button"
                                                class=" me-3 industry_graident text-white d-flex align-items-center">
                                                <span>Back</span>
                                            </button>
                                            <button type="button" class="bg-primary d-flex align-items-center"
                                                onclick="nextBox(2)">
                                                <span>Continue</span>
                                                <span class="more_nav_arrow ms-1 bg-dark">
                                                    <i class="ri-arrow-right-up-line text-primary fw-bold"></i>
                                                </span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Step 3 -->
                            <div class="e_form_one e_form_Section  mt-5 p-md-5" id="form_box_3">
                                <div class="row">
                                    <h4 class="mb-3">How do you know about FXCareers?</h4>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <select class="form-select form-select-lg" name="product_satisfaction"
                                                required>
                                                <option value="" disabled selected>Please Select</option>
                                                <option value="Google">Google</option>
                                                <option value="Sign Board">Sign Board</option>
                                                <option value="Instagram">Instagram</option>
                                                <option value="Facebook">Facebook</option>
                                                <option value="Newspaper">Newspaper</option>
                                            </select>
                                        </div>
                                    </div>
                                    <h4 class="my-5">Any References</h4>
                                    <div class="col-md-6 ">
                                        <div class="mb-3">
                                            <label for="" class="form-label">First Name*</label>
                                            <input type="text" class="form-control" name="referal_first_name" id=""
                                                placeholder="Enter Your First Name" required />
                                        </div>

                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="" class="form-label">Last Name*</label>
                                            <input type="text" class="form-control" name="referal_last_name" id=""
                                                placeholder="Enter Your Last Name" required />
                                        </div>

                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="" class="form-label">Email ID*</label>
                                            <input type="email" class="form-control" name="referal_email_address" id=""
                                                placeholder="Enter Your Email ID" required />
                                        </div>

                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="" class="form-label">Contact Number *</label>
                                            <input type="number" class="form-control" name="referal_phone_number" id=""
                                                placeholder="Enter Your Contact Number" required />
                                        </div>

                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="" class="form-label">Message *</label>
                                            <textarea class="form-control" name="product_feedback"
                                                placeholder="Enter Your Message" id="" rows="5" required></textarea>
                                        </div>

                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="mt-3 d-flex ">
                                        <button onclick="prevBox(3)" type="button"
                                            class=" me-3 industry_graident text-white d-flex align-items-center">
                                            <span>Back</span>
                                        </button></li>
                                        <button type="submit" id="submitFormBtn"
                                            class=" bg-primary btn d-flex align-items-center">
                                            <span>Submit</span>
                                            <span class="more_nav_arrow ms-1 bg-dark "><i
                                                    class="ri-arrow-right-up-line text-primary fw-bold"></i></span>
                                        </button></li>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
                </form>
            </div>
        </div>
        </div>
    </section>
    <section class="cta">
        <div class="container">
            <div class="cta_box">
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function nextBox(step) {
            const currentStep = document.getElementById("form_box_" + step);
            const inputs = currentStep.querySelectorAll("input, select, textarea");
            let valid = true;

            inputs.forEach(input => {
                input.classList.remove("is-invalid");

                if (input.name === "topics[]") {
                    const anyChecked = [...currentStep.querySelectorAll("input[name='topics[]']")].some(cb => cb.checked);
                    if (!anyChecked) {
                        alert("Please select at least one course topic.");
                        valid = false;
                    }
                    return;
                }

                if (input.hasAttribute("required") && !input.value.trim()) {
                    input.classList.add("is-invalid");
                    valid = false;
                }
            });

            if (!valid) {
                alert("Please fill in all required fields before continuing.");
            } else {
                currentStep.classList.remove("active");
                const nextStep = document.getElementById("form_box_" + (step + 1));
                if (nextStep) nextStep.classList.add("active");
            }
        }

        function prevBox(step) {
            document.getElementById("form_box_" + step).classList.remove("active");
            document.getElementById("form_box_" + (step - 1)).classList.add("active");
        }

        $('#submitFormBtn').click(function (e) {
            e.preventDefault();

            const currentStep = document.querySelector('.e_form_Section.active');
            const inputs = currentStep.querySelectorAll("input, select, textarea");
            let valid = true;

            inputs.forEach(input => input.classList.remove("is-invalid"));

            inputs.forEach(input => {
                if (input.hasAttribute("required") && !input.value.trim()) {
                    input.classList.add("is-invalid");
                    valid = false;
                }
            });

            const topicCheckboxes = currentStep.querySelectorAll("input[name='topics[]']");
            const anyChecked = [...topicCheckboxes].some(cb => cb.checked);
            if (topicCheckboxes.length && !anyChecked) {
                alert("Please select at least one course topic.");
                valid = false;
            }

            if (!valid) {
                alert("Please fill in all required fields before submitting.");
                return;
            }

            const form = $('#multiStepForm')[0];
            const formData = new FormData(form);

            $.ajax({
                url: '<?= site_url("website/submit") ?>',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                dataType: 'json',
                beforeSend: function () {
                    $('#submitFormBtn').prop('disabled', true).text('Submitting...');
                    $('#formResponse').html('');
                },
                success: function (response) {
                    $('#submitFormBtn').prop('disabled', false).text('Submit');
                    if (response.status === 'success') {
                        window.location.href = response.redirect;
                    } else {
                        alert(response.message || "Something went wrong.");
                        location.reload();
                    }
                },
                error: function (xhr) {
                    $('#submitFormBtn').prop('disabled', false).text('Submit');
                    $('#formResponse').html('<div class="alert alert-danger">An error occurred. Please try again.</div>');
                    console.error('AJAX Error:', xhr.responseText);
                }
            });
        });
    </script>

</main>
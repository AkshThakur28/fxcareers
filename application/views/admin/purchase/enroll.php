<div class="main-content app-content">
    <div class="container-fluid">


        <!-- Page Header -->
        <div class="d-flex align-items-center justify-content-between page-header-breadcrumb flex-wrap gap-2">
            <div>
                <nav>
                    <ol class="breadcrumb mb-1">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Enroll</li>
                    </ol>
                </nav>
                <h1 class="page-title fw-medium fs-18 mb-0">Enroll </h1>
            </div>

        </div>
        <!-- Page Header Close -->
        <div class="row">
            <div class="col-xl-12">
                <div class="card custom-card">
                    <div class="card-body">
                        <?php foreach ($form as $row) { ?>
                            <form class="form-horizontal" method="post"
                                action="<?= base_url('admin/purchase/purchase_submit_data'); ?>"
                                enctype="multipart/form-data">
                                <input type="hidden" name="id">
                                <div class="row gy-4">
                                    <input type="hidden" name="user_id" class="form-control py-11" id="user_id"
                                        placeholder="Name" value="<?= $row->user_id ?>" readonly>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                        <label for="CourseCategory" class="form-label">Course Name</label>
                                        <select class="form-control frm-select" data-trigger name="course_id"
                                            id="course_id">
                                            <option value="" disabled selected>Select Course</option>
                                            <?php
                                            $role_fetch_data = $this->Curriculum_model->topic_course();
                                            foreach ($role_fetch_data as $data) { ?>
                                                <option value="<?php echo $data['id']; ?>"><?php echo $data['course_name']; ?>
                                                </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                        <label for="CourseFee" class="form-label">Course Fee</label>
                                        <input type="text" id="basic_amount" class="form-control" name="basic_amount">
                                    </div>
                                    <div class="col-xl-6 col-lg-6-md-6 col-sm-12">
                                        <label for="CourseDiscount" class="form-label">Course Discount</label>
                                        <input type="text" id="dis" class="form-control" name="dis"
                                            onkeyup="calculateAmounts()">
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                        <label for="FinalAmount" class="form-label">Final Amount</label>
                                        <input type="text" id="amount" class="form-control" name="final_amount">
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                        <label for="TransactionId" class="form-label">Transaction Id</label>
                                        <input type="text" id="transaction_id" class="form-control" name="transaction_id">
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                        <label for="PaymentMode" class="form-label">Payment Mode</label>
                                        <select class="form-control frm-select" data-trigger name="payment_mode"
                                            id="payment_mode">
                                            <option value="" disabled selected="">Select Payment Mode</option>
                                            <option value="UPI">UPI</option>
                                            <option value="Bank Transfer">Bank Transfer</option>
                                            <option value="Card">Card</option>
                                            <option value="Cash">Cash</option>
                                            <option value="Razorpay">Razorpay</option>

                                        </select>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                        <label for="TransactionDate" class="form-label">Transaction Date</label>
                                        <input type="date" id="purchase_date" class="form-control" name="purchase_date">
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                        <label for="PaidAmount" class="form-label">Paid Amount</label>
                                        <input type="number" name="paid_amount" class="form-control" id="paid_amount"
                                    step="any" onkeyup="updatePaymentStatus()" required>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                        <label for="Left Amount" class="form-label">Left Amount</label>
                                        <input type="number" name="left_amount" class="form-control" id="left_amount"
                                    step="any">
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                        <label for="PaymentStatus" class="form-label">Payment Status</label>
                                        <input type="text" name="transaction_status" class="form-control"
                                    id="transaction_status">
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                                        <button type="submit" class="btn btn-primary fs-6 ">
                                            Add
                                        </button>
                                    </div>
                                </div>
                            </form>
                        <?php } ?>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function calculateAmounts() {
        let basicPrice = parseFloat(document.getElementById("basic_amount").value) || 0;
        let discount = parseFloat(document.getElementById("dis").value) || 0;
        let discountedPrice = basicPrice - discount;
        let finalAmount = discountedPrice;

        document.getElementById("amount").value = discountedPrice.toFixed(2);
        document.getElementById("final_amount").value = finalAmount.toFixed(2);
    }

    function updatePaymentStatus() {
        let finalAmount = parseFloat(document.getElementById("amount").value) || 0;
        let paidAmount = parseFloat(document.getElementById("paid_amount").value) || 0;
        let leftAmount = finalAmount - paidAmount;

        // If the paid amount is greater than the final amount, show a popup
        if (paidAmount > finalAmount) {
            alert("Paid amount cannot be greater than the final amount!");
            document.getElementById("paid_amount").value = finalAmount.toFixed(2); // Reset paid amount to final amount
            leftAmount = 0;  // Reset left amount
        }

        document.getElementById("left_amount").value = leftAmount.toFixed(2);
        document.getElementById("transaction_status").value = leftAmount === 0 ? 'Paid' : (leftAmount > 0 ? 'Pending' : 'Failed');
    }

    $(document).ready(function () {
        $("#course_id").change(function () {
            var courseId = $(this).val();
            console.log("Selected Course ID: " + courseId);  // Log selected course ID

            $.ajax({
                url: "<?php echo base_url('admin/purchase/get_course_price'); ?>",
                type: "POST",
                data: {
                    course_id: courseId,
                    '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
                },
                dataType: "json",
                success: function (response) {
                    console.log("Response: ", response);  // Log the response from server

                    if (response.price) {
                        $("#basic_amount").val(response.price);  // Set course price
                        calculateAmounts();  // Trigger calculation
                    } else {
                        alert("No course price available.");
                    }
                },
                error: function (xhr, status, error) {
                    console.error("AJAX error:", error);  // Log AJAX error
                    alert("Error fetching course price.");
                }
            });
        });
    });

    $("#paid_amount").keyup(function () {
        updatePaymentStatus();
    });

</script>
<!-- Start::app-content -->
<div class="main-content app-content">
    <div class="container-fluid">

        <!-- Page Header -->
        <div class="d-flex align-items-center justify-content-between page-header-breadcrumb flex-wrap gap-2">
            <div>
                <nav>
                    <ol class="breadcrumb mb-1">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Students</li>
                    </ol>
                </nav>
                <h1 class="page-title fw-medium fs-18 mb-0">Students</h1>
            </div>
            <div class="btn-list">
                <!-- <a class="btn btn-primary btn-wave me-0">
                    <i class="ri-user-add-line  me-1"></i> Add Students
                </a> -->
            </div>
        </div>
        <!-- Page Header Close -->

        <!-- Start::row-1 -->
        <div class="row">
            <div class="col-xl-12">
                <div class="card custom-card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="studentTable" class="table table-bordered table-striped text-nowrap w-100">
                                <thead>
                                    <tr>
                                        <th class="">Student</th>
                                        <th class="">Mobile No.</th>
                                        <th class="">Email</th>
                                        <th class="">No. of Courses</th>
                                        <th class="">Payment Status</th>
                                        <th class="">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($all_users as $row) { ?>
                                        <tr data-total-final-amount="<?= $row['total_final_amount']; ?>"
                                            data-total-paid-amount="<?= $row['total_paid_amount']; ?>"
                                            data-total-left-amount="<?= $row['total_left_amount']; ?>"
                                            data-purchased-courses="<?= $row['purchased_courses']; ?>"
                                            data-purchased-course-images="<?= $row['purchased_course_images']; ?>"
                                            data-payment-history="<?= $row['payment_history']; ?>"
                                            data-purchased-course-categories="<?= $row['purchased_course_categories']; ?>">
                                            <td class="toggle-details">
                                                <div class="d-flex align-items-center justify-content-between">
                                                    <div class="d-flex align-items-center">
                                                        <a href="javascript:void(0);"
                                                            class="avatar avatar-xs avatar-rounded me-2">
                                                            <img src="https://php.spruko.com/xintra/xintra/assets/images/faces/2.jpg"
                                                                alt="img">
                                                        </a>
                                                        <a href="javascript:void(0);"><?= $row['username'] ?></a>
                                                    </div>
                                                    <a href="javascript:void(0);" data-user-id="<?= $row['id']; ?>"><i
                                                            class="ri-add-line"></i></a>
                                                </div>
                                            </td>
                                            <td><?= $row['mobile_no'] ?></td>
                                            <td><?= $row['email'] ?></td>
                                            <td><?= $row['course_count']; ?></td>
                                            <td>
                                            <span
                                                    class="badge <?=  $row['transaction_status']  === 'Paid' ? 'bg-success-transparent' : 'bg-danger-transparent' ?>">
                                                    <?= $row['transaction_status'] ?>
                                                </span>
                                            </td>
                                            <td>
                                                <div class="hstack gap-2 fs-15">
                                                    <a href="<?= base_url('admin/purchase/add_purchase/' . $row['user_id']) ?>"
                                                        class="btn btn-sm btn-success btn-wave waves-effect waves-light">
                                                        Enroll</a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--End::row-1 -->
    </div>
</div>

<script>
    $(document).ready(function () {
        // Initialize DataTable
        const table = $('#studentTable').DataTable();

        let currentlyOpenRow = null; // Track the currently open detail row

        // Add event listener for toggle-details (this handles clicking the user row)
        $('#studentTable tbody').on('click', '.toggle-details', function () {
            const tr = $(this).closest('tr');
            const row = table.row(tr);

            // Extract the additional data from data attributes of the row
            const totalFinalAmount = tr.data('total-final-amount') || 0;
            const totalPaidAmount = tr.data('total-paid-amount') || 0;
            const totalLeftAmount = tr.data('total-left-amount') || 0;
            const purchasedCourses = tr.data('purchased-courses') || "";  // Get purchased courses data
            const purchasedCourseImages = tr.data('purchased-course-images') || "";  // Get purchased course images data
            const purchasedCourseCategories = tr.data('purchased-course-categories') || ""; // Get purchased course categories
            const paymentHistory = tr.data('payment-history') || "";  // Get payment history data

            if (row.child.isShown()) {
                // If the clicked row is already open, toggle it closed
                row.child.hide();
                tr.removeClass('details-shown');
                currentlyOpenRow = null; // Clear the reference
            } else {
                // If another row is open, close it
                if (currentlyOpenRow) {
                    currentlyOpenRow.child.hide();
                    $(currentlyOpenRow.node()).removeClass('details-shown');
                }

                // Show the new detail row for the current user
                row.child(formatDetails(totalFinalAmount, totalPaidAmount, totalLeftAmount, purchasedCourses, purchasedCourseImages, purchasedCourseCategories, paymentHistory)).show();
                tr.addClass('details-shown');
                currentlyOpenRow = row; // Update the reference
            }
        });

        // Function to format the details row for each user
        function formatDetails(totalFinalAmount, totalPaidAmount, totalLeftAmount, purchasedCourses, purchasedCourseImages, purchasedCourseCategories, paymentHistory) {
            const paymentHistoryRows = formatPaymentHistory(paymentHistory);
            return `
            <div class="details-content bg-light rounded border p-3">
                <div class="row">
                    <div class="col-md-3">
                        <div class="card custom-card rounded overflow-hidden p-3">
                            <div>
                                <div class="flex-fill fs-13 text-muted">Amount</div>
                                <div class="fs-21 fw-medium">${totalFinalAmount}</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card custom-card rounded overflow-hidden p-3">
                            <div>
                                <div class="flex-fill fs-13 text-muted">Total Paid</div>
                                <div class="fs-21 fw-medium">${totalPaidAmount}</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card custom-card rounded overflow-hidden p-3">
                            <div>
                                <div class="flex-fill fs-13 text-muted">Balance</div>
                                <div class="fs-21 fw-medium">${totalLeftAmount}</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tabs for Purchased Courses and Payment History -->
                <div class="col-lg-12">
                    <div class="card-body">
                        <ul class="nav nav-tabs mb-3 tab-style-6" id="myTab3" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="PurchasedCourses" data-bs-toggle="tab"
                                        data-bs-target="#PurchasedCourses-pane" type="button" role="tab"
                                        aria-controls="PurchasedCourses-pane" aria-selected="true">
                                    <i class="ri-file-text-line me-1 align-middle d-inline-block"></i> Purchased Courses
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="PaymentHistory" data-bs-toggle="tab"
                                        data-bs-target="#PaymentHistory-pane" type="button" role="tab"
                                        aria-controls="PaymentHistory-pane" aria-selected="false">
                                    <i class="ri-bill-line me-1 align-middle d-inline-block"></i> Payment History
                                </button>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent2">
                            <!-- Purchased Courses Tab -->
                            <div class="tab-pane fade show active p-3 overflow-hidden" id="PurchasedCourses-pane" role="tabpanel" aria-labelledby="PurchasedCourses" tabindex="0">
                                ${formatPurchasedCourses(purchasedCourses, purchasedCourseImages, purchasedCourseCategories)}
                            </div>

                            <!-- Payment History Tab -->
                            <div class="tab-pane fade overflow-hidden" id="PaymentHistory-pane" role="tabpanel" aria-labelledby="PaymentHistory" tabindex="0">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Transaction Date</th>
                                            <th>Total Amount</th>
                                            <th>Paid Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        ${paymentHistoryRows}
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>`;
        }

        // Function to format Payment History
        function formatPaymentHistory(paymentHistory) {
            if (!paymentHistory) {
                return `<tr><td colspan="3" class="text-center">No payment history available</td></tr>`;
            }

            const rows = paymentHistory.split(',');
            let formattedRows = '';
            rows.forEach(row => {
                const [date, finalAmount, paidAmount] = row.split('|');
                formattedRows += `
                <tr>
                    <td>${date}</td>
                    <td>${finalAmount}</td>
                    <td>${paidAmount}</td>
                </tr>`;
            });
            return formattedRows;
        }

        // Function to format purchased courses
        function formatPurchasedCourses(courseNames, courseImages, courseCategories) {
            if (!courseNames) {
                return `<p>No courses purchased yet</p>`;
            }

            const namesArray = courseNames.split(',');
            const imagesArray = courseImages.split(',');
            const categoriesArray = courseCategories.split(',');

            return namesArray.map((name, index) => {
                const imagePath = '<?= base_url() ?>uploads/course/' + imagesArray[index];
                const category = categoriesArray[index] || 'Unknown';
                return `
               <ul class="d-flex flex-column list-unstyled mb-0 popular-course"> 
               <li class="text-muted mb-3 text-muted mb-3 bg-white p-2 rounded">
                    <div class="d-sm-flex align-items-start w-100">
                        <a href="javascript:void(0);" class="pe-4 inline-block">
                            <img src="${imagePath}" alt="img" class="avatar avatar-xl rounded-2">
                        </a>
                        <div class="flex-grow-1 fw-medium">
                                                        <div class="d-flex align-items-center justify-content-end" title="Instructor">
                                                      <a href="javascript:void(0);" class="flex-grow-1 text-default op-8">${category}</a>
                                                        <a href="javascript:void(0);" class=" d-block mb-1 fw-normal badge bg-success-transparent" title="Category"><i class="ri-price-tag-3-line "></i> Complete</a>
                                                    </div>
                         
                            <a href="javascript:void(0);" class="d-block mb-0 fw-medium">${name}</a>
                           
                        </div>
                    </div>
                </li>
                </ul>`;
            }).join('');
        }
    });
</script>
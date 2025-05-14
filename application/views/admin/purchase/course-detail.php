<!-- Start::app-content -->
<div class="main-content app-content">
    <div class="container-fluid">


        <!-- Page Header -->
        <div class="d-flex align-items-center justify-content-between page-header-breadcrumb flex-wrap gap-2">
            <div>
                <nav>
                    <ol class="breadcrumb mb-1">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Courses </li>
                    </ol>
                </nav>
                <h1 class="page-title fw-medium fs-18 mb-0">Course Details </h1>
            </div>

        </div>
        <!-- Page Header Close -->
        <!-- Start::row-1 -->
        <div class="row">
            <?php
            $c = 1;
            foreach ($purchased_courses as $row): ?>
                <div class="col-xl-8">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card custom-card">
                                <a href="javascript:void(0);" class="p-3">
                                    <img src="<?= base_url('uploads/course/' . $row['course_image']) ?>"
                                        class="card-img rounded-3 blog-details-img" alt="...">
                                </a>
                                <div class="card-body p-4">
                                    <div class="d-flex align-items-center justify-content-between mb-3">
                                        <p class="h5 fw-semibold mb-0"><?= $row['course_name'] ?></p>
                                        <span class="badge bg-secondary"><?= $row['category_name'] ?></span>
                                    </div>
                                    <p class="mb-4">
                                        <?= $row['long_description'] ?>
                                    </p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card custom-card overflow-hidden">
                                <div class="card-header justify-content-between">
                                    <div class="card-title">
                                        <h4>Course Details</h4>
                                    </div>
                                </div>
                                <div class="card-body p-3">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item p-2 border-top ">
                                            <div class="d-flex align-items-center gap-3">
                                                <div>
                                                    <span
                                                        class="avatar avatar-rounded bg-primary3-transparent text-primary3"><i
                                                            class="ti ti-tag fs-22"></i></span>
                                                </div>
                                                <div class="flex-fill">
                                                    <span class="mb-0 fw-semibold fs-6 d-block ">Course Price</span>


                                                </div>
                                                <div class="text-end">
                                                    <span class="fs-6 text-primary3"><?= $row['price'] ?></span>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="list-group-item p-2">
                                            <div class="d-flex align-items-center gap-3">
                                                <div>
                                                    <span
                                                        class="avatar avatar-rounded bg-primary1-transparent text-primary1">
                                                        <i class="ti ti-language fs-22"></i></span>
                                                </div>
                                                <div class="flex-fill">
                                                    <span class="mb-0 fw-semibold fs-6 d-block">Course Language</span>


                                                </div>
                                                <div class="text-end">
                                                    <span class="fs-6 text-primary1"><?= $row['language_name'] ?></span>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="list-group-item p-2 ">
                                            <div class="d-flex align-items-center gap-3">
                                                <div>
                                                    <span
                                                        class="avatar avatar-rounded bg-primary2-transparent text-primary2"><i
                                                            class="ti ti-hourglass fs-22"></i></span>
                                                </div>
                                                <div class="flex-fill">
                                                    <span class="mb-0 fw-semibold fs-6 d-block">Course Duration</span>


                                                </div>
                                                <div class="text-end">
                                                    <span class="fs-6 text-primary2"><?= $row['duration'] ?></span>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="list-group-item p-2 ">
                                            <div class="d-flex align-items-center gap-3">
                                                <div>
                                                    <span
                                                        class="avatar avatar-rounded bg-secondary-transparent text-secondary"><i
                                                            class="ti ti-bulb fs-22"></i></span>
                                                </div>
                                                <div class="flex-fill">
                                                    <span class="mb-0 fw-semibold fs-6 d-block ">Course Status</span>


                                                </div>
                                                <div class="text-end">
                                                    <span class="fs-6 text-secondary"><?= $row['status'] ?></span>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="list-group-item p-2 ">
                                            <div class="d-flex align-items-center gap-3">
                                                <div>
                                                    <span
                                                        class="avatar avatar-rounded bg-primary2-transparent text-primary2"><i
                                                            class="ti ti-receipt fs-22"></i></span>
                                                </div>
                                                <div class="flex-fill">
                                                    <span class="mb-0 fw-semibold fs-6 d-block ">Payment Status</span>


                                                </div>
                                                <div class="text-end">
                                                    <span
                                                        class="fs-6 text-secondary"><?= $row['transaction_status'] ?></span>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="list-group-item p-2 ">
                                            <div class=" d-flex pt-4 justify-content-between">
                                                <button
                                                    class="btn btn-sm btn-success btn-wave waves-effect waves-light me-2 flex-grow-1"
                                                    onclick="window.location.href='<?=base_url('admin/purchase/invoice_receipt/' . $row['user_id'])?>';">
                                                    <i class="ri-download-2-line align-middle me-2 d-inline-block"></i>
                                                    Invoice
                                                </button>
                                                <button
                                                    class="btn btn-sm btn-info btn-wave waves-effect waves-light me-2 flex-grow-1">
                                                    <i
                                                        class="ri-award-fill align-middle me-2 d-inline-block"></i>Certificate
                                                </button>
                                                <a href="<?= base_url('admin/purchase/purchase_view') ?>"
                                                    class="btn btn-primary btn-wave me-0 waves-effect waves-light flex-grow-1">
                                                    <i class="ri-menu-add-line  me-1"></i>Payment History
                                                </a>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <!--End::row-1 -->
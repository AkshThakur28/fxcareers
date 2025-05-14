<div class="main-content app-content">
    <div class="container-fluid">

        <!-- Page Header -->
        <div class="d-flex align-items-center justify-content-between page-header-breadcrumb flex-wrap gap-2">
            <div>
                <nav>
                    <ol class="breadcrumb mb-1">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page"> Edit Contact Enquiries </li>
                    </ol>
                </nav>
                <h1 class="page-title fw-medium fs-18 mb-0">Edit Contact Enquiries </h1>
            </div>
            <!-- <div class="btn-list">
                <a href="add-slider.php" class="btn btn-primary btn-wave me-0">
                    <i class="ri-image-add-line  me-1"></i> Add Slider </a>
            </div> -->

        </div>

        <!-- Page Header Close -->
        <div class="row">
            <div class="col-xl-12">
                <div class="card custom-card">
                    <div class="card-header justify-content-between">
                        <div class="card-title">
                            Edit Contact Enquiries
                        </div>
                    </div>
                    <?php $row = $edit_contact_enquiry; ?>

                    <div class="card-body">
                        <form method="post" action="<?= base_url('admin/contact_us/contact_enquiries_update_data'); ?>"
                            enctype="multipart/form-data">
                            <input type="hidden" name="id" value="<?= $row->id ?>">
                            <div class="row gy-4">

                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                    <label for="SliderOrder" class="form-label">Username</label>
                                    <input type="text" class="form-control" id="SliderOrder" name="username"
                                        value="<?= $row->username ?>">
                                </div>

                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                    <label for="SliderOrder" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="SliderOrder" name="email"
                                        value="<?= $row->email ?>">
                                </div>

                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                    <label for="SliderOrder" class="form-label">Mobile</label>
                                    <input type="number" class="form-control" id="SliderOrder" name="mobile_no"
                                        value="<?= $row->mobile_no ?>">
                                </div>

                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                    <label for="SliderOrder" class="form-label">Location</label>
                                    <input type="text" class="form-control" id="SliderOrder" name="location"
                                        value="<?= $row->location ?>">
                                </div>

                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                    <label for="SeoDescription" class="form-label">Subject</label>
                                    <textarea class="form-control" id="SeoDescription" name="subject"
                                        rows="3"><?= htmlspecialchars($row->subject) ?></textarea>
                                </div>

                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                    <label for="LongDescription" class="form-label">Message</label>
                                    <textarea class="form-control" id="LongDescription" name="message"
                                        rows="3"><?= htmlspecialchars($row->message) ?></textarea>
                                </div>

                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                    <button type="submit" name="submit" value="submit" class="btn btn-primary fs-6">
                                        Update
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
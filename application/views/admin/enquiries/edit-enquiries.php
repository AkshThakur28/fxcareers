<div class="main-content app-content">
    <div class="container-fluid">


        <!-- Page Header -->
        <div class="d-flex align-items-center justify-content-between page-header-breadcrumb flex-wrap gap-2">
            <div>
                <nav>
                    <ol class="breadcrumb mb-1">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page"> Edit Enquiries </li>
                    </ol>
                </nav>
                <h1 class="page-title fw-medium fs-18 mb-0">Edit Enquiries </h1>
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
                            Edit Enquiries
                        </div>
                    </div>
                    <?php $row = $edit_enquiry; ?>

                    <div class="card-body">
                        <form method="post" action="<?= base_url('admin/enquiry/enquiries_update_data'); ?>"
                            enctype="multipart/form-data">
                            <input type="hidden" name="id" value="<?= $row->id ?>">
                            <div class="row gy-4">

                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                    <label for="SliderOrder" class="form-label">Firstname</label>
                                    <input type="text" class="form-control" id="SliderOrder" name="first_name"
                                        value="<?= $row->first_name ?>">
                                </div>

                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                    <label for="SliderOrder" class="form-label">Lastname</label>
                                    <input type="text" class="form-control" id="SliderOrder" name="last_name"
                                        value="<?= $row->last_name ?>">
                                </div>

                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                    <label for="SliderOrder" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="SliderOrder" name="email_address"
                                        value="<?= $row->email_address ?>">
                                </div>

                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                    <label for="SliderOrder" class="form-label">Mobile</label>
                                    <input type="number" class="form-control" id="SliderOrder" name="phone_number"
                                        value="<?= $row->phone_number ?>">
                                </div>

                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                    <label for="SliderOrder" class="form-label">Address</label>
                                    <input type="text" class="form-control" id="SliderOrder" name="address"
                                        value="<?= $row->address ?>">
                                </div>

                                <?php
                                $preffered_topic_fetch_data = $this->db->get("preffered_topic")->result_array();

                                $selected_topics = array_map('trim', explode(',', $row->product_purchase));
                                ?>

                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                    <label for="SliderOrder" class="form-label">Select Courses</label>
                                    <div class="form-control" style="height:auto;">
                                        <?php foreach ($preffered_topic_fetch_data as $data): ?>
                                            <div class="form-check" style="margin-bottom: 5px;">
                                                <input class="form-check-input" type="checkbox"
                                                    id="topic_<?= $data['id'] ?>" name="topics[]"
                                                    value="<?= $data['topic_name'] ?>" <?= in_array($data['topic_name'], $selected_topics) ? 'checked' : '' ?>>
                                                <label class="form-check-label" for="topic_<?= $data['id'] ?>">
                                                    <?= $data['topic_name'] ?>
                                                </label>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
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
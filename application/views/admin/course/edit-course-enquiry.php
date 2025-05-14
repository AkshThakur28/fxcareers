<div class="main-content app-content">
    <div class="container-fluid">

        <!-- Page Header -->
        <div class="d-flex align-items-center justify-content-between page-header-breadcrumb flex-wrap gap-2">
            <div>
                <nav>
                    <ol class="breadcrumb mb-1">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page"> Edit Course Enquiries </li>
                    </ol>
                </nav>
                <h1 class="page-title fw-medium fs-18 mb-0">Edit Course Enquiries </h1>
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
                            Edit Course Enquiries
                        </div>
                    </div>
                    <?php $row = $edit_course_enquiry; ?>

                    <div class="card-body">
                        <form method="post" action="<?= base_url('admin/course/course_enquiries_update_data'); ?>"
                            enctype="multipart/form-data">
                            <input type="hidden" name="id" value="<?= $row->id ?>">
                            <div class="row gy-4">

                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                    <label for="CourseCategory" class="form-label">Course Name</label>
                                    <select id="course_name" class="form-select" name="course_name">
                                        <option value="" disabled>Select course name</option>
                                        <?php
                                        $courses_fetch_data = $this->Course_model->fetch_courses();
                                        foreach ($courses_fetch_data as $data): ?>
                                            <option value="<?= htmlspecialchars($data->course_name) ?>"
                                                <?= ($data->course_name === $row->course_name) ? 'selected' : '' ?>>
                                                <?= htmlspecialchars($data->course_name) ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                    <label for="SliderOrder" class="form-label">Username</label>
                                    <input type="text" class="form-control" id="SliderOrder" name="name"
                                        value="<?= $row->name ?>">
                                </div>

                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                    <label for="SliderOrder" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="SliderOrder" name="email"
                                        value="<?= $row->email ?>">
                                </div>

                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                    <label for="SliderOrder" class="form-label">Mobile</label>
                                    <input type="number" class="form-control" id="SliderOrder" name="mobile"
                                        value="<?= $row->mobile ?>">
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
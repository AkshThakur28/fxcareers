<div class="main-content app-content">
    <div class="container-fluid">


        <!-- Page Header -->
        <div class="d-flex align-items-center justify-content-between page-header-breadcrumb flex-wrap gap-2">
            <div>
                <nav>
                    <ol class="breadcrumb mb-1">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page"> Edit Slider </li>
                    </ol>
                </nav>
                <h1 class="page-title fw-medium fs-18 mb-0">Eidt Slider </h1>
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
                            Edit App Slider
                        </div>
                    </div>
                    <?php foreach ($view_slider as $row): ?>
                        <div class="card-body">
                            <form method="post" action="<?= base_url('admin/slider/slider_update_data'); ?>"
                                enctype="multipart/form-data">
                                <input type="hidden" name="id" value="<?= $row->id ?>"> <!-- Pass the slider ID -->
                                <div class="row gy-4">
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                        <label for="SldierImage" class="form-label">Slider Image</label>
                                        <input type="file" class="form-control" id="SldierImage" name="slider_image"
                                            accept="image/*">
                                        <small>Current Image: <a
                                                href="<?= base_url('uploads/slider/' . $row->slider_image) ?>"
                                                target="_blank"><?= $row->slider_image ?></a></small>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                        <label for="SliderOrder" class="form-label">Slider URL</label>
                                        <input type="text" class="form-control" id="SliderOrder" name="slider_url"
                                            value="<?= $row->slider_url ?>">
                                    </div>
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                        <button type="submit" class="btn btn-primary fs-6">
                                            Update
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>

                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>
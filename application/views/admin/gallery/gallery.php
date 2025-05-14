<div class="main-content app-content">
    <div class="container-fluid">
        <!-- Page Header -->
        <div class="d-flex align-items-center justify-content-between page-header-breadcrumb flex-wrap gap-2">
            <div>
                <nav>
                    <ol class="breadcrumb mb-1">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Gallery</li>
                    </ol>
                </nav>
                <h1 class="page-title fw-medium fs-18 mb-0">Gallery</h1>
            </div>
            <div class="btn-list">
                <a href="<?= base_url('admin/gallery/add_gallery') ?>" class="btn btn-primary btn-wave me-0">
                    <i class="ri-menu-add-line me-1"></i> Add Gallery
                </a>
            </div>
        </div>
        <!-- Page Header Close -->

        <!-- Start:: row -->
        <div class="row">
            <?php foreach ($gallery_view as $row): ?>
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card custom-card position-relative">
                        <?php
                        // Split concatenated images
                        $images = explode(',', $row->images);
                        $preview_image = $images[0]; // Display the first image as a preview
                        ?>
                        <img src="<?= base_url('uploads/gallery/' . $preview_image); ?>" class="card-img-top"
                            alt="<?= $row->image_name; ?>">
                        <div class="dropdown gallery-edit d-inline-block">
                            <a class="tx-inverse btn btn-light btn-icons btn-sm" href="javascript:void(0);"
                                data-bs-toggle="dropdown">
                                <i class="bi bi-three-dots"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <a class="dropdown-item" href="javascript:void(0);" data-bs-toggle="modal"
                                        data-bs-target="#viewGalleryModal-<?= str_replace(' ', '-', $row->image_name); ?>">
                                        <i class="ri-eye-line"></i> View Gallery
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item"
                                        href="<?= base_url('admin/gallery/delete_gallery/' . $row->image_name) ?>">
                                        <i class="ri-delete-bin-6-line"></i> Remove
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <h6 class="card-title fw-medium"><?= $row->image_name; ?></h6>
                        </div>
                    </div>
                </div>

                <!-- Modal for viewing all images -->
                <div class="modal fade" id="viewGalleryModal-<?= str_replace(' ', '-', $row->image_name); ?>" tabindex="-1"
                    aria-labelledby="viewGalleryModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="viewGalleryModalLabel"><?= $row->image_name; ?> - Gallery</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <?php foreach ($images as $image): ?>
                                        <div class="col-md-4">
                                            <img src="<?= base_url('uploads/gallery/' . $image); ?>" class="img-fluid mb-3"
                                                alt="<?= $row->image_name; ?>">
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <!-- End:: row -->
    </div>
</div>

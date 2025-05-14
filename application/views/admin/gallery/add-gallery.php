
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
                <h1 class="page-title fw-medium fs-18 mb-0"> Add Gallery</h1>
            </div>
            <!-- <div class="btn-list">
                <a href="add-course.php" class="btn btn-primary btn-wave me-0">
                    <i class="ri-menu-add-line  me-1"></i> Add Gallery </a>
            </div> -->

        </div>

        <!-- Page Header Close -->
        <div class="row">
            <div class="col-xl-12">
                <div class="card custom-card">
                    <div class="card-header justify-content-between">
                        <div class="card-title">
                            Edit Gallery
                        </div>
                    </div>
                    <div class="card-body">
                    <form action="<?= base_url('admin/gallery/gallery_submit_data') ?>" method="post"
                    enctype="multipart/form-data">
                        <div class="row gy-4">

                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                                    <label for="GalleryCategory" class="form-label">Gallery category</label>
                                    <select id="image_name" class="form-select py-9 placeholder-13 text-15"
                                        name="image_name">
                                        <option value="1" disabled selected>Select gallery category</option>
                                        <?php
                                        $gallery_category_fetch_data = $this->Gallery_model->gallery_category_fetch();
                                        foreach ($gallery_category_fetch_data as $data) { ?>
                                            <option value="<?php echo $data->image_name ?>">
                                                <?php echo $data->image_name ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                <label for="galleryImage" class="form-label">Gallery Image</label>
                                <input type="file" class="form-control" id="galleryImage" name="image" value="" multiple>
                            </div>

                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                <button type="submit" class="btn btn-primary fs-6 ">
                                    Add
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

<!-- <script>
    function previewImage(event) {
        const file = event.target.files[0];
        const previewContainer = document.getElementById("image-preview");
        previewContainer.innerHTML = ""; // Clear any existing preview

        if (file) {
            const img = document.createElement("img");
            img.src = URL.createObjectURL(file);
            img.alt = "Uploaded Image";
            img.style.maxWidth = "200px";
            img.style.maxHeight = "150px";
            img.style.objectFit = "cover" ;
            previewContainer.appendChild(img);
        }
    }
</script> -->
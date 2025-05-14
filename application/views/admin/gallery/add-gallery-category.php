
<div class="main-content app-content">
    <div class="container-fluid">


        <!-- Page Header -->
        <div class="d-flex align-items-center justify-content-between page-header-breadcrumb flex-wrap gap-2">
            <div>
                <nav>
                    <ol class="breadcrumb mb-1">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Gallery Category</li>
                    </ol>
                </nav>
                <h1 class="page-title fw-medium fs-18 mb-0"> Add Gallery Category </h1>
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
                            Add Category
                        </div>
                    </div>
                    <div class="card-body">
                    <form action="<?= base_url('admin/gallery/gallery_category_submit_data') ?>" method="post"
                    enctype="multipart/form-data">
                        <div class="row gy-4">

                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                <label for="SeoTitle" class="form-label">Category </label>
                                <input type="text" class="form-control" id="image_name" name="image_name" value="" >
                            </div>

                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                <label for="SeoTitle" class="form-label">Image </label>
                                <input type="file" class="form-control" id="image" name="image" value="" >
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
        <!-- Start::row-1 -->
        <!--End::row-1 -->
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
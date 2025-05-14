<?php include('include/header.php'); ?>
<?php include('include/sidebar.php'); ?>
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
                <a href="add-course.php" class="btn btn-primary btn-wave me-0">
                    <i class="ri-menu-add-line  me-1"></i> Add Gallery </a>
            </div>
           
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
                    <div class="row gy-4">

                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                            <label for="CourseCategory" class="form-label"> Gallery Category</label>
                            <select class="form-control frm-select" data-trigger name="choices-single-default" id="choices-single-default">
                                <option value="">Select Category</option>
                                <option value="Choice 2" selected>Exhibition</option>
                                <option value="Choice 3">Sponsers</option>
                                <option value="Choice 4">Expo</option>

                            </select>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                            <label for="SeoTitle" class="form-label">Gallery Image</label>
                            <input type="file" class="form-control" id="SeoTitle" value="" accept="image/*">
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                            <div id="image-preview" class="mt-3">
                                <img src="assets/images/gallery/gallery1.png" alt="" style="width: 200px; height:150px;object-fit:cover;">
                            </div>
                        </div>

                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">

                            <button type="submit" class="btn btn-primary fs-6 ">
                                Update
                            </button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
</div>

<?php include('include/footer.php'); ?>

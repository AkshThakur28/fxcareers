
<div class="main-content app-content">
    <div class="container-fluid">


        <!-- Page Header -->
        <div class="d-flex align-items-center justify-content-between page-header-breadcrumb flex-wrap gap-2">
            <div>
                <nav>
                    <ol class="breadcrumb mb-1">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page"> Edit  Slider </li>
                    </ol>
                </nav>
                <h1 class="page-title fw-medium fs-18 mb-0">Add Slider </h1>
            </div>
            <div class="btn-list">
                <a href="add-slider.php" class="btn btn-primary btn-wave me-0">
                    <i class="ri-image-add-line  me-1"></i> Add Slider </a>
            </div>
           
        </div>
 
    <!-- Page Header Close -->
    <div class="row">
        <div class="col-xl-12">
            <div class="card custom-card">
                <div class="card-header justify-content-between">
                    <div class="card-title">
                        Add App Slider
                    </div>
                </div>
                <div class="card-body">
                <form action="<?= base_url('admin/slider/slider_submit_data') ?>" method="post"
                enctype="multipart/form-data">
                    <div class="row gy-4">
                        
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                            <label for="SldierImage" class="form-label">Slider Image</label>
                            <input type="file" class="form-control" id="SldierImage" name="slider_image" value="" multiple>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                        <label for="SliderOrder" class="form-label">Slider URL</label>
                        <input type="text" class="form-control" id="SliderOrder" name="slider_url" value="">
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



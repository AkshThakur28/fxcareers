<div class="main-content app-content">
    <div class="container-fluid">


        <!-- Page Header -->
        <div class="d-flex align-items-center justify-content-between page-header-breadcrumb flex-wrap gap-2">
            <div>
                <nav>
                    <ol class="breadcrumb mb-1">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Courses</li>
                    </ol>
                </nav>
                <h1 class="page-title fw-medium fs-18 mb-0">Add SEO Details</h1>
            </div>

        </div>
        <!-- Page Header Close -->
        <div class="row">
            <div class="col-xl-12">
                <div class="card custom-card">
                    <div class="card-header justify-content-between">
                        <div class="card-title">
                            Add SEO Details
                        </div>
                    </div>
                    <div class="card-body">
                    <form action="<?= base_url('admin/seo/seo_submit_data') ?>" method="post"
                    enctype="multipart/form-data">
                        <div class="row gy-4">

                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                                <label for="PageName" class="form-label">Page Name</label>
                                <input type="text" class="form-control" id="PageName" name="page_name">
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                                <label for="SeoTitle" class="form-label">SEO Title</label>
                                <input type="text" class="form-control" id="SeoTitle" name="title">
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                                <label for="CourseDuration" class="form-label">SEO Keywords</label>
                                <input type="text" class="form-control" id="" name="keywords">
                            </div>
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                <label for="CourseDuration" class="form-label">SEO Description</label>
                                <textarea class="form-control" id="text-area" rows="3"
                                    name="meta_description"></textarea>
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
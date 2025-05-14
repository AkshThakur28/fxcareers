
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
                <h1 class="page-title fw-medium fs-18 mb-0">Edit Seo Details</h1>
            </div>
            <div class="btn-list">
                <!-- <a href="add-seo-details.php" class="btn btn-primary btn-wave me-0">
                    <i class="ri-menu-add-line  me-1"></i> Add Seo Details
                </a> -->
            </div>
        </div>
        <!-- Page Header Close -->
        <div class="row">
            <div class="col-xl-12">
                <div class="card custom-card">
                    <div class="card-header justify-content-between">
                        <!-- <div class="card-title">
                            Add SEO Details
                        </div> -->
                    </div>
                    <?php if (!empty($view_seo)): ?>
    <?php foreach ($view_seo as $row): ?>
        <div class="card-body">
            <form method="post" action="<?= base_url('admin/seo/seo_update_data'); ?>" enctype="multipart/form-data">
                <div class="row gy-4">
                    <input type="hidden" name="id" value="<?= $row->id ?>">
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                        <label for="SeoTitle" class="form-label">Page Name</label>
                        <input type="text" class="form-control" id="PageName" name="page_name" value="<?= $row->page_name ?>">
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                        <label for="SeoTitle" class="form-label">SEO Title</label>
                        <input type="text" class="form-control" id="SeoTitle" name="title" value="<?= $row->title ?>">
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                        <label for="CourseDuration" class="form-label">SEO Keywords</label>
                        <input type="text" class="form-control" name="keywords" value="<?= $row->keywords ?>">
                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <label for="CourseDuration" class="form-label">SEO Description</label>
                        <textarea class="form-control" id="text-area" name="meta_description" rows="3"><?= $row->meta_description ?></textarea>
                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <button type="submit" class="btn btn-primary fs-6">Save</button>
                    </div>
                </div>
            </form>
        </div>
    <?php endforeach; ?>
<?php else: ?>
    <div class="alert alert-warning">No SEO details found.</div>
<?php endif; ?>


                </div>
            </div>
        </div>
    </div>
</div>
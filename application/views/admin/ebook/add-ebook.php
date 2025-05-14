<div class="main-content app-content">
    <div class="container-fluid">
        <!-- Page Header -->
        <div class="d-flex align-items-center justify-content-between page-header-breadcrumb flex-wrap gap-2">
            <div>
                <nav>
                    <ol class="breadcrumb mb-1">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">eBooks</li>
                    </ol>
                </nav>
                <h1 class="page-title fw-medium fs-18 mb-0">Add eBook</h1>
            </div>
        </div>
        <!-- Page Header Close -->

        <div class="row">
                <div class="col-xl-12">
                    <div class="card custom-card">
                        <div class="card-header justify-content-between">
                            <div class="card-title">
                                Add eBook
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="<?= base_url('admin/ebook/ebook_submit_data') ?>" method="POST" enctype="multipart/form-data">
                                
                                <div class="row gy-4">         
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                        <label for="BookTitle" class="form-label">eBook Title</label>
                                        <input type="text" class="form-control" name="ebook_name" id="BookTitle" placeholder="" required>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                        <label for="BookType" class="form-label">eBook Type</label>
                                        <input type="text" class="form-control" name="ebook_type" id="BookType" placeholder="" required>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                        <label for="bookImage" class="form-label">eBook Image</label>
                                        <input type="file" class="form-control" name="ebook_image" id="bookImage" accept="image/*">
                                    </div> 
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                        <label for="ebookPdf" class="form-label">Upload eBook</label>
                                        <input type="file" class="form-control" name="ebook_pdf" id="ebookPdf" accept="application/pdf">
                                    </div>
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                        <label for="CourseDuration" class="form-label">eBook Short Description</label>
                                        <textarea class="form-control" name="ebook_desc" id="text-area" rows="3" required></textarea>
                                    </div>  
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                        <button type="submit" class="btn btn-primary fs-6">
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

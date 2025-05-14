<!-- Start::app-content -->
<div class="main-content app-content">
    <div class="container-fluid">


        <!-- Page Header -->
        <div class="d-flex align-items-center justify-content-between page-header-breadcrumb flex-wrap gap-2">
            <div>
                <nav>
                    <ol class="breadcrumb mb-1">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Pages</a></li>
                        <li class="breadcrumb-item active" aria-current="page">eBooks</li>
                    </ol>
                </nav>
                <h1 class="page-title fw-medium fs-18 mb-0">eBooks</h1>
            </div>
            <div class="btn-list">
                <?php if ($this->session->userdata('role') == '1'): ?>
                    <a href="<?= base_url('admin/ebook/add_ebook') ?>" class="btn btn-primary btn-wave me-0">
                        <i class="ri-health-book-line"></i> Add eBooks
                    </a>
                <?php endif; ?>
            </div>
        </div>
        <!-- Page Header Close -->
        <!-- Start:: row-1 -->


        <div class="row">
            <?php
            $c = 1;
            foreach ($ebook_view as $row) { ?>
                <div class="col-lg-3 col-md-6">
                    <div class="card custom-card">
                        <img src="<?= base_url('uploads/ebook_image/' . $row->ebook_image); ?>" alt="ebook Image">
                        <div class="card-body">
                            <h6 class="card-title fw-medium line-clamp-1"><?= $row->ebook_name ?></h6>
                            <p class="card-text text-muted line-clamp-3"><?= $row->ebook_desc ?></p>
                            <a href="<?= base_url('uploads/ebook_pdf/') . $row->ebook_pdf; ?>" target="_blank"
                                class="btn btn-primary">Read More</a>
                            <?php if ($this->session->userdata('role') == '1'): ?>
                                <a href="<?= base_url('admin/ebook/edit_ebook/') . $row->id; ?>"
                                    class="btn btn-outline-primary">Edit</a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
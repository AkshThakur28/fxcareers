<div class="main-content app-content">
    <div class="container-fluid">


        <!-- Page Header -->
        <div class="d-flex align-items-center justify-content-between page-header-breadcrumb flex-wrap gap-2">
            <div>
                <nav>
                    <ol class="breadcrumb mb-1">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">All Blog</li>
                    </ol>
                </nav>
                <h1 class="page-title fw-medium fs-18 mb-0">All Blog </h1>
            </div>
            <div class="btn-list">
                <?php if (in_array($this->session->userdata('role'), ['1', '3'])): ?>
                    <a href="<?= base_url('admin/blog/add_blog') ?>" class="btn btn-primary btn-wave me-0">
                        <i class="ri-news-line  me-1"></i> Add New Blog
                    </a>
                <?php endif; ?>
            </div>

        </div>
        <!-- Page Header Close -->
        <!-- Start::row-1 -->


        <div class="row g-4">
            <?php foreach ($blog_view as $row): ?>
                <div class="col-lg-4 col-md-6">
                    <div class="card custom-card h-100 overflow-hidden">
                        <div class="card-body p-0">
                            <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                                <a href="<?= base_url('blog/') ?><?= str_replace(' ', '-', str_replace([':', ',', '  '], '', strtolower($row->blog_name))); ?>"
                                    class="stretched-link"></a>
                                <div class=" rounded-0">
                                    <img src="<?= base_url('uploads/blogs/' . $row->blog_image); ?>"
                                        class=" blog-featured-img d-block w-100" alt="...">

                                </div>
                            </div>
                            <div class="p-3">
                                <h5 class="fw-semibold">
                                    <a
                                        href="<?= base_url('blog/') ?><?= str_replace(' ', '-', str_replace([':', ',', '  '], '', strtolower($row->blog_name))); ?>">
                                        <?= $row->blog_name ?>
                                    </a>
                                </h5>
                                <p class="mb-3 line-clamp-3">
                                    <?= strlen($row->seo_desc) > 80 ? substr($row->seo_desc, 0, 80) . '...' : $row->seo_desc; ?>
                                    <a href="<?= base_url('blog/') ?><?= str_replace(' ', '-', str_replace([':', ',', '  '], '', strtolower($row->blog_name))); ?>"
                                        class="fw-medium text-primary ms-2 align-middle fs-12"
                                        style="text-decoration: none;">
                                        Read More
                                    </a>
                                </p>

                                <div class="d-flex flex-wrap align-items-center justify-content-between">
                                    <div class="d-flex align-items-center">
                                        <div class="avatar avatar-md avatar-rounded me-2">
                                            <img src="https://cdn-icons-png.flaticon.com/512/6596/6596121.png" alt="">
                                        </div>
                                        <div>
                                            <p class="mb-0 fw-medium"><?= $row->blog_author ?></p>
                                            <p class="text-muted fs-12 mb-0"><?= $row->blog_date ?></p>
                                        </div>
                                    </div>

                                    <div class="d-flex align-items-center">
                                        <?php if (in_array($this->session->userdata('role'), ['1', '3'])): ?>
                                            <a href="<?= base_url('admin/blog/edit_blog/') . $row->id ?>"
                                                class="btn btn-icon btn-sm btn-info-transparent rounded-pill me-2">
                                                <i class="ri-edit-line"></i>
                                            </a>
                                            <a href="<?= base_url('admin/blog/delete_blog/') . $row->id ?>"
                                                class="btn btn-icon btn-sm btn-danger-transparent dlt rounded-pill"
                                                onclick="return confirm('Are you sure you want to delete this blog?');">
                                                <i class="ri-delete-bin-line"></i>
                                            </a>
                                        <?php endif; ?>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>

                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
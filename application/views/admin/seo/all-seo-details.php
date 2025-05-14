<div class="main-content app-content">
    <div class="container-fluid">


        <!-- Page Header -->
        <div class="d-flex align-items-center justify-content-between page-header-breadcrumb flex-wrap gap-2">
            <div>
                <nav>
                    <ol class="breadcrumb mb-1">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">SEO</li>
                    </ol>
                </nav>
                <h1 class="page-title fw-medium fs-18 mb-0">All SEO Details</h1>
            </div>
            <div class="btn-list">
                <a href="<?= base_url('admin/seo/add_seo') ?>" class="btn btn-primary btn-wave me-0">
                    <i class="ri-menu-add-line  me-1"></i> Add SEO Details
                </a>
            </div>
        </div>
        <!-- Page Header Close -->
        <!-- Start::row-1 -->
        <div class="row">
            <div class="col-xl-12">
                <div class="card custom-card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="SeoTable" class="table table-bordered table-striped text-nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>S. No.</th>
                                        <th>Page Name</th>
                                        <th>SEO Title</th>
                                        <th>SEO Keywords</th>
                                        <th>SEO Description</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $c = 1;
                                    foreach ($seo_view as $row) { ?>
                                        <tr>
                                            <td><?= $c++; ?></td>
                                            <td><?= strlen($row['page_name']) > 20 ? substr($row['page_name'], 0, 20) . '...' : $row['page_name']; ?>
                                            </td>
                                            <td><?= strlen($row['title']) > 30 ? substr($row['title'], 0, 30) . '...' : $row['title']; ?>
                                            </td>
                                            <td><?= strlen($row['keywords']) > 30 ? substr($row['keywords'], 0, 30) . '...' : $row['keywords']; ?>
                                            </td>
                                            <td><?= strlen($row['meta_description']) > 30 ? substr($row['meta_description'], 0, 30) . '...' : $row['meta_description']; ?>
                                            </td>
                                            <td>
                                                <div class="hstack gap-2 fs-15">
                                                    <a href="<?= base_url('admin/seo/edit_seo/') . $row['id'] ?>"
                                                        class="btn btn-icon btn-sm btn-info-transparent rounded-pill"><i
                                                            class="ri-edit-line"></i></a>
                                                    <a href="<?= base_url('admin/seo/delete_seo/') . $row['id'] ?>"
                                                        class="btn btn-icon btn-sm btn-danger-transparent dlt rounded-pill"
                                                        onclick="return confirm('Are you sure you want to delete this record?');"><i
                                                            class="ri-delete-bin-line"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--End::row-1 -->
    </div>
</div>
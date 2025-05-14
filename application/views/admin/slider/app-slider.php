
<!-- Start::app-content -->
<div class="main-content app-content">
    <div class="container-fluid">


        <!-- Page Header -->
        <div class="d-flex align-items-center justify-content-between page-header-breadcrumb flex-wrap gap-2">
            <div>
                <nav>
                    <ol class="breadcrumb mb-1">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">App slider</li>
                    </ol>
                </nav>
                <h1 class="page-title fw-medium fs-18 mb-0">App slider</h1>
            </div>
            <div class="btn-list">
                <a href="<?= base_url('admin/slider/add_slider')?>" class="btn btn-primary btn-wave me-0">
                    <i class="ri-menu-add-line  me-1"></i> Add App Slider
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
                            <table id="datatable-basic" class="table table-bordered table-striped text-nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>S. No.</th>                                                                             
                                        <th>Slider Image</th>
                                        <th>Slider URL </th>  
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    $c = 1;
                                    foreach ($slider_view as $row) { ?>
                                    <tr>
                                        <td><?= $c++; ?></td>
                                        <td class="gallery-img"><img src="<?= base_url('uploads/slider/' . $row->slider_image); ?>" alt="Teacher Image"></td>
                                        <td><?= $row->slider_url ?></td>                                    
                                        <td>
                                            <div class="hstack gap-2 fs-15">
                                                <a href="<?= base_url('admin/slider/edit_slider/') . $row->id ?>" class="btn btn-icon btn-sm btn-info-transparent rounded-pill"><i class="ri-edit-line"></i></a>
                                                <a href="<?= base_url('admin/slider/delete_slider/') . $row->id ?>" class="btn btn-icon btn-sm btn-danger-transparent dlt rounded-pill"><i class="ri-delete-bin-line"></i></a>
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

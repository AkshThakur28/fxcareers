<!-- Start::app-content -->
<div class="main-content app-content">
    <div class="container-fluid">


        <!-- Page Header -->
        <div class="d-flex align-items-center justify-content-between page-header-breadcrumb flex-wrap gap-2">
            <div>
                <nav>
                    <ol class="breadcrumb mb-1">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Login history</li>
                    </ol>
                </nav>
                <h1 class="page-title fw-medium fs-18 mb-0">Login history</h1>
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
                                        <th>S.No.</th>
                                        <th>Name</th>
                                        <th>IP address</th>
                                        <th>Login time</th>
                                        <th>Actions</th>


                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $c = 1;
                                    foreach ($login_history_view as $row): ?>
                                        <tr>
                                            <td><?= $c++; ?></td>
                                            <td class="toggle-details">
                                                <?= $row->name ?>
                                            </td>
                                            <td><?= $row->ip_address ?></td>
                                            <td><?= $row->login_time ?></td>
                                            <td>
                                                <div class="hstack gap-2 fs-15">
                                                    <a href="<?= base_url('admin/login_history/delete_login_history/' . $row->id); ?>"
                                                        class="btn btn-icon btn-sm btn-danger-transparent dlt rounded-pill"
                                                        onclick="return confirm('Are you sure want to delete ?');"><i
                                                            class="ri-delete-bin-line"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
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


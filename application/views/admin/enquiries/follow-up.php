<!-- Start::app-content -->
<div class="main-content app-content">
    <div class="container-fluid">


        <!-- Page Header -->
        <div class="d-flex align-items-center justify-content-between page-header-breadcrumb flex-wrap gap-2">
            <div>
                <nav>
                    <ol class="breadcrumb mb-1">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Follow Up</li>
                    </ol>
                </nav>
                <h1 class="page-title fw-medium fs-18 mb-0">Follow Up</h1>
            </div>
            <div class="btn-list">
                <div class="btn-list">
                    <button id="exportBtn" class="btn btn-wave text-white" style="background-color: #F9C311;">
                        <i class="ri-file-download-line me-1"></i> Export CSV
                    </button>
                </div>
            </div>
        </div>
        <!-- Page Header Close -->

        <!-- Start::row-1 -->
        <div class="row">
            <div class="col-xl-12">
                <div class="card custom-card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="FollowUpTable" class="table table-bordered table-striped text-nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>S.No.</th>
                                        <th>Username</th>
                                        <th>Remark</th>
                                        <th>Remark By</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $c = 1;
                                    foreach ($follow_up_view as $row) { ?>
                                        <tr>
                                            <td><?= $c++; ?></td>
                                            <td class="toggle-details">
                                            <?= $row->first_name . ' ' . $row->last_name ?>
                                            </td>
                                            <td><?= $row->remark ?></td>
                                            <td><?= $row->user_id ?></td>
                                            <td><?= $row->remark_date ?></td>
                                            <td>
                                                <div class="hstack gap-2 fs-15">
                                                    <a href="<?= base_url('admin/purchase/add_purchase/' . $row->form_userid) ?>"
                                                        class="btn btn-sm btn-success btn-wave waves-effect waves-light">
                                                        Enroll</a>
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

<script>
    $(document).ready(function () {
        $('#FollowUpTable').DataTable({
            columnDefs: [
                {
                    targets: [4], 
                    render: function (data, type, row) {
                        if (type === 'display' && data) {
                            const wordLimit = 8; 
                            const words = data.split(' ');
                            return words.length > wordLimit
                                ? words.slice(0, wordLimit).join(' ') + '...'
                                : data;
                        }
                        return data;
                    }
                }
            ]
        });
    });
</script>

<script>
    document.getElementById('exportBtn').addEventListener('click', function () {
        window.location.href = "<?= base_url('admin/topic/export_csv') ?>";
    });
</script>
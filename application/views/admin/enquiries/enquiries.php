<!-- Start::app-content -->
<div class="main-content app-content">
    <div class="container-fluid">


        <!-- Page Header -->
        <div class="d-flex align-items-center justify-content-between page-header-breadcrumb flex-wrap gap-2">
            <div>
                <nav>
                    <ol class="breadcrumb mb-1">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Enquiries</li>
                    </ol>
                </nav>
                <h1 class="page-title fw-medium fs-18 mb-0">Enquiries</h1>
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
                            <table id="EnquiriesTable" class="table table-bordered table-striped text-nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>S.No.</th>
                                        <th>Full Name</th>
                                        <th>Mobile No.</th>
                                        <th>Email</th>
                                        <th>Address</th>
                                        <th>Enroll</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $c = 1;
                                    foreach ($enquiry_view as $row) { ?>
                                        <tr>
                                            <td><?= $c++; ?></td>
                                            <td class="toggle-details">
                                                <?= $row->first_name . ' ' . $row->last_name ?>
                                            </td>
                                            <td><?= $row->phone_number ?></td>
                                            <td><?= $row->email_address ?></td>
                                            <td><?= $row->address ?></td>
                                            <td>
                                                <div class="hstack gap-2 fs-15">
                                                    <a href="<?= base_url('admin/purchase/add_purchase/' . $row->user_id) ?>"
                                                        class="btn btn-sm btn-success btn-wave waves-effect waves-light">
                                                        Enroll</a>

                                                    <button type="button" class="btn toggle-btn" data-bs-toggle="modal"
                                                        data-bs-target="#followUpModal<?php echo $row->id ?>"
                                                        style="background-color:#FEC83D;">Follow Up</button>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="hstack gap-2 fs-15">
                                                    <a href="<?= base_url('admin/enquiry/edit_enquiries/') . $row->id ?>"
                                                        class="btn btn-icon btn-sm btn-info-transparent rounded-pill"><i
                                                            class="ri-edit-line"></i></a>

                                                    <a href="<?= base_url('admin/enquiry/delete_enquiries/') . $row->id ?>"
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

<?php
foreach ($enquiry_view as $form_view) { ?>
    <div class="modal fade" id="followUpModal<?php echo $form_view->id ?>" tabindex="-1"
        aria-labelledby="followUpModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-dark" id="followUpModalLabel">Add Remark</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('admin/enquiry/followup_submit') ?>" method="post">
                        <input type="hidden" class="form-control" id="form_userid" name="form_userid"
                            value="<?= $form_view->user_id ?>">
                        <input type="hidden" class="form-control" id="form_id" name="form_id" value="<?= $form_view->id; ?>"
                            readonly>
                        <input type="hidden" class="form-control" id="user_id" name="user_id"
                            value="<?= $this->session->userdata('username'); ?>" readonly>
                        <div class="form-group row">
                            <div class="form-group col-lg-6 mb-3">
                                <label for="remark" class="form-label text-dark">Remark</label>
                                <input type="text" style="color:black;" class="form-control bg-white" id="remark"
                                    name="remark">
                            </div>
                            <div class="form-group col-lg-6 mb-3">
                                <label for="remark_date" class="form-label text-dark">Remark Date</label>
                                <input type="date" style="color:black;" class="form-control bg-white" id="remark_date"
                                    name="remark_date">
                            </div>
                        </div>
                        <button name="submit" value="<?= $form_view->id; ?>" class="btn btn-primary"
                            type="submit">Add</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<script>
    $(document).ready(function () {
        $('#EnquiriesTable').DataTable({
            columnDefs: [
                {
                    targets: [4], // Columns: SEO Title, SEO Keywords, SEO Description
                    render: function (data, type, row) {
                        if (type === 'display' && data) {
                            const wordLimit = 8; // Adjust the word limit
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
        window.location.href = "<?= base_url('admin/enquiry/export_csv') ?>";
    });
</script>
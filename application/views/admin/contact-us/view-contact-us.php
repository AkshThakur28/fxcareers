<div class="main-content app-content">
    <div class="container-fluid">


        <!-- Page Header -->
        <div class="d-flex align-items-center justify-content-between page-header-breadcrumb flex-wrap gap-2">
            <div>
                <nav>
                    <ol class="breadcrumb mb-1">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
                    </ol>
                </nav>
                <h1 class="page-title fw-medium fs-18 mb-0">Contact Us Details</h1>
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
                            <table id="ContactTable" class="table table-bordered table-striped text-nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>S.No.</th>
                                        <th>Username</th>
                                        <th>Mobile</th>
                                        <th>Email</th>
                                        <th>Message</th>
                                        <th>Subject</th>
                                        <th>Location</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $c = 1;
                                    foreach ($view_contact_details as $row) { ?>
                                        <tr>
                                            <td><?= $c++; ?></td>
                                            <td><?= strlen($row->username) > 20 ? substr($row->username, 0, 20) . '...' : $row->username; ?>
                                            </td>
                                            <td><?= strlen($row->mobile_no) > 20 ? substr($row->mobile_no, 0, 20) . '...' : $row->mobile_no; ?>
                                            </td>
                                            <td><?= strlen($row->email) > 60 ? substr($row->email, 0, 60) . '...' : $row->email; ?>
                                            </td>
                                            <td><?= strlen($row->message) > 20 ? substr($row->message, 0, 20) . '...' : $row->message; ?>
                                            </td>
                                            <td><?= strlen($row->subject) > 20 ? substr($row->subject, 0, 20) . '...' : $row->subject; ?>
                                            </td>
                                            <td><?= strlen($row->location) > 30 ? substr($row->location, 0, 30) . '...' : $row->location; ?>
                                            </td>
                                            <td>
                                                <div class="hstack gap-2 fs-15">
                                                    <a href="<?= base_url('admin/contact_us/edit_contact_enquiries/') . $row->id ?>"
                                                        class="btn btn-icon btn-sm btn-info-transparent rounded-pill"><i
                                                            class="ri-edit-line"></i></a>

                                                    <a href="<?= base_url('admin/contact_us/delete_contact_us/') . $row->id ?>"
                                                        class="btn btn-icon btn-sm btn-danger-transparent dlt rounded-pill"
                                                        onclick="return confirm('Are you sure you want to delete this record?');">
                                                        <i class="ri-delete-bin-line"></i>
                                                    </a>
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
        $('#ContactTable').DataTable({
            columnDefs: [
                {
                    targets: [4],
                    render: function (data, type, row) {
                        if (type === 'display' && data) {
                            const wordLimit = 7;
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
        window.location.href = "<?= base_url('admin/contact_us/export_csv') ?>";
    });
</script>
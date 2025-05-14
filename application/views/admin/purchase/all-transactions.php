<!-- Start::app-content -->
<div class="main-content app-content">
    <div class="container-fluid">


        <!-- Page Header -->
        <div class="d-flex align-items-center justify-content-between page-header-breadcrumb flex-wrap gap-2">
            <div>
                <nav>
                    <ol class="breadcrumb mb-1">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">All Transactions</li>
                    </ol>
                </nav>
                <h1 class="page-title fw-medium fs-18 mb-0">All Transactions</h1>
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
                                        <th>Payment For </th>
                                        <th>Amount</th>
                                        <th>Transaction ID</th>
                                        <th>Date</th>
                                        <th>Payment Status</th>
                                        <th>Actions</th>


                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $c = 1;
                                    foreach ($purchase_view as $row): ?>
                                        <tr>
                                            <td><?= $c++; ?></td>
                                            <td class="toggle-details">
                                                <?= $row->u1_username ?>
                                            </td>
                                            <td><?= $row->final_amount ?></td>
                                            <td><?= $row->transaction_id ?></td>
                                            <td><?= $row->created_at ?>
                                            </td>
                                            <td>
                                                <span
                                                    class="badge <?= $row->transaction_status === 'Paid' ? 'bg-success-transparent' : 'bg-danger-transparent' ?>">
                                                    <?= $row->transaction_status ?>
                                                </span>
                                            </td>
                                            <td>

                                                <div class="hstack gap-2 fs-15">
                                                <a href="<?= base_url('admin/purchase/invoice_receipt/' . $row->user_id); ?>"
                                                   class="btn btn-sm btn-success btn-wave waves-effect waves-light <?= in_array($row->transaction_status, ['Paid', 'Success']) ? '' : 'disabled' ?>">
                                                   <i class="ri-download-2-line align-middle me-2 d-inline-block"></i>
                                                   Download Invoice
                                                </a>

                                                        <?php if ($this->session->userdata('role') == '1'): ?>
                                                    <a href="<?= base_url('admin/purchase/purchase_view_delete/' . $row->id); ?>"
                                                        class="btn btn-icon btn-sm btn-danger-transparent dlt rounded-pill"
                                                        onclick="return confirm('Are you sure want to delete ?');"><i
                                                            class="ri-delete-bin-line"></i></a>
                                                            <?php endif; ?>
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

<script>
    $(document).ready(function () {
        $('#EnquiriesTable').DataTable({
            columnDefs: [
                {
                    targets: [4],
                    render: function (data, type, row) {
                        if (type === 'display' && data) {
                            const wordLimit = 7; // Adjust the word limit
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
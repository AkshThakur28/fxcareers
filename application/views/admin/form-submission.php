<div class="breadcrumb-with-buttons mb-24 flex-between flex-wrap gap-8">
    <!-- Breadcrumb Start -->
    <div class="breadcrumb mb-24">
        <ul class="flex-align gap-4">
            <li>
                <a href="index.html" class="text-gray-200 fw-normal text-15 hover-text-main-600">Home</a>
            </li>
            <li>
                <span class="text-gray-500 fw-normal d-flex"><i class="ph ph-caret-right"></i></span>
            </li>
            <li>
                <span class="text-main-600 fw-normal text-15">Users</span>
            </li>
        </ul>
    </div>
    <!-- Breadcrumb End -->

    <!-- Breadcrumb Right Start -->
    <div class="flex-align gap-8 flex-wrap">
        <div class="position-relative text-gray-500 flex-align gap-4 text-13">
            <a href="<?= base_url() ?>admin/users/add_form">
                <button type="button"  class="btn toggle-btn mb-4 mr-2" style="background:#ffc107">Add Users</button>
            </a>
        </div>
    </div>
    <!-- Breadcrumb Right End -->
</div>

<div class="card overflow-hidden">
    <div class="card-body overflow-x-auto">
        <table id="studentTable" class="table table-striped">
            <thead>
                <tr>
                    <th class="h6 text-gray-300">SR No.</th>
                    <th class="h6 text-gray-300">Name</th>
                    <th class="h6 text-gray-300">Email</th>
                    <th class="h6 text-gray-300">Phone No</th>
                    <th class="h6 text-gray-300">Address</th>
                    <th class="h6 text-gray-300">Preffered Topic</th>
                    <th class="h6 text-gray-300">Preffered Timing</th>
                    <th class="h6 text-gray-300">Know about FXCareers</th>
                    <th class="h6 text-gray-300">Any Reference</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $c = 1;
                foreach ($form_view as $row) { ?>
                    <tr>
                        <span class="h6 mb-0 fw-medium text-gray-300">
                            <?= $c++; ?>
                        </span>
        </div>
        </td>
        <td>
            <span class="h6 mb-0 fw-medium text-gray-300"><?= $row->first_name ?>     <?= $row->last_name ?></span>
        </td>
        <td>
            <span class="h6 mb-0 fw-medium text-gray-300"><?= $row->email_address ?></span>
        </td>
        <td>
            <span class="h6 mb-0 fw-medium text-gray-300"><?= $row->phone_number ?></span>
        </td>
        <td>
            <span class="h6 mb-0 fw-medium text-gray-300"><?= $row->address ?></span>
        </td>
        <td>
            <span class="h6 mb-0 fw-medium text-gray-300"><?= $row->product_purchase ?></span>
        </td>
        <td>
            <span class="h6 mb-0 fw-medium text-gray-300"><?= $row->address_state ?></span>
        </td>
        <td>
            <span class="h6 mb-0 fw-medium text-gray-300"><?= $row->product_satisfaction ?></span>
        </td>
        <td>
            <span class="h6 mb-0 fw-medium text-gray-300">
                <ul>
                    <li>Name : <?= $row->referal_first_name ?>     <?= $row->referal_last_name ?></li>
                    <li>Email : <?= $row->referal_email_address ?></li>
                    <li>Monbile : <?= $row->referal_phone_number ?></li>
                </ul>
            </span>
        </td>
        </tr>
    <?php } ?>
    </tbody>
    </table>
</div>
<div class="card-footer flex-between flex-wrap">
    <span class="text-gray-900">Showing 1 to 10 of 12 entries</span>
    <ul class="pagination flex-align flex-wrap">
        <li class="page-item active">
            <a class="page-link h-44 w-44 flex-center text-15 rounded-8 fw-medium" href="#">1</a>
        </li>
        <li class="page-item">
            <a class="page-link h-44 w-44 flex-center text-15 rounded-8 fw-medium" href="#">2</a>
        </li>
        <li class="page-item">
            <a class="page-link h-44 w-44 flex-center text-15 rounded-8 fw-medium" href="#">3</a>
        </li>
        <li class="page-item">
            <a class="page-link h-44 w-44 flex-center text-15 rounded-8 fw-medium" href="#">...</a>
        </li>
        <li class="page-item">
            <a class="page-link h-44 w-44 flex-center text-15 rounded-8 fw-medium" href="#">8</a>
        </li>
        <li class="page-item">
            <a class="page-link h-44 w-44 flex-center text-15 rounded-8 fw-medium" href="#">9</a>
        </li>
        <li class="page-item">
            <a class="page-link h-44 w-44 flex-center text-15 rounded-8 fw-medium" href="#">10</a>
        </li>
    </ul>
</div>
</div>

<!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <!-- Include DataTables JS -->
        <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
        <!-- Include DataTables Bootstrap <script integration JS -->
        <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap4.min.js"></script>

        <script>
            jQuery(document).ready(function ($) {
                $('#table_id').DataTable({
                    "pagingType": "simple_numbers",
                    "lengthMenu": [5, 10, 25, 50],
                    "pageLength": 5,
                    "language": {
                        "paginate": {
                            "previous": "<",
                            "next": ">"
                        }
                    },
                    "responsive": true
                });
            });
        </script>
<div class="main-content app-content">
    <div class="container-fluid">


        <!-- Page Header -->
        <div class="d-flex align-items-center justify-content-between page-header-breadcrumb flex-wrap gap-2">
            <div>
                <nav>
                    <ol class="breadcrumb mb-1">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">My Courses</li>
                    </ol>
                </nav>
                <h1 class="page-title fw-medium fs-18 mb-0">My Courses</h1>
            </div>
        </div>
        <!-- Page Header Close -->
        <!-- Start::row-1 -->
        <div class="row">
            <?php
            if (empty($purchased_courses)) { // Check if no courses are purchased
                echo '<div class="col-12"><p>No courses purchased yet.</p></div>';
            } else {
                $c = 1;
                foreach ($purchased_courses as $row): ?>
                    <div class="col-lg-3 col-md-6">
                        <div class="card custom-card overflow-hidden">
                            <a href="<?= base_url('admin/purchase/course_details') ?>" class="d-block">
                            <img src="<?= base_url('uploads/course/' . $row['course_image']) ?>" alt="Image" class="img-fluid">
                            <div class="card-body">
                                <div class="d-flex align-items-center gap-2">
                                    <div class="flex-grow-1">
                                        <div class="fs-21 fw-medium mb-1">
                                            <h5><?= $row['course_name'] ?></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </a>
                        </div>
                    </div>
                <?php endforeach;
            }
            ?>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Select all toggle icons
        const toggleIcons = document.querySelectorAll(".tggleic");

        toggleIcons.forEach(function(icon) {
            icon.addEventListener("click", function() {
                const cardBody = icon.closest(".card-body");
                const listGroup = cardBody.querySelector(".list-group");

                // Close any previously open list
                document.querySelectorAll(".list-group").forEach(function(list) {
                    if (list !== listGroup && !list.classList.contains("d-none")) {
                        list.classList.add("d-none");
                        // Reset the icon for closed lists
                        const associatedIcon = list.closest(".card-body").querySelector(".tggleic i");
                        associatedIcon.classList.remove("bx-up-arrow-alt");
                        associatedIcon.classList.add("bx-down-arrow-alt");
                    }
                });

                // Toggle the visibility of the current list
                listGroup.classList.toggle("d-none");

                // Update the icon class based on the list's visibility
                if (listGroup.classList.contains("d-none")) {
                    icon.classList.remove("bx-up-arrow-alt");
                    icon.classList.add("bx-down-arrow-alt");
                } else {
                    icon.classList.remove("bx-down-arrow-alt");
                    icon.classList.add("bx-up-arrow-alt");
                }
            });
        });
    });
</script>

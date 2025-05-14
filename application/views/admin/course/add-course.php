<div class="main-content app-content">
    <div class="container-fluid">
        <!-- Page Header -->
        <div class="d-flex align-items-center justify-content-between page-header-breadcrumb flex-wrap gap-2">
            <div>
                <nav>
                    <ol class="breadcrumb mb-1">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Courses</li>
                    </ol>
                </nav>
                <h1 class="page-title fw-medium fs-18 mb-0">Add Course</h1>
            </div>
        </div>
        <!-- Page Header Close -->
        <div class="row">
            <div class="col-xl-12">
                <div class="card custom-card">
                    <div class="card-header justify-content-between">
                        <div class="card-title">Add New Courses</div>
                    </div>
                    <div class="card-body">
                        <!-- Form Start -->
                        <form action="<?= base_url('admin/course/course_submit_data') ?>" method="post"
                            enctype="multipart/form-data">
                            <div class="row gy-4">
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                                    <label for="CourseName" class="form-label">Course Name</label>
                                    <input type="text" class="form-control" name="course_name" id="CourseName" required>
                                </div>

                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                                    <label for="CourseCategory" class="form-label">Course Category</label>
                                    <select id="category" class="form-select py-9 placeholder-13 text-15"
                                        name="category">
                                        <option value="" disabled selected>Select course category</option>
                                        <?php
                                        $course_category_fetch_data = $this->Course_model->course_category_fetch();
                                        foreach ($course_category_fetch_data as $data) { ?>
                                            <option value="<?php echo $data['id']; ?>">
                                                <?php echo $data['category_name']; ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>

                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                                    <label for="CourseMode" class="form-label">Course Mode</label>
                                    <input type="text" class="form-control" name="mode" id="CourseMode">
                                </div>

                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                                    <label for="CourseAuthor" class="form-label">Course Author</label>
                                    <input type="text" class="form-control" name="author" id="CourseAuthor" required>
                                </div>

                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                                    <label for="CourseLanguage" class="form-label">Course Language</label>
                                    <select id="language" class="form-select py-9 placeholder-13 text-15"
                                        name="language">
                                        <option value="1" disabled selected>Select course language</option>
                                        <?php
                                        $course_language_fetch_data = $this->Course_model->course_language_fetch();
                                        foreach ($course_language_fetch_data as $data) { ?>
                                            <option value="<?php echo $data['language_name']; ?>">
                                                <?php echo $data['language_name']; ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>

                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                                    <label for="CourseImage" class="form-label">Course Featured Image</label>
                                    <input type="file" class="form-control" name="course_image" id="CourseImage"
                                        accept="image/*">
                                </div>

                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                                    <label for="CourseLessons" class="form-label">Course Lessons</label>
                                    <input type="text" class="form-control" name="lesson" id="CourseLessons">
                                </div>

                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                                    <label for="CourseStatus" class="form-label">Course Status</label>
                                    <input type="text" class="form-control" name="status" id="CourseStatus">
                                </div>

                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                                    <label for="CoursePrice" class="form-label">Course Price</label>
                                    <input type="text" class="form-control" name="base_price" id="CoursePrice">
                                </div>

                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                                    <label for="CourseDuration" class="form-label">Course Duration</label>
                                    <input type="text" class="form-control" name="duration" id="CourseDuration">
                                </div>

                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                                    <label for="SeoTitle" class="form-label">SEO Title</label>
                                    <input type="text" class="form-control" name="seo_title" id="SeoTitle">
                                </div>

                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                                    <label for="SeoKeywords" class="form-label">SEO Keywords</label>
                                    <input type="text" class="form-control" name="seo_keywords" id="SeoKeywords">
                                </div>

                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                    <label for="CourseDuration" class="form-label">SEO Description
                                    </label>
                                    <textarea type="text" name="seo_desc" parsley-trigger="change" class="form-control"
                                        id="seo_desc" placeholder="SEO Description  " required></textarea>
                                </div>

                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                    <label for="CourseDuration" class="form-label">Course Long Description
                                    </label>
                                    <textarea type="text" name="long_description" parsley-trigger="change"
                                        class="form-control" id="long_description" placeholder="SEO Description  "
                                        required></textarea>
                                </div>

                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                                    <button type="submit" class="btn btn-primary fs-6">Add Course</button>
                                </div>
                            </div>
                        </form>
                        <!-- Form End -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('seo_desc', {
        format_tags: 'p;h1;h2;h3;h4;h5;h6'
    });
</script>
<script>
    CKEDITOR.replace('long_description', {
        format_tags: 'p;h1;h2;h3;h4;h5;h6'
    });
</script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
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
                <h1 class="page-title fw-medium fs-18 mb-0">Edit Course</h1>
            </div>
        </div>
        <!-- Page Header Close -->

        <div class="row">
            <div class="col-xl-12">
                <div class="card custom-card">
                    <div class="card-header justify-content-between"></div>

                    <?php foreach ($view_course as $row): ?>
                        <div class="card-body">
                            <form method="post" action="<?= base_url('admin/course/course_update_data'); ?>"
                                enctype="multipart/form-data">
                                <input type="hidden" name="id" value="<?= $row->id ?>">
                                <input type="hidden" name="existing_course_image" value="<?= $row->course_image ?>">

                                <div class="row gy-4">
                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                                        <label for="CourseName" class="form-label">Course Name</label>
                                        <input type="text" class="form-control" id="CourseName" name="course_name"
                                            value="<?= htmlspecialchars($row->course_name) ?>">
                                    </div>

                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                                        <label for="CourseCategory" class="form-label">Course Category</label>
                                        <select id="category" class="form-select" name="category">
                                            <option value="" disabled>Select course category</option>
                                            <?php
                                            $course_category_fetch_data = $this->Course_model->course_category_fetch();
                                            foreach ($course_category_fetch_data as $data): ?>
                                                <option value="<?= $data['id'] ?>" <?= ($data['id'] === $row->category) ? 'selected' : '' ?>>
                                                    <?= htmlspecialchars($data['category_name']) ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>

                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                                        <label for="CourseMode" class="form-label">Course Mode</label>
                                        <input type="text" class="form-control" id="CourseMode" name="mode"
                                            value="<?= htmlspecialchars($row->mode) ?>">
                                    </div>

                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                                        <label for="CourseAuthor" class="form-label">Course Author</label>
                                        <input type="text" class="form-control" id="CourseAuthor" name="author"
                                            value="<?= htmlspecialchars($row->author) ?>">
                                    </div>

                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                                        <label for="CourseLanguage" class="form-label">Course Language</label>
                                        <select id="language" class="form-select" name="language">
                                            <option value="" disabled>Select course language</option>
                                            <?php
                                            $course_language_fetch_data = $this->Course_model->course_language_fetch();
                                            foreach ($course_language_fetch_data as $data): ?>
                                                <option value="<?= $data['id'] ?>" <?= ($data['id'] === $row->language) ? 'selected' : '' ?>>
                                                    <?= htmlspecialchars($data['language_name']) ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>

                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                                        <label for="formFile" class="form-label">Course Featured Image</label>
                                        <input class="form-control" type="file" id="formFile" name="course_image">
                                    </div>

                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                                        <label for="CourseLessons" class="form-label">Course Lessons</label>
                                        <input type="text" class="form-control" id="CourseLessons" name="lesson"
                                            value="<?= htmlspecialchars($row->lesson) ?>">
                                    </div>

                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                                        <label for="CourseStatus" class="form-label">Course Status</label>
                                        <input type="text" class="form-control" id="CourseStatus" name="status"
                                            value="<?= htmlspecialchars($row->status) ?>">
                                    </div>

                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                                        <label for="CoursePrice" class="form-label">Course Price</label>
                                        <input type="text" class="form-control" id="CoursePrice" name="base_price"
                                            value="<?= htmlspecialchars($row->base_price) ?>">
                                    </div>

                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                                        <label for="CourseDuration" class="form-label">Course Duration</label>
                                        <input type="text" class="form-control" id="CourseDuration" name="duration"
                                            value="<?= htmlspecialchars($row->duration) ?>">
                                    </div>

                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                                        <label for="SeoTitle" class="form-label">SEO Title</label>
                                        <input type="text" class="form-control" id="SeoTitle" name="seo_title"
                                            value="<?= htmlspecialchars($row->seo_title) ?>">
                                    </div>

                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                                        <label for="SeoKeywords" class="form-label">SEO Keywords</label>
                                        <input type="text" class="form-control" id="SeoKeywords" name="seo_keywords"
                                            value="<?= htmlspecialchars($row->seo_keywords) ?>">
                                    </div>

                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                        <label for="CourseDuration" class="form-label">SEO Description
                                        </label>
                                        <textarea type="text" name="seo_desc" parsley-trigger="change" class="form-control"
                                            id="seo_desc" placeholder="SEO Description  "
                                            required> <?= htmlspecialchars($row->seo_desc) ?></textarea>
                                    </div>

                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                        <label for="CourseDuration" class="form-label">Course Long Description
                                        </label>
                                        <textarea type="text" name="long_description" parsley-trigger="change"
                                            class="form-control" id="long_description" placeholder="SEO Description  "
                                            required><?= htmlspecialchars($row->long_description) ?></textarea>
                                    </div>

                                    <div class="row mt-4 justify-content-end">
                                        <div class="col-md-4 text-end">
                                            <button type="submit" class="btn btn-primary font-16">
                                                <i class="ri-save-3-line"></i> Save Change
                                            </button>
                                        </div>
                                    </div>

                                </div>
                            </form>
                        </div>
                    <?php endforeach; ?>
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
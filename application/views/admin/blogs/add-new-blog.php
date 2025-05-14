<div class="main-content app-content">
    <div class="container-fluid">


        <!-- Page Header -->
        <div class="d-flex align-items-center justify-content-between page-header-breadcrumb flex-wrap gap-2">
            <div>
                <nav>
                    <ol class="breadcrumb mb-1">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Blog</li>
                    </ol>
                </nav>
                <h1 class="page-title fw-medium fs-18 mb-0">Add New Blog </h1>
            </div>

        </div>
        <!-- Page Header Close -->
        <div class="row">
            <div class="col-xl-12">
                <div class="card custom-card">
                    <div class="card-header justify-content-between">
                        <div class="card-title">
                            Add New Blog
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="<?= base_url('admin/blog/blog_submit_data') ?>" method="post"
                            enctype="multipart/form-data">
                            <div class="row gy-4">
                                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12">
                                    <label for="BlogTitle" class="form-label">Blog Title</label>
                                    <input type="text" class="form-control" name="blog_name" id="blog_name">
                                </div>
                                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12">
                                    <label for="BlogDate" class="form-label">Date</label>
                                    <input type="Date" class="form-control" name="blog_date" id="blog_date">
                                </div>
                                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12">
                                    <label for="BlogAuthor" class="form-label">Blog Author</label>
                                    <input type="text" class="form-control" name="blog_author" id="blog_author">
                                </div>
                                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12">
                                    <label for="FeaturedImage" class="form-label">Blog Featured Image</label>
                                    <input class="form-control" type="file" name="blog_image" id="blog_image">
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                                    <label for="SeoTitle" class="form-label">Meta Title</label>
                                    <input type="text" class="form-control" name="seo_title" id="seo_title">
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                                    <label for="CourseDuration" class="form-label">SEO Keywords</label>
                                    <input type="text" class="form-control" name="keywords" id="keywords">
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                    <label for="CourseDuration" class="form-label">Meta Description</label>
                                    <textarea class="form-control" name="seo_desc" id="seo_desc" rows="3"></textarea>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                                    <label for="blog_category" class="form-label">Blog Category</label>
                                    <select id="blog_category" class="form-control" name="blog_category"
                                        style="appearance: auto; -webkit-appearance: auto; -moz-appearance: auto;">
                                        <option value="">Select Blog Category</option>
                                        <?php
                                        $blog_fetch_data = $this->Blog_model->blog_fetch();
                                        foreach ($blog_fetch_data as $data) { ?>
                                            <option value="<?php echo $data['id']; ?>"><?php echo $data['category']; ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>

                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                    <label for="CourseDuration" class="form-label">Blog Content
                                    </label>
                                    <textarea type="text" name="long_desc" parsley-trigger="change" class="form-control"
                                        id="long_desc" placeholder="Blog Long Description  " required></textarea>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                                    <button type="submit" class="btn btn-primary fs-6 ">
                                        Add Blog
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('long_desc', {
        format_tags: 'p;h1;h2;h3;h4;h5;h6'
    });
</script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
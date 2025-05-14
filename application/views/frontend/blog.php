<style>
    .pagination .page-item.active .page-link {
        background-color: #F7C215 !important;
        border-color: #F7C215 !important;
    }
</style>

<main>
    <section class="blog_banner pb-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-7 align-self-center">
                    <h3 class="mb-0"> FXCareers Blogs</h3>
                    <a href="<?= base_url() ?>" class="text-secondary"> <span class="me-2"><img
                                src="<?= base_url() ?>public/assets/img/arrow_left.svg" alt=""></span> Go Back Home</a>
                    <h2 class="mt-4">Stay Ahead in Trading <br> <span class="text-primary">Insights, Strategies & Market
                            Trends</span> </h2>
                    <p>learning from experts and staying updated with the latest forex and stock market insights.</p>

                    <!-- <div class="blog_search_box">
                        <div class="search-container justify-content-between">
                            <a href="" class="search_icon text-secondary">
                                <i class="ri-search-line p-2"></i>
                            </a>
                            <div class="search-box">
                                <input type="text" placeholder="Search blogs">
                            </div>
                            <div class="category-select">
                                <select>
                                    <option value="" selected disabled>Select Category</option>
                                    <option value="technology">Technology</option>
                                    <option value="business">Business</option>
                                    <option value="health">Health</option>
                                    <option value="entertainment">Entertainment</option>
                                </select>
                            </div>
                        </div>
                    </div> -->
                </div>

                <div class="col-lg-5 position-relative ps-lg-5">
                    <div class="swiper-container blogSwiper">
                        <div class="swiper-wrapper">
                            <!-- Slides -->
                            <div class="swiper-slide pb-0">
                                <img src="<?= base_url() ?>public/assets/img/blog_banner_sllide_1.png" class="img-fluid"
                                    alt="Placeholder">
                            </div>
                            <div class="swiper-slide pb-0">
                                <img src="<?= base_url() ?>public/assets/img/blog_banner_sllide_2.png" class="img-fluid"
                                    alt="Placeholder">
                            </div>
                            <div class="swiper-slide pb-0">
                                <img src="<?= base_url() ?>public/assets/img/blog_banner_sllide_3.png" class="img-fluid"
                                    alt="Placeholder">
                            </div>
                        </div>

                        <!-- Pagination dots -->
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="blog pt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-10">
                    <div class="head">
                        <div class="catagory_btn">
                            <h3 class="">Browse By categories</h3>
                            <a href="javascript:void(0);" class="me-2 bg-primary border-0 category-btn active"
                                data-filter="all">All</a>
                            <?php foreach ($blog_categories as $row): ?>
                                <a href="javascript:void(0);" class="me-2 category-btn"
                                    data-filter="<?= $row->category ?>"><?= $row->category ?></a>
                            <?php endforeach ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row g-4 mt-4" id="blogList">
                <div class="row mt-4" id="noBlogsMsg" style="display: none;">
                    <div class="col text-center">
                        <p class="text-muted">No blogs available for this category.</p>
                    </div>
                </div>

                <?php foreach ($all_blogs as $row): ?>
                    <div class="col-lg-4 col-md-6 blog-item"
                        data-category="<?= isset($row->blog_category) ? $row->blog_category : '' ?>">
                        <div class="blog_box">
                            <div class="blog_img">
                                <img src="<?= base_url('uploads/blogs/') . (isset($row->blog_image) ? $row->blog_image : 'default.jpg'); ?>"
                                    class="img-fluid w-100" style="object-fit: cover;" alt="">
                            </div>
                            <div class="blog_disc px-2 py-3">
                                <h4 class="lineclamp_1"><?= isset($row->blog_name) ? $row->blog_name : 'No Title' ?></h4>
                                <div class="readmore_date d-flex justify-content-between align-items-center mt-2">
                                    <a href="<?= base_url('blog/') ?><?= str_replace(' ', '-', str_replace([':', ',', '  '], '', strtolower($row->blog_name))); ?>"
                                        class="d-flex btn text-white readmore industry_graident">
                                        Read More
                                        <span class="more_nav_arrow ms-1">
                                            <i class="ri-arrow-right-up-line fw-bold"></i>
                                        </span>
                                    </a>
                                    <p>
                                        <?= isset($row->blog_date) ? date('d-m-Y', strtotime($row->blog_date)) : 'Unknown Date' ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>

            </div>
        </div>

        <div class="row">
            <div class="col">
                <?php
                $total_pages = ceil($total_blogs / $limit);
                $current_page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
                ?>
                <nav aria-label="Page navigation example" style="box-shadow: none;">
                    <ul class="pagination justify-content-center py-5">
                        <li class="page-item <?= ($current_page <= 1) ? 'disabled' : '' ?>">
                            <a class="page-link" href="?page=<?= $current_page - 1 ?>" aria-label="Previous">
                                <span aria-hidden="true"><i class="ri-arrow-left-line"></i></span>
                            </a>
                        </li>

                        <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                            <li class="page-item <?= ($i == $current_page) ? 'active' : '' ?>">
                                <a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a>
                            </li>
                        <?php endfor; ?>

                        <li class="page-item <?= ($current_page >= $total_pages) ? 'disabled' : '' ?>">
                            <a class="page-link" href="?page=<?= $current_page + 1 ?>" aria-label="Next">
                                <span aria-hidden="true"><i class="ri-arrow-right-line"></i></span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </section>

</main>



<script>
    const categoryButtons = document.querySelectorAll('.category-btn');
    const blogItems = document.querySelectorAll('.blog-item');
    const noBlogsMsg = document.getElementById('noBlogsMsg');

    let currentCategory = 'all';

    categoryButtons.forEach(btn => {
        btn.addEventListener('click', () => {
            categoryButtons.forEach(b => b.classList.remove('bg-primary', 'border-0', 'active'));
            btn.classList.add('bg-primary', 'border-0', 'active');

            currentCategory = btn.getAttribute('data-filter');
            let matchedBlogs = 0;

            blogItems.forEach(item => {
                if (currentCategory === 'all' || item.getAttribute('data-category') === currentCategory) {
                    item.classList.remove('d-none');
                    matchedBlogs++;
                } else {
                    item.classList.add('d-none');
                }
            });

            if (matchedBlogs === 0) {
                noBlogsMsg.style.display = 'block';
            } else {
                noBlogsMsg.style.display = 'none';
            }
        });
    });
</script>

<script>
    const loadBlogs = (page = 1) => {
        $.ajax({
            url: "<?= base_url('website/fetch_paginated_blogs') ?>",
            method: "POST",
            data: { page: page },
            dataType: "json",
            success: function (response) {
                const blogList = $('#blogList');
                blogList.html('');

                if (response.blogs.length === 0) {
                    blogList.html('<div class="col text-center"><p class="text-muted">No blogs found.</p></div>');
                    return;
                }

                response.blogs.forEach(row => {
                    const blogItem = `
                        <div class="col-lg-4 blog-item" data-category="${row.blog_category}">
                            <div class="blog_box">
                                <div class="blog_img" style="height: 250px; overflow: hidden;">
                                    <img src="<?= base_url('uploads/blogs/') ?>${row.blog_image}" class="img-fluid w-100 h-100" style="object-fit: cover;" alt="">
                                </div>
                                <div class="blog_disc px-2 py-3">
                                    <h4 class="lineclamp_1">${row.blog_name}</h4>
                                    <div class="readmore_date d-flex justify-content-between align-items-center mt-2">
                                        <a href="<?= base_url('blog/') ?>${row.blog_name.toLowerCase().replace(/ /g, "-")}" class="d-flex btn text-white readmore industry_graident">
                                            Read More
                                            <span class="more_nav_arrow ms-1">
                                                <i class="ri-arrow-right-up-line fw-bold"></i>
                                            </span>
                                        </a>
                                        <p>${new Date(row.blog_date).toLocaleDateString('en-GB')}</p>
                                    </div>
                                </div>
                            </div>
                        </div>`;
                    blogList.append(blogItem);
                });

                let totalPages = Math.ceil(response.total_blogs / response.per_page);
                const pagination = $('.pagination');
                pagination.html('');

                pagination.append(`<li class="page-item ${page === 1 ? 'disabled' : ''}">
                    <a class="page-link" href="#" data-page="${page - 1}" aria-label="Previous">
                        <span aria-hidden="true"><i class="ri-arrow-left-line"></i></span>
                    </a>
                </li>`);

                for (let i = 1; i <= totalPages; i++) {
                    pagination.append(`<li class="page-item ${i === page ? 'active' : ''}">
                        <a class="page-link" href="#" data-page="${i}">${i}</a>
                    </li>`);
                }

                pagination.append(`<li class="page-item ${page === totalPages ? 'disabled' : ''}">
                    <a class="page-link" href="#" data-page="${page + 1}" aria-label="Next">
                        <span aria-hidden="true"><i class="ri-arrow-right-line"></i></span>
                    </a>
                </li>`);
            }
        });
    };

    $(document).ready(function () {
        loadBlogs(1);

        $(document).on('click', '.page-link', function (e) {
            e.preventDefault();
            const page = parseInt($(this).data('page'));
            if (!isNaN(page)) {
                loadBlogs(page);
            }
        });
    });
</script>
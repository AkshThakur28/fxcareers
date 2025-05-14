<main>
    <section class="blog_dedails overflow-unset">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h2>FXCareers Blogs</h2>
                    <a href="<?= base_url() ?>" class="text-secondary"> <span class="me-2"><img
                                src="<?= base_url() ?>public/assets/img/arrow_left.svg" alt=""></span> Go Back Home</a>
                </div>
            </div>
            <div class="row">
                <?php foreach ($blog_detail as $row): ?>
                    <div class="col-lg-8">
                        <div class="detils_wraper">

                            <div class="blog_img mt-5">
                                <img src="<?= base_url('uploads/blogs/') . $row->blog_image ?>" class="img-fluid" alt=""
                                    style="height:auto !important">
                            </div>
                            <div class="date_time d-flex align-items-center  mt-3">
                                <div class="date me-3"> <img src="<?= base_url() ?>public/assets/img/date.png" width="25px"
                                        alt=""><?= date('d-m-Y', strtotime($row->blog_date)) ?></div>
                                <div class="time"> <img src="<?= base_url() ?>public/assets/img/clock.png" width="25px"
                                        alt=""> 5 minutes of Reading
                                </div>
                            </div>
                            <div class="blog_disc mt-3">
                                <h1 class="postbox__title fw-semibold mb-20"><?= $row->blog_name ?></h1>
                                <?= $row->blog_desc ?>
                                <?= $row->long_desc ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>

                <div class="col-lg-4">
                 <div class="blog-sidebar">
                       <div class="recent_post_wraper mt-5 ">
                        <?php foreach ($blogs as $blog): ?>
                            <div class="recent_post_box d-flex align-items-center mt-2">
                                <div class="recent_blog_img">
                                    <img src="<?= base_url('uploads/blogs/') . $blog->blog_image ?>" class="img-fluid"
                                        alt="">
                                </div>
                                <div class="recent_blog_disc">
                                    <div class="date fs-6">
                                        <img src="<?= base_url() ?>public/assets/img/date.png" alt="">
                                        <?= date('d-m-Y', strtotime($blog->blog_date)) ?>
                                    </div>
                                    <div class="post_headding">
                                        <h6>
                                            <a href="<?= base_url('blog/') ?><?= str_replace(' ', '-', str_replace([':', ',', '  '], '', strtolower($row->blog_name))); ?>"
                                                style="color: inherit; text-decoration: none;">
                                                <?= $blog->blog_name ?>
                                            </a>

                                        </h6>
                                    </div>
                                </div>
                            </div>
                            <hr style="stroke: rgba(120, 104, 44, 0.50);">
                        <?php endforeach ?>
                    </div>

                    <div class="Expert_card text-center p-4">
                        <img src="<?= base_url() ?>public/assets/img/blog_expert_img.png" class="w-75" alt="">
                        <h5>Want to Expert in Trading?</h5>
                        <h6>One Step a Way</h6>
                        <p>Start building your trading skills for a successful financial future.</p>
                        <button href="#" data-bs-toggle="modal" data-bs-target="#staticBackdrop"
                            class="mainthemebutton">Get Started <i
                                class="ri-arrow-right-up-line fw-bold bg-black rounded-circle text-warning" style="padding: 4px;
font-size: 12px;
"></i></button>

                    </div>
                 </div>
                </div>
            </div>
        </div>
    </section>

</main>

<div class="modal job_popup seminar fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header justify-content-between border-0">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Fill out the form below!</h1>
                <button type="button" class="mdl-close-btn " data-bs-dismiss="modal" aria-label="Close"><i
                        class="ri-close-large-line"></i></button>
            </div>
            <div class="modal-body">
                <div class="container seminar">

                    <form action="<?= base_url() ?>website/submit_blog_form_data" method="POST">
                        <div class="row">
                            <?php foreach ($blog_detail as $row): ?>
                                <input type="hidden" name="blog_name" value="<?= $row->blog_name ?>">
                            <?php endforeach; ?>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">First Name*</label>
                                    <input type="text" class="form-control" name="firstname" id="firstname"
                                        aria-describedby="helpId" required placeholder="Enter Your First Name" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">Last Name*</label>
                                    <input type="text" class="form-control" name="lastname" id="lastname"
                                        aria-describedby="helpId" required placeholder="Enter Your Last Name" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">Email*</label>
                                    <input type="email" class="form-control" name="email" id="email"
                                        aria-describedby="helpId" required placeholder="Enter Your Email Address" />

                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">Mobile*</label>
                                    <input type="number" class="form-control" name="mobile" id="mobile"
                                        aria-describedby="helpId" required placeholder="Enter Your Mobile Number" />
                                </div>
                            </div>

                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <button type="submit" value="submit" name="submit"
                                    class="mainthemebutton py-3 w-100 text-center fs-bold">
                                    Submit
                                    <span><img src="<?= base_url() ?>public/assets/img/form_btn_icon.png" width="30px"
                                            alt=""></span>
                                </button>
                            </div>
                        </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
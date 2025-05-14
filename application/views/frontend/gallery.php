<style>
    .image-box {
        width: 100%;
        height: 250px;
        overflow: hidden;
        border-radius: 10px;
    }

    .image-box img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.3s ease;
    }

    .image-box img:hover {
        transform: scale(1.05);
    }
</style>
<main>
    <section class="gallery_container">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h2>Our Gallery</h2>
                    <a href="<?= base_url() ?>" class="text-secondary">
                        <span class="me-2"><img src="<?= base_url() ?>public/assets/img/arrow_left.svg" alt=""></span>
                        Go Back Home
                    </a>
                </div>
            </div>

            <?php foreach ($event_galleries as $event): ?>
                <?php
                $event_name = $event->image_name;
                $main_images = $this->gallery_model->get_gallery_images_by_event($event_name);
                if (empty($main_images))
                    continue;

                $gallery_id = $main_images[0]->id;
                $sub_images = $this->gallery_model->get_sub_gallery_by_event_id($gallery_id);
                $fancybox_group = 'gallery_' . $gallery_id;
                ?>

                <div class="row mt-5">
                    <div class="col">
                        <h1><?= $event_name ?></h1>
                    </div>

                    <div class="col-12 overflow-hidden position-relative mt-5">
                        <div class="swiper-gallery swiper-<?= $gallery_id ?>">
                            <div class="swiper-wrapper">
                                <?php foreach ($main_images as $img): ?>
                                    <div class="swiper-slide">
                                        <div class="acchivement_Box d-flex align-items-center justify-content-center image-box">
                                            <img src="<?= base_url('uploads/gallery/' . $img->image); ?>" alt="">
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                                <?php foreach ($sub_images as $img): ?>
                                    <div class="swiper-slide">
                                        <div class="acchivement_Box d-flex align-items-center justify-content-center image-box">
                                            <img src="<?= base_url('uploads/sub_gallery/' . $img->image); ?>" alt="">
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                            <div class="swiper-button-next swiper-button-next-<?= $gallery_id ?>"></div>
                            <div class="swiper-button-prev swiper-button-prev-<?= $gallery_id ?>"></div>
                        </div>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col">
                        <a href="<?= base_url('uploads/gallery/' . $main_images[0]->image); ?>"
                            data-fancybox="<?= $fancybox_group ?>" class="allimgbtn text-secondary">
                            See All Photos
                            <img src="<?= base_url('uploads/gallery/' . $main_images[0]->image); ?>" style="display:none"
                                alt="Cover Image" />
                            <span class="me-2">
                                <img src="<?= base_url('public/assets/img/arrow_right_yellow.png'); ?>" width="50px" alt="">
                            </span>
                        </a>

                        <?php foreach ($main_images as $index => $img): ?>
                            <?php if ($index > 0): ?>
                                <a href="<?= base_url('uploads/gallery/' . $img->image); ?>" data-fancybox="<?= $fancybox_group ?>">
                                    <img src="<?= base_url('uploads/gallery/' . $img->image); ?>" style="display:none"
                                        alt="Hidden Image" />
                                </a>
                            <?php endif; ?>
                        <?php endforeach; ?>

                        <?php foreach ($sub_images as $img): ?>
                            <a href="<?= base_url('uploads/sub_gallery/' . $img->image); ?>"
                                data-fancybox="<?= $fancybox_group ?>">
                                <img src="<?= base_url('uploads/sub_gallery/' . $img->image); ?>" style="display:none"
                                    alt="Hidden Sub Image" />
                            </a>
                        <?php endforeach; ?>
                    </div>
                </div>

                <script>
                    var swiper<?= $gallery_id ?> = new Swiper('.swiper-<?= $gallery_id ?>', {
                        slidesPerView: 1,
                        spaceBetween: 10,
                        loop: true,
                        autoplay: {
                            delay: 2500,
                            disableOnInteraction: false,
                        },
                        navigation: {
                            nextEl: '.swiper-button-next-<?= $gallery_id ?>',
                            prevEl: '.swiper-button-prev-<?= $gallery_id ?>',
                        },
                        breakpoints: {
                            640: { slidesPerView: 2, spaceBetween: 20 },
                            1024: { slidesPerView: 3, spaceBetween: 30 }
                        }
                    });
                </script>
            <?php endforeach; ?>
        </div>
    </section>
</main>
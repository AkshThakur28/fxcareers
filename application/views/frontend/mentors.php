<section>
    <div class="container">

        <div class="row">
            <div class="col-lg-7 align-self-center">
                <h2>Our Mentors</h2>
                <a href="index.php" class="text-secondary"> <span class="me-2"><img
                            src="<?= base_url() ?>public/assets/img/arrow_left.svg" alt=""></span> Go Back Home</a>
            </div>
        </div>
    </div>
</section>
<section class="py-0">
    <div class="container">
        <div class="row ">
            <div class="col-lg-10  mb-5">
                <h2 class=" wow fadeInDown" data-wow-delay="0.2s"><span class="afterifmg position-relative"> CEO & Chief
                        Mentor</span></h2>
            </div>
        </div>
        <div class="row">
            <?php foreach ($coo_and_mentor as $mentor): ?>
                <div class="col-lg-3">
                    <div class="team-wrapper posiiton-relative ">
                        <div class="img-box" style="width: 100%; height: 300px; overflow: hidden; position: relative;">
                            <img src="<?= base_url() ?>uploads/teachers/<?= $mentor->teacher_image ?>" alt=""
                                class="img-fluid " style="width: 100%; height: 100%; object-fit: cover;">
                            <a
                                href="<?= base_url() ?>mentor/<?= str_replace(' ', '-', strtolower($mentor->teacher_name)); ?>">

                                <div class="member_details ">
                                    <h6 class="name text-white mb-0 ">
                                        <?= $mentor->teacher_name ?>
                                    </h6>
                                    <p class="post text-primary mb-0">
                                        <?= $mentor->designation ?>
                                    </p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section>
    <div class="container">
        <div class="row ">
            <div class="col-lg-10 mb-5">
                <h2 class="  wow fadeInDown" data-wow-delay="0.2s">Meet Our<span class="afterifmg position-relative">
                        mentors </span></h2>
            </div>
        </div>
        <div class="row">
            <?php foreach ($teachers as $row): ?>
                <?php if ($row->teacher_name == 'Sandesh Nandode')
                    continue; ?>
                <div class="col-lg-3">
                    <div class="team-wrapper posiiton-relative">
                        <div class="img-box" style="width: 100%; height: 300px; overflow: hidden; position: relative;">
                            <img src="<?= base_url() ?>uploads/teachers/<?= $row->teacher_image ?>" alt="" class="img-fluid"
                                style="width: 100%; height: 100%; object-fit: cover;">
                            <a href="<?= base_url() ?>mentor/<?= str_replace(' ', '-', strtolower($row->teacher_name)); ?>">
                                <div class="member_details">
                                    <h6 class="name text-white mb-0">
                                        <?= $row->teacher_name ?>
                                    </h6>
                                    <p class="post text-primary mb-0">
                                        <?= $row->designation ?>
                                    </p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>
    </div>
</section>
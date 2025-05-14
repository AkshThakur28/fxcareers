<section>
  <div class="container">

    <div class="row">
      <div class="col-lg-7 align-self-center">
        <h2>Mentor Details</h2>
        <a href="index.php" class="text-secondary"> <span class="me-2"><img
              src="<?= base_url() ?>public/assets/img/arrow_left.svg" alt=""></span> Go Back Home</a>
      </div>
    </div>
  </div>
</section>
<section class="mentors-content">
  <div class="container">
    <div class="row justify-content-center">
      <?php foreach ($teacher_detail as $row): ?>
        <div class="col-lg-12 ">
          <div class="mentor-details-wrapper">
            <div class="row g-4">
              <div class=" col-md-4 col-lg-3">
                <div class="mentor-profile">
                  <div class="team-wrapper posiiton-relative  ">
                    <div class="img-box team-img">
                      <img src="<?= base_url() ?>uploads/teachers/<?= $row->teacher_image ?>" alt="" class="img-fluid ">
                      <a href="" class="d-block">

                        <div class="member_details ">
                          <h6 class="name text-white mb-0 font-14 ">
                            <?= $row->teacher_name ?>
                          </h6>
                          <p class="post text-primary mb-0 font-12">
                            <?= $row->designation ?>
                          </p>
                        </div>
                      </a>
                    </div>
                  </div>
                  <hr>
                  <ul class="ps-0">
                    <li class="font-14 pb-2">
                      <i class="ri-phone-line pe-3 text-primary"></i>
                      <a href="tel:+971 503056430" class="text-black"><?= $row->teacher_mobile ?></a>
                    </li>
                    <li class="font-14 pb-2">
                      <i class="ri-map-pin-line pe-3 text-primary"></i>
                      <a href="https://www.google.com/maps" target="_blank"
                        class="text-black"><?= $row->teacher_address ?></a>
                    </li>
                    <li class="font-14 pb-2">
                      <i class="ri-mail-line pe-3 text-primary"></i>
                      <a href="" class="text-black"><?= $row->teacher_email ?></a>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="col-md-8 col-lg-9  ps-lg-5">
                <div class="border-left-2 ps-3 mb-5">
                  <h2 class="mb-0 text-gradient"><?= $row->teacher_name ?>
                  </h2>
                  <p class="font-14  fw-semibold"> <?= $row->designation ?></p>
                </div>
                <h4>Introduction:</h4>
                <p><?= $row->teacher_introduction ?></p>
                <h4>Education:</h4>
                <p><?= $row->teacher_education ?>
                </p>
              </div>
            </div>
          </div>

        </div>
      <?php endforeach; ?>
    </div>

  </div>
</section>
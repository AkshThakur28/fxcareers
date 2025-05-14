<!-- Start::app-content -->
<div class="main-content app-content">
    <div class="container-fluid">


        <!-- Page Header -->
        <div class="d-flex align-items-center justify-content-between page-header-breadcrumb flex-wrap gap-2">
            <div>
                <nav>
                    <ol class="breadcrumb mb-1">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Pages</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Profile</li>
                    </ol>
                </nav>
                <h1 class="page-title fw-medium fs-18 mb-0">Profile</h1>
            </div>
            <div class="btn-list">
                <button class="btn btn-white btn-wave">
                    <i class="ri-filter-3-line align-middle me-1 lh-1"></i> Filter
                </button>
                <button class="btn btn-primary btn-wave me-0">
                    <i class="ri-share-forward-line me-1"></i> Share
                </button>
            </div>
        </div>
        <!-- Page Header Close -->

        <!-- Start:: row-1 -->
        <div class="row">
            <div class="col-xl-12">
                <div class="card custom-card profile-card">
                    <div class="profile-banner-img">
                        <img src="<?= base_url() ?>public/admin/assets/images/media/media-3.jpg" class="card-img-top"
                            alt="...">
                    </div>
                    <div class="card-body pb-0 position-relative">
                        <div class="row profile-content">

                            <div class="col-xl-3">
                                <div class="card custom-card overflow-hidden border">
                                    <div class="card-body border-bottom border-block-end-dashed">
                                        <div class="text-center">
                                            <span class="avatar avatar-xxl avatar-rounded online mb-3">
                                                <img src="<?= base_url() ?>public/admin/assets/images/faces/11.jpg"
                                                    alt="">
                                            </span>
                                            <h5 class="fw-semibold mb-1"><?= $profile_view['username'] ?></h5>
                                            <span
                                                class="d-block fw-medium text-muted mb-2"><?= $this->session->userdata('role_name'); ?></span>
                                            <p class="fs-12 mb-0 text-muted"> <span class="me-3"><i
                                                        class="ri-building-line me-1 align-middle"></i><?= $profile_view['city'] ?></span>
                                                <span><i class="ri-map-pin-line me-1 align-middle"></i><?= $profile_view['country'] ?></span>
                                            </p>
                                        </div>
                                    </div>

                                    <div class="p-3 pb-1 d-flex flex-wrap justify-content-between">
                                        <div class="fw-medium fs-15 text-primary1">
                                            Basic Info :
                                        </div>
                                    </div>
                                    <div class="card-body border-bottom border-block-end-dashed p-0">
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item pt-2 border-0">
                                                <div><span class="fw-medium me-2">Name :</span><span
                                                        class="text-muted"><?= $profile_view['username'] ?></span></div>
                                            </li>
                                            <li class="list-group-item pt-2 border-0">
                                                <div><span class="fw-medium me-2">Designation :</span><span
                                                        class="text-muted"><?= $this->session->userdata('role_name'); ?></span>
                                                </div>
                                            </li>
                                            <li class="list-group-item pt-2 border-0">
                                                <div><span class="fw-medium me-2">Email :</span><span
                                                        class="text-muted"><?= $profile_view['email'] ?></span></div>
                                            </li>
                                            <li class="list-group-item pt-2 border-0">
                                                <div><span class="fw-medium me-2">Phone :</span><span
                                                        class="text-muted"><?= $profile_view['mobile_no'] ?></span>
                                                </div>
                                            </li>
                                            <li class="list-group-item pt-2 border-0">
                                                <div><span class="fw-medium me-2">Age :</span><span
                                                        class="text-muted"><?= $profile_view['age'] ?></span>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>

                                </div>
                            </div>
                            <div class="col-xl-9">
                                <div class="card custom-card overflow-hidden border">
                                    <div class="card-body">
                                        <ul class="nav nav-tabs tab-style-6 mb-3 p-0" id="myTab" role="tablist">
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link w-100 text-start active" id="profile-about-tab"
                                                    data-bs-toggle="tab" data-bs-target="#profile-about-tab-pane"
                                                    type="button" role="tab" aria-controls="profile-about-tab-pane"
                                                    aria-selected="true"><i class="ri-id-card-line"></i> About</button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link w-100 text-start" id="edit-profile-tab"
                                                    data-bs-toggle="tab" data-bs-target="#edit-profile-tab-pane"
                                                    type="button" role="tab" aria-controls="edit-profile-tab-pane"
                                                    aria-selected="true"><i class="ri-user-3-line"></i> Edit
                                                    Profile</button>
                                            </li>
                                            <!-- <li class="nav-item" role="presentation">
                                                <button class="nav-link w-100 text-start" id="Change-tab"
                                                    data-bs-toggle="tab" data-bs-target="#Change-tab-pane" type="button"
                                                    role="tab" aria-controls="Change-tab-pane" aria-selected="false"><i
                                                        class="ri-mail-send-line"></i> Change Email & Phone</button>
                                            </li> -->

                                        </ul>
                                        <div class="tab-content" id="profile-tabs">
                                            <div class="tab-pane show active p-0 border-0" id="profile-about-tab-pane"
                                                role="tabpanel" aria-labelledby="profile-about-tab" tabindex="0">
                                                <ul class="list-group list-group-flush border rounded-3">
                                                    <li class="list-group-item p-3">
                                                        <span class="fw-medium fs-15 d-block mb-3"><span
                                                                class="me-1">&#10024;</span>About Info :</span>
                                                        <p class="text-muted mb-2">
                                                        <?= $profile_view['bio'] ?>
                                                        </p>
                                                    </li>
                                                    <li class="list-group-item p-3">
                                                        <span class="fw-medium fs-15 d-block mb-3">Contact Info :</span>
                                                        <div class="text-muted">
                                                            <p class="mb-3">
                                                                <span
                                                                    class="avatar avatar-sm avatar-rounded text-primary p-1 bg-primary-transparent me-2">
                                                                    <i class="ri-mail-line align-middle fs-15"></i>
                                                                </span>
                                                                <span class="fw-medium text-default">Email : </span>
                                                                <?= $profile_view['email'] ?>
                                                            </p>
                                                            <p class="mb-3">
                                                                <span
                                                                    class="avatar avatar-sm avatar-rounded text-primary2 p-1 bg-primary2-transparent me-2">
                                                                    <i class="ri-building-line align-middle fs-15"></i>
                                                                </span>
                                                                <span class="fw-medium text-default">Location : </span>
                                                                <?= $profile_view['city'] ?>, <?= $profile_view['country'] ?>
                                                            </p>
                                                            <p class="mb-0">
                                                                <span
                                                                    class="avatar avatar-sm avatar-rounded text-primary3 p-1 bg-primary3-transparent me-2">
                                                                    <i class="ri-phone-line align-middle fs-15"></i>
                                                                </span>
                                                                <span class="fw-medium text-default">Phone : </span>
                                                                <?= $profile_view['mobile_no'] ?>
                                                            </p>
                                                        </div>
                                                    </li>
                                                    <li class="list-group-item p-3">
                                        <span class="fw-medium fs-15 d-block mb-3">Skills :</span>
                                            <div class="w-75">
                                            <?php 
                                            if (!empty($profile_view['skills'])) {
                                            $skills = explode(',', $profile_view['skills']); 
                                            foreach ($skills as $skill) {
                                            $skill = trim($skill); 
                                            echo '<a href="javascript:void(0);">
                                        <span class="badge bg-light text-muted m-1 border">' . htmlspecialchars($skill) . '</span> 
                                        </a>';
                                        }
                                        } else {
                                        echo '<span class="text-muted">No skills listed</span>';
                                        }        
                                        ?>
                                        </div>
                                        </li>

                                                    <li class="list-group-item p-3">
                                                        <span class="fw-medium fs-15 d-block mb-3">Social Media :</span>
                                                        <div class="d-flex align-items-center gap-5 flex-wrap">
                                                            <div class="d-flex align-items-center gap-3 me-2">
                                                                <div>
                                                                    <span class="avatar avatar-md bg-primary"><i
                                                                            class="ri-github-line fs-16"></i></span>
                                                                </div>
                                                                <div>
                                                                    <span
                                                                        class="d-block fw-medium text-primay">Github</span>
                                                                    <span
                                                                        class="text-muted fw-medium"><?= $profile_view['github'] ?></span>
                                                                </div>
                                                            </div>
                                                            <div class="d-flex align-items-center gap-3 me-2">
                                                                <div>
                                                                    <span class="avatar avatar-md bg-primary1"><i
                                                                            class="ri-twitter-x-line fs-16"></i></span>
                                                                </div>
                                                                <div>
                                                                    <span
                                                                        class="d-block fw-medium text-primay1">Twitter</span>
                                                                    <span
                                                                        class="text-muted fw-medium"><?= $profile_view['twitter'] ?></span>
                                                                </div>
                                                            </div>
                                                            <div class="d-flex align-items-center gap-3 me-2">
                                                                <div>
                                                                    <span class="avatar avatar-md bg-primary2"><i
                                                                            class="ri-linkedin-line fs-16"></i></span>
                                                                </div>
                                                                <div>
                                                                    <span
                                                                        class="d-block fw-medium text-primay2">Linkedin</span>
                                                                    <span
                                                                        class="text-muted fw-medium"><?= $profile_view['linkedin'] ?></span>
                                                                </div>
                                                            </div>
                                                            <div class="d-flex align-items-center gap-3">
                                                                <div>
                                                                    <span class="avatar avatar-md bg-primary3"><i
                                                                            class="ri-briefcase-line fs-16"></i></span>
                                                                </div>
                                                                <div>
                                                                    <span class="d-block fw-medium text-primay3">My
                                                                        Portfolio</span>
                                                                    <span
                                                                        class="text-muted fw-medium"><?= $profile_view['portfolio'] ?></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="tab-pane show p-0 border-0" id="edit-profile-tab-pane"
                                                role="tabpanel" aria-labelledby="edit-profile-tab" tabindex="0">
                                                <div class="border rounded-3 p-3">
                                                    <ul class="nav nav-tabs mb-3 tab-style-8 scaleX" id="myTab4"
                                                        role="tablist">
                                                        <li class="nav-item" role="presentation">
                                                            <button class="nav-link active" id="accountDetails"
                                                                data-bs-toggle="tab"
                                                                data-bs-target="#accountDetails-pane" type="button"
                                                                role="tab" aria-controls="accountDetails-pane"
                                                                aria-selected="true"> Account Details</button>
                                                        </li>
                                                        <li class="nav-item" role="presentation">
                                                            <button class="nav-link" id="personalInfo"
                                                                data-bs-toggle="tab" data-bs-target="#personalInfo-pane"
                                                                type="button" role="tab"
                                                                aria-controls="personalInfo-pane"
                                                                aria-selected="false">Personal Info</button>
                                                        </li>
                                                        <li class="nav-item" role="presentation">
                                                            <button class="nav-link" id="Address" data-bs-toggle="tab"
                                                                data-bs-target="#Address-pane" type="button" role="tab"
                                                                aria-controls="Address-pane"
                                                                aria-selected="false">Address</button>
                                                        </li>
                                                        <li class="nav-item" role="presentation">
                                                            <button class="nav-link" id="socialLinks"
                                                                data-bs-toggle="tab" data-bs-target="#socialLinks-pane"
                                                                type="button" role="tab"
                                                                aria-controls="socialLinks-pane"
                                                                aria-selected="false">Social Links</button>
                                                        </li>
                                                    </ul>
                                                    <div class="tab-content" id="myTabContent3">
                                                        <div class="tab-pane show active overflow-hidden"
                                                            id="accountDetails-pane" role="tabpanel"
                                                            aria-labelledby="accountDetails" tabindex="0">
                                                            <form action="<?= base_url('admin/profile/update_profile') ?>"
                                                                method="POST" enctype="multipart/form-data">
                                                                <div class="row gy-3 align-items-center">
                                                                    <input type="hidden" name="id"
                                                                        value="<?= $profile_view['users_id'] ?>">
                                                                    <div class="col-md-6">
                                                                        <div class="lh-1 mb-2">
                                                                            <span class="fw-medium">First Name :</span>
                                                                        </div>
                                                                        <input type="text" class="form-control"
                                                                            id="firstname" name="firstname"
                                                                            placeholder="First Name"
                                                                            value="<?= $profile_view['firstname'] ?>">
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="lh-1 mb-2">
                                                                            <span class="fw-medium">Last Name :</span>
                                                                        </div>
                                                                        <input type="text" class="form-control"
                                                                            id="lastname" name="lastname"
                                                                            placeholder="Last Name"
                                                                            value="<?= $profile_view['lastname'] ?>">
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="lh-1 mb-2">
                                                                            <span class="fw-medium">Email :</span>
                                                                        </div>
                                                                        <input type="email" class="form-control"
                                                                            id="email" name="email" placeholder="Email"
                                                                            value="<?= $profile_view['email'] ?>">
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="lh-1 mb-2">
                                                                            <span class="fw-medium">Phone :</span>
                                                                        </div>
                                                                        <input type="number" class="form-control"
                                                                            id="mobile_no" name="mobile_no"
                                                                            placeholder="Mobile"
                                                                            value="<?= $profile_view['mobile_no'] ?>">
                                                                    </div>
                                                                    <?php if ($this->session->userdata('role') == '1'): ?>
                                                                        <div class="col-md-6">
                                                                            <div class="lh-1 mb-2">
                                                                                <span class="fw-medium">Select Role</span>
                                                                            </div>
                                                                            <select class="form-control" id="user_role"
                                                                                name="user_role">
                                                                                <option value="">Select Role</option>
                                                                                <?php
                                                                                $role_fetch_data = $this->Profile_model->role_fetch();
                                                                                foreach ($role_fetch_data as $data) { ?>
                                                                                    <option value="<?php echo $data['id']; ?>"
                                                                                        <?php if ($data['id'] === $profile_view['is_admin'])
                                                                                            echo 'selected="selected"'; ?>>
                                                                                        <?php echo $data['role_name']; ?>
                                                                                    </option>
                                                                                <?php } ?>
                                                                            </select>
                                                                        </div>
                                                                    <?php endif; ?>

                                                                    <div class="col-md-6">
                                                                        <div class="lh-1 mb-2">
                                                                            <span class="fw-medium">New Password</span>
                                                                        </div>
                                                                        <input type="Password"
                                                                            class="form-control password-show"
                                                                            id="password" name="password"
                                                                            placeholder="New Password">
                                                                        <i
                                                                            class=" toggle-password  ri-eye-off-line "></i>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="lh-1 mb-2">
                                                                            <span class="fw-medium">Confirm
                                                                                Password</span>
                                                                        </div>
                                                                        <input type="Password"
                                                                            class="form-control password-show"
                                                                            id="confirm_password"
                                                                            name="confirm_password"
                                                                            placeholder="Confirm Password">
                                                                        <i
                                                                            class=" toggle-password  ri-eye-off-line "></i>
                                                                    </div>
                                                                </div>
                                                                <div class="row mt-4 justify-content-end">
                                                                    <div class="col-md-4 text-end">
                                                                        <button type="submit"
                                                                            class="btn btn-primary font-16">
                                                                            <i class="ri-save-3-line"></i> Save Change
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>

                                                        <div class="tab-pane overflow-hidden" id="personalInfo-pane"
                                                            role="tabpanel" aria-labelledby="personalInfo" tabindex="0">
                                                            <form action="<?= base_url('admin/profile/update_personal_info') ?>"
                                                                method="POST" enctype="multipart/form-data">
                                                                <div class="row gy-3 align-items-center">
                                                                <input type="hidden" id="id" name="id"
                                                                value="<?= $profile_view['users_id'] ?>">
                                                                    <div class="col-md-6">
                                                                        <div class="lh-1 mb-2">
                                                                            <span class="fw-medium">Gender :</span>
                                                                        </div>
                                                                        <input type="text" class="form-control"
                                                                            placeholder="Gender" name="gender"
                                                                            value="<?= $profile_view['gender'] ?>">
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="lh-1 mb-2">
                                                                            <span class="fw-medium">DOB :</span>
                                                                        </div>
                                                                        <div class="input-group">
                                                                            <div class="input-group-text text-muted"> <i
                                                                                    class="ri-calendar-line"></i> </div>
                                                                            <input type="text"
                                                                                class="form-control flatpickr-input"
                                                                                id="date" name="dob" placeholder="Choose date"
                                                                                value="<?= $profile_view['dob'] ?>"
                                                                                readonly="readonly">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <div class="lh-1 mb-2">
                                                                            <span class="fw-medium">BIO :</span>
                                                                        </div>
                                                                        <textarea class="form-control" name="bio"
                                                                            placeholder="Bio"><?php echo isset($profile_view['bio']) ? htmlspecialchars($profile_view['bio']) : ''; ?></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="row mt-4 justify-content-end">
                                                                    <ddiv class="col-md-4 text-end">
                                                                        <button type="submit" class="btn btn-primary font-16 "><i
                                                                                class="ri-save-3-line"></i> Save
                                                                            Change</button>
                                                                    </ddiv>
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <div class="tab-pane overflow-hidden" id="Address-pane"
                                                            role="tabpanel" aria-labelledby="Address" tabindex="0">
                                                            <form action="<?= base_url('admin/profile/update_address_info') ?>"
                                                                method="POST" enctype="multipart/form-data">
                                                                <div class="row gy-3 align-items-center">
                                                                <input type="hidden" id="id" name="id"
                                                                value="<?= $profile_view['users_id'] ?>">
                                                                    <div class="col-md-6">
                                                                        <div class="lh-1 mb-2">
                                                                            <span class="fw-medium">Country :</span>
                                                                        </div>
                                                                        <input type="text" class="form-control"
                                                                            placeholder="Country" name="country" value="<?= $profile_view['country'] ?>">
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="lh-1 mb-2">
                                                                            <span class="fw-medium">State :</span>
                                                                        </div>
                                                                        <input type="text" class="form-control"
                                                                            placeholder="State" name="state" value="<?= $profile_view['state'] ?>">
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="lh-1 mb-2">
                                                                            <span class="fw-medium">City :</span>
                                                                        </div>
                                                                        <input type="text" class="form-control"
                                                                            placeholder="City" name="city" value="<?= $profile_view['city'] ?>">
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="lh-1 mb-2">
                                                                            <span class="fw-medium">Pin :</span>
                                                                        </div>
                                                                        <input type="text" class="form-control"
                                                                            placeholder="Pin" name="pin" value="<?= $profile_view['pin'] ?>">
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="lh-1 mb-2">
                                                                            <span class="fw-medium">Address :</span>
                                                                        </div>
                                                                        <input type="text" class="form-control"
                                                                            placeholder="Address"name="address"
                                                                            value="<?= $profile_view['address'] ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="row mt-4 justify-content-end">
                                                                    <ddiv class="col-md-4 text-end">
                                                                        <button type="submit" class="btn btn-primary font-16 "><i
                                                                                class="ri-save-3-line"></i> Save
                                                                            Change</button>
                                                                    </ddiv>
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <div class="tab-pane overflow-hidden" id="socialLinks-pane"
                                                            role="tabpanel" aria-labelledby="socialLinks" tabindex="0">
                                                            <form action="<?= base_url('admin/profile/update_socials') ?>"
                                                                method="POST" enctype="multipart/form-data">
                                                                <div class="row gy-3 align-items-center">
                                                                <input type="hidden" id="id" name="id"
                                                                value="<?= $profile_view['users_id'] ?>">
                                                                    <div class="col-md-6">
                                                                        <div class="lh-1 mb-2">
                                                                            <span class="fw-medium">Facebook :</span>
                                                                        </div>
                                                                        <input type="text" class="form-control" name= "facebook"
                                                                            placeholder="Facebook" value="<?= $profile_view['facebook'] ?>">
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="lh-1 mb-2">
                                                                            <span class="fw-medium">Instagram :</span>
                                                                        </div>
                                                                        <input type="text" class="form-control" name="instagram"
                                                                            placeholder="Instagram" value="<?= $profile_view['instagram'] ?>">
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="lh-1 mb-2">
                                                                            <span class="fw-medium">Twitter :</span>
                                                                        </div>
                                                                        <input type="text" class="form-control" name="twitter"
                                                                            placeholder="Twitter"
                                                                            value="<?= $profile_view['twitter'] ?>">
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="lh-1 mb-2">
                                                                            <span class="fw-medium">Linkedin :</span>
                                                                        </div>
                                                                        <input type="text" class="form-control" name="linkedin"
                                                                            placeholder="Linkedin"
                                                                            value="<?= $profile_view['linkedin'] ?>">
                                                                    </div>

                                                                </div>
                                                                <div class="row mt-4 justify-content-end">
                                                                    <ddiv class="col-md-4 text-end">
                                                                        <button type="submit" class="btn btn-primary font-16 "><i
                                                                                class="ri-save-3-line"></i> Save
                                                                            Change</button>
                                                                    </ddiv>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane" id="Change-tab-pane" role="tabpanel"
                                                aria-labelledby="Change-tab" tabindex="0">
                                                <div class=" p-3">
                                                    <ul class="nav nav-tabs mb-3 tab-style-8 scaleX" id="myTab4"
                                                        role="tablist">
                                                        <li class="nav-item" role="presentation">
                                                            <button class="nav-link gap-2 text-start active d-flex"
                                                                id="changeEmail" data-bs-toggle="tab"
                                                                data-bs-target="#changeEmail-pane" type="button"
                                                                role="tab" aria-controls="changeEmail-pane"
                                                                aria-selected="true"> <i
                                                                    class="ri-mail-line font-22"></i>
                                                                <div>
                                                                    <p class="mb-0 font-16 fw-semibold"> Change Email
                                                                    </p>
                                                                    <p class="mb-0 text-muted">Request for change email
                                                                    </p>
                                                                </div>
                                                            </button>
                                                        </li>
                                                        <li class="nav-item" role="presentation">
                                                            <button class="nav-link gap-2  text-start d-flex"
                                                                id="phoneInfo" data-bs-toggle="tab"
                                                                data-bs-target="#phoneInfo-pane" type="button"
                                                                role="tab" aria-controls="phoneInfo-pane"
                                                                aria-selected="false"><i
                                                                    class="ri-phone-line font-22"></i>
                                                                <div>
                                                                    <p class="mb-0 font-16 fw-semibold">Change Phone
                                                                    </p>
                                                                    <p class="mb-0 text-muted">Request for phone change
                                                                    </p>
                                                                </div>
                                                            </button>
                                                        </li>

                                                    </ul>
                                                    <div class="tab-content" id="myTabContent3">
                                                        <div class="tab-pane show active overflow-hidden"
                                                            id="changeEmail-pane" role="tabpanel"
                                                            aria-labelledby="changeEmail" tabindex="0">
                                                            <form action="">
                                                                <div class="row gy-3 align-items-center">
                                                                    <div class="col-md-6">
                                                                        <h5>Email Change </h5>
                                                                        <p>Email change request.</p>
                                                                        <p>We sending an otp mail for verify its you.
                                                                            You need to check OTP verification with this
                                                                            email.</p>
                                                                        <p>OTP Session should expire within 1 minutes.
                                                                            If OTP expired you need to resending the OTP
                                                                        </p>

                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="lh-1 mb-2">
                                                                            <span class="fw-medium">Email :</span>
                                                                        </div>
                                                                        <input type="email" class="form-control"
                                                                            placeholder="Placeholder"
                                                                            value="superadmin@gmail.com">
                                                                    </div>

                                                                </div>
                                                                <div class="row mt-4 justify-content-end">
                                                                    <div class="col-md-4 text-end">
                                                                        <button class="btn btn-primary font-16 "><i
                                                                                class="ri-save-3-line"></i> Send
                                                                            OTP</button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>

                                                        <div class="tab-pane overflow-hidden" id="phoneInfo-pane"
                                                            role="tabpanel" aria-labelledby="personalInfo" tabindex="0">
                                                            <form action="">
                                                                <div class="row gy-3 align-items-center">
                                                                    <div class="col-md-6">
                                                                        <h5>Phone Change</h5>
                                                                        <p>Phone change request.</p>
                                                                        <p>We sending an otp mail for verify its you.
                                                                            You need to check OTP verification with this
                                                                            email.</p>
                                                                        <p>OTP Session should expire within 1 minutes.
                                                                            If OTP expired you need to resending the OTP
                                                                        </p>

                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="lh-1 mb-2">
                                                                            <span class="fw-medium">Email :</span>
                                                                        </div>
                                                                        <input type="email" class="form-control"
                                                                            placeholder="Placeholder"
                                                                            value="superadmin@gmail.com">
                                                                    </div>

                                                                </div>
                                                                <div class="row mt-4 justify-content-end">
                                                                    <div class="col-md-4 text-end">
                                                                        <button class="btn btn-primary font-16 "><i
                                                                                class="ri-save-3-line"></i> Send
                                                                            OTP</button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <div class="tab-pane overflow-hidden" id="Address-pane"
                                                            role="tabpanel" aria-labelledby="Address" tabindex="0">
                                                            <form action="">
                                                                <div class="row gy-3 align-items-center">
                                                                    <div class="col-md-6">
                                                                        <div class="lh-1 mb-2">
                                                                            <span class="fw-medium">Country :</span>
                                                                        </div>
                                                                        <input type="text" class="form-control"
                                                                            placeholder="Placeholder" value="India">
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="lh-1 mb-2">
                                                                            <span class="fw-medium">State :</span>
                                                                        </div>
                                                                        <input type="text" class="form-control"
                                                                            placeholder="Placeholder" value="Delhi">
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="lh-1 mb-2">
                                                                            <span class="fw-medium">City :</span>
                                                                        </div>
                                                                        <input type="text" class="form-control"
                                                                            placeholder="Placeholder" value="Delhi">
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="lh-1 mb-2">
                                                                            <span class="fw-medium">Pin :</span>
                                                                        </div>
                                                                        <input type="text" class="form-control"
                                                                            placeholder="Placeholder" value="110056">
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="lh-1 mb-2">
                                                                            <span class="fw-medium">Address :</span>
                                                                        </div>
                                                                        <input type="text" class="form-control"
                                                                            placeholder="Placeholder"
                                                                            value="k-290 house">
                                                                    </div>
                                                                </div>
                                                                <div class="row mt-4 justify-content-end">
                                                                    <ddiv class="col-md-4 text-end">
                                                                        <button class="btn btn-primary font-16 "><i
                                                                                class="ri-save-3-line"></i> Save
                                                                            Change</button>
                                                                    </ddiv>
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <div class="tab-pane overflow-hidden" id="socialLinks-pane"
                                                            role="tabpanel" aria-labelledby="socialLinks" tabindex="0">
                                                            <form action="">
                                                                <div class="row gy-3 align-items-center">
                                                                    <div class="col-md-6">
                                                                        <div class="lh-1 mb-2">
                                                                            <span class="fw-medium">Facebook :</span>
                                                                        </div>
                                                                        <input type="text" class="form-control"
                                                                            placeholder="Placeholder" value="Facebook">
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="lh-1 mb-2">
                                                                            <span class="fw-medium">Instagram :</span>
                                                                        </div>
                                                                        <input type="text" class="form-control"
                                                                            placeholder="Placeholder" value="instagram">
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="lh-1 mb-2">
                                                                            <span class="fw-medium">Twitter :</span>
                                                                        </div>
                                                                        <input type="text" class="form-control"
                                                                            placeholder="Placeholder"
                                                                            value="twitter.com">
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="lh-1 mb-2">
                                                                            <span class="fw-medium">Linkedin :</span>
                                                                        </div>
                                                                        <input type="text" class="form-control"
                                                                            placeholder="Placeholder"
                                                                            value="linkedin.com">
                                                                    </div>

                                                                </div>
                                                                <div class="row mt-4 justify-content-end">
                                                                    <ddiv class="col-md-4 text-end">
                                                                        <button class="btn btn-primary font-16 "><i
                                                                                class="ri-save-3-line"></i> Save
                                                                            Change</button>
                                                                    </ddiv>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End:: row-1 -->


    </div>
</div>
<!-- End::app-content -->

<script>
    // Password show/hide
    document.addEventListener("DOMContentLoaded", function () {
        document.querySelectorAll(".toggle-password").forEach(function (toggle) {
            toggle.addEventListener("click", function () {
                let input = this.parentElement.querySelector("input");
                if (input.type === "password") {
                    input.type = "text";
                    this.className = "ri-eye-line"; // Set the class to "ri-eye-line"
                } else {
                    input.type = "password";
                    this.className = "ri-eye-off-line"; // Add another class for the "password hidden" state
                }
            });
        });
    });
</script>
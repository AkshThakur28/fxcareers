<main>
    <div class="it-signup-area pt-120 pb-120">
        <div class="container">
            <div class="it-signup-bg p-relative">
                <div class="row">
                    <div class="col-xl-6 col-lg-6">
                        <?php echo form_open(base_url('admin/auth/verify_otp_email')); ?>
                        <div class="it-signup-wrap">
                            <div class="it-category-title-box">
                                <span class="sub-head mb-3">Forgot Password</span>
                                <h4 class="it-section-title mb-4">Reset your password</h4>
                            </div>
                            <?php if ($this->session->flashdata('msg')): ?>
                                <div class="alert alert-info">
                                    <?= $this->session->flashdata('msg'); ?>
                                </div>
                                <?php $this->session->unset_userdata('msg'); ?>
                            <?php endif; ?>
                            <?php if (isset($msg)): ?>
                                <div class="alert alert-info" role="alert">
                                    <?= $msg; ?>
                                </div>
                            <?php endif; ?>
                            <div class="it-signup-input-wrap">
                                <div class="it-signup-input mb-20">
                                    <input type="number" name="otp" placeholder="Enter OTP" required>
                                </div>
                            </div>
                            <div class="it-signup-btn mb-40">
                                <input type="submit" name="submit" value="submit" class="it-btn large">
                            </div>
                        </div>
                        <?php echo form_close(); ?>
                    </div>
                    <div class="col-xl-6 col-lg-6  align-self-center">
                        <img src="<?= base_url() ?>public/web/assets/img/reset_password.png" alt="" class="w-75">
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
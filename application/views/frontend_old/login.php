<main>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

   <!-- breadcrumb-area-start -->
   <div class="it-breadcrumb-area it-breadcrumb-bg"
      data-background="<?= base_url() ?>public/web/assets/img/breadcrumb/breadcrumb.jpg">
      <div class="container">
         <div class="row ">
            <div class="col-md-12">
               <div class="it-breadcrumb-content z-index-3 text-center">
                  <div class="it-breadcrumb-title-box">
                     <h3 class="it-breadcrumb-title">Login</h3>
                  </div>
                  <div class="it-breadcrumb-list-wrap">
                     <div class="it-breadcrumb-list">
                        <span><a href="<?= base_url() ?>">home</a></span>
                        <span class="dvdr">//</span>
                        <span>Login</span>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- breadcrumb-area-end -->

   <!-- signup-area-start -->
   <div class="it-signup-area pt-120 pb-120">
      <div class="container">
         <div class="it-signup-bg p-relative">

            <div class="row">
               <div class="col-xl-6 col-lg-6">
                  <?php echo form_open(base_url('admin/auth/login')); ?>
                  <div class="it-signup-wrap">
                     <div class="it-category-title-box">
                        <span class="sub-head mb-3">Login</span>
                        <h4 class="it-section-title mb-4">Welcome Back
                        </h4>
                     </div>

                     <?php if ($this->session->flashdata('msg')): ?>
                        <div class="alert alert-danger" role="alert">
                           <?= $this->session->flashdata('msg'); ?>
                        </div>
                        <?php $this->session->unset_userdata('msg'); ?>
                     <?php endif; ?>
                     <?php if ($this->session->flashdata('msz')): ?>
                        <div class="alert alert-success" role="alert">
                           <?= $this->session->flashdata('msz'); ?>
                        </div>
                        <?php $this->session->unset_userdata('msz'); ?>
                     <?php endif; ?>
                     <?php if (validation_errors() !== ''): ?>
                        <div class="alert alert-danger" role="alert">
                           <?= validation_errors(); ?>
                        </div>
                     <?php endif; ?>

                     <div class="it-signup-input-wrap">
                        <div class="it-signup-input mb-20">
                           <input type="email" name="email" placeholder="Email *">
                        </div>
                        <div class="it-signup-input mb-20 position-relative">
                           <input type="password" name="password" id="password" placeholder="Password *"
                              class="form-control">
                           <button type="button" id="togglePassword" class="eye-icon"
                              style="background: none; border: none; position: absolute; right: 10px; top: 50%; transform: translateY(-50%);">
                              <i class="fas fa-eye" id="eyeIcon"></i>
                           </button>
                        </div>
                     </div>
                     <div class="it-signup-btn mb-40">
                        <input type="submit" name="submit" value="submit" class="it-btn large">
                     </div>
                     <div class="it-signup-text">
                        <span>Don't have an account? <a href="<?= base_url() ?>register">Register</a> OR <a
                              href="<?= base_url() ?>forgot_password">Reset Password</a></span>
                     </div>
                  </div>
                  <?php echo form_close(); ?>
               </div>
               <div class="col-xl-6 col-lg-6  align-self-center">
                  <img src="<?= base_url() ?>public/web/assets/img/login.png" alt="" class="w-75">
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- signup-area-end -->

</main>
<!-- Footer Include  -->

<script>
   document.getElementById('togglePassword').addEventListener('click', function () {
      const passwordInput = document.getElementById('password');
      const eyeIcon = document.getElementById('eyeIcon');

      if (passwordInput.type === 'password') {
         passwordInput.type = 'text';
         eyeIcon.classList.remove('fa-eye');
         eyeIcon.classList.add('fa-eye-slash');
      } else {
         passwordInput.type = 'password';
         eyeIcon.classList.remove('fa-eye-slash');
         eyeIcon.classList.add('fa-eye');
      }
   });
</script>
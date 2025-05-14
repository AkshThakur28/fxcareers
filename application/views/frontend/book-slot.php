<?php
$id = $this->uri->segment(3);

$onlineBasic = $this->detail_model->course_offlinedtl($id);
$user_name = $this->session->userdata('username');

$user_id=$this->session->userdata('admin_id');
foreach ($onlineBasic as $row) { ?>
<main>
   <!-- breadcrumb-area-start -->
   <div class="it-breadcrumb-area it-breadcrumb-bg" data-background="<?= base_url() ?>public/web/assets/img/breadcrumb/breadcrumb.jpg">
      <div class="container">
         <div class="row ">
            <div class="col-md-12">
               <div class="it-breadcrumb-content z-index-3 text-center">
                  <div class="it-breadcrumb-title-box">
                     <h3 class="it-breadcrumb-title">Book Your Slot Now</h3>
                  </div>
                  <div class="it-breadcrumb-list-wrap">
                     <div class="it-breadcrumb-list">
                        <span><a href="index.html">home</a></span>
                        <span class="dvdr">//</span>
                        <span>Book Slot</span>
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
                <form id="Form" action="" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>"
                value="<?php echo $this->security->get_csrf_hash(); ?>">
            <input type="hidden" name="course_id" id="course_id" value="<?= $row->id ?>">
            <input type="hidden" name="user_id" id="user_id" value="<?= $user_id ?>">
                     <div class="it-signup-wrap">
                        <div class="it-category-title-box">
                           <span class="sub-head  mb-3">Course</span>
                           <h4 class="it-section-title mb-4">Book Your Slot Now
                           </h4>
                        </div>
                        <div class="it-signup-input-wrap mb-4">
                           <div class="row">
                              <div class="col-lg-6">
                                 <div class="it-signup-input mb-20">
                                    <input type="text" name="course_name" value="<?= $row->course_name ?>" readonly>
                                 </div>
                              </div>
                              <div class="col-lg-6">
                                 <div class="it-signup-input mb-20">
                                    <input type="text" name="amount" value="<?= $row->price ?>" readonly>
                                 </div>
                              </div>
                              <div class="col-lg-6">
                                 <div class="it-signup-input mb-20">
                                    <input type="text" name="duration" value="<?= $row->duration ?>" readonly>
                                 </div>
                              </div>
                              <div class="col-lg-6">
                                  <div class="it-signup-input mb-20">
                                      <input type="text" name="username" value="<?= $user_name ?>" readonly>
                                  </div>
                              </div>
                              <div class="col-lg-6">
                                 <div class="it-signup-input mb-20">
                                    <input type="text" placeholder="Name">
                                 </div>
                              </div>
                              <div class="col-lg-6">
                                 <div class=" it-signup-input">
                                    <select class="form-select" aria-label="Default select example">
                                       <option selected>Select Country</option>
                                       <option value="1">One</option>
                                       <option value="2">Two</option>
                                       <option value="3">Three</option>
                                    </select>
                                 </div>
                              </div>
                              <div class="col-lg-6">
                                 <div class="it-signup-input">
                                 <select class="form-select" aria-label="Default select example">
                                       <option selected>Select</option>
                                       <option value="1">One</option>
                                       <option value="2">Two</option>
                                       <option value="3">Three</option>
                                    </select>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="it-signup-btn mb-4 ">
                           <button class="it-btn large">Book Slot</button>
                        </div>
                     </div>
                  </form>
               </div>
               <div class="col-xl-6 col-lg-6  align-self-center">
                  <img src="<?= base_url() ?>public/web/assets/img/bookslot.png" alt="" class="w-75">
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- signup-area-end -->
</main>
<?php }
?>
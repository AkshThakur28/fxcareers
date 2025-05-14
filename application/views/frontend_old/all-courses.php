<main>

   <!-- breadcrumb-area-start -->
   <div class="it-breadcrumb-area it-breadcrumb-bg" data-background="<?=base_url()?>public/web/assets/img/breadcrumb/breadcrumb.jpg">
      <div class="container">
         <div class="row ">
            <div class="col-md-12">
               <div class="it-breadcrumb-content z-index-3 text-center">
                  <div class="it-breadcrumb-title-box">
                     <h3 class="it-breadcrumb-title"> ALL COURSEs </h3>
                  </div>
                  <div class="it-breadcrumb-list-wrap">
                     <div class="it-breadcrumb-list">
                        <span><a href="<?=base_url()?>">home</a></span>
                        <span class="dvdr">//</span>
                        <span> All COURSES</span>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- breadcrumb-area-end -->

   <!-- course-area-start -->
   <div class="it-course-area p-relative grey-bg pt-120 pb-120">
      <div class="container">
         <div class="row justify-content-center ">
            <div class="col-lg-10 mbb-5 text-center ">
            <div class="it-blog-title-box">
                     <h4 class="it-section-title">Online 
                        <span class="p-relative z-index">Courses
                           <svg class="title-shape-2" width="168" height="65" viewBox="0 0 168 65" fill="none"
                              xmlns="http://www.w3.org/2000/svg">
                              <path
                                 d="M73.3761 8.49147C78.4841 6.01353 82.5722 4.25154 88.8933 3.3035C94.2064 2.50664 99.6305 2.0701 104.981 1.94026C120.426 1.56549 135.132 4.90121 146.506 9.70405C158.628 14.8228 166.725 22.5638 166.074 31.6501C165.291 42.5779 151.346 51.7039 133.508 56.8189C110.253 63.4874 81.7065 63.8025 58.5605 60.8285C37.5033 58.123 11.6304 51.7165 3.58132 40.0216C-3.43085 29.8337 12.0728 18.1578 27.544 11.645C40.3656 6.24763 55.7082 2.98328 70.8043 4.08403C81.9391 4.89596 93.2164 6.87822 102.462 9.99561C112.874 13.5066 120.141 18.5932 127.862 23.6332"
                                 stroke="var(--it-theme-1)" stroke-width="3" stroke-linecap="round" />
                           </svg>
                        </span>
                     </h4>
                  </div>
            </div>
         </div>
         <div class="row">
         <?php foreach($course_details_view as $row):?>
             <div class="col-xl-4 col-lg-4 col-md-6 mb-30">
                   <div class="it-course-item">
                      <div class="it-course-thumb mb-20 p-relative">
                         <a href="<?=base_url()?>online-detail/<?=str_replace(' ','-',strtolower($row->course_name));?>"><img src="<?=base_url('uploads/course/').$row->course_image;?>" alt="image"></a>
                         <div class="it-course-thumb-text">
                            <span><?=$row->mode?></span>
                         </div>
                      </div>
                      <div class="it-course-content">
    
                         <h4 class="it-course-title pb-5"><a href="<?=base_url()?>online-detail/<?=str_replace(' ','-',strtolower($row->course_name));?>"><?=$row->course_name?></a></h4>
                         <div class="it-course-info pb-15 mb-25 d-flex justify-content-between">
                            <span><i class="fa-light fa-file-invoice"></i><?=$row->lesson?> Lessons</span>
                            <span><i class="fa-sharp fa-regular fa-clock"></i><?=$row->duration?></span>
    
                         </div>
    
                         <div class="it-course-price-box d-flex justify-content-between">
                            <span><i><?=$row->price?> AED</i> </span>
                            <a href="<?=base_url()?>online-detail/<?=str_replace(' ','-',strtolower($row->course_name));?>"><i class="fa-light fa-cart-shopping"></i>Buy Course</a>
                         </div>
                      </div>
                   </div>
                </div>
                <?php endforeach; ?>
        </div>
        <div class="row justify-content-center ">
            <div class="col-lg-10 mbb-5 text-center ">
            <div class="it-blog-title-box">
          
                     <h4 class="it-section-title">Offline 
                        <span class="p-relative z-index">Courses
                           <svg class="title-shape-2" width="168" height="65" viewBox="0 0 168 65" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <path d="M73.3761 8.49147C78.4841 6.01353 82.5722 4.25154 88.8933 3.3035C94.2064 2.50664 99.6305 2.0701 104.981 1.94026C120.426 1.56549 135.132 4.90121 146.506 9.70405C158.628 14.8228 166.725 22.5638 166.074 31.6501C165.291 42.5779 151.346 51.7039 133.508 56.8189C110.253 63.4874 81.7065 63.8025 58.5605 60.8285C37.5033 58.123 11.6304 51.7165 3.58132 40.0216C-3.43085 29.8337 12.0728 18.1578 27.544 11.645C40.3656 6.24763 55.7082 2.98328 70.8043 4.08403C81.9391 4.89596 93.2164 6.87822 102.462 9.99561C112.874 13.5066 120.141 18.5932 127.862 23.6332" stroke="var(--it-theme-1)" stroke-width="3" stroke-linecap="round"></path>
                           </svg>
                        </span>
                     </h4>
                  </div>
            </div>
         </div>
         <div class="row">
         <?php foreach($classroom_detail_view as $row):?>
             <div class="col-xl-4 col-lg-4 col-md-6 mb-30">
                   <div class="it-course-item">
                      <div class="it-course-thumb mb-20 p-relative">
                         <a href="<?=base_url()?>classroom-detail/<?=str_replace(' ','-',strtolower($row->course_name));?>"><img src="<?=base_url('uploads/course/').$row->course_image;?>" alt="image"></a>
                         <div class="it-course-thumb-text">
                            <span><?=$row->mode?></span>
                         </div>
                      </div>
                      <div class="it-course-content">
    
                         <h4 class="it-course-title pb-5"><a href="<?=base_url()?>classroom-detail/<?=str_replace(' ','-',strtolower($row->course_name));?>"><?=$row->course_name?></a></h4>
                         <div class="it-course-info pb-15 mb-25 d-flex justify-content-between">
                            <span><i class="fa-light fa-file-invoice"></i><?=$row->lesson?> Lessons</span>
                            <span><i class="fa-sharp fa-regular fa-clock"></i><?=$row->duration?></span>
    
                         </div>
    
                         <div class="it-course-price-box d-flex justify-content-between">
                            <span><i><?=$row->price?> AED</i> </span>
                            <a href="<?=base_url()?>classroom-detail/<?=str_replace(' ','-',strtolower($row->course_name));?>"><i class="fa-light fa-cart-shopping"></i>Buy Course</a>
                         </div>
                      </div>
                   </div>
                </div>
                <?php endforeach; ?>
        </div>
      </div>
   </div>
   <!-- course-area-end -->

  
<!-- faq section -->
<?php include("include/faq.php") ?>

</main>

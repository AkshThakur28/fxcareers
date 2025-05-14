
   <main>

      <!-- breadcrumb-area-start -->
      <div class="it-breadcrumb-area it-breadcrumb-bg" data-background="<?=base_url()?>public/web/assets/img/breadcrumb/breadcrumb.jpg">
         <div class="container">
            <div class="row ">
               <div class="col-md-12">
                  <div class="it-breadcrumb-content z-index-3 text-center">
                     <div class="it-breadcrumb-title-box">
                        <h3 class="it-breadcrumb-title">MENTOR</h3>
                     </div>
                     <div class="it-breadcrumb-list-wrap">
                        <div class="it-breadcrumb-list">
                           <span><a href="<?=base_url()?>">home</a></span>
                           <span class="dvdr">//</span>
                           <span>MENTOR</span>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- breadcrumb-area-end -->

       <!-- team-area-start -->
       <div class="it-team-3-area it-team-3-style-2  it-team-3-style-3 pt-110 pb-90">
         <div class="container">
            <div class="row">
            <?php  foreach($teachers as $row):?>
               <div class="col-xl-3 col-lg-4 col-md-6 mb-30">
                  
                  <div class="it-team-3-item text-center">
                     <div class="it-team-3-thumb fix">
                        <img src="<?=base_url()?>uploads/teachers/<?=$row->teacher_image?>" alt="team image" class="team-thumb">

                     </div>
                     <div class="it-team-3-content">
                        <div class="it-team-3-author-box">
                           <h4 class="it-team-3-title"><a href="<?=base_url()?>mentor/<?=str_replace(' ','-',strtolower($row->teacher_name));?>"><?=$row->teacher_name?></a></h4>
                           <span><?=$row->designation?></span>
                        </div>
                     </div>
                  </div>
                  

               </div>
               <?php endforeach;?>

            </div>
         </div>
      </div>
      <!-- team-area-end -->
   </main>

  <!-- Footer Include  -->

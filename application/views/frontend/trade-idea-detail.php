<main>

<!-- breadcrumb-area-start -->
<div class="it-breadcrumb-area it-breadcrumb-bg" data-background="<?=base_url()?>public/web/assets/img/breadcrumb/breadcrumb.jpg">
   <div class="container">
      <div class="row ">
         <div class="col-md-12">
            <div class="it-breadcrumb-content z-index-3 text-center">
               <div class="it-breadcrumb-title-box">
                  <h3 class="it-breadcrumb-title">Research Report Detail</h3>
               </div>
               <div class="it-breadcrumb-list-wrap">
                  <div class="it-breadcrumb-list">
                     <span><a href="<?=base_url()?>">home</a></span>
                     <span class="dvdr">//</span>
                     <span>Research Report Detail</span>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- breadcrumb-area-end -->

<!-- postbox area start -->
<div class="postbox__area pt-120 pb-120">
   <div class="container">
      <div class="row">
         <div class="col-xxl-8 col-xl-8 col-lg-8">
          <?php foreach($trade_idea_detail as $row):?>
            <div class="postbox__details-wrapper">
               <article>
                  <div class="postbox__thumb mb-30 w-img">
                     <img src="<?=base_url('uploads/trade_idea/').$row->trade_image?>" alt="">
                  </div>
                  <div class="postbox__details-title-box pb-40">
                     <div class="postbox__meta">
                        <span><i class="fa-solid fa-calendar-days"></i><?= date('d-m-Y', strtotime($row->date))?></span>
                        <!-- <span><i class="fa-regular fa-comments"></i>Comment (06)</span> -->
                     </div>
                     <h4 class="postbox__title mb-20"><?= $row-> trade_name?></h4>
                     <p> <?=$row-> description?></p>
                     
                  </div>                    
               </article>
            </div>
            <?php endforeach ?>
         </div>
         <div class="col-xxl-4 col-xl-4 col-lg-4 ">
            <div class="it-sv-details-sidebar sticky-top z-1">              
              
               <div class="sidebar__widget mb-55">
                  <div class="sidebar__widge-title-box">
                     <h3 class="sidebar__widget-title pb-10">Recent Post</h3>
                  </div>
                  
                  <div class="sidebar__widget-content">
                     <div class="sidebar__post">
                     <?php foreach ($trade_ideas as $trade_idea): ?>
                        <div class="rc__post mb-30 d-flex align-items-start">
                           <div class="rc__post-thumb mr-20">
                              <a href="<?=base_url()?>research-report/<?=str_replace(' ','-',strtolower($row->trade_name));?>">
                                  <img src="<?=base_url('uploads/trade_idea/').$trade_idea->trade_image?>" alt="" style="height: 120px;"></a>
                           </div>
                           <div class="rc__post-content">
                              <div class="rc__meta">
                                 <span><i class="fa-solid fa-calendar-days"></i><?= date('d-m-Y', strtotime($row->date))?></span>
                              </div>
                              <h3 class="rc__post-title">
                                 <a href="<?=base_url()?>research-report/<?=str_replace(' ','-',strtolower($row->trade_name));?>"><?=$trade_idea->trade_name?></a>
                              </h3>
                           </div>
                        </div>
                        <?php endforeach?>
                        
                     </div>
                  </div>
                  
               </div>

            </div>
         </div>
      </div>
   </div>
</div>
<!-- postbox area end -->



</main>
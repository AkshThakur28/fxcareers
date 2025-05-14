
   <style>
     .cards {
       margin-top: 20px;
       background: white;
       border-radius: 8px;
       box-shadow: 0 0 8px rgba(0, 0, 0, 0.2);
       padding: 20px;
       text-align: center;
 
     }

     .radial-progress {
       margin: 25px;
       width: 120px;
       height: 120px;
       position: relative;
       background-color: #d7d7d7;
       border-radius: 50%;
     }

     @media (max-width: 480px) {
       .radial-progress {
         width: 85px;
         height: 85px;
       }
     }

     .radial-progress .circle .mask,
     .radial-progress .circle .fill,
     .radial-progress .circle .shadow {
       width: 120px;
       height: 120px;
       position: absolute;
       border-radius: 50%;
     }

     @media (max-width: 480px) {

       .radial-progress .circle .mask,
       .radial-progress .circle .fill,
       .radial-progress .circle .shadow {
         width: 85px;
         height: 85px;
       }
     }

     .radial-progress .circle .mask,
     .radial-progress .circle .fill {
       -webkit-backface-visibility: hidden;
       transition: -webkit-transform 1s;
       transition: -ms-transform 1s;
       transition: transform 1s;
     }

     .radial-progress .circle .mask.reanimate,
     .radial-progress .circle .fill.reanimate {
       transition: -webkit-transform 0s;
       transition: -ms-transform 0s;
       transition: transform 0s;
     }

     .radial-progress .circle .mask.reset,
     .radial-progress .circle .fill.reset {
       -webkit-transform: rotate(0deg) !important;
       -ms-transform: rotate(0deg) !important;
       transform: rotate(0deg) !important;
     }

     .radial-progress .circle .mask {
       clip: rect(0px, 120px, 120px, 60px);
     }

     @media (max-width: 480px) {
       .radial-progress .circle .mask {
         clip: rect(0px, 85px, 85px, 42.5px);
       }
     }

     .radial-progress .circle .mask .fill {
       clip: rect(0px, 60px, 120px, 0px);
       background-color: var(--it-theme-1);
     }

     @media (max-width: 480px) {
       .radial-progress .circle .mask .fill {
         clip: rect(0px, 42.5px, 85px, 0px);
       }
     }

     .radial-progress .inset {
       width: 100px !important;
       height: 100px !important;
       position: absolute;
       top: 50%;
       left: 50%;
       margin: -50px 0 0 -50px !important;
       background-color: #fbfbfb;
       border-radius: 50%;
       text-align: center;
       line-height: 100px;
     }

     @media (max-width: 480px) {
       .radial-progress .inset {
         width: 66px !important;
         height: 66px !important;
         margin: -33px 0 0 -33px !important;
         line-height: 90px;
       }
     }

     .radial-progress .little {
       font-size: 22px;
       color: #d7d7d7;
     }

     @media (max-width: 480px) {
       .radial-progress .little {
         font-size: 12px;
       }
     }

     .radial-progress .big {
       font-size: 37px;
     }

     @media (max-width: 480px) {
       .radial-progress .big {
         font-size: 27px;
       }
     }
     @media (max-width:767.98px){
      .result-breadcrumb{
        height: auto;
        padding: 150px 0 60px 0px;

      }
     }
   </style>
    <!-- <div class="it-breadcrumb-area result-breadcrumb it-breadcrumb-bg" data-background="<?= base_url() ?>public/web/assets/img/breadcrumb/breadcrumb.jpg">
   <div class="container">
     <div class="row justify-content-center">
       <div class="col-lg-8 ">
         <div class="it-breadcrumb-content z-index-3 text-center">
           <div class="it-breadcrumb-title-box">
             <h3 class="adderes-title mb-4"> 
             Office No. 3207, 32nd Floor, Latifa Towers, Sheikh Zayed Road, Opposite Future Museum, Dubai</h3>
             <a href="tel:971503056430" class="number-title d-inline-block"> <span><i class="fa-solid fa-phone"></i>+971 503056430</span></a>
           </div>
         </div>
       </div>
     </div>
   </div>
 </div> -->

<section class="py-5 result-section">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12">
      <div class="cards py-5">
        <h3 style="color: var(--it-theme-1);">Well Done! </h3>
        <h2>We appreciate your valuable efforts</h2>
        <img src="<?= base_url() ?>public/web/assets/img/welldone.png" alt="" class="welldone-img py-5">
     <div class="">
      <div>      
         <h3>Assessment Result</h3>
       <?php if ($db_score) : ?>
         <div class="radial-progress m-auto" data-score="<?php echo $db_score->score; ?>">
           <div class="circle">
             <div class="mask full">
               <div class="fill"></div>
             </div>
             <div class="mask half">
               <div class="fill"></div>
               <div class="fill fix"></div>
             </div>
           </div>
           <div class="inset">
             <span class='big'><?php echo $db_score->score; ?></span> <span class='little'>/ 5</span>
           </div>
         </div>
       <?php else : ?>
         <p>No score available.</p>
       <?php endif; ?>
       <p class="mt-4 mb-4">One of our counsellor will connect you soon!!</p>
       <a class="it-btn" href="<?= base_url() ?>counsellor">
                           <span>
                              Connect To counsellor
                              <svg width="17" height="14" viewBox="0 0 17 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                 <path d="M11 1.24023L16 7.24023L11 13.2402" stroke="currentcolor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                 <path d="M1 7.24023H16" stroke="currentcolor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                              </svg>
                           </span>
                        </a>
      </div>

     </div>
   </div>
      </div>
    </div>
  </div>
</section>
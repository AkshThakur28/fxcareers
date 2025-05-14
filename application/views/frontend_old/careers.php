<main>

	<!-- breadcrumb-area-start -->
	<div class="it-breadcrumb-area it-breadcrumb-bg" data-background="<?= base_url() ?>public/web/assets/img/breadcrumb/breadcrumb.jpg">
		<div class="container">
			<div class="row ">
				<div class="col-md-12">
					<div class="it-breadcrumb-content z-index-3 text-center">
						<div class="it-breadcrumb-title-box">
							<h3 class="it-breadcrumb-title">Careers </h3>
						</div>
						<div class="it-breadcrumb-list-wrap">
							<div class="it-breadcrumb-list">
								<span><a href="<?= base_url() ?>">home</a></span>
								<span class="dvdr">//</span>
								<span>Careers </span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- breadcrumb-area-end -->

	<section class="pt-80 pb-80 careers">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-10 text-center">
					<h2>Current career opportunities at Fxcareers</h2>
					<!-- <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nostrum magni fugiat quibusdam aut, molestias nihil sunt quae placeat sed provident a. Maiores itaque excepturi sequi, ut eligendi provident consequuntur ex.</p> -->
				</div>
			</div>
			<!-- <div class="row justify-content-center mtt-5">
				<div class="col-md-10 text-center">
					<h2>No Current Openings</h2>
				</div>
			</div> -->
			<div class="row pt-5">
            <div class="col-md-12">
                <div class="accordion accordion-flush career-accd" id="accordionCareer">
                <?php
                foreach ($career_details_view as $row) { ?>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button " type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                            <?=$row->job_title?> </button>
                        </h2>
                        <div id="flush-collapseOne" class="accordion-collapse collapse  show" data-bs-parent="#accordionCareer">
                            <div class="accordion-body">
                                <p><?=$row->description?></p>
                                <a href="<?=base_url()?>career-details/<?=$row->id?>" class="it-btn">Send Resume <i class="ri-arrow-right-line"></i></a>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>
</main>
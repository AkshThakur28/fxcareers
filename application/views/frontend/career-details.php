<main>

	<!-- breadcrumb-area-start -->
	<div class="it-breadcrumb-area it-breadcrumb-bg"
		data-background="<?= base_url() ?>public/web/assets/img/breadcrumb/breadcrumb.jpg">
		<div class="container">
			<div class="row ">
				<div class="col-md-12">
					<div class="it-breadcrumb-content z-index-3 text-center">
						<div class="it-breadcrumb-title-box">
							<h3 class="it-breadcrumb-title">Career Details</h3>
						</div>
						<div class="it-breadcrumb-list-wrap">
							<div class="it-breadcrumb-list">
								<span><a href="<?= base_url() ?>">home</a></span>
								<span class="dvdr">//</span>
								<span>Career Details</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- breadcrumb-area-end -->
	<section class="section-space">
		<div class="container">
			<div class="row">
				<form method="POST" id="uploadForm" action="<?= base_url('website/career_submit_data'); ?>"
					enctype="multipart/form-data">
					<div class="careerform p-5 rounded">
						<div class="row g-4">
							<div class="col-lg-6">
								<div class="formgroup">
									<label for="">Full Name *</label>
									<input type="text" class="form-control" name="name" id="name" required>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="formgroup">
									<label for="">Email</label>
									<input type="text" class="form-control" name="email" id="email" required>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="formgroup">
									<label for="">Mobile Number *</label>
									<input type="text" class="form-control" name="mobile" id="mobile" required>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="formgroup">
									<label for="">Job Title *</label>
									<select name="profile" id="profile" required class="form-control" required>
										<option value="0">Select Job Title</option>
										<?php $role_fetch_data = $this->Career_Detail_model->job_title_fetch();
										foreach ($role_fetch_data as $data) { ?>
											<option value="<?= $data->id ?>"><?= $data->job_title ?></option>
										<?php } ?>
									</select>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="formgroup">
									<label for="">Total Experience *</label>
									<input type="text" class="form-control" name="experience" id="experience" required>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="formgroup">
									<label for="">Current Salary * (ex: 4LPA)</label>
									<input type="text" class="form-control" name="current_salary" id="current_salary"
										required>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="formgroup">
									<label for="">Expected Salary * (ex: 4LPA)</label>
									<input type="text" class="form-control" name="expected_salary" id="expected_salary"
										required>
								</div>
							</div>
							<div class="col-md-6">
								<label for="">Upload CV * (only pdf will be uplaod)</label>
								<div class="input-group mb-3">
									<input type="file" class="form-control" id="upload" name="upload" required>
								</div>
							</div>
							<div class="col-lg-12">
								<div class="formgroup">
									<button class="it-btn" type="submit" id="submit" name="submit">Submit Resume<i
											class="ps-2 ri-arrow-right-line"></i></button>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
		</div>

	</section>
	<script>
		document.getElementById('uploadForm').addEventListener('submit', function (event) {
			var upload = document.getElementById('upload');
			var filePath = upload.value;
			var fileExtension = filePath.split('.').pop().toLowerCase();

			if (fileExtension !== 'pdf') {
				alert('Error: Only PDF files are allowed!');
				event.preventDefault(); // Prevent form submission
			}
		});
	</script>
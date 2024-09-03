<!DOCTYPE html>

<html lang="en">

<head>
	<!-- ** Basic Page Needs ** -->
	<meta charset="utf-8" />
	<title><?php echo $JobVacancy->Position; ?> at <?php echo $JobVacancy->CompanyName; ?></title>

	<!-- ** Mobile Specific Metas ** -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="description" content="Agency HTML Template" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0" />
	<meta name="author" content="Themefisher" />
	<link href="<?php echo base_url() ?>assets/template/css/style.css" rel="stylesheet">
	<link href="<?php echo base_url() ?>assets/template_home/theme/images/logoJNE.png" rel="shortcut icon" />

	<!--
  Essential stylesheets
  =====================================-->
	<link href="<?php echo base_url() ?>assets/template_home/theme/plugins/bootstrap/bootstrap.min.css" rel="stylesheet" />
	<link href="<?php echo base_url() ?>assets/template_home/theme/plugins/bootstrap/bootstrap-slider.css" rel="stylesheet" />
	<link href="<?php echo base_url() ?>assets/template_home/theme/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
	<link href="<?php echo base_url() ?>assets/template_home/theme/plugins/slick/slick.css" rel="stylesheet" />
	<link href="<?php echo base_url() ?>assets/template_home/theme/plugins/slick/slick-theme.css" rel="stylesheet" />
	<link href="<?php echo base_url() ?>assets/template_home/theme/plugins/jquery-nice-select/css/nice-select.css" rel="stylesheet" />

	<link href="<?php echo base_url() ?>assets/template_home/theme/css/style.css" rel="stylesheet" />
	<link href="<?php echo base_url() ?>assets/template_home/theme/css/custom.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/sweetalert2@9.17.2/dist/sweetalert2.min.css">
	<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body class="body-wrapper">
<header class="top-header">
		<nav class="navbar">
			<a class="log" href="<?= base_url(); ?>">
				<img src="<?php echo base_url() ?>assets/assets/images/logoJNE.png" alt="" style="width: 120px;" />
			</a>
			<ul class="nav-menu">
				<li><a href="<?= base_url(); ?>">Home</a></li>
				<li><a href="<?= base_url(); ?>job-board">Job Board</a></li>
				<li><a href="https://www.jne.co.id/id/perusahaan/profil-perusahaan/visi-dan-misi" target="_blank">Company Profile</a></li>
				<li><a href="<?= base_url(); ?>sign-up">Sign Up</a></li>
				<li><a href="<?= base_url(); ?>sign-in">Sign In</a></li>
			</ul>
		</nav>
	</header>
	<section class="popular-deals section bg-gray">
		<div class="card" style="max-width: 100%; margin-left:30px; margin-right:30px;">
			<img src="<?= base_url(); ?>assets/assets/images/banner-default.JPG" class="card-img-top" alt="...">
			<p style="padding-top: 20px; margin-left: 750px; margin-right: 30px; color:dimgrey; text-align: right;"><?php  ?>
				<?php 
					if($JobVacancy->PostedDesc != null){
						echo 'Lowongan dipasang ' . $JobVacancy->PostedDesc;
					}

					if($JobVacancy->ApplyBefore != null){
						echo ' dan ' . $JobVacancy->ApplyBefore;
					}
				?> 
			</p>
			<p style="margin-left: 900px; text-align: right; margin-right: 30px; color:dimgrey;"><?php echo $JobVacancy->RecruiterActive ?></p>
			<div class="card" style="width: 12rem; margin-top:-120px; margin-left:30px;">
				<img src="<?php echo base_url() ?>assets/assets/images/logoJNE.png" class="card-img-center" alt="..." style="padding: 20px; padding: 20px;">
			</div>

			<div class="card-body">
				<h2 class="card-title" style="font-size: 30px; font-weight: 900;"><strong><?php echo $JobVacancy->Position ?></strong>
				</h2>
				<p class="card-text"><a style="font-size: 14px; color: blue;" href="#"><?php echo $JobVacancy->CompanyName ?></a></p>
				<p style="font-size: 14px; color: black;" class="card-text">
					<?php
						if($JobVacancy->LocationDisplay != null){
							echo $JobVacancy->LocationDisplay;
						}

						if($JobVacancy->RangeStartSalary != null && $JobVacancy->RangeEndSalary == null){
							echo ' • Start From ' . $JobVacancy->RangeStartSalary . ' IDR / month';
						}else if($JobVacancy->RangeStartSalary != null && $JobVacancy->RangeEndSalary != null){
							echo ' • ' . $JobVacancy->RangeStartSalary . ' - ' . $JobVacancy->RangeEndSalary . ' IDR / month';
						} 

						if($JobVacancy->EmpTypeName != null){
							echo ' • ' . $JobVacancy->EmpTypeName;
						}
					?>
				</p>
			</div>
			<div class="row">
				<a style="margin-left: 40px;" href="javascript:void(0)" class="btn btn-danger" id="btn-apply-jobs" data-id="<?= $JobVacancy->JobVacancyId ?>">Apply</a>
				<a style="margin-left: 800px;" href="javascript:void(0)" class="btn btn-outline-danger" id="btn-save-jobs" data-id="<?= $JobVacancy->JobVacancyId ?>"><i class="fa fa-heart-o">
						Save</i></a>
				<a style="margin-left: 10px;" href="javascript:void(0)" class="btn btn-outline-danger" id="btn-share-jobs"><i class="fa fa-share-alt">
						Share</i></a>
			</div>
			<br>
			<ul class="list-group list-group-flush">
				<li class="list-group-item">
					<h2><strong>Job Description</strong></h2>
				</li>
				<li class="list-group-item">
					<h4><?php echo $JobVacancy->JobDescription ?></h4>
				</li>
				<li class="list-group-item">
					<h2><strong> Minimum Qualification </strong></h2>
				</li>
				<li class="list-group-item">
					<h4><?php echo $JobVacancy->Qualification ?></h4>
				</li>
				<li class="list-group-item">
					<h2><strong> Job Summary </strong></h2>
				</li>
				<li class="list-group-item">
					<ul>
						<li>
							<h6><strong>JOB LEVEL</strong></h6>
						</li>
						<h4><a href="#"><?php echo $JobVacancy->JobLevelName ?></a></h4>
					</ul>
				</li>
				<li class="list-group-item">
					<ul>
						<li>
							<h6><strong>JOB CATEGORY</strong></h6>
						</li>
						<h4><a href="#"><?php echo $JobVacancy->JobFunctionName ?></a></h4>
					</ul>
				</li>
				<li class="list-group-item">
					<ul>
						<li>
							<h6><strong>EDUCATION REQUIREMENT</strong></h6>
						</li>
						<h4><a href="#"><?php echo $JobVacancy->EducationLevelName ?></a></h4>
					</ul>
				</li>
				<li class="list-group-item">
					<ul>
						<li>
							<h6><strong>WEBSITE</strong></h6>
						</li>
						<h4><a href="#"><?php echo $JobVacancy->Website ?></a></h4>
					</ul>
				</li>
			</ul>
		</div>
	</section>

	<!-- Modal Save Job -->
	<footer class="footer section section-sm">
		<!-- Container Start -->
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-7 offset-md-1 offset-lg-0 mb-4 mb-lg-0">
					<!-- About -->
					<div class="block about">
						<!-- footer logo -->
						<img src="<?php echo base_url() ?>assets/assets/images/logoJNE.png" alt="logo" style="width: 120px;" />
						<!-- description -->
						<h4><strong>KANTOR PUSAT</strong></h4>
						<p class="alt-color">
							PT. Tiki Jalur Nugraha Ekakurir
							Jl. Tomang Raya No. 11
							Jakarta Barat 11440
							Indonesia
						</p>
						<p class="alt-color">
							Contact center. (62-21) 2927 8888
							Office. (62-21) 566 5262 <br>
							Fax. (62-21) 567 1413 <br>
							Email. customercare@jne.co.id
						</p>
					</div>
				</div>
				<!-- Link list -->
				<div class="col-lg-2 offset-lg-1 col-md-3 col-6 mb-4 mb-lg-0">
					<div class="block">
						<h4>Find Job</h4>
						<ul>
							<li><a href="#">Sign up</a></li>
							<li>
								<a href="#">Job Board</a>
							</li>
						</ul>
					</div>
				</div>
				<!-- Link list -->
				<div class="col-lg-2 col-md-3 offset-md-1 offset-lg-0 col-6 mb-4 mb-md-0">
					<div class="block">
						<h4>About</h4>
						<ul>
							<li><a href="#">Company Profile</a></li>
							<li><a href="#">Privacy and Policy</a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-2 col-md-3 offset-md-1 offset-lg-0 col-6 mb-4 mb-md-0">
					<div class="block">
						<h4>Contact Us</h4>
						<ul>
							<li><a href="#">Whatsapp</a></li>
							<li><a href="#">Email</a></li>
						</ul>
					</div>
				</div>
				<!-- Promotion -->
				<!-- <div class="col-lg-4 col-md-7">
					
					<div class="block-2 app-promotion">
						<div class="mobile d-flex align-items-center">
							<a href="#">
						
								<img src="<?php echo base_url() ?>assets/template_home/theme/images/footer/phone-icon.png" alt="mobile-icon" />
							</a>
							<p class="mb-0">Get the Dealsy Mobile App and Save more</p>
						</div>
						<div class="download-btn d-flex my-3">
							<a href="#"><img src="images/apps/google-play-store.png" class="img-fluid" alt="" /></a>
							<a href="#" class="ml-3"><img src="images/apps/apple-app-store.png" class="img-fluid" alt="" /></a>
						</div>
					</div>
				</div> -->
			</div>
		</div>
		<!-- Container End -->
	</footer>
	<!-- Modal -->
	<div class="modal fade" id="modal_save_job" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h6 class="modal-title" id="exampleModalLongTitle"><strong>Save this job with a E Recruitment JNE
							account

						</strong></h6>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<p>Save this job and other opportunities like this with a free account.</p>
					<a class="btn btn-danger btn-lg btn-block font-weight-bold mt-3" id="btn-save-sign-in" href="<?= base_url(); ?>sign-in">
						<h6><strong>Sign In</strong></h6>
					</a>
					<a class="btn btn-outline-danger btn-lg btn-block font-weight-bold mt-3" id="btn-save-sign-up" href="<?= base_url(); ?>sign-up">
						<h6><strong>Sign Up</strong></h6>
					</a>
				</div>
			</div>
		</div>
	</div>

	<div class="modal fade" id="modal_apply_job" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h6 class="modal-title" id="exampleModalLongTitle"><strong>Apply this job with a E Recruitment JNE
							account

						</strong></h6>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<a class="btn btn-danger btn-lg btn-block font-weight-bold mt-3" id="btn-apply-sign-in" href="<?= base_url(); ?>sign-in">
						<h6><strong>Sign In</strong></h6>
					</a>
					<a class="btn btn-outline-danger btn-lg btn-block font-weight-bold mt-3" id="btn-apply-sign-up" href="<?= base_url(); ?>sign-up">
						<h6><strong>Sign Up</strong></h6>
					</a>
				</div>
			</div>
		</div>
	</div>

	<div class="modal fade" id="modal_share" tabindex="-1" role="dialog" aria-labelledby="title-modal-share" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h6 class="modal-title" id="title-modal-share"><strong>Share</strong></h6>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="" method="post">
						<div class="form-row">
							<div class="form-group col-lg-9 col-md-7">
								<input type="text" class="form-control my-2 my-lg-1 w-100" id="shareInput" name="shareInput" placeholder="" readonly value="" style="height: 50px;"/>
							</div>
							<div class="form-group col-lg-3 col-md-6 align-self-center">
								<a type="button" class="btn btn-primary w-100 p-3" href="javascript:void(0)" id="copyButton" style="height: 50px; margin: 0;">COPY</a>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

	<!-- Footer Bottom -->
	<footer class="footer-bottom">
		<!-- Container Start -->
		<div class="container">
			<div class="row">
				<div class="col-lg-6 text-center text-lg-left mb-3 mb-lg-0">
					<!-- Copyright -->
					<div class="copyright" style="text-align: center;">
						<p>
							Copyright &copy;
							<script>
								var CurrentYear = new Date().getFullYear();
								document.write(CurrentYear);
							</script>
							<a class="text-white" href="#">HCIS TEAM</a>
						</p>
					</div>
				</div>
				<div class="col-lg-6">
					<!-- Social Icons -->
					<ul class="social-media-icons text-center text-lg-right">
						<li>
							<a class="fa fa-facebook" href="https://www.facebook.com/themefisher"></a>
						</li>
						<li>
							<a class="fa fa-twitter" href="https://www.twitter.com/themefisher"></a>
						</li>
						<li>
							<a class="fa fa-pinterest-p" href="https://www.pinterest.com/themefisher"></a>
						</li>
						<li>
							<a class="fa fa-github-alt" href="https://www.github.com/themefisher"></a>
						</li>
					</ul>
				</div>
			</div>
		</div>


		<!-- Container End -->
		<!-- To Top -->
		<div class="scroll-top-to">
			<i class="fa fa-angle-up"></i>
		</div>
	</footer>

	<script src="<?php echo base_url() ?>assets/template_home/theme/plugins/jquery/jquery.min.js"></script>
	<script src="<?php echo base_url() ?>assets/template_home/theme/plugins/bootstrap/popper.min.js"></script>
	<script src="<?php echo base_url() ?>assets/template_home/theme/plugins/bootstrap/bootstrap.min.js"></script>
	<script src="<?php echo base_url() ?>assets/template_home/theme/plugins/bootstrap/bootstrap-slider.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.17.2/dist/sweetalert2.min.js"></script>
	<script>
		$(document).ready(function () {
			$('#btn-save-jobs').on('click', function () {
				$('#modal_save_job').modal('show');
				$('#btn-save-sign-in').attr('href','<?= base_url() ?>sign-in?saveJobId=' + $(this).data('id'));
				$('#btn-save-sign-up').attr('href','<?= base_url() ?>sign-up?saveJobId=' + $(this).data('id'));
			});

			$('#btn-apply-jobs').on('click', function () {
				$('#modal_apply_job').modal('show');
				$('#btn-apply-sign-in').attr('href','<?= base_url() ?>sign-in?applyJobId=' + $(this).data('id'));
				$('#btn-apply-sign-up').attr('href','<?= base_url() ?>sign-up?applyJobId=' + $(this).data('id'));
			});

			$('#btn-share-jobs').on('click', function () {
				$('#modal_share').modal('show');
				$('#shareInput').val(window.location.href);
			});

			$("#copyButton").on('click', function () {
				$("#shareInput").select();
				document.execCommand("copy");
				$("#shareInput")[0].setSelectionRange(0, 0);

				Swal.fire({
					icon: 'success',
					title: 'Success',
					text: 'Text has been copied to the clipboard'
				});
			});
		});
	</script>
</body>
</html>





























































































































		</script>
		<script src="<?php echo base_url() ?>assets/template_home/theme/plugins/tether/js/tether.min.js"></script>
		<script src="<?php echo base_url() ?>assets/template_home/theme/plugins/raty/jquery.raty-fa.js"></script>

		<script src="<?php echo base_url() ?>assets/template_home/theme/plugins/slick/slick.min.js"></script>
		<script src="<?php echo base_url() ?>assets/template_home/theme/plugins/jquery-nice-select/js/jquery.nice-select.min.js">
		</script>
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcABaamniA6OL5YvYSpB3pFMNrXwXnLwU" defer>
		</script>
		<script src="<?php echo base_url() ?>assets/template_home/theme/plugins/google-map/map.js" defer></script>

		<script src="<?php echo base_url() ?>assets/template_home/theme/js/script.js"></script>
</body>

</html>
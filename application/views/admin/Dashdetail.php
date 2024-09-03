<!DOCTYPE html>

<html lang="en">

<head>
	<!-- ** Basic Page Needs ** -->
	<meta charset="utf-8" />
	<title>E-Recruitment JNE</title>

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
	<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body class="body-wrapper">
	<!-- <header>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <nav class="navbar navbar-expand-lg navbar-light navigation">
                        <a class="navbar-brand" href="#">
                            <img src="<?php echo base_url() ?>assets/template_home/theme/images/logoJNE.png" alt=""
                                style="width: 120px;" />
                        </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ml-auto mt-10">
                                <li class="nav-item">
                                    <a class="nav-link login-button" href="<?= base_url(); ?>SignUp/Signup_user">Sign
                                        Up</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-white add-button" href="<?= base_url(); ?>Login">Sign In</a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header> -->
	<?php foreach ($Listjob as $Job) : $Job->JobVacancyId ?>
		<section class="popular-deals section bg-gray">
			<div class="card" style="width: 90rem; margin-left:30px">
				<img src="<?php echo base_url() ?>assets/assets/images/baner.PNG" class="card-img-top" alt="Banner">
				<p style="margin-left: 1130px; color:dimgrey;"><?php echo $Job->PostedDesc ?> and
					<?php echo $Job->ApplyBefore ?> <?php echo $Job->RecruiterActive ?> </p>
				<p style="margin-left: 1140px;"></p>
				<div class="card" style="width: 12rem; margin-top:-120px; margin-left:30px;">
					<img src="" class="card-img-center" alt="Logo">
				</div>

				<div class="card-body">
					<h2 class="card-title"><strong><?php echo $Job->Position ?> || <?php echo $Job->EmpTypeName ?></strong>
					</h2>
					<p class="card-text"><a style="color: blue;" href="#"><?php echo $Job->CompanyName ?></a></p>
					<p style="color: black;" class="card-text"><?php echo $Job->LocationName ?> .
						<?php echo $Job->RangeStartSalary ?>-<?php echo $Job->RangeEndSalary ?> IDR / month .
						<?php echo $Job->EmpTypeName ?></p>
				</div>
				<div class="row">
					<a style="margin-left: 40px;" href="#" class="btn btn-danger" data-toggle="modal" data-target="#ModalApply">Apply</a>
					<a style="margin-left: 1050px;" href="#" class="btn btn-outline-danger" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-heart-o">
							Save</i></a>
					<a style="margin-left: 10px;" href="#" class="btn btn-outline-danger"><i class="fa fa-share-alt">
							Share</i></a>
				</div>
				<br>
				<ul class="list-group list-group-flush">
					<li class="list-group-item">
						<h2><strong> Job Description</strong></h2>
					</li>
					<li class="list-group-item">
						<h4><?php echo $Job->JobDescription ?></h4>
					</li>
					<li class="list-group-item">
						<h2><strong> Minimum Qualification </strong></h2>
					</li>
					<li class="list-group-item">
						<h4><?php echo $Job->Qualification ?></h4>
					</li>
					<li class="list-group-item">
						<h2><strong> Job Summary </strong></h2>
					</li>
					<li class="list-group-item">
						<ul>
							<li>
								<h6><strong>JOB LEVEL</strong></h6>
							</li>
							<h4><a href="#"><?php echo $Job->JobLevelName ?></a></h4>
						</ul>
					</li>
					<li class="list-group-item">
						<ul>
							<li>
								<h6><strong>JOB CATEGORY</strong></h6>
							</li>
							<h4><a href="#"><?php echo $Job->JobFunctionName ?></a></h4>
						</ul>
					</li>
					<li class="list-group-item">
						<ul>
							<li>
								<h6><strong>EDUCATION REQUIREMENT</strong></h6>
							</li>
							<h4><a href="#"><?php echo $Job->EducationLevelName ?></a></h4>
						</ul>
					</li>
					<li class="list-group-item">
						<ul>
							<li>
								<h6><strong>WEBSITE</strong></h6>
							</li>
							<h4><a href="#"><?php echo $Job->Website ?></a></h4>
						</ul>
					</li>
				</ul>
			</div>
		</section>
	<?php endforeach; ?>
	<!-- Modal Save Job -->
	<footer class="footer section section-sm">
		<!-- Container Start -->
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-7 offset-md-1 offset-lg-0 mb-4 mb-lg-0">
					<!-- About -->
					<div class="block about">
						<!-- footer logo -->
						<img src="<?php echo base_url() ?>assets/template_home/theme/images/logoJNE.png" alt="logo" style="width: 120px;" />
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
	<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
					<a class="btn btn-danger btn-lg btn-block font-weight-bold mt-3" href="Login">
						<h6><strong>Sign In</strong></h6>
					</a>
					<a class="btn btn-outline-danger btn-lg btn-block font-weight-bold mt-3" href="SignUp/Signup_user">
						<h6><strong>Sign Up</strong></h6>
					</a>
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade" id="ModalApply" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
					<a class="btn btn-danger btn-lg btn-block font-weight-bold mt-3" href="Login">
						<h6><strong>Sign In</strong></h6>
					</a>
					<a class="btn btn-outline-danger btn-lg btn-block font-weight-bold mt-3" href="SignUp/Signup_user">
						<h6><strong>Sign Up</strong></h6>
					</a>
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
	<script src="<?php echo base_url() ?>assets/template_home/theme/plugins/bootstrap/popper.min.js">
	</script>
	<script src="<?php echo base_url() ?>assets/template_home/theme/plugins/bootstrap/bootstrap.min.js">
	</script>
	<script src="<?php echo base_url() ?>assets/template_home/theme/plugins/bootstrap/bootstrap-slider.js">
	</script>
	<script src="<?php echo base_url() ?>assets/template_home/theme/plugins/tether/js/tether.min.js"></script>
	<script src="<?php echo base_url() ?>assets/template_home/theme/plugins/raty/jquery.raty-fa.js"></script>

	<sc ript src="<?php echo base_url() ?>assets/template_home/theme/plugins/slick/slick.min.js">







		</script>

		<script src="<?php echo base_url() ?>assets/template_home/theme/plugins/jquery-nice-select/js/jquery.nice-select.min.js">
		</script>
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcABaamniA6OL5YvYSpB3pFMNrXwXnLwU" defer>
		</script>
		<script src="<?php echo base_url() ?>assets/template_home/theme/plugins/google-map/map.js" defer></script>

		<script src="<?php echo base_url() ?>assets/template_home/theme/js/script.js"></script>
</body>

</html>
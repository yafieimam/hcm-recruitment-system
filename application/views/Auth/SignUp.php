<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>E-Recruitment JNE</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="Agency HTML Template">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
	<meta name="author" content="Themefisher">
	<meta name="generator" content="Themefisher Classified Marketplace Template v1.0">

	<!-- favicon -->
	<link href="<?php echo base_url() ?>assets/template_home/theme/images/logoJNE.png" rel="shortcut icon">

	<!-- Essential stylesheets-->
	<link href="<?php echo base_url() ?>assets/template_home/theme/plugins/bootstrap/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo base_url() ?>assets/template_home/theme/plugins/bootstrap/bootstrap-slider.css" rel="stylesheet">
	<link href="<?php echo base_url() ?>assets/template_home/theme/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
	<link href="<?php echo base_url() ?>assets/template_home/theme/plugins/slick/slick.css" rel="stylesheet">
	<link href="<?php echo base_url() ?>assets/template_home/theme/plugins/slick/slick-theme.css" rel="stylesheet">
	<link href="<?php echo base_url() ?>assets/template_home/theme/plugins/jquery-nice-select/css/nice-select.css" rel="stylesheet">

	<link href="<?php echo base_url() ?>assets/template_home/theme/css/style.css" rel="stylesheet">
	<link href="<?php echo base_url() ?>assets/template_home/theme/css/custom.css" rel="stylesheet" />

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
				<li><a href="<?= base_url(); ?>sign-up" class="active">Sign Up</a></li>
				<li><a href="<?= base_url(); ?>sign-in">Sign In</a></li>
			</ul>
		</nav>
	</header>

	<section class="daftar border-top-1 ">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-8 col-md-8 align-item-center">
					<div class="border border">
						<h3 class="bg-gray p-4" style="text-align: center;">Sign Up</h3>
						<?php echo $this->session->flashdata('message') ?>
						<form method="POST" action="<?= base_url(); ?>Auth/SignUp" class="register-form" id="register-form">
							<input type="hidden" class="form-control" name="CanRegisterId">
							<fieldset class="p-4">
								<input type="hidden" class="form-control mb-3" name="CanRegisterId">
								<input type="text" class="form-control mb-3" placeholder="Full name *" name="FirstName" value="<?php echo set_value('FirstName') ?>" required>
								<small class="text-danger"><?php echo form_error('FirstName') ?></small>
								<input class="form-control mb-3" type="email" placeholder="Email *" name="Email" value="<?php echo set_value('Email') ?>" required>
								<small class="text-danger"><?php echo form_error('Email') ?></small>
								<input class="form-control mb-3" type="password" placeholder="Password *" name="Password" required>
								<small class="text-danger"><?php echo form_error('Password') ?></small>
								<div class="loggedin-forgot d-inline-flex my-3">
									<input type="checkbox" id="registering" class="mt-1" required>
									<label for="registering" class="px-2">I have read and I agree with E-Recruitment JNE
										<a class="text-primary font-weight-bold" href="Term">Terms &
											Conditions,</a> <a class="text-primary font-weight-bold" href="Privacy">Privacy
											Policy, </a>and <a class="text-primary font-weight-bold" href="#">End User
											License Agreement.</a></label>
								</div>
								<button type="submit" class="btn btn-danger btn-lg btn-block font-weight-bold mt-3">Sign
									Up Now</button>
								<p class="mt-4" style="text-align: center;">Already have an account? <a class="text-primary font-weight-bold" href="<?= base_url(); ?>sign-in">Sign
									in</a></p>
							</fieldset>
							
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--============================
=            Footer            =
=============================-->

	<footer class="footer section section-sm">
		<!-- Container Start -->
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-7 offset-md-1 offset-lg-0 mb-4 mb-lg-0">
					<!-- About -->
					<div class="block about">
						<!-- footer logo -->
						<img src="images/logo-footer.png" alt="logo">
						<!-- description -->
						<p class="alt-color">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
							tempor
							incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
							exercitation ullamco
							laboris nisi ut aliquip ex ea commodo consequat.</p>
					</div>
				</div>
				<!-- Link list -->
				<div class="col-lg-2 offset-lg-1 col-md-3 col-6 mb-4 mb-lg-0">
					<div class="block">
						<h4>Site Pages</h4>
						<ul>
							<li><a href="dashboard-my-ads.html">My Ads</a></li>
							<li><a href="dashboard-favourite-ads.html">Favourite Ads</a></li>
							<li><a href="dashboard-archived-ads.html">Archived Ads</a></li>
							<li><a href="dashboard-pending-ads.html">Pending Ads</a></li>
							<li><a href="terms-condition.html">Terms & Conditions</a></li>
						</ul>
					</div>
				</div>
				<!-- Link list -->
				<div class="col-lg-2 col-md-3 offset-md-1 offset-lg-0 col-6 mb-4 mb-md-0">
					<div class="block">
						<h4>Admin Pages</h4>
						<ul>
							<li><a href="category.html">Category</a></li>
							<li><a href="single.html">Single Page</a></li>
							<li><a href="store.html">Store Single</a></li>
							<li><a href="single-blog.html">Single Post</a>
							</li>
							<li><a href="blog.html">Blog</a></li>



						</ul>
					</div>
				</div>
				<!-- Promotion -->
				<div class="col-lg-4 col-md-7">
					<!-- App promotion -->
					<div class="block-2 app-promotion">
						<div class="mobile d-flex  align-items-center">
							<a href="index.html">
								<!-- Icon -->
								<img src="<?php echo base_url() ?>assets/template_home/theme/images/footer/phone-icon.png" alt="mobile-icon" />
							</a>
							<p class="mb-0">Get the Dealsy Mobile App and Save more</p>
						</div>
						<div class="download-btn d-flex my-3">
							<a href="index.html"><img src="images/apps/google-play-store.png" class="img-fluid" alt=""></a>
							<a href="index.html" class=" ml-3"><img src="images/apps/apple-app-store.png" class="img-fluid" alt=""></a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Container End -->
	</footer>
	<!-- Footer Bottom -->
	<footer class="footer-bottom">
		<!-- Container Start -->
		<div class="container">
			<div class="row">
				<div class="col-lg-6 text-center text-lg-left mb-3 mb-lg-0">
					<!-- Copyright -->
					<div class="copyright">
						<p>Copyright &copy; <script>
								var CurrentYear = new Date().getFullYear()
								document.write(CurrentYear)
							</script><a class="text-white" href="#">HCIS TEAM</a>2023</p>
					</div>
				</div>
				<div class="col-lg-6">
					<!-- Social Icons -->
					<ul class="social-media-icons text-center text-lg-right">
						<li><a class="fa fa-facebook" href="https://www.facebook.com/themefisher"></a></li>
						<li><a class="fa fa-twitter" href="https://www.twitter.com/themefisher"></a></li>
						<li><a class="fa fa-pinterest-p" href="https://www.pinterest.com/themefisher"></a></li>

						<li><a class="fa fa-github-alt" href="https://www.github.com/themefisher"></a></li>
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

	<!-- 
Essential Scripts
=====================================-->
	<script src="plugins/jquery/jquery.min.js"></script>
	<script src="plugins/bootstrap/popper.min.js"></script>
	<script src="plugins/bootstrap/bootstrap.min.js"></script>
	<sc ript src="plugins/bootstrap/bootstrap-slider.js">


















		</script>

		<script src="plugins/tether/js/tether.min.js"></script>
		<script src="plugins/raty/jquery.raty-fa.js"></script>
		<script src="plugins/slick/slick.min.js"></script>
		<script src="plugins/jquery-nice-select/js/jquery.nice-select.min.js"></script>
		<!-- google map -->
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcABaamniA6OL5YvYSpB3pFMNrXwXnLwU" defer>
		</script>
		<script src="plugins/google-map/map.js" defer></script>

		<script src="js/script.js"></script>

</body>

</html>
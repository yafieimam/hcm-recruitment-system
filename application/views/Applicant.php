<!DOCTYPE html>

<!--
 // WEBSITE: https://themefisher.com
 // TWITTER: https://twitter.com/themefisher
 // FACEBOOK: https://www.facebook.com/themefisher
 // GITHUB: https://github.com/themefisher/
-->

<html lang="en">

<head>

	<!-- ** Basic Page Needs ** -->
	<meta charset="utf-8">
	<title>E-Recruitment JNE</title>

	<!-- ** Mobile Specific Metas ** -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="Agency HTML Template">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
	<meta name="author" content="Themefisher">
	<meta name="generator" content="Themefisher Classified Marketplace Template v1.0">

	<!-- favicon -->
	<link href="<?php echo base_url() ?>assets/template_home/theme/images/logoJNE.png" rel="shortcut icon">

	<!-- 
  Essential stylesheets
  =====================================-->
	<link href="<?php echo base_url() ?>assets/template_home/theme/plugins/bootstrap/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo base_url() ?>assets/template_home/theme/plugins/bootstrap/bootstrap-slider.css" rel="stylesheet">
	<link href="<?php echo base_url() ?>assets/template_home/theme/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
	<link href="<?php echo base_url() ?>assets/template_home/theme/plugins/slick/slick.css" rel="stylesheet">
	<link href="<?php echo base_url() ?>assets/template_home/theme/plugins/slick/slick-theme.css" rel="stylesheet">
	<link href="<?php echo base_url() ?>assets/template_home/theme/plugins/jquery-nice-select/css/nice-select.css" rel="stylesheet">

	<link href="<?php echo base_url() ?>assets/template_home/theme/css/style.css" rel="stylesheet">

</head>

<body class="body-wrapper">
	<header>
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<nav class="navbar navbar-expand-lg navbar-light navigation">
						<a class="navbar-brand" href="index.html">
							<img src="<?php echo base_url() ?>assets/template_home/theme/images/logoJNE.png" alt="" style="width: 120px;" />
						</a>
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
							<span class="navbar-toggler-icon"></span>
						</button>
						<div class="collapse navbar-collapse" id="navbarSupportedContent">
							<ul class="navbar-nav ml-auto mt-10">
								<li class="nav-item">
									<a class="nav-link login-button" href="<?= base_url(); ?>Auth/SignUp">Sign
										Up</a>
								</li>
								<li class="nav-item">
									<a class="nav-link text-white add-button" href="<?= base_url(); ?>Auth">Sign
										In</a>
								</li>
							</ul>
						</div>
					</nav>
				</div>
			</div>
		</div>
	</header>

	<section class="vh-100">
		<div class="container py-5 h-100">
			<div class="row d-flex justify-content-center align-items-center h-100">
				<div class="col-12 col-md-8 col-lg-6 col-xl-5">
					<div class="card shadow-2-strong" style="border-radius: 1rem;">
						<div class="card-body p-5 text-center">
							<h3 class="mb-5">Sign in</h3>
							<?php echo form_open('Login/login_proses', ''); ?>
							<div class="form-outline mb-4">
								<input type="email" id="typeEmailX-2" name="Email" class="form-control form-control-lg" placeholder="Email" required />
							</div>
							<div class="form-outline mb-4">
								<input type="password" id="typePasswordX-2" name="Password" class="form-control form-control-lg" placeholder="Password" required />
							</div>
							<!-- Checkbox -->
							<div class="form-check d-flex justify-content-start mb-4">
								<input class="form-check-input" type="checkbox" value="" id="form1Example3" />
								<label class="form-check-label" for="form1Example3"> Remember password </label>
								<a style="margin-left: 55px;" href="Forgot">Forgot password?</a>
							</div>
							<button class="btn btn-primary btn-lg btn-block" type="submit">Login</button>
							<hr class="my-4">
							<div class="panel panel-default">
								<?php
								if (!isset($login_button)) {

									$user_data = $this->session->userdata('user_data');
									// echo '<div class="panel-heading">Welcome User</div><div class="panel-body">';
									// echo '<img src="' . $user_data['profile_picture'] . '" class="img-responsive img-circle img-thumbnail" />';
									// echo '<h3><b>Name : </b>' . $user_data["first_name"] . ' ' . $user_data['last_name'] . '</h3>';
									// echo '<h3><b>Email :</b> ' . $user_data['email_address'] . '</h3>';
									// echo '<h3><a href="' . base_url() . 'google_login/logout">Logout</h3></div>';
								} else {
									echo '<div align="center">' . $login_button . '</div>';
								}
								?>
							</div>
							<!-- <button class="btn btn-lg btn-block btn-primary" style="background-color: #dd4b39;" type="submit"><i class="fa fa-google"></i> Sign in with google</button> -->
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--=============================     Footer      ==============================-->

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
						<p class="alt-color">
							Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
							eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut
							enim ad minim veniam, quis nostrud exercitation ullamco laboris
							nisi ut aliquip ex ea commodo consequat.
						</p>
					</div>
				</div>
				<!-- Link list -->
				<div class="col-lg-2 offset-lg-1 col-md-3 col-6 mb-4 mb-lg-0">
					<div class="block">
						<h4>Site Pages</h4>
						<ul>
							<li><a href="dashboard-my-ads.html">My Ads</a></li>
							<li>
								<a href="dashboard-favourite-ads.html">Favourite Ads</a>
							</li>
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
							<li><a href="single-blog.html">Single Post</a></li>
							<li><a href="blog.html">Blog</a></li>
						</ul>
					</div>
				</div>
				<!-- Promotion -->
				<div class="col-lg-4 col-md-7">
					<!-- App promotion -->
					<div class="block-2 app-promotion">
						<div class="mobile d-flex align-items-center">
							<a href="index.html">
								<!-- Icon -->
								<img src="<?php echo base_url() ?>assets/template_home/theme/images/footer/phone-icon.png" alt="mobile-icon" />
							</a>
							<p class="mb-0">Get the Dealsy Mobile App and Save more</p>
						</div>
						<div class="download-btn d-flex my-3">
							<a href="index.html"><img src="images/apps/google-play-store.png" class="img-fluid" alt="" /></a>
							<a href="index.html" class="ml-3"><img src="images/apps/apple-app-store.png" class="img-fluid" alt="" /></a>
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
							</script><a class="text-white" href="#">HCIS TEAM</a></p>
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
	<script src="plugins/bootstrap/bootstrap-slider.js">
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
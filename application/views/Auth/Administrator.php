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
	<meta charset="utf-8" />
	<title>Login Administrator</title>

	<!-- ** Mobile Specific Metas ** -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="description" content="Agency HTML Template" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0" />
	<meta name="author" content="Themefisher" />
	<meta name="generator" content="Themefisher Classified Marketplace Template v1.0" />

	<!-- favicon -->
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

	<link href="<?php echo base_url() ?>assets/template_home/theme/css/style.css" rel="stylesheet">
	<link href="<?php echo base_url() ?>assets/template_home/theme/css/custom.css" rel="stylesheet" />
	<style>
		.password-container {
			display: flex;
			align-items: center;
		}

		.input-container {
			position: relative;
			width: 100%;
		}

		#typePasswordX-2 {
			width: 100%;
			padding-right: 40px; /* Make space for the icon */
		}

		.toggle-password {
			position: absolute;
			right: 20px;
			top: 50%;
			transform: translateY(-50%);
			cursor: pointer;
		}

		#eye-icon {
			font-size: 15px;
		}

		/* Style the eye icon to change color when clicked */
		#eye-icon.active {
			color: blue; /* You can change the color to your preference */
		}
	</style>
</head>

<body class="body-wrapper">
	<section class="login border-top-1" style="margin-top: 0;">
		<div class="container py-5 h-100">
			<div class="row d-flex justify-content-center align-items-center h-100">
				<div class="col-12 col-md-8 col-lg-6 col-xl-5">
					<div class="card shadow-2-strong" style="border-radius: 1rem;">
						<div class="card-body p-5 text-center">
							<h3 class="mb-5">Login Administrator</h3>
							<?php echo $this->session->flashdata('message') ?>
							<form class="signin" method="post" action="<?php echo base_url('administrator'); ?>">
								<div class="form-outline mb-4">
									<input type="text" id="username" name="Username" class="form-control form-control-lg" placeholder="Username" value="<?php echo set_value('Username') ?>" />
									<small style="float: left;"><?php echo form_error('Username') ?></small>
								</div>
								<div class="form-outline mb-4">
									<div class="input-container">
										<input type="password" id="typePasswordX-2" name="Password" class="form-control form-control-lg" placeholder="Password" />
										<div class="toggle-password" id="showPassword">
											<i class="fa fa-eye" id="eye-icon"></i>
										</div>
									</div>
									<small style="float: left;"><?php echo form_error('Password') ?></small>
								</div>
								<br>
								<!-- Checkbox -->
								<div class="form-check d-flex justify-content-start mb-4">
									<input class="form-check-input" type="checkbox" value="" id="form1Example3" />
									<label class="form-check-label" for="form1Example3"> Remember password </label>
									<a style="font-size: 14px; margin-left: 130px;" href="<?= base_url(); ?>forgot-password-admin">Forgot password?</a>
								</div>
								<button class="btn btn-primary btn-lg btn-block" type="submit">Login</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!--============================
=            Footer            =
=============================-->
	<!-- Footer Bottom -->
	<footer class="footer-bottom">
		<!-- Container Start -->
		<div class="container">
			<div class="row">
				<div class="col-lg-12 text-center mb-3 mb-lg-0">
					<!-- Copyright -->
					<div class="copyright">
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
			</div>
		</div>
		<!-- Container End -->
		<!-- To Top -->
		<div class="scroll-top-to">
			<i class="fa fa-angle-up"></i>
		</div>
		</f ooter>

		<!--
Essential Scripts
=====================================-->
		<script src="plugins/jquery/jquery.min.js"></script>
		<script src="plugins/bootstrap/popper.min.js"></script>
		<script src="plugins/bootstrap/bootstrap.min.js"></script>
		<script src="plugins/bootstrap/bootstrap-slider.js"></script>
		<script src="plugins/tether/js/tether.min.js"></script>
		<script src="plugins/raty/jquery.raty-fa.js"></script>
		<script src="plugins/slick/slick.min.js"></script>
		<script src="plugins/jquery-nice-select/js/jquery.nice-select.min.js"></script>
		<!-- google map -->
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcABaamniA6OL5YvYSpB3pFMNrXwXnLwU" defer>
		</script>
		<script src="plugins/google-map/map.js" defer></script>

		<script src="js/script.js"></script>
		<script>
			const passwordInput = document.getElementById('typePasswordX-2');
			const eyeIcon = document.getElementById('eye-icon');

			eyeIcon.addEventListener('click', function () {
				if (passwordInput.type === 'password') {
					passwordInput.type = 'text';
					eyeIcon.classList.add('active');
				} else {
					passwordInput.type = 'password';
					eyeIcon.classList.remove('active');
				}
			});
		</script>
</body>

</html>
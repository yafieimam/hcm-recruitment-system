<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<title>E-Recruitment JNE</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="description" content="Agency HTML Template" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0" />
	<meta name="author" content="Recruitment JNE" />
	<meta name="generator" content="Recruitment JNE  v1.0" />
	<!-- favicon -->
	<link href="<?php echo base_url() ?>assets/template_home/theme/images/logoJNE.png" rel="shortcut icon" />
	<link href="<?php echo base_url() ?>assets/template_home/theme/plugins/bootstrap/bootstrap.min.css" rel="stylesheet" />
	<link href="<?php echo base_url() ?>assets/template_home/theme/plugins/bootstrap/bootstrap-slider.css" rel="stylesheet" />
	<link href="<?php echo base_url() ?>assets/template_home/theme/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
	<link href="<?php echo base_url() ?>assets/template_home/theme/plugins/slick/slick.css" rel="stylesheet" />
	<link href="<?php echo base_url() ?>assets/template_home/theme/plugins/slick/slick-theme.css" rel="stylesheet" />
	<link href="<?php echo base_url() ?>assets/template_home/theme/plugins/jquery-nice-select/css/nice-select.css" rel="stylesheet" />
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link href="<?php echo base_url() ?>assets/template_home/theme/css/style.css" rel="stylesheet" />
	<link href="<?php echo base_url() ?>assets/template_home/theme/css/custom.css" rel="stylesheet" />

</head>

<body class="body-wrapper">
	<header class="top-header">
		<nav class="navbar">
			<a class="log" href="<?= base_url(); ?>">
				<img src="<?php echo base_url() ?>assets/assets/images/logoJNE.png" alt="" style="width: 120px;" />
			</a>
			<ul class="nav-menu">
				<li><a href="<?= base_url(); ?>" class="active">Home</a></li>
				<li><a href="<?= base_url(); ?>job-board">Job Board</a></li>
				<li><a href="https://www.jne.co.id/id/perusahaan/profil-perusahaan/visi-dan-misi" target="_blank">Company Profile</a></li>
				<li><a href="<?= base_url(); ?>sign-up">Sign Up</a></li>
				<li><a href="<?= base_url(); ?>sign-in">Sign In</a></li>
			</ul>
		</nav>
	</header>
	<!--================================Hero Area=================================-->
	<section class="hero-area bg-1 text-center overly">
		<!-- Container Start -->
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<!-- Header Contetnt -->
					<div class="content-block">
						<div style="font-size: 35px; color:white; font:bold">
							<strong>Curious to make impact and connecting happiness for everyone ?</strong>
						</div>
						<h1 style="color: #fff;"><strong>Start your new journey here!</strong></h1>
					</div>
					<!-- Advance Search -->
					<div class="advance-search">
						<div class="container">
							<div class="row justify-content-center">
								<div class="col-lg-12 col-md-12 align-content-center">
									<form action="" method="post">
										<div class="form-row">
											<div class="form-group col-lg-10 col-md-7">
												<input type="text" class="form-control my-2 my-lg-1 w-100" id="searchInput" name="searchInput" placeholder="Search for a job title, location..." value="<?php echo set_value('keyword') ?>" style="height: 50px;"/>
											</div>
											<div class="form-group col-lg-2 col-md-6 align-self-center">
												<a type="submit" class="btn btn-danger w-100 p-3" href="javascript:void(0)" id="searchButton" style="height: 50px; margin: 0;">SEARCH</a>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Container End -->
	</section>

	<!--===========================================Popular deals section============================================-->
	<section class="popular-deals section bg-gray">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="section-title">
						<h2>Find a career that works for you</h2>
					</div>
				</div>
			</div>
			<div class="row">
				<!-- offer 01 -->
				<div class="col-lg-12">
					<div class="trending-ads-slide">
						<?php foreach ($JobVacancyLandingPage as $Joblanding) : ?>
							<div class="col-sm-12 col-lg-4">
								<!-- product card -->
								<div class="product-item bg-light">
									<div class="card">
										<div class="card-body">
											<h4 class="card-title">
												<a href="#"><a href="<?= base_url() ?>jobs?jobId=<?= $Joblanding->JobVacancyId ?>"><?php echo $Joblanding->Position ?></a></a>
											</h4>
											<ul class="list-inline product-meta">
												<!-- <li class="list-inline-item">
													<a href="#"><i class="fa fa-folder-open-o"></i>Opened</a>
												</li> -->
												<li class="list-inline-item">
													<a href="#"><i class="fa fa-calendar"></i><?php echo date('d F Y', strtotime($Joblanding->Dateline)) ?></a>
												</li>
												<p class="card-text" style="font-size: 14px;">
													</i><?php echo $Joblanding->LocationDisplay ?>
												</p>
											</ul>
											<div class="product-ratings">
												<ul class="list-inline">
													<li><a href="javascript:void(0)" class="btn btn-danger btn-sm btn-apply-jobs" data-id="<?= $Joblanding->JobVacancyId ?>">Apply
															Now</a>
													</li>
												</ul>
											</div>
											</a>
										</div>
									</div>
								</div>
							</div>
						<?php endforeach; ?>
					</div>
				</div>
			</div>
		</div>
	</section>

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
					<a class="btn btn-danger btn-lg btn-block font-weight-bold mt-3" href="Auth">
						<h6><strong>Sign In</strong></h6>
					</a>
					<a class="btn btn-outline-danger btn-lg btn-block font-weight-bold mt-3" href="Auth/SignUp">
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
	<!-- Modal End -->
	<!--===============================================================================-->
	<!-- <section class="call-to-action overly bg-3 section-sm">
        <div class="container">
            <div class="row justify-content-md-center text-center">
                <div class="col-md-8">
                    <div class="content-holder">
                        <h2>Start today to get more exposure and grow your business</h2>
                        <ul class="list-inline mt-30">
                            <li class="list-inline-item">
                                <a class="btn btn-main" href="ad-listing.html">Add Listing</a>
                            </li>
                            <li class="list-inline-item">
                                <a class="btn btn-secondary" href="category.html">Browser Listing</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section> -->

	<!--=============================Footer==============================-->

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
							<li><a href="whatsapp://send?text=Hello&phone=+6281574963717"><i class="fa fa-whatsapp fa-xs" aria-hidden="true"></i><strong>
										Whatsapp</strong></a></li>
							<li><a href="mailto:recruitment@jne.co.id"><i class="fa fa-envelope-o fa-lg" aria-hidden="true"></i><strong> Email</strong></a></li>
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
							<a class="fa fa-facebook" href="#"></a>
						</li>
						<li>
							<a class="fa fa-twitter" href="#"></a>
						</li>
						<li>
							<a class="fa fa-pinterest-p" href="#"></a>
						</li>
						<li>
							<a class="fa fa-github-alt" href="#"></a>
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
	<style>
		.select2-container .select2-selection--single {
			height: 50px !important;
		}

		.select2-container--default .select2-selection--single {

			border-radius: 0px !important;
		}

		.tab-content tabs {
			width: 100%;
		}

		a:hover,
		a:focus {
			outline: none;
			text-decoration: none;
		}

		.tab .nav-tabs {
			border-bottom: 2px solid #e8e8e8;
		}

		.tab .nav-tabs li a {
			display: block;
			padding: 10px 20px;
			margin: 0 5px 1px 0;
			background: #fff;
			font-size: 20px;
			font-weight: 700;
			color: #112529;
			text-align: center;
			border: none;
			border-radius: 0;
			z-index: 2;
			position: relative;
			transition: all 0.3s ease 0s;
		}

		.tab .nav-tabs li a:hover,
		.tab .nav-tabs li.active a {

			color: #b81800;
			border: none;
		}

		/* .tab .nav-tabs li.active a:before {
			font-family: "Font Awesome 5 Free";
			font-weight: 900;
			font-size: 25px;
			font-weight: 700;
			color: #198df8;
			margin: 0 auto;
			position: absolute;
			bottom: -30px;
			left: 0;
			right: 0;
		} */

		/* .tab .nav-tabs li.active a:after {
			content: "";
			width: 100%;
			height: 3px;
			background: #198df8;
			position: absolute;
			bottom: -1px;
			left: 0;
			z-index: -1;
			transition: all 0.3s ease 0s;
		} */

		.tab .tab-content {
			padding: 30px 20px 20px;
			width: 1150px;
			margin-top: 0;
			background: #fff;
			font-size: 15px;
			color: #7a9181;
			line-height: 30px;
			border-radius: 0 0 5px 5px;

		}

		.tab .tab-content h3 {
			font-size: 24px;
			margin-top: 0;
		}

		@media only screen and (max-width: 479px) {
			.tab .nav-tabs li {

				width: 100%;
				text-align: center;
			}

			.tab .nav-tabs li.active a:before {
				content: "\f105";
				bottom: 15%;
				left: 0;
				right: auto;

			}
		}

		.carousel {
			margin: 30px auto 60px;
			padding: 0 80px;
		}

		.carousel .carousel-item {
			text-align: center;
			overflow: hidden;
		}

		.carousel .carousel-item h4 {
			font-family: 'Varela Round', sans-serif;
		}

		.carousel .carousel-item img {
			max-width: 100%;
			display: inline-block;
		}

		.carousel .carousel-item .btn {
			border-radius: 0;
			font-size: 12px;
			text-transform: uppercase;
			font-weight: bold;
			border: none;
			background: #a177ff;
			padding: 6px 15px;
			margin-top: 5px;
		}

		.carousel .carousel-item .btn:hover {
			background: #8c5bff;
		}

		.carousel .carousel-item .btn i {
			font-size: 14px;
			font-weight: bold;
			margin-left: 5px;
		}

		.carousel .thumb-wrapper {
			margin: 5px;
			text-align: left;
			background: #fff;
			box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.1);
		}

		.carousel .thumb-content {
			padding: 15px;
			font-size: 13px;
		}

		.carousel-control-prev,
		.carousel-control-next {
			height: 44px;
			width: 44px;
			background: none;
			margin: auto 0;
			border-radius: 50%;
			border: 3px solid rgba(0, 0, 0, 0.8);
			margin-left: -20px;
			margin-right: -20px;
		}

		.carousel-control-prev i,
		.carousel-control-next i {
			font-size: 36px;
			position: absolute;
			top: 50%;
			display: inline-block;
			margin: -19px 0 0 0;
			z-index: 5;
			left: 0;
			right: 0;
			color: rgba(0, 0, 0, 0.8);
			text-shadow: none;
			font-weight: bold;

		}

		.carousel-control-prev i {
			margin-left: -3px;
		}

		.carousel-control-next i {
			margin-right: -3px;
		}

		.carousel-indicators {
			bottom: -50px;
		}

		.carousel-indicators li,
		.carousel-indicators li.active {
			width: 10px;
			height: 10px;
			border-radius: 50%;
			margin: 4px;
			border: none;
		}

		.carousel-indicators li {
			background: #ababab;
		}

		.carousel-indicators li.active {
			background: #555;
		}
	</style>
	<!--========================================Essential Scripts=====================================-->
	<script src="<?php echo base_url() ?>assets/template_home/theme/plugins/jquery/jquery.min.js"></script>
	<script src="<?php echo base_url() ?>assets/template_home/theme/plugins/bootstrap/popper.min.js"></script>
	<script src="<?php echo base_url() ?>assets/template_home/theme/plugins/bootstrap/bootstrap.min.js"></script>
	<script src="<?php echo base_url() ?>assets/template_home/theme/plugins/bootstrap/bootstrap-slider.js"></script>
	<script src="<?php echo base_url() ?>assets/template_home/theme/plugins/tether/js/tether.min.js"></script>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
	<script src="<?php echo base_url() ?>assets/template_home/theme/plugins/raty/jquery.raty-fa.js"></script>
	<script src="<?php echo base_url() ?>assets/template_home/theme/plugins/slick/slick.min.js"></script>
	<script src="<?php echo base_url() ?>assets/template_home/theme/plugins/jquery-nice-select/js/jquery.nice-select.min.js"></script>
	<!-- google map -->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcABaamniA6OL5YvYSpB3pFMNrXwXnLwU" defer></script>
	<script src="<?php echo base_url() ?>assets/template_home/theme/plugins/google-map/map.js" defer></script>
	<script src="<?php echo base_url() ?>assets/template_home/theme/js/script.js"></script>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<script>
		$(document).ready(function () {
			const searchInput = document.getElementById("searchInput");
			const searchButton = document.getElementById("searchButton");

			$('.btn-apply-jobs').on('click', function () {
				$('#modal_apply_job').modal('show');
				$('#btn-apply-sign-in').attr('href','<?= base_url() ?>sign-in?applyJobId=' + $(this).data('id'));
				$('#btn-apply-sign-up').attr('href','<?= base_url() ?>sign-up?applyJobId=' + $(this).data('id'));
			});

			searchButton.addEventListener("click", function () {
				performSearch();
			});

			// Tambahkan event listener untuk tombol "Enter" pada input search
			searchInput.addEventListener("keydown", function (event) {
				if (event.key === "Enter") {
					performSearch();
					event.preventDefault();
				}
			});

			function performSearch() {
				const searchValue = searchInput.value.trim();
				const url = new URL(window.location.origin + window.location.pathname + "job-board");
				if (searchValue !== "") {
					url.searchParams.set('text', searchValue);
					window.history.pushState({}, '', url.toString());

					// Jalankan URL yang telah diubah
					window.location.href = url.toString();
				}else{
					window.location.href = url;
				}
			}
		});
	</script>
</body>

</html>
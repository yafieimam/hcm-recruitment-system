<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>E-Recruitment JNE</title>
	<!-- Favicon icon -->
	<link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url() ?>assets/template/images/logo_jne.png">
	<!-- Pignose Calender -->
	<link href="<?php echo base_url() ?>assets/template/plugins/pg-calendar/css/pignose.calendar.min.css" rel="stylesheet">
	<!-- Chartist -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/template/plugins/chartist/css/chartist.min.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/template/plugins/chartist-plugin-tooltips/css/chartist-plugin-tooltip.css">
	<!-- Custom Stylesheet -->
	<link href="<?php echo base_url() ?>assets/template/css/style.css" rel="stylesheet">

</head>

<body>

	<!--*******************
        Preloader start
    ********************-->
	<div id="preloader">
		<div class="loader">
			<svg class="circular" viewBox="25 25 50 50">
				<circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
			</svg>
		</div>
	</div>
	<!--*******************
        Preloader end
    ********************-->


	<!--**********************************
        Main wrapper start
    ***********************************-->
	<div id="main-wrapper">

		<!--**********************************
            Nav header start
        ***********************************-->
		<div class="nav-header">
			<div class="brand-logo">
				<a href="index.html">
					<b class="logo-abbr"><img src="<?php echo base_url() ?>assets/template_home/images/logoJNE.PN" alt="">
					</b>
					<span class="logo-compact"><img src="<?php echo base_url() ?>assets/template_home/images/logoJNE.PNG" alt=""></span>
					<span class="brand-title">
						<img style="width: 140px; margin-left:20px" src="<?php echo base_url() ?>assets/template/images/logo-text.PNG" alt="">
					</span>
				</a>
				<div class="nav-control">
					<div class="hamburger">
						<span class="toggle-icon"><i class="icon-menu"></i></span>
					</div>
				</div>
			</div>
		</div>
		<!--**********************************
            Nav header end
        ***********************************-->

		<!--**********************************
            Header start
        ***********************************-->
		<div class="header">
			<div class="header-content clearfix">
				<div class="header-right">
					<ul class="clearfix">
						<li class="icons dropdown"><a href="javascript:void(0)" data-toggle="dropdown">
								<i class="mdi mdi-email-outline"></i>
								<span class="badge badge-pill gradient-1">3</span>
							</a>
							<div class="drop-down animated fadeIn dropdown-menu">
								<div class="dropdown-content-heading d-flex justify-content-between">
									<span class="">3 New Messages</span>
									<a href="javascript:void()" class="d-inline-block">
										<span class="badge badge-pill gradient-1">3</span>
									</a>
								</div>
								<div class="dropdown-content-body">
									<ul>
										<li class="notification-unread">
											<a href="javascript:void()">
												<img class="float-left mr-3 avatar-img" src="<?php echo base_url() ?>assets/template/images/avatar/1.JPG" alt="">
												<div class="notification-content">
													<div class="notification-heading">Doni</div>
													<div class="notification-timestamp">08 Hours ago</div>
													<div class="notification-text">Hi Doni, Just wanted to let you ...
													</div>
												</div>
											</a>
										</li>
										<li class="notification-unread">
											<a href="javascript:void()">
												<img class="float-left mr-3 avatar-img" src="images/avatar/2.jpg" alt="">
												<div class="notification-content">
													<div class="notification-heading">Adam Smith</div>
													<div class="notification-timestamp">08 Hours ago</div>
													<div class="notification-text">Can you do me a favour?</div>
												</div>
											</a>
										</li>
										<li>
											<a href="javascript:void()">
												<img class="float-left mr-3 avatar-img" src="images/avatar/3.jpg" alt="">
												<div class="notification-content">
													<div class="notification-heading">Barak Obama</div>
													<div class="notification-timestamp">08 Hours ago</div>
													<div class="notification-text">Hi Teddy, Just wanted to let you ...
													</div>
												</div>
											</a>
										</li>
										<li>
											<a href="javascript:void()">
												<img class="float-left mr-3 avatar-img" src="images/avatar/4.jpg" alt="">
												<div class="notification-content">
													<div class="notification-heading">Hilari Clinton</div>
													<div class="notification-timestamp">08 Hours ago</div>
													<div class="notification-text">Hello</div>
												</div>
											</a>
										</li>
									</ul>

								</div>
							</div>
						</li>
						<li class="icons dropdown"><a href="javascript:void(0)" data-toggle="dropdown">
								<i class="mdi mdi-bell-outline"></i>
								<span class="badge badge-pill gradient-2">3</span>
							</a>
							<div class="drop-down animated fadeIn dropdown-menu dropdown-notfication">
								<div class="dropdown-content-heading d-flex justify-content-between">
									<span class="">2 New Notifications</span>
									<a href="javascript:void()" class="d-inline-block">
										<span class="badge badge-pill gradient-2">5</span>
									</a>
								</div>
								<div class="dropdown-content-body">
									<ul>
										<li>
											<a href="javascript:void()">
												<span class="mr-3 avatar-icon bg-success-lighten-2"><i class="icon-present"></i></span>
												<div class="notification-content">
													<h6 class="notification-heading">Events near you</h6>
													<span class="notification-text">Within next 5 days</span>
												</div>
											</a>
										</li>
										<li>
											<a href="javascript:void()">
												<span class="mr-3 avatar-icon bg-danger-lighten-2"><i class="icon-present"></i></span>
												<div class="notification-content">
													<h6 class="notification-heading">Event Started</h6>
													<span class="notification-text">One hour ago</span>
												</div>
											</a>
										</li>
										<li>
											<a href="javascript:void()">
												<span class="mr-3 avatar-icon bg-success-lighten-2"><i class="icon-present"></i></span>
												<div class="notification-content">
													<h6 class="notification-heading">Event Ended Successfully</h6>
													<span class="notification-text">One hour ago</span>
												</div>
											</a>
										</li>
										<li>
											<a href="javascript:void()">
												<span class="mr-3 avatar-icon bg-danger-lighten-2"><i class="icon-present"></i></span>
												<div class="notification-content">
													<h6 class="notification-heading">Events to Join</h6>
													<span class="notification-text">After two days</span>
												</div>
											</a>
										</li>
									</ul>

								</div>
							</div>
						</li>
						<li class="icons dropdown d-none d-md-flex">
							<a href="javascript:void(0)" class="log-user" data-toggle="dropdown">
								<span>English</span> <i class="fa fa-angle-down f-s-14" aria-hidden="true"></i>
							</a>
							<div class="drop-down dropdown-language animated fadeIn  dropdown-menu">
								<div class="dropdown-content-body">
									<ul>
										<li><a href="javascript:void()">English</a></li>
										<li><a href="javascript:void()">Dutch</a></li>
									</ul>
								</div>
							</div>
						</li>
						<li class="icons dropdown">
							<div class="user-img c-pointer position-relative" data-toggle="dropdown">
								<span class="activity active"></span>
								<img src="<?php echo base_url() ?>assets/template/images/avatar/1.JPG" height="40" width="40" alt="">
							</div>
							<div class="drop-down dropdown-profile animated fadeIn dropdown-menu">
								<div class="dropdown-content-body">
									<ul>
										<li>
											<a href="Profile"><i class="icon-user"></i>
												<span>Profile</span></a>
										</li>
										<li>
											<a href="Setting"><i class="fa fa-cog"></i>
												<span>Account Setting</span></a>
										</li>
										<li>
											<a href="Message">
												<i class="icon-envelope-open"></i> <span>Inbox</span>
												<div class="badge gradient-3 badge-pill gradient-1">3</div>
											</a>
										</li>

										<hr class="my-2">
										<li>
											<a href="page-lock.html"><i class="icon-lock"></i> <span>Lock
													Screen</span></a>
										</li>
										<li><a href="<?= base_url(); ?>Login/Logout_user"><i class="icon-key"></i>
												<span>Sign Out</span></a>
										</li>
									</ul>
								</div>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<!--**********************************
            Header end ti-comment-alt
        ***********************************-->

		<!--**********************************
            Sidebar start
        ***********************************-->
		<div class="nk-sidebar">
			<div class="nk-nav-scroll">
				<ul class="metismenu" id="menu">
					<li class="mega-menu mega-menu-sm">
						<a class="Job_Board" href="Job_Board" aria-expanded="false">
							<i class="fa fa-search"></i><span class="nav-text">Job Board</span>
						</a>
					</li>
					<li>
						<a class="" href="Profile" aria-expanded="false">
							<i class="icon-user menu-icon"></i><span class="nav-text">Profile</span>
						</a>
					</li>
					<li>
						<a class="" href="Applications" aria-expanded="false">
							<i class="fa fa-folder"></i><span class="nav-text">Applications</span>
						</a>
					</li>
					<li>
						<a class="" href="Message" aria-expanded="false">
							<i class="fa fa-comments-o"></i> <span class="nav-text">Message</span>
						</a>
					</li>
					<li>
						<a class="" href="Saved_Job" aria-expanded="false">
							<i class="fa fa-heart"></i><span class="nav-text">Saved Jobs</span>
						</a>
					</li>
				</ul>
			</div>
		</div>
		<!--**********************************
            Sidebar end
        ***********************************-->

		<!--**********************************
            Content body start
        ***********************************-->
		<div class="content-body">

			<div class="container-fluid mt-3">
				<div class="row">
				</div>
				<div class="row">
					<div class="col-lg-12">
						<div class="row">
							<h3>Account Setting</h3>
							<div class="col-lg-8" style="float: center;">
								<div class="card border-primary">
									<div class="card-header" style="color:#a9a9a9;">
										<h4>Change Password</h4>
										<p>To change your password, please complete the following fields.</p>
									</div>
									<div class="card-body">
										<form>
											<div class="form-group row">
												<label for="inputPassword" class="col-sm-2 col-form-label">Current
													Password</label>
												<div class="col-sm-10">
													<input type="text" class="form-control" id="inputPassword" placeholder="Current Password">
												</div>
											</div>
											<div class="form-group row">
												<label for="inputPassword" class="col-sm-2 col-form-label">New
													Password</label>
												<div class="col-sm-10">
													<input type="text" class="form-control" id="inputPassword" placeholder="New Password">
												</div>
											</div>
										</form>
									</div>
									<div class="card-footer">
										<a style="float: right;" href="#" class="btn btn-primary">Save</a>
									</div>
								</div>
								<div class="card border-primary">
									<div class="card-header" style="color:#a9a9a9;">
										<h4>Change Profile Picture</h4>
									</div>
									<div class="card-body">
										<div class="card lg-4">
											<div class="card-body text-center">
												<!-- Profile picture image-->
												<img class="img-account-profile rounded-circle mb-2" src="http://bootdey.com/img/Content/avatar/avatar1.png" alt="">
												<!-- Profile picture help block-->
												<div class="small font-italic text-muted mb-4">JPG or PNG no larger than
													5 MB</div>
												<!-- Profile picture upload button-->

												<button class="btn btn-primary" type="file">Upload new image</button>
											</div>
										</div>
									</div>
									<div class="card-footer">
										<a style="float: right;" href="#" class="btn btn-primary">Save</a>
									</div>
								</div>
								<div class="card border-primary">
									<div class="card-header" style="color:#a9a9a9;">
										<h4>Change Password</h4>
									</div>
									<div class="card-body">
										<p>Account deactivation is permanent. You will lose your completed profile and
											all your skill test results.
										</p>
										<p>If you want to come back, you can still search through our job board and
											apply. However, you will have to create an entirely new account and fill in
											all your details once again.</p>
									</div>
									<div class="card-footer">
										<a style="float: right;" href="#" class="btn btn-primary">DEACTIVATED MY
											ACCOUNT</a>
									</div>
								</div>
							</div>

						</div>
					</div>
				</div>
			</div>
			<!-- #/ container -->
		</div>
		<div class="footer">
			<div class="copyright">
				<p>Copyright &copy;<a href="">HCIS TEAM</a>
					2023</p>
			</div>
		</div>
	</div>
	<script src="<?php echo base_url() ?>assets/template/plugins/common/common.min.js"></script>
	<script src="<?php echo base_url() ?>assets/template/js/custom.min.js">
	</script>
	<script src="<?php echo base_url() ?>assets/template/js/settings.js">
	</script>
	<script src="<?php echo base_url() ?>assets/template/js/gleek.js"></script>
	<script src="<?php echo base_url() ?>assets/template/js/styleSwitcher.js">
	</script>
	<sc ript src="<?php echo base_url() ?>assets/template/plugins/chart.js/Chart.bundle.min.js">
		</script>
		<script src="<?php echo base_url() ?>assets/template/plugins/circle-progress/circle-progress.min.js"></script>
		<script src="<?php echo base_url() ?>assets/template/plugins/d3v3/index.js"></script>
		<script src="<?php echo base_url() ?>assets/template/plugins/topojson/topojson.min.js"></script>
		<script src="<?php echo base_url() ?>assets/template/plugins/datamaps/datamaps.world.min.js"></script>
		<script src="<?php echo base_url() ?>assets/template/plugins/raphael/raphael.min.js"></script>
		<script src="<?php echo base_url() ?>assets/template/plugins/morris/morris.min.js"></script>
		<script src="<?php echo base_url() ?>assets/template/plugins/moment/moment.min.js"></script>
		<script src="<?php echo base_url() ?>assets/template/plugins/pg-calendar/js/pignose.calendar.min.js"></script>
		<script src="<?php echo base_url() ?>assets/template/plugins/chartist/js/chartist.min.js"></script>
		<script src="<?php echo base_url() ?>assets/template/plugins/chartist-plugin-tooltips/js/chartist-plugin-tooltip.min.js">
		</script>
		<script src="<?php echo base_url() ?>assets/template/js/dashboard/dashboard-1.js"></script>

</body>


</html>
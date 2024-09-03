<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>E-Recruitment</title>
	<!-- Favicon icon -->
	<link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url() ?>assets/template_home/theme/images/LogoRec.jpg">
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
					<b class="logo-abbr"><img src="<?php echo base_url() ?>" alt="">
					</b>
					<span class="logo-compact"><img src="<?php echo base_url() ?>assets/template_home/images/LogoRec.jpg" alt=""></span>
					<span class="brand-title">
						<img style="width: 60px; margin-left:30px; margin-top:-20px" src="<?php echo base_url() ?>assets/template_home/theme/images/LogoRec.jpg" alt="">
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
		<div class="header" style="position: fixed;">
			<div class="header-content clearfix">
				<div class="header-right">
					<ul class="clearfix">
						<li class="icons dropdown">
							<a href="javascript:void(0)">
								<i class="mdi mdi-email-outline"></i>
								<span class="badge gradient-1 badge-pill badge-primary">3</span>
							</a>
							<div class="drop-down animated fadeIn dropdown-menu">
								<div class="dropdown-content-heading d-flex justify-content-between">
									<span class="">3 New Messages</span>

								</div>
								<div class="dropdown-content-body">
									<ul>
										<li class="notification-unread">
											<a href="javascript:void()">
												<img class="float-left mr-3 avatar-img" src="images/avatar/1.jpg" alt="">
												<div class="notification-content">
													<div class="notification-heading">Saiful Islam</div>
													<div class="notification-timestamp">08 Hours ago</div>
													<div class="notification-text">Hi Teddy, Just wanted to let you ...
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
						<li class="icons dropdown">
							<a href="javascript:void(0)">
								<i class="mdi mdi-bell-outline"></i>
								<span class="badge badge-pill gradient-2 badge-primary">3</span>
							</a>
							<div class="drop-down animated fadeIn dropdown-menu dropdown-notfication">
								<div class="dropdown-content-heading d-flex justify-content-between">
									<span class="">2 New Notifications</span>

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
							<a href="javascript:void(0)" class="log-user">
								<span>Hello, <?php echo $CanRegister['FirstName'] ?>
									<?php echo $CanRegister['LastName'] ?></span>
							</a>
						</li>
						<li class="icons dropdown">
							<div class="user-img c-pointer position-relative" data-toggle="dropdown">
								<span class="activity active"></span>
								<img src="<?php echo base_url() ?>assets/template/images/avatar/no-photo.PNG" height="40" width="40" alt="">
							</div>
							<div class="drop-down dropdown-profile   dropdown-menu">
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
											<a href="Message"><i class="icon-envelope-open"></i>
												<span>Inbox</span>
												<div class="badge gradient-3 badge-pill badge-primary">3</div>
											</a>
										</li>

										<hr class="my-2">
										<li>
											<a href="#"><i class="icon-lock"></i> <span>Lock
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
		<div style="margin-top:100px;" class="content-body">
			<div class="container-fluid">
				<div class="row">
					<div class="col-12">
						<!-- Example single danger button -->
						<!-- <div style="float: right;" class="btn-group">
							<button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								Active
							</button>
							<div class="dropdown-menu">
								<a class="dropdown-item" href="#">Active</a>
								<a class="dropdown-item" href="#">Inactive</a>
							</div>
						</div> -->
						<h3 class="d-inline"><strong>Applications</strong></h3>
						<hr>
						<div class="container bcontent">
							<div class="card" style="width: 1200px; margin-left:-40px; margin-top:-5px">
								<div class="row no-gutters">
									<div class="col-sm-5">
										<img style="width: 120px; margin-top:40px; margin-left:15px" class="card-img" src="<?php echo base_url() ?>assets/template_home/theme/images/LogoRec.jpg">
									</div>
									<div class="col-sm-7">
										<div class="card-body">
											<h5 style="margin-left: -370px;" class="card-title">Web Developer</h5>
											<p style="margin-left: -370px;" class="card-text"><a href="#">Kantor</a></p>
											<p style="margin-left: -370px;" class="card-text">Application Sent</p>
											<a style="float: right; margin-top:-110px; margin-right:40px" href="Message" class="btn btn-outline-danger"><i class="fa fa-envelope-o">
													Message</i></a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- #/ container -->
		</div>
		<!--**********************************
            Content body end
        ***********************************-->


		<!--**********************************
            Footer start
        ***********************************-->
		<div class="footer">
			<div class="copyright">
				<p>Copyright &copy; <a href="#">HCIS TEAM</a> 2023</p>
			</div>



		</div>
		<!--**********************************
            Footer end
        ***********************************-->
	</div>
	<!- -********************************** Scripts ***********************************-->
		<script src="<?php echo base_url() ?>assets/template/plugins/common/common.min.js"></script>
		<script src="<?php echo base_url() ?>assets/template/js/custom.min.js"></script>
		<script src="<?php echo base_url() ?>assets/template/js/settings.js"></script>
		<script src="<?php echo base_url() ?>assets/template/js/gleek.js"></script>
		<script src="<?php echo base_url() ?>assets/template/js/styleSwitcher.js"></script>

</body>

</html>

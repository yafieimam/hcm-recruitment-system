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
				<a href="Home">
					<b class="logo-abbr"><img src="<?php echo base_url() ?>assets/template/images/logo.pn" alt=""> </b>
					<span class="logo-compact"><img src="<?php echo base_url() ?>assets/template/images/logo-compact.pn" alt=""></span>
					<span class="brand-title">
						<img src="<?php echo base_url() ?>assets/template/images/logo-text.pn" alt="">
					</span>
				</a>
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

				<div class="nav-control">
					<div class="hamburger">
						<span class="toggle-icon"><i class="icon-menu"></i></span>
					</div>
				</div>
				<div class="header-left">
					<div class="input-group icons">
						<div class="input-group-prepend">
							<span class="input-group-text bg-transparent border-0 pr-2 pr-sm-3" id="basic-addon1"><i class="mdi mdi-magnify"></i></span>
						</div>
						<input type="search" class="form-control" placeholder="Search......" aria-label="Search Dashboard">
						<div class="drop-down animated flipInX d-md-none">
							<form action="#">
								<input type="text" class="form-control" placeholder="Search">
							</form>
						</div>
					</div>
				</div>
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
					<!-- <li class="nav-label" href>Home</li> -->
					<li>
						<a class="#" href="Home" aria-expanded="false">
							<i class="icon-speedometer menu-icon"></i><span class="nav-text">Home</span>
						</a>

					</li>
					<li class="mega-menu mega-menu-sm">
						<a class="" href="Job_Board" aria-expanded="false">
							<i class="icon-globe-alt menu-icon"></i><span class="nav-text">Job Board</span>
						</a>
						<!-- <ul aria-expanded="false">
                            <li><a href="./layout-blank.html">Blank</a></li>
                            <li><a href="./layout-one-column.html">One Column</a></li>
                            <li><a href="./layout-two-column.html">Two column</a></li>
                            <li><a href="./layout-compact-nav.html">Compact Nav</a></li>
                            <li><a href="./layout-vertical.html">Vertical</a></li>
                            <li><a href="./layout-horizontal.html">Horizontal</a></li>
                            <li><a href="./layout-boxed.html">Boxed</a></li>
                            <li><a href="./layout-wide.html">Wide</a></li>


                            <li><a href="./layout-fixed-header.html">Fixed Header</a></li>
                            <li><a href="layout-fixed-sidebar.html">Fixed Sidebar</a></li>
                        </ul> -->
					</li>
					<li>
						<a class="" href="Profile" aria-expanded="false">
							<i class="icon-user menu-icon"></i><span class="nav-text">Profile</span>
						</a>
						<!-- <ul aria-expanded="false">
                            <li><a href="./app-profile.html">Profile</a></li>
                            <li><a href="./app-calender.html">Calender</a></li>
                        </ul> -->
					</li>
					<li>
						<a class="" href="Applications" aria-expanded="false">
							<i class="icon-screen-tablet menu-icon"></i><span class="nav-text">Applications</span>
						</a>
						<!-- <ul aria-expanded="false">
                            <li><a href="./app-profile.html">Profile</a></li>
                            <li><a href="./app-calender.html">Calender</a></li>
                        </ul> -->
					</li>
					<!-- <li class="nav-label">Apps</li> -->
					<li>
						<a class="" href="Message" aria-expanded="false">
							<i class="icon-envelope menu-icon"></i> <span class="nav-text">Message</span>
						</a>
						<!-- <ul aria-expanded="false">
                            <li><a href="./email-inbox.html">Inbox</a></li>
                            <li><a href="./email-read.html">Read</a></li>
                            <li><a href="./email-compose.html">Compose</a></li>
                        </ul> -->
					</li>
					<!-- <li class="nav-label">UI Components</li> -->
					<li>
						<a class="" href="Saved_Job" aria-expanded="false">
							<i class="icon-grid menu-icon"></i><span class="nav-text">Saved Jobs</span>
						</a>
						<!-- <ul aria-expanded="false">
                            <li><a href="./ui-accordion.html">Accordion</a></li>
                            <li><a href="./ui-alert.html">Alert</a></li>
                            <li><a href="./ui-badge.html">Badge</a></li>
                            <li><a href="./ui-button.html">Button</a></li>
                            <li><a href="./ui-button-group.html">Button Group</a></li>
                            <li><a href="./ui-cards.html">Cards</a></li>
                            <li><a href="./ui-carousel.html">Carousel</a></li>
                            <li><a href="./ui-dropdown.html">Dropdown</a></li>
                            <li><a href="./ui-list-group.html">List Group</a></li>
                            <li><a href="./ui-media-object.html">Media Object</a></li>
                            <li><a href="./ui-modal.html">Modal</a></li>
                            <li><a href="./ui-pagination.html">Pagination</a></li>
                            <li><a href="./ui-popover.html">Popover</a></li>
                            <li><a href="./ui-progressbar.html">Progressbar</a></li>
                            <li><a href="./ui-tab.html">Tab</a></li>
                            <li><a href="./ui-typography.html">Typography</a></li> -->
						<!-- </ul>
                    </li>
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-layers menu-icon"></i><span class="nav-text">Components</span>
                        </a>
                        <ul aria-expanded="false"> -->
						<!-- <li><a href="./uc-nestedable.html">Nestedable</a></li>
                            <li><a href="./uc-noui-slider.html">Noui Slider</a></li>
                            <li><a href="./uc-sweetalert.html">Sweet Alert</a></li>
                            <li><a href="./uc-toastr.html">Toastr</a></li>
                        </ul> -->
					</li>
					<!-- <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-graph menu-icon"></i> <span class="nav-text">Charts</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="./chart-flot.html">Flot</a></li>
                            <li><a href="./chart-morris.html">Morris</a></li>
                            <li><a href="./chart-chartjs.html">Chartjs</a></li>
                            <li><a href="./chart-chartist.html">Chartist</a></li>
                            <li><a href="./chart-sparkline.html">Sparkline</a></li>
                            <li><a href="./chart-peity.html">Peity</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="widgets.html" aria-expanded="false">
                            <i class="icon-badge menu-icon"></i><span class="nav-text">Widget</span>
                        </a>
                    </li>
                    <li class="nav-label">Forms</li>
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-note menu-icon"></i><span class="nav-text">Forms</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="./form-basic.html">Basic Form</a></li>
                            <li><a href="./form-validation.html">Form Validation</a></li>
                            <li><a href="./form-step.html">Step Form</a></li>
                            <li><a href="./form-editor.html">Editor</a></li>
                            <li><a href="./form-picker.html">Picker</a></li>
                        </ul>
                    </li>
                    <li class="nav-label">Table</li>
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-menu menu-icon"></i><span class="nav-text">Table</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="./table-basic.html" aria-expanded="false">Basic Table</a></li>
                            <li><a href="./table-datatable.html" aria-expanded="false">Data Table</a></li>
                        </ul>
                    </li>
                    <li class="nav-label">Pages</li>
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-notebook menu-icon"></i><span class="nav-text">Pages</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="./page-login.html">Login</a></li>
                            <li><a href="./page-register.html">Register</a></li>
                            <li><a href="./page-lock.html">Lock Screen</a></li>
                            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">Error</a>
                                <ul aria-expanded="false">
                                    <li><a href="./page-error-404.html">Error 404</a></li>
                                    <li><a href="./page-error-403.html">Error 403</a></li>
                                    <li><a href="./page-error-400.html">Error 400</a></li>
                                    <li><a href="./page-error-500.html">Error 500</a></li>
                                    <li><a href="./page-error-503.html">Error 503</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li> -->
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
							<div class="col-12">
								<div class="card">
									<div class="card-body pb-0 d-flex justify-content-between">
										<div>
											<h4 class="mb-1">Welcome Back</h4>
											<p></p>
											<h3 class="m-0"></h3>
										</div>
										<div>
											<ul>
												<li class="d-inline-block mr-3"><a class="text-dark" href="#"></a>
												</li>
												<li class="d-inline-block mr-3"><a class="text-dark" href="#"></a>
												</li>
												<li class="d-inline-block"><a class="text-dark" href="#"></a></li>
											</ul>
										</div>
									</div>
									<div class="chart-wrapper">
										<canvas id="chart_widget_2"></canvas>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>



				<div class="row">
					<!-- <div class="col-lg-6 col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Order Summary</h4>
                                <div id="morris-bar-chart"></div>
                            </div>
                        </div>
                    </div> -->
					<!-- <div class="col-lg-3 col-md-6">
                        <div class="card card-widget">
                            <div class="card-body">
                                <h5 class="text-muted">Order Overview </h5>
                                <h2 class="mt-4">5680</h2>
                                <span>Total Revenue</span>
                                <div class="mt-4">
                                    <h4>30</h4>
                                    <h6>Online Order <span class="pull-right">30%</span></h6>
                                    <div class="progress mb-3" style="height: 7px">
                                        <div class="progress-bar bg-primary" style="width: 30%;" role="progressbar">
                                            <span class="sr-only">30% Order</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-4">
                                    <h4>50</h4>
                                    <h6 class="m-t-10 text-muted">Offline Order <span class="pull-right">50%</span></h6>
                                    <div class="progress mb-3" style="height: 7px">
                                        <div class="progress-bar bg-success" style="width: 50%;" role="progressbar">
                                            <span class="sr-only">50% Order</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-4">
                                    <h4>20</h4>
                                    <h6 class="m-t-10 text-muted">Cash On Develery <span class="pull-right">20%</span>
                                    </h6>
                                    <div class="progress mb-3" style="height: 7px">
                                        <div class="progress-bar bg-warning" style="width: 20%;" role="progressbar">
                                            <span class="sr-only">20% Order</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div> -->
					<!-- <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body px-0">
                                <h4 class="card-title px-4 mb-3">Todo</h4>
                                <div class="todo-list">
                                    <div class="tdl-holder">
                                        <div class="tdl-content">
                                            <ul id="todo_list">
                                                <li><label><input type="checkbox"><i></i><span>Get up</span><a href='#'
                                                            class="ti-trash"></a></label></li>
                                                <li><label><input type="checkbox" checked><i></i><span>Stand up</span><a
                                                            href='#' class="ti-trash"></a></label></li>
                                                <li><label><input type="checkbox"><i></i><span>Don't give up the
                                                            fight.</span><a href='#' class="ti-trash"></a></label></li>
                                                <li><label><input type="checkbox" checked><i></i><span>Do something
                                                            else</span><a href='#' class="ti-trash"></a></label></li>
                                            </ul>
                                        </div>
                                        <div class="px-4">
                                            <input type="text" class="tdl-new form-control"
                                                placeholder="Write new item and hit 'Enter'...">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->
				</div>

				<div class="row">
					<div class="col-lg-3 col-sm-6">
						<div class="card">
							<div class="card-body">
								<div class="text-center">
									<img src="./images/users/5.jpg" class="rounded-circle" alt="">
									<h3 class="mt-3 mb-1">Frontend Developer</h3>
									<h5 class="mt-3 mb-1">Jakarta</h5>
									<!-- <h2 class="btn btn-primary">Apply</h2> -->
									<!-- <p class="m-0">Jakarta</p> -->
									<a href="javascript:void()" class="btn btn-outline-danger" style="text-align: center;">Apply</a>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-sm-6">
						<div class="card">
							<div class="card-body">
								<div class="text-center">
									<img src="./images/users/5.jpg" class="rounded-circle" alt="">
									<h3 class="mt-3 mb-1">HRIS Programmer</h3>
									<h5 class="mt-3 mb-1">Jakarta</h5>
									<!-- <h2 class="btn btn-primary">Apply</h2> -->
									<!-- <p class="m-0">Jakarta</p> -->
									<a href="javascript:void()" class="btn btn-outline-danger" style="text-align: center;">Apply</a>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-sm-6">
						<div class="card">
							<div class="card-body">
								<div class="text-center">
									<img src="./images/users/5.jpg" class="rounded-circle" alt="">
									<h3 class="mt-3 mb-1">Web Programmer</h3>
									<h5 class="mt-3 mb-1">Jakarta</h5>
									<!-- <h2 class="btn btn-primary">Apply</h2> -->
									<!-- <p class="m-0">Jakarta</p> -->
									<a href="javascript:void()" class="btn btn-outline-danger" style="text-align: center;">Apply</a>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-sm-6">
						<div class="card">
							<div class="card-body">
								<div class="text-center">
									<img src="./images/users/5.jpg" class="rounded-circle" alt="">
									<h3 class="mt-3 mb-1">Human Resource</h3>
									<h5 class="mt-3 mb-1">Jakarta</h5>
									<!-- <h2 class="btn btn-primary">Apply</h2> -->
									<!-- <p class="m-0">Jakarta</p> -->
									<a href="javascript:void()" class="btn btn-outline-danger" style="text-align: center;">Apply</a>
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
				<p>Copyright &copy;<a href="">HCIS TEAM</a>
					2023</p>
			</div>
		</div>
		<!--**********************************
            Footer end
       
 ***********************************-->
	</div>
	<!--**********************************
        Main wrapper end
    ***********************************-->

	<!--**********************************
        Scripts
    ***********************************-->
	<script src="<?php echo base_url() ?>assets/template/plugins/common/common.min.js"></script>
	<script src="<?php echo base_url() ?>assets/template/js/custom.min.js"></script>
	<script src="<?php echo base_url() ?>assets/template/js/settings.js"></script>
	<script src="<?php echo base_url() ?>assets/template/js/gleek.js"></script>
	<script src="<?php echo base_url() ?>assets/template/js/styleSwitcher.js"></script>

	<!-- Chartjs -->
	<script src="<?php echo base_url() ?>assets/template/plugins/chart.js/Chart.bundle.min.js"></script>
	<!-- Circle progress -->
	<script src="<?php echo base_url() ?>assets/template/plugins/circle-progress/circle-progress.min.js"></script>
	<!- - Datamap -->




































		<sc ript src="<?php echo base_url() ?>assets/template/plugins/d3v3/index.js">
			</script>
			<script src="<?php echo base_url() ?>assets/template/plugins/topojson/topojson.min.js"></script>


			<script src="<?php echo base_url() ?>assets/template/plugins/datamaps/datamaps.world.min.js"></script>
			<!-- Morrisjs -->
			<script src="<?php echo base_url() ?>assets/template/plugins/raphael/raphael.min.js"></script>
			<script src="<?php echo base_url() ?>assets/template/plugins/morris/morris.min.js"></script>
			<!-- Pignose Calender -->
			<script src="<?php echo base_url() ?>assets/template/plugins/moment/moment.min.js"></script>






			<script src="<?php echo base_url() ?>assets/template/plugins/pg-calendar/js/pignose.calendar.min.js">

























































			</script>
			<!-- ChartistJS -->
			<script src="<?php echo base_url() ?>assets/template/plugins/chartist/js/chartist.min.js"></script>
			<script src="<?php echo base_url() ?>assets/template/plugins/chartist-plugin-tooltips/js/chartist-plugin-tooltip.min.js">
			</script>



			<script src="./js/dashboard/dashboard-1.js"></script>

</body>

</html>
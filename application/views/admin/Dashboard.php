<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>E-Recruitment JNE</title>
	<!-- Favicon icon -->
	<link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url() ?>assets/template/images/logo_jne.png">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/template/plugins/chartist/css/chartist.min.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/template/plugins/chartist-plugin-tooltips/css/chartist-plugin-tooltip.css">
	<!-- Custom Stylesheet -->
	<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
	<link href="<?php echo base_url() ?>assets/template/css/style.css" rel="stylesheet">
</head>

<body>

	<!--*******************Preloader star********************-->
	<div id="preloader">
		<div class="loader">
			<svg class="circular" viewBox="25 25 50 50">
				<circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
			</svg>
		</div>
	</div>
	<!--*******************Preloader end********************-->
	<!--**********************************Main wrapper start***********************************-->
	<div id="main-wrapper">
		<!--**********************************Nav header start***********************************-->
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
		<!--**********************************Nav header end***********************************-->

		<!--**********************************Header start***********************************-->
		<div class="header">
			<div class="header-content clearfix">

				<!-- <div class="nav-control">
					<div class="hamburger">
						<span class="toggle-icon"><i class="icon-menu"></i></span>
					</div>
				</div> -->
				<!-- <div class="header-left">
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
				</div> -->
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
										<li><a href="javascript:void()">Indonesia</a></li>
									</ul>
								</div>
							</div>
						</li>
						<li class="icons dropdown">
							<div class="user-img c-pointer position-relative" data-toggle="dropdown">
								<span class="activity active"></span>
								<img src="<?php echo base_url() ?>assets/template/images/avatar/no-photo.PNG" height="40" width="40" alt="">
							</div>
							<div class="drop-down dropdown-profile animated fadeIn dropdown-menu">
								<div class="dropdown-content-body">
									<ul>
										<li>
											<a href="app-profile.html"><i class="icon-user"></i>
												<span>Profile</span></a>
										</li>
										<li>
											<a href="javascript:void()">
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
		<!--**********************************Header end ti-comment-alt***********************************-->

		<!--Sidebar start-->
		<div class="nk-sidebar">
			<div class="nk-nav-scroll">
				<ul class="metismenu" id="menu">
					<!-- MENU DINAMIS -->
					<div>
						<ul class="menu"></ul>
					</div>

					<!-- END MENU DINAMIS -->
					<!-- <li class="nav-label" href>Home</li> -->
					<li>
						<a class="#" href="Dashboard" aria-expanded="false">
							<i class="fa fa-desktop"></i><span class="nav-text">Dashboard</span>
						</a>
					</li>
					<li>
						<a class="has-arrow " href="#" aria-expanded="false">
							<i class="fa fa-cogs"></i> <span class="nav-text">System Manager</span>
						</a>
						<ul aria-expanded="false">
							<li><a href="#">User Group</a></li>
							<li><a href="#">User</a></li>
							<li><a href="#">Master Data</a></li>
						</ul>
					</li>
					<li>
						<a class="has-arrow" href="#" aria-expanded="false">
							<i class="fa fa-users"></i> <span class="nav-text">Recruitment Setting</span>
						</a>
						<ul aria-expanded="false">
							<li><a href="company_setting">Company Setting</a></li>
							<li><a href="Message_template">Message Template</a></li>
							<li><a href="Contact_us">Contact Us</a></li>
							<li><a href="Help">Help</a></li>
						</ul>
					</li>
					<!-- <li>
						<a class="has-arrow" href="#" aria-expanded="false">
							<i class="fa fa-user-plus"></i> <span class="nav-text">Candidate</span>
						</a>
						<ul aria-expanded="false">
							<li><a href="#">Add Candidate</a></li>
						</ul>
					</li> -->
					<li>
						<a class="has-arrow" href="#" aria-expanded="false">
							<i class="fa fa-server"></i> <span class="nav-text">Reports</span>
						</a>
						<ul aria-expanded="false">
							<li><a href="Recruitment_overview">Recruitment Overview</a></li>
							<li><a href="#">Target Summary</a></li>
							<li><a href="#">Job Post Performance</a></li>
							<li><a href="#">Hiring Speed</a></li>
							<li><a href="#">Origin</a></li>
							<li><a href="#">Team Productivity</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
		<!--**********************************Sidebar end***********************************-->

		<!--**********************************Content body start***********************************-->
		<div class="content-body">

			<div class="container-fluid mt-2">
				<div class="row">
				</div>
				<div class="row">
					<div class="col-11 m-b-30" style="margin-left: 30px;">
						<div class="row">
							<div class="col-lg-12">
								<div class="card text-center">
									<div class="card-header">
										<ul class="nav nav-tabs card-header-tabs">
											<li class="nav-item">
												<a class="nav-link" href="Dashboard"><i class="fa fa-window-maximize"></i>
													Public</a>
											</li>
											<!-- <li class="nav-item">
												<a class="nav-link" href="Dashboard"><i class="fa fa-lock"></i>
													Private</a>
											</li> -->
											<li class="nav-item">
												<a class="nav-link" href="Dashboard"><i class="fa fa-pencil"></i>
													Draft</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" href="Dashboard"><i class="fa fa-times"></i>
													Deactived</a>
											</li>
											<li style="margin-left: 600px;" class="nav-item">
												<a class="btn btn-danger" data-toggle="modal" data-target=".modalBesar" href="#"><i class="fa fa-bars"></i>
													POST A PUBLIC JOB</a>
											</li>
											<!-- <li style="margin-right:-100px" class="d-inline-block mr-3"><a class="btn btn-danger" href="#" data-toggle="modal" data-target=".modalBesar">POST A
													PUBLIC JOB</a></li> -->
											<!-- <li style="margin-left: 230px;" class="d-inline-block mr-3"><a class="btn btn-outline-danger" href="#" data-toggle="modal" data-target="#expiredjob">MASS
													ACTION EXPIRED JOB</a>
											</li> -->
											<!-- <li class="d-inline-block mr-3"><a class="btn btn-outline-danger" href="#" data-toggle="modal" data-target="#candidate">ADD
													CANDIDATE</a>
											</li> -->

										</ul>
									</div>
								</div>
							</div>
						</div>
						<!-- End Col -->
					</div>
				</div>
				<?php foreach ($job_dash as $dash) : ?>
					<div class="row">
						<div class="col-lg-11" style="margin-left: 30px;">
							<div class="card border-primary" style="height: 310px;">
								<div class="card-header">
									<h4><a href="Dashboard/Dashdetail"><?php echo $dash->Position ?></a>,
										<?php echo $dash->LocationDisplay ?>
									</h4>
								</div>
								<div class="card-body">
									<div class="row">
										<div class="1" style="margin-left: 20px; width:135px; height:120px">
											<div class="card gradient-1">
												<div class="card-body">
													<h2 style="text-align: center;"><a href="Dashboard/Dashdetail" style="color:aliceblue"><?php echo $dash->Leads ?></a></h2>
													<h6 style="text-align: center;"><a href="Dashboard/Dashdetail" style="color:aliceblue">Inquiry</a></h6>
												</div>
											</div>
										</div>
										<div class="1" style="margin-left: 15px; width:140px; height:120px">
											<div class="card gradient-1">
												<div class="card-body">
													<h2 style="text-align: center;"><a href="Dashboard/Dashdetail" style="color:aliceblue"><?php echo $dash->Applications ?></a>
													</h2>
													<h6 style="text-align: center;"><a href="Dashboard/Dashdetail" style="color:aliceblue">Applications</a></h6>
												</div>
											</div>
										</div>
										<div class="1" style="margin-left: 15px; width:135px; height:120px">
											<div class="card gradient-1">
												<div class="card-body">
													<h2 style="text-align: center;"><a href="Dashboard/Dashdetail" style="color:aliceblue"><?php echo $dash->Shortlist ?></a></h2>
													<h6 style="text-align: center;"><a href="Dashboard/Dashdetail" style="color:aliceblue">Shortlist</a></h6>
												</div>
											</div>
										</div>
										<div class="1" style="margin-left: 15px; width:135px; height:120px">
											<div class="card gradient-1">
												<div class="card-body">
													<h2 style="text-align: center;"><a href="Dashboard/Dashdetail" style="color:aliceblue"><?php echo $dash->CallOut ?></a></h2>
													<h6 style="text-align: center;"><a href="Dashboard/Dashdetail" style="color:aliceblue">Call
															Out</a></h6>
												</div>
											</div>
										</div>
										<div class="1" style="margin-left: 15px; width:135px; height:120px">
											<div class="card gradient-1">
												<div class="card-body">
													<h2 style="text-align: center;"><a href="Dashboard/Dashdetail" style="color:aliceblue"><?php echo $dash->CallOutEvaluation ?></a>
													</h2>
													<h6 style="text-align: center; margin-top:-15px"><a href="Dashboard/Dashdetail" style="color:aliceblue">Call
															Out Evaluation</a></h6>
												</div>
											</div>
										</div>
										<div class="1" style="margin-left: 10px; width:135px; height:120px">
											<div class="card gradient-1">
												<div class="card-body">
													<h2 style="text-align: center;"><a href="Dashboard/Dashdetail" style="color:aliceblue"><?php echo $dash->Offering ?></a></h2>
													<h6 style="text-align: center;"><a href="Dashboard/Dashdetail" style="color:aliceblue">Offering</a></h6>
												</div>
											</div>
										</div>
										<div class="1" style="margin-left: 10px; width:135px; height:120px">
											<div class="card gradient-1">
												<div class="card-body">
													<h2 style="text-align: center;"><a href="Dashboard/Dashdetail" style="color:aliceblue"><?php echo $dash->Hiring ?></a></h2>
													<h6 style="text-align: center;"><a href="Dashboard/Dashdetail" style="color:aliceblue">Hiring</a></h6>
												</div>
											</div>
										</div>
										<br><br><br><br><br><br><br><br>
										<button style="margin-left: 30px;" class="btn btn-outline-danger"><a data-toggle="modal" data-target=".modalBesaredit" href="Dashboard/edit/<?php echo $dash->JobVacancyId ?>">Edit</a></button>
										<button style="margin-left: 10px;" class="btn btn-outline-danger"><a href="Dashboard/Share/<?php echo $dash->JobVacancyId ?>">Share</a></button>
										<button style="margin-left: 10px;" class="btn btn-outline-danger"><a href="Dashboard/Copy/<?php echo $dash->JobVacancyId ?>">Copy</a></button>
										<button style="margin-left: 10px;" class="btn btn-outline-danger"><a href="Dashboard/More/<?php echo $dash->JobVacancyId ?>">More</a></button>
									</div>
								</div>
							</div>
						</div>
					</div>
				<?php endforeach; ?>
				<!-- <div class="row">
                    <div class="col-lg-6 col-md-12">
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
		</div>
		<!-- #/ container -->
	</div>
	<!--**********************************Content body end***********************************-->
	<div class="modal fade modalBesar" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-dialog-scrollable modal-lg" tabindex="-1" aria-modal="true">
			<div class="modal-content">
				<div class="modal-header">
					<h5>Job Post Creator</h5>
				</div>
				<div class="modal-body">
					<h4>
						<sttong>Required Information</sttong>
					</h4>
					<br><br>
					<form action="Dashboard/formjob" method="post">
						<input type="hidden" name="CompanyId" value="1">
						<div class="form-group">
							<div class="col-md-13">
								<input type="text" class="form-control" id="exampleFormControlInput1" name="Position" placeholder="Job Title" required>
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-13">
								<select class="form-control select2" placeholder="Job Function" name="JobFunctionId" required>
									<option>Job Category</option>
									<?php
									foreach ($jobfunction as $func) {
										echo '<option value="' . $func['Id'] . '"> ' . $func['Name'] . '</option>';
									}
									?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-13">
								<select class="form-control select2" placeholder="Job Level" name="JobLevelId" required>
									<option>Job Level</option>
									<?php
									foreach ($joblevel as $level) {
										echo '<option value="' . $level['Id'] . '"> ' . $level['Name'] . '</option>';
									}
									?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-13">
								<select class="form-control select2" placeholder="Employment Type" name="EmpTypeId" required>
									<option>Employment Type</option>
									<?php
									foreach ($EmpType as $typeemp) {
										echo '<option value="' . $typeemp['Id'] . '"> ' . $typeemp['Name'] . '</option>';
									}
									?>

								</select>
							</div>
						</div>
						<div class="form-group">
							<div class="row gx-3 mb-3">
								<!-- Form Group (first name)-->
								<div class="col-md-6">
									<input class="form-control" type="text" placeholder="Number of people you're hiring" name="TotalCandidateHiring" required>
								</div>
								<!-- Form Group (last name)-->
								<div class="col-md-6">
									<input class="form-control" type="date" placeholder="Deadline of Application" name="Dateline" required>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="row gx-3 mb-3">
								<!-- Form Group (first name)-->
								<div class="col-md-12">
									<input class="form-control" type="text" placeholder="Range Previous Salary" name="RangeStartSalary">
								</div>
							</div>
						</div>
						<div class="form-group">
							<select class="form-control select2" placeholder="Employment Type" name="EducationLevelId" required>
								<option>Minimum Educational Attainment</option>
								<?php
								foreach ($EducationLevel as $Edu) {
									echo '<option value="' . $Edu['ID'] . '"> ' . $Edu['Name'] . '</option>';
								}
								?>
								<option value="kategori">
									<?php echo $Edu['Name']  ?>
								</option>
							</select>
						</div>
						<!-- <div class="form-grup">
							<label for="Description">Qualification</label>
							<input type="hidden" class="form control" name="Qualification" required value="<?= set_value('Qualification') ?>">
							<textarea style="resize:none;width:570px;height:100px;" id="addcontent" name="Qualification"></textarea>
							<div id="addfaq" style="min-height: 160px;">
								<?= set_value('Qualification') ?>
							</div>
						</div> -->
						<div class="form-grup">
							<label style="color: black;" for="content"><strong>Job Description</strong></label>
							<input type="hidden" name="JobDescription" value="<?= set_value('JobDescription') ?>">
							<div id="editordescription" style="min-height: 160px; color:black">
								<?= set_value('JobDescription') ?>
							</div>
						</div>
						<br><br>
						<div class="form-grup">
							<label style="color: black;" for="content"><strong>Qualification</strong></label>
							<input type="hidden" name="Qualification" value="<?= set_value('Qualification') ?>">
							<div id="editor" style="min-height: 160px; color:black"><?= set_value('Qualification') ?>
							</div>
						</div>
						<!-- <div class="form-grup">
							<label for="Description">Description</label>
							<input type="hidden" class="form control" name="JobDescription" required value="<?= set_value('JobDescription') ?>">
							<textarea style="resize:none;width:570px;height:100px;" id="addjob" name="JobDescription"></textarea>
							<div id="addjob" style="min-height: 160px;">
								<?= set_value('JobDescription') ?>
							</div>
						</div> -->
						<br><br>

						<!-- <div class="form-group">
							<label>Provinsi</label>
							<select class="form-control" name="provinsi" id="provinsi">
								<option value=""> Pilih Provinsi</option>
							</select>
						</div>
						<div class="form-group">
							<label>Kabupaten</label>
							<select class="form-control" name="kabupaten" id="kabupaten">
								<option value=""></option>
							</select>
						</div>

						<div class="form-group">
							<label>Kecamatan</label>
							<select class="form-control" name="kecamatan" id="kecamatan">
								<option value=""></option>
							</select>
						</div>

						<div class="form-group">
							<label>Kelurahan</label>
							<select class="form-control" name="kelurahan" id="kelurahan">
								<option value=""></option>
							</select>
						</div> -->
						<div class="form-group">
							<div class="row gx-3 mb-3">
								<!-- Form Group (first name)-->
								<div class="col-md-6">
									<select id="form_Prov" class="form-control select2" placeholder="Select Province" name="ProvinceId" required>
										<option>Select Province</option>
										<?php
										foreach ($Province as $Prov) {
											echo '<option value="' . $Prov['ProvinceId'] . '"> ' . $Prov['ProvinceName'] . '</option>';
										}
										?>
										<option value="kategori">
											<?php echo $Prov['ProvinceName']  ?>
										</option>
									</select>
								</div>
								<!-- Form Group (last name)-->
								<div class="col-md-6">
									<select class="form-control select2" placeholder="Select Province" name="CityId" required>
										<option>Select City</option>
										<?php
										foreach ($City as $Ct) {
											echo '<option value="' . $Ct['CityId'] . '"> ' . $Ct['CityName'] . '</option>';
										}
										?>
										<option value="kategori">
											<?php echo $Ct['CityName']  ?>
										</option>
									</select>
								</div>
							</div>
						</div>
						<div class="form-group">
							<select class="form-control select2" placeholder="Employment Type" name="LocationId" required>
								<option>Location</option>
								<?php
								foreach ($Location as $Loc) {
									echo '<option value="' . $Loc['Id'] . '"> ' . $Loc['Name'] . '</option>';
								}
								?>
								<option value="kategori">
									<?php echo $Loc['Name']  ?>
								</option>
							</select>
						</div>
						<!-- <div class="form-group">
							<textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Custom Question" name="CusQues" required></textarea>
						</div> -->
						<div class="form-check" style="color: black;">
							<input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked>
							<label class="form-check-label" for="flexCheckDefault">
								This job can be done remotely (Work From Home)
							</label>
						</div>
						<div class="form-check" style="color: black;">
							<input class="form-check-input" name="" type="checkbox" value="" id="flexCheckChecked" checked>
							<label class="form-check-label" for="flexCheckChecked">
								Accept candidate willing to relocate
							</label>
						</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-info">Publish</button>
					<button class="btn btn-primary">Save</button>
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				</div>
				</form>
			</div>
		</div>
	</div>

	<!-- EDIT POST JOB START -->
	<div class="modal fade modalBesaredit" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-dialog-scrollable modal-lg" tabindex="-1" aria-modal="true">
			<div class="modal-content">
				<div class="modal-header">
					<h5>Job Post Editor</h5>
				</div>
				<div class="modal-body">
					<h4>
						<sttong>Required Information</sttong>
					</h4>
					<br><br>
					<form action="Dashboard/formjob" method="post">
						<input type="hidden" name="CompanyId" value="1">
						<div class="form-group">
							<div class="col-md-13">
								<input type="text" class="form-control" id="exampleFormControlInput1" name="Position" placeholder="Job Title" required>
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-13">
								<select class="form-control select2" placeholder="Job Function" name="JobFunctionId" required>
									<option>Job Function</option>
									<?php
									foreach ($jobfunction as $func) {
										echo '<option value="' . $func['Id'] . '"> ' . $func['Name'] . '</option>';
									}
									?>
									<option value="kategori">
										<?php echo $func['Name']  ?>
									</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-13">
								<select class="form-control select2" placeholder="Job Level" name="JobLevelId" required>
									<option>Job Level</option>
									<?php
									foreach ($joblevel as $level) {
										echo '<option value="' . $level['Id'] . '"> ' . $level['Name'] . '</option>';
									}
									?>
									<option value="kategori">
										<?php echo $level['Name']  ?>
									</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-13">
								<select class="form-control select2" placeholder="Employment Type" name="EmpTypeId" required>
									<option>Employment Type</option>
									<?php
									foreach ($EmpType as $typeemp) {
										echo '<option value="' . $typeemp['Id'] . '"> ' . $typeemp['Name'] . '</option>';
									}
									?>
									<option value="kategori">
										<?php echo $typeemp['Name']  ?>
									</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<div class="row gx-3 mb-3">
								<!-- Form Group (first name)-->
								<div class="col-md-6">
									<input class="form-control" type="text" placeholder="Number of people you're hiring" name="TotalCandidateHiring" required>
								</div>
								<!-- Form Group (last name)-->
								<div class="col-md-6">
									<input class="form-control" type="date" placeholder="Deadline of Application" name="Dateline" required>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="row gx-3 mb-3">
								<!-- Form Group (first name)-->
								<div class="col-md-12">
									<input class="form-control" type="text" placeholder="Range Previous Salary" name="RangeStartSalary">
								</div>
							</div>
						</div>
						<div class="form-group">
							<select class="form-control select2" placeholder="Employment Type" name="EducationLevelId" required>
								<option>Minimum Educational Attainment</option>
								<?php
								foreach ($EducationLevel as $Edu) {
									echo '<option value="' . $Edu['ID'] . '"> ' . $Edu['Name'] . '</option>';
								}
								?>
								<option value="kategori">
									<?php echo $Edu['Name']  ?>
								</option>
							</select>
						</div>
						<!-- <div class="form-grup">
							<label for="Description">Qualification</label>
							<input type="hidden" class="form control" name="Qualification" required value="<?= set_value('Qualification') ?>">
							<textarea style="resize:none;width:570px;height:100px;" id="addcontent" name="Qualification"></textarea>
							<div id="addfaq" style="min-height: 160px;">
								<?= set_value('Qualification') ?>
							</div>
						</div> -->
						<div class="form-grup">
							<label style="color: black;" for="content"><strong>Job Description</strong></label>
							<input type="hidden" name="JobDescription" value="<?= set_value('JobDescription') ?>">
							<div id="editordescription" style="min-height: 160px; color:black">
								<?= set_value('JobDescription') ?>
							</div>
						</div>
						<br><br>
						<div class="form-grup">
							<label style="color: black;" for="content"><strong>Qualification</strong></label>
							<input type="hidden" name="Qualification" value="<?= set_value('Qualification') ?>">
							<div id="editor" style="min-height: 160px; color:black"><?= set_value('Qualification') ?>
							</div>
						</div>
						<!-- <div class="form-grup">
							<label for="Description">Description</label>
							<input type="hidden" class="form control" name="JobDescription" required value="<?= set_value('JobDescription') ?>">
							<textarea style="resize:none;width:570px;height:100px;" id="addjob" name="JobDescription"></textarea>
							<div id="addjob" style="min-height: 160px;">
								<?= set_value('JobDescription') ?>
							</div>
						</div> -->
						<br><br>
						<!-- <div class="form-group">
							<label>Provinsi</label>
							<select class="form-control" name="province" id="provinsi">
								<option value=""> Pilih Provinsi</option>
							</select>
						</div>

						<div class="form-group">
							<label>Kabupaten</label>
							<select class="form-control" name="City" id="kabupaten">
								<option value=""></option>
							</select>
						</div>

						<div class="form-group">
							<label>Kecamatan</label>
							<select class="form-control" name="kecamatan" id="kecamatan">
								<option value=""></option>
							</select>
						</div>

						<div class="form-group">
							<label>Kelurahan</label>
							<select class="form-control" name="kelurahan" id="kelurahan">
								<option value=""></option>
							</select>
						</div> -->
						<div class="form-group">
							<div class="row gx-3 mb-3">
								<!-- Form Group (first name)-->
								<div class="col-md-6">
									<select id="Province" class="form-control select2" placeholder="Select Province" name="ProvinceId" required>
										<option>Select Province</option>
										<?php
										foreach ($Province as $Prov) {
											echo '<option value="' . $Prov['ProvinceId'] . '"> ' . $Prov['ProvinceName'] . '</option>';
										}
										?>
										<option value="kategori">
											<?php echo $Prov['ProvinceName']  ?>
										</option>
									</select>
								</div>
								<!-- Form Group (last name)-->
								<div class="col-md-6">
									<select id="City" class="form-control select2" placeholder="Select Province" name="CityId" required>
										<option>Select City</option>
										<?php
										foreach ($City as $Ct) {
											echo '<option value="' . $Ct['CityId'] . '"> ' . $Ct['CityName'] . '</option>';
										}
										?>
										<option value="kategori">
											<?php echo $Ct['CityName']  ?>
										</option>
									</select>
								</div>
							</div>
						</div>
						<div class="form-group">
							<select class="form-control select2" placeholder="Employment Type" name="LocationId" required>
								<option>Location</option>
								<?php
								foreach ($Location as $Loc) {
									echo '<option value="' . $Loc['Id'] . '"> ' . $Loc['Name'] . '</option>';
								}
								?>
								<option value="kategori">
									<?php echo $Loc['Name']  ?>
								</option>
							</select>
						</div>
						<!-- <div class="form-group">
							<textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Custom Question" name="CusQues" required></textarea>
						</div> -->
						<div class="form-check" style="color: black;">
							<input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked>
							<label class="form-check-label" for="flexCheckDefault">
								This job can be done remotely (Work From Home)
							</label>
						</div>
						<div class="form-check" style="color: black;">
							<input class="form-check-input" name="" type="checkbox" value="" id="flexCheckChecked" checked>
							<label class="form-check-label" for="flexCheckChecked">
								Accept candidate willing to relocate
							</label>
						</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-info">Publish</button>
					<button class="btn btn-primary">Save</button>
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				</div>
				</form>
			</div>
		</div>
	</div>
	<!-- END EDIT POST JOB -->
	<div class="footer">
		<div class="copyright">
			<p>Copyright &copy;<a href="">HCIS TEAM</a> 2023</p>
		</div>
	</div>
	</div>
	<!--**********************************Main wrapper end***********************************-->

	<!--**********************************Scripts***********************************-->

	<script src="<?php echo base_url() ?>assets/template/plugins/common/common.min.js"></script>
	<script src="<?php echo base_url() ?>assets/template/js/custom.min.js"></script>
	<script src="<?php echo base_url() ?>assets/template/js/settings.js"></script>


	<script src="<?php echo base_url() ?>assets/template/js/gleek.js"></script>
	<script src="<?php echo base_url() ?>assets/template/js/styleSwitcher.js"></script>
	<!-- Chartjs -->
	<script src="<?php echo base_url() ?>assets/template/plugins/chart.js/Chart.bundle.min.js"></script>
	<!-- Circle progress -->
	<script src="<?php echo base_url() ?>assets/template/plugins/circle-progress/circle-progress.min.js">
	</script>
	<script src="<?php echo base_url() ?>assets/template/plugins/d3v3/index.js"></script>
	<script src="<?php echo base_url() ?>assets/template/plugins/topojson/topojson.min.js">
	</script>
	<script src="<?php echo base_url() ?>assets/template/plugins/datamaps/datamaps.world.min.js">

	</script>
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
	<script src="<?php echo base_url() ?>assets/template/js/dashboard/dashboard-1.js"></script>
	<!-- <script src="<?php echo base_url(); ?>assets/vendor/ckeditor/ckeditor.js"></script>
		<script src="<?php echo base_url(); ?>assets/vendor/ckeditor2/ckeditor/ckeditor.js"></script>
		<script>
			CKEDITOR.replace('addcontent', {
				filebrowserImageBrowseUrl: '<?php echo base_url('assets/vendor/kcfinder'); ?>'
			});
		</script> -->
	<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
	<script>
		var quill = new Quill('#editordescription', {
			theme: 'snow',
			modules: {
				toolbar: [
					[{
						header: [1, 2, 3, 4, 5, 6, false]
					}],
					[{
						font: []
					}],
					["bold", "italic"],
					["link", "blockquote", "code-block", "image"],
					[{
						list: "ordered"
					}, {
						list: "bullet"

					}],

					[{















						script: "sub"

					}, {
						script: "super"
					}],
					[{
						color: []
					}, {
						background: []
					}],
				]
			},
		});
		quill.on('text-change', function(delta, oldDelta, source) {
			document.querySelector("input[name='JobDescription']").value = quill.root.innerHTML;
		});
	</script>
	<script>
		var quill = new Quill('#editor', {
			theme: 'snow',
			modules: {
				toolbar: [
					[{
						header: [1, 2, 3, 4, 5, 6, false]
					}],
					[{
						font: []
					}],
					["bold", "italic"],
					["link", "blockquote", "code-block", "image"],
					[{
						list: "ordered"
					}, {
						list: "bullet"
					}],
					[{
						script: "sub"
					}, {
						script: "super"
					}],
					[{
						color: []
					}, {
						background: []

					}],
				]
			},
		});
		quill.on('text-change', function(delta, oldDelta, source) {
			document.querySelector("input[name='Qualification']").value = quill.root.innerHTML;
		});
	</script>




</body>


</html>
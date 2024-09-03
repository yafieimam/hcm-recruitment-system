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
	<link href="<?php echo base_url() ?>assets/template/plugins/jquery-steps/css/jquery.steps.css" rel="stylesheet">
	<link href="<?php echo base_url() ?>assets/template/css/style.css" rel="stylesheet">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css" rel="stylesheet" />
	<link rel="stylesheet" href="assets/vendor/phone/PLUGINS/css/intlTelInput.css">
</head>

<body>

	<!--*******************Preloader start********************-->
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
				<a href="Profile">
					<b class="logo-abbr"><img src="<?php echo base_url() ?>assets/template_home/images/logoJNE.PN" alt="">
					</b>
					<span class="logo-compact"><img src="<?php echo base_url() ?>assets/template_home/theme/images/LogoRec.jpg" alt=""></span>
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
		<!--**********************************Nav header end***********************************-->

		<!--**********************************Header start***********************************-->
		<div class="header" style="position: fixed;">
			<div class="header-content clearfix">
				<div class="header-right">
					<ul class="clearfix">
						<li class="icons dropdown"><a href="javascript:void(0)" data-toggle="dropdown">
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
									</ul>

								</div>
							</div>
						</li>
						<li class="icons dropdown"><a href="javascript:void(0)" data-toggle="dropdown">
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
						<!-- <li class="icons dropdown d-none d-md-flex">
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
						</li> -->
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
		<!--**********************************Header end ti-comment-alt***********************************-->

		<!--**********************************Sidebar start***********************************-->
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
		<!--**********************************Sidebar end***********************************-->
		<div style="margin-top:100px;" class="content-body">
			<div class="container-fluid">
				<div class="row">
					<div class="col-12">
						<div style="float: right;" class="row">
							<a style="margin-right: 10px;" class="btn btn-danger" href="#" data-toggle="modal" data-target="#myModal">Add Section</a>
							<a class="btn btn-outline-danger" href="#">Preview Profile</a>
						</div>
						<h3 class="d-inline"><strong>Profile</strong></h3>
						<hr>
						<div class="container">
							<div class="row">
								<div style="margin-left: 40px; margin-top:-50px;" class="col-lg-10 offset-lg-2">
									<div class="accordion mt-5" id="accordionExample">
										<div class="card">
											<div class="card-header" id="headingTwo">
												<h2 class="mb-0">
													<span>Basic Information</span>
													<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo"><i class="fa fa-plus-circle"></i></button>
												</h2>
											</div>
											<div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordionExample">
												<div class="card-body">
													<div class="row">
														<div class="col-xl-4">
															<!-- Profile picture card-->
															<form action="" method="post" enctype="multipart/form-data">
																<div class="card mb-4 mb-xl-0">
																	<div class="card-body text-center">
																		<!-- Profile picture image-->
																		<img src="<?php echo base_url() ?>assets/template/images/avatar/no-photo.PNG" height="80" width="80" alt="">
																		<!-- Profile picture help block-->
																		<div class="small font-italic text-muted mb-4">
																			JPG or PNG no larger than 5 MB</div>
																		<!-- Profile picture upload button-->
																		<input class="form-control" type="file" id="formFileMultiple" multiple name="PhotoProfile" required />
																		<button class="btn btn-primary" type="submit">Upload
																			new image</button>
																	</div>
																</div>
															</form>
														</div>
														<div class="col-xl-8">
															<!-- Account details card-->
															<div class="card mb-4">
																<div class="card-body">
																	<!-- Form Row-->
																	<div class="row gx-3 mb-3">
																		<!-- Form Group (first name)-->
																		<div class="col-md-6">
																			<form method="post" action="<?php base_url() ?>Profile/data_profile">
																				<input class="form-control" id="inputFirstName" type="text" placeholder="First Name" value="<?php echo $CanRegister['FirstName'] ?>" name="FirstName" required>
																		</div>
																		<!-- Form Group (last name)-->
																		<div class="col-md-6">
																			<input class="form-control" id="inputLastName" type="text" placeholder="Last Name" value="<?php echo $CanRegister['LastName'] ?>" name="LastName" required>
																		</div>
																	</div>
																	<div class="mb-3">
																		<select class="form-control select2" placeholder="location" name="CountryId" required>
																			<option>Select Country</option>
																			<?php
																			foreach ($Country as $Coun) {
																				echo '<option value="' . $Coun['CountryId'] . '"> ' . $Coun['CountryName'] . '</option>';
																			}
																			?>
																			<option value="kategori">
																				<?php echo $Coun['CountryName']  ?>
																			</option>
																		</select>
																	</div>
																	<!-- Form Row -->
																	<div class="row gx-3 mb-3">
																		<!-- Form Group (organization name)-->
																		<div class="col-md-6">
																			<select class="form-control select2" placeholder="location" name="ProvinceId" required>
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
																		<!-- Form Group (location)-->
																		<div class="col-md-6">
																			<select class="form-control select2" placeholder="location" name="CityId" required>
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
																	<div class="row gx-3 mb-3">
																		<!-- Form Group (organization name)-->
																		<div class="col-md-6">
																			<select class="form-control select2" placeholder="location" name="KecamatanId" required>
																				<option>Select District</option>
																				<?php
																				foreach ($Kecamatan as $Kec) {
																					echo '<option value="' . $Kec['KecamatanId'] . '"> ' . $Kec['KecamatanName'] . '</option>';
																				}
																				?>
																				<option value="kategori">
																					<?php echo $Kec['KecamatanName']  ?>
																				</option>
																			</select>
																		</div>
																		<div class="col-md-6">
																			<select class="form-control select2" placeholder="location" name="CityId" required>
																				<option>Select Sub District</option>
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

																	<div class="form-group">
																		<textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Street Address" name="Address" required></textarea>
																	</div>
																	<div class="row gx-3 mb-3">
																		<!-- Form Group (organization name)-->
																		<div class="col-md-4">
																			<input class="form-control" id="inputOrgName" type="text" placeholder="Rt" name="RT" required>
																		</div>
																		<!-- Form Group (location)-->
																		<div class="col-md-4">
																			<input class="form-control" id="inputLocation" type="text" placeholder="Rw" name="RW" required>
																		</div>
																		<div class="col-md-4">
																			<input class="form-control" id="inputLocation" type="text" placeholder="No" name="HouseNo" required>
																		</div>
																	</div>
																	<div class="row gx-3 mb-3">
																		<!-- Form Group (organization name)-->
																		<div class="col-md-4">
																			<input class="form-control" id="inputOrgName" type="date" placeholder="Date" name="BirthDay" required>
																		</div>

																	</div>
																	<div style="margin-left: 30px;" class="row gx-3 mb-3">
																		<div class="row">
																			<div class="form-check">
																				<input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" name="GenderId" required>
																				<label class="form-check-label" for="flexRadioDefault1">
																					Male
																				</label>
																			</div>
																			<div style="margin-left: 5px;" class="form-check">
																				<input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" name="GenderId" required>
																				<label class="form-check-label" for="flexRadioDefault2">
																					Female
																				</label>
																			</div>
																		</div>
																	</div>
																	<!-- Form Group (email address)-->
																	<div class="mb-3">
																		<input class="form-control" id="inputEmailAddress" type="email" placeholder="Enter your email address" value="<?php echo $CanRegister['Email'] ?>" name="Email" required>
																	</div>
																	<!-- Form Row-->
																	<div class="row gx-3 mb-3">
																		<!-- Form Group (phone number)-->
																		<div class="col-md-8">
																			<input class="form-control" type="number" name="phone" id="phone" placeholder="Phone number" name="PhoneNumber" required>
																			<!-- <input class="form-control" id="inputPhone" type="tel" placeholder="Enter your phone number"> -->
																		</div>
																		<!-- Form Group (birthday)-->
																		<!-- <div class="col-md-6">
                                                                                <label class="small mb-1"
                                                                                    for="inputBirthday">Birthday</label>
                                                                                <input class="form-control"
                                                                                    id="inputBirthday" type="text"
                                                                                    name="birthday"
                                                                                    placeholder="Enter your birthday"
                                                                                    value="06/10/1988">
                                                                            </div> -->
																	</div>
																	<div class="row gx-3 mb-3">
																		<!-- Form Group (Resume)-->

																		<div class="col-md-12">
																			<p style="color:black; text-align:justify">
																				<strong>NOTE : </strong> Your
																				profile is the first
																				thing recruiters see and not your
																				uploaded resume, so make sure your
																				E-Recruitment profile is as complete
																				and detailed as your uploaded
																				resume.
																			</p>
																			<label><strong>Upload Your Resume
																					Here !</strong></label><br>
																			<input class="btn btn-primary" type="file" placeholder="Upload Your CV" required>
																		</div>
																	</div>
																	<!-- Save changes button-->
																	<button style="float: right;" class="btn btn-primary" type="Submit">Save
																	</button>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
											</form>
										</div>
										<div class="card">
											<div class="card-header" id="headingFive">
												<h2 class="mb-0">
													<span>Education</span>
													<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapsefive" aria-expanded="false" aria-controls="collapsefive"><i class="fa fa-plus-circle"></i></button>
												</h2>
											</div>
											<form method="post" action="<?php base_url() ?>Profile/data_education">
												<div id="collapsefive" class="collapse show" aria-labelledby="headingfive" data-parent="#accordionExample">
													<div class="card-body">
														<div class="form-group row">
															<div class="col-md-12">
																<?php foreach ($CanProfile as $Profile) ?>
																<input type="hidden" name="CanProfileId" value="<?php echo $Profile['CanProfileId'] ?>">
																<select class="form-control select2" name="EducationLevelId" required>
																	<option>Education Level</option>
																	<?php
																	foreach ($Education as $Edu) {
																		echo '<option value="' . $Edu['EducationLevelId'] . '"> ' . $Edu['EducationLevelName'] . '</option>';
																	}
																	?>
																	<option value="kategori">
																		<?php echo $Edu['EducationLevelName']  ?>
																	</option>
																</select>
															</div>
															<br><br><br>
															<div class="col-md-12">
																<input class="form-control" id="education" type="text" placeholder="School or University Name" name="SchoolName" required>
															</div>
															<br><br><br>
															<div class="col-md-12">
																<select class="form-control select2" name="EducationMajorId" required>
																	<option>Education Major</option>
																	<?php
																	foreach ($EduMajor as $EM) {
																		echo '<option value="' . $EM['EducationMajorId'] . '"> ' . $EM['EducationMajorName'] . '</option>';
																	}
																	?>
																	<option value="kategori">
																		<?php echo $EM['EducationMajorName']  ?>
																	</option>
																</select>
															</div>
															<br><br><br>
															<div class="col-md-2">
																<select class="form-control select2" name="StartMonth" required>
																	<option>Start Month</option>
																	<?php
																	foreach ($Month as $StartMonth) {
																		echo '<option value="' . $StartMonth['MonthId'] . '"> ' . $StartMonth['MonthName'] . '</option>';
																	}
																	?>
																	<option value="kategori">
																		<?php echo $StartMonth['MonthName']  ?>
																	</option>
																</select>
															</div>
															<div class="col-md-2">
																<select class="form-control select2" name="StartYear" required>
																	<option>Start Year</option>
																	<?php
																	foreach ($Year as $StartYear) {
																		echo '<option value="' . $StartYear['Year'] . '"> ' . $StartYear['Year'] . '</option>';
																	}
																	?>
																	<option value="kategori">
																		<?php echo $StartYear['Year']  ?>
																	</option>
																</select>
															</div>
															<label>To*</label>
															<div class="col-md-2">
																<select class="form-control select2" name="EndMonth" required>
																	<option>End Month</option>
																	<?php
																	foreach ($Month as $StartMonth) {
																		echo '<option value="' . $StartMonth['MonthId'] . '"> ' . $StartMonth['MonthName'] . '</option>';
																	}
																	?>
																	<option value="kategori">
																		<?php echo $StartMonth['MonthName']  ?>
																	</option>
																</select>
															</div>
															<div class="col-md-2">
																<select class="form-control select2" name="EndYear" required>
																	<option>End Year</option>
																	<?php
																	foreach ($Year as $StartYear) {
																		echo '<option value="' . $StartYear['Year'] . '"> ' . $StartYear['Year'] . '</option>';
																	}
																	?>
																	<option value="kategori">
																		<?php echo $StartYear['Year']  ?>
																	</option>
																</select>
															</div>
														</div>
														<button style="float: right;" class="btn btn-primary" type="Submit">Save
														</button>
														<br>
													</div>
												</div>
											</form>
										</div>
										<div class="card">
											<div class="card-header" id="headingFour">
												<h2 class="mb-0">
													<span>Work Experience</span>
													<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour"><i class="fa fa-plus-circle"></i></button>
												</h2>
											</div>
											<div id="collapseFour" class="collapse show" aria-labelledby="headingFour" data-parent="#accordionExample">
												<div class="card-body">
													<form>
														<div class="mb-3">
															<input class="form-control" id="jobtitle" type="text" placeholder="Jobtitle">
														</div>
														<div class="mb-3">
															<input class="form-control" id="company" type="text" placeholder="Company">
														</div>
														<div class="form-group row">
															<div class="col-md-2">
																<select class="form-control select2" name="EducationMajorId">
																	<option>End Month</option>
																	<?php
																	foreach ($Month as $StartMonth) {
																		echo '<option value="' . $StartMonth['MonthId'] . '"> ' . $StartMonth['MonthName'] . '</option>';
																	}
																	?>
																	<option value="kategori">
																		<?php echo $StartMonth['MonthName']  ?>
																	</option>
																</select>
															</div>
															<div class="col-md-2">
																<select class="form-control select2" name="EducationMajorId">
																	<option>End Year</option>
																	<?php
																	foreach ($Year as $StartYear) {
																		echo '<option value="' . $StartYear['Year'] . '"> ' . $StartYear['Year'] . '</option>';
																	}
																	?>
																	<option value="kategori">
																		<?php echo $StartYear['Year']  ?>
																	</option>
																</select>
															</div>
															<label>To</label>
															<div class="col-md-2">
																<select class="form-control select2" name="EducationMajorId">
																	<option>End Month</option>
																	<?php
																	foreach ($Month as $StartMonth) {
																		echo '<option value="' . $StartMonth['MonthId'] . '"> ' . $StartMonth['MonthName'] . '</option>';
																	}
																	?>
																	<option value="kategori">
																		<?php echo $StartMonth['MonthName']  ?>
																	</option>
																</select>
															</div>
															<div class="col-md-2">
																<select class="form-control select2" name="EducationMajorId">
																	<option>End Year</option>
																	<?php
																	foreach ($Year as $StartYear) {
																		echo '<option value="' . $StartYear['Year'] . '"> ' . $StartYear['Year'] . '</option>';
																	}
																	?>
																	<option value="kategori">
																		<?php echo $StartYear['Year']  ?>
																	</option>
																</select>
															</div>
														</div>
														<!-- Form Row-->
														<div class="form-group">
															<label for="exampleFormControlTextarea1">Job
																Description</label>
															<textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Describe your job description"></textarea>
														</div>
														<div class="form-group row">
															<div class="col-md-6">
																<select class="form-control selectpicker" id="select-month" data-live-search="true">
																	<option selected>Job Level</option>
																	<option data-tokens="Januari">Staff</option>
																	<option data-tokens="Februari">Koordinator</option>
																	<option data-tokens="Maret">Supervisor</option>
																	<option data-tokens="April">Manager</option>
																</select>
															</div>
															<div class="col-md-6">
																<select class="form-control selectpicker" id="select-year" data-live-search="true">
																	<option selected>Job Function</option>
																	<option data-tokens="Accounting & Finance">
																		Accounting & Finance</option>
																	<option data-tokens="Accounting & Finance">
																		Accounting & Finance</option>
																	<option data-tokens="Administration and Coordination">
																		Administration and Coordination</option>
																	<option data-tokens="Architecture and Building Management">
																		Architecture and Building Management</option>
																	<option data-tokens="Business Development">Business
																		Development</option>
																	<option data-tokens="Customer Service">Customer
																		Service</option>
																	<option data-tokens="Data Analyst">Data Analyst
																	</option>
																	<option data-tokens="Education and Training">
																		Education and Training</option>
																	<option data-tokens="Engineering">Engineering
																	</option>
																	<option data-tokens="General Services">General
																		Services</option>
																	<option data-tokens="General Affair">General Affair
																	</option>
																	<option data-tokens="Health and Medical">Health and
																		Medical</option>
																	<option data-tokens="Human Resources">Human
																		Resources</option>
																	<option data-tokens="IT and Software">IT and
																		Software</option>
																	<option data-tokens="Legal">Legal</option>
																	<option data-tokens="Management and Consultacy">
																		Management and Consultacy</option>
																	<option data-tokens="Marketing">Marketing</option>
																	<option data-tokens="Safety and Security">Safety and
																		Security</option>
																	<option data-tokens="Sales">Sales</option>
																	<option data-tokens="Supply Chain">Supply Chain
																	</option>
																	<option data-tokens="Transportation Management">
																		Transportation Management</option>
																	<option data-tokens="Writing and Content">Writing
																		and Content</option>
																	<option data-tokens="Supply Chain">Warehouse
																		Management</option>

																</select>
															</div>
														</div>
														<label>
															<h6><strong>Previous Salary (optional)</strong></h6>
														</label>
														<div class="form-group row">
															<div class="col-md-3">
																<select class="form-control selectpicker" id="select-year" data-live-search="true">
																	<option selected>Currency</option>
																	<option data-tokens="USD-$">USD-$</option>
																	<option data-tokens="IDR-Rp">IDR-Rp</option>
																</select>
															</div>
															<div class="col-md-3">
																<input class="form-control" id="inputAmount" type="text" placeholder="Amount">
															</div>
															<div class="col-md-3">
																<select class="form-control selectpicker" id="select-year" data-live-search="true">
																	<option selected>Frequency</option>
																	<option data-tokens="Per Year">Per Year</option>
																	<option data-tokens="Per Month">Per Month</option>
																	<option data-tokens="Per Week">Per Week</option>
																	<option data-tokens="Per Day">Per Day</option>
																</select>
															</div>
														</div>
														<button style="float: right;" class="btn btn-primary" type="button">Save
														</button>
														<br>
													</form>
												</div>
											</div>
										</div>
										<div class="card">
											<div class="card-header" id="headingThree">
												<h2 class="mb-0">
													<span>Salary Expectation</span>
													<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree"><i class="fa fa-plus-circle"></i></button>
												</h2>
											</div>
											<div id="collapseThree" class="collapse show" aria-labelledby="headingThree" data-parent="#accordionExample">
												<div class="card-body">
													<form>
														<div class="input-group mb-1 col-md-5">
															<div class="input-group-prepend">
																<label class="input-group-text" for="inputGroupSelect01">Currency :</label>
															</div>
															<select class="custom-select" id="inputGroupSelect01">
																<option selected>Choose...</option>
																<option value="1">USD-$</option>
																<option value="2">IDR-Rp</option>
															</select>
														</div>
														<br>
														<!-- Form Row-->
														<div style="color:black; margin-left:5px" class="row gx-3 mb-3">
															<!-- Form Group (first name)-->
															<div class="col-md-4">
																<label for="minimum">Minimum</label>
																<input class="form-control" id="inputFirstName" type="text" placeholder="Rp.3.000.000">
															</div>
															<!-- Form Group (last name)-->
															<div class="col-md-4">
																<label for="maximum">Maximum</label>
																<input class="form-control" id="inputLastName" type="text" placeholder="Rp.5.000.000">
															</div>
														</div>
														<button style="float: right;" class="btn btn-primary" type="button">Save
														</button>
														<br>
													</form>
												</div>
											</div>
										</div>
										<div class="card">
											<div class="card-header" id="headingsix">
												<h2 class="mb-0">
													<span>Skills </span>
													<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapsesix" aria-expanded="false" aria-controls="collapsesix"><i class="fa fa-plus-circle"></i></button>
												</h2>
											</div>
											<div id="collapsesix" class="collapse show" aria-labelledby="headingsix" data-parent="#accordionExample">
												<div class="card-body">
													<form>
														<div class="form-group row">
															<div class="col-md-8">
																<input class="form-control" id="Skills" type="text" placeholder="Your Skill">
															</div>
															<div class="col-md-4">
																<select class="form-control selectpicker" id="select-year" data-live-search="true">
																	<option selected>Level</option>
																	<option data-tokens="Basic">
																		Basic</option>
																	<option data-tokens="Novice">
																		Novice</option>
																	<option data-tokens="Intermediate">
																		Intermediate</option>
																	<option data-tokens="Advanced">
																		Advanced</option>
																	<option data-tokens="Expert">
																		Expert</option>
																</select>
															</div>
														</div>
														<button style="float: right;" class="btn btn-primary" type="button">Save
														</button>
														<br>
													</form>
												</div>
											</div>
										</div>
										<div class="card">
											<div class="card-header" id="headingsix">
												<h2 class="mb-0">
													<span>Seminars and Trainings</span>
													<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#seminars" aria-expanded="false" aria-controls="seminars"><i class="fa fa-plus-circle"></i></button>
												</h2>
											</div>
											<div id="seminars" class="collapse" aria-labelledby="seminars" data-parent="#accordionExample">
												<div class="card-body">
													<form>
														<div class="mb-3">
															<input class="form-control" id="jobtitle" type="text" placeholder="Title">
														</div>
														<div class="mb-3">
															<input class="form-control" id="company" type="text" placeholder="Institution">
														</div>
														<div class="form-group row">
															<div class="col-md-2">
																<select class="form-control selectpicker" id="select-month" data-live-search="true">
																	<option selected>Month</option>
																	<option data-tokens="Januari">Januari</option>
																	<option data-tokens="Februari">Februari</option>
																	<option data-tokens="Maret">Maret</option>
																	<option data-tokens="April">April</option>
																	<option data-tokens="Mei">Mei</option>
																</select>
															</div>
															<div class="col-md-2">
																<select class="form-control selectpicker" id="select-year" data-live-search="true">
																	<option selected>Year</option>
																	<option data-tokens="2022">2022</option>
																	<option data-tokens="2023">2023</option>
																	<option data-tokens="2024">2024</option>
																</select>
															</div>
															<label>To</label>
															<div class="col-md-2">
																<select class="form-control selectpicker" id="select-month" data-live-search="true">
																	<option selected>Month</option>
																	<option data-tokens="Januari">Januari</option>
																	<option data-tokens="Februari">Februari</option>
																	<option data-tokens="Maret">Maret</option>
																	<option data-tokens="April">April</option>
																	<option data-tokens="Mei">Mei</option>
																</select>
															</div>
															<div class="col-md-2">
																<select class="form-control selectpicker" id="select-year" data-live-search="true">
																	<option selected>Year</option>
																	<option data-tokens="2022">2022</option>
																	<option data-tokens="2023">2023</option>
																	<option data-tokens="2024">2024</option>
																</select>
															</div>
														</div>
														<!-- Form Row-->
														<button style="float: right;" class="btn btn-primary" type="button">Save
														</button>
														<br>
													</form>
												</div>
											</div>
										</div>
										<div class="card">
											<div class="card-header" id="headingsix">
												<h2 class="mb-0">
													<span>Certifications</span>
													<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#Certifications" aria-expanded="false" aria-controls="Certifications"><i class="fa fa-plus-circle"></i></button>
												</h2>
											</div>
											<div id="Certifications" class="collapse" aria-labelledby="Certifications" data-parent="#accordionExample">
												<div class="card-body">
													<form>
														<div class="mb-3">
															<input class="form-control" id="jobtitle" type="text" placeholder="Title">
														</div>
														<div class="mb-3">
															<input class="form-control" id="company" type="text" placeholder="Who authorized the certificate / license">
														</div>
														<div class="form-group row">
															<div class="col-md-2">
																<select class="form-control selectpicker" id="select-month" data-live-search="true">
																	<option selected>Month</option>
																	<option data-tokens="Januari">Januari</option>
																	<option data-tokens="Februari">Februari</option>
																	<option data-tokens="Maret">Maret</option>
																	<option data-tokens="April">April</option>
																	<option data-tokens="Mei">Mei</option>
																</select>
															</div>
															<div class="col-md-2">
																<select class="form-control selectpicker" id="select-year" data-live-search="true">
																	<option selected>Year</option>
																	<option data-tokens="2022">2022</option>
																	<option data-tokens="2023">2023</option>
																	<option data-tokens="2024">2024</option>
																</select>
															</div>
														</div>
														<button style="float: right;" class="btn btn-primary" type="button">Save
														</button>
														<br>
													</form>
												</div>
											</div>
										</div>
										<div class="card">
											<div class="card-header" id="headingsix">
												<h2 class="mb-0">
													<span>Licenses</span>
													<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#Licenses" aria-expanded="false" aria-controls="Licenses"><i class="fa fa-plus-circle"></i></button>
												</h2>
											</div>
											<div id="Licenses" class="collapse" aria-labelledby="Licenses" data-parent="#accordionExample">
												<div class="card-body">
													<form>
														<div class="mb-3">
															<input class="form-control" id="jobtitle" type="text" placeholder="Title">
														</div>
														<div class="mb-3">
															<input class="form-control" id="company" type="text" placeholder="Who authorized the certificate / license">
														</div>
														<div class="form-group row">
															<div class="col-md-2">
																<select class="form-control selectpicker" id="select-month" data-live-search="true">
																	<option selected>Month</option>
																	<option data-tokens="Januari">Januari</option>
																	<option data-tokens="Februari">Februari</option>
																	<option data-tokens="Maret">Maret</option>
																	<option data-tokens="April">April</option>
																	<option data-tokens="Mei">Mei</option>
																</select>
															</div>
															<div class="col-md-2">
																<select class="form-control selectpicker" id="select-year" data-live-search="true">
																	<option selected>Year</option>
																	<option data-tokens="2022">2022</option>
																	<option data-tokens="2023">2023</option>
																	<option data-tokens="2024">2024</option>
																</select>
															</div>
														</div>
														<button style="float: right;" class="btn btn-primary" type="button">Save
														</button>
														<br>
													</form>
												</div>
											</div>
										</div>

										<div class="card">
											<div class="card-header" id="headingsix">
												<h2 class="mb-0">
													<span>Summary</span>
													<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#summary" aria-expanded="false" aria-controls="summary"><i class="fa fa-plus-circle"></i></button>
												</h2>
											</div>
											<div id="summary" class="collapse" aria-labelledby="summary" data-parent="#accordionExample">
												<div class="card-body">
													<form>
														<div class="form-group">
															<label for="exampleFormControlTextarea1">Write a short
																paragraph (3-5 sentences) about yourself</label>
															<textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Insert text here"></textarea>
														</div>
														<button style="float: right;" class="btn btn-primary" type="button">Save
														</button>
														<br>
													</form>
												</div>
											</div>
										</div>
										<!-- <div class="card">
											<div class="card-header" id="headingsix">
												<h2 class="mb-0">
													<span>Affiliations</span>
													<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#affiliatios" aria-expanded="false" aria-controls="affiliatios"><i class="fa fa-plus-circle"></i></button>
												</h2>
											</div>
											<div id="affiliatios" class="collapse" aria-labelledby="affiliatios" data-parent="#accordionExample">
												<div class="card-body">
													<form>
														<div class="mb-3">
															<input class="form-control" id="jobtitle" type="text" placeholder="Jobtitle">
														</div>
														<div class="mb-3">
															<input class="form-control" id="company" type="text" placeholder="Company">
														</div>
														<div class="form-group row">
															<div class="col-md-2">
																<select class="form-control selectpicker" id="select-month" data-live-search="true">
																	<option selected>Month</option>
																	<option data-tokens="Januari">Januari</option>
																	<option data-tokens="Februari">Februari</option>
																	<option data-tokens="Maret">Maret</option>
																	<option data-tokens="April">April</option>
																	<option data-tokens="Mei">Mei</option>
																</select>
															</div>
															<div class="col-md-2">
																<select class="form-control selectpicker" id="select-year" data-live-search="true">
																	<option selected>Year</option>
																	<option data-tokens="2022">2022</option>
																	<option data-tokens="2023">2023</option>
																	<option data-tokens="2024">2024</option>
																</select>
															</div>
															<label>To*</label>
															<div class="col-md-2">
																<select class="form-control selectpicker" id="select-month" data-live-search="true">
																	<option selected>Month</option>
																	<option data-tokens="Januari">Januari</option>
																	<option data-tokens="Februari">Februari</option>
																	<option data-tokens="Maret">Maret</option>
																	<option data-tokens="April">April</option>
																	<option data-tokens="Mei">Mei</option>
																</select>
															</div>
															<div class="col-md-2">
																<select class="form-control selectpicker" id="select-year" data-live-search="true">
																	<option selected>Year</option>
																	<option data-tokens="2022">2022</option>
																	<option data-tokens="2023">2023</option>
																	<option data-tokens="2024">2024</option>
																</select>
															</div>
														</div>
														<div class="form-group">
															<label for="exampleFormControlTextarea1">Accomplishments or
																descriptions (optional)</label>
															<textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Insert text here"></textarea>
														</div>
														<button style="float: right;" class="btn btn-primary" type="button">Save
														</button>
														<br>
													</form>
												</div>
											</div>
										</div> -->
										<div class="card">
											<div class="card-header" id="headingsix">
												<h2 class="mb-0">
													<span>Awards and Achievement</span>
													<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#awards" aria-expanded="false" aria-controls="awards"><i class="fa fa-plus-circle"></i></button>
												</h2>
											</div>
											<div id="awards" class="collapse" aria-labelledby="awards" data-parent="#accordionExample">
												<div class="card-body">
													<form>
														<div class="mb-3">
															<input class="form-control" id="jobtitle" type="text" placeholder="Title">
														</div>
														<div class="mb-3">
															<input class="form-control" id="company" type="text" placeholder="Who Issued the award">
														</div>
														<div class="form-group row">
															<div class="col-md-2">
																<select class="form-control selectpicker" id="select-month" data-live-search="true">
																	<option selected>Month</option>
																	<option data-tokens="Januari">Januari</option>
																	<option data-tokens="Februari">Februari</option>
																	<option data-tokens="Maret">Maret</option>
																	<option data-tokens="April">April</option>
																	<option data-tokens="Mei">Mei</option>
																</select>
															</div>
															<div class="col-md-2">
																<select class="form-control selectpicker" id="select-year" data-live-search="true">
																	<option selected>Year</option>
																	<option data-tokens="2022">2022</option>
																	<option data-tokens="2023">2023</option>
																	<option data-tokens="2024">2024</option>
																</select>
															</div>
														</div>
														<!-- Form Row-->
														<div class="form-group">
															<label for="exampleFormControlTextarea1">Accomplishments or
																descriptions (optional)</label>
															<textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Insert text here"></textarea>
														</div>
														<button style="float: right;" class="btn btn-primary" type="button">Save
														</button>
														<br>
													</form>
												</div>
											</div>
										</div>
										<!-- <div class="card">
											<div class="card-header" id="headingsix">
												<h2 class="mb-0">
													<span>Volunteerism and Non-Profit Work</span>
													<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#Volunteerism" aria-expanded="false" aria-controls="Volunteerism"><i class="fa fa-plus-circle"></i></button>
												</h2>
											</div>
											<div id="Volunteerism" class="collapse" aria-labelledby="Volunteerism" data-parent="#accordionExample">
												<div class="card-body">
													<form>
														<div class="mb-3">
															<input class="form-control" id="jobtitle" type="text" placeholder="Name of Organization">
														</div>
														<div class="mb-3">
															<input class="form-control" id="company" type="text" placeholder="Select a cause">
														</div>
														<div class="mb-3">
															<input class="form-control" id="company" type="text" placeholder="Role of the organization">
														</div>
														<div class="form-group">
															<label for="exampleFormControlTextarea1">Accomplishments or
																descriptions (optional)</label>
															<textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Insert text here"></textarea>
														</div>
														<div class="mb-3">
															<input class="form-control" id="company" type="text" placeholder="Link/ e.g.www.erecruitmentJNE.com">
														</div>
														<div class="form-group row">
															<div class="col-md-2">
																<select class="form-control selectpicker" id="select-month" data-live-search="true">
																	<option selected>Month</option>
																	<option data-tokens="Januari">Januari</option>
																	<option data-tokens="Februari">Februari</option>
																	<option data-tokens="Maret">Maret</option>
																	<option data-tokens="April">April</option>
																	<option data-tokens="Mei">Mei</option>
																</select>
															</div>
															<div class="col-md-2">
																<select class="form-control selectpicker" id="select-year" data-live-search="true">
																	<option selected>Year</option>
																	<option data-tokens="2022">2022</option>
																	<option data-tokens="2023">2023</option>
																	<option data-tokens="2024">2024</option>
																</select>
															</div>
															<label>To*</label>
															<div class="col-md-2">
																<select class="form-control selectpicker" id="select-month" data-live-search="true">
																	<option selected>Month</option>
																	<option data-tokens="Januari">Januari</option>
																	<option data-tokens="Februari">Februari</option>
																	<option data-tokens="Maret">Maret</option>
																	<option data-tokens="April">April</option>
																	<option data-tokens="Mei">Mei</option>
																</select>
															</div>
															<div class="col-md-2">
																<select class="form-control selectpicker" id="select-year" data-live-search="true">
																	<option selected>Year</option>
																	<option data-tokens="2022">2022</option>
																	<option data-tokens="2023">2023</option>
																	<option data-tokens="2024">2024</option>
																</select>
															</div>
														</div>
														<button style="float: right;" class="btn btn-primary" type="button">Save
														</button>
														<br>
													</form>
												</div>
											</div>
										</div> -->
										<div class="card">
											<div class="card-header" id="headingsix">
												<h2 class="mb-0">
													<span>References</span>
													<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#references" aria-expanded="false" aria-controls="references"><i class="fa fa-plus-circle"></i></button>
												</h2>
											</div>
											<div id="references" class="collapse" aria-labelledby="references" data-parent="#accordionExample">
												<div class="card-body">
													<form>
														<div class="mb-3">
															<input class="form-control" id="jobtitle" type="text" placeholder="Full Name">
														</div>
														<div class="mb-3">
															<input class="form-control" id="company" type="text" placeholder="Occupation">
														</div>
														<div class="mb-3">
															<input class="form-control" id="company" type="text" placeholder="Company">
														</div>
														<div class="mb-3">
															<input class="form-control" id="company" type="text" placeholder="Phone">
														</div>
														<div class="mb-3">
															<input class="form-control" id="email" type="email" placeholder="Email">
														</div>
														<button style="float: right;" class="btn btn-primary" type="button">Save
														</button>
														<br>
													</form>
												</div>
											</div>
										</div>
										<!-- <div class="card">
											<div class="card-header" id="headingsix">
												<h2 class="mb-0">
													<span>Co-curricular Acitvities</span>
													<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#curricular" aria-expanded="false" aria-controls="curricular"><i class="fa fa-plus-circle"></i></button>
												</h2>
											</div>
											<div id="curricular" class="collapse" aria-labelledby="curricular" data-parent="#accordionExample">
												<div class="card-body">
													<form>
														<div class="mb-3">
															<input class="form-control" id="jobtitle" type="text" placeholder="Jobtitle">
														</div>
														<div class="mb-3">
															<input class="form-control" id="company" type="text" placeholder="Company">
														</div>
														<div class="form-group row">
															<div class="col-md-2">
																<select class="form-control selectpicker" id="select-month" data-live-search="true">
																	<option selected>Month</option>
																	<option data-tokens="Januari">Januari</option>
																	<option data-tokens="Februari">Februari</option>
																	<option data-tokens="Maret">Maret</option>
																	<option data-tokens="April">April</option>
																	<option data-tokens="Mei">Mei</option>
																</select>
															</div>
															<div class="col-md-2">
																<select class="form-control selectpicker" id="select-year" data-live-search="true">
																	<option selected>Year</option>
																	<option data-tokens="2022">2022</option>
																	<option data-tokens="2023">2023</option>
																	<option data-tokens="2024">2024</option>
																</select>
															</div>
															<label>To*</label>
															<div class="col-md-2">
																<select class="form-control selectpicker" id="select-month" data-live-search="true">
																	<option selected>Month</option>
																	<option data-tokens="Januari">Januari</option>
																	<option data-tokens="Februari">Februari</option>
																	<option data-tokens="Maret">Maret</option>
																	<option data-tokens="April">April</option>
																	<option data-tokens="Mei">Mei</option>
																</select>
															</div>
															<div class="col-md-2">
																<select class="form-control selectpicker" id="select-year" data-live-search="true">
																	<option selected>Year</option>
																	<option data-tokens="2022">2022</option>
																	<option data-tokens="2023">2023</option>
																	<option data-tokens="2024">2024</option>
																</select>
															</div>
														</div>
													
														<div class="form-group">
															<label for="exampleFormControlTextarea1">Accomplishments or
																descriptions (optional)</label>
															<textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Insert text here"></textarea>
														</div>
														<button style="float: right;" class="btn btn-primary" type="button">Save
														</button>
														<br>
													</form>
												</div>
											</div>
										</div> -->
										<div class="card">
											<div class="card-header" id="headingsix">
												<h2 class="mb-0">
													<span>Project</span>
													<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#Project" aria-expanded="false" aria-controls="Project"><i class="fa fa-plus-circle"></i></button>
												</h2>
											</div>
											<div id="Project" class="collapse" aria-labelledby="Project" data-parent="#accordionExample">
												<div class="card-body">
													<form>
														<div class="mb-3">
															<input class="form-control" id="jobtitle" type="text" placeholder="Project Name">
														</div>
														<div class="mb-3">
															<input class="form-control" id="company" type="text" placeholder="Role on the Project">
														</div>
														<div class="mb-3">
															<input class="form-control" id="company" type="text" placeholder="Link">
														</div>
														<div class="form-group row">
															<div class="col-md-2">
																<select class="form-control selectpicker" id="select-month" data-live-search="true">
																	<option selected>Month</option>
																	<option data-tokens="Januari">Januari</option>
																	<option data-tokens="Februari">Februari</option>
																	<option data-tokens="Maret">Maret</option>
																	<option data-tokens="April">April</option>
																	<option data-tokens="Mei">Mei</option>
																</select>
															</div>
															<div class="col-md-2">
																<select class="form-control selectpicker" id="select-year" data-live-search="true">
																	<option selected>Year</option>
																	<option data-tokens="2022">2022</option>
																	<option data-tokens="2023">2023</option>
																	<option data-tokens="2024">2024</option>
																</select>
															</div>
															<label>To</label>
															<div class="col-md-2">
																<select class="form-control selectpicker" id="select-month" data-live-search="true">
																	<option selected>Month</option>
																	<option data-tokens="Januari">Januari</option>
																	<option data-tokens="Februari">Februari</option>
																	<option data-tokens="Maret">Maret</option>
																	<option data-tokens="April">April</option>
																	<option data-tokens="Mei">Mei</option>
																</select>
															</div>
															<div class="col-md-2">
																<select class="form-control selectpicker" id="select-year" data-live-search="true">
																	<option selected>Year</option>
																	<option data-tokens="2022">2022</option>
																	<option data-tokens="2023">2023</option>
																	<option data-tokens="2024">2024</option>
																</select>
															</div>
														</div>
														<!-- Form Row-->
														<!-- <div class="form-group">
															<label for="exampleFormControlTextarea1">Accomplishments or
																descriptions (optional)</label>
															<textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Insert text here"></textarea>
														</div> -->
														<button style="float: right;" class="btn btn-primary" type="button">Save
														</button>
														<br>
													</form>
												</div>
											</div>
										</div>
										<div class="card">
											<div class="card-header" id="headingsix">
												<h2 class="mb-0">
													<span>Languages</span>
													<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#Languages" aria-expanded="false" aria-controls="Languages"><i class="fa fa-plus-circle"></i></button>
												</h2>
											</div>
											<div id="Languages" class="collapse" aria-labelledby="Languages" data-parent="#accordionExample">
												<div class="card-body">
													<form method="post" action="">
														<div class="form-group row">
															<div class="col-md-8">
																<select class="form-control select2" placeholder="location" name="CountryId" required>
																	<option>Select Language</option>
																	<?php
																	foreach ($Country as $Coun) {
																		echo '<option value="' . $Coun['CountryId'] . '"> ' . $Coun['CountryName'] . '</option>';
																	}
																	?>
																	<option value="kategori">
																		<?php echo $Coun['CountryName']  ?>
																	</option>
																</select>
															</div>
															<div class="col-md-4">
																<select class="form-control selectpicker" id="select-year" data-live-search="true">
																	<option selected>Level</option>
																	<option data-tokens="Accounting & Finance">
																		Basic</option>
																	<option data-tokens="Accounting & Finance">
																		Novice</option>
																	<option data-tokens="Accounting & Finance">
																		Intermediate</option>
																	<option data-tokens="Accounting & Finance">
																		Advanced</option>
																	<option data-tokens="Accounting & Finance">
																		Expert</option>
																</select>
															</div>
														</div>
														<button style="float: right;" class="btn btn-primary" type="button">Save
														</button>
														<br>
													</form>
												</div>
											</div>
										</div>
										<!-- <div class="card">
											<div class="card-header" id="headingseven">
												<h2 class="mb-0">
													<span>Resume</span>
													<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseseven" aria-expanded="false" aria-controls="collapseseven"><i class="fa fa-plus-circle"></i></button>
												</h2>
											</div>
											<div id="collapseseven" class="collapse" aria-labelledby="headingseven" data-parent="#accordionExample">
												<div class="card-body">
													<form>
														<p style="color:black;">Note: Your profile is the first thing
															recruiters see and not
															your uploaded resume, so make sure your Kalibrr profile is
															as complete and detailed as your uploaded resume.</p>
														<div class="form-group row">
															<div class="col-md-12">
																<input class="btn btn-primary" type="file" placeholder="Upload Your CV">
															</div>
														</div>
														<button style="float: right;" class="btn btn-primary" type="submit">Save
														</button>
														<br>
													</form>
												</div>
											</div>
										</div> -->

									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- The Modal -->
		<div class="modal" id="myModal">
			<div class="modal-dialog modal-dialog-scrollable">
				<div class="modal-content">

					<!-- Modal Header -->
					<div class="modal-header">
						<h4 class="modal-title">Add Section</h4>
						<button type="button" class="close" data-dismiss="modal">×</button>
					</div>

					<!-- Modal body -->
					<div class="modal-body">
						<div class="card" style="width: 480px; margin-top:-10px; margin-left:-15px">
							<div class="row no-gutters">
								<!-- <div class="col-sm-3">
                                    <img style="width: 50px; margin-top:100px; margin-left:15px" class="card-img"
                                        src="<?php echo base_url() ?>assets/assets/images/LogoRec.jpg">
                                </div> -->
								<div class="col-sm-7">
									<div class="card-body">
										<h5 class="card-title">Affiliations</h5>
										<p style=" width:350px" class="card-text">
											Whether or not you have work experience, building your resume with
											co-curricular acitvities outside of work will help employers understand the
											type of worker you might be.</p>
									</div>
								</div>
								<div class="col-sm-12">
									<a style="float: right; margin-top:-100px; margin-right:20px" class="btn btn-outline-danger"> Add </a>
								</div>
							</div>
						</div>
						<div class="card" style="width: 480px; margin-top:-30px; margin-left:-15px">
							<div class="row no-gutters">
								<!-- <div class="col-sm-3">
                                    <img style="width: 50px; margin-top:100px; margin-left:15px" class="card-img"
                                        src="<?php echo base_url() ?>assets/assets/images/LogoRec.jpg">
                                </div> -->
								<div class="col-sm-7">
									<div class="card-body">
										<h5 class="card-title">Affiliations</h5>
										<p style=" width:350px" class="card-text">
											Whether or not you have work experience, building your resume with
											co-curricular acitvities outside of work will help employers understand the
											type of worker you might be.</p>
									</div>
								</div>
								<div class="col-sm-12">
									<a style="float: right; margin-top:-100px; margin-right:20px" class="btn btn-outline-danger"> Add </a>
								</div>
							</div>
						</div>
						<div class="card" style="width: 480px; margin-top:-30px; margin-left:-15px">
							<div class="row no-gutters">
								<!-- <div class="col-sm-3">
                                    <img style="width: 50px; margin-top:100px; margin-left:15px" class="card-img"
                                        src="<?php echo base_url() ?>assets/assets/images/LogoRec.jpg">
                                </div> -->
								<div class="col-sm-7">
									<div class="card-body">
										<h5 class="card-title">Affiliations</h5>
										<p style=" width:350px" class="card-text">
											Whether or not you have work experience, building your resume with
											co-curricular acitvities outside of work will help employers understand the
											type of worker you might be.</p>
									</div>
								</div>
								<div class="col-sm-12">
									<a style="float: right; margin-top:-100px; margin-right:20px" class="btn btn-outline-danger"> Add </a>
								</div>
							</div>
						</div>
						<div class="card" style="width: 480px; margin-top:-30px; margin-left:-15px">
							<div class="row no-gutters">
								<!-- <div class="col-sm-3">
                                    <img style="width: 50px; margin-top:100px; margin-left:15px" class="card-img"
                                        src="<?php echo base_url() ?>assets/assets/images/LogoRec.jpg">
                                </div> -->
								<div class="col-sm-7">
									<div class="card-body">
										<h5 class="card-title">Affiliations</h5>
										<p style=" width:350px" class="card-text">
											Whether or not you have work experience, building your resume with
											co-curricular acitvities outside of work will help employers understand the
											type of worker you might be.</p>
									</div>
								</div>
								<div class="col-sm-12">
									<a style="float: right; margin-top:-100px; margin-right:20px" class="btn btn-outline-danger"> Add </a>
								</div>
							</div>
						</div>
						<div class="card" style="width: 480px; margin-top:-30px; margin-left:-15px">
							<div class="row no-gutters">
								<!-- <div class="col-sm-3">
                                    <img style="width: 50px; margin-top:100px; margin-left:15px" class="card-img"
                                        src="<?php echo base_url() ?>assets/assets/images/LogoRec.jpg">
                                </div> -->
								<div class="col-sm-7">
									<div class="card-body">
										<h5 class="card-title">Affiliations</h5>
										<p style=" width:350px" class="card-text">
											Whether or not you have work experience, building your resume with
											co-curricular acitvities outside of work will help employers understand the
											type of worker you might be.</p>
									</div>
								</div>
								<div class="col-sm-12">
									<a style="float: right; margin-top:-100px; margin-right:20px" class="btn btn-outline-danger"> Add </a>
								</div>
							</div>
						</div>
						<div class="card" style="width: 480px; margin-top:-30px; margin-left:-15px">
							<div class="row no-gutters">
								<!-- <div class="col-sm-3">
                                    <img style="width: 50px; margin-top:100px; margin-left:15px" class="card-img"
                                        src="<?php echo base_url() ?>assets/assets/images/LogoRec.jpg">
                                </div> -->
								<div class="col-sm-7">
									<div class="card-body">
										<h5 class="card-title">Affiliations</h5>
										<p style=" width:350px" class="card-text">
											Whether or not you have work experience, building your resume with
											co-curricular acitvities outside of work will help employers understand the
											type of worker you might be.</p>
									</div>
								</div>
								<div class="col-sm-12">
									<a style="float: right; margin-top:-100px; margin-right:20px" class="btn btn-outline-danger"> Add </a>
								</div>
							</div>
						</div>
						<div class="card" style="width: 480px; margin-top:-30px; margin-left:-15px">
							<div class="row no-gutters">
								<!-- <div class="col-sm-3">
                                    <img style="width: 50px; margin-top:100px; margin-left:15px" class="card-img"
                                        src="<?php echo base_url() ?>assets/assets/images/LogoRec.jpg">
                  </div> -->
								<div class="col-sm-7">
									<div class="card-body">
										<h5 class="card-title">Affiliations</h5>
										<p style=" width:350px" class="card-text">
											Whether or not you have work experience, building your resume with
											co-curricular acitvities outside of work will help employers understand the
											type of worker you might be.</p>
									</div>
								</div>
								<div class="col-sm-12">
									<a style="float: right; margin-top:-100px; margin-right:20px" class="btn btn-outline-danger"> Add </a>
								</div>
							</div>
						</div>
						<div class="card" style="width: 480px; margin-top:-30px; margin-left:-15px">
							<div class="row no-gutters">
								<!-- <div class="col-sm-3">
                                    <img style="width: 50px; margin-top:100px; margin-left:15px" class="card-img"
       
                                 src="<?php echo base_url() ?>assets/assets/images/LogoRec.jpg">
                                </div> -->
								<div class="col-sm-7">
									<div class="card-body">
										<h5 class="card-title">Affiliations</h5>
										<p style=" width:350px" class="card-text">
											Whether or not you have work experience, building your resume with
											co-curricular acitvities outside of work will help employers understand the
											type of worker you might be.</p>
									</div>
								</div>
								<div class="col-sm-12">




									<a style="float: right; margin-top:-100px; margin-right:20px" class="btn btn-outline-danger"> Add </a>
								</div>
							</div>
						</div>
						<div class="card" style="width: 480px; margin-top:-30px; margin-left:-15px">
							<div class="row no-gutters">
								<!-- <div class="col-sm-3">
                                    <img style="width: 50px; margin-top:100px; margin-left:15px" class="card-img"
                                        src="<?php echo base_url() ?>assets/assets/images/LogoRec.jpg">
                                </div> -->
								<div class="col-sm-7">
									<div class="card-body">
										<h5 class="card-title">Affiliations</h5>
										<p style=" width:350px" class="card-text">
											Whether or not you have work experience, building your resume with
											co-curricular acitvities outside of work will help employers understand the
											type of worker you might be.</p>
									</div>
								</div>
								<div class="col-sm-12">
									<a style="float: right; margin-top:-100px; margin-right:20px" class="btn btn-outline-danger"> Add </a>
								</div>
							</div>
						</div>
						<div class="card" style="width: 480px; margin-top:-30px; margin-left:-15px">
							<div class="row no-gutters">
								<!-- <div class="col-sm-3">
                                    <img style="width: 50px; margin-top:100px; margin-left:15px" class="card-img"
                                        src="<?php echo base_url() ?>assets/assets/images/LogoRec.jpg">
                                </div> -->
								<div class="col-sm-7">
									<div class="card-body">
										<h5 class="card-title">Affiliations</h5>
										<p style=" width:350px" class="card-text">
											Whether or not you have work experience, building your resume with
											co-curricular acitvities outside of work will help employers understand the
											type of worker you might be.</p>
									</div>
								</div>
								<div class="col-sm-12">
									<a style="float: right; margin-top:-100px; margin-right:20px" class="btn btn-outline-danger"> Add </a>
								</div>
							</div>
						</div>
						<div class="card" style="width: 480px; margin-top:-30px; margin-left:-15px">
							<div class="row no-gutters">
								<!-- <div class="col-sm-3">
                                    <img style="width: 50px; margin-top:100px; margin-left:15px" class="card-img"
                                        src="<?php echo base_url() ?>assets/assets/images/LogoRec.jpg">
                                </div> -->
								<div class="col-sm-7">
									<div class="card-body">
										<h5 class="card-title">Affiliations</h5>
										<p style=" width:350px" class="card-text">
											Whether or not you have work experience, building your resume with
											co-curricular acitvities outside of work will help employers understand the
											type of worker you might be.</p>
									</div>
								</div>
								<div class="col-sm-12">
									<a style="float: right; margin-top:-100px; margin-right:20px" class="btn btn-outline-danger"> Add </a>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
		<!-- Modal Section End -->

		<style>
			.img-account-profile {
				height: 10rem;
			}

			.rounded-circle {
				border-radius: 50% !important;
			}

			.card {
				box-shadow: 0 0.15rem 1.75rem 0 rgb(33 40 50 / 15%);
			}

			.card .card-header {
				font-weight: 500;
			}

			.card-header:first-child {
				border-radius: 0.35rem 0.35rem 0 0;
			}

			.card-header {
				padding: 1rem 1.35rem;
				margin-bottom: 0;
				background-color: rgba(33, 40, 50, 0.03);
				border-bottom: 1px solid rgba(33, 40, 50, 0.125);
			}

			.form-control,
			.dataTable-input {
				display: block;
				width: 100%;
				padding: 0.875rem 1.125rem;
				font-size: 0.875rem;
				font-weight: 400;
				line-height: 1;
				color: #69707a;
				background-color: #fff;
				background-clip: padding-box;
				border: 1px solid #c5ccd6;
				-webkit-appearance: none;
				-moz-appearance: none;
				appearance: none;
				border-radius: 0.35rem;
				transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
			}

			.nav-borders .nav-link.active {
				color: #0061f2;
				border-bottom-color: #0061f2;
			}

			.nav-borders .nav-link {
				color: #69707a;
				border-bottom-width: 0.125rem;
				border-bottom-style: solid;
				border-bottom-color: transparent;
				padding-top: 0.5rem;
				padding-bottom: 0.5rem;
				padding-left: 0;
				padding-right: 0;
				margin-left: 1rem;
				margin-right: 1rem;
			}

			.accordion .card {
				border: none;
				margin-bottom: 2px;
			}

			.accordion .card-header {
				background: #c23621;
				padding-top: 7px;
				padding-bottom: 7px;

			}

			.accordion .card-header h2 {
				color: #fff;

				font-size: 1rem;

				font-family: "Roboto", sans-serif;
				font-weight: 500;
			}

			.accordion .card-header h2 span {
				float: left;
				margin-top: 10px;
			}

			.accordion .card-header button {
				color: #fff;
				font-size: 1.3rem;
				line-height: 1.3rem;
				float: right;
			}

			.accordion .card-header button:hover {
				color: #23384e;
			}
		</style>
		<div class="footer">
			<div class="copyright">
				<p>Copyright &copy; <a href="#">HCIS TEAM</a>
					2023</p>
			</div>
		</div>
	</div>
	<script src="<?php echo base_url() ?>assets/template/plugins/common/common.min.js"></script>
	<script src="<?php echo base_url() ?>assets/template/js/custom.min.js"></script>
	<script src="<?php echo base_url() ?>assets/template/js/settings.js"></script>
	<script src="<?php echo base_url() ?>assets/template/js/gleek.js"></script>
	<script src="<?php echo base_url() ?>assets/template/js/styleSwitcher.js"></script>
	<script src="<?php echo base_url() ?>assets/template/plugins/jquery-steps/build/jquery.steps.min.js"></script>
	<script src="<?php echo base_url() ?>assets/template/plugins/jquery-validation/jquery.validate.min.js"></script>
	<script src="<?php echo base_url() ?>assets/template/js/plugins-init/jquery-steps-init.js"></script>

	<script>
		$(function() {
			$('.selectpicker').selectpicker();
		});
	</script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="assets/vendor/phone/PLUGINS/js/intlTelInput.js"></script>
	<script>
		$("#phone").intlTelInput({
			utilsScript: "PLUGINS/js/utils.js"
		});
	</script>
</body>

</html>

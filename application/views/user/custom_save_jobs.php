<!DOCTYPE html>
<html>
<head>
    <title>Saved Jobs</title>
    <link href="<?php echo base_url() ?>assets/template_home/theme/plugins/bootstrap/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo base_url() ?>assets/template_home/theme/plugins/bootstrap/bootstrap-slider.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/template_home/theme/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/template_home/theme/plugins/slick/slick.css" rel="stylesheet">
	<link href="<?php echo base_url() ?>assets/template_home/theme/plugins/slick/slick-theme.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/template_home/theme/css/style.css" rel="stylesheet">
	<link href="<?php echo base_url() ?>assets/template_home/theme/css/user-custom.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/template_home/theme/css/user-styles.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/sweetalert2@9.17.2/dist/sweetalert2.min.css">
    <style>
    /* Gaya umum untuk memastikan tampilan yang tepat */
    html, body {
      height: 100%;
      margin: 0;
      padding: 0;
    }

    /* Gaya div utama */
    .container-fluid-main {
      height: 90%;
      display: flex;
      flex-direction: column;
    }

    /* Gaya div bagian atas secara horizontal */
    .top-container {
      flex: 0 0 150px; /* Tinggi div bagian atas */
      display: flex;
      flex-direction: row;
      background-color: lightgreen;
    }

    /* Gaya div bagian atas */
    .top-div {
      flex: 1;
      background-color: lightgray;
    }

    /* Gaya div bagian bawah */
    .bottom-container {
      flex: 1;
      display: flex;
      flex-direction: row;
      z-index: 0;
    }

    /* Gaya div kiri (30%) di bagian bawah */
    .bottom-left {
      flex: 0 0 30%;
      overflow-y: auto;
      background-color: white;
    }

    /* Gaya div kanan (70%) di bagian bawah */
    .bottom-right {
      flex: 0 0 70%;
      overflow-y: auto;
      overflow-x: auto;
      background-color: white;
    }

    .profile-picture {
        width: 25px;
        height: 25px;
        align-items: center;
        border-radius: 50%;
        margin-right: 5px;
        margin-top: 5px;
    }

    .nav-item {
        margin-right: 10px;
    }

    .dropdown-item span {
        padding-left: 10px;
    }
    
    .sidebar-item {
        border: none;
        padding-top: 15px;
        padding-left: 30px;
    }

    .sidebar-item span {
        padding-left: 10px;
    }

    .search-bar {
        max-width: 95%;
        margin: 10px;
    }
    
    #sidebar-wrapper .sidebar-heading {
        padding: 0.675rem 1.15rem;
        display: flex;
        justify-content: center; /* Center horizontally */
        align-items: center
    }

    .media-body a {
        text-decoration: none;
        color: #000;
    }

    .list-group-item a {
        text-decoration: none;
        color: #000;
    }

    .dropdown-menu {
        /* Add your styles for the dropdown menu here */
        position: absolute; /* Position the dropdown absolutely */
        top: 100%; /* Place the dropdown below the .top-container */
        left: 0; /* Align the dropdown with the left edge of the .top-container */
        max-height: 300px; /* Set the maximum height for the dropdown */
        overflow-y: auto; /* Enable vertical scrolling if needed */
        background-color: white; /* Sample background color */
        border: 1px solid #ccc; /* Sample border style */
        z-index: 1; /* Set a higher z-index to make it appear on top of other elements */
    }

    .filter-dropdown{
        position: relative; /* Make sure the parent container has position: relative */
        overflow: visible !important; /* Set the overflow property to visible */
    }

    .indicator-badge {
        position: absolute;
        top: 0;
        right: 0;
        background-color: red;
        color: white;
        border-radius: 50%;
        padding: 2px 4px;
        font-size: 8px;
    }

    .bold-text {
        font-weight: 800;
    }

    </style>
</head>
<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar-->
        <div class="border-end bg-white" id="sidebar-wrapper">
            <div class="sidebar-heading border-bottom bg-light">
				<img src="<?php echo base_url() ?>assets/assets/images/logoJNE.png" alt="" style="width: 80px;" />
            </div>
            <div class="list-group list-group-flush">
                <a class="list-group-item list-group-item-action list-group-item-light sidebar-item" href="<?php echo base_url() ?>user/job-board"><i class="fa fa-search"></i> <span>Job Board</span></a>
                <a class="list-group-item list-group-item-action list-group-item-light sidebar-item" href="<?php echo base_url() ?>user/profile"><i class="fa fa-user"></i><span>Profile</span></a>
                <a class="list-group-item list-group-item-action list-group-item-light sidebar-item" href="<?php echo base_url() ?>user/application-jobs"><i class="fa fa-folder"></i><span>Applications</span></a>
                <a class="list-group-item list-group-item-action list-group-item-light sidebar-item" href="<?php echo base_url() ?>user/message"><i class="fa fa-comments-o"></i><span>Messages</span></a>
                <a class="list-group-item list-group-item-action list-group-item-light sidebar-item" href="<?php echo base_url() ?>user/save-jobs"><i class="fa fa-heart"></i><span>Saved Jobs</span></a>
            </div>
        </div>
        <!-- Page content wrapper-->
        <div id="page-content-wrapper">
            <!-- Top navigation-->
            <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                <div class="container-fluid">
                    <button id="sidebarToggle" style="border: none; outline: none; background-color:#fff;">&#9776;</button>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                            <li class="nav-item dropdown">
                                <a class="nav-link" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-envelope-o"></i><span class="indicator-badge"><?= $ListMessageTotal->Total ?></span></a>
                                <?php
                                    if(count($ListMessage) >= 5){
                                        $heightStyle = 'height: 200px; overflow-y: scroll;';
                                    }else{
                                        $heightStyle = '';
                                    }
                                ?>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown" style="width: 350px; <?= $heightStyle ?>">
                                    <?php
                                    if(!empty($ListMessage)){
                                        foreach($ListMessage as $index => $value){
                                    ?>
                                    <a class="dropdown-item" href="<?= base_url() ?>user/message/1?detailJobId=<?= $value->JobVacancyId ?>">
                                        <div class="media">
                                            <div class="pmd-avatar-list-img" href="javascript:void(0);">
                                                <?php
                                                if(empty($value->Icon)){
                                                ?>
                                                <img src="<?php echo base_url() ?>assets/assets/images/logoJNE.png" height="20px">
                                                <?php
                                                }else{
                                                ?>
                                                <img src="<?php echo base_url() ?>assets/assets/images/<?= $value->Icon ?>" height="20px">
                                                <?php
                                                }
                                                ?>
                                            </div>
                                            <div class="media-body">
                                                <h3 class="card-title-list <?= $value->IsRead == 0 ? 'bold-text' : '' ?>"><?= $value->DisplayCompany ?></h3>
                                                <!-- Nama Perusahaan -->
                                                <p class="card-detail <?= $value->IsRead == 0 ? 'bold-text' : '' ?>"><?= $value->LastMessage ?></p>
                                                <p class="card-subtitle <?= $value->IsRead == 0 ? 'bold-text' : '' ?>" style="float: right;"><?= $value->LastDate ?></p>
                                            </div>
                                        </div>
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <?php
                                        }
                                    }else{
                                    ?>
                                    <a class="dropdown-item text-center" href="javascript:void(0)">No New Message</a>
                                    <div class="dropdown-divider"></div>
                                    <?php
                                    }
                                    ?>
                                    <a class="dropdown-item text-center" href="<?= base_url() ?>user/message">View all messages</a>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-bell-o"></i><span class="indicator-badge"><?= $ListNotificationTotal->Total ?></span></a>
                                <?php
                                    if(count($ListNotification) >= 5){
                                        $heightStyle = 'height: 200px; overflow-y: scroll;';
                                    }else{
                                        $heightStyle = '';
                                    }
                                ?>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown" style="width: 350px; <?= $heightStyle ?>">
                                <?php
                                    if(!empty($ListNotification)){
                                        foreach($ListNotification as $index => $value){
                                    ?>
                                    <a class="dropdown-item" href="<?= base_url() ?>user/notification?notifId=<?= $value->CanNotificationId ?>">
                                        <div class="media">
                                            <div class="media-body">
                                                <h3 class="card-title-list <?= $value->IsRead == 0 ? 'bold-text' : '' ?>"><?= $value->NotifDescryption ?></h3>
                                                <!-- Nama Perusahaan -->
                                                <p class="card-subtitle <?= $value->IsRead == 0 ? 'bold-text' : '' ?>" style="float: right;"><?= $value->LastDate ?></p>
                                            </div>
                                        </div>
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <?php
                                        }
                                    }else{
                                    ?>
                                    <a class="dropdown-item text-center" href="javascript:void(0)">No New Notification</a>
                                    <div class="dropdown-divider"></div>
                                    <?php
                                    }
                                    ?>
                                    <a class="dropdown-item text-center" href="<?= base_url() ?>user/notification">View all notifications</a>
                                </div>
                            </li>
                            <?php
                                if(empty($CanProfile['PhotoProfile'])){
                            ?>
                            <img src="<?php echo base_url() ?>assets/template/images/avatar/no-photo.PNG" alt="Profile Picture" class="nav-item profile-picture">
                            <?php
                                } else {
                            ?>
                            <img src="<?php echo base_url() ?>assets/template/images/avatar/<?= $CanProfile['PhotoProfile'] ?>" alt="Profile Picture" class="nav-item profile-picture">
                            <?php
                                }
                            ?>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?= $CanProfile['FirstName'] ?></a>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="<?php echo base_url() ?>user/profile"><i class="fa fa-user"></i><span>Profile</span></a>
                                    <a class="dropdown-item" href="<?php echo base_url() ?>account-setting"><i class="fa fa-cog"></i><span>Account Settings</span></a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="<?php echo base_url() ?>logout"><i class="fa fa-sign-out"></i><span>Logout</span></a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- Page content-->
            <div class="container-fluid-main">
                <h4 style="margin: 5px;">Saved Jobs</h4>
                <?php if(count($CanSaveJob) > 0) { ?>
                <div class="bottom-container">
                    <div class="bottom-left">
                        <?php foreach ($CanSaveJob as $Job) : ?>
                            <div class="card pmd-card" style="margin: 5px;">
                                <div class="card-body-list">
                                    <div class="media">
                                        <a class="pmd-avatar-list-img" href="javascript:void(0);">
                                            <img src="<?php echo base_url() ?>assets/assets/images/logoJNE.png" height="20px" style="margin-bottom: 45px;">
                                        </a>
                                        <div class="media-body">
                                            <h3 class="card-title-list"><a href="<?= current_url() ?>?detailJobId=<?= $Job->JobVacancyId ?>"><?php echo $Job->Position; ?></a></h3>
                                            <!-- Nama Perusahaan -->
                                            <p class="card-detail"><a href="#"><?php echo $Job->CompanyName; ?></a></p>
                                            <p class="card-detail"><a href="#"><?php echo $Job->LocationDisplay; ?></a></p>
                                            <p class="card-subtitle"><?php echo $Job->PostedDesc ?></p>
                                            <p class="card-subtitle"><?php echo $Job->RecruiterActive ?></p>
                                            <a style="float: right; border: none; outline: none;" href="<?php echo base_url() ?>save-jobs?jobId=<?=$Job->JobVacancyId?>" class="btn" name="btn-save-jobs" data-id="<?= $Job->JobVacancyId ?>">
                                                <?php
                                                $jobVacancyIds = array_column($CanSaveJob, 'JobVacancyId');
                                                if (in_array($Job->JobVacancyId, $jobVacancyIds)) {
                                                ?>
                                                <i class="fa fa-heart"></i>
                                                <?php }else{ ?>
                                                <i class="fa fa-heart-o"></i>
                                                <?php } ?>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach ?>
                        <div class="pagination">
                            <?php echo $pagination_links; ?>
                        </div>
                    </div>

                    <div class="bottom-right">
                        <?php 
                            if(isset($JobDetail->Position)){
                        ?>
                        <div class="card" style="max-width: 100%; margin: 5px;">
                            <img src="<?= base_url(); ?>assets/assets/images/banner-default.JPG" class="card-img-top" alt="...">
                            <p style="padding-top: 20px; margin-left: 250px; margin-right: 30px; color:dimgrey; text-align: right; font-size: 10px;"><?php  ?>
                                <?php 
                                    if($JobDetail->PostedDesc != null){
                                        echo 'Lowongan dipasang ' . $JobDetail->PostedDesc;
                                    }

                                    if($JobDetail->ApplyBefore != null){
                                        echo ' dan ' . $JobDetail->ApplyBefore;
                                    }
                                ?> 
                            </p>
                            <p style="margin-left: 100px; text-align: right; margin-right: 30px; color:dimgrey; font-size: 10px;"><?php echo $JobDetail->RecruiterActive ?></p>
                            <div class="card" style="width: 12rem; margin-top:-120px; margin-left:30px;">
                                <img src="<?php echo base_url() ?>assets/assets/images/logoJNE.png" class="card-img-center" alt="..." style="padding: 20px; padding: 20px;">
                            </div>

                            <div class="card-body">
                                <h2 class="card-title" style="font-size: 15px; font-weight: 900;"><strong><?php echo $JobDetail->Position ?></strong>
                                </h2>
                                <p class="card-text"><a style="font-size: 10px; color: blue;" href="#"><?php echo $JobDetail->CompanyName ?></a></p>
                                <p style="font-size: 10px; color: black;" class="card-text">
                                    <?php
                                        if($JobDetail->LocationDisplay != null){
                                            echo $JobDetail->LocationDisplay;
                                        }

                                        if($JobDetail->RangeStartSalary != null && $JobDetail->RangeEndSalary == null){
                                            echo ' • Start From ' . $JobDetail->RangeStartSalary . ' IDR / month';
                                        }else if($JobDetail->RangeStartSalary != null && $JobDetail->RangeEndSalary != null){
                                            echo ' • ' . $JobDetail->RangeStartSalary . ' - ' . $JobDetail->RangeEndSalary . ' IDR / month';
                                        } 

                                        if($JobDetail->EmpTypeName != null){
                                            echo ' • ' . $JobDetail->EmpTypeName;
                                        }
                                    ?>
                                </p>
                            </div>
                            <div class="row">
                                <?php
                                if($JobDetail->applyJob){
                                ?>
                                <a style="margin-left: 20px; max-width: 25%;" href="javascript:void(0)" class="btn btn-outline-primary" id="btn-apply-jobs" data-id="<?= $JobDetail->JobVacancyId ?>">Already Applied</a>
                                <?php
                                }else{
                                ?>
                                <a style="margin-left: 20px; max-width: 25%;" href="<?php echo base_url() ?>apply-jobs?jobId=<?=$JobDetail->JobVacancyId?>" class="btn btn-danger" id="btn-apply-jobs" data-id="<?= $JobDetail->JobVacancyId ?>">Apply</a>
                                <?php
                                }
                                ?>
                                <a style="margin-left: 180px; max-width: 20%;" href="<?php echo base_url() ?>save-jobs?jobId=<?=$JobDetail->JobVacancyId?>" class="btn btn-danger" id="btn-save-jobs" data-id="<?= $JobDetail->JobVacancyId ?>"><i class="fa fa-heart">
                                        Save</i></a>
                                <a style="margin-left: 10px; max-width: 20%;" href="javascript:void(0)" class="btn btn-outline-danger" data-job="<?=$JobDetail->JobVacancyId?>" id="btn-share-jobs"><i class="fa fa-share-alt">
                                        Share</i></a>
                            </div>
                            <br>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <h4><strong>Job Description</strong></h4>
                                </li>
                                <li class="list-group-item">
                                    <h6><?php echo $JobDetail->JobDescription ?></h6>
                                </li>
                                <li class="list-group-item">
                                    <h4><strong> Minimum Qualification </strong></h4>
                                </li>
                                <li class="list-group-item">
                                    <h6><?php echo $JobDetail->Qualification ?></h6>
                                </li>
                                <li class="list-group-item">
                                    <h4><strong> Job Summary </strong></h4>
                                </li>
                                <li class="list-group-item">
                                    <p><strong>JOB LEVEL</strong></p>
                                    <p><a href="#"><?php echo $JobDetail->JobLevelName ?></a></p>
                                </li>
                                <li class="list-group-item">
                                    <p><strong>JOB CATEGORY</strong></p>
                                    <p><a href="#"><?php echo $JobDetail->JobFunctionName ?></a></p>
                                </li>
                                <li class="list-group-item">
                                    <p><strong>EDUCATION REQUIREMENT</strong></p>
                                    <p><a href="#"><?php echo $JobDetail->EducationLevelName ?></a></p>
                                </li>
                                <li class="list-group-item">
                                    <p><strong>WEBSITE</strong></p>
                                    <p><a href="#"><?= (isset($JobDetail->Website)) ? $JobDetail->Website : '-' ?></a></p>
                                </li>
                            </ul>
                        </div>
                        <?php 
                            }
                        ?>
                    </div>
                </div>
                <?php } else { ?>
                    <div class="card pmd-card text-center m-2 p-2">
                        <p class="text center">Tidak Ada Data</p>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal_share" tabindex="-1" role="dialog" aria-labelledby="title-modal-share" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h6 class="modal-title" id="title-modal-share"><strong>Share</strong></h6>
					<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="" method="post">
						<div class="form-row">
							<div class="form-group col-lg-9 col-md-7">
								<input type="text" class="form-control my-2 my-lg-1 w-100" id="shareInput" name="shareInput" placeholder="" readonly value="" style="height: 50px;"/>
							</div>
							<div class="form-group col-lg-3 col-md-6 align-self-center">
								<a type="button" class="btn btn-primary w-100" href="javascript:void(0)" id="copyButton" style="height: 50px; margin: 0; padding: 10px;">COPY</a>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

    <!-- Bootstrap core JS-->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="<?php echo base_url() ?>assets/template_home/theme/plugins/jquery/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url() ?>assets/template_home/theme/plugins/bootstrap/popper.min.js"></script>
	<script src="<?php echo base_url() ?>assets/template_home/theme/plugins/bootstrap/bootstrap.min.js"></script>
	<script src="<?php echo base_url() ?>assets/template_home/theme/plugins/bootstrap/bootstrap-slider.js"></script>
	<script src="<?php echo base_url() ?>assets/template_home/theme/plugins/tether/js/tether.min.js"></script>
	<script src="<?php echo base_url() ?>assets/template_home/theme/plugins/raty/jquery.raty-fa.js"></script>
	<script src="<?php echo base_url() ?>assets/template_home/theme/plugins/slick/slick.min.js"></script>
	<script src="<?php echo base_url() ?>assets/template_home/theme/plugins/jquery-nice-select/js/jquery.nice-select.min.js"></script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcABaamniA6OL5YvYSpB3pFMNrXwXnLwU" defer></script>
	<script src="<?php echo base_url() ?>assets/template_home/theme/plugins/google-map/map.js" defer></script>
	<script src="<?php echo base_url() ?>assets/template_home/theme/js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.17.2/dist/sweetalert2.min.js"></script>
    <!-- Core theme JS-->
    <script src="<?php echo base_url() ?>assets/template_home/theme/js/user-scripts.js"></script>
    <script>
        <?php if ($this->session->flashdata('success')): ?>
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: '<?php echo $this->session->flashdata('success'); ?>'
            });
        <?php endif; ?>

        <?php if ($this->session->flashdata('error')): ?>
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: '<?php echo $this->session->flashdata('error'); ?>'
            });
        <?php endif; ?>

		$(document).ready(function () {
            $('#btn-share-jobs').on('click', function () {
				var jobId = $(this).data('job');
				$('#modal_share').modal('show');
                const currentPath = window.location.pathname.split('/')[1];
				$('#shareInput').val(window.location.origin + "/" + currentPath + "/jobs?jobId=" + jobId);
			});

            $("#copyButton").on('click', function () {
				$("#shareInput").select();
				document.execCommand("copy");
				$("#shareInput")[0].setSelectionRange(0, 0);

				Swal.fire({
					icon: 'success',
					title: 'Success',
					text: 'Text has been copied to the clipboard'
				});
			});

			function getSelectedProvincesFromURL() {
				const urlParams = new URLSearchParams(window.location.search);
				const selectedProvinces = urlParams.get('province[]');
				if (selectedProvinces) {
					return selectedProvinces.split(',');
				}
				return [];
			}

			function checkProvincesCheckboxesFromURL(selectedProvinces) {
				document.querySelectorAll('input[name="province"]').forEach(function(checkbox) {
					checkbox.checked = selectedProvinces.includes(checkbox.value);
				});
			}

			function getSelectedCitiesFromURL() {
				const urlParams = new URLSearchParams(window.location.search);
				const selectedCities = urlParams.get('cities[]');
				if (selectedCities) {
					return selectedCities.split(',');
				}
				return [];
			}

			function checkCitiesCheckboxesFromURL(selectedCities) {
				document.querySelectorAll('input[name="city"]').forEach(function(checkbox) {
					checkbox.checked = selectedCities.includes(checkbox.value);
				});
			}

			function getSelectedJobLevelFromURL() {
				const urlParams = new URLSearchParams(window.location.search);
				const selectedJobLevel = urlParams.get('job_level[]');
				if (selectedJobLevel) {
					return selectedJobLevel.split(',');
				}
				return [];
			}

			function checkJobLevelCheckboxesFromURL(selectedJobLevel) {
				document.querySelectorAll('input[name="job_level"]').forEach(function(checkbox) {
					checkbox.checked = selectedJobLevel.includes(checkbox.value);
				});
			}

			function getSelectedEmploymentTypeFromURL() {
				const urlParams = new URLSearchParams(window.location.search);
				const selectedEmploymentType = urlParams.get('employment_type[]');
				if (selectedEmploymentType) {
					return selectedEmploymentType.split(',');
				}
				return [];
			}

			function checkEmploymentTypeCheckboxesFromURL(selectedEmploymentType) {
				document.querySelectorAll('input[name="employment_type"]').forEach(function(checkbox) {
					checkbox.checked = selectedEmploymentType.includes(checkbox.value);
				});
			}

			function getSelectedJobFunctionFromURL() {
				const urlParams = new URLSearchParams(window.location.search);
				const selectedJobFunction = urlParams.get('job_function[]');
				if (selectedJobFunction) {
					return selectedJobFunction.split(',');
				}
				return [];
			}

			function checkJobFunctionCheckboxesFromURL(selectedJobFunction) {
				document.querySelectorAll('input[name="job_function"]').forEach(function(checkbox) {
					checkbox.checked = selectedJobFunction.includes(checkbox.value);
				});
			}

			function getSelectedEducationFromURL() {
				const urlParams = new URLSearchParams(window.location.search);
				const selectedEducation = urlParams.get('education[]');
				if (selectedEducation) {
					return selectedEducation.split(',');
				}
				return [];
			}

			function checkEducationCheckboxesFromURL(selectedEducation) {
				document.querySelectorAll('input[name="education"]').forEach(function(checkbox) {
					checkbox.checked = selectedEducation.includes(checkbox.value);
				});
			}

			const selectedProvinces = getSelectedProvincesFromURL();
    		checkProvincesCheckboxesFromURL(selectedProvinces);

			const selectedCities = getSelectedCitiesFromURL();
    		checkCitiesCheckboxesFromURL(selectedCities);

			const selectedJobLevel = getSelectedJobLevelFromURL();
    		checkJobLevelCheckboxesFromURL(selectedJobLevel);

			const selectedEmploymentType = getSelectedEmploymentTypeFromURL();
    		checkEmploymentTypeCheckboxesFromURL(selectedEmploymentType);

			const selectedJobFunction = getSelectedJobFunctionFromURL();
    		checkJobFunctionCheckboxesFromURL(selectedJobFunction);

			const selectedEducation = getSelectedEducationFromURL();
    		checkEducationCheckboxesFromURL(selectedEducation);

			addFilter();

			$('#btn-save-jobs').on('click', function () {
				$('#savejob').modal('show');
				$('#btn-save-sign-in').attr('href','<?= base_url() ?>sign-in?jobId=' + $(this).data('id'));
				$('#btn-save-sign-up').attr('href','<?= base_url() ?>sign-up?jobId=' + $(this).data('id'));
			});
		});
		const searchInput = document.getElementById("searchInput");
		const searchButton = document.getElementById("searchButton");
		const province = document.querySelectorAll('input[name="province"]');
		const city = document.querySelectorAll('input[name="city"]');
		const jobLevel = document.querySelectorAll('input[name="job_level"]');
		const employmentType = document.querySelectorAll('input[name="employment_type"]');
		const jobFunction = document.querySelectorAll('input[name="job_function"]');
		const education = document.querySelectorAll('input[name="education"]');

		// Tambahkan event listener untuk tombol "Search"
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

		province.forEach(function(checkbox) {
			checkbox.addEventListener('change', function() {
			const checkedProvinces = Array.from(province)
				.filter(checkbox => checkbox.checked)
				.map(checkbox => checkbox.value);

			if (checkedProvinces.length > 0) {
				const url = new URL(window.location.href);
				url.searchParams.set('province[]', checkedProvinces.join(','));
				window.history.pushState({}, '', url.toString());
				window.location.href = url.toString();
			}
			});
		});

		city.forEach(function(checkbox) {
			checkbox.addEventListener('change', function() {
			const checkedCities = Array.from(city)
				.filter(checkbox => checkbox.checked)
				.map(checkbox => checkbox.value);

			if (checkedCities.length > 0) {
				const url = new URL(window.location.href);
				url.searchParams.set('cities[]', checkedCities.join(','));
				window.history.pushState({}, '', url.toString());
				window.location.href = url.toString();
			}
			});
		});

		jobLevel.forEach(function(checkbox) {
			checkbox.addEventListener('change', function() {
			const checkedJobLevel = Array.from(jobLevel)
				.filter(checkbox => checkbox.checked)
				.map(checkbox => checkbox.value);

			if (checkedJobLevel.length > 0) {
				const url = new URL(window.location.href);
				url.searchParams.set('job_level[]', checkedJobLevel.join(','));
				window.history.pushState({}, '', url.toString());
				window.location.href = url.toString();
			}
			});
		});

		employmentType.forEach(function(checkbox) {
			checkbox.addEventListener('change', function() {
			const checkedEmploymentType = Array.from(employmentType)
				.filter(checkbox => checkbox.checked)
				.map(checkbox => checkbox.value);

			if (checkedEmploymentType.length > 0) {
				const url = new URL(window.location.href);
				url.searchParams.set('employment_type[]', checkedEmploymentType.join(','));
				window.history.pushState({}, '', url.toString());
				window.location.href = url.toString();
			}
			});
		});

		jobFunction.forEach(function(checkbox) {
			checkbox.addEventListener('change', function() {
			const checkedJobFunction = Array.from(jobFunction)
				.filter(checkbox => checkbox.checked)
				.map(checkbox => checkbox.value);

			if (checkedJobFunction.length > 0) {
				const url = new URL(window.location.href);
				url.searchParams.set('job_function[]', checkedJobFunction.join(','));
				window.history.pushState({}, '', url.toString());
				window.location.href = url.toString();
			}
			});
		});

		education.forEach(function(checkbox) {
			checkbox.addEventListener('change', function() {
			const checkedEducation = Array.from(education)
				.filter(checkbox => checkbox.checked)
				.map(checkbox => checkbox.value);

			if (checkedEducation.length > 0) {
				const url = new URL(window.location.href);
				url.searchParams.set('education[]', checkedEducation.join(','));
				window.history.pushState({}, '', url.toString());
				window.location.href = url.toString();
			}
			});
		});

		// JavaScript untuk menambahkan filter yang dipilih
		function addFilter() {
			// Hapus semua filter yang ada
			selectedFilters.innerHTML = "";
			const urlParams = new URLSearchParams(window.location.search);
			for (const [key, value] of urlParams.entries()) {
                if(key != 'detailJobId'){
                    const filterTag = document.createElement("div");
                    filterTag.classList.add("filter-tag");
                    // if(key == 'province[]'){
                    // 	const provinceNames = value.split(',');
                    // 	provinceNames.forEach(function(provinceName) {

                    // 	});
                    // }
                    filterTag.textContent = key + ": " + value;

                    const closeButton = document.createElement("button");
                    closeButton.innerHTML = "<i class='fa fa-times'></i>";

                    closeButton.onclick = function () {
                        removeFilter(key, value);
                    };

                    filterTag.appendChild(closeButton);
                    selectedFilters.appendChild(filterTag);
                }
			}
		}

		// JavaScript untuk menghapus filter yang dipilih
		function removeFilter(key, value) {
			const urlParams = new URLSearchParams(window.location.search);
			urlParams.delete(key, value);

			const newUrl = window.location.origin + window.location.pathname + '?' + urlParams.toString();
			window.history. pushState({}, '', newUrl);

			window.location.href = newUrl;
		}

		// JavaScript untuk melakukan pencarian
		function performSearch() {
			const searchValue = searchInput.value.trim();
			if (searchValue !== "") {
				const url = new URL(window.location.href);
				url.searchParams.set('text', searchValue);
				window.history.pushState({}, '', url.toString());

				// Jalankan URL yang telah diubah
				window.location.href = url.toString();
			}
		}
	</script>
</body>
</html>
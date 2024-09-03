<!DOCTYPE html>
<html>
<head>
    <title>Job Status</title>
    <link href="<?php echo base_url() ?>assets/template_home/theme/plugins/bootstrap/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo base_url() ?>assets/template_home/theme/plugins/bootstrap/bootstrap-slider.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/template_home/theme/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/template_home/theme/plugins/slick/slick.css" rel="stylesheet">
	<link href="<?php echo base_url() ?>assets/template_home/theme/plugins/slick/slick-theme.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/template_home/theme/css/style.css" rel="stylesheet">
	<link href="<?php echo base_url() ?>assets/template_home/theme/css/user-custom.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/template_home/theme/css/user-styles.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/sweetalert2@9.17.2/dist/sweetalert2.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr@4.6.9/dist/flatpickr.min.css">
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
      width: 100%;
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
      z-index: 1;
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

    .profile-picture-candidate {
        width: 80px;
        height: 80px;
        align-items: center;
        border-radius: 50%;
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

    .sidebar-subitem {
        display: none;
        border: none;
        padding-top: 5px; /* Adjust the padding as needed */
        padding-left: 50px; /* Indent subitems more */
        background-color: #f8f9fa; /* Change the background color for subitems */
    }

    .sidebar-subitem span {
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

    .card {
        border-radius: 0;
    }

    .unclickable {
        pointer-events: none;
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

    thead th, tbody td {
        text-align: center;
        vertical-align: middle;
        font-size: 12px;
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
                <?php 
                    if(!empty($Menu)) { 
                        foreach($Menu as $index => $value){
                            if(empty($value->MenuAdminParent)){
                ?>
                <a class="list-group-item list-group-item-action list-group-item-light sidebar-item" href="<?php echo base_url($value->FormName) ?>"><i class="<?= $value->Icon ?>"></i> <span><?= $value->Description ?></span></a>
                <?php 
                            }else{
                ?>
                <a class="list-group-item list-group-item-action list-group-item-light sidebar-subitem" href="<?php echo base_url($value->FormName) ?>"><i class="<?= $value->Icon ?>"></i> <span><?= $value->Description ?></span></a>
                <?php
                            }
                        }    
                    }
                 ?>    
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
                                <a class="nav-link" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-envelope-o"></i></a>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="#!">Pesan 1</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#!">Pesan 2</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#!">Pesan 3</a>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-bell-o"></i></a>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="#!">Notification 1</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#!">Notification 2</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#!">Notification 3</a>
                                </div>
                            </li>
                            <img src="<?php echo base_url() ?>assets/template/images/avatar/no-photo.PNG" alt="Profile Picture" class="nav-item profile-picture">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?= $SMAccessHd['FirstName'] . ' ' . $SMAccessHd['LastName'] ?></a>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown" style="z-index: 10;">
                                    <a class="dropdown-item" href="<?php echo base_url() ?>admin/account-setting"><i class="fa fa-cog"></i><span>Account Settings</span></a>
                                    <a class="dropdown-item" href="<?php echo base_url() ?>admin/company-setting"><i class="fa fa-cog"></i><span>Company Settings</span></a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="<?php echo base_url() ?>admin/company-page"><i class="fa fa-building"></i><span>Company Page</span></a>
                                    <a class="dropdown-item" href="<?php echo base_url() ?>admin/message"><i class="fa fa-envelope"></i><span>Message</span></a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="<?php echo base_url() ?>admin/contact-us"><i class="fa fa-user"></i><span>Contact Us</span></a>
                                    <a class="dropdown-item" href="<?php echo base_url() ?>admin/faq"><i class="fa fa-question-circle"></i><span>FAQ</span></a>
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
                <div class="row m-2 p-3">
                    <div class="row">
                        <a href="<?=base_url()?>Dashboard" class="col-sm-1 justify-content-center align-items-center">
                            <i class="fa fa-chevron-left"></i>
                        </a>
                        <div class="col-sm-9">
                            <strong><?= $JobVacancy['Position'] ?></strong>
                        </div>
                    </div>
                </div>
                <div class="row m-2">
                    <a href="javascript:void(0)" id="div-inquiry" data-id="<?= urlencode($JobVacancy['JobVacancyId']) ?>" data-category="1" class="col-sm card btn btn-outline-secondary justify-content-center align-items-center job-status">
                        Inquiry
                    </a>
                    <a href="javascript:void(0)" id="div-applications" data-id="<?= urlencode($JobVacancy['JobVacancyId']) ?>" data-category="2" class="col-sm card btn btn-outline-secondary justify-content-center align-items-center job-status">
                        Applications
                    </a>
                    <a href="javascript:void(0)" id="div-shortlist" data-id="<?= urlencode($JobVacancy['JobVacancyId']) ?>" data-category="3" class="col-sm card btn btn-outline-secondary justify-content-center align-items-center job-status">
                        Shortlist
                    </a>
                    <a href="javascript:void(0)" id="div-callout" data-id="<?= urlencode($JobVacancy['JobVacancyId']) ?>" data-category="4" class="col-sm card btn btn-outline-secondary justify-content-center align-items-center job-status">
                        Call Out
                    </a>
                    <a href="javascript:void(0)" id="div-callout-evaluation" data-id="<?= urlencode($JobVacancy['JobVacancyId']) ?>" data-category="5" class="col-sm card btn btn-outline-secondary justify-content-center align-items-center job-status">
                        Call Out Evaluation
                    </a>
                    <a href="javascript:void(0)" id="div-offering" data-id="<?= urlencode($JobVacancy['JobVacancyId']) ?>" data-category="6" class="col-sm card btn btn-outline-secondary justify-content-center align-items-center job-status">
                        Offering
                    </a>
                    <a href="javascript:void(0)" id="div-hiring" data-id="<?= urlencode($JobVacancy['JobVacancyId']) ?>" data-category="7" class="col-sm card btn btn-outline-secondary justify-content-center align-items-center job-status">
                        Hiring
                    </a>
                </div>
                <?php
                    if($Category == 1 || $Category == 2 || $Category == 3){
                ?>
                <div class="row">
                    <div class="col-sm-9" id="div-detail">
                        
                    </div>
                    <div class="col-sm-3">
                        <div class="row">
                            <div class="col-12">
                                <h4 style="padding-top: 10px;">Filters</h4>
                            </div>
                        </div>
                        <hr class="mr-2">
                        <div class="row mr-2" id="div-filters">
                            <div class="card m-0 p-0">
                                <div class="card-header">
                                    <a class="text-decoration-none text-dark" data-bs-toggle="collapse" data-bs-parent="#div-filters" href="#keyword-filter">
                                        + Keyword
                                    </a>
                                </div>

                                <div id="keyword-filter" class="collapse" aria-labelledby="keyword-filter" data-parent="#div-filters">
                                    <div class="card-body">
                                        <select class="filter" name="filter_keyword[]" id="filter_keyword" multiple="multiple" style="width:100%;">
                                            
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="card m-0 p-0">
                                <div class="card-header">
                                    <a class="text-decoration-none text-dark" data-bs-toggle="collapse" data-bs-parent="#div-filters" href="#job-title-filter">
                                        + Job Titles
                                    </a>
                                </div>

                                <div id="job-title-filter" class="collapse" aria-labelledby="job-title-filter" data-parent="#div-filters">
                                    <div class="card-body">
                                        <select class="filter" name="filter_job_title[]" id="filter_job_title" multiple="multiple" style="width:100%;">
                                            
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="card m-0 p-0">
                                <div class="card-header">
                                    <a class="text-decoration-none text-dark" data-bs-toggle="collapse" data-bs-parent="#div-filters" href="#job-function-filter">
                                        + Job Functions
                                    </a>
                                </div>

                                <div id="job-function-filter" class="collapse" aria-labelledby="job-function-filter" data-parent="#div-filters">
                                    <div class="card-body">
                                        <select class="filter" name="filter_job_function[]" id="filter_job_function" multiple="multiple" style="width:100%;">
                                            
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="card m-0 p-0">
                                <div class="card-header">
                                    <a class="text-decoration-none text-dark" data-bs-toggle="collapse" data-bs-parent="#div-filters" href="#year-work-filter">
                                        + Years of Work Experiences
                                    </a>
                                </div>

                                <div id="year-work-filter" class="collapse" aria-labelledby="year-work-filter" data-parent="#div-filters">
                                    <div class="card-body">
                                        <input type="text" class="form-control" id="filter_from_year_experience" name="filter_from_year_experience" placeholder="From">
                                        <input type="text" class="form-control" id="filter_to_year_experience" name="filter_to_year_experience" placeholder="To">
                                    </div>
                                </div>
                            </div>
                            <div class="card m-0 p-0">
                                <div class="card-header">
                                    <a class="text-decoration-none text-dark" data-bs-toggle="collapse" data-bs-parent="#div-filters" href="#salary-filter">
                                        + Salary Range
                                    </a>
                                </div>

                                <div id="salary-filter" class="collapse" aria-labelledby="salary-filter" data-parent="#div-filters">
                                    <div class="card-body">
                                        <input type="text" class="form-control" id="filter_from_salary" name="filter_from_salary" placeholder="From">
                                        <input type="text" class="form-control" id="filter_to_salary" name="filter_to_salary" placeholder="To">
                                    </div>
                                </div>
                            </div>
                            <div class="card m-0 p-0">
                                <div class="card-header">
                                    <a class="text-decoration-none text-dark" data-bs-toggle="collapse" data-bs-parent="#div-filters" href="#past-company-filter">
                                        + Past Current Companies
                                    </a>
                                </div>

                                <div id="past-company-filter" class="collapse" aria-labelledby="past-company-filter" data-parent="#div-filters">
                                    <div class="card-body">
                                        <select class="filter" name="filter_past_company[]" id="filter_past_company" multiple="multiple" style="width:100%;">
                                            
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="card m-0 p-0">
                                <div class="card-header">
                                    <a class="text-decoration-none text-dark" data-bs-toggle="collapse" data-bs-parent="#div-filters" href="#job-level-filter">
                                        + Job Level
                                    </a>
                                </div>

                                <div id="job-level-filter" class="collapse" aria-labelledby="job-level-filter" data-parent="#div-filters">
                                    <div class="card-body">
                                        <select class="form-select select2" id="filter_from_job_level" name="filter_from_job_level" style="width: 100%;">
                                        </select>
                                        <select class="form-select select2" id="filter_to_job_level" name="filter_to_job_level" style="width: 100%;">
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="card m-0 p-0">
                                <div class="card-header">
                                    <a class="text-decoration-none text-dark" data-bs-toggle="collapse" data-bs-parent="#div-filters" href="#licenses-filter">
                                        + Licenses Certificates
                                    </a>
                                </div>

                                <div id="licenses-filter" class="collapse" aria-labelledby="licenses-filter" data-parent="#div-filters">
                                    <div class="card-body">
                                        <select class="filter" name="filter_licenses[]" id="filter_licenses" multiple="multiple" style="width:100%;">
                                            
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="card m-0 p-0">
                                <div class="card-header">
                                    <a class="text-decoration-none text-dark" data-bs-toggle="collapse" data-bs-parent="#div-filters" href="#education-filter">
                                        + Education Attainment
                                    </a>
                                </div>

                                <div id="education-filter" class="collapse" aria-labelledby="education-filter" data-parent="#div-filters">
                                    <div class="card-body">
                                        <select class="form-select select2" id="filter_from_education_attainment" name="filter_from_education_attainment" style="width: 100%;">
                                        </select>
                                        <select class="form-select select2" id="filter_to_education_attainment" name="filter_to_education_attainment" style="width: 100%;">
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="card m-0 p-0">
                                <div class="card-header">
                                    <a class="text-decoration-none text-dark" data-bs-toggle="collapse" data-bs-parent="#div-filters" href="#year-graduation-filter">
                                        + Year of Graduation
                                    </a>
                                </div>

                                <div id="year-graduation-filter" class="collapse" aria-labelledby="year-graduation-filter" data-parent="#div-filters">
                                    <div class="card-body">
                                        <input type="text" class="form-control" id="filter_from_year_graduation" name="filter_from_year_graduation" placeholder="From">
                                        <input type="text" class="form-control" id="filter_to_year_graduation" name="filter_to_year_graduation" placeholder="To">
                                    </div>
                                </div>
                            </div>
                            <div class="card m-0 p-0">
                                <div class="card-header">
                                    <a class="text-decoration-none text-dark" data-bs-toggle="collapse" data-bs-parent="#div-filters" href="#field-study-filter">
                                        + Field of Study
                                    </a>
                                </div>

                                <div id="field-study-filter" class="collapse" aria-labelledby="field-study-filter" data-parent="#div-filters">
                                    <div class="card-body">
                                        <select class="filter" name="filter_field_study[]" id="filter_field_study" multiple="multiple" style="width:100%;">
                                            
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="card m-0 p-0">
                                <div class="card-header">
                                    <a class="text-decoration-none text-dark" data-bs-toggle="collapse" data-bs-parent="#div-filters" href="#skill-filter">
                                        + Skills
                                    </a>
                                </div>

                                <div id="skill-filter" class="collapse" aria-labelledby="skill-filter" data-parent="#div-filters">
                                    <div class="card-body">
                                        <select class="filter" name="filter_skill[]" id="filter_skill" multiple="multiple" style="width:100%;">
                                            
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="card m-0 p-0">
                                <div class="card-header">
                                    <a class="text-decoration-none text-dark" data-bs-toggle="collapse" data-bs-parent="#div-filters" href="#job-status-filter">
                                        + Job Seeking Status
                                    </a>
                                </div>

                                <div id="job-status-filter" class="collapse" aria-labelledby="job-status-filter" data-parent="#div-filters">
                                    <div class="card-body">
                                        <select class="filter" name="filter_job_status[]" id="filter_job_status" multiple="multiple" style="width:100%;">
                                            
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="card m-0 p-0">
                                <div class="card-header">
                                    <a class="text-decoration-none text-dark" data-bs-toggle="collapse" data-bs-parent="#div-filters" href="#location-filter">
                                        + Locations
                                    </a>
                                </div>

                                <div id="location-filter" class="collapse" aria-labelledby="location-filter" data-parent="#div-filters">
                                    <div class="card-body">
                                        <select class="filter" name="filter_location[]" id="filter_location" multiple="multiple" style="width:100%;">
                                            
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="card m-0 p-0">
                                <div class="card-header">
                                    <a class="text-decoration-none text-dark" data-bs-toggle="collapse" data-bs-parent="#div-filters" href="#gender-filter">
                                        + Gender
                                    </a>
                                </div>

                                <div id="gender-filter" class="collapse" aria-labelledby="gender-filter" data-parent="#div-filters">
                                    <div class="card-body">
                                        <select class="filter" name="filter_gender[]" id="filter_gender" multiple="multiple" style="width:100%;">
                                            
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="card m-0 p-0">
                                <div class="card-header">
                                    <a class="text-decoration-none text-dark" data-bs-toggle="collapse" data-bs-parent="#div-filters" href="#age-filter">
                                        + Age
                                    </a>
                                </div>

                                <div id="age-filter" class="collapse" aria-labelledby="age-filter" data-parent="#div-filters">
                                    <div class="card-body">
                                        <input type="text" class="form-control" id="filter_from_age" name="filter_from_age" placeholder="From">
                                        <input type="text" class="form-control" id="filter_to_age" name="filter_to_age" placeholder="To">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                    }
                    if($Category == 4){
                ?>
                <div class="row m-2" style="overflow-x: scroll;">
                    <div class="col-sm-12">
                        <table class="table table-hover table-bordered" id="table-callout">
                            <thead>
                                <tr>
                                    <th rowspan="2">Candidate Name</th>
                                    <th rowspan="2">Call Out No</th>
                                    <th rowspan="2">Activity Name</th>
                                    <th colspan="2">Expected</th>
                                    <th rowspan="2">Status</th>
                                    <th colspan="2">Arrival</th>
                                    <th rowspan="2">Source</th>
                                    <th rowspan="2">Institution</th>
                                    <th rowspan="2">PIC</th>
                                </tr>
                                <tr>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Date</th>
                                    <th>Time</th>
                                </tr>
                            </thead>
                            <tbody id="tbody-table-callout">
                                <?php
                                    foreach($JobDetail as $index => $value){
                                ?>
                                <tr>
                                    <td><?= $value->CandidateName ?></td>
                                    <td><?= $value->CallOutNo ?></td>
                                    <td><?= $value->ActivityName ?></td>
                                    <td><?= $value->ExpectedDate ?></td>
                                    <td><?= $value->ExpectedTime ?></td>
                                    <td><?= $value->Status ?></td>
                                    <td><?= $value->ArrivalDate ?></td>
                                    <td><?= $value->ArrivalTime ?></td>
                                    <td><?= $value->Source ?></td>
                                    <td><?= $value->Institution ?></td>
                                    <td><?= $value->PIC ?></td>
                                </tr>
                                <?php
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <?php
                    }
                    if($Category == 5){
                ?>
                <div class="row m-2" style="overflow-x: scroll;">
                    <div class="col-sm-12">
                        <table class="table table-hover table-bordered" id="table-callout-evaluation">
                            <thead>
                                <tr>
                                    <th rowspan="2">Candidate Name</th>
                                    <th rowspan="2">Call Out No</th>
                                    <th rowspan="2">Activity Name</th>
                                    <th colspan="2">Expected</th>
                                    <th rowspan="2">Status</th>
                                    <th colspan="2">Arrival</th>
                                    <th rowspan="2">Evaluation Type</th>
                                    <th rowspan="2">Result Type</th>
                                    <th rowspan="2">Result</th>
                                </tr>
                                <tr>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Date</th>
                                    <th>Time</th>
                                </tr>
                            </thead>
                            <tbody id="tbody-table-callout-evaluation">
                                <?php
                                    foreach($JobDetail as $index => $value){
                                ?>
                                <tr>
                                    <td><?= $value->CandidateName ?></td>
                                    <td><?= $value->CallOutNo ?></td>
                                    <td><?= $value->ActivityName ?></td>
                                    <td><?= $value->ExpectedDate ?></td>
                                    <td><?= $value->ExpectedTime ?></td>
                                    <td><?= $value->Status ?></td>
                                    <td><?= $value->ArrivalDate ?></td>
                                    <td><?= $value->ArrivalTime ?></td>
                                    <td><?= $value->EvaluationDate ?></td>
                                    <td><?= $value->ResultType ?></td>
                                    <td><?= $value->Result ?></td>
                                </tr>
                                <?php
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <?php
                    }
                    if($Category == 6){
                ?>
                <div class="row m-2" style="overflow-x: scroll;">
                    <div class="col-sm-12">
                        <table class="table table-hover table-bordered" id="table-offering">
                            <thead>
                                <tr>
                                    <th>Candidate ID</th>
                                    <th>Candidate Name</th>
                                    <th>Offering Date</th>
                                    <th>Position Code</th>
                                    <th>Position Name</th>
                                    <th>Organization Group Code</th>
                                    <th>Organization Group Name</th>
                                    <th>Job Level Code</th>
                                    <th>Job Level Name</th>
                                    <th>Location Code</th>
                                    <th>Location Name</th>
                                </tr>
                            </thead>
                            <tbody id="tbody-table-offering">
                                <?php
                                    foreach($JobDetail as $index => $value){
                                ?>
                                <tr>
                                    <td><?= $value->CandidateId ?></td>
                                    <td><?= $value->CandidateName ?></td>
                                    <td><?= $value->OfferingDate ?></td>
                                    <td><?= $value->PositionCode ?></td>
                                    <td><?= $value->PositionName ?></td>
                                    <td><?= $value->OrganizationGroupCode ?></td>
                                    <td><?= $value->OrganizationGroupName ?></td>
                                    <td><?= $value->JobLevelCode ?></td>
                                    <td><?= $value->JobLevelName ?></td>
                                    <td><?= $value->LocationCode ?></td>
                                    <td><?= $value->LocationName ?></td>
                                </tr>
                                <?php
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <?php
                    }
                    if($Category == 7){
                ?>
                <div class="row m-2" style="overflow-x: scroll;">
                    <div class="col-sm-12">
                        <table class="table table-hover table-bordered" id="table-hiring">
                            <thead>
                                <tr>
                                    <th>Candidate Code</th>
                                    <th>Candidate Name</th>
                                    <th>Hiring Date</th>
                                    <th>Start Date</th>
                                    <th>Join Date</th>
                                    <th>Employee ID</th>
                                    <th>Candidate Source</th>
                                    <th>Position Code</th>
                                    <th>Position Name</th>
                                    <th>Location Code</th>
                                    <th>Location Name</th>
                                    <th>Organization Group Code</th>
                                    <th>Organization Group Name</th>
                                    <th>Job Level Code</th>
                                    <th>Job Level Name</th>
                                    <th>Location Code</th>
                                    <th>Location Name</th>
                                    <th>Employment Type</th>
                                </tr>
                            </thead>
                            <tbody id="tbody-table-hiring">
                                <?php
                                    foreach($JobDetail as $index => $value){
                                ?>
                                <tr>
                                    <td><?= $value->CandidateId ?></td>
                                    <td><?= $value->CandidateName ?></td>
                                    <td><?= $value->HiringDate ?></td>
                                    <td><?= $value->Startdate ?></td>
                                    <td><?= $value->Joindate ?></td>
                                    <td><?= $value->EmployeeId ?></td>
                                    <td><?= $value->CandidateSource ?></td>
                                    <td><?= $value->PositionCode ?></td>
                                    <td><?= $value->PositionName ?></td>
                                    <td><?= $value->OrganizationGroupCode ?></td>
                                    <td><?= $value->OrganizationGroupName ?></td>
                                    <td><?= $value->JobLevelCode ?></td>
                                    <td><?= $value->JobLevelName ?></td>
                                    <td><?= $value->LocationCode ?></td>
                                    <td><?= $value->LocationName ?></td>
                                    <td><?= $value->EmploymentType ?></td>
                                </tr>
                                <?php
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <?php
                    }
                ?>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JS-->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.17.2/dist/sweetalert2.min.js"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/flatpickr@4.6.9/dist/flatpickr.min.js"></script>
    <!-- Core theme JS-->
    <script src="<?php echo base_url() ?>assets/template_home/theme/js/user-scripts.js"></script>
    <script src="<?php echo base_url() ?>assets/template_home/theme/js/ckeditor/ckeditor.js"></script>

    <script>
        <?php if ($this->session->flashdata('success')): ?>
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: '<?php echo $this->session->flashdata('success'); ?>'
            });
        <?php endif; ?>

        <?php if ($Category == 1): ?>
            $('#div-inquiry').addClass('bg-secondary text-white unclickable');
        <?php elseif ($Category == 2): ?>
            $('#div-applications').addClass('bg-secondary text-white unclickable');
        <?php elseif ($Category == 3): ?>
            $('#div-shortlist').addClass('bg-secondary text-white unclickable');
        <?php elseif ($Category == 4): ?>
            $('#div-callout').addClass('bg-secondary text-white unclickable');
        <?php elseif ($Category == 5): ?>
            $('#div-callout-evaluation').addClass('bg-secondary text-white unclickable');
        <?php elseif ($Category == 6): ?>
            $('#div-offering').addClass('bg-secondary text-white unclickable');
        <?php elseif ($Category == 7): ?>
            $('#div-hiring').addClass('bg-secondary text-white unclickable');
        <?php endif; ?>

        $(document).ready(function () {
            var selectedFilters = [];

            getFilterCustom("#filter_keyword");
            getFilterCustom("#filter_job_title");
            getFilterCustom("#filter_job_function");
            getFilterCustom("#filter_past_company");
            getFilterCustom("#filter_licenses");
            getFilterCustom("#filter_field_study");
            getFilterCustom("#filter_skill");
            getFilterJobStatus();
            getFilterJobLevel('#filter_from_job_level');
            getFilterJobLevel('#filter_to_job_level');
            getFilterEducationAttainment('#filter_from_education_attainment');
            getFilterEducationAttainment('#filter_to_education_attainment');
            getFilterLocation();
            getFilterGender();
            refreshData();

            function refreshData() {
                $.ajax({
                    url: '<?= base_url() ?>job-status-filter',
                    type: 'POST',
                    data: { 'filter' : selectedFilters, 'jobId' : <?= $JobId ?>, 'category' : <?= $Category ?> },
                    success: function(response) {
                        var jsonResponse = JSON.parse(response);
                        
                        $('#div-detail').html('');
                        $.each(jsonResponse.JobDetail, function(index, value){
                            var html = '';

                            html += '<div class="card row m-2">'+
                                '<div class="row m-2">';

                            if (value.CanProfileData.PhotoProfile === null){
                                html += '<div class="col-sm-2">'+
                                    '<img src="<?php echo base_url() ?>assets/template/images/avatar/no-photo.PNG" alt="Profile Picture" id="img-photo-profile" class="profile-picture-candidate rounded-image">'+
                                    '</div>'+
                                    '<div class="col-sm-7">'+
                                    '<a href="javascript:void(0)" class="text-decoration-none text-dark m-0 p-0 candidate" data-id="' + value.CanProfileId + '" data-job="' + jsonResponse.JobId + '" data-category="' + jsonResponse.Category + '" style="font-size: 3vh;"><strong>' + ((value.Name === null) ? 'Anonymous' : value.Name) + '</strong></a>'+
                                    '<p style="font-size: 2vh;">'+
                                    '<span>' + ((value.Location === null) ? '-' : value.Location) + '</span><br>'+
                                    '<span>' + ((value.Status === null) ? '-' : value.Status) + '</span>'+
                                    '</p>'+
                                    '</div>';
                            }else{
                                html += '<div class="col-sm-2">'+
                                    '<img src="<?php echo base_url() ?>assets/template/images/avatar/' + value.CanProfileData.PhotoProfile + '" alt="Profile Picture" id="img-photo-profile" class="profile-picture-candidate rounded-image">'+
                                    '</div>'+
                                    '<div class="col-sm-7">'+
                                    '<a href="javascript:void(0)" class="text-decoration-none text-dark m-0 p-0 candidate" data-id="' + value.CanProfileId + '" data-job="' + jsonResponse.JobId + '" data-category="' + jsonResponse.Category + '" style="font-size: 3vh;"><strong>' + ((value.Name === null) ? 'Anonymous' : value.Name) + '</strong></a>'+
                                    '<p style="font-size: 2vh;">'+
                                    '<span>' + ((value.Location === null) ? '-' : value.Location) + '</span><br>'+
                                    '<span>' + ((value.Status === null) ? '-' : value.Status) + '</span>'+
                                    '</p>'+
                                    '</div>';
                            }
                            
                            if (jsonResponse.Category == 1){
                                html += '<div class="col-sm-3 text-end">'+
                                    '<button class="btn btn-primary mb-1 invite-to-apply" data-id="' + value.CanProfileId + '" data-job="' + jsonResponse.JobId + '"><i class="fa fa-envelope"></i> INVITE TO APPLY</button>'+
                                    '</div>';
                            }else if (jsonResponse.Category == 2){
                                html += '<div class="col-sm-3 text-end">'+
                                    '<button class="btn btn-primary mb-1 shortlist" data-id="' + value.CanProfileId + '" data-job="' + jsonResponse.JobId + '"><i class="fa fa-check"></i> SHORTLIST</button>'+
                                    '<button class="btn btn-outline-primary mb-1 reject-application" data-id="' + value.CanProfileId + '" data-job="' + jsonResponse.JobId + '"><i class="fa fa-times"></i> REJECT</button>'+
                                    '<button class="btn btn-outline-primary mb-1"><i class="fa fa-envelope"></i></button>'+
                                    '<button class="btn btn-outline-primary mb-1"><i class="fa fa-arrow-right"></i></button>'+
                                    '</div>';
                            } else if (jsonResponse.Category == 3){
                                html += '<div class="col-sm-3 text-end">'+
                                    '<button class="btn btn-outline-primary mb-1 reject-shortlist" data-id="' + value.CanProfileId + '" data-job="' + jsonResponse.JobId + '"><i class="fa fa-times"></i> REJECT</button>'+
                                    '<button class="btn btn-outline-primary mb-1 callout" data-id="' + value.CanProfileId + '" data-job="' + jsonResponse.JobId + '"><i class="fa fa-arrow-right"></i> MOVE</button>'+
                                    '<button class="btn btn-outline-primary mb-1"><i class="fa fa-envelope"></i> MESSAGE</button>'+
                                    '</div>';
                            }
                                
                            html += '</div>'+
                                '<div class="row m-2">'+
                                '<div class="col-sm-2">'+
                                '<p style="font-size: 2vh;">'+
                                '<span><strong>Work</strong></span><br>'+
                                '<span><strong>Education</strong></span><br>'+
                                '<span><strong>Salary Range</strong></span>'+
                                '</p>'+
                                '</div>'+
                                '<div class="col-sm-10">'+
                                '<p style="font-size: 2vh;">'+
                                '<span>'+ ((value.Work === null) ? '-' : value.Work) + '</span><br>'+
                                '<span>'+ ((value.Education === null) ? '-' : value.Education) + '</span><br>'+
                                '<span>'+ ((value.SalaryRange === null) ? '-' : value.SalaryRange) + '</span>'+
                                '<span style="float: right;">'+ ((value.LastOnline === null) ? '-' : value.LastOnline) + '</span>'+
                                '</p>'+
                                '</div>'+
                                '</div>'+
                                '</div>';
                                
                            $('#div-detail').append(html);
                        });

                        $('.invite-to-apply').on('click', function () {
                            var id = $(this).data('id');
                            var job = $(this).data('job');
                            
                            Swal.fire({
                                title: 'Are you sure?',
                                text: "Are you sure you want to invite this candidate?",
                                icon: 'warning',
                                showCancelButton: true,
                                confirmButtonColor: '#d33',
                                cancelButtonColor: '#3085d6',
                                confirmButtonText: 'Yes'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    $.ajax({
                                        url: '<?= base_url() ?>invite-to-apply',
                                        type: 'POST',
                                        data: { 'id' : id, 'job' : job },
                                        success: function(response) {
                                            var jsonResponse = JSON.parse(response);
                                            if(jsonResponse.status){
                                                Swal.fire(
                                                    'Success!',
                                                    'Candidate has successfully invited.',
                                                    'success'
                                                ).then((result) => {
                                                    if (result.isConfirmed) {
                                                        // Redirect to the desired page
                                                        window.location.reload();
                                                    }
                                                });
                                            }else{
                                                Swal.fire(
                                                    'Failed!',
                                                    'Candidate failed to invite.',
                                                    'error'
                                                )
                                            }
                                        },
                                        error: function(xhr, status, error) {
                                            console.error(error);
                                        }
                                    });
                                }
                            });
                        });

                        $('.shortlist').on('click', function () {
                            var id = $(this).data('id');
                            var job = $(this).data('job');
                            
                            Swal.fire({
                                title: 'Are you sure?',
                                text: "Are you sure you want to shortlist this candidate?",
                                icon: 'warning',
                                showCancelButton: true,
                                confirmButtonColor: '#d33',
                                cancelButtonColor: '#3085d6',
                                confirmButtonText: 'Yes'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    $.ajax({
                                        url: '<?= base_url() ?>proses-shortlist',
                                        type: 'POST',
                                        data: { 'id' : id, 'job' : job },
                                        success: function(response) {
                                            var jsonResponse = JSON.parse(response);
                                            if(jsonResponse.status){
                                                Swal.fire(
                                                    'Success!',
                                                    'Candidate has successfully listed.',
                                                    'success'
                                                ).then((result) => {
                                                    if (result.isConfirmed) {
                                                        // Redirect to the desired page
                                                        window.location.reload();
                                                    }
                                                });
                                            }else{
                                                Swal.fire(
                                                    'Failed!',
                                                    'Candidate failed to shortlist.',
                                                    'error'
                                                )
                                            }
                                        },
                                        error: function(xhr, status, error) {
                                            console.error(error);
                                        }
                                    });
                                }
                            });
                        });

                        $('.callout').on('click', function () {
                            var id = $(this).data('id');
                            var job = $(this).data('job');
                            
                            Swal.fire({
                                title: 'Are you sure?',
                                text: "Are you sure you want to invite this candidate?",
                                icon: 'warning',
                                showCancelButton: true,
                                confirmButtonColor: '#d33',
                                cancelButtonColor: '#3085d6',
                                confirmButtonText: 'Yes'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    $.ajax({
                                        url: '<?= base_url() ?>proses-callout',
                                        type: 'POST',
                                        data: { 'id' : id, 'job' : job },
                                        success: function(response) {
                                            var jsonResponse = JSON.parse(response);
                                            if(jsonResponse.status){
                                                Swal.fire(
                                                    'Success!',
                                                    'Candidate has successfully call out.',
                                                    'success'
                                                ).then((result) => {
                                                    if (result.isConfirmed) {
                                                        // Redirect to the desired page
                                                        window.location.reload();
                                                    }
                                                });
                                            }else{
                                                Swal.fire(
                                                    'Failed!',
                                                    'Candidate failed to call out.',
                                                    'error'
                                                )
                                            }
                                        },
                                        error: function(xhr, status, error) {
                                            console.error(error);
                                        }
                                    });
                                }
                            });
                        });

                        $('.reject-application').on('click', function () {
                            var id = $(this).data('id');
                            var job = $(this).data('job');
                            
                            Swal.fire({
                                title: 'Are you sure?',
                                text: "Are you sure you want to reject this candidate?",
                                icon: 'warning',
                                showCancelButton: true,
                                confirmButtonColor: '#d33',
                                cancelButtonColor: '#3085d6',
                                confirmButtonText: 'Yes'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    $.ajax({
                                        url: '<?= base_url() ?>proses-reject-application',
                                        type: 'POST',
                                        data: { 'id' : id, 'job' : job },
                                        success: function(response) {
                                            var jsonResponse = JSON.parse(response);
                                            if(jsonResponse.status){
                                                Swal.fire(
                                                    'Success!',
                                                    'Candidate has successfully rejected.',
                                                    'success'
                                                ).then((result) => {
                                                    if (result.isConfirmed) {
                                                        // Redirect to the desired page
                                                        window.location.reload();
                                                    }
                                                });
                                            }else{
                                                Swal.fire(
                                                    'Failed!',
                                                    'Candidate failed to reject.',
                                                    'error'
                                                )
                                            }
                                        },
                                        error: function(xhr, status, error) {
                                            console.error(error);
                                        }
                                    });
                                }
                            });
                        });

                        $('.reject-shortlist').on('click', function () {
                            var id = $(this).data('id');
                            var job = $(this).data('job');
                            
                            Swal.fire({
                                title: 'Are you sure?',
                                text: "Are you sure you want to reject this candidate?",
                                icon: 'warning',
                                showCancelButton: true,
                                confirmButtonColor: '#d33',
                                cancelButtonColor: '#3085d6',
                                confirmButtonText: 'Yes'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    $.ajax({
                                        url: '<?= base_url() ?>proses-reject-shortlist',
                                        type: 'POST',
                                        data: { 'id' : id, 'job' : job },
                                        success: function(response) {
                                            var jsonResponse = JSON.parse(response);
                                            if(jsonResponse.status){
                                                Swal.fire(
                                                    'Success!',
                                                    'Candidate has successfully rejected.',
                                                    'success'
                                                ).then((result) => {
                                                    if (result.isConfirmed) {
                                                        // Redirect to the desired page
                                                        window.location.reload();
                                                    }
                                                });
                                            }else{
                                                Swal.fire(
                                                    'Failed!',
                                                    'Candidate failed to reject.',
                                                    'error'
                                                )
                                            }
                                        },
                                        error: function(xhr, status, error) {
                                            console.error(error);
                                        }
                                    });
                                }
                            });
                        });

                        $('.candidate').on('click', function () {
                            var id = $(this).data('id');
                            var job = $(this).data('job');
                            var category = $(this).data('category');
                            window.open('<?= base_url() ?>job-status/candidate/' + id + '/' + job + '/' + category, '_self');
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            }

			$('.job-status').on('click', function () {
                var id = $(this).data('id');
                var category = $(this).data('category');
                window.open('<?= base_url() ?>job-status?jobId=' + id + '&category=' + category, '_self');
			});

            $('.filter').on('select2:select', function(event) {
                var id = $(this).attr('id');
                var values = $(this).val();
                selectedFilters.push({ id: id, values: values });

                refreshData();
            });

            $('.filter').on('select2:unselect', function(event) {
                var values = event.params.data.id;

                selectedFilters = selectedFilters.filter(function(filter) {
                    if (Array.isArray(filter.values)) {
                        var index = filter.values.indexOf(values);
                        if (index !== -1) {
                            filter.values.splice(index, 1);
                        }

                        if (filter.values.length === 0) {
                            return false;
                        }
                    }

                    return true;
                });

                refreshData();
            });

            $("#filter_from_year_experience, #filter_to_year_experience").on("input", function() {
                var fromRange = $("#filter_from_year_experience").val();
                var toRange = $("#filter_to_year_experience").val();

                selectedFilters = selectedFilters.filter(function(filter) {
                    return filter.id !== "filter_from_year_experience" && filter.id !== "filter_to_year_experience";
                });

                if (fromRange !== "" && toRange !== "") {
                    selectedFilters.push({ id: "filter_from_year_experience", values: fromRange });
                    selectedFilters.push({ id: "filter_to_year_experience", values: toRange });
                } else {
                    selectedFilters = selectedFilters.filter(function(filter) {
                        return filter.id !== "filter_from_year_experience" && filter.id !== "filter_to_year_experience";
                    });
                }

                refreshData();
            });

            $("#filter_from_salary, #filter_to_salary").on("input", function() {
                var fromRange = $("#filter_from_salary").val();
                var toRange = $("#filter_to_salary").val();

                selectedFilters = selectedFilters.filter(function(filter) {
                    return filter.id !== "filter_from_salary" && filter.id !== "filter_to_salary";
                });

                if (fromRange !== "" && toRange !== "") {
                    selectedFilters.push({ id: "filter_from_salary", values: fromRange });
                    selectedFilters.push({ id: "filter_to_salary", values: toRange });
                } else {
                    selectedFilters = selectedFilters.filter(function(filter) {
                        return filter.id !== "filter_from_salary" && filter.id !== "filter_to_salary";
                    });
                }

                refreshData();
            });

            $("#filter_from_year_gradution, #filter_to_year_graduation").on("input", function() {
                var fromRange = $("#filter_from_year_gradution").val();
                var toRange = $("#filter_to_year_graduation").val();

                selectedFilters = selectedFilters.filter(function(filter) {
                    return filter.id !== "filter_from_year_gradution" && filter.id !== "filter_to_year_graduation";
                });

                if (fromRange !== "" && toRange !== "") {
                    selectedFilters.push({ id: "filter_from_year_gradution", values: fromRange });
                    selectedFilters.push({ id: "filter_to_year_graduation", values: toRange });
                } else {
                    selectedFilters = selectedFilters.filter(function(filter) {
                        return filter.id !== "filter_from_year_gradution" && filter.id !== "filter_to_year_graduation";
                    });
                }

                refreshData();
            });

            $("#filter_from_age, #filter_to_age").on("input", function() {
                var fromRange = $("#filter_from_age").val();
                var toRange = $("#filter_to_age").val();

                selectedFilters = selectedFilters.filter(function(filter) {
                    return filter.id !== "filter_from_age" && filter.id !== "filter_to_age";
                });

                if (fromRange !== "" && toRange !== "") {
                    selectedFilters.push({ id: "filter_from_age", values: fromRange });
                    selectedFilters.push({ id: "filter_to_age", values: toRange });
                } else {
                    selectedFilters = selectedFilters.filter(function(filter) {
                        return filter.id !== "filter_from_age" && filter.id !== "filter_to_age";
                    });
                }

                refreshData();
            });

            $("#filter_from_job_level, #filter_to_job_level").on("change", function() {
                var fromRange = $("#filter_from_job_level").val();
                var toRange = $("#filter_to_job_level").val();

                selectedFilters = selectedFilters.filter(function(filter) {
                    return filter.id !== "filter_from_job_level" && filter.id !== "filter_to_job_level";
                });

                if (fromRange !== "" && toRange !== "") {
                    selectedFilters.push({ id: "filter_from_job_level", values: fromRange });
                    selectedFilters.push({ id: "filter_to_job_level", values: toRange });
                } else {
                    selectedFilters = selectedFilters.filter(function(filter) {
                        return filter.id !== "filter_from_job_level" && filter.id !== "filter_to_job_level";
                    });
                }

                refreshData();
            });

            $("#filter_from_education_attainment, #filter_to_education_attainment").on("change", function() {
                var fromRange = $("#filter_from_education_attainment").val();
                var toRange = $("#filter_to_education_attainment").val();

                selectedFilters = selectedFilters.filter(function(filter) {
                    return filter.id !== "filter_from_education_attainment" && filter.id !== "filter_to_education_attainment";
                });

                if (fromRange !== "" && toRange !== "") {
                    selectedFilters.push({ id: "filter_from_education_attainment", values: fromRange });
                    selectedFilters.push({ id: "filter_to_education_attainment", values: toRange });
                } else {
                    selectedFilters = selectedFilters.filter(function(filter) {
                        return filter.id !== "filter_from_education_attainment" && filter.id !== "filter_to_education_attainment";
                    });
                }

                refreshData();
            });

            function getFilterCustom(field = ''){
                $(field).select2({
                    placeholder: 'Search...',
                    multiple: true,
                    tags: true,
                    createTag: function (params) {
                        return {
                            id: params.term,
                            text: params.term,
                            newOption: true
                        }
                    }
                });
            }
            
            function getFilterJobStatus(){
                $('#filter_job_status').select2({
                    placeholder: 'Search...',
                    multiple: true,
                    ajax: { 
                        url: '<?= base_url() ?>get-job-seeking-status',
                        type: "post",
                        dataType: 'json',
                        delay: 250,
                        data: function (params) {
                            return {
                                searchTerm: params.term // search term
                            };
                        },
                        processResults: function (response) {
                            var results = [];

                            $.each(response, function(index, item){
                                results.push({
                                    id: item.JobSeekingStatusId,
                                    text: item.JobSeekingStatusName
                                });
                            });

                            return {
                                results: results
                            };
                        },
                        cache: true
                    }
                });
            }

            function getFilterLocation(){
                $('#filter_location').select2({
                    placeholder: 'Search...',
                    multiple: true,
                    ajax: { 
                        url: '<?= base_url() ?>get-location',
                        type: "post",
                        dataType: 'json',
                        delay: 250,
                        data: function (params) {
                            return {
                                searchTerm: params.term // search term
                            };
                        },
                        processResults: function (response) {
                            var results = [];

                            $.each(response, function(index, item){
                                results.push({
                                    id: item.LocationId,
                                    text: item.LocationName
                                });
                            });

                            return {
                                results: results
                            };
                        },
                        cache: true
                    },
                    tags: true,
                    createTag: function (params) {
                        return {
                            id: params.term,
                            text: params.term,
                            newOption: true
                        }
                    }
                });
            }

            function getFilterGender(){
                $('#filter_gender').select2({
                    placeholder: 'Search...',
                    multiple: true,
                    ajax: { 
                        url: '<?= base_url() ?>get-gender',
                        type: "post",
                        dataType: 'json',
                        delay: 250,
                        data: function (params) {
                            return {
                                searchTerm: params.term // search term
                            };
                        },
                        processResults: function (response) {
                            var results = [];

                            $.each(response, function(index, item){
                                results.push({
                                    id: item.GenderId,
                                    text: item.GenderName
                                });
                            });

                            return {
                                results: results
                            };
                        },
                        cache: true
                    }
                });
            }

            function getFilterJobLevel(field = ''){
                $(field).select2({
                    placeholder: 'Job Level...',
                    ajax: { 
                        url: '<?= base_url() ?>get-job-level-search',
                        type: "post",
                        dataType: 'json',
                        delay: 250,
                        data: function (params) {
                            return {
                                searchTerm: params.term // search term
                            };
                        },
                        processResults: function (response) {
                            var results = [];

                            $.each(response, function(index, item){
                                results.push({
                                    id: item.JobLevelId,
                                    text: item.JobLevelName
                                });
                            });

                            return {
                                results: results
                            };
                        },
                        cache: true
                    }
                });
            }

            function getFilterEducationAttainment(field = ''){
                $(field).select2({
                    placeholder: 'Education Attainment...',
                    ajax: { 
                        url: '<?= base_url() ?>get-education-search',
                        type: "post",
                        dataType: 'json',
                        delay: 250,
                        data: function (params) {
                            return {
                                searchTerm: params.term // search term
                            };
                        },
                        processResults: function (response) {
                            var results = [];

                            $.each(response, function(index, item){
                                results.push({
                                    id: item.EducationLevelId,
                                    text: item.EducationLevelName
                                });
                            });

                            return {
                                results: results
                            };
                        },
                        cache: true
                    }
                });
            }
		});
        
	</script>
</body>
</html>
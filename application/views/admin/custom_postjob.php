<!DOCTYPE html>
<html>
<head>
    <title>Your Account Settings</title>
    <link href="<?php echo base_url() ?>assets/template_home/theme/plugins/bootstrap/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo base_url() ?>assets/template_home/theme/plugins/bootstrap/bootstrap-slider.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/template_home/theme/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/template_home/theme/plugins/slick/slick.css" rel="stylesheet">
	<link href="<?php echo base_url() ?>assets/template_home/theme/plugins/slick/slick-theme.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/template_home/theme/css/style.css" rel="stylesheet">
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

    .select2-container .select2-selection--single {
        height: 35px;
    }

    .select2-container--default .select2-selection--single .select2-selection__arrow {
        height: 33px;
    }

    .form-check-inline .form-check-input {
        position: static;
        margin-top: 6px;
        margin-right: 0.3125rem;
        margin-left: 0;
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
            <div class="container-fluid-main" style="margin: 10px;">
                <h4>Post a Job</h4>
                <div class="row" style="margin-top: 10px;">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                Required Information
                            </div>
                            <form id="form_required_information" action="<?php echo base_url() ?>proses-post-job-information" method="post">
                            <div class="card-body">
                                <div class="row mb-3">
                                    <div class="col-sm-2">
                                        <label for="job_type_pooling" class="form-label">Job Type</label>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="job_type" id="job_type_pooling" value="1">
                                            <label class="form-check-label" for="job_type_pooling">Pooling</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="job_type_employee_request" class="form-label">&nbsp;</label>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="job_type" id="job_type_employee_request" value="2">
                                            <label class="form-check-label" for="job_type_employee_request">By Employee Request</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3" id="div-employee-request-no" style="display: none;">
                                    <div class="col-sm-12">
                                        <select class="form-select" id="employee_request_no" name="employee_request_no" style="width: 100%;">
                                            
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-12">
                                        <label for="job_title" class="form-label">Job Title</label>
                                        <input type="text" class="form-control" id="job_title" name="job_title" placeholder="e.g. Administrative Assistant" value="<?= (isset($JobVacancy)) ? $JobVacancy['Position'] : '' ?>" required>
                                    </div>
                                    <input type="hidden" class="form-control" id="function_information" name="function_information" value="<?= (isset($JobVacancy)) ? 'Edit' : 'Add' ?>">
                                    <input type="hidden" class="form-control" id="job_id" name="job_id" value="<?= (isset($JobVacancy)) ? $JobVacancy['JobVacancyId'] : '' ?>">
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-12">
                                        <label for="job_function" class="form-label">Job Function</label>
                                        <select class="form-select" id="job_function" name="job_function" style="width: 100%;" required>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-12">
                                        <label for="job_level" class="form-label">Job Level</label>
                                        <select class="form-select" id="job_level" name="job_level" required>
                                            <?php
                                                foreach($JobLevel as $value){ 
                                                    if(isset($JobVacancy)){
                                                        if($JobVacancy['JobLevelId'] == $value['JobLevelId']){
                                            ?>
                                                <option value="<?= $value['JobLevelId'] ?>" selected><?= $value['JobLevelName'] ?></option>
                                            <?php
                                                        }else{
                                            ?>
                                                <option value="<?= $value['JobLevelId'] ?>"><?= $value['JobLevelName'] ?></option>
                                            <?php
                                                        }
                                                    }else{
                                            ?>
                                                <option value="<?= $value['JobLevelId'] ?>"><?= $value['JobLevelName'] ?></option>
                                            <?php
                                                    }
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-12">
                                        <label for="employment_type" class="form-label">Employment Type</label>
                                        <select class="form-select" id="employment_type" name="employment_type" required>
                                            <?php
                                                foreach($EmpType as $value){ 
                                                    if(isset($JobVacancy)){
                                                        if($JobVacancy['EmpTypeId'] == $value['EmpTypeId']){
                                            ?>
                                                <option value="<?= $value['EmpTypeId'] ?>" selected><?= $value['EmpTypeName'] ?></option>
                                            <?php
                                                        }else{
                                            ?>
                                                <option value="<?= $value['EmpTypeId'] ?>"><?= $value['EmpTypeName'] ?></option>
                                            <?php
                                                        }
                                                    }else{
                                            ?>
                                                <option value="<?= $value['EmpTypeId'] ?>"><?= $value['EmpTypeName'] ?></option>
                                            <?php
                                                    }
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-6">
                                        <label for="number_people" class="form-label">Number of people you're hiring</label>
                                        <input type="number" class="form-control" id="number_people" name="number_people" placeholder="1" value="<?= (isset($JobVacancy)) ? $JobVacancy['TotalCandidateHiring'] : '' ?>" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="deadline" class="form-label">Deadline of Application</label>
                                        <input type="text" class="form-control" id="deadline" name="deadline" placeholder="Deadline of Application" required>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-12">
                                        <label for="education_attainment" class="form-label">Minimum Educational Attainment</label>
                                        <select class="form-select" id="education_attainment" name="education_attainment" required>
                                            <?php
                                                foreach($EducationLevel as $value){ 
                                                    if(isset($JobVacancy)){
                                                        if($JobVacancy['EducationLevelId'] == $value['EducationLevelId']){
                                            ?>
                                                <option value="<?= $value['EducationLevelId'] ?>" selected><?= $value['EducationLevelName'] ?></option>
                                            <?php
                                                        }else{
                                            ?>
                                                <option value="<?= $value['EducationLevelId'] ?>"><?= $value['EducationLevelName'] ?></option>
                                            <?php
                                                        }
                                                    }else{
                                            ?>
                                                <option value="<?= $value['EducationLevelId'] ?>"><?= $value['EducationLevelName'] ?></option>
                                            <?php
                                                    }
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-12">
                                        <label for="location" class="form-label">Location</label>
                                        <select class="form-select" id="location" name="location" style="width: 100%;" required>
                                            
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-12">
                                        <label for="qualification_experience" class="form-label">Minimum Qualifications and Experience</label>
                                        <textarea class="form-control" id="qualification_experience" name="qualification_experience"></textarea>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-12">
                                        <label for="job_description" class="form-label">Job Description</label>
                                        <textarea class="form-control" id="job_description" name="job_description"></textarea>
                                    </div>
                                </div>
                                <p><h5>Location</h5></p>
                                <div class="row mb-3">
                                    <div class="col-sm-12">
                                        <label for="country" class="form-label">Country</label>
                                        <select class="form-select" id="country" name="country" style="width: 100%;">
                                            
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-6">
                                        <label for="region" class="form-label">Region / Province / State</label>
                                        <select class="form-select" id="region" name="region" style="width: 100%;" required>
                                            
                                        </select>
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="city" class="form-label">City</label>
                                        <select class="form-select" id="city" name="city" style="width: 100%;" required>
                                            
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-4">
                                        <label for="unit_no" class="form-label">Floor / Unit No</label>
                                        <input type="text" class="form-control" id="unit_no" name="unit_no">
                                    </div>
                                    <div class="col-sm-8">
                                        <label for="street_address" class="form-label">Street Address</label>
                                        <input type="text" class="form-control" id="street_address" name="street_address">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="remote_work" name="remote_work" value="true">
                                            <label class="form-check-label" for="remote_work">
                                                This job can be done remotely (work from home)
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="willing_relocate" name="willing_relocate" value="true">
                                            <label class="form-check-label" for="willing_relocate">
                                                Accept candidates willing to relocate
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-1">
                                        <label for="status_public" class="form-label">Status</label>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="status" id="status_public" value="1">
                                            <label class="form-check-label" for="status_public">Public</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-1">
                                        <label for="status_draft" class="form-label">&nbsp;</label>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="status" id="status_draft" value="2">
                                            <label class="form-check-label" for="status_draft">Draft</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-1">
                                        <label for="status_deactive" class="form-label">&nbsp;</label>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="status" id="status_deactive" value="3">
                                            <label class="form-check-label" for="status_deactive">Deactive</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer d-flex justify-content-start">
                                <button type="submit" class="btn btn-primary mr-2">Save</button>
                                <a href="<?= base_url('Dashboard') ?>" class="btn btn-outline-primary">Cancel</a>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- <div class="row" style="margin-top: 10px;">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                Manage User Access
                            </div>
                            <form id="form_change_mobile_number" action="<?php //echo base_url() ?>change-mobile-number" method="post">
                            <div class="card-body">
                                <p>Manage type of access for your jobs.</b></p>
                            </div>
                            <div class="card-footer d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="row" style="margin-top: 10px;">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                Improve Your Job Post (Optional)
                            </div>
                            <form id="form_change_mobile_number" action="<?php //echo base_url() ?>change-mobile-number" method="post">
                            <div class="card-body">
                                <p>Improve your job post by identifying specific qualifiers like skills or by showcasing your employer brand thru pictures and employee benefits.</b></p>
                            </div>
                            <div class="card-footer d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="row" style="margin-top: 10px;">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                Custom Questions (Optional)
                            </div>
                            <form id="form_change_mobile_number" action="<?php //echo base_url() ?>change-mobile-number" method="post">
                            <div class="card-body">
                                <p>Add custom questions to the job application process. You can ask essay questions, ask for voice or writing examples, or ask them to upload documents like resumes. Candidates will need to fill these in when they apply to your job.</b></p>
                            </div>
                            <div class="card-footer d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="row" style="margin-top: 10px;">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                Assessments (Optional)
                            </div>
                            <form id="form_change_mobile_number" action="<?php //echo base_url() ?>change-mobile-number" method="post">
                            <div class="card-body">
                                <p>Add assessments to your job posts.</b></p>
                            </div>
                            <div class="card-footer d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div> -->
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
        <?php if ($this->session->flashdata('error')): ?>
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: '<?php echo $this->session->flashdata('error'); ?>'
            });
        <?php endif; ?>

        var qualification;
        var description;

        $(document).ready(function() {
            getEmployeeRequestNo();
            getJobFunction();
            getLocation();
            getCountry();
            getProvince();

            $('#region').change(function() {
                var id = $(this).val();
                $('#city').prop('disabled', false);
                getCity(id);
            });

            qualification = CKEDITOR.replace('qualification_experience', {
                // CKEditor configuration options for updating
            });
            description = CKEDITOR.replace('job_description', {
                // CKEditor configuration options for updating
            });

            var pickrDeadline = flatpickr("#deadline", {
                dateFormat: "Y-m-d",
                inline: false,
                altInput: true,
                altFormat: "Y-m-d",
                allowInput: true
            });

            <?php if (isset($JobVacancy)): ?>
                pickrDeadline.setDate(<?= json_encode($JobVacancy['Dateline']) ?>);
                var newOptionEmployeeRequestNo = new Option(<?= json_encode($JobVacancy['EmpRequestName']) ?>, <?= json_encode($JobVacancy['EmpRequestNo']) ?>, false, false);
                $('#employee_request_no').append(newOptionEmployeeRequestNo).trigger('change');
                var newOptionJobFunction = new Option(<?= json_encode($JobVacancy['JobFunctionName']) ?>, <?= json_encode($JobVacancy['JobFunctionId']) ?>, false, false);
                $('#job_function').append(newOptionJobFunction).trigger('change');
                var newOptionLocation = new Option(<?= json_encode($JobVacancy['LocationName']) ?>, <?= json_encode($JobVacancy['LocationId']) ?>, false, false);
                $('#location').append(newOptionLocation).trigger('change');
                qualification.on('instanceReady', function(event) {
                    var editorInstance = event.editor;
                    editorInstance.setData(<?= json_encode($JobVacancy['Qualification']) ?>);
                });
                description.on('instanceReady', function(event) {
                    var editorInstance = event.editor;
                    editorInstance.setData(<?= json_encode($JobVacancy['JobDescription']) ?>);
                });
                var newOptionProvince = new Option(<?= json_encode($JobVacancy['ProvinceName']) ?>, <?= json_encode($JobVacancy['ProvinceId']) ?>, false, false);
                $('#region').append(newOptionProvince).trigger('change');
                var newOptionCity = new Option(<?= json_encode($JobVacancy['CityName']) ?>, <?= json_encode($JobVacancy['CityId']) ?>, false, false);
                $('#city').append(newOptionCity).trigger('change');
                if(<?= json_encode($JobVacancy['IsRelocation']) ?>){
                    $('#willing_relocate').prop('checked', true);
                }else{
                    $('#willing_relocate').prop('checked', false);
                }
                var checkJobType = <?= json_encode($JobVacancy['IsJobType'])?>;
                if(checkJobType == "2"){
                    $("#div-employee-request-no").show();
                }else{
                    $("#div-employee-request-no").hide();
                }
                $('input[name="status"]').filter('[value=<?= json_encode($JobVacancy['IsStatus']) ?>]').prop('checked', true);
                $('input[name="job_type"]').filter('[value=<?= json_encode($JobVacancy['IsJobType']) ?>]').prop('checked', true);
            <?php endif; ?>

            $("input[type='radio'][name=job_type]").on('change', function() {
                if ($(this).val() == 2) {
                    $("#div-employee-request-no").show();
                } else {
                    $("#div-employee-request-no").hide();
                }
            });

            function getEmployeeRequestNo(){
                $("#employee_request_no").select2({
                    placeholder: 'Choose Employee Request No',
                    ajax: { 
                        url: '<?= base_url() ?>get-employee-request-no',
                        type: "post",
                        dataType: 'json',
                        delay: 250,
                        data: function (params) {
                            return {
                                id: '<?= $SMAccessHdId ?>',
                                searchTerm: params.term
                            };
                        },
                        processResults: function (response) {
                            var results = [];

                            $.each(response, function(index, item){
                                results.push({
                                    id: item.Id,
                                    text: item.Name
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

            function getJobFunction(){
                $("#job_function").select2({
                    placeholder: 'Choose Job Function',
                    ajax: { 
                        url: '<?= base_url() ?>get-job-function',
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
                                    id: item.JobFunctionId,
                                    text: item.JobFunctionName
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

            function getLocation(){
                $("#location").select2({
                    placeholder: 'Choose Location',
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
                    }
                });
            }

            function getCountry(){
                $("#country").select2({
                    placeholder: 'Choose Country',
                    ajax: { 
                        url: '<?= base_url() ?>get-country',
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
                                    id: item.CountryId,
                                    text: item.CountryName
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

            function getProvince(){
                $("#region").select2({
                    placeholder: 'Choose Province',
                    ajax: { 
                        url: '<?= base_url() ?>get-province',
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
                                    id: item.ProvinceId,
                                    text: item.ProvinceName
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

            function getCity(id = ''){
                $("#city").select2({
                    placeholder: 'Choose City',
                    ajax: { 
                        url: '<?= base_url() ?>get-city',
                        type: "post",
                        dataType: 'json',
                        delay: 250,
                        data: function (params) {
                            return {
                                searchTerm: params.term,
                                id: id
                            };
                        },
                        processResults: function (response) {
                            var results = [];

                            $.each(response, function(index, item){
                                results.push({
                                    id: item.CityId,
                                    text: item.CityName
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
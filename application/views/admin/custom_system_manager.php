<!DOCTYPE html>
<html>
<head>
    <title>System Manager</title>
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

    th, td {
        text-align: center; /* Center the text horizontally */
        vertical-align: middle !important; /* Center the content vertically */
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

    .required:after {
        content:"\00a0*";
        color:red;
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
                <h4 style="margin: 5px;">System Manager</h4>
                <div class="row m-2">
                    <a href="javascript:void(0)" id="div-user-group" data-category="1" class="col-sm-3 card btn btn-outline-secondary justify-content-center align-items-center status">
                        User Group
                    </a>
                    <a href="javascript:void(0)" id="div-menu-trustee" data-category="2" class="col-sm-3 card btn btn-outline-secondary justify-content-center align-items-center status">
                        Menu Trustee
                    </a>
                    <a href="javascript:void(0)" id="div-data-trustee" data-category="3" class="col-sm-3 card btn btn-outline-secondary justify-content-center align-items-center status">
                        Data Trustee
                    </a>
                    <?php
                        if($Category == 1){
                    ?>
                    <div class="col-sm-3">
                        <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#modal-user-group" class="btn btn-primary ml-5">ADD USER GROUP</a>
                    </div>
                    <?php
                        }
                    ?>
                </div>
                <div class="card row m-2">
                    <?php
                        if($Category == 1){
                    ?>
                    <div class="row m-2">
                        <table class="table table-bordered text-center align-middle">
                            <thead>
                                <tr>
                                    <th rowspan="2">#</th>
                                    <th rowspan="2">User Group</th>
                                    <th rowspan="2">User Group Type</th>
                                    <th colspan="3">Data Trustee Criteria</th>
                                    <th rowspan="2">Status</th>
                                    <th rowspan="2">Last Update</th>
                                    <th rowspan="2">Updated By</th>
                                </tr>
                                <tr>
                                    <th>By Organization</th>
                                    <th>By Job Level</th>
                                    <th>By Location</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if(!empty($SMGroup)){
                                    foreach($SMGroup as $index => $value){
                                ?>
                                <tr>
                                    <td width="13%">
                                        <a class="btn btn-warning edit-user-group" href="javascript:void(0)" data-id="<?= $value['SMGroupId'] ?>" data-bs-toggle="modal" data-bs-target="#modal-user-group"><i class="fa fa-pencil"></i></a>
                                        <a class="btn btn-danger delete-user-group" href="javascript:void(0)" data-id="<?= $value['SMGroupId'] ?>"><i class="fa fa-trash"></i></a>
                                    </td>
                                    <td><?= $value['Description'] ?></td>
                                    <td><?= $value['SMGroupData']['GroupTypeName'] ?></td>
                                    <td>
                                        <?php
                                        if($value['IsOrganization']){
                                        ?>
                                        <input type="checkbox" checked>
                                        <?php
                                        }else{
                                        ?>
                                        <input type="checkbox">
                                        <?php
                                        }
                                        ?>
                                    </td>
                                    <td>
                                    <?php
                                        if($value['IsJobLevel']){
                                        ?>
                                        <input type="checkbox" checked>
                                        <?php
                                        }else{
                                        ?>
                                        <input type="checkbox">
                                        <?php
                                        }
                                        ?>
                                    </td>
                                    <td>
                                    <?php
                                        if($value['IsLocation']){
                                        ?>
                                        <input type="checkbox" checked>
                                        <?php
                                        }else{
                                        ?>
                                        <input type="checkbox">
                                        <?php
                                        }
                                        ?>
                                    </td>
                                    <td><?= $value['IsActive'] == 1 ? 'Active' : 'Deactive' ?></td>
                                    <td><?= date('j F Y', strtotime($value['EditDate'])) ?></td>
                                    <td><?= $value['EditBy'] ?></td>
                                </tr>
                                <?php
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <?php
                        }else if($Category == 2){
                    ?>
                    <div class="row m-2 panel-group">
                        <div class="row mb-3">
                            <div class="col-sm-6">
                                <label for="user_group_menu_trustee" class="form-label">User Group</label>
                                <select class="form-select" id="user_group_menu_trustee" name="user_group_menu_trustee" style="width: 100%;">
                                </select>
                            </div>
                        </div>
                        <ul class="list-group panel panel-default">
                            <?php foreach($DataMenu as $value): ?>
                                <?php if($value['hasChild']): ?>
                                    <li class="list-group-item">
                                        <div class="row m-2">
                                            <div class="col-1">
                                                <a data-bs-toggle="collapse" href="#menu<?= $value['MenuAdminId'] ?>"><i class="fa fa-plus-square-o"></i></a>
                                            </div>
                                            <div class="col-10">
                                                <div class="form-check">
                                                    <input class="form-check-input checkbox_menu" type="checkbox" id="check_menu<?= $value['MenuAdminId'] ?>" data-id="<?= $value['MenuAdminId'] ?>" name="check_menu<?= $value['MenuAdminId'] ?>" value="true">
                                                    <label class="form-check-label" for="check_menu<?= $value['MenuAdminId'] ?>">
                                                        <?= $value['Description'] ?>
                                                    </label>
                                                </div>
                                            </div>
                                            <div id="menu<?= $value['MenuAdminId'] ?>" class="panel-collapse collapse" style="margin-top: 10px; margin-left: 100px;">
                                                <ul class="list-group panel panel-default">
                                                    <?php foreach($DataMenu as $child): ?>
                                                        <?php if ($child['MenuAdminParent'] === $value['MenuAdminId']): ?>
                                                            <li class="list-group-item">
                                                                <div class="form-check">
                                                                    <input class="form-check-input checkbox_menu" type="checkbox" id="check_menu<?= $child['MenuAdminId'] ?>" data-id="<?= $value['MenuAdminId'] ?>" name="check_menu<?= $child['MenuAdminId'] ?>" value="true">
                                                                    <label class="form-check-label" for="check_menu<?= $child['MenuAdminId'] ?>">
                                                                        <?= $child['Description'] ?>
                                                                    </label>
                                                                </div>
                                                            </li>
                                                        <?php endif; ?>
                                                    <?php endforeach; ?>
                                                </ul>
                                            </div>
                                        </div>
                                    </li>
                                <?php else: ?>
                                    <?php if ($value['MenuAdminParent'] === NULL): ?>
                                    <li class="list-group-item">
                                        <div class="row m-2">
                                            <div class="col-1">
                                                &nbsp;
                                            </div>
                                            <div class="col-8">
                                                <div class="form-check">
                                                    <input class="form-check-input checkbox_menu" type="checkbox" id="check_menu<?= $value['MenuAdminId'] ?>" data-id="<?= $value['MenuAdminId'] ?>" name="check_menu<?= $value['MenuAdminId'] ?>" value="true">
                                                    <label class="form-check-label" for="check_menu<?= $value['MenuAdminId'] ?>">
                                                        <?= $value['Description'] ?>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <?php endif; ?>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <?php
                        }else if($Category == 3){
                    ?>
                    <div class="row m-2">
                        <div class="row mb-3">
                            <div class="col-sm-6">
                                <label for="user_group_data_trustee" class="form-label">User Group</label>
                                <select class="form-select" id="user_group_data_trustee" name="user_group_data_trustee" style="width: 100%;">
                                </select>
                            </div>
                        </div>
                        <a href="javascript:void(0)" id="div-trustee-location" data-category="1" class="col-sm-3 card btn btn-outline-secondary justify-content-center align-items-center trustee">
                            Location
                        </a>
                        <a href="javascript:void(0)" id="div-trustee-job-level" data-category="2" class="col-sm-3 card btn btn-outline-secondary justify-content-center align-items-center trustee">
                            Job Level
                        </a>
                        <a href="javascript:void(0)" id="div-trustee-organizatuon" data-category="3" class="col-sm-3 card btn btn-outline-secondary justify-content-center align-items-center trustee">
                            Organization
                        </a>
                        
                        <div class="col-sm-3" id="btn-trustee-location">
                            <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#modal-trustee-location" class="btn btn-primary ml-5">ADD LOCATION</a>
                        </div>
                        
                        <div class="col-sm-3" id="btn-trustee-job-level" style="display: none;">
                            <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#modal-trustee-job-level" class="btn btn-primary ml-5">ADD JOB LEVEL</a>
                        </div>
                        
                        <div class="col-sm-3" id="btn-trustee-organization" style="display: none;">
                            <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#modal-trustee-organization" class="btn btn-primary ml-3">ADD ORGANIZATION</a>
                        </div>
                        
                    </div>
                    <div class="row m-2">
                        <table class="table table-bordered text-center align-middle" id="table-location">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Location Id</th>
                                    <th>Location Name</th>
                                    <th>Status</th>
                                    <th>Last Update</th>
                                    <th>Updated By</th>
                                </tr>
                            </thead>
                            <tbody id="tbody-table-location">
                            </tbody>
                        </table>
                        <table class="table table-bordered text-center align-middle" id="table-job-level" style="display: none;">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Job Level Id</th>
                                    <th>Job Level Name</th>
                                    <th>Status</th>
                                    <th>Last Update</th>
                                    <th>Updated By</th>
                                </tr>
                            </thead>
                            <tbody id="tbody-table-job-level">
                            </tbody>
                        </table>
                        <table class="table table-bordered text-center align-middle" id="table-organization" style="display: none;">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Organization Id</th>
                                    <th>Organization Name</th>
                                    <th>Status</th>
                                    <th>Last Update</th>
                                    <th>Updated By</th>
                                </tr>
                            </thead>
                            <tbody id="tbody-table-organization">
                            </tbody>
                        </table>
                    </div>
                    <?php
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-user-group" tabindex="-1" role="dialog" aria-labelledby="label-user-group" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="label-user-group">Add User Group</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="form_user_group" action="<?php echo base_url() ?>proses-user-group" method="post">
                <div class="modal-body">
                    <div class="row mb-3">
                        <label for="user_group_name" class="col-sm-2 col-form-label required">Name</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="user_group_name" name="user_group_name" placeholder="Name" required>
                        </div>
                        <input type="hidden" class="form-control" id="user_group_function" name="user_group_function" value="Add">
                        <input type="hidden" class="form-control" id="user_group_id" name="user_group_id" value="">
                    </div>
                    <div class="row mb-3">
                        <label for="user_group_type" class="col-sm-2 col-form-label required">Type</label>
                        <div class="col-sm-6">
                            <select class="form-select" id="user_group_type" name="user_group_type" style="width: 100%;" required>
            
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-3 offset-sm-2">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="user_group_organization" name="user_group_organization" value="true">
                                <label class="form-check-label" for="user_group_organization">
                                    By Organization
                                </label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="user_group_job_level" name="user_group_job_level" value="true">
                                <label class="form-check-label" for="user_group_job_level">
                                    By Job Level
                                </label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="user_group_location" name="user_group_location" value="true">
                                <label class="form-check-label" for="user_group_location">
                                    By Location
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="user_group_start_date" class="col-sm-2 col-form-label">Start</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="user_group_start_date" name="user_group_start_date" placeholder="Start Date">
                        </div>
                        <label for="user_group_end_date" class="col-sm-1 col-form-label">End</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="user_group_end_date" name="user_group_end_date" placeholder="End Date">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="user_group_status" class="col-sm-2 col-form-label required">Status</label>
                        <div class="col-sm-10">
                            <select class="form-select" id="user_group_status" name="user_group_status" required>
                                <option value="1">Active</option>
                                <option value="2">Deactive</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-trustee-location" tabindex="-1" role="dialog" aria-labelledby="label-trustee-location" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="label-trustee-location">Add Location</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="form_trustee_location" action="<?php echo base_url() ?>proses-trustee-location" method="post">
                <div class="modal-body">
                    <div class="row mb-3">
                        <label for="user_group_id_location" class="col-sm-2 col-form-label required">User Group</label>
                        <div class="col-sm-10">
                            <select class="form-select" id="user_group_id_location" name="user_group_id_location" style="width: 100%;">
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="location_location" class="col-sm-2 col-form-label required">Location</label>
                        <div class="col-sm-10">
                            <select class="form-select" id="location_location" name="location_location" style="width: 100%;" required>    
                            </select>
                        </div>
                        <input type="hidden" class="form-control" id="function_location" name="function_location" value="Add">
                        <input type="hidden" class="form-control" id="id_location" name="id_location" value="">
                    </div>
                    <div class="row mb-3">
                        <label for="status_location" class="col-sm-2 col-form-label required">Status</label>
                        <div class="col-sm-5">
                            <select class="form-select" id="status_location" name="status_location" required>
                                <option value="1">Active</option>
                                <option value="0">Deactive</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-trustee-job-level" tabindex="-1" role="dialog" aria-labelledby="label-trustee-job-level" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="label-trustee-job-level">Add Job Level</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="form_trustee_job_level" action="<?php echo base_url() ?>proses-trustee-job-level" method="post">
                <div class="modal-body">
                    <div class="row mb-3">
                        <label for="user_group_id_job" class="col-sm-2 col-form-label required">User Group</label>
                        <div class="col-sm-10">
                            <select class="form-select" id="user_group_id_job" name="user_group_id_job" style="width: 100%;">
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="job_level_job" class="col-sm-2 col-form-label required">Job Level</label>
                        <div class="col-sm-10">
                            <select class="form-select" id="job_level_job" name="job_level_job" style="width: 100%;" required>    
                            </select>
                        </div>
                        <input type="hidden" class="form-control" id="function_job" name="function_job" value="Add">
                        <input type="hidden" class="form-control" id="id_job" name="id_job" value="">
                    </div>
                    <div class="row mb-3">
                        <label for="status_job" class="col-sm-2 col-form-label required">Status</label>
                        <div class="col-sm-5">
                            <select class="form-select" id="status_job" name="status_job" required>
                                <option value="1">Active</option>
                                <option value="0">Deactive</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-trustee-organization" tabindex="-1" role="dialog" aria-labelledby="label-trustee-organization" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="label-trustee-organization">Add Organization</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="form_trustee_organization" action="<?php echo base_url() ?>proses-trustee-organization" method="post">
                <div class="modal-body">
                    <div class="row mb-3">
                        <label for="user_group_id_organization" class="col-sm-2 col-form-label required">User Group</label>
                        <div class="col-sm-10">
                            <select class="form-select" id="user_group_id_organization" name="user_group_id_organization" style="width: 100%;">
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="organization_organization" class="col-sm-2 col-form-label required">Organization</label>
                        <div class="col-sm-10">
                            <select class="form-select" id="organization_organization" name="organization_organization" style="width: 100%;" required>    
                            </select>
                        </div>
                        <input type="hidden" class="form-control" id="function_organization" name="function_organization" value="Add">
                        <input type="hidden" class="form-control" id="id_organization" name="id_organization" value="">
                    </div>
                    <div class="row mb-3">
                        <label for="status_organization" class="col-sm-2 col-form-label required">Status</label>
                        <div class="col-sm-5">
                            <select class="form-select" id="status_organization" name="status_organization" required>
                                <option value="1">Active</option>
                                <option value="0">Deactive</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
                </form>
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
    <script>
        <?php if ($this->session->flashdata('success')): ?>
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: '<?php echo $this->session->flashdata('success'); ?>'
            });
        <?php endif; ?>

        <?php if ($Category == 1): ?>
            $('#div-user-group').addClass('bg-secondary text-white unclickable');
        <?php elseif ($Category == 2): ?>
            $('#div-menu-trustee').addClass('bg-secondary text-white unclickable');
        <?php elseif ($Category == 3): ?>
            $('#div-data-trustee').addClass('bg-secondary text-white unclickable');
        <?php endif; ?>

        // <?php if ($CategoryTrustee == 1): ?>
        //     $('#div-trustee-location').addClass('bg-secondary text-white unclickable');
        // <?php elseif ($CategoryTrustee == 2): ?>
        //     $('#div-trustee-job-level').addClass('bg-secondary text-white unclickable');
        // <?php elseif ($CategoryTrustee == 3): ?>
        //     $('#div-trustee-organization').addClass('bg-secondary text-white unclickable');
        // <?php endif; ?>

        $(document).ready(function () {
            getUserGroupType();
            getUserGroup('#user_group_menu_trustee');
            getUserGroup('#user_group_data_trustee');
            getUserGroupLocation();
            getUserGroupJob();
            getUserGroupOrganization();
            getLocation();
            getJobLevel();
            getOrganization();

			$('.status').on('click', function () {
                var category = $(this).data('category');
                window.open('<?= base_url() ?>SystemManager?category=' + category, '_self');
			});

            $('.trustee').on('click', function () {
                var category = $(this).data('category');
                if(category == 1){
                    $('#btn-trustee-location').show();
                    $('#btn-trustee-job-level').hide();
                    $('#btn-trustee-organization').hide();
                    $('#table-location').show();
                    $('#table-job-level').hide();
                    $('#table-organization').hide();
                }else if(category == 2){
                    $('#btn-trustee-location').hide();
                    $('#btn-trustee-job-level').show();
                    $('#btn-trustee-organization').hide();
                    $('#table-location').hide();
                    $('#table-job-level').show();
                    $('#table-organization').hide();
                }else if(category == 3){
                    $('#btn-trustee-location').hide();
                    $('#btn-trustee-job-level').hide();
                    $('#btn-trustee-organization').show();
                    $('#table-location').hide();
                    $('#table-job-level').hide();
                    $('#table-organization').show();
                }else{
                    $('#btn-trustee-location').hide();
                    $('#btn-trustee-job-level').hide();
                    $('#btn-trustee-organization').hide();
                    $('#table-location').hide();
                    $('#table-job-level').hide();
                    $('#table-organization').hide();
                }
			});

            var pickrStart = flatpickr("#user_group_start_date", {
                dateFormat: "Y-m-d",
                inline: false,
                altInput: true,
                altFormat: "Y-m-d",
                allowInput: true
            });

            var pickrEnd = flatpickr("#user_group_end_date", {
                dateFormat: "Y-m-d",
                inline: false,
                altInput: true,
                altFormat: "Y-m-d",
                allowInput: true
            });

            function getUserGroupType(){
                $("#user_group_type").select2({
                    dropdownParent: $('#modal-user-group'),
                    placeholder: 'Choose User Group Type',
                    ajax: { 
                        url: '<?= base_url() ?>get-group-type',
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
                                    id: item.GroupTypeId,
                                    text: item.GroupTypeName
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
                $("#location_location").select2({
                    dropdownParent: $('#modal-trustee-location'),
                    placeholder: 'Choose Location',
                    ajax: { 
                        url: '<?= base_url() ?>get-od-location',
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

            function getJobLevel(){
                $("#job_level_job").select2({
                    dropdownParent: $('#modal-trustee-job-level'),
                    placeholder: 'Choose Job Level',
                    ajax: { 
                        url: '<?= base_url() ?>get-od-job-level',
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

            function getOrganization(){
                $("#organization_organization").select2({
                    dropdownParent: $('#modal-trustee-organization'),
                    placeholder: 'Choose Organization',
                    ajax: { 
                        url: '<?= base_url() ?>get-od-organization',
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

            function getUserGroupLocation(){
                $('#user_group_id_location').select2({
                    dropdownParent: $('#modal-trustee-location'),
                    placeholder: 'Choose User Group',
                    ajax: { 
                        url: '<?= base_url() ?>get-user-group',
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
                                    id: item.SMGroupId,
                                    text: item.Description
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

            function getUserGroupJob(){
                $('#user_group_id_job').select2({
                    dropdownParent: $('#modal-trustee-job-level'),
                    placeholder: 'Choose User Group',
                    ajax: { 
                        url: '<?= base_url() ?>get-user-group',
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
                                    id: item.SMGroupId,
                                    text: item.Description
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

            function getUserGroupOrganization(){
                $('#user_group_id_organization').select2({
                    dropdownParent: $('#modal-trustee-organization'),
                    placeholder: 'Choose User Group',
                    ajax: { 
                        url: '<?= base_url() ?>get-user-group',
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
                                    id: item.SMGroupId,
                                    text: item.Description
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

            function getUserGroup(field = ''){
                $(field).select2({
                    placeholder: 'Choose User Group',
                    ajax: { 
                        url: '<?= base_url() ?>get-user-group',
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
                                    id: item.SMGroupId,
                                    text: item.Description
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

            function refreshMenuUserGroup(id = null) {
                $.ajax({
                    url: '<?= base_url() ?>view-menu-user-group',
                    type: 'POST',
                    data: { 'id' : id },
                    success: function(response) {
                        var jsonResponse = JSON.parse(response);
                        console.log(jsonResponse);
                        $.each(jsonResponse, function(index, item){
                            if(item.IsActive){
                                $('#check_menu' + item.MenuAdminId).prop('checked', true);
                            }else{
                                $('#check_menu' + item.MenuAdminId).prop('checked', false);
                            }
                        });

                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            }

            function refreshLocation(id = null) {
                $.ajax({
                    url: '<?= base_url() ?>view-location-user-group',
                    type: 'POST',
                    data: { 'id' : id },
                    success: function(response) {
                        var jsonResponse = JSON.parse(response);
                        console.log(jsonResponse);
                        $.each(jsonResponse, function(index, item){
                            var html = '';

                            html += '<tr>' +
                                    '<td width="13%">'+
                                    '<a class="btn btn-warning mr-1 edit-location" href="javascript:void(0)" data-id="' + item.SMGroupDataLocationId + '" data-bs-toggle="modal" data-bs-target="#modal-trustee-location"><i class="fa fa-pencil"></i></a>'+
                                    '<a class="btn btn-danger delete-location" href="javascript:void(0)" data-id="' + item.SMGroupDataLocationId + '"><i class="fa fa-trash"></i></a>'+
                                    '</td>'+
                                    '<td>' + item.LocationData.Id + '</td>'+
                                    '<td>' + item.LocationData.Name + '</td>'+
                                    '<td>' + item.IsActive + '</td>'+
                                    '<td>' + item.EditDate + '</td>'+
                                    '<td>' + item.EditBy + '</td>'+
                                    '</tr>';
                            
                            $('#tbody-table-location').append(html);
                        });

                        $('.edit-location').on('click', function() {
                            var id = $(this).data('id');

                            $.ajax({
                                url: '<?= base_url() ?>view-trustee-location',
                                type: 'POST',
                                data: { 'id' : id },
                                success: function(response) {
                                    var jsonResponse = JSON.parse(response);
                                    var newOptionGroup = new Option(jsonResponse.SMGroupDataTrusteeLocation.SMGroupData.Description, jsonResponse.SMGroupDataTrusteeLocation.SMGroupData.SMGroupId, false, false);
                                    $('#user_group_id_location').append(newOptionGroup).trigger('change');
                                    var newOptionLocation = new Option(jsonResponse.SMGroupDataTrusteeLocation.LocationData.Name, jsonResponse.SMGroupDataTrusteeLocation.LocationData.Id, false, false);
                                    $('#location_location').append(newOptionLocation).trigger('change');
                                    $('#status_location').val(jsonResponse.SMGroupDataTrusteeLocation.IsActive).trigger('change');
                                    $('#function_location').val('Edit');
                                    $('#id_location').val(jsonResponse.SMGroupDataTrusteeLocation.SMGroupDataLocationId);
                                },
                                error: function(xhr, status, error) {
                                    console.error(error);
                                }
                            });
                        });

                        $('.delete-location').on('click', function() {
                            var id = $(this).data('id');

                            Swal.fire({
                                title: 'Are you sure?',
                                text: "You won't be able to revert this!",
                                icon: 'warning',
                                showCancelButton: true,
                                confirmButtonColor: '#d33',
                                cancelButtonColor: '#3085d6',
                                confirmButtonText: 'Yes, delete it!'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    $.ajax({
                                        url: '<?= base_url() ?>delete-trustee-location',
                                        type: 'POST',
                                        data: { 'id' : id },
                                        success: function(response) {
                                            var jsonResponse = JSON.parse(response);
                                            if(jsonResponse.status){
                                                Swal.fire(
                                                    'Deleted!',
                                                    'Your item has been deleted.',
                                                    'success'
                                                ).then((result) => {
                                                    if (result.isConfirmed) {
                                                        window.location.href = '<?= base_url() ?>SystemManager';
                                                    }
                                                });
                                            }else{
                                                Swal.fire(
                                                    'Failed!',
                                                    'Your item failed to delete.',
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
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            }

            function refreshJobLevel(id = null) {
                $.ajax({
                    url: '<?= base_url() ?>view-job-level-user-group',
                    type: 'POST',
                    data: { 'id' : id },
                    success: function(response) {
                        var jsonResponse = JSON.parse(response);
                        $.each(jsonResponse, function(index, item){
                            var html = '';

                            html += '<tr>' +
                                    '<td width="13%">'+
                                    '<a class="btn btn-warning edit-job-level" href="javascript:void(0)" data-id="' + item.SMGroupDataJobLevelId + '" data-bs-toggle="modal" data-bs-target="#modal-trustee-job-level"><i class="fa fa-pencil"></i></a>'+
                                    '<a class="btn btn-danger delete-job-level" href="javascript:void(0)" data-id="' + item.SMGroupDataJobLevelId + '"><i class="fa fa-trash"></i></a>'+
                                    '</td>'+
                                    '<td>' + item.JobLevelData.Id + '</td>'+
                                    '<td>' + item.JobLevelData.Name + '</td>'+
                                    '<td>' + item.IsActive + '</td>'+
                                    '<td>' + item.EditDate + '</td>'+
                                    '<td>' + item.EditBy + '</td>'+
                                    '</tr>';
                            
                            $('#tbody-table-job-level').append(html);
                        });

                        $('.edit-job-level').on('click', function() {
                            var id = $(this).data('id');

                            $.ajax({
                                url: '<?= base_url() ?>view-trustee-job-level',
                                type: 'POST',
                                data: { 'id' : id },
                                success: function(response) {
                                    var jsonResponse = JSON.parse(response);
                                    var newOptionGroup = new Option(jsonResponse.SMGroupDataTrusteeJobLevel.SMGroupData.Description, jsonResponse.SMGroupDataTrusteeJobLevel.SMGroupData.SMGroupId, false, false);
                                    $('#user_group_id_job').append(newOptionGroup).trigger('change');
                                    var newOptionJobLevel = new Option(jsonResponse.SMGroupDataTrusteeJobLevel.JobLevelData.Name, jsonResponse.SMGroupDataTrusteeJobLevel.JobLevelData.Id, false, false);
                                    $('#job_level_job').append(newOptionJobLevel).trigger('change');
                                    $('#status_job').val(jsonResponse.SMGroupDataTrusteeJobLevel.IsActive).trigger('change');
                                    $('#function_job').val('Edit');
                                    $('#id_job').val(jsonResponse.SMGroupDataTrusteeJobLevel.SMGroupDataJobLevelId);
                                },
                                error: function(xhr, status, error) {
                                    console.error(error);
                                }
                            });
                        });

                        $('.delete-job-level').on('click', function() {
                            var id = $(this).data('id');

                            Swal.fire({
                                title: 'Are you sure?',
                                text: "You won't be able to revert this!",
                                icon: 'warning',
                                showCancelButton: true,
                                confirmButtonColor: '#d33',
                                cancelButtonColor: '#3085d6',
                                confirmButtonText: 'Yes, delete it!'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    $.ajax({
                                        url: '<?= base_url() ?>delete-trustee-job-level',
                                        type: 'POST',
                                        data: { 'id' : id },
                                        success: function(response) {
                                            var jsonResponse = JSON.parse(response);
                                            if(jsonResponse.status){
                                                Swal.fire(
                                                    'Deleted!',
                                                    'Your item has been deleted.',
                                                    'success'
                                                ).then((result) => {
                                                    if (result.isConfirmed) {
                                                        window.location.href = '<?= base_url() ?>SystemManager';
                                                    }
                                                });
                                            }else{
                                                Swal.fire(
                                                    'Failed!',
                                                    'Your item failed to delete.',
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
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            }

            function refreshOrganization(id = null) {
                $.ajax({
                    url: '<?= base_url() ?>view-organization-user-group',
                    type: 'POST',
                    data: { 'id' : id },
                    success: function(response) {
                        var jsonResponse = JSON.parse(response);
                        $.each(jsonResponse, function(index, item){
                            var html = '';

                            html += '<tr>' +
                                    '<td width="13%">'+
                                    '<a class="btn btn-warning edit-organization" href="javascript:void(0)" data-id="' + item.SMGroupDataTrusteeOrgId + '" data-bs-toggle="modal" data-bs-target="#modal-trustee-organization"><i class="fa fa-pencil"></i></a>'+
                                    '<a class="btn btn-danger delete-organization" href="javascript:void(0)" data-id="' + item.SMGroupDataTrusteeOrgId + '"><i class="fa fa-trash"></i></a>'+
                                    '</td>'+
                                    '<td>' + item.OrganizationData.Id + '</td>'+
                                    '<td>' + item.OrganizationData.Name + '</td>'+
                                    '<td>' + item.IsActive + '</td>'+
                                    '<td>' + item.EditDate + '</td>'+
                                    '<td>' + item.EditBy + '</td>'+
                                    '</tr>';
                            
                            $('#tbody-table-organization').append(html);
                        });

                        $('.edit-organization').on('click', function() {
                            var id = $(this).data('id');

                            $.ajax({
                                url: '<?= base_url() ?>view-trustee-organization',
                                type: 'POST',
                                data: { 'id' : id },
                                success: function(response) {
                                    var jsonResponse = JSON.parse(response);
                                    var newOptionGroup = new Option(jsonResponse.SMGroupDataTrusteeOrg.SMGroupData.Description, jsonResponse.SMGroupDataTrusteeOrg.SMGroupData.SMGroupId, false, false);
                                    $('#user_group_id_organization').append(newOptionGroup).trigger('change');
                                    var newOptionOrganization = new Option(jsonResponse.SMGroupDataTrusteeOrg.OrganizationData.Name, jsonResponse.SMGroupDataTrusteeOrg.OrganizationData.Id, false, false);
                                    $('#organization_organization').append(newOptionOrganization).trigger('change');
                                    $('#status_organization').val(jsonResponse.SMGroupDataTrusteeOrg.IsActive).trigger('change');
                                    $('#function_organization').val('Edit');
                                    $('#id_organization').val(jsonResponse.SMGroupDataTrusteeOrg.SMGroupDataTrusteeOrgId);
                                },
                                error: function(xhr, status, error) {
                                    console.error(error);
                                }
                            });
                        });

                        $('.delete-organization').on('click', function() {
                            var id = $(this).data('id');

                            Swal.fire({
                                title: 'Are you sure?',
                                text: "You won't be able to revert this!",
                                icon: 'warning',
                                showCancelButton: true,
                                confirmButtonColor: '#d33',
                                cancelButtonColor: '#3085d6',
                                confirmButtonText: 'Yes, delete it!'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    $.ajax({
                                        url: '<?= base_url() ?>delete-trustee-organization',
                                        type: 'POST',
                                        data: { 'id' : id },
                                        success: function(response) {
                                            var jsonResponse = JSON.parse(response);
                                            if(jsonResponse.status){
                                                Swal.fire(
                                                    'Deleted!',
                                                    'Your item has been deleted.',
                                                    'success'
                                                ).then((result) => {
                                                    if (result.isConfirmed) {
                                                        window.location.href = '<?= base_url() ?>SystemManager';
                                                    }
                                                });
                                            }else{
                                                Swal.fire(
                                                    'Failed!',
                                                    'Your item failed to delete.',
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
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            }

            $('#user_group_menu_trustee').on('change', function() {
                var id = $(this).val();
                
                refreshMenuUserGroup(id);
            });

            $('#user_group_data_trustee').on('change', function() {
                var id = $(this).val();
                
                refreshLocation(id);
                refreshJobLevel(id);
                refreshOrganization(id);
            });

            $('.checkbox_menu').on('change', function() {
                var id = $(this).data('id');
                var checked = this.checked;
                var group_id = $('#user_group_menu_trustee').val();
                
                $.ajax({
                    url: '<?= base_url() ?>change-menu-user-group',
                    type: 'POST',
                    data: { 'id' : id, 'checked' : checked, 'group_id' : group_id },
                    success: function(response) {
                        var jsonResponse = JSON.parse(response);
                        if(jsonResponse.status){
                            Swal.fire(
                                'Success!',
                                'Succesfully changed.',
                                'success'
                            ).then((result) => {
                                refreshMenuUserGroup(group_id);
                            });
                        }else{
                            Swal.fire(
                                'Failed!',
                                'Failed to change.',
                                'error'
                            )
                        }

                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            });

            $('.edit-user-group').on('click', function() {
                var id = $(this).data('id');

                $.ajax({
                    url: '<?= base_url() ?>view-user-group',
                    type: 'POST',
                    data: { 'id' : id },
                    success: function(response) {
                        var jsonResponse = JSON.parse(response);
                        var newOption = new Option(jsonResponse.GroupType.GroupTypeName, jsonResponse.GroupType.GroupTypeId, false, false);
                        $('#user_group_type').append(newOption).trigger('change');
                        pickrStart.setDate(jsonResponse.SMGroup.StartDate);
                        pickrEnd.setDate(jsonResponse.SMGroup.EndDate);
                        $('#user_group_status').val(jsonResponse.SMGroup.IsActive).trigger('change');
                        $('#user_group_function').val('Edit');
                        $('#user_group_name').val(jsonResponse.SMGroup.Description);
                        $('#user_group_id').val(jsonResponse.SMGroup.SMGroupId);
                        if(jsonResponse.SMGroup.IsOrganization){
                            $('#user_group_organization').prop('checked', true);
                        }else{
                            $('#user_group_organization').prop('checked', false);
                        }
                        if(jsonResponse.SMGroup.IsJobLevel){
                            $('#user_group_job_level').prop('checked', true);
                        }else{
                            $('#user_group_job_level').prop('checked', false);
                        }
                        if(jsonResponse.SMGroup.IsLocation){
                            $('#user_group_location').prop('checked', true);
                        }else{
                            $('#user_group_location').prop('checked', false);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            });

            $('.delete-user-group').on('click', function() {
                var id = $(this).data('id');

                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: '<?= base_url() ?>delete-user-group',
                            type: 'POST',
                            data: { 'id' : id },
                            success: function(response) {
                                var jsonResponse = JSON.parse(response);
                                if(jsonResponse.status){
                                    Swal.fire(
                                        'Deleted!',
                                        'Your item has been deleted.',
                                        'success'
                                    ).then((result) => {
                                        if (result.isConfirmed) {
                                            window.location.href = '<?= base_url() ?>SystemManager';
                                        }
                                    });
                                }else{
                                    Swal.fire(
                                        'Failed!',
                                        'Your item failed to delete.',
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
		});
	</script>
</body>
</html>
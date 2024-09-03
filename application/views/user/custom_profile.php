<!DOCTYPE html>
<html>
<head>
    <title>Your Application Jobs</title>
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
      min-height: 0;
      display: flex;
      flex-direction: column;
      padding: 10px;
      background-color: white;
    }

    /* Gaya div bagian atas secara horizontal */
    .top-container {
      flex: 0 0 100px; /* Tinggi div bagian atas */
      display: flex;
      flex-direction: row;
      background-color: lightgreen;
    }

    /* Gaya div bagian atas */
    .top-div {
      flex: 1;
      overflow-y: scroll;
      background-color: lightgray;
    }

    /* Gaya div bagian bawah */
    .bottom-container {
      flex: 1;
      display: flex;
      flex-direction: row;
      overflow: hidden; /* Menghilangkan scrollbar pada bagian bawah */
    }

    /* Gaya div kiri (30%) di bagian bawah */
    .bottom-left {
      flex: 0 0 30%;
      overflow-y: scroll;
      background-color: lightcoral;
    }

    /* Gaya div kanan (70%) di bagian bawah */
    .bottom-right {
      flex: 0 0 70%;
      overflow-y: scroll;
      background-color: lightpink;
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

    .red-light-card-header {
        background-color: #dc3545; /* Same as btn-danger color */
        color: #fff; /* White text for better visibility */
    }

    .sidebar-item {
        border: none;
        padding-top: 15px;
        padding-left: 30px;
    }

    .sidebar-item span {
        padding-left: 10px;
    }

    #sidebar-wrapper .sidebar-heading {
        padding: 0.675rem 1.15rem;
        display: flex;
        justify-content: center; /* Center horizontally */
        align-items: center
    }

    .card a{
        text-decoration: none;
        color: #000;
    }

    .card-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .profile-pict, .profile-pict-basic {
    position: relative;
    width: 90px;
    height: 90px;
    overflow: hidden;
    border-radius: 50%;
    background-color: #f2f2f2;
    }

    .profile-pict img, .profile-pict-basic img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    }

    .profile-pict-overlay, .profile-pict-basic-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    background-color: rgba(0, 0, 0, 0.5);
    cursor: pointer;
    opacity: 0;
    transition: opacity 0.2s ease;
    }

    .profile-pict:hover .profile-pict-overlay,
    .profile-pict-basic:hover .profile-pict-basic-overlay  {
    opacity: 1;
    }

    .profile-pict img, .profile-pict-basic img {
    display: block;
    }

    .profile-pict img,
    .profile-pict-overlay img,
    .profile-pict-basic img,
    .profile-pict-basic-overlay img {
    width: 90px;
    height: 90px;
    }

    .sortable-list {
    width: 100%;
    padding: 25px;
    background: #fff;
    border-radius: 7px;
    padding: 30px 25px 20px;
    box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
    }
    .sortable-list .item {
    list-style: none;
    display: flex;
    cursor: move;
    background: #fff;
    align-items: center;
    border-radius: 5px;
    padding: 10px 13px;
    margin-bottom: 11px;
    /* box-shadow: 0 2px 4px rgba(0,0,0,0.06); */
    border: 1px solid #ccc;
    justify-content: space-between;
    }
    .item .details {
    display: flex;
    align-items: center;
    }
    .item .details img {
    height: 43px;
    width: 43px;
    pointer-events: none;
    margin-right: 12px;
    object-fit: cover;
    border-radius: 50%;
    }
    .item .details span {
    font-size: 1.13rem;
    }
    .item i {
    color: #474747;
    font-size: 1.13rem;
    }
    .item.dragging {
    opacity: 0.6;
    }
    .item.dragging :where(.details, i) {
    opacity: 0;
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

    .dropdown-menu {
        /* Add your styles for the dropdown menu here */
        position: absolute; /* Position the dropdown absolutely */
        top: 100%; /* Place the dropdown below the .top-container */
        left: 0; /* Align the dropdown with the left edge of the .top-container */
        background-color: white; /* Sample background color */
        border: 1px solid #ccc; /* Sample border style */
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

    .custom-select2-container {
        position: absolute;
        z-index: 9999;
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
                    <button id="sidebarToggle" style="background-color: #fff; border:none; outline: none;">&#9776;</button>
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
                <div class="row">
                    <div class="col-10">
                        <h4 style="padding-top: 10px;">Profile</h4>
                    </div>
                </div>
                <hr>
                <div class="row" id="div-profile">
                    <div class="col-9">
                        <div class="card mt-1">
                            <div class="card-header">
                                <a class="required" data-bs-toggle="collapse" data-bs-parent="#div-profile" href="#basic-information">
                                    Basic Information
                                </a>
                                <button class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#modal-basic-information" id="edit-basic" style="margin-top: 0;">Edit</button>
                            </div>

                            <div id="basic-information" class="collapse show">
                                <div class="card-body">
                                    <div class="row mb-3">
                                        <div class="col-sm-2">
                                            <div class="profile-pict">
                                                <input type="file" id="add_profile" name="add_profile" style="display: none" accept="image/*">
                                                <label for="add_profile" class="profile-pict-overlay">
                                                    <i class="fa fa-camera"></i>
                                                    <!-- <img src="camera-icon.png" alt="Camera Icon"> -->
                                                </label>
                                                <?php
                                                    if(empty($CanProfile['PhotoProfile'])){
                                                ?>
                                                <img src="<?php echo base_url() ?>assets/template/images/avatar/no-photo.PNG" alt="Profile Picture" id="img-photo-profile" class="rounded-image">
                                                <?php
                                                    } else {
                                                ?>
                                                <img src="<?php echo base_url() ?>assets/template/images/avatar/<?= $CanProfile['PhotoProfile'] ?>" alt="Profile Picture" id="img-photo-profile" class="rounded-image">
                                                <?php
                                                    }
                                                ?>
                                            </div>
                                            <p class="mt-1" style="font-size: 12px;">Acceptance JPG</p>
                                        </div>
                                        <div class="col-sm-6">
                                            <p><i class="fa fa-user"></i> <?= (!empty($CanProfile['FirstName'])) ? $CanProfile['FirstName'] : '-' ?> </p>
                                            <p><i class="fa fa-map-marker"></i> <?= (!empty($CanProfile['CityName'])) ? $CanProfile['CityName'] . ',' : '-' ?>
                                                <?= (!empty($CanProfile['ProvinceName'])) ? $CanProfile['ProvinceName'] . ',' : '-' ?>
                                                <?= (!empty($CanProfile['CountryName'])) ? $CanProfile['CountryName'] . ',' : '-' ?>
                                            </p>
                                            <p><i class="fa fa-envelope"></i> <?= (!empty($CanProfile['Email'])) ? $CanProfile['Email'] : '-' ?> </p>
                                            <p><i class="fa fa-mobile"></i> +<?= (!empty($CanProfile['PhoneNumber'])) ? $CanProfile['PhoneNumberCode'] .' '. $CanProfile['PhoneNumber'] : '-' ?> </p>
                                        </div>
                                        <div class="col-sm-4">
                                            <p><i class="fa fa-eye"></i> 0 views </p>
                                            <p><i class="fa fa-signal"></i> Online Now </p>
                                            <p><i class="fa fa-search"></i> <?= (!empty($CanProfile['JobSeekingStatusName'])) ? $CanProfile['JobSeekingStatusName'] : '-' ?> </p>
                                            <a href="<?php echo base_url() ?>download-profile" target="_blank" class="btn btn-outline-primary" style="margin-top: 0;"><i class="fa fa-download"></i> Download Profile</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card mt-1">
                            <div class="card-header">
                                <a class="required" data-bs-toggle="collapse" data-bs-parent="#div-profile" href="#salary-expectation">
                                    Salary Expectation
                                </a>
                                <?php
                                if(!empty($SalaryExpectation)){
                                    $functionSalaryExpectation = 'Edit';
                                }else{
                                    $functionSalaryExpectation = 'Add';
                                }
                                ?>
                                <button class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#modal-salary-expectation" id="edit-salary" style="margin-top: 0;"><?= $functionSalaryExpectation ?></button>
                            </div>

                            <div id="salary-expectation" class="collapse show" aria-labelledby="salary-expectation" data-parent="#div-profile">
                                <div class="card-body">
                                    <?php
                                        if(!empty($SalaryExpectation)){
                                            foreach($SalaryExpectation as $value){
                                    ?>
                                    <div class="row mb-3">
                                        <label for="" class="col-sm-2 col-form-label text-center"><?= $value['CurrencyName'] ?></label>
                                        <label for="" class="col-sm-9 col-form-label"><strong><?= $value['Display'] ?></strong></label>
                                        <label for="" class="col-sm-1 col-form-label"><a href="#" class="delete-salary" data-id="<?= $value['CanSalaryExpectitionId'] ?>"><i class="fa fa-trash"></i></a></label>
                                    </div>
                                    <?php
                                            }
                                        }else{
                                    ?>
                                        <p>Provide a salary range for better job matches & increase chances to get hired by the perfect company. <b>Click Add a the top right corner to Add Salary</b></p>
                                    <?php
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="card mt-1">
                            <div class="card-header">
                                <a class="required" data-bs-toggle="collapse" data-bs-parent="#div-profile" href="#work-experience">
                                    Work Experience
                                </a>
                                
                                <button class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#modal-work-experience" style="margin-top: 0;">Add</button>
                            </div>

                            <div id="work-experience" class="collapse show" aria-labelledby="work-experience" data-parent="#div-profile">
                                <div class="card-body">
                                    <?php
                                        if(!empty($WorkExperience)){
                                            foreach($WorkExperience as $value){
                                    ?>
                                    <div class="row mb-3">
                                        <label for="" class="col-sm-3 col-form-label text-center"><?= $value['Period'] ?></label>
                                        <label for="" class="col-sm-7 col-form-label"><strong><?= $value['Name'] ?></strong></label>
                                        <label for="" class="col-sm-1 col-form-label"><a href="#" class="delete-work-experience" data-id="<?= $value['CanWorkExperienceId'] ?>"><i class="fa fa-trash"></i></a></label>
                                        <label for="" class="col-sm-1 col-form-label"><a href="#" class="edit-work-experience" data-id="<?= $value['CanWorkExperienceId'] ?>" data-bs-toggle="modal" data-bs-target="#modal-work-experience"><i class="fa fa-pencil"></i></a></label>
                                    </div>
                                    <?php
                                            }
                                        }else{
                                    ?>
                                        <p>Add your work experiences for better job matches & increase chances to get hired by the perfect company. <b>Click Add a the top right corner to Add Work Experience</b></p>
                                    <?php
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="card mt-1">
                            <div class="card-header">
                                <a class="required" data-bs-toggle="collapse" data-bs-parent="#div-profile" href="#education">
                                    Education
                                </a>
                                
                                <button class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#modal-education" style="margin-top: 0;">Add</button>
                            </div>

                            <div id="education" class="collapse show" aria-labelledby="education" data-parent="#div-profile">
                                <div class="card-body">
                                    <?php
                                        if(!empty($Education)){
                                            foreach($Education as $value){
                                    ?>
                                    <div class="row mb-3">
                                        <label for="" class="col-sm-3 col-form-label text-center"><?= $value['Period'] ?></label>
                                        <label for="" class="col-sm-7 col-form-label"><strong><?= $value['Name'] ?></strong></label>
                                        <label for="" class="col-sm-1 col-form-label"><a href="#" class="delete-education" data-id="<?= $value['CanEducationId'] ?>"><i class="fa fa-trash"></i></a></label>
                                        <label for="" class="col-sm-1 col-form-label"><a href="#" class="edit-education" data-id="<?= $value['CanEducationId'] ?>" data-bs-toggle="modal" data-bs-target="#modal-education"><i class="fa fa-pencil"></i></a></label>
                                    </div>
                                    <?php
                                            }
                                        }else{
                                    ?>
                                        <p>Add your education for better job matches & increase chances to get hired by the perfect company. <b>Click Add a the top right corner to Add Education</b></p>
                                    <?php
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="card mt-1">
                            <div class="card-header">
                                <a class="required" data-bs-toggle="collapse" data-bs-parent="#div-profile" href="#skills">
                                    Skills
                                </a>
                                <button class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#modal-skills" style="margin-top: 0;">Add</button>
                            </div>

                            <div id="skills" class="collapse show" aria-labelledby="skills" data-parent="#div-profile">
                                <div class="card-body">
                                    <?php
                                        if(!empty($Skill)){
                                            foreach($Skill as $value){
                                    ?>
                                    <div class="row mb-3">
                                        <label for="" class="col-sm-3 col-form-label text-center"><?= $value['LevelSkillName'] ?></label>
                                        <label for="" class="col-sm-8 col-form-label"><strong><?= is_null($value['SkillName']) ? $value['OtherSkillName'] : $value['SkillName'] ?></strong></label>
                                        <label for="" class="col-sm-1 col-form-label"><a href="#" class="delete-skill" data-id="<?= $value['CanSkillId'] ?>"><i class="fa fa-trash"></i></a></label>
                                    </div>
                                    <?php
                                            }
                                        }else{
                                    ?>
                                        <p>Enumerate your skills, competencies, and talents relevant to the position and industry you are applying to. Indicate proficiency levels (Basic, Novice, Intermediate, Advanced, Expert) for each skill. <b>Click Add a the top right corner to Add Skills</b></p>
                                    <?php
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="card mt-1">
                            <div class="card-header">
                                <a data-bs-toggle="collapse" data-bs-parent="#div-profile" href="#summary">
                                    Summary
                                </a>
                                <?php
                                if(!empty($Summary)){
                                    $functionSummary = 'Edit';
                                }else{
                                    $functionSummary = 'Add';
                                }
                                ?>
                                <button class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#modal-summary" id="edit-summary" style="margin-top: 0;"><?= $functionSummary ?></button>
                            </div>

                            <div id="summary" class="collapse show" aria-labelledby="summary" data-parent="#div-profile">
                                <div class="card-body">
                                    <?php
                                        if(!empty($Summary)){
                                            foreach($Summary as $value){
                                    ?>
                                    <div class="row mb-3">
                                        <label for="" class="col-sm-11 col-form-label"><?= $value['description'] ?></label>
                                        <label for="" class="col-sm-1 col-form-label"><a href="#" class="delete-summary" data-id="<?= $value['CanSummaryId'] ?>"><i class="fa fa-trash"></i></a></label>
                                    </div>
                                    <?php
                                            }
                                        }else{
                                    ?>
                                        <p>This is your chance to show who you are. If an employer is skimming, you want to include skills, competencies, and information about yourself that are most relevent to the job. <b>Click Add a the top right corner to Add Summary</b></p>
                                    <?php
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="card mt-1">
                            <div class="card-header">
                                <a data-bs-toggle="collapse" data-bs-parent="#div-profile" href="#affiliations">
                                    Affiliations
                                </a>
                                <button class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#modal-affiliations">Add</button>
                            </div>

                            <div id="affiliations" class="collapse show" aria-labelledby="affiliations" data-parent="#div-profile">
                                <div class="card-body">
                                    <?php
                                        if(!empty($Affiliation)){
                                            foreach($Affiliation as $value){
                                    ?>
                                    <div class="row mb-3">
                                        <label for="" class="col-sm-3 col-form-label text-center"><?= $value['Period'] ?></label>
                                        <label for="" class="col-sm-7 col-form-label"><strong><?= $value['Name'] ?></strong></label>
                                        <label for="" class="col-sm-1 col-form-label"><a href="#" class="delete-affiliation" data-id="<?= $value['CanAffiliationId'] ?>"><i class="fa fa-trash"></i></a></label>
                                        <label for="" class="col-sm-1 col-form-label"><a href="#" class="edit-affiliation" data-id="<?= $value['CanAffiliationId'] ?>" data-bs-toggle="modal" data-bs-target="#modal-affiliations"><i class="fa fa-pencil"></i></a></label>
                                    </div>
                                    <?php
                                            }
                                        }else{
                                    ?>
                                        <p>Whether or not you have work experience, building your resume with co-curricular activities outside of work will help employers understand the type of worker you might be. <b>Click Add a the top right corner to Add Affiliations</b></p>
                                    <?php
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="card mt-1">
                            <div class="card-header">
                                <a data-bs-toggle="collapse" data-bs-parent="#div-profile" href="#seminars-trainings">
                                    Seminars and Trainings
                                </a>
                                
                                <button class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#modal-seminars-trainings">Add</button>
                            </div>

                            <div id="seminars-trainings" class="collapse show" aria-labelledby="seminars-trainings" data-parent="#div-profile">
                                <div class="card-body">
                                    <?php
                                        if(!empty($Seminar)){
                                            foreach($Seminar as $value){
                                    ?>
                                    <div class="row mb-3">
                                        <label for="" class="col-sm-3 col-form-label text-center"><?= $value['Period'] ?></label>
                                        <label for="" class="col-sm-7 col-form-label"><strong><?= $value['SeminarTrainingName'] ?> by <?= $value['Organizer'] ?></strong></label>
                                        <label for="" class="col-sm-1 col-form-label"><a href="#" class="delete-seminar" data-id="<?= $value['CanSeminarTrainingId'] ?>"><i class="fa fa-trash"></i></a></label>
                                        <label for="" class="col-sm-1 col-form-label"><a href="#" class="edit-seminar" data-id="<?= $value['CanSeminarTrainingId'] ?>" data-bs-toggle="modal" data-bs-target="#modal-seminars-trainings"><i class="fa fa-pencil"></i></a></label>
                                    </div>
                                    <?php
                                            }
                                        }else{
                                    ?>
                                        <p>This section is another way of telling employers that you have certain skills and insights from other professionals. Attending these events also says that your are a proactive learner. <b>Click Add a the top right corner to Add Seminars and Trainings</b></p>
                                    <?php
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="card mt-1">
                            <div class="card-header">
                                <a data-bs-toggle="collapse" data-bs-parent="#div-profile" href="#awards-achievements">
                                    Awards and Achievements
                                </a>
                                
                                <button class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#modal-awards-achievements">Add</button>
                            </div>

                            <div id="awards-achievements" class="collapse show" aria-labelledby="awards-achievements" data-parent="#div-profile">
                                <div class="card-body">
                                    <?php
                                        if(!empty($Award)){
                                            foreach($Award as $value){
                                    ?>
                                    <div class="row mb-3">
                                        <label for="" class="col-sm-3 col-form-label text-center"><?= $value['Period'] ?></label>
                                        <label for="" class="col-sm-7 col-form-label"><strong><?= $value['Name'] ?></strong></label>
                                        <label for="" class="col-sm-1 col-form-label"><a href="#" class="delete-award" data-id="<?= $value['CanAwardId'] ?>"><i class="fa fa-trash"></i></a></label>
                                        <label for="" class="col-sm-1 col-form-label"><a href="#" class="edit-award" data-id="<?= $value['CanAwardId'] ?>" data-bs-toggle="modal" data-bs-target="#modal-awards-achievements"><i class="fa fa-pencil"></i></a></label>
                                    </div>
                                    <?php
                                            }
                                        }else{
                                    ?>
                                        <p>Assess the industry you are looking to enter and include related or noteworthy awards and recognition you've received in the past. <b>Click Add a the top right corner to Add Awards and Achievements</b></p>
                                    <?php
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="card mt-1">
                            <div class="card-header">
                                <a data-bs-toggle="collapse" data-bs-parent="#div-profile" href="#test-scores">
                                    Test Scores
                                </a>
                                
                                <button class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#modal-test-score">Add</button>
                            </div>

                            <div id="test-scores" class="collapse show" aria-labelledby="test-scores" data-parent="#div-profile">
                                <div class="card-body">
                                    <?php
                                        if(!empty($TestScore)){
                                            foreach($TestScore as $value){
                                    ?>
                                    <div class="row mb-3">
                                        <label for="" class="col-sm-3 col-form-label text-center"><?= $value['Period'] ?></label>
                                        <label for="" class="col-sm-7 col-form-label"><strong><?= $value['Name'] ?></strong></label>
                                        <label for="" class="col-sm-1 col-form-label"><a href="#" class="delete-test-score" data-id="<?= $value['CanTestScoreId'] ?>"><i class="fa fa-trash"></i></a></label>
                                        <label for="" class="col-sm-1 col-form-label"><a href="#" class="edit-test-score" data-id="<?= $value['CanTestScoreId'] ?>" data-bs-toggle="modal" data-bs-target="#modal-test-score"><i class="fa fa-pencil"></i></a></label>
                                    </div>
                                    <?php
                                            }
                                        }else{
                                    ?>
                                        <p>Recognized tests such as the SATs, IELTS, CFA, and BAR examinations are good measures for employers. If above average, list down tests taken and scores to aid employers as they "grade" your application. <b>Click Add a the top right corner to Add Test Scores</b></p>
                                    <?php
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="card mt-1">
                            <div class="card-header">
                                <a data-bs-toggle="collapse" data-bs-parent="#div-profile" href="#volunteerism">
                                    Volunteerism and Non-Profit Work
                                </a>
                                
                                <button class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#modal-volunteerism">Add</button>
                            </div>

                            <div id="volunteerism" class="collapse show" aria-labelledby="volunteerism" data-parent="#div-profile">
                                <div class="card-body">
                                    <?php
                                        if(!empty($Volunteerism)){
                                            foreach($Volunteerism as $value){
                                    ?>
                                    <div class="row mb-3">
                                        <label for="" class="col-sm-3 col-form-label text-center"><?= $value['Period'] ?></label>
                                        <label for="" class="col-sm-7 col-form-label"><strong><?= $value['Name'] ?></strong></label>
                                        <label for="" class="col-sm-1 col-form-label"><a href="#" class="delete-volunteerism" data-id="<?= $value['CanVolunteerismId'] ?>"><i class="fa fa-trash"></i></a></label>
                                        <label for="" class="col-sm-1 col-form-label"><a href="#" class="edit-volunteerism" data-id="<?= $value['CanVolunteerismId'] ?>" data-bs-toggle="modal" data-bs-target="#modal-volunteerism"><i class="fa fa-pencil"></i></a></label>
                                    </div>
                                    <?php
                                            }
                                        }else{
                                    ?>
                                        <p>Telling employers about volunteer work you've done in the past, even if it is unrelated to the job, helps them gauge the type of worker you are, what you value, and your work ethic. <b>Click Add a the top right corner to Add Volunteerism and Non-Profit Work</b></p>
                                    <?php
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="card mt-1">
                            <div class="card-header">
                                <a data-bs-toggle="collapse" data-bs-parent="#div-profile" href="#references">
                                    References
                                </a>
                                
                                <button class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#modal-references">Add</button>
                            </div>

                            <div id="references" class="collapse show" aria-labelledby="references" data-parent="#div-profile">
                                <div class="card-body"> 
                                    <?php
                                        if(!empty($Reference)){
                                            foreach($Reference as $value){
                                    ?>
                                    <div class="row mb-3">
                                        <label for="" class="col-sm-4 col-form-label text-center"><?= $value['Name'] ?></label>
                                        <label for="" class="col-sm-6 col-form-label"><strong><?= $value['Occupation'] ?> at <?= $value['Company'] ?></strong></label>
                                        <label for="" class="col-sm-1 col-form-label"><a href="#" class="delete-reference" data-id="<?= $value['CanReferenceId'] ?>"><i class="fa fa-trash"></i></a></label>
                                        <label for="" class="col-sm-1 col-form-label"><a href="#" class="edit-reference" data-id="<?= $value['CanReferenceId'] ?>"><i class="fa fa-pencil" data-bs-toggle="modal" data-bs-target="#modal-references"></i></a></label>
                                    </div>
                                    <?php
                                            }
                                        }else{
                                    ?>
                                        <p>Reference previous employers & co-workers who know you and your work ethic so your future employer can contact them about you. <b>Click Add a the top right corner to Add References</b></p>
                                    <?php
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="card mt-1">
                            <div class="card-header">
                                <a data-bs-toggle="collapse" data-bs-parent="#div-profile" href="#co-curricular">
                                    Co-curricular Activities
                                </a>
                                
                                <button class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#modal-co-curricular">Add</button>
                            </div>

                            <div id="co-curricular" class="collapse show" aria-labelledby="co-curricular" data-parent="#div-profile">
                                <div class="card-body">
                                    <?php
                                        if(!empty($CoCurricular)){
                                            foreach($CoCurricular as $value){
                                    ?>
                                    <div class="row mb-3">
                                        <label for="" class="col-sm-3 col-form-label text-center"><?= $value['Period'] ?></label>
                                        <label for="" class="col-sm-7 col-form-label"><strong><?= $value['Name'] ?></strong></label>
                                        <label for="" class="col-sm-1 col-form-label"><a href="#" class="delete-cocurricular" data-id="<?= $value['CanCoCurricularActivitiesId'] ?>"><i class="fa fa-trash"></i></a></label>
                                        <label for="" class="col-sm-1 col-form-label"><a href="#" class="edit-cocurricular" data-id="<?= $value['CanCoCurricularActivitiesId'] ?>" data-bs-toggle="modal" data-bs-target="#modal-co-curricular"><i class="fa fa-pencil"></i></a></label>
                                    </div>
                                    <?php
                                            }
                                        }else{
                                    ?>
                                        <p>Whether or not you have work experience, building your resume with co-curricular activities outside of work will help employers understand the type of worker you might be. <b>Click Add a the top right corner to Add Co-curricular Activities</b></p>
                                    <?php
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="card mt-1">
                            <div class="card-header">
                                <a data-bs-toggle="collapse" data-bs-parent="#div-profile" href="#projects">
                                    Projects
                                </a>
                                    
                                <button class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#modal-projects">Add</button>
                            </div>

                            <div id="projects" class="collapse show" aria-labelledby="projects" data-parent="#div-profile">
                                <div class="card-body">
                                    <?php
                                        if(!empty($Project)){
                                            foreach($Project as $value){
                                    ?>
                                    <div class="row mb-3">
                                        <label for="" class="col-sm-3 col-form-label text-center"><?= $value['Period'] ?></label>
                                        <label for="" class="col-sm-7 col-form-label"><strong><?= $value['Name'] ?></strong></label>
                                        <label for="" class="col-sm-1 col-form-label"><a href="#" class="delete-project" data-id="<?= $value['CanProjectId'] ?>"><i class="fa fa-trash"></i></a></label>
                                        <label for="" class="col-sm-1 col-form-label"><a href="#" class="edit-project" data-id="<?= $value['CanProjectId'] ?>" data-bs-toggle="modal" data-bs-target="#modal-projects"><i class="fa fa-pencil"></i></a></label>
                                    </div>
                                    <?php
                                            }
                                        }else{
                                    ?>
                                        <p>Projects include anything from portfolios, blogs, and websites to organizing events and building a robot. Showing work that you've already accomplished lets employers visualize your place in their company. <b>Click Add a the top right corner to Add Projects</b></p>
                                    <?php
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="card mt-1">
                            <div class="card-header">
                                <a data-bs-toggle="collapse" data-bs-parent="#div-profile" href="#languages">
                                    Languages
                                </a>
                                    
                                <button class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#modal-languages">Add</button>
                            </div>

                            <div id="languages" class="collapse show" aria-labelledby="languages" data-parent="#div-profile">
                                <div class="card-body">
                                    <?php
                                        if(!empty($Language)){
                                            foreach($Language as $value){
                                    ?>
                                    <div class="row mb-3">
                                        <label for="" class="col-sm-11 col-form-label"><?= $value['Name'] ?></label>
                                        <label for="" class="col-sm-1 col-form-label"><a href="#" class="delete-language" data-id="<?= $value['CanLanguageId'] ?>"><i class="fa fa-trash"></i></a></label>
                                    </div>
                                    <?php
                                            }
                                        }else{
                                    ?>
                                        <p>Language or dialect fluency is an asset for multinational or locally-expanding companies. You never knew when your Norwegian or Bahasa will come in handy! <b>Click Add a the top right corner to Add Languages</b></p>
                                    <?php
                                        }
                                    ?>
                                </div>
                            </div>
                        </div> 
                        <div class="card mt-1">
                            <div class="card-header">
                                <a data-bs-toggle="collapse" data-bs-parent="#div-profile" href="#certifications">
                                    Certifications and Licenses
                                </a>
                                    
                                <button class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#modal-certifications">Add</button>
                            </div>

                            <div id="certifications" class="collapse show" aria-labelledby="certifications" data-parent="#div-profile">
                                <div class="card-body">
                                    <?php
                                        if(!empty($Certification)){
                                            foreach($Certification as $value){
                                    ?>
                                    <div class="row mb-3">
                                        <label for="" class="col-sm-10 col-form-label"><?= $value['Name'] ?></label>
                                        <label for="" class="col-sm-1 col-form-label"><a href="#" class="delete-certification" data-id="<?= $value['CanCertificationId'] ?>"><i class="fa fa-trash"></i></a></label>
                                        <label for="" class="col-sm-1 col-form-label"><a href="#" class="edit-certification" data-id="<?= $value['CanCertificationId'] ?>" data-bs-toggle="modal" data-bs-target="#modal-certifications"><i class="fa fa-pencil"></i></a></label>
                                    </div>
                                    <?php
                                            }
                                        }else{
                                    ?>
                                        <p>There are jobs that require certain certifications or licensure. For those that don't, being officially qualified or skilled in a certain area is a plus. Don't forget to include dates. <b>Click Add a the top right corner to Add Certifications and Licenses</b></p>
                                    <?php
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="card mt-1">
                            <div class="card-header">
                                <a class="required" data-bs-toggle="collapse" data-bs-parent="#div-profile" href="#resume">
                                    Resume
                                </a>
                            </div>

                            <div id="resume" class="collapse show" aria-labelledby="resume" data-parent="#div-profile">
                                <div class="card-body">
                                    <p>Note: Your profile is the first thing recruiters see and not your uploaded resume, so make sure your Kalibrr profile is as complete and detailed as your uploaded resume</p>
                                    <p>Your Resume : 
                                        <?php
                                            if(!empty($Resume)){
                                        ?>
                                        <a href="<?= base_url('assets/template/file/resume/' . $Resume['NameFile']) ?>" target="_blank" id="current-resume"><?= $Resume['NameFile'] ?></a>
                                        <?php
                                            }else{
                                        ?>
                                        -
                                        <?php
                                            }
                                        ?>
                                    </p>
                                    <div class="row mb-3">
                                        <div class="col-sm-12">
                                            <label for="resume_file" class="form-label">Upload Your Resume</label>
                                            <input class="form-control" type="file" id="resume_file" name="resume_file">
                                            <small>Acceptable file types are DOC, DOCX, and PDF. <strong>Max file size is 3 MB.</strong></small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                        if($CompletedProfile['IsStatus']){
                        ?>
                        <div class="row">
                            <div class="col-12">
                                <h4 style="padding-top: 10px;">Completed Profile</h4>
                            </div>
                        </div>
                        <hr>
                        <div class="card mt-1">
                            <div class="card-header">
                                <a data-bs-toggle="collapse" data-bs-parent="#div-profile" href="#family">
                                    Family
                                </a>
                                    
                                <button class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#modal-family">Add</button>
                            </div>

                            <div id="family" class="collapse show" aria-labelledby="family" data-parent="#div-profile">
                                <div class="card-body">
                                    <?php
                                        if(!empty($Family)){
                                            foreach($Family as $value){
                                    ?>
                                    <div class="row mb-3">
                                        <label for="" class="col-sm-3 col-form-label"><?= $value['FamName'] ?></label>
                                        <label for="" class="col-sm-2 col-form-label"><?= $value['FamRelData']['FamRelName'] ?></label>
                                        <label for="" class="col-sm-2 col-form-label"><?= $value['FamGenderData']['GenderName'] ?></label>
                                        <label for="" class="col-sm-3 col-form-label"><?= date('d M Y', strtotime($value['FamDateBirth'])) ?></label>
                                        <label for="" class="col-sm-1 col-form-label"><a href="#" class="delete-family" data-id="<?= $value['CanFamilyId'] ?>"><i class="fa fa-trash"></i></a></label>
                                        <label for="" class="col-sm-1 col-form-label"><a href="#" class="edit-family" data-id="<?= $value['CanFamilyId'] ?>" data-bs-toggle="modal" data-bs-target="#modal-family"><i class="fa fa-pencil"></i></a></label>
                                    </div>
                                    <?php
                                            }
                                        }else{
                                    ?>
                                        <p>Add Your Family Relationship. <b>Click Add a the top right corner to Add Family Relationship</b></p>
                                    <?php
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="card mt-1">
                            <div class="card-header">
                                <a data-bs-toggle="collapse" data-bs-parent="#div-profile" href="#identity-card">
                                    Identity Card
                                </a>
                                    
                                <button class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#modal-identity-card">Add</button>
                            </div>

                            <div id="identity-card" class="collapse show" aria-labelledby="identity-card" data-parent="#div-profile">
                                <div class="card-body">
                                    <?php
                                        if(!empty($IdentityCard)){
                                            foreach($IdentityCard as $value){
                                    ?>
                                    <div class="row mb-3">
                                        <label for="" class="col-sm-2 col-form-label"><?= $value['IdentityCardTypeData']['IdentityCardTypeName'] ?></label>
                                        <label for="" class="col-sm-2 col-form-label"><?= $value['IdentityCardNo'] ?></label>
                                        <label for="" class="col-sm-2 col-form-label"><?= !empty($value['Startdate']) ? date('d M Y', strtotime($value['Startdate'])): "-" ?></label>
                                        <label for="" class="col-sm-2 col-form-label"><?= !empty($value['Enddate']) ? date('d M Y', strtotime($value['Enddate'])) : "-" ?></label>
                                        <label for="" class="col-sm-2 col-form-label">
                                            <?php
                                                if(!empty($value['AttachFile'])){
                                            ?>
                                            <a target="_blank" href="data:image/jpg;base64,<?= $value['AttachFile'] ?>" download="<?= $value['IdentityCardTypeData']['IdentityCardTypeName'] ?>_<?= $value['IdentityCardNo'] ?>.jpg"><?= $value['IdentityCardTypeData']['IdentityCardTypeName'] ?>.jpg</a>
                                            <?php
                                                }else{
                                            ?>
                                            -
                                            <?php
                                                }
                                            ?>
                                        </label>
                                        <label for="" class="col-sm-1 col-form-label"><a href="#" class="delete-identity" data-id="<?= $value['CanIdentityCardId'] ?>"><i class="fa fa-trash"></i></a></label>
                                        <label for="" class="col-sm-1 col-form-label"><a href="#" class="edit-identity" data-id="<?= $value['CanIdentityCardId'] ?>" data-bs-toggle="modal" data-bs-target="#modal-identity-card"><i class="fa fa-pencil"></i></a></label>
                                    </div>
                                    <?php
                                            }
                                        }else{
                                    ?>
                                        <p>Add Your Any Identity Card. <b>Click Add a the top right corner to Add Identity Card</b></p>
                                    <?php
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="card mt-1">
                            <div class="card-header">
                                <a data-bs-toggle="collapse" data-bs-parent="#div-profile" href="#vehicle">
                                    Vehicle
                                </a>
                                    
                                <button class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#modal-vehicle">Add</button>
                            </div>

                            <div id="vehicle" class="collapse show" aria-labelledby="vehicle" data-parent="#div-profile">
                                <div class="card-body">
                                    <?php
                                        if(!empty($Vehicle)){
                                            foreach($Vehicle as $value){
                                    ?>
                                    <div class="row mb-3">
                                        <label for="" class="col-sm-2 col-form-label"><?= $value['VehicleTypeData']['VehicleTypeName'] ?></label>
                                        <label for="" class="col-sm-2 col-form-label"><?= $value['VehicleBranchData']['VehicleBranchName'] ?></label>
                                        <label for="" class="col-sm-2 col-form-label"><?= $value['PoliceNo'] ?></label>
                                        <label for="" class="col-sm-2 col-form-label"><?= !empty($value['EndDate']) ? date('d M Y', strtotime($value['EndDate'])) : "-" ?></label>
                                        <label for="" class="col-sm-2 col-form-label">
                                            <?php
                                                if(!empty($value['AttachFile'])){
                                            ?>
                                            <a target="_blank" href="data:image/jpg;base64,<?= $value['AttachFile'] ?>" download="<?= $value['VehicleTypeData']['VehicleTypeName'] ?>_<?= $value['PoliceNo'] ?>.jpg"><?= $value['VehicleTypeData']['VehicleTypeName'] ?>.jpg</a>
                                            <?php
                                                }else{
                                            ?>
                                            -
                                            <?php
                                                }
                                            ?>
                                        </label>
                                        <label for="" class="col-sm-1 col-form-label"><a href="#" class="delete-vehicle" data-id="<?= $value['CanVehicleId'] ?>"><i class="fa fa-trash"></i></a></label>
                                        <label for="" class="col-sm-1 col-form-label"><a href="#" class="edit-vehicle" data-id="<?= $value['CanVehicleId'] ?>" data-bs-toggle="modal" data-bs-target="#modal-vehicle"><i class="fa fa-pencil"></i></a></label>
                                    </div>
                                    <?php
                                            }
                                        }else{
                                    ?>
                                        <p>Add Your Any Vehicle. <b>Click Add a the top right corner to Add Vehicle</b></p>
                                    <?php
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="card mt-1">
                            <div class="card-header">
                                <a data-bs-toggle="collapse" data-bs-parent="#div-profile" href="#personal-document">
                                    Personal Document
                                </a>
                                    
                                <button class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#modal-personal-document">Add</button>
                            </div>

                            <div id="personal-document" class="collapse show" aria-labelledby="personal-document" data-parent="#div-profile">
                                <div class="card-body">
                                    <?php
                                        if(!empty($PersonalDocument)){
                                            foreach($PersonalDocument as $value){
                                    ?>
                                    <div class="row mb-3">
                                        <label for="" class="col-sm-3 col-form-label"><?= $value['DocumentTypeData']['DocumentTypeName'] ?></label>
                                        <label for="" class="col-sm-7 col-form-label">
                                            <?php
                                                if(!empty($value['AttachFile'])){
                                            ?>
                                            <a target="_blank" href="data:application/pdf;base64,<?= $value['AttachFile'] ?>" download="<?= $value['DocumentTypeData']['DocumentTypeName'] ?>_<?= $value['CanProfileId'] ?>.pdf"><?= $value['DocumentTypeData']['DocumentTypeName'] ?>.pdf</a>
                                            <?php
                                                }else{
                                            ?>
                                            -
                                            <?php
                                                }
                                            ?>
                                        </label>
                                        <label for="" class="col-sm-1 col-form-label"><a href="#" class="delete-personal-document" data-id="<?= $value['CanPersonalDocumentId'] ?>"><i class="fa fa-trash"></i></a></label>
                                        <label for="" class="col-sm-1 col-form-label"><a href="#" class="edit-personal-document" data-id="<?= $value['CanPersonalDocumentId'] ?>" data-bs-toggle="modal" data-bs-target="#modal-personal-document"><i class="fa fa-pencil"></i></a></label>
                                    </div>
                                    <?php
                                            }
                                        }else{
                                    ?>
                                        <p>Add Your Any Personal Document. <b>Click Add a the top right corner to Add Personal Document</b></p>
                                    <?php
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="card mt-1">
                            <div class="card-header">
                                <a data-bs-toggle="collapse" data-bs-parent="#div-profile" href="#emergency-contact">
                                    Emergency Contact
                                </a>
                                    
                                <button class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#modal-emergency-contact">Add</button>
                            </div>

                            <div id="emergency-contact" class="collapse show" aria-labelledby="emergency-contact" data-parent="#div-profile">
                                <div class="card-body">
                                    <?php
                                        if(!empty($Emergency)){
                                            foreach($Emergency as $value){
                                    ?>
                                    <div class="row mb-3">
                                        <label for="" class="col-sm-3 col-form-label"><?= $value['EcontactName'] ?></label>
                                        <label for="" class="col-sm-3 col-form-label"><?= $value['FamRelData']['FamRelName'] ?></label>
                                        <label for="" class="col-sm-4 col-form-label"><?= $value['EcontactPhone'] ?></label>
                                        <label for="" class="col-sm-1 col-form-label"><a href="#" class="delete-emergency-contact" data-id="<?= $value['CanEmergencyId'] ?>"><i class="fa fa-trash"></i></a></label>
                                        <label for="" class="col-sm-1 col-form-label"><a href="#" class="edit-emergency-contact" data-id="<?= $value['CanEmergencyId'] ?>" data-bs-toggle="modal" data-bs-target="#modal-emergency-contact"><i class="fa fa-pencil"></i></a></label>
                                    </div>
                                    <?php
                                            }
                                        }else{
                                    ?>
                                        <p>Add Your Emergency Contact. <b>Click Add a the top right corner to Add Emergency Contact</b></p>
                                    <?php
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <?php
                        }
                        ?>
                    </div>
                    <div class="col-3">
                        <div class="card mt-1">
                            <div class="card-header">
                                <a data-bs-toggle="collapse" data-bs-parent="#div-profile" href="#to-do-list">
                                    To-Do List
                                </a>
                            </div>
                            <div id="to-do-list" class="collapse show" aria-labelledby="to-do-list" data-parent="#div-profile">
                                <div class="card-body">
                                    <h6 style="text-align: center;"><?= $ToDoListNumber[0]['Average'] ?>% Done</h6>
                                    <div class="progress mb-3">
                                        <div class="progress-bar" role="progressbar" style="width: <?= $ToDoListNumber[0]['Average'] ?>%" aria-valuenow="<?= $ToDoListNumber[0]['Average'] ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <?php foreach($ToDoList as $index => $value){ ?>
                                    <div class="form-check border-top pt-2 pb-2">
                                        <?php if($value['IsStatus']){ ?>
                                        <input class="form-check-input" type="checkbox" value="" disabled checked>
                                        <?php }else{ ?>
                                        <input class="form-check-input" type="checkbox" value="">
                                        <?php } ?>
                                        <label class="form-check-label" for="">
                                            <?= $value['CategoryProfleName'] ?>
                                        </label>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
        $currentYear = date("Y");
        $yearRange = range($currentYear, $currentYear - 50);
        $months = array(
            'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'
        );

        $dayOptions = '';
        for ($day = 1; $day <= 31; $day++) {
            $dayOptions .= "<option value='$day'>$day</option>";
        }

        $yearOptions = '';
        foreach ($yearRange as $year) {
            $yearOptions .= "<option value='$year'>$year</option>";
        }

        $monthOptions = '';
        foreach ($months as $key => $month) {
            $val = $key + 1;
            // $monthValue = str_pad($key + 1, 2, "0", STR_PAD_LEFT); // Format nilai bulan menjadi 2 digit (01, 02, dst.)
            $monthOptions .= "<option value='$val'>$month</option>";
        }
    ?>

    <div class="modal fade" id="modal-basic-information" role="dialog" aria-labelledby="label-basic-information" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="label-basic-information">Edit Basic Information</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="form_basic" action="<?php echo base_url() ?>proses-basic" enctype="multipart/form-data" method="post">
                <div class="modal-body">
                    <div class="row mb-3">
                        <div class="col-sm-2">
                            <div class="profile-pict-basic">
                                <input type="file" id="add_profile_basic" name="add_profile_basic" style="display: none" accept="image/*">
                                <label for="add_profile_basic" class="profile-pict-basic-overlay">
                                    <i class="fa fa-camera"></i>
                                    <!-- <img src="camera-icon.png" alt="Camera Icon"> -->
                                </label>
                                <?php
                                    if(empty($CanProfile['PhotoProfile'])){
                                ?>
                                <img src="<?php echo base_url() ?>assets/template/images/avatar/no-photo.PNG" alt="Profile Picture" id="img-photo-profile" class="rounded-image">
                                <?php
                                    } else {
                                ?>
                                <img src="<?php echo base_url() ?>assets/template/images/avatar/<?= $CanProfile['PhotoProfile'] ?>" alt="Profile Picture" id="img-photo-profile" class="rounded-image">
                                <?php
                                    }
                                ?>
                            </div>
                            <p class="mt-1" style="font-size: 12px;">Acceptance JPG</p>
                        </div>
                        <div class="col-sm-10">
                            <div class="row mb-3">
                                <label for="first_name_basic" class="col-sm-3 col-form-label required">Full Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="first_name_basic" name="first_name_basic" required>
                                </div>
                                <!-- <div class="col-sm-5">
                                    <input type="text" class="form-control" id="last_name_basic" name="last_name_basic" required>
                                </div> -->
                            </div>
                            <div class="row mb-3">
                                <label for="country_basic" class="col-sm-3 col-form-label required">Country</label>
                                <div class="col-sm-9">
                                    <select class="form-select" id="country_basic" name="country_basic" style="width: 100%;" required>
                                        
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="region_basic" class="col-sm-3 col-form-label required">Region / Province / State</label>
                                <div class="col-sm-9">
                                    <select class="form-select" id="region_basic" name="region_basic" style="width: 100%;" required>
                                        
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="city_basic" class="col-sm-3 col-form-label required">City</label>
                                <div class="col-sm-9">
                                    <select class="form-select" id="city_basic" name="city_basic" style="width: 100%;" disabled>
                                        
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="district_basic" class="col-sm-3 col-form-label required">District</label>
                                <div class="col-sm-9">
                                    <select class="form-select" id="district_basic" name="district_basic" style="width: 100%;" disabled>
                                    
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="subdistrict_basic" class="col-sm-3 col-form-label required">Sub District</label>
                                <div class="col-sm-9">
                                    <select class="form-select" id="subdistrict_basic" name="subdistrict_basic" style="width: 100%;" disabled>
                                        
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="street_address_basic" class="col-sm-3 col-form-label">Street Address</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="street_address_basic" name="street_address_basic">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="rt_basic" class="col-sm-3 col-form-label">RT / RW</label>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control" id="rt_basic" name="rt_basic">
                                </div>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control" id="rw_basic" name="rw_basic">
                                </div>
                                <label for="no_basic" class="col-sm-1 col-form-label">No</label>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control" id="no_basic" name="no_basic">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="gender_male_basic" class="col-sm-3 col-form-label required">Gender</label>
                                <div class="col-sm-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="gender_basic" id="gender_male_basic" value="1">
                                        <label class="form-check-label" for="gender_male_basic">Male</label>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="gender_basic" id="gender_female_basic" value="2">
                                        <label class="form-check-label" for="gender_female_basic">Female</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="birth_place_basic" class="col-sm-3 col-form-label required">Place of Birth</label>
                                <div class="col-sm-9">
                                    <select class="form-select" id="birth_place_basic" name="birth_place_basic" style="width: 100%;" required>
                                        
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="birthday_basic" class="col-sm-3 col-form-label required">Date of Birth</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="birthday_basic" name="birthday_basic" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="marital_status_basic" class="col-sm-3 col-form-label required">Marital Status</label>
                                <div class="col-sm-9">
                                    <select class="form-select" id="marital_status_basic" name="marital_status_basic" required>
                                        <?php
                                            foreach($MaritalStatus as $value){ 
                                        ?>
                                            <option value="<?= $value['MaritalStatusId'] ?>"><?= $value['MaritalStatusName'] ?></option>
                                        <?php
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="religion_basic" class="col-sm-3 col-form-label required">Religion</label>
                                <div class="col-sm-9">
                                    <select class="form-select" id="religion_basic" name="religion_basic" required>
                                        <?php
                                            foreach($Religion as $value){ 
                                        ?>
                                            <option value="<?= $value['ReligionId'] ?>"><?= $value['ReligionName'] ?></option>
                                        <?php
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="blood_type_basic" class="col-sm-3 col-form-label required">Blood Type</label>
                                <div class="col-sm-9">
                                    <select class="form-select" id="blood_type_basic" name="blood_type_basic" required>
                                        <?php
                                            foreach($Blood as $value){ 
                                        ?>
                                            <option value="<?= $value['BloodId'] ?>"><?= $value['BloodName'] ?></option>
                                        <?php
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3 mr-2">
                                <label for="email_basic" class="col-sm-3 col-form-label required">Email</label>
                                <div class="col-sm-7">
                                    <input type="email" class="form-control" id="email_basic" name="email_basic" required>
                                </div>
                                <a href="javascript:void(0)" id="update-email" class="btn btn-primary col-sm-2">UPDATE</a>
                            </div>
                            <div class="row mb-3">
                                <label for="mobile_number_basic" class="col-sm-3 col-form-label required">Mobile Number</label>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control" id="code_mobile_basic" name="code_mobile_basic" value="62" readonly>
                                </div>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" id="mobile_number_basic" name="mobile_number_basic">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="job_seeking_basic" class="col-sm-3 col-form-label required">Job Seeking Status</label>
                                <div class="col-sm-9">
                                    <select class="form-select" id="job_seeking_basic" name="job_seeking_basic" required>
                                        <?php
                                            foreach($JobSeeking as $value){ 
                                        ?>
                                            <option value="<?= $value['JobSeekingStatusId'] ?>"><?= $value['JobSeekingStatusName'] ?></option>
                                        <?php
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
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

    <div class="modal fade" id="modal-salary-expectation" tabindex="-1" role="dialog" aria-labelledby="label-salary-expectation" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="label-salary-expectation">Add Salary Expectation</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="form_salary" action="<?php echo base_url() ?>proses-salary" method="post">
                <div class="modal-body">
                    <p>Provide a salary range for better job matches & increase chances to get hired by the perfect company.</p>
                    <div class="row mb-3">
                        <label for="currency_salary" class="col-sm-2 col-form-label required">Currency</label>
                        <div class="col-sm-4">
                            <select class="form-select" id="currency_salary" name="currency_salary" required>
                                <?php
                                    foreach($Currency as $value){ 
                                ?>
                                    <option value="<?= $value['CurrencyId'] ?>"><?= $value['CurrencyName'] ?></option>
                                <?php
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="minimum_salary" class="col-sm-2 col-form-label required">Minimum</label>
                        <div class="col-sm-4">
                            <input type="number" class="form-control" id="minimum_salary" name="minimum_salary" required>
                        </div>
                        <label for="maximum_salary" class="col-sm-2 col-form-label required">Maximum</label>
                        <div class="col-sm-4">
                            <input type="number" class="form-control" id="maximum_salary" name="maximum_salary" required>
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

    <div class="modal fade" id="modal-work-experience" tabindex="-1" role="dialog" aria-labelledby="label-work-experience" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="label-work-experience">Add Work Experience</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="form_work_experience" action="<?php echo base_url() ?>proses-work-experience" method="post">
                <div class="modal-body">
                    <div class="row mb-3">
                        <label for="job_title_work" class="col-sm-2 col-form-label required">Job Title</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="job_title_work" name="job_title_work" placeholder="Enter your job title" required>
                        </div>
                        <input type="hidden" class="form-control" id="function_work" name="function_work" value="Add">
                    </div>
                    <div class="row mb-3">
                        <label for="company_work" class="col-sm-2 col-form-label required">Company</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="company_work" name="company_work" placeholder="Enter company name" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="job_level_work" class="col-sm-2 col-form-label required">Job Level</label>
                        <div class="col-sm-4">
                            <select class="form-select" id="job_level_work" name="job_level_work" required>
                                <?php
                                    foreach($JobLevel as $value){ 
                                ?>
                                    <option value="<?= $value['JobLevelId'] ?>"><?= $value['JobLevelName'] ?></option>
                                <?php
                                    }
                                ?>
                            </select>
                        </div>
                        <label for="job_function_work" class="col-sm-2 col-form-label required">Job Function</label>
                        <div class="col-sm-4">
                            <select class="form-select" id="job_function_work" name="job_function_work" style="width: 100%;" required>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="from_month_work" class="col-sm-2 col-form-label required">From</label>
                        <div class="col-sm-2">
                            <select class="form-select" id="from_month_work" name="from_month_work" required>
                                <?= $monthOptions ?>
                            </select>
                        </div>
                        <div class="col-sm-2">
                            <select class="form-select" id="from_year_work" name="from_year_work" required>
                                <?= $yearOptions ?>
                            </select>
                        </div>
                        <label for="to_month_work" class="col-sm-1 col-form-label required">To</label>
                        <div class="col-sm-2">
                            <select class="form-select" id="to_month_work" name="to_month_work" required>
                                <?= $monthOptions ?>
                            </select>
                        </div>
                        <div class="col-sm-2">
                            <select class="form-select" id="to_year_work" name="to_year_work" required>
                                <?= $yearOptions ?>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-10 offset-sm-2">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="currently_work_work" name="currently_work_work" value="true">
                                <label class="form-check-label" for="currently_work_work">
                                    I currently work here
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-12">
                            <label for="description_work" class="form-label">Accomplishments or descriptions (optional)</label>
                            <textarea class="form-control" id="description_work" name="description_work"></textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="" class="col-sm-6 col-form-label">Previous Salary (optional)</label>
                        <div class="form-text">Provide a salary for better job matches. Only you can see it.</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-4">
                            <label for="currency_work" class="form-label">Currency</label>
                            <select class="form-select" id="currency_work" name="currency_work">
                                <?php
                                    foreach($Currency as $value){ 
                                ?>
                                    <option value="<?= $value['CurrencyId'] ?>"><?= $value['CurrencyName'] ?></option>
                                <?php
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <label for="amount_work" class="form-label">Amount</label>
                            <input type="number" class="form-control" id="amount_work" name="amount_work">
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

    <div class="modal fade" id="modal-education" tabindex="-1" role="dialog" aria-labelledby="label-education" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="label-education">Add Education</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="form_education" action="<?php echo base_url() ?>proses-education" method="post">
                <div class="modal-body">
                    <div class="row mb-3">
                        <label for="education_attainment_education" class="col-sm-2 col-form-label required">Education Attainment</label>
                        <div class="col-sm-10">
                            <select class="form-select" id="education_attainment_education" name="education_attainment_education" required>
                                <?php
                                    foreach($EducationLevel as $value){ 
                                ?>
                                    <option value="<?= $value['EducationLevelId'] ?>"><?= $value['EducationLevelName'] ?></option>
                                <?php
                                    }
                                ?>
                            </select>
                            <input type="hidden" class="form-control" id="function_education" name="function_education" value="Add">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="school_education" class="col-sm-2 col-form-label required">School / University</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="school_education" name="school_education" placeholder="Enter school / university name" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="majoring_education" class="col-sm-2 col-form-label required">Majoring</label>
                        <div class="col-sm-10">
                            <select class="form-select" id="majoring_education" name="majoring_education" style="width: 100%;" required>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="from_month_education" class="col-sm-2 col-form-label required">From</label>
                        <div class="col-sm-2">
                            <select class="form-select" id="from_month_education" name="from_month_education" required>
                                <?= $monthOptions ?>
                            </select>
                        </div>
                        <div class="col-sm-2">
                            <select class="form-select" id="from_year_education" name="from_year_education" required>
                                <?= $yearOptions ?>
                            </select>
                        </div>
                        <label for="to_month_education" class="col-sm-1 col-form-label required">To</label>
                        <div class="col-sm-2">
                            <select class="form-select" id="to_month_education" name="to_month_education" required>
                                <?= $monthOptions ?>
                            </select>
                        </div>
                        <div class="col-sm-2">
                            <select class="form-select" id="to_year_education" name="to_year_education" required>
                                <?= $yearOptions ?>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-12">
                            <label for="description_education" class="form-label">Description (optional)</label>
                            <textarea class="form-control" id="description_education" name="description_education"></textarea>
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

    <div class="modal fade" id="modal-skills" tabindex="-1" role="dialog" aria-labelledby="label-skills" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="label-skills">Add Skills</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="form_skill" action="<?php echo base_url() ?>proses-skill" method="post">
                <div class="modal-body">
                    <div class="row mb-3">
                        <div class="col-sm-8">
                            <label for="skill_skill" class="form-label required">Skill</label>
                            <select class="form-select" id="skill_skill" name="skill_skill" style="width: 100%;" required>
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <label for="level_skill" class="form-label required">Level</label>
                            <select class="form-select" id="level_skill" name="level_skill" style="width: 100%;" required>
                            <?php
                                foreach($LevelSkill as $value){ 
                            ?>
                                <option value="<?= $value['LevelSkillId'] ?>"><?= $value['LevelSkillName'] ?></option>
                            <?php
                                }
                            ?>
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

    <div class="modal fade" id="modal-summary" tabindex="-1" role="dialog" aria-labelledby="label-summary" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="label-summary">Add Summary</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="form_summary" action="<?php echo base_url() ?>proses-summary" method="post">
                <div class="modal-body">
                    <div class="row mb-3">
                        <div class="col-sm-12">
                            <label for="description_summary" class="form-label required">Write a short paragraph (3-5 sentences) about yourself</label>
                            <textarea class="form-control" id="description_summary" name="description_summary"></textarea>
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

    <div class="modal fade" id="modal-affiliations" tabindex="-1" role="dialog" aria-labelledby="label-affiliations" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="label-affiliations">Add Affiliations</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="form_affiliation" action="<?php echo base_url() ?>proses-affiliation" method="post">
                <div class="modal-body">
                    <div class="row mb-3">
                        <label for="organizations_affiliations" class="col-sm-2 col-form-label required">Organization</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="organizations_affiliations" name="organizations_affiliations" placeholder="Name of Organization" required>
                            <input type="hidden" class="form-control" id="function_affiliation" name="function_affiliation" value="Add">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="role_affiliations" class="col-sm-2 col-form-label required">Role</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="role_affiliations" name="role_affiliations" placeholder="Role on the Organization" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="from_month_affiliations" class="col-sm-2 col-form-label required">From</label>
                        <div class="col-sm-2">
                            <select class="form-select" id="from_month_affiliations" name="from_month_affiliations" required>
                                <?= $monthOptions ?>
                            </select>
                        </div>
                        <div class="col-sm-2">
                            <select class="form-select" id="from_year_affiliations" name="from_year_affiliations" required>
                                <?= $yearOptions ?>
                            </select>
                        </div>
                        <label for="to_month_affiliations" class="col-sm-1 col-form-label required">To</label>
                        <div class="col-sm-2">
                            <select class="form-select" id="to_month_affiliations" name="to_month_affiliations" required>
                                <?= $monthOptions ?>
                            </select>
                        </div>
                        <div class="col-sm-2">
                            <select class="form-select" id="to_year_affiliations" name="to_year_affiliations" required>
                                <?= $yearOptions ?>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-10 offset-sm-2">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="present_affiliations" name="present_affiliations">
                                <label class="form-check-label" for="present_affiliations">
                                    Present
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-12">
                            <label for="description_affiliations" class="form-label">Description (optional)</label>
                            <textarea class="form-control" id="description_affiliations" name="description_affiliations"></textarea>
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

    <div class="modal fade" id="modal-seminars-trainings" tabindex="-1" role="dialog" aria-labelledby="label-seminars-trainings" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="label-seminars-trainings">Add Seminars and Trainings</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="form_seminar" action="<?php echo base_url() ?>proses-seminar" method="post">
                <div class="modal-body">
                    <div class="row mb-3">
                        <label for="title_seminars" class="col-sm-2 col-form-label required">Title</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="title_seminars" name="title_seminars" placeholder="e.g. Leadership training" required>
                            <input type="hidden" class="form-control" id="function_seminars" name="function_seminars" value="Add">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="organizer_seminars" class="col-sm-2 col-form-label required">Organizer</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="organizer_seminars" name="organizer_seminars" placeholder="Who is the Organizer?" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="from_month_seminars" class="col-sm-2 col-form-label required">From</label>
                        <div class="col-sm-2">
                            <select class="form-select" id="from_month_seminars" name="from_month_seminars" required>
                                <?= $monthOptions ?>
                            </select>
                        </div>
                        <div class="col-sm-2">
                            <select class="form-select" id="from_year_seminars" name="from_year_seminars" required>
                                <?= $yearOptions ?>
                            </select>
                        </div>
                        <label for="to_month_seminars" class="col-sm-1 col-form-label required">To</label>
                        <div class="col-sm-2">
                            <select class="form-select" id="to_month_seminars" name="to_month_seminars" required>
                                <?= $monthOptions ?>
                            </select>
                        </div>
                        <div class="col-sm-2">
                            <select class="form-select" id="to_year_seminars" name="to_year_seminars" required>
                                <?= $yearOptions ?>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-10 offset-sm-2">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="single_date_seminars" name="single_date_seminars">
                                <label class="form-check-label" for="single_date_seminars">
                                    Single Date
                                </label>
                            </div>
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

    <div class="modal fade" id="modal-awards-achievements" tabindex="-1" role="dialog" aria-labelledby="label-awards-achievements" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="label-awards-achievements">Add Awards and Achievements</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="form_award" action="<?php echo base_url() ?>proses-award" method="post">
                <div class="modal-body">
                    <div class="row mb-3">
                        <label for="title_awards" class="col-sm-2 col-form-label required">Title</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="title_awards" name="title_awards" placeholder="Title" required>
                            <input type="hidden" class="form-control" id="function_awards" name="function_awards" value="Add">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="issuer_awards" class="col-sm-2 col-form-label required">Issuer</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="issuer_awards" name="issuer_awards" placeholder="Who issued the award?" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="date_month_awards" class="col-sm-2 col-form-label required">Date</label>
                        <div class="col-sm-2">
                            <select class="form-select" id="date_month_awards" name="date_month_awards" required>
                                <?= $monthOptions ?>
                            </select>
                        </div>
                        <div class="col-sm-2">
                            <select class="form-select" id="date_year_awards" name="date_year_awards" required>
                                <?= $yearOptions ?>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-12">
                            <label for="description_awards" class="form-label">Description (optional)</label>
                            <textarea class="form-control" id="description_awards" name="description_awards"></textarea>
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

    <div class="modal fade" id="modal-test-score" tabindex="-1" role="dialog" aria-labelledby="label-test-scores" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="label-test-scores">Add Test Scores</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="form_test_score" action="<?php echo base_url() ?>proses-test-score" method="post">
                <div class="modal-body">
                    <div class="row mb-3">
                        <label for="title_test" class="col-sm-2 col-form-label required">Title</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="title_test" name="title_test" placeholder="Examination Title" required>
                            <input type="hidden" class="form-control" id="function_test" name="function_test" value="Add">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="result_test" class="col-sm-2 col-form-label required">Result</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="result_test" name="result_test" placeholder="What is your exam result?" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="date_month_test" class="col-sm-2 col-form-label required">Date</label>
                        <div class="col-sm-2">
                            <select class="form-select" id="date_month_test" name="date_month_test" required>
                                <?= $monthOptions ?>
                            </select>
                        </div>
                        <div class="col-sm-2">
                            <select class="form-select" id="date_year_test" name="date_year_test" required>
                                <?= $yearOptions ?>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-12">
                            <label for="description_test" class="form-label">Description (optional)</label>
                            <textarea class="form-control" id="description_test" name="description_test"></textarea>
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

    <div class="modal fade" id="modal-volunteerism" tabindex="-1" role="dialog" aria-labelledby="label-volunteerism" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="label-volunteerism">Add Volunteerism</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="form_volunteerism" action="<?php echo base_url() ?>proses-volunteerism" method="post">
                <div class="modal-body">
                    <div class="row mb-3">
                        <label for="organization_volunteerism" class="col-sm-2 col-form-label required">Organization</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="organization_volunteerism" name="organization_volunteerism" placeholder="Name of Organization" required>
                            <input type="hidden" class="form-control" id="function_volunteerism" name="function_volunteerism" value="Add">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="cause_volunteerism" class="col-sm-2 col-form-label required">Cause</label>
                        <div class="col-sm-10">
                            <select class="form-select" id="cause_volunteerism" name="cause_volunteerism" required>
                                <?php
                                    foreach($Cause as $value){ 
                                ?>
                                    <option value="<?= $value['CauseId'] ?>"><?= $value['CauseName'] ?></option>
                                <?php
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="role_volunteerism" class="col-sm-2 col-form-label required">Role</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="role_volunteerism" name="role_volunteerism" placeholder="Role on the Organization" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-12">
                            <label for="description_volunteerism" class="form-label">Description (optional)</label>
                            <textarea class="form-control" id="description_volunteerism" name="description_volunteerism"></textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="link_volunteerism" class="col-sm-2 col-form-label">Link</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="link_volunteerism" name="link_volunteerism" placeholder="e.g. www.kalibrr.com">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="from_month_volunteerism" class="col-sm-2 col-form-label required">From</label>
                        <div class="col-sm-2">
                            <select class="form-select" id="from_month_volunteerism" name="from_month_volunteerism" required>
                                <?= $monthOptions ?>
                            </select>
                        </div>
                        <div class="col-sm-2">
                            <select class="form-select" id="from_year_volunteerism" name="from_year_volunteerism" required>
                                <?= $yearOptions ?>
                            </select>
                        </div>
                        <label for="to_month_volunteerism" class="col-sm-1 col-form-label required">To</label>
                        <div class="col-sm-2">
                            <select class="form-select" id="to_month_volunteerism" name="to_month_volunteerism" required>
                                <?= $monthOptions ?>
                            </select>
                        </div>
                        <div class="col-sm-2">
                            <select class="form-select" id="to_year_volunteerism" name="to_year_volunteerism" required>
                                <?= $yearOptions ?>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-10 offset-sm-2">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="present_volunteerism" name="present_volunteerism">
                                <label class="form-check-label" for="present_volunteerism">
                                    Present
                                </label>
                            </div>
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

    <div class="modal fade" id="modal-references" tabindex="-1" role="dialog" aria-labelledby="label-references" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="label-references">Add References</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="form_reference" action="<?php echo base_url() ?>proses-reference" method="post">
                <div class="modal-body">
                    <div class="row mb-3">
                        <div class="col-sm-10 offset-sm-2">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="available_references" name="available_references">
                                <label class="form-check-label" for="available_references">
                                    Available Upon Request
                                </label>
                                <input type="hidden" class="form-control" id="function_references" name="function_references" value="Add">
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="name_references" class="col-sm-2 col-form-label required">Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="name_references" name="name_references" placeholder="Full Name" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="occupation_references" class="col-sm-2 col-form-label required">Occupation</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="occupation_references" name="occupation_references" placeholder="Occupation" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="company_references" class="col-sm-2 col-form-label required">Company</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="company_references" name="company_references" placeholder="Company" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="phone_references" class="col-sm-2 col-form-label required">Phone</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="phone_references" name="phone_references" placeholder="Phone" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="email_references" class="col-sm-2 col-form-label required">Email</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="email_references" name="email_references" placeholder="Email" required>
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

    <div class="modal fade" id="modal-co-curricular" tabindex="-1" role="dialog" aria-labelledby="label-co-curricular" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="label-co-curricular">Add Co-curricular Activities</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="form_cocurricular" action="<?php echo base_url() ?>proses-cocurricular" method="post">
                <div class="modal-body">
                    <div class="row mb-3">
                        <label for="organization_co_curricular" class="col-sm-2 col-form-label required">Organization</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="organization_co_curricular" name="organization_co_curricular" placeholder="Name of Organization" required>
                            <input type="hidden" class="form-control" id="function_co_curricular" name="function_co_curricular" value="Add">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="role_co_curricular" class="col-sm-2 col-form-label required">Role</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="role_co_curricular" name="role_co_curricular" placeholder="Role on the Organization" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="from_month_co_curricular" class="col-sm-2 col-form-label required">From</label>
                        <div class="col-sm-2">
                            <select class="form-select" id="from_month_co_curricular" name="from_month_co_curricular" required>
                                <?= $monthOptions ?>
                            </select>
                        </div>
                        <div class="col-sm-2">
                            <select class="form-select" id="from_year_co_curricular" name="from_year_co_curricular" required>
                                <?= $yearOptions ?>
                            </select>
                        </div>
                        <label for="to_month_co_curricular" class="col-sm-1 col-form-label required">To</label>
                        <div class="col-sm-2">
                            <select class="form-select" id="to_month_co_curricular" name="to_month_co_curricular" required>
                                <?= $monthOptions ?>
                            </select>
                        </div>
                        <div class="col-sm-2">
                            <select class="form-select" id="to_year_co_curricular" name="to_year_co_curricular" required>
                                <?= $yearOptions ?>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-10 offset-sm-2">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="present_co_curricular" name="present_co_curricular">
                                <label class="form-check-label" for="present_co_curricular">
                                    Present
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-12">
                            <label for="description_co_curricular" class="form-label">Description (optional)</label>
                            <textarea class="form-control" id="description_co_curricular" name="description_co_curricular"></textarea>
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

    <div class="modal fade" id="modal-projects" tabindex="-1" role="dialog" aria-labelledby="label-projects" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="label-projects">Add Projects</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="form_project" action="<?php echo base_url() ?>proses-project" method="post">
                <div class="modal-body">
                    <div class="row mb-3">
                        <label for="project_name_projects" class="col-sm-2 col-form-label required">Project Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="project_name_projects" name="project_name_projects" placeholder="Project Name" required>
                            <input type="hidden" class="form-control" id="function_projects" name="function_projects" value="Add">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="role_projects" class="col-sm-2 col-form-label required">Role</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="role_projects" name="role_projects" placeholder="Role on the Project" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="link_projects" class="col-sm-2 col-form-label">Link</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="link_projects" name="link_projects" placeholder="e.g. www.kalibrr.com">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="from_month_projects" class="col-sm-2 col-form-label required">From</label>
                        <div class="col-sm-2">
                            <select class="form-select" id="from_month_projects" name="from_month_projects" required>
                                <?= $monthOptions ?>
                            </select>
                        </div>
                        <div class="col-sm-2">
                            <select class="form-select" id="from_year_projects" name="from_year_projects" required>
                                <?= $yearOptions ?>
                            </select>
                        </div>
                        <label for="to_month_projects" class="col-sm-1 col-form-label required">To</label>
                        <div class="col-sm-2">
                            <select class="form-select" id="to_month_projects" name="to_month_projects" required>
                                <?= $monthOptions ?>
                            </select>
                        </div>
                        <div class="col-sm-2">
                            <select class="form-select" id="to_year_projects" name="to_year_projects" required>
                                <?= $yearOptions ?>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-10 offset-sm-2">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="present_projects" name="present_projects">
                                <label class="form-check-label" for="present_projects">
                                    Present
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-12">
                            <label for="description_projects" class="form-label">Description (optional)</label>
                            <textarea class="form-control" id="description_projects" name="description_projects"></textarea>
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

    <div class="modal fade" id="modal-languages" tabindex="-1" role="dialog" aria-labelledby="label-languages" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="label-languages">Add Languages</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="form_language" action="<?php echo base_url() ?>proses-language" method="post">
                <div class="modal-body">
                <div class="row mb-3">
                        <div class="col-sm-8">
                            <label for="language_language" class="form-label required">Skill</label>
                            <select class="form-select" id="language_language" name="language_language" style="width: 100%;" required>
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <label for="level_language" class="form-label required">Level</label>
                            <select class="form-select" id="level_language" name="level_language" style="width: 100%;" required>
                            <?php
                                foreach($LevelLanguage as $value){ 
                            ?>
                                <option value="<?= $value['LevelLanguageId'] ?>"><?= $value['LevelLanguangeName'] ?></option>
                            <?php
                                }
                            ?>
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

    <div class="modal fade" id="modal-certifications" tabindex="-1" role="dialog" aria-labelledby="label-certifications" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="label-certifications">Add Certifications and Licenses</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="form_certification" action="<?php echo base_url() ?>proses-certification" method="post">
                <div class="modal-body">
                    <div class="row mb-3">
                        <label for="certification_title_certification" class="col-sm-3 col-form-label required">Certification Title</label>
                        <div class="col-sm-9">
                            <select class="form-select select2" id="certification_title_certification" name="certification_title_certification" style="width: 100%;" required>
                            </select>
                            <input type="hidden" class="form-control" id="function_certification" name="function_certification" value="Add">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="issuer_certification" class="col-sm-3 col-form-label required">Issuer</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="issuer_certification" name="issuer_certification" placeholder="Who authorized the certificate / license?" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="issuance_date_month_certification" class="col-sm-3 col-form-label required">From</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="issuance_date_start_certification" name="issuance_date_start_certification" placeholder="Issuance Date Start" required>
                        </div>
                        <label for="issuance_date_month_certification" class="col-sm-1 col-form-label required">To</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="issuance_date_end_certification" name="issuance_date_end_certification" placeholder="Issuance Date End" required>
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

    <div class="modal fade" id="modal-family" tabindex="-1" role="dialog" aria-labelledby="label-family" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="label-family">Add Family</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="form_family" action="<?php echo base_url() ?>proses-family" method="post">
                <div class="modal-body">
                    <div class="row mb-3">
                        <label for="relation_family" class="col-sm-3 col-form-label required">Relation</label>
                        <div class="col-sm-5">
                            <select class="form-select" id="relation_family" name="relation_family" style="width: 100%;" required>
                            <?php
                                foreach($FamRel as $value){ 
                            ?>
                                <option value="<?= $value['FamRelId'] ?>"><?= $value['FamRelName'] ?></option>
                            <?php
                                }
                            ?>
                            </select>
                        </div>
                        <input type="hidden" class="form-control" id="function_family" name="function_family" value="Add">
                    </div>
                    <div class="row mb-3">
                        <label for="name_family" class="col-sm-3 col-form-label required">Name</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="name_family" name="name_family" placeholder="Name" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="id_no_family" class="col-sm-3 col-form-label">ID Card No</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="id_no_family" name="id_no_family" placeholder="ID Card No">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="birth_place_family" class="col-sm-3 col-form-label">Place of Birth</label>
                        <div class="col-sm-9">
                            <select class="form-select select2" id="birth_place_family" name="birth_place_family" style="width: 100%;">
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="birth_date_family" class="col-sm-3 col-form-label">Date of Birth</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="birth_date_family" name="birth_date_family" placeholder="Date of Birth">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="gender_family" class="col-sm-3 col-form-label">Gender</label>
                        <div class="col-sm-5">
                            <select class="form-select" id="gender_family" name="gender_family" style="width: 100%;">
                            <?php
                                foreach($Gender as $value){ 
                            ?>
                                <option value="<?= $value['GenderId'] ?>"><?= $value['GenderName'] ?></option>
                            <?php
                                }
                            ?>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="blood_family" class="col-sm-3 col-form-label">Blood Type</label>
                        <div class="col-sm-5">
                            <select class="form-select" id="blood_family" name="blood_family" style="width: 100%;">
                            <?php
                                foreach($Blood as $value){ 
                            ?>
                                <option value="<?= $value['BloodId'] ?>"><?= $value['BloodName'] ?></option>
                            <?php
                                }
                            ?>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="address_family" class="col-sm-3 col-form-label">Address</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" id="address_family" name="address_family"></textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="phone_family" class="col-sm-3 col-form-label">Phone</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="phone_family" name="phone_family" placeholder="Phone">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-9 offset-sm-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="passed_away_family" name="passed_away_family">
                                <label class="form-check-label" for="passed_away_family">
                                    Passed Away
                                </label>
                            </div>
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

    <div class="modal fade" id="modal-identity-card" tabindex="-1" role="dialog" aria-labelledby="label-identity-card" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="label-identity-card">Add Identity Card</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="form_identity_card" action="<?php echo base_url() ?>proses-identity-card" enctype="multipart/form-data" method="post">
                <div class="modal-body">
                    <div class="row mb-3">
                        <label for="type_identity" class="col-sm-3 col-form-label required">Identity Card Type</label>
                        <div class="col-sm-5">
                            <select class="form-select" id="type_identity" name="type_identity" style="width: 100%;" required>
                            <?php
                                foreach($IdentityCardType as $value){ 
                            ?>
                                <option value="<?= $value['IdentityCardTypeId'] ?>"><?= $value['IdentityCardTypeName'] ?></option>
                            <?php
                                }
                            ?>
                            </select>
                        </div>
                        <input type="hidden" class="form-control" id="function_identity" name="function_identity" value="Add">
                    </div>
                    <div class="row mb-3">
                        <label for="no_identity" class="col-sm-3 col-form-label required">Identity Card No</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="no_identity" name="no_identity" placeholder="Identity Card No" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="start_date_identity" class="col-sm-3 col-form-label required">Start Date</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="start_date_identity" name="start_date_identity" placeholder="Start Date" required>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="lifetime_identity" name="lifetime_identity">
                                <label class="form-check-label" for="lifetime_identity">
                                    Lifetime
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="end_date_identity" class="col-sm-3 col-form-label">End Date</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="end_date_identity" name="end_date_identity" placeholder="End Date">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="file_identity" class="col-sm-3 col-form-label required">Attach File</label>
                        <div class="col-sm-9">
                            <input class="form-control" type="file" id="file_identity" name="file_identity" required>
                            <small>Acceptable file types are JPG, JPEG, and PNG. <strong>Max file size is 2 MB.</strong></small>
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

    <div class="modal fade" id="modal-vehicle" tabindex="-1" role="dialog" aria-labelledby="label-vehicle" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="label-vehicle">Add Vehicle</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="form_vehicle" action="<?php echo base_url() ?>proses-vehicle" enctype="multipart/form-data" method="post">
                <div class="modal-body">
                    <div class="row mb-3">
                        <label for="type_vehicle" class="col-sm-3 col-form-label required">Vehicle Type</label>
                        <div class="col-sm-5">
                            <select class="form-select" id="type_vehicle" name="type_vehicle" style="width: 100%;" required>
                            <?php
                                foreach($VehicleType as $value){ 
                            ?>
                                <option value="<?= $value['VehicleTypeId'] ?>"><?= $value['VehicleTypeName'] ?></option>
                            <?php
                                }
                            ?>
                            </select>
                        </div>
                        <input type="hidden" class="form-control" id="function_vehicle" name="function_vehicle" value="Add">
                    </div>
                    <div class="row mb-3">
                        <label for="branch_vehicle" class="col-sm-3 col-form-label required">Vehicle Branch</label>
                        <div class="col-sm-9">
                            <select class="form-select select2" id="branch_vehicle" name="branch_vehicle" style="width: 100%;" required>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="police_no_vehicle" class="col-sm-3 col-form-label required">Police No</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="police_no_vehicle" name="police_no_vehicle" placeholder="Police No" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="end_date_vehicle" class="col-sm-3 col-form-label">End Date</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="end_date_vehicle" name="end_date_vehicle" placeholder="End Date">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="file_vehicle" class="col-sm-3 col-form-label">Attach File</label>
                        <div class="col-sm-9">
                            <input class="form-control" type="file" id="file_vehicle" name="file_vehicle">
                            <small>Acceptable file types are JPG, JPEG, and PNG. <strong>Max file size is 2 MB.</strong></small>
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

    <div class="modal fade" id="modal-personal-document" tabindex="-1" role="dialog" aria-labelledby="label-personal-document" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="label-personal-document">Add Personal Document</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="form_personal_document" action="<?php echo base_url() ?>proses-personal-document" enctype="multipart/form-data" method="post">
                <div class="modal-body">
                    <div class="row mb-3">
                        <label for="type_personal" class="col-sm-3 col-form-label required">Document Type</label>
                        <div class="col-sm-9">
                            <select class="form-select select2" id="type_personal" name="type_personal" style="width: 100%;" required>
                            </select>
                        </div>
                        <input type="hidden" class="form-control" id="function_personal" name="function_personal" value="Add">
                    </div>
                    <div class="row mb-3">
                        <label for="file_personal" class="col-sm-3 col-form-label">Attach File</label>
                        <div class="col-sm-9">
                            <input class="form-control" type="file" id="file_personal" name="file_personal">
                            <small>Acceptable file types are PDF. <strong>Max file size is 2 MB.</strong></small>
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

    <div class="modal fade" id="modal-emergency-contact" tabindex="-1" role="dialog" aria-labelledby="label-emergency-contact" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="label-emergency-contact">Add Emergency Contact</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="form_emergency_contact" action="<?php echo base_url() ?>proses-emergency-contact" method="post">
                <div class="modal-body">
                    <div class="row mb-3">
                        <label for="relation_emergency" class="col-sm-3 col-form-label required">Relation</label>
                        <div class="col-sm-9">
                            <select class="form-select" id="relation_emergency" name="relation_emergency" style="width: 100%;" required>
                            <?php
                                foreach($FamRel as $value){ 
                            ?>
                                <option value="<?= $value['FamRelId'] ?>"><?= $value['FamRelName'] ?></option>
                            <?php
                                }
                            ?>
                            </select>
                        </div>
                        <input type="hidden" class="form-control" id="function_emergency" name="function_emergency" value="Add">
                    </div>
                    <div class="row mb-3">
                        <label for="name_emergency" class="col-sm-3 col-form-label required">Name</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="name_emergency" name="name_emergency" placeholder="Name" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="address_emergency" class="col-sm-3 col-form-label required">Address</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="address_emergency" name="address_emergency" placeholder="Address" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="phone_emergency" class="col-sm-3 col-form-label required">Phone</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="phone_emergency" name="phone_emergency" placeholder="Phone" required>
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
    <!-- <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script> -->
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

        <?php if ($this->session->flashdata('error')): ?>
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: '<?php echo $this->session->flashdata('error'); ?>'
            });
        <?php endif; ?>

        $(document).ready(function() {
            // $('#certification_title_certification').select2();
            
            getJobFunction();
            getEducationMajor();
            getCertification();
            getCountry();
            getProvince();
            getBirthPlaceBasic();
            getBirthPlaceFamily();
            getSkill();
            getLanguage();
            getDocumentType();
            getVehicleBranch();

            $('#region_basic').change(function() {
                var id = $(this).val();
                $('#city_basic').prop('disabled', false);
                getCity(id);
            });

            $('#city_basic').on('change', function() {
                var id = $(this).val();
                $('#district_basic').prop('disabled', false);
                getDistrict(id);
            });

            $('#district_basic').on('change', function() {
                var id = $(this).val();
                $('#subdistrict_basic').prop('disabled', false);
                getSubdistrict(id);
            });

            CKEDITOR.replace('description_work');
            CKEDITOR.replace('description_summary');

            var pickrIssuanceDateStartCertification = flatpickr("#issuance_date_start_certification", {
                dateFormat: "Y-m-d",
                inline: false,
                altInput: true,
                altFormat: "Y-m-d",
                allowInput: true
            });

            var pickrIssuanceDateEndCertification = flatpickr("#issuance_date_end_certification", {
                dateFormat: "Y-m-d",
                inline: false,
                altInput: true,
                altFormat: "Y-m-d",
                allowInput: true
            });

            var pickrBirthdayBasic = flatpickr("#birthday_basic", {
                dateFormat: "Y-m-d",
                inline: false,
                altInput: true,
                altFormat: "Y-m-d",
                allowInput: true
            });

            var pickrBirthDateFamily = flatpickr("#birth_date_family", {
                dateFormat: "Y-m-d",
                inline: false,
                altInput: true,
                altFormat: "Y-m-d",
                allowInput: true
            });

            var pickrStartDateIdentity = flatpickr("#start_date_identity", {
                dateFormat: "Y-m-d",
                inline: false,
                altInput: true,
                altFormat: "Y-m-d",
                allowInput: true
            });

            var pickrEndDateIdentity = flatpickr("#end_date_identity", {
                dateFormat: "Y-m-d",
                inline: false,
                altInput: true,
                altFormat: "Y-m-d",
                allowInput: true
            });

            var pickrEndDateVehicle = flatpickr("#end_date_vehicle", {
                dateFormat: "Y-m-d",
                inline: false,
                altInput: true,
                altFormat: "Y-m-d",
                allowInput: true
            });

            function getEducationMajor(){
                $("#majoring_education").select2({
                    dropdownParent: $('#modal-education'),
                    placeholder: 'Choose Education Major',
                    ajax: { 
                        url: '<?= base_url() ?>get-education-major',
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
                                    id: item.EducationMajorId,
                                    text: item.EducationMajorName
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
                $("#job_function_work").select2({
                    dropdownParent: $('#modal-work-experience'),
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

            function getCertification(){
                $("#certification_title_certification").select2({
                    dropdownParent: $('#modal-certifications'),
                    placeholder: 'Choose Certification',
                    ajax: { 
                        url: '<?= base_url() ?>get-certification',
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
                                    id: item.CertificationId,
                                    text: item.CertificationName
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

            function getSkill(){
                $("#skill_skill").select2({
                    dropdownParent: $('#modal-skills'),
                    placeholder: 'Choose Skill',
                    ajax: { 
                        url: '<?= base_url() ?>get-skill',
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
                                    id: item.SkillId,
                                    text: item.SkillName
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

            function getLanguage(){
                $("#language_language").select2({
                    dropdownParent: $('#modal-languages'),
                    placeholder: 'Choose Language',
                    ajax: { 
                        url: '<?= base_url() ?>get-language',
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

            function getDocumentType(){
                $("#type_personal").select2({
                    dropdownParent: $('#modal-personal-document .modal-body'),
                    placeholder: 'Choose Document Type',
                    ajax: { 
                        url: '<?= base_url() ?>get-document-type',
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
                                    id: item.DocumentTypeId,
                                    text: item.DocumentTypeName
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

            function getVehicleBranch(){
                $("#branch_vehicle").select2({
                    dropdownParent: $('#modal-vehicle .modal-body'),
                    placeholder: 'Choose Vehicle Branch',
                    ajax: { 
                        url: '<?= base_url() ?>get-vehicle-branch',
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
                                    id: item.VehicleBranchId,
                                    text: item.VehicleBranchName
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
                $("#country_basic").select2({
                    dropdownParent: $('#modal-basic-information .modal-body'),
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
                $("#region_basic").select2({
                    dropdownParent: $('#modal-basic-information .modal-body'),
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

            function getBirthPlaceBasic(){
                $("#birth_place_basic").select2({
                    dropdownParent: $('#modal-basic-information .modal-body'),
                    placeholder: 'Choose Place of Birth',
                    ajax: { 
                        url: '<?= base_url() ?>get-city-all',
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
                                    id: item.CityName,
                                    text: item.CityName
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

            function getBirthPlaceFamily(){
                $("#birth_place_family").select2({
                    dropdownParent: $('#modal-family .modal-body'),
                    placeholder: 'Choose Place of Birth',
                    ajax: { 
                        url: '<?= base_url() ?>get-city-all',
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
                                    id: item.CityName,
                                    text: item.CityName
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

            function getCity(id = ''){
                $("#city_basic").select2({
                    dropdownParent: $('#modal-basic-information .modal-body'),
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

            function getDistrict(id = ''){
                $("#district_basic").select2({
                    dropdownParent: $('#modal-basic-information .modal-body'),
                    placeholder: 'Choose District',
                    ajax: { 
                        url: '<?= base_url() ?>get-district',
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
                                    id: item.KecamatanId,
                                    text: item.KecamatanName
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

            function getSubdistrict(id = ''){
                $("#subdistrict_basic").select2({
                    dropdownParent: $('#modal-basic-information .modal-body'),
                    placeholder: 'Choose Subdistrict',
                    ajax: { 
                        url: '<?= base_url() ?>get-subdistrict',
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
                                    id: item.KelurahanId,
                                    text: item.Kelurahanname
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

            document.getElementById('add_profile_basic').addEventListener('change', function() {
                const file = this.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function() {
                    const profileImage = document.querySelector('.profile-pict-basic img');
                    profileImage.src = reader.result;
                    }
                    reader.readAsDataURL(file);
                }
            });

            $('#btn-add-skill').on('click', function() {
                var html = '';

                html += '<li class="item" draggable="true">'+
                        '<iconify-icon icon="uil:draggabledots" style="margin: 10px;"></iconify-icon>'+
                        '<select class="form-select" id="skill_skill" name="skill_skill[]" style="width: 70%; margin: 20px;" required>'+
                        '</select>'+
                        '<select class="form-select" id="level_skill" name="level_skill[]" style="width: 30%; margin: 20px;" required>'+
                        
                        '</select>'+
                        '<a href="#" style="margin: 10px;"><i class="fa fa-trash"></i></a>'+
                        '</li>';
                
                $('#list-skill').append(html);
                
            });

            $('#add_profile').on('change', function() {
                if (this.files.length > 0) {
                    const reader = new FileReader();
                    reader.onload = function() {
                        const profileImage = document.querySelector('.profile-pict img');
                        profileImage.src = reader.result;
                    }
                    reader.readAsDataURL(this.files[0]);

                    var formData = new FormData();
                    formData.append('file', this.files[0]);

                    $.ajax({
                        url: '<?= base_url() ?>upload-photo-profile',
                        type: 'POST',
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: function(response) {
                            var jsonResponse = JSON.parse(response);
                            $('#img-photo-profile').attr('src', jsonResponse);
                        },
                        error: function(xhr, status, error) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: error
                            });
                        }
                    });
                }
            });

            $('#resume_file').on('change', function() {
                if (this.files.length > 0) {
                    var file = this.files[0];

                    var maxSize = 3 * 1024 * 1024; // 10 MB
                    if (file.size > maxSize) {
                        Swal.fire(
                            'Failed!',
                            'File size exceeds the maximum allowed size (3 MB).',
                            'error'
                        )
                        this.value = '';
                        return;
                    }

                    // Validate file mimetype
                    var allowedTypes = ['application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'];
                    if (allowedTypes.indexOf(file.type) === -1) {
                        Swal.fire(
                            'Failed!',
                            'Invalid file type. Allowed types: PDF, DOC, DOCX.',
                            'error'
                        )
                        return;
                    }

                    var formData = new FormData();
                    formData.append('file', this.files[0]);

                    $.ajax({
                        url: '<?= base_url() ?>proses-resume',
                        type: 'POST',
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: function(response) {
                            var jsonResponse = JSON.parse(response);
                            if(jsonResponse.status){
                                Swal.fire(
                                    'Success!',
                                    'Your file has been uploaded.',
                                    'success'
                                ).then((result) => {
                                    if (result.isConfirmed) {
                                        // Redirect to the desired page
                                        window.location.href = '<?= base_url() ?>user/profile'; // Replace with your URL
                                    }
                                });
                            }else{
                                Swal.fire(
                                    'Failed!',
                                    'Your item failed to upload.',
                                    'error'
                                )
                            }
                        },
                        error: function(xhr, status, error) {
                            Swal.fire(
                                'Failed!',
                                error,
                                'error'
                            )
                        }
                    });
                }
            });

            $('#edit-basic').on('click', function() {
                $.ajax({
                    url: '<?= base_url() ?>view-basic',
                    type: 'POST',
                    success: function(response) {
                        var jsonResponse = JSON.parse(response);
                        $('#country_basic').val(jsonResponse.CountryId).trigger('change');
                        var newOptionCountry = new Option(jsonResponse.CountryName, jsonResponse.CountryId, false, false);
                        $('#country_basic').append(newOptionCountry).trigger('change');
                        var newOptionProvince = new Option(jsonResponse.ProvinceName, jsonResponse.ProvinceId, false, false);
                        $('#region_basic').append(newOptionProvince).trigger('change');
                        var newOptionCity = new Option(jsonResponse.CityName, jsonResponse.CityId, false, false);
                        $('#city_basic').append(newOptionCity).trigger('change');
                        var newOptionDistrict = new Option(jsonResponse.KecamatanName, jsonResponse.KecamatanId, false, false);
                        $('#district_basic').append(newOptionDistrict).trigger('change');
                        var newOptionSubdistrict = new Option(jsonResponse.Kelurahanname, jsonResponse.KelurahanId, false, false);
                        $('#subdistrict_basic').append(newOptionSubdistrict).trigger('change');
                        var newOptionBirthPlace = new Option(jsonResponse.PlaceOfBirth, jsonResponse.PlaceOfBirth, false, false);
                        $('#birth_place_basic').append(newOptionBirthPlace).trigger('change');
                        pickrBirthdayBasic.setDate(jsonResponse.BirthDay);
                        $('input[name="gender_basic"]').filter('[value="' + jsonResponse.GenderId + '"]').prop('checked', true);
                        $('#job_seeking_basic').val(jsonResponse.JobSeekingStatusId).trigger('change');
                        $('#marital_status_basic').val(jsonResponse.MaritalStatusId).trigger('change');
                        $('#religion_basic').val(jsonResponse.ReligionId).trigger('change');
                        $('#blood_type_basic').val(jsonResponse.BloodId).trigger('change');
                        $('#first_name_basic').val(jsonResponse.FirstName);
                        $('#last_name_basic').val(jsonResponse.LastName);
                        $('#street_address_basic').val(jsonResponse.Address);
                        $('#rt_basic').val(jsonResponse.RT);
                        $('#rw_basic').val(jsonResponse.RW);
                        $('#no_basic').val(jsonResponse.HouseNo);
                        $('#email_basic').val(jsonResponse.Email);
                        // $('#code_mobile_basic').val(jsonResponse.PhoneNumberCode);
                        $('#mobile_number_basic').val(jsonResponse.PhoneNumber);
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            });

            $('#update-email').on('click', function() {
                var email = $('#email_basic').val();
                if (email.trim() === '') {
                    Swal.fire(
                        'Error!',
                        'Email cannot be empty.',
                        'error'
                    )
                }else{
                    Swal.fire({
                        title: 'Are you sure?',
                        text: "You won't be able to revert this!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#3085d6',
                        confirmButtonText: 'Yes, change it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $.ajax({
                                url: '<?= base_url() ?>update-email',
                                type: 'POST',
                                data: { 'email' : email },
                                success: function(response) {
                                    var jsonResponse = JSON.parse(response);
                                    if(jsonResponse.status){
                                        Swal.fire(
                                            'Success!',
                                            jsonResponse.message,
                                            'success'
                                        ).then((result) => {
                                            if (result.isConfirmed) {
                                                // Redirect to the desired page
                                                window.location.href = '<?= base_url() ?>user/profile'; // Replace with your URL
                                            }
                                        });
                                    }else{
                                        Swal.fire(
                                            'Error!',
                                            jsonResponse.message,
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
                }
            });

            $('#edit-salary').on('click', function() {
                $.ajax({
                    url: '<?= base_url() ?>view-salary',
                    type: 'POST',
                    success: function(response) {
                        var jsonResponse = JSON.parse(response);
                        $('#currency_salary').val(jsonResponse[0].CurrencyId).trigger('change');
                        $('#minimum_salary').val(jsonResponse[0].MinimumSalary);
                        $('#maximum_salary').val(jsonResponse[0].MaximumSalary);
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            });

            $('.edit-work-experience').on('click', function() {
                var id = $(this).data('id');

                $.ajax({
                    url: '<?= base_url() ?>view-work-experience',
                    type: 'POST',
                    data: { 'id' : id },
                    success: function(response) {
                        var jsonResponse = JSON.parse(response);
                        $('#from_month_work').val(jsonResponse[0].StartMonth).trigger('change');
                        $('#from_year_work').val(jsonResponse[0].StartYear).trigger('change');
                        $('#to_month_work').val(jsonResponse[0].EndMonth).trigger('change');
                        $('#to_year_work').val(jsonResponse[0].EndYear).trigger('change');
                        $('#job_level_work').val(jsonResponse[0].JobLevelId).trigger('change');
                        $('#job_function_work').val(jsonResponse[0].JobFunctionId).trigger('change');
                        // $('#currency_work').val().trigger('change');
                        $('#job_title_work').val(jsonResponse[0].JobTitle);
                        $('#function_work').val('Edit');
                        $('#company_work').val(jsonResponse[0].Company);
                        CKEDITOR.instances.description_work.setData(jsonResponse[0].Description);
                        $('#amount_work').val(jsonResponse[0].SalaryAmount);
                        if(jsonResponse[0].IsCurrently){
                            $('#currently_work_work').prop('checked', true).trigger('change');
                        }else{
                            $('#currently_work_work').prop('checked', false).trigger('change');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            });

            $('#currently_work_work').on('change', function() {
                if ($(this).is(':checked')) {
                    var currentDate = new Date();
                    var currentYear = currentDate.getFullYear(); // Dapatkan tahun saat ini
                    var currentMonth = currentDate.getMonth() + 1; // Dapatkan bulan saat ini (diberikan +1 karena Januari dimulai dari 0)

                    // Setel nilai default pada elemen select bulan dan tahun
                    $('#to_month_work').val(currentMonth);
                    $('#to_year_work').val(currentYear);

                    $('#to_month_work').prop('disabled', true);
                    $('#to_year_work').prop('disabled', true);
                } else {
                    $('#to_month_work').prop('disabled', false);
                    $('#to_year_work').prop('disabled', false);
                }
            });

            $('.edit-education').on('click', function() {
                var id = $(this).data('id');

                $.ajax({
                    url: '<?= base_url() ?>view-education',
                    type: 'POST',
                    data: { 'id' : id },
                    success: function(response) {
                        var jsonResponse = JSON.parse(response);
                        $('#education_attainment_education').val(jsonResponse[0].EducationLevelId).trigger('change');
                        $('#majoring_education').val(jsonResponse[0].EducationMajorId).trigger('change');
                        $('#from_month_education').val(jsonResponse[0].StartMonth).trigger('change');
                        $('#from_year_education').val(jsonResponse[0].StartYear).trigger('change');
                        $('#to_month_education').val(jsonResponse[0].EndMonth).trigger('change');
                        $('#to_year_education').val(jsonResponse[0].EndYear).trigger('change');
                        $('#function_education').val('Edit');
                        $('#school_education').val(jsonResponse[0].SchoolName);
                        $('#description_education').val(jsonResponse[0].Description);
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            });

            $('.edit-skill').on('click', function() {
                var id = $(this).data('id');

                $.ajax({
                    url: '<?= base_url() ?>view-skill',
                    type: 'POST',
                    data: { 'id' : id },
                    success: function(response) {
                        var jsonResponse = JSON.parse(response);
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            });

            $('#edit-summary').on('click', function() {
                $.ajax({
                    url: '<?= base_url() ?>view-summary',
                    type: 'POST',
                    success: function(response) {
                        var jsonResponse = JSON.parse(response);
                        CKEDITOR.instances.description_summary.setData(jsonResponse.description);
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            });

            $('.edit-affiliation').on('click', function() {
                var id = $(this).data('id');

                $.ajax({
                    url: '<?= base_url() ?>view-affiliation',
                    type: 'POST',
                    data: { 'id' : id },
                    success: function(response) {
                        var jsonResponse = JSON.parse(response);
                        $('#from_month_affiliations').val(jsonResponse[0].StartMonth).trigger('change');
                        $('#from_year_affiliations').val(jsonResponse[0].StartYear).trigger('change');
                        $('#to_month_affiliations').val(jsonResponse[0].EndMonth).trigger('change');
                        $('#to_year_affiliations').val(jsonResponse[0].EndYear).trigger('change');
                        $('#organizations_affiliations').val(jsonResponse[0].Organization);
                        $('#function_affiliation').val('Edit');
                        $('#role_affiliations').val(jsonResponse[0].Position);
                        $('#description_affiliations').val('');
                        if(jsonResponse[0].IsPresent){
                            $('#present_affiliations').prop('checked', true).trigger('change');
                        }else{
                            $('#present_affiliations').prop('checked', false).trigger('change');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            });

            $('#present_affiliations').on('change', function() {
                if ($(this).is(':checked')) {
                    var currentDate = new Date();
                    var currentYear = currentDate.getFullYear(); // Dapatkan tahun saat ini
                    var currentMonth = currentDate.getMonth() + 1; // Dapatkan bulan saat ini (diberikan +1 karena Januari dimulai dari 0)

                    // Setel nilai default pada elemen select bulan dan tahun
                    $('#to_month_affiliations').val(currentMonth);
                    $('#to_year_affiliations').val(currentYear);

                    $('#to_month_affiliations').prop('disabled', true);
                    $('#to_year_affiliations').prop('disabled', true);
                } else {
                    $('#to_month_affiliations').prop('disabled', false);
                    $('#to_year_affiliations').prop('disabled', false);
                }
            });

            $('.edit-seminar').on('click', function() {
                var id = $(this).data('id');

                $.ajax({
                    url: '<?= base_url() ?>view-seminar',
                    type: 'POST',
                    data: { 'id' : id },
                    success: function(response) {
                        var jsonResponse = JSON.parse(response);
                        $('#from_month_seminars').val(jsonResponse[0].StartMonth).trigger('change');
                        $('#from_year_seminars').val(jsonResponse[0].StartYear).trigger('change');
                        $('#to_month_seminars').val(jsonResponse[0].EndMonth).trigger('change');
                        $('#to_year_seminars').val(jsonResponse[0].EndYear).trigger('change');
                        $('#title_seminars').val(jsonResponse[0].SeminarTrainingName);
                        $('#function_seminars').val('Edit');
                        $('#organizer_seminars').val(jsonResponse[0].Organizer);
                        if(jsonResponse[0].IsSingleDate){
                            $('#single_date_seminars').prop('checked', true).trigger('change');
                        }else{
                            $('#single_date_seminars').prop('checked', false).trigger('change');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            });

            $('#single_date_seminars').on('change', function() {
                if ($(this).is(':checked')) {
                    var currentDate = new Date();
                    var currentYear = currentDate.getFullYear(); // Dapatkan tahun saat ini
                    var currentMonth = currentDate.getMonth() + 1; // Dapatkan bulan saat ini (diberikan +1 karena Januari dimulai dari 0)

                    // Setel nilai default pada elemen select bulan dan tahun
                    $('#to_month_seminars').val(currentMonth);
                    $('#to_year_seminars').val(currentYear);

                    $('#to_month_seminars').prop('disabled', true);
                    $('#to_year_seminars').prop('disabled', true);
                } else {
                    $('#to_month_seminars').prop('disabled', false);
                    $('#to_year_seminars').prop('disabled', false);
                }
            });

            $('.edit-award').on('click', function() {
                var id = $(this).data('id');

                $.ajax({
                    url: '<?= base_url() ?>view-award',
                    type: 'POST',
                    data: { 'id' : id },
                    success: function(response) {
                        var jsonResponse = JSON.parse(response);
                        $('#date_month_awards').val(jsonResponse[0].Month).trigger('change');
                        $('#date_year_awards').val(jsonResponse[0].Year).trigger('change');
                        $('#title_awards').val(jsonResponse[0].Title);
                        $('#function_awards').val('Edit');
                        $('#issuer_awards').val(jsonResponse[0].Issuer);
                        $('#description_awards').val(jsonResponse[0].Description);
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            });

            $('.edit-test-score').on('click', function() {
                var id = $(this).data('id');

                $.ajax({
                    url: '<?= base_url() ?>view-test-score',
                    type: 'POST',
                    data: { 'id' : id },
                    success: function(response) {
                        var jsonResponse = JSON.parse(response);
                        $('#date_month_test').val(jsonResponse[0].Month).trigger('change');
                        $('#date_year_test').val(jsonResponse[0].Year).trigger('change');
                        $('#title_test').val(jsonResponse[0].Title);
                        $('#function_test').val('Edit');
                        $('#result_test').val(jsonResponse[0].Result);
                        $('#description_test').val('');
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            });

            $('.edit-volunteerism').on('click', function() {
                var id = $(this).data('id');

                $.ajax({
                    url: '<?= base_url() ?>view-volunteerism',
                    type: 'POST',
                    data: { 'id' : id },
                    success: function(response) {
                        var jsonResponse = JSON.parse(response);
                        $('#cause_volunteerism').val(jsonResponse[0].CauseId).trigger('change');
                        $('#from_month_volunteerism').val(jsonResponse[0].StartMonth).trigger('change');
                        $('#from_year_volunteerism').val(jsonResponse[0].StartYear).trigger('change');
                        $('#to_month_volunteerism').val(jsonResponse[0].EndMonth).trigger('change');
                        $('#to_year_volunteerism').val(jsonResponse[0].EndYear).trigger('change');
                        $('#organization_volunteerism').val(jsonResponse[0].Organization);
                        $('#function_volunteerism').val('Edit');
                        $('#role_volunteerism').val(jsonResponse[0].Position);
                        $('#description_volunteerism').val('');
                        $('#link_volunteerism').val('');
                        if(jsonResponse[0].IsCurrent){
                            $('#present_volunteerism').prop('checked', true).trigger('change');
                        }else{
                            $('#present_volunteerism').prop('checked', false).trigger('change');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            });

            $('#present_volunteerism').on('change', function() {
                if ($(this).is(':checked')) {
                    var currentDate = new Date();
                    var currentYear = currentDate.getFullYear(); // Dapatkan tahun saat ini
                    var currentMonth = currentDate.getMonth() + 1; // Dapatkan bulan saat ini (diberikan +1 karena Januari dimulai dari 0)

                    // Setel nilai default pada elemen select bulan dan tahun
                    $('#to_month_volunteerism').val(currentMonth);
                    $('#to_year_volunteerism').val(currentYear);

                    $('#to_month_volunteerism').prop('disabled', true);
                    $('#to_year_volunteerism').prop('disabled', true);
                } else {
                    $('#to_month_volunteerism').prop('disabled', false);
                    $('#to_year_volunteerism').prop('disabled', false);
                }
            });

            $('.edit-reference').on('click', function() {
                var id = $(this).data('id');

                $.ajax({
                    url: '<?= base_url() ?>view-reference',
                    type: 'POST',
                    data: { 'id' : id },
                    success: function(response) {
                        var jsonResponse = JSON.parse(response);
                        // $('#available_references').val(jsonResponse[0].MinimumSalary);
                        $('#function_references').val('Edit');
                        $('#name_references').val(jsonResponse[0].Name);
                        $('#occupation_references').val(jsonResponse[0].Occupation);
                        $('#company_references').val(jsonResponse[0].Company);
                        $('#phone_references').val(jsonResponse[0].Phone);
                        $('#email_references').val(jsonResponse[0].Email);
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            });

            $('.edit-cocurricular').on('click', function() {
                var id = $(this).data('id');

                $.ajax({
                    url: '<?= base_url() ?>view-cocurricular',
                    type: 'POST',
                    data: { 'id' : id },
                    success: function(response) {
                        var jsonResponse = JSON.parse(response);
                        $('#from_month_co_curricular').val(jsonResponse[0].StartMonth).trigger('change');
                        $('#from_year_co_curricular').val(jsonResponse[0].StartYear).trigger('change');
                        $('#to_month_co_curricular').val(jsonResponse[0].EndMonth).trigger('change');
                        $('#to_year_co_curricular').val(jsonResponse[0].EndYear).trigger('change');
                        $('#organization_co_curricular').val(jsonResponse[0].Organization);
                        $('#function_co_curricular').val('Edit');
                        $('#role_co_curricular').val(jsonResponse[0].Role);
                        $('#description_co_curricular').val(jsonResponse[0].Description);
                        if(jsonResponse[0].IsPresent){
                            $('#present_co_curricular').prop('checked', true).trigger('change');
                        }else{
                            $('#present_co_curricular').prop('checked', false).trigger('change');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            });

            $('#present_co_curricular').on('change', function() {
                if ($(this).is(':checked')) {
                    var currentDate = new Date();
                    var currentYear = currentDate.getFullYear(); // Dapatkan tahun saat ini
                    var currentMonth = currentDate.getMonth() + 1; // Dapatkan bulan saat ini (diberikan +1 karena Januari dimulai dari 0)

                    // Setel nilai default pada elemen select bulan dan tahun
                    $('#to_month_co_curricular').val(currentMonth);
                    $('#to_year_co_curricular').val(currentYear);

                    $('#to_month_co_curricular').prop('disabled', true);
                    $('#to_year_co_curricular').prop('disabled', true);
                } else {
                    $('#to_month_co_curricular').prop('disabled', false);
                    $('#to_year_co_curricular').prop('disabled', false);
                }
            });

            $('.edit-project').on('click', function() {
                var id = $(this).data('id');

                $.ajax({
                    url: '<?= base_url() ?>view-project',
                    type: 'POST',
                    data: { 'id' : id },
                    success: function(response) {
                        var jsonResponse = JSON.parse(response);
                        $('#from_month_projects').val(jsonResponse[0].StartMonth).trigger('change');
                        $('#from_year_projects').val(jsonResponse[0].StartYear).trigger('change');
                        $('#to_month_projects').val(jsonResponse[0].EndMonth).trigger('change');
                        $('#to_year_projects').val(jsonResponse[0].EndYear).trigger('change');
                        $('#project_name_projects').val(jsonResponse[0].ProjectName);
                        $('#function_projects').val('Edit');
                        $('#role_projects').val(jsonResponse[0].RoleDescription);
                        $('#link_projects').val(jsonResponse[0].Link);
                        $('#description_projects').val(jsonResponse[0].Description);
                        if(jsonResponse[0].IsPresent){
                            $('#present_projects').prop('checked', true).trigger('change');
                        }else{
                            $('#present_projects').prop('checked', false).trigger('change');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            });

            $('#present_projects').on('change', function() {
                if ($(this).is(':checked')) {
                    var currentDate = new Date();
                    var currentYear = currentDate.getFullYear(); // Dapatkan tahun saat ini
                    var currentMonth = currentDate.getMonth() + 1; // Dapatkan bulan saat ini (diberikan +1 karena Januari dimulai dari 0)

                    // Setel nilai default pada elemen select bulan dan tahun
                    $('#to_month_projects').val(currentMonth);
                    $('#to_year_projects').val(currentYear);

                    $('#to_month_projects').prop('disabled', true);
                    $('#to_year_projects').prop('disabled', true);
                } else {
                    $('#to_month_projects').prop('disabled', false);
                    $('#to_year_projects').prop('disabled', false);
                }
            });

            $('.edit-language').on('click', function() {
                var id = $(this).data('id');

                $.ajax({
                    url: '<?= base_url() ?>view-language',
                    type: 'POST',
                    data: { 'id' : id },
                    success: function(response) {
                        var jsonResponse = JSON.parse(response);
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            });

            $('.edit-certification').on('click', function() {
                var id = $(this).data('id');

                $.ajax({
                    url: '<?= base_url() ?>view-certification',
                    type: 'POST',
                    data: { 'id' : id },
                    success: function(response) {
                        var jsonResponse = JSON.parse(response);
                        var newOption = new Option(jsonResponse[0].certificationName, jsonResponse[0].CertificationId, false, false);
                        $('#certification_title_certification').append(newOption).trigger('change');
                        pickrIssuanceDateStartCertification.setDate(jsonResponse[0].IssuanceDateFrom);
                        pickrIssuanceDateEndCertification.setDate(jsonResponse[0].IssuanceDateEnd);
                        $('#function_certification').val('Edit');
                        $('#issuer_certification').val(jsonResponse[0].Issuer);
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            });

            $('.edit-family').on('click', function() {
                var id = $(this).data('id');

                $.ajax({
                    url: '<?= base_url() ?>view-family',
                    type: 'POST',
                    data: { 'id' : id },
                    success: function(response) {
                        var jsonResponse = JSON.parse(response);
                        $('#relation_family').val(jsonResponse[0].FamRelId).trigger('change');
                        $('#gender_family').val(jsonResponse[0].FamGenderId).trigger('change');
                        $('#blood_family').val(jsonResponse[0].FamBloodId).trigger('change');
                        $('#name_family').val(jsonResponse[0].FamName);
                        $('#id_no_family').val(jsonResponse[0].FamIdCardNo);
                        $('#address_family').val(jsonResponse[0].FamResAddr);
                        $('#phone_family').val(jsonResponse[0].FamPhone);
                        $('#function_family').val('Edit');
                        var newOption = new Option(jsonResponse[0].FamPlaceOfBirth, jsonResponse[0].FamPlaceOfBirth, false, false);
                        $('#birth_place_family').append(newOption).trigger('change');
                        pickrBirthDateFamily.setDate(jsonResponse[0].FamDateBirth);
                        if(jsonResponse[0].PassedAway){
                            $('#passed_away_family').prop('checked', true).trigger('change');
                        }else{
                            $('#passed_away_family').prop('checked', false).trigger('change');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            });

            $('.edit-identity').on('click', function() {
                var id = $(this).data('id');

                $.ajax({
                    url: '<?= base_url() ?>view-identity-card',
                    type: 'POST',
                    data: { 'id' : id },
                    success: function(response) {
                        var jsonResponse = JSON.parse(response);
                        $('#type_identity').val(jsonResponse[0].IdentityCardTypeId).trigger('change');
                        $('#no_identity').val(jsonResponse[0].IdentityCardNo);
                        $('#function_identity').val('Edit');
                        pickrStartDateIdentity.setDate(jsonResponse[0].Startdate);
                        pickrEndDateIdentity.setDate(jsonResponse[0].Enddate);
                        if(jsonResponse[0].Islifetime){
                            $('#lifetime_identity').prop('checked', true).trigger('change');
                        }else{
                            $('#lifetime_identity').prop('checked', false).trigger('change');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            });

            $('#lifetime_identity').on('change', function() {
                if ($(this).is(':checked')) {
                    var currentDate = new Date();
                    var formattedDate = currentDate.toISOString().split('T')[0];

                    // Setel nilai default pada elemen select bulan dan tahun
                    pickrEndDateIdentity.setDate(formattedDate);

                    pickrEndDateIdentity._input.setAttribute("disabled", "disabled");
                } else {
                    pickrEndDateIdentity._input.removeAttribute("disabled");
                }
            });

            $('.edit-vehicle').on('click', function() {
                var id = $(this).data('id');

                $.ajax({
                    url: '<?= base_url() ?>view-vehicle',
                    type: 'POST',
                    data: { 'id' : id },
                    success: function(response) {
                        var jsonResponse = JSON.parse(response);
                        $('#type_vehicle').val(jsonResponse[0].VehicleTypeId).trigger('change');
                        $('#police_no_vehicle').val(jsonResponse[0].PoliceNo);
                        var newOption = new Option(jsonResponse[0].VehicleBranchData.VehicleBranchName, jsonResponse[0].VehicleBranchId, false, false);
                        $('#branch_vehicle').append(newOption).trigger('change');
                        $('#function_vehicle').val('Edit');
                        pickrEndDateVehicle.setDate(jsonResponse[0].EndDate);
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            });

            $('.edit-personal-document').on('click', function() {
                var id = $(this).data('id');

                $.ajax({
                    url: '<?= base_url() ?>view-personal-document',
                    type: 'POST',
                    data: { 'id' : id },
                    success: function(response) {
                        var jsonResponse = JSON.parse(response);
                        var newOption = new Option(jsonResponse[0].DocumentTypeData.DocumentTypeName, jsonResponse[0].DocumentTypeId, false, false);
                        $('#type_personal').append(newOption).trigger('change');
                        $('#function_personal').val('Edit');
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            });

            $('.edit-emergency-contact').on('click', function() {
                var id = $(this).data('id');

                $.ajax({
                    url: '<?= base_url() ?>view-emergency-contact',
                    type: 'POST',
                    data: { 'id' : id },
                    success: function(response) {
                        var jsonResponse = JSON.parse(response);
                        $('#relation_emergency').val(jsonResponse[0].FamRelId).trigger('change');
                        $('#name_emergency').val(jsonResponse[0].EcontactName);
                        $('#address_emergency').val(jsonResponse[0].EcontactAddr);
                        $('#phone_emergency').val(jsonResponse[0].EcontactPhone);
                        $('#function_emergency').val('Edit');
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            });

            $('.delete-salary').on('click', function() {
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
                            url: '<?= base_url() ?>delete-salary',
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
                                            // Redirect to the desired page
                                            window.location.href = '<?= base_url() ?>user/profile'; // Replace with your URL
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

            $('.delete-work-experience').on('click', function() {
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
                            url: '<?= base_url() ?>delete-work-experience',
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
                                            // Redirect to the desired page
                                            window.location.href = '<?= base_url() ?>user/profile'; // Replace with your URL
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

            $('.delete-education').on('click', function() {
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
                            url: '<?= base_url() ?>delete-education',
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
                                            // Redirect to the desired page
                                            window.location.href = '<?= base_url() ?>user/profile'; // Replace with your URL
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

            $('.delete-skill').on('click', function() {
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
                            url: '<?= base_url() ?>delete-skill',
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
                                            // Redirect to the desired page
                                            window.location.href = '<?= base_url() ?>user/profile'; // Replace with your URL
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

            $('.delete-summary').on('click', function() {
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
                            url: '<?= base_url() ?>delete-summary',
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
                                            // Redirect to the desired page
                                            window.location.href = '<?= base_url() ?>user/profile'; // Replace with your URL
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

            $('.delete-affiliation').on('click', function() {
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
                            url: '<?= base_url() ?>delete-affiliation',
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
                                            // Redirect to the desired page
                                            window.location.href = '<?= base_url() ?>user/profile'; // Replace with your URL
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

            $('.delete-seminar').on('click', function() {
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
                            url: '<?= base_url() ?>delete-seminar',
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
                                            // Redirect to the desired page
                                            window.location.href = '<?= base_url() ?>user/profile'; // Replace with your URL
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

            $('.delete-award').on('click', function() {
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
                            url: '<?= base_url() ?>delete-award',
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
                                            // Redirect to the desired page
                                            window.location.href = '<?= base_url() ?>user/profile'; // Replace with your URL
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

            $('.delete-test-score').on('click', function() {
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
                            url: '<?= base_url() ?>delete-test-score',
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
                                            // Redirect to the desired page
                                            window.location.href = '<?= base_url() ?>user/profile'; // Replace with your URL
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

            $('.delete-volunteerism').on('click', function() {
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
                            url: '<?= base_url() ?>delete-volunteerism',
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
                                            // Redirect to the desired page
                                            window.location.href = '<?= base_url() ?>user/profile'; // Replace with your URL
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

            $('.delete-reference').on('click', function() {
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
                            url: '<?= base_url() ?>delete-reference',
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
                                            // Redirect to the desired page
                                            window.location.href = '<?= base_url() ?>user/profile'; // Replace with your URL
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

            $('.delete-cocurricular').on('click', function() {
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
                            url: '<?= base_url() ?>delete-cocurricular',
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
                                            // Redirect to the desired page
                                            window.location.href = '<?= base_url() ?>user/profile'; // Replace with your URL
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

            $('.delete-profile').on('click', function() {
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
                            url: '<?= base_url() ?>delete-profile',
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
                                            // Redirect to the desired page
                                            window.location.href = '<?= base_url() ?>user/profile'; // Replace with your URL
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
            
            $('.delete-language').on('click', function() {
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
                            url: '<?= base_url() ?>delete-language',
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
                                            // Redirect to the desired page
                                            window.location.href = '<?= base_url() ?>user/profile'; // Replace with your URL
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

            $('.delete-certification').on('click', function() {
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
                            url: '<?= base_url() ?>delete-certification',
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
                                            // Redirect to the desired page
                                            window.location.href = '<?= base_url() ?>user/profile'; // Replace with your URL
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

            $('.delete-family').on('click', function() {
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
                            url: '<?= base_url() ?>delete-family',
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
                                            // Redirect to the desired page
                                            window.location.href = '<?= base_url() ?>user/profile'; // Replace with your URL
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

            $('.delete-identity-card').on('click', function() {
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
                            url: '<?= base_url() ?>delete-identity-card',
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
                                            // Redirect to the desired page
                                            window.location.href = '<?= base_url() ?>user/profile'; // Replace with your URL
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

            $('.delete-vehicle').on('click', function() {
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
                            url: '<?= base_url() ?>delete-vehicle',
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
                                            // Redirect to the desired page
                                            window.location.href = '<?= base_url() ?>user/profile'; // Replace with your URL
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

            $('.delete-personal-document').on('click', function() {
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
                            url: '<?= base_url() ?>delete-personal-document',
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
                                            // Redirect to the desired page
                                            window.location.href = '<?= base_url() ?>user/profile'; // Replace with your URL
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

            $('.delete-emergency-contact').on('click', function() {
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
                            url: '<?= base_url() ?>delete-emergency-contact',
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
                                            // Redirect to the desired page
                                            window.location.href = '<?= base_url() ?>user/profile'; // Replace with your URL
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
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
                        <a href="<?= base_url() ?>job-status?jobId=<?= $JobVacancy['JobVacancyId'] ?>&category=<?= $Category ?>" class="col-sm-1 justify-content-center align-items-center">
                            <i class="fa fa-chevron-left"></i>
                        </a>
                        <div class="col-sm-9">
                            <strong>Back</strong>
                        </div>
                    </div>
                </div>
                <div class="row m-2">
                    <div class="col-sm-9">
                        <div class="row m-1">
                            <div class="col-sm-2">
                                <?php
                                if(empty($CanProfile['PhotoProfile'])){
                                ?>
                                <img src="<?php echo base_url() ?>assets/template/images/avatar/no-photo.PNG" alt="Profile Picture" id="img-photo-profile" class="profile-picture-candidate rounded-image">
                                <?php
                                }else{
                                ?>
                                <img src="<?php echo base_url() ?>assets/template/images/avatar/<?= $CanProfile['PhotoProfile'] ?>" alt="Profile Picture" id="img-photo-profile" class="profile-picture-candidate rounded-image">
                                <?php
                                }
                                ?>
                            </div>
                            <div class="col-sm-10">
                                <p class="m-0 p-0" style="font-size: 4vh;"><strong><?= (empty($CanProfile['FirstName'])) ? 'Anonymous' : $CanProfile['FirstName'] . ' ' . $CanProfile['LastName'] ?></strong></p>
                                <p style="font-size: 2.5vh;">
                                    <span><?= (empty($CanProfile['LocationDisplay'])) ? '-' : $CanProfile['LocationDisplay'] ?></span><br>
                                    <span><?= (empty($CanProfile['JobSeekingStatusName'])) ? '-' : $CanProfile['JobSeekingStatusName'] ?></span>
                                </p>
                            </div>
                        </div>
                        <div class="row m-1">
                            <hr>
                            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="profile-tab" data-bs-toggle="pill" data-bs-target="#tab-profile" type="button" role="tab" aria-controls="tab-profile" aria-selected="true" style="font-size: 0.9rem;">Profile</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="assessments-tab" data-bs-toggle="pill" data-bs-target="#tab-assessments" type="button" role="tab" aria-controls="tab-assessments" aria-selected="false" style="font-size: 0.9rem;">Assessments</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="custom-questions-tab" data-bs-toggle="pill" data-bs-target="#tab-custom-questions" type="button" role="tab" aria-controls="tab-custom-questions" aria-selected="false" style="font-size: 0.9rem;">Custom Questions</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="messages-tab" data-bs-toggle="pill" data-bs-target="#tab-messages" type="button" role="tab" aria-controls="tab-messages" aria-selected="false" style="font-size: 0.9rem;">Messages</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="activities-tab" data-bs-toggle="pill" data-bs-target="#tab-activities" type="button" role="tab" aria-controls="tab-activities" aria-selected="false" style="font-size: 0.9rem;">Activities</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="notes-tab" data-bs-toggle="pill" data-bs-target="#tab-notes" type="button" role="tab" aria-controls="tab-notes" aria-selected="false" style="font-size: 0.9rem;">Notes</button>
                                </li>
                            </ul>
                            <hr>
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="tab-profile" role="tabpanel" aria-labelledby="profile-tab">
                                    <p><strong>WORK HISTORY</strong></p>
                                    <?php
                                        if(!empty($WorkExperience)){
                                            foreach($WorkExperience as $index => $value){
                                    ?>
                                    <p>
                                        <span style="font-size: 1rem;"><strong><?= $value['JobTitle'] ?></strong></span><br>
                                        <span style="font-size: 0.8rem;"><?= $value['Company'] ?> <?= $value['Period'] ?></span><br>
                                        <div class="text-justify" style="font-size: 0.8rem;">
                                            <?= empty($value['Description']) ? '<p>No Description</p>' : $value['Description'] ?>
                                        </div>
                                    </p>
                                    <?php
                                            }
                                        }else{
                                    ?>
                                    <p>No Data Available</p>
                                    <?php
                                        }
                                    ?>
                                    <hr>
                                    <p><strong>EXPECTED SALARY</strong></p>
                                    <?php
                                        if(!empty($SalaryExpectation)){
                                            foreach($SalaryExpectation as $index => $value){
                                    ?>
                                    <p>
                                        <span style="font-size: 0.8rem;"><?= $value['Display'] ?></span><br>
                                    </p>
                                    <?php
                                            }
                                        }else{
                                    ?>
                                    <p>No Data Available</p>
                                    <?php
                                        }
                                    ?>
                                    <hr>
                                    <p><strong>EDUCATION</strong></p>
                                    <?php
                                        if(!empty($Education)){
                                            foreach($Education as $index => $value){
                                    ?>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p><?= $value['Period'] ?></p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p>
                                                <span><strong><?= $value['SchoolName'] ?></strong></span><br>
                                                <span><?= $value['EducationMajorName'] ?></span><br>
                                                <span style="font-size: 0.7rem;"><?= $value['EducationLevelName'] ?></span>
                                            </p>
                                        </div>
                                    </div>
                                    <?php
                                            }
                                        }else{
                                    ?>
                                    <p>No Data Available</p>
                                    <?php
                                        }
                                    ?>
                                    <hr>
                                    <p><strong>SKILLS</strong></p>
                                    <?php
                                        if(!empty($Skill)){
                                            foreach($Skill as $index => $value){
                                    ?>
                                    <p>
                                        <span style="font-size: 0.9rem;"><?= $value['SkillName'] ?></span> <span style="font-size: 0.7rem;"><?= $value['LevelSkillName'] ?></span>
                                    </p>
                                    <?php
                                            }
                                        }else{
                                    ?>
                                    <p>No Data Available</p>
                                    <?php
                                        }
                                    ?>
                                    <hr>
                                    <p><strong>SUMMARY</strong></p>
                                    <?php
                                        if(!empty($Summary)){
                                            foreach($Summary as $index => $value){
                                    ?>
                                    <p>
                                        <div class="text-justify" style="font-size: 0.8rem;"><?= $value['description'] ?></div>
                                    </p>
                                    <?php
                                            }
                                        }else{
                                    ?>
                                    <p>No Data Available</p>
                                    <?php
                                        }
                                    ?>
                                    <hr>
                                    <p><strong>AFFILIATIONS</strong></p>
                                    <?php
                                        if(!empty($Affiliation)){
                                            foreach($Affiliation as $index => $value){
                                    ?>
                                    <p>
                                        <span style="font-size: 0.9rem;"><?= $value['Organization'] ?></span><br>
                                        <span style="font-size: 0.7rem;"><?= $value['Position'] ?></span><br>
                                        <span style="font-size: 0.7rem;"><?= $value['Period'] ?></span>
                                    </p>
                                    <?php
                                            }
                                        }else{
                                    ?>
                                    <p>No Data Available</p>
                                    <?php
                                        }
                                    ?>
                                    <hr>
                                    <p><strong>SEMINAR AND TRAINING</strong></p>
                                    <?php
                                        if(!empty($Seminar)){
                                            foreach($Seminar as $index => $value){
                                    ?>
                                    <p>
                                        <span style="font-size: 0.9rem;"><?= $value['SeminarTrainingName'] ?></span><br>
                                        <span style="font-size: 0.7rem;"><?= $value['Organizer'] ?></span><br>
                                        <span style="font-size: 0.7rem;"><?= $value['Period'] ?></span>
                                    </p>
                                    <?php
                                            }
                                        }else{
                                    ?>
                                    <p>No Data Available</p>
                                    <?php
                                        }
                                    ?>
                                    <hr>
                                    <p><strong>AWARD AND ACHIEVEMENTS</strong></p>
                                    <?php
                                        if(!empty($Award)){
                                            foreach($Award as $index => $value){
                                    ?>
                                    <p>
                                        <span style="font-size: 0.9rem;"><?= $value['Name'] ?></span><br>
                                        <span style="font-size: 0.7rem;"><?= $value['Period'] ?></span><br>
                                        <div class="text-justify" style="font-size: 0.7rem;"> 
                                            <?= $value['Description'] ?>
                                        </div>
                                    </p>
                                    <?php
                                            }
                                        }else{
                                    ?>
                                    <p>No Data Available</p>
                                    <?php
                                        }
                                    ?>
                                    <hr>
                                    <p><strong>TEST SCORES</strong></p>
                                    <?php
                                        if(!empty($TestScore)){
                                            foreach($TestScore as $index => $value){
                                    ?>
                                    <p>
                                        <span style="font-size: 0.9rem;"><?= $value['Name'] ?></span><br>
                                        <span style="font-size: 0.7rem;"><?= $value['Period'] ?></span>
                                    </p>
                                    <?php
                                            }
                                        }else{
                                    ?>
                                    <p>No Data Available</p>
                                    <?php
                                        }
                                    ?>
                                    <hr>
                                    <p><strong>VOLUNTEERISM AND NON-PROFIT WORK</strong></p>
                                    <?php
                                        if(!empty($Volunteerism)){
                                            foreach($Volunteerism as $index => $value){
                                    ?>
                                    <p>
                                        <span style="font-size: 0.9rem;"><?= $value['Organization'] ?></span><br>
                                        <span style="font-size: 0.7rem;"><?= $value['Position'] ?></span><br>
                                        <span style="font-size: 0.7rem;"><?= $value['Period'] ?></span>
                                    </p>
                                    <?php
                                            }
                                        }else{
                                    ?>
                                    <p>No Data Available</p>
                                    <?php
                                        }
                                    ?>
                                    <hr>
                                    <p><strong>REFERENCES</strong></p>
                                    <?php
                                        if(!empty($Reference)){
                                            foreach($Reference as $index => $value){
                                    ?>
                                    <p>
                                        <span style="font-size: 0.9rem;"><?= $value['Name'] ?></span><br>
                                        <span style="font-size: 0.8rem;"><?= $value['Occupation'] ?></span><br>
                                        <span style="font-size: 0.7rem;"><?= $value['Company'] ?></span><br>
                                        <span style="font-size: 0.7rem;"><?= $value['Phone'] ?></span><br>
                                        <span style="font-size: 0.7rem;"><?= $value['Email'] ?></span>
                                    </p>
                                    <?php
                                            }
                                        }else{
                                    ?>
                                    <p>No Data Available</p>
                                    <?php
                                        }
                                    ?>
                                    <hr>
                                    <p><strong>CO-CURRICULAR ACTIVITIES</strong></p>
                                    <?php
                                        if(!empty($CoCurricular)){
                                            foreach($CoCurricular as $index => $value){
                                    ?>
                                    <p>
                                        <span style="font-size: 0.9rem;"><?= $value['Name'] ?></span><br>
                                        <span style="font-size: 0.7rem;"><?= $value['Period'] ?></span><br>
                                        <div class="text-justify" style="font-size: 0.7rem;"> 
                                            <?= $value['Description'] ?>
                                        </div>
                                    </p>
                                    <?php
                                            }
                                        }else{
                                    ?>
                                    <p>No Data Available</p>
                                    <?php
                                        }
                                    ?>
                                    <hr>
                                    <p><strong>PROJECTS</strong></p>
                                    <?php
                                        if(!empty($Project)){
                                            foreach($Project as $index => $value){
                                    ?>
                                    <p>
                                        <span style="font-size: 0.9rem;"><?= $value['RoleDescription'] ?></span><br>
                                        <span style="font-size: 0.7rem;"><?= $value['ProjectName'] ?></span><br>
                                        <span style="font-size: 0.7rem;"><?= $value['Period'] ?></span>
                                    </p>
                                    <?php
                                            }
                                        }else{
                                    ?>
                                    <p>No Data Available</p>
                                    <?php
                                        }
                                    ?>
                                    <hr>
                                    <p><strong>LANGUAGES</strong></p>
                                    <?php
                                        if(!empty($Language)){
                                            foreach($Language as $index => $value){
                                    ?>
                                    <p>
                                        <span style="font-size: 0.9rem;"><?= $value['CountryName'] ?></span> <span style="font-size: 0.7rem;"><?= $value['LevelLanguangeName'] ?></span>
                                    </p>
                                    <?php
                                            }
                                        }else{
                                    ?>
                                    <p>No Data Available</p>
                                    <?php
                                        }
                                    ?>
                                    <hr>
                                    <p><strong>CERTIFICATION AND LICENSES</strong></p>
                                    <?php
                                        if(!empty($Certification)){
                                            foreach($Certification as $index => $value){
                                    ?>
                                    <p>
                                        <span style="font-size: 0.7rem;"><?= $value['Name'] ?></span>
                                    </p>
                                    <?php
                                            }
                                        }else{
                                    ?>
                                    <p>No Data Available</p>
                                    <?php
                                        }
                                    ?>
                                    <hr>
                                    <p><strong>RESUME</strong></p>
                                    <?php
                                        if(!empty($Resume)){
                                            foreach($Resume as $index => $value){
                                    ?>
                                    <p>
                                        <span style="font-size: 0.9rem;">This candidate has uploaded a resume.</span><br>
                                        <a href="<?= base_url('assets/template/file/resume/' . $value['NameFile']) ?>" target="_blank" class="btn btn-outline-primary mt-2">
                                            <i class="fa fa-download"></i> 
                                            <span>DOWNLOAD RESUME</span>
                                            </a>
                                    </p>
                                    <?php
                                            }
                                        }else{
                                    ?>
                                    <p>No Data Available</p>
                                    <?php
                                        }
                                    ?>
                                </div>
                                <div class="tab-pane fade" id="tab-assessments" role="tabpanel" aria-labelledby="assessments-tab">Tab Assessments</div>
                                <div class="tab-pane fade" id="tab-custom-questions" role="tabpanel" aria-labelledby="custom-questions-tab">Tab Custom Questions</div>
                                <div class="tab-pane fade" id="tab-messages" role="tabpanel" aria-labelledby="messages-tab">Tab Messages</div>
                                <div class="tab-pane fade" id="tab-activities" role="tabpanel" aria-labelledby="activities-tab">Tab Activities</div>
                                <div class="tab-pane fade" id="tab-notes" role="tabpanel" aria-labelledby="notes-tab">Tab Notes</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <?php
                        if($Category == 1){
                        ?>
                        <div class="row m-1">
                            <div class="col-sm-12">
                                <button class="btn btn-outline-primary d-flex align-items-center w-100">
                                    <i class="fa fa-heart-o ml-4"></i> 
                                    <span>I LIKE THIS CANDIDATE</span>
                                </button>
                            </div>
                        </div>
                        <div class="row m-1 mt-3">
                            <div class="col-sm-12">
                                <button class="btn btn-outline-primary d-flex align-items-center w-100 invite-to-apply">
                                    <i class="fa fa-envelope ml-4"></i> 
                                    <span>INVITE TO APPLY</span>
                                </button>
                            </div>
                        </div>
                        <?php
                        }
                        if($Category == 2){
                        ?>
                        <div class="row m-1 mt-3">
                            <div class="col-sm-12">
                                <button class="btn btn-outline-primary w-100">
                                    <i class="fa fa-check"></i> 
                                    <span>SHORTLIST</span>
                                </button>
                            </div>
                        </div>
                        <div class="row m-1 mt-3">
                            <div class="col-sm-12">
                                <button class="btn btn-outline-primary w-100">
                                    <i class="fa fa-times"></i> 
                                    <span>REJECT</span>
                                </button>
                            </div>
                        </div>
                        <div class="row m-1 mt-3">
                            <div class="col-sm-12">
                                <button class="btn btn-outline-primary w-100">
                                    <i class="fa fa-envelope"></i> 
                                    <span>MESSAGE</span>
                                </button>
                            </div>
                        </div>
                        <div class="row m-1 mt-3">
                            <div class="col-sm-12">
                                <button class="btn btn-outline-primary w-100">
                                    <i class="fa fa-arrow-right"></i> 
                                    <span>MOVE</span>
                                </button>
                            </div>
                        </div>
                        <?php
                        }
                        if($Category == 3 || $Category == 4 || $Category == 5 || $Category == 6 || $Category == 7){
                        ?>
                        <div class="row m-1 mt-3">
                            <div class="col-sm-12">
                                <button class="btn btn-outline-primary w-100">
                                    <i class="fa fa-times"></i> 
                                    <span>REJECT</span>
                                </button>
                            </div>
                        </div>
                        <div class="row m-1 mt-3">
                            <div class="col-sm-12">
                                <button class="btn btn-outline-primary w-100">
                                    <i class="fa fa-envelope"></i> 
                                    <span>MESSAGE</span>
                                </button>
                            </div>
                        </div>
                        <div class="row m-1 mt-3">
                            <div class="col-sm-12">
                                <button class="btn btn-outline-primary w-100">
                                    <i class="fa fa-arrow-right"></i> 
                                    <span>MOVE</span>
                                </button>
                            </div>
                        </div>
                        <?php
                        }
                        ?>
                        <div class="row m-1 mt-3">
                            <div class="col-sm-12">
                                <button class="btn btn-outline-primary d-flex align-items-center w-100 download-profile" data-id="<?= $CanProfile['CanProfileId'] ?>">
                                    <i class="fa fa-download ml-4"></i> 
                                    <span>DOWNLOAD PROFILE</span>
                                </button>
                            </div>
                        </div>
                        <div class="row m-1 mt-3">
                            <div class="col-sm-12">
                                <button class="btn btn-outline-primary d-flex align-items-center w-100">
                                    <i class="fa fa-paper-plane ml-4"></i> 
                                    <span>FORWARD PROFILE</span>
                                </button>
                            </div>
                        </div>
                        <div class="row m-1 mt-3">
                            <p><strong>CONTACT INFORMATION</strong></p>
                        </div>
                        <div class="row m-1">
                            <p>
                                <span><?= $CanProfile['Email'] ?></span><br>
                                <span>+<?= $CanProfile['PhoneNumberCode'] ?> <?= $CanProfile['PhoneNumber'] ?></span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JS-->
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
			$('.job-status').on('click', function () {
                var id = $(this).data('id');
                var category = $(this).data('category');
                window.open('<?= base_url() ?>job-status?jobId=' + id + '&category=' + category, '_self');
			});

            $('.download-profile').on('click', function () {
                var id = $(this).data('id');

                window.open('<?= base_url() ?>download-profile-candidate/' + id, '_blank');
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
		});
	</script>
</body>
</html>
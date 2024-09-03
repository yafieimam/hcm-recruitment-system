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

    .media-body-custom a {
        text-decoration: none;
        color: #000;
    }

    .list-group-item a {
        text-decoration: none;
        color: #000;
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
                <h4>Applications</h4>
                <section class="section bg-white" style="padding-top: 0;">
                    <div class="container">
                        <?php foreach ($CanApply as $Job) : ?>
                        <div class="card pmd-card" style="margin-top: 30px;">
                            <div class="card-body-list">
                                <div class="media-custom">
                                    <a class="pmd-avatar-list-img" href="javascript:void(0);">
                                        <img src="<?php echo base_url() ?>assets/assets/images/logoJNE.png" height="35px" style="margin: 15px;">
                                    </a>
                                    <div class="media-body-custom">
                                        <h3 class="card-title-list-custom" style="margin-bottom: 0;"><a href="<?= base_url() ?>jobs?jobId=<?= urlencode($Job->JobVacancyId) ?>"><?php echo $Job->Position; ?></a></h3>
                                        <p class="card-detail-list-custom"><a href="#"><?php echo $Job->CompanyName; ?></a></p>
                                        <!-- Lokasi -->
                                        <p class="card-detail-custom mb-2"><?php 
                                            if(empty($Job->LastStatus)){
                                                echo '-';
                                            }else{
                                                echo $Job->LastStatus; 
                                            }
                                        ?></p>
                                    </div>
                                    <div class="job-details-custom d-flex flex-column align-items-end">
                                        <a href="<?= base_url() ?>user/message/1?detailJobId=<?= $Job->JobVacancyId ?>" class="btn btn-outline-danger btn_message" name="btn-message" id="btn-message" data-id="<?= $Job->JobVacancyId ?>">
                                            <i class="fa fa-envelope"></i> Message
                                        </a>
                                        <br>
                                        <p class="card-detail-custom mt-5">
                                            <?php
                                                if(empty($Job->Applydate)){
                                                    echo '-';
                                                }else{
                                                    echo $Job->Applydate; 
                                                }
                                            ?>
                                        </p>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        <?php endforeach ?>
                    </div><br>
                </section>
            </div>
        </div>
    </div>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="<?php echo base_url() ?>assets/template_home/theme/js/user-scripts.js"></script>
</body>
</html>
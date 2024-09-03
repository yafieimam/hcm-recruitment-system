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
      min-height: 0;
      display: flex;
      flex-direction: column;
      padding: 10px;
      background-color: #F5F5F5;
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
                <h4>Account Settings</h4>
                <div class="row" style="margin-top: 10px;">
                    <div class="col-2"></div>
                    <div class="col-8">
                        <div class="card">
                            <div class="card-header">
                                Change Email
                            </div>
                            <form id="form_change_email" action="<?php echo base_url() ?>change-email" method="post">
                            <div class="card-body">
                                <p>Current Email Address: <span id="current_email"><?= $CanRegister['Email']; ?></span></p>
                                <hr>
                                <p>To change your email, please complete the following fields.</p>
                                <div class="form-group row">
                                    <label for="current_password" class="col-sm-4 col-form-label">Current Password :</label>
                                    <div class="col-sm-8">
                                        <input type="password" class="form-control" name="current_password" id="current_password" placeholder="Enter Password Here" required>
                                        <input type="hidden" class="form-control" name="current_email" id="currentEmail" value="<?= $CanRegister['Email']; ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="new_email" class="col-sm-4 col-form-label">New Email Address :</label>
                                    <div class="col-sm-8">
                                        <input type="email" class="form-control" name="new_email" id="new_email" placeholder="Enter new email here" required>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-2"></div>
                </div>
                <div class="row" style="margin-top: 10px;">
                    <div class="col-2"></div>
                    <div class="col-8">
                        <div class="card">
                            <div class="card-header">
                                Change Mobile Number
                            </div>
                            <form id="form_change_mobile_number" action="<?php echo base_url() ?>change-mobile-number" method="post">
                            <div class="card-body">
                                <p>Mobile Number: <span id="current_mobile_number"><?= $CanProfile['PhoneNumberCode']; ?><?= $CanProfile['PhoneNumber']; ?></span></p>
                                <hr>
                                <p>Your mobile number will be used to send important updates on your applications, and allow recruiters to contact you and invite you to interviewers.</p>
                                <div class="form-row">
                                    <div class="col-sm-2">
                                        <input type="number" class="form-control" name="new_mobile_number_code" id="new_mobile_number_code" value="62" readonly required>
                                    </div>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control" name="new_mobile_number" id="new_mobile_number" placeholder="Enter new mobile number" required>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-2"></div>
                </div>
                <div class="row" style="margin-top: 10px;">
                    <div class="col-2"></div>
                    <div class="col-8">
                        <div class="card">
                            <div class="card-header">
                                Password
                            </div>
                            <form id="form_change_password" action="<?php echo base_url() ?>change-password" method="post">
                            <div class="card-body">
                                <p>To change your password, please complete the following fields.</p>
                                <div class="form-group row">
                                        <label for="current_password" class="col-sm-4 col-form-label">Current Password :</label>
                                        <div class="col-sm-8">
                                            <input type="password" class="form-control" name="current_password" id="current_password" placeholder="Enter current password here" required>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="form-group row">
                                        <label for="new_password" class="col-sm-4 col-form-label">New Password :</label>
                                        <div class="col-sm-8">
                                            <input type="password" class="form-control" name="new_password" id="new_password" minlength="8" placeholder="Enter new password here" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="confirm_password" class="col-sm-4 col-form-label">Retype New Password :</label>
                                        <div class="col-sm-8">
                                            <input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="Retype new password here" required>
                                        </div>
                                    </div>
                            </div>
                            <div class="card-footer d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-2"></div>
                </div>
                <div class="row" style="margin-top: 10px;">
                    <div class="col-2"></div>
                    <div class="col-8">
                        <div class="card">
                            <div class="card-header">
                                SMS Subscriptions
                            </div>
                            <form id="form_sms_subscription" action="<?php echo base_url() ?>change-sms-subscription" method="post">
                            <div class="card-body">
                                    <div class="form-check">
                                        <?php
                                            if($CanProfile['IsSubscribe1']){ 
                                        ?>
                                        <input class="form-check-input" type="checkbox" value="true" name="isSubscribe1" id="isSubscribe1" checked>
                                        <?php
                                            }else{
                                        ?>
                                        <input class="form-check-input" type="checkbox" value="true" name="isSubscribe1" id="isSubscribe1">
                                        <?php
                                            }
                                        ?>
                                        <label class="form-check-label" for="isSubscribe1">
                                            Subscribe to SMSes about job invitations/messages
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <?php
                                            if($CanProfile['IsSubscribe2']){ 
                                        ?>
                                        <input class="form-check-input" type="checkbox" value="true" name="isSubscribe2" id="isSubscribe2" checked>
                                        <?php
                                            }else{
                                        ?>
                                        <input class="form-check-input" type="checkbox" value="true" name="isSubscribe2" id="isSubscribe2">
                                        <?php
                                            }
                                        ?>
                                        <label class="form-check-label" for="isSubscribe2">
                                            Subscribe to SMSes from recruiters
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <?php
                                            if($CanProfile['IsSubscribe3']){ 
                                        ?>
                                        <input class="form-check-input" type="checkbox" value="true" name="isSubscribe3" id="isSubscribe3" checked>
                                        <?php
                                            }else{
                                        ?>
                                        <input class="form-check-input" type="checkbox" value="true" name="isSubscribe3" id="isSubscribe3">
                                        <?php
                                            }
                                        ?>
                                        <label class="form-check-label" for="isSubscribe3">
                                            Subscribe to SMSes about incomplete applications
                                        </label>
                                    </div>
                            </div>
                            <div class="card-footer d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-2"></div>
                </div>
                <div class="row" style="margin-top: 10px;">
                    <div class="col-2"></div>
                    <div class="col-8">
                        <div class="card">
                            <div class="card-header">
                                Job Email Notification
                            </div>
                            <form id="form_job_email_notification" action="<?php echo base_url() ?>change-job-email-notification" method="post">
                            <div class="card-body">
                                <p>Recommended Jobs: Be notified about jobs that match your profile, skills, and qualifications.</p>
                                    <div class="form-check">
                                        <?php
                                            if($CanProfile['IsEmailNotif1']){ 
                                        ?>
                                        <input class="form-check-input" type="checkbox" value="true" name="isEmailNotif1" id="isEmailNotif1" checked>
                                        <?php
                                            }else{
                                        ?>
                                        <input class="form-check-input" type="checkbox" value="true" name="isEmailNotif1" id="isEmailNotif1">
                                        <?php
                                            }
                                        ?>
                                        <label class="form-check-label" for="isEmailNotif1">
                                            Send emails once a week
                                        </label>
                                    </div>
                                    <hr>
                                    <p>Application Experience: Give us feedback on your experiences in the jobs you applied for.</p>
                                    <div class="form-check">
                                        <?php
                                            if($CanProfile['IsEmailNotif2']){ 
                                        ?>
                                        <input class="form-check-input" type="checkbox" value="true" name="isEmailNotif2" id="isEmailNotif2" checked>
                                        <?php
                                            }else{
                                        ?>
                                        <input class="form-check-input" type="checkbox" value="true" name="isEmailNotif2" id="isEmailNotif2">
                                        <?php
                                            }
                                        ?>
                                        <label class="form-check-label" for="isEmailNotif2">
                                            Yes, Send emails
                                        </label>
                                    </div>
                            </div>
                            <div class="card-footer d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-2"></div>
                </div>
                <div class="row" style="margin-top: 10px;">
                    <div class="col-2"></div>
                    <div class="col-8">
                        <div class="card">
                            <div class="card-header">
                                Recruiter View Notification
                            </div>
                            <form id="form_recruiter_view_notification" action="<?php echo base_url() ?>change-recruiter-view-notification" method="post">
                            <div class="card-body">
                                <div class="form-check">
                                    <?php
                                        if($CanProfile['IsNotifRecruiter']){ 
                                    ?>
                                    <input class="form-check-input" type="checkbox" value="true" name="isNotifRecruiter" id="isNotifRecruiter" checked>
                                    <?php
                                        }else{
                                    ?>
                                    <input class="form-check-input" type="checkbox" value="true" name="isNotifRecruiter" id="isNotifRecruiter">
                                    <?php
                                        }
                                    ?>
                                    <label class="form-check-label" for="isNotifRecruiter">
                                        Be notified when a recruiter views your profile
                                    </label>
                                </div>
                            </div>
                            <div class="card-footer d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-2"></div>
                </div>
                <div class="row" style="margin-top: 10px;">
                    <div class="col-2"></div>
                    <div class="col-8">
                        <div class="card">
                            <div class="card-header">
                                Timezone
                            </div>
                            <form id="form_change_timezone" action="<?php echo base_url() ?>change-timezone" method="post">
                            <div class="card-body">
                                <div class="form-group row">
                                        <div class="col-sm-12">
                                            <select class="custom-select" name="timezone" id="timezone" required>
                                                <option value="">Choose Timezone</option>
                                                <?php 
                                                    foreach($Timezone as $data){
                                                        if($CanProfile['TimeZoneId'] == $data['Id']){
                                                ?>
                                                    <option value="<?= $data['Id'] ?>" selected><?= $data['Name'] ?></option>
                                                <?php 
                                                        }else{
                                                ?>
                                                <option value="<?= $data['Id'] ?>"><?= $data['Name'] ?></option>
                                                <?php
                                                        }
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                            </div>
                            <div class="card-footer d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-2"></div>
                </div>
                <div class="row" style="margin-top: 10px;">
                    <div class="col-2"></div>
                    <div class="col-8">
                        <div class="card">
                            <div class="card-header red-light-card-header">
                                Deactivate Account
                            </div>
                            <div class="card-body">
                                <p>Account deactivation is <strong>permanent</strong>. You will lose your completed profile and all your skill test results.</p>
                                <p>If you want to come back, you can still search through our job board and apply.</p>
                                <p>However, you will have to create an entirely new account and fill in all your details once again.</p>
                            </div>
                            <div class="card-footer d-flex justify-content-end">
                                <a href="<?php echo base_url() ?>deactivate-account" class="btn btn-danger" id="deactivate-button" >DEACTIVATE MY ACCOUNT</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-2"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap core JS-->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
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
    </script>
</body>
</html>
<!DOCTYPE html>
<html>
<head>
    <title>Account Settings</title>
    <link href="<?php echo base_url() ?>assets/template_home/theme/plugins/bootstrap/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo base_url() ?>assets/template_home/theme/plugins/bootstrap/bootstrap-slider.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/template_home/theme/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/template_home/theme/plugins/slick/slick.css" rel="stylesheet">
	<link href="<?php echo base_url() ?>assets/template_home/theme/plugins/slick/slick-theme.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/template_home/theme/css/style.css" rel="stylesheet">
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
                <h4>Account Settings</h4>
                <div class="row" style="margin-top: 10px;">
                    <div class="col-2"></div>
                    <div class="col-8">
                        <div class="card">
                            <div class="card-header">
                                Change Name
                            </div>
                            <form id="form_change_mobile_number" action="<?php echo base_url() ?>admin/change-name" method="post">
                            <div class="card-body">
                                <div class="form-row">
                                    <div class="col-sm-6">
                                        <label for="new_first_name" class="form-label">First Name</label>
                                        <input type="text" class="form-control" name="new_first_name" id="new_first_name" value="<?= $SMAccessHd['FirstName']; ?>" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="new_last_name" class="form-label">Last Name</label>
                                        <input type="text" class="form-control" name="new_last_name" id="new_last_name" value="<?= $SMAccessHd['LastName']; ?>" required>
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
                                Change Email
                            </div>
                            <form id="form_change_email" action="<?php echo base_url() ?>admin/change-email" method="post">
                            <div class="card-body">
                                <p>Current Email Address :</p>
                                <p id="current_email"><?= $SMAccessHd['Email']; ?></p>
                                <hr>
                                <p>To change your email, please complete the following fields.</p>
                                <div class="form-group row">
                                    <label for="current_password" class="col-sm-4 col-form-label">Current Password :</label>
                                    <div class="col-sm-8">
                                        <input type="password" class="form-control" name="current_password" id="current_password" placeholder="Enter Password Here" required>
                                        <input type="hidden" class="form-control" name="current_email" id="currentEmail" value="<?= $SMAccessHd['Email']; ?>">
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
                            <form id="form_change_mobile_number" action="<?php echo base_url() ?>admin/change-mobile-number" method="post">
                            <div class="card-body">
                                <p>Mobile Number :</p>
                                <p id="current_mobile_number"><?= $SMAccessHd['PhoneNumberCode']; ?><?= $SMAccessHd['PhoneNumber']; ?></p>
                                <hr>
                                <div class="form-row">
                                    <div class="col-sm-2">
                                        <input type="number" class="form-control" name="new_mobile_number_code" id="new_mobile_number_code" placeholder="62" required>
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
                            <form id="form_change_password" action="<?php echo base_url() ?>admin/change-password" method="post">
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
                            <form id="form_sms_subscription" action="<?php echo base_url() ?>admin/change-sms-subscription" method="post">
                            <div class="card-body">
                                    <div class="form-check">
                                        <?php
                                            if($SMAccessHd['IsSmsSubscription']){ 
                                        ?>
                                        <input class="form-check-input" type="checkbox" value="true" name="isSmsSubscription" id="isSmsSubscription" checked>
                                        <?php
                                            }else{
                                        ?>
                                        <input class="form-check-input" type="checkbox" value="true" name="isSmsSubscription" id="isSmsSubscription">
                                        <?php
                                            }
                                        ?>
                                        <label class="form-check-label" for="isSmsSubscription">
                                            Subscribe to SMSes from jobseekers
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
                                New Message Email Subscription
                            </div>
                            <form id="form_email_subscription" action="<?php echo base_url() ?>admin/change-email-subscription" method="post">
                            <div class="card-body">
                                    <div class="form-check">
                                        <?php
                                            if($SMAccessHd['IsEmailSubscription']){ 
                                        ?>
                                        <input class="form-check-input" type="checkbox" value="true" name="isEmailSubscription" id="isEmailSubscription" checked>
                                        <?php
                                            }else{
                                        ?>
                                        <input class="form-check-input" type="checkbox" value="true" name="isEmailSubscription" id="isEmailSubscription">
                                        <?php
                                            }
                                        ?>
                                        <label class="form-check-label" for="isEmailSubscription">
                                            Receive emails when you receive a new message?
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
                                Candidate Application Subscription
                            </div>
                            <form id="form_candidate_application_subscription" action="<?php echo base_url() ?>admin/change-candidate-application-subscription" method="post">
                            <div class="card-body">
                                <div class="form-check">
                                    <?php
                                        if($SMAccessHd['IsCandidateAppliesSubscription']){ 
                                    ?>
                                    <input class="form-check-input" type="checkbox" value="true" name="isCandidateAppliesSubscription" id="isCandidateAppliesSubscription" checked>
                                    <?php
                                        }else{
                                    ?>
                                    <input class="form-check-input" type="checkbox" value="true" name="isCandidateAppliesSubscription" id="isCandidateAppliesSubscription">
                                    <?php
                                        }
                                    ?>
                                    <label class="form-check-label" for="isCandidateAppliesSubscription">
                                        Send email when a candidate applies to your job post?
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
                            <div class="card-header red-light-card-header">
                                Deactivate Account
                            </div>
                            <div class="card-body">
                                <p>Account deactivation is <strong>permanent</strong>. Your company page and job posts will be removed from the website.</p>
                            </div>
                            <div class="card-footer d-flex justify-content-end">
                                <a href="<?php echo base_url() ?>admin/deactivate-account" class="btn btn-danger" id="deactivate-button" >DEACTIVATE MY ACCOUNT</a>
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
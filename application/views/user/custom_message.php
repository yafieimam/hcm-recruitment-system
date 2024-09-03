<!DOCTYPE html>
<html>
<head>
    <title>Messages</title>
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

    .message-container {
        display: flex;
        flex-direction: column;
        height: 80vh; /* Set height to 100% of viewport height */
        padding: 20px;
        background-color: #fff;
        border-radius: 5px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .messages {
        flex: 1; /* Allow messages to take remaining space */
        overflow-y: auto; /* Enable vertical scrolling if content overflows */
    }

    .message-box {
        display: flex;
        margin-bottom: 10px;
        position: relative;
    }

    .sender {
        padding: 10px;
        background-color: #e0e0e0;
        border-radius: 5px;
        text-align: left;
    }

    .user {
        padding: 10px;
        background-color: #d9f1f0;
        border-radius: 5px;
        text-align: right;
    }

    .message-input {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    .send-button {
        margin-top: 10px;
        text-align: right;
    }

    .timestamp {
        padding: 10px;
        font-size: 12px;
        color: gray;
        position: absolute;
        bottom: 0;
        right: 0;
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
                <h4 style="margin: 5px;">Messages</h4>
                <?php if(count($CanMessage) > 0) { ?>
                <div class="bottom-container">
                    <div class="bottom-left">
                        <?php $firstIteration = true; ?>
                        <?php foreach ($CanMessage as $Message) : ?>
                            <div class="card pmd-card" style="margin: 5px; <?php if(!isset($_GET['detailJobId']) && $firstIteration) : ?> background-color: #edece6; <?php endif ?> <?php if(isset($_GET['detailJobId']) && ($_GET['detailJobId'] == $Message->JobVacancyId)) : ?> background-color: #edece6; <?php endif ?>">
                                <div class="card-body-list">
                                    <div class="media">
                                        <a class="pmd-avatar-list-img" href="javascript:void(0);">
                                            <img src="<?php echo base_url() ?>assets/assets/images/logoJNE.png" height="20px" style="margin-bottom: 45px;">
                                        </a>
                                        <div class="media-body">
                                            <h3 class="card-title-list" style="font-size: 13px;"><a href="<?= current_url() ?>?detailJobId=<?= $Message->JobVacancyId ?>" class="stretched-link"><?php echo $Message->DisplayCompany; ?></a></h3>
                                            <!-- Nama Perusahaan -->
                                            <p class="card-title" style="font-size: 11px;">
                                            <?php 
                                                // $message = $Message->MessageDescryption;
                                                // if(strlen($Message->MessageDescryption) >= 30){
                                                //     $message = substr($Message->MessageDescryption, 0, 30) . "...";
                                                // }
                                                // echo $message; 
                                                echo $Message->DisplayPosition;
                                            ?>
                                            </p>
                                            <p style="font-size: 10px; float: right; border: none; outline: none;"><?php echo $Message->LastDate ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                            if($firstIteration){
                                $firstIteration = false;
                            }
                            ?>
                        <?php endforeach ?>
                        <div class="pagination">
                            <?php echo $pagination_links; ?>
                        </div>
                    </div>

                    <div class="bottom-right">
                        <div class="card" style="max-width: 100%; margin: 5px;">
                            <div class="message-container">
                                <div class="messages">
                                    <?php if(count($MessageDetail) > 0) { ?>
                                    <?php foreach ($MessageDetail as $Detail) : ?>
                                        <?php if($Detail->Type != 'Candidate') { ?>
                                        <div class="message-box sender">
                                            <p><?= $Detail->MessageDescryption ?></p>
                                            <span class="timestamp"><?= $Detail->LastUpdate ?></span>
                                        </div>
                                        <?php } ?>
                                        <?php if($Detail->Type == 'Candidate') { ?>
                                        <div class="message-box user">
                                            <p><?= $Detail->MessageDescryption ?></p>
                                            <span class="timestamp"><?= $Detail->LastUpdate ?></span>
                                        </div>
                                        <?php } ?>
                                    <?php endforeach ?>
                                    <?php } ?>
                                </div>
                                <div class="message-input">
                                    <textarea class="form-control" rows="2" name="MessageDescryption" id="MessageDescryption" placeholder="Type your message..."></textarea>
                                    <input type="hidden" name="CanProfileId" id="CanProfileId" value="<?= $CanProfile['CanProfileId'] ?>">
                                    <input type="hidden" name="JobVacancyId" id="JobVacancyId" value="<?= !empty($this->input->get('detailJobId')) ? $this->input->get('detailJobId') : $CanMessage[0]->JobVacancyId ?>">
                                </div>
                                <div class="send-button">
                                    <button id="sendMessage" class="btn btn-primary">Send</button>
                                </div>
                            </div>
                        </div>
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
    <!-- Core theme JS-->
    <script src="<?php echo base_url() ?>assets/template_home/theme/js/user-scripts.js"></script>
    <script>
		$(document).ready(function () {
			$('#sendMessage').on('click', function () {
                var message = $('#MessageDescryption').val();
                var profileId = $('#CanProfileId').val();
                var jobId = $('#JobVacancyId').val();

				$.ajax({
                    url: '<?= base_url() ?>send-message',
                    type: 'POST',
                    data: { 'message' : message, 'profileId' : profileId, 'jobId' : jobId },
                    success: function(response) {
                        var jsonResponse = JSON.parse(response);
                        if(jsonResponse.status){
                            window.location.reload();
                        }else{
                            Swal.fire(
                                'Failed!',
                                'Failed to send message.',
                                'error'
                            )
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
			});
		});
	</script>
</body>
</html>
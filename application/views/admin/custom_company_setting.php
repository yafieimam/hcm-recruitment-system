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
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
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

    p {
        color: #000;
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

    .hide-important {
        display: none !important;
    }

    .select2-container .select2-selection--single {
        height: 35px;
    }

    .select2-container--default .select2-selection--single .select2-selection__arrow {
        height: 33px;
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
                <h4>Company Settings</h4>
                <div class="row" style="margin-top: 10px;">
                    <div class="col-2"></div>
                    <div class="col-8">
                        <div class="card">
                            <form id="form_change_company_visible" action="<?php echo base_url() ?>admin/change-company-visible" method="post">
                            <div class="card-body">
                                <div id="div-show-company-visible">
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <p class="mb-0">Company visible to public?</p>
                                        <button type="button" class="btn" id="btn-edit-company-visible">
                                            <i class="fa fa-pencil"></i>
                                        </button>
                                    </div>
                                    <p id="company_visible">Yes</p>
                                </div>
                                <div class="form-row" id="div-form-company-visible" style="display: none;">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="true" name="isVisible" id="isVisible" checked>
                                        <label class="form-check-label" for="isVisible">
                                            Company visible to public?
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer d-flex justify-content-end hide-important" id="div-button-company-visible">
                                <button type="submit" class="btn btn-primary mr-2">Save</button>
                                <button type="button" class="btn btn-outline-danger" id="btn-cancel-company-visible">Cancel</button>
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
                            <form id="form_change_company_name" action="<?php echo base_url() ?>admin/change-company-name" method="post">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <p class="mb-0">Company Name</p>
                                    <button type="button" class="btn" id="btn-edit-company-name">
                                        <i class="fa fa-pencil"></i>
                                    </button>
                                </div>
                                <div id="div-show-company-name">
                                    <p id="company_name"><?= $Company['CompanyName']; ?></p>
                                </div>
                                <div class="form-row" id="div-form-company-name" style="display: none;">
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" name="new_company_name" id="new_company_name" value="<?= $Company['CompanyName']; ?>" required>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer d-flex justify-content-end hide-important" id="div-button-company-name">
                                <button type="submit" class="btn btn-primary mr-2">Save</button>
                                <button type="button" class="btn btn-outline-danger" id="btn-cancel-company-name">Cancel</button>
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
                            <form id="form_change_company_description" action="<?php echo base_url() ?>admin/change-company-description" method="post">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <p class="mb-0">Company Description</p>
                                    <button type="button" class="btn" id="btn-edit-company-description">
                                        <i class="fa fa-pencil"></i>
                                    </button>
                                </div>
                                <div id="div-show-company-description">
                                    <p id="company_description"><?= $Company['CompanyDescryption']; ?></p>
                                </div>
                                <div class="form-row" id="div-form-company-description" style="display: none;">
                                    <div class="col-sm-12">
                                        <textarea class="form-control" id="new_company_description" name="new_company_description"><?= $Company['CompanyDescryption']; ?></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer d-flex justify-content-end hide-important" id="div-button-company-description">
                                <button type="submit" class="btn btn-primary mr-2">Save</button>
                                <button type="button" class="btn btn-outline-danger" id="btn-cancel-company-description">Cancel</button>
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
                            <form id="form_change_company_industry" action="<?php echo base_url() ?>admin/change-company-industry" method="post">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <p class="mb-0">Industry</p>
                                    <button type="button" class="btn" id="btn-edit-company-industry">
                                        <i class="fa fa-pencil"></i>
                                    </button>
                                </div>
                                <div id="div-show-company-industry">
                                    <p id="company_industry"><?= (isset($Industry['IndustryName'])) ? $Industry['IndustryName'] : ''; ?></p>
                                </div>
                                <div class="form-row" id="div-form-company-industry" style="display: none;">
                                    <div class="col-sm-12">
                                        <select class="form-select" id="new_company_industry" name="new_company_industry" style="width: 100%;" required>
                                        </select>   
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer d-flex justify-content-end hide-important" id="div-button-company-industry">
                                <button type="submit" class="btn btn-primary mr-2">Save</button>
                                <button type="button" class="btn btn-outline-danger" id="btn-cancel-company-industry">Cancel</button>
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
                            <form id="form_change_company_url" action="<?php echo base_url() ?>admin/change-company-url" method="post">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <p class="mb-0">Company URL</p>
                                    <button type="button" class="btn" id="btn-edit-company-url">
                                        <i class="fa fa-pencil"></i>
                                    </button>
                                </div>
                                <div id="div-show-company-url">
                                    <p id="company_url"><?= $Company['CompanyURL']; ?></p>
                                </div>
                                <div class="form-row" id="div-form-company-url" style="display: none;">
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" name="new_company_url" id="new_company_url" value="<?= $Company['CompanyURL']; ?>" required>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer d-flex justify-content-end hide-important" id="div-button-company-url">
                                <button type="submit" class="btn btn-primary mr-2">Save</button>
                                <button type="button" class="btn btn-outline-danger" id="btn-cancel-company-url">Cancel</button>
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
                            <form id="form_change_company_address" action="<?php echo base_url() ?>admin/change-company-address" method="post">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <p class="mb-0">Address</p>
                                    <button type="button" class="btn" id="btn-edit-company-address">
                                        <i class="fa fa-pencil"></i>
                                    </button>
                                </div>
                                <div id="div-show-company-address">
                                    <p id="company_address"><?= $Company['Address']; ?></p>
                                </div>
                                <div class="form-row" id="div-form-company-address" style="display: none;">
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" name="new_company_address" id="new_company_address" value="<?= $Company['Address']; ?>" required>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer d-flex justify-content-end hide-important" id="div-button-company-address">
                                <button type="submit" class="btn btn-primary mr-2">Save</button>
                                <button type="button" class="btn btn-outline-danger" id="btn-cancel-company-address">Cancel</button>
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
                            <form id="form_change_company_link_public_jobs" action="<?php echo base_url() ?>admin/change-company-link-public-jobs" method="post">
                            <div class="card-body">
                                <div class="form-row">
                                    <div class="col-sm-12">
                                        <label for="company_link_public_jobs" class="form-label">Embed Link for Public Jobs</label>
                                        <input type="text" class="form-control" name="company_link_public_jobs" id="company_link_public_jobs" required>
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
                            <form id="form_change_company_link_private_jobs" action="<?php echo base_url() ?>admin/change-company-link-private-jobs" method="post">
                            <div class="card-body">
                                <div class="form-row">
                                    <div class="col-sm-12">
                                        <label for="company_link_private_jobs" class="form-label">Embed Link for Private Jobs</label>
                                        <input type="text" class="form-control" name="company_link_private_jobs" id="company_link_private_jobs" required>
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
                            <div class="card-body">
                                <p>Company Logo</p>
                                <p>Upload JPEG/PNG/GIF image that is at least 400px wide and smaller than 2MB.</p>
                                <div class="profile-pict">
                                    <input type="file" id="add_logo" name="add_logo" style="display: none" accept="image/*">
                                    <button type="button" class="btn btn-outline-primary" id="btn-add-logo">UPLOAD LOGO</button><br>
                                    <?php
                                        if(!empty($Company['CompanyLogo'])){
                                    ?>
                                    <img class="mt-2" src="<?php echo base_url() ?>assets/template/images/logo/<?= $Company['CompanyLogo'] ?>" alt="Logo" id="img-logo" style="width: 120px;">
                                    <?php
                                        }else{
                                    ?>
                                    <img class="mt-2" src="" alt="Logo" id="img-logo" style="width: 120px;">
                                    <?php
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-2"></div>
                </div>
                <div class="row" style="margin-top: 10px;">
                    <div class="col-2"></div>
                    <div class="col-8">
                        <div class="card">
                            <div class="card-body">
                                <p>Company Banner</p>
                                <p>By default, we randomly pick a banner from your job posts to show as your company banner on your page. If you want to change this, you can upload your own. <br> The image must be in JPG or PNG and has dimensions of 900px by 300px.</p>
                                <div class="profile-pict">
                                    <input type="file" id="add_banner" name="add_banner" style="display: none" accept="image/*">
                                    <button type="button" class="btn btn-outline-primary" id="btn-add-banner">UPLOAD BANNER</button><br>
                                    <?php
                                        if(!empty($Company['CompanyBanner'])){
                                    ?>
                                    <img class="mt-2" src="<?php echo base_url() ?>assets/template/images/banner/<?= $Company['CompanyBanner'] ?>" alt="Banner" id="img-banner" style="width: 120px;">
                                    <?php
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-2"></div>
                </div>
                <div class="row" style="margin-top: 10px;">
                    <div class="col-2"></div>
                    <div class="col-8">
                        <div class="card">
                            <form id="form_change_automated_email" action="<?php echo base_url() ?>admin/change-automated-email" method="post">
                            <div class="card-body">
                                <div class="form-row">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="true" name="isAutomatedEmail" id="isAutomatedEmail" checked>
                                        <label class="form-check-label" for="isAutomatedEmail">
                                            Send automated emails to candidates when moved to a new state (e.g., "Shortlist" or "For Interview")
                                        </label>
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
            </div>
        </div>
    </div>
    <!-- Bootstrap core JS-->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.17.2/dist/sweetalert2.min.js"></script>
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

        $(document).ready(function () {
            CKEDITOR.replace('new_company_description');

            var newOptionIndustry = new Option("<?= $Industry['IndustryName'] ?>", "<?= $Industry['IndustryId'] ?>", false, false);
            $('#new_company_industry').append(newOptionIndustry).trigger('change');

            $('#btn-add-logo').click(function() {
                $("#add_logo").click()
            });

            $('#btn-add-banner').click(function() {
                $("#add_banner").click()
            });

            $('#add_logo').on('change', function() {
                const fileInput = this;
                if (this.files.length > 0) {
                    const reader = new FileReader();
                    reader.readAsDataURL(fileInput.files[0]);

                    const image = new Image();
                    image.src = URL.createObjectURL(fileInput.files[0]);

                    image.onload = function() {
                        const maxWidth = 900;
                        const maxHeight = 300;
                        
                        if (image.width > 400) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: 'Image dimensions exceed the maximum allowed width of 400 pixels.'
                            });
                            this.value = "";
                        }else{
                            var formData = new FormData();
                            formData.append('file', fileInput.files[0]);

                            $.ajax({
                                url: '<?= base_url() ?>upload-logo',
                                type: 'POST',
                                data: formData,
                                processData: false,
                                contentType: false,
                                success: function(response) {
                                    var jsonResponse = JSON.parse(response);
                                    $('#img-logo').attr('src', jsonResponse);
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Success',
                                        text: 'Success Upload Logo'
                                    });
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
                    };
                }
            });

            $('#add_banner').on('change', function() {
                if (this.files.length > 0) {
                    const reader = new FileReader();
                    reader.readAsDataURL(this.files[0]);

                    const image = new Image();
                    image.src = URL.createObjectURL(this.files[0]);
                    
                    image.onload = function() {
                        const maxWidth = 900;
                        const maxHeight = 300;
                        
                        if (image.width > 900 || image.height > 300) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: 'Image dimensions exceed the maximum allowed dimensions of 900x300 pixels.'
                            });
                            this.value = "";
                        }else{
                            var formData = new FormData();
                            formData.append('file', this.files[0]);

                            $.ajax({
                                url: '<?= base_url() ?>upload-banner',
                                type: 'POST',
                                data: formData,
                                processData: false,
                                contentType: false,
                                success: function(response) {
                                    var jsonResponse = JSON.parse(response);
                                    $('#img-banner').attr('src', jsonResponse);
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Success',
                                        text: 'Success Upload Banner'
                                    });
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
                    };
                }
            });

            $("#new_company_industry").select2({
                placeholder: 'Choose Industry',
                ajax: { 
                    url: '<?= base_url() ?>get-company-industry',
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
                                id: item.IndustryId,
                                text: item.IndustryName
                            });
                        });

                        return {
                            results: results
                        };
                    },
                    cache: true
                }
            });

            $('#btn-edit-company-visible').click(function() {
                $('#btn-edit-company-visible').hide();
                $('#div-show-company-visible').hide();
                $('#div-form-company-visible').show();
                $('#div-button-company-visible').removeClass('hide-important');
            });

            $('#btn-cancel-company-visible').click(function() {
                $('#btn-edit-company-visible').show();
                $('#div-show-company-visible').show();
                $('#div-form-company-visible').hide();
                $('#div-button-company-visible').addClass('hide-important');
            });

            $('#btn-edit-company-name').click(function() {
                $('#btn-edit-company-name').hide();
                $('#div-show-company-name').hide();
                $('#div-form-company-name').show();
                $('#div-button-company-name').removeClass('hide-important');
            });

            $('#btn-cancel-company-name').click(function() {
                $('#btn-edit-company-name').show();
                $('#div-show-company-name').show();
                $('#div-form-company-name').hide();
                $('#div-button-company-name').addClass('hide-important');
            });

            $('#btn-edit-company-description').click(function() {
                $('#btn-edit-company-description').hide();
                $('#div-show-company-description').hide();
                $('#div-form-company-description').show();
                $('#div-button-company-description').removeClass('hide-important');
            });

            $('#btn-cancel-company-description').click(function() {
                $('#btn-edit-company-description').show();
                $('#div-show-company-description').show();
                $('#div-form-company-description').hide();
                $('#div-button-company-description').addClass('hide-important');
            });

            $('#btn-edit-company-industry').click(function() {
                $('#btn-edit-company-industry').hide();
                $('#div-show-company-industry').hide();
                $('#div-form-company-industry').show();
                $('#div-button-company-industry').removeClass('hide-important');
            });

            $('#btn-cancel-company-industry').click(function() {
                $('#btn-edit-company-industry').show();
                $('#div-show-company-industry').show();
                $('#div-form-company-industry').hide();
                $('#div-button-company-industry').addClass('hide-important');
            });

            $('#btn-edit-company-url').click(function() {
                $('#btn-edit-company-url').hide();
                $('#div-show-company-url').hide();
                $('#div-form-company-url').show();
                $('#div-button-company-url').removeClass('hide-important');
            });

            $('#btn-cancel-company-url').click(function() {
                $('#btn-edit-company-url').show();
                $('#div-show-company-url').show();
                $('#div-form-company-url').hide();
                $('#div-button-company-url').addClass('hide-important');
            });

            $('#btn-edit-company-address').click(function() {
                $('#btn-edit-company-address').hide();
                $('#div-show-company-address').hide();
                $('#div-form-company-address').show();
                $('#div-button-company-address').removeClass('hide-important');
            });

            $('#btn-cancel-company-address').click(function() {
                $('#btn-edit-company-address').show();
                $('#div-show-company-address').show();
                $('#div-form-company-address').hide();
                $('#div-button-company-address').addClass('hide-important');
            });
        });
    </script>
</body>
</html>
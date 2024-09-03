<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
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

    .search-bar input, .search-bar button {
        padding: 10px;
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
                <div class="card pmd-card" style="margin: 10px;">
                    <div class="row p-2">
                        <div class="col-9">
                            <a href="javascript:void(0)" data-filter="1" class="btn btn-outline-secondary mr-2 filter-job">Public</a>
                            <a href="javascript:void(0)" data-filter="2" class="btn btn-outline-secondary mr-2 filter-job">Draft</a>
                            <a href="javascript:void(0)" data-filter="3" class="btn btn-outline-secondary mr-2 filter-job">Deactived</a>
                        </div>
                        <div class="col-3">
                            <a href="<?= base_url('post-job') ?>" class="btn btn-primary ml-4">POST A PUBLIC JOB</a>
                        </div>
                    </div>
                </div>
                <div class="card pmd-card" style="margin: 10px;">
                    <div class="row p-2">
                        <div class="col-6">
                            <div class="filter-dropdown">
                                <div class="dropdown">
                                    <button class="dropdown-toggle" type="button" id="dropdownSortBy"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Sort By
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-start p-2" aria-labelledby="dropdownSortBy" style="width: 300px;">
                                        <ul id="optionDropdownSortBy" style="padding: 0; max-height: 200px; overflow-y: auto;">
                                            <li>
									            <a class="dropdown-item" href="javascript:void(0)">
									                <div class="form-check">
									                    <input class="form-check-input sort_by" type="checkbox" value="1" data-id="1" name="sort_by" id="position_sort" />
                                                        <label class="form-check-label" for="position_sort">By Position</label>
									                </div>
									            </a>
									        </li>
                                            <li>
									            <a class="dropdown-item" href="javascript:void(0)">
									                <div class="form-check">
									                    <input class="form-check-input sort_by" type="checkbox" value="2" data-id="2" name="sort_by" id="location_sort" />
                                                        <label class="form-check-label" for="location_sort">By Location Name</label>
									                </div>
									            </a>
									        </li>
                                            <li>
									            <a class="dropdown-item" href="javascript:void(0)">
									                <div class="form-check">
									                    <input class="form-check-input sort_by" type="checkbox" value="3" data-id="3" name="sort_by" id="start_date_sort" />
                                                        <label class="form-check-label" for="start_date_sort">By Start Date</label>
									                </div>
									            </a>
									        </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="search-bar">
                                <input type="text" id="searchInput" placeholder="Search...">
                                <button id="searchButton">Search</button>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                    if(!empty($JobList)){
                        foreach($JobList as $index => $value){
                ?>
                <div class="card pmd-card p-3" style="margin: 10px;">
                    <div class="row p-2">
                        <h5><?= $value->Position ?>, <?= $value->LocationDisplay ?></h5>
                    </div>
                    <div class="row p-2">
                        <a href="javascript:void(0)" id="div-inquiry" data-id="<?= urlencode($value->JobVacancyId) ?>" data-category="1" class="card pmd-card bg-primary d-flex justify-content-center align-items-center job-status" style="width: 7.4rem; height: 7.4rem; margin: 10px;">
                            <p class="text-white" style="font-size: 24px;"><strong><?= $value->Inquiry ?></strong></p>
                            <p class="text-white">Inquiry</p>
                        </a>
                        <a href="javascript:void(0)" id="div-applications" data-id="<?= urlencode($value->JobVacancyId) ?>" data-category="2" class="card pmd-card bg-primary d-flex justify-content-center align-items-center job-status" style="width: 7.4rem; height: 7.4rem; margin: 10px;">
                            <p class="text-white" style="font-size: 24px;"><strong><?= $value->Applications ?></strong></p>
                            <p class="text-white">Applications</p>
                        </a>
                        <a href="javascript:void(0)" id="div-shortlist" data-id="<?= urlencode($value->JobVacancyId) ?>" data-category="3" class="card pmd-card bg-primary d-flex justify-content-center align-items-center job-status" style="width: 7.4rem; height: 7.4rem; margin: 10px;">
                            <p class="text-white" style="font-size: 24px;"><strong><?= $value->Shortlist ?></strong></p>
                            <p class="text-white">Shortlist</p>
                        </a>
                        <a href="javascript:void(0)" id="div-callout" data-id="<?= urlencode($value->JobVacancyId) ?>" data-category="4" class="card pmd-card bg-primary d-flex justify-content-center align-items-center job-status" style="width: 7.4rem; height: 7.4rem; margin: 10px;">
                            <p class="text-white" style="font-size: 24px;"><strong><?= $value->CallOut ?></strong></p>
                            <p class="text-white">Call Out</p>
                        </a>
                        <a href="javascript:void(0)" id="div-callout-evaluation" data-id="<?= urlencode($value->JobVacancyId) ?>" data-category="5" class="card pmd-card bg-primary d-flex justify-content-center align-items-center job-status" style="width: 7.4rem; height: 7.4rem; margin: 10px;">
                            <p class="text-white" style="font-size: 24px;"><strong><?= $value->CallOutEvaluation ?></strong></p>
                            <p class="text-white text-center">Call Out Evaluation</p>
                        </a>
                        <a href="javascript:void(0)" id="div-offering" data-id="<?= urlencode($value->JobVacancyId) ?>" data-category="6" class="card pmd-card bg-primary d-flex justify-content-center align-items-center job-status" style="width: 7.4rem; height: 7.4rem; margin: 10px;">
                            <p class="text-white" style="font-size: 24px;"><strong><?= $value->Offering ?></strong></p>
                            <p class="text-white">Offering</p>
                        </a>
                        <a href="javascript:void(0)" id="div-hiring" data-id="<?= urlencode($value->JobVacancyId) ?>" data-category="7" class="card pmd-card bg-primary d-flex justify-content-center align-items-center job-status" style="width: 7.4rem; height: 7.4rem; margin: 10px;">
                            <p class="text-white" style="font-size: 24px;"><strong><?= $value->Hiring ?></strong></p>
                            <p class="text-white">Hiring</p>
                        </a>
                    </div>
                    <div class="row p-2">
                        <div class="col-2">
                            <a href="javascript:void(0)" data-id="<?= $value->JobVacancyId ?>" id="btn-edit" class="btn btn-outline-secondary mr-2 btn-edit" style="width: 100%;">Edit</a>
                        </div>
                    </div>
                </div>
                <?php
                        }
                    }
                ?>

                <div class="pagination mb-5">
                    <?php echo $pagination_links; ?>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-detail-job" tabindex="-1" role="dialog" aria-labelledby="label-detail-job" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="label-detail-job"></h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table table-hover table-bordered" id="table-detail-job">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Location</th>
                                <th>Status</th>
                                <th>Work</th>
                                <th>Education</th>
                                <th>Salary Range</th>
                                <th>Last Online</th>
                            </tr>
                        </thead>
                        <tbody id="tbody-table-detail-job">
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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

        <?php if ($this->session->flashdata('error')): ?>
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: '<?php echo $this->session->flashdata('error'); ?>'
            });
        <?php endif; ?>

        $(document).ready(function () {
            const searchInput = document.getElementById("searchInput");
		    const searchButton = document.getElementById("searchButton");
            const sortBy = document.querySelectorAll('input[name="sort_by"]');

            checkSortByCheckboxesFromURL();   
            updateInputText();         

            // Tambahkan event listener untuk tombol "Search"
            searchButton.addEventListener("click", function () {
                performSearch();
            });

            // Tambahkan event listener untuk tombol "Enter" pada input search
            searchInput.addEventListener("keydown", function (event) {
                if (event.key === "Enter") {
                    performSearch();
                    event.preventDefault();
                }
            });

            sortBy.forEach(function(checkbox) {
                checkbox.addEventListener('change', function() {
                    const url = new URL(window.location.href);

                    if (this.checked) {
                        url.searchParams.set('sort', this.value);
                    } else {
                        url.searchParams.delete('sort');
                    }

                    sortBy.forEach(function(otherCheckbox) {
                        if (otherCheckbox !== this) {
                            otherCheckbox.checked = false;
                        }
                    });

                    window.history.pushState({}, '', url.toString());
                    window.location.href = url.toString();
                });
            });

            // JavaScript untuk melakukan pencarian
            function performSearch() {
                const searchValue = searchInput.value.trim();
                if (searchValue !== "") {
                    const url = new URL(window.location.href);
                    url.searchParams.set('text', searchValue);
                    window.history.pushState({}, '', url.toString());

                    // Jalankan URL yang telah diubah
                    window.location.href = url.toString();
                }else{
                    const url = new URL(window.location.href);
                    url.searchParams.delete('text');
                    window.history.pushState({}, '', url.toString());
                    window.location.href = url.toString();
                }
            }

            function updateInputText() {
                const urlParams = new URLSearchParams(window.location.search);
                const textValue = urlParams.get('text');
                
                if (textValue) {
                    searchInput.value = textValue;
                } else {
                    // Atur nilai default jika parameter tidak ada dalam URL
                    searchInput.value = "";
                }
            }

            function checkSortByCheckboxesFromURL() {
                const urlParams = new URLSearchParams(window.location.search);
                const selectedSortBy = urlParams.get('sort');

                const checkboxes = document.querySelectorAll('input[name="sort_by"]');
                checkboxes.forEach(function(checkbox) {
                    const dataId = checkbox.getAttribute('data-id');
                    checkbox.checked = selectedSortBy === dataId;
                });
            }
            
            $('.btn-edit').click(function() {
                var job_id = $(this).data('id');
                window.location.href = '<?= base_url() ?>post-job?job_id=' + job_id;
            });
            
			$('.job-status').on('click', function () {
                var id = $(this).data('id');
                var category = $(this).data('category');
                window.open('<?= base_url() ?>job-status?jobId=' + id + '&category=' + category, '_self');
			});

            $('.filter-job').on('click', function () {
                var filter = $(this).data('filter');
                const url = new URL(window.location.href);
                url.searchParams.set('filter', filter);
                window.history.pushState({}, '', url.toString());

                // Jalankan URL yang telah diubah
                window.location.href = url.toString();
                // window.open('<?= base_url() ?>Dashboard?filter=' + filter, '_self');
			});
		});
	</script>
</body>
</html>
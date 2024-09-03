<!DOCTYPE html>

<html lang="en">

<head>
	<!-- ** Basic Page Needs ** -->
	<meta charset="utf-8" />
	<title>E-Recruitment JNE</title>

	<!-- ** Mobile Specific Metas ** -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="description" content="Agency HTML Template" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0" />
	<meta name="author" content="Themefisher" />
	<link href="<?php echo base_url() ?>assets/template/css/style.css" rel="stylesheet">
	<link href="<?php echo base_url() ?>assets/template_home/theme/images/logoJNE.png" rel="shortcut icon" />

	<!--Essential stylesheets=====================================-->
	<link href="<?php echo base_url() ?>assets/template_home/theme/plugins/bootstrap/bootstrap.min.css" rel="stylesheet" />
	<link href="<?php echo base_url() ?>assets/template_home/theme/plugins/bootstrap/bootstrap-slider.css" rel="stylesheet" />
	<link href="<?php echo base_url() ?>assets/template_home/theme/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
	<link href="<?php echo base_url() ?>assets/template_home/theme/plugins/slick/slick.css" rel="stylesheet" />
	<link href="<?php echo base_url() ?>assets/template_home/theme/plugins/slick/slick-theme.css" rel="stylesheet" />
	<link href="<?php echo base_url() ?>assets/template_home/theme/plugins/jquery-nice-select/css/nice-select.css" rel="stylesheet" />
	<link href="<?php echo base_url() ?>assets/template_home/theme/css/style.css" rel="stylesheet" />
	<link href="<?php echo base_url() ?>assets/template_home/theme/css/custom.css" rel="stylesheet" />
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/sweetalert2@9.17.2/dist/sweetalert2.min.css">
	
	<style>
		.dropdown-menu {
			/* Add your styles for the dropdown menu here */
			position: absolute; /* Position the dropdown absolutely */
			top: 100%; /* Place the dropdown below the .top-container */
			left: 0; /* Align the dropdown with the left edge of the .top-container */
			background-color: white; /* Sample background color */
			border: 1px solid #ccc; /* Sample border style */
		}

		.filter-dropdown{
			position: relative; /* Make sure the parent container has position: relative */
			overflow: visible !important; /* Set the overflow property to visible */
		}
	</style>
</head>

<body class="body-wrapper">
	<header class="top-header">
		<nav class="navbar">
			<a class="log" href="<?= base_url(); ?>">
				<img src="<?php echo base_url() ?>assets/assets/images/logoJNE.png" alt="" style="width: 120px;" />
			</a>
			<ul class="nav-menu">
				<li><a href="<?= base_url(); ?>">Home</a></li>
				<li><a href="<?= base_url(); ?>job-board" class="active">Job Board</a></li>
				<li><a href="https://www.jne.co.id/id/perusahaan/profil-perusahaan/visi-dan-misi" target="_blank">Company Profile</a></li>
				<li><a href="<?= base_url(); ?>sign-up">Sign Up</a></li>
				<li><a href="<?= base_url(); ?>sign-in">Sign In</a></li>
			</ul>
		</nav>
	</header>
	<section class="search-filter">
		<div class="search-bar">
			<input type="text" id="searchInput" placeholder="Search...">
			<button id="searchButton">Search</button>
		</div>
		<div class="filter-dropdown">
			<div class="dropdown">
				<button class="dropdown-toggle" type="button" id="dropdownProvince"
				data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				Province
				</button>
				<div class="dropdown-menu dropdown-menu-start p-2" aria-labelledby="dropdownProvince" style="width: 300px;">
					<input class="form-control search-input mb-2" type="text" id="provinceSearch" placeholder="Search...">
					<ul id="optionDropdownProvince" style="padding: 0; max-height: 200px; overflow-y: auto;">
					</ul>
				</div>
			</div>
			<div class="dropdown">
				<button class="dropdown-toggle" type="button" id="dropdownCity"
				data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				City
				</button>
				<div class="dropdown-menu dropdown-menu-start p-2" aria-labelledby="dropdownCity" style="width: 300px;">
					<input class="form-control search-input mb-2" type="text" id="citySearch" placeholder="Search...">
					<ul id="optionDropdownCity" style="padding: 0; max-height: 200px; overflow-y: auto;">
					</ul>
				</div>
			</div>
			<div class="dropdown">
				<button class="dropdown-toggle" type="button" id="dropdownJobLevel"
				data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				Job Level
				</button>
				<div class="dropdown-menu dropdown-menu-start p-2" aria-labelledby="dropdownJobLevel" style="width: 300px;">
					<input class="form-control search-input mb-2" type="text" id="jobLevelSearch" placeholder="Search...">
					<ul id="optionDropdownJobLevel" style="padding: 0; max-height: 200px; overflow-y: auto;">
					</ul>
				</div>
			</div>
			<div class="dropdown">
				<button class="dropdown-toggle" type="button" id="dropdownEmploymentType"
				data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				Employment Type
				</button>
				<div class="dropdown-menu dropdown-menu-start p-2" aria-labelledby="dropdownEmploymentType" style="width: 300px;">
					<input class="form-control search-input mb-2" type="text" id="employmentTypeSearch" placeholder="Search...">
					<ul id="optionDropdownEmploymentType" style="padding: 0; max-height: 200px; overflow-y: auto;">
					</ul>
				</div>
			</div>
			<div class="dropdown">
				<button class="dropdown-toggle" type="button" id="dropdownJobFunction"
				data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				Job Function
				</button>
				<div class="dropdown-menu dropdown-menu-start p-2" aria-labelledby="dropdownJobFunction" style="width: 400px;">
					<input class="form-control search-input mb-2" type="text" id="jobFunctionSearch" placeholder="Search...">
					<ul id="optionDropdownJobFunction" style="padding: 0; max-height: 200px; overflow-y: auto;">
					</ul>
				</div>
			</div>
			<div class="dropdown">
				<button class="dropdown-toggle" type="button" id="dropdownEducation"
				data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				Education
				</button>
				<div class="dropdown-menu dropdown-menu-start p-2" aria-labelledby="dropdownEducation" style="width: 300px;">
					<input class="form-control search-input mb-2" type="text" id="educationSearch" placeholder="Search...">
					<ul id="optionDropdownEducation" style="padding: 0; max-height: 200px; overflow-y: auto;">
					</ul>
				</div>
			</div>
		</div>
		<div class="selected-filters" id="selectedFilters">
		</div>
	</section>
	<section class="section bg-gray" style="padding-top: 90px;">
			<div class="container">
				<?php foreach ($JobVacancy as $Job) : ?>
				<div class="card pmd-card" style="margin-top: -40px;">
					<div class="card-body-list">
						<div class="media">
							<a class="pmd-avatar-list-img" href="javascript:void(0);">
								<img src="<?php echo base_url() ?>assets/assets/images/logoJNE.png" height="70px" style="margin-top: 25px;">
							</a>
							<div class="media-body">
								<h3 class="card-title-list"><a href="<?= base_url() ?>jobs?jobId=<?= $Job->JobVacancyId ?>"><?php echo $Job->Position; ?></a></h3>
								<!-- Nama Perusahaan -->
								<p class="card-detail"><a href="#"><?php echo $Job->CompanyName; ?></a></p>
								<!-- Lokasi -->
								<p class="card-detail"><a href="#"><?php echo $Job->LocationDisplay; ?></a></p>
							</div>
							<div class="job-details">
								<p style="float: right;" class="card-subtitle"><?php echo $Job->PostedDesc ?></p>
								<p style="float: right;" class="card-subtitle"><?php echo $Job->RecruiterActive ?></p>
								<!-- Tombol Save -->
								<a style="float: right;" class="btn btn-outline-danger btn_save_jobs" name="btn-save-jobs" id="btn-save-jobs" data-id="<?= $Job->JobVacancyId ?>">
									<i class="fa fa-heart-o"></i> Save
								</a>
							</div>
						</div>
					</div>
					<div class="job-description">
						<!-- Deskripsi pekerjaan atau informasi lainnya -->
						<p class="card-text">
							<?php 
								$maxLength = 200;
								$JobDescription = $Job->JobDescription;
								// if (strlen($Job->JobDescription) > 200) {
								// 	$Job->JobDescription = substr($Job->JobDescription, 0, 200) . "... " . '<a href="' . base_url() . 'jobs/' . $Job->JobVacancyId . '">Read More</a>';
								// }
								if (strlen($Job->JobDescription) > $maxLength) {
									$substring = substr($Job->JobDescription, 0, $maxLength);
									$lastSpacePos = strrpos($substring, ' '); // Cari posisi spasi terakhir dalam substring
									
									if ($lastSpacePos !== false) {
										// Potong substring hingga spasi terakhir
										$Job->JobDescription = substr($substring, 0, $lastSpacePos) . '... <a href="' . base_url() . 'jobs/' . $Job->JobVacancyId . '">Read More</a>';
									} else {
										// Jika tidak ada spasi, potong pada batasan karakter dan tambahkan "Read More"
										$Job->JobDescription = substr($JobDescription, 0, $maxLength) . '... <a href="' . base_url() . 'jobs/' . $Job->JobVacancyId . '">Read More</a>';
									}
								}
							
								echo $Job->JobDescription; 
							?>
						</p>
					</div>
				</div>
				<?php endforeach ?>
			</div><br>

			<!-- Tampilkan pagination -->
			<div class="pagination">
				<?php echo $pagination_links; ?>
			</div>
		
	</section>

	<!--=============================Footer==============================-->

	<footer class="footer section section-sm">
		<!-- Container Start -->
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-7 offset-md-1 offset-lg-0 mb-4 mb-lg-0">
					<!-- About -->
					<div class="block about">
						<!-- footer logo -->
						<img src="<?php echo base_url() ?>assets/assets/images/logoJNE.png" alt="logo" style="width: 120px;" />
						<!-- description -->
						<h4><strong>KANTOR PUSAT</strong></h4>
						<p class="alt-color">
							PT. Tiki Jalur Nugraha Ekakurir
							Jl. Tomang Raya No. 11
							Jakarta Barat 11440
							Indonesia
						</p>
						<p class="alt-color">
							Contact center. (62-21) 2927 8888
							Office. (62-21) 566 5262 <br>
							Fax. (62-21) 567 1413 <br>
							Email. customercare@jne.co.id
						</p>
					</div>
				</div>
				<!-- Link list -->
				<div class="col-lg-2 offset-lg-1 col-md-3 col-6 mb-4 mb-lg-0">
					<div class="block">
						<h4>Find Job</h4>
						<ul>
							<li><a href="#">Sign up</a></li>
							<li>
								<a href="#">Job Board</a>
							</li>
						</ul>
					</div>
				</div>
				<!-- Link list -->
				<div class="col-lg-2 col-md-3 offset-md-1 offset-lg-0 col-6 mb-4 mb-md-0">
					<div class="block">
						<h4>About</h4>
						<ul>
							<li><a href="#">Company Profile</a></li>
							<li><a href="#">Privacy and Policy</a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-2 col-md-3 offset-md-1 offset-lg-0 col-6 mb-4 mb-md-0">
					<div class="block">
						<h4>Contact Us</h4>
						<ul>
							<li><a href="whatsapp://send?text=Hello&phone=+6281574963717"><i class="fa fa-whatsapp fa-xs" aria-hidden="true"></i><strong>
										Whatsapp</strong></a></li>
							<li><a href="mailto:recruitment@jne.co.id"><i class="fa fa-envelope-o fa-lg" aria-hidden="true"></i><strong> Email</strong></a></li>
						</ul>
					</div>
				</div>
				<!-- Promotion -->
				<!-- <div class="col-lg-4 col-md-7">
					
					<div class="block-2 app-promotion">
						<div class="mobile d-flex align-items-center">
							<a href="#">
						
								<img src="<?php echo base_url() ?>assets/template_home/theme/images/footer/phone-icon.png" alt="mobile-icon" />
							</a>
							<p class="mb-0">Get the Dealsy Mobile App and Save more</p>
						</div>
						<div class="download-btn d-flex my-3">
							<a href="#"><img src="images/apps/google-play-store.png" class="img-fluid" alt="" /></a>
							<a href="#" class="ml-3"><img src="images/apps/apple-app-store.png" class="img-fluid" alt="" /></a>
						</div>
					</div>
				</div> -->
			</div>
		</div>
		<!-- Container End -->
	</footer>

	<!-- Modal -->
	<div class="modal fade" id="savejob" tabindex="-1" role="dialog" aria-labelledby="savejobTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h6 class="modal-title" id="exampleModalLongTitle"><strong>Save this job with a E Recruitment JNE
							account

						</strong></h6>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<p>Save this job and other opportunities like this with a free account.</p>
					<a class="btn btn-danger btn-block mt-3" id="btn-save-sign-in" href="<?= base_url(); ?>sign-in">
						<h6><strong>Sign In</strong></h6>
					</a>
					<a class="btn btn-outline-danger btn-block mt-3" id="btn-save-sign-up" href="<?= base_url(); ?>sign-up">
						<h6><strong>Sign Up</strong></h6>
					</a>
				</div>
			</div>
		</div>
	</div>
	<!-- Footer Bottom -->
	<footer class="footer-bottom">
		<!-- Container Start -->
		<div class="container">
			<div class="row">
				<div class="col-lg-6 text-center text-lg-left mb-3 mb-lg-0">
					<!-- Copyright -->
					<div class="copyright" style="text-align: center;">
						<p>
							Copyright &copy;
							<script>
								var CurrentYear = new Date().getFullYear();
								document.write(CurrentYear);
							</script>
							<a class="text-white" href="#">HCIS TEAM</a>
						</p>
					</div>
				</div>
				<div class="col-lg-6">
					<!-- Social Icons -->
					<ul class="social-media-icons text-center text-lg-right">
						<li>
							<a class="fa fa-facebook" href="#"></a>
						</li>
						<li>
							<a class="fa fa-twitter" href="#"></a>
						</li>
						<li>
							<a class="fa fa-pinterest-p" href="#"></a>
						</li>
						<li>
							<a class="fa fa-github-alt" href="#"></a>
						</li>
					</ul>
				</div>
			</div>
		</div>


		<!-- Container End -->
		<!-- To Top -->
		<div class="scroll-top-to">
			<i class="fa fa-angle-up"></i>
		</div>
	</footer>

	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
		$(document).ready(function () {
			getProvinceSearch();
            getCitySearch();
            getJobLevelSearch();
            getEmploymentTypeSearch();
            getJobFunctionSearch();
            getEducationSearch();

            // $('#provinceSearch').on('input', function(){
            //     var text = $(this).val();
            //     getProvinceSearch(text);
            // });

            // $('#citySearch').on('input', function(){
            //     var text = $(this).val();
            //     getCitySearch(text);
            // });

            // $('#jobLevelSearch').on('input', function(){
            //     var text = $(this).val();
            //     getJobLevelSearch(text);
            // });

            // $('#employmentTypeSearch').on('input', function(){
            //     var text = $(this).val();
            //     getEmploymentTypeSearch(text);
            // });

            // $('#jobFunctionSearch').on('input', function(){
            //     var text = $(this).val();
            //     getJobFunctionSearch(text);
            // });

            // $('#educationSearch').on('input', function(){
            //     var text = $(this).val();
            //     getEducationSearch(text);
            // });

            function getProvinceSearch(param = ''){
                $.ajax({
                    url: '<?= base_url() ?>get-province-search',
                    type: 'POST',
                    data: { 'searchParam' : param },
                    success: function(response) {
                        var jsonResponse = JSON.parse(response);
                        var str = '';
                        $.each(jsonResponse, function(index, item) {
                            str += '<li>' +
						        '<a class="dropdown-item" href="javascript:void(0)">' +
							    '<div class="form-check">'+
								'<input class="form-check-input province" type="checkbox" value="' + item.ProvinceName + '" data-id="' + item.ProvinceName + '" name="province" id="province' + (index+1) + '" />' +
								'<label class="form-check-label" for="province' + (index+1) + '">' + item.ProvinceName + '</label>' + 
							    '</div>' +
						        '</a>' +
					            '</li>';
                        });
                        $('#optionDropdownProvince').html(str);

						const selectedProvinces = getSelectedProvincesFromURL();
    					checkProvincesCheckboxesFromURL(selectedProvinces);

						$('#provinceSearch').on('input', function(){
							var text = $(this).val();
							var filteredData = [];
							const uniqueNames = {};

							if(text != ''){
								$.each(selectedProvinces, function(index, item) {
									filteredData.push({ProvinceName : item});
								});
								
								filteredResults = jsonResponse.filter(function(item) {
									return item.ProvinceName.toLowerCase().includes(text);
								});

								filteredData = filteredData.concat(filteredResults);

								filteredData = filteredData.reduce(function (accumulator, currentItem) {
									const provinceName = currentItem.ProvinceName;
									if (!uniqueNames.hasOwnProperty(provinceName)) {
										uniqueNames[provinceName] = true;
										accumulator.push(currentItem);
									}
									return accumulator;
								}, []);
							}else{
								filteredData = jsonResponse;
							}

							str = '';
							$.each(filteredData, function(index, item) {
								var isChecked = selectedProvinces.includes(item.ProvinceName) ? 'checked' : '';
								str += '<li>' +
									'<a class="dropdown-item" href="javascript:void(0)">' +
									'<div class="form-check">'+
									'<input class="form-check-input province" type="checkbox" value="' + item.ProvinceName + '" data-id="' + item.ProvinceName + '" name="province" id="province' + (index+1) + '" ' + isChecked + ' />' +
									'<label class="form-check-label" for="province' + (index+1) + '">' + item.ProvinceName + '</label>' + 
									'</div>' +
									'</a>' +
									'</li>';
							});
							$('#optionDropdownProvince').html(str);

							// getProvinceSearch(text);

							$('.province').on('change', function() {
								const checkedProvinces = $('.province:checked').map(function() {
									return $(this).data('id');
								}).get();

								if (checkedProvinces.length > 0) {
									const url = new URL(window.location.href);
									url.searchParams.set('province[]', encodeURIComponent(checkedProvinces.join(',')));
									window.history.pushState({}, '', url.toString());
									window.location.href = url.toString();
								}
							});
						});

						$('.province').on('change', function() {
                            const checkedProvinces = $('.province:checked').map(function() {
                                return $(this).data('id');
                            }).get();

                            if (checkedProvinces.length > 0) {
                                const url = new URL(window.location.href);
                                url.searchParams.set('province[]', encodeURIComponent(checkedProvinces.join(',')));
                                window.history.pushState({}, '', url.toString());
                                window.location.href = url.toString();
                            }
                        });

                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            }

            function getCitySearch(param = ''){
                $.ajax({
                    url: '<?= base_url() ?>get-city-search',
                    type: 'POST',
                    data: { 'searchParam' : param },
                    success: function(response) {
                        var jsonResponse = JSON.parse(response);
                        var str = '';
                        $.each(jsonResponse, function(index, item) {
                            str += '<li>' +
						        '<a class="dropdown-item" href="javascript:void(0)">' +
							    '<div class="form-check">'+
								'<input class="form-check-input city" type="checkbox" value="' + item.CityName + '" data-id="' + item.CityName + '" name="city" id="city' + (index+1) + '" />' +
								'<label class="form-check-label" for="city' + (index+1) + '">' + item.CityName + '</label>' + 
							    '</div>' +
						        '</a>' +
					            '</li>';
                        });
                        $('#optionDropdownCity').html(str);

						const selectedCities = getSelectedCitiesFromURL();
    					checkCitiesCheckboxesFromURL(selectedCities);

						$('#citySearch').on('input', function(){
							var text = $(this).val();
							var filteredData = [];
							const uniqueNames = {};

							if(text != ''){
								$.each(selectedCities, function(index, item) {
									filteredData.push({CityName : item});
								});
								
								filteredResults = jsonResponse.filter(function(item) {
									return item.CityName.toLowerCase().includes(text);
								});

								filteredData = filteredData.concat(filteredResults);

								filteredData = filteredData.reduce(function (accumulator, currentItem) {
									const cityName = currentItem.CityName;
									if (!uniqueNames.hasOwnProperty(cityName)) {
										uniqueNames[cityName] = true;
										accumulator.push(currentItem);
									}
									return accumulator;
								}, []);
							}else{
								filteredData = jsonResponse;
							}

							str = '';
							$.each(filteredData, function(index, item) {
								var isChecked = selectedCities.includes(item.CityName) ? 'checked' : '';
								str += '<li>' +
									'<a class="dropdown-item" href="javascript:void(0)">' +
									'<div class="form-check">'+
									'<input class="form-check-input city" type="checkbox" value="' + item.CityName + '" data-id="' + item.CityName + '" name="city" id="city' + (index+1) + '" ' + isChecked + ' />' +
									'<label class="form-check-label" for="city' + (index+1) + '">' + item.CityName + '</label>' + 
									'</div>' +
									'</a>' +
									'</li>';
							});
							$('#optionDropdownCity').html(str);

							// getProvinceSearch(text);

							$('.city').on('change', function() {
								const checkedCities = $('.city:checked').map(function() {
									return $(this).data('id');
								}).get();

								if (checkedCities.length > 0) {
									const url = new URL(window.location.href);
									url.searchParams.set('city[]', encodeURIComponent(checkedCities.join(',')));
									window.history.pushState({}, '', url.toString());
									window.location.href = url.toString();
								}
							});
						});

                        $('.city').on('change', function() {
                            const checkedCities = $('.city:checked').map(function() {
                                return $(this).data('id');
                            }).get();

                            if (checkedCities.length > 0) {
                                const url = new URL(window.location.href);
                                url.searchParams.set('city[]', encodeURIComponent(checkedCities.join(',')));
                                window.history.pushState({}, '', url.toString());
                                window.location.href = url.toString();
                            }
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            }

            function getJobLevelSearch(param = ''){
                $.ajax({
                    url: '<?= base_url() ?>get-job-level-search',
                    type: 'POST',
                    data: { 'searchParam' : param },
                    success: function(response) {
                        var jsonResponse = JSON.parse(response);
                        var str = '';
                        $.each(jsonResponse, function(index, item) {
                            str += '<li>' +
						        '<a class="dropdown-item" href="javascript:void(0)">' +
							    '<div class="form-check">'+
								'<input class="form-check-input job_level" type="checkbox" value="' + item.JobLevelName + '" data-id="' + item.JobLevelName + '" name="job_level" id="job_level' + (index+1) + '" />' +
								'<label class="form-check-label" for="job_level' + (index+1) + '">' + item.JobLevelName + '</label>' + 
							    '</div>' +
						        '</a>' +
					            '</li>';
                        });
                        $('#optionDropdownJobLevel').html(str);

						const selectedJobLevel = getSelectedJobLevelFromURL();
    					checkJobLevelCheckboxesFromURL(selectedJobLevel);

						$('#jobLevelSearch').on('input', function(){
							var text = $(this).val();
							var filteredData = [];
							const uniqueNames = {};

							if(text != ''){
								$.each(selectedJobLevel, function(index, item) {
									filteredData.push({JobLevelName : item});
								});
								
								filteredResults = jsonResponse.filter(function(item) {
									return item.JobLevelName.toLowerCase().includes(text);
								});

								filteredData = filteredData.concat(filteredResults);

								filteredData = filteredData.reduce(function (accumulator, currentItem) {
									const jobLevelName = currentItem.JobLevelName;
									if (!uniqueNames.hasOwnProperty(jobLevelName)) {
										uniqueNames[jobLevelName] = true;
										accumulator.push(currentItem);
									}
									return accumulator;
								}, []);
							}else{
								filteredData = jsonResponse;
							}

							str = '';
							$.each(filteredData, function(index, item) {
								var isChecked = selectedJobLevel.includes(item.JobLevelName) ? 'checked' : '';
								str += '<li>' +
									'<a class="dropdown-item" href="javascript:void(0)">' +
									'<div class="form-check">'+
									'<input class="form-check-input job_level" type="checkbox" value="' + item.JobLevelName + '" data-id="' + item.JobLevelName + '" name="job_level" id="job_level' + (index+1) + '" ' + isChecked + ' />' +
									'<label class="form-check-label" for="job_level' + (index+1) + '">' + item.JobLevelName + '</label>' + 
									'</div>' +
									'</a>' +
									'</li>';
							});
							$('#optionDropdownJobLevel').html(str);

							// getProvinceSearch(text);

							$('.job_level').on('change', function() {
								const checkedJobLevels = $('.job_level:checked').map(function() {
									return $(this).data('id');
								}).get();

								if (checkedJobLevels.length > 0) {
									const url = new URL(window.location.href);
									url.searchParams.set('job_level[]', encodeURIComponent(checkedJobLevels.join(',')));
									window.history.pushState({}, '', url.toString());
									window.location.href = url.toString();
								}
							});
						});

                        $('.job_level').on('change', function() {
                            const checkedJobLevels = $('.job_level:checked').map(function() {
                                return $(this).data('id');
                            }).get();

                            if (checkedJobLevels.length > 0) {
                                const url = new URL(window.location.href);
                                url.searchParams.set('job_level[]', encodeURIComponent(checkedJobLevels.join(',')));
                                window.history.pushState({}, '', url.toString());
                                window.location.href = url.toString();
                            }
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            }

            function getEmploymentTypeSearch(param = ''){
                $.ajax({
                    url: '<?= base_url() ?>get-employment-type-search',
                    type: 'POST',
                    data: { 'searchParam' : param },
                    success: function(response) {
                        var jsonResponse = JSON.parse(response);
                        var str = '';
                        $.each(jsonResponse, function(index, item) {
                            str += '<li>' +
						        '<a class="dropdown-item" href="javascript:void(0)">' +
							    '<div class="form-check">'+
								'<input class="form-check-input employment_type" type="checkbox" value="' + item.EmpTypeName + '" data-id="' + item.EmpTypeName + '" name="employment_type" id="employment_type' + (index+1) + '" />' +
								'<label class="form-check-label" for="employment_type' + (index+1) + '">' + item.EmpTypeName + '</label>' + 
							    '</div>' +
						        '</a>' +
					            '</li>';
                        });
                        $('#optionDropdownEmploymentType').html(str);

						const selectedEmploymentType = getSelectedEmploymentTypeFromURL();
    					checkEmploymentTypeCheckboxesFromURL(selectedEmploymentType);

						$('#employmentTypeSearch').on('input', function(){
							var text = $(this).val();
							var filteredData = [];
							const uniqueNames = {};

							if(text != ''){
								$.each(selectedEmploymentType, function(index, item) {
									filteredData.push({EmpTypeName : item});
								});
								
								filteredResults = jsonResponse.filter(function(item) {
									return item.EmpTypeName.toLowerCase().includes(text);
								});

								filteredData = filteredData.concat(filteredResults);

								filteredData = filteredData.reduce(function (accumulator, currentItem) {
									const empTypeName = currentItem.EmpTypeName;
									if (!uniqueNames.hasOwnProperty(empTypeName)) {
										uniqueNames[empTypeName] = true;
										accumulator.push(currentItem);
									}
									return accumulator;
								}, []);
							}else{
								filteredData = jsonResponse;
							}

							str = '';
							$.each(filteredData, function(index, item) {
								var isChecked = selectedEmploymentType.includes(item.EmpTypeName) ? 'checked' : '';
								str += '<li>' +
									'<a class="dropdown-item" href="javascript:void(0)">' +
									'<div class="form-check">'+
									'<input class="form-check-input employment_type" type="checkbox" value="' + item.EmpTypeName + '" data-id="' + item.EmpTypeName + '" name="employment_type" id="employment_type' + (index+1) + '" ' + isChecked + ' />' +
									'<label class="form-check-label" for="employment_type' + (index+1) + '">' + item.EmpTypeName + '</label>' + 
									'</div>' +
									'</a>' +
									'</li>';
							});
							$('#optionDropdownEmploymentType').html(str);

							// getProvinceSearch(text);

							$('.employment_type').on('change', function() {
								const checkedEmploymentTypes = $('.employment_type:checked').map(function() {
									return $(this).data('id');
								}).get();

								if (checkedEmploymentTypes.length > 0) {
									const url = new URL(window.location.href);
									url.searchParams.set('employment_type[]', encodeURIComponent(checkedEmploymentTypes.join(',')));
									window.history.pushState({}, '', url.toString());
									window.location.href = url.toString();
								}
							});
						});

                        $('.employment_type').on('change', function() {
                            const checkedEmploymentTypes = $('.employment_type:checked').map(function() {
                                return $(this).val();
                            }).get();

                            if (checkedEmploymentTypes.length > 0) {
                                const url = new URL(window.location.href);
                                url.searchParams.set('employment_type[]', encodeURIComponent(checkedEmploymentTypes.join(',')));
                                window.history.pushState({}, '', url.toString());
                                window.location.href = url.toString();
                            }
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            }

            function getJobFunctionSearch(param = ''){
                $.ajax({
                    url: '<?= base_url() ?>get-job-function-search',
                    type: 'POST',
                    data: { 'searchParam' : param },
                    success: function(response) {
                        var jsonResponse = JSON.parse(response);
                        var str = '';
                        $.each(jsonResponse, function(index, item) {
                            str += '<li>' +
						        '<a class="dropdown-item" href="javascript:void(0)">' +
							    '<div class="form-check">'+
								'<input class="form-check-input job_function" type="checkbox" value="' + item.JobFunctionName + '" data-id="' + item.JobFunctionName + '" name="job_function" id="job_function' + (index+1) + '" />' +
								'<label class="form-check-label" for="job_function' + (index+1) + '">' + item.JobFunctionName + '</label>' + 
							    '</div>' +
						        '</a>' +
					            '</li>';
                        });
                        $('#optionDropdownJobFunction').html(str);

						const selectedJobFunction = getSelectedJobFunctionFromURL();
    					checkJobFunctionCheckboxesFromURL(selectedJobFunction);

						$('#jobFunctionSearch').on('input', function(){
							var text = $(this).val();
							var filteredData = [];
							const uniqueNames = {};

							if(text != ''){
								$.each(selectedJobFunction, function(index, item) {
									filteredData.push({JobFunctionName : item});
								});
								
								filteredResults = jsonResponse.filter(function(item) {
									return item.JobFunctionName.toLowerCase().includes(text);
								});

								filteredData = filteredData.concat(filteredResults);

								filteredData = filteredData.reduce(function (accumulator, currentItem) {
									const jobFunctionName = currentItem.JobFunctionName;
									if (!uniqueNames.hasOwnProperty(jobFunctionName)) {
										uniqueNames[jobFunctionName] = true;
										accumulator.push(currentItem);
									}
									return accumulator;
								}, []);
							}else{
								filteredData = jsonResponse;
							}

							str = '';
							$.each(filteredData, function(index, item) {
								var isChecked = selectedJobFunction.includes(item.JobFunctionName) ? 'checked' : '';
								str += '<li>' +
									'<a class="dropdown-item" href="javascript:void(0)">' +
									'<div class="form-check">'+
									'<input class="form-check-input job_function" type="checkbox" value="' + item.JobFunctionName + '" data-id="' + item.JobFunctionName + '" name="job_function" id="job_function' + (index+1) + '" ' + isChecked + ' />' +
									'<label class="form-check-label" for="job_function' + (index+1) + '">' + item.JobFunctionName + '</label>' + 
									'</div>' +
									'</a>' +
									'</li>';
							});
							$('#optionDropdownJobFunction').html(str);

							// getProvinceSearch(text);

							$('.job_function').on('change', function() {
								const checkedJobFunctions = $('.job_function:checked').map(function() {
									return $(this).data('id');
								}).get();

								if (checkedJobFunctions.length > 0) {
									const url = new URL(window.location.href);
									url.searchParams.set('job_function[]', encodeURIComponent(checkedJobFunctions.join(',')));
									window.history.pushState({}, '', url.toString());
									window.location.href = url.toString();
								}
							});
						});

                        $('.job_function').on('change', function() {
                            const checkedJobFunctions = $('.job_function:checked').map(function() {
                                return $(this).val();
                            }).get();

                            if (checkedJobFunctions.length > 0) {
                                const url = new URL(window.location.href);
                                url.searchParams.set('job_function[]', encodeURIComponent(checkedJobFunctions.join(',')));
                                window.history.pushState({}, '', url.toString());
                                window.location.href = url.toString();
                            }
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            }

            function getEducationSearch(param = ''){
                $.ajax({
                    url: '<?= base_url() ?>get-education-search',
                    type: 'POST',
                    data: { 'searchParam' : param },
                    success: function(response) {
                        var jsonResponse = JSON.parse(response);
                        var str = '';
                        $.each(jsonResponse, function(index, item) {
                            str += '<li>' +
						        '<a class="dropdown-item" href="javascript:void(0)">' +
							    '<div class="form-check">'+
								'<input class="form-check-input education" type="checkbox" value="' + item.EducationLevelName + '" data-id="' + item.EducationLevelName + '" name="education" id="education' + (index+1) + '" />' +
								'<label class="form-check-label" for="education' + (index+1) + '">' + item.EducationLevelName + '</label>' + 
							    '</div>' +
						        '</a>' +
					            '</li>';
                        });
                        $('#optionDropdownEducation').html(str);

						const selectedEducation = getSelectedEducationFromURL();
    					checkEducationCheckboxesFromURL(selectedEducation);

						$('#educationSearch').on('input', function(){
							var text = $(this).val();
							var filteredData = [];
							const uniqueNames = {};

							if(text != ''){
								$.each(selectedEducation, function(index, item) {
									filteredData.push({EducationLevelName : item});
								});
								
								filteredResults = jsonResponse.filter(function(item) {
									return item.EducationLevelName.toLowerCase().includes(text);
								});

								filteredData = filteredData.concat(filteredResults);

								filteredData = filteredData.reduce(function (accumulator, currentItem) {
									const educationLevelName = currentItem.EducationLevelName;
									if (!uniqueNames.hasOwnProperty(educationLevelName)) {
										uniqueNames[educationLevelName] = true;
										accumulator.push(currentItem);
									}
									return accumulator;
								}, []);
							}else{
								filteredData = jsonResponse;
							}

							str = '';
							$.each(filteredData, function(index, item) {
								var isChecked = selectedEducation.includes(item.EducationLevelName) ? 'checked' : '';
								str += '<li>' +
									'<a class="dropdown-item" href="javascript:void(0)">' +
									'<div class="form-check">'+
									'<input class="form-check-input education" type="checkbox" value="' + item.EducationLevelName + '" data-id="' + item.EducationLevelName + '" name="education" id="education' + (index+1) + '" ' + isChecked + ' />' +
									'<label class="form-check-label" for="education' + (index+1) + '">' + item.EducationLevelName + '</label>' + 
									'</div>' +
									'</a>' +
									'</li>';
							});
							$('#optionDropdownEducation').html(str);

							// getProvinceSearch(text);

							$('.education').on('change', function() {
								const checkedEducations = $('.education:checked').map(function() {
									return $(this).data('id');
								}).get();

								if (checkedEducations.length > 0) {
									const url = new URL(window.location.href);
									url.searchParams.set('education[]', encodeURIComponent(checkedEducations.join(',')));
									window.history.pushState({}, '', url.toString());
									window.location.href = url.toString();
								}
							});
						});

                        $('.education').on('change', function() {
                            const checkedEducations = $('.education:checked').map(function() {
                                return $(this).val();
                            }).get();

                            if (checkedEducations.length > 0) {
                                const url = new URL(window.location.href);
                                url.searchParams.set('education[]', encodeURIComponent(checkedEducations.join(',')));
                                window.history.pushState({}, '', url.toString());
                                window.location.href = url.toString();
                            }
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            }

			function getSelectedProvincesFromURL() {
				const urlParams = new URLSearchParams(window.location.search);
				const selectedProvinces = urlParams.get('province[]');
				if (selectedProvinces) {
					return decodeURIComponent(selectedProvinces).split(',');
				}
				return [];
			}

			function checkProvincesCheckboxesFromURL(selectedProvinces) {
				document.querySelectorAll('input[name="province"]').forEach(function(checkbox) {
					checkbox.checked = selectedProvinces.includes(checkbox.getAttribute('data-id'));
				});
			}

			function getSelectedCitiesFromURL() {
				const urlParams = new URLSearchParams(window.location.search);
				const selectedCities = urlParams.get('city[]');
				if (selectedCities) {
					return decodeURIComponent(selectedCities).split(',');
				}
				return [];
			}

			function checkCitiesCheckboxesFromURL(selectedCities) {
				document.querySelectorAll('input[name="city"]').forEach(function(checkbox) {
					checkbox.checked = selectedCities.includes(checkbox.getAttribute('data-id'));
				});
			}

			function getSelectedJobLevelFromURL() {
				const urlParams = new URLSearchParams(window.location.search);
				const selectedJobLevel = urlParams.get('job_level[]');
				if (selectedJobLevel) {
					return decodeURIComponent(selectedJobLevel).split(',');
				}
				return [];
			}

			function checkJobLevelCheckboxesFromURL(selectedJobLevel) {
				document.querySelectorAll('input[name="job_level"]').forEach(function(checkbox) {
					checkbox.checked = selectedJobLevel.includes(checkbox.getAttribute('data-id'));
				});
			}

			function getSelectedEmploymentTypeFromURL() {
				const urlParams = new URLSearchParams(window.location.search);
				const selectedEmploymentType = urlParams.get('employment_type[]');
				if (selectedEmploymentType) {
					return decodeURIComponent(selectedEmploymentType).split(',');
				}
				return [];
			}

			function checkEmploymentTypeCheckboxesFromURL(selectedEmploymentType) {
				document.querySelectorAll('input[name="employment_type"]').forEach(function(checkbox) {
					checkbox.checked = selectedEmploymentType.includes(checkbox.getAttribute('data-id'));
				});
			}

			function getSelectedJobFunctionFromURL() {
				const urlParams = new URLSearchParams(window.location.search);
				const selectedJobFunction = urlParams.get('job_function[]');
				if (selectedJobFunction) {
					return decodeURIComponent(selectedJobFunction).split(',');
				}
				return [];
			}

			function checkJobFunctionCheckboxesFromURL(selectedJobFunction) {
				document.querySelectorAll('input[name="job_function"]').forEach(function(checkbox) {
					checkbox.checked = selectedJobFunction.includes(checkbox.getAttribute('data-id'));
				});
			}

			function getSelectedEducationFromURL() {
				const urlParams = new URLSearchParams(window.location.search);
				const selectedEducation = urlParams.get('education[]');
				if (selectedEducation) {
					return decodeURIComponent(selectedEducation).split(',');
				}
				return [];
			}

			function checkEducationCheckboxesFromURL(selectedEducation) {
				document.querySelectorAll('input[name="education"]').forEach(function(checkbox) {
					checkbox.checked = selectedEducation.includes(checkbox.getAttribute('data-id'));
				});
			}

			addFilter();

			$(document.body).on('click', '.btn_save_jobs', function () {
				$('#savejob').modal('show');
				$('#btn-save-sign-in').attr('href','<?= base_url() ?>sign-in?jobId=' + $(this).data('id'));
				$('#btn-save-sign-up').attr('href','<?= base_url() ?>sign-up?jobId=' + $(this).data('id'));
			});
		});
		const searchInput = document.getElementById("searchInput");
		const searchButton = document.getElementById("searchButton");
		const province = document.querySelectorAll('input[name="province"]');
		const city = document.querySelectorAll('input[name="city"]');
		const jobLevel = document.querySelectorAll('input[name="job_level"]');
		const employmentType = document.querySelectorAll('input[name="employment_type"]');
		const jobFunction = document.querySelectorAll('input[name="job_function"]');
		const education = document.querySelectorAll('input[name="education"]');

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

		province.forEach(function(checkbox) {
			checkbox.addEventListener('change', function() {
			const checkedProvinces = Array.from(province)
				.filter(checkbox => checkbox.checked)
				.map(checkbox => checkbox.value);

			if (checkedProvinces.length > 0) {
				const url = new URL(window.location.href);
				url.searchParams.set('province[]', checkedProvinces.join(','));
				window.history.pushState({}, '', url.toString());
				window.location.href = url.toString();
			}
			});
		});

		city.forEach(function(checkbox) {
			checkbox.addEventListener('change', function() {
			const checkedCities = Array.from(city)
				.filter(checkbox => checkbox.checked)
				.map(checkbox => checkbox.value);

			if (checkedCities.length > 0) {
				const url = new URL(window.location.href);
				url.searchParams.set('cities[]', checkedCities.join(','));
				window.history.pushState({}, '', url.toString());
				window.location.href = url.toString();
			}
			});
		});

		jobLevel.forEach(function(checkbox) {
			checkbox.addEventListener('change', function() {
			const checkedJobLevel = Array.from(jobLevel)
				.filter(checkbox => checkbox.checked)
				.map(checkbox => checkbox.value);

			if (checkedJobLevel.length > 0) {
				const url = new URL(window.location.href);
				url.searchParams.set('job_level[]', checkedJobLevel.join(','));
				window.history.pushState({}, '', url.toString());
				window.location.href = url.toString();
			}
			});
		});

		employmentType.forEach(function(checkbox) {
			checkbox.addEventListener('change', function() {
			const checkedEmploymentType = Array.from(employmentType)
				.filter(checkbox => checkbox.checked)
				.map(checkbox => checkbox.value);

			if (checkedEmploymentType.length > 0) {
				const url = new URL(window.location.href);
				url.searchParams.set('employment_type[]', checkedEmploymentType.join(','));
				window.history.pushState({}, '', url.toString());
				window.location.href = url.toString();
			}
			});
		});

		jobFunction.forEach(function(checkbox) {
			checkbox.addEventListener('change', function() {
			const checkedJobFunction = Array.from(jobFunction)
				.filter(checkbox => checkbox.checked)
				.map(checkbox => checkbox.value);

			if (checkedJobFunction.length > 0) {
				const url = new URL(window.location.href);
				url.searchParams.set('job_function[]', checkedJobFunction.join(','));
				window.history.pushState({}, '', url.toString());
				window.location.href = url.toString();
			}
			});
		});

		education.forEach(function(checkbox) {
			checkbox.addEventListener('change', function() {
			const checkedEducation = Array.from(education)
				.filter(checkbox => checkbox.checked)
				.map(checkbox => checkbox.value);

			if (checkedEducation.length > 0) {
				const url = new URL(window.location.href);
				url.searchParams.set('education[]', checkedEducation.join(','));
				window.history.pushState({}, '', url.toString());
				window.location.href = url.toString();
			}
			});
		});

		// JavaScript untuk menambahkan filter yang dipilih
		function addFilter() {
			// Hapus semua filter yang ada
			selectedFilters.innerHTML = "";
			const urlParams = new URLSearchParams(window.location.search);
			for (const [key, value] of urlParams.entries()) {
				const filterTag = document.createElement("div");
				filterTag.classList.add("filter-tag");
				// if(key == 'province[]'){
				// 	const provinceNames = value.split(',');
				// 	provinceNames.forEach(function(provinceName) {

				// 	});
				// }
				filterTag.textContent = key.replace(/\[|\]/g, '') + ": " + decodeURIComponent(value);

				const closeButton = document.createElement("button");
				closeButton.innerHTML = "<i class='fa fa-times'></i>";

				closeButton.onclick = function () {
					removeFilter(key, value);
				};

				filterTag.appendChild(closeButton);
				selectedFilters.appendChild(filterTag);
			}
		}

		// JavaScript untuk menghapus filter yang dipilih
		function removeFilter(key, value) {
			const urlParams = new URLSearchParams(window.location.search);
			urlParams.delete(key, value);

			const newUrl = window.location.origin + window.location.pathname + '?' + urlParams.toString();
			window.history. pushState({}, '', newUrl);

			window.location.href = newUrl;
		}

		// JavaScript untuk melakukan pencarian
		function performSearch() {
			const searchValue = searchInput.value.trim();
			if (searchValue !== "") {
				const url = new URL(window.location.href);
				url.searchParams.set('text', searchValue);
				window.history.pushState({}, '', url.toString());

				// Jalankan URL yang telah diubah
				window.location.href = url.toString();
			}
		}
	</script>
</body>

</html>
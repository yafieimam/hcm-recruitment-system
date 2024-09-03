<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>E-Recruitment</title>
	<!-- Favicon icon -->
	<link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url() ?>assets/template_home/theme/images/LogoRec.jpg">
	<!-- Custom Stylesheet -->
	<link href="<?php echo base_url() ?>assets/template/css/style.css" rel="stylesheet">

</head>

<body>

	<!--*******************
        Preloader start
    ********************-->
	<div id="preloader">
		<div class="loader">
			<svg class="circular" viewBox="25 25 50 50">
				<circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
			</svg>
		</div>
	</div>
	<!--*******************
        Preloader end
    ********************-->


	<!--**********************************
        Main wrapper start
    ***********************************-->
	<div id="main-wrapper">

		<!--**********************************
            Nav header start
        ***********************************-->
		<div class="nav-header" style="position: fixed;">
			<div class="brand-logo">
				<a href="index.html">
					<b class="logo-abbr"><img src="<?php echo base_url() ?>assets/template_home/images/logoJNE.PN" alt="">
					</b>
					<span class="logo-compact"><img src="<?php echo base_url() ?>assets/template_home/images/LogoRec.jpg" alt=""></span>
					<span class="brand-title">
						<img style="width: 60px; margin-left:30px; margin-top:-20px" src="<?php echo base_url() ?>assets/template_home/theme/images/LogoRec.jpg" alt="">
					</span>
				</a>
				<div class="nav-control">
					<div class="hamburger">
						<span class="toggle-icon"><i class="icon-menu"></i></span>
					</div>
				</div>
			</div>
		</div>
		<!--**********************************
            Nav header end
        ***********************************-->

		<!--**********************************
            Header start
        ***********************************-->
		<div class="header" style="position:fixed;">
			<div class="header-content clearfix">
				<div class="header-right">
					<ul class="clearfix">
						<li class="icons dropdown"><a href="javascript:void(0)" data-toggle="dropdown">
								<i class="mdi mdi-email-outline"></i>
								<span class="badge gradient-1 badge-pill badge-primary">3</span>
							</a>
							<div class="drop-down animated fadeIn dropdown-menu">
								<div class="dropdown-content-heading d-flex justify-content-between">
									<span class="">3 New Messages</span>

								</div>
								<div class="dropdown-content-body">
									<ul>
										<li class="notification-unread">
											<a href="javascript:void()">
												<img class="float-left mr-3 avatar-img" src="images/avatar/1.jpg" alt="">
												<div class="notification-content">
													<div class="notification-heading">Saiful Islam</div>
													<div class="notification-timestamp">08 Hours ago</div>
													<div class="notification-text">Hi Teddy, Just wanted to let you ...
													</div>
												</div>
											</a>
										</li>
										<li class="notification-unread">
											<a href="javascript:void()">
												<img class="float-left mr-3 avatar-img" src="images/avatar/2.jpg" alt="">
												<div class="notification-content">
													<div class="notification-heading">Adam Smith</div>
													<div class="notification-timestamp">08 Hours ago</div>
													<div class="notification-text">Can you do me a favour?</div>
												</div>
											</a>
										</li>
										<li>
											<a href="javascript:void()">
												<img class="float-left mr-3 avatar-img" src="images/avatar/3.jpg" alt="">
												<div class="notification-content">
													<div class="notification-heading">Barak Obama</div>
													<div class="notification-timestamp">08 Hours ago</div>
													<div class="notification-text">Hi Teddy, Just wanted to let you ...
													</div>
												</div>
											</a>
										</li>
										<li>
											<a href="javascript:void()">
												<img class="float-left mr-3 avatar-img" src="images/avatar/4.jpg" alt="">
												<div class="notification-content">
													<div class="notification-heading">Hilari Clinton</div>
													<div class="notification-timestamp">08 Hours ago</div>
													<div class="notification-text">Hello</div>
												</div>
											</a>
										</li>
									</ul>

								</div>
							</div>
						</li>
						<li class="icons dropdown"><a href="javascript:void(0)" data-toggle="dropdown">
								<i class="mdi mdi-bell-outline"></i>
								<span class="badge badge-pill gradient-2 badge-primary">3</span>
							</a>
							<div class="drop-down animated fadeIn dropdown-menu dropdown-notfication">
								<div class="dropdown-content-heading d-flex justify-content-between">
									<span class="">2 New Notifications</span>

								</div>
								<div class="dropdown-content-body">
									<ul>
										<li>
											<a href="javascript:void()">
												<span class="mr-3 avatar-icon bg-success-lighten-2"><i class="icon-present"></i></span>
												<div class="notification-content">
													<h6 class="notification-heading">Events near you</h6>
													<span class="notification-text">Within next 5 days</span>
												</div>
											</a>
										</li>
										<li>
											<a href="javascript:void()">
												<span class="mr-3 avatar-icon bg-danger-lighten-2"><i class="icon-present"></i></span>
												<div class="notification-content">
													<h6 class="notification-heading">Event Started</h6>
													<span class="notification-text">One hour ago</span>
												</div>
											</a>
										</li>
										<li>
											<a href="javascript:void()">
												<span class="mr-3 avatar-icon bg-success-lighten-2"><i class="icon-present"></i></span>
												<div class="notification-content">
													<h6 class="notification-heading">Event Ended Successfully</h6>
													<span class="notification-text">One hour ago</span>
												</div>
											</a>
										</li>
										<li>
											<a href="javascript:void()">
												<span class="mr-3 avatar-icon bg-danger-lighten-2"><i class="icon-present"></i></span>
												<div class="notification-content">
													<h6 class="notification-heading">Events to Join</h6>
													<span class="notification-text">After two days</span>
												</div>
											</a>
										</li>
									</ul>

								</div>
							</div>
						</li>
						<li class="icons dropdown d-none d-md-flex">
							<a href="javascript:void(0)" class="log-user">
								<span>Hello, <?php echo $CanRegister['FirstName'] ?>
									<?php echo $CanRegister['LastName'] ?></span>
							</a>
						</li>
						<li class="icons dropdown">
							<div class="user-img c-pointer position-relative" data-toggle="dropdown">
								<span class="activity active"></span>
								<img src="<?php echo base_url() ?>assets/template/images/avatar/no-photo.PNG" height="40" width="40" alt="">
							</div>
							<div class="drop-down dropdown-profile   dropdown-menu">
								<div class="dropdown-content-body">
									<ul>
										<li>
											<a href="Profile"><i class="icon-user"></i>
												<span>Profile</span></a>
										</li>
										<li>
											<a href="Setting"><i class="fa fa-cog"></i>
												<span>Account Setting</span></a>
										</li>
										<li>
											<a href="Message"><i class="icon-envelope-open"></i>
												<span>Inbox</span>
												<div class="badge gradient-3 badge-pill badge-primary">3</div>
											</a>
										</li>

										<hr class="my-2">
										<li>
											<a href="#"><i class="icon-lock"></i> <span>Lock
													Screen</span></a>
										</li>
										<li><a href="<?= base_url(); ?>Login/Logout_user"><i class="icon-key"></i>
												<span>Sign Out</span></a>
										</li>
									</ul>
								</div>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<!--**********************************
            Header end ti-comment-alt
        ***********************************-->

		<!--**********************************
            Sidebar start
        ***********************************-->
		<div class="nk-sidebar">
			<div class="nk-nav-scroll">
				<ul class="metismenu" id="menu">
					<li class="mega-menu mega-menu-sm">
						<a class="Job_Board" href="Job_Board" aria-expanded="false">
							<i class="fa fa-search"></i><span class="nav-text">Job Board</span>
						</a>
					</li>
					<li>
						<a class="" href="Profile" aria-expanded="false">
							<i class="icon-user menu-icon"></i><span class="nav-text">Profile</span>
						</a>
					</li>
					<li>
						<a class="" href="Applications" aria-expanded="false">
							<i class="fa fa-folder"></i><span class="nav-text">Applications</span>
						</a>
					</li>
					<li>
						<a class="" href="Message" aria-expanded="false">
							<i class="fa fa-comments-o"></i> <span class="nav-text">Message</span>
						</a>
					</li>
					<li>
						<a class="" href="Saved_Job" aria-expanded="false">
							<i class="fa fa-heart"></i><span class="nav-text">Saved Jobs</span>
						</a>
					</li>
				</ul>
			</div>
		</div>
		<!--**********************************
            Sidebar end
        ***********************************-->

		<!--**********************************
            Content body start
        ***********************************-->
		<div class="content-body" style="overflow: auto;">
			<div class="container">
				<div class="row clearfix">
					<div class="col-lg-12">
						<div class="card chat-app">
							<div id="plist" class="people-list">
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text"><i class="fa fa-search"></i></span>
									</div>
									<input type="text" class="form-control" placeholder="Search...">
								</div>
								<ul class="list-unstyled chat-list mt-2 mb-0">
									<li class="clearfix">
										<img src="<?php echo base_url() ?>assets/template/images/logo_jne.png" height="40px" alt="avatar">
										<div class="about">
											<div class="name">JNE Express</div>
											<div class="status"> <i class="fa fa-circle offline"></i> left 7 mins ago
											</div>
										</div>
									</li>
								</ul>
							</div>

							<div class="chat">
								<div class="chat-header clearfix">
									<div class="row">
										<div class="col-lg-6">
											<a href="javascript:void(0);" data-toggle="modal" data-target="#view_info">
												<img src="<?php echo base_url() ?>assets/template/images/logo_jne.png" height="30px" width="40px" alt="avatar">
											</a>
											<div class="chat-about">
												<h4 class="m-b-0">JNE Express</h4>
												<p /&#10004; milk<br/&#10004; butter<br/&#10004; bread</p>
													<!-- <small>Last seen: 2 hours ago</small> -->
											</div>
										</div>
										<div class="col-lg-6 hidden-sm text-right">
											<a href="javascript:void(0);" class="btn btn-outline-secondary"><i class="fa fa-camera"></i></a>
											<a href="javascript:void(0);" class="btn btn-outline-primary"><i class="fa fa-image"></i></a>
											<a href="javascript:void(0);" class="btn btn-outline-info"><i class="fa fa-cogs"></i></a>
											<a href="javascript:void(0);" class="btn btn-outline-warning"><i class="fa fa-question"></i></a>
										</div>
									</div>
								</div>
								<?php foreach ($Message as $msg) : ?>
									<div class="chat-history">
										<ul class="m-b-0">
											<li class="clearfix">
												<div class="message-data text-right">
													<span class="message-data-time"><?php echo $msg['CreateDate'] ?></span>
													<img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="avatar">
												</div>
												<div class="message other-message float-right">
													<?php echo $msg['MessageDescryption'] ?></div>
											</li>
											<!-- <li class="clearfix">
                                            <div class="message-data">
                                                <span class="message-data-time">10:15 AM, Today</span>
                                            </div>
                                            <div class="message my-message">Project has been already finished and I have
                                                results to show you.</div>
                                        </li> -->
										</ul>
									</div>
								<?php endforeach; ?>
								<div class="chat-message clearfix">
									<form method="post" action="message/send_message">
										<div class="input-group mb-0">
											<!-- <div class="input-group-prepend">
											<span class="input-group-text"><i class="fa fa-send"></i></span>
											<input class="btn btn-success" type="submit" value="Send">
										</div> -->
											<input type="hidden" class="form-control" name="CanProfileId">
											<input type="text" class="form-control" placeholder="Enter text here..." name="MessageDescryption" required>
											<input class="btn btn-success" type="submit" value="Send">
										</div>
									</form>
								</div>
								<!-- <div class="row">
									<div class="col-md-12 ">
										<form method="post" action="chat/kirim">
											<div class="col-md-12">
												<div class="input-group">
													<input type="text" name="pesan" class="form-control" placeholder="Masukan Teks" required>
													<span class="input-group-btn">
														<input class="btn btn-success" type="submit" value="Send">
													</span>
												</div>
											</div>
										</form>
									</div>
								</div> -->
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>
		<!--**********************************
            Content body end
        ***********************************-->
		<style>
			.card {
				background: #fff;
				/* transition: .5s;
            border: 0; */
				position: fixed;
				width: 84%;
				box-shadow: 0 1px 2px 0 rgb(0 0 0 / 10%);
				margin-left: -69px;
				margin-top: 82px;
			}

			.chat-app .people-list {
				width: 280px;
				position: absolute;
				left: 0;
				top: 0;
				padding: 20px;
				z-index: 7
			}

			.chat-app .chat {
				margin-left: 280px;
				border-left: 1px solid #eaeaea
			}

			.people-list {
				-moz-transition: .5s;
				-o-transition: .5s;
				-webkit-transition: .5s;
				transition: .5s
			}

			.people-list .chat-list li {
				padding: 10px 15px;
				list-style: none;
				border-radius: 3px
			}

			.people-list .chat-list li:hover {
				background: #efefef;
				cursor: pointer
			}

			.people-list .chat-list li.active {
				background: #efefef
			}

			.people-list .chat-list li .name {
				font-size: 15px
			}

			.people-list .chat-list img {
				width: 45px;
				border-radius: 50%
			}

			.people-list img {
				float: left;
				border-radius: 50%
			}

			.people-list .about {
				float: left;
				padding-left: 8px
			}

			.people-list .status {
				color: #999;
				font-size: 13px
			}

			.chat .chat-header {
				padding: 15px 20px;
				border-bottom: 2px solid #f4f7f6
			}

			.chat .chat-header img {
				float: left;
				border-radius: 40px;
				width: 40px
			}

			.chat .chat-header .chat-about {
				float: left;
				padding-left: 10px
			}

			.chat .chat-history {
				padding: 20px;
				border-bottom: 2px solid #fff
			}

			.chat .chat-history ul {
				padding: 0
			}

			.chat .chat-history ul li {
				list-style: none;
				margin-bottom: 30px
			}

			.chat .chat-history ul li:last-child {
				margin-bottom: 0px
			}

			.chat .chat-history .message-data {
				margin-bottom: 15px
			}

			.chat .chat-history .message-data img {
				border-radius: 40px;
				width: 40px
			}

			.chat .chat-history .message-data-time {
				color: #434651;
				padding-left: 6px
			}

			.chat .chat-history .message {
				color: #444;
				padding: 18px 20px;
				line-height: 26px;
				font-size: 16px;
				border-radius: 7px;
				display: inline-block;
				position: relative
			}

			.chat .chat-history .message:after {
				bottom: 100%;
				left: 7%;
				border: solid transparent;
				content: " ";
				height: 0;
				width: 0;
				position: absolute;
				pointer-events: none;
				border-bottom-color: #fff;
				border-width: 10px;
				margin-left: -10px
			}

			.chat .chat-history .my-message {
				background: #efefef
			}

			.chat .chat-history .my-message:after {
				bottom: 100%;
				left: 30px;
				border: solid transparent;
				content: " ";
				height: 0;
				width: 0;
				position: absolute;
				pointer-events: none;
				border-bottom-color: #efefef;
				border-width: 10px;
				margin-left: -10px
			}

			.chat .chat-history .other-message {
				background: #e8f1f3;
				text-align: right
			}

			.chat .chat-history .other-message:after {
				border-bottom-color: #e8f1f3;
				left: 93%
			}

			.chat .chat-message {
				padding: 20px
			}

			.online,
			.offline,
			.me {
				margin-right: 2px;
				font-size: 8px;
				vertical-align: middle
			}

			.online {
				color: #86c541
			}

			.offline {
				color: #e47297
			}

			.me {
				color: #1d8ecd
			}

			.float-right {
				float: right
			}

			.clearfix:after {
				visibility: hidden;
				display: block;
				font-size: 0;
				content: " ";
				clear: both;
				height: 0
			}

			@media only screen and (max-width: 767px) {
				.chat-app .people-list {
					height: 465px;
					width: 100%;
					overflow-x: auto;
					background: #fff;
					left: -400px;
					display: none
				}

				.chat-app .people-list.open {
					left: 0
				}

				.chat-app .chat {
					margin: 0
				}

				.chat-app .chat .chat-header {
					border-radius: 0.55rem 0.55rem 0 0
				}

				.chat-app .chat-history {
					height: 300px;
					overflow-x: auto
				}
			}

			@media only screen and (min-width: 768px) and (max-width: 992px) {
				.chat-app .chat-list {
					height: 650px;
					overflow-x: auto
				}

				.chat-app .chat-history {
					height: 600px;
					overflow-x: auto
				}
			}

			@media only screen and (min-device-width: 768px) and (max-device-width: 1024px) and (orientation: landscape) and (-webkit-min-device-pixel-ratio: 1) {
				.chat-app .chat-list {
					height: 480px;
					overflow-x: auto
				}

				.chat-app .chat-history {
					height: calc(100vh - 350px);
					overflow-x: auto
				}









			}
		</style>
	</div>
	<!--**********************************
        Main wrapper end
    ***********************************-->


	<!--**********************************
        Scripts
    ***********************************-->
	<script src="<?php echo base_url() ?>assets/template/plugins/common/common.min.js"></script>
	<script src="<?php echo base_url() ?>assets/template/js/custom.min.js"></script>
	<script src="<?php echo base_url() ?>assets/template/js/settings.js"></script>
	<script src="<?php echo base_url() ?>assets/template/js/gleek.js"></script>
	<script src="<?php echo base_url() ?>assets/template/js/styleSwitcher.js"></script>

</body>

</html>

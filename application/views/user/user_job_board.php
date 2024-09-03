<!DOCTYPE html>
<html>
<head>
    <title>Your Jobseeker App</title>
    <link href="<?php echo base_url() ?>assets/template_home/theme/plugins/bootstrap/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo base_url() ?>assets/template_home/theme/plugins/bootstrap/bootstrap-slider.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/template_home/theme/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/template_home/theme/plugins/slick/slick.css" rel="stylesheet">
	<link href="<?php echo base_url() ?>assets/template_home/theme/plugins/slick/slick-theme.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/template_home/theme/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/template_home/theme/css/user-custom.css">
</head>
<body>
    <!-- Header -->
    <header class="header">
        <div class="header-left">
            <button class="toggle-sidebar" onclick="toggleSidebar()">&#9776;</button>
            <a href="#" class="logo">Your Logo</a>
        </div>
        <div class="header-right">
            <button class="icon-btn"><i class="fa fa-envelope-o"></i></button>
            <button class="icon-btn"><i class="fa fa-bell-o"></i></button>
            <div class="profile">
                <img src="<?php echo base_url() ?>assets/template/images/avatar/no-photo.PNG" alt="Profile Picture" class="profile-picture">
                <button class="profile-name" onclick="toggleDropdown()"><?= $CanRegister['FirstName'] . ' ' . $CanRegister['LastName'] ?></button>
                <div class="dropdown" id="profile-dropdown">
                    <a href="#"><i class="fa fa-user"></i><span>Profile</span></a>
                    <a href="#"><i class="fa fa-cog"></i><span>Account Settings</span></a>
                    <a href="#"><i class="fa fa-sign-out"></i><span>Logout</span></a>
                </div>
            </div>
        </div>
    </header>

    <div class="content-wrapper">
        <!-- Sidebar -->
        <aside class="sidebar show-sidebar" id="sidebar">
            <nav class="sidebar-nav">
                <a href="#"><i class="fa fa-search"></i><span>Job Board</span></a>
                <a href="#"><i class="fa fa-user"></i><span>Profile</span></a>
                <a href="#"><i class="fa fa-folder"></i><span>Applications</span></a>
                <a href="#"><i class="fa fa-comments-o"></i><span>Messages</span></a>
                <a href="#"><i class="fa fa-heart"></i><span>Saved Jobs</span></a>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="content">
            <!-- Your main content here -->
        </main>
    </div>

    <script>
        // Function to toggle sidebar
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('show-sidebar');

            const content = document.querySelector('.content');
            content.classList.toggle('show-sidebar');
        }

        // Function to toggle profile dropdown
        function toggleDropdown() {
            const dropdown = document.getElementById('profile-dropdown');
            dropdown.classList.toggle('show-dropdown');
        }

        // Close dropdown when clicking outside
        window.onclick = function(event) {
            if (!event.target.matches('.profile-name')) {
                const dropdown = document.getElementById('profile-dropdown');
                if (dropdown.classList.contains('show-dropdown')) {
                    dropdown.classList.remove('show-dropdown');
                }
            }
        }
    </script>
</body>
</html>
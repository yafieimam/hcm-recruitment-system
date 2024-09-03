<!DOCTYPE html>

<!--
 // WEBSITE: https://themefisher.com
 // TWITTER: https://twitter.com/themefisher
 // FACEBOOK: https://www.facebook.com/themefisher
 // GITHUB: https://github.com/themefisher/
-->

<html lang="en">

<head>
    <!-- ** Basic Page Needs ** -->
    <meta charset="utf-8" />
    <title>Login Administrator</title>

    <!-- ** Mobile Specific Metas ** -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="Agency HTML Template" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0" />
    <meta name="author" content="Themefisher" />
    <meta name="generator" content="Themefisher Classified Marketplace Template v1.0" />

    <!-- favicon -->
    <link href="<?php echo base_url() ?>assets/template_home/theme/images/logoJNE.png" rel="shortcut icon" />

    <!--
  Essential stylesheets
  =====================================-->
    <link href="<?php echo base_url() ?>assets/template_home/theme/plugins/bootstrap/bootstrap.min.css"
        rel="stylesheet" />
    <link href="<?php echo base_url() ?>assets/template_home/theme/plugins/bootstrap/bootstrap-slider.css"
        rel="stylesheet" />
    <link href="<?php echo base_url() ?>assets/template_home/theme/plugins/font-awesome/css/font-awesome.min.css"
        rel="stylesheet" />
    <link href="<?php echo base_url() ?>assets/template_home/theme/plugins/slick/slick.css" rel="stylesheet" />
    <link href="<?php echo base_url() ?>assets/template_home/theme/plugins/slick/slick-theme.css" rel="stylesheet" />
    <link href="<?php echo base_url() ?>assets/template_home/theme/plugins/jquery-nice-select/css/nice-select.css"
        rel="stylesheet" />

    <link href="<?php echo base_url() ?>assets/template_home/theme/css/style.css" rel="stylesheet" />
</head>

<body class="body-wrapper">
    <header>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <nav class="navbar navbar-expand-lg navbar-light navigation">
                        <a class="navbar-brand" href="#">
                            <img src="<?php echo base_url() ?>assets/template_home/theme/images/logoJNE.png" alt=""
                                style="width: 120px;" />
                        </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <!-- <ul class="navbar-nav ml-auto mt-10">
                                <li class="nav-item">
                                    <a class="nav-link login-button"
                                        href="<?= base_url(); ?>Register/register_user">Sign Up</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-white add-button"
                                        href="<?= base_url(); ?>Login/login_user">Sign In</a>
                                </li>
                            </ul> -->
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>

    <section class="login py-5 border-top-1">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-8 align-item-center">
                    <div class="border">
                        <h3 class="bg-gray p-4" style="text-align: center;">Login Administrator</h3>
                        <form method="POST" id="login-form" action="login_administrator">
                            <fieldset class="p-4">
                                <input class="form-control mb-3" type="text" name="Username" placeholder="Username"
                                    id="username" required />
                                <input class="form-control mb-3" type="password" name="password" id="password"
                                    placeholder="Password" required />
                                <div class="loggedin-forgot">
                                    <input type="checkbox" id="keep-me-logged-in" />
                                    <label for="keep-me-logged-in" class="pt-3 pb-2">Keep me logged in</label>
                                </div>
                                <button class="btn btn-danger btn-lg btn-block font-weight-bold mt-3"
                                    type="submit">Login</button>
                                <!-- <button type="submit" name="signin" id="signin"
                                    class="btn btn-danger btn-lg btn-block font-weight-bold mt-3"> <a
                                        href="Administrator">Sign In</a>
                                </button> -->
                                <!-- <button type="submit"
                                    class="btn btn-outline-danger btn-lg btn-block font-weight-bold mt-3"><i
                                        class="fa fa-google bigger-300"> Sign In with Google</i>
                                </button> -->
                                <!-- <a class="mt-3 d-block text-primary" href="#!">Forget Password?</a> -->
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--============================
=            Footer            =
=============================-->
    <!-- Footer Bottom -->
    <footer class="footer-bottom">
        <!-- Container Start -->
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center mb-3 mb-lg-0">
                    <!-- Copyright -->
                    <div class="copyright">
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
            </div>
        </div>
        <!-- Container End -->
        <!-- To Top -->
        <div class="scroll-top-to">
            <i class="fa fa-angle-up"></i>
        </div>
        </f ooter>

        <!--
Essential Scripts
=====================================-->
        <script src="plugins/jquery/jquery.min.js"></script>
        <script src="plugins/bootstrap/popper.min.js"></script>
        <script src="plugins/bootstrap/bootstrap.min.js"></script>
        <script src="plugins/bootstrap/bootstrap-slider.js"></script>
        <script src="plugins/tether/js/tether.min.js"></script>
        <script src="plugins/raty/jquery.raty-fa.js"></script>
        <script src="plugins/slick/slick.min.js"></script>
        <script src="plugins/jquery-nice-select/js/jquery.nice-select.min.js"></script>
        <!-- google map -->
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcABaamniA6OL5YvYSpB3pFMNrXwXnLwU" defer>
        </script>
        <script src="plugins/google-map/map.js" defer></script>

        <script src="js/script.js"></script>
</body>

</html>

<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>A-PAKER | LOGIN</title>

    <link rel="icon" type="image/png" href="<?= base_url(); ?>assets/pati1.png" />

   
    <link rel="stylesheet"
        href="<?= base_url(); ?>assets/login/fonts/material-icon/css/material-design-iconic-font.min.css">

    <link rel="stylesheet" href="<?= base_url(); ?>assets/login/css/style.css">

   
    <script src="<?= base_url() ?>node_modules/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body>
    <?php if ($this->session->flashdata('success_log_out')) { ?>
    <script>
    swal({
        title: "Success!",
        text: "Anda Berhasil Log Out!",
        icon: "success"
    });
    </script>
    <?php } ?>

    <?php if ($this->session->flashdata('input')) { ?>
    <script>
    swal({
        title: "Berhasil Terdaftar!",
        text: "Silahkan Anda Login!",
        icon: "success"
    });
    </script>
    <?php } ?>
    <?php if ($this->session->flashdata('eror')) { ?>
    <script>
    swal({
        title: "Eror!",
        text: "Terjadi Kesalahan Dalam Proses data!",
        icon: "error"
    });
    </script>
    <?php } ?>

    <?php if ($this->session->flashdata('loggin_err_no_user')) { ?>
    <script>
    swal({
        title: "Error!",
        text: "Anda Belum Terdaftar!",
        icon: "error"
    });
    </script>
    <?php } ?>

    <?php if ($this->session->flashdata('loggin_err_pass')) { ?>
    <script>
    swal({
        title: "Error!",
        text: "Password Yang Anda Masukan Salah!",
        icon: "error"
    });
    </script>
    <?php } ?>

    <?php if ($this->session->flashdata('loggin_err_no_access')) { ?>
    <script>
    swal({
        title: "Error!",
        text: "Anda Belum Memiliki Akses!",
        icon: "error"
    });
    </script>
    <?php } ?>

    <?php if ($this->session->flashdata('loggin_err')) { ?>
    <script>
    swal({
        title: "Error!",
        text: "Sesi Anda Habis!",
        icon: "error"
    });
    </script>
    <?php } ?>

    <div class="main">
       
        <section class="sign-in">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="<?= base_url(); ?>assets/login/images/login.jpg" alt="sing up image">
                        </figure>
                        <a href="<?= base_url(); ?>Register/register_perusahaan" class="signup-image-link">Buat Akun
                            Perusahaan</a>
                    </div>

                    <div class="signin-form">
                        <h2 class="form-title">Sign up</h2>
                        <form method="POST" class="register-form" id="login-form"
                            action="<?= base_url(); ?>Login/proses_perusahaan">
                            <div class="form-group">
                                <label for="username"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="username" id="username" placeholder="Your Name" />
                            </div>
                            <div class="form-group">
                                <label for="password"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" id="password" placeholder="Password" />
           
           
      </div
>




           
                 <div class="form-group form-button">
                                <input type="submit" name="signin" id="signin" class="form-submit" value="Log in" />
           
           
      </div
>




                        </form>




           



         </
div>






                </div>
           
 </div>
        </section>

    </div>


    <script src="<?= base_url(); ?>assets/login/vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url(); ?>assets/login/js/main.js"></script>
</body>

</html> -->
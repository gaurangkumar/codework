<!DOCTYPE html>
<?php
/**
 * CodeWork : Freelancing Platform
 * Copyright (c) CodeWork (https://github.com/gaurangkumar/codework)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @package       CodeWork
 * @copyright     Copyright (c) CodeWork (https://github.com/gaurangkumar/codework)
 * @link          
 * @since         1.0.0
 * @license       MIT License (https://opensource.org/licenses/mit-license.php)
 * @auther        GaurangKumar Parmar <gaurangkumarp@gmail.com>
 *                Vivek Patel
 *                Priya Patel
 * @filename      index.php
 * @begin         2018-12-21
 * @update        2018-12-26
 */

require("include/config.php");
require("include/db.php");
?>
<html lang="en">

<head>
    
    <meta charset="utf-8">
	<meta content="IE=11.0000" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Login</title>

	<link href="<?=$favicon?>" rel="shortcut icon">
	<link href="<?=$favicon?>" rel="icon" type="image/x-icon" />

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
    <link href="vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">

    <!-- page css -->
    <link href="asset/dist/css/pages/login-register-lock.css" rel="stylesheet">
    
    <!-- page css -->
    <link href="asset/dist/css/pages/file-upload.css" rel="stylesheet">
    
    <!-- Custom CSS -->
    <link href="asset/css/stylish-portfolio.min.css" rel="stylesheet">
    <style>
    .navbar-brand {
        font-size: 24px;
        text-shadow: 1px 1px 2px #FFFFFF, 0 0 1em #005500, 0 0 0.2em blue;
    }
    .nav-link {
        font-size: 20px;
        text-shadow: 1px 1px 2px #FFFFFF, 0 0 1em #005500, 0 0 0.2em blue;
    }
    .btn-rounded{border-radius:60px;padding:7px 18px}.btn-group-lg>.btn-rounded.btn,.btn-rounded.btn-lg{padding:.75rem 1.5rem}.btn-group-sm>.btn-rounded.btn,.btn-rounded.btn-sm{padding:.25rem .5rem;font-size:12px}.btn-rounded.btn-xs{padding:.25rem .5rem;font-size:10px}.btn-rounded.btn-md{padding:12px 35px;font-size:16px}
    .form-material .form-group{overflow:hidden}.form-material .form-control{background-color:rgba(0, 0, 0, 0);background-position:center bottom, center calc(100% - 1px);background-repeat:no-repeat;background-size:0 2px, 100% 1px;padding:0;-webkit-transition:background 0s ease-out 0s;-o-transition:background 0s ease-out 0s;transition:background 0s ease-out 0s}.form-material .form-control,.form-material .form-control.focus,.form-material .form-control:focus{background-image:-webkit-gradient(linear, left top, left bottom, from(#fb9678), to(#fb9678)), -webkit-gradient(linear, left top, left bottom, from(#e9ecef), to(#e9ecef));background-image:-webkit-linear-gradient(#fb9678, #fb9678), -webkit-linear-gradient(#e9ecef, #e9ecef);background-image:-o-linear-gradient(#fb9678, #fb9678), -o-linear-gradient(#e9ecef, #e9ecef);background-image:linear-gradient(#fb9678, #fb9678), linear-gradient(#e9ecef, #e9ecef);border:0 none;border-radius:0;-webkit-box-shadow:none;box-shadow:none;float:none}.form-material .form-control.focus,.form-material .form-control:focus{background-size:100% 2px, 100% 1px;outline:0 none;-webkit-transition-duration:0.3s;-o-transition-duration:0.3s;transition-duration:0.3s}
    .form-control-line .form-group {
        overflow:hidden
    }
    .form-control-line .form-control {
        border:0px;
        border-radius:0px;
        padding-left:0px;
        border-bottom:1px solid #e9ecef
    }
    .form-control-line .form-control:focus {
        border-bottom:1px solid #fb9678
    }
    </style>


</head>

<body id="page-top">

    <!-- Navigation -->
    <a class="menu-toggle rounded" href="#">
      <i class="fa fa-bars"></i>
    </a>
    <nav id="sidebar-wrapper">
      <ul class="sidebar-nav">
        <li class="sidebar-brand">
          <a class="js-scroll-trigger" href="#page-top"><?=$site?></a>
        </li>
        <li class="sidebar-nav-item">
          <a class="js-scroll-trigger" href="#page-top">Home</a>
        </li>
        <li class="sidebar-nav-item">
          <a class="js-scroll-trigger" href="#about">About</a>
        </li>
        <li class="sidebar-nav-item">
          <a class="js-scroll-trigger" href="#services">Services</a>
        </li>
        <li class="sidebar-nav-item">
          <a class="js-scroll-trigger" href="#portfolio">Portfolio</a>
        </li>
        <li class="sidebar-nav-item">
          <a class="js-scroll-trigger" href="#contact">Contact</a>
        </li>
      </ul>
    </nav>

    <nav class="col-2 navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
      <div class="">
        <a class="navbar-brand js-scroll-trigger" href="#page-top"><?=$site?></a>
      </div>
    </nav>

    <header class="masthead">
        <div class="container text-center">
            <!--<h2 class="mx-auto mb-5"></h2>-->
            <div class="login-box card">
                <div class="card-body">
                    <form class="form-horizontal form-material" id="signupform" action="include/signup-process.php" method="post">
                        <h3 class="text-center m-b-20">Sign Up</h3>
                        <div class="form-group">
                            <label class="col-form-label"><?=@$_GET['msg']?></label>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <input type="text" id="name" name="name" class="form-control form-control-line" placeholder="Name" required="" value="">
                                <span class="help-block text-muted">
                                    <small></small>
                                </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <input type="email" id="email" name="email" class="form-control form-control-line" placeholder="Email" required="" value="">
                                <span class="help-block text-muted">
                                    <small></small>
                                </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <input type="password" id="password" name="password" class="form-control form-control-line" placeholder="Password" required="" value="">
                                <span class="help-block text-muted">
                                    <small></small>
                                </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <input type="password" id="cpassword" name="cpassword" class="form-control form-control-line" placeholder="Confirm Password" required="" value="">
                                <span class="help-block text-muted">
                                    <small></small>
                                </span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck1">
                                    <label class="custom-control-label" for="customCheck1">I agree to all <a href="javascript:void(0)">Terms</a></label> 
                                </div> 
                            </div>
                        </div>
                        <div class="form-group text-center p-b-20">
                            <div class="col-xs-12">
                                <button class="btn btn-info btn-lg btn-block btn-rounded text-uppercase waves-effect waves-light" type="submit">Sign Up</button>
                            </div>
                        </div>
                        <div class="form-group m-b-0">
                            <div class="col-sm-12 text-center">
                                Already have an account? <a href="login.php" class="text-info m-l-5"><b>Login</b></a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </header>

    <!-- Footer -->
    <footer class="footer text-center">
        <div class="container">
        <ul class="list-inline mb-5">
          <li class="list-inline-item">
            <a class="social-link rounded-circle text-white mr-3" href="https://twitter.com/gaurangkumarp">
              <i class="icon-social-facebook"></i>
            </a>
          </li>
          <li class="list-inline-item">
            <a class="social-link rounded-circle text-white mr-3" href="https://www.facebook.com/gaurangkumarp">
              <i class="icon-social-twitter"></i>
            </a>
          </li>
          <li class="list-inline-item">
            <a class="social-link rounded-circle text-white" href="https://github.com/gaurangkumar/codework">
              <i class="icon-social-github"></i>
            </a>
          </li>
        </ul>
        <p class="text-muted small mb-0">Copyright &copy; Your Website 2018</p>
      </div>
    </footer>

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded js-scroll-trigger" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Bootstrap tether Core JavaScript -->
    <script src="vendor/popper/popper.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="asset/js/stylish-portfolio.min.js"></script>

    <script src="asset/js/jqBootstrapValidation.js"></script>
    <script src="asset/js/contact_me.js"></script>

    <!-- Custom Theme JavaScript -->
    <script>
    // Closes the sidebar menu
    $("#menu-close").click(function(e) {
        e.preventDefault();
        $("#sidebar-wrapper").toggleClass("active");
    });

    // Opens the sidebar menu
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#sidebar-wrapper").toggleClass("active");
    });

    // Scrolls to the selected menu item on the page
    $(function() {
        $('a[href*=#]:not([href=#])').click(function() {
            if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') || location.hostname == this.hostname) {

                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                if (target.length) {
                    $('html,body').animate({
                        scrollTop: target.offset().top
                    }, 1000);
                    return false;
                }
            }
        });
    });
    </script>

    <!--Custom JavaScript -->
    <script type="text/javascript">
        $(function() {
            $(".preloader").fadeOut();
        });
        $(function() {
            $('[data-toggle="tooltip"]').tooltip()
        });
        // ============================================================== 
        // Login and Recover Password 
        // ============================================================== 
        $('#to-recover').on("click", function() {
            $("#loginform").slideUp();
            $("#recoverform").fadeIn();
        });
    </script>
</body>
</html>

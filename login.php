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

    <section class="callout">
        <div class="container text-center">
            <!--<h2 class="mx-auto mb-5"></h2>-->
            <div class="row">
                    <div class="col-6 offset-3">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Login</h4>
                                    <form class="form-material m-t-40">
                                    <div class="form-group">
                                        <input type="email" id="example-email2" name="example-email" class="form-control form-control-line" placeholder="Email">
                                        <span class="help-block text-muted">
                                            <small></small>
                                        </span>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" id="password" name="password" class="form-control form-control-line" placeholder="Email">
                                        <span class="help-block text-muted">
                                            <small></small>
                                        </span>
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-block btn-info">Login</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        <div class="login-register">
            <div class="login-box card">
                <div class="card-body">
                    <form class="form-horizontal form-material" id="loginform" action="http://eliteadmin.themedesigner.in/demos/bt4/music/index.html">
                        <h3 class="text-center m-b-20">Sign In</h3>
                        <div class="form-group ">
                            <div class="col-xs-12">
                                <input class="form-control" type="text" required="" placeholder="Username" autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <input class="form-control" type="password" required="" placeholder="Password"> </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <div class="d-flex no-block align-items-center">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck1">
                                        <label class="custom-control-label" for="customCheck1">Remember me</label>
                                    </div> 
                                    <div class="ml-auto">
                                        <a href="javascript:void(0)" id="to-recover" class="text-muted"><i class="fas fa-lock m-r-5"></i> Forgot pwd?</a> 
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group text-center">
                            <div class="col-xs-12 p-b-20">
                                <button class="btn btn-block btn-lg btn-info btn-rounded" type="submit">Log In</button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 m-t-10 text-center">
                                <div class="social">
                                    <button class="btn  btn-facebook" data-toggle="tooltip" title="Login with Facebook"> <i aria-hidden="true" class="fab fa-facebook-f"></i> </button>
                                    <button class="btn btn-googleplus" data-toggle="tooltip" title="Login with Google"> <i aria-hidden="true" class="fab fa-google-plus-g"></i> </button>
                                </div>
                            </div>
                        </div>
                        <div class="form-group m-b-0">
                            <div class="col-sm-12 text-center">
                                Don't have an account? <a href="pages-register.html" class="text-info m-l-5"><b>Sign Up</b></a>
                            </div>
                        </div>
                    </form>
                    <form class="form-horizontal" id="recoverform" action="http://eliteadmin.themedesigner.in/demos/bt4/music/index.html">
                        <div class="form-group ">
                            <div class="col-xs-12">
                                <h3>Recover Password</h3>
                                <p class="text-muted">Enter your Email and instructions will be sent to you! </p>
                            </div>
                        </div>
                        <div class="form-group ">
                            <div class="col-xs-12">
                                <input class="form-control" type="text" required="" placeholder="Email"> </div>
                        </div>
                        <div class="form-group text-center m-t-20">
                            <div class="col-xs-12">
                                <button class="btn btn-primary btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Reset</button>
                            </div>
                        </div>
                    </form>
                    <form action="include/login_process.php" method="post">
            <div class="col-6 form-group offset-3">
                <label class="col-form-label"><?php echo @$_GET['msg'];?></label>   
            </div>
            <div class="col-6 form-group offset-3">
                <input type="email" name="email" class="form-control">   
            </div>
            <div class="col-6 form-group offset-3">
                <input type="password" name="password" class="form-control">   
            </div>
            <div class="col-6 form-group offset-3">
                <button class="btn btn-success">Login</button>
            </div>
        </form>
                </div>
              </div>
        </div>
    </section>

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

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="asset/js/stylish-portfolio.min.js"></script>

    <script src="asset/js/jqBootstrapValidation.js"></script>
    <script src="asset/js/contact_me.js"></script>

    <!-- Bootstrap tether Core JavaScript -->
    <script src="vendor/popper/popper.min.js"></script>
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

</body>
</html>

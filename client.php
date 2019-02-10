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
 * @filename      client.php
 * @begin         2019-02-05
 * @update        2019-02-10
 */

require("include/config.php");
require("include/db.php");

if(!isset($_SESSION['USER_ID']) || empty($_SESSION['USER_ID'])) {
    header("Location: login.php");
    exit;
}
if(!isset($_SESSION['USER_TYPE']) || $_SESSION['USER_TYPE'] != 'client') {
    header("Location: login.php");
    exit;
}
?>
<html lang="en">

<head>
    
    <meta charset="utf-8">
	<meta content="IE=11.0000" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Client - CodeWork</title>

	<link href="<?=$favicon?>" rel="shortcut icon">
	<link href="<?=$favicon?>" rel="icon" type="image/x-icon" />

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">

    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>

    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>

    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

    <link href="vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="asset/css/stylish-portfolio.min.css" rel="stylesheet">
    <style>
        .brand-name {
            font-family: "Kaushan Script"
        }
        .navbar-brand {
            font-size: 24px;
            text-shadow: 1px 1px 2px #FFFFFF, 0 0 1em #005500, 0 0 0.2em blue;
        }
        .nav-link {
            font-size: 20px;
            text-shadow: 1px 1px 2px #FFFFFF, 0 0 1em #005500, 0 0 0.2em blue;
        }
.team-member {
  margin-bottom: 50px;
  text-align: center;
}

.team-member img {
  width: 225px;
  height: 225px;
  border: 7px solid #fff;
}

.team-member h4 {
  margin-top: 25px;
  margin-bottom: 0;
  text-transform: none;
}

.team-member p {
  margin-top: 0;
}
ul.social-buttons {
  margin-bottom: 0;
}

ul.social-buttons li a {
  font-size: 20px;
  line-height: 50px;
  display: block;
  width: 50px;
  height: 50px;
  -webkit-transition: all 0.3s;
  transition: all 0.3s;
  color: white;
  border-radius: 100%;
  outline: none;
  background-color: #212529;
}

ul.social-buttons li a:active, ul.social-buttons li a:focus, ul.social-buttons li a:hover {
  background-color: #fed136;
}
    </style>
</head>

<body id="page-top">

    <!-- Header -->
	<?php
    require("include/header.php");
	?>

    <header class="masthead">
        <div class="container text-center">
            <!--<h2 class="mx-auto mb-5"></h2>-->
            <div class="sinup-box card">
                <div class="card-body">
                    <form class="form-material form-horizontal m-t-40 needs-validation" id="signupForm" action="include/add-user.php" method="post" novalidate enctype="multipart/form-data">
                        <h3 class="text-center m-b-20">Sign Up</h3>
                        <div class="form-group">
                        <?php
                        if(!isset($_SESSION["msg"]) || $_SESSION["msg"] == "") {}
						else{
                        ?>
				        <div class="alert alert-<?=$_SESSION["msg"]["type"]?> alert-dismissable">
					        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					        <?=$_SESSION["msg"]["msg"]?>
				        </div>
                        <?php
                            $_SESSION["msg"]="";
                            unset($_SESSION["msg"]);
                        }
                        ?>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12 text-danger text-left">
                                <input type="text" id="name" name="name" class="form-control form-control-line form-control-success" placeholder="Name" required value="">
                                <div class="invalid-feedback help text-left">
                                    Please enter your full name.
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12 text-danger text-left">
                                <input type="email" id="email" name="email" class="form-control form-control-line" placeholder="Email" required="" value="">
                                <div class="invalid-feedback help text-left">
                                    Please enter your email.
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12 text-danger text-left">
                                <input type="password" id="password" name="password" class="form-control form-control-line" placeholder="Password" required="" value="">
                                <div class="invalid-feedback help text-left">
                                    Please enter your password.
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12 text-danger text-left">
                                <input type="password" id="cpassword" name="cpassword" class="form-control form-control-line" placeholder="Confirm Password" required="" value="">
                                <div class="invalid-feedback help text-left">
                                    Please enter your password again.
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12 text-danger text-left">
                                <select class="form-control form-control-line custom-select" id="usertype" name="usertype" required>
                                    <option value="">User Type </option>
                                    <option value="freelancer">Freelancer</option>
                                    <option value="client">Client</option>
                                </select>
                                <div class="invalid-feedback help text-left">
                                    Please select your user type.
                                </div>
                            </div>
                        </div>
                        <div class="form-group" id="langInput" style="display: none">
                            <div class="col-xs-12 text-danger text-left">
                                <input type="text" id="lang" name="lang" class="form-control form-control-line form-control-success" placeholder="Programming Langauge" required value="">
                                <div class="invalid-feedback help text-left">
                                    Please enter your Programming Langauge.
                                </div>
                            </div>
                        </div>
                        <div class="form-group" id="cvInput" style="display: none">
                            <div class="col-xs-12 text-danger text-left">
                                <label class="pull-left text-primary" for="cv">Resume Upload</label>
                                <input type="file" id="cv" name="cv" class="form-control form-control-line" required>
                                <div class="invalid-feedback help text-left">
                                    Please upload your resume.
                                </div>
                            </div>
                        </div>
                        <div class="form-group" id="idInput" style="display: none">
                            <div class="col-xs-12 text-danger text-left">
                                <label class="pull-left text-primary" for="id">ID-Proof Upload</label>
                                <input type="file" id="id" name="id" class="form-control form-control-line" required>
                                <div class="invalid-feedback help text-left">
                                    Please upload your ID-Proof.
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="agree" name="agree" value="agree" required>
                                    <label class="custom-control-label" for="agree">
                                        I agree to all <a href="javascript:void(0)">Terms</a>
                                    </label>
                                    <div class="invalid-feedback help">
                                        Please agree our policy.
                                    </div>
                                </div>
                                <!--div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="agree" name="agree" value="agree" required>
                                    <label class="custom-control-label" for="agree">I agree to all <a href="javascript:void(0)">Terms</a></label>
                                    <div class="invalid-feedback help">
                                        Please agree our policy.
                                    </div>
                                </div-->
                            </div>
                        </div>
                        <div class="form-group text-center p-b-20">
                            <div class="col-xs-12">
                                <button class="btn btn-info btn-lg btn-block btn-rounded text-uppercase waves-effect waves-light" type="submit" id="signupBtn">Sign Up</button>
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
	<?php
    require("include/footer.php");
	?>

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

<div style='text-align: right;position: fixed;z-index:9999999;bottom: 0; width: 100%;cursor: pointer;line-height: 0;display:block !important;'><a title="Hosted on free web hosting 000webhost.com. Host your own website for FREE." target="_blank" href="https://www.000webhost.com/?utm_source=000webhostapp&amp;utm_campaign=000_logo&amp;utm_medium=website&amp;utm_content=footer_img"><img src="https://cdn.000webhost.com/000webhost/logo/footer-powered-by-000webhost-white2.png"  alt="www.000webhost.com"></a></div>

</body>
</html>
    <script>
    $(document).ready(function(){
        $("[alt='www.000webhost.com']").css("display", "none");
    });
    </script>

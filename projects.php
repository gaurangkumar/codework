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
 * @link          http://codework.ml/
 * @since         1.0.0
 * @license       MIT License (https://opensource.org/licenses/mit-license.php)
 * @auther        GaurangKumar Parmar <gaurangkumarp@gmail.com>
 *                Vivek Patel
 *                Priya Patel
 * @filename      projects.php
 * @begin         2019-03-04
 * @update        2019-03-10
 */

require("include/config.php");
require("include/db.php");

if(!isset($_SESSION['USER_ID']) || empty($_SESSION['USER_ID'])) {
    header("Location: login.php");
    exit;
}
if(!isset($_SESSION['USER_TYPE']) || $_SESSION['USER_TYPE'] != 'freelancer') {
    header("Location: login.php");
    exit;
}
$fid = $_SESSION['USER_ID'];

$pid = (int) @$_GET['pid'];
$result = $mysqli->query("SELECT `pid`, `name`, `detail`, `cost` FROM `post_prj` WHERE `pid` = $pid");
if(!$result->num_rows) {
    exit("No project found.");
}
$row = $result->fetch_assoc();
?>
<html lang="en">

<head>
    
    <meta charset="utf-8">
	<meta content="IE=11.0000" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Projects - CodeWork</title>

	<link href="<?=$favicon?>" rel="shortcut icon">
	<link href="<?=$favicon?>" rel="icon" type="image/x-icon" />

    <!-- Bootstrap Core CSS -->
    <link href="node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

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
    .help {
        font-size: 16px
    }
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

    <!-- Header -->
	<?php
    require("include/header.php");
	?>

    <header class="masthead">
        <div class="container text-center">
            <!--<h2 class="mx-auto mb-5"></h2>-->
            <div class="sinup-box card border-primary">
                <div class="card-header bg-primary">
                    <h3 class="m-0 text-light"><?=ucfirst($row['name'])?></h3>
                </div>
                <div class="card-body text-left">
                    <h4 class="card-title h5">Project Budget (INR)</h4>
                    <p class="card-text"><i class="fa fa-rupee"></i> <?=$row['cost']?></p>
                    <h4 class="card-title h5">Project Description</h4>
                    <p class="card-text"><?=ucfirst($row['detail'])?></p>
                    <h4 class="card-title h5">Bid Proposal</h4>
                    <?php
                    $res = $mysqli->query("SELECT * FROM `post_req` WHERE `fid` = $fid AND `pid` = $pid");
                    if($res->num_rows) {
                        ?>
                        <p class="card-text">Request Sent</p>
                        <?php
                    }
                    else {
                    ?>
                    <form class="form-material form-horizontal m-t-40 needs-validation" id="bidForm" action="include/placebid.php" method="post" novalidate>
                        <input type="hidden" name="pid" value="<?=$row['pid']?>">
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
                                <label for="msg" class="text-info col-form-label">What makes you the best candidate for this project?</label>
                                <textarea rows="5" id="msg" name="msg" class="form-control form-control-line form-control-success" placeholder="Your message" required value=""></textarea>
                                <div class="invalid-feedback help text-left">
                                    Please enter your message.
                                </div>
                            </div>
                        </div>
                        <div class="form-group text-center p-b-20">
                            <div class="col-xs-12">
                                <button class="btn btn-info btn-lg btn-block btn-rounded text-uppercase waves-effect waves-light" type="submit" id="bidBtn">Place Bid</button>
                            </div>
                        </div>
                    </form>
                    <?php
                    }
                    ?>
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
    <script src="/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Bootstrap tether Core JavaScript -->
    <script src="vendor/popper/popper.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="asset/js/stylish-portfolio.min.js"></script>

    <!--Wave Effects -->
    <script src="asset/dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="asset/dist/js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="assets/node_modules/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="assets/node_modules/sparkline/jquery.sparkline.min.js"></script>
    <!--Custom JavaScript -->
    <script src="asset/dist/js/custom.min.js"></script>
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->
    <script src="asset/dist/js/pages/jasny-bootstrap.js"></script>

    <script src="asset/js/jquery.validate.min.js"></script>
    <script>
		$.validator.setDefaults( {
			submitHandler: function () {
                $('#bidBtn').html('Place Bid <div class="spinner-border text-secondary float-right" role="status"><span class="sr-only">Loading...</span></div>');
                $('#bidBtn').attr('disabled','disabled');
                $('#bidForm').attr('disabled','disabled');
                $('#bidForm').addClass('disabled');
                //$('#msg').attr('disabled','disabled');
                $( "#bidForm" ).submit();
				//$( "#btn" ).html('');
                //alert( "submitted!" );
			}
		} );

		$( document ).ready( function () {
            $( "#bidForm" ).validate( {
				rules: {
					msg: {
						required: true,
						minlength: 30
					}
				},
				messages: {
					msg: {
						required: "Please enter your message",
						minlength: "Your message must consist of at least 30 characters"
					}
				},
				errorElement: "em",
				errorPlacement: function ( error, element ) {
					// Add the `help-block` class to the error element
					error.addClass( "help-block" );

					// Add `has-feedback` class to the parent div.form-group
					// in order to add icons to inputs
					element.parents( ".col-xs-12" ).addClass( "has-feedback" );

					if ( element.prop( "type" ) === "checkbox" ) {
						error.insertAfter( element.parent( "label" ) );
					} else {
						error.insertAfter( element );
					}
				},
				success: function ( label, element ) {
					// Add the span element, if doesn't exists, and apply the icon classes to it.
					if ( !$( element ).next( "span" )[ 0 ] ) {
						$( "<span class='glyphicon glyphicon-ok form-control-feedback'></span>" ).insertAfter( $( element ) );
					}
				},
				highlight: function ( element, errorClass, validClass ) {
					$( element ).parents( ".col-xs-12" ).addClass( "has-error" ).removeClass( "has-success" );
					$( element ).next( "span" ).addClass( "glyphicon-remove" ).removeClass( "glyphicon-ok" );
				},
				unhighlight: function (element, errorClass, validClass) {
					$( element ).parents( ".col-xs-12" ).addClass( "has-success" ).removeClass( "has-error" );
					$( element ).next( "span" ).addClass( "glyphicon-ok" ).removeClass( "glyphicon-remove" );
				}
			} );
		} );
	</script>
    
    <!-- Custom Theme JavaScript -->
    <script>
    $('#name').focus(function() {
        $('#success').html('');
    });

    $('#usertype').change(function(e) {
        if($('#usertype').val() == 'freelancer') {
            $("#cvInput").show();
            $("#idInput").show();
            $("#langInput").show();
        }
        else {
            $("#cvInput").hide();
            $("#idInput").hide();
            $("#langInput").hide();
        }
    });

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

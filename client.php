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
 * @filename      client.php
 * @begin         2019-02-05
 * @update        2019-03-07
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
        <div class="container text-center my-auto">
            <h1 class="mb-5 h2">Client Dashboard</h1>
            <a class="btn btn-primary btn-xl" href="#projects">Projects</a>
            <a class="btn btn-primary btn-xl" href="#requests">Requests</a>
            <a class="btn btn-primary btn-xl" href="post.php">Post Project</a>
            <a class="btn btn-primary btn-xl" href="include/logout.php">Logout</a>
        </div>
        <div class="overlay"></div>
    </header>

    <section class="content-section bg-light" id="projects">
        <div class="container-fluid">
            <div class="row text-center">
                <div class="col-lg-12 mx-auto">
                    <h2>Find Work</h2>
                    <p class="lead mb-5"></p>
                </div>
            </div>
            <div class="row">
                <div class="col-12 m-t-30">
                    <h4 class="m-b-0">Search Result For "<?=$lang?>"</h4>
                    <p class="text-muted m-t-0">About <?=$count?> result</p>
                </div>
                <?php
                while($row = $result->fetch_assoc()) {
                ?>
                <div class="col-md-6">
                    <div class="card border-info">
                        <div class="card-body">
                            <h3 class="card-title">
                                <a href="projects.php?pid=<?=$row['pid']?>"><?=ucfirst($row['name'])?></a>
                            </h3>
                            <p class="card-text"><?=substr($row['detail'], 0, 100)?></p>
                            <p class="card-text"><i class="fa fa-rupee"></i> <?=$row['cost']?></p>
                        </div>
                    </div>
                </div>
                <?php
                }
                ?>
            </div>
            <div class="row text-center">
                <div class="col-6 m-t-30 offset-5">
                    <nav aria-label="Page navigation example" class="m-t-40">
                        <ul class="pagination">
                            <li class="page-item disabled">
                                <a class="page-link" href="javascript:void(0)" tabindex="-1">Previous</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="javascript:void(0)">1</a>
                            </li>
                            <li class="page-item disabled">
                                <a class="page-link" href="javascript:void(0)">Next</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <section class="content-section bg-light" id="requests">
        <div class="container-fluid">
            <div class="row text-center">
                <div class="col-lg-12 mx-auto">
                    <h2>Find Work</h2>
                    <p class="lead mb-5"></p>
                </div>
            </div>
            <div class="row">
                <div class="col-12 m-t-30">
                    <h4 class="m-b-0">Search Result For "<?=$lang?>"</h4>
                    <p class="text-muted m-t-0">About <?=$count?> result</p>
                </div>
                <?php
                while($row = $result->fetch_assoc()) {
                ?>
                <div class="col-md-6">
                    <div class="card border-info">
                        <div class="card-body">
                            <h3 class="card-title">
                                <a href="projects.php?pid=<?=$row['pid']?>"><?=ucfirst($row['name'])?></a>
                            </h3>
                            <p class="card-text"><?=substr($row['detail'], 0, 100)?></p>
                            <p class="card-text"><i class="fa fa-rupee"></i> <?=$row['cost']?></p>
                        </div>
                    </div>
                </div>
                <?php
                }
                ?>
            </div>
            <div class="row text-center">
                <div class="col-6 m-t-30 offset-5">
                    <nav aria-label="Page navigation example" class="m-t-40">
                        <ul class="pagination">
                            <li class="page-item disabled">
                                <a class="page-link" href="javascript:void(0)" tabindex="-1">Previous</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="javascript:void(0)">1</a>
                            </li>
                            <li class="page-item disabled">
                                <a class="page-link" href="javascript:void(0)">Next</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </section>

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

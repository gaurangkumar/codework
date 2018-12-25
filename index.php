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
 * @update        2018-12-21
 */

require("include/config.php");
require("include/db.php");
?>
<html lang="en">

<head>
    
    <meta charset="utf-8">
	<meta content="IE=11.0000" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Home</title>

    <meta http-equiv="Content-Language" content="en">
    <meta name="description" content="">
    <meta name="author" content="<?=$web_name?>">
	<meta name="robots" content="index, follow">

	<link href="<?=$favicon?>" rel="shortcut icon">
	<link href="<?=$favicon?>" rel="icon" type="image/x-icon" />
	<link href="<?=SR?>" rel="alternate" hreflang="x-default">
	<link href="<?=SR?>" rel="alternate" hreflang="en">
	<link href="https://www.codework.in/" rel="canonical">
	<link href="https://m.codework.com" rel="alternate" media="only screen and (max-width:640px)">

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
    <link href="vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">

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
          <a class="js-scroll-trigger" href="#page-top"><?=$site_name?></a>
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
        <a class="navbar-brand js-scroll-trigger" href="#page-top"><?=$site_name?></a>
      </div>
    </nav>

    <!-- Header -->
    <header class="masthead d-flex">
      <div class="container text-center my-auto">
        <h1 class="mb-1">
            <img src="<?=$brand_image;?>" alt="logo" width="65" style="margin-top:-10px">
            <?=$site_name?>
        </h1>
        <h3 class="mb-5">
          <em>Get Hire, Get Paid</em>
        </h3>
        <a class="btn btn-primary btn-xl js-scroll-trigger" href="#about" id="about_btn">Find Out More</a>
        <a class="btn btn-primary btn-xl portfolio-link" data-toggle="modal" href="#login" id="login_btn">Login</a>
        <a class="btn btn-primary btn-xl portfolio-link" data-toggle="modal" href="#post" id="post_btn">Post a Project</a>
      </div>
      <div class="overlay"></div>
    </header>

    <!-- About -->
    <section class="content-section bg-light" id="about">
      <div class="container text-center">
        <div class="row">
          <div class="col-lg-10 mx-auto">
            <h2>Perfect Websites Are The Perfect Way For Your Next Project !</h2>
            <p class="lead mb-5">We Build The Way To Your Success..</p>
            <a class="btn btn-dark btn-xl js-scroll-trigger" href="#services">What We Offer</a>
          </div>
        </div>
      </div>
    </section>

    <!-- Services -->
    <section class="content-section bg-primary text-white text-center" id="services">
      <div class="container">
        <div class="content-section-heading">
          <h3 class="text-secondary mb-0">Services</h3>
          <h2 class="mb-5">What We Offer</h2>
        </div>
        <div class="row">
          <div class="col-lg-3 col-md-6 mb-5 mb-lg-0">
            <span class="service-icon rounded-circle mx-auto mb-3">
              <i class="icon-screen-desktop"></i>
            </span>
            <h4>
                <strong>Website Developing</strong>
                <p><strong>Starting from ₹5,000</strong></p>
                <a href="#" class="btn btn-light">Learn More</a>
                <a href="#" class="btn btn-dark">Post Project</a>
            </h4>
            <p class="text-faded mb-0">Looks great on any screen size!</p>
          </div>
          <div class="col-lg-3 col-md-6 mb-5 mb-lg-0">
            <span class="service-icon rounded-circle mx-auto mb-3">
              <i class="icon-pencil"></i>
            </span>
            <h4>
              <strong>Web Design</strong>
              <p><strong>Starting from ₹4,000</strong></p>
              <a href="#" class="btn btn-light">Learn More</a>
              <a href="#" class="btn btn-dark">Post Project</a>
            </h4>
            <p class="text-faded mb-0">Stylish, Creative and Responsive</p>
          </div>
          <div class="col-lg-3 col-md-6 mb-5 mb-md-0">
            <span class="service-icon rounded-circle mx-auto mb-3">
              <i class="icon-like"></i>
            </span>
            <h4>
              <strong>SEO</strong>
              <p><strong>Starting from ₹4,500</strong></p>
              <a href="#" class="btn btn-light">Learn More</a>
              <a href="#" class="btn btn-dark">Post Project</a>
            </h4>
            <p class="text-faded mb-0">Search Engine Optimization</p>
          </div>
          <div class="col-lg-3 col-md-6">
            <span class="service-icon rounded-circle mx-auto mb-3">
              <i class="icon-mustache"></i>
            </span>
            <h4>
              <strong>Logo</strong>
              <p><strong>Starting from ₹2,000</strong></p>
              <a href="#" class="btn btn-light">Learn More</a>
              <a href="#" class="btn btn-dark">Post Project</a>
            </h4>
            <p class="text-faded mb-0">Suitable For Your Business</p>
          </div>
        </div>
      </div>
    </section>

    <!-- Callout -->
    <section class="callout">
      <div class="container text-center">
        <h2 class="mx-auto mb-5">We Love What We Do</h2>
        <!--a class="btn btn-primary btn-xl" href="https://startbootstrap.com/template-overviews/stylish-portfolio/">Download Now!</a-->
      </div>
    </section>

    <!-- Portfolio -->
    <section class="content-section" id="portfolio">
      <div class="container">
        <div class="content-section-heading text-center">
          <h3 class="text-secondary mb-0">Portfolio</h3>
          <h2 class="mb-5">Recent Projects</h2>
        </div>
        <div class="row no-gutters">
          <div class="col-lg-6">
            <a class="portfolio-item" href="#">
              <span class="caption">
                <span class="caption-content">
                  <h2>Stationary</h2>
                  <p class="mb-0">A yellow pencil with envelopes on a clean, blue backdrop!</p>
                </span>
              </span>
              <img class="img-fluid" src="<?=SR?>asset/img/portfolio-1.jpg" alt="">
            </a>
          </div>
          <div class="col-lg-6">
            <a class="portfolio-item" href="#">
              <span class="caption">
                <span class="caption-content">
                  <h2>Ice Cream</h2>
                  <p class="mb-0">A dark blue background with a colored pencil, a clip, and a tiny ice cream cone!</p>
                </span>
              </span>
              <img class="img-fluid" src="<?=SR?>asset/img/portfolio-2.jpg" alt="">
            </a>
          </div>
          <div class="col-lg-6">
            <a class="portfolio-item" href="#">
              <span class="caption">
                <span class="caption-content">
                  <h2>Strawberries</h2>
                  <p class="mb-0">Strawberries are such a tasty snack, especially with a little sugar on top!</p>
                </span>
              </span>
              <img class="img-fluid" src="<?=SR?>asset/img/portfolio-3.jpg" alt="">
            </a>
          </div>
          <div class="col-lg-6">
            <a class="portfolio-item" href="#">
              <span class="caption">
                <span class="caption-content">
                  <h2>Workspace</h2>
                  <p class="mb-0">A yellow workspace with some scissors, pencils, and other objects.</p>
                </span>
              </span>
              <img class="img-fluid" src="<?=SR?>asset/img/portfolio-4.jpg" alt="">
            </a>
          </div>
        </div>
      </div>
    </section>

    <!-- Call to Action -->
    <section class="content-section bg-primary text-white">
      <div class="container text-center">
        <h2 class="mb-4">Feedback Us</h2>
        <hr class="small">
        <div class="row">
            <div class="col-lg-12">
                <form name="sentMessage" id="contactForm" novalidate>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control input-lg" placeholder="Your Name *" id="name" required data-validation-required-message="Please enter your name." style="height: 50px">
                                <p class="help-block text-danger">&nbsp;</p>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control input-lg" placeholder="Your Email *" id="email" required data-validation-required-message="Please enter your email address." style="height: 50px">
                                <p class="help-block text-danger">&nbsp;</p>
                            </div>
                            <div class="form-group">
                                <input type="tel" class="form-control input-lg" placeholder="Your Phone *" id="phone" required data-validation-required-message="Please enter your phone number." style="height: 50px">
                                <p class="help-block text-danger">&nbsp;</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <textarea class="form-control input-lg" placeholder="Your Message *" id="message" required data-validation-required-message="Please enter a message." rows="9"></textarea>
                                <p class="help-block text-danger">&nbsp;</p>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-lg-12 text-center">
                            <div id="success"></div>
                            <button type="submit" class="btn btn-xl btn-light mr-4 btn-block">Send Message</button>
                        </div>
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

    <div class="portfolio-modal modal fade" id="login" tabindex="-1" role="dialog" aria-hidden="true" style="margin-top:1%;position:absolute;">
	    <div class="modal-content">
  	<a class="btn btn-dark btn-lg toggle pull-right" id="login_close">
  		<i class="fa fa-times"></i>
    </a>
    <div class="row">
    	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top:10px;">
				<div class="col-lg-6 col-md-6">
            <div class="col-md-12 col-md-offset-0">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Log In</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" action="prc/check" method="post">
                            <input type="hidden" name="return_url" value="<?php echo $rtn_uri; ?>" />
														<fieldset>
						        					<div class="form-group">
                                	<input class="form-control" placeholder="E-mail" name="email" type="email" autofocus>
                              </div>
                              <div class="form-group">
                                <input class="form-control" placeholder="Password" name="password" type="password" value="">
                              </div>
                              <div class="checkbox">
                                <label>
                                	<input name="remember" type="checkbox" value="Remember Me">Remember Me
                              	</label>
                              </div>
                              <!-- Change this to a button or input when using this as a form -->
															<input type="submit" value="Login" class="btn btn-success btn-lg btn-block">
								            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
			</div>
				<div class="col-lg-6 col-md-6">
        	<div class="col-md-12 col-md-offset-0">
          	<div class="login-panel panel panel-default">
            	<div class="panel-heading">
                <h3 class="panel-title">Sign Up</h3>
              </div>
              <div class="panel-body">
                <form role="form" action="<?php echo SR; ?>prc/add-user" method="post">
                  <input type="hidden" name="return_url" value="<?php echo $rtn_uri; ?>" />
                	<fieldset>
                    <div class="col-lg-6">
											<div class="form-group input-group">
                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                        <input class="form-control" placeholder="First Name" required="" value="" name="fname" type="text">
                      </div>
										</div>
                    <div class="col-lg-6">
											<div class="form-group input-group">
                    		<span class="input-group-addon"><i class="fa fa-user"></i></span>
                    		<input class="form-control" placeholder="Last Name" required="" value="" name="lname" type="text">
                    	</div>
										</div>
                    <div class="col-lg-12">
											<div class="form-group input-group">
                    		<span class="input-group-addon"><i class="fa fa-at"></i></span>
                    		<input class="form-control" placeholder="E-mail" required="" value="" name="email" type="email">
                    	</div>
										</div>
                    <div class="col-lg-12">
											<div class="form-group input-group">
                    		<span class="input-group-addon"><i class="fa fa-user"></i></span>
                    		<input class="form-control" placeholder="User Name" required="" value="" name="username">
                    	</div>
										</div>
                    <div class="col-lg-6">
											<div class="form-group input-group">
                    		<span class="input-group-addon"><i class="fa fa-lock"></i></span>
                    		<input class="form-control" placeholder="Password" required="" name="password" type="password" value="">
                    	</div>
										</div>
                    <div class="col-lg-6">
											<div class="form-group input-group">
                    		<span class="input-group-addon"><i class="fa fa-lock"></i></span>
                    		<input class="form-control" placeholder="Re-Password" required="" name="repassword" type="password" value="">
                    	</div>
										</div>
                    <div class="col-lg-6">
											<div class="form-group input-group">
                    	<?php
												$_SESSION = array();
												include(RT.'simple-php-captcha.php');
												$_SESSION['captcha'] = simple_php_captcha();
												echo '<img class="no_border_img" width=132 src='.$_SESSION['captcha']['image_src'].' title="CAPTCHA" alt="CAPTCHA code"/>';
											?>
											</div>
										</div>
        						<div class="col-lg-6">
											<div class="form-group input-group">
                        <span class="input-group-addon"><i class="fa fa-check"></i></span>
                        <input class="form-control" placeholder="Captcha" required="" name="captcha" type="text" value=""/>
        							</div>
										</div>
        						<div class="col-lg-12">
                      <div class="checkbox">
                        <label>
                          <input name="remember" type="checkbox" value="Remember Me">Remember Me
                        </label>
                      </div>
                    </div>
										<div class="col-lg-12">
                    	<input type="submit" value="Accept Terms &amp; Signup" class="btn btn-lg btn-info btn-block">
                    </div>
									</fieldset>
                </form>
              </div>
            </div>
          </div>
				</div>
    	</div>
    </div>
	</div>
    </div>
    <div class="portfolio-modal modal" id="post1" tabindex="-1" role="dialog" aria-hidden="true" style="margin-top:1%;position:absolute;">
	    <div class="modal-content">
  	<a class="btn btn-dark btn-lg toggle pull-right" id="post_close">
  		<i class="fa fa-times"></i>
    </a>
    <div class="row">
    	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top:10px;">
				<?php if($auth!=true){?>
      	<div class="col-lg-6 col-md-6">
            <div class="col-md-12 col-md-offset-0">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Log In</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" action="prc/check" method="post">
                            <input type="hidden" name="return_url" value="<?php echo $rtn_uri; ?>" />
														<fieldset>
						        					<div class="form-group">
                              	<input class="form-control" placeholder="E-mail" name="post_email" type="email" autofocus >
                              </div>
                              <div class="form-group">
                                <input class="form-control" placeholder="Password" name="post_password" type="password" value="" >
                              </div>
                              <div class="checkbox">
                                <label>
                                	<input name="post_remember" type="checkbox" value="Remember Me">Remember Me
                              	</label>
                              </div>
                              <input type="submit" value="Login" class="btn btn-success btn-lg btn-block">
								            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
				</div>
				<div class="col-lg-6 col-md-6">
        	<div class="col-md-12 col-md-offset-0">
          	<div class="login-panel panel panel-default">
            	<div class="panel-body">
                <div class="col-lg-6">
									<p>Please Login, To Post Your Project</p>
								</div>
              </div>
            </div>
          </div>
				</div>
        <?php }?>
    	</div>
    </div>
	</div>
    </div>
    <div class="portfolio-modal modal fade" id="post" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="close-modal" data-dismiss="modal">
            <div class="lr">
              <div class="rl"></div>
            </div>
          </div>
          <div class="container">
            <div class="row">
              <div class="col-lg-8 mx-auto">
                <div class="modal-body">
                  <!-- Project Details Go Here -->
                  <h2 class="text-uppercase">Project Name</h2>
                  <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                  <img class="img-fluid d-block mx-auto" src="img/portfolio/01-full.jpg" alt="">
                  <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
                  <ul class="list-inline">
                    <li>Date: January 2017</li>
                    <li>Client: Threads</li>
                    <li>Category: Illustration</li>
                  </ul>
                  <button class="btn btn-primary" data-dismiss="modal" type="button">
                    <i class="fas fa-times"></i>
                    Close Project</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded js-scroll-trigger" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>

    <!-- Bootstrap core JavaScript -->
    <script src="<?=SR?>vendor/jquery/jquery.min.js"></script>
    <script src="<?=SR?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="<?=SR?>vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="<?=SR?>asset/js/stylish-portfolio.min.js"></script>

    <script src="<?=CDN?>age/js/jqBootstrapValidation.js"></script>
    <script src="<?=CDN?>age/js/contact_me.js"></script>

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

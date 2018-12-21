<!DOCTYPE html>
<html lang="en">
<?php
	//160620
	session_start();
	require("var.php");
	require(I."db.php");
?>
<head>

	<title>Home - CodeWork</title>

	<meta charset="utf-8">
	<meta content="IE=11.0000" http-equiv="X-UA-Compatible">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta http-equiv="Content-Language" content="en">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="best programmers, web developers, designers at a fraction of the cost on the CodeWork.">
	<meta name="author" content="CodeWork">
	<meta name="robots" content="index, follow">

	<!--<link href="<?php echo SR;?>favicon.ico" rel="shortcut icon">-->
	<link href="<?php echo SR;?>favicon.ico" rel="icon" type="image/x-icon" />
	<link href="<?php echo SR;?>" rel="alternate" hreflang="x-default">
	<link href="<?php echo SR;?>" rel="alternate" hreflang="en">
	<link href="https://www.CodeWork.in/" rel="canonical">
	<link href="https://m.CodeWork.com" rel="alternate" media="only screen and (max-width:640px)">

	<link href="cdn/stl/css/bootstrap.min.css" rel="stylesheet">
	<link href="cdn/stl/css/stylish-portfolio.css" rel="stylesheet">
	<link href="<?php echo ST;?>css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo ST;?>css/stylish-portfolio.css" rel="stylesheet">
	<link href="<?php echo ST;?>font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template -->
    <link href="cdn/age/css/agency.min.css" rel="stylesheet">

    <!-- Custom scripts for this template -->
    <script src="cdn/age/js/agency.min.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->
	
	<style>
	div.background{
		height:302px;
	}
	div.transbox {
  	width: 100%;
  	height: 100%;
  	background-color: #ffffff;
		color:#000000;
		font-size:36px;
		font-weight:bold;
  	border: 1px solid black;
  	opacity:0.6;
  	filter:alpha(opacity=60); /* For IE8 and earlier */
  	display:none;
	}
	div.transbox span {
  	font-weight: bold;
  	color: #000000;
	}
	div.background:hover div.transbox {
  	display:block;
	}
	.scrollToTop {
		background-color: rgb(43, 205, 193);
	}
	.scrollToTop:hover {
		border: 1px solid rgb(43, 205, 193); border-image: none; color: rgb(43, 205, 193);
	}
	.scrollToTop:focus {
		border: 1px solid rgb(43, 205, 193); border-image: none; color: rgb(43, 205, 193);
	}
	.scrollToTop {
		border-radius: 4px; transition:0.5s; width: 50px; height: 50px; text-align: center; right: 50px; bottom: 60px; color: rgb(255, 255, 255); line-height: 45px; font-size: 32px; font-weight: bold; text-decoration: none; display: block; position: fixed; z-index: ; -webkit-transition: all 0.5s; -o-transition: all 0.5s; -moz-transition: all 0.5s;
	}
	.scrollToTop:hover {
		text-decoration: none; background-color: rgb(255, 255, 255);
	}
	.scrollToTop:focus {
		text-decoration: none; background-color: rgb(255, 255, 255);
	}
	.portfolio-modal{
		top:15px;
		width:90%;
		height:500px;
		margin: 0% 5% 0% 5%;
		display:block;
		border:solid rgba(255,255,255,0.00);
		border-radius:10px;
		background:rgba(255,255,255,0.5);
		z-index:10;
		box-shadow:5px 5px 10px 0px;
	}
	#login_section{
		display:none;
	}
	@media (max-width: 1199px) {
		#login_section{
			height:640px;
		}
	}
	@media (max-width: 991px) {
		#login_section{
			height:900px;
		}
	}
	#post_section{
		display:none;
		height:320px;
	}
	@media (max-width: 1199px) {
		#post_section{
			height:340px;
		}
	}
	@media (max-width: 991px) {
		#post_section{
			height:415px;
		}
	}
	.header {
  	display: table;
  	position: relative;
  	width: 100%;
    height: 100%;
		background: url('<?php echo SR;?>img/bg.jpg') no-repeat center center scroll;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    background-size: cover;
    -o-background-size: cover;
	}
	.callout {
    display: table;
    width: 100%;
    height: 400px;
    color: #fff;
    background: url('<?php echo SR;?>img/callout.jpg') no-repeat center center scroll;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    background-size: cover;
    -o-background-size: cover;
	}

	section#contact select,
	section#contact input,
	section#contact textarea{
		color:#3B3B3B;
	}
	section#contact .section-heading {
		color:#fff
	}
	section#contact .form-group {
		margin-bottom:25px
	}
	section#contact .form-group input, section#contact .form-group textarea {
		padding:20px
	}
	section#contact .form-group input.form-control {
		height:auto
	}
	section#contact .form-group select {
		padding:20px
	}
	section#contact .form-group select.form-control {
		height:auto
	}
	section#contact .form-group textarea.form-control {
		height:285px /*over write stylesheet*/
	}
	section#contact .form-control:focus {
		border-color:#fed136;
		box-shadow:none
	}
	section#contact ::-webkit-input-placeholder {
		font-family:Montserrat, "Helvetica Neue", Helvetica, Arial, sans-serif;
		text-transform:uppercase;
		font-weight:700;
		color:#bbb
	}
	section#contact :-moz-placeholder {
		font-family:Montserrat, "Helvetica Neue", Helvetica, Arial, sans-serif;
		text-transform:uppercase;
		font-weight:700;
		color:#bbb
	}
	section#contact ::-moz-placeholder {
		font-family:Montserrat, "Helvetica Neue", Helvetica, Arial, sans-serif;
		text-transform:uppercase;
		font-weight:700;
		color:#bbb
	}
	section#contact :-ms-input-placeholder {
		font-family:Montserrat, "Helvetica Neue", Helvetica, Arial, sans-serif;
		text-transform:uppercase;
		font-weight:700;
		color:#bbb
	}
	section#contact .text-danger {
		color:#e74c3c;
		text-align:left;
	}
	section {
		padding:100px 0
	}
	section h2.section-heading {
		font-size:40px;
		margin-top:0;
		margin-bottom:15px
	}
	section h3.section-subheading {
		font-size:16px;
		font-family:"Droid Serif", "Helvetica Neue", Helvetica, Arial, sans-serif;
		text-transform:none;
		font-style:italic;
		font-weight:400;
		margin-bottom:75px
	}
	@media (min-width:768px) {
		section {
			padding:50px 0
		}
	}
	.btn-xl {
		color:#fff;
		background-color:#fed136;
		border-color:#fed136;
		font-family:Montserrat, "Helvetica Neue", Helvetica, Arial, sans-serif;
		text-transform:uppercase;
		font-weight:700;
		border-radius:3px;
		font-size:18px;
		padding:20px 40px
	}
	.btn-xl:hover, .btn-xl:focus, .btn-xl:active, .btn-xl.active, .open .dropdown-toggle.btn-xl {
		color:#fff;
		background-color:#fec503;
		border-color:#f6bf01
	}
	.btn-xl:active, .btn-xl.active, .open .dropdown-toggle.btn-xl {
		background-image:none
	}
	.btn-xl.disabled, .btn-xl[disabled], fieldset[disabled] .btn-xl, .btn-xl.disabled:hover, .btn-xl[disabled]:hover, fieldset[disabled] .btn-xl:hover, .btn-xl.disabled:focus, .btn-xl[disabled]:focus, fieldset[disabled] .btn-xl:focus, .btn-xl.disabled:active, .btn-xl[disabled]:active, fieldset[disabled] .btn-xl:active, .btn-xl.disabled.active, .btn-xl[disabled].active, fieldset[disabled] .btn-xl.active {
		background-color:#fed136;
		border-color:#fed136
	}
	.btn-xl .badge {
		color:#fed136;
		background-color:#fff
	}

	</style>
  
  <script src="<?php echo ST;?>js/jquery.js"></script>
  <script src="<?php echo CD;?>my/wowpoints.js"></script>

	<script>
	$(document).ready(function(){
 		$("#login_btn").click(function(){
  	  $("#login_section").fadeIn();
  	});
  	$("#login_close, #post_btn, #about_btn").click(function(){
  	  $("#login_section").fadeOut();
  	});
 		$("#post_btn").click(function(){
  	  $("#post_section").fadeIn();
  	});
  	$("#post_close, #login_btn, #about_btn").click(function(){
  	  $("#post_section").fadeOut();
  	});
  	$(".scrollToTop").click(function(){
  	  $("html, body").animate({scrollTop : 0},800);
  	});
	});
	</script>
</head>

<body data-role="page">

    <a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a> 
    <!-- Navigation -->

    <!-- Header -->
    <header id="top" class="header">
        <div class="text-vertical-center">
            <h1><img src="<?php echo SR;?>logo_CodeWork.png" alt="logo" width="50" style="margin-top:-10px">CodeWork</h1>
            <h3>Web Design and Web Application</h3>
            <br>
            <a href="#about" id="about_btn" class="btn btn-dark btn-lg">Find Out More</a>
            <a href="#login" id="login_btn" class="btn btn-dark btn-lg portfolio-link">Login</a>
            <a href="#post" id="post_btn" class="btn btn-dark btn-lg">Post a Project</a>
        </div>
    </header>

    <!-- About -->
    <section id="about" class="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Perfect Websites Are The Perfect Way For Your Next Project !</h2>
                    <p class="lead">We Build The Way To Your Success..</p>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </section>

    <!-- Services -->
    <!-- The circle icons use Font Awesome's stacked icon classes. For more information, visit http://fontawesome.io/examples/ -->
    <section id="services" class="services bg-primary">
        <div class="container">
            <div class="row text-center">
                <div class="col-lg-10 col-lg-offset-1">
                    <h2>Our Services</h2>
                    <hr class="small">
                    <div class="row">
                        <div class="col-md-3 col-sm-6">
                            <div class="service-item">
                                <span class="fa-stack fa-4x">
                                <i class="fa fa-circle fa-stack-2x"></i>
                                <i class="fa fa-code fa-stack-1x text-primary"></i>
                            </span>
                                <h4>
                                    <strong>Website Developing</strong>
                                </h4>
                                <p>We Make Our Codings Perfect</p>
                                <p><strong>Starting from ₹5,000</strong></p>
                                <a href="#" class="btn btn-light">Learn More</a>
                                <a href="#" class="btn btn-dark">Post Project</a>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="service-item">
                                <span class="fa-stack fa-4x">
                                <i class="fa fa-circle fa-stack-2x"></i>
                                <i class="fa fa-star fa-stack-1x text-primary"></i>
                            </span>
                                <h4>
                                    <strong>Web Design</strong>
                                </h4>
                                <p>Stylish, Creative and Responsive</p>
                                <p><strong>Starting from ₹4,000</strong></p>
                                <a href="#" class="btn btn-light">Learn More</a>
                                <a href="#" class="btn btn-dark">Post Project</a>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="service-item">
                                <span class="fa-stack fa-4x">
                                <i class="fa fa-circle fa-stack-2x"></i>
                                <i class="fa fa-compass fa-stack-1x text-primary"></i>
                            </span>
                                <h4>
                                    <strong>SEO</strong>
                                </h4>
                                <p>Search Engine Optimization</p>
                                <p><strong>Starting from ₹4,500</strong></p>
                                <a href="#" class="btn btn-light">Learn More</a>
                                <a href="#" class="btn btn-dark">Post Project</a>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="service-item">
                                <span class="fa-stack fa-4x">
                                <i class="fa fa-circle fa-stack-2x"></i>
                                <i class="fa fa-image fa-stack-1x text-primary"></i>
                            </span>
                                <h4>
                                    <strong>Logo</strong>
                                </h4>
                                <p>Suitable For Your Business</p>
                                <p><strong>Starting from ₹2,000</strong></p>
                                <a href="#" class="btn btn-light">Learn More</a>
                                <a href="#" class="btn btn-dark">Post Project</a>
                            </div>
                        </div>
                    </div>
                    <!-- /.row (nested) -->
                </div>
                <!-- /.col-lg-10 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </section>

    <!-- Callout -->
    <aside class="callout">
        <div class="text-vertical-center">
            <h1>We Love What We Do</h1>
        </div>
    </aside>

    <!-- Portfolio -->
    <section id="portfolio" class="portfolio">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-lg-offset-1 text-center">
                    <h2>Our Work</h2>
                    <hr class="small">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="portfolio-item">
                                <a href="#">
                                	<div class="img-portfolio img-responsive background" style="background: url(<?php echo SR;?>img/picsray.png);">
                                    <div class="transbox">
                                    	<span class="img-text">PicsRay</span>
                                    </div>
                                  </div>
                                </a>
                            </div>
                        </div>
                        <!--
                        <div class="col-md-6">
                            <div class="portfolio-item">
                                <a href="#">
                                	<div class="img-portfolio img-responsive background" style="background:url(img/portfolio-2.jpg);">
                                    <div class="transbox">
                                    	<span class="img-text">PicsRay</span>
                                    </div>
                                  </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="portfolio-item">
                                <a href="#">
                                	<div class="img-portfolio img-responsive background" style="background:url(img/portfolio-3.jpg);">
                                    <div class="transbox">
                                    	<span class="img-text">PicsRay</span>
                                    </div>
                                  </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="portfolio-item">
                                <a href="#">
                                	<div class="img-portfolio img-responsive background" style="background:url(img/portfolio-4.jpg);">
                                    <div class="transbox">
                                    	<span class="img-text">PicsRay</span>
                                    </div>
                                  </div>
                                </a>
                            </div>
                        </div>
                        -->
                    </div>
                    <!-- /.row (nested) -->
                    <a href="#" class="btn btn-dark">View More Items</a>
                </div>
                <!-- /.col-lg-10 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </section>

    <!-- Call to Action -->
    <aside class="call-to-action bg-primary">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h3>The buttons below are impossible to resist.</h3>
                    <a href="#" class="btn btn-lg btn-light">Click Me!</a>
                    <a href="#" class="btn btn-lg btn-dark">Look at Me!</a>
                </div>
            </div>
        </div>
    </aside>

    <!-- Map -->
    <section id="contact" class="map">
    	<div class="container">
      	<div class="row">
          <div class="col-lg-10 col-lg-offset-1 text-center">
            <h2>Contact Us</h2>
            <hr class="small">
            <div class="row">
                <div class="col-lg-12">
                    <form name="sentMessage" id="contactForm" novalidate>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control input-lg" placeholder="Your Name *" id="name" required data-validation-required-message="Please enter your name.">
                                    <p class="help-block text-danger">&nbsp;</p>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control input-lg" placeholder="Your Email *" id="email" required data-validation-required-message="Please enter your email address.">
                                    <p class="help-block text-danger">&nbsp;</p>
                                </div>
                                <div class="form-group">
                                    <input type="tel" class="form-control input-lg" placeholder="Your Phone *" id="phone" required data-validation-required-message="Please enter your phone number.">
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
                                <button type="submit" class="btn btn-xl btn-block">Send Message</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <aside class="call-to-action">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                </div>
            </div>
        </div>
    </aside>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-lg-offset-1 text-center">
                    <h4><strong>CodeWork</strong>
                    </h4>
                    <p style="display:none;">3481 Melrose Place<br>Beverly Hills, CA 90210</p>
                    <ul class="list-unstyled">
                        <li><i class="fa fa-phone fa-fw"></i> 123 456 7890</li>
                        <li><i class="fa fa-envelope-o fa-fw"></i>  <a href="mailto:info@CodeWork.com">info@CodeWork.com</a>
                        </li>
                    </ul>
                    <br>
                    <ul class="list-inline">
                        <li>
                            <a href="#"><i class="fa fa-facebook fa-fw fa-3x"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-twitter fa-fw fa-3x"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-google-plus fa-fw fa-3x"></i></a>
                        </li>
                    </ul>
                    <hr class="small">
                    <p class="text-muted">Copyright &copy; CodeWork 2016</p>
                </div>
            </div>
        </div>
    </footer>
<div class="portfolio-modal modal" id="login_section" tabindex="-1" role="dialog" aria-hidden="true" style="margin-top:1%;position:absolute;">
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
<div class="portfolio-modal modal" id="post_section" tabindex="-1" role="dialog" aria-hidden="true" style="margin-top:1%;position:absolute;">
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

    <script src="<?php echo ST;?>js/bootstrap.min.js"></script>
    <script src="<?php echo CD;?>age/js/jqBootstrapValidation.js"></script>
    <script src="<?php echo CD;?>age/js/contact_me.js"></script>

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

<?php
include 'includes/connection.php';
?>
<!doctype html>
<html dir="ltr" lang="en-US">
<head>
	<!-- meta -->
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />

	<!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
	<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1">

	<!-- Uncomment the meta tags you are going to use! Be relevant and don't spam! -->

	<meta name="keywords" content="Atlas-Alpha,Atlas,Trading,International,China" />
	<meta name="description" content="International trading company Atlas Alpha">

  <base href="//atlas-alpha.com/">

	<!-- Title -->
	<title>Atlas Alpha</title>
	<!--  Desktop Favicons  -->
	<link rel="icon" type="image/png" href="images/favicon.png" sizes="16x16">
	<!-- <link rel="icon" type="image/png" href="images/favicons/favicon-32x32.png" sizes="32x32"> -->
	<!-- <link rel="icon" type="image/png" href="images/favicons/favicon-96x96.png" sizes="96x96"> -->

	<!-- Google Fonts CSS Stylesheet // More here http://www.google.com/fonts#UsePlace:use/Collection:Open+Sans -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400italic,400,600,600italic,700,800,800italic" rel="stylesheet" type="text/css">
	<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>

	<!-- ***** Boostrap Custom / Addons Stylesheets ***** -->
	<link rel="stylesheet" href="css/bootstrap.css">

	<!-- Required REVOLUTION STYLE SHEETS -->
	<link rel="stylesheet" type="text/css" href="css/sliders/revolution-slider/settings.css">
	<!-- Required REVOLUTION LAYERS STYLES -->
	<link rel="stylesheet" type="text/css" href="css/sliders/revolution-slider/layers.css">
	<!-- Required REVOLUTION NAVIGATION STYLES -->
	<link rel="stylesheet" type="text/css" href="css/sliders/revolution-slider/navigation.css">

	<!-- LOADING FONTS AND ICONS for Revolution Slider -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:500" rel="stylesheet" property="stylesheet" type="text/css" media="all">
	<link href="https://fonts.googleapis.com/css?family=Oswald:400" rel="stylesheet" property="stylesheet" type="text/css" media="all">

	<link rel="stylesheet" type="text/css" href="fonts/pe-icon-7-stroke/css/pe-icon-7-stroke.css">
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome/css/font-awesome.min.css">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

	<!-- Required ADD-ONS CSS FILES for Revolution slider -->
	<link rel="stylesheet" type="text/css" href="css/sliders/revolution-slider/css-addons/revolution.addon.particles.css">

	<!-- Required ADD-ONS JS FILES for Revolution slider -->
	<script type="text/javascript" src="js/plugins/_sliders/revolution-slider/addons/revolution.addon.particles.min.js"></script>

	<!-- LIGHTGALLERY -->
	<link type="text/css" rel="stylesheet" href="css/lightgallery.css" />

	<link href="//cdn.rawgit.com/noelboss/featherlight/1.7.12/release/featherlight.min.css" type="text/css" rel="stylesheet" />

	<!-- ***** Main + Responsive & Base sizing CSS Stylesheet ***** -->
	<link rel="stylesheet" href="css/template.css" type="text/css" media="all">
	<link rel="stylesheet" href="css/responsive.css" type="text/css" media="all">
	<link rel="stylesheet" href="css/base-sizing.css" type="text/css" media="all">

	<!-- Custom CSS Stylesheet (where you should add your own css rules) -->
	<link rel="stylesheet" href="css/custom1.css" type="text/css" />

	<!-- Modernizr Library -->
	<script type="text/javascript" src="js/modernizr.min.js"></script>

	<!-- jQuery Library -->
	<script type="text/javascript" src="js/jquery.js"></script>

</head>

<body class="preloader">


	<!-- Page Wrapper -->
	<div id="page_wrapper">
	<header id="header" class="site-header cta_button style5" data-header-style="5">
	<!-- siteheader-container -->
	<div class="container siteheader-container header--oldstyles">
		<!-- Logo container-->
		<div class="logo-container hasInfoCard logosize--yes">
			<!-- Logo -->
			<h1 class="site-logo logo " id="logo">
				<a href="index2.php">
					 <img src="images/logo.png" class="logo-img" alt="Atlas Alpha" title="Atlas Alpha">
				</a>
			</h1>
			<!--/ Logo -->

			<!-- InfoCard -->
			<div id="infocard" class="logo-infocard">
				<div class="custom">
					<div class="row">
						<div class="col-sm-12">
							<div class="custom contact-details">
								<p>
									Tel. <a href="tel:+31181687002">0181-687002</a><br>
									Mail. <a href="mailto:info@atlas-alpha.com">info@atlas-alpha.com</a>
								</p>
								<p>
									Atlas Alpha<br>
									Kikkerveen 157, 3205 XA, Spijkenisse
								</p>
							</div>
							<div style="height:20px;">
							</div>
						</div>
						<!--/ col-sm-7 -->
					</div>
					<!--/ row -->
				</div>
				<!--/ custom -->
			</div>
			<!--/ InfoCard -->
		</div>
		<!--/ Logo container-->

		<!-- separator for responsive header -->
		<div class="separator site-header-separator visible-xs mb-0"></div>
		<!--/ separator for responsive header -->

		<!-- kl-top-header -->
		<div class="kl-top-header">
			<!-- header-links-container -->
			<div class="header-links-container">
				<!-- Header Social links -->
				<ul class="social-icons sc--clean topnav navRight">
					<li><a class="nosocicons" href="mailto:info@atlas-alpha.com">info@atlas-alpha.com</a></li>
					<li><a class="nosocicons" href="tel:+31181687002">0181-687002</a></li>
				</ul>
				<!--/ Header Social links -->
			</div>
			<!--/ header-links-container -->

			<!-- separator for responsive header -->
			<div class="separator site-header-separator visible-xs"></div>
			<!--/ separator for responsive header -->

			<!-- header search -->
			<div id="search" class="header-search">
				<a href="#" class="searchBtn "><span class="fa glyphicon glyphicon-search fa-search icon-white"></span></a>
				<div class="search-container">
					<form id="searchform" class="header-searchform" action="result.php" method="post">
						<input name="zoekvalue" maxlength="20" class="inputbox" type="text" size="20" placeholder="Search..." value="">
						<!-- <button type="submit" id="searchsubmit" class="searchsubmit fa glyphicon fa-search icon-white"></button> -->
						<span class="kl-field-bg"></span>
					</form>
				</div>
			</div>
			<!--/ header search -->
		</div>
		<!--/ kl-top-header -->

		<!-- kl-main-header -->
		<div class="kl-main-header clearfix">
			<!-- Call to action ribbon Free Quote -->
			<a href="contact.php" id="ctabutton" class="ctabutton kl-cta-ribbon" title="Contact us" target="_self"><strong>CONTACT</strong>US<svg version="1.1" class="trisvg" xmlns="https://www.w3.org/2000/svg" xmlns:xlink="https://www.w3.org/1999/xlink" x="0px" y="0px" preserveAspectRatio="none" width="14px" height="5px" viewBox="0 0 14.017 5.006" enable-background="new 0 0 14.017 5.006" xml:space="preserve"><path fill-rule="evenodd" clip-rule="evenodd" d="M14.016,0L7.008,5.006L0,0H14.016z"></path></svg></a>
			<!--/ Call to action ribbon Free Quote -->

			<!-- responsive menu trigger -->
			<div id="zn-res-menuwrapper">
				<a href="#" class="zn-res-trigger zn-header-icon"></a>
			</div>
			<!--/ responsive menu trigger -->

			<!-- main menu -->
			<?php
      include 'includes/menu.php';
      ?>
			<!--/ main menu -->
		</div>
		<!--/ kl-main-header -->
	</div>
	<!--/ siteheader-container -->
</header>

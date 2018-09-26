<?php
include($_SERVER["DOCUMENT_ROOT"] . "/app_config.php");
include(APP_PATH."libs/head.php"); 
?>
<link rel="stylesheet" href="<?php echo APP_URL;?>common/css/slick.css">
</head>

<body id="event">
<!--===================================================-->
<div id="wrapper">
<!--===================================================-->

<!--Header-->
<?php include(APP_PATH."libs/header.php"); ?>
<!--/Header-->

<!-- <div class="headSub">
	<img src="<?php echo APP_URL; ?>img/top/banner.jpg" class="" alt="">
</div> -->

<div class="maxW">
	<ul class="break clearfix">
		<li><a href="">Home</a></li>
		<li>Shop by Brand</li>
	</ul>

	<ul class="lstLogo flexBox flexBox--wrap flexBox--center">
		<li><a href=""><img src="<?php echo APP_URL; ?>img/top/logo1.jpg" class="" alt=""></a></li>
		<li><a href=""><img src="<?php echo APP_URL; ?>img/top/logo2.jpg" class="" alt=""></a></li>
		<li><a href=""><img src="<?php echo APP_URL; ?>img/top/logo3.jpg" class="" alt=""></a></li>
		<li><a href=""><img src="<?php echo APP_URL; ?>img/top/logo4.jpg" class="" alt=""></a></li>
		<li><a href=""><img src="<?php echo APP_URL; ?>img/top/logo5.jpg" class="" alt=""></a></li>
		<li><a href=""><img src="<?php echo APP_URL; ?>img/top/logo6.jpg" class="" alt=""></a></li>
		<li><a href=""><img src="<?php echo APP_URL; ?>img/top/logo7.jpg" class="" alt=""></a></li>
		<li><a href=""><img src="<?php echo APP_URL; ?>img/top/logo8.jpg" class="" alt=""></a></li>
		<li><a href=""><img src="<?php echo APP_URL; ?>img/top/logo9.jpg" class="" alt=""></a></li>
		<li><a href=""><img src="<?php echo APP_URL; ?>img/top/logo10.jpg" class="" alt=""></a></li>
		<li><a href=""><img src="<?php echo APP_URL; ?>img/top/logo11.jpg" class="" alt=""></a></li>
		<li><a href=""><img src="<?php echo APP_URL; ?>img/top/logo12.jpg" class="" alt=""></a></li>
		<li><a href=""><img src="<?php echo APP_URL; ?>img/top/logo13.jpg" class="" alt=""></a></li>
	</ul>
</div>	

<!--Footer-->
<?php include(APP_PATH."libs/footer.php"); ?>
<!--/Footer-->
<!--===================================================-->
</div>
<!--/wrapper-->
<!--===================================================-->
</body>
</html>	
<?php /* Template Name: Sale */ ?>
<?php
include($_SERVER["DOCUMENT_ROOT"] . "/app_config.php");
include(APP_PATH."libs/head.php"); 
?>
<link rel="stylesheet" href="<?php echo APP_URL;?>common/css/slick.css">
</head>

<body id="category">
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
	<div class="taR">
		<ul class="break clearfix">
			<li><a href="<?php echo APP_URL; ?>">Home</a></li>
			<li>404</li>
		</ul>
	</div>

	<div class="clearfix">
		<p class="txtNotfound">OOPS! PAGE NOT FOUND</p>
	</div>
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
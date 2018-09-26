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
		<li>Event</li>
	</ul>
</div>	
	
<ul class="lstEvent flexBox flexBox--wrap flexBox--center">
	<li>
		<a href="">
		<img src="<?php echo APP_URL; ?>img/demo/test1.jpg" class="" alt="">
		<div class="info">
			<p class="name">Event Golf</p>
			<p class="date">20.01.2020</p>
			<p class="btn">MORE</p>
		</div>
		</a>
	</li>
	<li>
		<a href="">
		<img src="<?php echo APP_URL; ?>img/demo/test2.jpg" class="" alt="">
		<div class="info">
			<p class="name">Event Golf</p>
			<p class="date">20.01.2020</p>
			<p class="btn">MORE</p>
		</div>
		</a>
	</li>
	<li>
		<a href="">
		<img src="<?php echo APP_URL; ?>img/demo/test3.jpg" class="" alt="">
		<div class="info">
			<p class="name">Event Golf</p>
			<p class="date">20.01.2020</p>
			<p class="btn">MORE</p>
		</div>
		</a>
	</li>
	<li>
		<a href="">
		<img src="<?php echo APP_URL; ?>img/demo/test4.jpg" class="" alt="">
		<div class="info">
			<p class="name">Event Golf</p>
			<p class="date">20.01.2020</p>
			<p class="btn">MORE</p>
		</div>
		</a>
	</li>
	<li>
		<a href="">
		<img src="<?php echo APP_URL; ?>img/demo/test3.jpg" class="" alt="">
		<div class="info">
			<p class="name">Event Golf</p>
			<p class="date">20.01.2020</p>
			<p class="btn">MORE</p>
		</div>
		</a>
	</li>
	<li>
		<a href="">
		<img src="<?php echo APP_URL; ?>img/demo/test4.jpg" class="" alt="">
		<div class="info">
			<p class="name">Event Golf</p>
			<p class="date">20.01.2020</p>
			<p class="btn">MORE</p>
		</div>
		</a>
	</li>
</ul>


	

	



<!--Footer-->
<?php include(APP_PATH."libs/footer.php"); ?>
<!--/Footer-->
<!--===================================================-->
</div>
<!--/wrapper-->
<!--===================================================-->
</body>
</html>	
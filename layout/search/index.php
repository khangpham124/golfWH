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

<div class="headSub">
	<img src="<?php echo APP_URL; ?>img/top/banner.jpg" class="" alt="">
</div>

<div class="maxW">
	<ul class="break clearfix">
		<li><a href="">Home</a></li>
		<li>Category</li>
	</ul>
	
	<div class="clearfix">
		<aside class="leftSide">
			<h3 class="h3_shop">Shop by type</h3>
				<ul class="lstFilter">
					<li><a href="">Type 1</a></li>
					<li><a href="">Type 2</a></li>
					<li><a href="">Type 3</a></li>
					<li><a href="">Type 4</a></li>
					<li><a href="">Type 5</a></li>
				</ul>
			<h3 class="h3_shop">Shop by Brand</h3>
			<ul class="lstFilter__brand">
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
		</aside>
		<div class="rightSide">
			<h2 class="h2_cate">SEARCH RESULTS</h2>
			<ul class="lstSearch">
				<li>
					<div class="wrap">
						<p class="thumb">
							<img src="<?php echo APP_URL; ?>img/top/sp2.jpg" class="" alt="">
							<a href="" class="btn">ADD TO CART</a>
						</p>
						<div class="info">
						<p class="title"><a href="">TaylorMade Men's M3 Driver</a></p>
						<p class="price">$499</p>
						</div>
					</div>
				</li>

				<li>
					<div class="wrap">
						<p class="thumb">
							<img src="<?php echo APP_URL; ?>img/top/sp2.jpg" class="" alt="">
							<a href="" class="btn">ADD TO CART</a>
						</p>
						<div class="info">
						<p class="title"><a href="">TaylorMade Men's M3 Driver</a></p>
						<p class="price">$499</p>
						</div>
					</div>
				</li>

				<li>
					<div class="wrap">
						<p class="thumb">
							<img src="<?php echo APP_URL; ?>img/top/sp2.jpg" class="" alt="">
							<a href="" class="btn">ADD TO CART</a>
						</p>
						<div class="info">
						<p class="title"><a href="">TaylorMade Men's M3 Driver</a></p>
						<p class="price">$499</p>
						</div>
					</div>
				</li>

				<li>
					<div class="wrap">
						<p class="thumb">
							<img src="<?php echo APP_URL; ?>img/top/sp2.jpg" class="" alt="">
							<a href="" class="btn">ADD TO CART</a>
						</p>
						<div class="info">
						<p class="title"><a href="">TaylorMade Men's M3 Driver</a></p>
						<p class="price">$499</p>
						</div>
					</div>
				</li>

			</ul>
		</div>
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
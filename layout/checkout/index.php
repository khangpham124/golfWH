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

<div class="maxW">
	<ul class="break clearfix">
		<li><a href="">Home</a></li>
		<li>Checkout</li>
	</ul>
	<div class="flexBox flexBox--between flexBox--wrap flexBox--nosp">
	<div class="leftCart">
		<div class="boxCart">
			<h3 class="h3_checkout">SHIPPING INFO</h3>
			<form class="formInput" action="">
				<table class="shipInfo">
					<tr>
						<th><label>Fullname</label></th>
						<td><input type="text" name="fullname"></td>
					</tr>

					<tr>
						<th><label>Email</label></th>
						<td><input type="text" name="fullname"></td>
					</tr>

					<tr>
						<th><label>Phone</label></th>
						<td><input type="text" name="fullname"></td>
					</tr>

					<tr>
						<th><label>Address</label></th>
						<td><input type="text" name="fullname"></td>
					</tr>
				</table>
			</form>
			<div class="boxBtn flexBox">
				<a href="" class="btnSite"><i class="fa fa-arrow-left" aria-hidden="true"></i>BACK</a>
				<a href="" class="btnSite btnSite--blue">COMPLETE</a>
			</div>
		</div>
		
	</div>
	<div class="rightCart">
		<div class="boxSum">
			<h3 class="h3_checkout">SUMMARY</h3>
			<div class="boxSum--wrap">
				<table class="tblCost">
					<tr>
						<th>SUB TOTAL</th>
						<td>$400</td>
					</tr>
					
					<tr>
						<th class="totalCost">TOTAL</th>
						<td>$440</td>
					</tr>
				</table>
			</div>
		</div>

		<div class="boxSum">
			<h3 class="h3_checkout">IN YOUR CART (3)</h3>
			<div class="boxSum--wrap">
			<ul class="lstCart">
					<li>
						<p class="thumb"><img src="<?php echo APP_URL; ?>img/demo/prod1.jpg" class="" alt=""></p>	
						<div class="info">
							<p class="name"><a href="">Gậy golf driver Mizuno JPX 900 (Japan Spec)</a></p>
							<table><tr class="totalCost"><th>PRICE</th><td>2.149.000₫</td></tr></table>
						</div>
					</li>
					<li>
						<p class="thumb"><img src="<?php echo APP_URL; ?>img/demo/prod1.jpg" class="" alt=""></p>	
						<div class="info">
							<p class="name"><a href="">Gậy golf driver Mizuno JPX 900 (Japan Spec)</a></p>
							<table><tr class="totalCost"><th>PRICE</th><td>2.149.000₫</td></tr></table>
						</div>
					</li>
					<li>
						<p class="thumb"><img src="<?php echo APP_URL; ?>img/demo/prod1.jpg" class="" alt=""></p>	
						<div class="info">
							<p class="name"><a href="">Gậy golf driver Mizuno JPX 900 (Japan Spec)</a></p>
							<table><tr class="totalCost"><th>PRICE</th><td>2.149.000₫</td></tr></table>
						</div>
					</li>
				</ul>
			<a href="" class="btnSite btnSite--orange">EDIT CART</a>	
			</div>
		</div>
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
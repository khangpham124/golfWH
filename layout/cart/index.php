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
		<li>Cart</li>
	</ul>
	
	<div class="flexBox flexBox--between flexBox--wrap flexBox--nosp">
		<div class="leftCart">
			<div class="boxCart">
				<h3 class="h3_checkout">IN YOUR CART (3)</h3>
				<ul class="lstCart">
					<li>
						<p class="thumb"><img src="<?php echo APP_URL; ?>img/demo/prod1.jpg" class="" alt=""></p>	
						<div class="info">
							<p class="name"><a href="">Gậy golf driver Mizuno JPX 900 (Japan Spec)</a></p>
							<table>
								<tr>
									<th>STYLE</th>
									<td>819719-110</td>
								</tr>
								<tr>
									<th>SIZE</th>
									<td>EU  44.5</td>
								</tr>
								<tr>
									<th>COLOUR</th>
									<td>White/Wolf Grey/Metallic Silver/White</td>
								</tr>
								<tr>
									<th>QTY</th>
									<td>819719-110</td>
								</tr>
								<tr>
									<th>PRICE</th>
									<td>2.149.000₫</td>
								</tr>
							</table>
							<a href="" class="btnRemove">REMOVE</a>
						</div>
					</li>
					<li>
						<p class="thumb"><img src="<?php echo APP_URL; ?>img/demo/prod1.jpg" class="" alt=""></p>	
						<div class="info">
							<p class="name"><a href="">Gậy golf driver Mizuno JPX 900 (Japan Spec)</a></p>
							<table>
								<tr>
									<th>STYLE</th>
									<td>819719-110</td>
								</tr>
								<tr>
									<th>SIZE</th>
									<td>EU  44.5</td>
								</tr>
								<tr>
									<th>COLOUR</th>
									<td>White/Wolf Grey/Metallic Silver/White</td>
								</tr>
								<tr>
									<th>QTY</th>
									<td>819719-110</td>
								</tr>
								<tr>
									<th>PRICE</th>
									<td>2.149.000₫</td>
								</tr>
							</table>
							<a href="" class="btnRemove">REMOVE</a>
						</div>
					</li>
					<li>
						<p class="thumb"><img src="<?php echo APP_URL; ?>img/demo/prod1.jpg" class="" alt=""></p>	
						<div class="info">
							<p class="name"><a href="">Gậy golf driver Mizuno JPX 900 (Japan Spec)</a></p>
							<table>
								<tr>
									<th>STYLE</th>
									<td>819719-110</td>
								</tr>
								<tr>
									<th>SIZE</th>
									<td>EU  44.5</td>
								</tr>
								<tr>
									<th>COLOUR</th>
									<td>White/Wolf Grey/Metallic Silver/White</td>
								</tr>
								<tr>
									<th>QTY</th>
									<td>819719-110</td>
								</tr>
								<tr>
									<th>PRICE</th>
									<td>2.149.000₫</td>
								</tr>
							</table>
							<a href="" class="btnRemove">REMOVE</a>
						</div>
					</li>
				</ul>
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
		</div>
	
	<div class="boxBtn flexBox">
		<a href="" class="btnSite"><i class="fa fa-arrow-left" aria-hidden="true"></i>BACK</a>
		<a href="" class="btnSite btnSite--blue">CHECKOUT</a>
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
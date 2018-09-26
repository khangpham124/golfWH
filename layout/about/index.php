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
	
	<div class="clearfix">
		<div class="leftCart">
			<h2 class="h2_cate">Cart</h2>
			<table>
				<thead>
					<td class="col1">PRODUCTS</td>
					<td class="col2">QUANTITY</td>
					<td class="col3">PRICE</td>
					<td class="col4">TOTAL</td>
					<td class="col5">ACTION</td>
				</thead>
				<tbody>
					<td>
						<div class="flexBox">
							<p class="thumb"><img src="<?php echo APP_URL; ?>img/demo/prod1.jpg" class="" alt=""></p>	
							<p class="name">Gậy golf driver Mizuno JPX 900 (Japan Spec)</p>
						</div>
					</td>
					<td>2</td>
					<td>$200</td>
					<td>$400</td>
					<td><i class="fa fa-trash" aria-hidden="true"></i></td>
				</tbody>
			</table>
		</div>

		<div class="rightCart">
			<table>
				<tr>
					<td>SUB TOTAL</td>
					<td>VAT</td>
					<td>GRAND TOTAL</td>
				</tr>
				<tr>
				<tr>
					<td>$400</td>
					<td>10%</td>
					<td>$440</td>
				</tr
				</tr>
			</table>
		</div>
	</div>
	<div class="boxBtn">
		<a href="">BACK</a>
		<a href="">CHECKOUT</a>
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
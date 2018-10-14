<?php
session_start();
include($_SERVER["DOCUMENT_ROOT"] . "/app_config.php");
if(!$_COOKIE['order_cookies']) {    
    header('Location:http://golf-warehouse.vn');
    die();
}
include(APP_PATH."libs/head.php"); 
?>
<link rel="stylesheet" href="<?php echo APP_URL;?>common/css/slick.css">
</head>

<body id="checkout">
<!--===================================================-->
<div id="wrapper">
<!--===================================================-->

<!--Header-->
<?php include(APP_PATH."libs/header.php"); ?>
<!--/Header-->

<div class="maxW">
	<ul class="break clearfix">
		<li><a href="<?php echo APP_URL; ?>">Home</a></li>
		<li>Checkout</li>
	</ul>
	<?php 
	$f_isset = $_SERVER["DOCUMENT_ROOT"].'/ajax/tmp/'.$_COOKIE['order_gwh'].'.json';
	$curr_cart  = json_decode(file_get_contents($f_isset));
	?>
	<div class="flexBox flexBox--between flexBox--wrap flexBox--nosp">
	<div class="leftCart">
		<div class="boxCart">
			<h3 class="h3_checkout">SHIPPING INFO</h3>
			<form class="formInput" method="post" action="http://golf-warehouse.vn/confirm/">
				<table class="shipInfo">
					<tr>
						<th><label>Fullname<span>*</span></label></th>
						<td><input type="text" id="fullname" name="fullname" required></td>
					</tr>

					<tr>
						<th><label>Email<span>*</span></label></th>
						<td><input type="email" id="email" name="email" required></td>
					</tr>

					<tr>
						<th><label>Phone<span>*</span></label></th>
						<td><input type="text" id="phone" name="phone" required></td>
					</tr>

					<tr>
						<th><label>Address<span>*</span></label></th>
						<td><input type="text" id="address" name="address" required></td>
					</tr>
				</table>
				<h3 class="h3_checkout">PAYMENT INFO</h3>
				<div class="textCheckout">
				When you buy at Warehouse golf, you can completely safety about the quality of products. Shop is committed to all products are raw materials, quality, imported from the famous golf brands.
				After we receive order via email, Warehouse Golf will confirm by phone and processing order. 
				<br><br>
				1. Cash on delivery: apply only for customer in HCMC (not include Cu Chi, Can Gio, Hoc Mon). 
				<br>
				You will pay cash for delivery staff. <br>
				Delivery time: <strong>1-2</strong> days working time after confirm order. <br>
				<br><br>	
				2. Transfer via Bank: apply for customer NOT in HCMC: 
				<table class="shipInfo">
					<tr>
						<th>ACB Bank</th>
						<td>
							ACB - CN Chợ Lớn<br>
							Account holder: Nguyen Thi kim Ngan<br>
							Account number: 22937649
						</td>
					</tr>
					<tr>
						<th>VCB Bank</th>
						<td>
							Vietcombank - CN HCM<br>
							Account holder: Nguyen Thi kim Ngan<br>
							Account number: 0181003384945
						</td>
					</tr>
				</table>
				Content transfer included: <strong>Your name, phone number. And notice us transfer confirmation.</strong> <br>
				After receive we will confirm and send your order for shipping express, you will receive <strong>5-7</strong> days working time after order confirmed. 
				<br>
				<a href="<?php echo APP_URL; ?>info/">View more shipping info</a>
				</div>
				<div class="boxBtn flexBox flexBox--wrap flexBox--stretch">
					<a href="<?php echo APP_URL; ?>cart" class="btnSite"><i class="fa fa-arrow-left" aria-hidden="true"></i>BACK</a>
					<input type="submit" class="btnSite btnSite--blue completeBtn" value="COMPLETE">
				</div>
			</form>
			
		</div>
		
	</div>
	<div class="rightCart">
		<div class="boxSum">
			<h3 class="h3_checkout">SUMMARY</h3>
			<div class="boxSum--wrap">
				<table class="tblCost">
					<?php
					$arr_price = array();
					foreach($curr_cart as $mydata)
						{
							$count_price = ($mydata->quantity * $mydata->price);
							$arr_price[] = $count_price;
						}
					?>
					<tr>
						<th class="totalCost">TOTAL</th>
						<td><?php echo number_format(array_sum($arr_price)); ?> Đ
						<input type="hidden" value="<?php echo array_sum($arr_price) ?>">
						</td>
					</tr>
					<?php if($onsale=='onsale') { ?>
					<tr>
						<th class="totalCost">SALE OFF</th>
						<td><?php echo $count_prommo; ?>%</td>
					</tr>	
					<?php } ?>
					<tr>
						<th class="totalCost">GRAND TOTAL</th>
						<td>
							<?php $tt_grand = array_sum($arr_price); 
							if($onsale=='onsale') {
								$tt_promo = ($tt_grand * $count_prommo)/100;
								$tt_grand__final = $tt_grand - $tt_promo;
							} else {
								$tt_grand__final = array_sum($arr_price);
							}
							echo number_format($tt_grand__final);
							$_SESSION['grandTotal'] = $tt_grand__final;
							?> Đ
						<input type="hidden" value="<?php echo array_sum($tt_grand__final) ?>">
						</td>
					</tr>
				</table>
			</div>
		</div>

		<div class="boxSum">
			<h3 class="h3_checkout">IN YOUR CART (<span class="numbCart">0</span>)</h3>
			<div class="boxSum--wrap">
			<ul class="lstCart">
				<?php
					foreach($curr_cart as $mydata)
					{
						$full_id = $mydata->id;
						$arr_ids = array();
						if(!in_array($full_id,$arr_ids)) {
							$arr_ids[] = $full_id;
						}
						$wp_query = new WP_Query();
						$param=array(
						'post_type' => array('accessories','bag','shoes','clubs','apparel'),
						'posts_per_page' => '-1',
						'post__in'=> $arr_ids
						);
						$wp_query->query($param);
						if($wp_query->have_posts()):while($wp_query->have_posts()) : $wp_query->the_post();
						$thumb = get_post_thumbnail_id($post->ID);
						$img_prod = wp_get_attachment_image_src($thumb,'full');
						$post_t = get_post_type();
						$curr_wty = $mydata->quantity;
						$total_curr = $mydata->price * $curr_wty;
						
						$sale_stt = get_field('sale');
						$price = get_field('cf_price');
						$percent = (get_field('cf_cost') / 100);
						if($sale_stt!='') {
							$price = $price - ($price * $percent);
						} else {
							$price = get_field('cf_price');
						}
				?>
					<li>
						<p class="thumb"><img src="<?php echo thumbCrop($img_prod[0],60,60); ?>" alt="<?php the_title(); ?>"></p>	
						<div class="info">
							<p class="name"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
							<table><tr class="totalCost"><th>PRICE</th><td><?php echo number_format($price); ?>₫</td></tr></table>
						</div>
					</li>
					<?php endwhile;endif; ?>
        			<?php } ?>	
				</ul>
			<a href="<?php echo APP_URL; ?>cart" class="btnSite btnSite--orange">EDIT CART</a>	
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
<script>
$(".completeBtn").click(function() {
	var fullname = $("input[name=fullname]").val();
	var email = $("input[name=email]").val();
	var phone = $("input[name=phone]").val();
	var address = $("input[name=address]").val();
	if((fullname!='')&&(email!='')&&(phone!='')&&(address!='')){
		$(this).addClass('disable');
	}	
});
</script>

<!--/wrapper-->
<!--===================================================-->
</body>
</html>	
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

<body id="category">
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
			<form class="formInput" method="post" action="<?php echo APP_URL; ?>confirm/">
				<table class="shipInfo">
					<tr>
						<th><label>Fullname</label></th>
						<td><input type="text" id="fullname" name="fullname"></td>
					</tr>

					<tr>
						<th><label>Email</label></th>
						<td><input type="text" id="email" name="email"></td>
					</tr>

					<tr>
						<th><label>Phone</label></th>
						<td><input type="text" id="phone" name="phone"></td>
					</tr>

					<tr>
						<th><label>Address</label></th>
						<td><input type="text" id="address" name="address"></td>
					</tr>
				</table>
				<div class="boxBtn flexBox">
					<a href="<?php echo APP_URL; ?>cart" class="btnSite"><i class="fa fa-arrow-left" aria-hidden="true"></i>BACK</a>
					<input type="submit" class="btnSite btnSite--blue" value="COMPLETE">
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
					$_SESSION['grandTotal'] = array_sum($arr_price);	
					?>
					<tr>
						<th class="totalCost">TOTAL</th>
						<td><?php echo number_format(array_sum($arr_price)); ?> Đ
						<input type="hidden" value="<?php echo array_sum($arr_price) ?>">
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
<!--/wrapper-->
<!--===================================================-->
</body>
</html>	
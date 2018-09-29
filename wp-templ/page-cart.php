<?php /* Template Name: Cart */ ?>
<?php
include($_SERVER["DOCUMENT_ROOT"] . "/app_config.php");
if(!$_COOKIE['order_cookies']) {    
	header('Location:http://golf-warehouse.vn/');
	die();
}
include(APP_PATH."libs/head.php"); 
?>
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
		<li>Cart</li>
	</ul>
	<?php 
	$f_isset = $_SERVER["DOCUMENT_ROOT"].'/ajax/tmp/'.$_COOKIE['order_gwh'].'.json';
	$curr_cart  = json_decode(file_get_contents($f_isset));
	?>
	<div class="flexBox flexBox--between flexBox--wrap flexBox--nosp">
		<div class="leftCart">
			<div class="boxCart">
				<h3 class="h3_checkout">IN YOUR CART (<span class="numbCart"></span>)</h3>
				<ul class="lstCart">
				<?php
					foreach($curr_cart as $mydata)
					{
						// var_dump($mydata);
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
						$img_label = wp_get_attachment_image_src($thumb,'full');
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
						<p class="thumb"><img src="<?php echo thumbCrop($img_label[0],150,150); ?>" class="" alt="<?php echo $post->post_title; ?>"></p>	
						<div class="info">
							<p class="name"><a href="<?php the_permalink(); ?>"><?php echo $post->post_title; ?></a></p>
							<table>
								<tr>
									<th>SKU</th>
									<td><?php the_field('cf_sku'); ?></td>
								</tr>
								<?php if($mydata->size!='') { ?>
								<tr>
									<th>SIZE</th>
									<td><?php echo $mydata->size; ?></td>
								</tr>
								<?php } ?>
								<?php if($mydata->color!='') { ?>
								<tr>
									<th>COLOUR</th>
									<td><span style="background:#<?php echo $mydata->color ?>"></span></td>
								</tr>
								<?php } ?>
								<?php if($mydata->shaft!='') { ?>
								<tr>
									<th>SHAFT</th>
									<td><?php echo $mydata->shaft ?></td>
								</tr>
								<?php } ?>
								<?php if($mydata->flex!='') { ?>
								<tr>
									<th>FLEX</th>
									<td><?php echo $mydata->flex ?></td>
								</tr>
								<?php } ?>
								<?php if($mydata->loft!='') { ?>
								<tr>
									<th>LOFT</th>
									<td><?php echo $mydata->loft ?></td>
								</tr>
								<?php } ?>		
								<tr>
									<th>QTY</th>
									<td class="qtyNumb"><?php echo $mydata->quantity; ?></td>
								</tr>
								<tr>
									<th>PRICE</th>
									<td><?php echo number_format($price); ?>₫</td>
								</tr>
								<tr>
									<th class="totalCost">SUB TOTAL</th>
									<td class="totalCost"><?php echo number_format($price * $mydata->quantity); ?> Đ</td>
								</tr>
							</table>
							<a href="javascript:void(0)" class="btnRemove removeItem" data-id="<?php echo $post->ID; ?>">REMOVE</a>
						</div>
					</li>
					<?php endwhile;endif; ?>
        			<?php } ?>
				</ul>
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
					</table>
				</div>
			</div>

			<div class="boxBtn">
				<a href="javascript:goBack()" class="btnSite"><i class="fa fa-arrow-left" aria-hidden="true"></i>CONTINUE SHOPPING</a>
				<a href="<?php echo APP_URL; ?>checkout" class="btnSite btnSite--blue">CHECKOUT <i class="fa fa-arrow-right" aria-hidden="true"></i></a>
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
function goBack() {
    window.history.back();
}
</script>
<!--/wrapper-->
<!--===================================================-->
</body>
</html>	
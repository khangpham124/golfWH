<?php /* Template Name: New Arrival */ ?>
<?php
include($_SERVER["DOCUMENT_ROOT"] . "/app_config.php");
include(APP_PATH."libs/head.php"); 
?>
<link rel="stylesheet" href="<?php echo APP_URL;?>common/css/slick.css">
</head>

<body id="newsp">
<!--===================================================-->
<div id="wrapper">
<!--===================================================-->

<!--Header-->
<?php include(APP_PATH."libs/header.php"); ?>
<!--/Header-->

<div class="maxW">
	<ul class="break clearfix">
		<li><a href="">Home</a></li>
		<li>New Arrival</li>
	</ul>
	
	<ul class="lstProTop lstProTop--noSlide flexBox flexBox--top flexBox--start flexBox--wrap listCate">
	<?php 
		$wp_query = new WP_Query();
		$param = array (
		'posts_per_page' => '12',
		'post_type' => array('accessories','bag','shoes','clubs','apparel'),
		'post_status' => 'publish',
		'orderby'   => 'rand',
		'meta_query' => array(
			array(
			'key' => 'cf_product_type',
			'value' => 'new arrival',
			'compare' => 'LIKE'
			))
		);
		$wp_query->query($param);
		if($wp_query->have_posts()): while($wp_query->have_posts()) :$wp_query->the_post();
		$thumb_url = get_post_thumbnail_id($post->ID);
		$thumb_img = wp_get_attachment_image_src($thumb_url,'full');
		$sale_stt = get_field('sale');
		$price_real = get_field('cf_price');
		$percent = (get_field('cf_cost') / 100);
		if($sale_stt!='') {
		$classSale = 'saleoff';
		$price = $price_real - ($price_real * $percent);
		} else {
		$price = get_field('cf_price');
		$classSale = '';
		}
		?>
		<li>
			<div class="wrap">
				<p class="thumb"><img src="<?php echo thumbCrop($thumb_img[0],230,230); ?>" class="" alt=""></p>
				<p class="title matchHeight"><a href=""><?php the_title(); ?></a></p>
        <p class="price <?php echo $classSale; ?>"><?php echo number_format($price_real); ?> VND 
        <?php if($sale_stt!='') { ?>
          <span>-<?php echo get_field('cf_cost') ?>%</span>
        <?php } ?>
        </p>
        <?php if($sale_stt!='') { ?>
          <p class="priceOff"><?php echo number_format($price); ?> VND</p>
        <?php } ?>
				<a href="<?php the_permalink(); ?>" class="btn">VIEW MORE</a>
			</div>
		</li>
	<?php endwhile;endif; ?>
	</ul>
	<?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); } ?>
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
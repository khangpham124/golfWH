<?php /* Template Name: Search */ ?>
<?php
include($_SERVER["DOCUMENT_ROOT"] . "/app_config.php");
include(APP_PATH."libs/head.php"); 
?>
<link rel="stylesheet" href="<?php echo APP_URL;?>common/css/slick.css">
</head>

<body id="search">
<!--===================================================-->
<div id="wrapper">
<!--===================================================-->

<!--Header-->
<?php include(APP_PATH."libs/header.php"); ?>
<!--/Header-->
<?php 
	$search_term = $_GET['search']; 
	$search_pt = $_GET['pt']; 
?>
<div class="maxW">
	<ul class="break clearfix">
		<li><a href="<?php echo APP_URL; ?>">Home</a></li>
		<li>Search</li>
	</ul>
	<?php 
		$arr_pt = array();
		$wp_query = new WP_Query();
		$param = array (
		's' => $search_term,	
		'posts_per_page' => '-1',
		'post_type' => array('accessories','bag','shoes','clubs','apparel'),
		'post_status' => 'publish',
		'orderby'   => 'rand',
		);
		$wp_query->query($param);
		$numb_result = count($wp_query->query($param));
		while($wp_query->have_posts()) :$wp_query->the_post();
		$posttype = get_post_type();
		$arr_pt[] = $posttype; 
		endwhile;
		$counts = array_count_values($arr_pt);
	?>


	<h2 class="h2_cate">Search Result : <?php echo $search_term; ?> (<?php echo $numb_result; ?> items)</h2>
	<ul class="listCount flexBox flexBox--center">
		<?php if($counts['accessories'] > 0) { ?>
			<li><a href="<?php echo APP_URL; ?>search/?search=<?php echo $search_term; ?>&pt=accessories">accessories(<?php echo $counts['accessories'] ?>)</a></li>
		<?php } ?>
		<?php if($counts['bag'] > 0) { ?>
			<li><a href="<?php echo APP_URL; ?>search/?search=<?php echo $search_term; ?>&pt=bag">bag(<?php echo $counts['bag'] ?>)</a></li>
		<?php } ?>
		<?php if($counts['shoes'] > 0) { ?>
			<li><a href="<?php echo APP_URL; ?>search/?search=<?php echo $search_term; ?>&pt=shoes">shoes(<?php echo $counts['shoes'] ?>)</a></li>
		<?php } ?>
		<?php if($counts['clubs'] > 0) { ?>
			<li><a href="<?php echo APP_URL; ?>search/?search=<?php echo $search_term; ?>&pt=accesclubssories">clubs(<?php echo $counts['clubs'] ?>)</a></li>
		<?php } ?>
		<?php if($counts['apparel'] > 0) { ?>
			<li><a href="<?php echo APP_URL; ?>search/?search=<?php echo $search_term; ?>&pt=apparel">apparel(<?php echo $counts['apparel'] ?>)</a></li>
		<?php } ?>
	</ul>
	<ul class="lstProTop lstProTop--noSlide flexBox flexBox--top flexBox--start flexBox--wrap listCate flexBox--stretch">
				<?php
					$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
					$wp_query = new WP_Query();
					if($search_pt=='') {
						$param = array (
						's' => $search_term,	
						'posts_per_page' => '-1',
						'post_type' => array('accessories','bag','shoes','clubs','apparel'),
						'post_status' => 'publish',
						'order' => 'DESC',
						'paged' => $paged,
						);
					} else {
						$param = array (
							's' => $search_term,	
							'posts_per_page' => '-1',
							'post_type' => $search_pt,
							'post_status' => 'publish',
							'order' => 'DESC',
							'paged' => $paged,
							);
					}
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
					<div class="wrap matchHeight">
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
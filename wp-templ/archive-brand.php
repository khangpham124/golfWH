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
		<li><a href="<?php echo APP_URL; ?>">Home</a></li>
		<li>Shop by Brand</li>
	</ul>
	<?php 
		$postype = 'brand';
	?>
	<ul class="lstLogo flexBox flexBox--wrap flexBox--center">
		<?php
			$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
			query_posts($query_string . '&orderby=post_date&order=desc&posts_per_page=-1&paged=' . $paged); 
			if(have_posts()):while(have_posts()) : the_post();
			$thumb_url = get_post_thumbnail_id($post->ID);
			$thumb_img = wp_get_attachment_image_src($thumb_url,'full');
		?>
		<li><a href="<?php echo APP_URL; ?>brand/?brand=<?php echo $post->post_name; ?>"><img src="<?php echo $thumb_img[0]; ?>" class="" alt="<?php the_title(); ?>"></a></li>
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
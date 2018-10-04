<?php
include($_SERVER["DOCUMENT_ROOT"] . "/app_config.php");
include(APP_PATH."libs/head.php"); 
?>
<link rel="stylesheet" href="<?php echo APP_URL;?>common/css/slick.css">
</head>

<body id="top">
<!--===================================================-->
<div id="wrapper">
<!--===================================================-->

<!--Header-->
<?php include(APP_PATH."libs/header.php"); ?>
<!--/Header-->

<div id="sliderTop">
	<ul class="slider">
		<li><a href=""><img src="<?php echo APP_URL; ?>img/top/bnr_1.jpg" class="imgMax" alt=""></a></li>
		<li><a href=""><img src="<?php echo APP_URL; ?>img/top/bnr_2.jpg" class="imgMax" alt=""></a></li>
		<li><a href=""><img src="<?php echo APP_URL; ?>img/top/bnr_3.jpg" class="imgMax" alt=""></a></li>
		<li><a href=""><img src="<?php echo APP_URL; ?>img/top/bnr_4.jpg" class="imgMax" alt=""></a></li>
	</ul>
</div>

<div class="maxW">
	<h2 class="h2_page">NEW <span>ARRIVAL</span></h2>
	<ul class="lstProTop lstProTop--noSlide flexBox flexBox--top flexBox--start flexBox--wrap listCate" id="slideNew">
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
						),
						)
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
						<p class="title"><a href=""><?php the_title(); ?></a></p>
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

<div class="bannerImg">
	<img src="<?php echo APP_URL; ?>img/top/banner.jpg" class="" alt="">
</div>

<div class="maxW">
	<h2 class="h2_page">TOP <span>SELLER</span></h2>
	<ul class="lstProTop lstProTop--noSlide flexBox flexBox--top flexBox--start flexBox--wrap">
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
							'value' => 'top seller',
							'compare' => 'LIKE'
						),
						)
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
						<p class="price <?php echo $classSale; ?>">
							<em><?php echo number_format($price_real); ?> VND </em>
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

	<h2 class="h2_page h2_page--grey">AUTHORIZED DEALER<br class="sp">
	OF THE BEST BRANDS</h2>
	<ul class="lstLogo">
		<?php
				$wp_query = new WP_Query();
				$param = array (
				'posts_per_page' => '-1',
				'post_type' => 'brand',
				'post_status' => 'publish',
				'order' => 'DESC',
				'paged' => $paged,
				);
				$wp_query->query($param);
				if($wp_query->have_posts()): while($wp_query->have_posts()) :$wp_query->the_post();
				$thumb_img = get_post_thumbnail_id($post->ID);
				$thumb_url = wp_get_attachment_image_src($thumb_img,'full');
			?>
			<li><a href="<?php echo APP_URL; ?>brand/?brand=<?php echo $post->post_name; ?>"><img src="<?php echo thumbCrop($thumb_url[0],0,60); ?>" class="<?php the_title(); ?>" alt=""></a></li>
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
<script src="<?php echo APP_URL; ?>common/js/slick.js"></script>
<script>
$('.slider').slick({
  dots: false,
  infinite: true,
  speed: 1100,
  autoplay: true,
  autoplaySpeed: 3000,
  slidesToShow: 1,
  slidesToScroll: 1,
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
        infinite: true,
        dots: false
      }
    },
    {
      breakpoint: 767,
      settings: {
				arrows: false,
        slidesToShow: 1,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
				arrows: false,
        slidesToScroll: 1
      }
    }
  ]
});

$('#slideNew').slick({
  dots: false,
  infinite: true,
  speed: 800,
  autoplay: true,
  autoplaySpeed: 3500,
  slidesToShow: 3,
  slidesToScroll: 1,
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
        infinite: true,
        dots: false
      }
    },
    {
      breakpoint: 767,
      settings: {
				arrows: false,
        slidesToShow: 1,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
				arrows: false,
        slidesToScroll: 1
      }
    }
  ]
});

$('.lstLogo').slick({
  dots: false,
  infinite: true,
  speed: 800,
  autoplay: true,
  autoplaySpeed: 2500,
  arrows: false,
  slidesToShow: 6,
  slidesToScroll: 1,
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
        infinite: true,
        dots: false
      }
    },
    {
      breakpoint: 767,
      settings: {
				arrows: false,
        slidesToShow: 1,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
				arrows: false,
        slidesToScroll: 1
      }
    }
  ]
});

</script>
</body>
</html>	
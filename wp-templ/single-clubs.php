<?php
include($_SERVER["DOCUMENT_ROOT"] . "/app_config.php");
$titlepage = $post->post_title.' | Golf-WareHouse | Golf Shop - Gậy golf, Quần golf, Áo golf, Giầy golf, Mũ Golf';
$desPage = get_the_excerpt();
$thumb_url = get_post_thumbnail_id($post->ID);
$thumb_img = wp_get_attachment_image_src($thumb_url,'full');
$fb_img = $thumb_img[0];
include(APP_PATH."libs/head.php"); 
?>
<link rel="stylesheet" href="<?php echo APP_URL;?>common/css/slick.css">
</head>

<body id="category" class="clubs-show">
<!--===================================================-->
<div id="wrapper">
<!--===================================================-->

<!--Header-->
<?php include(APP_PATH."libs/header.php"); ?>
<!--/Header-->

<div class="maxW">
	<div class="taR">
		<ul class="break clearfix">
			<li><a href="<?php echo APP_URL; ?>">Home</a></li>
			<li><a href="<?php echo APP_URL; ?><?php echo get_post_type(); ?>"><?php echo get_post_type(); ?></a></li>
			<li><?php the_title(); ?></li>
		</ul>
	</div>
	<?php 
		$postype = 'clubs';
		$cateType = 'clubscat'; 
	?>
	<div class="clearfix contentDetail">
		<?php include(APP_PATH."libs/sidebar.php"); ?>
		<div class="rightSide">
			<h2 class="h2_cate"><?php the_title(); ?></h2>
			<div class="flexBox flexBox--wrap flexBox--top flexBox--between">
				<div class="slidePro">
					<?php
					$i=0;
					$hascolor = count(get_field('cf_color'));
					while(has_sub_field('cf_color')):
					$i++;
					?>
					<div class="colorContent chosecolor<?php echo $i; ?>">
					<ul class="slider-for" id="slide<?php echo $i; ?>">
						<?php
						while(has_sub_field('image')):
						$image = wp_get_attachment_image_src(get_sub_field('img'),'full');
						?>
						<li><img src="<?php echo $image[0]; ?>" class="" alt=""></li>
						<?php endwhile; ?>
					</ul>

					<ul class="slider-nav" id="slide_nav<?php echo $i; ?>">
						<?php
						while(has_sub_field('image')):
						$image = wp_get_attachment_image_src(get_sub_field('img'),'full');
						?>
						<li><img src="<?php echo $image[0]; ?>" class="" alt=""></li>
						<?php endwhile; ?>
					</ul>
					</div>
					<?php endwhile; ?>
				</div>
				<div class="infoPro">
					<?php
						$sale_stt = get_field('sale');
						$price_real = get_field('cf_price');
						$percent = (get_field('cf_cost') / 100);
						if($sale_stt!='') {
							$classSale = 'infoPro--saleoff';
							$price = $price_real - ($price_real * $percent);
						} else {
							$price = get_field('cf_price');
						}
					?>
					<p class="infoPro--price <?php echo $classSale ?>"><?php echo number_format($price_real); ?> VND</p>
					<?php if($sale_stt!='') { ?>
					<p class="infoPro--price">
						<span>-<?php echo get_field('cf_cost') ?>%</span><br>
						<?php echo number_format($price); ?> VND</p>
					<?php } ?>

					<p class="infoPro--sku">SKU Code : <?php echo get_field('cf_sku'); ?></p>
					<p class="infoPro--label">Specifications</p>
					<div class="colorPart choseWrap">
						
						<?php
						$c=0;
						while(has_sub_field('cf_color')):
						$quan =	get_sub_field('quantity');
						$c++;
						?>
						<?php if(get_sub_field('shaft')) { ?>
						<p class="txtTech">Shaft</p>
						<div class="sizePart choseWrap shaftPart">	
							<?php while(has_sub_field('shaft')): ?>	
							<p class="wrapRad <?php if($quan==0) { ?>soldOut<?php } ?>"><input type="radio" name="shaftChose" id="shaftChose" class="radChose shaftChose" value="<?php echo get_sub_field('info') ?>"><?php echo get_sub_field('info') ?></p>	
							<?php endwhile; ?>
						</div>
						<?php } ?>
						<?php if(get_sub_field('flex')) { ?>
						<p class="txtTech">Flex</p>
						<div class="sizePart choseWrap flexPart">
						<?php while(has_sub_field('flex')): ?>	
						<p class="wrapRad <?php if($quan==0) { ?>soldOut<?php } ?>"><input type="radio" name="flexChose" id="flexChose" class="radChose flexChose" value="<?php echo get_sub_field('info') ?>"><?php echo get_sub_field('info') ?></p>		
						<?php endwhile; ?>
						</div>
						<?php } ?>
						
						<?php if(get_sub_field('loft')) { ?>
						<p class="txtTech">Loft</p>
						<div class="sizePart choseWrap loftPart">
						<?php while(has_sub_field('loft')): ?>	
						<p class="wrapRad <?php if($quan==0) { ?>soldOut<?php } ?>"><input type="radio" name="loftChose" id="loftChose" class="radChose loftChose" value="<?php echo get_sub_field('info') ?>"><?php echo get_sub_field('info') ?></p>		
						<?php endwhile; ?>
						</div>
						<?php } ?>
						<?php endwhile; ?>
						
					</div>
					<?php include(APP_PATH."libs/boxShared.php"); ?>
					<p class="infoPro--label">Quantity</p>
					<div class="numbers-row clearfix">
						<div class='inc button cal' rel='+' ><i class="fa fa-plus" aria-hidden="true"></i></div>
						<div class='dec button cal' id='dec'><i class="fa fa-minus" aria-hidden="true"></i></div>
						<input type="text" id="quantity" class="input_cal" readonly  value="1"> 
					</div>
					<?php if($price_real != 0) {?>
						<a href="javascript:void(0)" class="infoPro--btn addToCart-clubs" data-id="<?php echo $post->ID; ?>" data-price="<?php echo $price; ?>" data-title="<?php echo $post->post_title; ?>" data-sku="<?php echo get_field('cf_sku'); ?>">ADD TO CART</a>
					<?php } else { ?>
						<a href="tel:<?php echo $hotline; ?>" class="infoPro--btn"><i class="fa fa-phone" aria-hidden="true"></i>CALL</a>	
					<?php } ?>	
				</div>
			</div>

			<?php
			if($post->post_content !='') {
			?>
			<div class="tabBox">
				<ul class="tabList">
					<li>DESCRIPTION</li>
				</ul>
				<div class="flexBox  flexBox--between flexBox--wrap">
					<div class="leftInfo">
						<table class="techNumb">
							<?php if(get_field('cf_length')) { ?>
							<tr>
								<th>Length</th>
								<td><?php echo get_field('cf_length'); ?></td>
							</tr>
							<?php } ?>
							<?php if(get_field('cf_head')) { ?>
							<tr>
								<th>Head</th>
								<td><?php echo get_field('cf_head'); ?></td>
							</tr>
							<?php } ?>
							<?php if(get_field('cf_makeup')) { ?>
							<tr>
								<th>Makeup</th>
								<td><?php echo get_field('cf_makeup'); ?></td>
							</tr>
							<?php } ?>
						</table>
					</div>
					<div class="tabContent" id="tab1"><?php echo $post->post_content; ?></div>
				</div>
			</div>	
			<?php } ?>
		</div>
	</div>
	<?php include(APP_PATH."libs/related_products.php"); ?>
</div>	

<!--Footer-->
<?php include(APP_PATH."libs/footer.php"); ?>
<!--/Footer-->
<!--===================================================-->
</div>
<!--/wrapper-->
<!--===================================================-->
<script type="text/javascript" src="<?php echo APP_URL; ?>common/js/addcart-clubs.js"></script>
<script src="<?php echo APP_URL; ?>common/js/slick.js"></script>
<script>
$(function(){
	$(".button").click(function() {
		var $button = $(this);
		var oldValue = $button.parent().find("input").val();
		if ($button.attr("rel") == '+') {
			var newVal = parseFloat(oldValue) + 1;
		} else {
			if (oldValue > 0) {
				var newVal = parseFloat(oldValue) - 1;
			} else {
				newVal = 0;
			}
		}
		$button.parent().find("input").val(newVal);
	});
	$('.chosecolor1').addClass('active');
	$(".wrapColor").click(function() {
		var idCL = $(this).attr('data-color');
		$('.colorContent').removeClass('active');
		$('.sizeContent').removeClass('active');
		$('.'+idCL).addClass('active');
		$(this).find('.radChose').prop("checked", true);
	});

	$(".wrapRad").click(function() {
		$(this).parent().find(".wrapRad").removeClass('chose');
		$(this).toggleClass('chose');
		$(this).find('.radChose').prop("checked", true);
	});
	$('.lstProTop').slick({
	dots: false,
	infinite: true,
	speed: 800,
	autoplay: true,
	autoplaySpeed: 3000,
	slidesToShow: 4,
	slidesToScroll: 1,
	responsive: [
		{
		breakpoint: 1130,
		settings: {
			slidesToShow: 3,
			slidesToScroll: 1,
			infinite: true,
			arrows: false,
			dots: false
		}
		},
		{
		breakpoint: 768,
		settings: {
			arrows: false,
			slidesToShow: 3,
			slidesToScroll: 1
		}
		},
		{
		breakpoint: 480,
		settings: {
			slidesToShow: 2,
					arrows: false,
			slidesToScroll: 1
		}
		}
	]
	});

	<?php for($u=0;$u<=$hascolor;$u++) { ?>
		$('#slide<?php echo $u; ?>').slick({
			slidesToShow: 1,
			slidesToScroll: 1,
			arrows: false,
			fade: true,
			asNavFor: '#slide_nav<?php echo $u; ?>'
		});
		$('#slide_nav<?php echo $u; ?>').slick({
			slidesToShow: 3,
			slidesToScroll: 1,
			asNavFor: '#slide<?php echo $u; ?>',
			centerMode: true,
			focusOnSelect: true
		});
	<?php } ?>
});
</script>
</body>
</html>	
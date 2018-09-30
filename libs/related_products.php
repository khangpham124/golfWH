<h2 class="h2_cate">YOU MAY ALSO LIKE</h2>
<ul class="lstProTop" id="slideNew">
    <?php 
    $wp_query = new WP_Query();
    $param = array (
    'posts_per_page' => '6',
    'post_type' => $postype,
    'post_status' => 'publish',
    'orderby'   => 'rand',
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
                <?php if($thumb_img[0]) { ?>
                <p class="thumb"><img src="<?php echo thumbCrop($thumb_img[0],300,300); ?>" class="" alt=""></p>
                <?php } ?>
                <p class="title"><a href=""><?php the_title(); ?></a></p>
        <p class="price <?php echo $classSale; ?>">
            <em><?php echo number_format($price_real); ?> VND</em>
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
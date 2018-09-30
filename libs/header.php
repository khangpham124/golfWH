<!--Google Tag Manager-->
	
<!--End Google Tag Manager-->

<header id="header">
    <div class="headBar">
        <div class="inner flexBox flexBox--center flexBox--between">
        <ul class="infoShop">
            <li><i class="fa fa-map-marker" aria-hidden="true"></i><?php echo $address; ?></li>
            <li><i class="fa fa-clock-o" aria-hidden="true"></i><?php echo $hours; ?></li>
        </ul>
        <div class="right flexBox flexBox--center flexBox--between">
            <ul class="langBar">
                <li><a href="">VIET</a></li>
                <li class="active"><a href="">ENG</a></li>
                <li><a href="">日本語</a></li>
            </ul>
            <a href="<?php echo APP_URL; ?>cart/" class="linkCart"><i class="fa fa-shopping-bag" aria-hidden="true"></i>(<span class="numbCart">0</span>)</a>
        </div>
        </div>
    </div>
    <div class="headerInner flexBox flexBox--between flexBox--center flexBox--wrap">
    <p id="logo"><a href="<?php echo APP_URL; ?>"><img src="<?php echo APP_URL ?>common/img/header/logo.svg"></a></p>
    <div class="rightHead flexBox flexBox--center flexBox--between">
        <form class="formSearch" action="<?php echo APP_URL; ?>search/">
            <div class="wrapSearch">
                <input type="text" id="tags" name="search" placeholder="Search item...">
                <button type="submit" class="submitBtn"><img src="<?php echo APP_URL ?>common/img/header/icon_loop@w.svg"></button>
            </div>
        </form>
        <p class="headHotline"><i class="fa fa-phone" aria-hidden="true"></i><?php echo $hotline; ?></p>
    </div>
    
    <div class="sp">
        <a href="tel:<?php echo $hotline; ?>" class="callSP"><i class="fa fa-phone" aria-hidden="true"></i></a>
        <a href="<?php echo APP_URL; ?>cart/" class="linkCart"><i class="fa fa-shopping-bag" aria-hidden="true"></i>(<span class="numbCart">0</span>)</a>
        <button class="hamburger hamburger--collapse" type="button">
        <span class="hamburger-box">
            <span class="hamburger-inner"></span>
        </span>
        </button>
    </div>
    
    </div>
    <nav class="naviWrap pc">
    <ul class="gNavi flexBox flexBox--center flexBox--arround">
        <li><a href="<?php echo APP_URL; ?>new-arrival/">NEW ARRIVAL</a></li>
        <li><a href="<?php echo APP_URL; ?>sale/">SALE</a></li>
        <li><a href="<?php echo APP_URL; ?>clubs/">GOLF CLUBS </a>
            <div class="wrapList">
                <ul class="subNavi flexBox flexBox--center flexBox--wrap">
                    <?php
                        $args=array(
                        'child_of' => 0,
                        'orderby' =>'ID',
                        'order' => 'DESC',
                        'hide_empty' => 0,
                        'taxonomy' => 'clubscat',
                        'number' => '0',
                        'pad_counts' => false
                        );
                        $categories = get_categories($args);
                        foreach ( $categories as $category ) {
                        $slug = $category->slug;
                        $image_cat = wp_get_attachment_image_src(get_field('category_image','clubscat_'.$category->term_id.''),'full');

                    ?>
                    <li><a href="<?php echo get_term_link($slug,'clubscat');?>">
                        <?php if($image_cat!='') { ?>
                            <img src="<?php echo thumbCrop($image_cat[0],70,70) ?>" alt="">
                        <?php } ?></a> 
                        <div class="name">
                            <?php echo $category->name; ?>
                            <p><a href="<?php echo get_term_link($slug,'clubscat');?>">View more</a></p>
                        </div>  
                    </li>
                    <?php } ?>
                </ul>
            </div>
        </li>
        <li><a href="<?php echo APP_URL; ?>bag">GOLF BAGS </a>
            <div class="wrapList">
                <ul class="subNavi flexBox flexBox--center flexBox--wrap">
                    <?php
                        $args=array(
                        'child_of' => 0,
                        'orderby' =>'ID',
                        'order' => 'DESC',
                        'hide_empty' => 0,
                        'taxonomy' => 'bagcat',
                        'number' => '0',
                        'pad_counts' => false
                        );
                        $categories = get_categories($args);
                        foreach ( $categories as $category ) {
                        $slug = $category->slug;
                        $image_cat = wp_get_attachment_image_src(get_field('category_image','bagcat_'.$category->term_id.''),'full');

                    ?>
                    <li><a href="<?php echo get_term_link($slug,'bagcat');?>">
                        <?php if($image_cat!='') { ?>
                            <img src="<?php echo thumbCrop($image_cat[0],70,70) ?>" alt="">
                        <?php } ?></a> 
                        <div class="name">
                            <?php echo $category->name; ?>
                            <p><a href="<?php echo get_term_link($slug,'bagcat');?>">View more</a></p>
                        </div>  
                    </li>
                    <?php } ?>
                </ul>
            </div>
        </li>
        <li><a href="<?php echo APP_URL; ?>shoes/">GOLF SHOES</a>
            <div class="wrapList">
                <ul class="subNavi flexBox flexBox--center flexBox--wrap">
                    <?php
                        $args=array(
                        'child_of' => 0,
                        'orderby' =>'ID',
                        'order' => 'DESC',
                        'hide_empty' => 0,
                        'taxonomy' => 'shoescat',
                        'number' => '0',
                        'pad_counts' => false
                        );
                        $categories = get_categories($args);
                        foreach ( $categories as $category ) {
                        $slug = $category->slug;
                        $image_cat = wp_get_attachment_image_src(get_field('category_image','shoescat_'.$category->term_id.''),'full');

                    ?>
                    <li><a href="<?php echo get_term_link($slug,'shoescat');?>">
                        <?php if($image_cat!='') { ?>
                            <img src="<?php echo thumbCrop($image_cat[0],70,70) ?>" alt="">
                        <?php } ?></a> 
                        <div class="name">
                            <?php echo $category->name; ?>
                            <p><a href="<?php echo get_term_link($slug,'shoescat');?>">View more</a></p>
                        </div>  
                    </li>
                    <?php } ?>
                </ul>
            </div>
        </li>
        <li><a href="<?php echo APP_URL; ?>apparel/">APPAREL </a>
            <div class="wrapList">
                <ul class="subNavi flexBox flexBox--center flexBox--wrap">
                    <?php
                        $args=array(
                        'child_of' => 0,
                        'orderby' =>'ID',
                        'order' => 'DESC',
                        'hide_empty' => 0,
                        'taxonomy' => 'typecat',
                        'number' => '0',
                        'pad_counts' => false
                        );
                        $categories = get_categories($args);
                        foreach ( $categories as $category ) {
                        $slug = $category->slug;
                        $image_cat = wp_get_attachment_image_src(get_field('category_image','typecat_'.$category->term_id.''),'full');

                    ?>
                    <li><a href="<?php echo get_term_link($slug,'typecat');?>">
                        <?php if($image_cat!='') { ?>
                            <img src="<?php echo thumbCrop($image_cat[0],70,70) ?>" alt="">
                        <?php } ?></a> 
                        <div class="name">
                            <?php echo $category->name; ?>
                            <p><a href="<?php echo get_term_link($slug,'typecat');?>">View more</a></p>
                        </div>  
                    </li>
                    <?php } ?>
                </ul>
            </div>
        </li>
        <li><a href="<?php echo APP_URL; ?>accessories/">ACCESSORIES </a>
            <div class="wrapList">
                <ul class="subNavi flexBox flexBox--center flexBox--wrap">
                    <?php
                        $args=array(
                        'child_of' => 0,
                        'orderby' =>'ID',
                        'order' => 'DESC',
                        'hide_empty' => 0,
                        'taxonomy' => 'accessoriescat',
                        'number' => '0',
                        'pad_counts' => false
                        );
                        $categories = get_categories($args);
                        foreach ( $categories as $category ) {
                        $slug = $category->slug;
                        $image_cat = wp_get_attachment_image_src(get_field('category_image','accessoriescat_'.$category->term_id.''),'full');

                    ?>
                    <li><a href="<?php echo get_term_link($slug,'accessoriescat');?>">
                        <?php if($image_cat!='') { ?>
                            <img src="<?php echo thumbCrop($image_cat[0],70,70) ?>" alt="">
                        <?php } ?></a> 
                        <div class="name">
                            <?php echo $category->name; ?>
                            <p><a href="<?php echo get_term_link($slug,'accessoriescat');?>">View more</a></p>
                        </div>  
                    </li>
                    <?php } ?>
                </ul>
            </div>
        </li>
        <li><a href="<?php echo APP_URL; ?>brand/">SHOP BY BRAND </a></li>
        <li><a href="<?php echo APP_URL; ?>event">EVENT</a></li>
        
    </ul>
</nav>
</header>

<div class="subMenu">
    <!-- <ul class="langBar">
        <li class="active"><a href="">English</a></li>
        <li><a href="">Vietnamese</a></li>
    </ul> -->
    <ul class="menuList">
        <li><a href="<?php echo APP_URL; ?>new-arrival/">NEW ARRIVAL</a></li>
        <li><a href="<?php echo APP_URL; ?>sale/">SALE</a></li>
        <li><a href="<?php echo APP_URL; ?>clubs/">GOLF CLUBS </a></li>
        <li><a href="<?php echo APP_URL; ?>bag/">GOLF BAGS </a></li>
        <li><a href="<?php echo APP_URL; ?>shoes/">GOLF SHOES </a></li>
        <li><a href="<?php echo APP_URL; ?>apparel">APPAREL </a></li>
        <li><a href="<?php echo APP_URL; ?>accessories">ACCESSORIES </a></li>
        <li><a href="<?php echo APP_URL; ?>brand">SHOP BY BRAND </a></li>
        <li><a href="<?php echo APP_URL; ?>event">EVENT</a></li>
    </ul>
</div>

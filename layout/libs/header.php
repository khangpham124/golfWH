<!--Google Tag Manager-->
	
<!--End Google Tag Manager-->

<header id="header">
    <div class="headBar">
        <div class="inner flexBox flexBox--center flexBox--between">
        <ul class="infoShop">
            <li><i class="fa fa-envelope-o" aria-hidden="true"></i>email@mail.com</li>
        </ul>
        <div class="right flexBox flexBox--center flexBox--between">
            <ul class="langBar">
                <li><a href="">VIET</a></li>
                <li class="active"><a href="">ENG</a></li>
                <li><a href="">日本語</a></li>
            </ul>
            <a href="" class="linkCart"><i class="fa fa-shopping-bag" aria-hidden="true"></i>(0)</a>
        </div>
        </div>
    </div>
    <div class="headerInner flexBox flexBox--between flexBox--center flexBox--wrap">
    <p id="logo"><a href="<?php echo APP_URL; ?>"><img src="<?php echo APP_URL ?>common/img/header/logo.svg"></a></p>
    <div class="rightHead flexBox flexBox--center flexBox--between">
        <form class="formSearch">
            <div class="wrapSearch">
                <input type="text" name="search" placeholder="Search item...">
                <button type="submit" class="submitBtn"><img src="<?php echo APP_URL ?>common/img/header/icon_loop@w.svg"></button>
            </div>
        </form>
        <p class="headHotline"><i class="fa fa-phone" aria-hidden="true"></i><?php echo $hotline; ?></p>
    </div>
    
    <div class="sp">
        <a href="" class="btnContact_sp"><img src="<?php echo APP_URL ?>common/img/header/btn_contact.jpg"></a>
        <button class="hamburger hamburger--collapse" type="button">
        <span class="hamburger-box">
            <span class="hamburger-inner"></span>
        </span>
        </button>
    </div>
    
    </div>
    <nav class="naviWrap">
    <ul class="gNavi flexBox flexBox--center flexBox--arround">
        <li><a href="<?php echo APP_URL; ?>new-arrival">NEW ARRIVAL</a></li>
        <li><a href="">GOLF CLUBS </a>
            <ul class="subNavi">
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
                ?>
                <li><i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i><a href=""><?php echo $category->name; ?></a></li>
                <?php } ?>
            </ul>
        </li>
        <li><a href="">GOLF BAGS </a></li>
        <li><a href="">GOLF SHOES </a>
            <ul class="subNavi">
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
                ?>
                <li><i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i><a href=""><?php echo $category->name; ?></a></li>
                <?php } ?>
            </ul>
        </li>
        <li><a href="">APPAREL </a>
            <ul class="subNavi">
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
                ?>
                <li><i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i><a href=""><?php echo $category->name; ?></a></li>
                <?php } ?>
            </ul>
        </li>
        <li><a href="">ACCESSORIES </a>
            <ul class="subNavi">
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
                ?>
                <li><i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i><a href=""><?php echo $category->name; ?></a></li>
                <?php } ?>
            </ul>
        </li>
        <li><a href="">CLEARANCE </a></li>
        <li><a href="<?php echo APP_URL; ?>shop-by-brand">SHOP BY BRAND </a></li>
        <li><a href="<?php echo APP_URL; ?>event">EVENT</a></li>
        <li><a href="<?php echo APP_URL; ?>sale">SALE</a></li>
    </ul>
</nav>
</header>

<div class="subMenu">
        <ul class="langBar">
            <li class="active"><a href="">English</a></li>
            <li><a href="">Vietnamese</a></li>
        </ul>
    <ul class="menuList">
        <li><a href="">NEW ARRIVAL</a></li>
        <li><a href="">GOLF CLUBS </a></li>
        <li><a href="">GOLF BAGS </a></li>
        <li><a href="">GOLF SHOES </a></li>
        <li><a href="">APPAREL </a></li>
        <li><a href="">ACCESSORIES </a></li>
        <li><a href="">CLEARANCE </a></li>
        <li><a href="">SHOP BY BRAND </a></li>
        <li><a href="">EVENT</a></li>
        <li><a href="">SALE</a></li>
    </ul>
</div>

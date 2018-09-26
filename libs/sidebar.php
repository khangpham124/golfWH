<aside class="leftSide">
			<h3 class="h3_shop">Shop by type</h3>
				<ul class="lstFilter">
					<?php
						$args=array(
							'child_of' => 0,
							'orderby' =>'ID',
							'order' => 'DESC',
							'hide_empty' => 0,
							'taxonomy' => $cateType,
							'number' => '0',
							'pad_counts' => false
							);
							$categories = get_categories($args);
							foreach ( $categories as $category ):
							$slug = $category->slug;
					?>
					<li><a href="<?php echo get_term_link($slug,$cateType);?>"><?php echo $category->name;  ?></a></li>
					<?php endforeach; ?>
				</ul>
			<h3 class="h3_shop">Shop by Brand</h3>
			<ul class="lstFilter__brand">
				<li><a href=""><img src="<?php echo APP_URL; ?>img/top/logo1.jpg" class="" alt=""></a></li>
				<li><a href=""><img src="<?php echo APP_URL; ?>img/top/logo2.jpg" class="" alt=""></a></li>
				<li><a href=""><img src="<?php echo APP_URL; ?>img/top/logo3.jpg" class="" alt=""></a></li>
				<li><a href=""><img src="<?php echo APP_URL; ?>img/top/logo4.jpg" class="" alt=""></a></li>
				<li><a href=""><img src="<?php echo APP_URL; ?>img/top/logo5.jpg" class="" alt=""></a></li>
				<li><a href=""><img src="<?php echo APP_URL; ?>img/top/logo6.jpg" class="" alt=""></a></li>
				<li><a href=""><img src="<?php echo APP_URL; ?>img/top/logo7.jpg" class="" alt=""></a></li>
				<li><a href=""><img src="<?php echo APP_URL; ?>img/top/logo8.jpg" class="" alt=""></a></li>
				<li><a href=""><img src="<?php echo APP_URL; ?>img/top/logo9.jpg" class="" alt=""></a></li>
				<li><a href=""><img src="<?php echo APP_URL; ?>img/top/logo10.jpg" class="" alt=""></a></li>
				<li><a href=""><img src="<?php echo APP_URL; ?>img/top/logo11.jpg" class="" alt=""></a></li>
				<li><a href=""><img src="<?php echo APP_URL; ?>img/top/logo12.jpg" class="" alt=""></a></li>
				<li><a href=""><img src="<?php echo APP_URL; ?>img/top/logo13.jpg" class="" alt=""></a></li>
			</ul>
		</aside>
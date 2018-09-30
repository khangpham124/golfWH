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
		<li><a href="<?php echo APP_URL; ?>brand/?brand=<?php echo $post->post_name; ?>"><img src="<?php echo $thumb_url[0]; ?>" class="" alt=""></a></li>
		<?php endwhile;endif; ?>
	</ul>
</aside>
<?php wp_reset_query() ?>
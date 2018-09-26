<script src="<?php echo APP_URL; ?>common/js/jquery-ui.js"></script>
<script>
$(function() {
var availableTags = [
<?php 
$wp_query = new WP_Query();
$param = array (
'posts_per_page' => '-1',
'post_type' => array('accessories','bag','shoes','clubs'),
'post_status' => 'publish',
'order' => 'DESC',
'paged' => $paged,
);
$wp_query->query($param);
if($wp_query->have_posts()): while($wp_query->have_posts()) :$wp_query->the_post();
$thumbprod = get_post_thumbnail_id($post->ID);
$thumbprod_url = wp_get_attachment_image_src($thumbprod,'full');
?>
    "<?php the_title(); ?>",
    <?php endwhile; endif; ?>
];
$( "#tags" ).autocomplete({
    source: availableTags
});
});
</script>
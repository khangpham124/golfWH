<?php /* Template Name: Posts */ ?>
<?php
include($_SERVER["DOCUMENT_ROOT"] . "/app_config.php");
include(APP_PATH."libs/head.php"); 
?>
</head>

<body id="about">
<!--===================================================-->
<div id="wrapper">
<!--===================================================-->

<!--Header-->
<?php include(APP_PATH."libs/header.php"); ?>
<!--/Header-->
<div class="mainImg">
    <?php
        $thumb_img = get_post_thumbnail_id($post->ID);
        $thumb_url = wp_get_attachment_image_src($thumb_img,'full');
    ?>
    <img src="<?php echo $thumb_url[0]; ?>" alt="">
</div>

<div class="maxW">
	<ul class="break clearfix">
		<li><a href="<?php echo APP_URL; ?>">Home</a></li>
		<li>About</li>
    </ul>
    <div class="mainText">
    <?php echo $post->post_content; ?>
    </div>
</div>	
<!--Footer-->
<?php include(APP_PATH."libs/footer.php"); ?>
<!--/Footer-->
<!--===================================================-->
</div>
<script>
function goBack() {
    window.history.back();
}
</script>
<!--/wrapper-->
<!--===================================================-->
</body>
</html>	
<?php echo('<?xml version="1.0" encoding="UTF-8"?>'); ?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="format-detection" content="telephone=no">
<!--responsive or smartphone-->
<?php
	// set viewport by user agent.
	require_once 'ua.class.php';
	$ua = new UserAgent();
	if($ua->set() === 'tablet') :
		// set width when you use the tablet
		$width = '1024px';
?>
<meta content="width=<?php echo $width; ?>" name="viewport">
<?php else: ?>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
<?php endif; ?>


<?php include(APP_PATH."libs/argument.php"); ?>
<title><?php echo $titlepage; ?></title>
<meta name="description" content="<?php echo $desPage; ?>">
<meta name="keywords" content="<?php echo $keyPage; ?>">

<!--facebook-->
<meta property="og:title" content="<?php echo $titlepage; ?>">
<meta property="og:type" content="website">
<meta property="og:url" content="<?php echo $_SERVER['REQUEST_URI']; ?>">
<meta property="og:image" content="<?php echo $fb_img; ?>">
<meta property="og:site_name" content="Golf Warehouse">
<meta property="og:description" content="<?php echo $desPage; ?>">
<!--/facebook-->

<!--css-->
<link rel="stylesheet" href="<?php echo APP_URL; ?>common/css/base.css" media="all">
<link rel="stylesheet" href="<?php echo APP_URL; ?>common/css/style.css" media="all">
<link rel="stylesheet" href="<?php echo APP_URL; ?>common/css/media.css" media="all">
<link rel="stylesheet" href="<?php echo APP_URL; ?>common/css/animate.css" media="all">
<link rel="stylesheet" href="<?php echo APP_URL; ?>common/css/hamburgers.css" media="all">
<link rel="stylesheet" href="<?php echo APP_URL; ?>common/css/ui.css" media="all">
<!--/css-->
<link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700&amp;subset=vietnamese" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Lalezar&amp;subset=vietnamese" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<!--favicons-->
<link rel="icon" href="<?php echo APP_URL; ?>common/img/icon/favicon.png" type="image/vnd.microsoft.icon">

<?php
include($_SERVER["DOCUMENT_ROOT"] . "/wp/wp-load.php");
?>

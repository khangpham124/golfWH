<?php
$pagename = str_replace(array('/', '.php', '?s='), '', $_SERVER['REQUEST_URI']);
$pagename = str_replace("wp", '', $_SERVER['REQUEST_URI']);
$pagename = $pagename ? $pagename : 'default';

switch ($pagename) {
    case "aboutus":
		$titlepage = "About us title";
		$desPage = "";
		$keyPage = "";
		$txtH1 = "H1 content for about us";
	break;
	 
    default:
		$titlepage = "Golf-warehouse";			
		$desPage = "";
		$keyPage = "";
		$txtH1 = "H1 Default";
}

$hotline = '0938-813-271';
$address = '28A, đường số 12, kp2, P.Hiệp bình chánh, quận Thủ Đức, TpHCM';
$hours = ' 8:00AM- 18:00 PM';

?>
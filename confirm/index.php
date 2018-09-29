<?php
session_start();
include($_SERVER["DOCUMENT_ROOT"] . "/wp/wp-load.php");
include "class.phpmailer.php"; 
include "class.smtp.php"; 

$fullname = $_POST['fullname'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$grandTotal = $_SESSION['grandTotal'];
$order_code = $_COOKIE['order_gwh'];

$order_post = array(
	'post_title'    => $order_code,
	'post_content'    => $cmt_order,
	'post_status'   => 'publish',
	'post_type' => 'getorder'
);
$pid = wp_insert_post($order_post); 
add_post_meta($pid, 'cf_fullname', $fullname);
add_post_meta($pid, 'cf_email', $email);
add_post_meta($pid, 'cf_phone', $phone);
add_post_meta($pid, 'cf_address', $address);
add_post_meta($pid, 'cf_grand_total', $grandTotal);
add_post_meta($pid, 'cf_order_status', 'in progress');


//LIST PORDUCT
$f_isset = $_SERVER["DOCUMENT_ROOT"].'/ajax/tmp/'.$_COOKIE['order_gwh'].'.json';
$order_detail  = json_decode(file_get_contents($f_isset),true);
$count_product = count($order_detail);
add_post_meta($pid, 'order_list', $count_product, true);
for($i=0;$i<=$count_product;$i++) {
$order_options = 'Chose:'.$order_detail[$i]['option_add'].'(Choose up to sauces:'.$order_detail[$i]['option_list'].')';
$sub_field_name1 = 'order_list'.'_'.$i.'_'.'cf_sku';
$sub_field_name2 = 'order_list'.'_'.$i.'_'.'cf_name';
$sub_field_name3 = 'order_list'.'_'.$i.'_'.'cf_color';
$sub_field_name4 = 'order_list'.'_'.$i.'_'.'cf_size';
$sub_field_name5 = 'order_list'.'_'.$i.'_'.'cf_shaft';
$sub_field_name6 = 'order_list'.'_'.$i.'_'.'cf_flex';
$sub_field_name7 = 'order_list'.'_'.$i.'_'.'cf_loft';
$sub_field_name8 = 'order_list'.'_'.$i.'_'.'cf_quantity';

add_post_meta($pid, $sub_field_name1, $order_detail[$i]['sku'], false);
add_post_meta($pid, $sub_field_name2, $order_detail[$i]['name'], false);
add_post_meta($pid, $sub_field_name3, '#'.$order_detail[$i]['color'], false);
add_post_meta($pid, $sub_field_name4, $order_detail[$i]['size'], false);
add_post_meta($pid, $sub_field_name5, $order_detail[$i]['shaft'], false);
add_post_meta($pid, $sub_field_name6, $order_detail[$i]['flex'], false);
add_post_meta($pid, $sub_field_name7, $order_detail[$i]['loft'], false);
add_post_meta($pid, $sub_field_name8, $order_detail[$i]['quantity'], false);
}

// $mail = new PHPMailer();
// $mail->IsSMTP();
// $mail->Host = "smtp.gmail.com";
// $mail->Port = 465;
// $mail->SMTPAuth = true;
// $mail->SMTPSecure = 'ssl';
// $mail->Username = "khangpham421@gmail.com";
// $mail->Password = "B#*0935416803b";
// $from = "khangpham421@gmail.com";

// $to="teddycoder421@gmail.com";
// $name="GOLF-WAREHOUSE ORDER";

// $mail->From = $from;
// $mail->FromName = "Solarbox.vn System";
// $mail->AddAddress($to,$name);

// //$mail->AddReplyTo($from,"khang test");
// $mail->WordWrap = 50;
// $mail->IsHTML(true);
// $mail->Subject = "Mail FROM GOLF-WAREHOUSE";
// $mail->CharSet = 'UTF-8';
// $mail->Body = "
// <b>Liên hệ</b><br><br>
// ---------------------------------------------------------------<br><br>

// ---------------------------------------------------------------

// ";
// $mail->AltBody = "Mail nay duoc goi bang phpmailer class.";
// //$mail->SMTPDebug = 2;
// if(!$mail->Send())
// {
// 	echo "<h1>" . $mail->ErrorInfo . '</h1>';
// }
// else
// {
// 	echo "<h1>Order Success</h1>";
// }
?>
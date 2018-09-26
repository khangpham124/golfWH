<?php
session_start();
include "class.phpmailer.php"; 
include "class.smtp.php"; 

$fullname = $_POST['fullname'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$grandTotal = $_SESSION['grandTotal'];


$order_post = array(
	'post_title'    => $order_code,
	'post_content'    => $cmt_order,
	'post_status'   => 'publish',
	'post_type' => 'customer_order'
);
$pid = wp_insert_post($order_post); 
add_post_meta($pid, 'cf_email', $email_book);
add_post_meta($pid, 'cf_grand_total', $grandTotal);
add_post_meta($pid, 'cf_payment_method', $payment);
add_post_meta($pid, 'cf_address', $address);
add_post_meta($pid, 'cf_city', $city);
add_post_meta($pid, 'cf_country', $country);
add_post_meta($pid, 'cf_fullname', $fullname);
add_post_meta($pid, 'cf_phone', $phone);
add_post_meta($pid, 'cf_shipping_cost',$shipcost );
add_post_meta($pid, 'paymemnt_status',$paidstt );
add_post_meta($pid, 'pay_information',$pay_info );
add_post_meta($pid, 'cf_order_status', 'in progress');


//LIST PORDUCT
$f_isset = $_SERVER['DOCUMENT_ROOT'].'/ajax/tmp/'.$_COOKIE['order_hod'].'.json';
$order_detail  = json_decode(file_get_contents($f_isset),true);
$count_product = count($order_detail);
add_post_meta($pid, 'cf_order_products_list', $count_product, true);
for($i=0;$i<=$count_product;$i++) {
$order_options = 'Chose:'.$order_detail[$i]['option_add'].'(Choose up to sauces:'.$order_detail[$i]['option_list'].')';
$sub_field_name1 = 'cf_order_products_list'.'_'.$i.'_'.'cf_product_name';
$sub_field_name2 = 'cf_order_products_list'.'_'.$i.'_'.'cf_quantity';
$sub_field_name3 = 'cf_order_products_list'.'_'.$i.'_'.'cf_options';
$sub_field_name4 = 'cf_order_products_list'.'_'.$i.'_'.'cf_note';
add_post_meta($pid, $sub_field_name1, $order_detail[$i]['name'], false);
add_post_meta($pid, $sub_field_name2, $order_detail[$i]['quantity'], false);
add_post_meta($pid, $sub_field_name3, $order_options, false);
add_post_meta($pid, $sub_field_name4, $order_detail[$i]['note'], false);
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
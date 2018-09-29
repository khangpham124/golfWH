<?php
session_start();
// if(!$_COOKIE['order_cookies']) {    
//     header('Location:http://golf-warehouse.vn');
//     die();
// }
// setcookie('incart', '', time() + 86400, "/");
// setcookie('order_cookies','', time() + 86400, "/");
// setcookie('order_gwh','', time() + 86400, "/");

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
$sub_field_name1 = 'order_list'.'_'.$i.'_'.'cf_sku';
$sub_field_name2 = 'order_list'.'_'.$i.'_'.'cf_name';
$sub_field_name3 = 'order_list'.'_'.$i.'_'.'cf_color';
$sub_field_name4 = 'order_list'.'_'.$i.'_'.'cf_size';
$sub_field_name5 = 'order_list'.'_'.$i.'_'.'cf_shaft';
$sub_field_name6 = 'order_list'.'_'.$i.'_'.'cf_flex';
$sub_field_name7 = 'order_list'.'_'.$i.'_'.'cf_loft';
$sub_field_name8 = 'order_list'.'_'.$i.'_'.'cf_quantity';

add_post_meta($pid, $sub_field_name1, $order_detail[$i]['sku'], false);
add_post_meta($pid, $sub_field_name2, get_the_title($order_detail[$i]['id']), false);
add_post_meta($pid, $sub_field_name3, '#'.$order_detail[$i]['color'], false);
add_post_meta($pid, $sub_field_name4, $order_detail[$i]['size'], false);
add_post_meta($pid, $sub_field_name5, $order_detail[$i]['shaft'], false);
add_post_meta($pid, $sub_field_name6, $order_detail[$i]['flex'], false);
add_post_meta($pid, $sub_field_name7, $order_detail[$i]['loft'], false);
add_post_meta($pid, $sub_field_name8, $order_detail[$i]['quantity'], false);

// $curr_count = get_field('cf_color',$order_detail[$i]['id']);
// var_dump($curr_count);
// echo $curr_count[$i]['color_code'];
// update_post_meta();
}

$mail = new PHPMailer();
$mail->IsSMTP();
$mail->Host = "smtp.gmail.com";
$mail->Port = 465;
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'ssl';
$mail->Username = "khangpham421@gmail.com";
$mail->Password = "B#*0935416803b";
$from = "khangpham421@gmail.com";

$to="teddycoder421@gmail.com";
$name="GOLF-WAREHOUSE ORDER";

$mail->From = $from;
$mail->FromName = "GOLF-WAREHOUSE ORDER SYSTEM";
$mail->AddAddress($to,$name);

//$mail->AddReplyTo($from,"khang test");
$mail->WordWrap = 50;
$mail->IsHTML(true);
$mail->Subject = "MAIL FROM GOLF-WAREHOUSE";
$mail->CharSet = 'UTF-8';
$msgBody = "
<p>Fullname : $fullname</p>
<p>Email : $email</p>
<p>Phone : $phone</p>
<p>Address : $address </p>
<p>Order Code : $order_code</p>
<br>
<table style='border:1px solid #000;border-collapse: collapse;border-spacing: 0;'>
	<tr style='font-weight:bold; padding:5px'>
		<td style='border:1px solid #000;padding:5px;text-align:center'>PRODUCTS</td>
		<td style='border:1px solid #000;padding:5px;text-align:center'>PRICE</td>
		<td style='border:1px solid #000;padding:5px;text-align:center'>SIZE</td>
		<td style='border:1px solid #000;padding:5px;text-align:center'>COLOR</td>
		<td style='border:1px solid #000;padding:5px;text-align:center'>QTY</td>
		<td style='border:1px solid #000;padding:5px;text-align:center'>TOTAL</td>
	</tr>
";
for($i=0;$i<=($count_product-1);$i++) {
$tt = $order_detail[$i]['price'] * $order_detail[$i]['quantity'];
$msgBody .= "   
	<tr>
		<td style='border:1px solid #000;padding:5px'>".$order_detail[$i]['name']."</td>
		<td style='border:1px solid #000;padding:5px'>".number_format($order_detail[$i]['price'])."</td>
		<td style='border:1px solid #000;padding:5px'>".$order_detail[$i]['size']."</td>
		<td style='border:1px solid #000;padding:5px'><p style='width:20px;height:20px;background:#".$order_detail[$i]['color']."'</p></td>
		<td style='border:1px solid #000;padding:5px'>".$order_detail[$i]['quantity']."</td>    
		<td style='border:1px solid #000;padding:5px'>".number_format($tt)."VND</td>
	</tr>
";
}
$msgBody .= " 
	<tr>
		<td style='border:1px solid #000;padding:5px;text-align:right' colspan='6'>".number_format($grandTotal)." VND</td>
	</tr>
</table>
";

$mail->Body = $msgBody;
$mail->AltBody = "Mail nay duoc goi bang phpmailer class.";
//$mail->SMTPDebug = 2;
if(!$mail->Send())
{
	echo "<h1>" . $mail->ErrorInfo . '</h1>';
}
else
{
	echo "<h1>Order Success</h1>";
}
?>
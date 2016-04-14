<?php 
include('../inc/database.php');
session_start();

$userId	 = $_SESSION['user_login'];
$title	 = $_POST['message_title_vip_auto'];
$message = $_POST['message_vip_auto'];
$promo 	 = $_POST['vip_promo_auto'];

$chek_auto_message = mysqli_query ($dbh, "SELECT COUNT(1) FROM `auto_message`  WHERE username='$userId'");
$chek_auto_message = mysqli_fetch_array($chek_auto_message);
if($chek_auto_message[0]){
	mysqli_query($dbh, "UPDATE `auto_message` SET `title`='$title',`message`='$message',`promo`='$promo',`number_read`='' WHERE username='$userId';");
}
else {
	mysqli_query ($dbh, "INSERT INTO `auto_message` VALUES ('$userId', '$title', '$message', '$promo', '');");
}


 ?>
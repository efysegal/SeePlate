<?php 
include('../inc/database.php');
session_start();

$n = mysqli_query ($dbh,"SELECT COUNT(1) FROM `user_massage` "); 
$n = mysqli_fetch_array($n);
$MessageID 	= $n[0]+1;
$userId   	= $_SESSION['user_login'];
$userType 	= $_SESSION['user_type'];
$title		= $_POST['message_title_vip'];
$message	= $_POST['message_vip'];
$message 	= strip_tags($message);
$message 	= addslashes($message);
$promo		= $_POST['vip_promo'];
$mesagetime	= date('o-m-d H:i:s');

mysqli_query ($dbh, "INSERT INTO `user_massage` VALUES ('$MessageID', '$userId', '$message', '$promo', '$mesagetime', FALSE, FALSE, FALSE, '$userType', '', '$title', FALSE);");

 ?>

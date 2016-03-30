<?php 
$dbh = new mysqli("localhost", "u907593807_chat", "123456", "u907593807_chat");

session_start();

$n = mysqli_query ($dbh,"SELECT COUNT(1) FROM `user_massage` "); 
$n = mysqli_fetch_array($n);
$MessageID 	= $n[0]+1;
$userId   	= $_SESSION['user_login'];
$userType 	= $_SESSION['user_type'];
$message	= $_POST['message'];
$message 	= strip_tags($message);
$message 	= addslashes($message);
$recipient 	= $_POST['recipient_id'];
$mesagetime	= date('o-m-d H:i:s');

mysqli_query ($dbh, "INSERT INTO `user_massage` VALUES ('$MessageID', '$userId', '$message', FALSE, '$mesagetime', '$recipient', FALSE, FALSE, '$userType', '', FALSE);");

?>
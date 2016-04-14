<?php 
include('../inc/database.php');

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

mysqli_query ($dbh, "INSERT INTO `user_massage` VALUES ('$MessageID', '$userId', '$message', FALSE, '$mesagetime', '$recipient', FALSE, FALSE, '$userType', '', FALSE, FALSE);");

if (isset($recipient)) {
    $user_data    = mysqli_query ($dbh,"SELECT * FROM `user`  WHERE name='$recipient'");
    if ($user_data) {
  	  $user_data    = mysqli_fetch_array($user_data, MYSQLI_ASSOC);
  		if ($user_data['user_type']==1) {
  			$auto_message_data = mysqli_query ($dbh,"SELECT * FROM `auto_message` WHERE username = '$recipient'");
  			$auto_message_data = mysqli_fetch_array($auto_message_data, MYSQLI_ASSOC);
  			$auto_title 	= $auto_message_data['title'];
  			$auto_message 	= $auto_message_data['message'];
  			$auto_promo 	= $auto_message_data['promo'];

  			$n = mysqli_query ($dbh,"SELECT COUNT(1) FROM `user_massage` "); 
			  $n = mysqli_fetch_array($n);
			  $MessageAutoID 	= $n[0]+1;
  			mysqli_query ($dbh, "INSERT INTO `user_massage` VALUES ('$MessageAutoID', '$recipient', '$auto_message', '$auto_promo', '$mesagetime', '$userId', FALSE, FALSE, FALSE, '', '$auto_title', FALSE);");
  		}

    }
}


?>

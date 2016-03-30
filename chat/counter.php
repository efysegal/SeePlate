<?php 
$dbh = new mysqli("localhost", "u907593807_chat", "123456", "u907593807_chat");
session_start();
$reader 	= $_SESSION['user_id'].', ';
$messageID 	= $_POST['messageID'];
echo $messageID;
$message = mysqli_query ($dbh,"SELECT * FROM `user_massage` WHERE id=$messageID");
$message = mysqli_fetch_array($message, MYSQLI_ASSOC);
$readers = $message['number_read'];
$pregreader 	= "/".$_SESSION['user_id'].','."/";
if (!preg_match($pregreader, $readers)) {
	$readers = $message['number_read'].$reader;
	mysqli_query ($dbh, "UPDATE `user_massage` SET `number_read`='$readers' WHERE id='$messageID'");

}	
else {

}


 ?>
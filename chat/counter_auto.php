<?php 
include('../inc/database.php');
session_start();
$reader 	= $_SESSION['user_id'].', ';
$messageID 	= $_POST['messageID'];
echo $messageID;
$message = mysqli_query ($dbh,"SELECT * FROM `auto_message` WHERE username='$messageID'");
$message = mysqli_fetch_array($message, MYSQLI_ASSOC);
$readers = $message['number_read'];
echo $message['number_read']."<br>";
$pregreader 	= "/".$_SESSION['user_id'].','."/";
if (!preg_match($pregreader, $readers)) {
	$readers = $message['number_read'].$reader;
	mysqli_query ($dbh, "UPDATE `auto_message` SET `number_read`='$readers' WHERE username='$messageID'");

}	
else {

}
echo $message['number_read']."<br>";
 ?>
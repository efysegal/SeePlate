<?php 
include('../inc/database.php');
session_start();

$test = $_POST['msread'];
/*mysqli_query($dbh, "UPDATE `user_massage` SET `reading`=TRUE WHERE 	id='$message_id';")
*/
$user_id = $_SESSION['user_login'];
$massages_db = mysqli_query ($dbh,"SELECT * FROM `user_massage` WHERE recipient_id = '$user_id'");

foreach ($massages_db as $key => $value) {
	$massages[] = $value;
}

if (!isset($test)) {

}else {


if (!isset($massages[0])) {
}
else {
$massages = array_reverse($massages);

foreach ($massages as $message) {

	if (!$message['reading']) {
		$message_id = $message['id'];
		mysqli_query($dbh, "UPDATE `user_massage` SET `reading`=TRUE WHERE 	id='$message_id';");
	} else {	break;	}
}

}


}

 ?>
<?php  
include('../inc/database.php');
session_start();
$user_id = $_SESSION['user_login'];
$massages_db = mysqli_query ($dbh,"SELECT COUNT(1) FROM `user_massage` WHERE author_id = '$user_id' AND reading = 0");
$massages_db = mysqli_fetch_array($massages_db);
echo $massages_db[0];
?>
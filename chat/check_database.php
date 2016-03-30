<?php 
$dbh = new mysqli("localhost", "u907593807_chat", "123456", "u907593807_chat");
session_start();
$user_id = $_SESSION['user_login'];
$massage_data = mysqli_query ($dbh,"SELECT COUNT(1) FROM `user_massage` WHERE recipient_id = '$user_id' OR type_message = TRUE");
$massage_data = mysqli_fetch_array($massage_data);

$massage_data_my = mysqli_query ($dbh,"SELECT COUNT(1) FROM `user_massage` WHERE author_id = '$user_id' ");
$massage_data_my = mysqli_fetch_array($massage_data_my);

$message_result = $massage_data_my[0] + $massage_data[0];

echo $message_result;
 ?>
<?php 
$dbh = new mysqli("localhost", "u907593807_chat", "123456", "u907593807_chat");
session_start();
$user_id = $_SESSION['user_login'];
$massage_data = mysqli_query ($dbh,"SELECT COUNT(1) FROM `user_massage` WHERE type_message = TRUE");
$massage_data = mysqli_fetch_array($massage_data);
echo $massage_data[0];
 ?>
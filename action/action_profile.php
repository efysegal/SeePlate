<?php
include('../inc/database.php');


$username = $_POST['userID'];
$user_data = mysqli_query ($dbh, "SELECT * FROM `user` WHERE name='$username'");
$user_data = mysqli_fetch_array($user_data, MYSQLI_ASSOC);

$user_user_avatar_id = $user_data['avatar_id'];
$user_user_avatar    = mysqli_query ($dbh,"SELECT * FROM `avatar`  WHERE id='$user_user_avatar_id'");
$user_user_avatar    = mysqli_fetch_array($user_user_avatar, MYSQLI_ASSOC);


echo '<img class="chat_avatar profile_avatar" src="'.$user_user_avatar['link'].'">';
echo "<p>Name: ".$user_data['name'].'</p>';
echo "<p>Email: ".$user_data['email'].'</p>';
echo "<p>Coutry: ".$user_data['county'].'</p>';
echo "<p>City: ".$user_data['city'].'</p>';
echo "<p>Address: ".$user_data['street'].'</p>';

  ?>

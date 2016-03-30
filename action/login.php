<?php
//$dbh = new mysqli("localhost", "cchat", "123", "cchat");
include('../inc/database.php');

if ($_POST['name'] AND $_POST['passwd']) {
  $Login = $_POST['name'];
  $Password = $_POST['passwd'];
  $user_data = mysqli_query ($dbh,"SELECT * FROM `user`  WHERE name='$Login'");
  $user_data = mysqli_fetch_array($user_data, MYSQLI_ASSOC);
	if (!$user_data) {
	  echo "Wrong Username or Password!";
	}
	else{
	  if (!($Password==$user_data['password'])) {
		echo "Wrong Username or Password!";
	  }
	  else{
		session_start();
		$_SESSION['user_id'] 	= $user_data['id'];
		$_SESSION['user_login']	= $user_data['name'];
		$_SESSION['user_type']	= $user_data['user_type'];
		header('Location: ../index.php');
	  }
	}
}
else {	echo "FATAL ERROR! Please try again!"; }

?>
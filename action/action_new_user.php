<?php 
include ('../inc/check_data_registr.php');
$dbh = new mysqli("localhost", "u907593807_chat", "123456", "u907593807_chat");

$user_registr_data = check_data_registr($_POST['name'], $_POST['passwd'], $_POST['email'], $_POST['country'], $_POST['address']);

if(!$user_registr_data['username'] OR !$user_registr_data['password'] OR !$user_registr_data['email']){
	echo $user_registr_data['errorlog'].'<br>';

}
else{
  $name 	= $user_registr_data['username'];
  $password	= $user_registr_data['password'];
  $email	= $user_registr_data['email'];
  $country	= $user_registr_data['country'];
  $city 	= $user_registr_data['city'];
  $address	= $user_registr_data['address'];

	if ( preg_match('/\/user_comon_registr.php/', $_SERVER['HTTP_REFERER']) ) {
		echo "Your registration was successful!<br>";
		$n = mysqli_query ($dbh,"SELECT COUNT(1) FROM `user` "); 
		$n = mysqli_fetch_array($n);
		$PersonID = $n[0]+1;
		mysqli_query ($dbh, "INSERT INTO `user` VALUES ( '$PersonID', FALSE, '$name', '$password', FALSE, '$email', FALSE, FALSE, FALSE, '$address', FALSE, '$country', '$city', FALSE, '$PersonID', FALSE, FALSE, FALSE);");
		?> <a href="http://seeplate.mobi/">Now go to login</a><?php
	}
	else {
		if ( preg_match('/^[a-z0-9_]+$/i', $_POST['company_name'])){
		  echo "Your VIP registration was successful!";
		  $company_name	= $_POST['company_name']; 
		  $n = mysqli_query ($dbh,"SELECT COUNT(1) FROM `user` "); 
		  $n = mysqli_fetch_array($n);
		  $PersonID = $n[0]+1;
		  mysqli_query ($dbh, "INSERT INTO `user` VALUES ( '$PersonID', FALSE, '$name', '$password', FALSE, '$email', FALSE, FALSE, FALSE, '$address', FALSE, '$country', '$city', FALSE, '$PersonID', FALSE, TRUE, '$company_name');");
		  ?> <a href="http://seeplate.mobi/">Now go to login</a><?php
		} 
		else { echo "Wrong company name!";}
	}	
}


?>
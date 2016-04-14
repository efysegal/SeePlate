<?php 

function check_data_registr(){

include('database.php');

$errorlog = '';

if ( preg_match('/^[a-z0-9_]+$/i', $_POST['name']) ) {
	$username = $_POST['name'];
	$user_data = mysqli_query ($dbh, "SELECT * FROM `user` WHERE name='$username'");
	$user_data = mysqli_fetch_array($user_data, MYSQLI_ASSOC);
	  if ($user_data) {
	   	$errorlog = "This name already taken!";
	   	$username = FALSE;
	  }
	  else { $username = $_POST['name'];} 
	
}
else {	$username = FALSE; }

if (preg_match ("/^[a-z0-9_]+$/i", $_POST['passwd']) ){
	$password = $_POST['passwd'];
}else {	$password = FALSE; }




if ( preg_match('/.+@.+\..+/i', $_POST['email']) ) {
	$email = $_POST['email'];
} else $email = FALSE;


if (preg_match('/^[a-z]+$/i', $_POST['country'])) {
  $country = $_POST['country'];
} else $country = FALSE;

if (preg_match('/^[a-z]+$/i', $_POST['city'])) {
  $city = $_POST['city'];
} else $city = FALSE;

if (preg_match('/^[a-z0-9]+$/i', $_POST['address'])) {
  $address = $_POST['address'];
} else $address = FALSE;



if ($username == FALSE) {
	$errorlog .= "<br>";
}
if ($password == FALSE) {
	$errorlog .= "<br>";
}

$userdata = array(
    'username' 	=> $username,
    'password' 	=> $password,
    'email'    	=> $email,
    'country'  	=> $country,
    'city'     	=> $city,
    'address'  	=> $address,
    'errorlog'	=> $errorlog
	);

return $userdata;

}
?>
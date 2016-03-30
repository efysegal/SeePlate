<?php 

function check_data_registr(){

$dbh = new mysqli("localhost", "u907593807_chat", "123456", "u907593807_chat");

$errorlog = '';

if ( preg_match('/^[a-z0-9_]+$/i', $_POST['name']) AND iconv_strlen($_POST['name']) > 7 ) {
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

if (preg_match ("/^[a-z0-9_]+$/i", $_POST['passwd']) AND iconv_strlen($_POST['passwd']) >7){
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
	$errorlog .= "<br><br>Login must be at least 8 characters long and contain only letters: a-z, 0-9, _";
}
if ($password == FALSE) {
	$errorlog .= "<br><br>Password must be at least 8 characters long and contain only letters: a-z, 0-9, _";
}
if ($email == FALSE) {
	$errorlog .= "<br><br>Email err";
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
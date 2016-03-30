<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Title</title>

    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="fonts/fonts-style.css">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
 </head>
<body>

<div class="container-fluid row container_login_form">
  <div class="col-lg-4"></div>
  <div class="col-lg-4">
    <div class="login_form">
      <h2>Registr VIP user</h2>
      <form id="registr_user" method="post">
      <ul>
        <li>
          <input class="form-control form-field" type="text" name="company_name" value="" placeholder="Company Name">
        </li>
        <li>
          <input class="form-control form-field" type="text" name="name"    value="" placeholder="Username" required>
        </li>
        <li>
          <input class="form-control form-field" type="text" name="passwd"  value="" placeholder="Password"required>
        </li>
        <li>
          <input class="form-control form-field" type="text" name="email"   value="" placeholder="Email">
        </li>
        <li>
          <input class="form-control form-field" type="text" name="country" value="" placeholder="Conntry">
        </li>
        <li>
          <input class="form-control form-field" type="text" name="city" value="" placeholder="City">
        </li>
        <li>
          <input class="form-control form-field" type="text" name="address" value="" placeholder="Address">
        </li>          
      </ul>
        <button type="submit" class="btn_send_login">Sing Up</button>
      </form>

      <div id="erormesage" class="error-block"></div>
    </div>
  </div>
  <div class="col-lg-4"></div>
</div>

<script>
document.getElementById('registr_user').onsubmit = function(){
  var http = new XMLHttpRequest();
  http.open("POST", "../action/action_new_user.php", true);
  http.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  http.send("company_name=" + this.company_name.value + "&name=" + this.name.value + "&passwd=" + this.passwd.value + "&email=" + this.email.value + "&country=" + this.country.value + "&city=" + this.city.value + "&address=" + this.address.value);
  http.onreadystatechange = function() {
   if (http.readyState == 4 && http.status == 200) {     
      $('#erormesage').html(http.responseText);
    }
  }
  http.onerror = function() {
    alert('ERROR DATA');
  }
  return false;
}

</script>

 </body>
</html>
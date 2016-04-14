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
      <h2>Registr Client Activity</h2>
      <form id="registr_user" method="post" action="">
      <ul>
        <li>
          <input class="form-control form-field" type="text" name="name" value="" placeholder="Username" required>
        </li>
        <li>
          <input class="form-control form-field" type="text" name="passwd" value="" placeholder="Password" required>
        </li>
        <li>
          <input class="form-control form-field" type="text" name="email" value="" placeholder="Email">
        </li>
        <li>
          <input class="form-control form-field" type="text" name="country" value="" placeholder="Conntry" >
        </li>
        <li>
          <input class="form-control form-field" type="text" name="city" value="" placeholder="City">
        </li>
        <li>
          <input class="form-control form-field" type="text" name="address" value="" placeholder="Address">
        </li>  
<!-- Large modal -->
<div class="go_to_reg avatar_reg"><a  type="button" data-toggle="modal" data-target=".bs-example-modal-sm">Avatar</a></div>

<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <?php   
        include('inc/database.php');
        $avatar_datta = mysqli_query ($dbh,"SELECT * FROM `avatar` WHERE id > 0");
        foreach ($avatar_datta as $key => $value) {

        $avatars[] = $value;
        }
        echo '<div class="row">';
        echo '<input id="radio_ava"  class="ava_radio"  name="avatar" type="radio" value="0" checked />'; 
        foreach ($avatars as $avatar) {
          echo '<div class="col-xs-4">';
          echo '<input id="radio_ava'.$avatar['id'].'"  class="ava_radio"  name="avatar" type="radio" value="'.$avatar['id'].'" />';
          echo '<label class="ava_img" for="radio_ava'.$avatar['id'].'">';
          echo '<img src="'.$avatar['link'].'"/></label></div>';
        }
        echo '</div>';
       ?>
    </div>
  </div>
</div>
      </ul>
        <button type="submit" class="btn_send_login">Sing Up</button>
      </form>



</div>
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
  http.send("name=" + this.name.value + "&passwd=" + this.passwd.value + "&email=" + this.email.value + "&country=" + this.country.value + "&city=" + this.city.value + "&address=" + this.address.value + "&avatar=" + this.avatar.value);
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
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
 </body>
</html>
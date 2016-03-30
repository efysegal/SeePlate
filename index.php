<!DOCTYPE html> 

<?php session_start(); ?>
<!--  DATETIME 30/03/2016 22:18 -->
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
  <body class="chat_body">
                      <!-- LOGIN -->
<?php 
if (!isset($_SESSION['user_login'])) { ?>

<div class="container-fluid row container_login_form">
  <div class="col-lg-4"></div>
  <div class="col-lg-4">
  <div class="login_form">
  <img class="logo" src="img/logo.png">
    <form action="action/login.php" method="post">
      <ul>
        <li>
          <input class="form-control form-field" type="text" name="name" value="" placeholder="Username" required></input>
         </li>
         <li>
           <input class="form-control form-field" type="text" name="passwd" value="" placeholder="Password" required>
         </li>
      </ul>
      <button type="submit" class="btn_send_login">Login</button>
    </form>
    <div class="go_to_reg"><a href="rigistr_user_type.php">Greate Account</a></div>
  </div>
  </div>
  <div class="col-lg-4"></div>
</div>



<?php
}
else{

  if (!$_SESSION['user_type']) { ?>
<div class="tabbable">

<div class="chat_type">
<ul class="nav nav-tabs">
    <li class="active"><a href="#common_user_chat" data-toggle="tab">Common user</a></li>
    <li><a href="#vip_user_chat" data-toggle="tab">VIP user</a></li>
</ul>
</div>

<div class="tab-content">


<div id="common_user_chat" class="chat tab-pane active">

  <div id="show_chat"> </div>
  <div class="vip_form_chat com_chat">
   <form id="chat" method="post" class="vip_mesage_send">
     <input placeholder="ID" class='send_chat_aree' id="id_recipient_area" type="text" name="recipient_id">
     <input placeholder="Text messadg..." class='send_chat_aree' id="text_send_area" type="text" name="message">
     <input type="submit" value="send" class="btn_send_login">
   </form>
   </div>

</div>


<div id="vip_user_chat" class="class tab-pane">
   <div id="show_vip_chat">
     
   </div>
</div>

</div>

</div>
<script src="js/chat.js"></script>
  <?php
}
  if ($_SESSION['user_type']) {
  ?>
  <div class="vip_title">VIP useer</div>
  <div class="vip_form_chat">
  <form id="chat_vip" method="post" class="vip_mesage_send">
    <input type="text" placeholder="Titl" name="message_title_vip" class="send_chat_aree">
    <input type="text" placeholder="Promo" name="vip_promo" class="send_chat_aree">
    <input type="text" placeholder="Text messadg..." name="message_vip" id="" class="send_chat_aree">
    <input type="submit" value="Send" class="btn_send_login">
  </form>
  </div>

<?php 
$dbh = new mysqli("localhost", "u907593807_chat", "123456", "u907593807_chat");
$user_id_vip = $_SESSION['user_login'];
$massages_my_vip = mysqli_query ($dbh,"SELECT * FROM `user_massage` WHERE author_id='$user_id_vip' AND type_message = TRUE");


foreach ($massages_my_vip as $key => $value) {

  $messages_vip[] = $value;
}
?>
  <div class="vip-info container">
    <?php
          if (isset($messages_vip)) {
       
       foreach ($messages_vip as $message_vip) {
        echo "<div class='vip_massage_title_vp'>".$message_vip['massage_title'].'</div>';

        echo '<div class="ms_hr_vip"></div>';
        echo "<div class='vip_massage_content_vp'>".$message_vip['message'].'</div>';
        echo '<div class="ms_hr_vip"></div>';

        $number_read = substr_count($message_vip['number_read'],',');
        echo "<div class='vip_massage_promo_vp'>".'Read promotional code '.$number_read.' users</div>';
        echo '<hr class="hr_bottom_ms">';
       }


        }

    ?>
  </div>
  <script src="js/chat_vip.js"></script>
<?php

  }

  ?>


  <?php
}


 ?>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>
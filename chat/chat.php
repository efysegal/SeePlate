<?php 
$dbh = new mysqli("localhost", "u907593807_chat", "123456", "u907593807_chat");
session_start();
$user_id = $_SESSION['user_login'];
$massages_db = mysqli_query ($dbh,"SELECT * FROM `user_massage` WHERE recipient_id = '$user_id' OR author_id = '$user_id'");



foreach ($massages_db as $key => $value) {

	$massages[] = $value;
}


if (!isset($massages[0])) {
	
}
else {
echo "<div class='mesage_area'>";


	foreach ($massages as $massage) {

       if ( $massage['type_message'] ) {
       	$author_id    = $massage['author_id'];
        $message_id  = $massage['id'];
       	$user_data    = mysqli_query ($dbh,"SELECT * FROM `user`  WHERE name='$author_id'");
  		$user_data    = mysqli_fetch_array($user_data, MYSQLI_ASSOC);
       	$companyName  = $user_data['company_name'];
        echo "<div class='VIP_mesage'>";
       	echo $massage['datetime'].'<br>';
        echo '<b>'.$massage['massage_title'].'</b><br>';
        echo $companyName.'<br>';
        echo $massage['message'].'<br>';
        ?>
        <button onclick="massage_id('<?php echo $message_id;?>')" class="btn btn-primary" data-toggle="modal" data-target="#modal_id_<?php echo $companyName;?>"><strong>GET PROMO</strong></button>
        


  
    

<div  id ="modal_id_<?php echo $companyName;?>" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <?php echo $massage['message_id']; ?>
    </div>
  </div>
</div> 

        <?php
        echo "</div>";
        
       }
       else {
         if ($user_id == $massage['author_id']) {
          echo "<div class='mesage_out'>";
         }else  {
          echo "<div class='mesage_in'>";
         }
        echo "<div class='mesage_time'>";
        echo $massage['datetime']."</div>";
        echo "<div class='mesage_sender'><b onclick=chat_to('".$massage['author_id']."')>".$massage['author_id']."</b></div>";
        echo "<div class='mesage_text'>".$massage['message']."</div>";
        echo "<div class='mesage_recipent'><b onclick=chat_to('".$massage['recipient_id']."')>".$massage['recipient_id'].'</b></div> <br>';
        echo "</div>";
       }

	}
echo "</div>";
}
 ?>

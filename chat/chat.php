<?php 
include('../inc/database.php');
session_start();
$user_id = $_SESSION['user_login'];
$massages_db = mysqli_query ($dbh,"SELECT * FROM `user_massage` WHERE recipient_id = '$user_id' OR author_id = '$user_id'");



foreach ($massages_db as $key => $value) {

	$massages[] = $value;
}


if (!isset($massages[0])) {
	
}
else {
echo "<div id='mesage_area' class='mesage_area'>";


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
        if ($massage['reading'] == 0) {
          $reading_class = 'no_read';
        }
        else {
          $reading_class = 'read';
        }



         if ($user_id == $massage['author_id']) {
          $user_user           = mysqli_query ($dbh,"SELECT * FROM `user`  WHERE name='$user_id'");
          $user_user           = mysqli_fetch_array($user_user, MYSQLI_ASSOC);
          $user_user_avatar_id = $user_user['avatar_id'];
          $user_user_avatar    = mysqli_query ($dbh,"SELECT * FROM `avatar`  WHERE id='$user_user_avatar_id'");
          $user_user_avatar    = mysqli_fetch_array($user_user_avatar, MYSQLI_ASSOC);
          echo "<div class='mesage_out'>";
          echo "<div class='avatar_my_out'><img src='".$user_user_avatar['link']."'></div>";
          echo "<div class='mesage_time'>";
          echo substr($massage['datetime'],10)."<span class='message_author_chat' onclick=chat_to('".$massage['author_id']."')> ".$massage['author_id']."</span>"."</div>";

              echo "<div class='message_text_avatar_out'>";
              echo "<div class='mesage_text'>".$massage['message']."</div><img class='out_".$reading_class."' src='img/read.png'>";
              echo "<div class='message_chat_line'></div>";
              echo "<div class='mesage_recipent '><b onclick=chat_to('".$massage['recipient_id']."')>".$massage['recipient_id'].'</b></div> <br></div>';
          echo "</div>";
         }
         else{
            $autor_message      = $massage['author_id'];
            $autor_message_data = mysqli_query ($dbh,"SELECT * FROM `user`  WHERE name='$autor_message'");
            $autor_message_data = mysqli_fetch_array($autor_message_data, MYSQLI_ASSOC);


            if ($autor_message_data['user_type']==1) {
              echo "<div class='mesage_in vip_message_auto_in'>";
              echo "<div class='message_text_avatar'><div class='mesage_time message_time_vip'><div class='lable_vip'>!</div>";
              echo substr($massage['datetime'],10);
              echo "<br><span class='message_author_chat'>".$massage['massage_title'].'<br>'.$autor_message_data['company_name']."</span></div>";
              echo "<div class='message_chat_line'></div>";
              echo "<div class='mesage_text'>".$massage['message']."</div>";
              echo "<div class='message_chat_line'></div>";
              $message_id  = $massage['id'];
              echo "<div class='message_promo'>";
              ?>
               <div class="collapse accordion-bodys auto_message_vip" id="collapseOne<?php echo $message_id;?>">
                <?php echo $massage['message_id']; ?>
               </div>
               <a onclick="massage_id_auto('<?php echo $autor_message;?>')" type="button" class="accordion-toggle btn-primary-vip auto_message_vip" data-toggle="collapse" href="#collapseOne<?php echo $message_id;?>">
                 <strong>GET PROMO</strong>
               </a>
              <?php
              echo "</div></div></div>";
            }
            else {
              $author_id = $massage['author_id'];
              $user_author           = mysqli_query ($dbh,"SELECT * FROM `user`  WHERE name='$author_id'");
              $user_author           = mysqli_fetch_array($user_author, MYSQLI_ASSOC);
              $user_author_avatar_id = $user_author['avatar_id'];
              $user_author_avatar    = mysqli_query ($dbh,"SELECT * FROM `avatar`  WHERE id='$user_author_avatar_id'");
              $user_author_avatar    = mysqli_fetch_array($user_author_avatar, MYSQLI_ASSOC);
              echo "<div class='mesage_in'>";
              ?>
              <div class='avatar_my'>
              <button class='avatar_btn' onclick="get_profile('<?php echo $author_id; ?>')"  data-toggle="modal" data-target=".bs-example-modal-lg">
               <img  class="chat_avatar" src='<?php echo $user_author_avatar['link'] ?>'>
              </button>
              </div>
            <?php 

              echo "<div class='mesage_time'>";
              echo substr($massage['datetime'],10)."<span class='message_author_chat' onclick=chat_to('".$massage['author_id']."')> ".$massage['author_id']."</span>"."</div>";
              echo "<div class='message_text_avatar'>";
              echo "<div class='mesage_text'>".$massage['message']."</div><img class='in_".$reading_class."' src='img/read.png'>";
              echo "<div class='message_chat_line'></div>";
              echo "<div class='mesage_recipent'><b onclick=chat_to('".$massage['recipient_id']."')>".$massage['recipient_id'].'</b></div> <br></div>';

              echo "</div>";
            }
         }
       }

	}
echo "</div>";
}
 ?>
 <script>
var block = document.getElementById("mesage_area");
  block.scrollTop = block.scrollHeight;

 </script>
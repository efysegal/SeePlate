<?php 
$dbh = new mysqli("localhost", "u907593807_chat", "123456", "u907593807_chat");
session_start();
$user_id = $_SESSION['user_login'];
$massages_db = mysqli_query ($dbh,"SELECT * FROM `user_massage` WHERE recipient_id = '$user_id' OR author_id = '$user_id' OR type_message = TRUE");



foreach ($massages_db as $key => $value) {

	$massages[] = $value;
}


if (!isset($massages[0])) {
	
}
else {
echo "<div class='mesage_area vip_massage_area'>";


	foreach ($massages as $massage) {

       if ( $massage['type_message'] ) {
       	$author_id    = $massage['author_id'];
        $message_id  = $massage['id'];
       	$user_data    = mysqli_query ($dbh,"SELECT * FROM `user`  WHERE name='$author_id'");
  		$user_data    = mysqli_fetch_array($user_data, MYSQLI_ASSOC);
       	$companyName  = $user_data['company_name'];
        echo "<div class='VIP_mesage'>";
        echo '<div class="massage_time_vip">'.$massage['datetime'].'</div>';
        echo '<div class="massage_time_title"><span>'.$massage['massage_title'].'</span><br>';
        echo $companyName.'</div>';
        echo '<div class="ms_hr_vip"></div><div class="message_message_vip">'.$massage['message'].'</div><div class="ms_hr_vip"></div>';
        ?>
        <div class="collapse accordion-bodys" id="collapseOne<?php echo $message_id;?>">
        <?php echo $massage['message_id']; ?>
        </div>

        <a onclick="massage_id('<?php echo $message_id;?>')" type="button" class="accordion-toggle btn-primary-vip" data-toggle="collapse" href="#collapseOne<?php echo $message_id;?>">
        <strong>GET PROMO</strong>
        </a>

        <hr class="hr_bottom_ms">

        

   
    

        <?php
        echo "</div>";
        
       }
     }
   }
   ?>
<?php 
include('../inc/database.php');
session_start();
$user_id = $_SESSION['user_login'];
$massages_db = mysqli_query ($dbh,"SELECT * FROM `user_massage` WHERE type_message = TRUE ORDER BY `datetime` DESC LIMIT 10");

foreach ($massages_db as $key => $value) {

	$massages[] = $value;
}


if (!isset($massages[0])) {
	
}
else {
echo "<div class='mesage_area vip_massage_area'>";
$massages = array_reverse($massages);
	foreach ($massages as $massage) {
       	$author_id    = $massage['author_id'];
        $message_id  = $massage['id'];
       	$user_data    = mysqli_query ($dbh,"SELECT * FROM `user`  WHERE name='$author_id'");
     		$user_data    = mysqli_fetch_array($user_data, MYSQLI_ASSOC);
       	$companyName  = $user_data['company_name'];
        echo "<div class='VIP_mesage'>";
        echo "<div class='message_text_avatar_out vip_out_message'>";
        echo "<div class='mesage_time message_time_vip'>";
        echo substr($massage['datetime'],10);
        echo "<br><span class='message_author_chat'>".$massage['massage_title'].'<br>'.$companyName."</span></div>";
        echo '<div class="message_chat_line"></div><div class="mesage_text">'.$massage['message'].'</div><div class="message_chat_line"></div>';
        echo "<div class='message_promo'>";

        ?>
        <div class="collapse accordion-bodys" id="collapseOne<?php echo $message_id;?>">
        <?php echo $massage['message_id']; ?>
        </div>

        <a onclick="massage_id('<?php echo $message_id;?>')" type="button" class="accordion-toggle btn-primary-vip" data-toggle="collapse" href="#collapseOne<?php echo $message_id;?>">
        <strong>GET PROMO</strong>
        </a>
        </div></div>
        <?php
        echo "</div>"; 
     }
   }
   ?>

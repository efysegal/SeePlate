
	function chat_to(value) {

    var str = document.getElementById('id_recipient_area').value;
    var check_str = str.indexOf(value);

    if (check_str == -1) {
    document.getElementById('id_recipient_area').value=value;
    }
}




     function show_chat()
  {
  	$.ajax({
       url: "../сhat/chat.php",
       cache: false,
       success: function (html) {
       	$("#show_chat").html(html);
       }
  		});
  }
  $(document).ready(function(){
  		show_chat();
  		//setInterval('show_chat()',1000);
  	}

  		);


var mesage_summ_check = 0;
     function chat_check()
  {
  	$.ajax({
       url: "../chat/check_database.php",
       cache: fase,
       success: function (data) {
       	var mesage_summ = data;
      
       	if (mesage_summ_check < mesage_summ) {

       	show_chat();
       	mesage_summ_check = mesage_summ;
       }
       }
  		});
  }

  $(document).ready(function(){
  		chat_check();
  		setInterval('chat_check()',1000);
  	}

  		);

     document.getElementById('chat_vip').onsubmit = function() {
  var http = new XMLHttpRequest();
  http.open('POST', '../chat/chat_action_vip.php', true);
  http.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  http.send("message_title_vip=" + this.message_title_vip.value + "&message_vip=" + this.message_vip.value + "&vip_promo=" + this.vip_promo.value);
  http.onreadystatechange = function() {
      if (http.readyState == 4 && http.status == 200) {
        alert('You message send!');       
       }
    }
   return false;
 };





	function massage_id(message_ids)  {
      var http = new XMLHttpRequest();
 	http.open('POST', '../chat/counter.php', true);
 	http.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
 	http.send("messageID=" + message_ids);
 	http.onreadystatechange = function() {
      if (http.readyState == 4 && http.status == 200) {
              
       }
    }
   return false;
	}

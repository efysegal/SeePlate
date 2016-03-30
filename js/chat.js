
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
       url: "../chat/chat.php",
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

       function show_chat_vip()
  {
    $.ajax({
       url: "../chat/chat_vip.php",
       cache: false,
       success: function (html) {
        $("#show_vip_chat").html(html);
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
       cache: false,
       success: function (data) {
       	var mesage_summ = data;
      
       	if (mesage_summ_check < mesage_summ) {

       	show_chat();
       	mesage_summ_check = mesage_summ;
       }
       }
  		});
  }

  var mesage_summ_check_vip = 0;
     function chat_check_vip()
  {
    $.ajax({
       url: "../chat/check_database_vip.php",
       cache: false,
       success: function (data) {
        var mesage_summ_vip = data;
      
        if (mesage_summ_check_vip < mesage_summ_vip) {

        show_chat_vip();
        mesage_summ_check_vip = mesage_summ_vip;
       }
       }
      });
  }

  $(document).ready(function(){
  		chat_check();
      chat_check_vip();
  		setInterval('chat_check()',1000);
      setInterval('chat_check_vip()',1000);
  	}

  		);


	 document.getElementById('chat').onsubmit = function() {
 	var http = new XMLHttpRequest();
 	http.open('POST', '../chat/chat_action.php', true);
 	http.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
 	http.send("recipient_id=" + this.recipient_id.value + "&message=" + this.message.value);
 	http.onreadystatechange = function() {
      if (http.readyState == 4 && http.status == 200) {
       var a = document.getElementById('text_send_area');
           a.value = "";    
       var b = document.getElementById('id_recipient_area');
           b.value = "";        
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

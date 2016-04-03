
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

      document.getElementById('auto_message').onsubmit = function() {
  var http = new XMLHttpRequest();
  http.open('POST', '../chat/message_auto_action.php', true);
  http.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  http.send("message_title_vip_auto=" + this.message_title_vip_auto.value + "&message_vip_auto=" + this.message_vip_auto.value + "&vip_promo_auto=" + this.vip_promo_auto.value);
  http.onreadystatechange = function() {
      if (http.readyState == 4 && http.status == 200) {
        alert('You message send!');       
       }
    }
   return false;
 };


function readMessage() {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
    var uic = document.getElementById("messageChat");
    uic.innerHTML = "";
    var json = JSON.parse(this.responseText);
    console.log(json);
    json.MyMessages.forEach(function (obj) {
        uic.innerHTML += '<div class="card bg-light mb-3" style="max-width: 18rem;"><div class="card-header" id="theirHeader">' + obj.myMessageDate + '</div> <div class="card-body"> <p class="card-text" id="theirMessage">' + obj.myMessage + '</p></div></div></div><br/>';
    });
}};
    xmlhttp.open("GET", "/readMessage.php?token=<?php echo $token; ?>", true);
    xmlhttp.send();
};
 function sendMessage(str) {
     var sendMessageForm = document.getElementById("sendMessageForm");
     var sendMessageText =
     const xmlhttp = new XMLHttpRequest();

     xmlhttp.open("POST", "/sendMessage.php?" + str, true);
     xmlhttp.send();
 }


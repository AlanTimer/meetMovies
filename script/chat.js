function send_message() {
    var input=document.getElementById("message");
    var content=input.value;
    var div=document.getElementById("person6");
    var newMsg=document.createElement('div');
    newMsg.className="bubble me";
    newMsg.innerHTML=content;
    div.appendChild(newMsg);
    input.value="";


}
function get_friends_Id() {
    $.ajax({
        url:"php/get_start_chat_things.php",
        type:"POST",
        dataType:"json",
        success:function(data) {
           for(var i=0;i<data.length;i++){
               alert(data[i]['chat_last_time']);
           }

        }

        });

}
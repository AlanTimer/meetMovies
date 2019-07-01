
function send_message() {

    var input=document.getElementById("message");
    var content=input.value;
   // alert(content);
    var chat=document.getElementsByClassName('active-chat');
    //alert(chat[0].id);
    var div=document.getElementById(chat[0].id);
    //div.scrollTop=div.scrollHeight;
   // alert(div.id);
    var newMsg=document.createElement('div');
    newMsg.className="bubble me";
    newMsg.innerHTML=content;
    newMsg.id=Date.parse(new Date());
   // alert(newMsg.innerHTML);
    div.appendChild(newMsg);
    input.value="";
    div.scrollTop=div.scrollHeight;
    var to_id=chat[0].id.substring(4);
    var from_id=document.body.id;
    // alert(to_id);
    $.ajax({
        type:"POST",
        data: 'from='+from_id+'&to='+to_id+'&message='+content+'&time='+newMsg.id,
        url:"php/push_chat_to_sql.php"

    });


}
function initBar() {
    var chat=document.getElementsByClassName('active-chat');
    var div=document.getElementById(chat[0].id);
    div.scrollTop=div.scrollHeight;
}
function enter_send(e) {
    alert("hhhh")
    if(e.keyCode==13){
        send_message();
    }

}
var int=self.setInterval("update_message()",2000);

function update_message() {
    var from_id=document.body.id;
    var send_time=null;
    var chat = document.getElementsByClassName('active-chat');
    current_div = chat[0];
    var to_id = current_div.id.substring(4);
    var childs=current_div.childNodes;
    // //alert(childs[childs.length-2].innerHTML+"#### "+childs[childs.length-2].id )
    // if(childs[childs.length-2].id!=null)
    //     send_time=childs[childs.length-2].id;
    for(var i=0;i<childs.length;i++){
        if(childs[i].id!=null){
            send_time=childs[i].id;
        }
    }

    console.log(send_time );
    if(send_time==null)
        return;
        $.ajax({
            type: "POST",
            data: 'from='+from_id+'&chat_to_id=' + to_id + '&last_time=' + send_time,
            url: 'php/get_message_from_sql.php',
            dataType: 'json',
            success: function (data) {
                console.log(data);
                // if(data.length==0||data.length>=20) {
                //     return;
                // }

                for (var i = 0; i < data.length; i++) {
                    if(send_time!=null) {
                        var div = document.createElement('div');
                        if (data[i]['from_id'] == to_id) {
                            div.className = "bubble you";
                        } else {
                            div.className = 'bubble me';
                        }
                        var test_chat = document.getElementsByClassName('active-chat');
                        test_current_div = chat[0];
                        var test_childs=current_div.childNodes;

                        for(var j=0;j<test_childs.length;j++){
                            if(test_childs[j].id!=null){
                                if(data[0]['send_time']==test_childs[j].id)
                                    return;
                            }
                        }

                        div.innerHTML = data[i]['message'];
                        div.id = data[i]['send_time'];
                        current_div.appendChild(div);


                        send_time = div.id;
                        console.log('new send_time   '+send_time);

                    }
                    //send_time = data[data.length-1]['send_time'];

                }

            }


        });


}

// function get_friends_Id() {
//     $.ajax({
//         url:"php/get_start_chat_things.php",
//         type:"POST",
//         dataType:"json",
//         async:false,
//
//         success:function(result) {
//             var ul=document.getElementById("chat_friends");
//             for(var i=0;i<result.length;i++){
//
//                 var li=document.createElement('li');
//                 var img=document.createElement('img');
//                 var span1=document.createElement('span');
//                 var span2=document.createElement('span');
//                 var span3=document.createElement('span');
//                 //use to display the last message
//                 li.className="person";
//
//                 li.id=result[i]['chat_id'];
//                 li.setAttribute('data_chat','person'+li.id);
//                 img.src="images/user/"+result[i]['chat_picture'];
//                 //img.src="images/thomas.jpg"
//                 span1.className="name";
//                 span2.className="time";
//                 span3.className="preview";
//                 span1.innerHTML=result[i]['chat_username'];
//                 span2.innerHTML=result[i]['chat_last_time'];
//                 span3.innerHTML='hahhahah 哈哈哈hahahh啊哈哈啊哈哈哈';
//                 li.appendChild(img);
//                 li.appendChild(span1);
//                 li.appendChild(span2);
//                 li.appendChild(span3);
//                 ul.appendChild(li);
//                 //  li.addEventListener('click',
//                 var chat_to_id=li.id;
//                 $.ajax({
//                     url:"php/get_message_from_sql.php",
//                     type:"POST",
//                     data:'chat_to_id='+chat_to_id,
//                     dataType:"json",
//                     async:false,
//                     success:function(result) {
//                         //<div class="top"><span>To: <span class="name">Dog Woofson</span></span></div>
//                         var div_right=document.getElementById('right');
//                         /* var div_top = document.createElement('div');
//                          div_top.className='top';
//                          var span_out=document.createElement('span');
//                          span_out.innerHTML='To:';
//                          var span_in=document.createElement('span');
//                          span_in.className="name";
//                          span_in.innerHTML=span1.innerHTML;
//                          span_out.appendChild(span_in);
//                          div_top.appendChild(span_out);*/
//
//                         // div_right.appendChild(div_top);
//                         // <div class="chat"  data-chat="person1">
//                         //         <!--TODO chat history for different friends -->
//                         //     <div class="conversation-start">
//                         //         <span>Today, 6:48 AM</span>
//                         //     </div>
//                         //     <!--the class kind need to be judged.is me? is you? -->
//                         //     <div class="bubble you">
//                         //         Hello,
//                         // </div>
//                         //     <div class="bubble you">
//                         //         it's me.
//                         //     </div>
//                         //     <div class="bubble you">
//                         //         I was wondering...
//                         // </div>
//                         //
//                         //     </div>
//                         var div=document.createElement('div');
//                         div.className='chat';
//                         div.setAttribute('data_chat','person'+chat_to_id)
//                         div.data_chat='person'+chat_to_id;
//                         for(var i=0;i<result.length;i++){
//
//                             if(i==0){
//                                 var div_start=document.createElement('div');
//                                 div_start.className="conversation-start";
//                                 var span_start=document.createElement('span');
//                                 span_start.innerHTML=result[i]['send_time'];
//                                 div_start.appendChild(span_start);
//                                 div.appendChild(div_start);
//                             }
//                             var div_msg=document.createElement('div');
//                             if(result[i]['from_id']==chat_to_id)
//                                 div_msg.className='bubble you';
//                             else{
//                                 div_msg.className='bubble me';
//                             }
//                             div_msg.innerHTML=result[i]['message'];
//                             div.appendChild(div_msg);
//
//
//
//
//
//                         }
//                         div_right.appendChild(div);
//                     }
//
//
//                 })
//
//
//             }
//         }
//
//     });


//}
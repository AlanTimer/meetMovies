//弹出一个询问框，有确定和取消按钮
function firm(e) {

    // alert(e.getAttribute("data_id"));
    var friend=e.getAttribute("data_id");
    if (confirm("你确定删除好友吗？")) {
        $.ajax({
            type:"POST",
            url:"php/delete_friend.php",
            data:"friend="+friend,
            cache:false,
        });
        alert("删除成功");
        window.parent.location.reload();

    }
}
function enterChat(e) {
    /*
    * $from=$_POST['from'];
$to=$_POST['to'];                   //接受者的Id
$message=$_POST['message'];         //信息内容
$time=$_POST['time'];
    *
    * */
    var from=document.body.id;
    var to=e.id;
    var message="";
    var time=Date.parse(new Date());
    $.ajax({
        type:"POST",
        data: 'from='+from+'&to='+to+'&message='+message+'&time='+time,
        url:"php/push_chat_to_sql.php"

    });
    window.location.href="setup_chat.php";

}
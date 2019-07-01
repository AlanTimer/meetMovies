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
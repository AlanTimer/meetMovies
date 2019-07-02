function add1(e) {
    var id=e.id;
    // alert(e.id);
    $.ajax({
        type:"POST",
        url:"php/add_friend.php",
        data:"friend="+id,
        success:function (msg) {
            // alert("关注成功");
            layer.msg('关注成功');
            window.parent.location.reload();

        }
    })
}
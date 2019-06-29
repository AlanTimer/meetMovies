function sendVer(){
    var email = document.getElementById("email").value;
    $.ajax({
        type: "POST",                       //提交方式
        url:"php/send_email_verify.php",    //发送请求的地址
        data:"email="+email,                //传递数据
        success:function(msg){
            alert('已发送验证码');
        }
    });
}

function check_email_ver(){
    var user_word = document.getElementById("user_word").value;
    $.ajax({
        type: "POST",                           //提交方式
        url:"php/check_email_verify.php",       //发送请求的地址
        data:"user_word="+user_word,         //传递数据
        dataType:'text',
        cache:false,
        success:function(msg){
            alert(msg);
            if(msg == '1'){
                document.getElementById("tips").innerHTML = "<font color='red'size='1px'>验证码错误</font>";
                document.getElementById("newPwd").disabled = true;
            }else {
                document.getElementById("tips").innerHTML = "<font color='green'size='1px'>验证码正确</font>";
                document.getElementById("newPwd").disabled = false;
            }
        }
    });
}
function checkUserName() {
    //  window.location.href="main.html";
    //document.getElementById("hidden_info1").innerHTML = "<font color='red'size='1px'>邮箱名不能为空</font>";
    var username = document.getElementById("username").value;
    var password = document.getElementById("password").value;
    $.ajax({
        type: "POST",                       //提交方式
        url:"php/check_login.php",            //发送请求的地址
        data:"username="+username+'&password='+password,     //传递数据
        cache:false,
        dataType:"text",
        success:function (msg) {
            if(msg == '1') {
                document.getElementById("hidden_info1").innerHTML = "<font color='red'size='1px'>用户名或密码错误</font>";
                //document.getElementById("login").disabled = true;
            }
            else{
                document.getElementById("login").disabled = false;
                $.ajax({
                    type: "POST",                       //提交方式
                    url:"php/seven_day_free_verification.php",            //发送请求的地址
                    data:"username="+username,     //传递数据
                })
                window.location.href="main.html";

            }
        }

    });
}
function checkVerify() {
    var verify=document.getElementById("verify").value;

    $.ajax({
        type:"POST",
        url:"php/check_verify.php",
        data:"verify="+verify,
        cache:false,
        dataType:"text",
        success:function (msg) {
            if(msg=="1") {
                document.getElementById("hidden_info2").innerHTML = "<font color='red'size='1px'>验证码错误❌</font>";
                // document.getElementById("login").disabled = true;
            }
            else{
                document.getElementById("login").disabled = false;
                document.getElementById("hidden_info2").innerHTML = "<font color='green'size='1px'>验证码正确✔</font>";
                checkUserName();
            }
        }
    });

}
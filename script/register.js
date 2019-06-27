function checkUsername() {
    var username = document.getElementById("username").value;
    if(username=="") {
        document.getElementById("tips0").innerHTML = "<font color='red'size='1px'>用户名不能为空</font>";
        document.getElementById("submit").disabled = true;
    }else{
        document.getElementById("tips0").innerHTML = "<font color='green'size='1px'></font>";
        document.getElementById("submit").disabled = false;
    }
}

function check_Name() {
    var username = document.getElementById("username").value;
    $.ajax({
        type:"POST",                        //提交方式
        url:"php/check_name.php",           //发送请求的地址
        data:"username="+username,          //传递数据
        dataType:'text',
        cache:false,
        success:function(msg){
            if(msg == '1'){
                document.getElementById("tips0").innerHTML = "<font color='red'size='1px'>用户名已注册</font>";
                document.getElementById("submit").disabled = true;
            }else{
                document.getElementById("tips0").innerHTML = "<font color='green'size='1px'>用户名未注册</font>";
                document.getElementById("submit").disabled = false;
            }
        }
    })
}

function checkEmailAddr() {
    var emailAddr = document.getElementById("email_addr").value;
    var emailExp = /^([a-zA-Z0-9]+[_|\-|\.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|\-|\.]?)*[a-zA-Z0-9]+\.[a-zA-Z]{2,3}$/gi;
    if(emailAddr=="") {
        document.getElementById("tips1").innerHTML = "<font color='red'size='1px'>邮箱不能为空</font>";
        document.getElementById("submit").disabled = true;
    }else if(!emailExp.test(emailAddr)){
        document.getElementById("tips1").innerHTML = "<font color='red'size='1px'>邮箱格式错误</font>";
        document.getElementById("submit").disabled = true;
    } else{
        document.getElementById("tips1").innerHTML = "<font color='green'size='1px'></font>";
        document.getElementById("submit").disabled = false;
    }
}

function check_Mail() {
    var email = document.getElementById("email_addr").value;
    $.ajax({
        type: "POST",                       //提交方式
        url:"php/check_email.php",          //发送请求的地址
        data:"email="+email,                //传递数据
        dataType:'text',
        cache:false,
        success:function(msg){
            if(msg == '1'){
                document.getElementById("tips1").innerHTML = "<font color='red'size='1px'>邮箱已注册</font>";
                document.getElementById("submit").disabled = true;
            }else {
                document.getElementById("tips1").innerHTML = "<font color='green'size='1px'>邮箱未注册</font>";
                document.getElementById("submit").disabled = false;
            }
        }
    });
}

function validPwd() {
    var pwd3=document.getElementById("password").value;
    if(pwd3.length<6) {
        document.getElementById("tips2").innerHTML="<font color='red' size='1px'>密码不能小于6位</font>";
        document.getElementById("submit").disabled = true;
    }
    else {
        document.getElementById("tips2").innerHTML="<font color='red' size='1px'></font>";
        document.getElementById("submit").disabled = false;
    }
}

function affirmPwd() {
    var pwd1=document.getElementById("password").value;
    var pwd2=document.getElementById("password_confirm").value;
    if(pwd1 == pwd2) {
        document.getElementById("tips3").innerHTML="<font color='green' size='1px'>两次密码相同</font>";
        document.getElementById("submit").disabled = false;
    }
    else {
        document.getElementById("tips3").innerHTML="<font color='red'size='1px'>两次密码不同</font>";
        document.getElementById("submit").disabled = true;
    }
}

function check_Verify() {
    var verify = document.getElementById("verify").value;
    $.ajax({
        type: "POST",                       //提交方式
        url:"php/check_verify.php",         //发送请求的地址
        data:"verify="+verify,              //传递数据
        dataType:'text',
        cache:false,
        success:function(msg){
            if(msg == '1'){
                document.getElementById("tips4").innerHTML = "<font color='red'size='1px'>验证码错误</font>";
                document.getElementById("submit").disabled = true;
            }else {
                document.getElementById("tips4").innerHTML = "<font color='green'size='1px'>验证码正确</font>";
                document.getElementById("submit").disabled = false;
            }
        }
    });
}

function writeIntoDB() {
    var username = document.getElementById("username").value;
    var email = document.getElementById("email_addr").value;
    var password=document.getElementById("password").value;
    $.ajax({
        type: "POST",                       //提交方式
        url:"php/register_user.php",        //发送请求的地址
        data:"username="+username+'&password='+password+'&email='+email,              //传递数据
    });
    document.getElementById("tips5").innerHTML = "<font color='green'size='1px'>注册成功</font>";
    window.location.href="personalLabel.html";
}
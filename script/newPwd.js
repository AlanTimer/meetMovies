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
    var pwd2=document.getElementById("password-confirm").value;
    if(pwd1 == pwd2) {
        document.getElementById("tips3").innerHTML="<font color='green' size='1px'>两次密码相同</font>";
        document.getElementById("submit").disabled = false;
    }
    else {
        document.getElementById("tips3").innerHTML="<font color='red'size='1px'>两次密码不同</font>";
        document.getElementById("submit").disabled = true;
    }
}
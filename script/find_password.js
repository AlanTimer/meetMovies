function send_email() {
    var email = document.getElementById("email").value;
    var emailExp = /^([a-zA-Z0-9]+[_|\-|\.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|\-|\.]?)*[a-zA-Z0-9]+\.[a-zA-Z]{2,3}$/gi;
    if(email=="") {
       layer.msg('邮箱不能为空！');
    }else if(!emailExp.test(email)){
        layer.msg('请输入正确的邮箱地址!');
    } else{
        $.ajax({
            type: "POST",                       //提交方式
            url:"php/check_email.php",          //发送请求的地址
            data:"email="+email,                //传递数据
            dataType:'text',
            cache:false,
            success:function(msg){
                if(msg == '1'){
                    $.ajax({
                        type: "POST",                       //提交方式
                        url:"php/send_email_verify.php",    //发送请求的地址
                        data:"email="+email,                //传递数据
                        success:function(msg){}
                    });
                    layer.msg('发送验证码成功!');
                }else {
                    layer.msg('您输入的邮箱未注册!');
                    setTimeout("window.location.href=\"register.php\";",1000);
                }
            }
        });

    }
}


function check_login() {
    var email = document.getElementById("email").value;
    var password=document.getElementById("password").value;
    var re_password=document.getElementById("re_password").value;
    var verify=document.getElementById("verify").value;
    if(password.length<6)
        layer.msg('密码至少6位!');
    else if(password != re_password)
        layer.msg('两次密码不一致!');
    else{
        $.ajax({
            type: "POST",                           //提交方式
            url:"php/check_email_verify.php",       //发送请求的地址
            data:"user_word="+verify,         //传递数据
            dataType:'text',
            cache:false,
            success:function(msg){
                if(msg == '1'){
                    layer.msg('验证码错误');
                }else if(msg == '3'){
                    layer.msg('验证码已失效');
                } else {
                    $.ajax({
                        type: "POST",                       //提交方式
                        url:"php/change_password_by_email.php",    //发送请求的地址
                        data:"email="+email+'&password='+password,                //传递数据
                        success:function(msg){
                            layer.msg('重置密码成功！');
                            setTimeout("window.location.href=\"login.php\";",1000);
                        }
                    });
                }
            }
        });
    }

}



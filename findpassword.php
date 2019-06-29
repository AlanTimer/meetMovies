<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>影友-找回密码</title>
    <link rel="stylesheet" type="text/css" href="css/findpwd.css" />
    <script src="script/findpassword.js"></script>
    <script src="script/jquery.min.js"></script>
</head>
<body>
    <div class="demo-logo" title="logo" align="center">
        <img src="images/logo.png">
    </div>
    <div class="demo-findPwd">
        <p class="find-demo-title" id="find-demo-title">找回密码</p>
        <div class="demo1">
            <label for="pwd-email">密保邮箱</label>
            <input id="email" class="email" type="email" name="email" type="email"
                   maxlength="20" minlength="6" placeholder="请输入邮箱" style="color:#999;border-radius: 3px;width: 200px;height: 25px;">
        </div>
        <div>
<!--            <input type="submit" class="userword-send" name="userword-send" value="发送验证码" onclick="sendVer()">-->
            <button id="submit" class="userword-send" name="userword-send" onclick="sendVer()">发送验证码</button>
        </div>
        <div class="demo2">
            <label>验证码</label>
            <input id="user_word" class="userword" type="number" name="user_word"
                   style="border-radius: 3px;width: 200px;height: 25px;" maxlength="20" minlength="1">
        </div>
        <span class="tips" id="tips"></span>
<!--        <input type="submit" value="找回密码"  class="newPwd" onclick="check_email_ver()">-->
        <button id="newPwd" class="newPwd" name="newPwd" onclick="check_email_ver()">找回密码</button>
    </div>
</body>
</html>

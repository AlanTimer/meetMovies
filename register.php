<!--七天登录免验证判断-->
<?php
if(isset($_COOKIE['username']))
    header("Location:main.html");
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>注册</title>
    <!--引入css样式文件-->
    <link rel="stylesheet" type="text/css" href="css/semantic.css" />
    <link rel="stylesheet" type="text/css" href="css/login.css" />
    <script src="script/register.js"></script>
    <script src="script/jquery.min.js"></script>

</head>
<body>
<div class="header" title="title" align="center">
    <img src="images/logo.png">
</div>
<!--  主体区域 -->
<div class="main">
    <div class="left">
        <div class="login-bg">
            <img src="images/login_banner.png">
        </div>
    </div>
    <div class="content">
        <!-- 用户输入区开始 -->
        <div class="ui form">
            <div class="ui stacked segment blue">
                <div class="field">
                    <div class="ui icon input">
                        <i class="user icon"></i>
                        <input id="username" type="text" name="username" placeholder="用户名" required="required" maxlength="16"
                               onkeypress="checkUsername()" onblur="check_Name()">
                    </div>
                    <span id="tips0"></span>
                </div>
                <div class="field">
                    <div class="ui icon input">
                        <i class="lock icon"></i>
                        <input id="email_addr" type="email" name="email" placeholder="邮箱" required="required"
                               onkeypress="checkEmailAddr()" onblur="check_Mail()">
                    </div>
                    <span id="tips1"></span>
                </div>
                <div class="field">
                    <div class="ui icon input">
                        <i class="lock icon"></i>
                        <input id="password" type="password" name="password" placeholder="密码" required="required"
                               onblur="validPwd()">
                    </div>
                    <span id="tips2"></span>
                </div>
                <div class="field">
                    <div class="ui icon input">
                        <i class="lock icon"></i>
                        <input  id="password_confirm"type="password" name="password" placeholder="请再次输入密码" required="required"
                                onkeyup="affirmPwd()">
                    </div>
                    <span id="tips3"></span>
                </div>
                <div class="field">
                    <div class="ui icon input">
                        <input type="text" name="verify"  style="width: 70%" id="verify" placeholder="验证码" required="required"
                               onkeyup="check_Verify()">
                        <a href="javascript:;"><img src="php/make_verify.php" onclick="this.src=this.src"></a>
                    </div>
                    <span id="tips4"></span>
                </div>
                <button id="submit" class="ui fluid large teal submit  button" name="register"
                        onmousedown="checkUsername()" onmouseup="checkEmailAddr()" onclick="writeIntoDB()">注册</button>
            </div>
            <div class="ui message">
                <span id="tips5"></span>
                <span style="position: absolute;right: 5%;top: -5%;">
                <a href="login.php">已有账号? 点击登录</a>
                </span>
            </div>
        </div>
        <!-- 推荐输入区结束 -->
    </div>
</div>
<div class="clear"></div>
<!-- 网站底部 -->
<div class="footer">
    Copyright@2019华科实训
</div>
</body>
</html>

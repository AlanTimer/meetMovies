<!--七天登录免验证判断-->
<?php
if(isset($_COOKIE['username']))
    header("Location:main.html");
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>登录</title>
    <!--引入css样式文件-->
    <link rel="stylesheet" type="text/css" href="css/semantic.css" />
    <link rel="stylesheet" type="text/css" href="css/login.css" />

    <style>

    </style>
    <script src="script/jquery.min.js"></script>
    <script src="script/login.js"></script>

</head>
<body >
<div class="header" title="头部" align="center">
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
        <!-- 推荐用户开始 -->
        <div class="recommend">
            <div class="ui horizontal divider">
                <h4 class="ui teal">推荐用户</h4>
            </div>
            <div class="ui tiny images">
                <img class="ui medium circular image" src="images/steve_01.png">
                <img class="ui medium circular image" src="images/steve_02.png">
                <img class="ui medium circular image" src="images/steve_03.png">
                <img class="ui medium circular image" src="images/steve_04.png">
                <img class="ui medium circular image" src="images/steve_05.png">
                <img class="ui medium circular image" src="images/steve_06.png">
            </div>
        </div>
        <!-- 推荐用户结束 -->
        <!-- 用户输入区开始 -->

        <div class="ui form">
            <div class="ui stacked segment blue">
                <div class="field">
                    <div class="ui icon input">
                        <i class="user icon"></i>
                        <input id="username" type="text" name="username" placeholder="用户名或邮箱">
                    </div>

                </div>
                <div class="field">
                    <div class="ui icon input">
                        <i class="lock icon"></i>
                        <input id="password" type="password"  name="password" placeholder="密码" >
                    </div>
                    <span id="hidden_info1"></span>
                </div>
                <div class="field">
                    <div class="ui icon input">
                        <input type="text" id="verify" name="verify"  style="width: 70%" placeholder="验证码">
                        <a href="javascript:;"><img src="php/make_verify.php" onclick="this.src=this.src"></a>
                    </div>
                    <span id="hidden_info2"></span>
                </div>
                <button id="login" onclick="checkVerify()" class="ui fluid large teal submit  button" >登录</button>
            </div>
                <div class="ui message">
                <span>
                    <input type="checkbox" name="keep" id="keep" checked value="">7天免登录
                </span>
                <span style="position: absolute;right: 5%;">
                    <a href="register.php">暂无账号? 点击去注册</a>
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
<script>
    if(document.getElementById("keep").checked)
        document.getElementById("keep").value=1;
</script>
</html>

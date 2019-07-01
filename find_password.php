<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>影友-找回密码</title>
    <!--引入css样式文件-->
    <link rel="shortcut icon" href="images/logo.ico">
    <link rel="stylesheet" type="text/css" href="css/semantic.css" />
    <link rel="stylesheet" type="text/css" href="css/login.css" />
    <script src="script/jquery.min.js"></script>
    <script src="script/layer/layer.js"></script>
    <script src="script/find_password.js"></script>
</head>
<body >
<div class="header" title="头部" align="center">
    <img src="images/logo.png"  alt="图片加载失败">
</div>
<!--  主体区域 -->
<div class="main">
    <div class="left">
        <div class="login-bg">
            <a href="https://channel.jd.com/women.html">
                <img src="images/login_banner.png" alt="图片加载失败">
            </a>
        </div>
    </div>
    <div class="content">
        <!-- 用户输入区开始 -->
        <div class="ui form">
            <div class="ui stacked segment blue">
                <div class="field">
                    <div class="ui icon input">
                        <div class="ui icon input">
                            <i class="mail icon"></i>
                            <input id="email" type="text" name="username" placeholder="邮箱">
                        </div>
                        <input type="button" value="发送" onclick="send_email()" class="demo-btn">
                    </div>

                </div>
                <div class="field">
                    <div class="ui icon input">
                        <i class="lock icon"></i>
                        <input id="verify" type="password"  name="password" placeholder="请输入您收到的验证码" >
                    </div>
                </div>
                <div class="field">
                    <div class="ui icon input">
                        <i class="lock icon"></i>
                        <input id="password" type="password"  name="password" placeholder="请输入新密码" >
                    </div>
                </div>
                <div class="field">
                    <div class="ui icon input">
                        <i class="lock icon"></i>
                        <input id="re_password" type="password"  name="password" placeholder="请再次输入新密码" >
                    </div>
                </div>


                <button id="login" onclick="check_login()" class="ui fluid large teal submit  button" >重置密码</button>
            </div>
            <div class="ui message">
                <span id="tips5"></span>
                <span style="position: absolute;right: 5%;top: -5%;">
                <a href="login.php">已有账号? 点击登录</a>
                </span>
            </div>
        </div>
        <!-- 用户输入区结束 -->
        <!-- 推荐用户开始 -->
        <div class="recommend">
            <div class="ui horizontal divider">
                <h4 class="ui teal">推荐用户</h4>
            </div>
            <div class="ui tiny images">
                <img class="ui medium circular image" src="images/steve_01.png"  alt="图片加载失败">
                <img class="ui medium circular image" src="images/steve_02.png"  alt="图片加载失败">
                <img class="ui medium circular image" src="images/steve_03.png"  alt="图片加载失败">
            </div>
        </div>
        <!-- 推荐用户结束 -->

    </div>
</div>
<div class="clear"></div>
<!-- 网站底部 -->
<div class="footer">
    Copyright@2019华科实训
</div>
</body>
</html>

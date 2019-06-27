<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>影友-找回密码</title>
    <link rel="stylesheet" type="text/css" href="css/findpwd.css.">
</head>
<body>
<p class="find-demo-title" id="find-demo-title">找回密码</p>
<form action="findpassword_server.php" method="post">
    <div class="demo1">
        <label for="pwd-email">密保邮箱</label>
        <input id="email" class="email" type="email"
               style="color:#999;border-radius: 3px;width: 200px;height: 25px;" value="请输入邮箱" required="required"
               name="email" type="email" maxlength="20" minlength="6" value=""
               onfocus="if(this.value=='请输入邮箱'){this.value='';this.style.color='#424242'}"
               onblur="if(this.value==''){this.value='请输入邮箱';this.style.color='#999'};">
    </div>
    <div>
        <input type="submit" class="userword-send" name="userword-send" value="发送验证码">
    </div>
    <div class="demo2">
        <label>验证码</label>
        <input id="userword" class="userword" type="number" name="userword"
               style="border-radius: 3px;width: 200px;height: 25px;" maxlength="20" minlength="1"">
    </div>
    <input type="submit" value="找回密码"  class="demo3">

    <p><?php echo $err?></p>
</form>
</body>
</html>

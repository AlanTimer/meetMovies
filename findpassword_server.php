<?php
//引用类
require "php/my_email.php";
//获取提交数据
$email=isset($_POST['email'])?$_POST['email']:"";
$userword=isset($_POST['userword'])?$_POST['userword']:"";
$err="";//错误信息

if($email != ""){
    //发送验证码
    $my_email=new my_email();
    $verificationCode=rand(0,9).rand(0,9).rand(0,9).rand(0,9);
    setcookie('verificationCode', $verificationCode);
    $my_email->sendMail($email,$verificationCode);
    if ($userword != ""){
        $verificationCode=$_COOKIE['verificationCode'];
        if($userword == $verificationCode)
            $err="注册成功";
        else
            $err="验证码错误";
    }
}
include_once "findpassword.php";

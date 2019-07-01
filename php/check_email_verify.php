<?php
$user_word=isset($_POST['user_word'])?$_POST['user_word']:"";
session_start();
if(isset($_COOKIE['email_verify'])){
    $verify_email=$_SESSION['verify_email'];
    if($user_word == $verify_email)
        $err="2";//验证码正确
    else
        $err="1";//验证码错误
}else
    $err="3";//验证码失效
echo $err;

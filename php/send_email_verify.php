<?php
require 'PHPMailer/my_email.php';
$email=isset($_POST['email'])?$_POST['email']:"";
session_start();
//发送验证码
$my_email=new my_email();
$verificationCode=rand(0,9).rand(0,9).rand(0,9).rand(0,9);
$_SESSION['verify_email']=$verificationCode;
$my_email->sendMail($email,$verificationCode);
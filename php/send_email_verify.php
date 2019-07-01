<?php
require 'my_email.php';
$email=isset($_POST['email'])?$_POST['email']:"";
session_start();
$my_email=new my_email();
$verificationCode=rand(0,9).rand(0,9).rand(0,9).rand(0,9);
$_SESSION['verify_email']=$verificationCode;
setcookie('email_verify','1',time()+300);
$my_email->sendMail($email,$verificationCode);

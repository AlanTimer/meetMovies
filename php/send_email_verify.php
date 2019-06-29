<?php
require 'my_email.php';
$email=isset($_POST['email'])?$_POST['email']:"";
$email="2743311904@qq.com";
session_start();
$my_email=new my_email();
$verificationCode=rand(0,9).rand(0,9).rand(0,9).rand(0,9);
$_SESSION['verify_email']=$verificationCode;
//print_r($_SESSION['verify_email']);
$my_email->sendMail($email,$verificationCode);

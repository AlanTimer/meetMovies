<?php
require 'my_email.php';
$email=isset($_POST['email'])?$_POST['email']:"";
session_start();
$my_email=new my_email();
$verificationCode=rand(0,9).rand(0,9).rand(0,9).rand(0,9);
$_SESSION['email_verify']=$verificationCode;
//print_r($_SESSION['email_verify']);
$my_email->sendMail($email,$verificationCode);

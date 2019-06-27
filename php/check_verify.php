<?php
$verify = trim($_POST['verify']);       //trim函数去除前后空格
session_start();									  //初始化Session
//判断验证码
if($verify == $_SESSION['verify']){
    $result= '2';//验证码正确
}else
    $result= '1';//验证码错误
echo $result;
?>

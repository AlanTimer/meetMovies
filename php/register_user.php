<?php
require "config.php";                      //引入配置文件
$username = trim($_POST['username']);       //trim函数去除前后空格
$password = trim($_POST['password']);       //trim函数去除前后空格
$email = trim($_POST['email']);       //trim函数去除前后空格
try{
    //连接数据库、选择数据库
    $pdo = new PDO(DB_DSN,DB_USER,DB_PWD);
}catch(PDOException $e){
    //输出异常信息
    echo $e->getMessage();
}
//user表中注册用户名
$res = $pdo->prepare("INSERT INTO User(username,password,email) VALUES('$username','$password','$email')");
$res->execute();
?>

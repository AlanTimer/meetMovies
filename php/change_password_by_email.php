<?php
session_start();
require('config.php');//数据库配置
$email = $_POST['email'];
$password = $_POST['password'];

try{
    //连接数据库、选择数据库
    $pdo = new PDO(DB_DSN,DB_USER,DB_PWD);
}catch(PDOException $e){
    //输出异常信息
    echo $e->getMessage();
}

//更新密码
$sql = "update user set password = :password where email = :email";
$res = $pdo->prepare($sql);
$res->bindParam(':password',$password);//绑定参数
$res->bindParam(':email',$email);//绑定参数
$res->execute();
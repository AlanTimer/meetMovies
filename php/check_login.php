<?php
require "config.php";                      //引入配置文件
session_start();
$username = trim($_POST['username']);       //trim函数去除前后空格
$password = trim($_POST['password']);       //trim函数去除前后空格
try{
    //连接数据库、选择数据库
    $pdo = new PDO(DB_DSN,DB_USER,DB_PWD);
}catch(PDOException $e){
    //输出异常信息
    echo $e->getMessage();
}
$sql = "SELECT * FROM user WHERE( username = :username or email = :email) and password = :password";
$res = $pdo->prepare($sql);
$res->bindParam(':username',$username);
$res->bindParam(':email',$username);
$res->bindParam(':password',$password);
$res->execute();
$row = $res->fetch(PDO::FETCH_ASSOC);
if($row) {
    $result = '2';
    $_SESSION['user']=$row;
} else
    $result='1';
echo $result;
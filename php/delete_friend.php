<?php
require "config.php";
session_start();
$user=$_SESSION['user']['Id'];
$friend=$_POST['friend'];

try{
    //连接数据库、选择数据库
    $pdo = new PDO(DB_DSN,DB_USER,DB_PWD);
}catch(PDOException $e){
    //输出异常信息
    echo $e->getMessage();
}
//删除好友
$sql = 'delete from friends where user = :user && friend = :friend';
$res = $pdo->prepare($sql);
$res->bindParam(':user',$user);//绑定参数
$res->bindParam(':friend',$friend);//绑定参数
$res->execute();



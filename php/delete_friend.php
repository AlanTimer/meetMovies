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

//    减少一个关注
$sql = "select follows_num from user where Id = '$user'";
$res = $pdo->prepare($sql);
$res->execute();
$row=$res->fetch();
$now_num=$row['follows_num']-1;
$sql = "update user set follows_num ='$now_num' where Id = '$user'";
$res = $pdo->prepare($sql);
$res->execute();

//减少一个粉丝
$sql = "select fans_num from user where Id = '$friend'";
$res = $pdo->prepare($sql);
$res->execute();
$row=$res->fetch();
$now_num=$row['fans_num']-1;
$sql = "update user set fans_num ='$now_num' where Id = '$friend'";
$res = $pdo->prepare($sql);
$res->execute();


<?php
session_start();
require "config.php";
$user=$_SESSION['user']['Id'];
$friend=$_POST['friend'];

$pdo = new PDO(DB_DSN,DB_USER,DB_PWD); //连接数据库、选择数据库
//user表中查找id
$sql = 'select friend from friends where user = :user && friend = :friend';
$res = $pdo->prepare($sql);
$res->bindParam(':user',$user);//绑定参数
$res->bindParam(':friend',$user);//绑定参数
$res->execute();
$friends_id = $res->fetch(PDO::FETCH_NUM);  //返回一个索引为结果集列名的数组
//当不是好友时，加为好友
if(!$friends_id){
//    将两个人加为好友
    $sql = 'insert into friends(user,friend) values (:user,:friend)';
    $res = $pdo->prepare($sql);
    $res->bindParam(':user',$user);//绑定参数
    $res->bindParam(':friend',$friend);//绑定参数
    $res->execute();
//    增加一个关注
    $sql = "select follows_num from user where Id = '$user'";
    $res = $pdo->prepare($sql);
    $res->execute();
    $row=$res->fetch();
    $now_num=$row['follows_num']+1;
    $sql = "update user set follows_num ='$now_num' where Id = '$user'";
    $res = $pdo->prepare($sql);
    $res->execute();

    //增加一个粉丝
    $sql = "select fans_num from user where Id = '$friend'";
    $res = $pdo->prepare($sql);
    $res->execute();
    $row=$res->fetch();
    $now_num=$row['fans_num']+1;
    $sql = "update user set fans_num ='$now_num' where Id = '$friend'";
    $res = $pdo->prepare($sql);
    $res->execute();

}




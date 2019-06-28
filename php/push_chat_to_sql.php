<?php
session_start();
require "config.php";
//$from=$_SESSION['user']['Id'];      //发送者的Id
//$to=$_POST['to'];                   //接受者的Id
//$message=$_POST['message'];         //信息内容
$time=time();                       //当前时间
print_r($time);

//try{
//    //连接数据库、选择数据库
//    $pdo = new PDO(DB_DSN,DB_USER,DB_PWD);
//}catch(PDOException $e){
//    //输出异常信息
//    echo $e->getMessage();
//}
////user表中查找id
//$sql = 'select friend from friends where user = :user && friend = :friend';
//$res = $pdo->prepare($sql);
//$res->bindParam(':user',$user);//绑定参数
//$res->bindParam(':friend',$user);//绑定参数
//$res->execute();
//$friends_id = $res->fetch(PDO::FETCH_NUM);  //返回一个索引为结果集列名的数组
//
//
//

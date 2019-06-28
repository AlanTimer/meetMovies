<?php
//session_start();
require "config.php";
//$from=$_SESSION['user']['Id'];      //发送者的Id
//$to=$_POST['to'];                   //接受者的Id
//$message=$_POST['message'];         //信息内容
$from=1;      //发送者的Id
$to=2;                   //接受者的Id
$message='d';         //信息内容
$time=time();                        //当前时间

try{
    //连接数据库、选择数据库
    $pdo = new PDO(DB_DSN,DB_USER,DB_PWD);
}catch(PDOException $e){
    //输出异常信息
    echo $e->getMessage();
}
//chats表中增加语句
$sql = "insert into chats (from,to,message,time) values('$from','$to','$message','$time')";
$res = $pdo->prepare($sql);
$res->execute();




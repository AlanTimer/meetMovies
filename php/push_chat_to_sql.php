<?php
session_start();
require "config.php";
$from=$_POST['from'];
$to=$_POST['to'];                   //接受者的Id
$message=$_POST['message'];         //信息内容
$time=$_POST['time'];
print_r($from);
try{
    //连接数据库、选择数据库
    $pdo = new PDO(DB_DSN,DB_USER,DB_PWD);
}catch(PDOException $e){
    //输出异常信息
    echo $e->getMessage();
}
//chats表中增加语句
$sql = "insert into chats(from_id,to_id,message,send_time) values('$from','$to','$message','$time')";
$res = $pdo->prepare($sql);
$res->execute();

echo $from;


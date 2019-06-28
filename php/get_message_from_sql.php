<?php
//session_start();
require "config.php";
//$from=$_SESSION['user']['Id'];                       //发送者的Id
//$chat_to_id=$_POST['chat_to_id'];                   //接受者的Id
$from='1';                       //发送者的Id
$chat_to_id='2';                   //接受者的Id

try{
    //连接数据库、选择数据库
    $pdo = new PDO(DB_DSN,DB_USER,DB_PWD);
}catch(PDOException $e){
    //输出异常信息
    echo $e->getMessage();
}
//chats表中增加语句
$sql = "select * from chats where from_id = '$from' && to_id = '$chat_to_id'";
$res = $pdo->prepare($sql);
$res->execute();
$row=$res->fetchAll();
print_r($row);



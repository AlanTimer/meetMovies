<?php
session_start();
header("Content-type:text/html;charset=utf-8");
require "config.php";
$from=$_POST['from'];
$chat_to_id=$_POST['chat_to_id'];                   //接受者的Id
$last_time=$_POST['last_time'];                   //时间戳
//连接数据库
$pdo = new PDO(DB_DSN,DB_USER,DB_PWD);
$sql = "select * from chats where(((from_id = '$from' && to_id = '$chat_to_id') ||
    (from_id = '$chat_to_id' && to_id = '$from')) && (send_time > '$last_time'))   order by send_time ASC";
$res = $pdo->prepare($sql);
$res->execute();
$row=$res->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($row);



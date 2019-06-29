<?php
header("Content-type:text/html;charset=utf-8"); //utf-8
session_start();                    //开始 session
require "php/config.php";
//$user_Id=$_SESSION['user']['Id'];  //发送者的Id
date_default_timezone_set('Asia/Shanghai');//'Asia/Shanghai'   亚洲/上海
$user_Id='1';                       //测试发送者的Id
$friends=array();    //返回数组
//连接数据库、选择数据库
$pdo = new PDO(DB_DSN,DB_USER,DB_PWD);
//从聊天信息表中查询数据
$sql = "select * from chats where from_id = '$user_Id' || to_id = '$user_Id' order by send_time DESC";
$res = $pdo->prepare($sql);
$res->execute();
$row=$res->fetchAll(PDO::FETCH_ASSOC);
//遍历每一项
foreach ($row as $j => $k){
    $temp=array();
    $temp['chat_last_time']=change_time($k['send_time']);
    $temp['chat_id']=$k['Id'];
    $Id=$k['Id'];//暂存Id
    $sql = "select * from user where Id = '$Id' ";
    $res = $pdo->prepare($sql);
    $res->execute();
    $row2=$res->fetch(PDO::FETCH_ASSOC);
    $temp['chat_username']=$row2['username'];
    $temp['chat_picture']=$row2['picture'];
    array_push($friends,$temp);
}

$friends_message=array();
$from=$user_Id;
foreach ($friends as  $k){
    $chat_to_id=$k['chat_id'];
    $sql = "select * from chats where (from_id = '$from' && to_id = '$chat_to_id') || to_id = '$from' && from_id = '$chat_to_id'";
    $res = $pdo->prepare($sql);
    $res->execute();
    $row=$res->fetchAll(PDO::FETCH_ASSOC);
    $friends_message[$chat_to_id]=$row;
}

include "chat_interface.html";

function change_time($time){
    $now=time();//现在时间
    if(($now-$time)>(172800)){   //超过两天显示y-m-d
        return date("Y-m-d",$time);
    }elseif (($now-$time)>86400){   //超过一天显示昨天
        return '昨天';
    }else{          //显示h:m AM
        return date("H:i A",$time);
    }
}




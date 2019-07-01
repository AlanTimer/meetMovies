<?php
header("Content-type:text/html;charset=utf-8"); //utf-8
session_start();                    //开始 session
require "php/config.php";

$_SESSION['user']['Id']='4';

$user_Id=$_SESSION['user']['Id'];  //发送者的Id
date_default_timezone_set('Asia/Shanghai');//'Asia/Shanghai'   亚洲/上海
//$user_Id='2';                       //测试发送者的Id
$friends=array();    //返回数组
//连接数据库、选择数据库
$pdo = new PDO(DB_DSN,DB_USER,DB_PWD);
//从聊天信息表中查询数据
$sql = "select * from chats where from_id = '$user_Id' || to_id = '$user_Id' order by send_time DESC";
$res = $pdo->prepare($sql);
$res->execute();
$row=$res->fetchAll(PDO::FETCH_ASSOC);

$id_temp=array();//储存Id
//遍历每一项
foreach ($row as $j => $k){
    if($k['to_id'] != $user_Id && !in_array($k['to_id'],$id_temp))
        array_push($id_temp,$k['to_id']);
    if($k['from_id'] != $user_Id && !in_array($k['from_id'],$id_temp))
        array_push($id_temp,$k['from_id']);
}

//遍历每一项
foreach ($id_temp as $id_num){
    $temp=array();
    $sql = "select * from chats where (from_id = '$user_Id' && to_id = '$id_num' )||
                        (to_id = '$user_Id' && from_id = '$id_num' )  order by send_time DESC";
    $res = $pdo->prepare($sql);
    $res->execute();
    $row=$res->fetch(PDO::FETCH_ASSOC);
    $temp['chat_last_time']=change_time($row['send_time']);
    $temp['chat_id']=$id_num;
    $sql = "select * from user where Id = '$id_num' ";
    $res = $pdo->prepare($sql);
    $res->execute();
    $row2=$res->fetch(PDO::FETCH_ASSOC);
    $temp['chat_username']=$row2['username'];
    $temp['chat_picture']=$row2['picture'];
    array_push($friends,$temp);
}

$friends_num=count($friends);
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
//print_r($friends);
//
//print_r($friends_message);
include "chat_interface.php";
//exit();
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




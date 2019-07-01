<?php
session_start();
header("Content-type:text/html;charset=utf-8");
require "php\config.php";
$Id=$_SESSION['user']['Id'];
$friends=array();
try{
    $pdo = new PDO(DB_DSN,DB_USER,DB_PWD);//连接数据库、选择数据库
}catch(PDOException $e){
    echo $e->getMessage(); //输出异常信息
}

//friend表中查找id
$sql = 'select Id from user where Id not in (select friend from friends where user = :Id)';
$res = $pdo->prepare($sql);
$res->bindParam(':Id',$Id);//绑定参数
$res->execute();
$news_id = $res->fetchAll(PDO::FETCH_NUM);  //返回一个索引为结果集列名的数组
foreach ($news_id as $k=>$user){
    if($user[0]!=$Id){
        $sql = 'select * from user where Id = :Id';
        $res = $pdo->prepare($sql);
        $res->bindParam(':Id',$user[0]);//绑定参数
        $res->execute();
        $rows = $res->fetch(PDO::FETCH_ASSOC);  //返回一个索引为结果集列名的数组
        $temp=array('username'=>$rows['username'],'picture'=>$rows['picture'],'tag'=>$rows['tag'],'group'=>$rows['group'],'Id'=>$rows['Id']);
        array_push($friends,$temp);
    }
}

include_once "add_friend.html";
<?php
header("Content-type:text/html;charset=utf-8");
require 'php/config.php';//导入数据库配置文件
session_start();
$Id=$_SESSION['user']['Id'];
try{
    $pdo = new PDO(DB_DSN,DB_USER,DB_PWD);//连接数据库、选择数据库
}catch(PDOException $e){
    echo $e->getMessage();//输出异常信息
}
//user表中查找id
$sql = 'select * from user where Id = :Id';
$res = $pdo->prepare($sql);
$res->bindParam(':Id',$Id);//绑定参数
$res->execute();
$user= $res->fetch(PDO::FETCH_ASSOC);  //返回一个索引为结果集列名的数组
$_SESSION['user']=$user;

include_once 'personal_label_login.php';
//include_once 'personal_label_login_sever.php';
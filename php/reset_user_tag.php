<?php
require "config.php";
$Id=$_SESSION['user']['Id'];
$now_tag=$_POST['tag'];
//$now_tag="喜剧/悲剧";
try{
    //连接数据库、选择数据库
    $pdo = new PDO(DB_DSN,DB_USER,DB_PWD);
}catch(PDOException $e){
    //输出异常信息
    echo $e->getMessage();
}
//user表中查找id
$sql = 'update user set tag= :tag where Id = :Id';
$res = $pdo->prepare($sql);
$res->bindParam(':tag',$now_tag);//绑定参数
$res->bindParam(':Id',$Id);//绑定参数
$res->execute();
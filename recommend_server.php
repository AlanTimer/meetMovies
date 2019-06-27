<?php
//导入数据库配置文件
require "php/config.php";
//获取提交数据
$word = isset($_POST['word'])?'%'.$_POST['word'].'%':"";
//建立PDO数据库连接
$pdo=new PDO(DB_DSN,DB_USER,DB_PWD);
if(isset($_POST['word']))
    $result=$pdo->prepare("select * from movies where name like '$word' limit 1,1000");
else
    $result=$pdo->prepare("select * from movies limit 1,10");
$result->execute();
$data=$result->fetchAll(PDO::FETCH_ASSOC);
include_once "recommend.php";


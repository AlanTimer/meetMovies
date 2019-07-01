<?php
require "php/config.php";  //导入数据库配置文件
header("Content-type:text/html;charset=utf-8"); //utf-8
$movie_name=$_POST['movie_name'];//存在接受
//$movie_name='霸王别姬';//存在接受
//建立PDO数据库连接，查询数据
$pdo=new PDO(DB_DSN,DB_USER,DB_PWD);
$sql="select  * from movies where name = '$movie_name' ";
$result=$pdo->prepare($sql);
$result->execute();
$data=$result->fetch(PDO::FETCH_ASSOC);
include_once 'php/get_recommend_movies_2.php';
include_once 'movieDetails.html';

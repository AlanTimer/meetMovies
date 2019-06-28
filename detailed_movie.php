<?php
require "php/config.php";  //导入数据库配置文件
header("Content-type:text/html;charset=utf-8"); //utf-8
$movie_id=@assert($_POST['movie_id'])?$_POST['movie_id']:'1';//存在接受，反之为1
//建立PDO数据库连接，查询数据
$pdo=new PDO(DB_DSN,DB_USER,DB_PWD);
$sql="select  * from movies where Id = '$movie_id' ";
$result=$pdo->prepare($sql);
$result->execute();
$data=$result->fetch(PDO::FETCH_ASSOC);

include_once '';

<?php
require "php/config.php";  //导入数据库配置文件
header("Content-type:text/html;charset=utf-8"); //utf-8
session_start();    //开启session
//提交数据处理
//如果是搜索提交
if(isset($_POST['search_keyword'])){
    $_SESSION['movies_type']="";//电影类型为空,适配全部
    $_SESSION['movies_keyword']=$_POST['search_keyword'];//电影名称
    $_SESSION['order_type']="score";//排序类型默认为分数
}//如果提交的数据是电影类型
elseif(isset($_POST['movies_type'])){
    $real_type=substr($_POST['movies_type'],0,6);
    $_SESSION['movies_type']=$real_type;
}//如果提交的数据是排序类型,规定name,release_date,score
elseif (isset($_POST['order_type'])){
    if($_POST['order_type'] == '按时间排序')
        $_SESSION['order_type']='release_date';
    elseif ($_POST['order_type'] == '按名称排序')
        $_SESSION['order_type']='name';
    else
        $_SESSION['order_type']='score';
}//如果提交的是关键字
elseif (isset($_POST['movies_keyword'])){
    $_SESSION['movies_keyword']=$_POST['movies_keyword'];
}//如果什么都没有提交
else{
    $_SESSION['movies_type']="";//电影类型为空,适配全部
    $_SESSION['movies_keyword']="";//电影名称为空,适配全部
    $_SESSION['order_type']="score";//排序类型默认为分数
}
//读取数据
$movies_type='%'.$_SESSION['movies_type'].'%';
$movies_keyword='%'.$_SESSION['movies_keyword'].'%';
$order_type=$_SESSION['order_type'];
//建立PDO数据库连接，查询数据
$pdo=new PDO(DB_DSN,DB_USER,DB_PWD);
$sql="select  * from movies where( name like '$movies_keyword'  || director like '$movies_keyword' || actor like '$movies_keyword'
       || screenwriter like '$movies_keyword' )&& type like '$movies_type' order by $order_type DESC limit 0,100";
$result=$pdo->prepare($sql);
$result->execute();
$data=$result->fetchAll(PDO::FETCH_ASSOC);
include_once 'php/get_recommend_movies.php';
include_once 'searchMovie.html';
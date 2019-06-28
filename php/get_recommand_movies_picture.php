<?php
//获得推荐电影
header("Content-type:text/html;charset=utf-8"); //utf-8
session_start();                    //开始 session
require "config.php";
//$user_Id=$_SESSION['user']['Id'];  //发送者的Id
$user_Id = '1';                       //测试发送者的Id
$result = array();    //返回数组
//连接数据库、选择数据库
$pdo = new PDO(DB_DSN, DB_USER, DB_PWD);
//从聊天信息表中查询数据
$sql = "select * from user where Id = '$user_Id'";
$res = $pdo->prepare($sql);
$res->execute();
$user = $res->fetch(PDO::FETCH_ASSOC);
$tags=explode('/',$user['tag']);    //划分字符串
$all_movies=array();

for($i=0;$i<count($tags);$i++){
    $tag='%'.$tags[$i].'%';
    $sql = "select * from movies where type like '$tag' limit 0,5";
    $res = $pdo->prepare($sql);
    $res->execute();
    $movies = $res->fetchAll(PDO::FETCH_ASSOC);
    for($j=0;$j<5;$j++ ){
        $temp=array("Id"=>$movies[$j]['Id'],"picture"=>$movies[$j]['picture'],'score'=>$movies[$j]['score']);
        array_push($all_movies,$temp);
    }
}
for($i=0;$i<count($all_movies);$i++){
    for($j=$i+1;$j<count($all_movies);$j++){
        if($all_movies[$i]['score'] < $all_movies[$j]['score']){
            $temp=$all_movies[$i];
            $all_movies[$i]=$all_movies[$j];
            $all_movies[$j]=$temp;
        }
    }
}
$all_movies=array_slice($all_movies,0,5);
echo json_encode($all_movies);


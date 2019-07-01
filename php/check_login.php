<?php
require "config.php";                      //引入配置文件
session_start();
$username = trim($_POST['username']);       //trim函数去除前后空格
$password = trim($_POST['password']);       //trim函数去除前后空格

try{
    //连接数据库、选择数据库
    $pdo = new PDO(DB_DSN,DB_USER,DB_PWD);
}catch(PDOException $e){
    //输出异常信息
    echo $e->getMessage();
}
$sql = "SELECT * FROM user WHERE( username = :username or email = :email) and password = :password";
$res = $pdo->prepare($sql);
$res->bindParam(':username',$username);
$res->bindParam(':email',$username);
$res->bindParam(':password',$password);
$res->execute();
$row = $res->fetch(PDO::FETCH_ASSOC);
if($row) {
    if($row['tag']=='')
        $result='3';    //登录成功，用户未选择标签
    else
        $result = '2';  //登录成功，用户已经选择标签
    $_SESSION['user']=$row;//服务器缓存
} else
    $result='1';//用户名或密码错误
echo $result;
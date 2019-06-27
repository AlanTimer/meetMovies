<?php
session_start();
require('config.php');//数据库配置
$Id = $_SESSION['user']['Id'];
$sex= $_POST['sex'];
$qq= $_POST['qq'];
$email= $_POST['email'];
try{
    //连接数据库、选择数据库
    $pdo = new PDO(DB_DSN,DB_USER,DB_PWD);
}catch(PDOException $e){
    //输出异常信息
    echo $e->getMessage();
}
$sql = "update user set sex = :sex,qq = :qq,email = :email  where Id = :Id";
$res = $pdo->prepare($sql);
$res->bindParam(':sex',$sex);//绑定参数
$res->bindParam(':qq',$qq);//绑定参数
$res->bindParam(':email',$email);//绑定参数
$res->bindParam(':Id',$Id);//绑定参数

if($res->execute()){
    echo "<head><meta charset='utf-8'></head>";
    echo "<script> alert('保存成功');window.location.href='../person_things_sever.php';</script>";
}else{
    echo "<head><meta charset='utf-8'></head>";
    echo "<script> alert('保存失败');window.location.href='../person_things_sever.php';</script>";
}


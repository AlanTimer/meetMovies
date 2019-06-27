<?php
session_start();
require('config.php');//数据库配置
$old_password = ($_POST['old_password']);
$new_password = ($_POST['new_password']);
$Id = $_SESSION['user']['Id'];
//$Id=21;
try{
    //连接数据库、选择数据库
    $pdo = new PDO(DB_DSN,DB_USER,DB_PWD);
}catch(PDOException $e){
    //输出异常信息
    echo $e->getMessage();
}
$sql = "select password from user where Id = :Id";
$res = $pdo->prepare($sql);
$res->bindParam(':Id',$Id);//绑定参数
$res->execute();
$row=$res->fetch(PDO::FETCH_ASSOC);
$password=$row['password'];
//更新密码
if($old_password == $password){  //判断输入两次新密码是否一致
    $sql = "update user set password = :new_password where Id = :Id";
    $res = $pdo->prepare($sql);
    $res->bindParam(':new_password',$new_password);//绑定参数
    $res->bindParam(':Id',$Id);//绑定参数
    if($res->execute()){
        echo 1;         //更改成功
    }else{
        echo 0;         //更改失败
    }
}else{
    echo -1;            //原始密码错误
}

<?php
require "config.php";                      //引入配置文件
$username = trim($_POST['username']);       //trim函数去除前后空格
$password = trim($_POST['password']);       //trim函数去除前后空格
$email = trim($_POST['email']);       //trim函数去除前后空格
$register_time=date('Y.m.d',time());
$pdo = new PDO(DB_DSN,DB_USER,DB_PWD);//连接数据库、选择数据库
//user表中注册用户名
$res = $pdo->prepare("INSERT INTO User(username,password,email,register_time) VALUES('$username','$password','$email','$register_time')");
$res->execute();


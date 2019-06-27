<?php
require "config.php";                      //引入配置文件
$username = trim($_POST['username']);       //trim函数去除前后空格
try{
    //连接数据库、选择数据库
    $pdo = new PDO(DB_DSN,DB_USER,DB_PWD);
}catch(PDOException $e){
    //输出异常信息
    echo $e->getMessage();
}
//user表中查找输入的用户名和密码是否匹配
$sql = 'select * from user where username = :username';
$res = $pdo->prepare($sql);
$res->bindParam(':username',$username);//绑定参数
if($res->execute()){
    $rows = $res->fetch(PDO::FETCH_ASSOC);  //返回一个索引为结果集列名的数组
    if($rows){
        $res =  '1';//被注册!
    }else{
        $res = '2';//没被注册
    }
    echo $res;
}
?>

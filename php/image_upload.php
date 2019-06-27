<?php
//判断上传文件是否满足需求
if (!$_FILES['File_data']) {
    die ( 'Image data not detected!' );
}
if ($_FILES['File_data']['error'] > 0) {
    switch ($_FILES ['File_data'] ['error']) {
        case 1 :
            $error_log = 'The file is bigger than this PHP installation allows';
            break;
        case 2 :
            $error_log = 'The file is bigger than this form allows';
            break;
        case 3 :
            $error_log = 'Only part of the file was uploaded';
            break;
        case 4 :
            $error_log = 'No file was uploaded';
            break;
        default :
            break;
    }
    die ( 'upload error:' . $error_log );
} else {
    $img_data = $_FILES['File_data']['tmp_name'];
    $size = getimagesize($img_data);
    $file_type = $size['mime'];
    if (!in_array($file_type, array('image/jpg', 'image/jpeg', 'image/pjpeg', 'image/png', 'image/gif'))) {
        $error_log = 'only allow jpg,png,gif';
        die ( 'upload error:' . $error_log );
    }
    switch($file_type) {
        case 'image/jpg' :
        case 'image/jpeg' :
        case 'image/pjpeg' :
            $extension = 'jpg';
            break;
        case 'image/png' :
            $extension = 'png';
            break;
        case 'image/gif' :
            $extension = 'gif';
            break;
    }
}
if (!is_file($img_data)) {
    die ( 'Image upload error!' );
}
//图片保存路径,默认保存在该代码所在目录(可根据实际需求修改保存路径)
$save_path = dirname(dirname( __FILE__ )).'/images/user';
$uinqid = uniqid();
$filename = $save_path . '/' . $uinqid . '.' . $extension;
$result = move_uploaded_file( $img_data, $filename );
if ( ! $result || ! is_file( $filename ) ) {
    die ( 'Image upload error!' );
}
echo 'Image data save successed,file:' . $filename;

//写入数据库
require "config.php";
session_start();
$Id=$_SESSION['user']['Id'];
//$Id=1;
try{
    //连接数据库、选择数据库
    $pdo = new PDO(DB_DSN,DB_USER,DB_PWD);
}catch(PDOException $e){
    //输出异常信息
    echo $e->getMessage();
}
//user表中查找id
$sql = 'update user set picture= :picture where Id = :Id';
$res = $pdo->prepare($sql);
$url= $uinqid . '.' . $extension;//组装路径
$res->bindParam(':picture',$url);//绑定参数
$res->bindParam(':Id',$Id);//绑定参数
$res->execute();
$_SESSION['user']['picture'] = $url;//更改头像session信息
exit ();
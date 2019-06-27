<?php
session_start();									 //初始化Session变量
header("content-type:image/png");  					 //设置创建图像的格式
$image_width  = 76;                     				 //设置图像宽度
$image_height = 40;                     			    //设置图像高度
$lenth        = 4;                                  //字符串长度
$str  = "23456789abcdefghijkmnpqrstuvwxyzABCDEFGHIJKLMNPQRSTUVWXYZ"; //数字字母验证码
$code = '';
for ($i=0; $i<$lenth; $i++){
    $code.= $str[mt_rand(0, strlen($str)-1)];
}
$_SESSION['verify'] = $code;  		                    //将获取的随机数验证码写入到Session变量中
$image = imagecreate($image_width,$image_height);     //创建一个画布
imagecolorallocate($image,255,255,255);     	    //设置画布的颜色
for($i=0;$i<strlen($_SESSION['verify']);$i++){ 	    //循环读取Session变量中的验证码
    $font  = mt_rand(3,5);                          	  	    //设置随机的字体
    $x     = mt_rand(1,8)+$image_width*$i/4;           	        //设置随机字符所在位置的X坐标
    $y     = mt_rand(8,$image_height/4);               	        //设置随机字符所在位置的Y坐标
    $color = imagecolorallocate($image,mt_rand(0,100),mt_rand(0,150),mt_rand(0,200));		//设置字符的颜色
    imagestring($image,$font,$x,$y,$_SESSION['verify'][$i],$color);			    //水平输出字符
}

//绘制干扰点元素
$pixel=30;
$black = imagecolorallocate($image, 0, 0, 0);
if($pixel){
    for($i=0;$i<$pixel;$i++){
        imagesetpixel($image, mt_rand(0, $image_width-1),mt_rand(0, $image_height-1),$black);
    }
}

imagepng($image);      					 //生成PNG格式的图像
imagedestroy($image);  				    //释放图像资源

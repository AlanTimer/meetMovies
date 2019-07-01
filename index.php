<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>邂逅电影</title>

    <link rel="stylesheet" type="text/css" href="css/style.css" media="screen" />
    <script type="text/javascript" src="script/jquery-1.8.3.min.js"></script>
    <script type="text/javascript" src="script/jquery.banner.revolution.min.js"></script>
    <script type="text/javascript" src="script/banner.js"></script>
    <style>
        .pic2{
            position: absolute;
            top: 450px;
            left: 250px;
        }
        .pic5{
            position: absolute;
            left:110px;
            top: 560px;
        }
        .pic6{
            position: absolute;
            left: 460px;
            top: 560px;
        }
        .pic7{
            position: absolute;
            left: 1005px;
            top: 560px;
        }
        .wenzi1{
            position: absolute;
            left: 380px;
            top: 468px;
            font-size: 20px;
        }
        .wenzi2{
            position: absolute;
            left: 465px;
            top: 468px;
            font-size: 20px;
        }
        .wenzi3{
            position: absolute;
            left: 550px;
            top: 468px;
            font-size: 20px;
        }
        .wenzi4{
            position: absolute;
            left: 680px;
            top: 468px;
            font-size: 20px;
        }
        .wenzi5{
            position: absolute;
            left: 800px;
            top: 468px;
            font-size: 20px;
        }
        .zuojiantou{
            position: absolute;
            left: 0px;
            top: 205px;
        }
        .youjiantou{
            position: absolute;
            right: -470px;
            top: 205px;
        }
        .tu1{
            position: absolute;
            left: 110px;
            top: 1050px;
        }
        .tu2{
            position: absolute;
            left: 440px;
            top: 1050px;
        }
        .tu3{
            position: absolute;
            left: 770px;
            top: 1050px;
        }
        .tu4{
            position: absolute;
            left: 1100px;
            top: 1050px;
        }
        .lianjie1{
            position: absolute;
            left: 15px;
            top: 1268px;
        }
        .lianjie2{
            position: absolute;
            left: 384px;
            top: 1268px;
        }
        .lianjie3{
            position: absolute;
            left: 774px;
            top: 1268px;
        }
        .lianjie4{
            position: absolute;
            left: 1173px;
            top: 1268px;
        }


    </style>
</head>
<body>

<div style="z-index: 10000" class="wenzi1">
    <a href="login.php" style="color: aquamarine">登录</a>
</div>

<div style="z-index: 10000" class="wenzi2">
    <a href="register.php" style="color: aquamarine">注册</a>
</div>

<div style="z-index: 10000" class="wenzi3">
    <a href="login.php" style="color: aquamarine">个人中心</a>
</div>

<div style="z-index: 10000" class="wenzi4">
    <a href="login.php" style="color: aquamarine">好友管理</a>
</div>

<div style="z-index: 10000" class="wenzi5">
    <a href="login.php" style="color: aquamarine">电影搜索</a>
</div>

<div style="z-index: 99" class="zuojiantou">
    <img src="images/左箭头.png" alt="" width="8%" height="8%">
</div>

<div style="z-index: 99" class="youjiantou">
    <img src="images/右箭头.png" alt="" width="8%" height="8%">
</div>

<img class="pic2" src="images/导航.png" alt="导航" width="" height="">

<img class="pic5" src="images/我们的服务.png" alt="我们的服务" width="325" height="440">

<img class="pic6" src="images/关于我们.png" alt="关于我们" width="521" height="440">

<img class="pic7" src="images/公司动态.png" alt="公司动态" width="396" height="440">

<img class="tu1" src="images/图1.png" alt="" width="300" height="188">

<img class="tu2" src="images/图2.png" alt="" width="300" height="188">

<img class="tu3" src="images/图3.png" alt="" width="300" height="188">

<img class="tu4" src="images/图4.png" alt="" width="300" height="188">

<a href="http://www.iqiyi.com/" target="_blank">
    <img class="lianjie1" src="images/友情链接1.png" alt="友情链接" width="" height="">
</a>

<a href="https://v.qq.com/" target="_blank">
    <img class="lianjie2" src="images/友情链接2.png" alt="友情链接" width="" height="">
</a>

<a href="https://www.mgtv.com/" target="_blank">
    <img class="lianjie3" src="images/友情链接3.png" alt="友情链接" width="" height="">
</a>

<a href="https://www.youku.com/" target="_blank">
    <img class="lianjie4" src="images/友情链接4.png" alt="友情链接" width="" height="">
</a>


<div id="wrapper">
    <div class="fullwidthbanner-container">
        <div class="fullwidthbanner">
            <ul>
                <li data-transition="3dcurtain-horizontal" data-slotamount="15" data-masterspeed="300"> <img src="images/影片一览1.png" alt="" /> </li>
                <li data-transition="3dcurtain-vertical" data-slotamount="15" data-masterspeed="300" data-link="#"> <img src="images/影片一览2.png" alt="" /> </li>
                <li data-transition="papercut" data-slotamount="15" data-masterspeed="300" data-link="#"> <img src="images/影片一览3.png" alt="" /> </li>
                <li data-transition="turnoff" data-slotamount="15" data-masterspeed="300"> <img src="images/影片一览4.png" alt="" /> </li>
                <li data-transition="flyin" data-slotamount="15" data-masterspeed="300"> <img src="images/影片一览5.png" alt="" /> </li>
            </ul>
        </div>
    </div>
</div>


</body>
</html>
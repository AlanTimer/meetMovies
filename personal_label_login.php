<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>影友-个性标签</title>
    <link rel="stylesheet" type="text/css" href="css/semantic.css" />
    <link rel="stylesheet" type="text/css" href="css/main.css" />
    <link rel="Stylesheet" type="text/css" href="css/page.css"/>
    <link rel="stylesheet" type="text/css" href="script/highslide/highslide.css" />

    <script type="text/javascript" src="script/jquery.js" ></script>
    <script type="text/javascript" src="script/textarea.js"></script>
    <script type="text/javascript" src="script/layer/layer.js"></script>
    <script type="text/javascript" src="script/common.js"></script>
    <script type="text/javascript" src="script/semantic.js"></script>
    <script type="text/javascript" src="script/highslide/highslide-with-gallery.js"></script>

    <link rel="shortcut icon" href="images/logo.ico">
    <link rel="stylesheet" href="css/personalLabel1.css">
    <script src="script/personalLabel.js"></script>
    <script src="script/jquery.min.js"></script>
</head>
<body>
<!--导航-->
<div class="nav">
    <div class="width_1200">
        <ul>
            <li><a href="main.php">主界面</a></li>
            <li style="padding-left: 20px">
                <form method="post" action="search_movies.php" >
                    <input type="text" name="search_keyword" placeholder="三千世界来搜一搜吧...">
                    <button type="submit" class="search"></button>
                </form>
            </li>
            <li style="padding-left: 10px"><a href="setup_friends.php">我的好友</a></li>
            <li><a href="setup_chat.php">聊天室</a></li>

        </ul>
        <ol>
            <li>
                <a href="person_things_sever.php">
                    <?php echo $user['username'] ?>
                </a>
            </li>

            <li class="li_message">&nbsp;
                <dl class="menu">
                    <dd><a href="setup_chat.php">我的消息</a></dd>
                </dl>
            </li>
            <li class="li_set">&nbsp;
                <dl class="menu">
                    <dd><a href="person_things_sever.php">个人中心</a></dd>
                    <dd><a href="personal_label_login_sever.php">选择标签</a></dd>
                    <dd><a href="logout.php">退出</a></dd>
                </dl>
            </li>
        </ol>
    </div>
</div>
<!--个人简介-->
<div class="my_head width_1000">
    <div class="my_head_img">
        <img value="<?php echo $user['picture'] ?>" src="images/user/<?php echo $user['picture'] ?>">
    </div>
    <h4><?php echo $user['username'] ?></h4>
    <div class="my_head_message">
        <ul class="fl">
            <li>注册于：<?php echo $user['register_time'] ?></li>
        </ul>
        <div class="my_info_list fr">
            <div class="fr">
                <ul>
                    <li><span><?php echo $user['sex'] ?></span></li>
                    <li>性别</li>
                </ul>
                <ol></ol>
                <ul>
                    <li><span><?php echo $user['tag'] ?></span></li>
                    <li>标签</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!--个人信息-->
<div class="main">
    <div class="left setting-head">
        <div class="demo">
            <!--  标题  -->
            <div class="demo-title">
                请选择你喜欢的电影标签
            </div>
            <!--  标签  -->
            <div class="labelDiv">
                <ul class="row1">
                    <li1 value="惊悚" onclick="chooseLabel(this)" onmousedown="postLabel(this.innerText)">惊悚</li1>
                    <li1 value="剧情" onclick="chooseLabel(this)" onmousedown="postLabel(this.innerText)">剧情</li1>
                    <li1 value="犯罪" onclick="chooseLabel(this)" onmousedown="postLabel(this.innerText)">犯罪</li1>
                    <li1 value="动作" onclick="chooseLabel(this)" onmousedown="postLabel(this.innerText)">动作</li1>
                    <li1 value="爱情" onclick="chooseLabel(this)" onmousedown="postLabel(this.innerText)">爱情</li1>
                </ul>
                <ul class="row2">
                    <li1 value="科幻" onclick="chooseLabel(this)" onmousedown="postLabel(this.innerText)">科幻</li1>
                    <li1 value="悬疑" onclick="chooseLabel(this)" onmousedown="postLabel(this.innerText)">悬疑</li1>
                    <li1 value="冒险" onclick="chooseLabel(this)" onmousedown="postLabel(this.innerText)">冒险</li1>
                    <li1 value="喜剧" onclick="chooseLabel(this)" onmousedown="postLabel(this.innerText)">喜剧</li1>
                    <li1 value="歌舞" onclick="chooseLabel(this)" onmousedown="postLabel(this.innerText)">歌舞</li1>
                </ul>
                <ul class="row3">
                    <li1 value="灾难" onclick="chooseLabel(this)" onmousedown="postLabel(this.innerText)">灾难</li1>
                    <li1 value="动画" onclick="chooseLabel(this)" onmousedown="postLabel(this.innerText)">动画</li1>
                    <li1 value="西部" onclick="chooseLabel(this)" onmousedown="postLabel(this.innerText)">西部</li1>
                    <li1 value="音乐" onclick="chooseLabel(this)" onmousedown="postLabel(this.innerText)">音乐</li1>
                    <li1 value="古装" onclick="chooseLabel(this)" onmousedown="postLabel(this.innerText)">古装</li1>
                </ul>
                <ul class="row4">
                    <li1 value="家庭" onclick="chooseLabel(this)" onmousedown="postLabel(this.innerText)">家庭</li1>
                    <li1 value="奇幻" onclick="chooseLabel(this)" onmousedown="postLabel(this.innerText)">奇幻</li1>
                    <li1 value="战争" onclick="chooseLabel(this)" onmousedown="postLabel(this.innerText)">战争</li1>
                    <li1 value="同性" onclick="chooseLabel(this)" onmousedown="postLabel(this.innerText)">同性</li1>
                    <li1 value="情色" onclick="chooseLabel(this)" onmousedown="postLabel(this.innerText)">情色</li1>
                </ul>
                <ul class="row5">
                    <li1 value="传记" onclick="chooseLabel(this)" onmousedown="postLabel(this.innerText)">传记</li1>
                    <li1 value="历史" onclick="chooseLabel(this)" onmousedown="postLabel(this.innerText)">历史</li1>
                    <li1 value="儿童" onclick="chooseLabel(this)" onmousedown="postLabel(this.innerText)">儿童</li1>
                    <li1 value="武侠" onclick="chooseLabel(this)" onmousedown="postLabel(this.innerText)">武侠</li1>
                    <li1 value="恐怖" onclick="chooseLabel(this)" onmousedown="postLabel(this.innerText)">恐怖</li1>
                </ul>
            </div>
            <div class="label-ok">
                <!-- 隐藏标签，用来存储选定标签的value值。-->
                <input type="text" class="storage" id="storage" value="" hidden>
                <!-- 选好标签 -->
                <input id="ok-btn" class="ok-btn" type="submit" value="我选好了" name="label-ok" onmouseup="writeLabel()">
            </div>
        </div>
    </div>

    <!--右侧部分-->
    <div class="profile">
        <!--    新增右侧个人部分-->
        <div class="my_info">
            <img class="my_info_head" height="90px" width="90px" src="images/user/<?php echo $user['picture'] ?>">
            <h4><?php echo $user['username'] ?></h4>
            <div class="my_info_list">
                <ul>
                    <a href="">
                        <li><span><?php echo $user['follows_num'] ?></span></li>
                        <li>关注</li>
                    </a>
                </ul>
                <ol></ol>
                <ul>
                    <a href="">
                        <li><span><?php echo $user['fans_num'] ?></span></li>
                        <li>粉丝</li>
                    </a>
                </ul>
                <ol></ol>
                <ul>
                    <a href="">
                        <li><span><?php echo $user['fans_num'] ?></span></li>
                        <li>等级</li>
                    </a>
                </ul>
            </div>
        </div>

        <!--图书推荐开始-->
        <div class="mr_book">
            <h4>今日热销图书</h4>
            <div class="mr_boox_list">
                <a href="https://item.jd.com/11757834.html">
                    <img src="images/book_santi.png">
                    <ul>
                        <li>三体</li>
                        <li><span>出版时间：2008年1月</span></li>
                        <li><p>￥50.2</p></li>
                    </ul>
                </a>
            </div>
            <div class="mr_boox_list">
                <a href="https://item.jd.com/12203158.html">
                    <img src="images/mr_book_Android.png">
                    <ul>
                        <li>Android从入门到精通</li>
                        <li><span>出版时间：2017年5月</span></li>
                        <li><p>￥63.0</p></li>
                    </ul>
                </a>
            </div>
            <div class="mr_boox_list">
                <a href="https://item.jd.com/12555860.html">
                    <img src="images/mr_book_JAVA.png">
                    <ul>
                        <li>Java从入门到精通</li>
                        <li><span>出版时间：2019年2月</span></li>
                        <li><p>￥55.1</p></li>
                    </ul>
                </a>
            </div>
        </div>
        <!--图书推荐结束-->
    </div>
</div>
<!--底部信息-->
<div class="bottom_message width_1000">
    <p>Copyright@2019华科实训</p>
</div>

<script type="text/javascript">
    function button_submit(){
        layer.msg('更改成功');
        document.getElementById('sub').submit()
    }
</script>
</body>
</html>




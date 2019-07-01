<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>影友-个人信息</title>
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
    <script src="http://open.web.meitu.com/sources/xiuxiu.js" type="text/javascript"></script>
    <script src="script/meitu.js"></script>
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
        <div class="ui top attached tabular menu new_menu">
            <a class="item active " data-tab="first">头像设置</a>
            <a class="item " data-tab="second">资料设置</a>
            <a class="item"  data-tab="third">更改密码</a>
        </div>
        <!--照片-->
        <div class="ui bottom attached tab segment segment_new active" data-tab="first">
            <div style="height: 400px">
                <div id="altContent"></div>
            </div>
        </div>
        <!--个人基本信息-->
        <div class="ui bottom attached tab segment segment_new" data-tab="second">
            <form id="sub"  class="ui form" method="post" action="php/save_setting.php">
                <div class="field">
                    <label>用户名</label>
                    <input type="text"  value="<?php echo $user['username'] ?>" readonly>
                </div>
                <div class="field">
                    <label>注册日期</label>
                    <input type="text" value="<?php echo $user['register_time'] ?>"
                           readonly>
                </div>
                <div class="field">
                    <label>性别</label>
                    <select class="ui fluid dropdown" name="sex">
                        <option value="保密" <?php if($user['sex'] == '保密'){ echo 'selected'; } ?> >
                            保密
                        </option>
                        <option value="男" <?php if($user['sex'] == '男'){ echo 'selected'; } ?> >
                            男
                        </option>
                        <option value="女" <?php if($user['sex'] == '女'){ echo 'selected'; } ?> >
                            女
                        </option>
                    </select>
                </div>
                <div class="field">
                    <label>qq号</label>
                    <input type="text" name="qq" value="<?php echo $user['qq'] ?>">
                </div>
                <div class="field">
                    <label>邮箱</label>
                    <input type="text" name="email" value="<?php echo $user['email'] ?>">
                </div>

                <button class="ui teal button" type="button" onclick="button_submit()">提交</button>
            </form>
        </div>
        <!--密码-->
        <div class="ui bottom attached tab segment segment_new" data-tab="third">
            <div class="ui form">
                <div class="required field">
                    <label>原始密码</label>
                    <input type="password" name="old_password"  id="old_password">
                </div>
                <div class="required field">
                    <label>新密码</label>
                    <input type="password" name="new_password"  id="new_password">
                </div>
                <div class="required field">
                    <label>确认新密码</label>
                    <input type="password" name="new_password2" id="new_password2">
                </div>
                <div id="save-password" class="ui submit teal  button ">确认</div>
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




<!DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>影友-聊天界面</title>

    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600" rel="stylesheet">
    <link rel="stylesheet" href="css/chat_interface_reset.min.css">
    <link rel="stylesheet" href="css/chat_interface_style.css">
    <link rel="stylesheet" type="text/css" href="css/main1.css" />
</head>
<body  onload="initBar()" id="<?php echo $user_Id?>">
<div class="nav">
    <div class="width_1200">
        <ul>
            <li><a href="main.html">主界面</a></li>
            <li style="padding-left: 20px">
                <form method="post" action="recommend_server.php" >
                    <input type="text" name="word" placeholder="三千世界来搜一搜吧...">
                    <button type="submit" class="search"></button>
                </form>
            </li>
            <li style="padding-left: 10px"><a href="setup_friends.php">我的好友</a></li>
            <li><a href="dialog.html">聊天室</a></li>

        </ul>
        <ol>
            <li>
                <a href="person_things_sever.php">
                    <!--										<?php echo $user['username'] ?>-->
                </a>
            </li>

            <li class="li_message">&nbsp;
                <dl class="menu">
                    <dd><a href="">@邀约</a></dd>
                    <dd><a href="">我的消息</a></dd>
                </dl>
            </li>
            <li class="li_set">&nbsp;
                <dl class="menu">
                    <dd><a href="">个人中心</a></dd>
                    <dd><a href="">退出</a></dd>
                </dl>
            </li>
        </ol>
    </div>
</div>
<div class="wrapper">
    <div class="container">
        <div class="left">
            <div class="top">
                <input type="text" placeholder="Search" />
                <a href="javascript:;" class="search"></a>
            </div>
            <ul class="people" id="chat_friends"  style="overflow-y: scroll;overflow-x: hidden">
               <?php for($i=0;$i<$friends_num;$i++) { ?>
                <li class="person" id="<?php echo $friends[$i]['chat_id']?>" data-chat="person<?php echo $friends[$i]['chat_id']?>">
                    <img src="images/user/<?php echo $friends[$i]['chat_picture']?>" alt="">
                    <span class="name"><?php echo $friends[$i]['chat_username']?></span>
                    <span class="time"><?php echo $friends[$i]['chat_last_time']?></span>
                    <span class="preview">I was wondering...</span>
                </li>
                <?php } ?>
            </ul>
        </div>
        <div class="right" id="right">
            <div class="top"><span>To: <span class="name">Dog Woofson</span></span></div>

            <?php for($i=0;$i<$friends_num;$i++){?>

            <div class="chat"  style="overflow-y: scroll" id="chat<?php echo $friends[$i]['chat_id']?>"  data-chat="person<?php echo $friends[$i]['chat_id']?>">

                <?php for($j=0;$j<count($friends_message[$friends[$i]['chat_id']]);$j++){?>
                    <?php if($j==0){?>
                    <div class="conversation-start">
                        <span><?php echo date('Y-m-d H:i A',$friends_message[$friends[$i]['chat_id']][$j]['send_time'])?></span>
                    </div>
                    <?php }?>

                <?php if($friends_message[$friends[$i]['chat_id']][$j]['to_id']
                ==$friends[$i]['chat_id']){?>
                    <div class="bubble me" id="<?php echo $friends_message[$friends[$i]['chat_id']][$j]['send_time']?>">
                    <?php echo $friends_message[$friends[$i]['chat_id']][$j]['message']?>
                    </div>
                    <?php }else{?>
                    <div class="bubble you" id="<?php echo $friends_message[$friends[$i]['chat_id']][$j]['send_time']?>">
                        <?php echo $friends_message[$friends[$i]['chat_id']][$j]['message']?>
                    </div>

            <?php }?>
            <?php }?>



            </div>
            <?php }?>

            <div class="write">
                <a href="javascript:;" class="write-link attach"></a>
                <input type="text" id="message" ><!--onkeydown="enter_send(e)"-->
                <a href="javascript:;" class="write-link smiley"></a>
                <a href="javascript:;"  onclick="send_message()" class="write-link send"></a>
            </div>


            </div>
        </div>
    </div>

    <script src="script/chat.js"></script>
    <script src="script/jquery.min.js"></script>
    <script  src="script/chat_interface_index.js"></script>


</body>
</html>

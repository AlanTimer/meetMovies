<!DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>聊天窗口界面</title>

    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600" rel="stylesheet">
    <link rel="stylesheet" href="css/chat_interface_reset.min.css">
    <link rel="stylesheet" href="css/chat_interface_style.css">

</head>
<body  >

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

            <div class="chat" id="chat<?php echo $friends[$i]['chat_id']?>"  data-chat="person<?php echo $friends[$i]['chat_id']?>">

                <?php for($j=0;$j<count($friends_message[$friends[$i]['chat_id']]);$j++){?>
                    <?php if($j==0){?>
                    <div class="conversation-start">
                        <span><?php echo $friends_message[$friends[$i]['chat_id']][$j]['send_time']?></span>
                    </div>
                    <?php }?>

                <?php if($friends_message[$friends[$i]['chat_id']][$j]['to_id']
                ==$friends[$i]['chat_id']){?>
                    <div class="bubble me">
                    <?php echo $friends_message[$friends[$i]['chat_id']][$j]['message']?>
                    </div>
                    <?php }else{?>
                    <div class="bubble you">
                        <?php echo $friends_message[$friends[$i]['chat_id']][$j]['message']?>
                    </div>

            <?php }?>
            <?php }?>



            </div>
            <?php }?>

            <div class="write">
                <a href="javascript:;" class="write-link attach"></a>
                <input type="text" id="message">
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

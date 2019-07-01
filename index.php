<?php include_once 'php/index_sever.php'; ?>
<!DOCTYPE HTML>
<html>
<head>
<title>影友-主页</title>
<meta charset="UTF-8" name="referrer" content="never">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<link href="css/style1.css" rel="stylesheet" type="text/css" media="all" />
<!-- start plugins -->
<script type="text/javascript" src="script/jquery-1.11.1.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/semantic.css" />
	<link rel="stylesheet" type="text/css" href="css/main.css" />
<link href='http://fonts.useso.com/css?family=Roboto+Condensed:100,200,300,400,500,600,700,800,900' rel='stylesheet' type='text/css'>
<script src="script/responsiveslides.min.js"></script>
<script>
    $(function () {
      $("#slider").responsiveSlides({
      	auto: true,
      	nav: true,
      	speed: 500,
        namespace: "callbacks",
        pager: true,
      });
    });
</script>
</head>
<body>
<!--导航-->
<div class="nav">
	<div class="width_1200">
		<ul>
			<li><a href="index.php">主界面</a></li>
			<li style="padding-left: 20px">
				<form method="post" action="login.php" >
					<input type="text" name="search_keyword" placeholder="三千世界来搜一搜吧...">
					<button type="submit" class="search"></button>
				</form>
			</li>
			<li style="padding-left: 10px"><a href="login.php">我的好友</a></li>
			<li><a href="login.php">聊天室</a></li>

		</ul>
		<ol>
			<li>
				<a href="login.php">
					请登录
				</a>
			</li>

			<li class="li_message">&nbsp;
				<dl class="menu">
					<dd><a href="login.php">我的消息</a></dd>
				</dl>
			</li>
			<li class="li_set">&nbsp;
				<dl class="menu">
					<dd><a href="register.php">注册</a></dd>
					<dd><a href="login.php">登录</a></dd>
					<dd><a href="find_password.php">找回密码</a></dd>
				</dl>
			</li>
		</ol>
	</div>
</div>

<div class="container">
    <div class="slider">
	   <div class="callbacks_container">
	      <ul class="rslides" id="slider">
	        <li><img src="images/banner.jpg" class="img-responsive" alt=""/>
	        	<div class="button">
			      <a href="#" class="hvr-shutter-out-horizontal">Watch Now</a>
			    </div>
			</li>
	        <li><img src="images/banner1.jpg" class="img-responsive" alt=""/>
	        	<div class="button">
			      <a href="#" class="hvr-shutter-out-horizontal">Watch Now</a>
			    </div>
			</li>
	        <li><img src="images/banner2.jpg" class="img-responsive" alt=""/>
	        	<div class="button">
			      <a href="#" class="hvr-shutter-out-horizontal">Watch Now</a>
			    </div>
			</li>
	      </ul>
	    </div>

      <div class="content">
        	<div class="box_1">
      	        <h1 class="m_2">推荐电影</h1>
		</div>
		<div class="box_2">
            <?php foreach($good_movies as $row){ ?>
                <div class="rec">
                    <div class="recSingle">
                        <form method="post" action="login.php" id="<?php echo $row['Id'] ?>1">
                            <div>
                                <img class="recPic" src="<?php echo $row['picture'] ?>" alt="影片海报"  onclick="demo_hhh(this)" id="<?php echo $row['Id'] ?>">
                            </div>
                            <div class="recTitle">
                                <input value="<?php echo $row['name'] ?>" name="movie_name" class="recTitle" type="submit">
                            </div>
                        </form>
                    </div>
                </div>
            <?php } ?>
		</div>

      </div>
   </div>
 </div>
 
<div class="container"> 
 <footer id="footer">
 	<div id="footer-3d">
		<div class="gp-container">
			<span class="first-widget-bend"></span>
		</div>		
	</div>
    <div id="footer-widgets" class="gp-footer-larger-first-col">
		<div class="gp-container">
            <div class="footer-widget footer-1">
            	<div class="wpb_wrapper">
					<img src="images/f_logo.png" alt=""/>
				</div> 
	          <br>
				<p>影友网站在此享受好电影</p>
				<p class="text">看电影可以增长见识，加深文化底蕴，丰富课余生活，了解异乡风情，甚至可以引发对人生的思考和感悟，改变对人生和社会的看法，以积极的心态来面对生活中的困难。</p>
			 </div>
			 <div class="footer_box">
			  <div class="col_1_of_3 span_1_of_3">
					<h3>分类</h3>
					<ul class="first">
						<li><a href="#">歌舞</a></li>
						<li><a href="#">历史</a></li>
						<li><a href="#">精选</a></li>
					</ul>
		     </div>
		     <div class="col_1_of_3 span_1_of_3">
					<h3>信息</h3>
					<ul class="first">
						<li><a href="#">新品</a></li>
						<li><a href="#">热播</a></li>
						<li><a href="#">推荐</a></li>
					</ul>
		     </div>
		     <div class="col_1_of_3 span_1_of_3">
					<h3>关注我们</h3>
					<ul class="first">
						<li><a href="#">微博</a></li>
						<li><a href="#">微信</a></li>
						<li><a href="#">QQ</a></li>
					</ul>
					<div class="copy">
				      <p>Copyright@2019华科实训</a></p>
			        </div>
		     </div>
		    <div class="clearfix"> </div>
	        </div>
	        <div class="clearfix"> </div>
		</div>
	</div>
  </footer>
</div>
</body>
<script>
    function demo_hhh(e){
        document.getElementById(e.id+'1').submit();
    }
</script>

</html>
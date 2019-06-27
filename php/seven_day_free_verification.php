<?php
$username = trim($_POST['username']);       //trim函数去除前后空格
setcookie('username',$username,time()+604800);
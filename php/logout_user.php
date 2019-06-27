<?php
session_start();
setcookie($_SESSION['user']['username'],null);
unset($_SESSION['user']);
$result_dest=session_destroy();

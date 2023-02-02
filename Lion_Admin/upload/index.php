<?php


session_start();

if(!isset($_SESSION['user_name'] )){
    header("Location: http://localhost/php_all_project/news_project/admin/index.php");
}

if(!isset($_SESSION['user_pass'] )){
    header("Location: http://localhost/php_all_project/news_project/admin/index.php");
}



?>



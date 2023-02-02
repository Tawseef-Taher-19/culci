<?php

include "function.php";
include_once "admin_detected.php";
$comment_del=new lion();

if($_GET['status']=='delete'){


    //echo $_GET['id'];

    $comment_del->comment_delete($_GET['id']);
}




?>
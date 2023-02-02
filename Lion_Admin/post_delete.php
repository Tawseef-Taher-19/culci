<?php

include "function.php";
include_once "admin_detected.php";
$post_del=new lion();

if($_GET['status']=='delete'){


    //echo $_GET['id'];

    $post_del->post_delete($_GET['id']);
}




?>
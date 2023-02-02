<?php

include "function.php";
include_once "admin_detected.php";
$gallery_del=new lion();

if($_GET['status']=='delete'){


    //echo $_GET['id'];

    $gallery_del->gallery_delete($_GET['id']);
}




?>
<?php

include "function.php";
include_once "admin_detected.php";
$lion_gallery_del=new lion();

if($_GET['status']=='delete'){


    //echo $_GET['id'];

    $lion_gallery_del->lion_gallery_delete($_GET['id']);
}




?>
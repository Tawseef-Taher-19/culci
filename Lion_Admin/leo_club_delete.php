<?php

include "function.php";
include_once "admin_detected.php";
$leo_gallery_del=new lion();

if($_GET['status']=='delete'){


    //echo $_GET['id'];

    $leo_gallery_del->leo_gallery_delete($_GET['id']);
}




?>
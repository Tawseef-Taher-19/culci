<?php

include "function.php";
include_once "admin_detected.php";
$category_del=new lion();

if($_GET['status']=='delete'){


    //echo $_GET['id'];

    $category_del->category_delete($_GET['id']);
}




?>
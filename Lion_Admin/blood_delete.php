<?php

include "function.php";
include_once "admin_detected.php";
$blood_del=new lion();

if($_GET['status']=='delete'){


    //echo $_GET['id'];

    $blood_del->blood_delete($_GET['id']);
}




?>
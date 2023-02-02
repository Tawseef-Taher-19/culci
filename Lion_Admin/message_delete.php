<?php

include "function.php";
include_once "admin_detected.php";
$message_del=new lion();

if($_GET['status']=='delete'){


    //echo $_GET['id'];

    $message_del->message_delete($_GET['id']);
}




?>
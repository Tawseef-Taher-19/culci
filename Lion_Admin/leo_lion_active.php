<?php

include "function.php";
include_once "admin_detected.php";
$lion_gallery_del = new lion();

if ($_GET['status'] == 'active') {


    //echo $_GET['id'];

    $lion_gallery_del->addActive($_GET['id'], $_GET['role']);
}

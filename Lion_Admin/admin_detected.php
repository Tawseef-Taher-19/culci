<?php

 session_start();

 if(!isset($_SESSION['Admin_user_name'])){
    header("Location:./index.php");
 }

 if(!isset($_SESSION['Admin_pass'])){
    header("Location:./index.php");
 }



?>
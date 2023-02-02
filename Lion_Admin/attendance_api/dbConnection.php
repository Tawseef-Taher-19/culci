<?php


$host="localhost";
$user="root";
$pass="";
$dbName= "lion";

$conn=new mysqli($host,$user,$pass,$dbName);

if($conn->connect_error){
    die("Connection Failed");
}

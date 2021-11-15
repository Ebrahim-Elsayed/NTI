<?php

$db_name     = "nti";
$db_server   = 'localhost';
$db_user     = "root";
$db_password = "";

$conn = mysqli_connect($db_server , $db_user , $db_password , $db_name);

if (!$conn){

    "ERROR : " . "*" .  mysqli_connect_error();
}


?>
<?php

session_start();
echo $_SESSION['name'] . "<br>";
echo $_SESSION['email'] . "<br>";
echo $_SESSION['linkedin_url'] . "<br>"; 
// print_r($_SESSION['image'] . "<br>"); 
// echo $_SESSION['image'];

// $_COOKIE
// var_dump(time());
setcookie('user' , 'hema' , time()-86400 , '/')
?>
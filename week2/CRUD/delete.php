<?php 
require 'config.php';
require 'functions.php';

$id = $_GET['id'];

# Validate id ... 
if(validate($id,5)){
    // delete Logic ....... 

 $sql = "delete from users where id = $id ";

 $op = mysqli_query($conn,$sql);

 if($op){
     $message = "Raw Removed !!";
 }else{
     $message = "Error Try Again";
 }

}else{
    $message = "Invalid Id!!!";
}

$_SESSION['message'] = $message;

header("Location: index.php");

?>
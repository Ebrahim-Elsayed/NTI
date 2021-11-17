<?php
require 'config.php';
require 'functions.php';
 
$id = $_GET['id'];

if (validate($id , 5)) {

    $sql = "SELECT image from blog where id = $id";

    $op = mysqli_query($conn , $sql);
    
    while($data = mysqli_fetch_assoc($op)){

        unlink('../uploads/'. $data['image'] );
    }

    $sql = " DELETE FROM blog where id = $id  ";
    
    $op = mysqli_query($conn , $sql);

        if ($op) {
            $message = 'Row removed';
        }else{
            $message = 'Error tr again';
        }
        
}else{
    $message = "invalid id";
}

$_SESSION['message'] = $message;

header('location: index.php')

?>
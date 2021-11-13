<?php

  if($_SERVER['REQUEST_METHOD'] == 'POST'){
      $file_tmp  = $_FILES['image']['tmp_name'];
      $file_name = $_FILES['image']['name'];
      $file_size = $_FILES['image']['size'];
      $file_type = $_FILES['image']['type'];

      if(!empty($_FILES['image']['name'])){
        $file_extention =  explode('.' , $file_name);  //explode --> change tring to array
        $final_ext = strtolower(end($file_extention)); //end --> last part of string
        // $file_extention[count($file_extentions)-1]

        $extentions = ['png' , 'jpg' , 'gif' , 'pdf'];
        if(in_array($final_ext , $extentions)){
            // upload code
            $finalName = time().rand(). "." . $final_ext;
            $finalPath = './uploads/'.$finalName;

            if(move_uploaded_file($file_tmp , $finalPath)){
                echo "file uploaded succesfuly";
            }else{
                echo 'error try again';
            }
        }else{
            echo "*this extention is not allowed";
        }
      }else{    
          echo '*_image is required';
      }
      
  }



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Register</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container">
        <h2>Register</h2>
        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="exampleInputName">Name</label>
                <input type="text" class="form-control" name="name" placeholder="Enter Name">
            </div>

            <div class="form-group">
                <label for="exampleInputEmail">Email address</label>
                <input type="email" class="form-control" name="email" placeholder="Enter email">
            </div>

            <div class="form-group">
                <label for="exampleInputPassword">New Password</label>
                <input type="password" class="form-control" name="password" placeholder="Password">
            </div>

            <div class="form-group">
                <label for="exampleInputPassword">address</label>
                <input type="text" class="form-control" name="address" placeholder="address">
            </div>

            <div class="form-group">
                <label for="exampleInputPassword">linkedin-url</label>
                <input type="url" class="form-control" name="linkedin_url" placeholder="linkedin-url">
            </div>

            <div class="form-group">
                <label for="exampleInputPassword">profile-image</label>
                <input type="file" class="form-control" name="image" placeholder="image">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>

</html>
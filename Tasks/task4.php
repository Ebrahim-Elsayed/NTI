<!-- Create a form with the following inputs (name, email, password, address, gender, linkedin url, profile pic) Validate inputs then return message to user. 
* validation rules ... 
name  = [required , string]
email = [required,email]
password = [required,min = 6]   
address = [required,length = 10 chars]
gender = [required]
linkedin url = [reuired | url]
Profile pic =[required|image]. 
Then create a profile page to read data that user inserted. -->
<?php
session_start();
include '../functions.php';

if($_SERVER["REQUEST_METHOD"] == 'POST'){

    $_SESSION['name']         = $name         = clean($_POST['name']);
    $_SESSION['email']        = $email        = clean($_POST['email']);
    $_SESSION['password']     = $password     = clean($_POST['password']);
    $_SESSION['address']      = $address      = clean($_POST['address']);
    $_SESSION['linkedin_url'] = $linkedin_url = clean($_POST['linkedin_url']);
    $file_tmp     = $_FILES['image']['tmp_name'];
    $file_name    = $_FILES['image']['name'];
    $file_size    = $_FILES['image']['size'];
    $file_type    = $_FILES['image']['type'];
    // $sanitized_name = filter_var($name , FILTER_SANITIZE_STRING);

    $falses = [];

    if(empty($name)){
        $errors['name'] = "is required";
    }elseif(!filter_var($name , FILTER_SANITIZE_STRING)){
        $falses['name'] = "is not valid";
    }

    if(empty($email)){
        $falses['email'] = ' is rqeuired';
    }elseif(!filter_var($email , FILTER_VALIDATE_EMAIL)){
        $falses['email']= "email is not valid";
    }

    if(empty($password)){
        $falses['password'] = ' is required';
    }elseif(strlen($password) < 6){
        $falses['password']= "password must more than 5 characters";
    }

    if(empty($address)){
        $falses['address'] = ' is required ';
    }elseif(strlen($address) <= 10){
        $falses['address']= "address must have 10 characters";
    }

    if(empty($linkedin_url)){
        $falses['url'] = ' is required' ;
    }elseif(!filter_var($linkedin_url , FILTER_VALIDATE_URL)){
        $falses['url'] = "url is not valid";
    }

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // $_SESSION['image'] = $image = $_FILES['image'];
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
            $finalPath = '../uploads/'.$finalName;

            if(move_uploaded_file($file_tmp , $finalPath)){
                // echo "file uploaded succesfuly";
            }else{
                $falses[] = 'image not uploaded successfully ,, try again';
            }
        }else{
            $falses[] = "*this extention is not allowed";
        }
        }else{    
            $falses[] = '*_image is required';
        }
        
    }
   
    // var_dump($falses);
    if(count($falses) > 0){
 
        foreach ($falses as $key => $value) {
            # code...
            echo '* '.$key.' : '.$value.'<br>';
        }

     }else{
        //  echo $name . "<br>";
        //  echo $email . "<br>";
        //  echo $password . "<br>";
        //  echo $linkedin_url . "<br>";
        //  echo $address . "<br>";
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
        <form action="" method="post" enctype="multipart/form-data">
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

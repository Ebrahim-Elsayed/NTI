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
include 'functions.php';

if($_SERVER["REQUEST_METHOD"] == 'POST'){ 

$name         = clean($_POST['name']);
$email        = clean($_POST['email']);
$password     = clean($_POST['password']);
$address      = clean($_POST['address']);
$linkedin_url = clean($_POST['linkedin_url']);
$file_tmp     = $_FILES['image']['tmp_name'];
$file_name    = $_FILES['image']['name'];
$file_size    = $_FILES['image']['size'];
$file_type    = $_FILES['image']['type'];
// $sanitized_name = filter_var($name , FILTER_SANITIZE_STRING);

$errors = [];
if(empty($name)){
    $errors['name'] = ' is required';
}elseif(!preg_match("/^[a-zA-Z-' ]*$/",$name)){
    $errors['name'] = ' please insert string';
}

if(empty($email)){
    $errors['email'] = ' is rqeuired';
}elseif(!filter_var($email , FILTER_VALIDATE_EMAIL)){
    $errors = "email is not valid";
}

if(empty($password)){
    $errors['password'] = ' is required';
}elseif(strlen($password) < 6){
    $errors = "password must more than 5 characters";
}

if(empty($address)){
    $errors['address'] = ' is required ';
}elseif(strlen($address) <= 10){
    $errors = "address must have 10 characters";
}

if(empty($linkedin_url)){
    $errors['url'] = ' is required' ;
}elseif(!filter_var($linkedin_url , FILTER_VALIDATE_URL)){
    $errors = "url is not valid";
}

// ************************
if(!empty($_FILES['image']['name'])){

    $file_ex    = explode('.',$file_name);
    $updated_ex = strtolower(end($file_ex));
    $allowed_ex = ["png","jpg"];

    if(in_array($updated_ex, $allowed_ex)){

        $finalName = rand().time().'.'.$updated_ex;

        $disPath = './uploads/'.$finalName;

       if(move_uploaded_file($file_tmp,$disPath)){
           echo 'Image Uploaded';
       }else{
        $errors ='Error Try Again';
       }

    }else{
        $errors = '* inValid Extension';
    }

}else{
    $errors ='* Image Field Required';
}

}

if(count($errors) > 0){
    foreach($errors as $key => $value){
        echo "*_" .  $key . $value . "<br>";
    }
}else{
    echo "valid data";
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
            <input type="text" class="form-control" name="name" placeholder="Enter Name" >
        </div>

        <div class="form-group">
            <label for="exampleInputEmail">Email address</label>
            <input type="email" class="form-control" name="email" placeholder="Enter email" >
        </div>

        <div class="form-group">
            <label for="exampleInputPassword">New Password</label>
            <input type="password" class="form-control" name="password" placeholder="Password" >
        </div>
        
        <div class="form-group">
            <label for="exampleInputPassword">address</label>
            <input type="text" class="form-control" name="address" placeholder="address" >
        </div>

        <div class="form-group">
            <label for="exampleInputPassword">linkedin-url</label>
            <input type="url" class="form-control" name="linkedin_url" placeholder="linkedin-url" >
        </div>
        
        <div class="form-group">
            <label for="exampleInputPassword">gender</label>
            <input type="radio"  name="gender" placeholder="gender" value="male">male
            <input type="radio"  name="fgender" placeholder="gender" value="female">female
        </div>
        
        <div class="form-group">
            <label for="exampleInputPassword">profile-image</label>
            <input type="file" class="form-control" name="image" placeholder="image" >
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</body>

</html>

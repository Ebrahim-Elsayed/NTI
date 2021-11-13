<!-- Create a form with the following inputs (name, email, password, address, linkedin url) Validate inputs then return message to user . 
* validation rules ... 
name  = [required ]
email = [required,email]
password = [required,min length = 6]
address = [required,length = 10 chars]
linkedin url = [required | url] -->

<?php

    

    include 'functions.php';

    

if($_SERVER["REQUEST_METHOD"] == 'POST'){

    $name         = clean($_POST['name']);
    $email        = clean($_POST['email']);
    $password     = clean($_POST['password']);
    $address      = clean($_POST['address']);
    $linkedin_url = clean($_POST['linkedin_url']);


    
    $errors = [];
    if(empty($name)){
        $errors['name'] = ' is reuired';
    }

    if(empty($email)){
        $errors['email'] = ' is reuired';
    }elseif(!filter_var($email , FILTER_VALIDATE_EMAIL)){
        $errors = "email is not valid";
    }

    if(empty($password)){
        $errors['password'] = ' is reuired';
    }elseif(strlen($password) < 6){
        $errors = "password must more than 5 characters";
    }

    if(empty($address)){
        $errors['address'] = ' is required ';
    }elseif(strlen($address) < 6){
        $errors = "address must have 10 characters";
    }

    if(empty($linkedin_url)){
        $errors['url'] = ' is reuired' ;
    }elseif(!filter_var($linkedin_url , FILTER_VALIDATE_URL)){
        $errors = "url is not valid";
    }

    if(count($errors) > 0){
        foreach($errors as $key => $value){
            echo "*_" .  $key . $value . "<br>";
        }
    }else{
        echo "valid data";
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
        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
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
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>

</html>
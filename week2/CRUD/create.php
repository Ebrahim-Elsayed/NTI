<?php
require "config.php";
require "functions.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name     = clean($_POST['name']);
    $email    = clean($_POST['email']);
    $password = clean($_POST['password']);
    $linkedin = clean($_POST['linkedin_url']);

    $errors = [];

    // validate name
    if(!validate($name , 1)){
        $errors['name'] = 'field is required';
    }

    // validate email
    if(!validate($email , 1)){
        $errors['email'] = 'field is required';
    }elseif (validate($email , 2)  == false) {
        $errors['email'] = 'format is not valid';
    }

    // validate password
    if(!validate($password , 1)){
        $errors['password'] = 'field is required';
    }elseif (!validate($password , 4)) {
        $errors['password'] = 'must be >= 6 chars';
    }

    // validate url
    if(!validate($linkedin , 1)){
        $errors['url'] = 'field is required';
    }elseif (validate($linkedin , 3) == false) {
        $errors['url'] = 'format is not valid';
    }

    if (count($errors) > 0) {
        foreach ($errors as $key => $value) {
            echo '* ' . $key . ' : ' . $value . "<br>";
        }
    }else{
        // DB code
        $password = md5($password);
        $sql = "insert into users (name , email , password , linkedin)
               values ('$name' , '$email' , '$password' , '$linkedin')";

        $operation = mysqli_query($conn ,$sql);
        
        if ($operation) {
            echo 'user created succusfully';
        }else{
            echo 'error try again';
        }
    }
    mysqli_close($conn);
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
        <form  action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
            <div class="form-group">
                <label for="exampleInputName">Name</label>
                <input type="text" class="form-control"     name="name" placeholder="Enter Name">
            </div>

            <div class="form-group">
                <label for="exampleInputEmail">Email address</label>
                <input type="text" class="form-control"    name="email" placeholder="Enter email">
            </div>

            <div class="form-group">
                <label for="exampleInputPassword">New Password</label>
                <input type="password" class="form-control" name="password" placeholder="Password">
            </div>

            <div class="form-group">
                <label for="exampleInputPassword">linkedin-url</label>
                <input type="url" class="form-control"      name="linkedin_url" placeholder="linkedin-url">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>

</html> 
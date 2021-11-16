<?php 
 require 'config.php';
 require 'functions.php';

if($_SERVER['REQUEST_METHOD'] == "POST"){
  
   $email    = Clean($_POST['email']);
   $password = Clean($_POST['password']);



    # Validate Inputs ..... 
    $errors = [];

    # Email Validate 
    if(!validate($email,1)){
        $errors['Email'] = "Field Required";
    }elseif(!validate($email,2)){
        $errors['Email'] = "Invalid Email Format";
    }

    # Password Validate 
    if(!validate($password,1)){
        $errors['Password'] = "Field Required";
     }elseif(!validate($password,4)){
        $errors['Password'] = "Invalid Length , Length Must Be >= 6 ch";
     }


     if(count($errors) > 0){
         foreach($errors as $key => $val){
             echo '* '.$key.' : '.$val.'<br>';
         }
     }else{
         // DB CODE ....... 


        $password =   md5($password);

        $sql = "select * from users where email = '$email'  and  password = '$password' ";
          
        $op =  mysqli_query($conn,$sql);

        if(mysqli_num_rows($op) == 1){
            // code 
          $data = mysqli_fetch_assoc($op);

          $_SESSION['user'] = $data;

          header("Location: index.php");

        }else{
            echo 'Error In Your Cre Try Again!!!';
        }
   
     }


    mysqli_close($conn);

}


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>login</h2>
  
  
  <form   action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>"  method="post">

  <div class="form-group">
    <label for="exampleInputEmail">Email address</label>
    <input type="email"   class="form-control"  name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
  </div>

  <div class="form-group">
    <label for="exampleInputPassword"> Password</label>
    <input type="password"   class="form-control" name="password" id="exampleInputPassword1" placeholder="Password">
  </div>
 
  
  <button type="submit" class="btn btn-primary">Login</button>
</form>
</div>

</body>
</html>
<?php 
 require 'config.php';
 require 'functions.php';

 $id = $_GET['id'];

 $sql = "select * from users where id = $id";

 $op = mysqli_query($conn,$sql);

  if(mysqli_num_rows($op) == 1){
      // code 

     $data = mysqli_fetch_assoc($op);

  }else{
      header("Location: index.php");
  }

if($_SERVER['REQUEST_METHOD'] == "POST"){

   $name     = Clean($_POST['name']); 
   $email    = Clean($_POST['email']);
   $linkedIn = Clean($_POST['linkedin_url']);


    # Validate Inputs ..... 
    $errors = [];

    # Name Validate
    if(!validate($name,1)){
       $errors['name'] = "Field Required";
    }

    # Email Validate 
    if(!validate($email,1)){
        $errors['Email'] = "Field Required";
    }elseif(!validate($email,2)){
        $errors['Email'] = "Invalid Email Format";
    }

     # URL validate 
     if(!validate($linkedIn,1)){
        $errors['LinkedIn'] = "Field Required";
     }elseif(!validate($linkedIn,3)){
        $errors['LinkedIn'] = "Invalid LinkedIN url";
     }


     if(count($errors) > 0){
         foreach($errors as $key => $val){
             echo '* '.$key.' : '.$val.'<br>';
         }
     }else{
         // DB CODE ....... 


        $sql = "update users set name='$name' , email='$email' , linkedIn='$linkedIn' where id=$id";
          
        $op =  mysqli_query($conn,$sql);

        if($op){
           $message = "Raw Updated";
        }else{
           $message =  'Error Try Again !!!';
        }


        $_SESSION['message'] = $message;
        
        header("Location: index.php");


     }


    mysqli_close($conn);

}


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Edit</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Edit</h2>
  
  
  <form   action="edit.php?id=<?php echo $data['id'];?>"  method="post">


  <div class="form-group">
    <label for="exampleInputName">Name</label>
    <input type="text" class="form-control" name="name" value="<?php echo $data['name'];?>" id="exampleInputName" aria-describedby="" placeholder="Enter Name">
  </div>


  <div class="form-group">
    <label for="exampleInputEmail">Email address</label>
    <input type="email"   class="form-control"  name="email" value="<?php echo $data['email'];?>" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
  </div>

  <div class="form-group">
    <label for="exampleInputPassword">LinkedIn Url</label>
    <input type="url"   class="form-control" name="linkedin_url"  value="<?php echo $data['linkedin'];?>"  placeholder="LinkedIn Url">
  </div>
  
  <button type="submit" class="btn btn-primary">Update</button>
</form>
</div>

</body>
</html>
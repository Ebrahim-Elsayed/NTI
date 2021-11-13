<?php
// $students =[
//     ['ebrahim',24,'shobra'],
//     ['ahmed' , 20 , "alex"],
//     ['nader' , 30 , "nasrcity"]
// ]; 

// for ($i=0; $i < 3 ; $i++) { 
//     for ($j=0; $j < 3 ; $j++) { 
//     echo $students[$i][$j]."<br >";
// }
// }

// foreach ($students as $key => $value) {
//     foreach ($value as  $inerarray) {
//         echo $inerarray . "||";
//     }
//     echo "<br>";
// }
// $text = "php,c++,c#,js,ruby";
// $array = explode("," , $text);

// foreach ($array as $value) {
//     if($value == 'c#'){
//         continue;
//     }else{
//         echo $value . " , ";
//     }
// }

// echo $_SERVER['SERVER_OTHER'];

if($_SERVER['REQUEST_METHOD'] == "POST"){
    
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    if(empty($name) ){
        echo $err = "name is empty";
    }elseif(empty($email)){
       echo  $err = "email is empty";
    }elseif(empty($password)){
       echo  $err = "password is empty";
    }else{
       echo  "all values are valid";
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
                <input type="text" class="form-control" name="name" id="exampleInputName" aria-describedby=""
                    placeholder="Enter Name">
            </div>


            <div class="form-group">
                <label for="exampleInputEmail">Email address</label>
                <input type="email" class="form-control" name="email" id="exampleInputEmail1"
                    aria-describedby="emailHelp" placeholder="Enter email">
            </div>

            <div class="form-group">
                <label for="exampleInputPassword">New Password</label>
                <input type="password" class="form-control" name="password" id="exampleInputPassword1"
                    placeholder="Password">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

</body>

</html>
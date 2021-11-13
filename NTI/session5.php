<?php
session_start();
// $_SESSION['name'] = 'ebrahim'; 

// setcookie('key' , '7mada' , time()+86400 , '/');
// setcookie('school' , 'we7da' , time()+86400 , '/');
// echo $_COOKIE['name'];


$object ='{
    "name"  : "ahmed",
    "gender": "male",
    "gpa"   : 3.51
}'; 

// echo "<pre>";
//     // echo $object . "<br>";
//     print_r(json_decode($object,true));
// echo "</pre>"; 

$objectData = json_decode($object,true);
foreach ($objectData as $key => $value) {
    // echo $key . "=>" . $value . "<br>";
}

$cars = [
    'marcedes' => 'SClass' ,
    'BMW'      => '320' ,
    "FIAT"     => "tipo"
];
$newJson = json_encode($cars);
var_dump(json_encode($cars));
echo "<pre>";
    echo $newJson;
echo "</pre>"; 

?>
<?php
require "functions.php";

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $title   = clean($_POST['title']);
    $content = clean($_POST['content']);
    $date    = clean($_POST['date']);

    $errors = [];
    if(empty($title)){
        $errors['title'] = ' is required' ;
    }elseif(!preg_match("/^[a-zA-Z-' ]*$/",$title)){
        $errors['name'] = ' please insert string';
    }
    
    if(empty($content)){
        $errors['content'] = ' is required' ;
    }elseif(!preg_match("/^[a-zA-Z-' ]*$/",$content)){
        $errors['content'] = ' please insert string';
    }

    if(count($errors) > 0){
    foreach($errors as $key => $value){
        echo "*_" .  $key . $value . "<br>";
    }
    
        
        
    }
    $file = fopen('blog.txt' , 'a') or die ("can not open file");
        fwrite($file,$title );
        fwrite($file,$content);
        fwrite($file,$date. "\n");
        fclose($file);

}

?>

<!-- <!DOCTYPE html>
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
                <label for="exampleInputName">title</label>
                <input type="text" class="form-control" name="title" placeholder="Enter title">
            </div>

            <div class="form-group">
                <label for="exampleInputEmail">content</label>
                <input type="text" class="form-control" name="content" placeholder="Enter content">
            </div>

            <div class="form-group">
                <label for="exampleInputEmail">DATE</label>
                <input type="date" class="form-control" name="date" placeholder="Enter content">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>

</html> -->
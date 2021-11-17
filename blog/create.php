<!-- # TASK .
Build a Blog (CRUD) 
Title  = [required , string]
Content = [required,length >100 ch]
Image = [required, file]. -->
<?php
require "config.php";
require 'functions.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $title     = clean($_POST['title']);
    $content   = clean($_POST['content']);
    $file_tmp  = $_FILES['image']['tmp_name'];
    $file_name = $_FILES['image']['name'];

    $errors = [];

    // validate title
    if(!validate($title , 1)){
        $errors['title'] = 'field is required';
    }

    // validate description
    if(!validate($content , 1)){
        $errors['content'] = 'field is required';
    }
    // validate image
    if(!empty($_FILES['image']['name'])){
        $file_extention =  explode('.' , $file_name);  //explode --> change string to array
        $final_ext = strtolower(end($file_extention)); //end --> last part of string
        // $file_extention[count($file_extentions)-1]

        $extentions = ['png' , 'jpg' , 'gif' , 'pdf'];
        if(in_array($final_ext , $extentions)){
            // upload code
            $finalName = time().rand(). "." . $final_ext;
            $_SESSION['path'] =  $finalPath = '../uploads/'.$finalName;
            // echo $finalName;
            // exit();
            
        }else{
            $errors[] = "*this extention is not allowed";
        }
      }else{    
        $errors[] = '*_image is required';
      }
    
    if (count($errors) > 0  ) {
        foreach ($errors as $key => $value) {
            echo '* ' . $key . ' : ' . $value . "<br>";
        }
    }else{
        // DB code
        $sql = "INSERT into blog (title , content , image) VALUES ('$title' , '$content' , '$finalName')";

        $operation = mysqli_query($conn ,$sql);
        
        if(move_uploaded_file($file_tmp , $finalPath)){
            $errors[] = "file uploaded succesfuly";
        }else{
            $errors[] = 'error try again';
        }

        if ($operation) {
            echo 'blog created succusfully';

            header('location: index.php');
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
        <h2>Create Blog</h2>
        <form  action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="exampleInputName">Title</label>
                <input type="text" class="form-control" name="title" placeholder="Enter title">
            </div>

            <div class="form-group">
                <label for="exampleInputEmail">Content</label>
                <input type="text" class="form-control" name="content" placeholder="Enter content">
            </div>

            <div class="form-group">
                <label for="exampleInputEmail">image</label>
                <input type="file" class="form-control" name="image" placeholder="select image">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>

</html> 
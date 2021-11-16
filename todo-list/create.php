<!-- a  simple todo list application that takes tasks submitted by user & saves them in a MySQL database. 
Requirments Create a CRUD system. 
* Required Fields ['title','description','startdate','enddate'] 
** Note **
If enddate expired (it means that current date > enddate) user can't delete task. -->

<?php
require "config.php";
require '../week2/CRUD/functions.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title      = clean($_POST['title']);
    $descr      = clean($_POST['description']);
    $start_date = clean($_POST['sdate']);
    $end_date   = clean($_POST['edate']);

    $errors = [];

    // validate title
    if(!validate($title , 1)){
        $errors['title'] = 'field is required';
    }

    // validate description
    if(!validate($descr , 1)){
        $errors['description'] = 'field is required';
    }
    
    // validate description
    if(!validate($start_date , 1)){
        $errors['description'] = 'field is required';
    }

    // validate description
    if(!validate($end_date , 1)){
        $errors['description'] = 'field is required';
    }

    
    if (count($errors) > 0) {
        foreach ($errors as $key => $value) {
            echo '* ' . $key . ' : ' . $value . "<br>";
        }
    }else{
        // DB code
        $sql = "insert into tasks (title , description , start-date , end-date)
               values ('$title' , '$descr' , '$start_date' , '$end_date')";

        $operation = mysqli_query($conn ,$sql);
        
        if ($operation) {
            echo 'task created succusfully';
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
                <label for="exampleInputName">Title</label>
                <input type="text" class="form-control"     name="title" placeholder="Enter title">
            </div>

            <div class="form-group">
                <label for="exampleInputEmail">description</label>
                <input type="text" class="form-control"    name="description" placeholder="Enter description">
            </div>

            <div class="form-group">
                <label for="exampleInputPassword">start date</label>
                <input type="date" class="form-control" name="sdate" placeholder="start date">
            </div>

            <div class="form-group">
                <label for="exampleInputPassword">end date</label>
                <input type="date" class="form-control"      name="edate" placeholder="end date">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>

</html> 
<?php
require "config.php";
require "functions.php";

$errors = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $search = clean($_POST['search']);

    $errors = [];
    // validate search
    if(!validate($search , 1)){
        $errors['search'] = 'field is required';
    }

    if (count($errors) > 0) {
        foreach ($errors as $key => $value) {
            echo '* ' . $key . ' : ' . $value . "<br>";
        }
    }else{
        // DB code
        
        $sql = "select * from blog where content like '%$search%' ";
        $operation = mysqli_query($conn ,$sql);
        // mysqli_num_rows()
        if (mysqli_num_rows($operation) > 0) {
            # fetch data
            while ($data = mysqli_fetch_assoc($operation)) {
                echo $data['name'] . "<br>";
            }
        }

    }

}




?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>SEARCH</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container">
        <h2>SEARCH</h2>
        <form  action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">

            <div class="form-group">
                <input type="text" class="form-control"     name="search" placeholder="SEARCH HERE">
            </div>

            <button type="submit" class="btn btn-primary">search</button>
        </form>
    </div>
</body>

</html> 
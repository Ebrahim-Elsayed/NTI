<?php
require 'config.php';

$sql = "SELECT * from blog";

$op  = mysqli_query($conn ,$sql);



?>
<!DOCTYPE html>
<html>

<head>
    <title>blog</title>

    <!-- Latest compiled and minified Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />

    <!-- custom css -->
    <style>
        .m-r-1em {
            margin-right: 2%;
        }

        .m-b-1em {
            margin-bottom: 2em;
        }

        .m-l-1em {
            margin-left: 2em;
        }

        .mt0 {
            margin-top: 0;
        }
    </style>

</head>

<body>

    <!-- container -->
    <div class="container">
        <div class="page-header">
            <h1>MY BLOGS </h1>
            <br>
        </div>

        <a href="create.php">+ Blog</a>
        <?php 
        
           if(isset( $_SESSION['message'])){
               echo  $_SESSION['message'];
               unset($_SESSION['message']);
           }
        ?>

        <!-- PHP code to read records will be here -->

        <table class='table table-hover table-responsive table-bordered'>
            <!-- creating our table heading -->
            <tr>
                <th>ID</th>
                <th>title</th>
                <th>content</th>
                <th>image</th>
            </tr>

            <?php 
            while($data = mysqli_fetch_assoc($op)){

                //  print_r($data);

            ?>
            <tr>
                <td><?= $data['id']?></td>
                <td><?php echo $data['title'];?></td>
                <td><?php echo $data['content'];?></td>
                <td><img src="../uploads/<?php echo $data['image'] ;?>" style="width: 100px ; hieght: 40px; " alt=""></td>
                <td>
                    <a href='delete.php?id=<?php echo $data['id'];?>' class='btn btn-danger '>Delete</a>
                    <a href='edit.php?id=<?php echo $data['id'];?>'   class='btn btn-primary '>Edit</a>
                </td>
            </tr>
            <?php  } ?>
            <!-- end table -->
        </table>
    </div>
    <!-- end .container -->


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

    <!-- Latest compiled and minified Bootstrap JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!-- confirm delete record will be here -->

</body>

</html>
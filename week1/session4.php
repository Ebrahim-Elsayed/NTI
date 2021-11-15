<?php

$email = "ebrahim(.K0)@gmail.com";
echo $RESULT = filter_var($email , FILTER_SANITIZE_EMAIL);
var_dump(filter_var($RESULT ,FILTER_VALIDATE_EMAIL));

// $age = 'ahmed';
// // var_dump(filter_var($age , FILTER_VALIDATE_INT))

// echo var_dump(filter_var($age , FILTER_SANITIZE_STRING));

// $text = "<h1>test</h1>";
    // echo htmlspecialchars($text) . "<br>";

    // $test = "   test               test      ";
    // echo trim($test) . "<br>";

    // echo stripcslashes("\ahseg\\mm") . "<br>";


// $id = "10%^&###12";
// echo var_dump( filter_var($id , FILTER_SANITIZE_NUMBER_INT));

// $URL = "//FACEBOOK..COM";
// $num = 010;
// $bool = true;
// echo var_dump(filter_var($bool , FILTER_VALIDATE_BOOL));


 $text = "ah             sks              ass";
echo trim($text);

?>
<!-- GAME3 ASHKAL ELFILTER -->
<!-- <table>
  <tr>
    <td>Filter Name</td>
    <td>Filter ID</td>
  </tr>
  <?php
  foreach (filter_list() as $id =>$filter) {
      echo '<tr><td>' . $filter . '</td><td>' . filter_id($filter) . '</td></tr>';
  }
  ?>
</table> -->

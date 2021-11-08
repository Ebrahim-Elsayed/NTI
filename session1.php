<?php

/*
Task
Write a PHP program to calculate electricity bill .
Conditions:
For first 50 units – 3.50/unit
For next 100 units – 4.00/unit
For units above 150 – 6.50/unit
You can use conditional statements.
*/

$bill = 200;
if ($bill > 0 && $bill < 50 ) {

    echo "the bill is :" . ($bill * 3.50);

}elseif( $bill > 50 && $bill < 150 ){

    echo "the bill is :" . ($bill * 4.00);

}elseif($bill > 150){

    echo "the bill is :" . ($bill * 6.50);
}

?>


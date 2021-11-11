<?php

/* * TASK
Write a PHP function to print the next character of a specific character.
input : 'a'
Output : 'b'
input : 'z'
Output : 'a'
*/

// function next_char($char){
//     return substr($char , 3 );
// }
// echo next_char("hello");

// $char = 'z';
// $next_char = ++$char; 
// if (strlen($next_char) > 1) {
//  $next_char = $next_char[0];
// }
// echo $next_char;



// function sayHello($name , string $phone = '01144175079'):string{
    //     echo "hello " . $name  . " , " . "your phone is : " . $phone. '<br>' ;
    // }
    
    // sayHello('ebrahim' , '256325' ); 
    // sayHello('amena'   , '0354'); 
    // sayHello('anas'    , '015'); 
    
    // // declare(strict_types = 1);

    // function calc(int $num1 ,float $num2 , int $num3 ):float{

    //     $result = ($num1 * $num2 / $num3);
    //     return $result; 

    // }

    // echo calc(25 , 1.5 , 20);


    // $age = 10;

    // for ($i=0; $i < 10; $i++) { 
    //     echo $age = $i .  "<br>";
    // }

    // function co(){
    //     global $age;
    //     echo $age ;
    // }

    // co();

    $students = ["name"=> "ahmed" , "age"  => 20 , "position" => 'web-developer',"nationality" =>   "egyptian" ,"hight" =>  180];
    
    // echo implode( $studets );
    foreach ($students as $key => $value) {
        // echo "index of : " . $key . " >>> " ."value is :" . $value . "<br>";
        echo  $key . " >>> " . $value . "<br>";
    }

?>
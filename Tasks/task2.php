<?php

/* * TASK
Write a PHP function to print the next character of a specific character.
input : 'a'
Output : 'b'
input : 'z'
Output : 'a'
*/

function next_char($char){
    return substr($char , 3 );
}
echo next_char("hello");

$char = 'z';
$next_char = ++$char; 
if (strlen($next_char) > 1) {
 $next_char = $next_char[0];
}
echo $next_char;


?>
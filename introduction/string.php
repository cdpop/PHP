<?php
$string = 'this is an example string.';
//can give second argument,0,1,2
//for 1 we produce an aray
//for 2 we get an associative array
//we have a 3rd argument we can specify something that we add on the end
//3rd argument will specify special symbols to be added
$str_word_count = str_word_count($string,2);
//str_shuffle($string);
//print_r for printing an array
//substract string from 0 to half of the string
$half = substr($string,0,strlen($string)/2);
//reversing the string
$string_reverse = strrev($string);


//compare 2 strings

$string1 = 'This is my string. I am going to be working on php.';

$string2 = 'This is my string. I must work on my php.';

similar_text($string1,$string2,$result);
echo 'The similarity between is, '.$result.'<br>';
//string length
echo 'string lenght of result ' .strlen($result).'<br>';
//trim a string gets rid of white spaces on the end of a sentence either
//right side or left rtrim or ltrim
echo 'Trimming a string:<br> '.trim($string1).'<br>';
//adds slasshes to characters ike single quote,double quote, backslash or null
//addslashes($stringtest)








echo $half.'<br>';

echo $string_reverse.'<br>';

print_r( $str_word_count);



?>

<?php
$offset = 0;
$find = 'is';

$find_length = strlen($find);

$string = 'This is a string, and it\'s an example for the word is';
//original string, word you're looking for, what position
//to start from
//looking for is in a particular string
while ($string_postion = strpos($string,$find,$offset)) {
  echo '<strong>'.$find.'</strong> Found at '.$string_postion.'.<br>';
  //this is how we end the loop
  $offset = $string_postion + $find_length;
}
//what the parameters are
//strig we want to look at,string to replace, where to start
//how many characters to replace

?>

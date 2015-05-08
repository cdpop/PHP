<?php
$string = 'This is a string.';
//preg match searches in a string for a specific string
//2 forward slasshes say this is what i am looking for
//exactly for that word
//strlen
if (preg_match('/is/' , $string )) {
  echo 'Match found.';
} else {
  echo 'No match found.';
}


?>

<?php
$filename = 'names.txt';
if(unlink($filename)){
  echo 'File was deleted.';
}else {
  echo 'File was not found.';
}

//if we wanted to rename
/*
rename($filename,rand(100,999999).'.txt');
*/
?>

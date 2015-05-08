<?php
$filename = 'names.txt';
$handle = fopen($filename,'r');

//file and file size
$datain = fread($handle,filesize($filename));

//split up at the commas
$names_array = explode(',',$datain);
foreach ($names_array as $name){s
  echo $name.'<br>';
}

?>

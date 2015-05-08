<?php
$names_array = array ('Jack','Alex','Billy');
//implode makes it a string
$string = implode(', ',$names_array);
echo $string.'<br>';

// file open
$filename = 'names.txt';
$handle = fopen($filename,'a');
fwrite($handle,$string."\n");
fclose($handle);

$readin = file($filename);
foreach($readin as $read) {
  echo 'My information '.$read;
}

?>

<?php
//require vs include
//require handles errors differently if it can't find the file
//it kills off everything else
//require will kill the rest of the page
include 'header.inc.php';

echo $var1;
?>

<?php

echo 'hello ';
//kill the rest of the page or exit()
//die();

echo 'world';
//connect to a database friendly way of saying if you connected or not
//just understanding of how to use it function isn't real
mysql_connect('test') or die('could not be connected');

?>

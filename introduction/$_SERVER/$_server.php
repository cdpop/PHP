<?php
//purpose is to change in between pages dynamically
//pretty cool!!!
//what is $_SERVER
//predefined set of environmental information that allows us to access certain information
//about the user and request we've sent
include 'server.ini.php';
$script_name = $_SERVER['SCRIPT_NAME'];
echo $script_name;

if(isset($_POST['submit'])){
  echo '<br>Process 1';
}

?>

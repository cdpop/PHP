<?php
$user_ip = $_SERVER['REMOTE_ADDR'];
//to use original value us global otherwise in function it would create a new variable with the same name
function echo_ip() {
  global $user_ip;
  $string= 'my ip address is ' .$user_ip;
  echo $string;
}


echo_ip();

?>

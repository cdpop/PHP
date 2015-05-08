<?php
//usually to get the info we would use include
session_start();
/*
When would I use this?users logging in, keep them logged in while they are on your
website
*/
if (isset($_SESSION['username']) && isset($_SESSION['age'])) {
  echo 'Welcome, '.$_SESSION['username'].' you are '.$_SESSION['age'];
}else {
  echo 'Please log in.';
}

?>

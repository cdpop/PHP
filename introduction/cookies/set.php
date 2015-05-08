<?php
/*
cookie is a piece of data that is stored and it's unique to you and your browser
that piece of data would be relayed from your computer to the website
there are 3 main arguments
name of the cookie the value and the exparation date
We must state a time stamp
they can be dangerous because we don't want to set the total for a shopping cart
due to security reasons unless you use encryption where the user cannot make the change
*/

$time = time();
setcookie('username','alex',$time+100);
//to unset it just subtract the extra 100 seconds
setcookie('username','alex',$time-100);
//similar: $_SESSION['key'] = 'value';

?>

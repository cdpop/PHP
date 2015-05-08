<?php
/*
Sessions are store on the server and they are hidden from the user

id      name        private
1       alex        123
2       jack        234
This example will cover how to set and view a cookie
*/
session_start();
//variable exists only on this page now only as a session
//variable will be accessible on any page at any time
$_SESSION['username'] = 'Alex';
$_SESSION['age'] = '21';

?>

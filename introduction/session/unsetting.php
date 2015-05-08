<?php
/*
What about unsetting a individual session or maybe all sessions?
session_destroy will reset all sessions
might be a logging out file
*/
//fundamental mistake because
//WE MUST STILL CALL SESSION_START otherwise it will not unset everything else
//you need to start a session before you can unset it

session_start();
session_destroy();//will destroy the data between me and the server
//unset($_SESSION['username']);
//to test out just unsetting the single session just delete the if statement in view.php


?>

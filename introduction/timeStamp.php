<?php
//amount of seconds since 1970
date_default_timezone_set('America/New_York');
$time = time();
//what if i want to change the date to a week ago?
$time_now = date('D M Y @ H:i:s', $time);
$actual_modified = date('D M Y @ H:i:s', strtotime('+1 week'));
echo 'The current time is: '.$time_now.'<br>';
echo 'The modified time is: '.$actual_modified.'<br>';
?>

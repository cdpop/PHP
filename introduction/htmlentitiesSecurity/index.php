<?php
/*
When sending information from server to web page there can be a security breach
If we include something like <ifrome src="pagehere"
People can process HTML on our page which can pull data we don't want users to have
access to
*/
echo 'test';
if (isset($_GET['day']) && isset($_GET['date']) && isset($_GET['year'])) {
  echo 'test1';
  $day = htmlentities($_GET['day']);
  $date = htmlentities($_GET['date']);
  $year = htmlentities($_GET['year']);
  echo 'the date'.$day.$date.$year;
  if (!empty($day) && !empty($date) && !empty($year)) {
    echo 'The day entered was'.$day.' '.$date.' '.$year;
  }

}


?>

<form action = "index.php" method = "GET">
  Day:<br><input type ="text" name = "day"><br>
  Date:<br><input type = "text" name = "date"><br>
  Year:<br><input type = "text" name  = "year"><br><br>
  <input type = "submit" value = "Submit">
</form>

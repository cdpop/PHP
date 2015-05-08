<?php
//random number generator
//gives random number
//echo rand().'<br>';
//find upper value
//echo getrandmax().'<br>';
//echo rand(1,10).'<br>';

if (isset($_POST['roll'])){
  echo 'Your number is generated between 1 and 6.<br>';
  echo rand(1,6);
}

?>

<form action = "randomNumber.php" method = "POST">
  <input type = "submit" name="roll" value ="Roll">
</form>

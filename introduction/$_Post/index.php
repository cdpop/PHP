<?php
/*HTTP post method sends data to the form and doesn't include in URL
DOESN'T SHOW IN URL, process file data through a page*/
$match = 'pass123';


if (isset($_POST['password']) && !empty($_POST['password'])) {
  $password = $_POST['password'];
    if($password == $match){
      echo 'That\'s correct';
    }else {
      echo 'Wrong';
    }
  }
else{
  echo 'Please enter a password';
}


?>

<form action="index.php" method = "POST">
Password:<br> <input type = "password" name = "password"><br><br>
              <input type = "submit" name = "submit">
</form>

<?php
//isset determines if the variables is set and is not NULL

if (isset($_GET['user_name']) && !empty($_GET['user_name']) ) {
   $user_name = $_GET['user_name'];
      $user_name_lc = strtolower($user_name);

      if ($user_name_lc == 'pop')
      {
        echo 'I\'m the best '.$user_name_lc;
      }
}

?>

<form action ="upLowCase.php" method = "GET">
    Name: <input type= "text" name = "user_name"> <br><br>
      <input type = "submit" value = "submit">
</form>

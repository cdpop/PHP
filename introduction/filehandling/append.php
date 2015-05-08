
<?php

if (isset($_POST['name'])) {
  $name = $_POST['name'];
  if(!empty($_POST['name'])){
    $handle = fopen('names.txt','a');

    fwrite($handle,$name."\n");
    //a just adds it to the end of the list w rewrites everything
    fclose($handle);


  } else {
    echo 'Field is empty';
  }
}






?>
<form action = "append.php" method = "POST">
  Name:<br>
  <input type = "text" name = "name">
  <input type = "submit" value = "Submit">
</form>

<?php
if (isset($_POST['name'])){
  if( !empty($_POST['name'])){
  $name = $_POST['name'];
  $handle = fopen('names.txt','a');
  fwrite($handle,$name."\n");
  fclose($handle);

  echo 'Current names in fiele: ';
  $count = 1;
  $readin = file('names.txt','r');
  $readin_count = count($readin);
  foreach($readin as $fname){
    echo trim($fname);
    if($count < $readin_count){
      echo ', ';
    }
    $count++;

  }

}
}else{
  echo 'Please type a name';
}

?>

<form action = "reading.php" method ="POST">
  Name:<br>
  <input type = "text" name = "name"><br>
  <input type = "submit" value = "Submit">
</form>

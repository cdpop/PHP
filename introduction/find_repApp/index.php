<?php
if(isset($_POST['text'])
&& isset($_POST['searchfor']) &&
   isset($_POST['replacewith']) )
  {
   $text = $_POST['text'];
   $search = $_POST['searchfor'];
   $replace = $_POST['replacewith'];

if(!empty($text) && !empty($search) && !empty($replace)) {
$new_text = str_replace($search,$replace,$text);
echo $new_text;

}else{
  echo 'Please fill in all your information';
}
}


?>

<form action = "index.php" method = "POST">
  <textarea name = "text" row = "6" cols = "30">
  </textarea><br><br>
  Search for: <br>
  <input type = "text" name = "searchfor"><br><br>
  Replace with:<br>
  <input type = "text" name = "replacewith"><br><br>
  <input type = "submit" value = "Find and Replace">
</form>

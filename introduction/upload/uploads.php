<?php
if(isset($_FILES['fileToUpload'])) {
  $file = $_FILES['fileToUpload'];
  $file_name = $file['name'];

  //to move the file we want the temp name
  $file_temp = $file['tmp_name'];
  //file size
  $file_size = $file['size'];
  $file_error = $file['error'];
  //work out file extension
  //takes in a string via a specific character
  $file_ext = explode('.',$file_name);
  $file_ext = strtolower(end($file_ext));

  $allowed = array('txt','jpg');
  if (in_array($file_ext,$allowed)) {
    if($file_error == 0 && $file_size > 100) {
        echo $file_name_new = uniqid('',true).'.'.$file_ext.'<br>';
        echo $file_destination = 'uploads/'.$file_name_new;

        if(move_uploaded_file($file_temp,$file_destination)){
          echo $file_destination;
        }
    }

  }

}

?>

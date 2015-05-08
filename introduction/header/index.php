<?php
//HAS TO BE VERY FIST
//stores input in a buffer
ob_start();
?>

<h1>My Page</h1>
<h2>Output before the header will cause this page to not work use ob_start</h2>
<?php
//how to redirect someone without meta tags
//if we have a header at the top THIS PAGE WILL NOT WORK
//<h1>TEST</h1> will make the function not work

$redirect_page = 'http://www.google.com';
$redirect = false;

if($redirect == true){
  header('Location: '.$redirect_page);
}else{
  echo 'I did not redirect you';
}

//always good function to use once you are done with your website
//output to display and then empties the buffer
ob_end_flush();
?>

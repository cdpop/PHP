<?php
/*
w for writing
r for reading
a for appending aka adding to a file
First we create a handle
first we give it the file name, then do we want to write,read, or append
*/
$handle = fopen('names.txt','w');
//to what i'm writing,what i want to write in there
fwrite($handle,'Pop'."\n");
//everytime we do fwrite we open up the file each time
fwrite($handle,'Alex'."\n");
fwrite($handle,'Jake'."\n");
fwrite($handle,'Rocker');

//closes the connection with the file so it doesn't remain open
fclose($handle);
echo 'Written';
?>

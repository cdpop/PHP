<?php
//$_SERVER['REMOTE_ADDR']
/*if they are using a proxy for example that method would
not be accurate or them being on a shared network
because i'm on a local server this will not work properly xampp has been
giving me issues*/
$http_client_ip = $_SERVER['HTTP_CLIENT_IP'];

$http_x_forwarded_for = $_SERVER['HTTP_X_FORWARDED_FOR'];

$remote_addr = $_SERVER['REMOTE_ADDR'];

if(!empty($http_client_ip)) {
  $ip_address = $http_client_ip;

}else if (!empty($http_x_forwarded_for)){
  $ip_address = $http_x_forwarded_for;
}else {
  $ip_address = $remote_addr;
}

echo $ip_address;
?>

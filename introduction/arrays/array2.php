<?php
//they key is pasta and holds the value 300
//associative array
$food = array('Pasta'=>300,'Pizza'=>1000,'Salad'=>150,'Vegetables'=>50);

echo $food['Pizza'].'<br>';

/*
multi-dimensional array
healthy vs unhealthy
healthy
salad,vegetables

unhealthy
pizza
*/

$food2 = array('Healthy' => array('Salad','Vegetables'),
               'Unhealthy'=>array('Pizza'));

echo $food2['Healthy'][0];








?>

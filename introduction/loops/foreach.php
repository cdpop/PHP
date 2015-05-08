<?php
$food = array('Health' =>
                          array('Salad','Vegetables','Pasta'),
              'Unhealthy' =>
                          array('Pizza','Ice Cream')
                      );

//address the array
//food is the array overall
//$element is healthy or unhealthy
//item is salary,vegetables etc
foreach($food as $element => $inner_array) {
    echo '<strong>'.$element.'</strong><br>';
    foreach($inner_array as $item){
      echo $item.'<br>';
    }

};

?>

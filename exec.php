<?php
  $trigger=$_GET['trigger'];
  error_reporting(E_ALL);
  if(isset($trigger)){
    if($trigger == 'up'){
      exec("gpio mode 15 out");
      exec("gpio write 15 1");
      sleep(23);
      exec("gpio write 15 0");
    }elseif ($trigger == 'down') {
      exec("gpio mode 1 out");
      exec("gpio write 1 1");
      sleep(23);
      exec("gpio write 1 0");
    }elseif($trigger == 'stop'){
      exec("gpio mode 1 out");
      exec("gpio write 1 0");
      exec("gpio mode 15 out");
      exec("gpio write 15 0");
    }
  }
?>

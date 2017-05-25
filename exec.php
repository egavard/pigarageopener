<?php
  $trigger=$_GET['trigger'];
  error_reporting(E_ALL);
  if(isset($trigger)){
    if($trigger == 'up'){
    resetAll();
      exec("gpio mode 4 out");
      sleep(23);
	  exec("gpio mode 4 in");
    }elseif ($trigger == 'down') {
    resetAll();
      exec("gpio mode 1 out");
      sleep(23);
	  exec("gpio mode 1 in");
    }elseif($trigger == 'stop'){
	    resetAll();
    }
  }
  
  function resetAll(){
    exec("gpio mode 1 in");
	  exec("gpio mode 4 in");
  }
?>

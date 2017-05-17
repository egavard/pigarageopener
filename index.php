<?php


?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!--Import materialize.css-->
  <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

  <!--Let browser know website is optimized for mobile-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Garage Opener</title>
</head>
<style>
#waiting-row, #waiting-bar-up, #waiting-bar-down{
  display:none;
}
</style>
<body>
  <div class="section no-pad-bot" id="index-banner">
    <div class="container">
      <div class="row center">
        <a href="#" id="up-button" class="btn btn-large blue waves-effect waves-light">Ouvrir volet roulant</a>
        <a href="#" id="down-button" class="btn btn-large green waves-effect waves-light">Fermer volet roulant</a>
      </div>
      <div class="row center">
        <a href="#" id="stop-button" class="btn btn-large red waves-effect waves-light"><i class="material-icons left">error_outline</i>STOP</a>
      </div>
      <div class="row center" id="waiting-row">
        <div class="progress">
          <div class="indeterminate"></div>
        </div>
        <div id="waiting-bar-up">
          Ouverture du volet en cours
        </div>
        <div id="waiting-bar-down">
          Fermeture du volet en cours
        </div>
      </div>
    </div>
  </div>

</body>
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="js/materialize.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){

  var triggered = false;
  init();

  function init(){
    $("#waiting-row").hide();
    $("#waiting-bar-up").hide();
    $("#waiting-bar-down").hide();
  }

  $("#up-button").click(function(){
    triggerVolet("up");
  });

  $("#down-button").click(function(){
    triggerVolet("down");
  });

  $("#stop-button").click(function(){
    triggerStop();
  });

  function triggerStop(){
    $.get("exec.php?trigger=stop");
    triggered = false;
    $("a").removeClass("disabled");
    $("#waiting-row").hide();
    $("[id^='waiting-bar-']").hide();
  }

  function triggerVolet(sens){
    if(!triggered){
      $.get("exec.php?trigger="+sens);
      triggered = true;
      $("a[id!=stop-button]").addClass("disabled");
      $("#waiting-row").show();
      $("#waiting-bar-"+sens).show();
      setTimeout(function(){
        triggered = false;
        $("a").removeClass("disabled");
        $("#waiting-row").hide();
        $("#waiting-bar-"+sens).hide();
      },23000);
    }
  }
});



</script>
</html>

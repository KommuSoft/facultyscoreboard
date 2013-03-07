<!DOCTYPE html>
<?php 
	error_reporting(-1);
	ini_set('display_errors', '1');
	$name = "Scorebord";
?>
<html lang="nl"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>KULAK 24 uur - Scorebord</title>
    <?php include("head.php"); ?>
    <?php include("makescoreboard.php"); ?>
  </head>

  <body>

    <div class="container">

      <?php include("masthead.php"); ?>

      <hr>

      <div class="jumbotron">
        <h1>Scorebord</h1>
        <!--<p class="lead">Tekst??</p>-->
      </div>

      <hr>
     
<?php
?>
<ul id="MainTabs" class="nav nav-tabs">
  <li><a data-target="#fac" data-toggle="tab" id="tabfac" href="/getscoreboardfac.php">Faculteit</a></li>
  <li><a data-target="#ric" data-toggle="tab" id="tabric" href="/getscoreboardric.php">Richting</a></li>
  <li><a data-target="#ind" data-toggle="tab" id="tabind" href="/getscoreboardind.php">Individu</a></li>
</ul>
 
<div class="tab-content">
  <div class="tab-pane" id="fac">Bezig met laden...</div>
  <div class="tab-pane" id="ric">Bezig met laden...</div>
  <div class="tab-pane" id="ind">Bezig met laden...</div>
</div>
      <hr>

      <?php include("footer.php"); ?>

    </div> <!-- /container -->

	<?php include("javascript.php"); ?>
	<script>
	$('[data-toggle="tab"]').click(function(e) {
	    e.preventDefault()
    	var loadurl = $(this).attr('href')
	    var targ = $(this).attr('data-target')
	    $.get(loadurl, function(data) {
	        $(targ).html(data)
		});
	    $(this).tab('show')
	});
	$(function() {
	  $("#MainTabs").tab();
	  $("#MainTabs").bind("show", function(e) {    
    	var contentID  = $(e.target).attr("data-target");
    	var contentURL = $(e.target).attr("href");
	    if (typeof(contentURL) != 'undefined')
    	  $(contentID).load(contentURL, function(){ $("#MainTabs").tab(); });
	    else
    	  $(contentID).tab('show');
  });
<?php
	$actab = "fac";
	if (array_key_exists("tab", $_GET)) {
		$actab = $_GET["tab"];
	}
  echo "$('#tab$actab').tab('show');";
?>
});
	</script>

</body></html>

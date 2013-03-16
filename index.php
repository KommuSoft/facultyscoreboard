<!DOCTYPE html>
<?php 
	error_reporting(-1);
	ini_set('display_errors', '1');
	$name = "Start";
?>
<html lang="nl"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>KULAK 24 uur - Home</title>
    <?php include("head.php"); ?>
  </head>

  <body>

    <div class="container">

      <?php include("masthead.php"); include("pgconnection.php") ?>

      <hr>

      <div class="jumbotron">
        <h1>KULAK 24 uur</h1><br><h1 id="timerval"></h1>
		<!--<p class="lead">Tekst??</p>-->
      </div>

      <hr>

      <div class="row-fluid marketing">
        <div class="span3">
          <!--<h4>Scorebord</h4>
          <p>-->
          <?php
          $query = "SELECT id,text from teksten";
          $rs = pg_query($con, $query) or die("Cannot execute query: $query\n");
          $rows = pg_fetch_all($rs);
          pg_close($con);
          $hasha = array();
          foreach($rows as $row) {
          #	array_push($hasha,$row['id'] => $row['text']);
          }
          #echo $hasha["0"];
          ?>
          <!--</p>-->
              <!--<div class="btn-group">
			    <button class="btn btn-primary btn-large">Scorebord</button>
			    <button class="btn btn-primary btn-large dropdown-toggle" data-toggle="dropdown">
			    <span class="caret"></span>
			    </button>
			    <ul class="dropdown-menu">
			    	<li><a href="scorebord.php?tab=faculteit">Faculteit</a></li>
			    	<li><a href="scorebord.php?tab=riching">Richting</a></li>
			    	<li><a href="scorebord.php?tab=individu">Richting</a></li>
			    </ul>
			</div>-->
		    <p align="center"><a class="btn btn-large" href="scorebord.php">Scorebord</a></p>
        </div>
        <div class="span3">
          <!--<h4>Laatste uitslagen</h4>
          <p>-->
          <?php
          #echo $hasha["1"];
          ?>
          <!--</p>-->
          <p align="center"><a class="btn btn-large" href="uitslagen.php">Uitslagen</a></p>
        </div>
        <div class="span3">
          <!--<h4>Sponsors</h4>
          <p>-->
          <?php
          #echo $hasha["2"];
          ?>
          <!--</p>-->
			<p align="center"><a class="btn btn-large" href="sponsors.php">Sponsors</a></p>
        </div>
        <div class="span3">
          <!--<h4>Over</h4>
          <p>-->
          <?php
          #echo $hasha["3"];
          ?>
          <!--</p>-->
	          <p align="center"><a class="btn btn-large" href="about.php">Over</a></p>
        </div>
      </div>

      <hr>
      
<script language="JavaScript">
timeSpeed = 47;
x = 0;
var reference = new Date(2013, 3, 14, 19, 30, 00, 000); // 2010
function updateTime() {
window.setTimeout('updateTime()',timeSpeed);
var now = new Date();
var del = (reference-now);
var ms = (del%1000);
del = (del-ms)/1000;
var s = del%60;
del = (del-s)/60;
var m = del%60;
del = (del-m)/60;
var h = del%24;
ms = Math.floor(ms/10);
document.getElementById("timerval").innerHTML = pad(h,2)+":"+pad(m,2)+":"+pad(s,2)+"."+pad(ms,2);
x++;
}
function pad(num, size) {
    var s = num+"";
    while (s.length < size) s = "0" + s;
    return s;
}
updateTime();
</script>

      <?php include("footer.php"); ?>

    </div> <!-- /container -->

	<?php include("javascript.php"); ?>

</body></html>

<!DOCTYPE html>
<?php 
	error_reporting(-1);
	ini_set('display_errors', '1');
	$name = "Uitslagen";
?>
<html lang="nl"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>KULAK 24 uur - Home</title>
    <?php include("head.php"); ?>
  </head>

  <body>

    <div class="container">

      <?php include("masthead.php"); ?>

      <hr>

      <div class="jumbotron">
        <h1>Uitslagen</h1>
        <!--<p class="lead">Tekst??</p>-->
      </div>
<?php
include('pgconnection.php');
echo '<table class="table table-striped table-hover table-condensed table-bordered"><thead><tr><th>Naam</th><th>Tijdstip</th><th>Richting</th><th>Discipline</th><th>Resultaat</th>';
$off = 0;
if($_SERVER["REQUEST_METHOD"] == "GET") {
	if (array_key_exists("offset", $_GET) && is_numeric($_GET["offset"])) {
		$off = 20*$_GET["offset"];
	}
}
else if($_SERVER["REQUEST_METHOD"] == "POST") {
	if (array_key_exists("offset", $_POST) && is_numeric($_POST["offset"])) {
		$off = 20*$_POST["offset"];
	}
}
$query = "SELECT student,richting,discipline,punten,timestamp FROM uitslagen ORDER BY timestamp DESC LIMIT 20 OFFSET $off";
$rs = pg_query($con, $query) or die("Cannot execute query: $query\n");
while($row = pg_fetch_row($rs)) {
	echo '<tr><td>'.$row[0].'</td><td>'.$row[4].'</td><td>'.$row[1].'</td><td>'.$row[2].'</td><td style="text-align:right">'.$row[3].'</td></tr>';
}
echo '</table>';
pg_close($con);
?>
	<div class="jumbotron">
		<div class="pagination">
		<ul>
		<li><a href="#">Prev</a></li>
		<li><a href="#">1</a></li>
		<li><a href="#">2</a></li>
		<li><a href="#">3</a></li>
		<li><a href="#">4</a></li>
		<li><a href="#">Next</a></li>
		</ul>
		</div>
    </div>
      <hr>


      <?php include("footer.php"); ?>

    </div> <!-- /container -->

	<?php include("javascript.php"); ?>

</body></html>

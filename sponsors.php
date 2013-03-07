<!DOCTYPE html>
<?php 
	error_reporting(-1);
	ini_set('display_errors', '1');
	$name = "Sponsors";
?>
<html lang="nl"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>KULAK 24 uur - Sponsors</title>
    <?php include("head.php"); ?>
  </head>

  <body>

    <div class="container">

      <?php include("masthead.php"); ?>

      <hr>

      <div class="jumbotron">
        <h1>Sponsors</h1>
        <!--<p class="lead">Tekst??</p>-->
      </div><hr><div id="container"><div id="grid" class="span12"><div class="row">
      
      <?php
      	include("pgconnection.php");
      	$query = "SELECT urllogo,website,tekst FROM sponsors";
      	$rs = pg_query($con, $query) or die("Cannot execute query: $query\n");
        $rows = pg_fetch_all($rs);
        $ro = 0;
        foreach($rows as $row) {
        	$url = $row['urllogo'];
        	$alt = $row['tekst'];
        	$web = $row['website'];
	        echo "<div class=\"span3\" style=\"display: table-cell; text-align: center; vertical-align: middle;\"><a href=\"$web\"><img src=\"$url\" alt=\"$alt\" class=\"img-polaroid\" width=\"80%\"></a></div>";
	        $ro = $ro+1;
	        if($ro >= 4) {
	        	$ro = 0;
	        	echo '</div><div class="control-group"></div><div class="row">';
	        }
        }
        pg_close($con);
        ?>

      </div></div></div>

      <hr>

      <?php include("footer.php"); ?>

    </div> <!-- /container -->

	<?php include("javascript.php"); ?>

</body></html>

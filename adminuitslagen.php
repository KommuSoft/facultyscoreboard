<!DOCTYPE html>
<?php 
	error_reporting(-1);
	ini_set('display_errors', '1');
	$name = "Uitslagen";
	$admin = 1;
	include("checkadminredirect.php");
	
?>
<html lang="nl"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>KULAK 24 uur - uitslagen admin</title>
    <?php include("head.php"); ?>
  </head>

  <body>

    <div align="center" class="container">

      <?php include("masthead.php"); ?>

      <hr>

      <div class="jumbotron">
        <h1>KULAK 24 uur uitslagen admin</h1>
		<!--<p class="lead">Tekst??</p>-->
      </div>

      <hr>
      
      <div class="span12"><div class="content"><div class="row">
			<div class="login-form">
				<h2>Voeg uitslag toe</h2>
				<form action="addpoints.php" method="post">
					<fieldset>
						<div class="clearfix">
							<select data-provide="typeahead" class="selectpicker" data-items="4" id="ap_iid" name="ap_iid">
								<?php
								$query = "SELECT id,name FROM disciplines";
								$rs = pg_query($con, $query) or die("Cannot execute query: $query\n");
								while($row = pg_fetch_row($rs)) {
									echo "<option value=\"$row[0]\">$row[1]</option>";
								}
								?>
							</select>
						</div>
						<div class="clearfix">
							<select data-provide="typeahead" class="selectpicker" data-items="4" id="ap_sid" name="ap_sid">
								<?php
								$query = "SELECT id,name,snummer FROM studenten";
								$rs = pg_query($con, $query) or die("Cannot execute query: $query\n");
								while($row = pg_fetch_row($rs)) {
									echo "<option value=\"$row[0]\">$row[1] ($row[2])</option>";
								}
								pg_close($con);
								?>
							</select>
						</div>
						<div class="clearfix">
							<input name="ap_points" type="text" placeholder="Punten" align="right">
						</div>
						<button class="btn btn-primary" type="submit">Voeg toe...</button>
					</fieldset>
				</form>
			</div>
		</div></div></div>

      <hr>
      
		<?php
		if(array_key_exists('default_discipline',$_SESSION)) {
			$dd = $_SESSION['default_discipline'];
			echo "<script type=\"text/javascript\" language=\"javascript\">
					document.getElementById(\"ap_iid\").value = $dd;
				</script>";
		}
		?>
		<script type="text/javascript" language="javascript">
			document.getElementById("ap_iid").focus();
		</script>

      <?php include("footer.php"); ?>

    </div> <!-- /container -->

	<?php include("javascript.php"); ?>

</body></html>

<!DOCTYPE html>
<?php 
	error_reporting(-1);
	ini_set('display_errors', '1');
	$name = "Studenten";
	$admin = 1;
	include("checkadminredirect.php");
?>
<html lang="nl"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>KULAK 24 uur - studenten admin</title>
    <?php include("head.php"); ?>
  </head>

  <body>

    <div align="center" class="container">

      <?php include("masthead.php"); ?>

      <hr>

      <div class="jumbotron">
        <h1>KULAK 24 uur studenten admin</h1>
      </div>

      <hr>
		
		<div class="span12"><div class="content"><div class="row">
			<div class="login-form">
				<h2>Voeg student toe</h2>
				<form action="addstudent.php" method="post">
					<fieldset>
						<div class="clearfix">
							<input name="as_snummer" type="text" placeholder="Identificatie (studentennummer)">
						</div>
						<div class="clearfix">
							<input name="as_name" type="text" placeholder="Naam">
						</div>
						<div class="clearfix">
							<select data-provide="typeahead" data-items="4"  name="as_dirid">
								<?php
								$query = "SELECT id,name FROM richtingen";
								$rs = pg_query($con, $query) or die("Cannot execute query: $query\n");
								while($row = pg_fetch_row($rs)) {
									echo "<option value=\"$row[0]\">$row[1]</option>";
								}
								pg_close($con);
								?>
							</select>
						</div>
						<button class="btn btn-primary" type="submit">Voeg toe...</button>
					</fieldset>
				</form>
			</div>
		</div></div></div>
      <hr>
      
      <?php
		if(array_key_exists('default_richting',$_SESSION)) {
			$dr = $_SESSION['default_richting'];
			echo "<script type=\"text/javascript\" language=\"javascript\">
					document.getElementById(\"as_dirid\").value = $dr;
				</script>";
		}
		?>
		<script type="text/javascript" language="javascript">
			document.getElementById("as_snummer").focus();
		</script>

      <?php include("footer.php"); ?>

    </div> <!-- /container -->

	<?php include("javascript.php"); ?>

</body></html>

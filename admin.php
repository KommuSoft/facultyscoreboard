<!DOCTYPE html>
<?php 
	error_reporting(-1);
	ini_set('display_errors', '1');
	$name = "Begin";
	$admin = 1;
?>
<html lang="nl"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>KULAK 24 uur - Login</title>
    <?php include("head.php"); ?>
  </head>
  <body>
    <div align="center" class="container">
      <?php include("masthead.php"); ?>
      <hr>
      <div class="jumbotron">
        <h1>KULAK 24 uur admin</h1>
      </div>
      <hr>
		<?php
		include("checkadmin.php");
#		$showlogin = true;
		if($isadmin) {
			$showlogin = false;
echo	'    <div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button><h4>Reeds ingelogd!</h4><form action="logoff.php" method="post"><button class="btn primary" type="submit">Log out</button></form></div>';
		}
		else {
echo      '<div class="container"><div class="content"><div class="row">
				<div class="login-form">
					<h2>Login</h2>
					<form action="login.php" method="post">
						<fieldset>
							<div class="clearfix">
								<input name="username" type="text" placeholder="Gebruikersnaam">
							</div>
							<div class="clearfix">
								<input name="password" type="password" placeholder="Wachtwoord">
							</div>
							<div class="clearfix">
								Email: vanonsem.willem@gmail.com
							</div>
							<button class="btn primary" type="submit">Log in</button>
						</fieldset>
					</form>
				</div>
			</div>
		</div>
	</div>';
		}
		pg_close($con);
		?>
      <hr>
      <?php include("footer.php"); ?>
    </div> <!-- /container -->
	<?php include("javascript.php"); ?>
</body></html>

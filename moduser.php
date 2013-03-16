<?php
include("checkadminredirect.php");
if($_SERVER["REQUEST_METHOD"] == "POST") {
	#perform the query
	$id=addslashes($_POST['mu_id']);
	$username=addslashes($_POST['mu_username']);
	$password=addslashes(crypt($_POST['mu_password'],"PickSomePassword"));
	$query = "UPDATE admin SET (username,password_hash) = ('$username','$password') WHERE id='$id'";
	$rs = pg_query($con, $query) or die("Cannot execute query: $query\n");
}
pg_close($con);
header('Location: adminbasic.php?tab=use');
?>

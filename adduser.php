<?php
include("checkadminredirect.php");
if($_SERVER["REQUEST_METHOD"] == "POST") {
	#perform the query
	$username=addslashes($_POST['au_username']);
	$password=addslashes(crypt($_POST['au_password'],"PickSomePassword"));
	$query = "INSERT INTO admin (username,password_hash) VALUES ('$username','$password')";
	$rs = pg_query($con, $query) or die("Cannot execute query: $query\n");
}
pg_close($con);
header('Location: adminbasic.php?tab=use');
?>

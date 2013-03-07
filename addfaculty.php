<?php
include("checkadminredirect.php");
if($_SERVER["REQUEST_METHOD"] == "POST") {
	#perform the query
	$name=addslashes($_POST['af_name']);
	$query = "INSERT INTO faculteiten (name) VALUES ('$name')";
	$rs = pg_query($con, $query) or die("Cannot execute query: $query\n");
}
pg_close($con);
header('Location: adminbasic.php?tab=fac');
?>

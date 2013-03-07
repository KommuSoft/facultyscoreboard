<?php
include("checkadminredirect.php");
if($_SERVER["REQUEST_METHOD"] == "POST") {
	#perform the query
	$nam=addslashes($_POST['ao_name']);
	$web=addslashes($_POST['ao_web']);
	$log=addslashes($_POST['ao_logo']);
	$tek=addslashes($_POST['ao_tekst']);
	$query = "INSERT INTO sponsors (name,urllogo,website,tekst) VALUES ('$nam','$web','$log','$tek')";
	$rs = pg_query($con, $query) or die("Cannot execute query: $query\n");
}
pg_close($con);
header('Location: adminbasic.php?tab=spo');
?>

<?php
include("checkadminredirect.php");
if($_SERVER["REQUEST_METHOD"] == "POST") {
	#perform the query
	$id=addslashes($_POST['mo_id']);
	$nam=addslashes($_POST['mo_name']);
	$web=addslashes($_POST['mo_web']);
	$log=addslashes($_POST['mo_logo']);
	$tek=addslashes($_POST['mo_tekst']);
	$query = "UPDATE sponsors SET (name,urllogo,website,tekst) = ('$nam','$web','$log','$tek') WHERE id='$id'";
	$rs = pg_query($con, $query) or die("Cannot execute query: $query\n");
}
pg_close($con);
header('Location: adminbasic.php?tab=spo');
?>

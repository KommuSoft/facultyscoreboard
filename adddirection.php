<?php
include("checkadminredirect.php");
if($_SERVER["REQUEST_METHOD"] == "POST") {
	#perform the query
	$name=addslashes($_POST['ad_name']);
	$faculteit=addslashes($_POST['ad_faculty']);
	$query = "INSERT INTO richtingen (faculteit,name) VALUES ('$faculteit','$name')";
	$rs = pg_query($con, $query) or die("Cannot execute query: $query\n");
}
pg_close($con);
header('Location: adminbasic.php?tab=ric');
?>

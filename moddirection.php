<?php
include("checkadminredirect.php");
if($_SERVER["REQUEST_METHOD"] == "POST") {
	#perform the query
	$id=addslashes($_POST['md_id']);
	$name=addslashes($_POST['md_name']);
	$faculteit=addslashes($_POST['md_facid']);
	$query = "UPDATE richtingen SET (faculteit,name) = ('$faculteit','$name') WHERE id='$id'";
	$rs = pg_query($con, $query) or die("Cannot execute query: $query\n");
}
pg_close($con);
header('Location: adminbasic.php?tab=ric');
?>

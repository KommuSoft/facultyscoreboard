<?php
include("checkadminredirect.php");
if($_SERVER["REQUEST_METHOD"] == "POST") {
	#perform the query
	$id=addslashes($_POST['mi_id']);
	$name=addslashes($_POST['mi_name']);
	$filename=addslashes($_POST['mi_filename']);
	$query = "UPDATE disciplines SET (name,filename) = ('$name','$filename') WHERE id='$id'";
	$rs = pg_query($con, $query) or die("Cannot execute query: $query\n");
}
pg_close($con);
header('Location: adminbasic.php?tab=dis');
?>

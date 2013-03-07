<?php
include("checkadminredirect.php");
if($_SERVER["REQUEST_METHOD"] == "POST") {
	#perform the query
	$name=addslashes($_POST['ai_name']);
	$filename=addslashes($_POST['ai_filename']);
	$query = "INSERT INTO disciplines (name,filename) VALUES ('$name','$filename')";
	$rs = pg_query($con, $query) or die("Cannot execute query: $query\n");
}
pg_close($con);
header('Location: adminbasic.php?tab=dis');
?>

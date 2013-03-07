<?php
include("checkadminredirect.php");
if($_SERVER["REQUEST_METHOD"] == "POST") {
	#perform the query
	$richting=addslashes($_POST['as_dirid']);
	$snummer=addslashes($_POST['as_snummer']);
	$name=addslashes($_POST['as_name']);
	$query = "INSERT INTO studenten (richting,snummer,name) VALUES ('$richting','$snummer','$name')";
	$rs = pg_query($con, $query) or die("Cannot execute query: $query\n");
	$_SESSION['default_richting']=$_POST['as_dirid'];
}
pg_close($con);
header('Location: adminstudents.php');
?>

<?php
include("checkadminredirect.php");
if($_SERVER["REQUEST_METHOD"] == "POST") {
	#perform the query
	$id=addslashes($_POST['ms_id']);
	$richting=addslashes($_POST['ms_dirid']);
	$snummer=addslashes($_POST['ms_snummer']);
	$name=addslashes($_POST['ms_name']);
	$query = "UPDATE studenten SET (richting,snummer,name) = ('$richting','$snummer','$name') WHERE id='$id'";
	$rs = pg_query($con, $query) or die("Cannot execute query: $query\n");
	$_SESSION['default_richting']=$_POST['ms_dirid'];
}
pg_close($con);
header('Location: adminstudents.php');
?>

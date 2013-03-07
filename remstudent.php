<?php
include("checkadminredirect.php");
if($_SERVER["REQUEST_METHOD"] == "POST") {
	#perform the query
	$id=addslashes($_POST['rs_id']);
	$query = "DELETE FROM studenten WHERE id='$id'";
	$rs = pg_query($con, $query) or die("Cannot execute query: $query\n");
}
pg_close($con);
header('Location: adminstudents.php');
?>

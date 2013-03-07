<?php
include("checkadminredirect.php");
if($_SERVER["REQUEST_METHOD"] == "POST") {
	#perform the query
	$id=addslashes($_POST['mf_id']);
	$name=addslashes($_POST['mf_name']);
	$query = "UPDATE faculteiten SET (name) = ('$name') WHERE id='$id'";
	$rs = pg_query($con, $query) or die("Cannot execute query: $query\n");
}
pg_close($con);
header('Location: adminbasic.php?tab=fac');
?>

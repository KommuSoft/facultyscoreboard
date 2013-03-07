<?php
include("checkadminredirect.php");
if($_SERVER["REQUEST_METHOD"] == "POST") {
	#perform the query
	$id=addslashes($_POST['mt_id']);
	$tekst=addslashes($_POST['mt_tekst']);
	$query = "UPDATE teksten SET (text) = ('$tekst') WHERE id='$id'";
	$rs = pg_query($con, $query) or die("Cannot execute query: $query\n");
}
pg_close($con);
header('Location: adminbasic.php?tab=tek');
?>

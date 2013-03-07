<?php
include("checkadminredirect.php");
if($_SERVER["REQUEST_METHOD"] == "POST") {
	#perform the query
	$tekst=addslashes($_POST['at_tekst']);
	$query = "INSERT INTO teksten (text) VALUES ('$tekst')";
	$rs = pg_query($con, $query) or die("Cannot execute query: $query\n");
}
pg_close($con);
header('Location: adminbasic.php?tab=tek');
?>

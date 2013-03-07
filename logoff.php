<?php
include("checkadminredirect.php");
if($_SERVER["REQUEST_METHOD"] == "POST") {
	$now = new DateTime();
	$now = $now->format('Y-m-d H:i:s');
	$query = "UPDATE sessionhashes SET expires = '$now' WHERE hash='$myhash'";
	$rs = pg_query($con, $query) or die("Cannot execute query: $query\n");
}
pg_close($con);
header('Location: ../admin.php');
?>

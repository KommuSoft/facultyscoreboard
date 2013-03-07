<?php
include("checkadminredirect.php");
if($_SERVER["REQUEST_METHOD"] == "POST") {
	#perform the query
	$sid=addslashes($_POST['ap_sid']);
	$iid=addslashes($_POST['ap_iid']);
	$points=addslashes($_POST['ap_points']);
	$time = new DateTime();
	$time = $time->format('Y-m-d H:i:s');
	$query = "INSERT INTO punten (student,discipline,points,session,timestamp) VALUES ('$sid','$iid','$points','$myhash','$time')";
	$rs = pg_query($con, $query) or die("Cannot execute query: $query\n");
	$_SESSION['default_discipline']=$_POST['ap_iid'];
}
pg_close($con);
header('Location: adminuitslagen.php');
?>

<?php
include("checkadminredirect.php");
if($_SERVER["REQUEST_METHOD"] == "POST") {
	#perform the query
	$id=addslashes($_POST['mp_id']);
	$sid=addslashes($_POST['mp_sid']);
	$iid=addslashes($_POST['mp_iid']);
	$points=addslashes($_POST['mp_points']);
	$query = "UPDATE punten SET (student,discipline,points,session) = ('$sid','$iid','$points','$myhash') WHERE id='$id'";
	$rs = pg_query($con, $query) or die("Cannot execute query: $query\n");
	$_SESSION['default_discipline']=$_POST['mp_iid'];
}
pg_close($con);
header('Location: adminuitslagen.php');
?>

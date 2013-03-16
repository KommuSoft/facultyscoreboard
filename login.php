<?php
include("pgconnection.php");
session_start();
if($_SERVER["REQUEST_METHOD"] == "POST") {
	$username=addslashes($_POST['username']);
	$password=addslashes(crypt($_POST['password'],"PickSomePassword"));
	$query="SELECT id FROM admin WHERE username='$username' and password_hash='$password'";
	$rs = pg_query($con, $query) or die("Cannot execute query: $query\n");
	$row = pg_fetch_all($rs);
	$count=pg_num_rows($rs);
	if($count==1) {
		$hash = rand();
		$expire = new DateTime();
		$expire->add(new DateInterval('PT6H'));
		$expire = $expire->format('Y-m-d H:i:s');
		$adminid = $row[0]["id"];
		$query="INSERT INTO sessionhashes (hash,expires,adminid) VALUES ('$hash','$expire','$adminid')";
		$rs = pg_query($con, $query) or die("Cannot execute query: $query\n");
		$_SESSION['hash']=$hash;
	}
}
pg_close($con);
header("Location: admin.php");
exit();
?>

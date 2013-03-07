<?
include("pgconnection.php");
session_start();
$isadmin = false;
if(array_key_exists('hash',$_SESSION)) {
	$myhash=addslashes($_SESSION['hash']);
	$now = new DateTime();
	$now = $now->format('Y-m-d H:i:s');
	$query="SELECT * FROM sessionhashes WHERE hash='$myhash' AND expires > '$now'";
	$rs = pg_query($con, $query) or die("Cannot execute query: $query\n");
	$row = pg_fetch_all($rs);
	$count=pg_num_rows($rs);
	if($count > 0) {
		$isadmin = true;
	}
}
?>

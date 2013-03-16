<?php
error_reporting(-1);
ini_set('display_errors', '-1');
$name = "Scorebord";
include('pgconnection.php');
include('makescoreboard.php');
$query = "SELECT id,name,imagefilename,id from disciplines"; 
$rs = pg_query($con, $query) or die("Cannot execute query: $query\n");
$disciplines = pg_fetch_all($rs);
$query = "SELECT id,name from richtingen";
$rs = pg_query($con, $query) or die("Cannot execute query: $query\n");
$richtingen = pg_fetch_all($rs);
$totalr = 0;
$query = "SELECT richid, discipline, sum FROM richpuntensum";
$rs = pg_query($con, $query) or die("Cannot execute query: $query\n");
$puntenr=array();
while($row = pg_fetch_row($rs)) {
	$puntenr[$row[0]][$row[1]] = $row[2];
	$totalr = $totalr+$row[2];
}
pg_close($con);
makescoreboard($disciplines,'Richting',$richtingen,$puntenr,$totalr);
?>

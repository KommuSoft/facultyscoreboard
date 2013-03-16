<?php
error_reporting(-1);
ini_set('display_errors', '-1');
$name = "Scorebord";
include('pgconnection.php');
include('makescoreboard.php');
$query = "SELECT id,name,imagefilename,id from disciplines"; 
$rs = pg_query($con, $query) or die("Cannot execute query: $query\n");
$disciplines = pg_fetch_all($rs);
$query = "SELECT id,name from faculteiten";
$rs = pg_query($con, $query) or die("Cannot execute query: $query\n");
$faculteiten = pg_fetch_all($rs);
$totalf = 0;
$query = "SELECT facid, discipline, sum FROM facpuntensum";
$rs = pg_query($con, $query) or die("Cannot execute query: $query\n");
$puntenf=array();
while($row = pg_fetch_row($rs)) {
	$puntenf[$row[0]][$row[1]] = $row[2];
	$totalf = $totalf+$row[2];
}
pg_close($con);
makescoreboard($disciplines,'Faculteit',$faculteiten,$puntenf,$totalf);
?>

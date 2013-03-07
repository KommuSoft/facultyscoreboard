<?php
error_reporting(-1);
ini_set('display_errors', '-1');
$name = "Scorebord";
include('pgconnection.php');
include('makescoreboard.php');
$query = "SELECT id,name,imagefilename,id from disciplines"; 
$rs = pg_query($con, $query) or die("Cannot execute query: $query\n");
$disciplines = pg_fetch_all($rs);
$query = "SELECT id,name from studenten";
$rs = pg_query($con, $query) or die("Cannot execute query: $query\n");
$studenten = pg_fetch_all($rs);
$totalf = 0;
$query = "SELECT student, discipline, sum FROM stupuntensum";
$rs = pg_query($con, $query) or die("Cannot execute query: $query\n");
while($row = pg_fetch_row($rs)) {
	$puntenf[$row[0]][$row[1]] = $row[2];
	$totalf = $totalf+$row[2];
}
pg_close($con);
makescoreboard($disciplines,'Student',$studenten,$puntenf,$totalf);
?>

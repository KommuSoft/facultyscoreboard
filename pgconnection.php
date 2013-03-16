<?php
$host = "theURLOfTheDatabase";
$user = "theUserOfTheDatabase"; 
$pass = "thePasswordOfTheDatabase"; 
$db = "theNameOfTheDatabase"; 
$con = pg_connect("host=$host dbname=$db user=$user password=$pass") or die ("Could not connect to server\n");
?>

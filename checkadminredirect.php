<?php
include("checkadmin.php");
if(!$isadmin) {
	pg_close($con);
	header('Location: admin.php');
}
?>
